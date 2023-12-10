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
        //koneksi ke database
        include "koneksi.php";

        //menangkap inputan form
        if (isset($_POST['laporkan'])) {
            $iduser = $_POST['id_user'];
            $idadmin = '2';
            $isi = $_POST['isi'];
            $tanggal = date('Y-m-d');

            $query = "INSERT INTO `komplain` SET id_user='$iduser',
                    id_admin='$idadmin',
                    komplain='$isi',
                    tanggal_komplain='$tanggal'";
            $result = mysqli_query($db, $query);
            if ($result) {
        ?>

                <div class="alert alert-success text-center">
                    Terimakasih, Laporan Anda Telah Kami Terima
                    <a href="semua_vendor.php" class="alert-link"> Ok</a>

                </div>

        <?php

            }
        } ?>







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