<?php

class profil extends Controller
{
    public function index()
    {
        $data['judul'] = 'Profil';
        $data['navbar'] = 'Profil';

        $data['getLabel'] = $this->model('Postingan_Model')->getAllLabel();

        $this->view('templates/header', $data);
        $this->view('profil/index', $data);
        $this->view('templates/footer');
    }
}
