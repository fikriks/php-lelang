<?php

class Laporan extends Controller {

    public function __construct()
    {
        if(empty($_SESSION['user'])){
            header('location:../login');
        }
    }

    public function index()
    {
        $data['user'] = $_SESSION['user'];
        $data['title'] = 'Laporan';
        
        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/laporan/index', $data);
        $this->view('layouts/backend/footer');
    }
}