<?php

class Laporan extends Controller
{

    public function __construct()
    {
        if (empty($_SESSION['user'])) {
            header('location:../login');
        } else if (empty($_SESSION['user']['level'])) {
            header('location:../dashboard');
        }
    }

    public function index()
    {
        $data['title'] = 'Laporan';
        $data['dataLaporan'] = $this->model('M_laporan')->getData();
        $data['dataTable'] = true;

        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/laporan/index', $data);
        $this->view('layouts/backend/footer', $data);
    }

    public function cetak()
    {
        $data['title'] = 'Laporan';
        $data['dataLaporan'] = $this->model('M_laporan')->getData();

        $this->view('page/backend/laporan/cetak', $data);
    }
}
