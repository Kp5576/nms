@extends('layouts.master')

@section('styles')



@endsection

@section('content')

      <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Manage Branch's</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Branch Master</li>
            </ol>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card cart">
                        <div class="card-header">
                            <h3 class="card-title">Branch Master List</h3>
                        </div>
                        <div class="card-body">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-success">
                                <a href="{{route('admin.branch.add')}}" class="btn btn-success">
                                    Add Branch Master
                                </a>
                                &nbsp;
                    &nbsp;
                    <a href="{{route('export_nms')}}" class="btn btn-success">
                        Exort
                    </a>
                    &nbsp;
                    &nbsp;
                    <a href="{{route('admin.nms.import')}}" class="btn btn-success">
                        Import
                    </a>
                            </button>
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered table-vcenter text-nowrap" id="basic-datatable2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Barnch Code</th>
                                            <th>Branch Name</th>
                                            <th>Address</th>
                                            <th>IP</th>
                                            <th>Port</th>
                                            <th>Operator Name</th>
                                            <th>ISP Name</th>
                                            <th>Agent Name</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                        @foreach($agent_list as $record)
                                        <td class="text-wrap">
                                        {{ $loop->iteration }}
                                            </td>
                                            <td class="text-wrap fw-semibold" id="name-{{$record->id}}">{{ $record->branch_code }}</td>
                                            <td class="text-wrap fw-semibold" id="name-{{$record->id}}">{{ $record->branch_name }}</td>
                                            <td class="text-wrap" id="email-{{$record->id}}">{{ $record->address }}</td>
                                            <td class="font-weight-bold" id="address-{{$record->id}}">{{$record->ip}}</td>
                                            <td class="font-weight-bold" id="address-{{$record->id}}">{{$record->port}}</td>
                                            <td class="text-wrap fw-semibold" id="name-{{$record->id}}">{{ $record->operator_name }}</td>
                                            <td class="text-wrap fw-semibold" id="name-{{$record->id}}">{{ $record->isp_name }}</td>
                                            <td class="text-wrap fw-semibold" id="name-{{$record->id}}">{{ $record->agent_name }}</td>


                                            <td>
                                                <a href="{{ route('admin.branch.edit',['id' => $record->id]) }}" class="btn btn-primary-light edit-record border-0 me-1 " data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="icon icon-pencil align-middle"></i></a>


                                                <form method="post"  action="{{ route('admin.branch.delete',['id' => $record->id]) }}" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('do you want to delete it?')" class="btn btn-secondary-light border-0 me-3"><i class="icon icon-trash align-middle"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $agent_list->links('pagination::bootstrap-5') !!}
                            </div><br>
                        </div>
                    </div>
                </div>

            </div>
                            <!-- COL-END -->
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Add Branch Master</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{route('admin.branch.create')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="name" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="company_name" class="form-control" placeholder="name" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="email" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="number" name="mobile" class="form-control" placeholder="mobile" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>IP</label>
                                        <input type="number" name="ip" class="form-control" placeholder="mobile" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Operator Name</label>
                                        <input type="text" name="operator_name" class="form-control" placeholder="name" required/>
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
                                           </div>
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <div class=" row mb-2">
                                           <label class="col-md-3 form-label" for="">ISP Members Name</label>
                                           <div class="col-md-6">
                                              <!-- <input type="text" readonly name="isp_members_names" id="isp_members_names" class="form-control"/> -->
                                              <input type="hidden" name="isp_members_names" value=""/>

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
                                           <label class="col-md-3 form-label" for="">Ip Address</label>
                                           <div class="col-md-6 d-flex">
                                              <input type="text" name="ip_address" class="form-control" required placeholder="IP address" style="flex: 1;">
                                              <input type="text" name="port" class="form-control" style="width: 100px;" placeholder="port">
                                          </div>
                                        </div>
                                     </div>

                                    <div class="form-group">
                                        {{-- <input type="hidden" name="isp_id"  value="{{ $isp_id }}"> --}}
                                    <button type="submit" class="btn btn-success" >Submit</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>



                            </div>
                        </div>
                    </div>

                      <!-- The Modal -->
                      <div class="modal" id="editMyModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Agent</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{route('admin.branch.update')}}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="name" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="company_name" class="form-control" placeholder="name" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="email" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="number" name="mobile" class="form-control" placeholder="mobile" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>IP</label>
                                        <input type="number" name="ip" class="form-control" placeholder="mobile" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Operator Name</label>
                                        <input type="text" name="operator_name" class="form-control" placeholder="name" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="edit_record" name="record_id"/>
                                    <button type="submit" class="btn btn-success" >Submit</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>



                            </div>
                        </div>
                    </div>

                    {{-- -----------------------delete_model----------------------- --}}
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
   <script>
    $(document).ready(function(){

        $(".edit-record").click(function(){
            var id = $(this).attr("rel");
            var name = $("#name-"+id).text();
            var mobile = $("#mobile-"+id).text();
            var email = $("#email-"+id).text();
            var address = $("#address-"+id).text();


            $("#edit_name").val(name);
            $("#edit_email").val(email);
            $("#edit_mobile").val(mobile);
            $("#edit_address").val(address);


            $("#edit_record").val(id);
        });
    });
    </script>

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
