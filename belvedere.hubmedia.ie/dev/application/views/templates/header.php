<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link media="all" href="<?php echo base_url(); ?>assets/font/fontcss.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link media="all" href="<?php echo base_url(); ?>assets/css/custome.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custome.js"></script>
    <!-- <script src="js/custom01.js"></script> -->
    <title><?php echo $page_content->meta_title?$page_content->meta_title:SITE_TITLE; ?></title>
    <meta name="description" content="<?php echo $page_content->meta_desc?$page_content->meta_desc:''; ?>">
    <meta name="keywords" content="<?php echo $page_content->keywords?$page_content->keywords:''; ?>">
</head>

<body>
    <header class="xt-head-2">
        <div class="xt-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="xt-pre-header-left-content"><span class="xt-business-email"><i class="sli-paper-plane"></i><a href="mailto:<?php echo ADMIN_EMAIL; ?>"><?php echo ADMIN_EMAIL; ?></a></span> <span class="xt-business-phone"><i class="sli-phone"></i><a href="tel:<?php echo PHONE_NO; ?>"><?php echo PHONE_NO; ?></a></span></div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?php
                        $social_ic = $this->Common_Model->getAll('sociallinks');
                        ?>
                        <div class="header-social text-right">
                            <ul>
                                <?php
                                if(isset($social_ic) && !empty($social_ic)){
                                    foreach ($social_ic as $sic) {
                                    ?>
                                    <li><a href="<?php echo $sic->link; ?>" target="_blank"><i class="fa <?php echo $sic->icon; ?>"></i></a></li>
                                    <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar  navbar-expand-lg navbar-light top-navbar" data-toggle="sticky-onscroll">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/<?php echo LOGO; ?>" alt="" class="toplogo"> <span class="cname"><?php echo SITE_TITLE; ?></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end xt-navbar-main-menu" id="navbarSupportedContent">
                    <ul class="nav-menu nav navbar-nav navbar-right">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">About Us</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>about-us">About Belvedere Union</a></li>
                                <li><a href="<?php echo base_url(); ?>why-join">Why Join</a></li>
                                <li><a href="<?php echo base_url(); ?>committee-members">Committee Members</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>events">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>careers">Careers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>our-sponsors">Sponsor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>donate">Donate</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Belvedere Youth Club</a></li>
                                <li><a href="#">Belvedere Benevolent Association</a></li>
                                <li><a href="#">St. Vincent de Paul</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>contact-us">Contact Us</a>
                        </li>
                    </ul>
                    <div class="reptro-header-profile-img singtop"> <a class="btn btn-lg btn-fill" href="<?php echo base_url(); ?>login">Member Login</a></div>
                </div>
            </div>
        </nav>
    </header>
    <!-- End top header-->
