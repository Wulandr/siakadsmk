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
                        <span class="main-content-title mg-b-0 mg-b-lg-1">DASHBOARD</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Auth()->user()->name }}</li>
                        </ol>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- row -->
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-9 col-lg-7 col-md-6 col-sm-12">
                                                <div class="text-justified align-items-center">
                                                    <h3 class="text-dark font-weight-semibold mb-2 mt-0">Hi, Selamat
                                                        Datang <span
                                                            class="text-primary">{{ Auth()->user()->name }}</span></h3>
                                                    <p class="text-dark tx-14 mb-3 lh-3"> Anda Login Sebagai
                                                        {{ Auth()->user()->getroleNames() }}
                                                    </p>
                                                    <!-- <a href="{{ url('/') }}"><button class="btn btn-primary shadow">Landing Page</button></a> -->
                                                </div>
                                            </div>
                                            <div
                                                class="col-xl-3 col-lg-5 col-md-6 col-sm-12 d-flex align-items-center justify-content-center upgrade-chart-circle">
                                                <a href="{{ url('/') }}" class="btn btn-primary shadow">
                                                    Menuju Halaman Beranda >>>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- </div> -->
                </div>
                <!-- row closed -->


                <div class="row row-sm">
                    @can('role_create')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                            <div class="card sales-card circle-image1 card bg-primary-gradient text-white ">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="ps-4 pt-4 pe-3 pb-4">
                                            <div class="">
                                                <h6 class="mb-2 tx-14">Total Role</h6>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-20 font-weight-semibold mb-2">{{ $total_role }}
                                                    </h4>
                                                </div>
                                                <p class="mb-0 tx-12 text-muted">Role<i
                                                        class="fa fa-caret-up mx-2 text-success"></i>
                                                    <span class="text-success font-weight-semibold"> </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div
                                            class="circle-icon bg-primary-transparent text-center align-self-center overflow-hidden">
                                            <i class="fe fe-shopping-bag tx-16 text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan

                    @can('user_create')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                            <div class="card sales-card circle-image2 card bg-info-gradient text-white">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="ps-4 pt-4 pe-3 pb-4">
                                            <div class="">
                                                <h6 class="mb-2 tx-14">Total User</h6>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-20 font-weight-semibold mb-2">{{ $total_user }}
                                                    </h4>
                                                </div>
                                                <p class="mb-0 tx-12 text-muted">User<i
                                                        class="fa fa-caret-down mx-2 text-danger"></i>
                                                    <span class="font-weight-semibold text-danger"> </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div
                                            class="circle-icon bg-info-transparent text-center align-self-center overflow-hidden">
                                            <i class="fe fe-dollar-sign tx-16 text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan

                </div>

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
