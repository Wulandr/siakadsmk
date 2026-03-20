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
                        <span class="main-content-title mg-b-0 mg-b-lg-1">Edit Page</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">MITRA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">mitra</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                    <h5 class="card-title mg-b-20">Edit Mitra</h5>
                                </div>
                                <form action="{{ url('/mitra/edit/process/' . base64_encode($id)) }}" id="formData" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <?php
                                    $no = 1;
                                    for ($a = 0; $a < count($mitra); $a++) {
                                        if ($mitra[$a]->id == $id) {
                                    ?>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Nama Mitra</label>
                                                <input class="form-control" type="text" name="nama_mitra" id="nama_mitra" value="{{ $mitra[$a]->nama_mitra }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Telepon</label>
                                                <input class="form-control" type="text" name="telepon" id="telepon" value="{{ $mitra[$a]->telepon }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Whatsapp</label>
                                                <input class="form-control" type="text" name="whatsapp" id="whatsapp" value="{{ $mitra[$a]->whatsapp }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Email</label>
                                                <input class="form-control" type="text" name="email" id="email" value="{{ $mitra[$a]->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">
                                                    About the Mitra</label>
                                                <textarea class="summernote form-control" type="text" name="deskripsi" id="deskripsi" required>
                                                {{ strip_tags($mitra[$a]->deskripsi) }}</textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please write the content.
                                                </div>
                                            </div>
                                            <br />
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Provinsi</label>
                                                <select name="id_prov" id="id_prov" class="js-example-basic-multiple-prov" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                                                    <?php
                                                    foreach ($provinsi as $prov) {
                                                    ?>
                                                        <option value="{{ $prov->id }}" {{ $prov->id == $mitra[$a]->get_dis->get_kota->id_provinsi ? 'selected' : '' }}>
                                                            {{ $prov->nama }}
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Kota</label>
                                                <select name="id_kot" id="id_kot" class="js-example-basic-multiple-kot" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                                                    <?php
                                                    foreach ($kota as $kot) {
                                                    ?>
                                                        <option value="{{ $kot->id }}" {{ $kot->id == $mitra[$a]->get_dis->id_kota ? 'selected' : '' }}>
                                                            {{ $kot->nama }}
                                                        </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Distrik</label>
                                                <select id="id_distrik" class="js-example-basic-multiple-dis" name="id_distrik" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                                                    @foreach ($distrik as $dis)
                                                    <option value="{{ $dis->id }}" {{ $dis->id == $mitra[$a]->id_distrik ? 'selected' : '' }}>
                                                        {{ $dis->nama }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Alamat</label>
                                                <input class="form-control" type="text" name="alamat" id="alamat" value="{{$mitra[$a]->alamat}}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please add the Date.
                                                </div>
                                            </div>
                                            <!-- SINGLE IMAGE / LOGO MITRA -->
                                            <div class="form-group">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" style="color: rgb(22, 177, 92)">
                                                                Logo yang sudah diupload : <a class="text-primary" href="{{ asset('/logomitra/' . $mitra[$a]->logo) }}" target="_blank">{{ $mitra[$a]->logo }}
                                                                </a>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
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
                                                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="facebook" value="{{$mitra[$a]->facebook}}" placeholder="Facebook" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Instagram</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">https://</span>
                                                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="instagram" value="{{$mitra[$a]->instagram}}" placeholder="Instagram" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Shopee</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">https://</span>
                                                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="shopee" value="{{$mitra[$a]->shopee}}" placeholder="Shopee" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Tokopedia</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">https://</span>
                                                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="tokopedia" value="{{$mitra[$a]->tokopedia}}" placeholder="tokopedia" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Latitude</label>
                                                <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $mitra[$a]->latitude }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Longitude</label>
                                                <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $mitra[$a]->longitude }}">
                                            </div>
                                    <?php }
                                    } ?>

                                    <div id="mapid"></div>

                                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">

                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">Update</button>
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
    <script>
        $(document).ready(function() {
            $('#deskripsi').summernote();
        });
    </script>

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
                                '<option hidden>Pilih Kabupaten</option>');
                            $.each(data, function(key, datakabupaten) {
                                $('select[name="id_kot"]').append('<option value="' +
                                    datakabupaten.id + '">' + datakabupaten.nama +
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
                var id_kota = $(this).val();
                // window.alert(id_kota);
                if (id_kota) {
                    $.ajax({
                        url: '/getDistrik/' + id_kota,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        dataType: "json",
                        success: function(data) {
                            $('select[name="id_distrik"]').empty();
                            $('select[name="id_distrik"]').append(
                                '<option hidden>Pilih Distrik</option>');
                            $.each(data, function(key, datadistrik) {
                                $('select[name="id_distrik"]').append('<option value="' +
                                    datadistrik.id + '">' + datadistrik.nama +
                                    '</option>');
                            });

                        }
                    });
                } else {
                    $('select[name="id_distrik"]').empty();
                }
            });
        });
    </script>


    <script>
        // set lokasi latitude dan longitude, lokasinya kota palembang 
        var mymap = L.map('mapid').setView([-2.9547949, 104.6929233], 5);
        //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token    
        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }
        ).addTo(mymap);

        L.Control.geocoder({
            position: 'topleft'
        }).addTo(mymap);

        <?php foreach ($mitra as $mt) {
            if ($mt->id == $id) { ?>
                var marker = L.marker([<?= $mt->latitude ?>, <?= $mt->longitude ?>]).addTo(mymap);
                marker.bindPopup("<?= $mt->nama_mitra ?>").openPopup();
        <?php }
        } ?>

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

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#deskripsi').summernote();
        });
    </script>

</body>

</html>