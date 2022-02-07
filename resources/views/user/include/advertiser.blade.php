    <section class="OSponsors">
        <div class="container">
            <h2 class="reptro-section-title text-center margin-bottom-xsmall">
                <span>Our Advertisers</span>
            </h2>
            <p class="section-title-small text-center  section-title-small-border-yes">
                <a href="{{ asset('advertiser') }}">Become a Advertiser</a> | <a href="javascript:void(0);">Advertiser Benefits</a>
            </p>
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
                                    @foreach($oursponser as $item)
                                        <div class="owl-item">
                                            <div class="brands_item d-flex flex-column justify-content-center">
                                                <img src="{{ asset('imagess/thumb-'.$item->image) }}" class="img-responsive" title="{{$item->title}}"/>
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
                    if ($('.brands_slider').length){
                        var brandsSlider = $('.brands_slider');
                        brandsSlider.owlCarousel(
                            {
                                loop: true,
                                autoplay: true,
                                autoplayTimeout: 5000,
                                nav: false,
                                dots: false,
                                autoWidth: true,
                                items: 8,
                                margin: 42
                            });

                            if($('.brands_prev').length){
                                var prev = $('.brands_prev');
                                prev.on('click', function ()
                                {
                                    brandsSlider.trigger('prev.owl.carousel');
                                });
                            }

                            if($('.brands_next').length){
                                var next = $('.brands_next');
                                next.on('click', function ()
                                {
                                    brandsSlider.trigger('next.owl.carousel');
                                });
                            }
                    }
                });
            </script>
        </div>
    </section>