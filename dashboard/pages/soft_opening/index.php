<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sate Mafaza - Menu Utama</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php
    session_start();

    if ($_SESSION['status'] != "signIn") {
        header("location:../../../signin/index.php");
    }
    ?>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../../index.php" class="nav-link">Home</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index.php" class="brand-link">
            <img src="../../../assets/img/logo.png" alt="Sate Mafaza" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Sate Mafaza</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="../../index.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="../halaman_utama/index.php" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Halaman Utama</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="../main_menu/index.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Menu Utama</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">
                            <i class="nav-icon fas fa-box-open"></i>
                            <p>Soft Opening</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="../testimonial/index.php" class="nav-link">
                            <i class="nav-icon fas fa-comment"></i>
                            <p>Testimonial</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="../../logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Sign Out</p>
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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Table Soft Opening</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Soft Opening</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Soft Opening</h3>

                                <div class="card-tools">
                                    <a href="add_soft_opening.php" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMenuModal">
                                        <i class="fas fa-plus mr-2"></i>
                                        Tambah
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th style="width: 200px">Photo</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                    </thead>
                                    <?php
                                        include '../../../connection.php';
                                        $no = 1;
                                        /** @var mysqli $connection */
                                        $soft_opening = mysqli_query($connection, "SELECT * FROM tb_soft_opening ORDER BY id_soft_opening DESC")
                                    ?>
                                    <tbody>
                                    <?php while ($item = mysqli_fetch_array($soft_opening)) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['judul'] ?></td>
                                            <td><?= $item['deskripsi'] ?></td>
                                            <td>
                                                <img class="img-thumbnail"
                                                     src="../../../uploads/soft_opening/<?= $item['foto'] ?>"
                                                     alt="Menu Utama">
                                            </td>
                                            <td>
                                                <a href="add_soft_opening.php?action=edit&id=<?= $item['id_soft_opening'] ?>&title=<?= $item['judul'] ?>&description=<?= $item['deskripsi'] ?>" class="badge bg-primary">
                                                    <i class="fas fa-pen mr-1"></i>
                                                    edit
                                                </a>

                                                <a class="badge bg-danger" data-toggle="modal" data-target="#modal-default">
                                                    <i class="fas fa-trash mr-1"></i>
                                                    delete
                                                </a>

                                                <!--  Modal Delete Menu  -->
                                                <div class="modal fade" id="modal-default">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Apakah kamu yakin ingin menghapus soft opening ini?</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><?= $item['judul'] ?></p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                <a href="action/action_delete_soft_opening.php?id=<?= $item['id_soft_opening'] ?>" type="button" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>

<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<?php
if (isset($_GET['action'])) {
    if (isset($_GET['action']) == "delete") {
        if ($_GET['state'] == "success") {
            echo "<script>
                toastr.success('Soft Opening berhasil di hapus!')
            </script>";
        } else if ($_GET['state'] == "failed") {
            echo "<script>
                toastr.warning('Soft Opening gagal di hapus!')
            </script>";
        }
    }
}
?>

</body>
</html>
