@extends('layouts.user')

@push('css')
    <link href="user/css/main.css" rel="stylesheet" />
    <style>
        .tttext {

            display: block;

            width: 200px;

            overflow: hidden;

            white-space: nowrap;

            text-overflow: ellipsis;

        }

    </style>



@endpush

@section('content')

    <div class="xt-page-title-area">

        <div class="xt-page-title">

            <div class="container">

                <h1 class="entry-title">Events</h1>

            </div>

        </div>

        <div class="xt-breadcrumb-wrapper">

            <div class="container">

                <nav class="xt-breadcrumb">

                    <ul>

                        <li><a href="/" itemprop="url">Home</a></li>

                        <li class="current">Event</li>

                    </ul>

                </nav>

            </div>

        </div>

    </div>

    <!-- inner banner end -->

    <div class="container">

        <section class="reptro-section-padding-large elementor-top-section">

            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Upcoming Events</span></h2>

            <!-- <p class="section-title-small text-center  section-title-small-border-yes">Lorem ipsum dolor sit amet,

                                consectetuer.</p> -->



            <p class="text-center  section-title-small-border-yes">To be announced at a later date.</p>


            <p class="text-center  section-title-small-border-yes">Booking for the annual Dinner is now closed. There are
                still places available at some tables. If you would still like to attend please email the union office at
                belvedereunion@belvederecollege.ie</p>




            <div class="s010">
                <form action="{{ url('event-search') }}" method="get">
                    <div class="inner-form">
                        <!-- <div class="basic-search">
                                    <div class="input-field">
                                    <input id="search" type="text" placeholder="Type Keywords" />
                                    <div class="icon-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                        </svg>
                                    </div>
                                    </div>
                                </div> -->
                        <div class="advance-search">
                            <!-- <span class="desc">ADVANCED SEARCH</span> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field_new">
                                        <!-- <div class="input-select">
                                                <select data-trigger="" name="choices-single-defaul">
                                                    <option placeholder="" value="">Enter Key words</option>
                                                    <option>Company name b</option>
                                                    <option>Company name c</option>
                                                </select>
                                                </div> -->
                                        <input id="search_new" class="search_new" name="query" type="text"
                                            placeholder="Enter Keywords" />
                                        <div id="suggestionList"></div>
                                    </div>
                                </div>
                                <!-- <div class="input-field">
                                            <div class="input-select">
                                                <select data-trigger="" name="choices-single-defaul">
                                                    <option placeholder="" value="">Company name</option>
                                                    <option>Company name b</option>
                                                    <option>Company name c</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-field">
                                            <div class="input-select">
                                                <select data-trigger="" name="choices-single-defaul">
                                                    <option placeholder="" value="">Select position</option>
                                                    <option>Position b</option>
                                                    <option>Position c</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-field">
                                            <div class="input-select">
                                                <select data-trigger="" name="choices-single-defaul">
                                                    <option placeholder="" value="">Sort Result</option>
                                                    <option>Ascending Order</option>
                                                    <option>Descending Order</option>
                                                </select>
                                            </div>
                                        </div> -->
                            </div>
                            <!-- <div class="row second">
                                            <div class="input-field">
                                                <div class="input-select">
                                                <select data-trigger="" name="choices-single-defaul">
                                                    <option placeholder="" value="">Sale</option>
                                                    <option>Subject b</option>
                                                    <option>Subject c</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="input-field">
                                                <div class="input-select">
                                                <select data-trigger="" name="choices-single-defaul">
                                                    <option placeholder="" value="">Time</option>
                                                    <option>Last time</option>
                                                    <option>Today</option>
                                                    <option>This week</option>
                                                    <option>This month</option>
                                                    <option>This year</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="input-field">
                                                <div class="input-select">
                                                <select data-trigger="" name="choices-single-defaul">
                                                    <option placeholder="" value="">Type</option>
                                                    <option>Subject b</option>
                                                    <option>Subject c</option>
                                                </select>
                                                </div>
                                            </div>
                                            </div> -->
                            <div class="row third">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <!-- <div class="result-count">
                                                    <span>108 </span>results
                                                </div> -->
                                        <div class="group-btn search-dv">
                                            <input class="btn-delete" type="reset" value="Reset" />
                                            <!-- <button class="btn-delete" id="delete">RESET</button> -->
                                            <button class="btn-search">SEARCH</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <ul class="row reptro-course-items event">



                @foreach ($data as $item)

                    @php
                        $timestemp = $item['fromdate'];
                        
                        $year = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->year;
                        
                        $month = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->month;
                        
                        $day = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->day;
                    @endphp



                    <li class="course  col-lg-4 col-md-6">

                        <div class="reptro-course-loop-thumbnail-area">

                            <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg"
                                    href="{{ url('eventdetail/' . $item['id']) }}">Details</a></div>

                            <div class="course-thumbnail"> <img width="570" height="461"
                                    src="imagess/{{ $item['image'] }}"></div>

                        </div>

                        <div class="reptro-course-item-inner"> <a href="#" class="course-permalink">

                                <h3 class="course-title">{{ $item->title }}</h3>

                            </a>

                            <div class="event-info">

                                <div class="reptro-event-date">

                                    <span class="reptro-event-day">{{ $day }}</span>

                                    <span class="reptro-event-month">{{ date('F', mktime(0, 0, 0, $month, 10)) }}</span>

                                    <span class="reptro-event-year">{{ $year }}</span>

                                </div>

                                <div class="venueTime">

                                    <span class="reptro-event-time tttext"> <i class="sli-clock"></i>Thursday,
                                        {{ $item['time'] }}</span>

                                    <span class="reptro-event-venue tttext"><i
                                            class="sli-location-pin"></i>{{ $item['address'] }}</span>

                                </div>

                            </div>

                        </div>

                @endforeach

            </ul>





            <!-- <div class="text-center reptro-all-courses-btn"> <a class="btn btn-lg btn-fill" href="#">All Events</a></div> -->

        </section>

    </div>





    <!-- ********footer********** -->

    @include('user.include.sponser')

@endsection
