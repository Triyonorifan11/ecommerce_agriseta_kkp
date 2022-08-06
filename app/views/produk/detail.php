<section>
    <header style="padding: 5rem 0 3rem 0; border-radius: 0 0 20% 20%;" class="bg-red shadow-lg">
        <div class="container mt-sm-3">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 d-grid align-content-center flex-wrap">
                        <h1 class="fw-bold" style="font-size: 2.8rem; --bs-text-opacity: .9;"><?= $data['judul']; ?></h1>
                        <h3><?= $data['produk']['nama_produk']; ?></h3>
                        <p><i class="badge bg-warning h6"><?= $data['produk']['label_produk']; ?></i></p>
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
    <div class="col-12 mt-5">
        <div class="d-flex justify-content-center">
            <img src="<?= ASSETS; ?>/img/produk/<?= $data['produk']['foto_produk']; ?>" alt="foto produk" width="40%">
        </div>
        <hr>
        <p>Tanggal Update : <?= $data['produk']['tgl_update']; ?></p>
        <p>Harga Produk : Rp<?= number_format($data['produk']['harga_produk'], 0, ',', '.'); ?></p>
        <p><?= $data['produk']['deskripsi_produk']; ?></p>
        <a href="<?= BASEURL; ?>/produk" class="btn btn-secondary my-5">Kembali</a>
    </div>

</div>