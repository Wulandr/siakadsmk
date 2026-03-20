@include('landing.layouts.header')

@foreach ($beranda as $isi)
    <!-- ***** Wellcome Area Start ***** -->
    <section class="welcome-area">
        <!-- ***** Wellcome Area Background Start ***** -->
        <div class="welcome-bg" data-bg="{{ asset('nowa/assets/img/backgroundlanding.png') }}">
            <img src="{{ asset('landing/assets/images/backgroundlanding.png') }}" alt="">

            <img src="{{ asset('landing/assets/images/bg-bottom.svg') }}" alt="">
        </div>
        <!-- ***** Wellcome Area Background End ***** -->

        <!-- ***** Wellcome Area Content Start ***** -->
        <div class="welcome-content mt-5 pt-5">
            <div class="container mt-5 pt-5">
                <div class="row mt-3 pt-3">
                    <div class="">
                        <h1 style="font-size:60px"><b>Sistem Informasi Akademik</b></h1>
                        <h1>SMK Penerbangan</h1>
                    </div>
                    <div class="offset-lg-1 col-lg-5 col-md-12 align-self-center">
                        <div class="apps">
                            <div class="container-fluid">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Wellcome Area Content End ***** -->
    </section>
    <!-- ***** Wellcome Area End ***** -->

    <!-- ***** Home About - Services Start ***** -->
    <section class="section services-section pbottom-70">
        <div class="container">
            <div class="row">
                <!-- ***** Home About Start ***** -->
                <div class="col-lg-4 col-md-12 col-sm-12 align-self-center">
                    <div class="left-heading">
                        <h2 class="section-title">{{ strip_tags($isi->judul_kegiatan) }}</h2>
                    </div>
                    <div class="left-text">
                        <p class="dark">{{ strip_tags($isi->about_kegiatan) }}</p>
                    </div>
                </div>
                <!-- ***** Home About End ***** -->

                <!-- ***** Home Services Start ***** -->
                <div class="offset-lg-1 col-lg-7 col-md-12 col-sm-12 align-self-bottom">
                    <div class="row text-center">
                        <div class="col-lg-6 col-md-6 col-12">
                            <a href="https://lppm.uns.ac.id/penelitian/" class="home-services-item mtop-70 "
                                data-scroll-reveal="enter bottom move 30px over 0.6s after 0.2s">
                                <i class="fa fa-clone"></i>
                                <h5 class="services-title">Lorem Ipsum</h5>
                                <p> Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                                    Lorem ipsum Lorem ipsum Lorem ipsum</p>
                            </a>
                            <a href="https://lppm.uns.ac.id/pengabdian/" class="home-services-item"
                                data-scroll-reveal="enter bottom move 30px over 0.6s after 0.2s">
                                <i class="fa fa-connectdevelop"></i>
                                <h5 class="services-title">Lorem Ipsum</h5>
                                <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                                    Lorem ipsum</p>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <a href="https://lppm.uns.ac.id/kerjasama-lppm-uns/" class="home-services-item active"
                                data-scroll-reveal="enter bottom move 30px over 0.6s after 0.3s">
                                <i class="fa fa-object-ungroup"></i>
                                <h5 class="services-title">Lorem Ipsum</h5>
                                <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                                    Lorem ipsum</p>
                            </a>
                            <a href="https://lppm.uns.ac.id/" class="home-services-item"
                                data-scroll-reveal="enter bottom move 30px over 0.6s after 0.3s">
                                <i class="fa fa-line-chart"></i>
                                <h5 class="services-title">Lorem Ipsum</h5>
                                <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                                    Lorem ipsum</p>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ***** Home Services End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Home About - Services Start ***** -->
@endforeach

@include('landing.layouts.footer')
