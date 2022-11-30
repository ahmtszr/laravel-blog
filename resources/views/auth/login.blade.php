@extends('layouts.auth-master')

@section('content')
    <head>
        <title>Giriş</title>

        <!-- Latest compiled and minified CSS -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <html class="container p-3">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <form method="post" action="{{ route('login.perform') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class="text-center">
                        <img class="mb-4" src="{!! url('https://cdn-icons-png.flaticon.com/512/5087/5087579.png') !!}" alt="" width="250" height="250">
                    </div>
                    <h1 class="h3 mb-3 text-center fw-normal">Giriş</h1>

                    <div class="d-flex flex-column justify-content-center align-items-center">
                    @include('layouts.partials.messages')

                    <div class="mb-3">
                        <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}"
                               placeholder="Kullanıcı Adı" required="required" autofocus style="width: 300px">
                        @if ($errors->has('user_name'))
                            <span class="text-danger text-left">{{ $errors->first('user_name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                               placeholder="Şifre" required="required" style="width: 300px">
                        @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                        <a href="{{ route('register.perform') }}">Bir hesabın yok mu? Kayıt Ol</a>
                    <button class="w-300px btn btn-lg btn-primary" type="submit">Giriş</button>

                    @include('auth.partials.copy')
                    </div>
                </form>
            </div>
        </div>
@endsection

