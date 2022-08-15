<div class="d-flex mt-4">
    <h1 class=""><?= $data['judul']; ?></h1>
</div>


<div class="card shadow">
    <div class="card-header bg-success text-white">
        Profil Pemilik
    </div>

    <div class="card-body">
        <form action="<?= BASEURL; ?>/admin/updateProfile" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-2">
                    <img src="<?= ASSETS; ?>/img/profile/<?= $data['profile']['foto_pemilik']; ?>" alt="foto profil" class="rounded" width="100%">
                    <input type="hidden" name="old_foto" id="old_foto" value="<?= $data['profile']['foto_pemilik']; ?>">
                    <input type="hidden" name="id_profile" id="id_profile" value="<?= $data['profile']['id_profile']; ?>">
                    <div class="input-group">
                        <input type="file" class="form-control" name="foto_pemilik" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" required name="nama_pemilik" value="<?= $data['profile']['nama_pemilik']; ?>" id="nama_pemilik" placeholder="Nama Pemilik">
                    </div>
                    <div class="mb-3">
                        <label for="nama_perusahan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" required name="nama_perusahaan" value="<?= $data['profile']['nama_perusahaan']; ?>" id="nama_perusahan" placeholder="Nama Perusahaan">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_kantor" class="form-label">Alamat Kantor</label>
                        <textarea class="form-control" required name="alamat_kantor" rows="4"><?= $data['profile']['alamat_kantor']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No Telp / No Hp</label>
                        <div class="d-flex">
                            <input type="text" class="form-control" required name="no_telp" value="<?= $data['profile']['no_telp']; ?>" id="no_telp" placeholder="No Telp">
                            <p class="mx-2">/</p>
                            <input type="number" class="form-control" required name="no_hp" value="<?= $data['profile']['no_hp']; ?>" id="no_hp" placeholder="No Hp">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="kode_pos" class="form-label">Kode Pos</label>
                        <input type="number" class="form-control" required name="kode_pos" value="<?= $data['profile']['kode_pos']; ?>" id="kode_pos" placeholder="Kode Pos">
                    </div>
                </div>

                <div class="col-md-5">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" required name="email" value="<?= $data['profile']['email']; ?>" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="luas_tanah" class="form-label">Luas Tanah</label>
                        <div class="input-group">
                            <input type="number" class="form-control" required name="luas_tanah" value="<?= $data['profile']['luas_tanah']; ?>" id="luas_tanah" placeholder="Luas Tanah">
                            <span class="input-group-text">m2</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="luas_bangunan" class="form-label">Luas Bangunan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" required name="luas_bangunan" value="<?= $data['profile']['luas_bangunan']; ?>" id="luas_bangunan" placeholder="Luas Bangunan">
                            <span class="input-group-text">m2</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bidangusaha" class="form-label">Bidang Usaha</label>
                        <textarea class="form-control" name="bidang_usaha" required id="bidangusaha" rows="4"><?= $data['profile']['bidang_usaha']; ?></textarea>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-block btn-primary">Update Profil</button>
            </div>
        </form>
    </div>

</div>

<form action="<?= BASEURL; ?>/admin/updateStruktur" method="post" enctype="multipart/form-data">
    <div class="card shadow mt-3">
        <div class="card-header bg-success text-white">
            Struktur organisasi
        </div>
        <div class="card-body">
            <img src="<?= ASSETS; ?>/img/profile/<?= $data['profile']['struktur_organisasi']; ?>" class="rounded-5" alt="struktur" width="100%">
            <div class="input-group">
                <input type="file" required name="foto_pemilik" class="form-control my-3" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <input type="hidden" name="old_struktur" id="old_foto" value="<?= $data['profile']['struktur_organisasi']; ?>">
                <input type="hidden" name="id_profile" id="id_profile" value="<?= $data['profile']['id_profile']; ?>">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-block btn-primary">Update Struktur</button>
            </div>
        </div>
    </div>
</form>



<script>
    $('#bidangusaha').summernote({
        placeholder: 'Ketik deskripsi postingan ...',
        tabsize: 1,
        height: 100,
        toolbar: [
            ['style', ['undo', 'redo', 'bold', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['height', ['height']],

            ['para', ['ul', 'ol', 'paragraph']],

        ]
    });
</script>
<?= FlashMessage::alertSweet(); ?>