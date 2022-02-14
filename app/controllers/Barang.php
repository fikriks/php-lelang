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
        $data['title'] = 'Data Barang';
        $data['dataBarang'] = $this->model('M_barang')->getDataBarang();
        $data['dataTable'] = true;
        
        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/barang/index', $data);
        $this->view('layouts/backend/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Barang';

        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/barang/create', $data);
        $this->view('layouts/backend/footer');
    }

    public function store()
    {
        if(isset($_POST['submit'])){
            $tgl = stripslashes(strip_tags(htmlspecialchars($_POST['tgl'] ,ENT_QUOTES)));
            $namaBarang = stripslashes(strip_tags(htmlspecialchars($_POST['nama_barang'] ,ENT_QUOTES)));
            $hargaAwal = stripslashes(strip_tags(htmlspecialchars($_POST['harga_awal'] ,ENT_QUOTES)));
            $deskripsiBarang = stripslashes(strip_tags(htmlspecialchars($_POST['deskripsi_barang'] ,ENT_QUOTES)));
            
            $this->model('M_barang')->addBarang($namaBarang, $tgl, $hargaAwal, $deskripsiBarang);
            
            $alert = [
                'title' => 'Berhasil',
                'text' => 'Berhasil menambah data barang',
                'icon' => 'success',
                'href' => '/barang'
            ];

            $_SESSION['alert'] = $alert;

            header("location:/barang");
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Barang';
        $data['dataBarang'] = $this->model('M_barang')->getDataBarangById($id);

        if(!$data['dataBarang']){
            header("location:/barang");
        }

        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/barang/edit', $data);
        $this->view('layouts/backend/footer');
    }

    public function update($id)
    {
        if(isset($_POST['submit'])){
            $tgl = stripslashes(strip_tags(htmlspecialchars($_POST['tgl'] ,ENT_QUOTES)));
            $namaBarang = stripslashes(strip_tags(htmlspecialchars($_POST['nama_barang'] ,ENT_QUOTES)));
            $hargaAwal = stripslashes(strip_tags(htmlspecialchars($_POST['harga_awal'] ,ENT_QUOTES)));
            $deskripsiBarang = stripslashes(strip_tags(htmlspecialchars($_POST['deskripsi_barang'] ,ENT_QUOTES)));

            $this->model('M_barang')->updateBarang($id, $namaBarang, $tgl, $hargaAwal, $deskripsiBarang);
            
            $alert = [
                'title' => 'Berhasil',
                'text' => 'Berhasil memperbarui data barang',
                'icon' => 'success',
                'href' => '/barang'
            ];

            $_SESSION['alert'] = $alert;

            header("location:/barang");
        }
    }

    public function delete()
    {
        $id = stripslashes(strip_tags(htmlspecialchars($_POST['id'] ,ENT_QUOTES)));

        $this->model('M_barang')->deleteBarang($id);

        $alert = [
            'title' => 'Berhasil',
            'text' => 'Berhasil memperbarui data barang',
            'icon' => 'success',
            'href' => '/barang'
        ];

        $_SESSION['alert'] = $alert;

        header("location:/barang");
    }
}