@extends('layouts.admin-master')

@section('title','Blog Dashboard')

@section('content')

<div class="container-fluid px4">

    <div class="card mt-4">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Postlar</h4>
            <a href="{!! route('admin.add.post') !!} " class="btn btn-dark">Ekle</a>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="w-5">Id</th>
                        <th class="w-5">UserId</th>
                        <th scope="col">Başlık</th>
                        <th class="w-10"></th>
                        <th class="w-10"></th>
                    </tr>
                </thead>

                @foreach($posts as $post)
                <tbody>
                    <tr>
                        <td class="text-center">{{$post->id}}</td>
                        <td class="text-center">{{$post->user_id}}</td>
                        <td>{{$post->title}}</td>
                        <td class="text-center">
                            <a href="{!! url('admin/posts/'.$post->id) !!}" class="btn btn-success">Düzenle</a>
                        </td>
                        <td class="text-center">
                            <form class="form-delete" action="{{ route('admin.post.delete',$post->id) }}">
                                @csrf
                                <button type="button" onclick="Sil(this)" class="btn btn-danger">Sil</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>
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



