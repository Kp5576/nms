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
                  <input type="text" readonly  value="{{ $nms->user->name }}" class="form-control" disabled />
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">ISP</label>
                     <div class="col-md-6">
                     <input type="text" readonly  value="{{ $nms->isp->name }}" class="form-control" disabled />
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">ISP Members Names</label>
                     <div class="col-md-6">
                        <input type="text" readonly  id="mobile" value="{{ $nms->isp_members_names }}" class="form-control" disabled />
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">CUSTOMER</label>
                     <div class="col-md-6">

                        <input type="text" readonly  value="{{ $nms->customer->name }}" class="form-control" disabled />
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Customer Members Names</label>
                     <div class="col-md-6">
                        <input type="text" readonly  id="mobile" value="{{ $nms->customer_members_names }}" class="form-control" disabled />
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Agent</label>
                     <div class="col-md-6">
                     <input type="text" readonly  value="{{ $nms->agent->name }}" class="form-control" disabled />
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Agent Members Names</label>
                     <div class="col-md-6">
                        <input type="text" readonly  id="mobile" value="{{ $nms->agent_members_names }}" class="form-control" disabled />
                     </div>
                  </div>
               </div>
            <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Ip Address</label>
                     <div class="col-md-6 d-flex">
                        <input type="text" name="ip_address" class="form-control"  required placeholder="IP address" style="flex: 1;" value="{{$nms->ip_address}}" disabled>
                        <input type="text" name="port" class="form-control" style="width: 100px;" placeholder="port" value="{{$nms->port}}" disabled>
                    </div>
                  </div>
               </div>

               <hr/>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">WhatsApp Message</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="whatsapp_message" {{ $nms->whatsapp_message == 1 ? 'checked' : ''  }} type="checkbox" disabled>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">English/Hindi</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="hindi_english" {{ $nms->hindi_english == 1 ? 'checked' : ''  }} type="checkbox" disabled>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">ISP Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="isp_alert" {{ $nms->isp_alert == 1 ? 'checked' : ''  }} type="checkbox" disabled>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Customer Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="customer_alert" {{ $nms->customer_alert == 1 ? 'checked' : ''  }} type="checkbox" disabled>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Agent Alert</label>
                     <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="agent_alert" {{ $nms->agent_alert == 1 ? 'checked' : ''  }} type="checkbox" disabled>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class=" row mb-2">
                        <label class="col-md-3 form-label" for="">Mail Alert</label>
                        <div class="col-md-6">
                           <div class="form-check form-switch">
                               <input class="form-check-input" name="mail_alert" {{ $nms->mail_alert == 1 ? 'checked' : ''  }} type="checkbox" disabled>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mb-0 mt-4 row justify-content-end">
                  <div class="col-md-3">
                     <input type="hidden" name="record_id" value="{{ $nms->id }}"/>
                     <a href="{{ route('customer.nms.list') }}"
                        style="color: white; background-color: green; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;"> Back</a>

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
       $("#select_user").change(function(){
           $.ajax({
               url: '/admin/ajax_user/'+$(this).val(),
               type:'get',
             //  dataType:'JSON',
               success:function(result){
                   $("#mobile").val(result);
               }
           });
       });
   });
</script>
<!-- Handle Counter js -->
@vite('resources/assets/js/handlecounter.js')
@endsection
