@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @include('errors.messages')
        @if($model)
          {!! Form::model($model, array('url' => 'user/partner', 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
        @else
          {!! Form::open(array('url' => 'user/partner', 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
        <div>
            <div>
                {!! Form::label('title_am', 'Partner Info AM') !!}
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
                {!! Form::label('title_ru', 'Partner Info RU') !!}
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
                {!! Form::label('title_en', 'Partner Info EN') !!}
                {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
            </div>
            <div>
                {!! Form::label('description_en', 'Description EN') !!}
                {!! Form::textarea('description_en', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <br/>
        <div>
          <button class="btn btn-primary">Create</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection