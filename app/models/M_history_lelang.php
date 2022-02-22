<?php

class M_history_lelang
{
    private $table = "tb_history_lelang";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addHistoryLelang($idLelang, $idBarang, $idUser, $penawaranHarga)
    {
        $this->db->query("INSERT INTO $this->table(id_lelang, id_barang, id_user ,penawaran_harga) VALUE (:id_lelang,:id_barang,:id_user,:penawaran_harga)");
        $this->db->bind('id_lelang', $idLelang);
        $this->db->bind('id_barang', $idBarang);
        $this->db->bind('id_user', $idUser);
        $this->db->bind('penawaran_harga', $penawaranHarga);

        return $this->db->execute();
    }

    public function getHistoryLelangByLelangId($id)
    {
        $this->db->query("SELECT * FROM $this->table INNER JOIN tb_masyarakat ON tb_history_lelang.id_user = tb_masyarakat.id_user WHERE id_lelang=:id ORDER BY penawaran_harga DESC LIMIT 10");
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

    public function getHistoryLelangByUserId($id)
    {
        $this->db->query("SELECT * FROM $this->table INNER JOIN tb_barang ON tb_history_lelang.id_barang = tb_barang.id_barang INNER JOIN tb_lelang ON tb_history_lelang.id_lelang = tb_lelang.id_lelang INNER JOIN tb_masyarakat ON tb_history_lelang.id_user = tb_masyarakat.id_user WHERE tb_masyarakat.id_user=:id");
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

    public function getHargaTertinggi($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id_lelang=:id ORDER BY penawaran_harga DESC LIMIT 1");
        $this->db->bind('id', $id);

        return $this->db->single();
    }
}
