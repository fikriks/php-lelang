<?php

class M_barang {
    private $table = "tb_barang";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataBarang()
    {
        $this->db->query("SELECT * FROM $this->table");
        
        return $this->db->resultSet();
    }

    public function getDataBarangBelumLelang()
    {
        $this->db->query("SELECT tb_lelang.*,tb_barang.nama_barang, tb_barang.id_barang as idbarang FROM $this->table LEFT JOIN tb_lelang ON tb_barang.id_barang = tb_lelang.id_barang WHERE id_lelang IS NULL");

        return $this->db->resultSet();
    }

    public function addBarang($namaGambar, $namaBarang, $tgl, $hargaAwal, $deskripsiBarang)
    {
        $this->db->query("INSERT INTO $this->table(gambar, nama_barang, tgl, harga_awal, deskripsi_barang) VALUE (:gambar, :nama_barang, :tgl, :harga_awal, :deskripsi_barang)");
        $this->db->bind('gambar', $namaGambar);
        $this->db->bind('nama_barang', $namaBarang);
        $this->db->bind('tgl', $tgl);
        $this->db->bind('harga_awal', $hargaAwal);
        $this->db->bind('deskripsi_barang', $deskripsiBarang);

        return $this->db->execute();
    }

    public function getDataBarangById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id_barang=:id");
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function updateBarang($id, $namaGambar, $namaBarang, $tgl, $hargaAwal, $deskripsiBarang)
    {
        if(empty($namaGambar)){
            $this->db->query("UPDATE $this->table SET nama_barang=:nama_barang, tgl=:tgl, harga_awal=:harga_awal, deskripsi_barang=:deskripsi_barang WHERE id_barang=:id");
            $this->db->bind('id', $id);
            $this->db->bind('nama_barang', $namaBarang);
            $this->db->bind('tgl', $tgl);
            $this->db->bind('harga_awal', $hargaAwal);
            $this->db->bind('deskripsi_barang', $deskripsiBarang);
        }else{
            $this->db->query("UPDATE $this->table SET gambar=:gambar, nama_barang=:nama_barang, tgl=:tgl, harga_awal=:harga_awal, deskripsi_barang=:deskripsi_barang WHERE id_barang=:id");
            $this->db->bind('id', $id);
            $this->db->bind('gambar', $namaGambar);
            $this->db->bind('nama_barang', $namaBarang);
            $this->db->bind('tgl', $tgl);
            $this->db->bind('harga_awal', $hargaAwal);
            $this->db->bind('deskripsi_barang', $deskripsiBarang);
        }
      
        return $this->db->execute();
    }

    public function deleteBarang($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE id_barang=:id");
        $this->db->bind('id', $id);

        return $this->db->execute();
    }
}