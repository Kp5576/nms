<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\ISP;
use App\Models\ISPMember;
use App\Models\AgentMember;
use App\Models\CustomerMember;
use App\Models\Agent;
use App\Models\Customer;
use App\Models\Member;
use App\Models\NMS;
use App\Models\ServerTime;
use App\Models\Incident;
use Mail;
use Illuminate\Support\Str;
use Config;

use Carbon\Carbon;

// class HomeController extends Controller {
use DateTime;
class HomeController extends Controller
{
    function  __construct(){
        date_default_timezone_set('Asia/Kolkata');
        }

    public function cron_run()
    {

        $records = NMS::get();

        foreach ($records as $row)
        {
            $last_record = DB::table("servers_uptime")->where("nms_id", $row->id)
                ->orderBy("id", "desc")
                ->first();

            $last_record_status = 0;
            if (isset($last_record->status))
            {
                $last_record_status = $last_record->status;
            }

            $member = User::where("id", $row->member_id)->first();

            if($row->port != "")
            {
                $status = $this->pingFsockopen($row->ip_address, $row->port, $member);
            }
            else{
                $status = $this->myping($row->ip_address, $member);
            }

            if ($status == 0)
            {
                sleep(5);
                if($row->port != "")
                {
                    $status = $this->pingFsockopen($row->ip_address, $row->port, $member);
                }
                else{
                    $status = $this->myping($row->ip_address, $member);
                }
            }

            $incident_id = $row->incident_id;

            if($status == 0 && $incident_id == ''){
                $rs_row = Incident::create([
                    'nms_id' => $row->id,
                    'start_datetime' => date("Y-m-d H:i:s")
                ]);
                NMS::where('id', $row->id)->update(['incident_id'=>$rs_row->id]);
            }

            if($status == 1){

                if($incident_id != ''){
                    Incident::where('id', $incident_id)->update([
                        'end_datetime' => date("Y-m-d H:i:s")
                    ]);
                }

                $check = [
                    'ping_server_id' => $row->id,
                    'is_ok' => $status,
                    'response_time' => $this->rtime
                ];

                $res = $this->vars($row, $check);
                $res['incident_id'] = '';
                $res['is_ok'] = $status;
                NMS::where('id', $row->id)->update($res);
            } else {
                $check = [
                    'ping_server_id' => $row->id,
                    'is_ok' => $status,
                    'response_time' => $this->rtime
                ];

                $res = $this->vars($row, $check);
                $res['is_ok'] = $status;
                NMS::where('id', $row->id)->update($res);
            }

            $data = ["nms_id" => $row->id, "date" => date("Y-m-d H:i:s") , "status" => $status, "latency" => $this->rtime ];

            if ($last_record_status != $status)
            {

                if ($row->hindi_english == 1)
                {
                    // send hindi msg
                    if ($row->customer_alert == 1)
                    {
                        $this->sendCommonMsg("customer", $status, $row, "hindi");
                    }
                    if ($row->isp_alert == 1)
                    {
                        $this->sendCommonMsg("isp", $status, $row, "hindi");
                    }
                    if ($row->isp_alert == 1)
                    {
                        $this->sendCommonMsg("isp_member", $status, $row, "hindi");
                    }
                    if ($row->agent_alert == 1)
                    {
                        $this->sendCommonMsg("agent", $status, $row, "hindi");
                    }
                    if ($row->operator_alert == 1)
                    {
                        $this->sendCommonMsg("operator", $status, $row, "hindi");
                    }
                }
                else
                {

                    //send english msg
                    if ($row->customer_alert == 1)
                    {
                        $this->sendCommonMsg("customer", $status, $row, "english");
                    }
                    if ($row->isp_alert == 1)
                    {
                        $this->sendCommonMsg("isp", $status, $row, "english");
                    }
                    if ($row->isp_alert == 1)
                    {
                        $this->sendCommonMsg("isp_member", $status, $row, "english");
                    }
                    if ($row->agent_alert == 1)
                    {
                        $this->sendCommonMsg("agent", $status, $row, "english");
                    }
                    if ($row->operator_alert == 1)
                    {
                        $this->sendCommonMsg("operator", $status, $row, "english");
                    }
                }
            }
            ServerTime::create($data);
            NMS::where("id", $row->id)
                ->update(["status" => $status, "last_login" => $data["date"]]);
        }
    }

