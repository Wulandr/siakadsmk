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
                                <h4 class="card-title">UPDATE ROLE</h4>
                            </div>
                            <div class="card-body pt-0 example1-table">
                                <form method="POST" action="{{route('roles.update',['role'=>$role])}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row ml-3">
                                        <div class="form-group">
                                            <h6> <label for="name">Nama Aktor</label></h6>
                                            <input type="text" id="name" name="name" value="{{old('name',$role->name)}}" class="form-control @error('name') is-invalid @enderror" />
                                            @error('name')
                                            <span>
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php $m = 1; ?>
                                        @foreach($authorities as $manageName => $permissions)
                                        <div class="col lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6> {{$manageName}}</h6>
                                                    <p class="card-text">

                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" onchange="checkAll(this,<?php echo $m ?>)" name="chk[]">
                                                        <label class="form-check-label">
                                                            Select All
                                                        </label>
                                                    </div>

                                                    @foreach($permissions as $p)
                                                    <div class="form-check">
                                                        @if(old('permissions',$permissionChecked))
                                                        <input id="{{$p}}" name="permissions[]" class="form-check-input {{$m}}" type="checkbox" value="{{$p}}" {{in_array($p,old('permissions',$permissionChecked)) ? "checked" : null}}>
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
                                        <!-- <a href="" class="btn btn-icon icon-left btn-primary"><i class="fa fa-sync-alt"></i> Save</a> -->
                                    </div>
                                    <br />
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
    {{-- script --}}
    @include('layouts.script')
    {{-- /script --}}

</body>

</html>