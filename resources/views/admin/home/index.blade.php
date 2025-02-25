
@extends('layouts.master')

@section('styles')



@endsection

@section('content')

							<!-- PAGE-HEADER -->
							<div class="page-header">
								<h1 class="page-title">Dashboard</h1>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
					     	</div>
							<!-- PAGE-HEADER END -->

							<!-- ROW-1 -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xl-6">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
											<div class="card">
												<div class="card-body text-center statistics-info">
													<div class="counter-icon bg-primary mb-0 box-primary-shadow">
														<i class="fe fe-trending-up text-white"></i>
													</div>
													<h6 class="mt-4 mb-1">Total Links</h6>
													<h2 class="mb-2 number-font">{{$total_nms}}</h2>
													{{-- <p class="text-muted">Sed ut perspiciatis unde omnis accusantium doloremque</p> --}}
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
											<div class="card">
												<div class="card-body text-center statistics-info">
													<div class="counter-icon bg-success mb-0 box-secondary-shadow">
														<i class="fe fe-server text-white"></i>
													</div>
													<h6 class="mt-4 mb-1">Total Up Links</h6>
													<h2 class="mb-2 number-font">{{$total_up_links}}</h2>
													{{-- <p class="text-muted">Sed ut perspiciatis unde omnis accusantium doloremque</p> --}}
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
											<div class="card">
												<div class="card-body text-center statistics-info">
													<a href="{{route('admin.nms.dwonlinks_list')}}">
                                                    <div class="counter-icon bg-danger mb-0 box-success-shadow">
														<i class="fe fe-server text-white" style="position: absolute;"></i>
													</div>
                                                </a>
													<h6 class="mt-4 mb-1">Total Down Links</h6>
													<h2 class="mb-2  number-font">{{$total_down_links}}</h2>

												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
										<div class="card">
												<div class="card-body text-center statistics-info">
													<div class="counter-icon bg-secondary mb-0 box-success-shadow">
														<i class="fe fe-pie-chart text-white"></i>
													</div>
													<h6 class="mt-4 mb-1">Latency</h6>
													<h2 class="mb-2  number-font">{{ $max_latency }}</h2>

												</div>
											</div>
										</div>

									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
											<div class="card">
												<div class="card-body text-center statistics-info">

													<h6 class="mt-4 mb-1">Recent Up links</h6>
													{{-- <h2 class="mb-2  number-font">{{$recent_up_links}}</h2> --}}
													<div class="table-responsive mt-2">
														<table class="table">
															<thead>
															  <tr>
																<th scope="col">#</th>
																<th scope="col">Branch Name</th>
																<th scope="col">Status</th>
															  </tr>
															</thead>
															<tbody>
																@foreach($recent_up_links as $record)
															  <tr>
																<th scope="row">{{$loop->iteration}}</th>
																<td>{{$record->branch_name}}</td>
																<td scope="col">
																	@if($record->status == 1)
																	<span class="btn btn-success btn-xs">Online</span>
																	@else
																	<span class="btn btn-danger btn-xs">Offline</span>
																	@endif
																</td>
															  </tr>
															  @endforeach
															</tbody>
														  </table>
														  {!! $recent_up_links->links('pagination::bootstrap-5') !!}
														</div>
												</div>
											</div>

								<div class="card">
												<div class="card-body text-center statistics-info">

													<h5 class="mt-4 mb-1">Recent Down Links</h5>

													<div class="table-responsive mt-2">
													<table class="table">
														<thead>
														  <tr>
															<th scope="col">#</th>
															<th scope="col">Branch Name</th>
															<th scope="col">Status</th>
														  </tr>
														</thead>
														<tbody>
															@foreach($recent_down_links as $record)
														  <tr>
															<th scope="row">{{$loop->iteration}}</th>
															<td>{{$record->branch_name}}</td>
															<td scope="col">
																@if($record->status == 1)
																<span class="btn btn-success btn-xs">Online</span>
																@else
																<span class="btn btn-danger btn-xs">Offline</span>
																@endif
															</td>
														  </tr>
														  @endforeach
														</tbody>
													  </table>
                                                      {!! $recent_down_links->links('pagination::bootstrap-5') !!}
													</div>
												</div>
											</div>
</div>
							</div>
							<!-- ROW-1 END -->






@endsection

@section('scripts')

		<!-- SPARKLINE JS-->
		<script src="{{asset('build/assets/plugins/jquery/jquery.sparkline.min.js')}}"></script>

		<!-- CHARTJS CHART JS-->
		<script src="{{asset('build/assets/plugins/chart/Chart.bundle.js')}}"></script>
		<script src="{{asset('build/assets/plugins/chart/utils.js')}}"></script>

		<!-- ECHART JS-->
		<script src="{{asset('build/assets/plugins/echarts/echarts.js')}}"></script>


		<!-- SELECT2 JS -->
		<script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
		@vite('resources/assets/js/select2.js')

		<!-- DATA TABLE JS-->
		<script src="{{asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
		<script src="{{asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
		<script src="{{asset('build/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

		<!-- APEXCHART JS -->
		@vite('resources/assets/js/apexcharts.js')

		<!-- INDEX JS -->
		@vite('resources/assets/js/index1.js')

		@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
         $(function() {
         var url = window.location;
                 // for single sidebar menu
                 $('ul.nav-sidebar a').filter(function() {
         return this.href == url;
         }).addClass('active');
                 // for sidebar menu and treeview
                 $('ul.nav-treeview a').filter(function() {
         return this.href == url;
         }).parentsUntil(".nav-sidebar > .nav-treeview")
                 .css({
                 'display': 'block'
                 })
                 .addClass('menu-open').prev('a')
                 .addClass('active');
         });
      </script>
      <script>
         $(document).ready(function() {
         $('#example1').DataTable({
         responsive: true,
         bPaginate: false,
         bLengthChange: false,
         bInfo: false,
         });
         });
      </script>
      <script type="text/javascript">
         $(document).on('click', '#btn-delete', function(e) {
         e.preventDefault();
         var form = $(this).closest("form");
         Swal.fire({
         title: 'Are you sure?',
                 text: "You will not be able to revert this!",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#7367f0',
                 cancelButtonColor: '#82868b',
                 confirmButtonText: 'Yes, delete!'
         }).then((result) => {
         if (result.isConfirmed) {
         form.submit();
         }
         });
         });
      </script>
      <script>
         (function() {
         'use strict';
                 window.addEventListener('load', function() {
                 var forms = document.getElementsByClassName('needs-validation');
                         var validation = Array.prototype.filter.call(forms, function(form) {
                         form.addEventListener('submit', function(event) {
                         if (form.checkValidity() === false) {
                         event.preventDefault();
                                 event.stopPropagation();
                         }
                         form.classList.add('was-validated');
                         }, false);
                         });
                 }, false);
         })();
      </script>


@endsection
