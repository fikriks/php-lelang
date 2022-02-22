<?php

class Penawaran extends Controller
{

    public function __construct()
    {
        if (empty($_SESSION['user'])) {
            header('location:../login');
        }
    }

    public function store()
    {
        if (isset($_POST)) {
            $idLelang = stripslashes(strip_tags(htmlspecialchars($_POST['id'], ENT_QUOTES)));
            $penawaranHarga = stripslashes(strip_tags(htmlspecialchars($_POST['harga'], ENT_QUOTES)));

            $data = $this->model('M_lelang')->getDataLelangById($idLelang);

            $this->model('M_history_lelang')->addHistoryLelang($idLelang, $data['id_barang'], $_SESSION['user']['id_user'], $penawaranHarga);

            echo json_encode("Success");
        }
    }
}
