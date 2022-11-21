@extends('layouts.admin-master')

@section('title','Blog Dashboard')

@section('content')

<div class="container-fluid px4">

    <div class="card mt-4">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Postlar</h4>
            <a href="{{ url('admin/add-post') }}" class="btn btn-dark">Ekle</a>
        </div>

        <div class="card-body">

            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="w-5">Id</th>
                        <th class="w-5">UserId</th>
                        <th scope="col">Title</th>
                        <th class="w-10"></th>
                    </tr>
                </thead>

                @foreach($posts as $post)
                <tbody>
                    <tr>
                        <td class="text-center">{{$post->id}}</td>
                        <td class="text-center">{{$post->user_id}}</td>
                        <td>{{$post->title}}</td>
                        <td class="text-center">
                            <a href="{{url('admin/posts/'.$post->id)}}" class="btn btn-success">Düzenle</a>
                            <a href="{{url('admin/delete-post/'.$post->id)}}" class="btn btn-danger">Sil</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
    </div>

</div>

@endsection
