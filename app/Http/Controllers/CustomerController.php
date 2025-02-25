<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ISP;
use App\Models\ISPMember;
use App\Models\Agent;
use App\Models\AgentMember;
use App\Models\Customer;
use App\Models\CustomerMember;
use Illuminate\Support\Str;
use App\Models\Member;
use App\Models\NMS;
use App\Models\ServerTime;
use App\Models\Incident;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller {

    function  __construct(){
        date_default_timezone_set('Asia/Kolkata');
        }

    public function index() {
        $total_nms = NMS::where('member_id',auth()->user()->id)->count();
        $total_up_links = NMS::where('status', 1)->where('member_id',auth()->user()->id)->count();
        $total_down_links = NMS::where('status', 0)->where('member_id',auth()->user()->id)->count();
        $recent_down_links = NMS::where('status', 0)->where('member_id',auth()->user()->id)->orderBy('updated_at', 'desc')->paginate(2);
        $recent_up_links = NMS::where('status', 1)->where('member_id',auth()->user()->id)->orderBy('updated_at', 'desc')->paginate(2);
        return view('customer.home.index',
        ['total_nms'=>$total_nms,
        'total_up_links'=>$total_up_links,
        'total_down_links'=>$total_down_links,
        'recent_down_links'=>$recent_down_links,
        'recent_up_links'=>$recent_up_links,
        ]);
    }

    public function list_nms_downlinks(){
        $nms_list = NMS::where('member_id', auth()->user()->id)->where('status', 0)->paginate(10);
        return view('customer.downlinks',['nms_list'=>$nms_list]);
    }

    public function list_nms(){
        $nms_list = NMS::where('member_id', auth()->user()->id)->paginate(10);
        return view('customer.nms.list',['nms_list'=>$nms_list]);
    }

    public function nms_view($id){
        $nms =  NMS::where('id', $id)->first();
        return view('customer.nms.view',['nms' => $nms]);
    }
    public function nms_logs(Request $request, $id){
        $end_date = date("Y-m-d H:i:s");
        $start_date = date("Y-m-d H:i:s", strtotime('-12 hours'));

        $data['start_date'] ='';
        $data['end_date'] ='';
        if(isset($request->start_date) && isset($request->end_date) && !empty($request->start_date) && !empty($request->end_date)){
            $start_date = date("Y-m-d 00:00:00",strtotime($request->start_date));
            $end_date = date("Y-m-d 23:59:59",strtotime($request->end_date));
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
        }
        $nms = NMS::where('id',$id)->first();
        $results = ServerTime::where('nms_id', $id)->whereBetween('date', [$start_date, $end_date])->get()->toArray();

        $xValues = [];
        $yValues = [];
        $barColors = [];
        foreach($results as $row)
        {
            $xValues[] = $row["date"];

            if($row["status"] == 0)
            {
                $barColors[] = "red";
                $yValues[] = "50";
            }else{
                $yValues[] = $row["latency"];
                $barColors[] = "green";
            }
        }
        $data['record'] =  NMS::where('id',$id)->first()->toArray();
        $data['xValues'] = json_encode($xValues);
        $data['yValues'] = json_encode($yValues);
        $data['barColors'] = json_encode($barColors);

        $nms->last_check_datetime = $this->get_elapsed_time($nms->last_check_datetime);
        $nms->main_ok_datetime = $this->get_elapsed_time($nms->main_ok_datetime);
        $data['nms'] = $nms;

        $data['last_five_records'] = ServerTime::where('nms_id',$id)->orderBy('id', 'desc')->take(5)->get();
        $data['incident_records'] = Incident::where('nms_id',$id)->orderBy('id', 'desc')->take(10)->get();

        return view('customer.nms.logs',['data' => $data, 'nms'=>$nms]);
    }

    public function edit_member($id){


        $user =  User::where('id', $id)->first();
        return view('customer.member.edit',['user' => $user]);
    }

    public function member_update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'company' => 'required',
            'router_limit' => 'required',
            'sms_whatsapp' => '',
            'whatsapp_type' => '',
            'sms_type'        => '',
            'whatsapp_auth_key' => '',
            'whatsapp_app_key' => '',
            'sms_auth_key'    => '',
            'sms_sender_id' => '',
            'retry' => '',
            'timeout' => '',
            'country_code' => '',
            'mail_username' => '',
            'mail_password' => '',
            'mail_host'    => '',
            'mail_port' => '',
        ]);
        if(!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $request->record_id)->update($data);
        Alert::success('Success', 'Record updated!');
        return redirect()->back();
    }

    public static function get_elapsed_time($date, $end_date = null, $timings_to_display = 3) {

        $end_date = $end_date ? (new \DateTime($end_date))->getTimestamp() : time();

        $estimate_time = $end_date - (new \DateTime($date))->getTimestamp();

        if($estimate_time < 1) {
            return 'Now';
        }

        $condition = [
            12 * 30 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        ];

        $result = '';
        $counter = 1;

        foreach($condition as $seconds => $string) {
            if($counter > $timings_to_display) break;

            $d = $estimate_time / $seconds;

            if($d >= 1) {
                $r = floor($d);

                /* Determine the language string needed */
                $language_string_time = $r > 1 ?  $string . 's' : $string;

                /* Append it to the result */
                $result .= ' ' . $r . ' ' . $language_string_time;

                $estimate_time -= $r * $seconds;

                $counter++;
            }
        }

        return $result;
    }

    public function nms_add(){
        $data     = NMS::get();

        $isp      = ISP::get();
        $customer = Customer::get();
        $agent = Agent::get();

        return view('customer.nms.add',['data'=>$data, 'isp'=>$isp, 'customer'=>$customer, 'agent'=>$agent]);
    }


    public function nms_create(Request $request){
        $data = $request->validate([
            'ip_address' => 'required',
            'port'        => '',
            'unique_id' => Str::random(8),

        ]);


        $nms = NMS::where('member_id', auth()->user()->id)->first();
        $data['member_id'] = auth()->user()->id;
        $data['isp_id'] = $nms->isp_id;
        $data['customer_id'] = $nms->customer_id;
        $data['isp_members_ids'] = $nms->isp_members_ids;
        $data['isp_members_names'] = $nms->isp_members_names;
        $data['agent_members_ids'] = $nms->agent_members_ids;
        $data['agent_members_names'] = $nms->agent_members_names;
        $data['customer_members_ids'] = $nms->customer_members_ids;
        $data['customer_members_names'] = $nms->customer_members_names;
        $data['agent_id'] = $nms->agent_id;

        if($request->hindi_english){
            $data['hindi_english'] = 1;
        }else{
            $data['hindi_english'] = 0;
        }

        if($request->customer_alert){
            $data['customer_alert'] = 1;
        }else{
            $data['customer_alert'] = 0;
        }

        if($request->agent_alert){
            $data['agent_alert'] = 1;
        }else{
            $data['agent_alert'] = 0;
        }

        if($request->isp_alert){
            $data['isp_alert'] = 1;
        }else{
            $data['isp_alert'] = 0;
        }
        if($request->whatsapp_message){
            $data['whatsapp_message'] = 1;
        }else{
            $data['whatsapp_message'] = 0;
        }
        if($request->mail_alert){
            $data['mail_alert'] = 1;
        }else{
            $data['mail_alert'] = 0;
        }

        $result = NMS::create($data);
        Alert::success('Success', 'Record inserted!');
        return redirect()->back();
    }

}



