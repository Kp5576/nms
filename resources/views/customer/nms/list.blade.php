@extends('layouts.master')

@section('styles')



@endsection

@section('content')

                            <!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Manage NMS</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('customer') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage NMS</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card cart">

                <div class="card-body">
                    <!-- Button to Open the Modal -->
                    <a href="{{route('customer.nms.add')}}" class="btn btn-success">
                        Add NMS
                    </a>
                    <div class="table-responsive mt-2">
                        <table id="example2" class="table table-bordered table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Branch Name</th>
                                    <th>ISP</th>
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
                                    <td class="font-weight-bold">{{ $record->branch_name }}</td>
                                    <td class="text-wrap">{{ $record->isp->name }}</td>

                                    <td class="text-wrap">{{$record->ip_address}}</td>
                                    <td class="text-wrap">{{$record->port}}</td>
                                    <td class="text-wrap">
                                         @if($record->status == 1)
                                        <span class="btn btn-success btn-xs">Online</span>
                                        @else
                                        <span class="btn btn-danger btn-xs">Offline</span>
                                        @endif</td>
                                    <td>
                                        <a href="{{ route('customer.nms.logs',['id' => $record->id]) }}" class="btn btn-primary-light  me-1"><i class="fa fa-chart" aria-hidden="true"></i> Logs</a>
                                        <a href="{{ route('customer.nms.view',['id' => $record->id]) }}" class="btn btn-info edit-record border-0 me-3 " data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">view</a>
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

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
$('#example2').dataTable({
    "paging": false,
    "info": false
});
    });
</script>

		<!-- Handle Counter js -->
@vite('resources/assets/js/handlecounter.js')

@endsection
