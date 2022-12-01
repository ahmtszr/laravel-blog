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
                                <form action="{!! route('admin.user.delete',$user->id) !!}" method="POST" class="form-horizontal delete-user" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" id="delete" class="btn btn-danger" onclick="DeleteUser()">Sil</button>
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
        function DeleteUser() {
            Swal.fire({
                title: "Silmek istediğinize emin misiniz",
                content: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                cancelButtonText:'Hayır',
                icon: "warning",
                buttons: {
                    cancel: "Hayır",
                    confirm: "Evet",
                },
                inputPlaceholder: "Write something"
            }).then((result) => {
                if (result.isConfirmed) {
                    const deleteForm2=document.querySelector('.delete-user')
                    Swal.fire(
                        'Silindi!',
                        'Başarıyla silindi.',
                    )
                    deleteForm2.submit()
                }});
        }
    </script>
@endpush
