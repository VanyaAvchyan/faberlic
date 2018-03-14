@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @include('errors.messages')
        <h1>Ստեղծեք ուսուցման կոդերը</h1>
        @if(isset($model) && $model)
          {!! Form::model($model, array('url' => 'training/code', 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
        @else
          {!! Form::open(array('url' => 'training/code', 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
        <div>
            <div>
                {!! Form::label('level1', 'Ուսուցում 1 code') !!}
                {!! Form::text('level1', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div>
            <div>
                {!! Form::label('level2', 'Ուսուցում 2 code') !!}
                {!! Form::text('level2', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div>
            <div>
                {!! Form::label('level3', 'Ուսուցում 3 code') !!}
                {!! Form::text('level3', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <button class="btn btn-primary">Create code</button>
        {!! Form::close() !!}
    </div>
</div>
@endsection