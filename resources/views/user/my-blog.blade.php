@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <h1 class="text-center py-4">Bloglarım</h1>

                    <a href="/my-blog/create/post" class="text-decoration-none text-secondary d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-success">Post Ekle</button>
                    </a>
                <div class="row mt-4">
                    @foreach($posts as $post)
                        <div class="col-md-6 col-lg-4 mb-4" id="cards">
                            <div class="card border-0 shadow rounded h-100">
                                <a href="/blog/{{$post->id}}">
                                    <img src="{{asset('pictures/'.$post->picture)}}" class="card-img-top img-responsive" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="mb-3">
                                        <a href="/blog/{{$post->id}}" class="text-decoration-none text-secondary line-clamp-1">
                                            {{ucfirst($post->title) }}
                                        </a>
                                    </h4>
                                    <p class="text-muted line-clamp-2">{{$post->body}}</p>
                                    <div class="d-flex justify-content-between align-items-center pt-4 pb-2">
                                        <a href="/blog/{{$post->id}}/edit" class="text-decoration-none text-secondary">
                                            <button type="submit" class="btn btn-success btn-witdh">Düzenle</button>
                                        </a>
                                        <form action="{{ route('post.delete',$post->id) }}" method="POST" class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-btn btn-witdh" onclick="Sil(this)">Sil</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>

        const Sil = (el)=>{
            Swal.fire({
                title: 'Silmek istediğidinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sil',
                cancelButtonText: `İptal`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let deleteForm = el.parentElement
                    deleteForm.submit()
                    Swal.fire({
                        icon: 'success',
                        showConfirmButton:false,
                        title:'Post başarıyla silindi.',
                    })
                }
            })
        }

    </script>
@endpush
