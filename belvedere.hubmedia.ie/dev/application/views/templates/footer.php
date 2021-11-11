<section class="OSponsors">
        <div class="container">
            <?php
            $spn_content = $this->Common_Model->getSingle('pages',array('slug'=>'our-sponsors','status'=>1));
            ?>
            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span><?php echo $spn_content->title; ?></span></h2>
            <p class="section-title-small text-center  section-title-small-border-yes"><a href="<?php echo base_url(); ?>become-a-sponsor">Become a Sponsor</a> | <a href="<?php echo base_url(); ?>sponsor-benefits">Sponsor Benefits</a></p>
            <div class="row">
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="<?php echo base_url(); ?>assets/images/logo-5-1.png" class="img-responsive" alt=""></a></div>
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="<?php echo base_url(); ?>assets/images/logo-3-1.png" class="img-responsive" alt=""></a></div>
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="<?php echo base_url(); ?>assets/images/logo-2-1.png" class="img-responsive" alt=""></a></div>
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="<?php echo base_url(); ?>assets/images/logo-1-1.png" class="img-responsive" alt=""></a></div>
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="<?php echo base_url(); ?>assets/images/logo5.png" class="img-responsive" alt=""></a></div>
                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="<?php echo base_url(); ?>assets/images/logo-6.png" class="img-responsive" alt=""></a></div>
            </div>
        </div>
    </section>
    <footer class="xt-footer">
        <div class="footer-wrapper">
            <div class="container">
                <div class="row">
                    <div id="text-2" class="col-lg-3 col-md-6">
                        <div class="textwidget">
                            <p style="overflow: hidden;"><img src="<?php echo base_url(); ?>assets/images/<?php echo LOGO; ?>" alt="" class="toplogo"> <span class="cname"><?php echo SITE_TITLE; ?></span></p>
                            <p><?php echo SHORT_BIO; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 widget widget_nav_menu">
                        <h4 class="footer-title">Important Links</h4>
                        <div class="menu-footer-menu-container">
                            <ul class="menu">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="<?php echo base_url(); ?>about-us">About Us</a></li>
                                <li><a href="<?php echo base_url(); ?>become-a-member">Membership</a></li>
                                <li><a href="<?php echo base_url(); ?>events">Events</a></li>
                                <li><a href="<?php echo base_url(); ?>careers">Careers</a></li>
                                <li><a href="<?php echo base_url(); ?>latest-news">Latest News</a></li>
                                <li><a href="<?php echo base_url(); ?>donate">Donate</a></li>
                                <li><a href="<?php echo base_url(); ?>contact-us">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="footer-title">Contact Info</h4>
                        <ul class="contact-info">
                            <li><span class="contact-info-icon"><i class="sli-location-pin"></i></span><span class="contact-info-content"><span class="contact-info-heading">Location:</span><span class="contact-info-details"><?php echo ADDRESS; ?></span></span></li></br>
                            <li><span class="contact-info-icon"><i class="sli-phone"></i></span><span class="contact-info-content"><span class="contact-info-heading">Phone:</span><span class="contact-info-details"><?php echo PHONE_NO; ?></span></span></li></br>
                            <li><span class="contact-info-icon"><i class="sli-paper-plane"></i></span><span class="contact-info-content"><span class="contact-info-heading">Email:</span><span class="contact-info-details"><?php echo ADMIN_EMAIL; ?></span></span></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="reptro-cta-widget shadow">
                            <h4 class="footer-title">Become a Member</h4>
                            <div class="call-to-action-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</div> <a class="reptro-call-to-action-btn" href="#" title="Join With Us">Join With Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-infos">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <p class="copy"><?php echo COPY_TXT; ?></p>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-social text-right">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i><span>Our Facebook</span></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i><span>Our Twitter</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
    /*$('.count').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                duration: 10000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
                });
            });*/
    </script>
</body>

</html>