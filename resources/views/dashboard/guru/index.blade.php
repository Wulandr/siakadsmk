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
                            GURU
                            {{-- <a href="{{ url('/list-mitra') }}">
                                <span class="badge bg-info me-1 my-2" title="Show All Mitra Page"><i
                                        class="fe fe-navigation"></i></span>
                            </a> --}}
                        </span>
                    </div>
                    {{-- <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">MITRA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Mitra</li>
                        </ol>
                    </div> --}}
                </div>
                <!-- /breadcrumb -->

                <!-- row  -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">GURU</h4>
                                <div class="div">
                                    @can('guru_create')
                                        <a href="{{ url('/guru/addNew') }}">
                                            <button href="{{ url('/guru/addNew') }}" type="button"
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

                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap mb-0" id="mytable">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">No</th>
                                                <th>NIP</th>
                                                <th>Nama Guru</th>
                                                <th>Jabatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach($guru as $guru){
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                <td>{{ $guru->nip }}</td>
                                                <td class="text-center">
                                                    {{ $guru->nama }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $guru->jabatan }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="flex align-items-center list-user-action">
                                                        @can('guru_update')
                                                            <a href="{{ url('/guru/edit/' . base64_encode($guru->id)) }}"
                                                                class="btn btn-sm btn-info" data-bs-placement="bottom"
                                                                data-bs-toggle="tooltip" title="Edit">
                                                                <i class="fe fe-edit"></i>
                                                            </a>
                                                        @endcan
                                                        @can('guru_delete')
                                                            <a href="{{ url('/guru/delete/' . base64_encode($guru->id)) }}"
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
        $(document).ready(function() {
            $('#mytable').DataTable({
                scrollX: true,
            });
        });

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
    </script>

</body>

</html>
