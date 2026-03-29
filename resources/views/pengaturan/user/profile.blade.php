<?php

use Illuminate\Support\Facades\Auth;
?>
{{-- header --}}
@include('layouts.header')
{{-- /header --}}

<body class="ltr main-body app sidebar-mini">
    <!-- Loader -->
    {{-- <div id="global-loader">
        <img src="{{ asset('nowa/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div> --}}
    <!-- /Loader -->
    <div class="page">
        <div>
            @include('layouts/main-header')
            @include('layouts/main-sidebar')
        </div>

        <!-- Page Content  -->
        <div id="content-page" class="main-content app-content">
            <div class="main-container container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <span class="main-content-title mg-b-0 mg-b-lg-1">PROFILE</span>
                    </div>
                    <div class="justify-content-center mt-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body d-md-flex">
                                <div class="">
                                    <span class="profile-image pos-relative">
                                        @if (!empty(Auth::user()->image))
                                            <img class="br-5" alt=""
                                                src="{{ asset('imageprofil/' . Auth::user()->image) }}">
                                        @else
                                            <img class="br-5" alt="" src="{{ asset('imageprofil/11.png') }}">
                                        @endif
                                        <span
                                            class="bg-success text-white wd-1 ht-1 rounded-pill profile-online"></span>
                                    </span>
                                </div>
                                <div class="my-md-auto mt-4 prof-details">
                                    <h4 class="font-weight-semibold ms-md-4 ms-0 mb-1 pb-0">{{ Auth::user()->name }}
                                    </h4>
                                    <p class="tx-13 text-muted ms-md-4 ms-0 mb-2 pb-2 ">
                                        {{ Auth::user()->getroleNames() }}
                                    </p>

                                    <p class="text-muted ms-md-4 ms-0 mb-2"><span><i
                                                class="fa fa-envelope me-2"></i></span><span
                                            class="font-weight-semibold me-2">Email:</span><span>{{ Auth::user()->email }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer py-0">
                                <div class="profile-tab tab-menu-heading border-bottom-0">
                                    <nav class="nav main-nav-line p-0 tabs-menu profile-nav-line border-0 br-5 mb-0	">
                                        <a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#about">About</a>
                                        <a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#edit">Edit
                                            Profile</a>
                                        <a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#editpassword">Edit
                                            Password</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="custom-card main-content-body-profile">
                            <div class="tab-content">
                                <div class="main-content-body tab-pane border-top-0" id="about">
                                    <div class="card">
                                        <div class="card-body border-0">
                                            @include('pengaturan/user/profile_about')
                                        </div>
                                    </div>
                                </div>
                                <!-- EDIT PASSWROD -->
                                <div class="main-content-body tab-pane border-top-0" id="editpassword">
                                    <div class="card">
                                        <div class="card-body border-0">
                                            <form class="form-horizontal" method="post"
                                                action="{{ route('profil.changepassword', ['id' => Auth::user()->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class=" row align-items-center mb-5">
                                                    <div class="form-group col-sm-6">
                                                        <label for="fname" class="form-label">Password:</label>
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" value="{{ old('password') }}">
                                                    </div>
                                                    <input type="hidden" id="id" value="{{ Auth::user()->id }}">
                                                    <div class="col">
                                                        <button type="submit"
                                                            class="btn btn-primary ml-3">Submit</button>
                                                    </div>
                                                </div>

                                                <br />
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- EDIT PROFIL -->
                                <div class="main-content-body tab-pane border-top-0" id="edit">
                                    <div class="card">
                                        <div class="card-body border-0">
                                            <form class="form-horizontal" method="post"
                                                action="{{ route('profil.update', ['id' => Auth::user()->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12 ml-3">
                                                        <div clascs="row mb-4">
                                                            <?php if (!empty(Auth::user()->image) || (Auth::user()->image) != NULL) { ?>
                                                            <!-- <div class="col ml-5">
                                                                    <span class="profile-image pos-relative">
                                                                        <img class="br-5" alt="" src="{{ asset('imageprofil/' . Auth::user()->image) }}">
                                                                    </span>
                                                                </div> -->
                                                            <div class="col-sm-12 col-md-4"> <br />
                                                                <br />
                                                                <input name="file" id="file" type="file"
                                                                    class="dropify" data-height="200" />
                                                            </div>
                                                            <?php } ?>
                                                            <?php if (empty(Auth::user()->image) || (Auth::user()->image) == NULL) { ?>
                                                            <div class="col-sm-12 col-md-4 ">
                                                                <input type="file" name="file" id="file"
                                                                    class="dropify" data-height="200" />
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" row align-items-center mb-5">
                                                    @error('file')
                                                        <div class="alert text-white bg-success" role="alert">
                                                            <div class="iq-alert-icon">
                                                                <i class="ri-alert-line"></i>
                                                            </div>
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Tolong tambahkan file sebelum submit!
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6 ml-3">
                                                        <label for="fname" class="form-label">Nama:</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name"
                                                            value="{{ old('name', Auth::user()->name) }}">
                                                    </div>
                                                    <!-- <div class="form-group col-sm-6">
                                                        <label for="fname" class="form-label">Password:</label>
                                                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                                                    </div> -->
                                                    <div class="form-group col-sm-6">
                                                        <label for="cname" class="form-label">Email:</label>
                                                        <input type="text" class="form-control" id="email"
                                                            name="email"
                                                            value="{{ old('email', Auth::user()->email) }}">
                                                    </div>
                                                    <input type="hidden" id="id"
                                                        value="{{ Auth::user()->id }}">
                                                    <div class="col">
                                                        <button type="submit"
                                                            class="btn btn-primary ml-3">Submit</button>
                                                    </div>
                                                    <!-- <button type="reset" class="btn iq-bg-danger">Cancel</button> -->
                                                </div>

                                                <br />
                                            </form>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Footer opened -->
            @include('layouts.footer')
            <!-- Footer closed -->
        </div>
        <!-- Wrapper END -->
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 20000);
        </script>

        @include('layouts.script')
        {{-- /script --}}
</body>

</html>

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
