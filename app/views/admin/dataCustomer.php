<div class="d-flex mt-4">
    <h1 class=""><?= $data['judul']; ?></h1>
</div>


<div class="card mt-5">
    <div class="card-body">
        <div class="table-responsive">
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
</div>