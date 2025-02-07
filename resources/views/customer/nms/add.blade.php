@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
   .d-flex {
    display: flex;
    align-items: center; /* Aligns items vertically */
}

.d-flex .form-control {
    margin-right: 10px; /* Space between inputs */
}
</style>
<!-- PAGE-HEADER -->
<div class="page-header">
   <h1 class="page-title">Manage NMS</h1>
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Manage NMS</li>
   </ol>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 OPEN -->
<div class="row">
   <div class="col-xl-12 col-md-12">
      <div class="card cart">
         <div class="card-header">
            <h3 class="card-title">NMS ADD</h3>
         </div>
         <form action="{{route('customer.nms.create')}}" method="POST">
            @csrf
            <div class="card-body">
            <!-- member_id -->
               
             
             
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Ip Address</label>
                     <div class="col-md-6 d-flex">
                        <input type="text" name="ip_address" class="form-control" required placeholder="IP address" style="flex: 1;">
                        <input type="text" name="port" class="form-control" style="width: 100px;" placeholder="port">
                    </div>                  
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">WhatsApp Message</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="whatsapp_message" type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Hindi/English</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="hindi_english" type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">ISP Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="isp_alert" type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Customer Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="customer_alert" type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Agent Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="agent_alert" type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Mail Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="mail_alert" type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <hr/>
             
               
               <div class="mb-0 mt-4 row justify-content-end">
                  <div class="col-md-3">
                     <!-- <input type="hidden" name="isp_members_ids" id="isp_members_ids" value=""> -->
                     <input type="hidden" name="agent_members_ids" id="agent_members_ids" value="">
                     <input type="hidden" name="customer_members_ids" id="customer_members_ids" value="">


                     <button type="submit" name="submit" class="btn btn-success" >Submit</button>
                    
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- The Modal -->
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
   $(document).ready(function(){

      $('#isp_members_ids').select2();

        $("#select_isp").change(function(){
         $("#isp_members_ids").html("");
           $.ajax({
               url: '/admin/ajax_user/isp/'+$(this).val(),
               type:'get',
               dataType:'JSON',
               success:function(result){
                  //  $("#isp_member_names").val();
                  //  $("#isp_members_ids").val(result.isp_ids);

                  var txt = "";
                  for(var i=0;i<result.isp_names.length;i++){
                     txt += "<option value='"+result.isp_names[i]["id"]+"'>"+result.isp_names[i]["name"]+"</option>";
                  }
                  $("#isp_members_ids").html(txt);
      
               }
           });
       });
   });
   $(document).ready(function(){
       $("#select_agent").change(function(){
           $.ajax({
               url: '/admin/ajax_user/agent/'+$(this).val(),
               type:'get',
               dataType:'JSON',
               success:function(result){
                 

                   $("#agent_members_names").val(result.agent_names);
                   $("#agent_members_ids").val(result.agent_ids);
               }
           });
       });
   });
   $(document).ready(function(){
       $("#select_customer").change(function(){
           $.ajax({
               url: '/admin/ajax_user/customer/'+$(this).val(),
               type:'get',
               dataType:'JSON',
               success:function(result){
                 

                   $("#customer_members_names").val(result.customer_names);
                   $("#customer_members_ids").val(result.customer_ids);
               }
           });
       });
   });
</script>
<!-- Handle Counter js -->
@vite('resources/assets/js/handlecounter.js')
@endsection
