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
use App\Models\SystemSetting;
use App\Models\Branch;

use App\Models\ServerTime;
use App\Models\Incident;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
// use Excel;
use App\Exports\NmsExport;
use App\Imports\NmsImport;
use App\Exports\BranchExport;
use App\Imports\BranchImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\UserExport;

use Carbon\Carbon;


class AdminController extends Controller {

   function  __construct(){
    date_default_timezone_set('Asia/Kolkata');
    }

    public function index() {
        $total_nms = NMS::count();
        $total_up_links = NMS::where('status', 1)->count();
        $total_down_links = NMS::where('status', 0)->count();
        $recent_down_links = NMS::where('status', 0)->orderBy('updated_at', 'desc')->take(5)->get();
        $recent_up_links = NMS::where('status', 1) ->orderBy('updated_at', 'desc')->paginate(2);
        $max_latency = ServerTime::max('latency');
        return view('admin.home.index',
        ['total_nms'=>$total_nms,
        'total_up_links'=>$total_up_links,
        'total_down_links'=>$total_down_links,
        'recent_down_links'=>$recent_down_links,
        'recent_up_links'=>$recent_up_links,
        'max_latency'=>$max_latency
        ]);
    }

    public function list_isp() {
        $list = ISP::where('operator', 0)->paginate(10);

        return view('admin.isp.list',['list'=>$list]);
    }

