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
   <h1 class="page-title">Manage Branch</h1>
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Manage Branch</li>
   </ol>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 OPEN -->
<div class="row">
   <div class="col-xl-12 col-md-12">
      <div class="card cart">
         <div class="card-header">
            <h3 class="card-title">Branch Edit</h3>
         </div>
         <form action="{{route('admin.branch.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label>Branch Name</label>
                    <input type="text" name="branch_name" value="{{$nms->branch_name}}" class="form-control" placeholder="Branch Name" required/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="{{$nms->address}}" class="form-control" placeholder="Address" required/>
                </div>
                <div class="form-group">
                    <label>IP</label>
                    <input type="text" name="ip" value="{{$nms->ip}}" class="form-control" placeholder="I.P." required/>
                </div>
                <div class="form-group">
                    <label>Port</label>
                    <input type="number" name="port" value="{{$nms->port}}" class="form-control" placeholder="port" required/>
                </div>

               <hr/>

               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">ISP</label>
                     <div class="col-md-6">
                        <select name="isp_id" required class="form-control" id="select_isp">
                        <option value="">Select Option</option>
                           @foreach($isp as $record)
                           <option value="{{$record->id}}" {{ $record->id == $nms->id ? 'selected' : ''  }}>{{$record->name}}</option>
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
                         <select class="form-control select2" id="isp_members_ids" name="isp_members_ids[]" multiple="true">
                         </select>
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">OPERATOR</label>
                     <div class="col-md-6">
                        <select name="customer_id" required class="form-control" id="select_customer">
                        <option value="">Select Option</option>
                           @foreach($customer as $result)
                           <option  value="{{$result->id}}" {{ $result->id == $nms->id ? 'selected' : ''  }}>{{$result->name}},{{$result->branch_name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Operator Members Names</label>
                     <div class="col-md-6">
                        <input type="text" readonly name="customer_members_names" id="customer_members_names"
                        value="" class="form-control"/>
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
                           <option  value="{{$result->id}}" {{ $result->id == $nms->id ? 'selected' : ''  }}>{{$result->name}}</option>
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
                     value="" class="form-control"/>
                  </div>
               </div>
            </div>
            <hr/>


               <div class="mb-0 mt-4 row justify-content-end">
                  <div class="col-md-3">
                    <input type="hidden" name="agent_members_ids" id="agent_members_ids" value="">
                     <input type="hidden" name="customer_members_ids" id="customer_members_ids" value="">
                     <input type="hidden" name="operator_name" id="customer_name" value="">
                     <input type="hidden" name="isp_name" id="isp_name" value="">
                     <input type="hidden" name="agent_name" id="agent_name" value="">

                     <input type="hidden" name="branch_code"  value="">
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
      //$("#select_isp").val("{{$nms->isp_name}}");
       $("#select_isp").change(function(){
         $("#isp_members_ids").html("");
           $.ajax({
               url: '/admin/ajax_user/isp/'+$(this).val(),
               type:'get',
               dataType:'JSON',
               success:function(result){
                  //  $("#isp_member_names").val();
                  //  $("#isp_members_ids").val(result.isp_ids);
                  $("#isp_name").val(result.isp_name);
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
    //$("#select_agent").val("{{$nms->agent_name}}");
       $("#select_agent").change(function(){
           $.ajax({
               url: '/admin/ajax_user/agent/'+$(this).val(),
               type:'get',
               dataType:'JSON',
               success:function(result){


                   $("#agent_members_names").val(result.agent_names);
                   $("#agent_members_ids").val(result.agent_ids);
                   $("#agent_name").val(result.agent_name);
               }
           });
       });
   });

   $(document).ready(function(){
    //$("#select_customer").val("{{$nms->operator_name}}");
       $("#select_customer").change(function(){
           $.ajax({
               url: '/admin/ajax_user/operator/'+$(this).val(),
               type:'get',
               dataType:'JSON',
               success:function(result){

                $("#customer_members_names").val(result.operator_member_names);
                   //$("#customer_members_ids").val(result.customer_ids);
                   $("#customer_name").val(result.operator_name);
                //    $("#customer_members_names").val(result.customer_names);
                //    $("#customer_members_ids").val(result.customer_ids);
               }
           });
       });
   });

   $("#select_customer").append($("#sortbyco option:gt(0)").sort(function (a, b) {
    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
}));

$("#select_agent").append($("#sortbyco option:gt(0)").sort(function (a, b) {
    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
}));

$("#select_isp").append($("#sortbyco option:gt(0)").sort(function (a, b) {
    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
}));
</script>
<!-- Handle Counter js -->
@vite('resources/assets/js/handlecounter.js')
@endsection
