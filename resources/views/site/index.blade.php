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
                            <img class="logo-img" src="{{url()}}/uploads/site/logo.jpg" alt="Logo">
                            <!--<img class="logo-img" src="http://resizepiconline.com/uploads/0u2iv2q1g8achuukn7jqam52f3/thumbnail/27479109_1995299260486921_323291503_o.jpg" alt="Asentus Logo">-->
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
                        @if($offer)
                            <h1 class="promo-block-title">{{$offer->title}}</h1>
                            <p class="promo-block-text">{{$offer->description}}</p>
                        @else
                            <h1 class="promo-block-title">Offer is empty</h1>
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
                                @if($partner)
                                    <h2>{{$partner->{('title_').App::getLocale()} }}</h2>
                                    <p>{{$partner->{('description_').App::getLocale()} }}</p>
                                @else
                                    <h2>Partner is empty</h2>
                                @endif
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
                                <h3>Մեր մասին՝</h3>
                                <p class="margin-b-5">
                                Մեր թիմը ստեղծվել է ֆաբերլիկ ընկերության Հայաստանյան ներկայացուցչության բացման ժամանակաշրջանից, և  մեր առաջնորդներն ունեն ավելի քան 12 տարվա փորձ ու մեծ հաջողություններ  այս ոլորտում։  Մենք աշխատում ենք կազմակերպված և հստակ ծրագրով։  Մեր թիմի առանձնահատկություներն են՝  անկեղծ և մտերմիկ մթնոլորտ,  պրոֆեսիոնալ և համակարգված  թիմային աշխատանք ։  Այստեղ դուք ձեռք կբերեք ոչ միայն մեծ եկամտի ու ճանապարհորդելու    հնարավորություն, այլ նաև հաճույք կստանաք Ձեր աշխատանքից։ Մենք պատրաստում ենք բացառապես որակյալ մասնագետներ ինչպես Հայաստանում այնպես էլ այլ երկրներում,  և այդ ամենը  կարողանում ենք ապահովել հետաքրքիր  դասընթացների, անհատական մոտեցման և թիմային աշխատանքի շնորհիվ։ 
Նկարներ,  եթե հնարավոր է։

                                </p>
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
                                <h3 class="color-white">F.A.Q.</h3>
                                @foreach($faqs as $faq)
                                    <p class="color-white margin-b-5">{{$faq->title}}</p>
                                    <p class="color-white margin-b-5 faq_description faq_description_{{$faq->id}} ">{{$faq->description}}</p>
                                    <a class="link faq_title" data-id="{{$faq->id}}" href="javascript:void(0)">Read More</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 sm-margin-b-4">
                        <div class="service" data-height="height">
                            <div class="service-element">
                                <i class="service-icon icon-chemistry"></i>
                            </div>
                            <div class="service-info">
                                <h3>Mer apranqatesakanin</h3>
                                <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                <p class="margin-b-5"><a href="#">Internet magazin</a></p>
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
                                <h3>Չեմ կողմնորոշվում</h3>
                                <p class="margin-b-5">Մեջը-   Ցանկանում եմ հանդիպել  կամ կապի միջոցով զրուցել նախքան գրանցումը ՝ անցեք հղումով և ուղարկեք ձեր տվյալները՝ հեռախոսը  և/կամ e-mail-ը՝  մենք կզանգահարենք(կգրենք)  Ձեզ</p>
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
                    <h2>Videoner</h2>
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
                    <h4><a href="#">Վիզիտկա</a></h4>
                </div>
                <!-- End Latest Products -->

                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="{{url()}}/uploads/site/img/970x647/02.jpg" alt="Latest Products Image">
                        </div>
                    </div>
                    <h4><a href="#">բիզնես քեզ համար</a></h4>
                </div>
                <!-- End Latest Products -->

                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="{{url()}}/uploads/site/img/970x647/03.jpg" alt="Latest Products Image">
                        </div>
                    </div>
                    <h4><a href="#">Խորհրդատուի համար</a></h4>
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
                    <iframe width="420" height="345" src="https://www.youtube.com/embed/uqRqFr7Brqg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    @section('js')
        <script>
            $('.faq_title').on('click', function() {
                var faq_id = $(this).data('id');
                $('.faq_description_'+faq_id).toggle();
            });
        </script>
    @endsection
@endsection