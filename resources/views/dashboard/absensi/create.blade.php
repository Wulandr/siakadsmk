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
                        <span class="main-content-title mg-b-0 mg-b-lg-1">Add New Page</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">ABSENSI</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New</li>
                        </ol>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    <h5 class="card-title mg-b-20">Create absensi</h5>
                                </div>
                                <form action="{{ url('/absensi/addNew/create') }}" id="formData" method="POST"
                                    enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Murid</label>
                                            <select class="form-control" name="id_murid" required>
                                                <option value="">-- Pilih Murid --</option>
                                                @foreach ($murid as $m)
                                                    <option value="{{ $m->id }}">
                                                        {{ $m->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Murid wajib dipilih</div>
                                        </div>
                                    </div>

                                    {{-- Tahun Ajaran --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tahun Ajaran</label>
                                            <select class="form-control" name="id_th_ajaran" required>
                                                <option value="">-- Pilih Tahun Ajaran --</option>
                                                @foreach ($thAjaran as $th)
                                                    <option value="{{ $th->id }}">
                                                        {{ $th->kode }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Tahun ajaran wajib dipilih</div>
                                        </div>
                                    </div>
                                    {{-- Tanggal --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" class="form-control" name="tanggal"
                                                value="{{ date('Y-m-d') }}" required>
                                            <div class="invalid-feedback">Tanggal wajib diisi</div>
                                        </div>
                                    </div>

                                    {{-- Jenis --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <select class="form-control" name="jenis" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="hadir">Hadir</option>
                                                <option value="sakit">Sakit</option>
                                                <option value="izin">Izin</option>
                                                <option value="alpha">Alpha</option>
                                            </select>
                                            <div class="invalid-feedback">Status wajib dipilih</div>
                                        </div>
                                    </div>
                                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                    <input name="created_at" id="created_at" type="hidden"
                                        value="<?= date('Y-m-d H:i:s') ?>">
                                    <input name="updated_at" id="updated_at" type="hidden"
                                        value="<?= date('Y-m-d') ?>">

                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->

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
</body>

</html>
