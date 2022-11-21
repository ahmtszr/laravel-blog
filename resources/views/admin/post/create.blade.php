@extends('layouts.admin-master')

@section('title','Add Post')

@section('content')
{{-- TODO: Ahmet SEENDEEEE --}}
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Post Ekle
                <a href="{{url('admin/posts')}}" class="btn btn-danger float-end">Geri</a>
            </h4>
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="textarea" name="title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Body</label>
                    <textarea name="body" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Picture</label>
                    <input type="file" class="form-control" name="picture" id="picture">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary float-end">Ekle</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
