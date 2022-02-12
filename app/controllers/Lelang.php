<?php

class Barang extends Controller {

    public function __construct()
    {
        if(empty($_SESSION['user'])){
            header('location:../login');
        }
    }

    public function index()
    {
        $data['user'] = $_SESSION['user'];
        $data['title'] = 'Data Lelang';
        
        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/lelang/index', $data);
        $this->view('layouts/backend/footer');
    }
}