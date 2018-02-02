@extends('site/layout')
@section('content')
    <style>
        .video1, .video2{
            cursor: pointer
        }
        .video1-title, .video2-title {
            position: absolute;
            left: 50%;
            top: 50%;
            color: #fff;
            z-index: 1000;
            transform: translateX(-50%);
        }

        .video1-title:hover, .video2-title:hover {
            background : #008a9e;
            padding : 2px;
        }
        .faq_description {
            display: none
        }
    </style>
    <!--========== HEADER ==========-->
    <header class="header navbar-fixed-top">
        <!-- Navbar -->
        <nav class="navbar" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="menu-container js_nav-item">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="toggle-icon"></span>
                    </button>

                    <!-- Logo -->
                    <div class="logo">
                        <a class="logo-wrap" href="#body">
                            <img class="logo-img" src="{{url()}}/uploads/site/logo.jpg" alt="Asentus Logo">
                        </a>
                    </div>
                    <!-- End Logo -->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-collapse">
                    <div class="menu-container">
                        <ul class="nav navbar-nav navbar-nav-left">
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#body">{{trans('site.menus.offer')}}</a></li>
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#about">{{trans('site.menus.partner')}}</a></li>
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#experience">Մեր մասին</a></li>
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#work">Videoner</a></li>
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#contact">{{trans('site.menus.contact')}}</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-nav-right">
                            <li><a href="{{url('lang/am')}}">AM</a></li>
                            <li><a href="{{url('lang/ru')}}">RU</a></li>
                            <li><a href="{{url('lang/en')}}">EN</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Navbar Collapse -->
            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <!--========== END HEADER ==========-->

    <!--========== SLIDER ==========-->
    <div class="promo-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 sm-margin-b-60">
                    <div class="margin-b-30">
                        @if($offer)
                        <h1 class="promo-block-title">{!! $offer->{('title_').App::getLocale()}  !!}</h1>
                        {{$offer->{('description_').App::getLocale()} }}
                        @else
                            <h1 class="promo-block-title">Alisa <br/> Portman</h1>
                            <p class="promo-block-text">Web &amp; UI/UX Designer</p>
                        @endif
                    </div>
                    <ul class="list-inline">
                        <li><a href="#" class="social-icons"><i class="icon-social-facebook"></i></a></li>
                        <li><a href="#" class="social-icons"><i class="icon-social-twitter"></i></a></li>
                        <li><a href="#" class="social-icons"><i class="icon-social-dribbble"></i></a></li>
                        <li><a href="#" class="social-icons"><i class="icon-social-behance"></i></a></li>
                        <li><a href="#" class="social-icons"><i class="icon-social-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    @if(!$video->isEmpty())
                    <div class="promo-block-img-wrap video1" data-toggle="modal" data-target="#myModal0" data-youtube_url="{{$video[0]->{('url_').App::getLocale()} }}">
                        <span class="video1-title">{{$video[0]->{('title_').App::getLocale()} }}</span>
                        <img class="promo-block-img img-responsive" src="{{$video[0]->{('thumb_').App::getLocale()} }}" align="">
                    </div>
                    @else
                        <img class="promo-block-img img-responsive" src="{{url()}}/uploads/site/img/mockup/avatar-01.png" align="Avatar">
                    @endif
                </div>
            </div>
            <!--// end row -->
        </div>
    </div>
    <!--========== SLIDER ==========-->

    <!--========== PAGE LAYOUT ==========-->
    <!-- About -->
    <div id="about">
        <div class="container content-lg">
            <div class="row">
                <div class="col-sm-5 sm-margin-b-60 video2" data-toggle="modal" data-target="#myModal1">
                    @if(!$video->isEmpty() && isset($video[1]))
                        <span class="video2-title">{{$video[1]->{('title_').App::getLocale()} }}</span>
                        <img class="promo-block-img img-responsive" src="{{$video[1]->{('thumb_').App::getLocale()} }}" align="">
                    @else
                        <img class="full-width img-responsive" src="{{url()}}/uploads/site/img/500x700/01.jpg" alt="Image">
                    @endif
                </div>
                <div class="col-sm-7">
                    <div class="section-seperator margin-b-50">
                        <div class="margin-b-50">
                            <div class="margin-b-30">
                                @if($partner)
                                    <h2>{{$partner->{('title_').App::getLocale()} }}</h2>
                                    {{$partner->{('description_').App::getLocale()} }}
                                @else
                                    <h2>About Me</h2>
                                    <p>I'm Alisa Portman, orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                @endif
                            </div>
                            <a href="https://faberlic.com/register?sponsor={{$code}}&lang=ru" class="btn-theme btn-theme-md btn-default-bg text-uppercase">{{trans('site.link_to_registration')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--// end row -->
        </div>
    </div>
    <!-- End About -->

    <!-- Experience -->
    <div id="experience">
        <div class="bg-color-sky-light" data-auto-height="true">
            <div class="container content-lg">
                <div class="row row-space-2 margin-b-4">
                    
                    <!-- About us -->
                    <div class="col-md-3 col-sm-6 md-margin-b-4">
                        <div class="service" data-height="height">
                            <div class="service-element">
                                <i class="service-icon icon-mustache"></i>
                            </div>
                            <div class="service-info">
                                @if($about_us)
                                    <h3>{{$about_us->{('title_').App::getLocale()} }}</h3>
                                    {{ $about_us->{('description_').App::getLocale()} }}
                                @else
                                    <h3>Մեր մասին</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--// About us -->
                    
                    <!-- FAQ -->
                    <div class="col-md-3 col-sm-6 md-margin-b-4">
                        <div class="service" data-height="height">
                            <div class="service-element">
                                <i class="service-icon icon-mustache"></i>
                            </div>
                            <div class="service-info">
                                <h3>{{trans('site.faq')}}</h3>
                                @foreach($faqs as $faq)
                                    <h4>{{$faq->title}}</h4>
                                    <p class="faq_description faq_description_{{$faq->id}} ">{{$faq->description}}</p>
                                    <a class="link faq_title" data-id="{{$faq->id}}" href="javascript:void(0)">Read More</a>
                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--// FAQ -->

                    <!-- Our Products -->
                    <div class="col-md-3 col-sm-6 md-margin-b-4">
                        <div class="service" data-height="height">
                            <div class="service-element">
                                <i class="service-icon icon-mustache"></i>
                            </div>
                            <div class="service-info">
                                <h3>Մեր ապրանքատեսականին</h3>
                                <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                            </div>
                        </div>
                    </div>
                    <!--// FAQ -->

                </div>
                <!--// end row -->
            </div>
        </div>
    </div>
    <!-- End Experience -->

    <!-- Work -->
    <div id="work">
        <div class="container content-lg">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                    <h2>Latest Products</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret dolore magna aliqua enim minim veniam exercitation</p>
                </div>
            </div>
            <!--// end row -->

            <div class="row">
                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="img/970x647/01.jpg" alt="Latest Products Image">
                        </div>
                    </div>
                    <h4><a href="#">Triangle Roof</a> <span class="text-uppercase margin-l-20">Management</span></h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                    <a class="link" href="#">Read More</a>
                </div>
                <!-- End Latest Products -->

                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="img/970x647/02.jpg" alt="Latest Products Image">
                        </div>
                    </div>
                    <h4><a href="#">Curved Corners</a> <span class="text-uppercase margin-l-20">Developmeny</span></h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                    <a class="link" href="#">Read More</a>
                </div>
                <!-- End Latest Products -->

                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="img/970x647/03.jpg" alt="Latest Products Image">
                        </div>
                    </div>
                    <h4><a href="#">Bird On Green</a> <span class="text-uppercase margin-l-20">Design</span></h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                    <a class="link" href="#">Read More</a>
                </div>
                <!-- End Latest Products -->
            </div>
            <!--// end row -->
        </div>
    </div>
    <!-- End Work -->

    <!-- Clients -->
    <div class="bg-color-sky-light">
        <div class="content-lg container">
            <!-- Swiper Clients -->
            <div class="swiper-slider swiper-clients">
                <!-- Swiper Wrapper -->
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="img/clients/01.png" alt="Clients Logo">
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="img/clients/02.png" alt="Clients Logo">
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="img/clients/03.png" alt="Clients Logo">
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="img/clients/04.png" alt="Clients Logo">
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="img/clients/05.png" alt="Clients Logo">
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="img/clients/06.png" alt="Clients Logo">
                    </div>
                </div>
                <!-- End Swiper Wrapper -->
            </div>
            <!-- End Swiper Clients -->
        </div>
    </div>
    <!-- End Clients -->

    <!-- Promo Banner -->
    <div class="promo-banner parallax-window" data-parallax="scroll" data-image-src="img/1920x1080/01.jpg">
        <div class="container-sm content-lg">
            <h2 class="promo-banner-title">Displaying the Result</h2>
            <p class="promo-banner-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
        </div>
    </div>
    <!-- End Promo Banner -->

    <!-- Contact -->
    <div id="contact">
        <div class="bg-color-sky-light">
            <div class="container content-lg">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                       <h2>{{trans('site.menus.contact')}}</h2>
                    </div>
                </div>
                <!--// end row -->

                <div class="row">
                    @foreach($contacts as $contact)
                    <div class="col-md-3 col-xs-6 md-margin-b-30">
                        <h4>{{$contact->title}}</h4>
                        <a href="javascript:void(0)">{{$contact->description}}</a>
                    </div>
                    @endforeach
                </div>
                <!--// end row -->
            </div>
        </div>
    </div>
    <!-- End Contact -->

    <!-- Back To Top -->
    <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

    @for($i=0; $i < $video->count(); $i++)
    <!-- Modal -->
    <div class="modal fade" id="myModal{{$i}}" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{$video[$i]->{('title_').App::getLocale()} }}</h4>
            </div>
            <div class="modal-body">
                <p>
                    <iframe width="420" height="345" src="{{$video[$i]->{('url_').App::getLocale()} }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    @endfor
    
    @section('js')
        <script>
            $('.faq_title').on('click', function() {
                var faq_id = $(this).data('id');
                $('.faq_description_'+faq_id).toggle();
            });
        </script>
    @endsection
    <!--========== END PAGE LAYOUT ==========-->
@endsection