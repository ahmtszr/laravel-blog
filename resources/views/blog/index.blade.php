@extends('layouts.app')
@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-4">
            <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bloglar</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12 pt-2">
            <h1 class="text-center py-4">Bloglar</h1>
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4" id="cards">
                    <div class="card border-0 shadow rounded h-100">
                        <a href="/blog/{{$post->id}}">
                            <img src="{{asset('pictures/'.$post->picture)}}" class="card-img-top img-responsive" alt="">
                        </a>
                        <div class="card-body">
                            <h4 class="mb-3">
                                <a href="/blog/{{$post->id}}" class="text-decoration-none text-secondary line-clamp-1">
                                    {{ucfirst($post->title) }}
                                </a>
                            </h4>
                            <p class="text-muted line-clamp-2">{{$post->body}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
