<header style="padding: 5rem 0 3rem 0; border-radius: 0 0 20% 20%;" class="bg-red shadow-lg">
    <div class="container mt-sm-3">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6 d-grid align-content-center flex-wrap">
                    <h1 class="fw-bold" style="font-size: 2.8rem; --bs-text-opacity: .9;"><?= $data['judul']; ?> <?= $data['namaLabel']['label_postingan']; ?></h1>
                    <p></p>
                </div>
                <div class="col-lg-6 d-lg-flex d-none ps-5 justify-content-end">
                    <img src="<?= ASSETS; ?>/img/logo.webp" alt="" class="rounded-circle" style="width: 70%;">
                </div>
            </div>
        </div>
        <hr>
    </div>
</header>

<div class="container">
    <div class="row my-5">
        <div class="col-lg-8">
            <?php if ($data['totalPostingan'] > 0) : ?>
                <?php foreach ($data['postinganByLabel'] as $postingan) : ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-lg-4">
                                <img src="<?= ASSETS; ?>/img/postingan/<?= $postingan['foto']; ?>" class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $postingan['nama_postingan']; ?> <small><span class="badge bg-danger" style="font-size: 0.65rem;"><?= $postingan['label_postingan']; ?></span></small></h5>
                                    <div style="height: 140px; overflow: hidden;">
                                        <p class="card-text"><?= $postingan['deskripsi']; ?></p>
                                    </div>
                                    <p class="card-text"><small class="text-muted">Last updated <?= $postingan['tgl_update']; ?></small></p>
                                    <a href="<?= BASEURL ?>/postingan/detailPostingan/<?= $postingan['enkripsi']; ?>" class="btn btn-success mb-3">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else : ?>
                <img src="<?= ASSETS; ?>/img/tidak_ada_data.jpg" alt="data not found" width="30%">
            <?php endif ?>
        </div>

        <div class="col-lg-4">
            <div class="list-group">
                <a class="list-group-item list-group-item-action bg-success text-light" aria-current="true">
                    Label Postingan
                </a>
                <?php foreach ($data['getLabel'] as $label) : ?>
                    <a href="<?= BASEURL; ?>/postingan/label/<?= $label['id_label']; ?>" class="list-group-item list-group-item-action"><?= $label['label_postingan']; ?></a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>