    public function myping($host, $member)
    {
        $latency = false;

        $ttl = 255;
        $timeout = 10;//$member->timeout ?? 25;
        $retry = 1;//$member->retry ?? 1;

        $ping_type = "ping";

        // Exec string for Windows-based systems.
        if (strtoupper(substr(PHP_OS, 0, 3)) === "WIN")
        {
            // -n = number of pings; -i = ttl; -w = timeout (in milliseconds).
            $exec_string =  $ping_type . ' -n 1 -i ' . $ttl . ' -w ' . ($timeout * 1000) . ' ' . $host;
        }
        // Exec string for Darwin based systems (OS X).
        elseif (strtoupper(PHP_OS) === "DARWIN")
        {
            // -n = numeric output; -c = number of pings; -m = ttl; -t = timeout.
            $exec_string = $ping_type . ' -n -c 1 -m ' . $ttl . ' -t ' . $timeout . ' ' . $host;
        }
        // Exec string for other UNIX-based systems (Linux).
        else
        {
            // -n = numeric output; -c = number of pings; -t = ttl; -W = timeout
            $exec_string = $ping_type . ' -n -c 1 -t ' . $ttl . ' -W ' . $timeout . ' ' . $host . ' 2>&1';
        }

        exec($exec_string, $output, $return);

        // Strip empty lines and reorder the indexes from 0 (to make results more
        // uniform across OS versions).
        $commandOutput = implode("", $output);
        $output = array_values(array_filter($output));

        // If the result line in the output is not empty, parse it.
        if (!empty($output[1]))
        {
            // Search for a 'time' value in the result line.
            $response = preg_match("/time(?:=|<)(?<time>[\.0-9]+)(?:|\s)ms/", $output[1], $matches);

            // If there's a result and it's greater than 0, return the latency.
            if ($response > 0 && isset($matches["time"]))
            {
                $latency = round($matches["time"], 4);
            }
        }
        $this->rtime = $latency;

        if ($latency !== false)
        {
            $newstatus = 1;
        }
        else
        {
            $newstatus = 0;
        }
        return $newstatus;
    }

