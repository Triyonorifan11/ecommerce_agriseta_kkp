<div class="d-flex mt-4">
    <h1 class=""><?= $data['judul']; ?></h1>
</div>

<form action="<?= BASEURL; ?>/admin/addnewProduk" method="post" enctype="multipart/form-data">
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="fw-bold">Data Produk</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" required name="nama_produk" class="form-control" id="nama_produk" placeholder="Nama postingan">
                    </div>
                    <div class="mb-3">
                        <label for="label_produk" class="form-label">Label</label>
                        <div class="input-group">
                            <select class="form-select" required name="label_produk" id="label_produk" aria-label="Example select with button addon">
                                <?php foreach ($data['getLabel'] as $label) : ?>
                                    <option value="<?= $label['label_produk']; ?>"><?= $label['label_produk']; ?></option>
                                <?php endforeach ?>
                            </select>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produk">
                                Tambah Label
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto <small><i class="text-danger">pastikan ukuran file tidak lebih 2Mb</i></small></label>
                        <input class="form-control" required name="foto_produk" type="file" id="formFile">

                    </div>
                    <label for="Harga" class="form-label">Harga Produk</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" required name="harga_produk" class="form-control" id="Harga" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="cth. 32000">
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan Produk</label>
                <textarea class="form-control" required name="deskripsi_produk" id="keterangan" rows="3"></textarea>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-success" type="submit">Upload Produk</button>
            </div>
        </div>
    </div>
</form>



<?= FlashMessage::alertSweet() ?>
<!-- Modal -->
<form action="<?= BASEURL; ?>/admin/addLabelProduk" method="post">
    <div class="modal fade" id="produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Label Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="label" class="form-label">Input Label</label>
                        <input type="text" name="label_produk" class="form-control" id="label" placeholder="Cth. Produk Unggulan" autocomplete="off">
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