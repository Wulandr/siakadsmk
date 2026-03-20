@include('layouts.header')

<body class="ltr error-page1 bg-primary">

    <!-- Loader -->
    <div id="global-loader">
        <img src="../assets/img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <div class="square-box">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main mx-auto my-auto py-4 justify-content-center">
                        <div class="card-sigin">
                            <!-- Demo content-->
                            <div class="main-card-signin d-md-flex">
                                <div class="wd-100p">
                                    <div class="d-flex mb-4"><a href="index.html"><img src="../assets/img/brand/favicon.png" class="sign-favicon ht-40" alt="logo"></a></div>
                                    <div class="">
                                        <div class="main-signup-header">
                                            <h2>Welcome back!</h2>
                                            <h6 class="font-weight-semibold mb-4">Please create an account to continue.</h6>
                                            <div class="panel panel-primary">
                                                <div class="panel-body tabs-menu-body border-0 p-3">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab5">
                                                            <form method="POST" action="{{ route('register') }}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                                    @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                                    @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Password Confirm</label>
                                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Role</label>
                                                                    <select name="role" class="form-control form-select" data-bs-placeholder="Select Role">
                                                                        <option value="Mitra">Mitra</option>
                                                                    </select>
                                                                </div>

                                                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                                                            </form>
                                                            <!-- <div class="pt-3">
                                                                <a href="{{ route('google.login') }}" class="btn btn-info btn-block">
                                                                    <i class="bx bxl-google"></i>
                                                                    Register with Google
                                                                </a>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="main-signin-footer text-center mt-3">
                                                <!-- <p><a href="" class="mb-3">Forgot password?</a></p> -->
                                                <p>Have an account? <a href="{{route('login')}}">Login</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.script')