<?php

class Profile_Model
{

    private $table = 'tb_profile';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProfileSinggle()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);
        return $this->db->single();
    }

    public function uploadFoto()
    {
        $fileName = $_FILES['foto_pemilik']['name'];
        $fileSize = $_FILES['foto_pemilik']['size'];
        $error = $_FILES['foto_pemilik']['error'];
        $temp = $_FILES['foto_pemilik']['tmp_name'];

        // cek ekstensi file
        $ekstensiFileValid = ['png', 'jpeg', 'jpg', 'svg'];
        $ekstensi_file = explode('.', $fileName);
        $ekstensi_file = strtolower(end($ekstensi_file));


        if ($error === 4) {
            echo "<script>
                    alert('silahkan upload gambar terlebih dahulu !!');
                </script>";
            return false;
        }


        if (!in_array($ekstensi_file, $ekstensiFileValid)) {
            echo "<script>
                alert('tipe ekstensi salah, harus .png , .jpg , .jpeg , .svg');
            </script>";
            return false;
        }


        // cek ukuran gambar
        if ($fileSize > 3000000) {
            echo "<script>
                 alert('Size file terlalu besar !!');
              </script>";
            return false;
        }

        // jika tidak false
        // generate nama file
        $newfileName = 'profil_';
        $newfileName .= uniqid();
        $newfileName .= '.';
        $newfileName .= $ekstensi_file;

        move_uploaded_file($temp, 'public/img/profile/' . $newfileName);
        return $newfileName;
    }

    public function updateProfile($data)
    {
        $nama_pemilik = htmlspecialchars($data['nama_pemilik']);
        $nama_perusahaan = htmlspecialchars($data['nama_perusahaan']);
        $bidang_usaha = htmlspecialchars($data['bidang_usaha']);
        $alamat_kantor = htmlspecialchars($data['alamat_kantor']);
        $no_telp = htmlspecialchars($data['no_telp']);
        $no_hp = htmlspecialchars($data['no_hp']);
        $kode_pos = htmlspecialchars($data['kode_pos']);
        $email = htmlspecialchars($data['email']);
        $luas_tanah = htmlspecialchars($data['luas_tanah']);
        $luas_bangunan = htmlspecialchars($data['luas_bangunan']);
        $old_foto = htmlspecialchars($data['old_foto']);
        $id_profile = $data['id_profile'];

        // cek user pilih gambar baru atau tidak
        if ($_FILES["foto_pemilik"]["error"] === 4) {
            $foto_pemilik = $old_foto;
        } else {
            $foto_pemilik = $this->uploadFoto();
            $pathFile = 'public/img/profile/' . $old_foto;
            unlink($pathFile);
        }

        $query = "UPDATE {$this->table} SET 
                  nama_pemilik = :nama_pemilik,
                  nama_perusahaan = :nama_perusahaan,
                  bidang_usaha = :bidang_usaha,
                  alamat_kantor = :alamat_kantor,
                  no_telp = :no_telp,
                  no_hp = :no_hp,
                  kode_pos = :kode_pos,
                  email = :email,
                  luas_tanah = :luas_tanah,
                  luas_bangunan = :luas_bangunan,
                  foto_pemilik = :foto_pemilik
                  WHERE id_profile = :id_profile
                ";

        $this->db->query($query);
        $this->db->bind('nama_pemilik', $nama_pemilik);
        $this->db->bind('nama_perusahaan', $nama_perusahaan);
        $this->db->bind('bidang_usaha', $bidang_usaha);
        $this->db->bind('alamat_kantor', $alamat_kantor);
        $this->db->bind('no_telp', $no_telp);
        $this->db->bind('no_hp', $no_hp);
        $this->db->bind('kode_pos', $kode_pos);
        $this->db->bind('email', $email);
        $this->db->bind('luas_tanah', $luas_tanah);
        $this->db->bind('luas_bangunan', $luas_bangunan);
        $this->db->bind('foto_pemilik', $foto_pemilik);
        $this->db->bind('id_profile', $id_profile);

        $this->db->execute();

        return $this->db->rowCountdata();
    }
}
