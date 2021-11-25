<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="assets/css/landing.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<main id="main">
    <!-- ======= Contact Section ======= -->
    <section>
        <div class="row">
            <div class="container-fluid" data-aos="fade-up">
                <div class="row main-content bg-success text-center">
                    <div class="col-md-4 text-center company__info">
                        <span class="company__logo">
                            <h1><span class="fa fa-sign-in" style="color: beige;"></span></h1>
                        </span>
                        <h4 class="company_title">REGISTER <br> PJU SYSTEM </h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                        <div class="container-fluid">
                            <div class="text-center">
                                <form class="form-group" method="post" action="<?php echo site_url('C_register'); ?>">

                                    <div class="row">
                                        <input type="text" class="form__input" name="user_name" id="user_name"
                                            type="text" placeholder="Enter Name...">
                                        <?= form_error('user_name', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form__input" name="user_email" id="user_email"
                                            type="email" placeholder="Enter Email Address...">
                                        <?= form_error('user_email', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>


                                    <div class="row">
                                        <input type="password" class="form__input" name="user_password"
                                            id="user_password" type="password" placeholder="Enter Password...">
                                        <?= form_error('user_password', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth'); ?>">Already have an account?
                                            Login!</a>
                                    </div>

                                    <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
                                    <?= $this->session->flashdata('message'); ?>

                                    <div class="text-center">
                                        <input type="submit" value="Submit" class="btn">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->