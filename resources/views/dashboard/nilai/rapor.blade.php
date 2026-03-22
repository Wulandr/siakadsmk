{{-- header --}}
@include('layouts.header')
{{-- /header --}}

<body class="ltr main-body app sidebar-mini">

    <div class="page">

        <div>
            @include('layouts.main-header')
            @include('layouts.main-sidebar')
        </div>

        <!-- main-content -->
        <div class="main-content app-content">

            <div class="main-container container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <span class="main-content-title">
                            RAPOR - {{ $murid->nama }}
                        </span>
                    </div>
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">
                                    Tahun Ajaran: {{ $thAjaran->kode ?? '-' }}
                                </h4>
                                <div>
                                    <button onclick="window.print()" class="btn btn-danger">
                                        <i class="fe fe-printer"></i> Print / Save PDF
                                    </button>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                        <i class="fe fe-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </div>


                            <div class="card-body pt-0 example1-table">

                                {{-- Alert --}}
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

                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap mb-0" id="mytable">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">No</th>
                                                <th>Mapel</th>
                                                <th>Nilai Akhir</th>
                                                <th>Predikat</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($rapor as $r)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $r->mapel->mapel ?? '-' }}</td>
                                                    <td><strong>{{ $r->nilai_akhir }}</strong></td>
                                                    <td>
                                                        <span class="badge bg-info">
                                                            {{ $r->predikat }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $r->deskripsi }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        Data rapor belum digenerate
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->

            </div>
        </div>
        <!-- /main-content -->

        @include('layouts.footer')
    </div>

    <a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>

    @include('layouts.script')

    <script>
        $(document).ready(function() {
            $('#mytable').DataTable({
                scrollX: true,
            });
        });
    </script>

</body>

</html>
