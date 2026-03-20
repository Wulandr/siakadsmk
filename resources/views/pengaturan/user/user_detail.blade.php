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
                        <!-- <span class="main-content-title mg-b-0 mg-b-lg-1">MITRA</span> -->
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">MITRA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Berita</li> -->
                        </ol>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- row  -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DETAIL USER</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-start">
                                    <div class="container ml-3">
                                        <h5>Nama : {{$user->name}} <br /> Role : {{$role->name}}</h5> <br />
                                    </div>
                                </div>
                                <div class="row align-items-start">
                                    @foreach($authorities as $manageName => $permissions)
                                    <div class="col">
                                        <div class="card h-120">
                                            <div class="card-body">
                                                <h5 class="card-title"> {{$manageName}}</h5>
                                                <p class="card-text">
                                                    @foreach($permissions as $p)
                                                <div class="form-check">
                                                    <input id="{{$p}}" class="form-check-input" type="checkbox" value="{{$p}}" onclick="return false;" {{in_array($p,$permissionChecked) ? 'checked':null }} id="flexCheckChecked">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        {{trans("permissions.{$p}")}}
                                                    </label>
                                                </div>
                                                @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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