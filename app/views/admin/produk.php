<div class="d-flex mt-4">
    <h1 class=""><?= $data['judul']; ?></h1>
</div>

<div class="card mt-4">
    <a href="<?= BASEURL; ?>/admin/addProduk" class="btn btn-success my-2 mx-2"><i class="fas fa-table me-2"></i>Tambah Produk</a>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Label</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Tanggal Update</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($data['all_produk'] as $produk) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><img src="<?= ASSETS; ?>/img/produk/<?= $produk['foto_produk']; ?>" alt="foto_postingan" width="150px"></td>
                            <td><?= $produk['nama_produk']; ?></td>
                            <td><span class="badge text-bg-warning"><?= $produk['label_produk']; ?></span></td>
                            <td>Rp <?= number_format($produk['harga_produk'], 0, ',', '.'); ?>,-</td>
                            <td><?= $produk['tgl_update']; ?></td>
                            <td>
                                <div class="d-flex">
                                    <form action="<?= BASEURL; ?>/admin/deleteProduk/<?= $produk['enkripsi_produk']; ?>" method="post" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin akan menghapus data ini?');"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <a href="<?= BASEURL; ?>/admin/detailProduk/<?= $produk['enkripsi_produk']; ?>" class="btn btn-info btn-sm mx-2"><i class="text-light fa-solid fa-circle-info"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>