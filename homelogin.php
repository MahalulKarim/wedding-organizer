<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:f_login.php?pesan=belumlogin");
} ?>
<?php
include "koneksi.php";
$username = $_SESSION['username'];
// cari user
$kode = "SELECT * FROM users WHERE username='$username' ";
$cari = mysqli_query($db, $kode);
$hasil = mysqli_fetch_array($cari);
if (mysqli_num_rows($cari) < 1) {
}
?>
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

                    <li class="nav-item dropdown pt-2">
                        <a class="btn btn-secondary" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown">
                            <i class="fa fa-bars fa-lg"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="homelogin.php">Home</a></li>
                            <li><a class="dropdown-item" href="semua_paket.php">Paket Wedding</a></li>
                            <li><a class="dropdown-item" href="semua_vendor.php">Vendor</a></li>
                            <li><a class="dropdown-item" href="d_feedback.php">Feedback</a></li>
                            <li><a class="dropdown-item" href="profil_saya.php?id=<?php echo $hasil['id_user']; ?>">Profil</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pt-2 ml-2">
                        <a class="navbar-brand" href="#">
                            <p class="text-white"> MyWO</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav justify-content-end">
                <form class="row g-3" action="homelogin.php" method="GET">
                    <div class="col-auto">
                        <input type="text" class="form-control form-control-sm" placeholder="Search" name='cari'>
                    </div>
                    <div class="col-auto">
                        <button type="submit" name="kirim" class="btn btn-success fa fa-search pt-2"></button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid pt-5 mb-6">
    </div>

    <div class="container-fluid pt-3 mb-6">
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
        <div class="col-md-5 pt-3">

        </div>
        <hr>
        <div class="row mx-auto mb-4">
            <?php
            if (isset($_GET['kirim'])) {
                $cari = $_GET['cari'];
                $query = "SELECT * FROM produk WHERE nama_produk like '%" . $cari . "%'";
            } else {

                $query = "SELECT * FROM produk ";
            }
            //menampilkan data paket wedding
            $result = mysqli_query($db, $query);
            while ($data = mysqli_fetch_array($result)) { ?>
                <div class="card mr-1 ml-3 " style="width: 15rem;">
                    <img src="gambar/<?php echo $data['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-title"><b><?php echo $data['nama_produk'] ?></b></p>
                        <p class="card-text "><?php echo $data['deskripsi'] ?></p>
                    </div>
                    <div class="card-footer text-center pt-2">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <?php
                            //cek paket di pesanan jika ada maka menghilangkan tombol pesan
                            $id = $data['id_produk'];
                            $iduser = $hasil['id_user'];
                            $query1 = "SELECT * FROM pesan WHERE id_user='$iduser' AND  id_produk='$id'";
                            $result1 = mysqli_query($db, $query1);
                            $data1 = mysqli_fetch_array($result1);
                            if (mysqli_num_rows($result1) < 1) { ?>

                                <a href="f_pesan.php?id=<?php echo $data['id_produk'] ?>" class="btn btn-primary btn-sm">Pesan</a>
                            <?php } ?>
                            <a href="detail_paket.php?id=<?php echo $data['id_produk'] ?>" class="btn btn-success btn-sm mr-2">Detail</a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <p class="text-center"><a href="semua_paket.php" class="btn btn-success sm">Tampilkan Lebih Banyak &raquo;</a></p>
    </div>
    <?php
    include "footer.php";
    ?>
    </div>
</body>

</html>