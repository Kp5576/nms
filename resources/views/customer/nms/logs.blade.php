@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<?php

use App\Http\Controllers\AdminController;
?>
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
   <h1 class="page-title">Branch Name: {{ $nms->branch_name}}</h1>
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Manage Logs</li>
   </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">


                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                    <div class="card bg-info img-card box-primary-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font">{{$nms['ip_address']}}</h2>
                                                    <p class="text-white mb-0">IP Address</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-check text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                    <div class="card bg-primary img-card box-primary-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font">{{number_format($nms->uptime, 2, '.', '')}}% <i class="fa fa-question-circle"  data-toggle="tooltip" title="Based on {{$nms->total_ok_checks + $nms->total_not_ok_checks}} total checks"></i></h2>
                                                    <p class="text-white mb-0">Uptime</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-globe text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                    <div class="card bg-secondary img-card box-secondary-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font">{{$nms->average_response_time}} ms</h2>
                                                    <p class="text-white mb-0">Avg. response time</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-bolt text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="card  bg-success img-card box-success-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font">{{ isset($last_five_records[0]) && $last_five_records{0}->status ? $nms->main_ok_datetime : $nms->last_ok_datetime}}</h2>
                                                    <p class="text-white mb-0">{{ isset($last_five_records[0]) && $last_five_records{0}->status ? 'Currently up for' : 'Currently down for'}}</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-check text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="card bg-info img-card box-info-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font">{{$nms->last_check_datetime}}</h2>
                                                    <p class="text-white mb-0">Last checked</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-calendar text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                            </div>

<!-- ROW-1 OPEN -->
<div class="row">
   <div class="col-xl-12 col-md-12">
      <div class="card cart p-4">

            <h2 >Logs Last 12 Hours:</h1>
            <form action="" method="get">
              @csrf
             <div class="row">
               <div class="col-md-3">
               <input class="form-control" name="start_date" value="" placeholder="MM/DD/YYYY" type="date">
              </div>
              <div class="col-md-3">
               <input class="form-control" name="end_date" value="" placeholder="MM/DD/YYYY" type="date">
              </div>
              <div class="col-md-3">
                <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
              </div>
              </div>
  </form>
            <div class="col-md-12">
               <canvas id="myChart" style="width:100%;"></canvas>
            </div>


      </div>
   </div>
</div>
<!-- The Modal -->

<div class="row">
   <div class="col-xl-12 col-md-12">
   <div class="card cart p-4">
     <h2>Last monitor checks </h2>
     <table class="table table-bordered">
       <thead>
         <tr>
           <th>Status</th>
           <th>Response Time</th>
           <th>Date</th>
              </tr>
              </thead>
                @foreach($data->last_five_records as $record)
               <tr>
                 <td>@if($record->status == 1)
                   <span class="btn btn-sm btn-success">Active</span>
                   @else
                   <span class="btn btn-sm btn-danger">Inactive</span>
                   @endif
                 </td>
                 <td>{{$record->latency}}</td>
                 <td>{{ AdminController::get_elapsed_time($record->date)}}</td>
              </tr>
                @endforeach
              </table>
              </div>
              </div>
    </div>


    <div class="row">
   <div class="col-xl-12 col-md-12">
   <div class="card cart p-4">
     <h2>Incidents </h2>
     <table class="table table-bordered">
       <thead>

             <tr>
           <th>Date</th>
           <th>Started</th>
           <th>Ended</th>
           <th>Length</th>
              </tr>
              </thead>
                @foreach($data->incident_records as $record)
               <tr>
                  <td>
                 {{ date("d M Y", strtotime($record["created_at"])) }}
                 </td>
                 <td>
                 {{ date("h:i a", strtotime($record->start_datetime))}}
                 </td>
                 <td> <?php if($record->end_datetime == '') echo '<i class="fa fa-times btn btn-danger fa-fw fa-sm"></i> Ongoing incident!'; else echo '<i class="fa fa-check btn btn-success fa-fw fa-sm"></i>'.date("d M Y h:i a", strtotime($record->end_datetime)); ?></td>
                 <td>{{ AdminController::get_elapsed_time($record->start_datetime, $record->end_datetime)}}</td>
              </tr>
                @endforeach
              </table>
              </div>
              </div>
    </div>
@endsection
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
         <script>
            var xValues = <?php echo $xValues; ?>;
            var yValues = <?php echo $yValues; ?>;
            var barColors =  <?php echo $barColors; ?>;

            new Chart("myChart", {
              type: "bar",
              data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: barColors,
                  data: yValues
                }]
              },
              options: {
                legend: {display: false},
                title: {
                  display: true,
                  text: "Logs Last 12 Hours: <?php echo $record['ip_address']; ?>"
                }
              }
            });
         </script>
<!-- Handle Counter js -->
@vite('resources/assets/js/handlecounter.js')
@endsection
