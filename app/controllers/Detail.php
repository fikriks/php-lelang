<?php

class Detail extends Controller
{

    public function index($id)
    {
        $data['title'] = 'Dashboard';
        $data['dataLelang'] = $this->model('M_lelang')->getDataLelangById($id);
        $data['historyLelang'] = $this->model('M_history_lelang')->getHistoryLelangByLelangId($id);
        $data['hargaTertinggi'] = $this->model('M_history_lelang')->getHargaTertinggi($id);

        $this->view('layouts/frontend/header', $data);
        $this->view('page/frontend/detail', $data);
        $this->view('layouts/frontend/footer', $data);
    }
}
