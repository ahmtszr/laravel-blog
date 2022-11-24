@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/my-blog" class="btn btn-outline-primary btn-sm">Geri Dön</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4 p-5">
                    <h1 class="display-4">Edit Post</h1>
                    <p>Postu güncellemek için düzenleyin ve gönderin</p>

                    <hr>

                    <form action="" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post Başlığı</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Post Title" value="{{ $posts->title }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Post İçeriği</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                          rows="5" required>{{ $posts->body }}</textarea>
                            </div>
                            <div class="row mb-3 @error('picture') is-invalid @enderror">
                                <div class="image-preview">
                                    <div class="preview pb-3 d-flex justify-content-center">
                                        <img id="file-ip-1-preview" class="img-fluid rounded">
                                    </div>
                                    <label for="picture" class="fw-bold">Resim</label>
                                    <input type="file" class="form-control" name="picture" id="picture">
                                </div>
                                @error('picture')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Postu Güncelle
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
