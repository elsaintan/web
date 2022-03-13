@extends('layouts.master')
@section('content')
    <section class="section page-title">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <!-- Page Title -->
                    <h1>Kontak</h1>
                    <!-- Page Description -->
                </div>
            </div>
        </div>
    </section>

    <!--====  End of Page Title  ====-->


    <!--=====================================
                                                                                            =            Address and Map            =
                                                                                            ======================================-->
    <section class="address">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="block">
                        <div class="address-block text-center mb-5">
                            <div class="icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="details">
                                <h3>sea.hivet@gmail.com</h3>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="block">
                        <div class="address-block text-center mb-5">
                            <div class="address-block text-center">
                                <div class="icon">
                                    <a href="https://twitter.com/HiVet_id"><i class="ti-twitter-alt"></i></a>
                                </div>
                                <div class="details">
                                    <h3>HiVet!</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====  End of Address and Map  ====-->
    <section class="contact-form section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-5 text-center">Hubungi Kami</h2>
                </div>
                <div class="col-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="/contact/send" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6 mb-2">
                                <input class="form-control main" type="text" placeholder="Name" name="name" required>
                            </div>
                            <!-- Email -->
                            <div class="col-md-6 mb-2">
                                <input class="form-control main" type="email" placeholder="Your Email Address" name="email"
                                    required>
                            </div>
                            <!-- subject -->
                            <div class="col-md-12 mb-2">
                                <input class="form-control main" type="text" placeholder="Subject" name="subject" required>
                            </div>
                            <!-- Message -->
                            <div class="col-md-12 mb-2">
                                <textarea class="form-control main" name="message" rows="10"
                                    placeholder="Your Message"></textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-12 text-right">
                                <button class="btn btn-main-md">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
