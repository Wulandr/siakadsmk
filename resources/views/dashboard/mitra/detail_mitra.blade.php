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
                        <span class="main-content-title mg-b-0 mg-b-lg-1">MITRA</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">MITRA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
                        </ol>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- row  -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">MITRA</h4>
                            </div>
                            <div class="card-body pt-0 example1-table">

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
                                <br />
                                @foreach($mitra as $mt)
                                @if($mt->id == $id)
                                <h6>Nama Mitra : {{$mt->nama_mitra}}</h6>
                                <h6>Distrik : {{$mt->distrik}}</h6>
                                <h6>Telepon : {{$mt->telepon}}</h6>
                                <h6>Email : {{$mt->email}}</h6><br />
                                @endif
                                @endforeach
                                <div id="mapid" style="height:100;"></div>
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
                                    <?php foreach ($mitra as $mt) {
                                        if ($mt->id == $id) { ?>
                                            var marker = L.marker([<?= $mt->latitude ?>, <?= $mt->longitude ?>]).addTo(mymap);
                                            marker.bindPopup("<?= $mt->nama_mitra ?>").openPopup();
                                    <?php }
                                    } ?>
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row closed -->
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

    {{-- Activation switch button --}}
    <script>
        // isaktif switch button
        function changeBeritaStatus(_this, id) {
            var status = $(_this).prop('checked') == true ? 1 : 0;
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/berita/active',
                data: {
                    'is_aktif': status,
                    'id': id,
                },
                success: function(result) {}
            });
        }
    </script>

</body>

</html>