@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <h1 class="text-center py-4">Bloglar</h1>
            <div class="row">
                @forelse($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4" id="cards">
                    <div class="card border-0 shadow rounded">
                        <a href="/blog/{{$post->id}}">
                            <img src={{asset('pictures/'.$post->picture)}} class="card-img-top" alt="">
                        </a>
                        <div class="card-body">
                            <a href="/blog/{{$post->id}}" class="text-decoration-none text-secondary">
                                {{ucfirst($post->title) }}
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-warning">Henüz bir post bulunmamakta</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
