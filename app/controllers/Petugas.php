<?php

class Petugas extends Controller {

    public function __construct()
    {
        if(empty($_SESSION['user'])){
            header('location:../login');
        }
    }

    public function index()
    {
        $data['user'] = $_SESSION['user'];
        $data['title'] = 'Data Petugas';
        
        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/petugas/index', $data);
        $this->view('layouts/backend/footer');
    }
}