<?php

class Riwayat extends Controller
{

    public function __construct()
    {
        if (empty($_SESSION['user'])) {
            header('location:../login');
        } else if (!empty($_SESSION['user']['level'])) {
            header('location:../dashboard');
        }
    }

    public function index()
    {
        $userId = $_SESSION['user']['id_user'];
        $data['history'] = $this->model('M_history_lelang')->getHistoryLelangByUserId($userId);
        $data['title'] = 'Riwayat Penawaran';
        $data['dataTable'] = true;

        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/riwayat/index', $data);
        $this->view('layouts/backend/footer', $data);
    }
}
