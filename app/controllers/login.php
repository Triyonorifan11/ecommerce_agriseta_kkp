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
}
