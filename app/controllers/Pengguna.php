<?php

class Pengguna extends Controller
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
        $data['dataPengguna'] = $this->model('M_user')->getDataPengguna();
        $data['title'] = 'Data Pengguna';
        $data['dataTable'] = true;

        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/pengguna/index', $data);
        $this->view('layouts/backend/footer', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Pengguna';
        $data['dataPengguna'] = $this->model('M_user')->getDataPenggunaById($id);

        if (!$data['dataPengguna']) {
            header("location:/pengguna");
        }

        $this->view('layouts/backend/header', $data);
        $this->view('page/backend/pengguna/edit', $data);
        $this->view('layouts/backend/footer');
    }

    public function update($id)
    {
        if (isset($_POST['submit'])) {
            $namaPengguna = stripslashes(strip_tags(htmlspecialchars($_POST['nama_pengguna'], ENT_QUOTES)));
            $username = stripslashes(strip_tags(htmlspecialchars($_POST['username'], ENT_QUOTES)));
            $telp = stripslashes(strip_tags(htmlspecialchars($_POST['telp'], ENT_QUOTES)));

            $resultCek = $this->model('M_user')->getDataPenggunaById($id);

            if ($username == $resultCek['username']) {
                if (!empty($_POST['password'])) {
                    $password = stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES)));
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $this->model('M_user')->updatePengguna($id, $namaPengguna, $username, $password, $telp);

                    $alert = [
                        'title' => 'Berhasil',
                        'text' => 'Berhasil memperbarui data pengguna',
                        'icon' => 'success',
                        'href' => '/pengguna'
                    ];

                    $_SESSION['alert'] = $alert;

                    header("location:/pengguna");
                } else {
                    $this->model('M_user')->updatePengguna($id, $namaPengguna, $username, null,  $telp);

                    $alert = [
                        'title' => 'Berhasil',
                        'text' => 'Berhasil memperbarui data pengguna',
                        'icon' => 'success',
                        'href' => '/pengguna'
                    ];

                    $_SESSION['alert'] = $alert;

                    header("location:/pengguna");
                }
            } else {
                $cekUsername = $this->model('M_user')->getDataPenggunaByUsername($username);

                if ($cekUsername) {
                    $alert = [
                        'title' => 'Gagal',
                        'text' => 'Username sudah terdaftar',
                        'icon' => 'error'
                    ];

                    $_SESSION['alert'] = $alert;

                    echo '<script>history.back()</script>';
                } else {
                    if (!empty($_POST['password'])) {
                        $password = stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES)));
                        $password = password_hash($password, PASSWORD_DEFAULT);

                        $this->model('M_user')->updatePengguna($id, $namaPengguna, $username, $password, $telp);

                        $alert = [
                            'title' => 'Berhasil',
                            'text' => 'Berhasil memperbarui data pengguna',
                            'icon' => 'success',
                            'href' => '/pengguna'
                        ];

                        $_SESSION['alert'] = $alert;

                        header("location:/pengguna");
                    } else {
                        $this->model('M_user')->updatePengguna($id, $namaPengguna, $username, null,  $telp);

                        $alert = [
                            'title' => 'Berhasil',
                            'text' => 'Berhasil memperbarui data pengguna',
                            'icon' => 'success',
                            'href' => '/pengguna'
                        ];

                        $_SESSION['alert'] = $alert;

                        header("location:/pengguna");
                    }
                }
            }
        }
    }

    public function delete()
    {
        $id = stripslashes(strip_tags(htmlspecialchars($_POST['id'], ENT_QUOTES)));

        $this->model('M_user')->deletePengguna($id);

        $alert = [
            'title' => 'Berhasil',
            'text' => 'Berhasil menghapus data pengguna',
            'icon' => 'success',
            'href' => '/pengguna'
        ];

        $_SESSION['alert'] = $alert;

        header("location:/pengguna");
    }
}
