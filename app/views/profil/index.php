<header style="padding: 5rem 0 3rem 0; border-radius: 0 0 20% 20%;" class="bg-red shadow-lg">
    <div class="container mt-sm-3">
        <div class="col-12">
            <div class="d-flex justify-content-center mb-3">
                <h1><?= $data['judul']; ?></h1>
            </div>
            <div class="d-flex justify-content-center flex-wrap mb-5">
                <img src="<?= ASSETS; ?>/img/logoBagus.jpg" class="rounded-circle" alt="" style="width: 40%;">
            </div>
            <div class="d-flex justify-content-center">
                <h1>Bagus Agriseta Mandiri</h1>
            </div>
            <div class="d-flex justify-content-center text-center">
                <i>Pusat Produksi Oleh-Oleh dan Wisata Edukasi Kota Wisata Batu, Jawa Timur</i>
            </div>

        </div>
    </div>
</header>

<article style="padding: 7rem 0 3rem 0;" class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="text-align: justify;">
                <p>
                    CV BAGUS AGRISETA MANDIRI adalah perusahaan yang bergerak pada bidang pertanian yang mengolah hasil budidaya buah ataupun sayur menjadi makanan olahan seperti : dodol, jenang sari apel, bakpia dan manisan, serta keripik yang menjadi produk unggulannya. Sedangkan untuk pengolahan lainnya Bagus Agriseta Mandiri adalah kripik Nangka, Kripik Nanas, Kripik Jambu, Kripik Salak, Kripik Strawbery, dan juga Kripik Wortel yang menjadi produk unggulannya.
                </p>
            </div>

            <div class="col-lg-6" style="text-align: justify;">
                <p>
                    Bagus Agriseta Mandiri didirikan pada tanggal 31 Maret 2001 oleh Bapak Syamsul Huda, SP. Beliau adalah pemilik sekaligus pendiri CV Bagus Agriseta Mandiri. Di awal pendiriannya, Bapak Syamsul Huda hanya memiliki 2 karyawan dan hanya bermodal sebesar RP 4.000.000,- untuk 1 produk saja yaitu jenang apel sampai tahun 2015, karyawannya pun hingga saat ini kurang lebih 48 orang.
                </p>
            </div>
        </div>
    </div>
</article>

<section style="--bs-bg-opacity: .02; padding: 4rem 0;" class="bg-secondary shadow-lg mb-5">
    <div class="container">
        <h1 class="text-success">Profil Pemilik</h1>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Pemilik</td>
                                <td>:</td>
                                <td><?= $data['profile']['nama_pemilik']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Perusahaan</td>
                                <td>:</td>
                                <td><?= $data['profile']['nama_perusahaan']; ?></td>
                            </tr>
                            <tr>
                                <td>Bidang Usaha</td>
                                <td>:</td>
                                <td>
                                    <?= $data['profile']['bidang_usaha']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Kantor</td>
                                <td>:</td>
                                <td><?= $data['profile']['alamat_kantor']; ?></td>
                            </tr>
                            <tr>
                                <td>No Tlp/HP</td>
                                <td>:</td>
                                <td><?= $data['profile']['no_telp']; ?> / <?= $data['profile']['no_hp']; ?></td>
                            </tr>
                            <tr>
                                <td>Kode Pos</td>
                                <td>:</td>
                                <td><?= $data['profile']['kode_pos']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $data['profile']['email']; ?>m</td>
                            </tr>
                            <tr>
                                <td>Luas Tanah</td>
                                <td>:</td>
                                <td><?= $data['profile']['luas_tanah']; ?> m2</td>
                            </tr>
                            <tr>
                                <td>Luas Bangunan</td>
                                <td>:</td>
                                <td><?= $data['profile']['luas_bangunan']; ?> m2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-lg-4 d-flex justify-content-center">
                <img src="<?= ASSETS; ?>/img/profile/<?= $data['profile']['foto_pemilik']; ?>" alt="<?= $data['profile']['foto_pemilik']; ?>" width="100%" height="100%">
            </div>
        </div>
    </div>
</section>

<!-- struktur organisasi -->
<section style=" padding: 6rem 0;" class="">
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1 class="text-success">Struktur Organisasi</h1>
        </div>
        <div class="col-12 d-flex justify-content-center mt-4">
            <img src="<?= ASSETS; ?>/img/struktur.webp" class="shadow rounded-5" alt="struktur" width="100%">
        </div>
    </div>
</section>


<!-- contact -->
<section style=" padding: 6rem 0;">
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1 class="text-success">Ingin dihubungi Bagus?</h1>
        </div>
        <div class="row my-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/profil/sendCustomer" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Masukkan Email Anda</label>
                                <input type="email" name="email" required class="form-control" id="exampleFormControlInput1" placeholder="Email untuk dihubungi">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" required name="nama_customer" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda">
                            </div>
                            <div class="mb-3">
                                <label for="nomorWA" class="form-label">Masukkan No WhatsApp</label>
                                <input type="number" required name="no_wa" class="form-control" id="nomorWA" placeholder="Nomor WhatsApp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alasan untuk dihubungi</label>
                                <textarea class="form-control" required name="alasan" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan alasan anda di sini"></textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn  btn-success" type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?= FlashMessage::alertSweet(); ?>