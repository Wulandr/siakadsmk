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
                                    <h5 class="card-title mg-b-20">Edit Kelas</h5>
                                </div>
                                <form action="{{ url('/kelas/edit/process/' . base64_encode($id)) }}" id="formData"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Nama Kelas -->
                                    <div class="form-group">
                                        <label>Nama Kelas</label>
                                        <input class="form-control" type="text" name="nama_kelas"
                                            value="{{ $kelas->nama_kelas }}" required>
                                    </div>

                                    <!-- Wali Kelas -->
                                    <div class="form-group">
                                        <label>Wali Kelas</label>
                                        <select class="form-control" name="wali_kelas" required>
                                            <option value="">-- Pilih Wali Kelas --</option>
                                            @foreach ($walikelas as $w)
                                                <option value="{{ $w->id }}"
                                                    {{ $kelas->wali_kelas == $w->id ? 'selected' : '' }}>
                                                    {{ $w->nama }}
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
