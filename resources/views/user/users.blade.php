@extends('user/layout')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create or update users</h3>
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
                            @if($model)
                                {!! Form::model($model, array('url' => 'user/user/'.$model->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
                            @else
                                {!! Form::open(array('url' => 'user/create', 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
                            @endif
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
                                {!! Form::label('password', 'Password', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('password', '', ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Password']) !!}
                                </div>
                            </div>

                            <div class="item form-group">
                                {!! Form::label('banned', 'Banned', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="icheckbox_flat-green">
                                    <input type="checkbox" class="flat" name="banned" style="" @if($model && $model->banned) checked="checked" @endif />
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Իմ userner@</h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                      <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Faberlic code</th>
                                            <th>Banned</th>
                                            <th>Actions</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                           @foreach($models as $m)
                                            <tr>
                                                <td>{{$m->name}}</td>
                                                <td>{{$m->username}}</td>
                                                <td> @if( !$m->banned )No @else Yes @endif</td>

                                                <td>
                                                    <a href="{{url('user/users/'.$m->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                    {!! Form::open(array('url' => 'user/users/'.$m->id, 'method' => 'DELETE', 'class' => 'form-horizontal form-label-left'))!!}
                                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection