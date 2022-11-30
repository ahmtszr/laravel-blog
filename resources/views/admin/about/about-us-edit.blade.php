@extends('layouts.admin-master')

@section('title','About Us Edit')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Edit About Us
                    <a href="{{ route('admin.about-us') }}" class="btn btn-danger float-end">Geri</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/about-us/update/'.$about_us->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="textarea" name="title" value="{!! $about_us->title !!}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3" required>{!! $about_us->description !!}</textarea>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-end">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
