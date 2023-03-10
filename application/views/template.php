<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QS - BPI</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <link rel="icon" href="<?= base_url() ?>assets/dist/img/qsLogo.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">

    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
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
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </ul>


        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; min-height: 100vh !important;">
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
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                            <li class="nav-item">
                                <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('supplier') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-truck"></i>
                                    <p>
                                        Supplier
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('custumer') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-address-card"></i>
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
                                        <a href="<?= site_url('category') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Categories</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('unit') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Units</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('item') ?>" class="nav-link">
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
                                    <a href="<?= site_url('sale') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('stock/stock_in_data') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stock In</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('stock/stock_out_data') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stock Out</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
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
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
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

        <!-- jQuery -->
        <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
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

    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable()
        })
    </script>
</body>

</html>