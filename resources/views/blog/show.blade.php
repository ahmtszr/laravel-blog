@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mb-3">
            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h1 class="py-4">{!! $posts->title !!}</h1>
            <img src="{{asset('pictures/'.$posts->picture)}}" class="img-fluid" alt="">
            <div class="py-4">
                <p class="">{!! $posts->body !!}</p>
            </div>

        </div>
    </div>
</div>

@endsection
