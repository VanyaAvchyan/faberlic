<!DOCTYPE html>
<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        
        @if(isset($shared_info))
        <meta name="title" content='{{ $shared_info['title'] }}'>
        <meta name="description" content='{{ $shared_info['description'] }}'>
        
        <!--facebook share info-->
        <meta property="og:url" content="{{url('/'.App::getLocale()) }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $shared_info['title'] }}">
        <meta property="og:image" content="{{ isset($shared_info['image'][0])? $shared_info['image'][0]: 'undefined' }} }}">
        <meta property="og:description" content="{{ $shared_info['description'] }}">
        <meta property="fb:app_id" content="1696277890422658">
        <!--end facebook share info-->
        
        <!--Twitter share info-->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@biznesfl">
        <meta name="twitter:creator" content="@{{ $shared_info['user']->name }}">
        <meta name="twitter:title" content="{{ $shared_info['title'] }}">
        <meta name="twitter:description" content="{{ $shared_info['description'] }}">
        <meta name="twitter:image" content="{{ isset($shared_info['image'][0])? $shared_info['image'][0]: 'undefined' }}">
        <meta name="twitter:twitter:domain" content="{{url('/'.App::getLocale()) }}">
        <!--end Twitter share info-->
        @endif
        <title>Biznesfl</title>
        
        <!-- GLOBAL MANDATORY STYLES -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="{{url()}}/site/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css"/>
        <link href="{{url()}}/site/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="{{url()}}/site/css/animate.css" rel="stylesheet">
        <link href="{{url()}}/site/vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>

        <!-- THEME STYLES -->
        <link href="{{url()}}/site/css/layout.min.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico"/>

        <link href="{{url()}}/site/css/common.css" rel="stylesheet" type="text/css"/>
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
    <body id="body" data-spy="scroll" data-target=".header">
        @yield('content')
        
        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="{{url()}}/site/vendor/jquery.min.js" type="text/javascript"></script>
        <script src="{{url()}}/site/vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="{{url()}}/site/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="{{url()}}/site/vendor/jquery.easing.js" type="text/javascript"></script>
        <script src="{{url()}}/site/vendor/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="{{url()}}/site/vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="{{url()}}/site/vendor/jquery.wow.min.js" type="text/javascript"></script>
        <script src="{{url()}}/site/vendor/jquery.parallax.min.js" type="text/javascript"></script>
        <script src="{{url()}}/site/vendor/jquery.appear.js" type="text/javascript"></script>
        <script src="{{url()}}/site/vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="{{url()}}/site/js/layout.min.js" type="text/javascript"></script>
        <script src="{{url()}}/site/js/components/progress-bar.min.js" type="text/javascript"></script>
        <script src="{{url()}}/site/js/components/swiper.min.js" type="text/javascript"></script>
        <script src="{{url()}}/site/js/components/wow.min.js" type="text/javascript"></script>
        <script src="{{url()}}/site/js/social.js" type="text/javascript"></script>
        <script src="{{url()}}/site/js/common.js" type="text/javascript"></script>
        @yield('js')
    </body>
    <!-- END BODY -->
</html>