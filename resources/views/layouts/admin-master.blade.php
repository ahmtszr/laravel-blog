<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

</head>
<body>

@include('layouts.inc.admin-navbar')


    @include('layouts.inc.admin-sidebar')

    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        @include('layouts.inc.admin-footer')

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/scripts.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('js')
<script>
    @if(Session::has('message'))
    Swal.fire({
        position: 'center',
        icon: 'success',
        title:`{{ Session::get('message') }}`,
        showConfirmButton: false,
        timer: 1500
    })
    @elseif(Session::has('error'))
    Swal.fire({
        position: 'center',
        icon: 'error',
        title:`{{ Session::get('error') }}`,
        showConfirmButton: false,
        timer: 1500
    })
    @elseif(Session::has('warning'))
        Swal.fire({
        title:'Silmek istediğinize emin misiniz?',
        position:'center',
        icon:'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Evet'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
              icon:'success',
                    title:'Başarıyla silindi!',
            })
        }
    })
    @endif
</script>

</body>
</html>
