<?php

class M_petugas {
    private $table = "tb_petugas";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataPetugas()
    {
        $this->db->query("SELECT * FROM $this->table INNER JOIN tb_level ON $this->table.id_level = tb_level.id_level");
        
        return $this->db->resultSet();
    }

    public function cekPetugasByUsername($username)
    {
        $this->db->query("SELECT * FROM $this->table WHERE username=:username");
        $this->db->bind("username",$username);
        
        return $this->db->single();
    }

    public function cekPetugaById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id_petugas=:id");
        $this->db->bind("id",$id);
        
        return $this->db->single();
    }

    public function addPetugas($namaPetugas, $username, $password, $idLevel)
    {
        $this->db->query("INSERT INTO $this->table(nama_petugas, username, password, id_level) VALUE (:nama_petugas, :username, :password, :id_level)");
        $this->db->bind('nama_petugas', $namaPetugas);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('id_level', $idLevel);

        return $this->db->execute();
    }

    public function getDataPetugasById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id_petugas=:id");
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function updatePetugas($id, $namaPetugas, $username, $password, $idLevel)
    {
        if(empty($password)){
            $this->db->query("UPDATE $this->table SET nama_petugas=:nama_petugas, username=:username, id_level=:id_level WHERE id_petugas=:id");
            $this->db->bind('id', $id);
            $this->db->bind('nama_petugas', $namaPetugas);
            $this->db->bind('username', $username);
            $this->db->bind('id_level', $idLevel);
        } else {
            $this->db->query("UPDATE $this->table SET nama_petugas=:nama_petugas, username=:username, password=:password, id_level=:id_level WHERE id_petugas=:id");
            $this->db->bind('id', $id);
            $this->db->bind('nama_petugas', $namaPetugas);
            $this->db->bind('username', $username);
            $this->db->bind('password', $password);
            $this->db->bind('id_level', $idLevel);
        }
       
        return $this->db->execute();
    }

    public function deletePetugas($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE id_petugas=:id");
        $this->db->bind('id', $id);

        return $this->db->execute();
    }
}