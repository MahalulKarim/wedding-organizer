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
        if (isset($_POST['simpan'])) {
            $id = $_POST['id_user'];

            $foto = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            // merubah nama file foto dengan menambah tanggal upload
            $fotobaru = date('dmYHis') . $foto;
            $path = "assets/img/user/" . $fotobaru;
            // cek nama foto dalam datbase dan mengupload ke folder sistem
            if (move_uploaded_file($tmp, $path)) {
                $query3 = "SELECT foto_profil FROM `users` WHERE id_user='$id'";
                $result3 = mysqli_query($db, $query3);
                $data3 = mysqli_fetch_array($result3);
                // 
                if (is_file("assets/img/user/" . $data3['foto_profil']))
                    unlink("assets/img/user/" . $data3['foto_profil']);
                // unlink untuk menghapus foto lama
                $query = "UPDATE `users` SET foto_profil='$fotobaru' WHERE id_user='$id'";
                $result = mysqli_query($db, $query);
                // cek status upload jika berhasil dialihkan ke halaman login kembali
                if ($result) { ?>
                    <div class="alert alert-success text-center">
                        Foto Profil Berhasil Diubah, Silahkan Login Kembali
                        <a href="f_login.php" class="alert-link"> Login</a>

                    </div>
        <?php
                }
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