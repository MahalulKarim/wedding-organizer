<?php
// memulai sesion ketika berhasil login
session_start();
if ($_SESSION['status'] != "login") {
    header("location:f_login.php?pesan=belumlogin");
}
// koneksi ke database
include "koneksi.php";
$username = $_SESSION['username'];
// cari user
$kode = "SELECT * FROM users WHERE username='$username' ";
$cari = mysqli_query($db, $kode);
$hasil = mysqli_fetch_array($cari);
if (mysqli_num_rows($cari) < 1) {
}
$iduser = $hasil['id_user'];
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


        <h4 class="text-center">My Wishlist</h4>
        <hr>

        <div class="row">
            <div class="col-2 text-center">

                <img src="assets/img/user/<?php echo $hasil['foto_profil']; ?>" class="img-thumbnail" alt="...">

                <?php include "menusampingprofil.php" ?>
            </div>

            <div class="col-8">
                <div class="row mx-auto mb-4">
                    <?php

                    //menampilkan produk di wishlist
                    $query = "SELECT p.*,w.id_wishlist FROM wishlist w, produk p WHERE p.id_produk=w.id_produk AND w.id_user='$iduser'";
                    $result = mysqli_query($db, $query);
                    while ($data = mysqli_fetch_array($result)) { ?>
                        <div class="card mr-1 ml-3" style="width: 16rem;">
                            <img src="gambar/<?php echo $data['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><?php echo $data['nama_produk'] ?></p>
                                <p class="card-text"><?php echo $data['deskripsi'] ?></p>
                            </div>
                            <div class="card-footer text-center">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="h_wishlist.php?id=<?php echo $data['id_wishlist'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                    <a href="f_pesan.php?id=<?php echo $data['id_produk'] ?>" class="btn btn-primary btn-sm">Pesan</a>
                                    <a href="detail_paket3.php?id=<?php echo $data['id_produk'] ?>" class="btn btn-success btn-sm mr-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>



                </div>


            </div>

        </div>

    </div>
    <?php
    include "footer.php";
    ?>
    <script src="js/jquery.js"></script>
    <script>
        $("#inputFile").change(function(event) {
            fadeInAdd();
            getURL(this);
        });

        $("#inputFile").on('click', function(event) {
            fadeInAdd();
        });

        function getURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#inputFile").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    debugger;
                    $('#imgView').attr('src', e.target.result);
                    $('#imgView').hide();
                    $('#imgView').fadeIn(500);
                    $('.custom-file-label').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loadAnimate").hide();
        }

        function fadeInAdd() {
            fadeInAlert();
        }

        function fadeInAlert(text) {
            $(".alert").text(text).addClass("loadAnimate");
        }
    </script>

</body>

</html>