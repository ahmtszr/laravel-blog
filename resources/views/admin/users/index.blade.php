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
                                <a href="{{url('admin/delete-users/'.$user->id)}}" class="btn btn-danger">Sil</a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>

    </div>


@endsection
