
@extends('layouts.custom-master')

@section('styles')

@endsection

@section('content')

<div class="">
    <!-- CONTAINER OPEN -->
    <div class="col col-login mx-auto mt-7">
        <div class="text-center">
            <a href="{{url('index')}}" style="font-size:30px;font-weight:bold;color:white;">
                NMS
            </a>
        </div>
    </div>
    
    <div class="container-login100">
        <div class="wrap-login100 p-6">
            <form action="{{ url('/login') }}" method="post" class="login100-form validate-form">
            @csrf
                <span class="login100-form-title">
                    Login
                </span>
                @if (session('success'))
                <div id="success-alert" class="alert alert-success alert_show">
                    {{ session('success') }}
                </div>
            @endif  
            @if (session('error'))
                <div id="error-alert" class="alert alert-danger alert_show">
                    {{ session('error') }}
                </div>
            @endif
                <div class="wrap-input100 validate-input mb-4" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="zmdi zmdi-email" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn btn-primary">
                        Login
                    </button>
                </div>
                <div class="text-end pt-1">
                    <p class="mb-0"><a href="{{route('forget_password')}}" class="text-primary ms-1">Forgot Password?</a></p>
                </div>
                
            </form>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
</div>

@endsection

@section('scripts')



@endsection
