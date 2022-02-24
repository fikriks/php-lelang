<?php

class M_lelang
{
    private $table = "tb_lelang";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataLelang()
    {
        $this->db->query("SELECT * FROM $this->table INNER JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang LEFT JOIN tb_masyarakat ON tb_lelang.id_user = tb_masyarakat.id_user INNER JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas");

        return $this->db->resultSet();
    }

    public function addLelang(int $idBarang, string $tgl, int $idPetugas, string $status)
    {
        $this->db->query("INSERT INTO $this->table(id_barang, tgl_lelang, id_petugas, status) VALUE (:id_barang, :tgl_lelang, :id_petugas, :status)");
        $this->db->bind('id_barang', $idBarang);
        $this->db->bind('tgl_lelang', $tgl);
        $this->db->bind('id_petugas', $idPetugas);
        $this->db->bind('status', $status);

        return $this->db->execute();
    }

    public function getDataLelangById(int $id)
    {
        $this->db->query("SELECT * FROM $this->table INNER JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang LEFT JOIN tb_masyarakat ON tb_lelang.id_user = tb_masyarakat.id_user INNER JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas WHERE tb_lelang.id_lelang=:id");
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function getDataHistoryLelang(int $id)
    {
        $this->db->query("SELECT * FROM tb_history_lelang INNER JOIN tb_barang ON tb_history_lelang.id_barang = tb_barang.id_barang LEFT JOIN tb_masyarakat ON tb_history_lelang.id_user = tb_masyarakat.id_user INNER JOIN tb_lelang ON tb_history_lelang.id_lelang = tb_lelang.id_lelang WHERE tb_history_lelang.id_lelang=:id ORDER BY penawaran_harga DESC");
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

    public function getLelangDiBuka()
    {
        $this->db->query("SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang LEFT JOIN tb_masyarakat ON tb_lelang.id_user = tb_masyarakat.id_user INNER JOIN tb_petugas ON tb_lelang.id_petugas = tb_petugas.id_petugas WHERE tb_lelang.status='dibuka'");

        return $this->db->resultSet();
    }

    public function updateLelang(int $id, int $idBarang, string $tgl, string $status)
    {
        $this->db->query("UPDATE $this->table SET id_barang=:id_barang, tgl_lelang=:tgl, status=:status WHERE id_lelang=:id");
        $this->db->bind('id', $id);
        $this->db->bind('id_barang', $idBarang);
        $this->db->bind('tgl', $tgl);
        $this->db->bind('status', $status);

        return $this->db->execute();
    }

    public function deleteLelang(int $id)
    {
        $this->db->query("DELETE FROM $this->table WHERE id_lelang=:id");
        $this->db->bind('id', $id);

        return $this->db->execute();
    }
}
