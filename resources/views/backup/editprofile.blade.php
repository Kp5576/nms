
@extends('layouts.master')

@section('styles')



@endsection

@section('content')

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Edit Profile</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                                </ol>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 OPEN -->
                            <div class="row">
                                <div class="col-lg-5 col-xl-4 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <div class="userprofile">
                                                    <div class="userpic  brround"> <img src="{{asset('build/assets/images/users/10.jpg')}}" alt="" class="userpicimg"> </div>
                                                    <h3 class="username text-dark mb-2">Elizabeth Dyer</h3>
                                                    <p class="mb-1 text-muted">Administrator, USA</p>
                                                    <div class="text-center mb-4">
                                                        <span><i class="fa fa-star text-warning"></i></span>
                                                        <span><i class="fa fa-star text-warning"></i></span>
                                                        <span><i class="fa fa-star text-warning"></i></span>
                                                        <span><i class="fa fa-star-half-o text-warning"></i></span>
                                                        <span><i class="fa fa-star-o text-warning"></i></span>
                                                    </div>
                                                    <div class="socials text-center mt-3">
                                                        <a href="" class="btn btn-circle btn-primary ">
                                                        <i class="fa fa-facebook fs-14"></i></a> <a href="" class="btn btn-circle btn-danger ">
                                                        <i class="fa fa-google-plus fs-14"></i></a> <a href="" class="btn btn-circle btn-info ">
                                                        <i class="fa fa-twitter fs-14"></i></a> <a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Edit Password</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex mb-3">
                                                <img alt="User Avatar" class="rounded-circle avatar-lg me-2" src="{{asset('build/assets/images/users/10.jpg')}}">
                                                <div class="ms-auto mt-xl-2 mt-lg-0 ms-lg-2">
                                                    <a href="javascript:void(0);" class="btn btn-primary mt-1 mb-1"><i class="fe fe-camera mx-1"></i>Edit profile</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger mt-1 mb-1"><i class="fe fe-camera-off mx-1"></i>Delete profile</a>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Change Password</label>
                                                <input type="password" class="form-control" value="password">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">New Password</label>
                                                <input type="password" class="form-control" value="password">
                                            </div>
                                            <div class="mb-0">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" value="password">
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            <a href="javascript:void(0);" class="btn btn-success">Updated</a>
                                            <a href="javascript:void(0);" class="btn btn-danger">Cancle</a>
                                        </div>
                                    </div>
                                    <div class="card panel-theme">
                                        <div class="card-header">
                                            <div class="float-start">
                                                <h3 class="card-title">Contact</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="card-body no-padding">
                                            <ul class="list-group no-margin">
                                                <li class="list-group-item">
                                                    <div class="d-inline-flex"> <i class="fa fa-envelope text-muted"></i> </div><div class="my-auto pt-2 ms-3 d-inline-flex fs-15"> support@demo.com</div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-inline-flex"> <i class="fa fa-globe text-muted"></i> </div><div class="my-auto pt-2 ms-3 d-inline-flex fs-15"> www.abcd.com</div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-inline-flex"> <i class="fa fa-phone text-muted"></i> </div><div class="my-auto pt-2 ms-3 d-inline-flex fs-15"> +125 5826 3658</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-xl-8 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Edit Profile</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-4">
                                                        <label for="exampleInputname">First Name</label>
                                                        <input type="text" class="form-control" id="exampleInputname" placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-4">
                                                        <label for="exampleInputname1">Last Name</label>
                                                        <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email address">
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleInputnumber">Conatct Number</label>
                                                <input type="number" class="form-control" id="exampleInputnumber" placeholder="ph number">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">About Me</label>
                                                <textarea class="form-control" placeholder="My bio........." rows="6"></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Website</label>
                                                <input class="form-control" placeholder="http://splink.com">
                                            </div>
                                            <div class="mb-0">
                                                <label class="form-label">Date Of Birth</label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="my-2">
                                                            <select class="form-control select2 custom-select" data-placeholder="Choose one">
                                                                <option label="Choose one">
                                                                </option>
                                                                <option value="0">Date</option>
                                                                <option value="1">01</option>
                                                                <option value="2">02</option>
                                                                <option value="3">03</option>
                                                                <option value="4">04</option>
                                                                <option value="5">05</option>
                                                                <option value="6">06</option>
                                                                <option value="7">07</option>
                                                                <option value="8">08</option>
                                                                <option value="9">09</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                                <option value="17">17</option>
                                                                <option value="18">18</option>
                                                                <option value="19">19</option>
                                                                <option value="20">20</option>
                                                                <option value="21">21</option>
                                                                <option value="22">22</option>
                                                                <option value="23">23</option>
                                                                <option value="24">24</option>
                                                                <option value="25">25</option>
                                                                <option value="26">26</option>
                                                                <option value="27">27</option>
                                                                <option value="28">28</option>
                                                                <option value="29">29</option>
                                                                <option value="30">30</option>
                                                                <option value="31">31</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="my-2">
                                                            <select class="form-control select2 custom-select" data-placeholder="Choose one">
                                                                <option label="Choose one">
                                                                </option>
                                                                <option value="1">Jan</option>
                                                                <option value="2">Feb</option>
                                                                <option value="3">Mar</option>
                                                                <option value="4">Apr</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">Aug</option>
                                                                <option value="9">Sep</option>
                                                                <option value="10">Oct</option>
                                                                <option value="11">Nov</option>
                                                                <option value="12">Dec</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="my-2">
                                                            <select class="form-control select2 custom-select" data-placeholder="Choose one">
                                                                <option label="Choose one">
                                                                </option>
                                                                <option value="0">Year</option>
                                                                <option value="1">2018</option>
                                                                <option value="2">2017</option>
                                                                <option value="3">2016</option>
                                                                <option value="4">2015</option>
                                                                <option value="5">2014</option>
                                                                <option value="6">2013</option>
                                                                <option value="7">2102</option>
                                                                <option value="8">2012</option>
                                                                <option value="9">2011</option>
                                                                <option value="10">2010</option>
                                                                <option value="11">2009</option>
                                                                <option value="12">2008</option>
                                                                <option value="13">2007</option>
                                                                <option value="14">2006</option>
                                                                <option value="15">2005</option>
                                                                <option value="16">2004</option>
                                                                <option value="17">2003</option>
                                                                <option value="18">2002</option>
                                                                <option value="19">2001</option>
                                                                <option value="20">1999</option>
                                                                <option value="21">1998</option>
                                                                <option value="22">1997</option>
                                                                <option value="23">1996</option>
                                                                <option value="24">1995</option>
                                                                <option value="25">1994</option>
                                                                <option value="26">1993</option>
                                                                <option value="27">1992</option>
                                                                <option value="28">1991</option>
                                                                <option value="29">1990</option>
                                                                <option value="30">1989</option>
                                                                <option value="31">1988</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="javascript:void(0);" class="btn btn-success mt-1">Save</a>
                                            <a href="javascript:void(0);" class="btn btn-danger mt-1">Cancel</a>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Recently Connected</h3>
                                        </div>
                                        <div class="card-body p-5">
                                            <div class="memberblock mb-0">
                                                <div class="row ">
                                                    <div class="col-lg-2 col-md-3 col-lg-3 col-sm-4 col-xl-2 col-xs-4 ps-1 pe-1 m-t-5 mb-2">
                                                        <a href="" class="member br-5"><img class="br-t-5" src="{{asset('build/assets/images/users/13.jpg')}}" alt="">
                                                            <div class="memmbername br-b-5">Ajay Sriram</div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-lg-3 col-xl-2 col-sm-4 col-xs-4 ps-1 pe-1 m-t-5 mb-2">
                                                        <a href="" class="member br-5"><img class="br-t-5" src="{{asset('build/assets/images/users/8.jpg')}}" alt="">
                                                            <div class="memmbername br-b-5">Samantha</div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-lg-3 col-xl-2 col-sm-4 ps-1 pe-1 m-t-5 mb-2">
                                                        <a href="" class="member br-5"><img class="br-t-5" src="{{asset('build/assets/images/users/14.jpg')}}" alt="">
                                                            <div class="memmbername br-b-5">Stella</div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-lg-3 col-xl-2 col-sm-4 ps-1 pe-1 m-t-5 mb-2">
                                                        <a href="" class="member br-5"><img class="br-t-5" src="{{asset('build/assets/images/users/11.jpg')}}" alt="">
                                                            <div class="memmbername br-b-5">James</div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-lg-3 col-xl-2 col-sm-4 ps-1 pe-1 m-t-5 mb-2">
                                                        <a href="" class="member br-5"><img class="br-t-5" src="{{asset('build/assets/images/users/2.jpg')}}" alt="">
                                                            <div class="memmbername br-b-5">Christopher</div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-lg-3 col-xl-2 col-sm-4 ps-1 pe-1 m-t-5 mb-2">
                                                        <a href="" class="member br-5"><img class="br-t-5" src="{{asset('build/assets/images/users/15.jpg')}}" alt="">
                                                            <div class="memmbername br-b-5">Sriram</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-1 CLOSED -->

                            <!-- ROW-2 OPEN -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header ">
                                            <h3 class="card-title ">Projects</h3>
                                            <div class="card-options">
                                                <button id="add__new__list" type="button" class="btn btn-md btn-primary " data-bs-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add a new Project</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table card-table table-striped table-vcenter table-outline text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Project Name</th>
                                                        <th scope="col">Backend</th>
                                                        <th scope="col">Deadline</th>
                                                        <th scope="col">Team Members</th>
                                                        <th scope="col">Edit Project Details </th>
                                                        <th scope="col">list info</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>At vero eos et accusamus et iusto odio</td>
                                                        <td>PHP</td>
                                                        <td>15/11/2018</td>
                                                        <td>15 Members</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary" href="javascript:void(0);"><i class="fa fa-edit"></i> Edit</a>
                                                            <a class="btn btn-sm btn-danger" href="javascript:void(0);"><i class="fa fa-trash"></i> Delete</a>
                                                        </td>
                                                        <td><a class="btn btn-sm btn-secondary" href="javascript:void(0);"><i class="fa fa-info-circle"></i> Details</a> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>voluptatum deleniti atque corrupti quos</td>
                                                        <td>Angular js</td>
                                                        <td>25/11/2018</td>
                                                        <td>12 Members</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary" href="javascript:void(0);"><i class="fa fa-edit"></i> Edit</a>
                                                            <a class="btn btn-sm btn-danger" href="javascript:void(0);"><i class="fa fa-trash"></i> Delete</a>
                                                        </td>
                                                        <td><a class="btn btn-sm btn-secondary" href="javascript:void(0);"><i class="fa fa-info-circle"></i> Details</a> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>dignissimos ducimus qui blanditiis praesentium </td>
                                                        <td>Java</td>
                                                        <td>5/12/2018</td>
                                                        <td>20 Members</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary" href="javascript:void(0);"><i class="fa fa-edit"></i> Edit</a>
                                                            <a class="btn btn-sm btn-danger" href="javascript:void(0);"><i class="fa fa-trash"></i> Delete</a>
                                                        </td>
                                                        <td><a class="btn btn-sm btn-secondary" href="javascript:void(0);"><i class="fa fa-info-circle"></i> Details</a> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>deleniti atque corrupti quos dolores  </td>
                                                        <td>Phython</td>
                                                        <td>14/12/2018</td>
                                                        <td>10 Members</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary" href="javascript:void(0);"><i class="fa fa-edit"></i> Edit</a>
                                                            <a class="btn btn-sm btn-danger" href="javascript:void(0);"><i class="fa fa-trash"></i> Delete</a>
                                                        </td>
                                                        <td><a class="btn btn-sm btn-secondary" href="javascript:void(0);"><i class="fa fa-info-circle"></i> Details</a> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>et quas molestias excepturi sint occaecati</td>
                                                        <td>Phython</td>
                                                        <td>4/12/2018</td>
                                                        <td>17 Members</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary" href="javascript:void(0);"><i class="fa fa-edit"></i> Edit</a>
                                                            <a class="btn btn-sm btn-danger" href="javascript:void(0);"><i class="fa fa-trash"></i> Delete</a>
                                                        </td>
                                                        <td><a class="btn btn-sm btn-secondary" href="javascript:void(0);"><i class="fa fa-info-circle"></i> Details</a> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-2 CLOSED -->

@endsection

@section('scripts')

		 <!-- INTERNAL SELECT2 JS -->
		 <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
		@vite('resources/assets/js/select2.js')

@endsection
