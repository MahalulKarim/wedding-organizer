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

        //menangkap data id_pesan untuk konfirmasi pengiriman
        if (isset($_GET['id'])) {
            $idpesan = $_GET['id'];
            //merubah status pada tabel pesan menjadi terkirim
            $query = "UPDATE `pesan` SET status='terkirim' WHERE id_pesan='$idpesan'";
            $result = mysqli_query($db, $query);
            if ($result) {
                //query untuk mencari id produk untuk dialihkan ke form feedback
                $query3 = "SELECT * FROM `pesan` WHERE id_pesan='$idpesan'";
                $result3 = mysqli_query($db, $query3);
                $data3 = mysqli_fetch_array($result3);
                if (mysqli_num_rows($result3) < 1) {
                    //jika data tak ditemukan 
                } else {
                    //jika data ditemukan menangkap id_produk
                    $id_produk = $data3['id_produk'];
                }

        ?>
                <div class="alert alert-success text-center">
                    Pesanan Anda Berhasil Dikonfirmasi!, Silahkan Untuk Mengisi
                    <!-- mengalihkan ke halaman tambah feedback -->
                    <a href="f_feedback.php?id=<?php echo $id_produk ?>" class="alert-link"> Feedback </a>

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