@extends('layouts.admin-master')

@section('title','Edit Post')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Post
                <a href="{{ url('admin/posts') }}" class="btn btn-danger float-end">Geri</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="textarea" name="title" value="{{$post->title}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Body</label>
                    <textarea name="body" class="form-control" rows="3" required>{{$post->body}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Picture</label>
                    <input type="file" class="form-control" name="picture" id="picture" value={{$post->picture}}>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary float-end">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
