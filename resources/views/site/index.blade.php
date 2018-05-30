@extends('site/layout')
@section('content')
    <!--========== HEADER ==========-->
    <header class="header navbar-fixed-top" style="background-image:url(/uploads/site/background.jpg);">
        <!-- Navbar -->
        <nav class="" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="menu-container js_nav-item" style="font-weight:bold">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="glyphicon glyphicon-menu-hamburger" style="font-weight:bold;font-size: 30px"></span>
                    </button>

                    <!-- Logo -->
                    <div class="logo">
                        <a class="logo-wrap" href="{{url()}}">
                            <img class="logo-img" src="{{url()}}/uploads/site/logo.png" alt="Asentus Logo">
                        </a>
                    </div>
                    <!-- End Logo -->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-collapse header_navigation_block">
                    <div class="menu-container">
                        <ul class="nav navbar-nav navbar-nav-left">
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#body">{{trans('site.menus.offer')}}</a></li>
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#about">{{trans('site.menus.partner')}}</a></li>
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#experience">{{trans('site.menus.about_us')}}</a></li>
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#work">{{trans('site.menus.videos')}}</a></li>
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#contact">{{trans('site.menus.contact')}}</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-nav-right">
                            @if($is_account)
                                <li><a href="/account/{{$code}}/am">AM</a></li>
                                <li><a href="/account/{{$code}}/ru">RU</a></li>
                                <li><a href="/account/{{$code}}/en">EN</a></li>
                            @else
                                <li><a href="/am">AM</a></li>
                                <li><a href="/ru">RU</a></li>
                                <li><a href="/en">EN</a></li>
                            @endif
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
    <div class="promo-block" style="background-image:url(/uploads/site/background.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 sm-margin-b-60">
                    <div class="margin-b-10">
                        @if($offer)
                            <h1 class="main__title">{!! $offer->{('title_').App::getLocale()}  !!}</h1>
                            <div class="promo-block-text main__description">{!! $offer->{('description_').App::getLocale()} !!}</div>
                        @else
                            <h2 class="promo-block-title">Alisa <br/> Portman</h2>
                            <p class="promo-block-text">Web &amp; UI/UX Designer</p>
                        @endif
                    </div>
                    <ul class="list-inline social__buttons">
                        <li><a href="#" class="social-icons facebook" data-share_tipe="facebook"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#" class="social-icons twitter" data-share_tipe="twitter"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#" class="social-icons vkontakte" data-share_tipe="vkontakte"><span class="fa fa-vk"></span></a></li>
                        <li><a href="#" class="social-icons telegram" data-share_tipe="telegram"><span class="fa fa-telegram"></span></a></li>
                        <li><a href="#" class="social-icons odnoklassniki" data-share_tipe="odnoklassniki"><span class="fa fa-odnoklassniki"></span></a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    @if(isset($main_videos[0]))
                    <?php
                        $match = [];
                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $main_videos[0]->{('url_').App::getLocale()}, $match);
                        $youtube_id = isset($match[1])? $match[1]: 'undefined';
                    ?>
                    <div
                        class="promo-block-img-wrap"
                        data-toggle="modal"
                        data-target="#myModal"
                        data-youtube_id="{{ $youtube_id }}"
                        data-title="{{ $main_videos[0]->{('title_').App::getLocale()} }}"
                        >
                        <div class="" style="text-align: center;">
                            <img class="img-responsive img-rounded youtube-icon1" src="{{url()}}/site/youtube_icone.png" />
                            <b style="font-size:20px">{{$main_videos[0]->{('title_').App::getLocale()} }}</b>
                            <img class="promo-block-img img-responsive" src="https://img.youtube.com/vi/{{$youtube_id}}/0.jpg" />
                        </div>
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
    <div id="about" style="background-image:url(/uploads/site/background.jpg);">
        <div class="container content-lg">
            <div class="row">
                <div class="col-sm-5 sm-margin-b-60 video2">
                    @if(isset($main_videos[1]))
                        <?php
                            $match = [];
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $main_videos[1]->{('url_').App::getLocale()}, $match);
                            $youtube_id = isset($match[1])? $match[1]: 'undefined';
                        ?>
                    <div
                        data-toggle="modal"
                        data-target="#myModal"
                        data-youtube_id="{{ $youtube_id }}"
                        data-title="{{ $main_videos[1]->{('title_').App::getLocale()} }}"
                    >
                        <img class="img-responsive img-rounded youtube-icon" src="{{url()}}/site/youtube_icone.png" />
                        <img
                            class="promo-block-img img-responsive"
                            src="https://img.youtube.com/vi/{{$youtube_id}}/0.jpg"
                            align=""
                        >
                        <h4>{{$main_videos[1]->{('title_').App::getLocale()} }}</h4>
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
    <div id="experience" style="background-image:url(/uploads/site/background.jpg);">
        <div class="" data-auto-height="true">
            <div class="container content-lg">
                <div class="row row-space-2 margin-b-4">
                    <!-- About us -->
                    <div class="col-md-3 col-sm-6 md-margin-b-4">
                        <div class="block4" data-height="height">
                            <div class="service-element">
                                <i class="service-icon"></i>
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
                        <div class="block4" data-height="height">
                            <div class="service-element">
                                <i class="service-icon"></i>
                            </div>
                            <div class="service-info">
                                <h3>{{trans('site.faq')}}</h3>
                                @foreach($faqs as $faq)
                                    <h5>{{$faq->{('title_').App::getLocale()} }}</h5>
                                    <div class="faq_description faq_description_{{$faq->id}}">
                                        {!! $faq->{('description_').App::getLocale()} !!}
                                    </div>
                                    <a class="faq_title" data-id="{{$faq->id}}" href="javascript:void(0)">
                                        {{trans('site.read_more')}}
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--// FAQ -->

                    <!-- Our Products -->
                    <div class="col-md-3 col-sm-6 md-margin-b-4">
                        <div class="block4" data-height="height">
                            <div class="service-element">
                                <i class="service-icon"></i>
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
                        <div class="block4" data-height="height">
                            <div class="service-element">
                                <i class="service-icon"></i>
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
<div id="work" style="background-image:url(/uploads/site/background.jpg);">
    <div class="">
        <div class="container content-lg">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                   <h2>{{trans('site.menus.videos')}}</h2>
                </div>
            </div>

            <!--// end row -->
            <div class="row">
                <?php
                    $video_col_num = ceil (12 / $videos->count());
                ?>
                @foreach($videos as $video)
                    <?php
                        $match = [];
                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->{('url_').App::getLocale()}, $match);
                        $youtube_id = isset($match[1])? $match[1]: 'undefined';
                        
                    ?>
                <div class="col-md-{{$video_col_num}}">
                    <img
                        data-toggle="modal"
                        data-target="#myModal"
                        data-youtube_id="{{$youtube_id}}"
                        data-title="{{ $video->{('title_').App::getLocale()} }}"
                        class="img-responsive  videos"
                        src="https://img.youtube.com/vi/{{ $youtube_id }}/0.jpg" alt="Image">
                    <b>{{ $video->{('title_').App::getLocale()} }}</b>
                </div>
                @endforeach
            </div>
            <!--// end row -->
        </div>
    </div>
