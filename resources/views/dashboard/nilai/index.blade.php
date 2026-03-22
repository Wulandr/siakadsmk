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
                            NILAI
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

                                    @php
                                        $colors = ['primary', 'danger', 'success', 'warning', 'info', 'secondary'];
                                        $icons = ['fe-users', 'fe-book', 'fe-home', 'fe-layers', 'fe-grid', 'fe-award'];
                                    @endphp

                                    @foreach ($kelas as $i => $k)
                                        <div class="col-lg-6 col-xl-3 col-md-6 col-12">

                                            <a href="{{ url('/nilai/kelas/' . $k->id) }}"
                                                style="text-decoration: none;">
                                                <div
                                                    class="card bg-{{ $colors[$i % count($colors)] }}-gradient text-white shadow-sm hover-shadow">

                                                    <div class="card-body">
                                                        <div class="row">

                                                            {{-- ICON --}}
                                                            <div class="col-6">
                                                                <div class="icon1 mt-2 text-center">
                                                                    <i
                                                                        class="fe {{ $icons[$i % count($icons)] }} tx-40"></i>
                                                                </div>
                                                            </div>

                                                            {{-- INFO --}}
                                                            <div class="col-6">
                                                                <div class="mt-0 text-center">
                                                                    <h2 class="text-white mb-0"> {{ $k->nama_kelas }}
                                                                    </h2>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </a>

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
