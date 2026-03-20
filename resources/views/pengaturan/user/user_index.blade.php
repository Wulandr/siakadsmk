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
                            <span class="main-content-title mg-b-0 mg-b-lg-1">
                                USER
                            </span>
                        </div>
                        <div class="justify-content-center mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">ADMIN</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <h4 class="card-title">
                                            DATA USER
                                        </h4>
                                        @can('user_show')
                                            <a href="{{ url('/user/create') }}">
                                                <button type="button" class="btn btn-primary me-1"><i
                                                        class="fe fe-plus"></i>
                                                    Tambah Baru
                                                </button>
                                            </a>
                                            @endif
                                        </div>
                                        <!-- Modal Tambah user -->
                                        <div class="modal fade" role="dialog" id="tambahuser" style="overflow:hidden;">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah User</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="post"
                                                            action="{{ url('/user/create') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Nama User</label>
                                                                <input name="name" id="name" type="text"
                                                                    class="form-control">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input name="email" id="email" type="email"
                                                                    class="form-control">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input name="password" id="password" type="password"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Role</label>
                                                                <select class="js-role-tambah" name="role[]"
                                                                    id="tambahselect" multiple="multiple"
                                                                    style="width: 100%;height: 100%;color:black">
                                                                    @foreach ($role as $roletambah)
                                                                        <option value="{{ $roletambah->id }}">
                                                                            {{ $roletambah->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                </select>
                                                            </div>
                                                            <?php $i = 0; ?>
                                                            <input name="created_at" id="created_at" type="hidden"
                                                                value="<?= date('Y-m-d') ?>">
                                                            <input name="updated_at" id="updated_at" type="hidden"
                                                                value="<?= date('Y-m-d') ?>">
                                                            <button class="btn btn-primary mr-1"
                                                                type="submit">Submit</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 example1-table">
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

                                        <div class="table-responsive">
                                            <div id="basic-datatable_wrapper"
                                                class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table
                                                            class="table table-bordered text-nowrap border-bottom dataTable no-footer"
                                                            id="mytable" role="grid"
                                                            aria-describedby="basic-datatable_info">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-3p sorting sorting_asc" tabindex="0"
                                                                        aria-controls="basic-datatable" rowspan="1"
                                                                        colspan="1" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending"
                                                                        style="width: 115.281px;">No.</th>
                                                                    <th class="wd-20p sorting sorting_asc" tabindex="0"
                                                                        aria-controls="basic-datatable" rowspan="1"
                                                                        colspan="1" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending"
                                                                        style="width: 115.281px;">Foto</th>
                                                                    <th class="wd-20p sorting sorting_asc" tabindex="0"
                                                                        aria-controls="basic-datatable" rowspan="1"
                                                                        colspan="1" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending"
                                                                        style="width: 115.281px;">Nama</th>
                                                                    <th class="wd-20p sorting sorting_asc" tabindex="0"
                                                                        aria-controls="basic-datatable" rowspan="1"
                                                                        colspan="1" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending"
                                                                        style="width: 115.281px;">Email</th>
                                                                    <th class="wd-20p sorting sorting_asc" tabindex="0"
                                                                        aria-controls="basic-datatable" rowspan="1"
                                                                        colspan="1" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending"
                                                                        style="width: 115.281px;">Role</th>
                                                                    <th class="wd-20p sorting sorting_asc" tabindex="0"
                                                                        aria-controls="basic-datatable" rowspan="1"
                                                                        colspan="1" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending"
                                                                        style="width: 115.281px;">Multirole</th>
                                                                    <th class="wd-20p sorting sorting_asc" tabindex="0"
                                                                        aria-controls="basic-datatable" rowspan="1"
                                                                        colspan="1" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending"
                                                                        style="width: 115.281px;">Status</th>
                                                                    <th class="wd-20p sorting sorting_asc" tabindex="0"
                                                                        aria-controls="basic-datatable" rowspan="1"
                                                                        colspan="1" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending"
                                                                        style="width: 115.281px;">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $num = 1; ?>
                                                                @foreach ($user as $u)
                                                                    <tr>
                                                                        <td><a href="#">{{ $num }}</a></td>
                                                                        <td class="font-weight-600"><img
                                                                                class="rounded-circle"
                                                                                src="{{ asset('imageprofil/' . $u->image) }}"
                                                                                width="50" height="50"></td>
                                                                        <td class="font-weight-600">{{ $u->name }}
                                                                        </td>
                                                                        <td class="font-weight-600">{{ $u->email }}
                                                                        </td>
                                                                        <?php foreach ($role as $roleindex) { ?>
                                                                        <?php if ($u->role == $roleindex->id) { ?>
                                                                        <td class="font-weight-600">{{ $roleindex->name }}
                                                                        </td>

                                                                        <?php } ?>
                                                                        <?php } ?>
                                                                        <td class="font-weight-600">
                                                                            <?php
                                                                            $myArray2 = explode(',', $u->multirole);
                                                                            ?>
                                                                            <?php $var2 = 0;
                                                                    $string = '';
                                                                    foreach ($myArray2 as $tag2) {
                                                                        foreach ($tabelRole as $r4) {
                                                                            if ($r4->id == $tag2) {
                                                                                $string = $string . $r4->name . ", " ?>
                                                                            <?php

                                                                            }
                                                                        }
                                                                    }
                                                                    $string2 = rtrim($string, ", ");
                                                                    ?>
                                                                            {{ $string2 }}
                                                                        </td>
                                                                        <td>
                                                                            @can('user_isaktif')
                                                                                <div
                                                                                    class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                                                                    <div class="custom-switch-inner">
                                                                                        <!-- {{ Auth::user()->is_aktif }} -->
                                                                                        <!-- <p class="mb-0"> Success </p> -->
                                                                                        <div class="form-group">
                                                                                            <label class="custom-switch ps-0"
                                                                                                for="customSwitch-22{{ $u->id }}">
                                                                                                <input
                                                                                                    data-id="{{ $u->id }}"
                                                                                                    type="checkbox"
                                                                                                    name="custom-switch-checkbox1"
                                                                                                    class="x custom-switch-input"
                                                                                                    id="customSwitch-22{{ $u->id }}"
                                                                                                    onclick="changeUserStatus(event.target, <?= $u->id ?>);"
                                                                                                    {{ $u->is_aktif == 1 ? 'checked' : '' }}>
                                                                                                <span
                                                                                                    class="custom-switch-indicator"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                        <!-- <input data-id="{{ $u->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $u->is_aktif ? 'checked' : '' }}> -->
                                                                                    </div>
                                                                                </div>
                                                                            @endcan
                                                                        </td>
                                                                        <td>
                                                                            <div class="row">
                                                                                <div
                                                                                    class="flex align-items-center list-user-action">
                                                                                    @can('user_detail')
                                                                                        <a href="{{ route('user.detail', ['user' => base64_encode($u->id)]) }}"
                                                                                            class="btn btn-sm btn-primary"
                                                                                            data-bs-placement="bottom"
                                                                                            data-bs-toggle="tooltip"
                                                                                            title="Detail">
                                                                                            <i class="fe fe-list"></i>
                                                                                        </a>
                                                                    @endif
                                                                    @can('user_update')
                                                                        <a href="{{ route('user.update', ['user' => base64_encode($u->id)]) }}"
                                                                            class="btn btn-sm btn-info" data-bs-placement="bottom"
                                                                            data-bs-toggle="tooltip" title="Edit">
                                                                            <i class="fe fe-edit"></i>
                                                                        </a>
                                                                        @endif
                                                                        @can('user_delete')
                                                                            <a href="{{ route('user.delete', ['user' => base64_encode($u->id)]) }}"
                                                                                class="btn btn-sm btn-danger"
                                                                                data-bs-placement="bottom" data-bs-toggle="tooltip"
                                                                                title="Delete"
                                                                                onclick="return confirm('Apakah anda yakin ingin hapus ?')">
                                                                                <i class="fe fe-trash-2"></i>
                                                                            </a>
                                                                            @endif
                                                                </div>
                                                            </div>
                                                            </td>
                                                            </tr>
                                                            <!-- Modal Ubah User -->
                                                            <div class="modal fade" role="dialog" id="update_user<?= $u->id ?>"
                                                                style="overflow:hidden;">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Ubah User</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal" method="post"
                                                                                action="{{ route('user.processUpdate', ['user' => $u->id]) }}">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label>Nama User</label>
                                                                                    <input name="name" id="name"
                                                                                        value="{{ old('name', $u->name) }}"
                                                                                        type=" text" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    <input name="email" id="email"
                                                                                        value="{{ old('email', $u->email) }}"
                                                                                        type="text" class="form-control">
                                                                                </div>
                                                                                <!-- <div class="form-group">
                                                                                                                                                                    <label>Password</label>
                                                                                                                                                                    <input name="password" id="password" value="{{ old('password') }}" type="password" class="form-control">
                                                                                                                                                                </div> -->
                                                                                <div class="form-group">
                                                                                    <label>Role</label>
                                                                                    <select class="js-role-update" name="role[]"
                                                                                        id="ubahSelect_role{{ $u->id }}"
                                                                                        multiple="multiple"
                                                                                        style="width: 100%;height: 100%;">
                                                                                        <?php
                                                                                        $myString = $u->multirole;
                                                                                        $myArray = [];
                                                                                        $myArray = explode(',', $myString);
                                                                                        print_r($myArray);
                                                                                        ?>
                                                                                        @foreach ($role as $roleupdate)
                                                                                            <option style="height: 42px;"
                                                                                                value="{{ $roleupdate->id }}"
                                                                                                {{ in_array($roleupdate->id, $myArray) ? 'selected' : '' }}>
                                                                                                {{ $roleupdate->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <?php $i = 0; ?>
                                                                                <input name="created_at" id="created_at"
                                                                                    type="hidden" value="<?= date('Y-m-d') ?>">
                                                                                <input name="updated_at" id="updated_at"
                                                                                    type="hidden" value="<?= date('Y-m-d') ?>">
                                                                                <button class="btn btn-primary mr-1"
                                                                                    type="submit">Submit</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php $num += 1; ?>
                                                            @endforeach
                                                            <tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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

                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('.js-role-tambah').select2();
                        });
                        $(document).ready(function() {
                            $('.hide-role').select2();
                        });
                        $(document).ready(function() {
                            $('.js-role-update').select2();
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $('#mytable').DataTable({
                                scrollX: true,
                            });
                        });

                        // isaktif switch button
                        function changeUserStatus(_this, id) {
                            var status = $(_this).prop('checked') == true ? 1 : 0;
                            let _token = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                type: "GET",
                                dataType: "json",
                                url: '/user/isaktif',
                                data: {
                                    'is_aktif': status,
                                    'id': id,
                                },
                                success: function(result) {}
                            });
                        }
                    </script>
                    <!-- <script>
                        $(document).ready(function() {
                            $.noConflict();
                            $('#myusers').DataTable();
                        });
                    </script> -->
                    <script>
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                                $(this).remove();
                            });
                        }, 2000);
                    </script>

                    <!-- Back-to-top -->
                    <a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>

                    {{-- script --}}
                    @include('layouts.script')
                    {{-- /script --}}

                    <script>
                        $(document).ready(function() {
                            $('#tambahselect').select2({
                                allowClear: true,
                                dropdownParent: $('#tambahuser')
                            });
                        });

                        function update_detail(idupdate) {
                            $('#ubahSelect_role' + idupdate).select2({
                                allowClear: true,
                                dropdownParent: $('#update_user' + idupdate)
                            });
                        }
                    </script>

                </body>

                </html>
