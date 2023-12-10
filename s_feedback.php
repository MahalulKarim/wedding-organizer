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



        <!-- menangkap data ratting dan menyimpan -->
        <?php
        if (isset($_POST['simpan'])) {
            $idp = $_POST['idproduk'];
            $idu = $_POST['iduser'];
            $tgl = $_POST['tgl'];
            $rating = $_POST['rating'];
            $isi = $_POST['isi'];

            $query = "INSERT INTO `feedback` SET id_user='$idu', id_produk='$idp', tgl='$tgl', rating='$rating', isi='$isi'";
            $result = mysqli_query($db, $query);
            if ($result) { ?>



                <div class="alert alert-success text-center">
                    Feedback Berhasil Diposting!
                    <a href="d_feedback.php" class="alert-link">Ok</a>

                </div>
        <?php  }
        }

        ?>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>