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
    <title>

    </title>

    <link rel="stylesheet" href="font/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/daftar_customer.css">
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

            </div>
        </div>
    </nav>
    <div class="container pt-5">

        <?php
        //mencari vendor untuk dilaporkan
        if (isset($_GET['id'])); {
            $id = $_GET['id'];
            $query = "SELECT * FROM users WHERE id_user='$id'";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) < 1) {
            }
        } ?>
        <div class="row pt-3 justify-content-center">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->

            <section class="col-6 justify-content-center">

                <form class="form-container" method="POST" action="s_komplain.php" enctype="multipart/form-data">
                    <h5 class="text-center font-weight-bold col-md-12"> Laporkan Vendor <?php echo $data['nama'] ?> </h5><br>
                    <input type="hidden" name="id_user" value="<?php echo $data['id_user'] ?>">

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Laporkan Masalah</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi" required></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="laporkan">Laporkan</button>

                </form>
            </section>

        </div>

    </div>

    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, danyang terakhit Bootstrap JS -->
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
    <script src="js/bootstrap.js"></script>

    <script src="js/popper.js"></script>
</body>

</html>