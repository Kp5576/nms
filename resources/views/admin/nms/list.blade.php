@extends('layouts.master')

@section('styles')



@endsection

@section('content')

                            <!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Manage NMS List</h1>
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
                <a href="{{route('admin.nms.add')}}" class="btn btn-success">
                        Add NMS
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
                    {{-- <form method="POST" action="{{route('import_nms')}}" enctype="multipart/form-data" class="btn btn-success">
                        @csrf
                        <label for="Select File">Select File</label>
                        <input type="file" name="file" class="form-control">
                        <div class="mt-5">
                            <button type="submit" class="btn btn-info">Import</button>
                        </div>
                    </form> --}}
                </div>
                <div class="card-body">
                    <!-- Button to Open the Modal -->

                    <div class="table-responsive mt-2">
                          <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    {{-- <th>Customer </th> --}}
                                    <th>Customer Branch</th>
                                    <th>ISP</th>
                                    <th>Agent</th>
                                    <th>Branch</th>

                                    <th>Ip Address</th>
                                    <th>Port</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                @foreach($nms_list as $record)
                                <td class="text-wrap">
                                    {{ $loop->iteration }}
                                    </td>
                                    <td class="text-wrap" id="member-{{$record->id}}">{{ $record->user->company}}</td>
                                    {{-- <td class="font-weight-bold">{{ $record->customer->name }}</td> --}}
                                    <td class="font-weight-bold">{{ $record->branch_name }}</td>

                                    <td class="text-wrap">{{ $record->isp->name }}</td>
                                    <td class="text-wrap">{{ $record->agent->name }}</td>
                                    <td class="text-wrap">{{ $record->branch }}</td>


                                    <td class="text-wrap">{{$record->ip_address}}</td>
                                    <td class="text-wrap">{{$record->port}}</td>
                                    <td class="text-wrap">
                                        @if($record->status == 1)
                                        <span class="btn btn-success btn-xs">Online</span>
                                        @else
                                        <span class="btn btn-danger btn-xs">Offline</span>
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{ route('admin.nms.logs',['id' => $record->id]) }}" class="btn btn-primary-light  me-1"><i class="fa fa-chart" aria-hidden="true"></i> Logs</a>
                                        <a href="{{ route('admin.nms.edit',['id' => $record->id]) }}" class="btn btn-primary-light edit-record border-0 me-1 " data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="icon icon-pencil align-middle"></i></a>
                                        <form method="post"  action="{{ route('admin.nms.delete',['id' => $record->id]) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('do you want to delete it?')" class="btn btn-secondary-light border-0 me-1"><i class="icon icon-trash align-middle"></i></button>
                                        </form>

                                        <a href="{{ route('admin.nms.view',['id' => $record->id]) }}" class="btn btn-info-light edit-record border-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="icon icon-eye align-middle"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-secondary border-0 me-1 ping-btn" rel="{{ $record->ip_address }}"  data-bs-toggle="modal" data-bs-target="#myModal">Ping</a>

                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        {!! $nms_list->links('pagination::bootstrap-5') !!}
                    </div>
                    <br>
                </div>
            </div>
        </div>

    </div>



                            <!-- COL-END -->
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog" style="max-width: 50%;">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ping IP</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="my-result">

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                                </div>

                            </div>
                        </div>
                    </div>

                     <!-- The Modal -->
                     <div class="modal" id="myModal2">
                        <div class="modal-dialog" style="max-width: 50%;">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Flap IP</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="my-result2">

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

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
            "info": false,
        });
    });
</script>
<script>
$(document).ready(function(){

  $(".ping-btn").click(function(){

     $("#my-result").html("");

    var ip = $(this).attr("rel");

    $.ajax({
      url: "{{ url('/') }}/exec/ping/"+ip,
      type: "GET",
      success:function(result){
        $("#my-result").html(result);
      }
    })


  });


  $(".flap-btn").click(function(){

    $("#my-result2").html("");

   var ip = $(this).attr("rel");

   $.ajax({
     url: "{{ url('/') }}/exec/flap/"+ip,
     type: "GET",
     success:function(result){
       $("#my-result2").html(result);
     }
   })


 });
});

</script>
		<!-- Handle Counter js -->
@vite('resources/assets/js/handlecounter.js')

@endsection
