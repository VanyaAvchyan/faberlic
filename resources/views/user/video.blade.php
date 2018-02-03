@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @if($model && $video_num)
          {!! Form::model($model, array('url' => 'user/video/'.$video_num, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
        @else
          {!! Form::open(array('url' => 'user/video/'.$video_num, 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
        <div>
            <div>
                {!! Form::label('title_am', 'Video '.$video_num.' title AM') !!}
                {!! Form::text('title_am', null, ['class' => 'form-control', 'placeholder' => 'Video '.$video_num.' title AM']) !!}
            </div>
            <br>
            <div>
                {!! Form::label('url_am', 'Url AM code') !!}
                {!! Form::text('url_am', null, ['class' => 'form-control', 'placeholder' => 'Url AM code']) !!}
            </div>
            <br>

            <div>
                {!! Form::label('thumb_am', 'Thumb AM https://img.youtube.com/vi/YOUTBE CODE/0.jpg') !!}
                {!! Form::text('thumb_am', null, ['class' => 'form-control', 'placeholder' => 'Thumb AM']) !!}
            </div>
            @if(false)
                <br>
                <div>
                    {!! Form::label('description_am', 'Description AM') !!}
                    {!! Form::textarea('description_am', null, ['class' => 'form-control', 'placeholder' => 'Description AM']) !!}
                </div>
            @endif
        </div>

        <hr/>
        <div>
            <div>
                {!! Form::label('title_ru', 'Video '.$video_num.' title RU') !!}
                {!! Form::text('title_ru', null, ['class' => 'form-control', 'placeholder' => 'Video '.$video_num.' title RU']) !!}
            </div>
            <br>
            <div>
                {!! Form::label('url_ru', 'Url RU code') !!}
                {!! Form::text('url_ru', null, ['class' => 'form-control', 'placeholder' => 'Url RU code']) !!}
            </div>
            <br>
            <div>
                {!! Form::label('thumb_ru', 'Thumb RU https://img.youtube.com/vi/YOUTBE CODE/0.jpg') !!}
                {!! Form::text('thumb_ru', null, ['class' => 'form-control', 'placeholder' => 'Thumb RU']) !!}
            </div>
            @if(false)
                <br>
                <div>
                    {!! Form::label('description_ru', 'Description RU') !!}
                    {!! Form::textarea('description_ru', null, ['class' => 'form-control', 'placeholder' => 'Description RU']) !!}
                </div>
            @endif
        </div>

        <hr/>
        <div>
            
            <div>
                {!! Form::label('title_en', 'Video '.$video_num.' title EN') !!}
                {!! Form::text('title_en', null, ['class' => 'form-control', 'placeholder' => 'Video '.$video_num.' title EN']) !!}
            </div>
            <br>
            <div>
                {!! Form::label('url_en', 'Url EN code') !!}
                {!! Form::text('url_en', null, ['class' => 'form-control', 'placeholder' => 'Url EN code']) !!}
            </div>
            <br>
            <div>
                {!! Form::label('thumb_en', 'Thumb EN https://img.youtube.com/vi/YOUTBE CODE/0.jpg') !!}
                {!! Form::text('thumb_en', null, ['class' => 'form-control', 'placeholder' => 'Thumb EN']) !!}
            </div>
            @if(false)
                <br>
                <div>
                    {!! Form::label('description_en', 'Description EN') !!}
                    {!! Form::textarea('description_en', null, ['class' => 'form-control', 'placeholder' => 'Description EN']) !!}
                </div>
            @endif
        </div>
        
        
          <div>
            <br/>
            <button class="btn btn-primary">Create</button>
          </div>
        {!! Form::close() !!}

        @if(!$video_num)
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
                        <th>Description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>


                    <tbody>
                       @foreach($model as $m)
                        <tr>
                            <td>{{$m->title_am}}</td>
                            <td>{{$m->description_am}}</td>
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