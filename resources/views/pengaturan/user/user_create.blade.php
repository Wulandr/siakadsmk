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
                            <span class="main-content-title mg-b-0 mg-b-lg-1">Tambahkan User Baru</span>
                        </div>
                        <div class="justify-content-center mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">ADMIN</a></li>
                                <li class="breadcrumb-item" aria-current="page">User</li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="main-content-label mg-b-5">
                                        <h5 class="card-title mg-b-20">Tambah User Baru</h5>
                                    </div>
                                    <form class="form-horizontal" method="post" action="{{ url('/user/create') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600">Nama
                                                User</label>
                                            <input name="name" id="name" type="text" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600">Email</label>
                                            <input name="email" id="email" type="email" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <label
                                                class="main-content-label tx-11 tx-medium tx-gray-600">Password</label>
                                            <input name="password" id="password" type="password" class="form-control">
                                        </div>
                                        <!-- multiple row -->
                                        <div class="form-group hdtuto increment">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label
                                                        class="main-content-label tx-11 tx-medium tx-gray-600">Role</label>
                                                    <select onchange="ShowHideDiv()" id="tambahselect"
                                                        class="js-example-basic-multiple" name="role[]" id="role[]"
                                                        style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                                                        @foreach ($tabelRole as $role)
                                                            <option value="{{ $role->id }}">
                                                                {{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <button class="btn btn-success btn-sm mb-1" type="button">
                                                            <i class="fe fe-plus"></i>
                                                            Tambah
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clone hide">
                                            <div class="hdtuto form-group" style="margin-top:10px">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label
                                                            class="main-content-label tx-11 tx-medium tx-gray-600">Role</label>
                                                        <select onchange="ShowHideDiv2()" id="tambahselect2"
                                                            class="js-example-basic-multiple" name="role[]"
                                                            id="role[]"
                                                            style="width: 100%;height: 100%;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1">
                                                            @foreach ($tabelRole as $role)
                                                                <option value="{{ $role->id }}">
                                                                    {{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <br>
                                                        <button class="btn btn-danger btn-sm mb-1" type="button">
                                                            <i class="fe fe-trash"></i>
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php $i = 0; ?>
                                        <input name="created_at" id="created_at" type="hidden"
                                            value="<?= date('Y-m-d') ?>">
                                        <input name="updated_at" id="updated_at" type="hidden"
                                            value="<?= date('Y-m-d') ?>">
                                        <button class="btn btn-primary mr-1 float-end" type="submit">Submit</button>
                                    </form>
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
        <!-- End Page -->

        <!-- Back-to-top -->
        <a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>

        {{-- script --}}
        @include('layouts.script')
        {{-- /script --}}

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                    $(".increment").after(lsthmtl);
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

</body>

</html>
