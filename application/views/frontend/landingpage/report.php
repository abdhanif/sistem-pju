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

    <main id="main">
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>REPORT PENGADUAN</h2>
                    <p>Laporan Pengaduan Masyarakat yang Sudah di Verifikasi</p>
                </div>



                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <?php
                        foreach ($deteksi_pju as $row) {
                        ?>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/img_avatar.png" class="testimonial-img" alt="">
                                <h3><?php echo $row->nama; ?></h3>
                                <h4>Melaporkan PJU <?php echo $row->kode_pju; ?> </h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    <?php echo $row->laporan; ?>
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->
    </main>

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

</body>

</html>