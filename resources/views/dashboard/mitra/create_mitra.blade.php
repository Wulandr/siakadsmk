{{-- header --}}
@include('layouts.header')
{{-- /header --}}

<body class="ltr main-body app sidebar-mini">

    <!-- Loader -->
    {{-- <div id="global-loader">
        <img src="{{ asset('nowa/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div> --}}
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div>
            <!-- main-header -->
            @include('layouts.main-header')
            <!-- /main-header -->

            <!-- main-sidebar -->
            @include('layouts.main-sidebar')
            <!-- main-sidebar -->
        </div>

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- container -->
            <div class="main-container container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <span class="main-content-title mg-b-0 mg-b-lg-1">Add New Page</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">MITRA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">mitra</li>
                            <li class="breadcrumb-item active" aria-current="page">Add New</li>
                        </ol>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    <h5 class="card-title mg-b-20">Create Mitra</h5>
                                </div>
                                <form action="{{ url('/mitra/addNew/create') }}" id="formData" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Jenis
                                            mitra</label>
                                        <select id="id_jenis_mitra" class="js-example-basic-multiple" name="id_jenis_mitra" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                                            @foreach ($jenismitra as $jm)
                                            <option value="{{ $jm->id }}">{{ $jm->jenis }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Unit</label>
                                        <select id="id_unit" class="js-example-basic-multiple" name="id_unit" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                                            @foreach ($unit as $uni)
                                            <option value="{{ $uni->id }}">{{ $uni->nama_unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Nama mitra</label>
                                        <input class="form-control" type="text" name="nama_mitra" id="nama_mitra" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the name of mitra.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Telepon</label>
                                        <input class="form-control" type="text" name="telepon" id="telepon" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the number telephone.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Whatsapp</label>
                                        <input class="form-control" type="text" name="whatsapp" id="whatsapp" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the number telephone.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Email</label>
                                        <input class="form-control" type="email" name="email" id="email" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the email address.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">
                                            About the Mitra</label>
                                        <textarea class="summernote form-control" type="text" name="deskripsi" id="deskripsi" required>
                                        </textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please write the content.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Provinsi</label>
                                        <select class="js-example-basic-multiple-prov" name="id_prov" id="id_prov" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                                            @foreach ($provinsi as $prov)
                                            <option value="{{ $prov->id }}">{{ $prov->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Kota</label>
                                        <select id="id_kot" class="js-example-basic-multiple-kot" name="id_kot" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                                            @foreach ($kota as $kot)
                                            <option value="{{ $kot->id }}">{{ $kot->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Kota</label>
                                        <select id="id_dis" class="js-example-basic-multiple-dis" name="id_dis" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                                            @foreach ($distrik as $dis)
                                            <option value="{{ $dis->id }}">{{ $dis->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Alamat</label>
                                        <input class="form-control" type="text" name="alamat" id="alamat" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the Date.
                                        </div>
                                    </div>
                                    <!-- SINGLE IMAGE / LOGO MITRA -->
                                    <div class="input-group control-group increment">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">Tambahkan
                                                        Logo Mitra</label>
                                                    <input type="file" class="form-control" name="file" accept="image/jpeg, image/png" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Facebook</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">https://</span>
                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="facebook" placeholder="Facebook" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Instagram</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">https://</span>
                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="instagram" placeholder="Instagram" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Shop</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">https://</span>
                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="shop" placeholder="Shop" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Latitude</label>
                                        <input type="text" class="form-control" id="latitude" name="latitude">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Longitude</label>
                                        <input type="text" class="form-control" id="longitude" name="longitude">
                                    </div>

                                    <div id="mapid"></div>

                                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">

                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->

            </div>
            <!-- /Container -->
        </div>
        <!-- /main-content -->

        <!-- Footer opened -->
        @include('layouts.footer')
        <!-- Footer closed -->
    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>

    {{-- script --}}
    @include('layouts.script')
    {{-- /script --}}

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


        // buat variabel berisi fugnsi L.popup 
        var popup = L.popup();

        L.Control.geocoder({
            position: 'topleft'
        }).addTo(mymap);

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

</body>

</html>