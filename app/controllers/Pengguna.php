<?php

class Pengguna extends Controller {

    public function __construct()
    {
        if(empty($_SESSION['user'])){
            header('location:../login');
        }
    }

    public function index()
    {
        $data['user'] = $_SESSION['user'];
        $data['title'] = 'Data Pengguna';
        
        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/pengguna/index', $data);
        $this->view('layouts/backend/footer');
    }
}