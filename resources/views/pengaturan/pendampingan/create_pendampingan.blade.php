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
                        <span class="main-content-title mg-b-0 mg-b-lg-1">Add New Page</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">MITRA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
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
                                    <h5 class="card-title mg-b-20">Create Pendampingan</h5>
                                </div>
                                <form action="{{ url('/pendampingan/addNew/create') }}" id="formData" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <?php
                                    $dataTahun = [];
                                    for ($th = 0; $th <= date('Y') - 2014; $th++) {
                                        $dataTahun[$th] =  2014 + $th;
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Tahun</label>
                                        <select name="tahun" class="form-control form-select" data-bs-placeholder="">
                                            @foreach($dataTahun as $thn)
                                            <option value="{{$thn}}">{{$thn}}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the Date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mitra</label>
                                        <select name="mitra" class="form-control form-select" data-bs-placeholder="">
                                            @foreach($mitra as $m)
                                            <option value="{{$m->id}}">{{$m->nama_mitra}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Judul</label>
                                        <input class="form-control" type="text" name="judul" id="judul" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the Date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
                                        <input class="form-control" type="text" name="keterangan" id="keterangan" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the Date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Nama Pendamping</label>
                                        <input class="form-control" type="text" name="nama_pendamping" id="nama_pendamping" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the Date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">NIDN</label>
                                        <input class="form-control" type="text" name="nidn" id="nidn" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the Date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Fakultas</label>
                                        <input class="form-control" type="text" name="fakultas" id="fakultas" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the Date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Prodi</label>
                                        <input class="form-control" type="text" name="prodi" id="prodi" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the Date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Pendanaan</label>
                                        <input class="form-control" type="text" name="pendanaan" id="pendanaan" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please add the Date.
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $('.form-select').select2();
        });
    </script>
</body>

</html>