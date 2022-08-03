<div class="container mt-4">
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $data['portofolio']['nama_porto']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['portofolio']['tanggal']; ?></h6>
            <p class="card-text"><?= $data['portofolio']['deskripsi']; ?></p>
            <a href="<?= BASEURL; ?>/portofolio" class="card-link btn btn-danger btn-sm">back</a>
        </div>
    </div>
</div>