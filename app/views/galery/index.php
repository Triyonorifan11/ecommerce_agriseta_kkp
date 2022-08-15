<header style="padding: 5rem 0 3rem 0; border-radius: 0 0 20% 20%;" class="bg-red shadow-lg">
    <div class="container mt-sm-3">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6 d-grid align-content-center flex-wrap">
                    <h1 class="fw-bold" style="font-size: 2.8rem; --bs-text-opacity: .9;"><?= $data['judul']; ?></h1>
                </div>
                <div class="col-lg-6 d-lg-flex d-none ps-5 justify-content-end">
                    <img src="<?= ASSETS; ?>/img/logoBagus.jpg" alt="" class="rounded-circle" style="width: 70%;">
                </div>
            </div>
        </div>
        <hr>
    </div>
</header>

<div class="container">
    <div class="row my-5">
        <?php foreach ($data['getLabel'] as $galery) : ?>
            <div class="col-lg-4">
                <a href="<?= BASEURL; ?>/detail/<?= $galery['id_label']; ?>" class="text-decoration-none">
                    <div class="card border-success mb-3">
                        <div class="card-body text-success">
                            <h5 class="card-title d-flex justify-content-center flex-wrap"><?= $galery['label_postingan']; ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>