<?php

class User{
    private $tablePetugas = 'tb_petugas';
    private $tableUser = 'tb_masyarakat';
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginPetugas($username)
    {
        $this->db->query("SELECT * FROM $this->tablePetugas INNER JOIN tb_level ON tb_level.id_level = tb_petugas.id_level WHERE username=:username");
        $this->db->bind('username',$username);

        return $this->db->single();
    }

    public function loginUser($username)
    {
        $this->db->query("SELECT * FROM $this->tableUser WHERE username=:username");
        $this->db->bind('username',$username);

        return $this->db->single();
    }

    public function registerUser($namaLengkap, $username, $password, $noTelepon)
    {
        $this->db->query("INSERT INTO $this->tableUser (nama_lengkap, username, password, telp) VALUES (:nama_lengkap, :username, :password, :telp)");
        $this->db->bind('nama_lengkap', $namaLengkap);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('telp', $noTelepon);

        return $this->db->execute();
    }

    public function cekUser($username)
    {
         $this->db->query("SELECT * FROM $this->tableUser WHERE username=:username");
        $this->db->bind('username',$username);
        
        return $this->db->single();
    }
}