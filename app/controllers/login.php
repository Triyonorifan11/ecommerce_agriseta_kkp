<?php

class Login extends Controller
{
    public function index()
    {
        $data['judul'] = "Login";
        $this->view('templates/loginHeader', $data);
        $this->view('login/index',);
        $this->view('templates/loginFooter');
    }


    // login
    public function loginUser()
    {
        // var_dump($_POST);
        $cekDataUser['data'] = $this->model('Anggota_Model')->cekEmailUser($_POST);
        if ($_POST['email_user'] == $cekDataUser['data']['email_user']) {
            if (password_verify($_POST['password'], $cekDataUser['data']['password'])) {
                header('Location: ' . BASEURL . '/admin');
                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $cekDataUser['data']['id_user'];
                $_SESSION['nama_user'] = $cekDataUser['data']['nama'];
                exit;
            } else {
                header('Location: ' . BASEURL . '/login');
                FlashMessage::setSweetAlrert('Gagal Login', 'Password salah ! Lupa password?', 'error');
            }
        } else {
            header('Location: ' . BASEURL . '/login');
            FlashMessage::setSweetAlrert('Gagal Login', 'Email salah / Email tidak terdaftar', 'error');
        }
    }

    // logout
    public function logout()
    {
        unset($_SESSION['login']);
        unset($_SESSION['id_user']);
        unset($_SESSION['nama_user']);

        session_unset();
        session_destroy();

        header('Location: ' . BASEURL . '/login');
    }
}
