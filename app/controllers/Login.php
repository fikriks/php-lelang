<?php

class Login extends Controller {

    public function index()
    {
        $data['title'] = 'Login';

        if(isset($_POST['submit'])){
            $username = stripslashes(strip_tags(htmlspecialchars($_POST['username'] ,ENT_QUOTES)));
            $password = stripslashes(strip_tags(htmlspecialchars($_POST['password'] ,ENT_QUOTES)));

            if(!empty($username) && !empty($password)){
                $resultPetugas = $this->model('User')->loginPetugas($username, md5($password));
    
                if($resultPetugas){
                    $_SESSION['user'] = $resultPetugas;
                    
                    return header('location:../dashboard');
                }else{
                    $resultUser = $this->model('User')->loginUser($username, md5($password));
                    
                    if($resultUser){
                        $_SESSION['user'] = $resultUser;
                        
                        return header('location:../dashboard');
                    } else {
                        $data['error'] = true;
                        $data['message'] = "Username atau password salah";
                    }
                }
            }else{
                $data['error'] = true;
                $data['message'] = "Ada data yang belum di isi!";
            }
        }

        $this->view('layouts/auth/header', $data);
        $this->view('page/backend/login/index', $data);
        $this->view('layouts/auth/footer', $data);
    }
}