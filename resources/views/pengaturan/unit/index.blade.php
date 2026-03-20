<?php

use Illuminate\Support\Facades\Auth;

?>
@include('dashboards/users/layouts/script')

<body class="ltr main-body app sidebar-mini">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="page">
        <div class="div">
            @include('dashboards/users/layouts/navbar')
            @include('dashboards/users/layouts/sidebar')
        </div>

        <!-- Page Content  -->
        <div id="content-page" class="main-content app-content">
            <div class="main-container container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <span class="main-content-title mg-b-0 mg-b-lg-1"> </span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <!-- <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);"> </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> </li>
                        </ol> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <h5 class="main-content-label mb-1">DATA UNIT
                                        </h5>
                                        @can('unit_create')
                                        <button class="search-toggle iq-waves-effect bg-primary rounded" data-bs-toggle="modal" title="Tambah UNIT" data-original-title="Tambah UNIT" data-bs-target="#tambahunit"><i class="fa fa-plus-circle"></i>
                                        </button>
                                        @endcan
                                        </h4>
                                        <!-- Modal Tambah UNIT -->
                                        <!-- Modal Tambah UNIT -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="tambahunit">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Unit</h5>
                                                        @can('unit_create')
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        @endcan
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="post" action="{{ url('/unit/create') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Unit</label>
                                                                <input name="nama_unit" id="nama_unit" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Telepon</label>
                                                                <input name="telepon" id="telepon" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input name="email" id="email" type="text" class="form-control">
                                                            </div>
                                                            <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                            <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="float-end ms-auto">
                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" onclick="printDiv()"><i class="fe fe-download me-2"></i> Print</a>
                                                </div>
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
                                        title: "{{session('success')}}",
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                </script>
                                @endif

                                <div class="table-responsive">
                                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="basic-datatable" role="grid" aria-describedby="basic-datatable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="wd-20p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 115.281px;">No</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Unit</th>
                                                            <th class="wd-20p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 114.703px;">Telepon</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Email</th>
                                                            <th class="wd-20p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114.328px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $num = 1; ?>
                                                        <?php for ($a = 0; $a < count($unit); $a++) { ?>
                                                            <tr>
                                                                <td class="sorting_1"><a href="#">{{$num}}</a></td>
                                                                <td>{{$unit[$a]->nama_unit}}</td>
                                                                <td>{{$unit[$a]->telepon}}</td>
                                                                <td>{{$unit[$a]->email}}</td>
                                                                <td>
                                                                    <div class="flex align-items-center list-user-action">
                                                                        @can('unit_update')
                                                                        <a class="iq-bg-primary" data-bs-toggle="modal" data-placement="top" title="Update Unit" data-original-title="Update Unit" href="" data-bs-target="#update_unit<?= $unit[$a]->id ?>"><i class="ri-pencil-line"></i></a>
                                                                        @endcan
                                                                        @can('unit_delete')
                                                                        <a class="iq-bg-primary unit-confirm" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/unit/delete/'.base64_encode($unit[$a]->id))}}"><i class="ri-delete-bin-line"></i></a>
                                                                        @endcan
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- Modal Ubah UNIT -->
                                                            <div class="modal fade" tabindex="-1" role="dialog" id="update_unit<?= $unit[$a]->id ?>">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Ubah Unit</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal" method="post" action="{{ url('/unit/update/'.$unit[$a]->id) }}">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label>Unit</label>
                                                                                    <input name="nama_unit" id="nama_unit" value="{{old('nama_unit',$unit[$a]->nama_unit)}}" type="text" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Telepon</label>
                                                                                    <input name="telepon" id="telepon" value="{{old('telepon',$unit[$a]->telepon)}}" type="text" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    <input name="email" id="email" value="{{old('email',$unit[$a]->email)}}" type="text" class="form-control">
                                                                                </div>
                                                                                <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                                                <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php $num += 1; ?>
                                                        <?php } ?>
                                                    </tbody>
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
    <!-- Wrapper END -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.unit-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#myunit').DataTable();
        });

        //print page
        function printDiv() {
            var printContents = document.getElementById("content-page").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
        };
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
    @include('dashboards/users/layouts/footer')

    </html>