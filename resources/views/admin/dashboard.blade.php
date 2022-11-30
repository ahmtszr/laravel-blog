@extends('layouts.admin-master')

@section('title','Blog Dashboard')

@section('content')

    <div class="container-fluid px-4 margin-bottom">
        <h1 class="mt-4">Anasayfa</h1>
        <br>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4" id="cards">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">Postlar</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link text-muted" href="/admin/posts">Post detayları için tıklayın</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4" id="cards">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">Kullanıcılar</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link text-muted" href="/admin/users">Kullanıcı detayları için tıklayın</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4" id="cards">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">Hakkımızda</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link text-muted" href="/admin/about-us">Hakkımızda detayları için tıklayın</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4" id="cards">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">İletişim</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link text-muted" href="/admin/contact">İletişim detayları için tıklayın</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

        </div>

@endsection
