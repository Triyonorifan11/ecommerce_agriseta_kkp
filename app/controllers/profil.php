<?php

class profil extends Controller
{
    public function index()
    {
        $data['judul'] = 'Profil';
        $data['navbar'] = 'Profil';
        $this->view('templates/header', $data);
        $this->view('profil/index', $data);
        $this->view('templates/footer');
    }
}
