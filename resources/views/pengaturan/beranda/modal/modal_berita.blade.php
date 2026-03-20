{{-- MODAL Judul --}}
<div class="modal fade" id="contoh_berita" aria-hidden="true" aria-labelledby="modal_beritaLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content text-center">
            <div class="modal-header pd-20">
                <h6 class="modal-title">Contoh Tampilan Judul + Isi Berita</h6><button aria-label="Close" class="close"
                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body p-0">
                <img src="{{ asset('gambar_contoh/4.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<form action="{{ url('/beranda/edit/berita') }}" method="POST">
    @csrf
    <div class="modal fade" id="modal_berita" aria-hidden="true" aria-labelledby="modal_beritaLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pd-20">
                    <h6 class="modal-title">Judul</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ql-wrapper ql-wrapper-modal ht-250">
                        <textarea class="summernote form-control" type="text" id="judul_berita" name="judul_berita" required>
                            {{ strip_tags($isi->judul_berita) }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary" data-bs-target="#modal_berita2" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Next
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Isi --}}
    <div class="modal fade" id="modal_berita2" aria-hidden="true" aria-labelledby="modal_beritaLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pd-20">
                    <h6 class="modal-title">Konten</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ql-wrapper ql-wrapper-modal ht-250">
                        <textarea class="summernote form-control" type="text" id="about_berita" name="about_berita" required>
                            {{ strip_tags($isi->about_berita) }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary" data-bs-target="#modal_berita" data-bs-toggle="modal"
                        data-bs-dismiss="modal">
                        Back
                    </a>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--End Large Modal -->
