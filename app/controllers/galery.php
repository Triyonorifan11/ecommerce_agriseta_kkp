<?php

class Galery extends Controller
{
    public function index()
    {
        $data['judul'] = 'Galery';
        $data['navbar'] = "Galery";

        $data['getLabel'] = $this->model('Postingan_Model')->getAllLabel();

        $this->view('templates/header', $data);
        $this->view('galery/index', $data);
        $this->view('templates/footer');
    }
}
