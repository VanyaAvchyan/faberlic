@extends('site/layout')
@section('content')
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
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#experience">{{trans('site.menus.about_us')}}</a></li>
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#work">{{trans('site.menus.videos')}}</a></li>
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
                    <div class="margin-b-10">
                        @if($offer)
                            <h1>{!! $offer->{('title_').App::getLocale()}  !!}</h1>
                            <p class="promo-block-text">{!! $offer->{('description_').App::getLocale()} !!}</p>
                        @else
                            <h2 class="promo-block-title">Alisa <br/> Portman</h2>
                            <p class="promo-block-text">Web &amp; UI/UX Designer</p>
                        @endif
                    </div>
                    <ul class="list-inline social__buttons">
                        <li><a href="#" class="social-icons facebook" data-share_tipe="facebook"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#" class="social-icons twitter" data-share_tipe="twitter"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#" class="social-icons linkedin" data-share_tipe="linkedin"><span class="fa fa-linkedin"></span></i></a></li>
                        <li><a href="#" class="social-icons vkontakte" data-share_tipe="vkontakte"><span class="fa fa-vk"></span></a></li>
                        <li><a href="#" class="social-icons odnoklassniki" data-share_tipe="odnoklassniki"><span class="fa fa-odnoklassniki"></span></a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    @if(isset($main_videos[0]))
                    <?php
                        $match = [];
                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $main_videos[0]->{('url_').App::getLocale()}, $match);
                        $youtube_id = $match[1];
                    ?>
                    <div
                        class="promo-block-img-wrap video1"
                        data-toggle="modal"
                        data-target="#myModal"
                        data-youtube_id="{{ $youtube_id }}"
                        data-title="{{ $main_videos[0]->{('title_').App::getLocale()} }}"
                        >
                        <span class="video1-title">{{$main_videos[0]->{('title_').App::getLocale()} }}</span>
                        <img class="promo-block-img img-responsive" src="https://img.youtube.com/vi/{{$youtube_id}}/0.jpg" align="">
                    </div>
                    @else
                        <div class="promo-block-img-wrap">
                            <img class="promo-block-img img-responsive" src="{{url()}}/uploads/site/img/mockup/avatar-01.png" align="Avatar">
                        </div>
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
                <div class="col-sm-5 sm-margin-b-60 video2">
                    @if(isset($main_videos[1]))
                        <?php
                            $match = [];
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $main_videos[1]->{('url_').App::getLocale()}, $match);
                            $youtube_id = $match[1];
                        ?>
                    <div
                        data-toggle="modal"
                        data-target="#myModal"
                        data-youtube_id="{{ $youtube_id }}"
                        data-title="{{ $main_videos[1]->{('title_').App::getLocale()} }}"
                    >
                        <span class="video2-title">{{$main_videos[1]->{('title_').App::getLocale()} }}</span>
                        <img
                            class="promo-block-img img-responsive"
                            src="https://img.youtube.com/vi/{{$youtube_id}}/0.jpg"
                            align=""
                        >
                    </div>
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
                                    {!! $partner->{('description_').App::getLocale()} !!}
                                @else
                                    <h2>Դառնալով մեր գործընկերը</h2>
                                    <p>I'm Alisa Portman, orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                @endif
                            </div>
                            <a href="https://faberlic.com/register?sponsor={{$code}}&lang=ru" class="btn-theme btn-theme-md btn-default-bg text-uppercase" target="_blank">{{trans('site.link_to_registration')}}</a>
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
                                    {!! $about_us->{('description_').App::getLocale()} !!}
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
                                    <h5>{{$faq->{('title_').App::getLocale()} }}</h5>
                                    <div class="faq_description faq_description_{{$faq->id}}">
                                        {!! $faq->{('description_').App::getLocale()} !!}
                                    </div>
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
                                @if($our_product)
                                    <h3>{{$our_product->{('title_').App::getLocale()} }}</h3>
                                    {!! $our_product->{('description_').App::getLocale()} !!}
                                @else
                                    <h3>Մեր ապրանքատեսականին</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                @endif

                            </div>
                        </div>
                    </div>
                    <!--// OUR PRODUCTS -->

                    <!-- Our Products -->
                    <div class="col-md-3 col-sm-6 md-margin-b-4">
                        <div class="service" data-height="height">
                            <div class="service-element">
                                <i class="service-icon icon-mustache"></i>
                            </div>
                            <div class="service-info">
                                @if($undecided)
                                    <h3>{{$undecided->{('title_').App::getLocale()} }}</h3>
                                    {!! $undecided->{('description_').App::getLocale()} !!}
                                @else
                                    <h3>Չեմ կողմնորոշվում</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                @endif

                            </div>
                        </div>
                    </div>
                    <!--// OUR PRODUCTS -->

                </div>
                <!--// end row -->
            </div>
        </div>
    </div>
    <!-- End Experience -->

