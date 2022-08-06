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

    public function sendCustomer()
    {
        if ($this->model('Customer_Model')->sendEmailFromCustomer($_POST) > 0) {
            FlashMessage::setSweetAlrert('Berhasil', 'Pesan berhasil dikirim. Silahkan cek email anda!', 'success');
            header('Location: ' . BASEURL . '/profil');
            exit;
        } else {
            FlashMessage::setSweetAlrert('Gagal', 'Pesan gagal dikirim.', 'error');
            header('Location: ' . BASEURL . '/profil');
            exit;
        }
    }
}
