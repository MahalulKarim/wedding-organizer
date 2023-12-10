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

        <h2 class="text-center">Edit Profil</h2>

        <hr>

        <div class="row">
            <div class="col-2 text-center">
                <img src="assets/img/user/<?php echo $hasil['foto_profil']; ?>" class="img-thumbnail" alt="...">

                <?php include "menusampingprofil.php" ?>
            </div>

            <div class="col-6 pl-5 mb-3 justify-content-center">
                <!-- form edit profil -->


                <form class="form-container" method="POST" action="s_daftar_customer.php" enctype="multipart/form-data">


                    <input type="hidden" name="id_user" value="<?php echo $hasil['id_user']; ?>">
                    <b class="text-center">Ubah Data Diri</b>
                    <div class="col-md-6">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" name="nama" value="<?php echo $hasil['nama'] ?>">
                        </div>


                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Username</label>
                            <input type="text" class="form-control form-control-sm" name="username" value="<?php echo $hasil['username'] ?>">
                        </div>
                        <div class=" col-md-6">
                            <label for="inputEmail4" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-sm form-password" name="password" value="<?php echo $hasil['password'] ?>">
                            <input type="checkbox" class="form-checkbox"> Show password
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?php echo $hasil['alamat'] ?></textarea>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $hasil['email'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">No Hp</label>
                            <input type="number" class="form-control form-control-sm" name="nohp" value="<?php echo $hasil['no_hp'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Tempat lahir</label>
                            <input type="text" class="form-control form-control-sm" name="tlahir" value="<?php echo $hasil['tempat_lahir'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm" name="tglahir" value="<?php echo $hasil['tanggal_lahir'] ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="1" <?php if ($hasil['jenis_kelamin'] == '1') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="2" <?php if ($hasil['jenis_kelamin'] == '2') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="simpan">ubah</button>
                </form>


            </div>
            <div class="col-4 justify-content-center">
                <!-- form edit foto -->
                <form class="form-container" method="POST" action="s_edit_foto_profil.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?php echo $hasil['id_user']; ?>">
                    <div class="col-md-6">
                        <b>Ubah Foto Profil</b>
                        <div class="card " style="width: 10rem;">
                            <div class="imgWrap">

                                <img src="assets/img/user/<?php echo $hasil['foto_profil']; ?>" id="imgView" class="card-img-top img-fluid">
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="file" id="inputFile" class="form-control form-control-sm" name="file">
                            <label class="custom-file-label" for="inputFile">pilih foto</label>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="simpan">Ubah</button>
                </form>
            </div>






        </div>
    </div>

    </div>
    <?php
    include "footer.php";
    ?>
    </div>

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.form-checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $('.form-password').attr('type', 'text');
                } else {
                    $('.form-password').attr('type', 'password');
                }
            });
        });
    </script>
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