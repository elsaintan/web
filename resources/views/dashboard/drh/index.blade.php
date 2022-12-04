@extends('layouts/app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dokter Hewan</h1>
    </div>
    <div class="table-responsive col-lg-12">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="float-end">
            <a href="/dashboard/dokter-hewan/create" class="btn btn-primary mb-3 btn-sm">Create New Account For
                Vet</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tempat Praktik</th>
                    <th scope="col">SIP</th>
                    <th scope="col">STR</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="table-list">
                <tr>
                    @php $no = 1; @endphp
                    @foreach ($drh as $value)
                        <td> {{ $no++ }} </td>
                        <td>{{ $value['Name'] }}</td>
                        <td>{{ $value['email'] }}</td>
                        <td>{{ $value['alamat'] }}</td>
                        <td>{{ $value['tempat'] }}</td>
                        <td>{{ $value['SIP'] }}</td>
                        <td>{{ $value['STR'] }}</td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#add-modal" class="btn btn-info view-user btn-sm"
                                data-id={{ $value['id'] }}>View</a>
                            <a class="btn btn-success update-user btn-sm"
                                href="/dashboard/dokter-hewan/{{ $value['id'] }}/edit">Update</a>
                            <a data-bs-toggle="modal" data-bs-target="#disable-modal"
                                class="btn btn-danger disable-user btn-sm" data-id={{ $value['id'] }}>Disable</a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" id="add-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dokter Hewan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <img src="" class="img-fluid image" id="image">
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" disabled>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="form-label">Kontak Lainnya</label>
                                <input type="text" class="form-control" name="kontak" id="kontak" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2" class="form-label">Tempat Praktik</label>
                            <input type="text" class="form-control" name="tempat_praktik" id="tempat-praktik" disabled>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="form-label">SIP</label>
                                <input type="email" class="form-control" name="sip" id="SIP" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="form-label">STR</label>
                                <input type="text" class="form-control" name="str" id="STR" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="inputState" class="form-label">Pengalaman Kerja</label>
                                <input type="text" class="form-control" name="pengalaman" id="pengalaman" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip" class="form-label">Harga Konsultasi</label>
                                <input type="text" class="form-control" name="harga" id="harga" disabled>
                            </div>
                        </div>
                        <br>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-analytics.js"></script>


    <script type="text/javascript">
        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "{{ config('services.firebase.api_key') }}",
            authDomain: "{{ config('services.firebase.auth_domain') }}",
            databaseURL: "{{ config('services.firebase.database_url') }}",
            projectId: "{{ config('services.firebase.project_id') }}",
            storageBucket: "{{ config('services.firebase.storage_bucket') }}",
            messagingSenderId: "{{ config('services.firebase.messaging_sender_id') }}",
            appId: "{{ config('services.firebase.app_id') }}",
            measurementId: "{{ config('services.firebase.measurement_id') }}"
        };

        // Initialize Firebase
        const app = firebase.initializeApp(firebaseConfig);

        var database = firebase.database().ref();

        var lastId = 0;

        //edit modal
        $('body').on('click', '.view-user', function() {
            updateID = $(this).attr('data-id');
            var modal = document.getElementById("add-modal");
            database.child('drh').child(updateID).get().then(function(snapshot) {
                if (snapshot.exists) {
                    //swal("YA");
                    
                    $('#nama').val(snapshot.val().Name);
                    $('#email').val(snapshot.val().email);
                    $('#alamat').val(snapshot.val().alamat);
                    $('#pengalaman').val(snapshot.val().WorkExp);
                    $('#tempat-praktik').val(snapshot.val().tempat);
                    $('#harga').val(snapshot.val().harga);
                    $('#kontak').val(snapshot.val().Contact);
                    $('#SIP').val(snapshot.val().SIP);
                    $('#STR').val(snapshot.val().STR);
                    //$('#nama').val(thisDoc.data().name);
                } else {
                    swal("Data Not Found!");
                }
            });
        });

        //update modal

        //view modal


        //disable account
        $('body').on('click', '.disable-user', function() {
            userID = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, disable it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire(
                        'Disabled!',
                        'Account has been disabled.',
                        'success'
                    )
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Your data is safe!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        });
    </script>
@endsection
