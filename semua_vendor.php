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
                        <a class="btn btn-secondary" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
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
                <!-- form untuk cari -->
                <form class="row g-3" action="semua_vendor.php" method="GET">
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

        <hr>


        <div class="row mx-auto mb-4">
            <?php
            // jika tombol cari dijalankan
            if (isset($_GET['kirim'])) {
                $cari = $_GET['cari'];
                $query = "SELECT * FROM users WHERE type_user='vendor' AND nama like '%" . $cari . "%'";
            } else {
                $query = "SELECT * FROM users WHERE type_user='vendor' ";
            }
            $result = mysqli_query($db, $query);
            while ($data = mysqli_fetch_array($result)) { ?>
                <div class="card mr-1 ml-3" style="width: 16rem;">
                    <img src="assets/img/user/<?php echo $data['foto_profil']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-title"><b><?php echo $data['nama'] ?></b></p>
                        <p class="card-text"><?php echo $data['alamat'] ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="detail_vendor.php?id=<?php echo $data['id_user'] ?>" class="btn btn-success btn-sm mr-2">Kunjungi &raquo;</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
    </div>
</body>

</html>