@extends('user/layout')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Validation</h3>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            {!! Form::model($user, array('url' => 'user/update/','files' => true, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
                            <span class="section">Personal Info</span>

                            <div class="item form-group">
                                {!! Form::label('name', 'Name', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Name']) !!}
                                </div>
                            </div>

                            <div class="item form-group">
                                {!! Form::label('username', 'User name (faberlic code)', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('username', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'User name (faberlic code)']) !!}
                                </div>
                            </div>

                            <div class="item form-group">
                                {!! Form::label('email', 'Email', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Email']) !!}
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                {!! Form::label('info', 'Info', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::textarea('info', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Info']) !!}
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                {!! Form::label('avatar', 'Avatar', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::file('avatar', array('class' => 'image')) !!}
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                {!! Form::label('password', 'Password', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('password', '', ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Password']) !!}
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection