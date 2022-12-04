@extends('layouts/app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pemilik Hewan</h1>
    </div>
    <div class="table-responsive col-lg-8">
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
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="table-list">
                @php $no = 1; @endphp
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#update-modal" class="btn btn-info update-post btn-sm"
                                data-id={{ $user['uid'] }}>View</a>
                            <a data-bs-toggle="modal" data-bs-target="#disable-modal"
                                class="btn btn-danger disable-user btn-sm" data-id={{ $user['uid'] }}>Disable</a>
                        </td>
                    </tr>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- view modal --}}
    <div class="modal fade" id="update-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profile User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="update-title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="update-title" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="update-content" class="form-label">Content</label>
                        <input type="text" class="form-control" name="content" id="update-content" disabled>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Hewan Peliharaan</th>
                                <th scope="col">Jenis</th>
                            </tr>
                        </thead>
                        <tbody id="list-pet">
                        </tbody>
                    </table>
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

        var database = firebase.database().ref();

        var lastId = 0;

        // update modal
        var updateID = 0;
        $('body').on('click', '.update-post', function() {
            updateID = $(this).attr('data-id');
            database.child('users').child(updateID).get().then(function(snapshot) {
                if (snapshot.exists) {
                    $('#update-title').val(snapshot.val().name);
                    $('#update-content').val(snapshot.val().email);
                } else {
                    $('#update-title').val("YA");
                }
            });

            database.collection("peliharaan").get().then((querySnapshot) => {
                var htmls = [];
                var no = 1;
                querySnapshot.forEach((doc) => {
                    if (doc.data().pemilik == updateID) {
                        htmls.push('<tr>\
                                            <td>' + no++ + '</td>\
                                            <td>' + doc.data().nama + '</td>\
                                            <td>' + doc.data().jenis + '</td>\
                                        </tr>');
                    }
                });
                $('#list-pet').html(htmls);
            });
        });

        //disable user account
        $('body').on('click', '.disable-user', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //window.location = "/harga-komoditas/" + daerah_id + "/delete"
                    Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
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
