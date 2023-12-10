<?php
include "koneksi.php";
//menghapus pesanan
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `pesan` WHERE id_pesan='$id'";
    $result = mysqli_query($db, $query);
    if ($result) {
        //jika berhasil menghapus dialihkan ke halaman data pesanan
        header('location:d_pesanan.php');
    }
}
