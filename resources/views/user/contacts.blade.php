@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @if($model)
          {!! Form::model($model, array('url' => 'user/contact/'.$model->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left'))!!}
        @else
          {!! Form::open(array('url' => 'user/contact', 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
          <div>
              {!! Form::label('title', 'Contact Title') !!}
              {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Contact Title']) !!}
          </div>
          <div>
              {!! Form::label('description', 'Description') !!}
              {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
          </div>
          <div>
            <br/>
            <button class="btn btn-primary">Create</button>
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
                   @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->title}}</td>
                        <td>{{$contact->description}}</td>
                        <td>
                            <a href="{{url('user/contact/update/'.$contact->id)}}">
                                <span class="glyphicon glyphicon-pencil pull-left" aria-hidden="true"></span>
                            </a>
                            
                            <a href="{{url('user/contact/delete/'.$contact->id)}}">
                                <span class="glyphicon glyphicon-trash pull-right" aria-hidden="true"></span>
                            </a>
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