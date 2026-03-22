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
                            NILAI Murid {{ $murid->nama }}
                        </span>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- row  -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title"></h4>

                                <div class="div">
                                    @can('nilai_create')
                                        <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal"
                                            data-bs-target="#modalTambahNilai">
                                            <i class="fe fe-plus"></i> Add New
                                        </button>
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

                                {{-- <form method="GET" action="" class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="filter_th_ajaran" class="form-control"
                                                onchange="this.form.submit()">
                                                <option value="">-- Semua Tahun Ajaran --</option>
                                                @foreach ($thAjaran as $t)
                                                    <option value="{{ $t->id }}"
                                                        {{ request('filter_th_ajaran') == $t->id ? 'selected' : '' }}>
                                                        {{ $t->kode }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form> --}}
                                <div class="d-flex ">
                                    <form action="{{ url('/nilai/generate-rapor') }}" method="POST" class="d-flex">
                                        @csrf
                                        <input type="hidden" name="id_murid" value="{{ $murid->id }}">

                                        <select name="id_th_ajaran" class="form-control me-2" required>
                                            <option value="">Pilih Tahun Ajaran</option>
                                            @foreach ($thAjaran as $t)
                                                <option value="{{ $t->id }}">{{ $t->kode }}</option>
                                            @endforeach
                                        </select>

                                        <button type="submit" class="btn btn-success">
                                            <i class="fe fe-file-text"></i> Generate Rapor
                                        </button>
                                    </form>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap mb-0" id="mytable">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Mapel</th>
                                                <th>Jenis Nilai</th>
                                                <th>Nilai</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($nilai as $index => $n)
                                                <tr class="text-center">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $n->get_mapel->mapel }}</td>
                                                    <td>{{ $n->jenis_nilai ?? '-' }}</td>
                                                    <td>
                                                        <strong>{{ $n->nilai ?? '-' }}</strong>
                                                    </td>
                                                    <td>{{ $n->get_th_ajaran->kode }}</td>
                                                    <td class="text-center">
                                                        <div class="flex align-items-center list-user-action">
                                                            @can('nilai_update')
                                                                <button class="btn btn-sm btn-info btn-edit"
                                                                    data-id="{{ $n->id }}"
                                                                    data-mapel="{{ $n->id_mapel }}"
                                                                    data-thajaran="{{ $n->id_th_ajaran }}"
                                                                    data-jenis="{{ $n->jenis_nilai }}"
                                                                    data-nilai="{{ $n->nilai }}" data-bs-toggle="modal"
                                                                    data-bs-target="#modalEditNilai" title="Edit">
                                                                    <i class="fe fe-edit"></i>
                                                                </button>
                                                            @endcan
                                                            @can('nilai_delete')
                                                                <a href="{{ url('/nilai/delete/' . base64_encode($n->id)) }}"
                                                                    class="btn btn-sm btn-danger" data-bs-placement="bottom"
                                                                    data-bs-toggle="tooltip" title="Delete"
                                                                    onclick="return confirm('Apakah anda yakin ingin hapus ?')">
                                                                    <i class="fe fe-trash-2"></i>
                                                                </a>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">Belum ada data nilai</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /row closed -->
        </div>
        <!-- /Container -->

        {{-- MODAL/POP UP TAMBAH NILAI --}}
        <div class="modal fade" id="modalTambahNilai" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ url('/nilai/create') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Nilai</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            {{-- Murid (hidden + tampil nama) --}}
                            <input type="hidden" name="id_murid" value="{{ $murid->id }}">
                            <div class="mb-3">
                                <label>Murid</label>
                                <input type="text" class="form-control" value="{{ $murid->nama }}" readonly>
                            </div>

                            {{-- Mapel --}}
                            <div class="mb-3">
                                <label>Mapel</label>
                                <select name="id_mapel" class="form-control" required>
                                    <option value="">-- Pilih Mapel --</option>
                                    @foreach ($mapel as $m)
                                        <option value="{{ $m->id }}">{{ $m->mapel }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Tahun Ajaran --}}
                            <div class="mb-3">
                                <label>Tahun Ajaran</label>
                                <select name="id_th_ajaran" class="form-control" required>
                                    <option value="">-- Pilih Tahun Ajaran --</option>
                                    @foreach ($thAjaran as $t)
                                        <option value="{{ $t->id }}">{{ $t->kode }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Jenis Nilai --}}
                            <div class="mb-3">
                                <label>Jenis Nilai</label>
                                <select name="jenis_nilai" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="tugas">Tugas</option>
                                    <option value="uts">UTS</option>
                                    <option value="uas">UAS</option>
                                </select>
                            </div>

                            {{-- Nilai --}}
                            <div class="mb-3">
                                <label>Nilai</label>
                                <input type="number" name="nilai" class="form-control" required>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- MODAL/POP UP EDIT NILAI --}}
        <div class="modal fade" id="modalEditNilai" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ url('/nilai/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit_id">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Nilai</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            {{-- Murid --}}
                            <div class="mb-3">
                                <label>Murid</label>
                                <input type="text" class="form-control" value="{{ $murid->nama }}" readonly>
                            </div>

                            {{-- Mapel --}}
                            <div class="mb-3">
                                <label>Mapel</label>
                                <select name="id_mapel" id="edit_mapel" class="form-control" required>
                                    @foreach ($mapel as $m)
                                        <option value="{{ $m->id }}">{{ $m->mapel }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Tahun Ajaran --}}
                            <div class="mb-3">
                                <label>Tahun Ajaran</label>
                                <select name="id_th_ajaran" id="edit_thajaran" class="form-control" required>
                                    @foreach ($thAjaran as $t)
                                        <option value="{{ $t->id }}">{{ $t->kode }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Jenis Nilai --}}
                            <div class="mb-3">
                                <label>Jenis Nilai</label>
                                <select name="jenis_nilai" id="edit_jenis" class="form-control" required>
                                    <option value="tugas">Tugas</option>
                                    <option value="uts">UTS</option>
                                    <option value="uas">UAS</option>
                                </select>
                            </div>

                            {{-- Nilai --}}
                            <div class="mb-3">
                                <label>Nilai</label>
                                <input type="number" name="nilai" id="edit_nilai" class="form-control" required>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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

    <script>
        $(document).ready(function() {
            $('#mytable').DataTable({
                scrollX: true,
            });
        });

        $(document).on('click', '.btn-edit', function() {
            $('#edit_id').val($(this).data('id'));
            $('#edit_mapel').val($(this).data('mapel'));
            $('#edit_thajaran').val($(this).data('thajaran'));
            $('#edit_jenis').val($(this).data('jenis'));
            $('#edit_nilai').val($(this).data('nilai'));
        });
    </script>
</body>

</html>
