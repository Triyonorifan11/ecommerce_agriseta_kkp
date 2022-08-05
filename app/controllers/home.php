<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Beranda';
        $data['navbar'] = 'Home';
        $data['getLabel'] = $this->model('Postingan_Model')->getAllLabel();
        $data['produk_limit'] = $this->model('Produk_Model')->getProdukLimit();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
