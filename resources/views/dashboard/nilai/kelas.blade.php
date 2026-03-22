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
                            NILAI Kelas {{ $kelas->nama_kelas }}
                        </span>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- row  -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
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

                                <div class="row row-sm">
                                    @foreach ($murid as $m)
                                        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                                            <a href="{{ url('/nilai/murid/' . $m->id) }}"
                                                style="text-decoration: none;">
                                                <div class="card bg-primary-gradient text-white shadow-sm hover-shadow">

                                                    <div class="card-body">
                                                        <div class="row">

                                                            {{-- ICON --}}
                                                            <div class="col-6">
                                                                <div class="icon1 mt-2 text-center">
                                                                    <i class="fe fe-users tx-40"></i>
                                                                </div>
                                                            </div>

                                                            {{-- INFO --}}
                                                            <div class="col-6">
                                                                <div class="mt-0 text-center">
                                                                    <h4 class="text-white mb-0">
                                                                        {{ $m->nama }}
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </a>
                                    @endforeach

                                </div>

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

</body>

</html>
