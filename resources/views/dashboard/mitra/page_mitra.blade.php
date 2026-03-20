@include('landing.layouts.header')
{{-- header --}}
@include('layouts.header')
{{-- /header --}}

<section class="page">
    <!-- ***** Page Top Start ***** -->
    <div class="cover" data-image="assets/images/photos/parallax.jpg">
        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>{{ $mitra->nama_mitra }}</h1>
                    </div>
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li><a href="home.html">Home</a></li>
                            <li class="">List Mitra</li>
                            <li class="active">{{ $mitra->nama_mitra }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Page Top End ***** -->

    <!-- container -->
    <div class="main-container container-fluid">

        <!-- row -->
        <div class="row row-sm mt-4 mx-5">
            <div class="col-sm-12 col-md-12">
                <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                <div class="main-content-body main-content-body-contacts card custom-card">
                    <div class="main-contact-info-header pt-3">
                        <div class="media">
                            <div class="main-img-user">
                                @if(!empty($mitra->logo))
                                <img src="{{ asset('logomitra/'.$mitra->logo) }}" alt="">
                                @else
                                <img src="{{ asset('logomitra/company.jpeg') }}" alt="">
                                @endif
                            </div>
                            <div class="media-body">
                                <h5>{{ $mitra->nama_mitra }}</h5>
                                <p>{{ ucwords(strtolower($mitra->get_dis->nama . ', ' . $mitra->get_dis->get_kota->nama . ', ' . $mitra->get_dis->get_kota->get_prov->nama)) }}
                                </p>
                                <nav class="contact-info">
                                    <a href="https://wa.me/{{ $mitra->whatsapp }}" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="Whatsapp"><i class="fe fe-message-circle"></i></a>
                                    <a href="https://{{ $mitra->telepon }}" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="Call"><i class="fe fe-phone"></i></a>
                                    <a href="https://{{ $mitra->email }}" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="Email"><i class="fe fe-at-sign"></i></a>
                                    <a href="https://{{ $mitra->facebook }}" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="Facebook"><i class="fe fe-facebook"></i></a>
                                    <a href="https://{{ $mitra->instagram }}" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="Instagram"><i class="fe fe-instagram"></i></a>
                                    <a href="https://{{ $mitra->shopee }}" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="Shoppe"><i class="fe fe-shopping-bag"></i></a>
                                    <a href="https://{{ $mitra->tokopedia }}" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="Tokopedia"><i class="fe fe-shopping-bag"></i></a>
                                </nav>
                            </div>
                        </div>
                        <div class="main-contact-action btn-list pt-3 pe-0 me-3">
                            <a href="javascript:void(0);" class="btn ripple btn-info text-white btn-icon" data-placement="top" data-bs-toggle="tooltip" title="Share"><i class="fe fe-share-2"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card productdesc">
                            <div class="card-body">
                                <div class="panel panel-primary">
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs">
                                                <li><a href="#tab5" class="{{$active=='Profil' ? 'active':''}}" data-bs-toggle="tab">Profil</a>
                                                </li>
                                                <li><a href="#tab6" class="{{$active=='Produk' ? 'active':''}}" data-bs-toggle="tab">Produk</a></li>
                                                <li><a href="#tab7" class="{{$active=='Kegiatan' ? 'active':''}}" data-bs-toggle="tab">Kegiatan</a></li>
                                                <li><a href="#tab8" class="{{$active=='Berita' ? 'active':''}}" data-bs-toggle="tab">Berita</a></li>
                                                <li><a href="#tab9" class="{{$active=='Pendampingan' ? 'active':''}}" data-bs-toggle="tab">Pendampingan</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body">
                                        <div class="tab-content">

                                            {{-- Profil Mitra --}}
                                            <div class="tab-pane {{$active=='Profil' ? 'active':''}}" id="tab5">
                                                <h5 class="mb-2 mt-1 fw-semibold">Tentang Mitra :</h5>
                                                <style>
                                                    p {
                                                        text-align: justify;
                                                        text-justify: inter-word;
                                                        font-family: 'Poppins' !important;
                                                    }
                                                </style>
                                                <p class="mb-3 tx-13">
                                                    {!! strip_tags($mitra->deskripsi) !!}
                                                </p>
                                                <h5 class="mb-2 mt-3 fw-semibold">Profil :</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="fw-semibold">Nama Mitra</td>
                                                            <td><strong>{{ $mitra->nama_mitra }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">Jenis Mitra</td>
                                                            <td>{{ $mitra->get_jenisMitra->jenis }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">Nomor Telefon</td>
                                                            <td>{{ $mitra->telepon }}</td>
                                                        </tr>
                                                        <tr>
                                                        <tr>
                                                            <td class="fw-semibold">Email</td>
                                                            <td>{{ $mitra->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">Alamat</td>
                                                            <td>{{ $mitra->alamat . ', ' . ucwords(strtolower($mitra->get_dis->nama . ', ' . $mitra->get_dis->get_kota->nama . ', ' . $mitra->get_dis->get_kota->get_prov->nama)) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">Latitude</td>
                                                            <td>{{ $mitra->latitude }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">Longitude</td>
                                                            <td>{{ $mitra->longitude }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">Lokasi Map</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div id="mapid"></div>
                                                </div>
                                            </div>

                                            {{-- Produk Mitra --}}
                                            <div class="tab-pane {{$active=='Produk' ? 'active':''}}" id="tab6">
                                                <div class="page" style="background: #f9fcfb">
                                                    <div class="mt-3 mx-3">
                                                        <!-- row -->
                                                        <div class="row row-sm">
                                                            <div class="col-xl-3 col-lg-4 col-md-12 mb-3 mb-md-0">
                                                                <div class="card">
                                                                    <div class="card-body p-2">
                                                                        <form method="get" action="{{route('produksearch')}}">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" name="produk_search" id="produk_search" value="{{ !empty($produk_search) ? $produk_search:'' }}" placeholder="Search ...">
                                                                                <input type="hidden" value="{{ $mitra->nama_mitra }}" name="nama_mitra">
                                                                                <span class="input-group-append">
                                                                                    <button class="btn btn-primary" type="submit">Search</button>
                                                                                </span>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercaser">
                                                                        <h3 class="card-title">
                                                                            Filter Kategori
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body pb-0">
                                                                        <form method="GET" action="{{ url('/list-mitra/kategori-produk/'.base64_encode($id).'/'.$slug) }}">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label class="form-label">Kategori</label>
                                                                                <select name="kategori" id="select-beast" class="form-control  nice-select  custom-select">
                                                                                    <option value="0">
                                                                                        --Select--
                                                                                    </option>
                                                                                    @foreach ($kategori as $category)
                                                                                    @if($category->jenis == "Produk")
                                                                                    <option value="{{ $category->nama }}" {{$reqKategoriProduk==$category->nama ? 'selected' : ''}}>{{ $category->nama }} </option>
                                                                                    @endif
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <button class="btn ripple btn-primary" type="submit">Cari</button>
                                                                        </form>
                                                                        <!-- <div class="form-group mt-2">
                                                                            <label class="form-label">Women</label>
                                                                            <select name="beast" id="select-beast1" class="form-control  nice-select  custom-select">
                                                                                <option value="0">
                                                                                    --Select--
                                                                                </option>
                                                                                <option value="1">Western
                                                                                    wear
                                                                                </option>
                                                                                <option value="2">Foot
                                                                                    wear
                                                                                </option>
                                                                                <option value="3">Top wear
                                                                                </option>
                                                                                <option value="4">Bootom
                                                                                    wear
                                                                                </option>
                                                                                <option value="5">Beuty
                                                                                    Groming
                                                                                </option>
                                                                                <option value="6">
                                                                                    Accessories
                                                                                </option>
                                                                                <option value="7">
                                                                                    jewellery
                                                                                </option>
                                                                            </select>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-9 col-lg-8 col-md-12">
                                                                <div class="row">
                                                                    @foreach ($produk as $value)
                                                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3  col-sm-6">
                                                                        <div class="card">
                                                                            <div class="card-body h-100  product-grid6">
                                                                                <div class="pro-img-box product-image">
                                                                                    <a href="product-details.html">
                                                                                        @foreach ($value->get_dokumen as $data)
                                                                                        <?php if ($value->thumbnail != null) {
                                                                                            if ($value->thumbnail == $data->id) { ?>
                                                                                                <img class=" pic-1" src="{{ asset('/dokumen/produk/' . $data->nama) }}" alt="product-image">
                                                                                            <?php }
                                                                                        } else { ?>
                                                                                            <img class=" pic-1" src="{{ asset('/dokumen/produk/' . $data->nama) }}" alt="product-image">
                                                                                        <?php } ?>
                                                                                        @endforeach
                                                                                    </a>
                                                                                    <ul class="icons">
                                                                                        <li><a href="{{ url('/products/' . base64_encode($value->id)) . '/' . $value->nama_produk }}" class="info-gradient" data-bs-placement="top" data-bs-toggle="tooltip" title="Quick View"><i class="fas fa-eye"></i></a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="text-center pt-2">
                                                                                    <h3 class="h6 mb-2 mt-2 font-weight-bold">
                                                                                        {{ $value->nama_produk }}
                                                                                    </h3>
                                                                                    <h5 class="h6 mb-2 mt-2">{{ $value->kategori->nama }}</h5>
                                                                                    <span class="text-warning font-weight-normal tx-13 ms-1">
                                                                                        {{ 'Rp ' . number_format($value->harga, 2, ',', '.') }}
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>

                                                                <ul class="pagination product-pagination ms-auto float-end">
                                                                    {!! $produk->onEachSide(1)->links() !!}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Kegiatan Mitra --}}
                                            <div class="tab-pane {{$active=='Kegiatan' ? 'active':''}}" id="tab7">
                                                <div class="page" style="background: #f9fcfb">
                                                    <div class="mt-3 mx-3">
                                                        <!-- row -->
                                                        <div class="row row-sm">
                                                            <div class="col-xl-3 col-lg-4 col-md-12 mb-3 mb-md-0">
                                                                <div class="card">
                                                                    <div class="card-body p-2">
                                                                        <form method="get" action="{{route('kegiatansearch')}}">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" value="{{ !empty($kegiatansearch) ? $kegiatansearch:'' }}" name="kegiatan_search" id="kegiatan_search" placeholder="Search ...">
                                                                                <input type="hidden" value="{{ $mitra->nama_mitra }}" name="nama_mitra">
                                                                                <span class="input-group-append">
                                                                                    <button class="btn btn-primary" type="submit">Search</button>
                                                                                </span>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">
                                                                        <h3 class="card-title">
                                                                            Filter Kategori
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body pb-0">
                                                                        <form method="GET" action="{{ url('/list-mitra/kategori-kegiatan/'.base64_encode($id).'/'.$slug) }}">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label class="form-label">Kategori</label>
                                                                                <select name="kategori" id="select-beast" class="form-control  nice-select  custom-select">
                                                                                    <option value="0">
                                                                                        --Select--
                                                                                    </option>
                                                                                    @foreach ($kategori as $category)
                                                                                    @if($category->jenis == "Kegiatan")
                                                                                    <option value="{{ $category->nama }}" {{$reqKategoriKegiatan==$category->nama ? 'selected' : ''}}>{{ $category->nama }} </option>
                                                                                    @endif
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <button class="btn ripple btn-primary" type="submit">Cari</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-9 col-lg-8 col-md-12">
                                                                <div class="card custom-card mb-2">
                                                                    <div class="card-header">
                                                                        <div class="card-title tx-17">
                                                                            Kegiatan Mitra {{ $mitra->nama_mitra }}
                                                                        </div>
                                                                        <p>
                                                                            Berikut dipaparkan beberapa kegiatan
                                                                            yang dimiliki oleh mitra
                                                                            {{ $mitra->nama_mitra }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    @foreach ($kegiatan as $data)
                                                                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="d-flex">
                                                                                            <div class="settings-main-icon me-4 mt-1">
                                                                                                <i class="fe fe-home"></i>
                                                                                            </div>
                                                                                            <div>
                                                                                                <p class="tx-15 font-weight-semibold d-flex mb-0">
                                                                                                    {{ $data->judul }}
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer p-3">
                                                                                <span class="tx-14 mb-0">
                                                                                    {{ date('d M, Y', strtotime($data->created_at)) }}
                                                                                </span>
                                                                                <a href="{{url('/activities/' . base64_encode($data->id)) . '/' . $data->judul }}" class="tx-14 mb-0 float-end">
                                                                                    Read more...
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                                <ul class="pagination product-pagination ms-auto float-end">
                                                                    {!! $kegiatan->onEachSide(1)->links() !!}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Berita Mitra --}}
                                            <div class="tab-pane {{$active=='Berita' ? 'active':''}}" id="tab8">
                                                <div class="page" style="background: #f9fcfb">
                                                    <div class="mt-3 mx-3">
                                                        <!-- row -->
                                                        <div class="row row-sm">
                                                            <div class="col-xl-3 col-lg-4 col-md-12 mb-3 mb-md-0">
                                                                <div class="card">
                                                                    <div class="card-body p-2">
                                                                        <form method="get" action="{{route('beritasearch')}}">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" name="berita_search" id="berita_search" value="{{ !empty($beritasearch) ? $beritasearch:'' }}" placeholder="Search ...">
                                                                                <input type="hidden" value="{{ $mitra->nama_mitra }}" name="nama_mitra">
                                                                                <span class="input-group-append">
                                                                                    <button class="btn btn-primary" type="submit">Search</button>
                                                                                </span>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">
                                                                        <h3 class="card-title">
                                                                            Filter Kategori
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body pb-0">
                                                                        <div class="form-group">
                                                                            <form method="GET" action="{{ url('/list-mitra/kategori-berita/'.base64_encode($id).'/'.$slug) }}">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Kategori</label>
                                                                                    <select name="kategori" id="select-beast" class="form-control  nice-select  custom-select">
                                                                                        <option value="0">
                                                                                            --Select--
                                                                                        </option>
                                                                                        @foreach ($kategori as $category)
                                                                                        @if($category->jenis == "Berita")
                                                                                        <option value="{{ $category->nama }}" {{$reqKategoriBerita==$category->nama ? 'selected' : ''}}>{{ $category->nama }} </option>
                                                                                        @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <button class="btn ripple btn-primary" type="submit">Cari</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-9 col-lg-8 col-md-12">
                                                                <div class="card custom-card mb-2">
                                                                    <div class="card-header">
                                                                        <div class="card-title tx-17">
                                                                            Berita Mitra {{ $mitra->nama_mitra }}
                                                                        </div>
                                                                        <p>
                                                                            Berikut dipaparkan beberapa berita
                                                                            yang diunggah oleh mitra
                                                                            {{ $mitra->nama_mitra }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    @foreach ($berita as $news)
                                                                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="d-flex">
                                                                                            <div class="settings-main-icon me-4 mt-1">
                                                                                                <i class="fe fe-home"></i>
                                                                                            </div>
                                                                                            <div>
                                                                                                <p class="tx-15 font-weight-semibold d-flex mb-0">
                                                                                                    {{ $news->judul }}
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer p-3">
                                                                                <span class="tx-14 mb-0">
                                                                                    {{ date('d M, Y', strtotime($news->created_at)) }}
                                                                                </span>
                                                                                <a href="{{url('/news/' . base64_encode($news->id)) . '/' . $news->judul }}" class="tx-14 mb-0 float-end">
                                                                                    Read more...
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                                <ul class="pagination product-pagination ms-auto float-end">
                                                                    {!! $berita->onEachSide(1)->links() !!}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Pendampingan Mitra --}}
                                            <div class="tab-pane {{$active=='Pendampingan' ? 'active':''}}" id="tab9">
                                                <div class="page" style="background: #f9fcfb">
                                                    <div class="mt-3 mx-3">
                                                        <!-- row -->
                                                        <div class="row row-sm">
                                                            <div class="col-xl-3 col-lg-4 col-md-12 mb-3 mb-md-0">
                                                                <div class="card">
                                                                    <div class="card-body p-2">
                                                                        <form method="get" action="{{route('pendampingansearch')}}">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" name="pendampingan_search" id="pendampingan_search" value="{{ !empty($pendampingansearch) ? $pendampingansearch:'' }}" placeholder="Search ...">
                                                                                <input type="hidden" value="{{ $mitra->nama_mitra }}" name="nama_mitra">
                                                                                <span class="input-group-append">
                                                                                    <button class="btn btn-primary" type="submit">Search</button>
                                                                                </span>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="card">
                                                                    <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">
                                                                        <h3 class="card-title">
                                                                            Filter Kategori
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body pb-0">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Mens</label>
                                                                            <select name="beast" id="select-beast" class="form-control  nice-select  custom-select">
                                                                                <option value="0">
                                                                                    --Select--
                                                                                </option>
                                                                                <option value="1">Foot
                                                                                    wear
                                                                                </option>
                                                                                <option value="2">Top wear
                                                                                </option>
                                                                                <option value="3">Bootom
                                                                                    wear
                                                                                </option>
                                                                                <option value="4">Men's
                                                                                    Groming
                                                                                </option>
                                                                                <option value="5">
                                                                                    Accessories
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label">Women</label>
                                                                            <select name="beast" id="select-beast1" class="form-control  nice-select  custom-select">
                                                                                <option value="0">
                                                                                    --Select--
                                                                                </option>
                                                                                <option value="1">Western
                                                                                    wear
                                                                                </option>
                                                                                <option value="2">Foot
                                                                                    wear
                                                                                </option>
                                                                                <option value="3">Top wear
                                                                                </option>
                                                                                <option value="4">Bootom
                                                                                    wear
                                                                                </option>
                                                                                <option value="5">Beuty
                                                                                    Groming
                                                                                </option>
                                                                                <option value="6">
                                                                                    Accessories
                                                                                </option>
                                                                                <option value="7">
                                                                                    jewellery
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                            <div class="col-xl-9 col-lg-8 col-md-12">
                                                                <div class="card custom-card mb-2">
                                                                    <div class="card-header">
                                                                        <div class="card-title tx-17">
                                                                            Pendampingan Mitra {{ $mitra->nama_mitra }}
                                                                        </div>
                                                                        <p>
                                                                            Berikut dipaparkan beberapa berita
                                                                            yang diunggah oleh mitra
                                                                            {{ $mitra->nama_mitra }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    @foreach ($pendampingan as $p)
                                                                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="d-flex">
                                                                                            <div class="settings-main-icon me-4 mt-1">
                                                                                                <i class="fe fe-home"></i>
                                                                                            </div>
                                                                                            <div>
                                                                                                <p class="tx-15 font-weight-semibold d-flex mb-0">
                                                                                                    {{ $p->judul }}
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer p-3">
                                                                                <span class="tx-14 mb-0">
                                                                                    {!! date('d M, Y', strtotime($p->created_at)) !!}
                                                                                </span>
                                                                                <a href="javascript:void(0);" class="tx-14 mb-0 float-end">
                                                                                    Read more...
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                                <ul class="pagination product-pagination ms-auto float-end">
                                                                    {!! $pendampingan->onEachSide(1)->links() !!}
                                                                </ul>
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
                </div>
            </div>
        </div>
        <!-- /row -->

    </div>
    <!-- Container closed -->

</section>


@include('landing.layouts.footer')
{{-- script --}}
@include('layouts.script')
{{-- /script --}}

<!-- fullscreen -->
<link rel="stylesheet" href="https://cdn.statically.io/gh/brunob/leaflet.fullscreen/b920f36f/Control.FullScreen.css">
<script src="https://cdn.statically.io/gh/brunob/leaflet.fullscreen/b920f36f/Control.FullScreen.js"></script>
<!-- export -->
<link rel="stylesheet" href="https://cdn.statically.io/gh/pasichnykvasyl/Leaflet.BigImage/b9223853/dist/Leaflet.BigImage.min.css">
<script src="https://cdn.statically.io/gh/pasichnykvasyl/Leaflet.BigImage/b9223853/dist/Leaflet.BigImage.min.js">
</script>
<!-- layer -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin="" />

<script>
    let map, markers = [];
    /* ----------------------------- Initialize Map ----------------------------- */
    function initMap() {
        map = L.map('mapid', {
            center: {
                lat: <?= $mitra->latitude ?>,
                lng: <?= $mitra->longitude ?>,
            },
            zoom: 15
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var marker = L.marker([<?= $mitra->latitude ?>, <?= $mitra->longitude ?>]).addTo(map);
        marker.bindPopup("<?= $mitra->nama_mitra ?>").openPopup();
        var popup = L.popup();
    }
    initMap();
</script>