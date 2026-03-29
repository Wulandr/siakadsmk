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
                        <span class="main-content-title mg-b-0 mg-b-lg-1">Edit Page</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">GURU</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                    <h5 class="card-title mg-b-20">Edit Murid</h5>
                                </div>
                                <form action="{{ url('/murid/edit/process/' . base64_encode($id)) }}" id="formData"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Murid</label>
                                        <input class="form-control" type="text" name="nama"
                                            value="{{ $murid->nama }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input class="form-control" type="text" name="nis"
                                            value="{{ $murid->nis }}" required>
                                    </div>

                                    <!-- Nama Kelas -->
                                    <div class="form-group">
                                        <label>Nama Kelas</label>
                                        <select class="form-control" name="id_kelas" required>
                                            <option value="">-- Pilih Kelas --</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}"
                                                    {{ $murid->id_kelas == $k->id ? 'selected' : '' }}>
                                                    {{ $k->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Tahun Ajaran -->
                                    <div class="form-group">
                                        <label>Tahun Ajaran</label>
                                        <select class="form-control" name="id_th_ajaran" required>
                                            <option value="">-- Pilih Tahun Ajaran --</option>
                                            @foreach ($thAjaran as $th)
                                                <option value="{{ $th->id }}"
                                                    {{ $murid->id_th_ajaran == $th->id ? 'selected' : '' }}>
                                                    {{ $th->th_ajaran }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                    <input name="created_at" id="created_at" type="hidden"
                                        value="<?= date('Y-m-d H:i:s') ?>">
                                    <input name="updated_at" id="updated_at" type="hidden"
                                        value="<?= date('Y-m-d') ?>">

                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">Update</button>
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
            $('#deskripsi').summernote();
        });
    </script>
    <!-- <script type="text/javascript">
        $(function() {
            $('#fotounit').FancyFileUpload({
                params: {
                    files: $('#formData').find('input[name="files[]"]').first().val(),
                    action: 'fileuploader'
                },
                edit: false,
                maxfilesize: 1000000,
            });
        });
    </script> -->

    <!-- multiple image -->

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });
        });
    </script>
</body>

</html>
