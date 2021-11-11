@extends('layouts.user')

@push('css')

<script src="https://www.paypal.com/sdk/js?client-id=AVZGP8lxfDPrBPU_7JIIl6HO2uw3zFSSm1Nr7Y_x55PIFcqGSWALbpRjv_XR-GbANoDc2bMYk8-wYLQp&disable-funding=credit,card"></script>

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

<div class="xt-page-title-area">

    <div class="xt-page-title">

        <div class="container">

            <h1 class="entry-title">About</h1>

        </div>

    </div>

    <div class="xt-breadcrumb-wrapper">

        <div class="container">

            <nav class="xt-breadcrumb">

                <ul>

                    <li><a href="#">Home</a></li>

                    <li class="current">About</li>

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

                <h3 class="reptro-section-title margin-bottom-medium"><span>{{ $content->title }}</span></h3>

                <div class="text-section">                   

                   {!!isset($content->description)?$content->description:''!!}

                </div>

               

            </div>

            <div class="col-lg-6">

                <div class="xt-video xt-video-popup-type-with_image">

                    <div class="xt-video-img"><img src="{!!isset($content->video_link)?$content->video_link:'user/images/about-6-min.jpg'!!}" alt="">

                        {{-- <div class="xt-video-overlay"><a class="xt-video-popup-btn" data-fancybox="" href="https://youtu.be/AGBjI0x9VbM"><span class="video-popup-play-icon"></span></a></div> --}}

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

 <!-- ********footer********** -->

 <section class="OSponsors">

        <div class="container">

            <h2 class="reptro-section-title text-center margin-bottom-xsmall"><span>Our Sponsors</span></h2>

            <p class="section-title-small text-center  section-title-small-border-yes"><a href="#">Become a Sponsor</a> | <a href="">Sponsor Benefits</a></p>

            <!-- <div class="row">

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo-5-1.png" class="img-responsive" alt=""></a></div>

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo-3-1.png" class="img-responsive" alt=""></a></div>

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo-2-1.png" class="img-responsive" alt=""></a></div>

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo-1-1.png" class="img-responsive" alt=""></a></div>

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo5.png" class="img-responsive" alt=""></a></div>

                <div class="col-lg-2 col-md-6 logo-item"><a href="#"><img src="images/logo-6.png" class="img-responsive" alt=""></a></div>

            </div> -->

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

            <div class="brands">

                <div class="container">

                    <div class="row">

                        <div class="col">

                            <div class="brands_slider_container">

                                <div class="owl-carousel owl-theme brands_slider">

                                

                                    @foreach ($oursponser as $item)

                                    

                                    <div class="owl-item">

                                        <div class="brands_item d-flex flex-column justify-content-center">

                                            <!-- <img src="{{ asset('imagess/thumb-'.$item->image) }}" class="img-responsive" title="{{$item->title}}"> -->

                                            <img src="{{ asset('imagess/'.$item->image) }}" class="img-responsive" title="{{$item->title}}">

                                        </div>

                                    </div>

                                    

                                    @endforeach

                                    

                                </div> <!-- Brands Slider Navigation -->

                                <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>

                                <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <style type="text/css">

                .brands {

                    width: 100%;

                    padding-top: 30px;

                    padding-bottom: 10px

                }



                .brands_slider_container {

                    height: 130px;

                    border: solid 1px #e8e8e8;

                    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);

                    padding-left: 45px;

                    padding-right: 45px;

                    background: #fff

                }



                .brands_slider {

                    height: 100%;

                    margin-top: 20px

                }



                .brands_item {

                    height: 100%

                }



                .brands_item img {

                    max-width: 100%;

                    width:200px !important;

                }



                .brands_nav {

                    position: absolute;

                    top: 50%;

                    -webkit-transform: translateY(-50%);

                    -moz-transform: translateY(-50%);

                    -ms-transform: translateY(-50%);

                    -o-transform: translateY(-50%);

                    transform: translateY(-50%);

                    padding: 5px;

                    cursor: pointer

                }



                .brands_nav i {

                    color: #e5e5e5;

                    -webkit-transition: all 200ms ease;

                    -moz-transition: all 200ms ease;

                    -ms-transition: all 200ms ease;

                    -o-transition: all 200ms ease;

                    transition: all 200ms ease

                }



                .brands_nav:hover i {

                    color: #676767

                }



                .brands_prev {

                    left: 25px

                }



                .brands_next {

                    right: 25px

                }

            </style>

            <script type="text/javascript">

                $(document).ready(function(){



                if($('.brands_slider').length)

                {

                var brandsSlider = $('.brands_slider');



                brandsSlider.owlCarousel(

                {

                loop:true,

                autoplay:true,

                autoplayTimeout:5000,

                nav:false,

                dots:false,

                autoWidth:true,

                items:8,

                margin:42

                });



                if($('.brands_prev').length)

                {

                var prev = $('.brands_prev');

                prev.on('click', function()

                {

                brandsSlider.trigger('prev.owl.carousel');

                });

                }



                if($('.brands_next').length)

                {

                var next = $('.brands_next');

                next.on('click', function()

                {

                brandsSlider.trigger('next.owl.carousel');

                });

                }

                }





                });

            </script>

        </div>

    </section>





 

@endsection

@push('js')

<script>

    function initSections() {

        var $activeSection = $('.course-item.current').closest('.section'),

            sections = $('.curriculum-sections').find('.section'),

            sectionId = $activeSection.data('section-id'),

            hiddenSections = [];

        if ($activeSection) { hiddenSections = sectionStorage.remove(sectionId); } else { hiddenSections = sectionStorage.get(); }

        for (var i = 0; i < hiddenSections.length; i++) { sections.filter('[data-section-id="' + hiddenSections[i] + '"]').find('.section-content').hide(); }

    }

    </script>

 

    

    

{{-- slider js --}}

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