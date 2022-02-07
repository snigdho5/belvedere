@extends('layouts.user')
@push('css')
<style>
    .MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
    .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
        .MultiCarousel .MultiCarousel-inner .item { float: left;}
        .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:10px; background:#fefefe; color:rgb(0, 0, 0);}
    .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
    .MultiCarousel .leftLst { left:0; }
    .MultiCarousel .rightLst { right:0; }
    
        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ee192b; }
</style>
@endpush
@section('content')
<section>
    <div class="reptro-hero-area">
        <div class="reptro-hero-area-right reptro-hero-area-column" style="background-image: url(user/images/hero-min.jpg)"></div>
        <div class="reptro-hero-area-left reptro-hero-area-left-custom-bg-no reptro-hero-area-column">
           <h2>Login</h2>
            <p>Not a member yet? <a href="{{ url('reg') }}" style="color: white"> Register here.</a></p>
            <div class="wpcf7 left">
                <form class="wpcf7-form init demo" method="post" action="{{ route('login-check') }}">
                    @csrf
                    <div class="xt_sign_up_now_field">
                        <input type="Email" name="email" value="" placeholder="Email Address">
                    </div>
                    <div class="xt_sign_up_now_field">
                        <input type="Password" name="password" value="" placeholder="Password">
                    </div>
                    <div class="xt_sign_up_now_field xt_sign_up_now_submit"><input type="submit" value="Submit"></div>


                   
                </form>



            </div>
            <!-- <a class="reptro-hero-area-play-btn" data-fancybox href="https://youtu.be/AGBjI0x9VbM"><i aria-hidden="true" class="fa fa-play"></i></a> -->
        </div>
    </div>
</section>
<section class="aboutsec">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="reptro-section-title margin-bottom-medium"><span>{{isset($cmsData->title)?$cmsData->title:''}}</span></h3>
                <div class="text-section">
                    {!!isset($cmsData->description)?$cmsData->description:''!!}
                </div>
                <div class=" repto-button-border  elementor-widget-button"> <a href="about.html" class=" elementor-button"> <span class="elementor-button-text">Read More</span> </a></div>
            </div>
            <div class="col-lg-6">
                <div class="xt-video xt-video-popup-type-with_image">
                    <div class="xt-video-img"><img src="user/images/about-6-min.jpg" alt="">
                        <div class="xt-video-overlay"><a class="xt-video-popup-btn" data-fancybox="" href="https://youtu.be/AGBjI0x9VbM"><span class="video-popup-play-icon"></span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="UEvents">
    <div class="container">
        <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Upcoming Events and Reunions</span></h2>
        <p class="section-title-small text-center  section-title-small-border-yes">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
        <ul class="reptro-course-items row">
            @foreach($eventData as $key=>$val)
            <li class="col-lg-4 col-md-6 course">
                <div class="reptro-course-loop-thumbnail-area">
                    <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="#">Details</a></div>
                    <div class="course-thumbnail"> <img width="570" height="461" src="user/images/markus-spiske-357131-unsplash-copy-1-570x461.jpg"></div>
                    <div class="reptro-course-loop-price-and-rating">
                        <div class="course-price"> <span class="price">€{{$val->cost}}</span></div>
                        <div class="xt-course-review">
                            <div class="xt-review-stars-wrapper">
                                <ul class="xt-review-stars">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                                <ul class="xt-review-stars xt-fill" style="width: {{$key<5?$key*20:5*20}}%">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                            </div> <span>(1 review)</span>
                        </div>
                    </div>
                </div>
                <div class="reptro-course-item-inner"> <a href="#" class="course-permalink">
                        <h3 class="course-title">{{$val->title}}</h3>
                    </a>
                    <!-- <div class="course-info"> <span class="course-instructor"> <a href="#">Imran</a></span> <span class="course-students" title="<span class=&quot;course-students-number&quot;>41</span> students enrolled"> 41 students </span></div> -->
                </div>
            </li>
            @endforeach
        </ul>
        <div class="text-center reptro-all-courses-btn"> <a class="btn btn-lg btn-fill" href="events.html">All Events</a></div>
    </div>
</section>
<div class="container">
    <h2 class="reptro-section-title text-center margin-bottom-xsmall section-title-type-border"><span>Our Clubs and Societies</span></h2>
</div>
<section class="SsuccessSec xt_row_primary_bg_color_white">
    <div class="container">
        <div class="row">
          
            @foreach($ourClubData as $val)
            
            <div class="col-md-4">
                <div class="Ssuccess-counter">
                    <div class="counter-number-wrapper">
                        <span class="count">{{$val->title}}</span>
                    </div>
                    <a class="btn btn-md btn-border" target="_blank" href="{{$val->link}}">Read More</a>
                    <a class="reptro-call-to-action-btn btn-md" href="#">Donate</a>
                </div>
            </div>
            @endforeach

 

</section>
<section class="LNews">
    <div class="container">
        <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Latest News</span></h2>
        <p class="section-title-small text-center  section-title-small-border-yes">EDUCATION NEWS ALL OVER THE WORLD.</p>
        <div class="row">
            @foreach($blogData as $key=>$val)
            <article class="col-lg-4 col-md-6 tag-study">
                <div class="xt-post-item">
                    <div class="xt-post-item-thumb">
                        <figure> <a href="#"><img src="{{$val->image}}" alt=""></a></figure>
                        <div class="xt-post-item-categories"> <a href="#">eLearning</a></div>
                    </div>
                    <div class="xt-post-item-content">
                        <div class="xt-post-item-date">{{date("F j, Y",strtotime($val->created_at))}}</div>
                        <h4 class="xt-post-item-title"><a href="#">{{$val->title}}</a></h4>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
<section class="OSponsors">
    <div class="container">
        <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Our Sponsors</span></h2>
        <p class="section-title-small text-center  section-title-small-border-yes"><a href="#">Become a Sponsor</a> | <a href="">Sponsor Benefits</a></p>
        
        <div class="container">
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                        
        
                        @foreach ($oursponser as $item)
        
                        <div class="item">
                            <div class="pad15">
                                <img src="{{ asset('imagess/thumb-'.$item->image) }}" class="img-responsive">
                            </div>
                        </div>
        
                        @endforeach
             
                        
                        
                         
                    </div>
                    <button class="btn  leftLst"><</button>
                    <button class="btn  rightLst">></button>
                </div>
            </div>
           
        </div>
 
        
    </div>
</section>




<section class="BMember">
    <div class="section-background-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="reptro-ctl-area reptro-ctl-default">
                <div class="reptro-ctl-content-wrapper">
                    <div class="reptro-ctl-icon"> <i class="fa fa-envelope-open-o" aria-hidden="true"></i></div>
                    <div class="reptro-ctl-content">
                        <h2 class="BMember-title">Employment Opportunities</h2>
                        <p class="BMember-text"><span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </span></p>
                    </div>
                    <div class="reptro-ctl-button"> <a class="btn btn-lg btn-border" href="#">View All</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
$(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
</script>
@endpush