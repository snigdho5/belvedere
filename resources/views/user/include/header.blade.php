<?php

$data = layoutDataData;

// dd($data);

$twitterLink = isset($data['twit_link']) ? $data['twit_link'] : '';

$fbLink = isset($data['fb_link']) ? $data['fb_link'] : '';

$googleLink = isset($data['google_link']) ? $data['google_link'] : '';

$linkedinLink = isset($data['linkedin_link']) ? $data['linkedin_link'] : '';

$youtubeLink = isset($data['youtube_link']) ? $data['youtube_link'] : '';

$email = isset($data['mail']) ? $data['mail'] : '';

$phoneNo = isset($data['phone_no']) ? $data['phone_no'] : '';

$headerLogo = isset($data['header_logo']) ? $data['header_logo'] : '';

?>

<header class="xt-head-2">

    <div class="xt-header-top">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-8">

                    <div class="xt-pre-header-left-content"><span class="xt-business-email"><i
                                class="sli-paper-plane"></i><a
                                href="mailto:{{ $email }}">{{ $email }}</a></span> <span
                            class="xt-business-phone"><i class="sli-phone"></i><a
                                href="tel:{{ $phoneNo }}">{{ $phoneNo }}</a></span></div>

                </div>

                <div class="col-lg-4 col-md-4">

                    <div class="header-social text-right">

                        <ul>

                            <li><a href="{{ $twitterLink }}" target="_blank"><i class="fa fa-twitter"></i></a></li>

                            <li><a href="{{ $fbLink }}" target="_blank"><i class="fa fa-facebook"></i></a></li>

                            {{-- <li><a href="{{$googleLink}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>

                                <li><a href="{{$linkedinLink}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>

                                <li><a href="{{$youtubeLink}}" target="_blank"><i class="fa fa-youtube-play"></i></a></li> --}}

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <nav class="navbar  navbar-expand-lg navbar-light top-navbar" data-toggle="sticky-onscroll">

        <div class="container">

            <a class="navbar-brand" href="{{ secure_url('/') }}"><img src="{{ $headerLogo }}" alt=""
                    class="toplogo"> <span class="cname">Belvedere Union</span></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse justify-content-end xt-navbar-main-menu" id="navbarSupportedContent">

                <ul class="nav-menu nav navbar-nav navbar-right">

                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">

                        <a class="nav-link" href="{{ secure_url('/') }}">Home</a>

                    </li>



                    <li
                        class="nav-item {{ request()->is('about') ? 'active' : '' }}

                            {{ request()->is('whyjoin') ? 'active' : '' }}

                            {{ request()->is('committi') ? 'active' : '' }}">

                        <a class="nav-link" href="javascript:void(0);">About Us</a>

                        <ul class="dropdown-menu">

                            <li><a href="{{ secure_url('about') }}">About Belvedere Union</a></li>

                            <li><a href="{{ secure_url('whyjoin') }}">Why Join</a></li>

                            <li><a href="{{ secure_url('committi') }}">Committee Members</a></li>

                        </ul>

                    </li>


                    <li
                        class="nav-item {{ request()->is('event') ? 'active' : '' }}

                            {{ request()->is('archived-events') ? 'active' : '' }}">

                        <a class="nav-link" href="javascript:void(0);">Events</a>

                        <ul class="dropdown-menu">

                            <li><a href="{{ secure_url('event') }}">Upcoming Events</a></li>

                            <li><a href="{{ secure_url('archived-events') }}">Past Events</a></li>

                        </ul>

                    </li>



                    {{-- <li class="nav-item {{ request()->is('careers') ? 'active' : '' }}

                            {{ request()->is('advertiser') ? 'active' : '' }}

                            ">

                            <a class="nav-link" href="javascript:void(0);">Careers</a>

                            <ul class="dropdown-menu">

                                <li><a href="{{ url('careers') }}">Job Vacancies</a></li>

                                @guest

                                <li><a href="{{ url('advertiser') }}">Advertise Job Vacancies</a></li>

                                @endauth

                            </ul>

                        </li> --}}

                    @guest

                        {{-- <li class="nav-item {{ request()->is('advertiser') ? 'active' : '' }}">

                            <a class="nav-link" href="{{ asset('advertiser') }}">Advertiser</a>

                        </li> --}}

                        <li class="nav-item {{ request()->is('sponsor') ? 'active' : '' }}">

                            <a class="nav-link" href="{{ secure_url('sponsor') }}">Sponsor</a>

                        </li>

                    @endauth

                    <li class="nav-item">

                        <a class="nav-link" href="javascript:void(0);">Donate</a>

                        <ul class="dropdown-menu">

                            <li><a href="https://www.belvedereyouthclub.ie/Donate/" target="_blank">Belvedere Youth
                                    Club</a></li>

                            <li><a href="{{ secure_url('belvederebenevolentassociation') }}">Belvedere Benevolent
                                    Association</a></li>

                            <li><a href="javascript:void(0);">St. Vincent de Paul</a></li>

                        </ul>

                    </li>

                    <li class="nav-item {{ request()->is('contactus') ? 'active' : '' }}">

                        <a class="nav-link" href="contactus">Contact Us</a>

                    </li>

                </ul>

                @guest

                    <div class="reptro-header-profile-img singtop"> <a class="btn btn-lg btn-fill"
                            href="{{ route('auth-login') }}">Member Login</a>

                    </div>

                @endauth

                @auth()

                    <div class="reptro-header-profile-img singtop"> <a class="btn btn-lg btn-fill"
                            href="{{ route('dashboard') }}">My Account</a>

                    </div>

                @endauth

            </div>

        </div>

    </nav>

</header>

<!-- End top header-->
