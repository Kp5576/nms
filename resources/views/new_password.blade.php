
@extends('layouts.custom-master')

@section('styles')



@endsection

@section('content')

            <div class="">
				<div class="col col-login mx-auto mt-7">
					<div class="text-center">
						<a href="{{url('index')}}">
							<img src="{{asset('build/assets/images/brand/logo.png')}}" class="header-brand-img" alt="logo">
						</a>
					</div>
				</div>
				<!-- CONTAINER OPEN -->
				<div class="container-login100">
					<div class="wrap-login100 p-5">
							<div class="text-center mb-4">
								<img src="{{asset('build/assets/images/users/10.jpg')}}" alt="lockscreen image" class="avatar avatar-xxl brround mb-2">
								<h4></h4>
							</div>
						<form action="{{route('new_password.action')}}" method="POST" class="login100-form validate-form">
							@csrf
							<div class="wrap-input100" data-validate="Email is required">
								<input class="input100" type="email" name="email" placeholder="Email">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<div class="wrap-input100 validate-input" data-validate="Password is required">
								<input class="input100" type="password" name="password" placeholder="Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
							<div class="wrap-input100 validate-input" data-validate="Password is required">
								<input class="input100" type="password" name="conform_password" placeholder="Conform Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
							<div class="container-login100-form-btn pt-2">
								<button type="submit" name="submit" class="login100-form-btn btn-primary">
									Reset Password
								</button>
								
							</div>
							<div class="text-center pt-2">
								<span class="txt1">
									I Forgot
								</span>
								<a class="txt2" href="{{url('forgot-password')}}">
									Give me Hint
								</a>
							</div>
						</form>
					</div>
				</div>
				<!-- CONTAINER CLOSED -->
			</div>

@endsection

@section('scripts')



@endsection
