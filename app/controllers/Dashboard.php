<?php

class Dashboard extends Controller {

    public function __construct()
    {
        if(empty($_SESSION['user'])){
            header('location:../login');
        }
    }

    public function index()
    {
        $data['user'] = $_SESSION['user'];
        $data['title'] = 'Dashboard';
        
        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/dashboard/index', $data);
        $this->view('layouts/backend/footer');
    }
}