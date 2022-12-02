@extends('layouts.admin-master')

@section('title','Blog Dashboard')

@section('content')

    <div class="container-fluid px4">

        <div class="card mt-4">
            <div class="card-header">
                <h4>Kullanıcılar</h4>
            </div>
            <div class="card-body">

                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                        <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->user_name}}</td>
                            <td>
                                <form  class="delete-user" action="{{ route('admin.user.delete',$user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="Sil(this)">Sil</button>
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
                        title:'Kullanıcı başarıyla silindi.',
                    })
                }
            })
        }

    </script>
@endpush
