@include('layouts.header')

<body class="ltr error-page1 bg-primary">

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
        <!-- Main-error-wrapper -->
        <div class="main-error-wrapper wrapper-1 page page-h">
            <h1 class="">501<span class="tx-20">error</span></h1>
            <h2 class="">Oopps. The page you were looking for doesn't exist.</h2>
            <h6 class="">You may have mistyped the address or the page may have moved.</h6><a
                class="btn btn-primary" href="{{ url('/home') }}">Back to Home</a>
        </div>
        <!-- /Main-error-wrapper -->

    </div>
    @include('layouts.script')

</body>

</html>
