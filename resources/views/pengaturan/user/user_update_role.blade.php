<div class="table-responsive mt-5">
    <button class="btn btn-primary" data-bs-toggle="modal" title="Tambah User" data-original-title="Tambah User" data-bs-target="#tambahroleuser">Tambah Role</i>
    </button>
    <!-- Modal Tambah Role Pada User -->
    <div class="modal fade" role="dialog" id="tambahroleuser" style="overflow:hidden;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Role Pada User : {{$user->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ url('/role_ass/create') }}">
                        @csrf
                        <input type="hidden" name="roleas_id_user" value="{{$user->id}}">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="js-role-update" name="roleas_id_role" style="width: 100%;height: 100%;">
                                @foreach($tabelRole as $roleupdate)
                                <option style="height: 42px;" value="{{$roleupdate->id}}">{{$roleupdate->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <select class="js-unit-update" name="roleas_id_unit" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1;">
                                <option value="0">null</option>
                                @foreach($units as $unit2)
                                <option value="{{$unit2->id}}">{{$unit2->nama_unit}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mitra</label>
                            <select class="js-mitra-update" name="roleas_id_mitra" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1;">
                                <option value="0">null</option>
                                @foreach($mitra as $mitra2)
                                <option value="{{$mitra2->id}}">{{$mitra2->nama_mitra}}</option>
                                @endforeach
                            </select>
                        </div>
                        <?php $i = 0 ?>
                        <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                        <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                        <button class="btn btn-primary mr-1" onclick="return myfunc()" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered text-nowrap mb-0" id="example1">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Role</th>
                <th>Unit</th>
                <th>Mitra</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($roleAssignment as $roleAss) {
                if ($roleAss->id_user == $user->id) {
            ?>
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$roleAss->ke_role->name}}</td>
                        <input type="hidden" name="role[]" value="{{$roleAss->ke_role->id}}">
                        <td> <?php
                                if ($roleAss->id_unit != 0) {
                                    for ($u = 0; $u < count($units); $u++) {
                                        if ($units[$u]->id == $roleAss->id_unit) {
                                            echo $units[$u]->nama_unit;
                                        }
                                    }
                                } else {
                                    echo "-";
                                }
                                ?>
                        </td>
                        <td>
                            <?php
                            if ($roleAss->id_mitra != 0) {
                                for ($m = 0; $m < count($mitra); $m++) {
                                    if ($mitra[$m]->id == $roleAss->id_mitra) {
                                        echo $mitra[$m]->nama_mitra;
                                    }
                                }
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td>
                            <div class="flex align-items-center list-user-action">
                                <a class="btn btn-sm btn-info" data-bs-toggle="modal" data-placement="top" title="Update User" data-original-title="Update User" href="" data-bs-target="#update_roleuser<?= $roleAss->id ?>"> <i class="fe fe-edit"></i></a>
                                <a href="" class="btn btn-sm btn-danger" data-bs-placement="bottom" data-bs-toggle="tooltip-danger" title="Delete">
                                    <i class="fe fe-trash-2"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Ubah Role Pada User -->
                    <div class="modal fade" role="dialog" id="update_roleuser<?= $roleAss->id ?>" style="overflow:hidden;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ubah Role Pada User : {{$user->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" method="post" action="">
                                        @csrf
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="js-role-update" name="roleas_id_role" style="width: 100%;height: 100%;">
                                                @foreach($tabelRole as $roleupdate)
                                                <option style="height: 42px;" value="{{$roleupdate->id}}" {{$roleAss->id == $roleupdate->id ? 'selected':''}}>{{$roleupdate->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <select class="js-unit-update" name="roleas_id_unit" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1;">
                                                <option value="null">null</option>
                                                @foreach($units as $unit2)
                                                <option value="{{$unit2->id}}" {{$roleAss->id_unit == $unit2->id ? 'selected':''}}>{{$unit2->nama_unit}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mitra</label>
                                            <select class="js-mitra-update" name="roleas_id_mitra" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1;">
                                                <option value="null">null</option>
                                                @foreach($mitra as $mitra2)
                                                <option value="{{$mitra2->id}}" {{$roleAss->id_mitra == $mitra2->id ? 'selected':''}}>{{$mitra2->nama_mitra}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <?php $i = 0 ?>
                                        <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                        <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } ?>
        </tbody>
    </table>
</div>

<script>
    function myfunc() {
        var frm = document.getElementById("xform1");
        frm.submit();
    }
    // window.onload = function() {
    //     myfunc()
    // };
</script>