@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <div class="col-12 pt-2">
                <a href="/my-blog" class="btn btn-outline-primary btn-sm">Geri Dön</a>

                <br>

                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-5 p-5">
                    <h1 class="display-4">Yeni Post Oluştur</h1>
                    <p>Bir gönderi oluşturmak için bu formu doldurun ve gönderin</p>

                    <hr>

                    <form action="{{url('/my-blog/create/post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post Başlığı</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Post başlığınızı girin" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Post İçeriği</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Postunuzun içeriğini giriniz" rows="" required></textarea>
                            </div>
                            <div class="row mb-3 @error('picture') is-invalid @enderror">
                                <div class="image-preview">
                                    <div class="preview pb-3 d-flex justify-content-center">
                                        <img id="file-ip-1-preview" class="img-fluid rounded">

                                    </div>
                                    <label for="picture" class="fw-bold">Resim</label>
                                    <input type="file" class="form-control" name="picture" id="picture" required>
                                </div>
                                @error('picture')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Post Oluştur
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