<!-- Work -->
<div id="work">
    <div class="bg-color-sky-light">
        <div class="container content-lg">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                   <h2>{{trans('site.menus.videos')}}</h2>
                </div>
            </div>

            <!--// end row -->
            <div class="row">
                @foreach($videos as $video)
                    <?php
                        $match = [];
                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->{('url_').App::getLocale()}, $match);
                        $youtube_id = $match[1];
                    ?>
                <div class="col-md-2">
                    <img
                        data-toggle="modal"
                        data-target="#myModal"
                        data-youtube_id="{{$youtube_id}}"
                        data-title="{{ $video->{('title_').App::getLocale()} }}"
                        class="img-responsive  videos"
                        src="https://img.youtube.com/vi/{{ $youtube_id }}/0.jpg" alt="Image">
                </div>
                @endforeach
            </div>
            <!--// end row -->
        </div>
    </div>
</div>
    <!-- End Work -->

    <!-- Contact -->
    <div id="contact">
        <div class="bg-color-sky-light">
            <div class="container content-lg">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                       <h2>{{ trans('site.menus.contact') }}</h2>
                       {!! $user->info !!}
                    </div>
                </div>
                <!--// end row -->

                <div class="row">
                    @foreach($contacts as $contact)
                    <div class="col-md-3 col-xs-6 md-margin-b-30">
                        <h4>{{$contact->title}}</h4>
                        <!-- <a href="javascript:void(0)">{{$contact->description}}</a> -->
                        {!! $contact->description !!}
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="video_title">Title</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@section('js')
    <script>
        var Share = {
            vkontakte: function(purl, ptitle, pimg, text) {
                    url  = 'http://vkontakte.ru/share.php?';
                    url += 'url='          + encodeURIComponent(purl);
                    url += '&title='       + encodeURIComponent(ptitle);
                    url += '&description=' + encodeURIComponent(text);
                    url += '&image='       + encodeURIComponent(pimg);
                    url += '&noparse=true';
                    Share.popup(url);
            },
            linkedin: function(purl, ptitle, pimg, text) {
                    url  = 'https://www.linkedin.com/shareArticle?mini=true';
                    url += '&url='          + encodeURIComponent(purl);
                    url += '&title='        + encodeURIComponent(ptitle);
                    url += '&summary='      + encodeURIComponent(text);
                    url += '&source='       + encodeURIComponent(purl);
                    Share.popup(url);
            },
            odnoklassniki: function(purl, ptitle, pimg, text) {
                    url  = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
                    url += '&st.comments=' + encodeURIComponent(text);
                    url += '&st._surl='    + encodeURIComponent(purl);
                    Share.popup(url);
            },
            facebook: function(purl, ptitle, pimg, text) {
                    url  = 'http://www.facebook.com/sharer.php?s=100';
                    url += '&p[title]='     + encodeURIComponent(ptitle);
                    url += '&p[summary]='   + encodeURIComponent(text);
                    url += '&p[url]='       + encodeURIComponent(purl);
                    url += '&p[images][0]=' + encodeURIComponent(pimg);
                    Share.popup(url);
            },
            twitter: function(purl, ptitle, pimg, text) {
                    url  = 'http://twitter.com/share?';
                    url += 'title='     + encodeURIComponent(ptitle);
                    url += '&text='     + encodeURIComponent(text);
                    url += '&url='      + encodeURIComponent(purl);
                    url += '&counturl=' + encodeURIComponent(purl);
                    Share.popup(url);
            },
            mailru: function(purl, ptitle, pimg, text) {
                    url  = 'http://connect.mail.ru/share?';
                    url += 'url='          + encodeURIComponent(purl);
                    url += '&title='       + encodeURIComponent(ptitle);
                    url += '&description=' + encodeURIComponent(text);
                    url += '&imageurl='    + encodeURIComponent(pimg);
                    Share.popup(url)
            },

            popup: function(url) {
                console.log(url);
                var w = 700;
                var h = 500;
                var y = window.top.outerHeight / 2 + window.top.screenY - ( w / 2) - 100
                var x = window.top.outerWidth / 2 + window.top.screenX - ( h / 2)
                window.open(url, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+y+', left='+x);
            }
        };
        var shared_info = {
            "url"         : "{{url('/'.App::getLocale()) }}",
            "title"       : "{{ $offer->{('title_').App::getLocale()} }}",
            "description" : "{{ strip_tags($offer->{('description_').App::getLocale()}) }}",
            "image"       : "{{url()}}/uploads/site/logo.jpg",
        };

//        shared_info.description = $(shared_info.description).text();
//        shared_info.title       = $(shared_info.title).text();

        $('.social__buttons li a').on('click', function(e) {
            e.preventDefault();
//            console.log($(this).data('share_tipe'));
            var share_tipe = $(this).data('share_tipe');
            switch( share_tipe )
            {
                case 'facebook'      : Share.facebook(shared_info.url, shared_info.title, shared_info.image, shared_info.description ) ;break;
                case 'twitter'       : Share.twitter(shared_info.url, shared_info.title, shared_info.image, shared_info.description ) ;break;
                case 'linkedin'      : Share.linkedin(shared_info.url, shared_info.title, shared_info.image, shared_info.description ) ;break;
                case 'vkontakte'     : Share.vkontakte(shared_info.url, shared_info.title, shared_info.image, shared_info.description ) ;break;
                case 'odnoklassniki' : Share.odnoklassniki(shared_info.url, shared_info.title, shared_info.image, shared_info.description ) ;break;
            }
        });
    </script>
@endsection
<!--========== END PAGE LAYOUT ==========-->
@endsection