<?php

class Produk extends Controller
{
    public function index()
    {
        $data['judul'] = 'Produk';
        $data['navbar'] = "Produk";
        $this->view('templates/header', $data);
        $this->view('produk/index', $data);
        $this->view('templates/footer');
    }
}
