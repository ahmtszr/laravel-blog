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
                                <a href="{!! route('admin.contact.delete',$messages->id) !!}" class="btn btn-danger">Sil</a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>

    </div>

@endsection