    public function create_isp(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => '',
            'operator' => ''
        ]);

        $result = ISP::create($data);
        Alert::success('Success', 'Record inserted!');
        return redirect('/admin/isp');
    }

    public function delete_isp(Request $request, $id)
    {
        ISP::where('id',$id)->delete();
        ISPMember::where('isp_id', $id)->delete();
        Alert::success('Success', 'Record deleted!');
        return redirect('/admin/isp');
    }

    public function update_isp(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => ''
        ]);

        ISP::where('id', $request->record_id)->update($data);
         Alert::success('Success', 'Record updated!');
        return redirect('/admin/isp');
    }

    // ----------------------------------isp Member List----------------------------------------

    public function isp_member_list(Request $request , $id) {

        $member_list = ISPMember::where('isp_id',$id)->paginate(10);
        return view('admin.isp.member_list',['member_list'=>$member_list,'isp_id' =>$id]);
    }

    public function isp_member_create(Request $request){
        $create = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'operator' => '',
            'isp_id' => '',
        ]);

        if($request->alert){
            $create['alert'] = 1;
        }else{
            $create['alert'] = 0;
        }

        $result = ISPMember::create($create);
        Alert::success('Success', 'Record inserted!');
        return redirect()->back();
    }

    public function isp_member_update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'operator' => '',
        ]);
        if($request->alert){
            $data['alert'] = 1;
        }else{
            $data['alert'] = 0;
        }

        ISPMember::where('id', $request->record_id)->update($data);
         Alert::success('Success', 'Record updated!');
        return redirect()->back();
    }

    public function isp_member_delete(Request $request, $id)
    {

        ISPMember::where('id',$id)->delete();
        Alert::success('Success', 'Record deleted!');
        return redirect()->back();

    }

    //start operator
    public function list_operator() {
        $list = ISP::where('operator', 1)->paginate(10);

        return view('admin.isp.list',['list'=>$list]);
    }

    public function create_operator(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => '',
            'operator' => 'required'
        ]);


        //dd($request->all());


        $result = ISP::create($data);
        Alert::success('Success', 'Record inserted!');
        return redirect('/admin/operator');
    }

    public function delete_operator(Request $request, $id)
    {
        ISP::where('id',$id)->delete();
        ISPMember::where('isp_id', $id)->delete();
        Alert::success('Success', 'Record deleted!');
        return redirect('/admin/isp');
    }

    public function update_operator(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => '',
            'operator' => 1
        ]);

        ISP::where('id', $request->record_id)->update($data);
         Alert::success('Success', 'Record updated!');
        return redirect('/admin/isp');
    }



    // ----------------------------------operator Member List----------------------------------------

    public function operator_member_list(Request $request , $id) {

        $member_list = ISPMember::where('isp_id',$id)->paginate(10);
        return view('admin.isp.member_list',['member_list'=>$member_list,'isp_id' =>$id]);
    }

    public function operator_member_create(Request $request){
        $create = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'operator' => '',
            'isp_id' => '',
        ]);

        if($request->alert){
            $create['alert'] = 1;
        }else{
            $create['alert'] = 0;
        }

        $result = ISPMember::create($create);
        Alert::success('Success', 'Record inserted!');
        return redirect()->back();
    }

    public function operator_member_update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'operator' => '',
        ]);
        if($request->alert){
            $data['alert'] = 1;
        }else{
            $data['alert'] = 0;
        }

        ISPMember::where('id', $request->record_id)->update($data);
         Alert::success('Success', 'Record updated!');
        return redirect()->back();
    }

    public function operator_member_delete(Request $request, $id)
    {

        ISPMember::where('id',$id)->delete();
        Alert::success('Success', 'Record deleted!');
        return redirect()->back();

    }

     // ----------------------------------branch Starting----------------------------------------
     public function list_branch(Request $request) {

        $agent_list = DB::table('branch_master')->paginate(10);
        $isp      = ISP::get();
        $customer = Customer::get();
        $agent = Agent::get();
        return view('admin.branch.list',['agent_list'=>$agent_list, 'isp'=>$isp, 'customer'=>$customer, 'agent'=>$agent]);
    }

    public function branch_add(){
        //$data     = NMS::get();
        //$member = User::whereIn('role_id',[2])->get();
        $isp      = ISP::get();
        $customer = ISP::where('operator',1)->get();
        $agent = Agent::get();

        return view('admin.branch.add',[ 'isp'=>$isp, 'customer'=>$customer, 'agent'=>$agent]);
    }

    public function create_branch(Request $request){
        $agent_list = $request->validate([
            'branch_name' => 'required',
            'address' => 'required',
            'ip' => 'required',
            'port' => '',
             'operator_name' => '',
             'isp_name' => '',
             'agent_name' => '',
             'branch_code' => ''

        ]);

        // if($code = DB::table('branch_master')->orderBy('id', 'DESC')->first()->id){
        //     $code;
        // }
        // else{
        //     $code = 1;
        // }
        $code1 = rand(0,100);
        $code2 = rand(0,10);
        $code = $code1 + $code2;
        $agent_list['branch_code'] = $code+1;
        $result = Branch::create($agent_list);

        Alert::success('Success', 'Record inserted!');

        return redirect('/admin/branch');
    }

    public function edit_branch($id){

        $isp      = ISP::get();
        $customer = ISP::where('operator',1)->get();
        $agent = Agent::get();

        $nms = DB::table('branch_master')->where('id', $id)->first();
        return view('admin.branch.edit',[ 'isp'=>$isp, 'customer'=>$customer, 'agent'=>$agent, 'nms' => $nms]);
    }

    public function update_branch(Request $request)
    {
        $agent_list = $request->validate([
            'branch_name' => 'required',
            'address' => 'required',
            'ip' => 'required',
            'port' => '',
             'operator_name' => '',
             'isp_name' => '',
             'agent_name' => '',
             'branch_code' => ''

        ]);

        // if($code = DB::table('branch_master')->orderBy('id', 'DESC')->first()->id){
        //     $code;
        // }
        // else{
        //     $code = 1;
        // }
        $code1 = rand(0,100);
        $code2 = rand(0,10);
        $code = $code1 + $code2;
        $agent_list['branch_code'] = $code+1;
        DB::table('branch_master')->where('id', $request->record_id)->update($agent_list);
         Alert::success('Success', 'Record updated!');
        return redirect('/admin/branch');
    }

    public function delete_branch(Request $request, $id)
    {
        DB::table('branch_master')->where('id',$id)->delete();
        //ISPMember::where('isp_id', $id)->delete();
        Alert::success('Success', 'Record deleted!');
        return redirect('/admin/branch');
    }

    public function exportbranchData(){
        return Excel::download(new BranchExport, 'branch.xlsx');
    }

    public function importbranchData(){
        Excel::import(new BranchImport,request()->file('file'));



        return back();
    }



