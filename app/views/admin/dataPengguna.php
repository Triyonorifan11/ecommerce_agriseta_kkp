<div class="d-flex mt-4">
    <h1 class=""><?= $data['judul']; ?></h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-solid fa-user-plus me-1"></i>Tambah Data
    </button>
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
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data['user'] as $user) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['email_user']; ?></td>
                            <td><?= $user['jk']; ?></td>
                            <td><?= $user['no_hp']; ?></td>
                            <td><?= $user['tgl_lahir']; ?></td>
                            <td>
                                <form action="<?= BASEURL; ?>/admin/deleteAnggota/<?= $user['id_user']; ?>" method="post">
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="<?= BASEURL; ?>/admin/addAnggota" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="nama" required class="form-control" name="nama" id="nama" placeholder="bagus@gmail.com">
                            </div>

                            <div class="mb-3">
                                <label for="inputGroupSelect01" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" required id="inputGroupSelect01" name="jk">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nomer-hp" class="form-label">Nomer Hp/WA</label>
                                <input type="number" required class="form-control" name="no_hp" id="no-hp" placeholder="081123123123">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" required class="form-control" name="email_user" id="email" placeholder="bagus@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" required class="form-control" name="password" id="password" placeholder="password">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" required class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="bagus@gmail.com">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php FlashMessage::alertSweet() ?>