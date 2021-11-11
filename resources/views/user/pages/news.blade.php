@extends('layouts.user')

@section('content')
    <div class="xt-page-title-area">
        <div class="xt-page-title">
            <div class="container">
                <h1 class="entry-title">News</h1>
            </div>
        </div>
        <div class="xt-breadcrumb-wrapper">
            <div class="container">
                <nav class="xt-breadcrumb">
                    <ul>
                        <li><a href="/" itemprop="url">Home</a></li>
                        <li class="current">News</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- inner banner end -->
    <div class="container">
        <section class="reptro-section-padding-large elementor-top-section">
            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>News</span></h2>
            <p class="section-title-small text-center  section-title-small-border-yes">Lorem ipsum dolor sit amet, consectetuer.</p>
            <ul class="row reptro-course-items event">
                @foreach ($data as $item)
                    @if($item->status != 0)
                        <li class="course  col-lg-4 col-md-6">
                            <div class="reptro-course-loop-thumbnail-area">
                                <div class="reptro-course-details-btn">
                                    <a class="btn btn-fill btn-lg" href="{{ url('news/'.$item['id']) }}">Details</a>
                                </div>
                                <div class="course-thumbnail">
                                    <img width="570" height="461" src="{{ $item['image'] }}">
                                </div>
                            </div>
                            <div class="reptro-course-item-inner">
                                <a href="#" class="course-permalink">
                                    <h3 class="course-title">{{ $item->title }}</h3>
                                </a>
                                <div class="event-info">
                                    
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
            <!-- <div class="text-center reptro-all-courses-btn"> <a class="btn btn-lg btn-fill" href="#">All Events</a></div> -->
        </section>
    </div>


    <!-- ********footer********** -->
    @include('user.include.sponser')
@endsection
