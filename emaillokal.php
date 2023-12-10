<?php
$nama = 'aa';
$to = 'haha@mail.com';
$subject = 'subjek';
$messages = 'pesan';

$headers = 'From: mahalulkarim02@gmail.com' . "rn"; //bagian ini diganti sesuai dengan email dari pengirim
@mail($to, $subject, $messages, $headers);
if (@mail) {
    echo "pengiriman berhasil";
} else {
    echo "pengiriman gagal";
}
