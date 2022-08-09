<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Customer_Model
{
    private $table = 'tb_customermail';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function gettAllCustomer()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY waktu DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    // set kode kirim ke email
    public function sendEmailFromCustomer($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');
        //sesuaikan name dengan di form nya ya 
        $email = htmlspecialchars($data['email']);
        $alasan = htmlspecialchars($data['alasan']);
        $no_wa = htmlspecialchars($data['no_wa']);
        $namaCustomer = htmlspecialchars($data['nama_customer']);
        $judul = "Mail to Customer";
        $pesan = "Dear " . "<b>" . $namaCustomer . ".</b><br>";
        $pesan .= "Terima Kasih telah menghubungi kami. Pesan Anda telah kami terima. Anda bisa menghubungi Contact Person Kami di link berikut. ";

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'bagusagrisetamandiriofficial@gmail.com';                     //SMTP username
            $mail->Password   = 'qdlzgqmeiwlezijv';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //pengirim
            $mail->setFrom('bagusagrisetamandiriofficial@gmail.com', 'Bagus Agriseta Mandiri');
            $mail->addAddress($email);     //Add a recipient

            //Content
            $reservasiLink = 'http://bit.ly/bagusagristareservasi';
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $judul;
            $mail->Body    = $pesan . ' <strong>Link Reservasi</strong> ' . $reservasiLink;
            $mail->AltBody = '';
            //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
            //$mail->addAttachment(''); 


            $mail->send();
            $status = 1;
            // return 1;
            // header('Location: ' . BASEURL . '/login/forgotPassword');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $status = 0;
            return 0;
            exit;
        }
        //redirect ke halaman index.php
        // echo "<script>alert('Email berhasil terkirim!');</script>";
        $query = "INSERT INTO {$this->table} VALUES ('', :nama_customer, :email_customer, :no_wa, :waktu, :alasan_dihubungi, :status)";
        $this->db->query($query);
        $this->db->bind('email_customer', $email);
        $this->db->bind('nama_customer', $namaCustomer);
        $this->db->bind('no_wa', $no_wa);
        $this->db->bind('waktu', $waktu);
        $this->db->bind('alasan_dihubungi', $alasan);
        $this->db->bind('status', $status);

        $this->db->execute();

        return $this->db->rowCountdata();
    }

    public function deleteCustomer($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id_mail = :id_mail";
        $this->db->query($query);
        $this->db->bind('id_mail', $id);
        $this->db->execute();

        return $this->db->rowCountdata();
    }
}