// ------------------------------Agent Starting-------------------------------------
    public function list_agent() {
        $agent_list = Agent::paginate(10);
        return view('admin.agent.list',['agent_list'=>$agent_list]);
    }


    public function create_agent(Request $request){
        $agent_list = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => ''
        ]);

        $result = Agent::create($agent_list);
        Alert::success('Success', 'Record inserted!');
        return redirect('/admin/agent');
    }

    public function update_agent(Request $request)
    {
        $agent_list = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => '',
        ]);

        Agent::where('id', $request->record_id)->update($agent_list);
         Alert::success('Success', 'Record updated!');
        return redirect('admin/agent');
    }

    public function delete_agent(Request $request, $id)
    {
        Agent::where('id',$id)->delete();
        Alert::success('Success', 'Record deleted!');
        return redirect('/admin/agent');
    }

    public function agent_member_list(Request $request , $id) {

        $member_list = AgentMember::where('agent_id',$id)->paginate(10);
        return view('admin.agent.member_list',['member_list'=>$member_list,'agent_id' =>$id]);
    }

    public function agent_member_create(Request $request){
        $create = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'agent_id' => '',
        ]);

        if($request->alert){
            $create['alert'] = 1;
        }else{
            $create['alert'] = 0;
        }

        $result = AgentMember::create($create);
        Alert::success('Success', 'Record inserted!');
        return redirect()->back();
    }

    public function agent_member_update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',

        ]);
        if($request->alert){
            $data['alert'] = 1;
        }else{
            $data['alert'] = 0;
        }


        AgentMember::where('id', $request->record_id)->update($data);
         Alert::success('Success', 'Record updated!');
        return redirect()->back();
    }

    public function agent_member_delete(Request $request, $id)
    {

        AgentMember::where('id',$id)->delete();
        Alert::success('Success', 'Record deleted!');
        return redirect()->back();

    }

// -------------------------------Customer Starting----------------------------

    public function list_customer() {
        $customer_list = Customer::paginate(10);
        return view('admin.customer.list',['customer_list'=>$customer_list]);
    }

    public function create_customer(Request $request){
        $customer_list = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'branch_name' => 'required'
        ]);

        $result = Customer::create($customer_list);
        Alert::success('Success', 'Record inserted!');
        return redirect('/admin/customer');
    }

    public function update_customer(Request $request)
    {
        $customer_list = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'branch_name' => 'required'
        ]);

        Customer::where('id', $request->record_id)->update($customer_list);
         Alert::success('Success', 'Record updated!');
        return redirect('admin/customer');
    }

    public function delete_customer(Request $request, $id)
    {
        Customer::where('id',$id)->delete();

        Alert::success('Success', 'Record deleted!');
        return redirect('/admin/customer');
    }
// ---------------------------customer member----------------------------
    public function customer_member_list(Request $request, $id){
        $member_list = CustomerMember::where('customer_id',$id)->paginate(10);
        return view('admin.customer.member_list',['member_list'=>$member_list,'customer_id'=>$id]);
    }


    public function customer_member_create(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'customer_id'=>'',
        ]);

        if($request->alert){
            $data['alert'] = 1;
        }else{
            $data['alert'] = 0;
        }
        $result = CustomerMember::create($data);
        ALert::success('Success','Record inserted Successfully');
        return redirect()->back();
    }
    public function customer_member_update(Request $request){
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'mobile'=> 'required',

        ]);
        if($request->alert){
        $data['alert'] = 1;
    }else{
          $data['alert'] = 0;
        }
        $result = CustomerMember::where('id',$request->record_id)->update($data);
        Alert::success('Success',"Record Updated");
        return redirect()->back();
}

