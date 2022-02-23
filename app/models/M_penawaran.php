<?php

class M_penawaran
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addPenawaran(int $idLelang, int $idUser, int $hargaAkhir)
    {
        $this->db->query("UPDATE tb_lelang set harga_akhir=:harga, id_user=:id_user WHERE id_lelang=:id_lelang");
        $this->db->bind('id_lelang', $idLelang);
        $this->db->bind('id_user', $idUser);
        $this->db->bind('harga', $hargaAkhir);

        return $this->db->execute();
    }
}
