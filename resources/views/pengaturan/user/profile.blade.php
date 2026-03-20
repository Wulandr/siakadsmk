<?php

use Illuminate\Support\Facades\Auth;
?>
{{-- header --}}
@include('layouts.header')
{{-- /header --}}

<body class="ltr main-body app sidebar-mini">
    <!-- Loader -->
    {{-- <div id="global-loader">
        <img src="{{ asset('nowa/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div> --}}
    <!-- /Loader -->
    <div class="page">
        <div>
            @include('layouts/main-header')
            @include('layouts/main-sidebar')
        </div>

        <!-- Page Content  -->
        <div id="content-page" class="main-content app-content">
            <div class="main-container container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <span class="main-content-title mg-b-0 mg-b-lg-1">PROFILE</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <!-- <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);"> </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> </li>
                        </ol> -->
                    </div>
                </div>

                <!-- profil mitra lengkap ? -->
                <?php
                $statuslengkap = "Belum Lengkap";
                if (!empty($lengkapRoleAs)) {
                    $statuslengkap = "Lengkap";
                }
                ?>
                <?php
                // jika dia adalah bukan mitra, melainkan pengelola / unit yg blm di verif
                foreach ($tabelRole as $tb) {
                    if ($tb->name == "Mitra") {
                        $idroleMitra = $tb->id;
                    }
                }
                ?>

                <?php $active1 = ''; ?>
                <?php $active2 = ''; ?>

                @if(Auth::user()->role != $idroleMitra)
                <?php $active1 = 'active'; ?>
                @endif

                @if(Auth::user()->role == $idroleMitra)
                @if(Auth::user()->getroleNames()[0] == "Unverif" && $statuslengkap == "Belum Lengkap")
                <?php $active1 = 'active'; ?>
                <div class="alert alert-danger mg-b-0 alert-dismissible fade show" role="alert">
                    <strong>LENGKAPI PROFIL</strong> AGAR AKUN DIAKTIFKAN
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
                </div><BR />
                @endif
                @if(Auth::user()->getroleNames()[0] == "Unverif" && $statuslengkap == "Lengkap")
                <?php $active1 = 'active'; ?>
                <div class="alert alert-success mg-b-0 alert-dismissible fade show" role="alert">
                    <strong>Akun Akan Segera Diaktifkan</strong>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
                </div><BR />
                @endif
                @endif

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body d-md-flex">
                                <div class="">
                                    <span class="profile-image pos-relative">
                                        @if(!empty(Auth::user()->image))
                                        <img class="br-5" alt="" src="{{asset('imageprofil/'.Auth::user()->image)}}">
                                        @else
                                        <img class="br-5" alt="" src="{{asset('imageprofil/11.png')}}">
                                        @endif
                                        <span class="bg-success text-white wd-1 ht-1 rounded-pill profile-online"></span>
                                    </span>
                                </div>
                                <div class="my-md-auto mt-4 prof-details">
                                    <h4 class="font-weight-semibold ms-md-4 ms-0 mb-1 pb-0">{{Auth::user()->name}}</h4>
                                    <p class="tx-13 text-muted ms-md-4 ms-0 mb-2 pb-2 ">
                                        {{Auth::user()->getroleNames()}}
                                    </p>

                                    <!-- nama mitra  -->
                                    <?php
                                    $namamitra = '-';
                                    foreach ($roleAs as $r) {
                                        if ($r->id_user == Auth()->user()->id) {
                                            $r->id_mitra;
                                            foreach ($mitra as $m) {
                                                if ($m->id == $r->id_mitra) {
                                                    $namamitra = $m->nama_mitra;
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    <!-- <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-phone me-2"></i></span><span class="font-weight-semibold me-2">Mitra:</span><span>{{$namamitra}}</span>
                                    </p> -->
                                    <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-envelope me-2"></i></span><span class="font-weight-semibold me-2">Email:</span><span>{{Auth::user()->email}}</span>
                                    </p>
                                    <div class="col">
                                        @if(Auth::user()->role == $idroleMitra)
                                        <button class="btn btn-primary ml-5">{{$statuslengkap}}</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer py-0">
                                <div class="profile-tab tab-menu-heading border-bottom-0">
                                    <nav class="nav main-nav-line p-0 tabs-menu profile-nav-line border-0 br-5 mb-0	">
                                        <a class="nav-link mb-2 mt-2 {{$active1}}" data-bs-toggle="tab" href="#about">About</a>
                                        <a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#edit">Edit Profile</a>
                                        <a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#editpassword">Edit Password</a>

                                        @if(Auth::user()->getroleNames()[0] == "Unverif" && Auth::user()->role == $idroleMitra && $statuslengkap == "Belum Lengkap")
                                        <a class="nav-link mb-2 mt-2 {{$active2}}" data-bs-toggle="tab" href="#mitra">Add Mitra</a>
                                        @endif

                                        @if((Auth::user()->getroleNames()[0] == "Unverif" || "Mitra" ) && Auth::user()->role == $idroleMitra && $statuslengkap == "Lengkap")
                                        <a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#editmitra">Edit Mitra</a>
                                        @endif


                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="custom-card main-content-body-profile">
                            <div class="tab-content">
                                <div class="main-content-body tab-pane border-top-0 {{$active1}}" id="about">
                                    <div class="card">
                                        <div class="card-body border-0">
                                            @include('pengaturan/user/profile_about')
                                        </div>
                                    </div>
                                </div>
                                <!-- EDIT PASSWROD -->
                                <div class="main-content-body tab-pane border-top-0" id="editpassword">
                                    <div class="card">
                                        <div class="card-body border-0">
                                            <form class="form-horizontal" method="post" action="{{ route('profil.changepassword',['id'=>Auth::user()->id]) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class=" row align-items-center mb-5">
                                                    <div class="form-group col-sm-6">
                                                        <label for="fname" class="form-label">Password:</label>
                                                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                                                    </div>
                                                    <input type="hidden" id="id" value="{{Auth::user()->id}}">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                                    </div>
                                                </div>

                                                <br />
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAMBAH DATA MITRA -->
                                @if(Auth::user()->getroleNames()[0] == "Unverif" && Auth::user()->role == $idroleMitra && $statuslengkap == "Belum Lengkap")
                                <div class="main-content-body tab-pane border-top-0 {{$active2}}" id="mitra">
                                    <div class="card">
                                        <div class="card-body border-0">
                                            @include('pengaturan/user/profile_create_mitra')
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- EDIT  DATA MITRA -->
                                @if((Auth::user()->getroleNames()[0] == "Unverif" || "Mitra" ) && Auth::user()->role == $idroleMitra && $statuslengkap == "Lengkap")
                                <div class="main-content-body tab-pane border-top-0" id="editmitra">
                                    <div class="card">
                                        <div class="card-body border-0">
                                            @include('pengaturan/user/profile_edit_mitra')
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- EDIT PROFIL -->
                                <div class="main-content-body tab-pane border-top-0" id="edit">
                                    <div class="card">
                                        <div class="card-body border-0">
                                            <form class="form-horizontal" method="post" action="{{ route('profil.update',['id'=>Auth::user()->id]) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12 ml-3">
                                                        <div clascs="row mb-4">
                                                            <?php if (!empty(Auth::user()->image) || (Auth::user()->image) != NULL) { ?>
                                                                <!-- <div class="col ml-5">
                                                                    <span class="profile-image pos-relative">
                                                                        <img class="br-5" alt="" src="{{asset('imageprofil/'.Auth::user()->image)}}">
                                                                    </span>
                                                                </div> -->
                                                                <div class="col-sm-12 col-md-4"> <br />
                                                                    <br />
                                                                    <input name="file" id="file" type="file" class="dropify" data-height="200" />
                                                                </div>
                                                            <?php } ?>
                                                            <?php if (empty(Auth::user()->image) || (Auth::user()->image) == NULL) { ?>
                                                                <div class="col-sm-12 col-md-4 ">
                                                                    <input type="file" name="file" id="file" class="dropify" data-height="200" />
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" row align-items-center mb-5">
                                                    @error('file')
                                                    <div class="alert text-white bg-success" role="alert">
                                                        <div class="iq-alert-icon">
                                                            <i class="ri-alert-line"></i>
                                                        </div>
                                                        <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Tolong tambahkan file sebelum submit!
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6 ml-3">
                                                        <label for="fname" class="form-label">Nama:</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name',Auth::user()->name)}}">
                                                    </div>
                                                    <!-- <div class="form-group col-sm-6">
                                                        <label for="fname" class="form-label">Password:</label>
                                                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                                                    </div> -->
                                                    <div class="form-group col-sm-6">
                                                        <label for="cname" class="form-label">Email:</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{old('email',Auth::user()->email)}}">
                                                    </div>
                                                    @if(Auth::user()->getroleNames() == "Mitra")
                                                    <!-- <div class="form-group col-sm-6">
                                                        <label for="cname">Role:</label>
                                                        <div class="SumoSelect" tabindex="0" role="button" aria-expanded="true">
                                                            <select class="SlectBox form-control SumoUnder" name="id_role" tabindex="-1">
                                                                @foreach($tabelRole as $t)
                                                                <option value="{{$t->id}}">{{$t->name}}</option>
                                                                @if($t->name == "Mitra")
                                                                <option value="{{$t->id}}">{{$t->name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="cname">Mitra:</label>
                                                        <div class="SumoSelect" tabindex="0" role="button" aria-expanded="true">
                                                            <select class="SlectBox form-control SumoUnder" name="id_mitra" tabindex="-1">
                                                                <option value="NULL">-</option>
                                                                @foreach($mitra as $m)
                                                                <option value="{{$m->id}}">{{$m->nama_mitra}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> -->
                                                    @endif
                                                    <input type="hidden" id="id" value="{{Auth::user()->id}}">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                                    </div>
                                                    <!-- <button type="reset" class="btn iq-bg-danger">Cancel</button> -->
                                                </div>

                                                <br />
                                            </form>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Footer opened -->
            @include('layouts.footer')
            <!-- Footer closed -->
        </div>
        <!-- Wrapper END -->
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 20000);
        </script>

        @include('layouts.script')
        {{-- /script --}}
</body>

</html>

<!-- Add alert -->
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
<!-- /Alert -->

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple-prov').select2();
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple-kot').select2();
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple-dis').select2();
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple-prov').select2().on('change', function() {
            var id_prov = $(this).val();
            // window.alert(id_prov);
            if (id_prov) {
                $.ajax({
                    url: '/getKabupaten/' + id_prov,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    dataType: "json",
                    success: function(data) {
                        $('select[name="id_kot"]').empty();
                        $('select[name="id_kot"]').append(
                            '<option hidden>Pilih Kota</option>');
                        $.each(data, function(key, datakota) {
                            $('select[name="id_kot"]').append('<option value="' +
                                datakota.id + '">' + datakota.nama +
                                '</option>');
                        });

                    }
                });
            } else {
                $('select[name="id_kot"]').empty();
            }
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-multiple-kot').select2().on('change', function() {
            var id_kot = $(this).val();
            // window.alert(id_kot);
            if (id_kot) {
                $.ajax({
                    url: '/getDistrik/' + id_kot,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    dataType: "json",
                    success: function(data) {
                        $('select[name="id_dis"]').empty();
                        $('select[name="id_dis"]').append(
                            '<option hidden>Pilih Kota</option>');
                        $.each(data, function(key, datadistrik) {
                            $('select[name="id_dis"]').append('<option value="' +
                                datadistrik.id + '">' + datadistrik.nama +
                                '</option>');
                        });

                    }
                });
            } else {
                $('select[name="id_dis"]').empty();
            }
        });
    });
</script>


<script>
    // set lokasi latitude dan longitude, lokasinya kota palembang 
    var mymap = L.map('mapid').setView([-2.9547949, 104.6929233], 5);
    //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token      
    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 20,
            id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'your.mapbox.access.token'
        }).addTo(mymap);

    L.Control.geocoder({
        position: 'topleft'
    }).addTo(mymap);

    // buat variabel berisi fugnsi L.popup 
    var popup = L.popup();

    // buat fungsi popup saat map diklik
    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("koordinatnya adalah " + e.latlng
                .toString()
            ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
            .openOn(mymap);

        document.getElementById('longitude').value = e.latlng
            .lng //value pada form latitde, longitude akan berganti secara otomatis
        document.getElementById('latitude').value = e.latlng
            .lat //value pada form latitde, longitude akan berganti secara otomatis
    }
    mymap.on('click', onMapClick); //jalankan fungsi
</script>

<script>
    $(document).ready(function() {
        $('#deskripsi').summernote();
    });
</script>