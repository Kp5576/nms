@extends('layouts.master')
@section('styles')
@endsection
@section('content')

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
   <h1 class="page-title">Manage Import NMS</h1>
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Manage Import NMS</li>
   </ol>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 OPEN -->
<div class="row">
   <div class="col-xl-12 col-md-12">
      <div class="card cart">
         <div class="card-header">
            <h3 class="card-title">Import NMS</h3>
         </div>
         <form action="{{route('admin.nms.import.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
               <div class=" row mb-2">
                  <label class="col-md-3 form-label" for="">MEMBER</label>
                  <div class="col-md-6">
                     <select name="member_id" required class="form-control">
                        <option value="">Select Option</option>
                        @foreach($member as $data)
                            <option  value="{{$data->id}}">{{$data->name}}({{$data->company}}) </option>
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
                           <option value="{{$record->id}}">{{$record->name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">ISP Members Name</label>
                     <div class="col-md-6">
                        <input type="text" readonly name="isp_members_names" id="isp_members_names" class="form-control"/>
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">CUSTOMER</label>
                     <div class="col-md-6">
                        <select name="customer_id" required class="form-control" id="select_customer" >
                            <option value="">Select Option</option>
                           @foreach($customer as $result)
                           <option  value="{{$result->id}}">{{$result->name}},{{$result->branch_name}}</option>
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
                        <input type="text" readonly name="customer_members_names" id="customer_members_names" class="form-control"/>
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
                           <option  value="{{$result->id}}">{{$result->name}}</option>
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
                        <input type="text" readonly name="agent_members_names" id="agent_members_names" class="form-control"/>
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">File</label>
                     <div class="col-md-6 d-flex">
                        <input type="file" name="file" class="form-control" required placeholder=" ">
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
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for=""></label>
               <div class="col-md-6">
                  <a href="{{ url('public/build/assets/sample_file_product.xlsx') }}" style="width:100%"
                     class="btn btn-secondary btn-full">Download Sample File</a>
               </div>
            </div>
         </div>
               <div class="mb-0 mt-4 row justify-content-end">
                  <div class="col-md-3">
                     <input type="hidden" name="isp_members_ids" id="isp_members_ids" value="">
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
<script>
   $(document).ready(function(){
       $("#select_isp").change(function(){
           $.ajax({
               url: '/admin/ajax_user/isp/'+$(this).val(),
               type:'get',
               dataType:'JSON',
               success:function(result){
                   $("#isp_members_names").val(result.isp_names);
                   $("#isp_members_ids").val(result.isp_ids);

      
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

{{-- @extends('layouts.master')
@section('styles')
@endsection
@section('content')
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
            <h3 class="card-title">NMS Import</h3>
         </div>
         <form action="{{route('admin.nms.import.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --
            <div class="card-body">
              
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Member</label>
                     <div class="col-md-6">
                        <select name="member_id" required class="form-control" id="member_id">
                        <option value="">Select Option</option>
                           @foreach($member as $result)
                           <option value="">{{$result->name}}({{$result->company}})</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                <div class=" row mb-2">
                   <label class="col-md-3 form-label" for="">Agent</label>
                   <div class="col-md-6">
                      <select name="agent_id" required class="form-control" id="select_agent">
                      <option value="">Select Option</option>
                         @foreach($agent as $result)
                         <option value="{{$result->id}}">{{$result->name}}</option>
                         @endforeach
                      </select>
                      <input type="text" readonly name="agent_members_names" id="agent_members_names" class="form-control"/>
                   </div>
                </div>
             </div>
             <div class="form-group">
                <div class=" row mb-2">
                   <label class="col-md-3 form-label" for="">Customer</label>
                   <div class="col-md-6">
                      <select name="customer_id" required class="form-control" id="select_customer">
                      <option value="">Select Option</option>
                         @foreach($customer as $result)
                         <option value="{{$result->id}}">{{$result->name}}</option>
                         @endforeach
                      </select>
                      <input type="hidden" readonly name="customer_members_names" id="customer_members_names" class="form-control"/>
                   </div>
                </div>
             </div>
             <div class="form-group">
                <div class=" row mb-2">
                   <label class="col-md-3 form-label" for="">ISP</label>
                   <div class="col-md-6">
                     <select name="isp_id" required class="form-control" id="select_isp">
                        <option value="">Select Option</option>
                       @foreach($isp as $record)
                       <option value="{{$record->id}}">{{$record->name}}</option>
                       @endforeach
                    </select>
                      <input type="hidden" readonly name="isp_members_names" id="isp_members_names" class="form-control"/>
                      {{-- <input type="text" name="" value="{{$isp_member->id}}"> --}
                   </div>
                </div>
             </div>
            <hr/>
            <div class="form-group">
               <div class=" row mb-2">
                  <label class="col-md-3 form-label" for="">File</label>
                  <div class="col-md-6">
                     <input type="file" name="file">
                  </div>
               </div>
            </div>
           <hr/>
              
             
               <div class="mb-0 mt-4 row justify-content-end">
                  <div class="col-md-3">
                     
                     {{-- <input type="hidden" name="record_id" value="{{ $nms->id }}"/> --}
                     <input type="hidden" name="isp_members_ids" id="isp_members_ids" value="">
                     <input type="hidden" name="customer_members_ids" id="customer_members_ids" value="">
                     <input type="hidden" name="agent_members_ids" id="agent_members_ids" value="">

                     <button type="submit" name="submit" class="btn btn-success" >Import</button>
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
<script>
   $(document).ready(function(){
       $("#select_isp").change(function(){
           $.ajax({
               url: '/admin/ajax_user/isp/'+$(this).val(),
               type:'get',
               dataType:'JSON',
               success:function(result){
                   $("#isp_members_names").val(result.isp_names);
                   $("#isp_members_ids").val(result.isp_ids);

      
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
   </script>
<!-- Handle Counter js -->
@vite('resources/assets/js/handlecounter.js')
@endsection --}}
