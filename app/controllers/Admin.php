<?php

class Admin extends Controller
{

    public function __construct()
    {
        if (!empty($_SESSION['user'])) {
            header('location:'.BASE_URL.'/dashboard');
        }
    }

    public function index()
    {
        $data['title'] = 'Login Admin';

        if (isset($_POST['submit'])) {
            $username = stripslashes(strip_tags(htmlspecialchars($_POST['username'], ENT_QUOTES)));
            $password = stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES)));

            if (!empty($username) && !empty($password)) {
                $resultPetugas = $this->model('M_user')->loginPetugas(username: $username);

                if ($resultPetugas) {
                    if (password_verify($password, $resultPetugas['password'])) {
                        $_SESSION['user'] = $resultPetugas;

                        return header("location:".BASE_URL."/dashboard");
                    } else {
                        $data['error'] = true;
                        $data['message'] = "Username atau password salah";

                        return header("location:".BASE_URL."/admin");
                    }
                } else {
                    $data['error'] = true;
                    $data['message'] = "Username atau password salah";

                    return header("location:".BASE_URL."/admin");
                }
            } else {
                $data['error'] = true;
                $data['message'] = "Ada data yang belum di isi!";
            }
        }

        $this->view('layouts/auth/header', $data);
        $this->view('page/backend/login/admin', $data);
        $this->view('layouts/auth/footer', $data);
    }
}
