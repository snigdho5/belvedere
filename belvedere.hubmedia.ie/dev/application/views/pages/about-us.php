<!-- ****End top header***-->
    <div class="xt-page-title-area">
        <div class="xt-page-title">
            <div class="container">
                <h1 class="entry-title"><?php echo $page_content->title; ?></h1>
            </div>
        </div>
        <div class="xt-breadcrumb-wrapper">
            <div class="container">
                <nav class="xt-breadcrumb">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="current"><?php echo $page_content->title; ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- inner banner end -->
    <section class="aboutsec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="reptro-section-title margin-bottom-medium"><span><?php echo $page_content->title; ?></span></h3>
                    <div class="text-section">
                        <?php echo $page_content->description; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="xt-video xt-video-popup-type-with_image">
                        <div class="xt-video-img"><img src="<?php echo base_url(); ?>assets/images/page/<?php echo $page_content->f_image; ?>" alt="">
                            <div class="xt-video-overlay"><a class="xt-video-popup-btn" data-fancybox="" href="h<?php echo $page_content->f_video; ?>"><span class="video-popup-play-icon"></span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>