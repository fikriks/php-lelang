<?php

class Login extends Controller
{

    public function __construct()
    {
        if (!empty($_SESSION['user'])) {
            header('location:../dashboard');
        }
    }

    public function index()
    {
        $data['title'] = 'Login';

        if (isset($_POST['submit'])) {
            $username = stripslashes(strip_tags(htmlspecialchars($_POST['username'], ENT_QUOTES)));
            $password = stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES)));

            if (!empty($username) && !empty($password)) {
                $resultPetugas = $this->model('M_user')->loginPetugas(username: $username);

                if ($resultPetugas) {
                    if (password_verify($password, $resultPetugas['password'])) {
                        $_SESSION['user'] = $resultPetugas;

                        return header("location:../dashboard");
                    } else {
                        $data['error'] = true;
                        $data['message'] = "Username atau password salah";
                    }
                } else {
                    $resultUser = $this->model('M_user')->loginUser(username: $username);

                    if ($resultUser) {
                        if (password_verify($password, $resultUser['password'])) {
                            $_SESSION['user'] = $resultUser;

                            return header("location:../dashboard");
                        } else {
                            $data['error'] = true;
                            $data['message'] = "Username atau password salah";
                        }
                    } else {
                        $data['error'] = true;
                        $data['message'] = "Username atau password salah";
                    }
                }
            } else {
                $data['error'] = true;
                $data['message'] = "Ada data yang belum di isi!";
            }
        }

        $this->view('layouts/auth/header', $data);
        $this->view('page/backend/login/index', $data);
        $this->view('layouts/auth/footer', $data);
    }
}
