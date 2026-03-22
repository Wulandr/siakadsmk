{{-- header --}}
@include('layouts.header')
{{-- /header --}}

<body class="ltr main-body app sidebar-mini">

    <!-- Loader -->
    {{-- <div id="global-loader">
        <img src="{{ asset('nowa/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div> --}}
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
                        <span class="main-content-title mg-b-0 mg-b-lg-1">
                            ABSENSI
                        </span>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- row  -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">ABSENSI</h4>
                                <div class="div">
                                    @can('absensi_create')
                                        <a href="{{ url('/absensi/addNew') }}">
                                            <button href="{{ url('/absensi/addNew') }}" type="button"
                                                class="btn btn-primary me-1"><i class="fe fe-plus"></i>
                                                Add New
                                            </button>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body pt-0 example1-table">

                                <!-- Add alert -->
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
                                <!-- /Alert -->

                                <div class="row mb-3">

                                    <div class="col-md-4">
                                        <select id="filter_tahun" class="form-control">
                                            <option value="">-- Semua Tahun --</option>
                                            @foreach ($thAjaran as $th)
                                                <option value="{{ $th->id }}">{{ $th->kode }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap mb-0" id="mytable">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">No</th>
                                                <th>Nama Murid</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach($absensi as $ab){
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                {{-- Nama Murid --}}
                                                <td>
                                                    <strong>{{ $ab->murid->nama ?? '-' }}</strong>
                                                </td>

                                                {{-- Tahun Ajaran --}}
                                                <td>
                                                    {{ $ab->thAjaran->kode }}
                                                </td>

                                                {{-- Tanggal --}}
                                                <td>
                                                    {{ \Carbon\Carbon::parse($ab->tanggal)->format('d M Y') }}
                                                </td>

                                                {{-- Jenis --}}
                                                <td class="text-center">
                                                    @if ($ab->jenis == 'hadir')
                                                        <span class="badge bg-success">Hadir</span>
                                                    @elseif($ab->jenis == 'sakit')
                                                        <span class="badge bg-warning">Sakit</span>
                                                    @elseif($ab->jenis == 'izin')
                                                        <span class="badge bg-info">Izin</span>
                                                    @else
                                                        <span class="badge bg-danger">Alpha</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="flex align-items-center list-user-action">
                                                        @can('absensi_update')
                                                            <a href="{{ url('/absensi/edit/' . base64_encode($ab->id)) }}"
                                                                class="btn btn-sm btn-info" data-bs-placement="bottom"
                                                                data-bs-toggle="tooltip" title="Edit">
                                                                <i class="fe fe-edit"></i>
                                                            </a>
                                                        @endcan
                                                        @can('absensi_delete')
                                                            <a href="{{ url('/absensi/delete/' . base64_encode($ab->id)) }}"
                                                                class="btn btn-sm btn-danger" data-bs-placement="bottom"
                                                                data-bs-toggle="tooltip" title="Delete"
                                                                onclick="return confirm('Apakah anda yakin ingin hapus ?')">
                                                                <i class="fe fe-trash-2"></i>
                                                            </a>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            $no += 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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

    {{-- Activation switch button --}}
    <script>
        // isaktif switch button
        function changeBeritaStatus(_this, id) {
            var status = $(_this).prop('checked') == true ? 1 : 0;
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/berita/active',
                data: {
                    'is_aktif': status,
                    'id': id,
                },
                success: function(result) {}
            });
        }


        //   filter

        $(document).ready(function() {

            let table = $('#mytable').DataTable({
                processing: true,
                ajax: {
                    url: '/absensi/filter',
                    data: function(d) {
                        d.id_th_ajaran = $('#filter_tahun').val();
                    }
                },
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'murid.nama',
                        defaultContent: '-'
                    },
                    {
                        data: 'th_ajaran.kode',
                        defaultContent: '-'
                    },
                    {
                        data: 'tanggal'
                    },
                    {
                        data: 'jenis',
                        render: function(data) {
                            if (data == 'hadir') {
                                return '<span class="badge bg-success">Hadir</span>';
                            } else if (data == 'sakit') {
                                return '<span class="badge bg-warning">Sakit</span>';
                            } else if (data == 'izin') {
                                return '<span class="badge bg-info">Izin</span>';
                            } else {
                                return '<span class="badge bg-danger">Alpha</span>';
                            }
                        }
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            return `
                        <a href="/absensi/edit/${btoa(data)}" class="btn btn-sm btn-info">
                            <i class="fe fe-edit"></i>
                        </a>
                        <a href="/absensi/delete/${btoa(data)}"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Yakin hapus?')">
                            <i class="fe fe-trash-2"></i>
                        </a>
                    `;
                        }
                    }
                ]
            });

            // FILTER TRIGGER
            $('#filter_tahun').on('change', function() {
                table.ajax.reload();
            });

        });
    </script>

</body>

</html>
