@extends('layouts.user')
@section('content') 
    <div class="xt-page-title-area">
        <div class="xt-page-title">
            <div class="container">
                <h1 class="entry-title">Committee Members</h1>
            </div>
        </div>
        <div class="xt-breadcrumb-wrapper">
            <div class="container">
                <nav class="xt-breadcrumb">
                    <ul>
                        <li><a href="/" itemprop="url">Home</a></li>
                        <li class="current">Committee Members</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- inner banner end -->
    <div class="container">
        <section class="reptro-section-padding-large elementor-top-section" style="padding-top: 35px;padding-bottom: 20px;">
            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Executive Members</span></h2>

            <ul class="row reptro-course-items event">
				<li class="col-lg-3 col-md-3"></li>
                @foreach ($member->where('type','executivemembers') as $item)
                    
				<?php
					if($item->name == 'Darragh Lynch'){
				?>
                <li class="course  col-lg-6 col-md-6">
                    <div class="reptro-course-loop-thumbnail-area thumb-cx">
                        <div class="course-thumbnail">
                            <img width="570" height="461" src="user/images/m.jpg">
                        </div>
                    </div>
                    <div class="reptro-course-item-inner comt-info"> <a href="#" class="course-permalink">
                            <h3 class="course-title">{{ $item->name }}</h3>
                        </a>
                        <div class="event-info">
                            <div class="venueTime">
                                <span class="reptro-event-time"> <i class="sli-clock"></i>{{ $item->post }}</span>
                            </div>
                        </div>
                    </div>
                </li>
				<?php
					}
				?>
                @endforeach
                <li class="col-lg-3 col-md-3"></li>
            </ul>


            <!-- <div class="text-center reptro-all-courses-btn"> <a class="btn btn-lg btn-fill" href="#">All Events</a></div> -->
        </section>
    </div>

    <section class="OSponsors" style="padding-top: 35px;padding-bottom: 40px;">
        <div class="container">
		
		
            
            @foreach ($member->where('type','vicepresident') as $item)
			<div class="row">	
				<div class="col-sm-6">
					<h4 class="reptro-section-title text-center margin-bottom-xsmall" style="margin-bottom:5px;"><span>Brian O’Neill</span> </h4>
				
					<p class="section-title-small text-center" style="margin-bottom:60px;font-size:13px;">Senior Vice President  OB88</p>
				</div>
				
				<div class="col-sm-6">
					<h4 class="reptro-section-title text-center margin-bottom-xsmall" style="margin-bottom:5px;"><span>John Doyle</span> </h4>
				
					<p class="section-title-small text-center" style="margin-bottom:60px;font-size:13px;">President Elect OB88</p>
              	</div>
			</div>	
			@endforeach
			
       
            <div class="row" style="padding-left:13%;">
                <div class="col-lg-4 col-md-6 logo-item">
				<h4  style="padding-bottom: 10px;"><span>Past Presidents</span> </h4>
                  
                @foreach ($member->where('type','pastpresident') as $item)
                   <h5 class="team">{{ $item->name }}</h5>
                   <span class="reptro-event-time">{{ $item->post }}</span>
                   @endforeach
                    

                   


                </div>
                <div class="col-lg-4 col-md-6 logo-item">
				<h4 style="padding-bottom: 10px;"><span>Committee Members</span> </h4>
                    
                @foreach ($member->where('type','committeemember') as $item)
                <h5 class="team">{{ $item->name }}</h5>
                <span class="reptro-event-time">{{ $item->post }}</span>
                @endforeach

                </div>
                <div class="col-lg-4 col-md-6 logo-item">
                <h4  style="padding-bottom: 10px;"><span>Junior Union</span> </h4>
                
                @foreach ($member->where('type','juniorunion') as $item)
                <h5 class="team">{{ $item->name }}</h5>
                
                @endforeach
                    

                </div>
                
            </div>
        </div>
    </section>


@endsection
@push('js')

@endpush
