@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @include('errors.messages')
        @if($model && $order)
          {!! Form::model($model, array('url' => 'user/video/'.$order, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
        @else
          {!! Form::open(array('url' => 'user/video/'.$order, 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
        <div>
            <div>
                {!! Form::label('title_am', 'Video '.$order.' title AM') !!}
                {!! Form::text('title_am', null, ['class' => 'form-control', 'placeholder' => 'Video '.$order.' title AM']) !!}
            </div>
            <br>
            <div>
                {!! Form::label('url_am', 'Url AM') !!}
                {!! Form::text('url_am', null, ['class' => 'form-control', 'placeholder' => 'Url AM']) !!}
            </div>
        </div>

        <hr/>
        <div>
            <div>
                {!! Form::label('title_ru', 'Video '.$order.' title RU') !!}
                {!! Form::text('title_ru', null, ['class' => 'form-control', 'placeholder' => 'Video '.$order.' title RU']) !!}
            </div>
            <br>
            <div>
                {!! Form::label('url_ru', 'Url RU') !!}
                {!! Form::text('url_ru', null, ['class' => 'form-control', 'placeholder' => 'Url RU']) !!}
            </div>

        <hr/>
        <div>
            
            <div>
                {!! Form::label('title_en', 'Video '.$order.' title EN') !!}
                {!! Form::text('title_en', null, ['class' => 'form-control', 'placeholder' => 'Video '.$order.' title EN']) !!}
            </div>
            <br>
            <div>
                {!! Form::label('url_en', 'Url EN') !!}
                {!! Form::text('url_en', null, ['class' => 'form-control', 'placeholder' => 'Url EN']) !!}
            </div>
        </div>
        {!! Form::hidden('order', $order) !!}
        
        
          <div>
            <br/>
            <button class="btn btn-primary">Create</button>
          </div>
        {!! Form::close() !!}

        @if(!$order)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Իմ Videoner@</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>


                    <tbody>
                       @foreach($models as $m)
                        <tr>
                            <td>{{$m->title_am}}</td>
                            <td>
                                <a href="{{url('user/video/'.$m->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                {!! Form::open(array('url' => 'user/video/'.$m->id, 'method' => 'DELETE', 'class' => 'form-horizontal form-label-left'))!!}
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
        @endif
    </div>
</div>

@endsection