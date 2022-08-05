<section style="--bs-bg-opacity: .09;" class="bg-secondary">
    <header style="padding: 5rem 0 3rem 0; border-radius: 0 0 20% 20%;" class="bg-red shadow-lg">
        <div class="container mt-sm-3">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 d-flex align-content-center flex-wrap">
                        <h1 class="fw-bold " style="font-size: 2.8rem; --bs-text-opacity: .9;">Bagus Agriseta Mandiri</h1>
                        <small><i>Yang Dari Bagus Selalu Bagus, Yang Dari Batu Selalu Bermutu</i></small>
                        <p class="fs-5 mt-4">Website Resmi <b>CV. Bagus Agriseta Mandiri</b></p>
                        <p>Pusat Wisata Edukasi dan Produksi Oleh-Oleh Khas Kota Wisata Batu</p>

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

<section style="--bs-bg-opacity: .09; padding: 4rem 0;" class="bg-secondary d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-center">
                <h1 class="text-color-danger fw-bold">Daftar Produk</h1>
            </div>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="d-flex justify-content-around flex-wrap">
                    <?php foreach ($data['produk_limit'] as $produkLimit) : ?>
                        <div class="card mb-3" style="width: 18rem;">
                            <span class="badge bg-success" style="position: absolute;"><?= $produkLimit['label_produk']; ?></span>
                            <img src="<?= ASSETS; ?>/img/produk/<?= $produkLimit['foto_produk']; ?>" class="card-img-top" alt="<?= $produkLimit['foto_produk']; ?>" height="200px" style="object-fit: cover; object-position: 0 0;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $produkLimit['nama_produk']; ?></h5>
                                <div style="height: 140px; overflow: hidden;">
                                    <p class="card-text"><?= $produkLimit['deskripsi_produk']; ?></p>
                                </div>
                                <a href="<?= BASEURL; ?>/produk/detail/<?= $produkLimit['enkripsi_produk']; ?>" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="<?= BASEURL; ?>/produk" class="btn btn-lg btn-danger">Lihat Semua Produk</a>
            </div>
        </div>

    </div>
</section>

<!-- visi misi -->
<section style="--bs-bg-opacity: .01;  padding: 6rem 0 !important;" class="bg-secondary d-flex align-content-center justify-content-center flex-wrap">
    <div class="container">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-center">
                <h1 class="fw-bold text-danger">Visi & Misi</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h2 class="text-danger">Visi</h2>
                <p>Mewujudkan perusahaan yang unggul di bidang pengolahan sayur dan buah</p>
            </div>
            <div class="col-md-6 col-sm-12">
                <h2 class="text-danger">Misi</h2>
                <ol>
                    <li>
                        <p>Pemberdayaan segenap potensi sumberdaya alam dan manusia untuk membangun pertanian Indonesia yang mandiri, tangguh, modern, terpadu, inovatif, yang berdimensi kerakyatan</p>
                    </li>

                </ol>
            </div>
        </div>
    </div>
</section>