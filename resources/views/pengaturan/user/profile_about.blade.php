<div class="card-body p-0 border-0 p-0 rounded-10">
    <div class="p-4">
        <h4 class="tx-15 text-uppercase mb-3">Biodata</h4>
        <p class="m-b-5">
        <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-user me-2"></i></span><span class="font-weight-semibold me-2">Nama:</span><span>{{Auth::user()->name}}</span>
        </p>
        <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-envelope me-2"></i></span><span class="font-weight-semibold me-2">Email:</span><span>{{Auth::user()->email}}</span>
        </p>
        <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-envelope me-2"></i></span><span class="font-weight-semibold me-2">Role:</span><span>{{Auth::user()->getroleNames()[0]}}</span>
        </p>
        </p>


        @if((Auth::user()->getroleNames()[0] == "Unverif" || "Mitra" ) && Auth::user()->role == $idroleMitra && $statuslengkap == "Lengkap")
        @foreach($mitra as $datamitra)
        @if($datamitra->nama_mitra == $namamitra)
        <?php $idmitra = $datamitra->id; ?>
        <h5 class="mb-2 mt-1 fw-semibold">Tentang Mitra :</h5>
        <style>
            p {
                text-align: justify;
                text-justify: inter-word;
                font-family: 'Poppins' !important;
            }
        </style>
        <p class="mb-3 tx-13">
            {!! strip_tags($datamitra->deskripsi) !!}
        </p>
        <h5 class="mb-2 mt-3 fw-semibold">Profil :</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="fw-semibold">Nama Mitra</td>
                    <td><strong>{{ $datamitra->nama_mitra }}</strong></td>
                </tr>
                <tr>
                    <td class="fw-semibold">Jenis Mitra</td>
                    <td>{{ $datamitra->get_jenisMitra->jenis }}</td>
                </tr>
                <tr>
                    <td class="fw-semibold">Nomor Telefon</td>
                    <td>{{ $datamitra->telepon }}</td>
                </tr>
                <tr>
                <tr>
                    <td class="fw-semibold">Email</td>
                    <td>{{ $datamitra->email }}</td>
                </tr>
                <tr>
                    <td class="fw-semibold">Alamat</td>
                    <td>{{ $datamitra->alamat . ', ' . ucwords(strtolower($datamitra->get_dis->nama . ', ' . $datamitra->get_dis->get_kota->nama . ', ' . $datamitra->get_dis->get_kota->get_prov->nama)) }}
                    </td>
                </tr>
                <tr>
                    <td class="fw-semibold">Latitude</td>
                    <td>{{ $datamitra->latitude }}
                    </td>
                </tr>
                <tr>
                    <td class="fw-semibold">Longitude</td>
                    <td>{{ $datamitra->longitude }}
                    </td>
                </tr>
                <tr>
                    <td class="fw-semibold">Lokasi Map</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="mapid"></div>
                    </td>
                </tr>
            </table>
        </div>



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

            var marker = L.marker([<?= $datamitra->latitude ?>, <?= $datamitra->longitude ?>]).addTo(mymap);
            marker.bindPopup("<?= $datamitra->nama_mitra ?>").openPopup();

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

        @endif
        @endforeach
        @endif

    </div>
    <div class="border-top"></div>
    <!-- <div class="p-4">
        <label class="main-content-label tx-13 mg-b-20">Statistics</label>
        <div class="profile-cover__info ms-4 ms-auto p-0">
            <ul class="nav p-0 border-bottom-0 mb-0">
                <li class="border p-2 br-5 bg-light wd-100 ht-70"><span class="border-0 mb-0 pb-0">113</span>Projects</li>
                <li class="border p-2 br-5 bg-light wd-100 ht-70"><span class="border-0 mb-0 pb-0">245</span>Followers</li>
                <li class="border p-2 br-5 bg-light wd-100 ht-70"><span class="border-0 mb-0 pb-0">128</span>Following</li>
            </ul>
        </div>
    </div>
    <div class="border-top"></div>
    <div class="p-4">
        <label class="main-content-label tx-13 mg-b-20">Contact</label>
        <div class="d-sm-flex">
            <div class="mg-sm-r-20 mg-b-10">
                <div class="main-profile-contact-list">
                    <div class="media">
                        <div class="media-icon bg-primary-transparent text-primary">
                            <i class="icon ion-md-phone-portrait"></i>
                        </div>
                        <div class="media-body"> <span>Mobile</span>
                            <div> +245 354 654 </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mg-sm-r-20 mg-b-10">
                <div class="main-profile-contact-list">
                    <div class="media">
                        <div class="media-icon bg-success-transparent text-success">
                            <i class="icon ion-logo-slack"></i>
                        </div>
                        <div class="media-body"> <span>Slack</span>
                            <div> @spruko.w </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="main-profile-contact-list">
                    <div class="media">
                        <div class="media-icon bg-info-transparent text-info">
                            <i class="icon ion-md-locate"></i>
                        </div>
                        <div class="media-body"> <span>Current Address</span>
                            <div> San Francisco, CA </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top"></div>
    <div class="p-4">
        <label class="main-content-label tx-13 mg-b-20">Social</label>
        <div class="d-lg-flex">
            <div class="mg-md-r-20 mg-b-10">
                <div class="main-profile-social-list">
                    <div class="media">
                        <div class="media-icon bg-primary-transparent text-primary">
                            <i class="icon ion-logo-github"></i>
                        </div>
                        <div class="media-body"> <span>Github</span> <a href="">github.com/spruko</a> </div>
                    </div>
                </div>
            </div>
            <div class="mg-md-r-20 mg-b-10">
                <div class="main-profile-social-list">
                    <div class="media">
                        <div class="media-icon bg-success-transparent text-success">
                            <i class="icon ion-logo-twitter"></i>
                        </div>
                        <div class="media-body"> <span>Twitter</span> <a href="">twitter.com/spruko.me</a> </div>
                    </div>
                </div>
            </div>
            <div class="mg-md-r-20 mg-b-10">
                <div class="main-profile-social-list">
                    <div class="media">
                        <div class="media-icon bg-info-transparent text-info">
                            <i class="icon ion-logo-linkedin"></i>
                        </div>
                        <div class="media-body"> <span>Linkedin</span> <a href="">linkedin.com/in/spruko</a> </div>
                    </div>
                </div>
            </div>
            <div class="mg-md-r-20 mg-b-10">
                <div class="main-profile-social-list">
                    <div class="media">
                        <div class="media-icon bg-danger-transparent text-danger">
                            <i class="icon ion-md-link"></i>
                        </div>
                        <div class="media-body"> <span>My Portfolio</span> <a href="">spruko.com/</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>