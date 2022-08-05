<?php

class Produk extends Controller
{
    public function index()
    {
        $data['judul'] = 'Produk';
        $data['navbar'] = "Produk";
        $data['getLabel'] = $this->model('Postingan_Model')->getAllLabel();

        $data['produk_unggulan'] = $this->model('Produk_Model')->getProdukByLabel('Produk Unggulan');
        $data['total_produk_unggulan'] = $this->model('Produk_Model')->totalProduk('Produk Unggulan');
        $data['produk_andalan'] = $this->model('Produk_Model')->getProdukByLabel('Produk Andalan');
        $data['total_produk_andalan'] = $this->model('Produk_Model')->totalProduk('Produk Andalan');

        $this->view('templates/header', $data);
        $this->view('produk/index', $data);
        $this->view('templates/footer');
    }

    public function detail($enkripsi)
    {
        $data['judul'] = 'Detail Produk';
        $data['navbar'] = "Produk";

        $data['produk'] = $this->model('Produk_Model')->getSingleFoto($enkripsi);
        $data['getLabel'] = $this->model('Postingan_Model')->getAllLabel();

        $this->view('templates/header', $data);
        $this->view('produk/detail', $data);
        $this->view('templates/footer');
    }
}
