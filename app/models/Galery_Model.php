<?php

class Galery_Model
{
    private $table = 'tb_galery';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGalery()
    {
        $query = "SELECT * from {$this->table}";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getSingleFoto($enkripsi)
    {
        $query = "SELECT * FROM {$this->table} WHERE enkripsi = :enkripsi";
        $this->db->query($query);
        $this->db->bind('enkripsi', $enkripsi);
        return $this->db->single();
    }

    public function inserGalery($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = htmlspecialchars($data['nama_galery']);
        $label = htmlspecialchars($data['label_postingan']);
        $foto = $this->uploadFoto();
        $tgl_update = date('Y-m-d H:i:s');

        $enkripsi = uniqid() . md5($nama);

        if (!$foto) {
            return false;
        }

        $query = "INSERT INTO {$this->table} VALUES 
        ('', :nama_galery, :label_postingan, :foto, :tgl_update, :enkripsi)
        ";

        $this->db->query($query);
        $this->db->bind('nama_galery', $nama);
        $this->db->bind('label_postingan', $label);
        $this->db->bind('foto', $foto);
        $this->db->bind('tgl_update', $tgl_update);

        $this->db->bind('enkripsi', $enkripsi);

        $this->db->execute();
        return $this->db->rowCountdata();
    }

    public function uploadFoto()
    {
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $temp = $_FILES['foto']['tmp_name'];

        // cek ekstensi file
        $ekstensiFileValid = ['png', 'jpeg', 'jpg', 'svg'];
        $ekstensi_file = explode('.', $fileName);
        $ekstensi_file = strtolower(end($ekstensi_file));


        if ($error === 4) {
            echo "<script>
                    alert('silahkan upload gambar terlebih dahulu !!');
                </script>";
            return false;
            exit;
        }


        if (!in_array($ekstensi_file, $ekstensiFileValid)) {
            echo "<script>
                alert('tipe ekstensi salah, harus .png , .jpg , .jpeg , .svg');
            </script>";
            return false;
            exit;
        }


        // cek ukuran gambar
        if ($fileSize > 3000000) {
            echo "<script>
                 alert('Size file terlalu besar !!');
              </script>";
            return 0;
            exit;
        }

        // jika tidak false
        // generate nama file
        $newfileName = 'galery_';
        $newfileName .= uniqid();
        $newfileName .= '.';
        $newfileName .= $ekstensi_file;

        move_uploaded_file($temp, 'public/img/galery/' . $newfileName);
        return $newfileName;
    }

    public function hapus_galery($enkripsi, $namafile)
    {
        $pathFile = 'public/img/galery/' . $namafile;

        unlink($pathFile);
        $query = "DELETE FROM {$this->table} WHERE enkripsi = :enkripsi";
        $this->db->query($query);
        $this->db->bind('enkripsi', $enkripsi);
        $this->db->execute();

        return $this->db->rowCountdata();
    }
}
