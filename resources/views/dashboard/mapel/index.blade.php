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
                            MAPEL
                        </span>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- row  -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">MAPEL</h4>
                                <div class="div">
                                    @can('mapel_create')
                                        <a href="{{ url('/mapel/addNew') }}">
                                            <button href="{{ url('/mapel/addNew') }}" type="button"
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
                                                <th>Mata Pelajaran</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach($mapel as $mapel){
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                <td>{{ $mapel->mapel }}</td>
                                                <td class="text-center">
                                                    <div class="flex align-items-center list-user-action">
                                                        @can('mapel_update')
                                                            <a href="{{ url('/mapel/edit/' . base64_encode($mapel->id)) }}"
                                                                class="btn btn-sm btn-info" data-bs-placement="bottom"
                                                                data-bs-toggle="tooltip" title="Edit">
                                                                <i class="fe fe-edit"></i>
                                                            </a>
                                                        @endcan
                                                        @can('mapel_delete')
                                                            <a href="{{ url('/mapel/delete/' . base64_encode($mapel->id)) }}"
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
    </script>

</body>

</html>
