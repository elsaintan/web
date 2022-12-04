@extends('layouts/app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Permintaan Penarikan Saldo</h1>
    </div>
    <div class="table-responsive col-lg-12">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">No Rekening / No</th>
                    <th scope="col">Tarik Ke</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="table-list">
            </tbody>
        </table>
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

        var lastId = 0;

        // get post data
        database.collection("saldo").where("jenis", "==", "Penarikan").get().then((querySnapshot) => {
            var htmls = [];
            var no = 1;
            querySnapshot.forEach((doc) => {
                if (doc) {
                    htmls.push('<tr>\
                                            <td>' + no++ + '</td>\
                                            <td>' + doc.data().nama + '</td>\
                                            <td>' + doc.data().jumlah + '</td>\
                                            <td>' + doc.data().nomer + '</td>\
                                            <td>' + doc.data().tarikKe + '</td>\
                                            <td>' + doc.data().tanggal + '</td>\
                                            <td>' + doc.data().status +
                        '</td>\
                                            <td><a data-bs-toggle="modal" data-bs-target="#view-modal" class="btn btn-success view-user btn-sm" data-id="' +
                        doc.data().id +
                        '">Selesai</a>\
                                            </tr>');
                }

            });
            $('#table-list').html(htmls);
        });
    </script>
@endsection