public function customer_member_delete(Request $request, $id)
{

    CustomerMember::where('id',$id)->delete();
    Alert::success('Success', 'Record deleted!');
    return redirect()->back();

}

    // -------------------------------- member list-------------------------
    public function member_list(){
        $list_member = User::where('role_id',2)->paginate(10);
        return view('admin.member.list',['list_member'=>$list_member]);
    }

    public function member_create(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'company' => 'required',
            'router_limit' => 'required',
            'password' => 'required',
            'sms_whatsapp' => '',
            'whatsapp_type' => '',
            'sms_type'        => '',
            'whatsapp_auth_key' => '',
            'whatsapp_app_key' => '',
            'sms_auth_key'    => '',
            'sms_sender_id' => '',
            'retry' => 'required',
            'timeout' => 'required',
            'country_code' => 'required',
            'mail_username' => '',
            'mail_password' => '',
            'mail_host'    => '',
            'mail_port' => '',
        ]);
        $data['role_id'] = 2;
        $result = User::create($data);
        Alert::success('Success', 'Record inserted!');
        return redirect()->back();
    }

    public function edit_member($id){
        $data     = User::get();
        $member = User::whereIn('role_id',[2])->get();
        if(!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }

        $user =  User::where('id', $id)->first();
        return view('admin.member.edit',['data'=>$data, 'member'=>$member, 'user' => $user]);
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
    public function member_delete(Request $request, $id)
    {
        User::where('id',$id)->delete();

        Alert::success('Success', 'Record deleted!');
        return redirect()->back();

    }

// ----------------------------starting-of--NMS--------------------------
    public function list_nms(){
        $nms_list = NMS::with(['user', 'customer'])
        ->leftJoin('customer', 'nms.customer_id', '=', 'customer.id')
        ->select('nms.*', 'customer.branch_name')
        ->paginate(10);
        // echo "<pre>";
        // print($nms_list);die;
        return view('admin.nms.list',['nms_list'=>$nms_list ]);
    }


    public function nms_add(){
        $data     = NMS::get();
        $member = User::whereIn('role_id',[2])->get();
        $isp      = ISP::get();
        $customer = Customer::get();
        $agent = Agent::get();

        return view('admin.nms.add',['data'=>$data, 'member'=>$member, 'isp'=>$isp, 'customer'=>$customer, 'agent'=>$agent]);
    }

    public function ajaxUser_isp($id){
        $member_names = ISPMember::where('isp_id',$id)->get()->toArray();
        // $member_ids = ISPMember::where('isp_id',$id)->pluck('id')->toArray();
        //   $member_names = implode(',',$member_names);
        //   $member_ids = implode(',',$member_ids);
//,"isp_ids"=>$member_ids
        $isp_name = ISP::where('id',$id)->first()->name;

          echo json_encode(array("isp_names"=>$member_names , "isp_name"=>$isp_name ));

    }
    public function ajaxUser_agent($id){
        $agent_member_names = AgentMember::where('agent_id',$id)->pluck('name')->toArray();
        $agent_member_ids = AgentMember::where('agent_id',$id)->pluck('id')->toArray();
          $agent_member_names = implode(',',$agent_member_names);
          $agent_member_ids = implode(',',$agent_member_ids);
          $agent_name = Agent::where('id',$id)->first()->name;

          echo json_encode(array("agent_names"=>$agent_member_names,"agent_ids"=>$agent_member_ids , "agent_name"=>$agent_name));
    }
    public function ajaxUser_customer($id){
        $customer_member_names = CustomerMember::where('customer_id',$id)->pluck('name')->toArray();
        $customer_member_ids = CustomerMember::where('customer_id',$id)->pluck('id')->toArray();
          $customer_member_names = implode(',',$customer_member_names);
          $customer_member_ids = implode(',',$customer_member_ids);
          $customer_name = Customer::where('id',$id)->first()->name;

          echo json_encode(array("customer_names"=>$customer_member_names,"customer_ids"=>$customer_member_ids,"customer_name"=>$customer_name));
    }

    public function ajaxUser_operator($id){
        $member_names = ISPMember::where('isp_id',$id)->pluck('name')->toArray();
        // $member_ids = ISPMember::where('isp_id',$id)->pluck('id')->toArray();
        //   $member_names = implode(',',$member_names);
        //   $member_ids = implode(',',$member_ids);
//,"isp_ids"=>$member_ids
        $isp_name = ISP::where('id',$id)->first()->name;

          echo json_encode(array("operator_member_names"=>$member_names , "operator_name"=>$isp_name ));
    }

    public function nms_create(Request $request){
        $data = $request->validate([
            'member_id' => 'required',
            'isp_id' => 'required',
            'customer_id' => 'required',
            'isp_members_ids' => '',
            'isp_members_names' => '',
            'agent_members_ids' => '',
            'agent_members_names' => '',
            'customer_members_ids' => '',
            'customer_members_names' => '',
            'agent_id' => 'required',
            'ip_address' => 'required',
            'port'        => '',
            'unique_id' => Str::random(8),

        ]);

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
        if(!empty($request->isp_members_ids)){
            $data["isp_members_ids"] = implode(",", $request->isp_members_ids);
        }
        $result = NMS::create($data);
        Alert::success('Success', 'Record inserted!');
        return redirect()->back();
    }


    public function nms_delete(Request $request, $id)
    {
        NMS::where('id',$id)->delete();
        Alert::success('Success', 'Record deleted!');
        return redirect()->back();

    }

    public function edit_nms($id){
        $data     = NMS::get();
        $member = User::whereIn('role_id',[2])->get();
        $isp      = ISP::get();
        $customer = Customer::get();
        $agent = Agent::get();

        $nms =  NMS::where('id', $id)->first();
        return view('admin.nms.edit',['data'=>$data, 'member'=>$member, 'isp'=>$isp, 'customer'=>$customer, 'agent'=>$agent, 'nms' => $nms]);
    }

    public function nms_update(Request $request){
        $data = $request->validate([
            'member_id' => 'required',
            'isp_id' => 'required',
            'customer_id' => 'required',
            'agent_id' => 'required',
            'ip_address' => 'required',
            'port' => '',
            'isp_members_ids' => '',
            'isp_members_names' => '',
            'agent_members_ids' => '',
            'agent_members_names' => '',
            'customer_members_ids' => '',
            'customer_members_names' => '',
        ]);

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

        if(!empty($request->isp_members_ids)){
            $data["isp_members_ids"] = implode(",", $request->isp_members_ids);
        }

        $result = NMS::where('id', $request->record_id)->update($data);
        Alert::success('Success', 'Record updated!');
        return redirect('admin/nms');
    }

    public function nms_view($id){
            $data     = NMS::get();
            $member = User::whereIn('role_id',[2])->get();
            $isp      = ISP::get();
            $customer = Customer::get();
            $agent = Agent::get();

            $nms =  NMS::where('id', $id)->first();
            return view('admin.nms.view',['data'=>$data, 'member'=>$member, 'isp'=>$isp, 'customer'=>$customer,
            'agent'=>$agent, 'nms' => $nms]);
        }


        public function nms_logs(Request $request, $id){
            $end_date = date("Y-m-d H:i:s");
            $start_date = date("Y-m-d H:i:s", strtotime('-12 hours'));

            $data['start_date'] ='';
            $data['end_date'] ='';
            if(isset($request->start_date) && isset($request->end_date) && !empty($request->start_date) && !empty($request->end_date)){
                $start_date = date("Y-m-d 00:00:00",strtotime($request->start_date));
                $end_date = date("Y-m-d 23:59:59",strtotime($request->end_date));
                $data['start_date'] = $request->start_date;
                $data['end_date'] = $request->end_date;
            }
            $nms = NMS::where('id',$id)->first();
            $customer = Customer::where('id',$nms->customer_id)->first();
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
            $nms->last_ok_datetime = $this->get_elapsed_time($nms->last_ok_datetime);
            $data['nms'] = $nms;
            $data['customer'] = $customer;

            $data['last_five_records'] = ServerTime::where('nms_id',$id)->orderBy('id', 'desc')->take(5)->get();
            $data['incident_records'] = Incident::where('nms_id',$id)->orderBy('id', 'desc')->take(10)->get();

            return view('admin.nms.logs',$data);
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

        // --------------- Report Export -----------------------
   public function exportData(){

    return Excel::download(new NmsExport, 'nms.xlsx');
   }
   public function importData(Request $request)
   {
       $request->validate([
           'file' => 'required|mimes:xlsx,xls,csv',
       ]);

       Excel::import(new NmsImport, $request->file('file'));

       return back()->with('success', 'Data imported successfully.');
   }


   public function setting(){
    return view('admin.system_setting.index');
   }

   public function setting_add(Request $request){

        $system_setting = $request->validate([
            'retry' => 'required',
            'timeout' => 'required',
            'country_code' => 'required',

        ]);

        $result = SystemSetting::create($system_setting);
        Alert::success('Success', 'Record inserted!');
        return redirect('/admin/system_setting');
    }

    public function list_import(){

        // $agent = NMS::get();
        $member = User::whereIn('role_id',[2])->get();
        $isp      = ISP::get();
        $customer = Customer::get();
        $agent = Agent::get();
        // echo "<pre>";
        // print_r($isp_member);die;
        return view('admin.nms.import',compact('agent','member','customer','isp'));
    }


public function nms_import_create(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,csv,xls',
        'agent_id' => 'required',
        'customer_id' => 'required',
        'isp_id' => 'required',
        'member_id' => 'required',
    ]);
    $exists = false;
    try {
        DB::beginTransaction();

        $file = $request->file('file');
        $data = Excel::toArray([], $file);

        foreach ($data[0] as $index => $row) {
            if ($index === 0) continue;

            $ipAddress = isset($row[0]) ? $row[0] : null;
            $port = isset($row[1]) ? $row[1] : null;



            if ($ipAddress && $port ) {

                $exists = NMS::where('ip_address', $ipAddress)
                            ->where('port', $port)
                            ->where('member_id', $request->member_id)
                            ->where('isp_id', $request->isp_id)
                            ->where('customer_id', $request->customer_id)
                            ->where('agent_id', $request->agent_id)
                            ->exists();

                if (!$exists) {

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
                    NMS::create([
                        'member_id' => $request->member_id,
                        'agent_id' => $request->agent_id,
                        'customer_id' => $request->customer_id,
                        'isp_id' => $request->isp_id,
                        'isp_members_ids' => $request->isp_members_ids,
                        'isp_members_names' => $request->isp_members_names,
                        'agent_members_ids' => $request->agent_members_ids,
                        'agent_members_names' => $request->agent_members_names,
                        'customer_members_ids' => $request->customer_members_ids,
                        'customer_members_names' => $request->customer_members_names,
                        'whatsapp_message' => $data['whatsapp_message'],
                        'mail_alert' => $data['mail_alert'],
                        'agent_alert' => $data['agent_alert'],
                        'isp_alert' => $data['isp_alert'],
                        'customer_alert' => $data['customer_alert'],
                        'hindi_english' => $data['hindi_english'],
                        'ip_address' => $ipAddress,
                        'port' => $port,

                    ]);


                }
            }
        }
        DB::commit();
        if($exists){
            Alert::warning('No', "Data Already Exists");
        }else{
        Alert::success('Success', "Data Imported Successfully");
        }
        return redirect()->back()->with('success', 'Data imported successfully!');

    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}


}

