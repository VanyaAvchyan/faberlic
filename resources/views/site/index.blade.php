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
                                <img class="logo-img" src="{{url()}}/uploads/site/img/logo.png" alt="Asentus Logo">
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
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#experience">{{trans('site.menus.experience')}}</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#work">Work</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#contact">{{trans('site.menus.contact')}}</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-nav-right">
                                <li class='active'><a class='active' href="{{url('lang/am')}}">AM</a></li>
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
                            <h1 class="promo-block-title">{{$offer->title}}</h1>
                            <p class="promo-block-text">{{$offer->description}}</p>
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
                        <div class="promo-block-img-wrap video1" data-toggle="modal" data-target="#myModal">
                            @if(!$video->isEmpty())
                                <span class="video1-title">{{$video[0]->title}}</span>
                                <img class="promo-block-img img-responsive" src="{{$video[0]->thumb}}" align="{{$video[0]->thumb}}">
                            @else
                                <img class="promo-block-img img-responsive" src="{{url()}}/uploads/site/img/mockup/avatar-01.png" align="Avatar">
                            @endif
                        </div>
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
                    <div class="col-sm-5 sm-margin-b-60 video2" data-toggle="modal" data-target="#myModal">
                        @if(!$video->isEmpty())
                            <span class="video2-title">{{$video[1]->title}}</span>
                            <img class="promo-block-img img-responsive" src="{{$video[1]->thumb}}" align="{{$video[1]->thumb}}">
                        @else
                            <img class="full-width img-responsive" src="{{url()}}/uploads/site/img/500x700/01.jpg" alt="Image">
                        @endif
                    </div>
                    <div class="col-sm-7">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <h2>{{$partner->title}}</h2>
                                    <p>{{$partner->description}}</p>
                                </div>
                                <a href="https://faberlic.com/register?sponsor={{$code}}&lang=ru" class="btn-theme btn-theme-md btn-default-bg text-uppercase" target='_blank'>{{trans('site.link_to_registration')}}</a>
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
                        <div class="col-md-3 col-sm-6 md-margin-b-4">
                            <div class="service" data-height="height">
                                <div class="service-element">
                                    <i class="service-icon icon-mustache"></i>
                                </div>
                                <div class="service-info">
                                    <h3>Illustrator</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                </div>
                                <a href="#" class="content-wrapper-link"></a>    
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 md-margin-b-4">
                            <div class="service bg-color-base wow zoomIn" data-height="height" data-wow-duration=".3" data-wow-delay=".1s">
                                <div class="service-element">
                                    <i class="service-icon color-white icon-screen-tablet"></i>
                                </div>
                                <div class="service-info">
                                    <h3 class="color-white">Graphic Design</h3>
                                    <p class="color-white margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                </div>
                                <a href="#" class="content-wrapper-link"></a>    
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 sm-margin-b-4">
                            <div class="service" data-height="height">
                                <div class="service-element">
                                    <i class="service-icon icon-chemistry"></i>
                                </div>
                                <div class="service-info">
                                    <h3>Photoshop</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                </div>
                                <a href="#" class="content-wrapper-link"></a>    
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service" data-height="height">
                                <div class="service-element">
                                    <i class="service-icon icon-badge"></i>
                                </div>
                                <div class="service-info">
                                    <h3>Sketch</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                </div>
                                <a href="#" class="content-wrapper-link"></a>    
                            </div>
                        </div>
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
                                <img class="img-responsive" src="{{url()}}/uploads/site/img/970x647/01.jpg" alt="Latest Products Image">
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
                                <img class="img-responsive" src="{{url()}}/uploads/site/img/970x647/02.jpg" alt="Latest Products Image">
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
                                <img class="img-responsive" src="{{url()}}/uploads/site/img/970x647/03.jpg" alt="Latest Products Image">
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
        <!--========== END PAGE LAYOUT ==========-->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>
                    <iframe width="420" height="345" src="https://www.youtube.com/embed/{{$video[0]->url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

        </div>
    </div>
@endsection