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

        //menangkap inputan form
        if (isset($_POST['simpan'])) {
            $idpesan = $_POST['id_pesan'];
            $tgpesan = date('Y-m-d');
            $tgacara = $_POST['acara'];
            $palamat = $_POST['alamatacara'];
            $jmlundangan = $_POST['jumlah'];

            $query = "UPDATE `pesan` 
            SET tanggal_pesan='$tgpesan',
            tanggal_acara='$tgacara',
            alamat_acara='$palamat',
            jumlah_undangan='$jmlundangan' WHERE id_pesan='$idpesan'";
            $result = mysqli_query($db, $query);
            if ($result) {  ?>

                <div class="alert alert-success text-center">
                    Pesanan Anda Berhasil Diubah, Lanjut Pembayaran?
                    <a href="f_pembayaran.php?id=<?php echo $id ?>" class="alert-link"> Bayar Sekarang</a> /
                    <a href="d_pesanan.php" class="alert-link"> Bayar Nanti</a>

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