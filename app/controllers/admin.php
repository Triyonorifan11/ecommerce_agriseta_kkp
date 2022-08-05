<?php

class Admin extends Controller
{

    public function index()
    {
        $data['judul'] = "Dashboard";
        $data['navbar'] = "dashboard";
        $this->view('templates/headerAdmin', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footerAdmin');
    }

    // ============================halaman anggota===============================
    public function dataPengguna()
    {
        $data['judul'] = "Data Pengguna";
        $data['navbar'] = "pengguna";

        // data
        $data['user'] = $this->model('Anggota_Model')->gettAllAnggota();

        $this->view('templates/headerAdmin', $data);
        $this->view('admin/dataPengguna', $data);
        $this->view('templates/footerAdmin');
    }

    public function addAnggota()
    {
        if ($this->model('Anggota_Model')->addAnggota($_POST) > 0) {

            FlashMessage::setSweetAlrert('Berhasil', 'Data berhasil ditambahkan', 'success');
            header('Location: ' . BASEURL . '/admin/dataPengguna');
            exit;
        } else {

            FlashMessage::setSweetAlrert('Gagal', 'Profile gagal ditambahkan', 'error');
            header('Location: ' . BASEURL . '/admin/dataPengguna');
            exit;
        }
    }

    public function deleteAnggota($id)
    {
        if ($this->model('Anggota_Model')->deleteAnggota($id) > 0) {

            FlashMessage::setSweetAlrert('Berhasil', 'Data berhasil dihapus', 'success');
            header('Location: ' . BASEURL . '/admin/dataPengguna');
            exit;
        } else {

            FlashMessage::setSweetAlrert('Gagal', 'Profile gagal dihapus', 'error');
            header('Location: ' . BASEURL . '/admin/dataPengguna');
            exit;
        }
    }

    // ============================Akhir halaman anggota===============================





    // Postingan
    public function postingan()
    {
        $data['judul'] = "Postingan";
        $data['navbar'] = "postingan";

        $data['all_postingan'] = $this->model('Postingan_Model')->getAllPostingan();

        $this->view('templates/headerAdmin', $data);
        $this->view('admin/postingan', $data);
        $this->view('templates/footerAdmin');
    }

    // label postingan
    public function addLabelPostingan()
    {
        if ($this->model('Postingan_Model')->add_label_postingan($_POST) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Label berhasil ditambahkan', 'success');
            header('Location: ' . BASEURL . '/admin/addPostingan');
            exit;
        } else {

            FlashMessage::setSweetAlrert('Gagal', 'Label gagal ditambahkan', 'error');
            header('Location: ' . BASEURL . '/admin/addPostingan');
            exit;
        }
    }

    // tambah postingan baru
    public function addnewPostingan()
    {
        if ($this->model('Postingan_Model')->addNewPostingan($_POST) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Postingan berhasil ditambahkan', 'success');
            header('Location: ' . BASEURL . '/admin/postingan');
            exit;
        } elseif ($this->model('Postingan_Model')->addNewPostingan($_POST) == 0) {
            FlashMessage::setSweetAlrert('Perhatian', 'File foto terlalu besar, atau ekstensi salah, harus .png , .jpg , .jpeg , .svg', 'info');
            header('Location: ' . BASEURL . '/admin/postingan');
            exit;
        } else {

            FlashMessage::setSweetAlrert('Gagal', 'Postingan gagal ditambahkan', 'error');
            header('Location: ' . BASEURL . '/admin/postingan');
            exit;
        }
    }

    // view tambah postingan
    public function addPostingan()
    {
        $data['judul'] = "Tambah Postingan";
        $data['navbar'] = "postingan";

        $data['getLabel'] = $this->model('Postingan_Model')->getAllLabel();

        $this->view('templates/headerAdmin', $data);
        $this->view('admin/addPostingan', $data);
        $this->view('templates/footerAdmin');
    }

    // delete postingan
    public function deletePost($enkripsi)
    {
        $data['postingan'] = $this->model('Postingan_Model')->getSingleFoto($enkripsi);
        $nama_berkas_db = $data['postingan']['foto'];
        if ($this->model('Postingan_Model')->hapus_postingan($enkripsi, $nama_berkas_db) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Postingan berhasil dihapus', 'success');
            header('Location: ' . BASEURL . '/admin/postingan');
            exit;
        } else {
            FlashMessage::setSweetAlrert('Gagal', 'Postingan gagal dihapus', 'error');
            header('Location: ' . BASEURL . '/admin/postingan');
            exit;
        }
    }


    // ============================halaman produk===============================
    public function produk()
    {
        $data['judul'] = "Daftar Produk";
        $data['navbar'] = "produk";

        $data['all_produk'] = $this->model('Produk_Model')->getAllProduk();

        $this->view('templates/headerAdmin', $data);
        $this->view('admin/produk', $data);
        $this->view('templates/footerAdmin');
    }

    // view tambah produk
    public function addProduk()
    {
        $data['judul'] = "Tambah Produk";
        $data['navbar'] = "produk";

        $data['getLabel'] = $this->model('Produk_Model')->getAllLabel();

        $this->view('templates/headerAdmin', $data);
        $this->view('admin/addProduk', $data);
        $this->view('templates/footerAdmin');
    }

    // add  label produk
    public function addLabelProduk()
    {
        if ($this->model('Produk_Model')->add_label_produk($_POST) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Label berhasil ditambahkan', 'success');
            header('Location: ' . BASEURL . '/admin/addProduk');
            exit;
        } else {

            FlashMessage::setSweetAlrert('Gagal', 'Label gagal ditambahkan', 'error');
            header('Location: ' . BASEURL . '/admin/addProduk');
            exit;
        }
    }


    // tambah postingan baru
    public function addnewProduk()
    {
        if ($this->model('Produk_Model')->addNewProduk($_POST) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Produk berhasil ditambahkan', 'success');
            header('Location: ' . BASEURL . '/admin/produk');
            exit;
        } elseif ($this->model('Produk_Model')->addNewProduk($_POST) == 0) {
            FlashMessage::setSweetAlrert('Perhatian', 'File foto terlalu besar, atau ekstensi salah, harus .png , .jpg , .jpeg , .svg', 'info');
            header('Location: ' . BASEURL . '/admin/produk');
            exit;
        } else {

            FlashMessage::setSweetAlrert('Gagal', 'Produk gagal ditambahkan', 'error');
            header('Location: ' . BASEURL . '/admin/produk');
            exit;
        }
    }

    // delete produk
    public function deleteProduk($enkripsi)
    {
        $data['produk'] = $this->model('Produk_Model')->getSingleFoto($enkripsi);
        $nama_berkas_db = $data['produk']['foto_produk'];
        if ($this->model('Produk_Model')->hapus_produk($enkripsi, $nama_berkas_db) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Produk berhasil dihapus', 'success');
            header('Location: ' . BASEURL . '/admin/produk');
            exit;
        } else {
            FlashMessage::setSweetAlrert('Gagal', 'Produk gagal dihapus', 'error');
            header('Location: ' . BASEURL . '/admin/produk');
            exit;
        }
    }



    // ============================Akhir halaman ptroduk===============================
}
