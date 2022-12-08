@extends('layouts.admin-master')

@section('title','Blog Dashboard')

@section('content')

    <div class="container-fluid px4">

        <div class="card mt-4">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Mesajlar</h4>
            </div>

            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="w-5">Id</th>
                        <th class="w-5">Ad</th>
                        <th class="w-5">Email</th>
                        <th scope="col">Mesaj</th>
                        <th class="w-10"></th>
                    </tr>
                    </thead>

                    @foreach($message as $messages)
                        <tbody>
                        <tr>
                            <td class="text-center">{{$messages->id}}</td>
                            <td class="text-center">{{$messages->name}}</td>
                            <td class="text-center">{{$messages->email}}</td>
                            <td>{{$messages->message}}</td>
                            <td class="text-center">
                                <form action="{!! route('admin.contact.delete',$messages->id) !!}" method="POST" class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn btn-width" onclick="Sil(this)">Sil</button>
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
                        title:'Mesaj başarıyla silindi.',
                    })
                }
            })
        }

    </script>
@endpush
