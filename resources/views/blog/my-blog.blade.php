@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <h1 class="text-center py-4">Bloglarım</h1>

                    <a href="/my-blog/create/post" class="text-decoration-none text-secondary">
                        <button type="submit">Post Ekle</button>
                    </a>

                <div class="row">
                    @forelse($posts as $post)
                        <div class="col-md-6 col-lg-4 mb-4" id="cards">
                            <div class="card border-0 shadow rounded">
                                <a href="./my-blog/{{$post->id}}">
                                    <img src={{asset('pictures/'.$post->picture)}} class="card-img-top" alt="">
                                </a>
                                <div class="card-body">
                                    <a href="./my-blog/{{$post->id}}" class="text-decoration-none text-secondary">
                                        {{ucfirst($post->title) }}
                                    </a>
                                    <a href="./my-blog/{{$post->id}}/edit" class="text-decoration-none text-secondary">
                                        <button type="submit" class="btn btn-success">Düzenle</button>
                                    </a>
                                    <a href="{{url('delete/my-blog/'.$post->id)}}" class="btn btn-danger">Sil</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-warning">Henüz bir postunuz yok</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
