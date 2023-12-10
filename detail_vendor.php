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

        </div>
    </nav>
    <div class="container-fluid pt-5 mb-6">
        <div class="col-md-5 pt-3">

        </div>

        <a href="semua_vendor.php" class="btn btn-sm btn-success">Kembali</a>
        <h4 class="text-center">Detail Vendor</h4>
        <hr>
        <?php
        //mencari detail user
        if (isset($_GET['id'])); {
            $id = $_GET['id'];
            $query = "SELECT * FROM users WHERE id_user='$id'";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) < 1) {
            }
        } ?>



        <div class="row row-cols-4 mb-5">

            <div class="col">
                <p></p>
                <img src="assets/img/user/<?php echo $data['foto_profil']; ?>" class="img-thumbnail" height="15rem">
                <h4><?php echo $data['nama'] ?></h4>

                <p><i class="fas fa-map-marker-alt"></i> <?php echo $data['alamat'] ?></p>
                <p><i class="fas fa-envelope-square"></i> <?php echo $data['email'] ?></p>

                <p> <i class="fas fa-phone"></i> <?php echo $data['no_hp'] ?></p>

                <a href="f_komplain.php?id=<?php echo $data['id_user'] ?>" class="btn btn-sm btn-danger">Laporkan</a>
            </div>




            <div class="col-8 pt-5">
                <div class="row mx-auto mb-4">
                    <?php
                    //menampilkan data paket wedding
                    $query1 = "SELECT * FROM produk WHERE id_user='$id' ";
                    $result1 = mysqli_query($db, $query1);
                    while ($data1 = mysqli_fetch_array($result1)) { ?>
                        <div class="card mr-1 ml-3" style="width: 16rem;">
                            <img src="gambar/<?php echo $data1['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-title"><b><?php echo $data1['nama_produk'] ?></b></p>
                                <p class="card-text "><?php echo $data1['deskripsi'] ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="f_pesan.php?id=<?php echo $data1['id_produk'] ?>" class="btn btn-primary btn-sm">Pesan &raquo;</a>
                                <a href="detail_paket2.php?id=<?php echo $data1['id_produk'] ?>" class="btn btn-success btn-sm mr-2">Detail &raquo;</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        include "footer.php";
        ?>
    </div>
</body>

</html>