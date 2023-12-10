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
        if (isset($_POST['daftar'])) {
            $sebagai = $_POST['sebagai'];
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];
            $nohp = $_POST['nohp'];
            $tlahir = $_POST['tlahir'];
            $tglahir = $_POST['tglahir'];
            $jk = $_POST['jk'];
            $file = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];

            //cek nomer hp atau email di database
            $query = "SELECT * FROM users WHERE no_hp='$nohp' OR email='$email'";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) < 1) {

                //membuat nama fille baru
                $fotobaru = date('dmYHis') . $file;

                //upload file ke folder sistem
                $path = "assets/img/user/" . $fotobaru;

                //input data dengan upload dengan gambar
                if (move_uploaded_file($tmp, $path)) {
                    $query = "INSERT INTO `users` SET nama='$nama',
                    type_user='$sebagai',
                    username='$username',
                    email='$email',
                    password='$password',
                    alamat='$alamat',
                    jenis_kelamin='$jk',
                    tempat_lahir='$tlahir',
                    tanggal_lahir='$tglahir',
                    no_hp='$nohp',
                    foto_profil='$fotobaru'";
                    $result = mysqli_query($db, $query); ?>

                    <div class="alert alert-success text-center">
                        Anda Berhasil Mendaftar Silahkan
                        <a href="f_login.php" class="alert-link"> Login</a>

                    </div>

                <?php } else {
                    //input data tanpa gambar
                    $query = "INSERT INTO `users` SET nama='$nama',
                                    type_user='$sebagai',
                                    username='$username',
                                    email='$email',
                                    password='$password',
                                    alamat='$alamat',
                                    jenis_kelamin='$jk',
                                    tempat_lahir='$tlahir',
                                    tanggal_lahir='$tglahir',
                                    no_hp='$nohp'";
                    $result = mysqli_query($db, $query); ?>
                    <div class="alert alert-warning text-center">
                        Anda berhasil mendaftar silahkan login dan lengkapi profil anda
                        <a href="f_login.php" class="alert-link"> login</a>

                    </div>

                <?php }
            } else { ?>
                <div class="alert alert-danger text-center">
                    Nomor Telepon Atau Email Sudah Terdaftar
                    <a href="f_daftar_customer.php" class="alert-link"> Kembali</a>

                </div>
        <?php }
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