<?php

class Postingan_Model
{
    private $table_label = 'tb_labelpostingan';
    private $table_postingan = 'tb_postingan';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    // ====================postingan
    // label
    public function getAllLabel()
    {
        $query = "SELECT * FROM {$this->table_label} ORDER BY label_postingan ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getLabelById($id)
    {
        $query = "SELECT * FROM {$this->table_label} WHERE id_label = :id_label";
        $this->db->query($query);
        $this->db->bind('id_label', $id);
        return $this->db->single();
    }

    // tambah label
    public function add_label_postingan($data)
    {
        $label = htmlspecialchars($data['label_postingan']);
        $query = "INSERT INTO {$this->table_label} VALUES ('', :label_postingan)";
        $this->db->query($query);
        $this->db->bind('label_postingan', $label);

        $this->db->execute();
        return $this->db->rowCountdata();
    }

    public function total_postingan()
    {
        $query = "SELECT * FROM {$this->table_postingan} ORDER BY tgl_update DESC";
        $this->db->query($query);
        return $this->db->totaldata();
    }

    public function totalAllPostingan()
    {
        $query = "SELECT COUNT(*) FROM {$this->table_postingan}";
        $this->db->query($query);
        return $this->db->totaldata();
    }

    public function total_postinganByLabel($label)
    {
        $query = "SELECT * FROM {$this->table_postingan} WHERE label_postingan = :label_postingan ORDER BY tgl_update DESC";
        $this->db->query($query);
        $this->db->bind('label_postingan', $label);
        return $this->db->totaldata();
    }

    // get all postingan
    public function getAllPostingan()
    {
        $query = "SELECT * FROM {$this->table_postingan} ORDER BY tgl_update DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllPostByLabel($label)
    {
        $query = "SELECT * FROM {$this->table_postingan} WHERE label_postingan = :label_postingan ORDER BY tgl_update DESC";
        $this->db->query($query);
        $this->db->bind('label_postingan', $label);
        return $this->db->resultSet();
    }

    public function getSingleFoto($enkripsi)
    {
        $query = "SELECT * FROM {$this->table_postingan} WHERE enkripsi = :enkripsi";
        $this->db->query($query);
        $this->db->bind('enkripsi', $enkripsi);
        return $this->db->single();
    }


    // tambah postingan
    public function addNewPostingan($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = htmlspecialchars($data['nama_postingan']);
        $label = htmlspecialchars($data['label_postingan']);
        $foto = $this->uploadFoto();
        $tgl_update = date('Y-m-d H:i:s');
        $deskripsi = $data['deskripsi'];
        $enkripsi = md5($nama);

        if (!$foto) {
            return false;
        }

        $query = "INSERT INTO {$this->table_postingan} VALUES 
        ('', :nama_postingan, :label_postingan, :foto, :tgl_update, :deskripsi, :enkripsi)
        ";

        $this->db->query($query);
        $this->db->bind('nama_postingan', $nama);
        $this->db->bind('label_postingan', $label);
        $this->db->bind('foto', $foto);
        $this->db->bind('tgl_update', $tgl_update);
        $this->db->bind('deskripsi', $deskripsi);
        $this->db->bind('enkripsi', $enkripsi);

        $this->db->execute();
        return $this->db->rowCountdata();
    }

    // upload file foto
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
        $newfileName = 'postingan_';
        $newfileName .= uniqid();
        $newfileName .= '.';
        $newfileName .= $ekstensi_file;

        move_uploaded_file($temp, 'public/img/postingan/' . $newfileName);
        return $newfileName;
    }

    public function hapus_postingan($enkripsi, $namafile)
    {
        $pathFile = 'public/img/postingan/' . $namafile;

        unlink($pathFile);
        $query = "DELETE FROM {$this->table_postingan} WHERE enkripsi = :enkripsi";
        $this->db->query($query);
        $this->db->bind('enkripsi', $enkripsi);
        $this->db->execute();

        return $this->db->rowCountdata();
    }


    // =================================== Produk =======================================//

}
