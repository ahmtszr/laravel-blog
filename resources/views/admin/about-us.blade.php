@extends('layouts.admin-master')

@section('title','About Us')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Hakkımızda</h4>
            </div>
            <div class="card-body">

                <form action="{{ route('admin.about-us-create.view') }}" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="textarea" name="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Body</label>
                        <textarea name="body" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-end">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
