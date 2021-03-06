<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    @if(auth()->check())
    <title>Hello @if(auth()->user()->role === 1) Admin  : {{auth()->user()->name}} @else  User  : {{auth()->user()->name}} @endif !</title>
    @else
    <title>Hello Guest !</title>
    @endif

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="nav-md">
    <div class="container body">
        <div class="main_container">
          @if(auth()->check())    
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="{{url('user')}}" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
              </div>
              <div class="clearfix"></div>

              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                    @if(auth()->user()->role === 1)
                        <img src="/uploads/user/{{auth()->user()->avatar}}" alt="{{auth()->user()->name}}" class="img-circle profile_img">
                    @endif
                </div>
                <div class="profile_info">
                  <span>@if(auth()->user()->role === 1) Admin @else User @endif,</span>
                  <h2>{{auth()->user()->name}}</h2>
                </div>
              </div>
              <!-- /menu profile quick info -->
              <br />

              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3>General</h3>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{url('user/offer')}}">1. Մեր բիզնես առաջարկը</a></li>
                        <li><a href="{{url('user/video/first')}}">Video 1</a></li>
                        <li><a href="{{url('user/video/second')}}">Video 2</a></li>
                        <li><a href="{{url('user/partners')}}">2. Դառնալով մեր գործընկերը, Դուք</a></li>
                        <li><a href="{{url('user/info/about_us')}}">Ակցիաներ</a></li>
                        <li><a href="{{url('user/info/our_product')}}">Սկսնակների Ակցիաներ</a></li>
                        <li><a href="{{url('user/info/undecided')}}">Նորույթներ</a></li>
                        <li><a href="{{url('user/contact')}}">Contacts</a></li>
                        @if(auth()->user()->role === 1)
                            <li><a href="{{url('user/faq')}}">F.A.Q</a></li>
                        @endif
                        <li><a href="{{url('user/video')}}">Videoner</a></li>
                        @if(auth()->user()->role === 1)
                            <li><a href="{{url('user/users')}}">Users</a></li>
                            <li><a href="{{url('user/trainings')}}">Trainings codes</a></li>
                            <li><a href="{{url('user/training-videos')}}">Training videos</a></li>
                        @endif
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /sidebar menu -->
            </div>
          </div>
          <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
              <nav>
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                  <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      {{auth()->user()->name}}
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href="{{url('training/videos')}}">Training 1</a></li>
                      <li><a href="{{url('user/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        @endif
          <!-- /top navigation -->
            @yield('content')
        </div>
    </div>

    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.5/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.5/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    
 
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.5/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
    
    <!-- Initialize the editor. -->
    <script> $(function() { $('textarea').froalaEditor() }); </script>

  </body>
</html>
