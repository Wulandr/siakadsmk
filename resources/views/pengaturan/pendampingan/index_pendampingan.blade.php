{{-- header --}}
@include('layouts.header')
{{-- /header --}}

<body class="ltr main-body app sidebar-mini">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('nowa/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div>
            <!-- main-header -->
            @include('layouts.main-header')
            <!-- /main-header -->

            <!-- main-sidebar -->
            @include('layouts.main-sidebar')
            <!-- main-sidebar -->
        </div>

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- container -->
            <div class="main-container container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <span class="main-content-title mg-b-0 mg-b-lg-1">Kategori</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">MITRA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                        </ol>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- row  -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">PENDAMPINGAN</h4>
                                @can('pendampingan_create')
                                <a href="{{ url('/pendampingan/addNew') }}">
                                    <button href="{{ url('/pendampingan/addNew') }}" type="button" class="btn btn-primary me-1"><i class="fe fe-plus"></i>
                                        Add New
                                    </button>
                                </a>
                                @endcan
                            </div>
                            <div class="card-body pt-0 example1-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap mb-0" id="mytable">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">No</th>
                                                <th width="">Tahun</th>
                                                <th width="">Mitra</th>
                                                <th width="">Unit</th>
                                                <th width="">Judul</th>
                                                <th width="">Nama Pendamping</th>
                                                <th width="">Fakultas</th>
                                                <th width="">Prodi</th>
                                                <th width="">Pendanaan</th>
                                                <th width="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // nama unitnya apa
                                            if (Auth::user()->getroleNames()[0] == 'Unit') {
                                                $idRole2 = 0;
                                                foreach ($tabelRole as $r2) {
                                                    if (Auth::user()->getroleNames()[0] == $r2->name) {
                                                        $idRole2 = $r2->id;
                                                    }
                                                }
                                                foreach ($roleAssignment as $roleA2) {
                                                    if (Auth::user()->getroleNames()[0] == 'Unit' && $roleA2->id_unit != null) {
                                                        foreach ($unit as $u2) {
                                                            if ($roleA2->id_unit == $u2->id && $roleA2->id_user == Auth()->user()->id && $roleA2->id_role == $idRole2) {
                                                                $u2->nama_unit;
                                                                $namaunituser = $u2->nama_unit;
                                                            } else {
                                                                $namaunituser = "";
                                                                '';
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {
                                                $namaunituser = "";
                                            }

                                            $no = 1;
                                            foreach ($pendampingan as $p) {
                                                // JIKA YG LOGIN ADALAH UNIT
                                                if ($namaunituser == $p->nama_unit) {
                                            ?>
                                                    <tr>
                                                        <td class="text-center">{{ $no }}</td>
                                                        <td>{{ $p->tahun }}</td>
                                                        <td class="text-center">{{ $p->mitra }}</td>
                                                        <td class="text-center">{{$p->nama_unit}}</td>
                                                        <td class="text-center">{{ $p->judul }}</td>
                                                        <td class="text-center">{{ $p->nama_pendamping }}</td>
                                                        <td class="text-center">{{ $p->fakultas }}</td>
                                                        <td class="text-center">{{ $p->prodi }}</td>
                                                        <td class="text-center">{{ $p->pendanaan }}</td>
                                                        <td class="text-center">
                                                            <div class="flex align-items-center list-user-action">
                                                                @can('pendampingan_update')
                                                                <a href="" class="btn btn-sm btn-primary" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Komentar">
                                                                    <i class="fe fe-file-text"></i>
                                                                </a>
                                                                <a href="{{ url('/pendampingan/edit/' . base64_encode($p->id)) }}" class="btn btn-sm btn-info" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Edit">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
                                                                @endcan
                                                                @can('pendampingan_delete')
                                                                <a href="{{ url('/pendampingan/delete/' . base64_encode($p->id)) }}" class="btn btn-sm btn-danger" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Delete" onclick="return confirm('Apakah anda yakin ingin hapus ?')">
                                                                    <i class="fe fe-trash-2"></i>
                                                                </a>
                                                                @endcan
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no += 1;
                                                }

                                                // JIKA YG LOGIN ADALAH BUKAN UNIT
                                                if ($namaunituser == "") { ?>
                                                    <tr>
                                                        <td class="text-center">{{ $no }}</td>
                                                        <td>{{ $p->tahun }}</td>
                                                        <td class="text-center">{{ $p->mitra }}</td>
                                                        <td class="text-center">{{$p->nama_unit}}</td>
                                                        <td class="text-center">{{ $p->judul }}</td>
                                                        <td class="text-center">{{ $p->nama_pendamping }}</td>
                                                        <td class="text-center">{{ $p->fakultas }}</td>
                                                        <td class="text-center">{{ $p->prodi }}</td>
                                                        <td class="text-center">{{ $p->pendanaan }}</td>
                                                        <td class="text-center">
                                                            <div class="flex align-items-center list-user-action">
                                                                @can('pendampingan_update')
                                                                <a href="" class="btn btn-sm btn-primary" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Komentar">
                                                                    <i class="fe fe-file-text"></i>
                                                                </a>
                                                                <a href="{{ url('/pendampingan/edit/' . base64_encode($p->id)) }}" class="btn btn-sm btn-info" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Edit">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
                                                                @endcan
                                                                @can('pendampingan_delete')
                                                                <a href="{{ url('/pendampingan/delete/' . base64_encode($p->id)) }}" class="btn btn-sm btn-danger" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Delete" onclick="return confirm('Apakah anda yakin ingin hapus ?')">
                                                                    <i class="fe fe-trash-2"></i>
                                                                </a>
                                                                @endcan
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php $no += 1;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>


                                @can('pendampingan_create')
                                <div class="div">
                                    <div class="btn-group file-attach m-2" role="group" aria-label="Basic example">
                                        <a href="{{ asset('/dokumen/template/contoh_import_pendampingan.xlsx') }}" type="button" class="btn btn-info text-white"><i class="mdi mdi-file-image mx-2"></i>Template Import Data
                                        </a>
                                    </div>
                                    <div class="btn-group file-attach m-2" role="group" aria-label="Basic example">
                                        <a href="{{ route('mitra.export') }}" type="button" class="btn btn-info text-white"><i class="mdi mdi-file-image mx-2"></i>Data Mitra
                                        </a>
                                    </div>
                                    <form method="post" enctype="multipart/form-data" action="{{ url('/pendampingan/importExcel') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <table class="table">
                                                <tr>
                                                    <td width="40%" align="right"><label>Select File for
                                                            Upload</label></td>
                                                    <td width="30">
                                                        <input type="file" name="select_file" />
                                                    </td>
                                                    <td width="30%" align="left">
                                                        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%" align="right"></td>
                                                    <td width="30"><span class="text-muted">.xls, .xslx</span>
                                                    </td>
                                                    <td width="30%" align="left"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row closed -->



            </div>
            <!-- /Container -->
        </div>
        <!-- /main-content -->

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


    <!-- Add alert -->
    @if (session('success'))
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable({
                scrollX: true,
            });
        });
        Swal.fire({
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
    <!-- /Alert -->
</body>

</html>