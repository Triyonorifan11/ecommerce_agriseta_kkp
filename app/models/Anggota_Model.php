<?php

class Anggota_Model
{
    private $table = 'tb_users';
    // private $nama_jabatan = 'tb_jabatan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function gettAllAnggota()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY id_user DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function addAnggota($data)
    {
        $nama = htmlspecialchars($data['nama']);
        $email = htmlspecialchars($data['email_user']);
        $jk = htmlspecialchars($data['jk']);
        $no_hp = htmlspecialchars($data['no_hp']);
        $pass = htmlspecialchars($data['password']);
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $tgl_lahir = htmlspecialchars($data['tgl_lahir']);

        $query = "INSERT INTO {$this->table} VALUES ('', :email_user, :password, :nama, :jk, :no_hp, :tgl_lahir)";
        $this->db->query($query);
        $this->db->bind('email_user', $email);
        $this->db->bind('password', $password);
        $this->db->bind('nama', $nama);
        $this->db->bind('jk', $jk);
        $this->db->bind('no_hp', $no_hp);
        $this->db->bind('tgl_lahir', $tgl_lahir);

        $this->db->execute();

        return $this->db->rowCountdata();
    }

    public function deleteAnggota($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id_user = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCountdata();
    }



    // ======================== login  =========================

    public function cekEmailUser($data)
    {
        $email = htmlspecialchars($data['email_user']);

        $queryCekEmail = "SELECT * FROM {$this->table} WHERE email_user = :EMAIL";
        $this->db->query($queryCekEmail);
        $this->db->bind('EMAIL', $email);
        return $this->db->single();
    }
}