    public function sendCommonMsg($type, $status, $row, $lang)
    {

        $member = User::where("id", $row->member_id)->first();
        $isp = ISP::where("id", $row->isp_id)->first();
        $operator = ISP::where("id", $row->operator_id)->first();

        $customer = Customer::where("id", $row->customer_id)->first();
        $agent = Agent::where("id", $row->agent_id)->first();

        $isp_members_data = ISPMember::whereIn('id',json_decode('['.$row->isp_members_ids.']'))->where('alert',1);
        $isp_members_mobiles_array = $isp_members_data->pluck('mobile')->toArray();
        $isp_members_operator_array = $isp_members_data->pluck('operator')->toArray();
        $isp_members_email_array = $isp_members_data->pluck('email')->toArray();

        $isp_members_mobiles = $isp->mobile;
        $isp_members_emails = $isp->email;

        // $isp_members_mobiles = implode(',',$isp_members_mobiles_array);
        // $isp_members_emails = implode(',',$isp_members_emails_array);

        $customer_members_mobiles = CustomerMember::whereIn('id',json_decode('['.$row->customer_members_ids.']'))->where('alert',1);
        $customer_members_mobiles_array = $customer_members_mobiles->pluck('mobile')->toArray();
        $customer_members_emails_array = $customer_members_mobiles->pluck('email')->toArray();

        $customer_members_mobiles_array[] = $customer->mobile;
        $customer_members_emails_array[] = $customer->email;

        $operator_mobiles_array = [];
        $operator_mobiles_array[] = $operator->mobile;
        //$customer_members_emails_array[] = $operator->email;

        $customer_members_mobiles = implode(',',$customer_members_mobiles_array);
        $customer_members_emails = implode(',',$customer_members_emails_array);

        $agent_members_mobiles = AgentMember::whereIn('id',json_decode('['.$row->agent_members_ids.']'))->where('alert',1);
        $agent_members_mobiles_array = $agent_members_mobiles->pluck('mobile')->toArray();
        $agent_members_emails_array = $agent_members_mobiles->pluck('email')->toArray();

        $agent_members_mobiles_array[] = $agent->mobile;
        $agent_members_emails_array[] = $agent->email;

        $agent_members_mobiles = implode(',',$agent_members_mobiles_array);
        $agent_members_emails = implode(',',$agent_members_emails_array);

        if ($status == 0)
        {
            $phone = "";
            $name = "";
            $customer_name = "";
            $mobile = "";
            $emails = "";
            if ($type == "customer")
            {
                // parameter CUSTOMER MSG
                $customer_name = $customer->name;
                $name = $agent->name;
                $phone = $agent->mobile;

                $mobile = $customer_members_mobiles;

                $emails = $customer_members_emails;
            }
            elseif ($type == "isp")
            {
                // parameter ISP msg
                $customer_name = $isp->name;

                $name = $agent->name;
                $phone = $agent->mobile;
                $mobile = $isp_members_mobiles;

                $emails = $isp_members_emails;
            }
            elseif ($type == "operator")
            {
                // parameter ISP msg
                $customer_name = $operator->name;

                $name = $agent->name;
                $phone = $agent->mobile;
                $mobile = $operator_mobiles_array;

                $emails = $isp_members_emails;
            }
            elseif ($type == "isp_member")
            {

                $customer_name =  implode(',',$isp_members_operator_array);

                $name = $agent->name;
                $phone = $agent->mobile;
                $mobile = implode(',',$isp_members_mobiles_array);

                $emails = implode(',',$isp_members_email_array);
            }
            else
            {
                $customer_name = $isp->name;

                $name = $agent->name;
                $phone = $agent->mobile;

                $mobile = $agent_members_mobiles;

                $emails = $agent_members_emails;
            }

            $time = date("d M Y h:i a");

            $postdata = [$customer_name, $row->ip_address, $row->branch_name, $row->address, $time, $name, $phone ];

            if (!empty($mobile))
            {
                $template_name = "";
                if ($type == "customer")
                {
                    $template_name = "internet_down_customer_alert";
                }
                else
                {
                    $template_name = $lang == "hindi" ? "internet_alert_down_hindi" : "internet_down_alert";
                }
                if($row->whatsapp_message == 1)
                {
                    $country_code = $member->country_code ?? '91';
                    if($member->sms_whatsapp == "whatsapp" && $member->whatsapp_type == "whatsapp_offical")
                    {
                        $this->sendMsg($country_code, $member->whatsapp_auth_key, $member->whatsapp_app_key, $template_name, $mobile, $member->company, $postdata);
                    }

                    if($member->sms_whatsapp == "whatsapp" && $member->whatsapp_type == "whatsapp_qr")
                    {
                        $this->sendMsgQr($country_code, $member->whatsapp_auth_key, $member->whatsapp_app_key, $template_name, $mobile, $member->company, $postdata);
                    }
                }
                if($row->mail_alert == 1)
                {
                    $this->sendMail($member, $template_name, $emails, $member->company, $postdata);
                }
            }
        }
        else
        {
            $phone = "";
            $name = "";
            $customer_name = "";
            $mobile = "";
            if ($type == "customer")
            {
                // custom msg
                $customer_name = $customer->name;

                $name = $agent->name;
                $phone = $agent->mobile;

                $mobile = $customer_members_mobiles;

                $emails = $customer_members_emails;
            }
            elseif ($type == "isp")
            {
                // isp msg
                $customer_name = $isp->name;

                $name = $agent->name;
                $phone = $agent->mobile;

                $mobile = $isp_members_mobiles;

                $emails = $isp_members_emails;
            }
            elseif ($type == "operator")
            {
                // parameter ISP msg
                $customer_name = $operator->name;

                $name = $agent->name;
                $phone = $agent->mobile;
                $mobile = $operator_mobiles_array;

                $emails = $isp_members_emails;
            }
            elseif ($type == "isp_member")
            {

                $customer_name =  implode(',',$isp_members_operator_array);

                $name = $agent->name;
                $phone = $agent->mobile;
                $mobile = implode(',',$isp_members_mobiles_array);

                $emails = implode(',',$isp_members_email_array);
            }
            else
            {
                $customer_name = $isp->name;

                $name = $agent->name;
                $phone = $agent->mobile;

                $mobile = $agent_members_mobiles;

                $emails = $agent_members_emails;
            }

            $time = date("d M Y h:i a");

            $postdata = [$customer_name, $row->ip_address, $row->branch_name, $row->address, $time, $name, $phone ];

            if (!empty($mobile))
            {
                $template_name = "";
                if ($type == "customer")
                {
                    $template_name = $lang == "hindi" ? "internet_working_to_customer_alert" : "internet_working_to_customer_alert";
                }
                else
                {
                    $template_name = $lang == "hindi" ? "internet_alert_up_hindi" : "internet_link_working_alert";
                }
                if($row->whatsapp_message == 1)
                {
                    $country_code = $member->country_code ?? '91';
                    if($member->sms_whatsapp == "whatsapp" && $member->whatsapp_type == "whatsapp_offical")
                    {
                        $this->sendMsg($country_code, $member->whatsapp_auth_key, $member->whatsapp_app_key, $template_name, $mobile, $member->company, $postdata);
                    }

                    if($member->sms_whatsapp == "whatsapp" && $member->whatsapp_type == "whatsapp_qr")
                    {

                        $this->sendMsgQr($country_code, $member->whatsapp_auth_key, $member->whatsapp_app_key, $template_name, $mobile, $member->company, $postdata);
                    }
                }
                if($row->mail_alert == 1)
                {
                    $this->sendMail($member, $template_name, $emails, $member->company, $postdata);
                }
            }
        }
    }

