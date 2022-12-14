<div class="d-flex mt-4">
    <h1 class=""><?= $data['judul']; ?></h1>
</div>

<form action="<?= BASEURL; ?>/admin/addnewPostingan" method="post" enctype="multipart/form-data">
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="fw-bold">Data Postingan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <div class="mb-3">
                        <label for="namapostingan" class="form-label">Nama Postingan</label>
                        <input type="text" required name="nama_postingan" class="form-control" id="namapostingan" placeholder="Nama postingan">
                    </div>
                    <div class="mb-3">
                        <label for="namapostingan" class="form-label">Label</label>
                        <div class="input-group">
                            <select class="form-select" required name="label_postingan" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <?php foreach ($data['getLabel'] as $label) : ?>
                                    <option value="<?= $label['label_postingan']; ?>"><?= $label['label_postingan']; ?></option>
                                <?php endforeach ?>
                            </select>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Label
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto</label>
                        <input class="form-control" required name="foto" type="file" id="formFile">
                        <small><i class="text-danger">pastikan ukuran file tidak lebih 2Mb</i></small>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan Postingan</label>
                <textarea class="form-control" required name="deskripsi" id="keterangan" rows="3"></textarea>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Upload Postingan</button>
            </div>
        </div>
    </div>
</form>



<?= FlashMessage::alertSweet() ?>
<!-- Modal -->
<form action="<?= BASEURL; ?>/admin/addLabelPostingan" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Label</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="label" class="form-label">Input Label</label>
                        <input type="text" name="label_postingan" class="form-control" id="label" placeholder="Cth. Wisata ..." autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Label</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('#keterangan').summernote({
        placeholder: 'Ketik deskripsi postingan ...',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['undo', 'redo', 'style', 'bold', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['height', ['height']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'help']]
        ]
    });
</script>