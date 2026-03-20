<form action="{{ url('/profile/createmitra') }}" id="formData" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    @csrf
    @foreach($tabelRole as $t)
    @if($t->name == "Mitra")
    <input type="hidden" name="id_role" value="{{$t->id}}">
    @endif
    @endforeach
    <div class="form-group">
        <label class="form-label">Jenis
            mitra</label>
        <select id="id_jenis_mitra" class="js-example-basic-multiple" name="id_jenis_mitra" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
            @foreach ($jenismitra as $jm)
            <option value="{{ $jm->id }}">{{ $jm->jenis }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">Unit</label>
        <select id="id_unit" class="js-example-basic-multiple" name="id_unit" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
            @foreach ($unit as $uni)
            <option value="{{ $uni->id }}">{{ $uni->nama_unit }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">Nama mitra</label>
        <input class="form-control" type="text" name="nama_mitra" id="nama_mitra" required>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please add the name of mitra.
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Contact Person</label>
        <input class="form-control" type="text" name="contact_person" id="contact_person" required>
    </div>
    <div class="form-group">
        <label class="form-label">Telepon</label>
        <input class="form-control" type="text" name="telepon" id="telepon" required>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please add the number telephone.
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">whatsapp</label>
        <input class="form-control" type="text" name="whatsapp" id="whatsapp" required>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please add the number telephone.
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Email</label>
        <input class="form-control" type="email" name="email" id="email" required>
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
        <label class="form-label">Provinsi</label>
        <select class="js-example-basic-multiple-prov" name="id_prov" id="id_prov" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
            @foreach ($provinsi as $prov)
            <option value="{{ $prov->id }}">{{ $prov->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">Kota</label>
        <select id="id_kot" class="js-example-basic-multiple-kot" name="id_kot" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
            @foreach ($kota as $kot)
            <option value="{{ $kot->id }}">{{ $kot->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">Kota</label>
        <select id="id_dis" class="js-example-basic-multiple-dis" name="id_dis" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
            @foreach ($distrik as $dis)
            <option value="{{ $dis->id }}">{{ $dis->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">Alamat</label>
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
        <label class="main-content-label tx-11 tx-medium tx-gray-600">Shopee</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">https://</span>
            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="shopee" placeholder="Shop" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="main-content-label tx-11 tx-medium tx-gray-600">Tokopedia</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">https://</span>
            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="tokopedia" placeholder="Shop" type="text">
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
    <input name="created_by" id="created_by" type="hidden" value="<?= Auth::user()->id ?>">
    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">

    <div class="d-flex mt-3">
        <button class="btn btn-primary" style="padding: 9px 45px" type="submit">Add</button>
    </div>
</form>

<!-- Wrapper END -->