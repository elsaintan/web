@extends('layouts/app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ Auth::user()->name }}</h1>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Konsultasi Online</p>
                    <p></p>
                    <h2 class="card-text">{{ $totalKonsul }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Janji Temu</p>
                    <h2 class="card-text">{{ $totalJanjiTemu }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Pemilik Hewan</p>
                    <h2 class="card-text">{{ $totalOwner }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Dokter Hewan</p>
                    <h2 class="card-text">{{ $totaldrh }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
