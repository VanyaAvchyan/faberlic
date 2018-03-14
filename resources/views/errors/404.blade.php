@extends('site/layout')
@section('content')
    <div class="col-md-12">
        <div class="col-middle">
            <div class="text-center text-center">
                <h1 class="error-number">404</h1>
                <h2>Sorry but we couldn't find this page</h2>
                <p>This page you are looking for does not exist</p>
                <p><a href="{{url('/')}}">Return to main page?</a></p>
            </div>
        </div>
    </div>
@endsection