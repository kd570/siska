<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title'); ?>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/select2/dist/css/select2.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/chocolat/dist/css/chocolat.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/custom.css">

    <link rel="stylesheet" href="<?= base_url() ?>/leaflet/leaflet.css">
    <link rel="stylesheet" href="<?= base_url() ?>/leaflet/Control.FullScreen.css">
    <script src="<?= base_url() ?>/leaflet/leaflet.js"></script>
    <script src="<?= base_url() ?>/leaflet/Control.FullScreen.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= userLogin()->name_user; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <a href="#" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a> -->
                            <a href="<?= site_url('auth/ubahpassword'); ?>" class="dropdown-item has-icon">
                                <i class="fas fa-key"></i> Ubah Password
                            </a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a href="<?= site_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand p-3">
                        <a href="<?= site_url(); ?>">
                            <h5 class="text-md-center">SISKA14</h5>
                        </a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= site_url(); ?>">S</a>
                    </div>
                    <ul class="sidebar-menu">
                        <?= $this->include('layout/menu'); ?>
                    </ul>
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="" class="btn btn-primary btn-sm btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Credit
                        </a>
                    </div>
                </aside>
            </div>



            <!-- Main Content -->



            <div class="main-content">
                <?= $this->renderSection('content'); ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> By <a href="#">Sub-Bagian TI PTPN XIV</a>
                </div>
                <div class="footer-right">
                    1.0.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/select2/dist/js/select2.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/select2/dist/js/i18n/id.js"></script>



    <!-- JS Libraies -->
    <!-- <script src="<?= base_url() ?>/template/node_modules/simpleweather/jquery.simpleWeather.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/node_modules/chart.js/dist/Chart.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/node_modules/jqvmap/dist/jquery.vmap.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->

    <!-- Template JS File -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
    <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>
    <!-- <script src="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.js"></script> -->
    <script src="<?= base_url() ?>/template/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <!-- Page Specific JS File -->
    <!-- <script src="<?= base_url() ?>/template/assets/js/page/index-0.js"></script> -->
</body>

</html>