@extends('site/layout')
@section('content')
<div class="promo-block">
    <div class="container">
        <div class="col-sm-6">
            <div class="promo-block-img-wrap">
                <h3>Training videos</h3>
                @foreach($training_videos as $training_video)
                    <div class="col-md-3">
                        {!! $training_video->{'url_'.$lang} !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection