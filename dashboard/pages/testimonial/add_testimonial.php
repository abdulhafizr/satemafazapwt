<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sate Mafaza - Menu Utama</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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


    <?php
    $action = "add";
    $isEdit = false;
    $name = "";
    $testimonial = "";
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "edit") {
            $action = "edit";
            $isEdit = true;
            $name = $_GET['name'];
            $testimonial = $_GET['testimonial'];
        }
    }
    $title = "Add";
    if ($isEdit) {
        $title = "Edit";
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
                        <a href="../soft_opening/index.php" class="nav-link">
                            <i class="nav-icon fas fa-box-open"></i>
                            <p>Soft Opening</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">
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
                        <h1 class="m-0"><?= $title ?> Testimonial</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Form <?= $title ?> Testimonial</li>
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
                                <h3 class="card-title">Form <?= $title ?> Testimonial</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="action/action_add_testimonial.php"
                                  enctype="multipart/form-data">
                                <div class="card-body">
                                    <label class="d-none">
                                        <input type="text" name="action" value="<?= $action ?>"/>
                                    </label>
                                    <label class="d-none">
                                        <input type="text" name="input_testimonial_id" value="<?php
                                        if ($isEdit) {
                                            echo $_GET['id'];
                                        }
                                        ?>">
                                    </label>
                                    <div class="form-group">
                                        <label for="inputTestimonialName">Title</label>
                                        <input type="text" name="input_testimonial_name" class="form-control"
                                               id="inputTestimonialName" placeholder="Enter Name"
                                               value="<?= $name ?>"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTestimonialPhoto">Photo</label>
                                        <div class="input-group">
                                            <div class="custom-photo">
                                                <input type="file" name="input_testimonial_photo" accept="image/*"
                                                       class="custom-file-input" id="inputTestimonialPhoto" alt="Enter Photo">
                                                <label class="custom-file-label" for="inputTestimonialPhoto">Choose
                                                    Photo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTestimonial">Description</label>
                                        <textarea id="inputTestimonial" name="input_testimonial"
                                                  class="form-control" rows="3" placeholder="Enter Description"><?= $testimonial ?></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
