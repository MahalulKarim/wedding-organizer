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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/daftar_customer.css">

    <link rel="stylesheet" href="font/css/all.css">
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

    .rating>.half:before {
        content: "\f089";
        position: absolute;
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
    <div class="container pt-5">


        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <?php
        // menangkap id_produk
        if (isset($_GET['id'])) {
            $idproduk = $_GET['id'];
            $query3 = "SELECT * FROM `produk` WHERE id_produk='$idproduk'";
            $result3 = mysqli_query($db, $query3);
            $data3 = mysqli_fetch_array($result3);
            if (mysqli_num_rows($result3) < 1) {
                //jika data tak ditemukan 
            } else {
                //jika data ditemukan menangkap id_produk
                $id_produk = $data3['id_produk'];
            }
        }

        ?>
        <div class="row pt-3 justify-content-center">
            <section class="col-6 justify-content-center">
                <!-- form isi rating -->
                <form class="form-container" method="POST" action="s_feedback.php" enctype="multipart/form-data">
                    <h5 class="ml-3">Silahkan Berikan Rating Anda:</h5>
                    <div class="row g-3">
                        <fieldset class="rating text-center">


                            <input type="radio" id="star5" name="rating" value="5" /><label class="full fas fa-star" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class="full fas fa-star" for="star4" title="Pretty good - 4 stars"></label>

                            <input type="radio" id="star3" name="rating" value="3" /><label class="full fas fa-star" for="star3" title="Meh - 3 stars"></label>

                            <input type="radio" id="star2" name="rating" value="2" /><label class="full fas fa-star" for="star2" title="Kinda bad - 2 stars"></label>

                            <input type="radio" id="star1" name="rating" value="1" /><label class="full fas fa-star ml-4" for="star1" title="Sucks big time - 1 star"></label>
                            <br>
                    </div>
                    <div class="col-12">

                        <br>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Ulasan : </label>
                        <textarea class="form-control" name="isi" placeholder="(Opsional)"></textarea>
                        <input type="hidden" name="idproduk" value="<?php echo $id_produk ?>">
                        <input type="hidden" name="iduser" value="<?php echo $hasil['id_user'] ?>">
                        <input type="hidden" name="tgl" value="<?php echo date('Y-m-d'); ?>">
                        <br>
                        <input type="submit" value="posting" name="simpan" class="btn btn-primary">
                    </div>
                </form>
                <!-- end form -->

                </fieldset>

            </section>
        </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="js/popper.js"></script>
</body>

</html>