<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:f_login.php?pesan=belumlogin");
} ?>
<?php

// koneksi ke database
include "koneksi.php";
$username = $_SESSION['username'];

// cari user
$kode = "SELECT * FROM users WHERE username='$username' ";
$cari = mysqli_query($db, $kode);
$hasil = mysqli_fetch_array($cari);
if (mysqli_num_rows($cari) < 1) {
}
$iduser = $hasil['id_user'];
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">
    <title></title>
</head>

<body>

    <div class="container pt-5">



        <?php

        //menangkap id produk 
        if (isset($_GET['id'])) {
            $idproduk = $_GET['id'];

            //insert data ke wishlist
            $query = "INSERT INTO `wishlist` SET id_produk='$idproduk',
            id_user='$iduser'";
            $result = mysqli_query($db, $query);
            if ($result) {
        ?>

                <div class="alert alert-success text-center">
                    Berhasil ditambahkan ke wishlist !
                    <a href="wishlist.php?id=<?php echo $idproduk ?>" class="alert-link">Lihat Wishlist</a> /
                    <a href="semua_paket.php?id=<?php echo $idproduk ?>" class="alert-link">Cari Paket Lain</a>

                </div>
        <?php
            }
        }
        ?>







        <!-- <div class="alert alert-primary">
            Ini contoh alert primary!
        </div>

        <div class="alert alert-secondary">
            Ini contoh alert secondary!
        </div>

       

        <div class="alert alert-warning">
            Ini contoh alert warning!
        </div>

        <div class="alert alert-info">
            Ini contoh alert info!
        </div>

        <div class="alert alert-light">
            Ini contoh alert light!
        </div>

        <div class="alert alert-dark">
            Ini contoh alert dark!
        </div>

    </div> -->

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>