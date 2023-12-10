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

<style>
    /****** Style untuk rating star *****/
    fieldset,
    label {
        margin: 0;
        padding: 0;
    }

    body {
        margin: 20px;
    }

    h1 {
        font-size: 1.5em;
        margin: 10px;
    }

    /****** Style untuk rating star *****/

    .rating {
        border: none;
        float: left;
    }

    .rating>input {
        display: none;
    }

    .rating>label:before {
        margin: 5px;
        font-size: 1.25em;
        display: inline-block;
        content: "\f005";
    }


    .rating>label {
        color: #ddd;
        float: right;
    }

    /***** CSS untuk hover nya *****/

    .rating>input:checked~label,
    /* memperlihatkan warna emas pada saat di klik */
    .rating:not(:checked)>label:hover,
    /* hover untuk star berikutnya */
    .rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    /* hover untuk star sebelumnya  */

    .rating>input:checked+label:hover,
    /* hover ketika mengganti rating */
    .rating>input:checked~label:hover,
    .rating>label:hover~input:checked~label,
    /* seleksi hover */
    .rating>input:checked~label:hover~label {
        color: #FFED85;
    }
</style>

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

        <h2 class="text-center">Feedback</h2>
        <hr>

        <div class="row">
            <div class="col-2">
                <?php
                //menampilkan data feedback
                $id = $hasil['id_user'];
                $query = "SELECT f.*,p.gambar,p.nama_produk FROM produk p, feedback f WHERE p.id_produk=f.id_produk AND f.id_user='$id'";
                $result = mysqli_query($db, $query);
                while ($data = mysqli_fetch_array($result)) { ?>
                    <img src="gambar/<?php echo $data['gambar']; ?>" class="img-thumbnail mb-2 ml-2" style='height:15rem;'>
                    <p class="text-center"> <?php echo $data['nama_produk']; ?></p>

            </div>
            <div class="col-8">



                : <?php if (empty($data['isi'])) {
                        echo "Belum  Ada Tanggapan";
                    } else {
                        if ($data['rating'] == '5') {
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star text-warning"></i>';
                        } elseif ($data['rating'] == '4') {
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star"></i>';
                        } elseif ($data['rating'] == '3') {
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star"></i>';
                            echo '<i class="fas fa-star"></i>';
                        } elseif ($data['rating'] == '2') {
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star"></i>';
                            echo '<i class="fas fa-star"></i>';
                            echo '<i class="fas fa-star"></i>';
                        } elseif ($data['rating'] == '1') {
                            echo '<i class="fas fa-star text-warning"></i>';
                            echo '<i class="fas fa-star"></i>';
                            echo '<i class="fas fa-star"></i>';
                            echo '<i class="fas fa-star"></i>';
                            echo '<i class="fas fa-star"></i>';
                        } else {
                            echo '<i class="fas fa-star"></i>';
                            echo '<i class="fas fa-star"></i>';
                            echo '<i class="fas fa-star"></i>';
                            echo '<i class="fas fa-star"></i>';
                            echo '<i class="fas fa-star"></i>';
                        } ?>
                    <p></p>
                    <hr>
                    <p>Ulasan: </p>
                    <p><?php echo $data['isi']; ?></p>
                    <hr>
                <?php
                    }

                ?>
                (<?php
                    if (empty($data['tgl'])) {
                        echo "";
                    } else {
                        echo $data['tgl'];
                    }


                    ?>)
                <br>
            <?php } ?>
            </div>
            <p></p>
        </div>



    </div>
    <?php
    include "footer.php";
    ?>

</body>

</html>