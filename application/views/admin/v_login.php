<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="baseUrl" content="<?= base_url() ?>">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash;</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>node_m/admin/assetsodules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <!-- <img src="<?= base_url() ?>assets/admin/assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2"> -->
                        <h4 class="text-dark font-weight-normal">Selamat Datang di Halaman <span class="font-weight-bold">Login Broadcast Mail SESKO TNI</span></h4>
                        <p class="text-muted">Silakan Masukan Username dan Password anda</p>
                        <?php
                        if ($this->session->flashdata('warning')) {
                            echo '<div class="alert alert-sm alert-warning">';
                            echo $this->session->flashdata('warning');
                            echo '</div>';
                        }
                        ?>
                        <form method="POST" action="<?= base_url('admin/login/aksi') ?>" id="formLogin" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your username
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <!-- <a href="auth-forgot-password.html" class="float-left mt-3">
                  Forgot Password?
                </a> -->
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>

                        </form>

                        <div class="text-center mt-5 text-small">
                            <!-- Copyright &copy; Informatikid. -->

                        </div>
                    </div>
                </div>


                    <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" style="background:url(<?= base_url()?>assets/image/merahputih.jpg);background-size:cover;background-repeat:no-repeat;" data-background="<?= base_url() ?>assets/image/merahputih.jpg">
                        <div class="absolute-bottom-left index-2">
                            <div class="text-light p-5 pb-2">
                                <div class="mb-5 pb-3">
                                    <h1 class="mb-2 display-4 font-weight-bold"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
    </div>

    <script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>assets/js/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/stisla.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/stisla.js"></script>
    <script src="<?= base_url() ?>assets/modules/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap-show-password.min.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/admin/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/custom.js"></script>

    <!-- JS Libraies -->
    <script>
        $('#password').password();
    </script>


    <script src="<?= base_url() ?>assets/js/page/admin.js"></script>
    <script src="<?= base_url() ?>assets/js/page/<?= $script ?>.js"></script>

</body>

</html>