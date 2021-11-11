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

                <div class="col-md-5 left_section_container">

                    <h3 style="text-align: left;"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Manage Logo</h3>

                    @php

                        $user = Auth::user();

                    @endphp

                    <div class="row">

                        <br>

                        <div class="col-md-12 section_container">

                            <div class="row">

                                <div class="col-lg-12 profile_img_section">

                                    <div class="profiledx"> 

                                        @php

                                            if(count($sponser)){

                                                $logoImage      =   $sponser[0]->image;

                                                $title          =   $sponser[0]->title;

                                                $link           =   $sponser[0]->link;

                                            }

                                            else{

                                                $logoImage      =   '';

                                                $title          =   '';

                                                $link           =   '';

                                            }

                                        @endphp

                                        @if(count($sponser) || $logoImage)

                                            <img src="{{ route('getsponsorimage', $sponser[0]->image ) }}"/>

                                        @else

                                            <img src="user/images/avatar_new.png"/>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                

                <div class="col-md-7 right_section_container">

                    <br><br>

                    <form action="{{ route('managesponsor') }}" method="POST" enctype="multipart/form-data">

                        @csrf



                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Title :</span>

                            <div class="col-sm-8">

                                <input type="text" name="title" value="{{ $title }}" class="form-control-plaintext borde text-muted" placeholder="Enter Title"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Link :</span>

                            <div class="col-sm-8">

                                <input type="text" name="link" value="{{ $link }}" class="form-control-plaintext borde text-muted" placeholder="Enter Link"/>

                            </div>

                        </div>

                        

                        <div class="form-group row">

                            <span class="col-sm-4 displa-4 col-form-label">Sponsor Logo :</span>

                            <div class="col-sm-8">

                                <input type="file" class="" name="image"/>

                                <input type="hidden" name="user_id" value="{{ $user->id }}"/>

                            </div>

                        </div>

                        <div class="form-group row">

                            <span class="col-sm-12 displa-12 col-form-label"><small>Note : max uploaded size 2MB. File type png (Image size 500 x 200)</small></span>

                        </div>

                        <div class="form-group float-right">

                            <div id="advertiserpay"></div>

                            <input class="center btn btn-lg btn-fill" type="submit" value="Save"/>

                        </div>

                    </form>

                </div>                

            </div>

        </div>

    </div>

@endsection

@push('js')

@endpush