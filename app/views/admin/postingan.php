<div class="d-flex mt-4">
    <h1 class=""><?= $data['judul']; ?></h1>
</div>

<div class="card mt-4">
    <a href="<?= BASEURL; ?>/admin/addPostingan" class="btn btn-primary my-2 mx-2"><i class="fas fa-solid fa-cube me-2"></i>Tambah Postingan</a>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Postingan</th>
                        <th scope="col">Label</th>
                        <th scope="col">Tanggal Update</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($data['all_postingan'] as $postingan) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><img src="<?= ASSETS; ?>/img/postingan/<?= $postingan['foto']; ?>" alt="foto_postingan" width="150px"></td>
                            <td><?= $postingan['nama_postingan']; ?></td>
                            <td><span class="badge text-bg-primary"><?= $postingan['label_postingan']; ?></span></td>
                            <td><?= $postingan['tgl_update']; ?></td>
                            <td>
                                <div class="d-flex">
                                    <form action="<?= BASEURL; ?>/admin/deletePost/<?= $postingan['enkripsi']; ?>" method="post" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin akan menghapus data ini?');"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <a href="<?= BASEURL; ?>/admin/detailPostingan/<?= $postingan['enkripsi']; ?>" class="btn btn-info btn-sm mx-2"><i class="text-light fa-solid fa-circle-info"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>