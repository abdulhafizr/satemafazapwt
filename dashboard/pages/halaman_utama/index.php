<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sate Mafaza - Halaman Utama</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                        <a href="index.php" class="nav-link active">
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
                        <a href="../soft_opening/index.php" class="nav-link">
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
                        <h1 class="m-0">Halaman Utama</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Utama</li>
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
                            <!-- /.card-header -->
                            <?php
                            include '../../../connection.php';
                            /** @var mysqli $connection */
                            $response = mysqli_query($connection, "SELECT * FROM tb_halaman_utama ORDER BY id_halaman_utama DESC LIMIT 1");
                            $halaman_utama = mysqli_fetch_array($response);
                            ?>
                            <div class="card-body">
                                <form method="post" action="action/action_update_halaman_utama.php"
                                      enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="d-none">
                                                <input type="text" name="input_halaman_utama_id" value="<?= $halaman_utama['id_halaman_utama'] ?>">
                                            </label>
                                            <div class="form-group">
                                                <label for="inputHalamamUtamaTitle">Title</label>
                                                <input type="text" name="input_halaman_utama_title" class="form-control"
                                                       id="inputHalamamUtamaTitle" placeholder="Enter Title" value="<?= $halaman_utama['judul'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputMenuPhoto">Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-photo">
                                                        <input type="file" name="input_halaman_utama_photo" accept="image/*"
                                                               class="custom-file-input" id="inputHalamanUtamaPhoto"
                                                               alt="Enter Photo">
                                                        <label class="custom-file-label" for="inputHalamanUtamaPhoto">Choose Photo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="../../../uploads/halaman_utama/<?= $halaman_utama['foto'] ?>" alt="<?= $halaman_utama['judul'] ?>" class="img-thumbnail">
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit
                                    </button>
                                </form>
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
    if (isset($_GET['action']) == "update") {
        if ($_GET['state'] == "success") {
            echo "<script>
                toastr.success('Halaman utama berhasil di update!')
            </script>";
        } else if ($_GET['state'] == "failed") {
            echo "<script>
                toastr.warning('Halaman utama gagal di update!')
            </script>";
        }
    }
}
?>

</body>
</html>
