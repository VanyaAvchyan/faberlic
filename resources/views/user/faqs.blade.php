@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @include('errors.messages')
        @if($model)
          {!! Form::model($model, array('url' => 'user/faq/'.$model->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
        @else
          {!! Form::open(array('url' => 'user/faq', 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
        <div>
            <div>
                {!! Form::label('title_am', 'F.A.Q title AM') !!}
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
                {!! Form::label('title_ru', 'F.A.Q title RU') !!}
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
                {!! Form::label('title_en', 'F.A.Q title EN') !!}
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

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>FAQ's</h2>
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
                            <td>{{$m->title_am}}</td>
                            <td>{{$m->description_am}}</td>

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
        
        
    </div>
</div>
@endsection