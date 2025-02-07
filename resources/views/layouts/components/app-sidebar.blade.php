				<div class="sticky">
					<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
						<div class="app-sidebar">
							<div class="side-header">
								<a class="header-brand1" href="{{url('index')}}" style="font-size:30px;font-weight:bold;">
									NMS
								</a>
								<!-- LOGO -->
							</div>
							<div class="main-sidemenu">
								<div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
										fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
										<path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
									</svg></div>
								<ul class="side-menu">
									<li class="sub-category">
										<h3>Main</h3>
									</li>
									<?php
									if(auth()->user()->role_id == 1)
									{
									?>
									<li class="slide">
										<a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin') }}"><i class="side-menu__icon fe fe-airplay"></i><span
											class="side-menu__label">Dashboards</span>
										</a>
										
									</li>
									<li class="sub-category">
										<h3>ISP</h3>
									</li>
									<li>
										<a class="side-menu__item has-link" href="{{route('admin.isp.list')}}"><i class="side-menu__icon fe fe-package"></i><span
												class="side-menu__label">Manage ISP</span></a>
									</li>

									<li>
										<a class="side-menu__item has-link" href="{{route('admin.operator.list')}}"><i class="side-menu__icon fe fe-package"></i><span
												class="side-menu__label">Manage Operator</span></a>
									</li>
									
									<li>
										<a class="side-menu__item has-link" href="{{route('admin.agent.list')}}" ><i class="side-menu__icon fe fe-package"></i><span
												class="side-menu__label">Manage Agent</span></a>
									</li>
									<li>
										<a class="side-menu__item has-link" href="{{route('admin.customer.list')}}"><i class="side-menu__icon fe fe-shield"></i><span
												class="side-menu__label">Manage Customer </span></a>
									</li>
									<li>
										<a class="side-menu__item has-link" href="{{route('admin.member.list')}}"><i class="side-menu__icon fe fe-users"></i><span
												class="side-menu__label">Manage Member </span></a>
									</li>
									<li>
										<a class="side-menu__item has-link" href="{{route('admin.branch.list')}}"><i class="side-menu__icon fe fe-users"></i><span
												class="side-menu__label">Manage Branch </span></a>
									</li>
									<li>
										<a class="side-menu__item has-link" href="{{route('admin.nms.list')}}"><i class="side-menu__icon fe fe-server"></i><span
												class="side-menu__label">Mange NMS </span></a>
									</li>
									<li><a class="side-menu__item has-link" href="{{route('admin.member.edit',['id'=>auth()->user()->id])}}"><i class="side-menu__icon fe fe-settings"></i><span
										class="side-menu__label">Settings </span></a></li>
									{{-- <li>
										<div class="dropdown">
											<button type="button" class="side-menu__item has-link dropdown-toggle" data-bs-toggle="dropdown">
												<i class="side-menu__icon fe fe-server"></i>
											  Settings
											</button>
											<ul class="dropdown-menu">
										<li><a class="side-menu__item has-link" href="{{route('admin.member.edit',['id'=>auth()->user()->id])}}"><i class="side-menu__icon fe fe-settings"></i><span
												class="side-menu__label">Settings </span></a></li>

												<li><a class="side-menu__item has-link" href="{{route('admin.system_setting.index',['id'=>auth()->user()->id])}}"><i class="side-menu__icon fe fe-settings"></i><span
													class="side-menu__label">System Setting </span></a></li>
											</ul>
										</div>		
									</li> --}}
									<?php 
									}
									?>

									<?php
									if(auth()->user()->role_id ==2)
									{
									?>
									<li class="slide">
										<a class="side-menu__item" data-bs-toggle="slide" href="{{ route('customer') }}"><i class="side-menu__icon fe fe-airplay"></i><span
											class="side-menu__label">Dashboards</span>
										</a>
										
									</li>
									<li>
										<a class="side-menu__item has-link" href="{{route('customer.nms.list')}}"><i class="side-menu__icon fe fe-server"></i><span
												class="side-menu__label">Mange NMS </span></a>
									</li>
								
									<?php
									}
									?>
									<!-- <li class="slide">
										<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-database"></i><span
											class="side-menu__label">Advanced Ui</span><i
											class="angle fe fe-chevron-right"></i>
										</a>
										<ul class="slide-menu">
											<li class="panel sidetab-menu">
												<div class="tab-menu-heading p-0 pb-2 border-0">
													<div class="tabs-menu ">
													
														<ul class="nav panel-tabs">
															<li><a href="#side21" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
															<li><a href="#side22" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
														</ul>
													</div>
												</div>
												<div class="panel-body tabs-menu-body p-0 border-0">
													<div class="tab-content">
														<div class="tab-pane active" id="side21">
															<ul class="sidemenu-list">
																<li class="side-menu-label1"><a href="javascript:void(0);">Advanced Ui</a></li>
																<li><a href="{{url('mediaobject')}}" class="slide-item"> Media Object</a></li>
																
															</ul>
															
														</div>
														
													</div>
												</div>
											</li>
										</ul>
									</li> -->
									
								</ul>
								<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
										width="24" height="24" viewBox="0 0 24 24">
										<path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
									</svg></div>
							</div>
					</div>
				</div>