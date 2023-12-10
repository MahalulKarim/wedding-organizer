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
        if (isset($_POST['bayar'])) {
            $idpesan = $_POST['idpesan'];
            $total = $_POST['total'];
            $tgbayar = $_POST['tglbayar'];
            $file = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];

            //cek pesanan sudah dibayar atau belum
            $query = "SELECT * FROM pembayaran WHERE id_pesan='$idpesan'";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) < 1) {
                //membuat nama fille baru
                $fotobaru = date('dmYHis') . $file;

                //upload file ke folder sistem
                $path = "assets/img/bukti/" . $fotobaru;

                //input data dengan upload dengan gambar
                if (move_uploaded_file($tmp, $path)) {
                    $query = "INSERT INTO `pembayaran` SET 
                id_pesan='$idpesan',
                    bukti_bayar='$fotobaru',
                    total_bayar='$total',
                    tgl_bayar='$tgbayar',
                    status='belum tervalidasi'";
                    $result = mysqli_query($db, $query);
                    if ($result) {
                    }
        ?>

                    <div class="alert alert-success text-center">
                        Pembayaran berhasil
                        <a href="d_pesanan.php" class="alert-link">Ok</a>

                    </div>

                <?php }
            } else { ?>
                <div class="alert alert-danger text-center">
                    Pesanan ini sudah terbayar
                    <a href="d_pesanan.php" class="alert-link">Ok</a>

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