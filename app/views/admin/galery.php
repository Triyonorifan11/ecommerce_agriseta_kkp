<div class="d-flex mt-4">
    <h1 class=""><?= $data['judul']; ?></h1>
</div>

<div class="card mt-4">
    <a href="<?= BASEURL; ?>/admin/addGalery" class="btn btn-primary my-2 mx-2"><i class="fas fa-solid fa-image me-2"></i>Tambah Galery</a>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Galery</th>
                        <th scope="col">Label</th>
                        <th scope="col">Tanggal Update</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($data['all_galery'] as $galery) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><img src="<?= ASSETS; ?>/img/galery/<?= $galery['foto']; ?>" alt="foto_galery" width="150px"></td>
                            <td><?= $galery['nama_galery']; ?></td>
                            <td><span class="badge text-bg-primary"><?= $galery['label_postingan']; ?></span></td>
                            <td><?= $galery['tgl_update']; ?></td>
                            <td>
                                <div class="d-flex">
                                    <form action="<?= BASEURL; ?>/admin/deletegalery/<?= $galery['enkripsi']; ?>" method="post" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin akan menghapus data ini?');"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <a href="<?= BASEURL; ?>/admin/detailgalery/<?= $galery['enkripsi']; ?>" class="btn btn-info btn-sm mx-2"><i class="text-light fa-solid fa-circle-info"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>