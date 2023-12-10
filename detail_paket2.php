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
    </div>

    <div class="container-fluid pt-5 mb-6">
        <h4 class="text-center">Detail Paket</h4>
        <a href="homelogin.php" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="left" title="Kembali"><i class="fas fa-arrow-left"></i></a>
        <hr class="border-primary">
        <?php
        //mencari detail paket
        if (isset($_GET['id'])); {
            $id = $_GET['id'];
            $query = "SELECT u.nama,u.id_user,p.* FROM users u, produk p WHERE p.id_user=u.id_user AND p.id_produk='$id'";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) < 1) {
            }
        } ?>


        <div class="row row-cols-4 mb-5">
            <div class="col">

                <h4><?php echo $data['nama'] ?></h4>
                <img src="gambar/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="..." width="200">
                <p><?php echo $data['nama_produk'] ?></p>
                <p>Rp. <?php echo number_format($data['harga'], 2, ',', '.') ?></p>


            </div>
            <div class="col-8 pt-5 ">
                <p><?php echo $data['deskripsi'] ?></p>
                <hr class="border-primary">
                <p><?php echo
                        nl2br(str_replace('', '', htmlspecialchars($data['deskripsi_lengkap'])));

                    ?></p>
                <hr class="border-primary">
            </div>
            <div class="col-3">
            </div>
            <div class="col-3">
            </div>
            <div class="col-4 text-center">


                <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="false">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="gambar/<?php echo $data['gambar']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="gambar/<?php echo $data['gambar']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="gambar/<?php echo $data['gambar']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">

                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <p></p>
                <div class="btn-group text-center" role="group" aria-label="Basic mixed styles example">
                    <?php
                    //cek data di tabel pesan jika ada maka tombol pesan dihilangkan 
                    $iduser = $hasil['id_user'];
                    $query1 = "SELECT * FROM pesan WHERE id_user='$iduser' AND  id_produk='$id'";
                    $result1 = mysqli_query($db, $query1);
                    $data1 = mysqli_fetch_array($result1);
                    if (mysqli_num_rows($result1) < 1) {
                        //cek produk di wishlist jika ada maka tombol tambah ke wishlist dihilangkan
                        $query2 = "SELECT * FROM wishlist WHERE id_user='$iduser' AND  id_produk='$id'";
                        $result2 = mysqli_query($db, $query2);
                        $data2 = mysqli_fetch_array($result2);
                        if (mysqli_num_rows($result2) < 1) { ?>
                            <a href="f_wishlist.php?id=<?php echo $data['id_produk'] ?>" class="btn btn-primary">Tambah Ke Wishlist</a>
                        <?php } ?>
                        <a href="f_pesan.php?id=<?php echo $data['id_produk'] ?>" class="btn btn-success"> Pesan Sekarang</a>
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