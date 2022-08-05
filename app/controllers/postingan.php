<?php

class Postingan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Postingan';
        $data['navbar'] = "Postingan";


        $data['all_postingan'] = $this->model('Postingan_Model')->getAllPostingan();
        $data['totalPostingan'] = $this->model('Postingan_Model')->total_postingan();

        $data['getLabel'] = $this->model('Postingan_Model')->getAllLabel();

        $this->view('templates/header', $data);
        $this->view('postingan/index', $data);
        $this->view('templates/footer');
    }

    public function label($id)
    {
        $data['judul'] = 'Postingan';
        $data['navbar'] = "Postingan";

        $data['namaLabel'] = $this->model('Postingan_Model')->getLabelById($id);
        $data['getLabel'] = $this->model('Postingan_Model')->getAllLabel();
        $data['totalPostingan'] = $this->model('Postingan_Model')->total_postinganByLabel($data['namaLabel']['label_postingan']);

        $data['postinganByLabel'] = $this->model('Postingan_Model')->getAllPostByLabel($data['namaLabel']['label_postingan']);

        $this->view('templates/header', $data);
        $this->view('postingan/label', $data);
        $this->view('templates/footer');
    }


    public function detailPostingan($enkripsi)
    {
        $data['judul'] = 'Detail Postingan';
        $data['navbar'] = "Postingan";
        // $data['namaLabel'] = $this->model('Postingan_Model')->getLabelById($id);
        $data['getLabel'] = $this->model('Postingan_Model')->getAllLabel();
        // $data['totalPostingan'] = $this->model('Postingan_Model')->total_postinganByLabel($data['namaLabel']['label_postingan']);

        $data['detail_postingan'] = $this->model('Postingan_Model')->getSingleFoto($enkripsi);

        $this->view('templates/header', $data);
        $this->view('postingan/detailPostingan', $data);
        $this->view('templates/footer');
    }
}
