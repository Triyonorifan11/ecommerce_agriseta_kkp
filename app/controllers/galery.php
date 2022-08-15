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

    public function galerylabel($label)
    {
        $data['judul'] = 'Galery';
        $data['navbar'] = "Galery";

        $data['get_nama_label'] = $this->model('Postingan_Model')->getLabelById($label);
        $labelname = $data['get_nama_label']['label_postingan'];
        $data['total_data_by_label'] = $this->model('Galery_Model')->getTotalGaleryByLabel($labelname);
        $data['get_all_galery_by_label'] = $this->model('Galery_Model')->getAllGaleryByLabel($labelname);

        $this->view('templates/header', $data);
        $this->view('galery/galerylabel', $data);
        $this->view('templates/footer');
    }
}
