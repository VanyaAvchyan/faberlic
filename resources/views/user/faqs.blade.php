@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @if($model)
          {!! Form::model($model, array('url' => 'user/faq/'.$model->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left'))!!}
        @else
          {!! Form::open(array('url' => 'user/faq', 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
          <div>
              {!! Form::label('title', 'F.A.Q Title') !!}
              {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'F.A.Q Title']) !!}
          </div>
          <div>
              {!! Form::label('description', 'Description') !!}
              {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
          </div>
          <div>
            <br/>
            <button class="btn btn-primary">Create</button>
            <a href="{{url('user/faq')}}" class="btn btn-primary">Cancel</a>
          </div>
        {!! Form::close() !!}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Իմ կոնտակտները</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($models as $m)
                    <tr>
                        <td>{{$m->title}}</td>
                        <td>{{$m->description}}</td>
                        <td>
                            <a href="{{url('user/faq/'.$m->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            {!! Form::open(array('url' => 'user/faq/'.$m->id, 'method' => 'DELETE', 'class' => 'form-horizontal form-label-left'))!!}
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
</div



@endsection