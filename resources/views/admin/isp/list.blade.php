
@extends('layouts.master')

@section('styles')



@endsection

@section('content')

                            <!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Manage <?php echo (request()->segment(2)=='isp') ? "ISP" : "Operator";?></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage <?php echo (request()->segment(2)=='isp') ? "ISP" : "Operator";?></li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card cart">
                <div class="card-header">
                    <h3 class="card-title"><?php echo (request()->segment(2)=='isp') ? "ISP" : "Operator";?> List</h3>
                </div>
                <div class="card-body">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                       Add <?php echo (request()->segment(2)=='isp') ? "ISP" : "Operator";?>
                    </button>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-vcenter text-nowrap" id="basic-datatable2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>

                                    <th>Mobile</th>
                                    <th>Address</th>

                                    <th>Action</th>
                                    <th>Member</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach($list as $record)
                                <td class="text-wrap">
                                {{ $loop->iteration }}
                                    </td>
                                    <td class="text-wrap fw-semibold" id="name-{{$record->id}}">{{ $record->name }}</td>
                                    <td class="text-wrap" id="email-{{$record->id}}">{{ $record->email }}</td>
                                    <td class="font-weight-bold" id="mobile-{{$record->id}}">{{ $record->mobile }}</td>
                                    <td class="font-weight-bold" id="address-{{$record->id}}">{{ $record->address }}</td>

                                    <td>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" rel="{{$record->id}}" data-bs-target="#editMyModal" class="btn btn-primary-light edit-record border-0 me-3 " data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="icon icon-pencil align-middle"></i></a>

                                        <form method="post"  action="{{ route('admin.isp.delete', ['id' => $record->id]) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('do you want to delete it?')" class="btn btn-secondary-light border-0 me-3"><i class="icon icon-trash align-middle"></i></button>
                                        </form>
                                    </td>
                                    <?php $var = (request()->segment(2)=='isp') ? 'admin.isp.member.list' : 'admin.operator.member.list' ;?>
                                    <td> <a  class="btn btn-success" href="{{route($var ,['id' => $record->id])}}">Member List</a> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $list->links('pagination::bootstrap-5') !!}
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
                                <h4 class="modal-title">Add <?php echo (request()->segment(2)=='isp') ? "ISP" : "Operator";?></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="<?php echo (request()->segment(2)=='isp') ?  route('admin.isp.create')  : route('admin.operator.create') ;?>  " method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="name" required/>
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
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" placeholder="address" required></textarea>
                                    </div>
                                    <div class="form-group">

                                        <input type="hidden" name="operator" value="<?php echo (request()->segment(2)=='isp') ? 0 : 1;?>" class="form-control" placeholder="name" required/>
                                    </div>
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
                      <div class="modal" id="editMyModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Edit <?php echo (request()->segment(2)=='isp') ? "ISP" : "Operator";?></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="<?php echo (request()->segment(2)=='isp') ? route('admin.isp.update') : route('admin.operator.update') ;?>" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="edit_name" class="form-control" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" id="edit_email" class="form-control" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="number" name="mobile" id="edit_mobile" class="form-control" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" id="edit_address" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">

                                        <input type="hidden" name="operator" value="<?php echo (request()->segment(2)=='isp') ? 0 : 1;?>" class="form-control" placeholder="name" required/>
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

		<!-- Handle Counter js -->
		@vite('resources/assets/js/handlecounter.js')

@endsection
