{{-- MODAL Judul --}}
<div class="modal fade" id="contoh_mitra" aria-hidden="true" aria-labelledby="modal_mitraLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content text-center">
            <div class="modal-header pd-20">
                <h6 class="modal-title">Contoh Tampilan Judul + Isi Mitra</h6><button aria-label="Close" class="close"
                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body p-0">
                <img src="{{ asset('gambar_contoh/3.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<form action="{{ url('/beranda/edit/mitra') }}" method="POST">
    @csrf
    <div class="modal fade" id="modal_mitra" aria-hidden="true" aria-labelledby="modal_mitraLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pd-20">
                    <h6 class="modal-title">Judul</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ql-wrapper ql-wrapper-modal ht-250">
                        <textarea class="summernote form-control" type="text" id="judul_mitra" name="judul_mitra" required>
                            {{ strip_tags($isi->judul_mitra) }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary" data-bs-target="#modal_mitra2" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Next
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Isi --}}
    <div class="modal fade" id="modal_mitra2" aria-hidden="true" aria-labelledby="modal_mitraLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pd-20">
                    <h6 class="modal-title">Konten</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ql-wrapper ql-wrapper-modal ht-250">
                        <textarea class="summernote form-control" type="text" id="about_mitra" name="about_mitra" required>
                            {{ strip_tags($isi->about_mitra) }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary" data-bs-target="#modal_mitra" data-bs-toggle="modal"
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
