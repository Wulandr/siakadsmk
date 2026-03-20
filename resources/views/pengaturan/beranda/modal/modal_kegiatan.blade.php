{{-- MODAL Judul --}}
<div class="modal fade" id="contoh_kegiatan" aria-hidden="true" aria-labelledby="modal_kegiatanLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content text-center">
            <div class="modal-header pd-20">
                <h6 class="modal-title">Contoh Tampilan Judul + Isi Kegiatan</h6><button aria-label="Close" class="close"
                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body p-0">
                <img src="{{ asset('gambar_contoh/2.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<form action="{{ url('/beranda/edit/kegiatan') }}" method="POST">
    @csrf
    <div class="modal fade" id="modal_kegiatan" aria-hidden="true" aria-labelledby="modal_kegiatanLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pd-20">
                    <h6 class="modal-title">Judul</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ql-wrapper ql-wrapper-modal ht-250">
                        <textarea class="summernote form-control" type="text" id="judul_kegiatan" name="judul_kegiatan" required>
                            {{ strip_tags($isi->judul_kegiatan) }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary" data-bs-target="#modal_kegiatan2" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Next
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Isi --}}
    <div class="modal fade" id="modal_kegiatan2" aria-hidden="true" aria-labelledby="modal_kegiatanLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pd-20">
                    <h6 class="modal-title">Konten</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ql-wrapper ql-wrapper-modal ht-250">
                        <textarea class="summernote form-control" type="text" id="about_kegiatan" name="about_kegiatan" required>
                            {{ strip_tags($isi->about_kegiatan) }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary" data-bs-target="#modal_kegiatan" data-bs-toggle="modal"
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
