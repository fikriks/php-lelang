<?php

class Detail extends Controller
{

    public function index(int $id = null)
    {
        if (is_null($id)) {
            header("location:/");
        }

        $data['title'] = 'Dashboard';
        $data['dataLelang'] = $this->model('M_lelang')->getDataLelangById(id: $id);
        $data['historyLelang'] = $this->model('M_history_lelang')->getHistoryLelangByLelangId(id: $id);
        $data['hargaTertinggi'] = $this->model('M_history_lelang')->getHargaTertinggi(id: $id);

        if (!$data['dataLelang']) {
            header("location:/");
        }

        $this->view('layouts/frontend/header', $data);
        $this->view('page/frontend/detail', $data);
        $this->view('layouts/frontend/footer', $data);
    }
}
