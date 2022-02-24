<?php

class Home extends Controller
{

    public function index()
    {
        $data['title'] = 'Home';
        $data['dataBarang'] = $this->model('M_lelang')->getLelangDiBuka();

        $this->view('layouts/frontend/header', $data);
        $this->view('page/frontend/index', $data);
        $this->view('layouts/frontend/footer');
    }
}
