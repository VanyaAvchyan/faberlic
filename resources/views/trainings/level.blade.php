@extends('site/layout')
@section('content')

<div class="container" >
  <div class="row">
    <div class="col-sm-12">
        <ul class="nav navbar-nav navbar-nav-right">
            <li><a @if($lang=='am') class='active' @endif href="{{url('training/videos/'.$id.'/am')}}">AM</a></li>
            <li><a @if($lang=='ru') class='active' @endif href="{{url('training/videos/'.$id.'/ru')}}">RU</a></li>
            <li><a @if($lang=='en') class='active' @endif href="{{url('training/videos/'.$id.'/en')}}">EN</a></li>
        </ul>
    </div>
    <h1>Training videos </h1>
    @foreach($training_videos as $training_video)
    <div class="col-sm-6">
        <div class="embed-responsive embed-responsive-4by3">
            <?php
                $match = [];
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $training_video->{'url_'.$lang}, $match);
                $youtube_id = isset($match[1])? $match[1]: false;
            ?>
            @if($youtube_id)
                <iframe src="https://www.youtube.com/embed/{{ $youtube_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            @endif
        </div>
    </div>
    @endforeach
  </div>
</div>
    <style>
        .active{
            color: red;
        }
    </style>
@endsection
