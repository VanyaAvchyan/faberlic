@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @if($model)
          {!! Form::model($model, array('url' => 'user/partner', 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
        @else
          {!! Form::open(array('url' => 'user/partner', 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
          <div>
              {!! Form::label('title', 'Partner Info') !!}
              {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Partner Info']) !!}
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