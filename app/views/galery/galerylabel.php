<header style="padding: 5rem 0 3rem 0; border-radius: 0 0 20% 20%;" class="bg-red shadow-lg">
    <div class="container mt-sm-3">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6 d-grid align-content-center flex-wrap">
                    <h1 class="fw-bold" style="font-size: 2.8rem; --bs-text-opacity: .9;"><?= $data['judul']; ?></h1>
                    <h4><?= $data['get_nama_label']['label_postingan']; ?></h4>
                </div>
                <div class="col-lg-6 d-lg-flex d-none ps-5 justify-content-end">
                    <img src="<?= ASSETS; ?>/img/logoBagus.jpg" alt="" class="rounded-circle" style="width: 70%;">
                </div>
            </div>
        </div>
        <hr>
    </div>
</header>

<main class="container my-5">
    <div class="row">
        <?php if ($data['total_data_by_label'] > 0) : ?>
            <?php foreach ($data['get_all_galery_by_label'] as $galery) : ?>
                <div class="col-3">
                    <img src="<?= ASSETS; ?>/img/galery/<?= $galery['foto']; ?>" alt="<?= $galery['foto']; ?>" class="border border-danger border-3 rounded" style="width: 100%;">
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-6 d-flex justify-content-center">
                <img src="<?= ASSETS; ?>/img/tidak_ada_data.jpg" alt="" style="width: 100%;">
            </div>
        <?php endif; ?>
    </div>
</main>