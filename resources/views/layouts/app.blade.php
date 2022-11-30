<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/style.css')}}>

</head>

<body>
@include('layouts.partials.navbar')

@yield('content')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
@stack('script')
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
        icon: 'danger',
        title:`{{ Session::get('error') }}`,
        showConfirmButton: false,
        timer: 1500
    })
    @endif
</script>

</body>
</html>
