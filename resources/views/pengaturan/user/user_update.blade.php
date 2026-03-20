{{-- header --}}
@include('layouts.header')
{{-- /header --}}

<body class="ltr main-body app sidebar-mini">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="app">
        <div class="page">
            <div>
                @include('layouts/main-header')
                @include('layouts/main-sidebar')
            </div>
            <div id="content-page" class="main-content app-content">
                <div class="main-container container-fluid">

                    <!-- breadcrumb -->
                    <div class="breadcrumb-header justify-content-between">
                        <div class="left-content">
                            <span class="main-content-title mg-b-0 mg-b-lg-1">Edit User</span>
                        </div>
                        <div class="justify-content-center mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">ADMIN</a></li>
                                <li class="breadcrumb-item" aria-current="page">User</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="main-content-label mg-b-5">
                                        <h5 class="card-title mg-b-20">Edit User</h5>
                                    </div>
                                    <form class="form-horizontal" id="xform1" method="post" action="{{ route('user.processUpdate', ['user' => $user]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600">Nama
                                                User</label>
                                            <input name="name" id="name" value="{{ old('name', $user->name) }}" type=" text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600">Email</label>
                                            <input name="email" id="email" value="{{ old('email', $user->email) }}" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            $i = 0;
                                            $rolenya = [];
                                            foreach ($roleAssignment as $roleAss) {
                                                if ($roleAss->id_user == $user->id) {
                                            ?>
                                                    <input type="hidden" name="rolesebelum[]" value="{{ $roleAss->ke_role->id }}">
                                            <?php }
                                            } ?>
                                            <!-- <select class="js-example-basic-multiple2" name="role[]" id="role" multiple="multiple" style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1;
                                                  min-height: 52px;">
                                                <?php
                                                $myString = $user->multirole;
                                                $myArray = [];
                                                $myArray = explode(',', $myString);
                                                $z = [$myArray];

                                                // print_r($myArray);

                                                ?>
                                                @foreach ($tabelRole as $role)
<option style="height: 42px;" value="{{ $role->id }}" {{ in_array($role->id, $myArray) ? 'selected' : '' }}>{{ $role->name }}</option>
@endforeach
                                              </select> -->
                                        </div>
                                        <?php
                                        $countArray = count($myArray);
                                        ?>

                                        <!-- multiple row -->
                                        @include('pengaturan/user/role_increment')

                                        <?php $i = 0; ?>
                                        <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                        <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </form>
                                    <br />

                                    <!-- update role tabel-->
                                    <!-- include("pengaturan/user/user_update_role") -->

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

</body>
{{-- script --}}
@include('layouts.script')
{{-- /script --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple2').select2();
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple3').select2();
    });
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>


<!-- multiple row -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-success").click(function() {
            var lsthmtl = $(".clone").html();
            $(".clone").after(lsthmtl);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".hdtuto").remove();
        });
    });
</script>

{{-- Dropdown on Click Radio Button --}}
<script>
    function ShowHideDiv() {
        console.log(document.getElementById("tambahselect").value)
        <?php
        foreach ($tabelRole as $rr) {
            if ($rr->name == 'Mitra') {
                $idRoleMitra = $rr->id;
            }
            if ($rr->name == 'Unit') {
                $idRoleUnit = $rr->id;
            }
        }
        ?>
        var roleselect = document.getElementById("tambahselect");
        var list = document.getElementById("list");
        if (roleselect.value == <?= $idRoleMitra ?>) {
            // list.style.display = "block";
        }
        if (roleselect.value == <?= $idRoleUnit ?>) {
            // listunit.style.display = "block";
        }
    }

    function ShowHideDiv2() {
        console.log(document.getElementById("tambahselect2").value)
        <?php
        foreach ($tabelRole as $rr) {
            if ($rr->name == 'Mitra') {
                $idRoleMitra = $rr->id;
            }
            if ($rr->name == 'Unit') {
                $idRoleUnit = $rr->id;
            }
        }
        ?>
        var roleselect2 = document.getElementById("tambahselect2");
        var list2 = document.getElementById("list2");

        if (roleselect2.value == <?= $idRoleMitra ?>) {
            // list2.style.display = "block";
        }
        if (roleselect2.value == <?= $idRoleUnit ?>) {
            // listunit2.style.display = "block";
        }
    }
</script>

</html>