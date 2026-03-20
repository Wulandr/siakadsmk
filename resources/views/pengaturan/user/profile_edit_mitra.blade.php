<?php foreach ($mitra as $datamitra) {
    if ($datamitra->nama_mitra == $namamitra) {
        $idmitra = $datamitra->id;
        $id_jenis_mitra = $datamitra->id_jenis_mitra;
        $id_unit = $datamitra->id_unit;
        $nama_mitra = $datamitra->nama_mitra;
        $contact_person = $datamitra->contact_person;
        $telepon = $datamitra->telepon;
        $whatsapp = $datamitra->whatsapp;
        $email = $datamitra->email;
        $deskripsi = $datamitra->deskripsi;
        $alamat = $datamitra->alamat;
        $facebook = $datamitra->facebook;
        $instagram = $datamitra->instagram;
        $shopee = $datamitra->shopee;
        $tokopedia = $datamitra->tokopedia;
        $latitude = $datamitra->latitude;
        $longitude = $datamitra->longitude;

?>
        <form action="{{ url('/profile/editmitra/'. base64_encode($idmitra)) }}" id="formData" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label class="form-label">Jenis Mitra</label>
                <select id="id_jenis_mitra" class="js-example-basic-multiple" name="id_jenis_mitra" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                    @foreach ($jenismitra as $jm)
                    <option value="{{ $jm->id }}" {{$jm->id == $id_jenis_mitra ? 'selected' : '' }}>{{ $jm->jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Unit</label>
                <select id="id_unit" class="js-example-basic-multiple" name="id_unit" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                    @foreach ($unit as $uni)
                    <option value="{{ $uni->id }}" {{$uni->id == $id_unit ? 'selected' : '' }}>{{ $uni->nama_unit }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Nama mitra</label>
                <input class="form-control" type="text" name="nama_mitra" id="nama_mitra" value="{{$nama_mitra}}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please add the name of mitra.
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Contact Person</label>
                <input class="form-control" type="text" name="contact_person" id="contact_person" value="{{$contact_person}}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Telepon</label>
                <input class="form-control" type="text" name="telepon" id="telepon" value="{{$telepon}}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please add the number telephone.
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">whatsapp</label>
                <input class="form-control" type="text" name="whatsapp" id="whatsapp" value="{{$whatsapp}}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please add the number telephone.
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{$email}}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please add the email address.
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">
                    About the Mitra</label>
                <textarea class="summernote form-control" type="text" name="deskripsi" id="deskripsi" value="{{$deskripsi}}" required>{{$deskripsi}}
                </textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please write the content.
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Provinsi</label>
                <select class="js-example-basic-multiple-prov" name="id_prov" id="id_prov" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                    <?php
                    foreach ($provinsi as $prov) {
                    ?>
                        <option value="{{ $prov->id }}" {{ $prov->id == $datamitra->get_dis->get_kota->id_provinsi ? 'selected' : '' }}>
                            {{ $prov->nama }}
                        </option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Kota</label>
                <select id="id_kot" class="js-example-basic-multiple-kot" name="id_kot" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                    <?php
                    foreach ($kota as $kot) {
                    ?>
                        <option value="{{ $kot->id }}" {{ $kot->id == $datamitra->get_dis->id_kota ? 'selected' : '' }}>
                            {{ $kot->nama }}
                        </option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Distrik</label>
                <select id="id_distrik" class="js-example-basic-multiple-dis" name="id_distrik" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                    @foreach ($distrik as $dis)
                    <option value="{{ $dis->id }}" {{ $dis->id == $datamitra->id_distrik ? 'selected' : '' }}>{{ $dis->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Alamat</label>
                <input class="form-control" type="text" name="alamat" id="alamat" value="{{$alamat}}" required>
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
                                Logo yang sudah diupload : <a class="text-primary" href="{{ asset('/logomitra/' . $datamitra->logo) }}" target="_blank">{{ $datamitra->logo }}
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
                            <input type="file" class="form-control" name="file" value="{{ $datamitra->logo }}" accept="image/jpeg, image/png" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">Facebook</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">https://</span>
                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="facebook" value="{{$facebook}}" placeholder="Facebook" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">Instagram</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">https://</span>
                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="instagram" value="{{$instagram}}" placeholder="Instagram" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">Shopee</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">https://</span>
                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="shopee" value="{{$shopee}}" placeholder="Shop" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">Tokopedia</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">https://</span>
                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="tokopedia" value="{{$tokopedia}}" placeholder="Shop" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" value="{{$latitude}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" value="{{$longitude}}">
            </div>

            <div id="edit_mapid"></div>

            <?php date_default_timezone_set('Asia/Jakarta'); ?>
            <input name="created_by" id="created_by" type="hidden" value="<?= Auth::user()->id ?>">
            <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
            <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">

            <div class="d-flex mt-3">
                <button class="btn btn-primary" style="padding: 9px 45px" type="submit">Add</button>
            </div>
        </form>

<?php }
} ?>
<script>
    // set lokasi latitude dan longitude, lokasinya kota palembang 
    var mymap = L.map('edit_mapid').setView([-2.9547949, 104.6929233], 5);
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