@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <h1 class="text-center py-4">Bloglarım</h1>

                    <a href="/my-blog/create/post" class="text-decoration-none text-secondary">
                        <button type="submit" class="btn btn-success">Post Ekle</button>
                    </a>
                <br>
                <br>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-6 col-lg-4 mb-4" id="cards">
                            <div class="card border-0 shadow rounded">
                                <a href="./my-blog/{{$post->id}}">
                                    <img src={{asset('pictures/'.$post->picture)}} class="card-img-top" alt="">
                                </a>
                                <div class="card-body">
                                    <a href="./my-blog/{{$post->id}}" class="text-decoration-none text-secondary">
                                        {{ucfirst($post->title) }}
                                    </a>
                                    <a href="/my-blog/{{$post->id}}/edit" class="text-decoration-none text-secondary">
                                        <button type="submit" class="btn btn-success">Düzenle</button>
                                    </a>
                                    <form action="{{ url('delete/my-blog/'.$post->id) }}" method="POST" class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger delete-btn">Sil</button>
                                    </form>
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
        const delBtns=document.querySelectorAll('.delete-btn')
        delBtns.forEach(item => {
            item.addEventListener('click', () => {
                Swal.fire({
                    title: 'Silmek istediğidinize emin misiniz?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sil',
                    cancelButtonText: `İptal`,
                }).then((result) => {

                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        let deleteForm = document.querySelectorAll('.form-delete')
                        deleteForm.forEach((item)=>item.submit())
                    }
                })
            })
        })
    </script>
@endpush
