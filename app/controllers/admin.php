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

    // ============================halaman produk===============================
    public function produk()
    {
        $data['judul'] = "Daftar Produk";
        $data['navbar'] = "produk";
        $this->view('templates/headerAdmin', $data);
        $this->view('admin/produk', $data);
        $this->view('templates/footerAdmin');
    }
    // ============================Akhir halaman ptroduk===============================



    // Postingan
    public function postingan()
    {
        $data['judul'] = "Postingan";
        $data['navbar'] = "postingan";
        $this->view('templates/headerAdmin', $data);
        $this->view('admin/postingan', $data);
        $this->view('templates/footerAdmin');
    }
}
