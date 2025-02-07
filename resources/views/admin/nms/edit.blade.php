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
            <h3 class="card-title">NMS Edit</h3>
         </div>
         <form action="{{route('admin.nms.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
               <div class=" row mb-2">
                  <label class="col-md-3 form-label" for="">MEMBER</label>
                  <div class="col-md-6">
                     <select name="member_id" required class="form-control">
                     <option value="">Select Option</option>
                        @foreach($member as $data)
                        <option  value="{{$data->id}}" {{ $data->id == $nms->member_id ? 'selected' : ''  }}>{{$data->name}}({{$data->company}}) </option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">ISP</label>
                     <div class="col-md-6">
                        <select name="isp_id" required class="form-control" id="select_isp">
                        <option value="">Select Option</option>
                           @foreach($isp as $record)
                           <option value="{{$record->id}}" {{ $record->id == $nms->isp_id ? 'selected' : ''  }}>{{$record->name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">ISP Members Names</label>
                     <div class="col-md-6">
                        <input type="hidden" name="isp_members_names" value=""/>
                        <!-- <input type="text" name="isp_members_names" id="isp_member_names" value="{{ $nms->isp_members_names }}" class="form-control"/> -->
                         <select class="form-control select2" id="isp_members_ids" name="isp_members_ids[]" multiple="true">
                         </select>
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">CUSTOMER</label>
                     <div class="col-md-6">
                        <select name="customer_id" required class="form-control" id="select_customer">
                        <option value="">Select Option</option>
                           @foreach($customer as $result)
                           <option  value="{{$result->id}}" {{ $result->id == $nms->customer_id ? 'selected' : ''  }}>{{$result->name}},{{$result->branch_name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Customer Members Names</label>
                     <div class="col-md-6">
                        <input type="text" readonly name="customer_members_names" id="customer_members_names"
                        value="{{$nms->customer_members_names}}" class="form-control"/>
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Agent</label>
                     <div class="col-md-6">
                        <select name="agent_id" required class="form-control" id="select_agent">
                        <option value="">Select Option</option>
                           @foreach($agent as $result)
                           <option  value="{{$result->id}}" {{ $result->id == $nms->agent_id ? 'selected' : ''  }}>{{$result->name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
            <hr/>
            <div class="form-group">
               <div class=" row mb-2">
                  <label class="col-md-3 form-label" for="">Agent Members Names</label>
                  <div class="col-md-6">
                     <input type="text" readonly name="agent_members_names" id="agent_members_names"
                     value="{{$nms->agent_members_names}}" class="form-control"/>
                  </div>
               </div>
            </div>
            <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Ip Address</label>
                     <div class="col-md-6 d-flex">
                        <input type="text" name="ip_address" class="form-control"  required placeholder="IP address" style="flex: 1;" value="{{$nms->ip_address}}">
                        <input type="text" name="port" class="form-control" style="width: 100px;" placeholder="port" value="{{$nms->port}}">
                    </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">WhatsApp Message</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="whatsapp_message" {{ $nms->whatsapp_message == 1 ? 'checked' : ''  }} type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Hindi/English</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="hindi_english" {{ $nms->hindi_english == 1 ? 'checked' : ''  }} type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">ISP Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="isp_alert" {{ $nms->isp_alert == 1 ? 'checked' : ''  }} type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Customer Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="customer_alert" {{ $nms->customer_alert == 1 ? 'checked' : ''  }} type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Agent Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="agent_alert" {{ $nms->agent_alert == 1 ? 'checked' : ''  }} type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Mail Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="mail_alert" {{ $nms->mail_alert == 1 ? 'checked' : ''  }} type="checkbox">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mb-0 mt-4 row justify-content-end">
                  <div class="col-md-3">
                     <!-- <input type="hidden" name="isp_members_ids" id="isp_members_ids" value="{{$nms->isp_members_ids}}"> -->
                     <input type="hidden" name="agent_members_ids" id="agent_members_ids" value="{{$nms->agent_members_ids}}">
                     <input type="hidden" name="customer_members_ids" id="customer_members_ids" value="{{$nms->customer_members_ids}}">
                     <input type="hidden" name="record_id" value="{{ $nms->id }}"/>

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

      $.ajax({
               url: '/admin/ajax_user/isp/<?php echo $nms->isp_id; ?>',
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
                  
                  var selected_ids = "<?php echo $nms->isp_members_ids;?>";

                  var str_array = selected_ids.split(',');
                  var new_array = [];
                     for(var n = 0; n < str_array.length; n++) {
                        new_array.push(str_array[n]);
                                      
                     }
                     $("#isp_members_ids").val(new_array);
               }
           });

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
