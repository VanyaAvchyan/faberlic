@extends('user/layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        @include('errors.messages')
        <h1>Ստեղծեք տեսանյութեր ուսուցման համար</h1>
        @if(isset($model) && $model)
          {!! Form::model($model, array('url' => 'training/video/'.$model->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left')) !!}
        @else
          {!! Form::open(array('url' => 'training/video', 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}
        @endif
        <div>
            <div>
                {!! Form::label('training_level', 'Ընտրեք ուսուցման տեսակը') !!}
                {!! Form::select('training_level', $list , null , ['class' => 'form-control']) !!}
            </div>
        </div>
        <div>
            <div>
                {!! Form::label('url_am', 'Video AM') !!}
                {!! Form::textarea('url_am', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div>
            <div>
                {!! Form::label('url_ru', 'Video RU') !!}
                {!! Form::textarea('url_ru', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div>
            <div>
                {!! Form::label('url_en', 'Video EN') !!}
                {!! Form::textarea('url_en', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <button class="btn btn-primary">Create video</button>
        <a href="{{ url('user/training-videos') }}" class="btn btn-primary">Cancel</a>
        {!! Form::close() !!}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ուսուցման տեսանյութերը</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Training type</th>
                                    <th>Content</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($videos as $video)
                                <tr>
                                    <td>{{(isset($list[$video->training_level]) ? $list[$video->training_level] : 'No')}}</td>
                                    <?php
                                            $match = [];
                                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->url_am, $match);
                                            $youtube_id = isset($match[1])? $match[1]: false;
                                            if($youtube_id)
                                                $video->url_am = "<img src='https://img.youtube.com/vi/{$youtube_id}/0.jpg' width='100'/>";
                                        
                                    ?>
                                    <td>{!! $video->url_am !!}</td>
                                    <td>
                                        <a href="{{url('user/training-videos/'.$video->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                        {!! Form::open(array('url' => 'training/video/'.$video->id, 'method' => 'DELETE', 'class' => 'form-horizontal form-label-left'))!!}
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