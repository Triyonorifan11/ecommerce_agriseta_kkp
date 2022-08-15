<?php

class Admin extends Controller
{

    public function index()
    {
        $data['judul'] = "Dashboard";
        $data['navbar'] = "dashboard";

        $data['total_produk'] = $this->model('Produk_Model')->totalAllProduk();
        $data['total_postingan'] = $this->model('Postingan_Model')->totalAllPostingan();
        $data['total_admin'] = $this->model('Anggota_Model')->totalAdmin();
        $data['total_customer'] = $this->model('Customer_Model')->totalCustomer();

        $data['customer'] = $this->model('Customer_Model')->gettAllCustomer();

        $this->view('templates/headerAdmin', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footerAdmin');
    }


    public function profile()
    {
        $data['judul'] = "Profile";
        $data['navbar'] = "profile";

        $data['profile'] = $this->model('Profile_Model')->getProfileSinggle();

        $this->view('templates/headerAdmin', $data);
        $this->view('admin/profile', $data);
        $this->view('templates/footerAdmin');
    }

    public function updateProfile()
    {

        if ($this->model('Profile_Model')->updateProfile($_POST) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Profile berhasil diperbarui', 'success');
            header('Location: ' . BASEURL . '/admin/profile');
            exit;
        } else {

            FlashMessage::setSweetAlrert('Gagal', 'Profile gagal diperbarui', 'error');
            header('Location: ' . BASEURL . '/admin/profile');
            exit;
        }
    }

    public function updateStruktur()
    {
        if ($this->model('Profile_Model')->updateStruktur($_POST) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Struktur berhasil diperbarui', 'success');
            header('Location: ' . BASEURL . '/admin/profile');
            exit;
        } else {

            FlashMessage::setSweetAlrert('Gagal', 'Struktur gagal diperbarui', 'error');
            header('Location: ' . BASEURL . '/admin/profile');
            exit;
        }
    }


    // ============================halaman anggota pengguna Admin===============================
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

            FlashMessage::setSweetAlrert('Gagal', 'Data gagal ditambahkan', 'error');
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

            FlashMessage::setSweetAlrert('Gagal', 'Data gagal dihapus', 'error');
            header('Location: ' . BASEURL . '/admin/dataPengguna');
            exit;
        }
    }

    // ============================Akhir halaman anggota Admin===============================

    // halaman customer email

    public function dataCustomer()
    {
        $data['judul'] = "Data Customer";
        $data['navbar'] = "customer";

        // data
        $data['customer'] = $this->model('Customer_Model')->gettAllCustomer();

        $this->view('templates/headerAdmin', $data);
        $this->view('admin/dataCustomer', $data);
        $this->view('templates/footerAdmin');
    }

    public function deleteCustomer($id)
    {
        if ($this->model('Customer_Model')->deleteCustomer($id) > 0) {

            FlashMessage::setSweetAlrert('Berhasil', 'Customer berhasil dihapus', 'success');
            header('Location: ' . BASEURL . '/admin/dataCustomer');
            exit;
        } else {

            FlashMessage::setSweetAlrert('Gagal', 'Customer gagal dihapus', 'error');
            header('Location: ' . BASEURL . '/admin/dataCustomer');
            exit;
        }
    }

    // akhir halaman customer email




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


    // ======================== halaman Galery =====================================//
    public function galery()
    {
        $data['judul'] = "Galery";
        $data['navbar'] = "galery";

        $data['all_galery'] = $this->model('Galery_Model')->getAllGalery();

        $this->view('templates/headerAdmin', $data);
        $this->view('admin/galery', $data);
        $this->view('templates/footerAdmin');
    }

    // view add galery
    public function addGalery()
    {
        $data['judul'] = "Tambah Galery";
        $data['navbar'] = "galery";

        $data['getLabel'] = $this->model('Postingan_Model')->getAllLabel();

        $this->view('templates/headerAdmin', $data);
        $this->view('admin/addGalery', $data);
        $this->view('templates/footerAdmin');
    }

    public function insertGalery()
    {
        if ($this->model('Galery_Model')->inserGalery($_POST) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Galery berhasil ditambahkan', 'success');
            header('Location: ' . BASEURL . '/admin/galery');
            exit;
        } elseif ($this->model('Galery_Model')->inserGalery($_POST) == 0) {
            FlashMessage::setSweetAlrert('Perhatian', 'File foto terlalu besar, atau ekstensi salah, harus .png , .jpg , .jpeg , .svg', 'info');
            header('Location: ' . BASEURL . '/admin/galery');
            exit;
        } else {

            FlashMessage::setSweetAlrert('Gagal', 'Postingan gagal ditambahkan', 'error');
            header('Location: ' . BASEURL . '/admin/galery');
            exit;
        }
    }

    // delete postingan
    public function deletegalery($enkripsi)
    {
        $data['Galery'] = $this->model('Galery_Model')->getSingleFoto($enkripsi);
        $nama_berkas_db = $data['Galery']['foto'];
        if ($this->model('Galery_Model')->hapus_galery($enkripsi, $nama_berkas_db) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Galery berhasil dihapus', 'success');
            header('Location: ' . BASEURL . '/admin/galery');
            exit;
        } else {
            FlashMessage::setSweetAlrert('Gagal', 'Galery gagal dihapus', 'error');
            header('Location: ' . BASEURL . '/admin/galery');
            exit;
        }
    }
}
