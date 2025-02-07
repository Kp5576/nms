@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<style>
    .d-flex {
        display: flex;
        align-items: center; /* Align items vertically in the center */
    }
 
    .d-flex .form-control {
        margin-right: 30px; /* Space between inputs */
    }
 </style>
 
 <!-- PAGE-HEADER -->
 <div class="page-header">
    <h1 class="page-title">Manage Member</h1>
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
       <li class="breadcrumb-item active" aria-current="page">Manage Member</li>
    </ol>
 </div>
 <!-- PAGE-HEADER END -->
 
 <!-- ROW-1 OPEN -->
 <div class="row">
    <div class="col-xl-12 col-md-12">
       <div class="card cart">
          <div class="card-header">
             <h3 class="card-title">Member Edit</h3>
          </div>
          <form action="{{route('customer.member.update')}}" method="POST">
             @csrf
             @method('put')
        <div class="card-body">         
             <div class="form-group">
                 <div class="row mb-2">
                     <label class="col-md-3 form-label">Name</label>
                     <div class="col-md-6 d-flex">
                         <input type="text" name="name" id="edit_name" value="{{ $user->name }}" class="form-control" required/>
                     </div>
                 </div>
             </div>
             <!-- Repeat for other fields -->
             <div class="form-group">
                 <div class="row mb-2">
                     <label class="col-md-3 form-label">Email</label>
                     <div class="col-md-6 d-flex">
                         <input type="email" name="email" id="edit_email" value="{{ $user->email }}" class="form-control" required/>
                     </div>
                 </div>
             </div>
                <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label">Mobile</label>
                    <div class="col-md-6 d-flex">
                     <input type="number" name="mobile" id="edit_mobile" value="{{ $user->mobile }}"  class="form-control" required/>
                    </div> 
                  </div>
                </div>
                <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label">Company</label>
                    <div class="col-md-6 d-flex">
                     <input type="text" name="company" id="edit_company" value="{{ $user->company }}"  class="form-control" required/>
                    </div> 
                  </div>
                </div>
                <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label">Router Limit</label>
                    <div class="col-md-6 d-flex">
                     <input type="number" name="router_limit" id="edit_router" value="{{ $user->router_limit }}"  class="form-control" required/>
                    </div> 
                  </div>
                </div>
                <hr/>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Mail Host</label>
                    <div class="col-md-6 d-flex">
                     <input type="text" name="mail_host" value="{{ $user->mail_host }}" class="form-control" placeholder="Mail Host">
                    </div>                  
                  </div>
               </div>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Mail Port</label>
                     <div class="col-md-6 d-flex">
                        <input type="text" name="mail_port" value="{{ $user->mail_port }}" class="form-control" placeholder="Mail Port">
                     </div>                  
                  </div>
               </div>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Mail Username</label>
                    <div class="col-md-6 d-flex">
                     <input type="text" name="mail_username" value="{{ $user->mail_username }}" class="form-control" placeholder="Mail Username">
                    </div>                  
                  </div>
               </div>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Mail Password</label>
                     <div class="col-md-6 d-flex">
                        <input type="text" name="mail_password" value="{{ $user->mail_password }}" class="form-control" placeholder="Mail Password">
                     </div>                  
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">SMS | WhatsApp</label>
                     <div class="col-md-6 d-flex">
                        <select name="sms_whatsapp" id="sms_whatsapp" required class="form-control">
                        <option value="">Select Option</option>
                        <option value="sms" {{ $user->sms_whatsapp == 'sms' ? 'selected' : '' }}>SMS</option>
                        <option value="whatsapp" {{ $user->sms_whatsapp == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                        </select>
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">WhatsAPP QR | WhatsAPP Offical:
                     </label>
                     <div class="col-md-6 d-flex">
                       <select name="whatsapp_type" id="" required class="form-control">
                        <option value="">Select Option</option>
                        <option value="whatsapp_qr" {{ $user->whatsapp_type == 'whatsapp_qr' ? 'selected' : '' }}>WhatsAPP QR</option>
                        <option value="whatsapp_offical" {{ $user->whatsapp_type == 'whatsapp_offical' ? 'selected' : '' }}>WhatsApp Offical</option>
                       </select>
                    </div>                  
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">WhatsApp Auth Key</label>
                    <div class="col-md-6 d-flex">
                     <input type="text" name="whatsapp_auth_key" value="{{ $user->whatsapp_auth_key }}" class="form-control" placeholder="WhatsApp Auth Key">
                    </div>                  
                  </div>
               </div>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">WhatsApp App Key </label>
                     <div class="col-md-6 d-flex">
                        <input type="text" name="whatsapp_app_key" value="{{ $user->whatsapp_app_key }}" class="form-control" placeholder="WhatsApp App Key">
                     </div>                  
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">MSG91 | SMSGLOBAL</label>
                     <div class="col-md-6 d-flex">
                       <select name="sms_type" id="" class="form-control">
                        <option value="">Select Option</option>
                        <option value="msg91" {{ $user->sms_type == 'msg91' ? 'selected' : '' }}>MSG91</option>
                        <option value="smsglobal" {{ $user->sms_type == 'smsglobal' ? 'selected' : '' }}>SMSGLOBAL</option>
                       </select>
                    </div>                  
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">SMS Auth Key</label>
                     <div class="col-md-6 d-flex">
                        <input type="text" name="sms_auth_key" value="{{ $user->sms_auth_key }}" class="form-control" placeholder="SMS Auth Key" >                    
                     </div>                  
                  </div>
               </div>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">SMS Sender ID</label>
                     <div class="col-md-6 d-flex">
                     <input type="text" name="sms_sender_id" value="{{ $user->sms_sender_id }}" class="form-control" placeholder="SMS Sender ID">                     
                    </div>                  
                  </div>
               </div>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Retry</label>
                     <div class="col-md-6 d-flex">
                       <select name="retry" id="" class="form-control">
                        <option value="">Select Option</option>
                        <option value="5" {{ $user->retry == '5' ? 'selected' : '' }}>5</option>
                        <option value="10" {{ $user->retry == '10' ? 'selected' : '' }}>10</option>
                        <option value="15" {{ $user->retry == '15' ? 'selected' : '' }}>15</option>
                        <option value="20" {{ $user->retry == '20' ? 'selected' : '' }}>20</option>
                       </select>
                    </div>                  
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Time Out</label>
                     <div class="col-md-6 d-flex">
                        <input type="text" name="timeout" value="{{ $user->timeout }}" class="form-control" placeholder="Time Out" >                    
                     </div>                  
                  </div>
               </div>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Country Code</label>
                     <div class="col-md-6 d-flex">
                     <input type="text" name="country_code" value="{{ $user->country_code }}" class="form-control" placeholder="Country Code">                     
                    </div>                  
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                <div class="row mb-2">
                <label class="col-md-3 form-label" >Password</label>
                   <div class="col-md-6 d-flex">
                     <input type="password" name="password" id="" class="form-control"/>
                  </div>
                </div>
               </div>
              
               <div class="mb-0 mt-4 row justify-content-end">
                  <div class="col-md-3">
                     <input type="hidden" name="record_id" id="record_id" value="{{ $user->id }}"/>
                     <button type="submit" name="submit" class="btn btn-success" >Submit</button>
                  </div>
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

<!-- Handle Counter js -->
@vite('resources/assets/js/handlecounter.js')
@endsection