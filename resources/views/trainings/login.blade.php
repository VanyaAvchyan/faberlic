@extends('site/layout')
@section('content')
<div class="promo-block">
    <div class="container">
        <div class="col-sm-6">
          @include('errors.messages')
          {!! Form::open(array('url' => 'training/login', 'method' => 'POST'))!!}
            <h1>User login</h1>
            <div>
                {!! Form::label('username', 'Username') !!}
                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
            </div>
            <div>
                {!! Form::label('reg_num', 'Reg. number') !!}
                {!! Form::text('reg_num', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
            </div>
            <div>
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                {!! Form::hidden('trainingNum', isset($trainingNum) ? $trainingNum : false) !!}
            </div>
            <div>
              <button class="btn btn-default submit" href="index.html">Log in</button>
            </div>
          {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection