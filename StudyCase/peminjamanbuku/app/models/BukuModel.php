<?php

class BukuModel {

    private $table = 'tb_peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBuku()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getBukuById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahBuku($data)
    {
        $query = "INSERT INTO tb_peminjaman (nama_peminjaman, jenis_barang, no_barang, tgl_pinjam, tgl_kembali) VALUES(:nama_peminjaman, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali)";
        $this->db->query($query);
        $this->db->bind('nama_peminjaman', $data['nama_peminjaman']);
        $this->db->bind('jenis_barang',$data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->execute();
        return $this->db->rowCount();
    }


    //edit ini ya guys
    public function updateDataBuku($data)
    {
        $query = "UPDATE tb_peminjaman SET nama_peminjaman=:nama_peminjaman, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_peminjaman', $data['nama_peminjaman']);
        $this->db->bind('jenis_barang',$data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteBuku($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cari(){
        $buku = $_POST['tcari'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_peminjaman LIKE :nama_peminjaman OR jenis_barang LIKE :jenis_barang OR no_barang LIKE :no_barang");
        $this->db->bind('nama_peminjaman', '%' . $buku . '%');
        $this->db->bind('jenis_barang', '%' . $buku . '%');
        $this->db->bind('no_barang', '%' . $buku . '%');
        return $this->db->resultSet();
    }
    
}