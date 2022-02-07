@extends('layouts.user')
@section('content')
<section>
    <div class="reptro-hero-area">
        <div class="reptro-hero-area-right reptro-hero-area-column" style="background-image: url(user/images/hero-min.jpg)"></div>
        <div class="reptro-hero-area-left reptro-hero-area-left-custom-bg-no reptro-hero-area-column">
            <h2>Login</h2>
            <p>Not a member yet? Register here.</p>
            <div class="wpcf7">
                <form  class="wpcf7-form init demo" method="post" action="{{ route('login-check') }}" >
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
                <h3 class="reptro-section-title margin-bottom-medium"><span>About Belvedere Union</span></h3>
                <div class="text-section">
                    <p>The Belvedere Union enables past pupils of Belvedere College to maintain friendships made at school, to help our members who are in need and to provide opportunities for Old Belvederians to connect with each other . We do this by organising social, business and sporting events and also by supporting charities and other social justice activities in parallel with Belvedere College.&nbsp;</p>
                    <p>The Union is run by a voluntary committee who organise a range of different activities throughout the year which include the Union Dinner, the Belvedere Business Network Lunch, the Annual Retrete and the Annual mass for deceased past pupils.</p>
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
            <li class="col-lg-4 col-md-6 course">
                <div class="reptro-course-loop-thumbnail-area">
                    <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="#">Details</a></div>
                    <div class="course-thumbnail"> <img width="570" height="461" src="user/images/markus-spiske-357131-unsplash-copy-1-570x461.jpg"></div>
                    <div class="reptro-course-loop-price-and-rating">
                        <div class="course-price"> <span class="price">€99.00</span></div>
                        <div class="xt-course-review">
                            <div class="xt-review-stars-wrapper">
                                <ul class="xt-review-stars">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                                <ul class="xt-review-stars xt-fill" style="width: 40%">
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
                        <h3 class="course-title">Javascript Online Course</h3>
                    </a>
                    <!-- <div class="course-info"> <span class="course-instructor"> <a href="#">Imran</a></span> <span class="course-students" title="<span class=&quot;course-students-number&quot;>41</span> students enrolled"> 41 students </span></div> -->
                </div>
            </li>
            <li class="col-lg-4 course"> <span class="reptro-course-loop-sale">Sale</span>
                <div class="reptro-course-loop-thumbnail-area">
                    <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="#">Details</a></div>
                    <div class="course-thumbnail"> <img width="570" height="461" src="user/images/pan-xiaozhen-423533-unsplash-copy-1-570x461.jpg"></div>
                    <div class="reptro-course-loop-price-and-rating">
                        <div class="course-price"> <span class="origin-price">€150.00</span> <span class="price">€99.00</span></div>
                        <div class="xt-course-review">
                            <div class="xt-review-stars-wrapper">
                                <ul class="xt-review-stars">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                                <ul class="xt-review-stars xt-fill" style="width: 100%">
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
                <div class="reptro-course-item-inner"> <a href="#">
                        <h3 class="course-title">Pre Primary</h3>
                    </a>
                    <!-- <div class="course-info"> <span class="course-instructor"> <a href="#">Imran</a></span> <span class="course-students" title="<span class=&quot;course-students-number&quot;>151</span> students enrolled"> 151 students </span></div> -->
                </div>
            </li>
            <li class="col-lg-4 course">
                <div class="reptro-course-loop-thumbnail-area">
                    <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="#">Details</a></div>
                    <div class="course-thumbnail"> <img width="570" height="461" src="user/images/nicolas-thomas-540353-unsplash-copy-1-570x461.jpg"></div>
                    <div class="reptro-course-loop-price-and-rating">
                        <div class="course-price"> <span class="price">€79.00</span></div>
                        <div class="xt-course-review">
                            <div class="xt-review-stars-wrapper">
                                <ul class="xt-review-stars">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                                <ul class="xt-review-stars xt-fill" style="width: 80%">
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
                        <h3 class="course-title">Electrical Engineering</h3>
                    </a>
                    <!-- <div class="course-info"> <span class="course-instructor"> <a href="#">Imran</a></span> <span class="course-students" title="<span class=&quot;course-students-number&quot;>39</span> students enrolled"> 39 students </span></div> -->
                </div>
            </li>
            <li class="col-lg-4 course"> <span class="reptro-course-loop-sale">Sale</span>
                <div class="reptro-course-loop-thumbnail-area">
                    <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="#">Details</a></div>
                    <div class="course-thumbnail"> <img width="570" height="461" src="user/images/rawpixel-com-600782-unsplash-copy-1-570x461.jpg"></div>
                    <div class="reptro-course-loop-price-and-rating">
                        <div class="course-price"> <span class="origin-price">€99.00</span> <span class="price">Free</span></div>
                        <div class="xt-course-review">
                            <div class="xt-review-stars-wrapper">
                                <ul class="xt-review-stars">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                                <ul class="xt-review-stars xt-fill" style="width: 80%">
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
                <div class="reptro-course-item-inner"> <a href="#">
                        <h3 class="course-title">Technical Writing</h3>
                    </a>
                    <!--  <div class="course-info"> <span class="course-instructor"> <a href="#">Imran</a></span> <span class="course-students" title="<span class=&quot;course-students-number&quot;>61</span> students enrolled"> 61 students </span></div> -->
                </div>
            </li>
            <li class="col-lg-4 course">
                <div class="reptro-course-loop-thumbnail-area">
                    <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="#">Details</a></div>
                    <div class="course-thumbnail"> <img width="570" height="461" src="user/images/history-1-570x461.jpg"></div>
                    <div class="reptro-course-loop-price-and-rating">
                        <div class="course-price"> <span class="price">€59.00</span></div>
                        <div class="xt-course-review">
                            <div class="xt-review-stars-wrapper">
                                <ul class="xt-review-stars">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                                <ul class="xt-review-stars xt-fill" style="width: 0%">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                            </div> <span>(0 review)</span>
                        </div>
                    </div>
                </div>
                <div class="reptro-course-item-inner"> <a href="#">
                        <h3 class="course-title">Learn Our History</h3>
                    </a>
                    <!-- <div class="course-info"> <span class="course-instructor"> <a href="#">Imran</a></span> <span class="course-students" title="<span class=&quot;course-students-number&quot;>101</span> students enrolled"> 101 students </span></div> -->
                </div>
            </li>
            <li class="col-lg-4 course">
                <div class="reptro-course-loop-thumbnail-area">
                    <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="#">Details</a></div>
                    <div class="course-thumbnail"> <img width="570" height="461" src="user/images/english-1-570x461.jpg"></div>
                    <div class="reptro-course-loop-price-and-rating">
                        <div class="course-price"> <span class="price">€55.00</span></div>
                        <div class="xt-course-review">
                            <div class="xt-review-stars-wrapper">
                                <ul class="xt-review-stars">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                                <ul class="xt-review-stars xt-fill" style="width: 0%">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                            </div> <span>(0 review)</span>
                        </div>
                    </div>
                </div>
                <div class="reptro-course-item-inner"> <a href="#">
                        <h3 class="course-title">English Course Online</h3>
                    </a>
                    <!-- <div class="course-info"> <span class="course-instructor"> <a href="#">Imran</a></span> <span class="course-students" title="<span class=&quot;course-students-number&quot;>100</span> students enrolled"> 100 students </span></div> -->
                </div>
            </li>
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
            <div class="col-md-4">
                
                    <div class="Ssuccess-counter">
                        <div class="counter-number-wrapper">
                            <span class="count">Belvedere <br>Youth Club</span>
                        </div>
                        <a class="btn btn-md btn-border" href="#" >Read More</a>
                        <a class="reptro-call-to-action-btn btn-md" href="#" >Donate</a>
                    </div>
               
                <!-- <a href="#">
                    <div class="Ssuccess-counter">
                        <div class="counter-number-wrapper">
                            <span class="count">Donate</span>
                        </div>
                        <div class="counter-title">to Belvedere Benevolent Association</div>
                        <u>Read More</u>
                    </div>
                </a> -->
            </div>
            <div class="col-md-4">
                    <div class="Ssuccess-counter">
                        <div class="counter-number-wrapper">
                            <span class="count">Belvedere Benevolent <br>Association </span>
                        </div>
                        <a class="btn btn-md btn-border" href="#" >Read More</a>
                        <a class="reptro-call-to-action-btn btn-md" href="#" >Donate</a>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="Ssuccess-counter" style="border-right: none;">
                        <div class="counter-number-wrapper">
                            <span class="count">St. Vincent <br> de Paul</span>
                        </div>
                        <a class="btn btn-md btn-border" href="#" >Read More</a>
                        <a class="reptro-call-to-action-btn btn-md" href="#" >Donate</a>
                    </div>
            </div>
</section>
<section class="LNews">
    <div class="container">
        <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Latest News</span></h2>
        <p class="section-title-small text-center  section-title-small-border-yes">EDUCATION NEWS ALL OVER THE WORLD.</p>
        <div class="row">
            <article class="col-lg-4 col-md-6 tag-study">
                <div class="xt-post-item">
                    <div class="xt-post-item-thumb">
                        <figure> <a href="#"><img src="user/images/blog-13-1-480x519.jpg" alt=""></a></figure>
                        <div class="xt-post-item-categories"> <a href="#">eLearning</a></div>
                    </div>
                    <div class="xt-post-item-content">
                        <div class="xt-post-item-date">April 11, 2018</div>
                        <h4 class="xt-post-item-title"><a href="#">The Advantages and Importance of Online Learning</a></h4>
                    </div>
                </div>
            </article>
            <article class="col-lg-4 col-md-6 tag-study">
                <div class="xt-post-item">
                    <div class="xt-post-item-thumb">
                        <figure> <a href="#"><img src="user/images/blog-10-1-480x519.jpg" alt=""></a></figure>
                        <div class="xt-post-item-categories"> <a href="#">Group Study</a></div>
                    </div>
                    <div class="xt-post-item-content">
                        <div class="xt-post-item-date">April 11, 2018</div>
                        <h4 class="xt-post-item-title"><a href="#">The Importance of Study Groups</a></h4>
                    </div>
                </div>
            </article>
            <article class="col-lg-4 col-md-6 tag-study">
                <div class="xt-post-item">
                    <div class="xt-post-item-thumb">
                        <figure> <a href="#"><img src="user/images/blog-9-1-480x519.jpg" alt=""></a></figure>
                        <div class="xt-post-item-categories"> <a href="#">Extra Curricular</a></div>
                    </div>
                    <div class="xt-post-item-content">
                        <div class="xt-post-item-date">April 11, 2018</div>
                        <h4 class="xt-post-item-title"><a href="#">Painting Art Lessons for High School</a></h4>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
<section class="OSponsors">
    <div class="container">
        <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Our Sponsors</span></h2>
        <p class="section-title-small text-center  section-title-small-border-yes"><a href="#">Become a Sponsor</a> | <a href="">Sponsor Benefits</a></p>
        <div class="row">
            <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="user/images/logo-5-1.png" class="img-responsive" alt=""></a></div>
            <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="user/images/logo-3-1.png" class="img-responsive" alt=""></a></div>
            <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="user/images/logo-2-1.png" class="img-responsive" alt=""></a></div>
            <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="user/images/logo-1-1.png" class="img-responsive" alt=""></a></div>
            <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="user/images/logo5.png" class="img-responsive" alt=""></a></div>
            <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="user/images/logo-6.png" class="img-responsive" alt=""></a></div>
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