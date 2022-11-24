@extends('layouts.app')
@section('content')


<div class="bg-light">
    <div class="container py-5">
        <div class="row h-100 align-items-center py-5">
            <div class="col-lg-6">
                <h1 class="display-4">{!! $about_us->title !!}</h1>
                <p class="lead text-muted mb-0">{!! $about_us->description !!}</p>
            </div>
            <div class="col-lg-6 d-none d-lg-block"><img src="https://bootstrapious.com/i/snippets/sn-about/illus.png" alt="" class="img-fluid"></div>
        </div>
    </div>
</div>


<footer class="bg-light pb-5">
    <div class="container text-center">
        <p class="font-italic text-muted mb-0">&copy; Copyrights Company.com All rights reserved.</p>
    </div>
</footer>
@endsection
