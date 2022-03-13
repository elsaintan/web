@extends('layouts.master')
@section('content')
    <!--================================
                                                                    =            Page Title            =
                                                                =================================-->

    <section class="section page-title">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <!-- Page Title -->
                    <h1>Frequently Asked Questions</h1>
                    <!-- Page Description -->

                </div>
            </div>
        </div>
    </section>

    <!--====  End of Page Title  ====-->


    <!--=================================
                                                                        =            FAQ Section            =
                                                                ==================================-->
    <section class="faq section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="block shadow">
                        <!-- Getting Started -->
                        <div class="faq-item">
                            <!-- Title -->
                            <div class="faq-item-title">
                                <h2>
                                    Daftar Pertanyaan
                                </h2>
                            </div>
                            <!-- Get Started Accordion -->
                            <div id="gstAccordion" data-children=".item">
                                <!-- Accordion Item 01 -->
                                <div class="item">
                                    <div class="item-link">
                                        <a data-toggle="collapse" data-parent="#gstAccordion" href="#gstAccordion1">
                                            Bagaimana cara membuat akun pada aplikasi HiVet!
                                        </a>
                                    </div>
                                    <div id="gstAccordion1" class="collapse show accordion-block">
                                        <p>
                                            1. Klik tulisan “Belum memiliki akun? Daftar Sekarang” pada halaman login
                                            aplikasi
                                            <br>
                                            2. Masukkan nama kamu yang akan tertera pada akun HiVet!
                                            <br>
                                            3. Masukkan email kamu yang aktif dan valid
                                            <br>
                                            4. Masukkan kata sandi untuk akun HiVet! anda
                                            <br>
                                            5. Klik tombol daftar
                                            <br>
                                            6. Selamat, akun kamu telah terdaftar pada HiVet!
                                        </p>
                                    </div>
                                </div>
                                <!-- Accordion Item 02 -->
                                <div class="item">
                                    <div class="item-link">
                                        <a data-toggle="collapse" data-parent="#gstAccordion" href="#gstAccordion2">
                                            Metode pembayaran apa saja yang dapat dipilih pada aplikasi HiVet!
                                        </a>
                                    </div>
                                    <div id="gstAccordion2" class="collapse accordion-block">
                                        <p>
                                            Kamu dapat melakukan pembayaran dengan menggunakan metode pembayaran yang
                                            tersedia pada aplikasi HiVet! :
                                            <b> Gopay </b>
                                            <b> ShopeePay </b>
                                        </p>
                                    </div>
                                </div>
                                <!-- Accordion Item 03 -->
                                <div class="item">
                                    <div class="item-link">
                                        <a data-toggle="collapse" data-parent="#gstAccordion" href="#gstAccordion3">
                                            Berapa Biaya Konsultasi Online dan Janji temu HiVet!
                                        </a>
                                    </div>
                                    <div id="gstAccordion3" class="collapse accordion-block">
                                        <p>Tarif yang dibebankan untuk Konsultasi Online sebesar Rp 30.000
                                            <br>Sedangkan untuk biaya layanan Janji temu sebesar Rp 5.000.
                                        </p>
                                    </div>
                                </div>
                                <!-- Accordion Item 04 -->
                                <div class="item">
                                    <div class="item-link">
                                        <a data-toggle="collapse" data-parent="#gstAccordion" href="#gstAccordion4">
                                            Apa yang dimaksud dengan Konsultasi Online dan Janji Temu pada aplikasi HiVet!
                                        </a>
                                    </div>
                                    <div id="gstAccordion4" class="collapse accordion-block">
                                        <p align="justify">
                                            Konsultasi Online merupakan layanan yang ditawarkan pada aplikasi HiVet! di mana
                                            kamu dapat berkonsultasi dengan dokter hewan mengenai kesehatan hewan
                                            peliharaanmu secara online pada aplikasi HiVet.
                                            <br>
                                            Janji temu merupakan salah satu layanan yang ada pada aplikasi HiVet! yang
                                            menawarkan kemudahan membuat janji temu dengan dokter hewan secara langsung.
                                        </p>

                                    </div>
                                </div>
                                <!-- Accordion Item 05 -->
                                <div class="item">
                                    <div class="item-link">
                                        <a data-toggle="collapse" data-parent="#gstAccordion" href="#gstAccordion5">
                                            Bagaimana cara membuat Janji Temu dengan dokter hewan secara Online?
                                        </a>
                                    </div>
                                    <div id="gstAccordion5" class="collapse accordion-block">
                                        <p>
                                            1. Buka aplikasi HiVet!
                                            <br>
                                            2. Pilih menu “Janji Temu”
                                            <br>
                                            3. Masukkan provinsi tempat tinggal dan tanggal janji temu yang dikehendaki.
                                            <br>
                                            4. Pilih dokter yang tersedia
                                            <br>
                                            5. Lakukan pembayaran biaya layanan aplikasi untuk Janji Temu
                                            <br>
                                            6. Janji temu kamu sudah berhasil, jangan lupa catat nomor bookingnya.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====  End of FAQ Section  ====-->
@endsection
