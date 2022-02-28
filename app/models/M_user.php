<?php

class M_user
{
    private $tablePetugas = "tb_petugas";
    private $tableUser = "tb_masyarakat";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginPetugas(string $username)
    {
        $this->db->query("SELECT * FROM $this->tablePetugas INNER JOIN tb_level ON tb_level.id_level = tb_petugas.id_level WHERE username=:username");
        $this->db->bind("username", $username);

        return $this->db->single();
    }

    public function loginUser(string $username)
    {
        $this->db->query("SELECT * FROM $this->tableUser WHERE username=:username");
        $this->db->bind("username", $username);

        return $this->db->single();
    }

    public function registerUser(string $namaLengkap, string $username, string $password, string $noTelepon)
    {
        $this->db->query("INSERT INTO $this->tableUser (nama_lengkap, username, password, telp) VALUES (:nama_lengkap, :username, :password, :telp)");
        $this->db->bind("nama_lengkap", $namaLengkap);
        $this->db->bind("username", $username);
        $this->db->bind("password", $password);
        $this->db->bind("telp", $noTelepon);

        return $this->db->execute();
    }

    public function cekUser(string $username)
    {
        $this->db->query("SELECT * FROM $this->tableUser WHERE username=:username");
        $this->db->bind("username", $username);

        return $this->db->single();
    }

    public function getDataPengguna()
    {
        $this->db->query("SELECT * FROM $this->tableUser");

        return $this->db->resultSet();
    }

    public function getDataPenggunaById(int $id)
    {
        $this->db->query("SELECT * FROM $this->tableUser WHERE id_user=:id");
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function getDataPenggunaByUsername(string $username)
    {
        $this->db->query("SELECT * FROM $this->tableUser WHERE username=:username");
        $this->db->bind('username', $username);

        return $this->db->single();
    }

    public function updatePengguna(int $id, string $namaLengkap, string $username, string $password, string $telp)
    {
        if (is_null($password)) {
            $this->db->query("UPDATE $this->tableUser SET nama_lengkap=:nama_lengkap, username=:username, telp=:telp WHERE id_user=:id");
            $this->db->bind('id', $id);
            $this->db->bind('nama_lengkap', $namaLengkap);
            $this->db->bind('username', $username);
            $this->db->bind('telp', $telp);
        } else {
            $this->db->query("UPDATE $this->tableUser SET nama_lengkap=:nama_lengkap, username=:username, password=:password, telp=:telp WHERE id_user=:id");
            $this->db->bind('id', $id);
            $this->db->bind('nama_lengkap', $namaLengkap);
            $this->db->bind('username', $username);
            $this->db->bind('password', $password);
            $this->db->bind('telp', $telp);
        }

        return $this->db->execute();
    }

    public function deletePengguna(int $id)
    {
        $this->db->query("DELETE FROM $this->tableUser WHERE id_user=:id");
        $this->db->bind('id', $id);

        return $this->db->execute();
    }
}
