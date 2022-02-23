<?php

class Barang extends Controller
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
        $data['title'] = 'Data Barang';
        $data['dataBarang'] = $this->model('M_barang')->getDataBarang();
        $data['dataTable'] = true;

        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/barang/index', $data);
        $this->view('layouts/backend/footer', $data);
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
        if (isset($_POST['submit'])) {
            $tmp = $_FILES['gambar_barang']['tmp_name'];
            $upload = 'assets/images/barang/';
            $ext = pathinfo($_FILES['gambar_barang']['name'], PATHINFO_EXTENSION);

            $tgl = stripslashes(strip_tags(htmlspecialchars($_POST['tgl'], ENT_QUOTES)));
            $namaBarang = stripslashes(strip_tags(htmlspecialchars($_POST['nama_barang'], ENT_QUOTES)));
            $hargaAwal = stripslashes(strip_tags(htmlspecialchars($_POST['harga_awal'], ENT_QUOTES)));
            $deskripsiBarang = stripslashes(strip_tags(htmlspecialchars($_POST['deskripsi_barang'], ENT_QUOTES)));
            $namaGambar = time() . '-' . $this->textToSlug($namaBarang) . '.' . $ext;

            $this->model('M_barang')->addBarang(namaGambar: $namaGambar, namaBarang: $namaBarang, tgl: $tgl, hargaAwal: $hargaAwal, deskripsiBarang: $deskripsiBarang);

            $proses = move_uploaded_file($tmp, $upload . $namaGambar);

            if ($proses) {
                $alert = [
                    'title' => 'Berhasil',
                    'text' => 'Berhasil menambah data barang',
                    'icon' => 'success',
                    'href' => '/barang'
                ];

                $_SESSION['alert'] = $alert;

                header("location:/barang");
            } else {
                $alert = [
                    'title' => 'Gagal',
                    'text' => 'Gagal menambah data barang',
                    'icon' => 'error'
                ];

                $_SESSION['alert'] = $alert;

                echo '<script>history.back()</script>';
            }
        }
    }

    public function edit(int $id)
    {
        $data['title'] = 'Edit Data Barang';
        $data['dataBarang'] = $this->model('M_barang')->getDataBarangById($id);

        if (!$data['dataBarang']) {
            header("location:/barang");
        }

        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/barang/edit', $data);
        $this->view('layouts/backend/footer');
    }

    public function update(int $id)
    {
        if (isset($_POST['submit'])) {
            $tgl = stripslashes(strip_tags(htmlspecialchars($_POST['tgl'], ENT_QUOTES)));
            $namaBarang = stripslashes(strip_tags(htmlspecialchars($_POST['nama_barang'], ENT_QUOTES)));
            $hargaAwal = stripslashes(strip_tags(htmlspecialchars($_POST['harga_awal'], ENT_QUOTES)));
            $deskripsiBarang = stripslashes(strip_tags(htmlspecialchars($_POST['deskripsi_barang'], ENT_QUOTES)));

            if (isset($_FILES['gambar_barang'])) {
                $tmp = $_FILES['gambar_barang']['tmp_name'];
                $upload = 'assets/images/barang/';
                $ext = pathinfo($_FILES['gambar_barang']['name'], PATHINFO_EXTENSION);

                $namaGambar = time() . '-' . $this->textToSlug(text: $namaBarang) . '.' . $ext;

                $ambilGambar = $this->model('M_barang')->getDataBarangById(id: $id);

                unlink('assets/images/barang/' . $ambilGambar['gambar']);

                $this->model('M_barang')->updateBarang(id: $id, namaGambar: $namaGambar, namaBarang: $namaBarang, tgl: $tgl, hargAwal: $hargaAwal, deskripsiBarang: $deskripsiBarang);

                $proses = move_uploaded_file($tmp, $upload . $namaGambar);

                if ($proses) {
                    $alert = [
                        'title' => 'Berhasil',
                        'text' => 'Berhasil memperbarui data barang',
                        'icon' => 'success',
                        'href' => '/barang'
                    ];

                    $_SESSION['alert'] = $alert;

                    header("location:/barang");
                } else {
                    $alert = [
                        'title' => 'Gagal',
                        'text' => 'Gagal memperbarui data barang',
                        'icon' => 'error'
                    ];

                    $_SESSION['alert'] = $alert;

                    echo '<script>history.back()</script>';
                }
            } else {
                $this->model('M_barang')->updateBarang(id: $id, namaGambar: null, namaBarang: $namaBarang, tgl: $tgl, hargaAwal: $hargaAwal, deskripsiBarang: $deskripsiBarang);

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
    }

    public function delete()
    {
        $id = stripslashes(strip_tags(htmlspecialchars($_POST['id'], ENT_QUOTES)));

        $this->model('M_barang')->deleteBarang(id: $id);

        $alert = [
            'title' => 'Berhasil',
            'text' => 'Berhasil menghapus data barang',
            'icon' => 'success',
            'href' => '/barang'
        ];

        $_SESSION['alert'] = $alert;

        header("location:/barang");
    }

    function textToSlug(?string $text)
    {
        $text = trim($text);
        if (empty($text)) return '';
        $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
        $text = strtolower(trim($text));
        $text = str_replace(' ', '-', $text);
        $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
        return $text;
    }
}
