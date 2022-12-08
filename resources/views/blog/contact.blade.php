@extends('layouts.app')

@section('content')


    <div class="container p-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">İletişim</li>
            </ol>
        </nav>
        <div class="row border bg-light shadow mt-4 py-4">
            <div class="col-8 pt-2 mx-auto">
                <div class="p-5">
                    <form action="{{ route('blog-contact-store.view') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-column justify-content-center">
                            <h1 class="text-center pb-4">İletişim</h1>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label fw-bold">Ad soyad:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label fw-bold">E-mail:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="message" class="col-sm-2 col-form-label fw-bold">Mesaj:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary w-100 ">Gönder</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

