<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style01.css">
    <link rel="stylesheet" href="font/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="js/popper.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #00CED1;">
        <div class=" container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav text-white">



                    <li class="nav-item pt-2 ml-2">
                        <a class="navbar-brand" href="#">
                            <p class="text-white"> MyWO</p>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav justify-content-end">
                <form class="row g-3" action="index.html">
                    <div class="col-auto">

                    </div>
                    <div class="col-auto">
                        <p class="nav-link text-white"> <a class="text-white" href="f_daftar_customer.php">Daftar</a> / <a class="text-white" href="f_login.php">Login</a></p>
                    </div>
                </form>


            </div>
        </div>
    </nav>


    <div class="container-fluid pt-5 mb-6">
        <div class="col-md-5 pt-3">





        </div>

        <div id="demo" class="carousel slide " data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/slide0.jpg" alt="Slide1" width="100%" height="100%">
                    <div class="carousel-caption">
                        <h3>Wedding Planning</h3>
                        <p>Temukan wedding plan yang pasti kamu banget!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/slide02.jpg" alt="Slide1" width="100%" height="100%">
                    <div class="carousel-caption">
                        <h3>Jelajah Lebih</h3>
                        <p>Cari lebih banyak wedding organizer</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="assets/img/slide01.jpg" alt="Slide1" width="100%" height="100%">
                    <div class="carousel-caption">
                        <h3>Rencanakan</h3>
                        <p>Rencanakan semua kebutuhan pernikahanmu</p>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>



        <!-- <img src="gambar/weddingvendors.jpg" class="img-fluid"> -->
        <hr style="border: 1px solid #48D1CC">

        <div class="row text-center">
            <div class="col">

            </div>
            <div class="col-6 pt-5 mb-4">


                <div class="accordion" id="accordionGroup">

                    <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div id="headingTwo">
                            <h5 class="text-center text-dark">Bagaimana Merencanakan Pernikahan Dengan Baik?</h5>
                            <h5 class="text-center text-dark">&ddarr;</h5>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionGroup">
                        <div class="card-body">
                            Mulailah dengan mencatat semua ide yang ada dalam pikiran Anda tentang pernikahan.
                            Anda harus menulis semuanya secara rinci: tema pernikahan, apakah bersifat mewah atau sederhana;
                            Palet warna pernikahan Anda; dan bagaimana Anda ingin mewujudkan gaya pernikahan Anda,
                            santai atau formal. Setelah itu, gunakan timeline di bawah ini untuk menjaga proses
                            perencanaan Anda sesuai dengan jadwal. Jika Anda familiar dengan teknologi digital,
                            Anda dapat mengaturnya di dalam ponsel pintar Anda yang memiliki banyak aplikasi akan
                            sangat membantu dengan berbagai tugas atau jika Anda tipe yang lebih suka mencatat,
                            coba tuliskan dalam agenda.
                            Cobalah untuk mengatur apa saja yang harus dilakukan sesuai dengan preferensi Anda.
                            Salah satunya adalah dengan memilah skala prioritas,
                            mencatat bawah apa yang harus Anda lakukan pertama kali di bagian atas daftar,
                            diikuti sisanya. Cara lain adalah dengan memberi warna untuk bagian yang berbeda.
                            Misalnya, merah muda untuk dekorasi, coklat untuk katering,
                            ungu untuk undangan, dan sebagainya. Tidak peduli apapun yang Anda pilih,
                            pastikanlah bahwa salah satu cara ini akan menyederhanakan agenda perencanaan pernikahan Anda.

                        </div>
                    </div>
                </div>


            </div>
            <div class="col">

            </div>
        </div>

        <div class="col-md-5 pt-3">

        </div>
        <hr style="border: 1px solid #48D1CC">
        <?php
        include "koneksi.php";

        ?>
        <div class="row mx-auto mb-4">
            <?php
            //             $result = mysql_query('SELECT * FROM mahasiswa_ilkom');
            //             for ($i = 1; $i <= 5; $i++) {
            //                 $row = mysql_fetch_row($result);
            //                 echo "$row[0] $row[1] $row[2] $row[3] $row[4]";
            //                 echo "
            // ";



            $query = "SELECT u.nama,p.* FROM users u, produk p WHERE p.id_user=u.id_user AND u.type_user='vendor' ";
            $result = mysqli_query($db, $query);
            for ($i = 0; $i <= 1; $i++) {
                $data = mysqli_fetch_array($result) ?>


                <div class="card mr-1 ml-3 mt-4" style="width: 16rem;">
                    <img src="gambar/<?php echo $data['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-title"><b><?php echo $data['nama_produk'] ?></b></p>
                        <p class="card-text "><?php echo $data['deskripsi'] ?></p>
                    </div>

                </div>


            <?php } ?>


        </div>
        <p class="text-center"><a href="f_login.php" class="btn btn-transparent sm">Tampilkan Lebih Banyak &rrarr;</a></p>


    </div>
    <?php
    include "footer.php";
    ?>
    </div>
</body>

</html>