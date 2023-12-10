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
        if (isset($_POST['pesan'])) {
            $idproduk = $_POST['idproduk'];
            $iduser = $_POST['iduser'];
            $tgpesan = date('Y-m-d');
            $tgacara = $_POST['acara'];
            $palamat = $_POST['alamatacara'];
            $jmlundangan = $_POST['jumlah'];
            $total = $_POST['bayar'];

            $query = "INSERT INTO `pesan` 
            SET id_produk='$idproduk',
            id_user='$iduser',
            tanggal_pesan='$tgpesan',
            tanggal_acara='$tgacara',
            alamat_acara='$palamat',
            jumlah_undangan='$jmlundangan',
            bayar='$total',
            status='dipesan'";
            $result = mysqli_query($db, $query);
            if ($result) {


                //query menghapus dari wishlist jika produk dipesan
                $query3 = "DELETE FROM `wishlist` WHERE id_produk='$idproduk' AND id_user='$iduser'";
                $result3 = mysqli_query($db, $query3);
                //query untuk mengambil id pesan  agar untuk dialihkan ke pembayaran
                $query2 = "SELECT * FROM pesan WHERE id_user='$iduser' AND id_produk='$idproduk' AND status='dipesan'";
                $result2 = mysqli_query($db, $query2);
                $data2 = mysqli_fetch_array($result2);
                if (mysqli_num_rows($result2) < 1) {
                } else {

                    $id = $data2['id_pesan'];
                }
            }
        ?>

            <div class="alert alert-success text-center">
                Pesanan Anda Berhasil Dibuat, Lanjut Pembayaran?
                <a href="f_pembayaran.php?id=<?php echo $id ?>" class="alert-link"> Bayar Sekarang</a> /
                <a href="homelogin.php" class="alert-link"> Bayar Nanti</a>

            </div>
        <?php
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