<section>
        <div class="reptro-hero-area">
            <div class="reptro-hero-area-right reptro-hero-area-column" style="background-image: url(<?php echo base_url(); ?>assets/images/page/<?php echo $page_content->f_image; ?>)"></div>
            <div class="reptro-hero-area-left reptro-hero-area-left-custom-bg-no reptro-hero-area-column">
                <h2>Become a Member</h2>
                <p>Not a member yet? Register here.</p>
                <div class="wpcf7">
                    <form action="" class="wpcf7-form init demo">
                        <div class="xt_sign_up_now_field">
                            <input type="text" name="name" value="" placeholder="First Name">
                        </div>
                        <div class="xt_sign_up_now_field">
                            <input type="text" name="sname" value="" placeholder="Surname">
                        </div>
                        <div class="xt_sign_up_now_field">
                            <input type="Email" name="email" value="" placeholder="Email Address">
                        </div>
                        <div class="xt_sign_up_now_field">
                            <input type="Password" name="password" value="" placeholder="Password">
                        </div>
                        <div class="xt_sign_up_now_field">
                            <input type="Password" name="cpassword" value="" placeholder="Confirm Password">
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
                <?php
                $abt_content = $this->Common_Model->getSingle('pages',array('slug'=>'about-us','status'=>1));
                ?>
                <div class="col-lg-6">
                    <h3 class="reptro-section-title margin-bottom-medium"><span><?php echo $abt_content->title; ?></span></h3>
                    <div class="text-section">
                        <?php echo substr($abt_content->description, 0, 300); ?>
                    </div>
                    <div class=" repto-button-border  elementor-widget-button"> <a href="<?php echo base_url(); ?>about-us" class=" elementor-button"> <span class="elementor-button-text">Read More</span> </a></div>
                </div>
                <div class="col-lg-6">
                    <div class="xt-video xt-video-popup-type-with_image">
                        <div class="xt-video-img"><img src="<?php echo base_url(); ?>assets/images/page/<?php echo $abt_content->f_image; ?>" alt="">
                            <div class="xt-video-overlay"><a class="xt-video-popup-btn" data-fancybox="" href="h<?php echo $abt_content->f_video; ?>"><span class="video-popup-play-icon"></span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="UEvents">
        <div class="container">
            <?php
            $evt_content = $this->Common_Model->getSingle('pages',array('slug'=>'events','status'=>1));
            $events_ar = $this->Common_Model->getUpcomingEvent('events',array('status'=>1));
            ?>
            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span><?php echo $evt_content->title; ?></span></h2>
            <p class="section-title-small text-center  section-title-small-border-yes"><?php echo substr(strip_tags($evt_content->description), 0, 100); ?></p>
            <ul class="reptro-course-items row">
                <?php
                if(isset($events_ar) && !empty($events_ar)){
                    foreach ($events_ar as $evnt) {
                ?>
                <li class="col-lg-4 col-md-6 course">
                    <div class="reptro-course-loop-thumbnail-area">
                        <div class="reptro-course-details-btn"> <a class="btn btn-fill btn-lg" href="<?php echo base_url(); ?>events/<?php echo $evnt->slug; ?>">Details</a></div>
                        <div class="course-thumbnail"> <img width="570" height="461" src="<?php echo base_url(); ?>assets/images/events/<?php echo $evnt->image; ?>"></div>
                        <div class="reptro-course-loop-price-and-rating">
                            <div class="course-price"> <span class="price">€<?php echo $evnt->save_price?$evnt->save_price:$evnt->price; ?></span></div>
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
                                </div> <!-- <span>(1 review)</span> -->
                            </div>
                        </div>
                    </div>
                    <div class="reptro-course-item-inner"> <a href="#" class="course-permalink">
                            <h3 class="course-title"><?php echo $evnt->name; ?></h3>
                        </a>
                        <!-- <div class="course-info"> <span class="course-instructor"> <a href="#">Imran</a></span> <span class="course-students" title="<span class=&quot;course-students-number&quot;>41</span> students enrolled"> 41 students </span></div> -->
                    </div>
                </li>
                <?php
                    }
                }
                ?>
            </ul>
            <div class="text-center reptro-all-courses-btn"> <a class="btn btn-lg btn-fill" href="<?php echo base_url(); ?>events">All Events</a></div>
        </div>
    </section>
    <?php
    $clb_content = $this->Common_Model->getSingle('pages',array('slug'=>'our-clubs-and-societies','status'=>1));
    ?>
    <div class="container">
        <h2 class="reptro-section-title text-center margin-bottom-xsmall section-title-type-border"><span><?php echo $clb_content->title; ?></span></h2>
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
            <?php
            $nws_content = $this->Common_Model->getSingle('pages',array('slug'=>'latest-news','status'=>1));
            ?>
            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span><?php echo $nws_content->title; ?></span></h2>
            <p class="section-title-small text-center  section-title-small-border-yes"><?php echo substr(strip_tags($nws_content->description), 0, 100); ?></p>
            <div class="row">
                <article class="col-lg-4 col-md-6 tag-study">
                    <div class="xt-post-item">
                        <div class="xt-post-item-thumb">
                            <figure> <a href="#"><img src="<?php echo base_url(); ?>assets/images/blog-13-1-480x519.jpg" alt=""></a></figure>
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
                            <figure> <a href="#"><img src="<?php echo base_url(); ?>assets/images/blog-10-1-480x519.jpg" alt=""></a></figure>
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
                            <figure> <a href="#"><img src="<?php echo base_url(); ?>assets/images/blog-9-1-480x519.jpg" alt=""></a></figure>
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
    <section class="BMember">
        <div class="section-background-overlay"></div>
        <div class="container">
            <?php
            $emp_content = $this->Common_Model->getSingle('pages',array('slug'=>'employment-opportunities','status'=>1));
            ?>
            <div class="row">
                <div class="reptro-ctl-area reptro-ctl-default">
                    <div class="reptro-ctl-content-wrapper">
                        <div class="reptro-ctl-icon"> <i class="fa fa-envelope-open-o" aria-hidden="true"></i></div>
                        <div class="reptro-ctl-content">
                            <h2 class="BMember-title"><?php echo $emp_content->title; ?></h2>
                            <p class="BMember-text"><span><?php echo substr(strip_tags($emp_content->description), 0, 100); ?></span></p>
                        </div>
                        <div class="reptro-ctl-button"> <a class="btn btn-lg btn-border" href="<?php echo base_url(); ?>careers">View All</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>