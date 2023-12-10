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

            </div>
        </div>
    </nav>
    <div class="container-fluid pt-5 mb-6">
    </div>
    <div class="container-fluid pt-5 mb-6">
        <div class="col-md-5 pt-3">

        </div>

        <div class="row">
            <div class="col-4">


            </div>
            <div class="col-8">
                <?php
                //menangkap id pesanan untuk di edit
                if (isset($_GET['id'])); {
                    $id = $_GET['id'];
                    $query = "SELECT p.*,pr.nama_produk,pr.gambar,pr.harga FROM pesan p, produk pr WHERE p.id_produk=pr.id_produk AND p.id_pesan='$id'";
                    $result = mysqli_query($db, $query);
                    $data = mysqli_fetch_array($result);
                    if (mysqli_num_rows($result) < 1) {
                    }
                } ?>
                <section class="col-6 justify-content-center mb-3">

                    <form class="form-container" method="POST" action="s_e_pesan.php" enctype="multipart/form-data">
                        <h5 class="text-center font-weight-bold col-md-12"> Edit Data Pesanan Anda </h5><br>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type='hidden' value="<?php echo $data['id_pesan'] ?>" name="id_pesan">
                                <label for="inputEmail4" class="form-label">Nama Paket</label>
                                <input type="text" value="<?php echo $data['nama_produk']; ?>" class="form-control form-control-sm" readonly>


                            </div>
                            <div class="img-thumbnail " style="width: 10rem;">
                                <div class="imgWrap">
                                    <img src="gambar/<?php echo $data['gambar']; ?>" id="imgView" class="card-img-top img-fluid">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Tanggal Acara</label>
                                <input type="date" class="form-control form-control-sm" name="acara" value="<?php echo $data['tanggal_acara'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Tempat Pelaksanaan</label>
                                <input type="text" class="form-control form-control-sm" name="alamatacara" value="<?php echo $data['alamat_acara'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Jumlah Undangan</label>
                                <input type="number" class="form-control form-control-sm " name="jumlah" value="<?php echo $data['jumlah_undangan'] ?>">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Total Bayar</label>
                                <input type="hidden" class="form-control form-control-sm " name="bayar" value="<?php echo $data['harga'] ?>" readonly>
                                <input type="text" class="form-control form-control-sm " value="Rp. <?php echo number_format($data['harga'], 2, ',', '.') ?>" readonly>
                            </div>
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary" name="simpan" onclick="return confirm('Pastikan Data Yang Anda Masukan Sudah Benar') ">Simpan dan Pesan</button>
                        <a href="d_pesanan.php" class="btn btn-danger">Batal/Kembali</a>

                    </form>
                </section>
            </div>
        </div>
        <?php
        include "footer.php";
        ?>
    </div>
</body>

</html>