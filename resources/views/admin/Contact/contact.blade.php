@extends('layouts.admin-master')

@section('title','Blog Dashboard')

@section('content')

    <div class="container-fluid px4">

        <div class="card mt-4">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Messages</h4>
            </div>

            <div class="card-body">

                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="w-5">Id</th>
                        <th class="w-5">Name</th>
                        <th class="w-5">Email</th>
                        <th scope="col">Message</th>
                    </tr>
                    </thead>

                    @foreach($message as $messages)
                        <tbody>
                        <tr>
                            <td class="text-center">{{$messages->id}}</td>
                            <td class="text-center">{{$messages->name}}</td>
                            <td class="text-center">{{$messages->email}}</td>
                            <td>{{$messages->message}}</td>
                        </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>

    </div>

@endsection
