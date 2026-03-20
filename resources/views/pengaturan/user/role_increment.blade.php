<!-- multiple row -->
<?php

for ($y = 0; $y < 1; $y++) {
    ?>
<div class="col-sm-3">
    <div class="form-group">
        <br>
        <button class="btn btn-success btn-sm mb-1" type="button">
            <i class="fe fe-plus"></i>
            Tambah Role
        </button>
    </div>
</div>
<?php } ?>

<?php
for ($i = 0; $i < $countArray; $i++) {
  ?>
<div class="clone hide">
    <div class="hdtuto form-group" style="margin-top:10px">
        <div class="row">
            <div class="col-sm-3">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">Role</label>
                <select onchange="ShowHideDiv2()" id="tambahselect2" class="js-example-basic-multiple" name="role[]"
                    id="role[]"
                    style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                    @foreach ($tabelRole as $role)
                        <option value="{{ $role->id }}" {{ $role->id == $myArray[$i] ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <br>
                    <button class="btn btn-danger btn-sm mb-1" type="button">
                        <i class="fe fe-trash"></i>
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
