{{-- MODAL Judul --}}
<div class="modal fade" id="contoh_beranda" aria-hidden="true" aria-labelledby="modal_berandaLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content text-center">
            <div class="modal-header pd-20">
                <h6 class="modal-title">Contoh Tampilan Judul + Isi Beranda</h6><button aria-label="Close" class="close"
                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body p-0">
                <img src="{{ asset('gambar_contoh/1.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<form action="{{ url('beranda/edit/beranda') }}" method="POST">
    @csrf
    <div class="modal fade" id="modal_beranda" aria-hidden="true" aria-labelledby="modal_berandaLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pd-20">
                    <h6 class="modal-title">Judul</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ql-wrapper ql-wrapper-modal ht-250">
                        <textarea class="summernote form-control" type="text" id="judul_beranda" name="judul_beranda" required>
                            {{ strip_tags($isi->judul_beranda) }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button href="" class="btn btn-primary" data-bs-target="#modal_beranda2"
                        data-bs-toggle="modal" data-bs-dismiss="modal">Next
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Isi --}}
    <div class="modal fade" id="modal_beranda2" aria-hidden="true" aria-labelledby="modal_berandaLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pd-20">
                    <h6 class="modal-title">Konten</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ql-wrapper ql-wrapper-modal ht-250">
                        <textarea class="summernote form-control" type="text" id="about_beranda" name="about_beranda" required>
                            {{ strip_tags($isi->about_beranda) }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#modal_beranda" data-bs-toggle="modal"
                        data-bs-dismiss="modal">
                        Back
                    </button>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--End Large Modal -->
