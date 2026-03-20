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
                                <h4 class="card-title">TAMBAH ROLE</h4>
                            </div>
                            <div class="card-body pt-0 example1-table">
                                <form method="POST" action="{{url('/roles_store')}}">
                                    @csrf
                                    <div class="row align-items-start">
                                        <div class="row ml-5">
                                            <div class="form-group">
                                                <h6><label for="name">Nama Aktor</label></h4>
                                                    <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" />
                                                    @error('name')
                                                    <span>
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        function checkAll(ele, p) {
                                            // alert('form-check-input' + p);
                                            var checkboxes = document.getElementsByClassName('form-check-input ' + p);
                                            if (ele.checked) {
                                                for (var i = 0; i < checkboxes.length; i++) {
                                                    if (checkboxes[i].type == 'checkbox') {
                                                        checkboxes[i].checked = true;
                                                    }
                                                }
                                            } else {
                                                for (var i = 0; i < checkboxes.length; i++) {
                                                    if (checkboxes[i].type == 'checkbox') {
                                                        checkboxes[i].checked = false;
                                                    }
                                                }
                                            }
                                        }
                                    </script>

                                    <div class="row align-items-start">
                                        <?php $m = 1; ?>
                                        @foreach($authorities as $manageName => $permissions)
                                        <div class="col lg-4">
                                            <div class="card h-120">
                                                <div class="card-body">
                                                    <h6> {{$manageName}}</h5>
                                                        <p class="card-text">

                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" onchange="checkAll(this,<?php echo $m ?>)" name="chk[]">
                                                            <label class="form-check-label">
                                                                Select All
                                                            </label>
                                                        </div>

                                                        @foreach($permissions as $p)
                                                        <div class="form-check">
                                                            @if(old('permissions'))
                                                            <input id="{{$p}}" name="permissions[]" class="form-check-input {{$m}}" type="checkbox" value="{{$p}}" {{in_array($p,old('permissions')) ? "checked" : null}}>
                                                            @else
                                                            <input id="{{$p}}" name="permissions[]" class="form-check-input {{$m}}" type="checkbox" value="{{$p}}">
                                                            @endif
                                                            <label class="form-check-label" for="{{$p}}">
                                                                {{trans("permissions.{$p}")}}
                                                                <!-- {{$p}} -->
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                        </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $m += 1; ?>
                                        @endforeach
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </form>
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