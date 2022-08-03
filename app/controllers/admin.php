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

    public function dataPengguna()
    {
        $data['judul'] = "Data Pengguna";
        $data['navbar'] = "pengguna";
        $this->view('templates/headerAdmin', $data);
        $this->view('admin/dataPengguna', $data);
        $this->view('templates/footerAdmin');
    }

    public function addAnggota()
    {
    }
}
