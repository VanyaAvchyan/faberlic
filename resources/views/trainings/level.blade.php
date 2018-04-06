@extends('site/layout')
@section('content')
<div class="container content-lg">
    <div class="col-lg-12">
        <h2>Training videos</h2>
        @foreach($training_videos as $training_video)
        <div class="col-lg-2">
            {!! $training_video->{'url_'.$lang} !!}
        </div>
        @endforeach
    </div>
</div>
<style>
    p,span {
        padding: 10px
    }
</style>
@endsection
