<?php

class Logout extends Controller {
    public function index()
    {
        session_destroy();
        session_unset();
            
        return header('location:../login');
    }
}