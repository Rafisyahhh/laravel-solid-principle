@extends('layouts.app')
@section('judul','Dashboard | Dukdes')
@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h2 class="text-center fw-bold">Selamat Datang di Website</h2>
            <h1 class="text-primary fw-bold text-center">"DUKDES"</h1>
            <p class="text-center fw-bold mb-4 fs-5">DUKDES adalah website yang menyediakan informasi tentang penduduk desa</p>
                <img src="{{ asset('image/villagers.jpg') }}" alt="" width="700px" class="rounded mx-auto d-block">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-start ">
                        <div class="stats-icon blue mb-2">
                            <i class="bi bi-houses-fill d-flex justify-content-center mb-2"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h6 class="text-muted font-bold fs-5">Jumlah RT</h6>
                        <h6 class="font-extrabold mb-0 fs-4">
                            {{ $address }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-start ">
                        <div class="stats-icon green mb-2">
                            <i class="bi bi-people-fill d-flex justify-content-center mb-2"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h6 class="text-muted font-bold fs-5">Jumlah Penduduk</h6>
                        <h6 class="font-extrabold mb-0 fs-4 ">
                            {{ $resident }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
