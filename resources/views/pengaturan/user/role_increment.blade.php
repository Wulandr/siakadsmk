<div class="clone hide">
    <div class="hdtuto form-group" style="margin-top:10px">
        <div class="row">
            <div class="col-sm-3">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">Role</label>
                <select onchange="ShowHideDiv2()" id="tambahselect2" class="js-example-basic-multiple" name="role"
                    id="role"
                    style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                    @foreach ($tabelRole as $role)
                        <option value="{{ $role->id }}" {{ $role->id == $roleAss->ke_role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
