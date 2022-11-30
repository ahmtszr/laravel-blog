@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mb-3">
                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <h1 class="py-4">{{$posts->title}}</h1>
                <img src="{{asset('pictures/'.$posts->picture)}}" class="img-fluid" alt="">
                <div class="py-4">
                    <p class="">{{ ($posts->body) }}</p>
                </div>

            </div>
            <div class="col-md-4">
                <h4 class="py-4">Diğer Postlar</h4>

                <div class="card border-0 shadow rounded">
                    <a href="" class="text-decoration-none text-dark">
                        <img src="" alt="" class="img-fluid">
                        <div class="card-body">

                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection
