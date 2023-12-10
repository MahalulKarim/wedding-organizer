<?php
include "koneksi.php";
//menghapus wishlist
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `wishlist` WHERE id_wishlist='$id'";
    $result = mysqli_query($db, $query);
    if ($result) {

        header('location:wishlist.php');
    }
}