    private function pingFsockopen($host, $port, $member)
    {
      $start = microtime(true);
      $timeout = $member->timeout ?? 10;
      // fsockopen prints a bunch of errors if a host is unreachable. Hide those
      // irrelevant errors and deal with the results instead.
      $fp = @fsockopen($host, $port, $errno, $errstr, $timeout);
      if (!$fp) {
        $latency = false;
        $newstatus1 = 0;
      } else {
        $latency = microtime(true) - $start;
        $latency = round($latency * 1000, 4);
        $newstatus1 = 1;
      }
      $this->rtime = $latency;
      return $newstatus1;
    }

    public function sendMail($mailConfigs, $template_name, $to, $header, $postdata)
    {
        try{
            Config::set('mail.mailers.smtp.host', $mailConfigs->mail_host ?? 'mail.ambalahost.com');
            Config::set('mail.mailers.smtp.port', $mailConfigs->mail_port ?? 587);
            Config::set('mail.mailers.smtp.username', $mailConfigs->mail_username ?? 'nms@ambalahost.com');
            Config::set('mail.mailers.smtp.password', $mailConfigs->mail_password ?? '@Apple30#');
            Config::set('mail.from.address', $mailConfigs->mail_username ?? 'NMS');
            Config::set('mail.from.name', $mailConfigs->name);

            $arrys = explode(',',$to);
            $customer_name = explode(',',$postdata[0]);
            $i = 0;
            foreach($arrys as $email){
                if(!empty($email)){
                    $postdata[0] = $customer_name[$i];
                    Mail::send('emails/'.$template_name,['postdata' => $postdata, 'header' => $header], function($message) use ($email, $template_name){
                        $message->to($email);
                        $message->subject($template_name);
                    });
                }
                $i++;
            }
        } catch (\Exception $exception) {
            error_log($exception->getMessage());
        }
    }
    public function sendMsg($country_code, $whatsapp_number_id, $whatsapp_access_token, $template_name, $to, $header, $postdata)
    {
        $arrys = explode(',',$to);

        $customer_name = explode(',',$postdata[0]);
        $i = 0;
        foreach($arrys as $mobile){
        $curl = curl_init();

        $customer = "";
        if(isset($customer_name[$i]))
        {
            $customer = $customer_name[$i];
        }

        curl_setopt_array($curl, [CURLOPT_URL => "https://graph.facebook.com/v18.0/" . $whatsapp_number_id . "/messages", CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => "", CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 0, CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST => "POST", CURLOPT_POSTFIELDS => '{
            "messaging_product": "whatsapp",
            "recipient_type": "individual",
            "to": "' .$country_code.$mobile. '",
            "type": "template",
            "template": {
                "name": "' . $template_name . '",
                "language": {
                    "code": "en"
                },
                "components": [
                    {
                        "type": "header",
                        "parameters": [{
                                "type": "text",
                                "text": "' . $header . '"
                            }
                        ]
                    },
                    {
                        "type": "body",
                        "parameters": [
                            {
                                "type": "text",
                                "text": "' . $customer . '"
                            },
                            {
                                "type": "text",
                                "text": "' . $postdata[1] . '"
                            },
                            {
                                "type": "text",
                                "text": "' . $postdata[2] . '"
                            },
                            {
                                "type": "text",
                                "text": "' . $postdata[3] . '"
                            },
                            {
                                "type": "text",
                                "text": "' . $postdata[4] . '"
                            },
                            {
                                "type": "text",
                                "text": "' . $postdata[5] . '"
                            },
                            {
                                "type": "text",
                                "text": "' . $postdata[6] . '"
                            }
                        ]
                    }
                ]
            }
        }', CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $whatsapp_access_token, "Content-Type: application/json", ], ]);

        $response = curl_exec($curl);
        curl_close($curl);
        $i++;
        }
    }

    public function sendMsgQr($country_code, $whatsapp_number_id, $whatsapp_access_token, $template_name, $to, $header, $postdata)
    {
        $arrys = explode(',',$to);

        $customer_name = explode(',',$postdata[0]);
        $i = 0;

        foreach($arrys as $mobile){
        $message = "";
        $customer = "";
        if(isset($customer_name[$i]))
        {
            $customer = $customer_name[$i];
        }
        if ($template_name == 'internet_alert_down_hindi') {
            $message = "इंटरनेट डाउन हैं : " . $header . "\nप्रिय आईएसपी " . $customer . " \n\nकृपया ध्यान दें कि निम्नलिखित इंटरनेट डाउन हैं: \n\nग्राहक का नाम/आईपी: " . $postdata[1] . "\n\nशाखा का नाम: " . $postdata[2] . "\n\nशाखा पता : " . $postdata[3] . " \n\nइंटरनेट डाउन हैं : " . $postdata[4] . "\n\nइंटरनेट बंद है, क्या आप कृपया अपनी टीम को यथाशीघ्र इंटरनेट बहाल करने के लिए सूचित कर सकते हैं। या मुझे बताएं कि समस्या क्या है धन्यवाद \n\nग्राहक सेवा कार्यकारी: " . $postdata[5] . " \nसंपर्क : " . $postdata[6] . "";
          } else if ($template_name == 'internet_alert_up_hindi') {
            $message = "अब " . $header . " का इंटरनेट ठीक काम कर रहा है\nप्रिय आईएसपी : " . $customer . " \n\nकृपया ध्यान दें कि निम्नलिखित इंटरनेट अब ठीक काम कर रहा है:\n\nग्राहक का नाम/आईपी: " . $postdata[1] . "\n\nशाखा का नाम: " . $postdata[2] . " \n\nशाखा पता : " . $postdata[3] . " \n\nइंटरनेट काम कर रहा है इस समय से : " . $postdata[4] . "\n\nकृपया हमारे ग्राहकों को सर्वोत्तम सेवाएं देने में हमारी सहायता करें। आपकी सहायता के लिए धन्यवाद !\n\nग्राहक सेवा कार्यकारी: " . $postdata[5] . " \nसंपर्क : " . $postdata[6] . "";
          } else if ($template_name == 'internet_down_alert') {
            $message = "Internet Down of " . $header . "\n\nDear Internet Service Provider " . $customer . " \n\nPlease note Following Link are Down: \n\nUsername / IP : " . $postdata[1] . " \n\nBranch Name: " . $postdata[2] . " \n\nBranch Address : " . $postdata[3] . " \n\nLink Down From : " . $postdata[4] . " \n\nStore is isolated can you please inform your team to restore the link ASAP. or let me know what is the issue\n\nRegards & Thanks \n\nTeam : " . $postdata[5] . " \nMobile : " . $postdata[6] . "";
          } else if ($template_name == 'internet_down_customer_alert') {
            $message = "Internet Down of " . $header . "\n\nDear Customer : " . $customer . " \n\nPlease Note your following internet link is down : \n\nUsername / IP : " . $postdata[1] . " \n\nBranch Name: " . $postdata[2] . " \n\nBranch Address : " . $postdata[3] . " \n\nLink Down From : " . $postdata[4] . "\n\nWe are working on the above link. As soon as we have some updates, we will update you immediately. \n\nRegards & Thanks \n\nTeam : " . $postdata[5] . "\nMobile : " . $postdata[6] . "";
          } else if ($template_name == 'internet_link_working_alert') {
            $message = "Internet Now Working of " . $header . "\n\nDear Internet Service Provider " . $customer . "\n\nPlease note Now Your Internet Link is Working: \n\nUsername / IP : " . $postdata[1] . " \n\nBranch Name: " . $postdata[2] . " \n\nBranch Address : " . $postdata[3] . " \n\nLink UP From : " . $postdata[4] . "\n\nRegards & Thanks \n\nTeam : " . $postdata[5] . " \nMobile : " . $postdata[6] . "";
          } else if ($template_name == 'internet_working_to_customer_alert') {
            $message = "Internet Now working of " . $header . "\n\nDear Customer : " . $customer . " \n\nPlease Note now your internet link working fine :\n\nUsername / IP : " . $postdata[1] . " \n\nBranch Name: " . $postdata[2] . "\n\nBranch Address : " . $postdata[3] . " \n\nLink Working From : " . $postdata[4] . " \n\nRegards & Thanks \n\nTeam : " . $postdata[5] . " \nMobile : " . $postdata[6] . "";
          }

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://otp.bighubitservices.com/api/create-message',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array(
            'appkey' => $whatsapp_access_token,
            'authkey' => $whatsapp_number_id,
            'to' => $country_code . $mobile,
            'message' => $message,
            'sandbox' => 'false'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $i++;
        }
    }

    public function exec_flap($ip = ""){
        $host = "43.255.165.82";
        $port = 6666;
        $timeout = 10;
            $start = microtime(true);
            // fsockopen prints a bunch of errors if a host is unreachable. Hide those
            // irrelevant errors and deal with the results instead.
            $fp = @fsockopen($host, $port, $errno, $errstr, $timeout);
            if(!$fp) {
                $latency = false;
            }
            else {
                $latency = microtime(true) - $start;
                $latency = round($latency * 1000, 4);
            }
            echo  $latency;


    }

    public function exec_ping($ip = "")
    {
        // Execute the ping command
        exec("ping -c 4 -W 25 $ip", $ping_output, $return_var);

        echo "<pre>";
        print_r($ping_output);
        echo "</pre>";
        exit();

        // Check if the ping command executed successfully
        if ($return_var == 0)
        {
            // Loop through the returned lines from the output
            foreach ($ping_output as $line)
            {
                echo $line . "<br>";
            }
        }
        else
        {
            echo "Ping command failed";
        }
    }


    public function vars($monitor, $check) {
        /* Assuming, based on the check interval */
        $uptime_seconds = $check['is_ok'] ? $monitor->uptime_seconds + 60 : $monitor->uptime_seconds;
        $downtime_seconds = !$check['is_ok'] ? $monitor->downtime_seconds + 60 : $monitor->downtime_seconds;

        /* Recalculate uptime and downtime */
        $uptime = $uptime_seconds > 0 ? $uptime_seconds / ($uptime_seconds + $downtime_seconds) * 100 : 0;
        $downtime = 100 - $uptime;

        $total_ok_checks = $check['is_ok'] ? $monitor->total_ok_checks + 1 : $monitor->total_ok_checks;
        $total_not_ok_checks = !$check['is_ok'] ? $monitor->total_not_ok_checks + 1 : $monitor->total_not_ok_checks;
        $last_check_datetime = date("Y-m-d H:i:s");
        $next_check_datetime = (new \DateTime())->modify('+' . (60 ?? 3600) . ' seconds')->format('Y-m-d H:i:s');
        $last_ok_datetime = $check['is_ok'] ? date("Y-m-d H:i:s") : $monitor->last_ok_datetime;
        $last_not_ok_datetime = !$check['is_ok'] ? date("Y-m-d H:i:s") : $monitor->last_not_ok_datetime;
        $average_response_time = $check['is_ok'] ? ($monitor->average_response_time + $check['response_time']) / ($monitor->total_ok_checks == 0 ? 1 : 2) : $monitor->average_response_time;

        /* Does the monitor have history */
        if($monitor->last_check_datetime) {
            $main_ok_datetime = !$monitor->is_ok && $check['is_ok'] ? date("Y-m-d H:i:s") : $monitor->main_ok_datetime;
            $main_not_ok_datetime = $monitor->is_ok && !$check['is_ok'] ? date("Y-m-d H:i:s") : $monitor->main_not_ok_datetime;
        } else {
            $main_ok_datetime = $check['is_ok'] ? date("Y-m-d H:i:s") : null;
            $main_not_ok_datetime = !$check['is_ok'] ? date("Y-m-d H:i:s") : null;
        }

        return [
            'uptime_seconds' => $uptime_seconds,
            'downtime_seconds' => $downtime_seconds,
            'uptime' => $uptime,
            'downtime' => $downtime,
            'total_ok_checks' => $total_ok_checks,
            'total_not_ok_checks' => $total_not_ok_checks,
            'last_check_datetime' => $last_check_datetime,
            'next_check_datetime' => $next_check_datetime,
            'main_ok_datetime' => $main_ok_datetime,
            'last_ok_datetime' => $last_ok_datetime,
            'main_not_ok_datetime' => $main_not_ok_datetime,
            'last_not_ok_datetime' => $last_not_ok_datetime,
            'average_response_time' => $average_response_time,
        ];
    }
      // -----------------forget password------------------------------//

      public function forget_list(){
        return view('forget_password');
    }

    public function forget_action(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
         ]);
         $token = Str::random(64);

         DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at'=> Carbon::now()
         ]);

         Mail::send('emails/mailforget',['token' => $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
         });
         return redirect()->back()->with('message', 'we have send reset message to your email');
        }

        public function showresetpasswordform($token){
            return view('new_password', ['token'=> $token]);
        }

    public function updateresetpassword(Request $request){
        $request->validate([
            'email' => 'required',
            'password'=>'required',
            'conform_password' =>'required',
        ]);
        $updatepassword = DB::table('password_reset_tokens')
        ->where([
           'email' => $request->email,
           'token' => $request->token,

        ])->first();
        if($updatepassword){
            return back()->withInput()->with('error', 'reset link has expired!');
        }
        $user = User::where('email', $request->email)
        ->update(['password'=> Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=>$request->email])->delete();

        return redirect('login')->with('success', 'your password has changed');
    }

}


