@extends('user/layout')
@section('content')
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          {!! Form::open(array('url' => 'user/login', 'method' => 'POST'))!!}
            <h1>User login</h1>
            <div>
                {!! Form::label('username', 'Username') !!}
                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
            </div>
            <div>
              {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
            </div>
            <div>
              <button class="btn btn-default submit" href="index.html">Log in</button>
            </div>
          {!! Form::close() !!}
        </section>
      </div>
    </div>
</div>
@endsection