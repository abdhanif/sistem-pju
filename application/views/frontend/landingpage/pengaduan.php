<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pengaduan-SIM PJU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo-ah.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/landing-page/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/landing-page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/landing-page/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/landing-page/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/landing-page/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/landing-page/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/landing-page/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Appland - v4.7.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  header-transparent ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1 class="font-weight-bold" style="color: #5777ba;">SIM-PJU</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                    <li><a class="nav-link scrollto active" href="<?php echo base_url('C_pengaduan'); ?>">Form
                            Pengaduan</a></li>
                    <li><a class="nav-link scrollto" href="<?php echo base_url('C_report'); ?>">Report
                            Pengaduan</a></li>
                    <a class="getstarted scrollto" href="<?php echo site_url('auth/logout'); ?>">Logout</a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div id="flash" data-flash="<?php echo $this->session->flashdata('flash_msg'); ?>"> </div>
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow p-4 mb-5">
                        <div class="card-body">
                            <div class="card-header" style="color: #5777ba;">
                                <h3 class="text-center font-weight-bold">SAMPAIKAN LAPORAN ANDA LANGSUNG KE
                                    INSTANSI
                                    PENERANGAN JALAN UMUM
                                </h3>
                            </div>

                            </br>

                            <div class="card-text">
                                <form class="user" method="post" action="<?= base_url('C_pengaduan/insert') ?>"
                                    enctype="multipart/form-data">
                                    <div class="form-row">
                                        <input type="hidden" class="form-control" id="id_user" name="id_user">
                                        <div class="form-group col-md-6">
                                            <div class="font-weight-bold">
                                                <label for="no_tlpn">Nomor Telephon Yang Bisa di Hubungi *</label>
                                            </div>
                                            <input type="text" class="form-control" id="no_tlpn" name="no_tlpn"
                                                placeholder="Contoh : 0878xxxxxxxx">
                                            <?= form_error('no_tlpn', ' <small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div class="font-weight-bold">
                                                <label for="kecamatan">Kode PJU / Kode Box Yang Rusak *</label>
                                            </div>
                                            <select class="form-control" id="kode_pju_box" name="kode_pju_box">
                                                <option>- Pilih -</option>
                                                <?php
                                                foreach ($pju as $row) {
                                                ?>
                                                <option value="<?php echo $row->kode_pju ?>">
                                                    <?php echo $row->kode_pju ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="font-weight-bold">
                                            <label for="alamat">Alamat Kerusakan *</label>
                                        </div>
                                        <textarea type="text" class="form-control" rows="2" id="alamat" name="alamat"
                                            placeholder="Contoh : Jl. Hr.Muhammad, Depan Pom Bensin"></textarea><?= form_error('alamat', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <div class="font-weight-bold">
                                            <label for="laporan">Laporan Anda *</label>
                                        </div>
                                        <textarea type="text" class="form-control" id="laporan" name="laporan" rows="6"
                                            placeholder="Contoh : Lampu PJU mati di ruas jalan Hr.Muhammad depan Pom Bensin Hr.Muhammad arah ke Mayjend Sungkono sampai dengan depan Daihatsu Hr.Muhammad"></textarea><?= form_error('laporan', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <div class="font-weight-bold">
                                            <label for="laporan">Lampiran Foto *</label>
                                        </div>
                                        <input type="file" id="gambar" name="gambar" required>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <!-- ======= Footer ======= -->
    <footer>
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>SISTEM INFORMASI MANAJEMEN PENERANGAN JALAN UMUM</span></strong>. All
                Rights
                Reserved
            </div>

        </div>
    </footer><!-- End Footer -->


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/landing-page/vendor/aos/aos.js"></script>
    <script src="assets/landing-page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/landing-page/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/landing-page/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/landing-page/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/landing-page/js/main.js"></script>
    <!-- Notif -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/sweetalert/sweetalert2.all.min.js' ?>"></script>
    <script>
    $(document).ready(function() {
        var flash = $('#flash').data('flash');
        console.log(flash);
        if (flash) {
            Swal.fire({
                title: 'Success!',
                text: 'Laporan Berhasil di Adukan!',
                icon: 'success'
            })
        }
    });
    </script>
</body>

</html>