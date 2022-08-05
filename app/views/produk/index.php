<section>
    <header style="padding: 5rem 0 3rem 0; border-radius: 0 0 20% 20%;" class="bg-red shadow-lg">
        <div class="container mt-sm-3">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 d-grid align-content-center flex-wrap">
                        <h1 class="fw-bold" style="font-size: 2.8rem; --bs-text-opacity: .9;"><?= $data['judul']; ?></h1>
                        <p>Daftar Produk Kami</p>
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

<section style="padding: 5rem 0 3rem 0;">
    <div class="container">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-center">
                <h1 class="text-color-danger fw-bold">Daftar Produk</h1>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <h3 class="text-danger">Produk Unggulan</h3>
            <div class="row">
                <div class="d-flex justify-content-around flex-wrap">
                    <?php if ($data['total_produk_unggulan'] > 0) : ?>
                        <?php foreach ($data['produk_unggulan'] as $produkUnggulan) : ?>
                            <div class="card mb-3" style="width: 18rem;">
                                <span class="badge bg-warning" style="position: absolute;"><?= $produkUnggulan['label_produk']; ?></span>
                                <img src="<?= ASSETS; ?>/img/produk/<?= $produkUnggulan['foto_produk']; ?>" class="card-img-top" alt="<?= $produkUnggulan['foto_produk']; ?>" height="200px" style="object-fit: cover; object-position: 0 0;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $produkUnggulan['nama_produk']; ?></h5>
                                    <div style="height: 140px; overflow: hidden;">
                                        <p class="card-text"><?= $produkUnggulan['deskripsi_produk']; ?></p>
                                    </div>
                                    <a href="<?= BASEURL; ?>/produk/detail/<?= $produkUnggulan['enkripsi_produk']; ?>" class="btn btn-success">Lihat Produk</a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else : ?>
                        <img src="<?= ASSETS; ?>/img/tidak_ada_data.jpg" alt="data not found" width="30%">
                    <?php endif ?>
                </div>
            </div>
            <hr>

            <h3 class="text-danger">Produk Andalan</h3>
            <div class="row">
                <div class="d-flex justify-content-around flex-wrap">
                    <?php if ($data['total_produk_andalan'] > 0) : ?>
                        <?php foreach ($data['produk_andalan'] as $produkLimit) : ?>
                            <div class="card mb-3" style="width: 18rem;">
                                <span class="badge bg-success" style="position: absolute;"><?= $produkLimit['label_produk']; ?></span>
                                <img src="<?= ASSETS; ?>/img/produk/<?= $produkLimit['foto_produk']; ?>" class="card-img-top" alt="<?= $produkLimit['foto_produk']; ?>" height="200px" style="object-fit: cover; object-position: 0 0;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $produkLimit['nama_produk']; ?></h5>
                                    <div style="height: 140px; overflow: hidden;">
                                        <p class="card-text"><?= $produkLimit['deskripsi_produk']; ?></p>
                                    </div>
                                    <a href="<?= BASEURL; ?>/produk/detail/<?= $produkLimit['enkripsi_produk']; ?>" class="btn btn-success">Lihat Produk</a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else : ?>
                        <!-- <h1>Produk tidak ada</h1> -->
                        <img src="<?= ASSETS; ?>/img/tidak_ada_data.jpg" alt="data not found" width="30%">
                    <?php endif ?>
                </div>
            </div>
            <hr>
        </div>
    </div>
</section>