<!DOCTYPE html>
<html>

<head>
    <title>

    </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/daftar_customer.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color:	#00887A;">
        <div class=" container-fluid">
            <a href="home.php">
                <img src="assets/logo/logo2.png" width="10%">
            </a>
            <nav class="nav">

            </nav>
            <ul class="nav justify-content-end">
                <div class="col-auto">
                    <a class="nav-link" href="#">Tentang Kami?</a>
                </div>
            </ul>
        </div>
    </nav>
    <div class="container pt-5">


        <div class="row pt-3 justify-content-center">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->

            <section class="col-6 justify-content-center">

                <form class="form-container" method="POST" action="s_daftar_customer.php" enctype="multipart/form-data">
                    <h5 class="text-center font-weight-bold col-md-12"> Masukan Data Diri Anda </h5><br>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Daftar Sebagai</label>
                            <select class="form-control form-control-sm" name="sebagai">
                                <option value="vendor">Vendor</option>
                                <option value="customer">Customer</option>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" name="nama" autocomplete="off" required>
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Username</label>
                            <input type="text" class="form-control form-control-sm" name="username" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-sm form-password" name="password" required>
                            <input type="checkbox" class="form-checkbox"> Show password
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" autocomplete="off" required></textarea>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm" name="email" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">No Hp</label>
                            <input type="number" class="form-control form-control-sm" name="nohp" autocomplete="off" required>
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Tempat lahir</label>
                            <input type="text" class="form-control form-control-sm" name="tlahir" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm" name="tglahir" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Perempuan
                            </label>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="card " style="width: 10rem;">
                            <div class="imgWrap">
                                <img src="assets/img/User1.jpg" id="imgView" class="card-img-top img-fluid">
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
                            <input type="file" id="inputFile" class="form-control form-control-sm" name="file">
                            <label class="custom-file-label" for="inputFile"></label>
                        </div>

                    </div>


                    <br>
                    <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
                    <a href="f_daftar_customer.php" class="btn btn-danger">Reset</a>
                    <div class="form-footer mt-2">
                        <p> Sudah punya akun? <a href="f_login.php">Login</a></p>
                    </div>
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