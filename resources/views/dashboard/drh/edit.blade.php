@extends('layouts/app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Dokter Hewan</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/dokter-hewan/{{ $value['id'] }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="inputAddress">Nama</label>
                <input type="text" class="form-control" id="inputAddress" name="nama" id="nama"
                    value="{{ $value['Name'] }}">
                <input type="hidden" name="id" value="{{ $value['id'] }}">
            </div>
            <div class="form-group">
                <label for="inputAddress">Foto</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" id="email"
                        value="{{ $value['email'] }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputContact4">Kontak Lainnya</label>
                    <input type="text" class="form-control" id="inputPassword4" name="kontak" id="kontak"
                        value="{{ $value['Contact'] }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Alamat</label>
                <input type="text" class="form-control" id="inputAddress" name="alamat" id="alamat"
                    value="{{ $value['alamat'] }}">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Tempat Praktik</label>
                <input type="text" class="form-control" id="inputAddress2" name="tempat_praktik" id="tempat-praktik"
                    value="{{ $value['tempat'] }}">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">SIP</label>
                    <input type="text" class="form-control" id="inputEmail4" name="sip" id="SIP"
                        value="{{ $value['SIP'] }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputSTR4">STR</label>
                    <input type="text" class="form-control" id="inputPassword4" name="str" id="STR"
                        value="{{ $value['STR'] }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="inputState">Pengalaman Kerja</label>
                    <input type="text" class="form-control" id="inputWork" name="pengalaman" id="pengalaman"
                        value="{{ $value['WorkExp'] }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Harga Konsultasi (Rp)</label>
                    <input type="text" class="form-control" id="inputZip" name="harga" id="harga"
                        value="{{ $value['harga'] }}">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
