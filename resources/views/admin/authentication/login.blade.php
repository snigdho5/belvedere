@extends('admin.layout.authentication')
@section('title', 'Login')

@section('content')

    <div class="auth_brand">
        <a class="navbar-brand" href="#">
            <img src="{{ secure_url('assets/images/icon.svg') }}" width="50" class="d-inline-block align-top mr-2" alt="">
            <strong>Belvedere</strong> Union
        </a>                                                
    </div>
    <div class="card">
        <div class="header">
            <p class="lead">Login to your account</p>
        </div>
        <div class="center" style="font-size: 15px; color: red; text-transform: uppercase;">
            @if ($errors->any())
                {{ implode('', $errors->all()) }}
            @endif
        </div>
        <div class="body">
            <form class="form-auth-small" method="post" action="{{ route('access-check') }}">
                @csrf
                <div class="form-group c_form_group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email address" value="{{ old('email') }}"/>
                </div>
                <div class="form-group c_form_group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password"/>
                </div>
                <div class="form-group clearfix">
                    <label class="fancy-checkbox element-left">
                        <input type="checkbox">
                        <span>Remember me</span>
                    </label>								
                </div>
                <div class="xt_sign_up_now_field xt_sign_up_now_submit">
                    <input class="btn btn-dark btn-lg btn-block" type="submit" value="Submit"/>
                </div>
                <div class="bottom">
                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{url('authentication.forgotpassword')}}">Forgot password?</a></span>
                    <span>Don't have an account? <a href="{{url('authentication.register')}}">Register</a></span>
                </div>                
            </form>
        </div>
    </div>

@stop
