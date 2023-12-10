<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Include librari phpmailer
include('mail/Exception.php');
include('mail/PHPMailer.php');
include('mail/SMTP.php');
$email_pengirim = 'mahalulkarim02@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'Rizaldi Maulidia Achmad'; // Isikan dengan nama pengirim
$email_penerima = 'mahalulkarim01@gmail.com'; // Ambil email penerima dari inputan form
$subjek = 'halo'; // Ambil subjek dari inputan form
$pesan = 'isi'; // Ambil pesan dari inputan form
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'BRUKUTAN'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
// Load file content.php
$mail->Subject = $subjek;
$mail->Body = 'isi halo';
$send = $mail->send();
if ($send) { // Jika Email berhasil dikirim
    echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
} else { // Jika Email gagal dikirim
    echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
}
