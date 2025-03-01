
				<div class="app-header header sticky">
					<div class="container-fluid main-container">
						<div class="d-flex align-items-center">
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0);"></a>
							<!-- sidebar-toggle-->
							<a class="logo-horizontal " href="{{url('index')}}">
								<img src="{{asset('build/assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
								<!--<img src="{{asset('build/assets/images/brand/logo-3.png')}}" class="header-brand-img light-logo1"
									alt="logo"> -->
                                    <p class="header-brand-img light-logo1 text-center" style="font-size:30px;font-weight:bold;">NMS</p>
							</a>
							<!-- LOGO -->

							<div class="d-flex order-lg-2 ms-auto header-right-icons">

								<!-- SEARCH -->
								<button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
									data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false"
									aria-label="Toggle navigation">
									<span class="navbar-toggler-icon fe fe-more-vertical"></span>
								</button>
								<div class="navbar navbar-collapse responsive-navbar p-0">
									<div class="collapse navbar-collapse navbarSupportedContent-4" id="navbarSupportedContent-4">
										<div class="d-flex order-lg-2">


											<!-- COUNTRY -->
											<div class="d-flex">
												<a class="nav-link icon theme-layout nav-link-bg layout-setting">
													<span class="dark-layout"><i class="fe fe-moon"></i></span>
													<span class="light-layout"><i class="fe fe-sun"></i></span>
												</a>
											</div>
											<!-- Theme-Layout -->


											<!-- NOTIFICATIONS
											<div class="dropdown  d-flex message">
												<a class="nav-link icon text-center" data-bs-toggle="dropdown">
													<i class="fe fe-message-square"></i><span class="pulse-danger"></span>
												</a>
												<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
													<div class="drop-heading border-bottom">
														<div class="d-flex">
															<h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">You have 5
																Messages</h6>
															<div class="ms-auto">
																<a href="javascript:void(0);" class="text-muted p-0 fs-12">make all unread</a>
															</div>
														</div>
													</div>
													<div class="message-menu message-menu-scroll">
														<a class="dropdown-item d-flex" href="{{url('chat')}}">
															<span
																class="avatar avatar-md brround me-3 align-self-center cover-image"
																data-bs-image-src="{{asset('build/assets/images/users/1.jpg')}}"></span>
															<div class="wd-90p">
																<div class="d-flex">
																	<h5 class="mb-1">Peter Theil</h5>
																	<small class="text-muted ms-auto text-end">
																		6:45 am
																	</small>
																</div>
																<span>Commented on file Guest list....</span>
															</div>
														</a>
														<a class="dropdown-item d-flex" href="{{url('chat')}}">
															<span
																class="avatar avatar-md brround me-3 align-self-center cover-image"
																data-bs-image-src="{{asset('build/assets/images/users/15.jpg')}}"></span>
															<div class="wd-90p">
																<div class="d-flex">
																	<h5 class="mb-1">Abagael Luth</h5>
																	<small class="text-muted ms-auto text-end">
																		10:35 am
																	</small>
																</div>
																<span>New Meetup Started......</span>
															</div>
														</a>
														<a class="dropdown-item d-flex" href="{{url('chat')}}">
															<span
																class="avatar avatar-md brround me-3 align-self-center cover-image"
																data-bs-image-src="{{asset('build/assets/images/users/12.jpg')}}"></span>
															<div class="wd-90p">
																<div class="d-flex">
																	<h5 class="mb-1">Brizid Dawson</h5>
																	<small class="text-muted ms-auto text-end">
																		2:17 pm
																	</small>
																</div>
																<span>Brizid is in the Warehouse...</span>
															</div>
														</a>
														<a class="dropdown-item d-flex" href="{{url('chat')}}">
															<span
																class="avatar avatar-md brround me-3 align-self-center cover-image"
																data-bs-image-src="{{asset('build/assets/images/users/4.jpg')}}"></span>
															<div class="wd-90p">
																<div class="d-flex">
																	<h5 class="mb-1">Shannon Shaw</h5>
																	<small class="text-muted ms-auto text-end">
																		7:55 pm
																	</small>
																</div>
																<span>New Product Realease......</span>
															</div>
														</a>
														<a class="dropdown-item d-flex" href="{{url('chat')}}">
															<span
																class="avatar avatar-md brround me-3 align-self-center cover-image"
																data-bs-image-src="{{asset('build/assets/images/users/3.jpg')}}"></span>
															<div class="wd-90p">
																<div class="d-flex">
																	<h5 class="mb-1">Cherry Blossom</h5>
																	<small class="text-muted ms-auto text-end">
																		7:55 pm
																	</small>
																</div>
																<span>You have appointment on......</span>
															</div>
														</a>

													</div>
													<div class="dropdown-divider m-0"></div>
														<div class="dropdown-footer p-4">
															<a class="btn btn-primary btn-pill w-sm btn-sm py-2 btn-block fs-14" href="{{url('chat')}}">See All Messages</a>
													</div>
												</div>
											</div> -->

											<!-- SIDE-MENU -->
											<div class="dropdown d-flex profile-1">
												<a href="javascript:void(0);" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
													<!--<img src="{{asset('build/assets/images/users/11.jpg')}}" alt="profile-user"
														class="avatar  profile-user brround cover-image"> -->
                                                        <i class="side-menu__icon fe fe-user" class="avatar  profile-user brround cover-image"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
													<div class="drop-heading">
														<div class="text-center">
															<h5 class="text-dark mb-0 fs-14 fw-semibold">{{ auth()->user()->name }}</h5>
															<small class="text-muted">Admin</small>
														</div>
													</div>
													<div class="dropdown-divider m-0"></div>
													<?php
									if(auth()->user()->role_id ==1)
									{
									?>
													<a class="dropdown-item" href="{{route('admin.member.edit',['id'=>auth()->user()->id])}}">
														<i class="dropdown-icon fe fe-user"></i> Profile
													</a>
													<?php
									}
													?>
													<?php
									if(auth()->user()->role_id ==2)
									{
									?>
													<a class="dropdown-item" href="{{route('customer.member.edit',['id'=>auth()->user()->id])}}">
														<i class="dropdown-icon fe fe-user"></i> Profile
													</a>
													<?php
									}
													?>
													<a class="dropdown-item" href="{{url('logout')}}">
														<i class="dropdown-icon fe fe-alert-circle"></i> Sign out
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
