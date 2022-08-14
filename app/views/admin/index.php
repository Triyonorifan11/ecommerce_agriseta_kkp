<h1 class="mt-4"><?= $data['judul']; ?></h1>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body d-flex">
                <p>Total Produk</p>
                <h5 class="ms-auto"><?= $data['total_produk']; ?></h5>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?= BASEURL; ?>/admin/produk">Lihat Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body d-flex">
                <p>Total Postingan</p>
                <h5 class="ms-auto"><?= $data['total_postingan']; ?></h5>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?= BASEURL; ?>/admin/postingan">Lihat Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body d-flex">
                <p>Total Admin</p>
                <h5 class="ms-auto"><?= $data['total_admin']; ?></h5>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?= BASEURL; ?>/admin/dataPengguna">Lihat Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body d-flex">
                <p>Tanggapan Customer</p>
                <h5 class="ms-auto"><?= $data['total_customer']; ?></h5>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?= BASEURL; ?>/admin/dataCustomer">Lihat Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Customer
    </div>
    <div class="card-body">
        <table class="table" id="datatablesSimple">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No WhatsApp</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Alasan dihubungi</th>
                    <th scope="col">Status </th>
                    <th scope="col">Actions </th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['customer'] as $user) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $user['nama_customer']; ?></td>
                        <td><?= $user['email_customer']; ?></td>
                        <td><a href="http://wa.me/62<?= $user['no_wa']; ?>" target="_blank">wa.me/62<?= $user['no_wa']; ?></a></td>
                        <td><?= $user['waktu']; ?></td>
                        <td><?= $user['alasan_dihubungi']; ?></td>
                        <td><?= $user['status'] == 1 ? "Terkirim" : "Gagal"; ?></td>
                        <td>
                            <form action="<?= BASEURL; ?>/admin/deleteCustomer/<?= $user['id_mail']; ?>" method="post">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin akan menghapus data ini?');"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>