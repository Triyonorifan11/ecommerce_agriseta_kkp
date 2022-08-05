<?php

class Produk_Model
{
    private $table_label = 'tb_labelproduk';
    private $table_produk = 'tb_produk';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }



    // label
    public function getAllLabel()
    {
        $query = "SELECT * FROM {$this->table_label} ORDER BY label_produk ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    // tambah label
    public function add_label_produk($data)
    {
        $label = htmlspecialchars($data['label_produk']);
        $query = "INSERT INTO {$this->table_label} VALUES ('', :label_produk)";
        $this->db->query($query);
        $this->db->bind('label_produk', $label);

        $this->db->execute();
        return $this->db->rowCountdata();
    }

    // get all produk
    public function getAllProduk()
    {
        $query = "SELECT * FROM {$this->table_produk} ORDER BY tgl_update DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    // get produk limit
    public function getProdukLimit()
    {
        $query = "SELECT * FROM {$this->table_produk} ORDER BY tgl_update DESC LIMIT 0,6";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function totalProduk($label)
    {
        $query = "SELECT * FROM {$this->table_produk} WHERE label_produk = :label_produk";
        $this->db->query($query);
        $this->db->bind('label_produk', $label);
        return $this->db->totaldata();
    }

    public function getProdukByLabel($label)
    {
        $query = "SELECT * FROM {$this->table_produk} WHERE label_produk = :label_produk ORDER BY tgl_update";
        $this->db->query($query);
        $this->db->bind('label_produk', $label);
        return $this->db->resultSet();
    }

    public function getSingleFoto($enkripsi)
    {
        $query = "SELECT * FROM {$this->table_produk} WHERE enkripsi_produk = :enkripsi_produk";
        $this->db->query($query);
        $this->db->bind('enkripsi_produk', $enkripsi);
        return $this->db->single();
    }


    // tambah postingan
    public function addNewProduk($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = htmlspecialchars($data['nama_produk']);
        $label = htmlspecialchars($data['label_produk']);
        $foto = $this->uploadFoto();
        $harga_produk = htmlspecialchars($data['harga_produk']);
        $tgl_update = date('Y-m-d H:i:s');
        $deskripsi = $data['deskripsi_produk'];
        $enkripsi = uniqid() . md5($foto);

        if (!$foto) {
            return false;
        }

        $query = "INSERT INTO {$this->table_produk} VALUES 
        ('', :nama_produk, :label_produk, :foto_produk, :harga_produk, :deskripsi_produk, :tgl_update, :enkripsi_produk)
        ";

        $this->db->query($query);
        $this->db->bind('nama_produk', $nama);
        $this->db->bind('label_produk', $label);
        $this->db->bind('foto_produk', $foto);
        $this->db->bind('harga_produk', $harga_produk);
        $this->db->bind('tgl_update', $tgl_update);
        $this->db->bind('deskripsi_produk', $deskripsi);
        $this->db->bind('enkripsi_produk', $enkripsi);

        $this->db->execute();
        return $this->db->rowCountdata();
    }

    // upload file foto
    public function uploadFoto()
    {
        $fileName = $_FILES['foto_produk']['name'];
        $fileSize = $_FILES['foto_produk']['size'];
        $error = $_FILES['foto_produk']['error'];
        $temp = $_FILES['foto_produk']['tmp_name'];

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
        $newfileName = 'produk_';
        $newfileName .= uniqid();
        $newfileName .= '.';
        $newfileName .= $ekstensi_file;

        move_uploaded_file($temp, 'public/img/produk/' . $newfileName);
        return $newfileName;
    }

    public function hapus_produk($enkripsi, $namafile)
    {
        $pathFile = 'public/img/produk/' . $namafile;

        unlink($pathFile);
        $query = "DELETE FROM {$this->table_produk} WHERE enkripsi_produk = :enkripsi_produk";
        $this->db->query($query);
        $this->db->bind('enkripsi_produk', $enkripsi);
        $this->db->execute();

        return $this->db->rowCountdata();
    }


    // =================================== Produk =======================================//

}
