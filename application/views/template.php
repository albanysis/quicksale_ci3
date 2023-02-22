<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <link rel="icon" href="<?= base_url() ?>assets/dist/img/qsLogo.png">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url() ?>" class="nav-link">Home</a>
                </li>
            </ul>


        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>" class="brand-link">
                <img src="<?= base_url() ?>assets/dist/img/qsLogoPutih.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Quick Sale</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>assets/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <!-- ucfirst untuk mendapatkan huruf kapital diawal -->
                        <a href="#" class="d-block"><?= $this->fungsi->user_login()->name ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php if ($this->session->userdata('level') == 1) { ?>
                            <li class="nav-item">
                                <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../widgets.html" class="nav-link">
                                    <i class="nav-icon fas fa-truck"></i>
                                    <p>
                                        Supplier
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Custumers
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>
                                        Product
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../charts/chartjs.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Categories</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../charts/flot.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Units</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../charts/inline.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Items</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Transaction
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../UI/general.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>General</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../UI/icons.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Icons</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../UI/buttons.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Buttons</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php if ($this->session->userdata('level') == 1) { ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Reports
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../forms/general.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>General Elements</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../forms/advanced.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Advanced Elements</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../forms/editors.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Editors</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="nav-header">EXAMPLES</li>
                        <?php if ($this->session->userdata('level') == 1) { ?>
                            <li class="nav-item">
                                <a href="<?= site_url('user') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a href="<?= site_url('auth/logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php echo $contents ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
</body>

</html>