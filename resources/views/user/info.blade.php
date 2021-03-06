@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @include('errors.messages')
        @if($model)
          {!! Form::model($model, array('url' => 'user/info', 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
        @else
          {!! Form::open(array('url' => 'user/info', 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
        <div>
            <div>
                {!! Form::label('title_am', ucfirst($type).' title AM') !!}
                {!! Form::text('title_am', null, ['class' => 'form-control']) !!}
            </div>
            <div>
                {!! Form::label('description_am', 'Description AM') !!}
                {!! Form::textarea('description_am', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <hr/>
        <div>
            <div>
                {!! Form::label('title_ru', ucfirst($type).' title RU') !!}
                {!! Form::text('title_ru', null, ['class' => 'form-control']) !!}
            </div>
            <div>
                {!! Form::label('description_ru', 'Description RU') !!}
                {!! Form::textarea('description_ru', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <hr/>
        <div>
            <div>
                {!! Form::label('title_en', ucfirst($type).' title EN') !!}
                {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
            </div>
            <div>
                {!! Form::label('description_en', 'Description EN') !!}
                {!! Form::textarea('description_en', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div>
            {!! Form::hidden('type', $type ) !!}
        </div>
        <br/>
        <div>
          <button class="btn btn-primary">Create</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection