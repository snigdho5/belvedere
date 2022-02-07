<?php
$data = layoutDataData;
// dd($data);
$footerDesc1 = isset($data["footer_desc1"]) ? $data["footer_desc1"] : "";
$footerDesc2 = isset($data["footer_desc2"]) ? $data["footer_desc2"] : "";
$footerDesc3 = isset($data["footer_desc3"]) ? $data["footer_desc3"] : "";
$location = isset($data["location"]) ? $data["location"] : "";
$googleLink = isset($data["google_link"]) ? $data["google_link"] : "";
$linkedinLink = isset($data["linkedin_link"]) ? $data["linkedin_link"] : "";
$youtubeLink = isset($data["youtube_link"]) ? $data["youtube_link"] : "";
$email = isset($data["mail"]) ? $data["mail"] : "";
$phoneNo = isset($data["phone_no"]) ? $data["phone_no"] : "";
$footerLogo = isset($data["footer_logo"]) ? $data["footer_logo"] : "";

?>
<footer class="xt-footer">
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div id="text-2" class="col-lg-2 col-md-6">
                    <div class="textwidget">
                        <p style="overflow: hidden;"><img src="{{$footerLogo}}" alt="" class="toplogo"> <span class="cname">Belvedere Union</span></p>
                        <p>{{$footerDesc1}}</p>
                        <p>{{$footerDesc2}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 widget widget_nav_menu">
                    <h4 class="footer-title">Important Links</h4>
                    <div class="menu-footer-menu-container">
                        <ul class="menu">
                            <li><a href="{{asset('/')}}">Home</a></li>
                            <li><a href="{{asset('/about')}}">About Us</a></li>
                            <li><a href="{{asset('/event')}}">Events</a></li>
                            <li><a href="{{asset('/careers')}}">Careers</a></li>
							<li><a href="{{asset('/sponser')}}">Sponsor</a></li>
                            <li><a href="javascript:void(0)">Donate</a></li>
                            <li><a href="{{asset('/contactus')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="footer-title">Contact Info</h4>
                    <ul class="contact-info">
                        <li><span class="contact-info-icon"><i class="sli-location-pin"></i></span><span class="contact-info-content"><span class="contact-info-heading">Location:</span><span class="contact-info-details">{!!$location!!}</span></span></li></br>
                        <li><span class="contact-info-icon"><i class="sli-phone"></i></span><span class="contact-info-content"><span class="contact-info-heading">Phone:</span><span class="contact-info-details">{{$phoneNo}}</span></span></li></br>
                        <li><span class="contact-info-icon"><i class="sli-paper-plane"></i></span><span class="contact-info-content"><span class="contact-info-heading">Email:</span><span class="contact-info-details">{{$email}}</span></span></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="reptro-cta-widget shadow">
                        <h4 class="footer-title">Become a Member</h4>
                        <div class="call-to-action-text">{{$footerDesc3}}</div> <a class="reptro-call-to-action-btn" href="javascript:void(0);" title="Join With Us">Join With Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-infos">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <p class="copy">© 2020, All Rights Reserved.</p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="footer-social text-right">
                        <!--<ul>-->
                        <!--    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i><span>Our Facebook</span></a></li>-->
                        <!--    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i><span>Our Twitter</span></a></li>-->
                        <!--</ul>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>