</div>
    <!-- End Work -->

    <!-- Contact -->
    <div id="contact" style="background-image:url(/uploads/site/background.jpg);">
        <div class="">
            <div class="container content-lg">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                       <h2>{{ trans('site.menus.contact') }}</h2>
                       {!! $user->info !!}
                    </div>
                </div>
                <!--// end row -->

                <div class="row footer_block">
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
                url  = 'https://vkontakte.ru/share.php?';
                url += 'url='          + encodeURIComponent(purl);
                url += '&title='       + encodeURIComponent(ptitle);
//                url += '&description=' + encodeURIComponent(text);
                url += '&image='       + encodeURIComponent(pimg);
                Share.popup(url);
            },
            odnoklassniki: function(purl, ptitle, pimg, text) {
                    var url = 'Вы ввели недопустимый текст или запрещённую ссылку'
                    var url = 'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview'
                            + '&st.imageUrl=' + encodeURIComponent(pimg)
                            + '&st.shareUrl=' + encodeURIComponent(purl);
                    console.log(url);
                    Share.popup(url);
            },
            facebook: function(purl, ptitle, pimg, text) {
                FB.ui({
                  method : 'share',
                  href   : purl,
                  display: 'dialog'
                }, function(response){});
            },
            twitter: function(purl, via, text) {
                    var url  = 'https://twitter.com/intent/tweet?'
                            +'&url='+encodeURIComponent(purl)
                            +'&via='+ via
                            //+'&text='+encodeURIComponent(text)
                            +'&related='+via;
                    Share.popup(url);
            },
            telegram: function(purl, ptitle, pimg, text) {
                    var url = 'https://t.me/share/url?'+
                            'url='+encodeURIComponent(purl);
                    Share.popup(url);
            },
            popup: function(url) {
                var w = 700;
                var h = 500;
                var y = window.top.outerHeight / 2 + window.top.screenY - ( w / 2) - 100
                var x = window.top.outerWidth / 2 + window.top.screenX - ( h / 2)
                window.open(url, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+y+', left='+x);
            }
        };
        var shared_info = {
            "url"         : '{{url()}}/'+location.pathname.substr(1),
            "title"       : '{{ $shared_info['title'] }}',
            "description" : '{{ $shared_info['description'] }}',
            "image"       : '{{ isset($shared_info['image'][0])? $shared_info['image'][0]: $shared_info['url'] }}',
        };

        $('.social__buttons li a').on('click', function(e) {
            e.preventDefault();
            var share_tipe = $(this).data('share_tipe');
            switch( share_tipe )
            {
                case 'facebook'      : Share.facebook(shared_info.url, shared_info.title, shared_info.image, shared_info.description ) ;break;
                case 'twitter'       : Share.twitter(shared_info.url, 'biznesfl', shared_info.description) ;break;
                case 'vkontakte'     : Share.vkontakte(shared_info.url, shared_info.title, shared_info.image, shared_info.description ) ;break;
                case 'odnoklassniki' : Share.odnoklassniki(shared_info.url, shared_info.title, shared_info.image, shared_info.description ) ;break;
                case 'telegram'      : Share.telegram(shared_info.url, shared_info.title, shared_info.image, shared_info.description ) ;break;
            }
        });
    </script>
    <style>
        h1 {
            color: red;
        }
        .header_navigation_block , .footer_block {
            background: #c5e4ff87;
            border-color: transparent;
        }
        
        .btn-default-bg{
            background: #17bed2;
        }
        .block4 {
            background: #fff;
            padding: 20px 20px;
        }
        .faq_title {
            font-weight: bold;
            font-size: 15px;
            color:#70a6cc !important;
        }
        .faq_title span {
            color:#70a6cc !important;
            font-size: 12px;
        }
        .youtube-icon {
            cursor: pointer;
            position:absolute;
            z-index: 1;
            left:45%;
            top:40%;
        }
        .youtube-icon1 {
            cursor: pointer;
            position:absolute;
            z-index: 1;
            left:55%;
            top:50%;
        }
    </style>
@endsection
<!--========== END PAGE LAYOUT ==========-->
@endsection