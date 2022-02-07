@extends('layouts.user')

@push('css')

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ secure_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

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

                <div class="col-md-5 left_section_container">

                    <h3 style="text-align: left;"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>My Profile</h3>

                    @php

                        $user = Auth::user();

                    @endphp

                    <div class="row">

                        <br>

                        <div class="col-md-12 section_container">

                            <div class="row">

                                <div class="col-lg-12 profile_img_section">

                                    <div class="profiledx">    

                                        @if($user->profile_img)

                                            <img src="{{ route('getprofileimage', $user->profile_img ) }}"/>

                                        @else

                                            <img src="user/images/avatar_new.png">

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>                

                <div class="col-md-7 right_section_container">

                    <br><br>

                    <form action="{{ route('manageprofileuser') }}" method="POST" enctype="multipart/form-data">

                        @csrf                        

                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">First Name:</span>

                            <div class="col-sm-8">

                                <input type="text" name="name" class="form-control-plaintext borde text-muted" placeholder="Enter Your Name" value="{{$user->name}}"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Last Name:</span>

                            <div class="col-sm-8">

                                <input type="text" name="surname" class="form-control-plaintext borde text-muted" placeholder="Enter Your Name" value="{{$user->surname}}"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">MemberSince:</span>

                            <div class="col-sm-8">

                                <input id="memberSince" type="text" class="form-control-plaintext borde text-muted"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Member Id:</span>

                            <div class="col-sm-8">

                                <input type="text" readonly class="form-control-plaintext borde text-muted" placeholder="123456789" value="{{$user->id}}"/>

                            </div>

                        </div>


                        
                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Year Left:</span>

                            <div class="col-sm-8">
                                @php
                                // echo  'hiiii>>' ;print_r($userpackage); die; 
                                    if (isset($userpackage)){
                                        $year_left = $userpackage->year_left; 
                                    }else{
                                        $year_left = 0;
                                    }  
                                @endphp

                                <!-- <input id="yrleft" type="date" class="form-control-plaintext borde text-muted/"> -->

                                {{-- <input id="yrleft" type="text" class="form-control-plaintext borde text-muted/"> --}}
                                <input type="number" class="form-control-plaintext borde text-muted/" id="yrleft" name="year_left" min="1900" max="2099" step="1" placeholder="Year Left" value="{{$year_left}}"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Company:</span>

                            <div class="col-sm-8">

                                <input type="text" name="company" value="{{ $user->company }}" class="form-control-plaintext borde text-muted" placeholder="Jonathan & Smith"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Title:</span>

                            <div class="col-sm-8">

                                <input type="text" name="title"  value="{{ $user->title }}" class="form-control-plaintext borde text-muted" placeholder="VicePresident"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Email:</span>

                            <div class="col-sm-8">

                                <input type="email" name="email"   value="{{ $user->email }}" class="form-control-plaintext borde text-muted" placeholder="enter Your Email"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Phone:</span>

                            <div class="col-sm-8">

                                <input type="text" name="phone_no" value="{{ $user->phone_no }}" class="form-control-plaintext borde text-muted" placeholder="Phone No."/>

                            </div>

                        </div>

                        

                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Profile Image :</span>

                            <div class="col-sm-8">

                                <input type="file" class="" name="profile_img"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">

                                @if($user->notification == 1)

                                    <input type="checkbox" id="notification" name="notification" value="1" checked />

                                @else

                                    <input type="checkbox" id="notification" name="notification" value="1" />

                                @endif

                            </span>

                            <div class="col-sm-8">

                                I'm happy to receive correspondence from Belvedere Union                                

                            </div>

                        </div>



<!--                        <div class="form-group row">

                            <span   class="col-sm-4 displa-4 col-form-label">Current Passwod :</span>

                            <div class="col-sm-8">

                                <input type="password" name="current_password"  class="form-control-plaintext borde text-muted" placeholder="Enter Current Password">

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

                                <input type="password" name="new_confirm_password"  class="form-control-plaintext borde text-muted" placeholder="Confirm Password">

                            </div>

                        </div>-->

                        <div class="form-group float-right">

                            <div id="advertiserpay"></div>

                            <input class="center btn btn-lg btn-fill" type="submit" placeholder="Submit" id="advertiserformbtn" value="Update Profile"/>

                        </div>

                    </form>

                </div>                

            </div>

        </div>

    </div>

@endsection

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

<script type="text/javascript">

    $("#memberSince").datepicker({format: 'dd-mm-yyyy'});

    // $("#yrleft").datepicker({format: 'dd-mm-yyyy'});

</script>

@endpush