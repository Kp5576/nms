@extends('layouts.master')

@section('styles')



@endsection

@section('content')

                            <!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Members List</h1>
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
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                        Add Member
                    </button>
                </div>
                <div class="card-body">
                    <!-- Button to Open the Modal -->
                   
                    <div class="table-responsive mt-2">
                        <table class="table " id="basic-datatable2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>   
                                    <th>Mobile</th>
                                    <th>Company</th>
                                    <th>Router Limit</th>
                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach($list_member as $record)
                                <td class="text-wrap">
                                {{ $loop->iteration }}
                                    </td>
                                    <td class="text-wrap fw-semibold" id="name-{{$record->id}}">{{ $record->name }}</td>
                                    <td class="text-wrap" id="email-{{$record->id}}">{{ $record->email }}</td>
                                    <td class="font-weight-bold" id="mobile-{{$record->id}}">{{ $record->mobile }}</td>
                                    <td class="font-weight-bold" id="company-{{$record->id}}">{{ $record->company }}</td>
                                    <td class="font-weight-bold" id="router-{{$record->id}}">{{ $record->router_limit }}</td>  
                                 
                                    <td>
                                        <a href="{{ route('admin.member.edit',['id' => $record->id]) }}" class="btn btn-primary-light edit-record border-0 me-1 " data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="icon icon-pencil align-middle"></i></a>

                                        <form method="post"  action="{{ route('admin.member.delete',['id' => $record->id]) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('do you want to delete it?')" class="btn btn-secondary-light border-0 me-3"><i class="icon icon-trash align-middle"></i></button>
                                        </form>
                                    </td>
                                     
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $list_member->links('pagination::bootstrap-5') !!}
                    </div><br>
                </div>
            </div>
        </div>
        
    </div>
                            <!-- COL-END -->
                    <!-- The Modal -->
                    <div class="modal " id="myModal">
                        <div class="modal-dialog" style="max-width: 50%;">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Add Member</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" >
                                <form action="{{ route ('admin.member.create') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class=" row mb-2">
                                        <label class="col-md-3 form-label" for="">Full Name</label>
                                        <div class="col-md-6 d-flex">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" required/>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" row mb-2">
                                        <label class="col-md-3 form-label" for="">Email</label>
                                        <div class="col-md-6 d-flex">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required/>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" row mb-2">
                                        <label class="col-md-3 form-label" for="">Phone Number</label>
                                        <div class="col-md-6 d-flex">
                                        <input type="text" name="mobile"  class="form-control" placeholder="Phone Number" required/>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" row mb-2">
                                        <label class="col-md-3 form-label" for="">Company</label>
                                        <div class="col-md-6 d-flex">
                                        <input type="text" name="company"  class="form-control" placeholder="Company" required/>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" row mb-2">
                                        <label class="col-md-3 form-label" for="">Router Limit</label>
                                        <div class="col-md-6 d-flex">
                                        <input type="number" name="router_limit" class="form-control" placeholder="Router Limit" required/>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" row mb-2">
                                        <label class="col-md-3 form-label" for="">Password</label>
                                        <div class="col-md-6 d-flex">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required/>
                                        </div>
                                    </div>
                                    <hr/>
                                  
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Mail Host</label>
                    <div class="col-md-6 d-flex">
                     <input type="text" name="mail_host" class="form-control" placeholder="Mail Host">
                    </div>                  
                  </div>
               </div>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Mail Port</label>
                     <div class="col-md-6 d-flex">
                        <input type="text" name="mail_port" class="form-control" placeholder="Mail Port">
                     </div>                  
                  </div>
               </div>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Mail Username</label>
                    <div class="col-md-6 d-flex">
                     <input type="text" name="mail_username"  class="form-control" placeholder="Mail Username">
                    </div>                  
                  </div>
               </div>
               <div class="form-group">
                  <div class="row mb-2">
                     <label class="col-md-3 form-label" for="">Mail Password</label>
                     <div class="col-md-6 d-flex">
                        <input type="password" name="mail_password"  class="form-control" placeholder="Mail Password">
                     </div>                  
                  </div>
               </div>
               <hr/>
                                    <div class="form-group">
                                        <div class=" row mb-2">
                                           <label class="col-md-3 form-label" for="">SMS | WhatsAPP</label>
                                           <div class="col-md-6 d-flex">
                                             <select name="sms_whatsapp" id="" required class="form-control">
                                              <option value="">Select Option</option>
                                              <option value="sms">SMS</option>
                                              <option value="whatsapp">WhatsApp</option>
                                             </select>
                                          </div>                  
                                        </div>
                                     </div>
                                     <hr/>
                                     <div class="form-group">
                                        <div class=" row mb-2">
                                           <label class="col-md-3 form-label" for="">WhatsAPP QR | WhatsAPP Offical:
                                           </label>
                                           <div class="col-md-6 d-flex">
                                             <select name="whatsapp_type" id="" required class="form-control">
                                              <option value="">Select Option</option>
                                              <option value="whatsapp_qr">WhatsAPP QR</option>
                                              <option value="whatsapp_offical">WhatsApp Offical</option>
                                             </select>
                                          </div>                  
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <div class=" row mb-2">
                                           <label class="col-md-3 form-label" for="">WhatsApp Auth Key</label>
                                          <div class="col-md-6 d-flex">
                                           <input type="text" name="whatsapp_auth_key" required class="form-control" placeholder="WhatsApp Auth Key">
                                          </div>                  
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <div class=" row mb-2">
                                           <label class="col-md-3 form-label" for="">WhatsApp App Key </label>
                                           <div class="col-md-6 d-flex">
                                              <input type="text" name="whatsapp_app_key" required class="form-control" placeholder="WhatsApp App Key">
                                           </div>                  
                                        </div>
                                     </div>
                                     <hr/>
                                     <div class="form-group">
                                        <div class=" row mb-2">
                                           <label class="col-md-3 form-label" for="">MSG91 | SMSGLOBAL</label>
                                           <div class="col-md-6 d-flex">
                                             <select name="sms_type" id="" required class="form-control">
                                              <option value="">Select Option</option>
                                              <option value="msg91">MSG91</option>
                                              <option value="smsglobal">SMSGLOBAL</option>
                                             </select>
                                          </div>                  
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <div class=" row mb-2">
                                           <label class="col-md-3 form-label" for="">SMS Auth Key</label>
                                           <div class="col-md-6 d-flex">
                                              <input type="text" name="sms_auth_key" required class="form-control" placeholder="SMS Auth Key" >                    
                                           </div>                  
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <div class=" row mb-2">
                                           <label class="col-md-3 form-label" for="">SMS Sender ID</label>
                                           <div class="col-md-6 d-flex">
                                           <input type="text" name="sms_sender_id" required class="form-control" placeholder="SMS Sender ID">                     
                                          </div>                  
                                        </div>
                                     </div>
                                     <hr/>
                                     <div class="form-group">
                                        <div class="row mb-2">
                                            <label class="col-md-3 form-label">Retry (Seconds)</label>
                                            <div class="col-md-6 d-flex">
                                                
                                                <select name="retry" id="" class="form-control" required>
                                                  <option value="" >select</option>
                                                  <option value="5">5</option>
                                                  <option value="10">10</option>
                                                  <option value="15">15</option>
                                                  <option value="20">20</option>
                       
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                       
                                     <div class="form-group">
                                         <div class=" row mb-2">
                                            <label class="col-md-3 form-label" for="">TimeOut</label>
                                            <div class="col-md-6">
                                               <input type="text" name="timeout" id="timeout" class="form-control" required/>
                                            </div>
                                         </div>
                                      </div>
                                      
                       
                                       <div class="form-group">
                                         <div class=" row mb-2">
                                            <label class="col-md-3 form-label" for="">Country Code </label>
                                            <div class="col-md-6">
                                               <input type="text" name="country_code" id="country_code" class="form-control" required/>
                                            </div>
                                         </div>
                                      </div>
                                      <hr/>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-success" >Submit</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>

                            

                            </div>
                        </div>
                    </div>

                      <!-- The Modal -->
                    
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
$('#basic-datatable2').dataTable({
    "paging": false,
    "info": false
});
    });
</script>


		<!-- Handle Counter js -->
		@vite('resources/assets/js/handlecounter.js')

@endsection
