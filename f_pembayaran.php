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


        <h4 class="text-center">Pembayaran</h4>
        <hr>

        <div class="row mb-3">

            <?php
            //menampilkan produk yang dipilih
            if (isset($_GET['id'])); {
                $id = $_GET['id'];
                $query = "SELECT p.*,pr.nama_produk FROM pesan p,produk pr WHERE p.id_produk=pr.id_produk AND p.id_pesan='$id'";
                $result = mysqli_query($db, $query);
                $data = mysqli_fetch_array($result);
                if (mysqli_num_rows($result) < 1) {
                }
            } ?>
            <div class="col-2 text-center">
            </div>
            <div class="col-8 justify-content-center">

                <h3>Cara Pembayaran : </h3>
                <hr>
                <p></p>
                <p>cara pembayarn dengan transfer bank </p>
                <p>1.Transfer uang pembayaran ke salah satu no rekening dibawah</p>
                <p> 2.Admin akan mengecek dan konfirmasi pembayaran anda secepatnya</p>


                <table class="table">
                    <thead>
                        <tr>
                            <th>BANK BRI</th>
                            <th>BANK BCA</th>
                            <th>BANK MANDIRI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12345678912</td>
                            <td>12345678912</td>
                            <td>12345678912</td>
                        </tr>
                    </tbody>
                </table>
                <p>Cara pembayaran di tempat</p>
                <p>1.Melakukan pembayaran secara cash dengan mengunjungi wedding organizer
                    dengan menunjukan id pesanan.</p>
                <p></p>
            </div>
        </div>
        <div class="row mb-3">

            <div class="col-2 text-center">
            </div>

            <div class="col-8 justify-content-center">
                <hr>

                <h4>Pesanan Anda </h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Paket</th>
                            <th>Tgl Acara</th>
                            <th>Alamat</th>
                            <th>Total Bayar</th>
                            <th class="text-center" colspan="2">Status | Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td><?php
                                $tanggal = $data['tanggal_acara'];
                                echo date('d-m-Y', strtotime($tanggal)); ?></td>
                            <td><?php echo $data['alamat_acara']; ?></td>
                            <td>Rp <?php echo number_format($data['bayar'], 2, ',', '.') ?></td>
                            <td class="text-center">
                                <?php
                                /* menampilkan status pembayaran jika belum dibayar maka pesanan
                                 bisa di edit atau dihapus jika sudah dibayar tidak bisa */
                                $query3 = "SELECT * FROM pembayaran WHERE id_pesan='$id'";
                                $result3 = mysqli_query($db, $query3);
                                $data3 = mysqli_fetch_array($result3);
                                if (mysqli_num_rows($result3) < 1) { ?>

                                    <!-- menampilkan statusbelum dibayar dan  menampilkan tombol edit/hapus -->
                                    <a class="btn btn-danger btn-sm"><?php echo 'Belum Dibayar'; ?></a>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                        <a href="e_pesanan.php?id=<?php echo $data['id_pesan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="h_pesanan.php?id=<?php echo $data['id_pesan'] ?>" onclick="return confirm('Yakin Hapus Pesanan Ini?')" class="btn btn-danger btn-sm">Hapus</a>
                                    </div>
                                <?php } else {
                                ?>
                                    <a class="btn btn-success"><?php echo $data3['status'] ?></a>
                                    <?php
                                    //jika sudah tervalidasi menampilkan tombol validasi pemesanan terkirim
                                    $query4 = "SELECT * FROM pembayaran WHERE status='tervalidasi' AND id_pesan='$id'";
                                    $result4 = mysqli_query($db, $query4);
                                    $data4 = mysqli_fetch_array($result4);
                                    if (mysqli_num_rows($result4) < 1) {
                                    } else { ?>
                                        <a href="konfirmasi_pengiriman.php?id=<?php echo $data['id_pesan'] ?>" class="btn btn-primary">Konfirmasi Pengiriman</a>
                                    <?php
                                    } ?>



                                <?php }

                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p></p>
                <hr>


                <form class="form-container" method="POST" action="s_pembayaran.php" enctype="multipart/form-data">
                    <h4 class="text-center font-weight-bold col-md-12"> Isi data pembayaran </h4><br>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <input type="hidden" value="<?php echo $data['id_pesan'] ?>" name="idpesan">
                            <input type="hidden" value="<?php echo $data['bayar'] ?>" name="total">
                        </div>


                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label" value='<?php echo $data3['tgl_bayar'] ?>'> Tanggal Bayar</label>
                            <input type="date" class="form-control form-control-sm" name="tglbayar" required>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="card " style="width: 10rem;">
                            <div class="imgWrap">
                                <img src="assets/img/bukti/<?php echo $data3['bukti_bayar'] ?>" id="imgView" class="card-img-top img-fluid" style="width:10rem">
                            </div>
                            <!-- <div class="card-body">
                                <div class="custom-file">
                                    <input type="file" id="inputFile" class="form-control form-control-sm">
                                    <label class="custom-file-label" for="inputFile"></label>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <input type="file" id="inputFile" class="form-control form-control-sm" name="file" required>
                            <label class="custom-file-label" for="inputFile">Upload bukti bayar</label>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary" name="bayar">Bayar</button>
                        </div>


                    </div>
            </div>
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