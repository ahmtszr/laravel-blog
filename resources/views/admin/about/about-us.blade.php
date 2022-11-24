@extends('layouts.admin-master')

@section('title','About Us')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Hakkımızda</h4>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="w-5">Title</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>

                        <tbody>
                        <tr>
                            <td>{{$about_us->title}}</td>
                            <td>{{$about_us->description}}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.about-us-edit') }}" class="btn btn-success">Düzenle</a>
                            </td>
                        </tr>
                        </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
