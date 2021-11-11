@extends('layouts.user')

@push('css')

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>

        .borde{

            border-radius: 0.55rem!important;

        }

    </style>

@endpush

@section('content')

 

<script
src="https://www.paypal.com/sdk/js?client-id=AdSuJbD9cyJpGbooPSf3Z963eDNCJ1TXJVmHEB6oOXJKqpbI9S0TYyB1vHT4wuZdNtPUmP6u9LwXNUOA&disable-funding=credit,card&currency=EUR">
</script>



    <div class="xt-page-title-area">

        <div class="xt-page-title">

            <div class="continer">

                <h1 class="entry-title">DashBoard</h1>

            </div>

        </div>

        <div class="xt-breadcrumb-wrapper">

            <div class="continer">

                <nav class="xt-breadcrumb">

                    <ul>

                        <li><a href="#">Home</a></li>

                        <li class="current">DashBoard</li>

                    </ul>

                </nav>

            </div>

        </div>

    </div>



    <div class="container">

        <div class="theme-main-content-inner row justify-content-center">

            @include('user.include.dheader')

            <div class="row profile_page_container">

                <div class="col-md-12 right_section_container">

                    <br><br>

                    <form action="{{ route('userchangepword') }}" method="POST">

                        @csrf

                        @php

                        $user = Auth::user();

                        @endphp

                        <div class="form-group row d-none">

                            <span   class="col-sm-4 displa-4 col-form-label">Member Id:</span>

                            <div class="col-sm-8">

                                <input type="text" readonly class="form-control-plaintext borde text-muted" placeholder="123456789" value="{{$user->id}}">

                            </div>

                        </div>



                        <div class="form-group row">

                            <span   class="col-sm-4 displa-4 col-form-label">Current Passwod :</span>

                            <div class="col-sm-8">

                                <input type="password" name="old_password"  class="form-control-plaintext borde text-muted" placeholder="Enter Current Password">

                            </div>

                        </div>



                        <div class="form-group row">

                            <span   class="col-sm-4 displa-4 col-form-label">New Password :</span>

                            <div class="col-sm-8">

                                <input type="password" name="new_password"  class="form-control-plaintext borde text-muted" placeholder="New Password">

                            </div>

                        </div>



                        <div class="form-group row">

                            <span   class="col-sm-4 displa-4 col-form-label">New Confirm Password :</span>

                            <div class="col-sm-8">

                                <input type="password" name="confirm_password"  class="form-control-plaintext borde text-muted" placeholder="Confirm Password">

                            </div>

                        </div>

                        <div class="form-group float-right">

                            <div id="advertiserpay"></div>

                            <input class="center btn btn-lg btn-fill" type="submit" placeholder="Submit" id="advertiserformbtn" value="change password"/>

                        </div>

                    </form>

                </div>                

            </div>

        </div>

    </div>

@endsection

@push('js')

@endpush