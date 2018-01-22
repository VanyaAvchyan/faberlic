@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @if($model)
          {!! Form::model($model, array('url' => 'user/video/'.$video_num, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
        @else
          {!! Form::open(array('url' => 'user/video/'.$video_num, 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
          <div>
              {!! Form::label('title', 'Video '.$video_num.' title') !!}
              {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Video '.$video_num.' title']) !!}
          </div>

          <div>
              {!! Form::label('url', 'Url') !!}
              {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Url']) !!}
          </div>

          <div>
              {!! Form::label('thumb', 'Thumb') !!}
              {!! Form::text('thumb', null, ['class' => 'form-control', 'placeholder' => 'Thumb']) !!}
          </div>

          <div>
              {!! Form::label('description', 'Description') !!}
              {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
          </div>

          <div>
            <br/>
            <button class="btn btn-primary">Create</button>
          </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection