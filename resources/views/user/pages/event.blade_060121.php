@extends('layouts.user')
@push('css')
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
            <p class="section-title-small text-center  section-title-small-border-yes">Lorem ipsum dolor sit amet,
                consectetuer.</p>

            <ul class="row reptro-course-items event">

                @foreach ($data as $item)
                        @php
                            
                            $timestemp = $item['date'];
                            $year = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->year;
                            $month = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->month;
                            $day = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->day;
                                
                        @endphp
               
                <li class="course  col-lg-4 col-md-6">
                    <div class="reptro-course-loop-thumbnail-area">
                        <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg"
                                href="{{ url('eventdetail/'.$item['id']) }}">Details</a></div>
                        <div class="course-thumbnail"> <img width="570" height="461" src="imagess/{{ $item['image'] }}"></div>
                    </div>
                    <div class="reptro-course-item-inner"> <a href="#" class="course-permalink">
                            <h3 class="course-title">{{ $item->title }}</h3>
                        </a>
                        <div class="event-info">
                            <div class="reptro-event-date"> <span class="reptro-event-day">{{ $day }}</span> <span
                                    class="reptro-event-month">{{ $month }}</span> <span class="reptro-event-year">{{ $year }}</span></div>
                            <div class="venueTime">
                                <span class="reptro-event-time tttext"> <i class="sli-clock"></i>Thursday, {{ $item['time'] }}
                                </span>
                                <span class="reptro-event-venue tttext"><i class="sli-location-pin"></i>{{ $item['address'] }}</span>
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
