@extends('layouts.user')
@push('css')
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .borde{
            border-radius: 0.55rem!important;
        }
        
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
 
    <script src="https://www.paypal.com/sdk/js?client-id=AVZGP8lxfDPrBPU_7JIIl6HO2uw3zFSSm1Nr7Y_x55PIFcqGSWALbpRjv_XR-GbANoDc2bMYk8-wYLQp&disable-funding=credit,card"></script>

    <div class="xt-page-title-area">
        <div class="xt-page-title">
            <div class="continer">
                <h1 class="entry-title">DashBoard</h1> </div>
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
        <div class="theme-main-content-inner row  justify-content-center">           
            <div class="row  profile_page_container">
                {{-- </div class="col-lg-12"> --}}
                @include('user.include.dheader')
                <div class="col-md-1">
                </div>
                <div class="col-md-11">
                    <h3 style="text-align: left;"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>My Events</h3>                     
                </div>                
                <ul class="row reptro-course-items event">
                    <div class="col-md-1">
                    </div>
                    @foreach ($data as $item)
                            @php                                
                                $timestemp = $item['fromdate'];
                                $year = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->year;
                                $month = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->month;
                                $day = Carbon\Carbon::createFromFormat('Y-m-d', $timestemp)->day;                                    
                            @endphp                   
                        <li class="course  col-lg-3">
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
                                        <span class="reptro-event-time"> <i class="sli-clock"></i>Thursday, {{ $item['time'] }}
                                        </span>
                                        <span class="reptro-event-venue tttext"><i class="sli-location-pin"></i>{{ $item['address'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach     
                </ul>
            {{--</div>--}}
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush