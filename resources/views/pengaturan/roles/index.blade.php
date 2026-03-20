{{-- header --}}
@include('layouts.header')
{{-- /header --}}

@section('title')
{{ trans('roles.title.index') }}
@endsection

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
                                ROLE
                            </span>
                        </div>
                        <div class="justify-content-center mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">ADMIN</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Role</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <h4 class="card-title">
                                            DATA ROLE
                                        </h4>
                                        @can('role_create')
                                        <a href="{{ url('/roles_create') }}">
                                            <button type="button" class="btn btn-primary me-1"><i class="fe fe-plus"></i>
                                                Tambah Baru
                                            </button>
                                        </a>
                                        @endcan
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
                                        <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="responsive-datatable" role="grid" aria-describedby="basic-datatable_info">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th class="wd-5p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                                                    No.
                                                                </th>
                                                                <th class="wd-65p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                                                    Role
                                                                </th>
                                                                <th class="wd-30p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                                                    Aksi
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $num = 1; ?>
                                                            @foreach ($role as $role)
                                                            <tr>
                                                                <td class="text-center">{{ $num }}</a></td>
                                                                <td>{{ $role->name }}</a></td>

                                                                <td class="text-center">
                                                                    <div class="row justify-content-center">
                                                                        @can('role_detail')
                                                                        <a href="{{ route('roles.show', ['role' => base64_encode($role->id)]) }}" class="btn btn-sm btn-primary" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Detail">
                                                                            <i class="fe fe-list"></i>
                                                                        </a>&nbsp;&nbsp;
                                                                        @endcan
                                                                        @can('role_update')
                                                                        <a href="{{ route('roles.edit', ['role' => base64_encode($role->id)]) }}" class="btn btn-sm btn-info" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Edit">
                                                                            <i class="fe fe-edit"></i>
                                                                        </a>&nbsp;&nbsp;
                                                                        @endcan
                                                                        @can('role_delete')
                                                                        <a href="{{ route('roles.destroy', ['role' => base64_encode($role->id)]) }}" class="btn btn-sm btn-danger" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Delete" onclick="return confirm('Apakah anda yakin ingin hapus ?')">
                                                                            <i class="fe fe-trash-2"></i>
                                                                        </a>
                                                                        @endcan
                                                                    </div>
                                                                </td>
                                                            </tr>
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


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#myroles').DataTable();
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

    </html>