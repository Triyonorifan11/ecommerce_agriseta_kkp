<section>
    <header style="padding: 5rem 0 3rem 0; border-radius: 0 0 20% 20%;" class="bg-red shadow-lg">
        <div class="container mt-sm-3">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 d-grid align-content-center flex-wrap">
                        <h1 class="fw-bold" style="font-size: 2.8rem; --bs-text-opacity: .9;"><?= $data['judul']; ?></h1>
                        <h3><?= $data['detail_postingan']['nama_postingan']; ?></h3>
                        <p><i class="badge bg-warning h6"><?= $data['detail_postingan']['label_postingan']; ?></i></p>
                    </div>
                    <div class="col-lg-6 d-lg-flex d-none ps-5 justify-content-end">
                        <img src="<?= ASSETS; ?>/img/logo.webp" alt="" class="rounded-circle" style="width: 70%;">
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </header>
</section>

<div class="container">
    <div class="col-12" style="margin-top: 4rem;">
        <div class="d-flex justify-content-center">
            <img src="<?= ASSETS; ?>/img/postingan/<?= $data['detail_postingan']['foto']; ?>" alt="foto postingan" width="40%">
        </div>
        <hr>
        <p>Tanggal Update : <?= $data['detail_postingan']['tgl_update']; ?></p>
        <p><?= $data['detail_postingan']['deskripsi']; ?></p>
        <a href="<?= BASEURL; ?>/postingan" class="btn btn-secondary my-5">Kembali</a>
    </div>

</div>