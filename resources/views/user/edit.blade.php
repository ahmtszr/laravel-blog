@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/my-blog" class="btn btn-outline-primary btn-sm">Geri Dön</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4 p-5">
                    <h1 class="display-4">Postu Düzenle</h1>
                    <p>Postu güncellemek için düzenleyin ve gönderin</p>

                    <hr>

                    <form action="{!! route('my-blog.update',$posts->id) !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post Başlığı</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Başlığı giriniz" value="{{ $posts->title }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Post İçeriği</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Post içeriğini giriniz"
                                          rows="5" required>{{ $posts->body }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Resim</label>
                                <input type="file" class="form-control" name="picture" id="picture" value={{$posts->picture}}>
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
