@extends('layouts/app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Data Dokter Hewan</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/dokter-hewan" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="inputAddress">Nama</label>
                <input type="text" class="form-control" id="inputAddress" name="nama" id="nama">
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
                    <input type="email" class="form-control" id="inputEmail4" name="email" id="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputContact4">Kontak Lainnya</label>
                    <input type="text" class="form-control" id="inputPassword4" name="kontak" id="kontak">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Alamat</label>
                <input type="text" class="form-control" id="inputAddress" name="alamat" id="alamat">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Tempat Praktik</label>
                <input type="text" class="form-control" id="inputAddress2" name="tempat_praktik" id="tempat-praktik">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">SIP</label>
                    <input type="text" class="form-control" id="inputEmail4" name="sip" id="SIP">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputSTR4">STR</label>
                    <input type="text" class="form-control" id="inputPassword4" name="str" id="STR">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="inputState">Pengalaman Kerja</label>
                    <input type="text" class="form-control" id="inputWork" name="pengalaman" id="pengalaman">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Harga Konsultasi</label>
                    <input type="text" class="form-control" id="inputZip" name="harga" id="harga">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>
    </div>


    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-analytics.js"></script>

    <script type="text/javascript">
        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyAP6h7bTTYDu53ZbFL26oy6amweLRkVta4",
            authDomain: "seaid-hivet.firebaseapp.com",
            databaseURL: "https://seaid-hivet-default-rtdb.firebaseio.com",
            projectId: "seaid-hivet",
            storageBucket: "seaid-hivet.appspot.com",
            messagingSenderId: "247912380501",
            appId: "1:247912380501:web:589ba84ff72fd129a03cdc",
            measurementId: "G-GMJB8YW3QY"
        };

        // Initialize Firebase
        const app = firebase.initializeApp(firebaseConfig);

        var database = firebase.firestore();
        var auth = firebase.auth();
        var admin = require("firebase-admin");



        var lastId = 0;

        // update modal
        var updateID = 0;
        $('body').on('click', '.update-post', function() {

            admin.auth().createUser('elsamaeryan27@gmail.com', 'Elsa').then((user) => {
                    console.log('User signed in via email:', user);
                })
                .catch((error) => {
                    console.log('error signing in with email:', error);
                });
        });
    </script>
@endsection
