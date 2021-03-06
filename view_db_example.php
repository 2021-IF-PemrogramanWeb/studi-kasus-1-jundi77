<?php

session_start();

// Cek kalau sudah login
if(!isset($_SESSION["loggedin"]) or !$_SESSION["loggedin"]){
  header("location: login.php");
  exit;
}

include 'db_connection.php';

$sql = "SELECT * FROM mobil";
$query = mysqli_query($db, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin-lte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin-lte/index3.html" class="brand-link">
      <img src="./assets/logo.jpg" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-light">Logo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Mobil 1</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Mobil 2</p>
            </a>
        </li>
        <li class="nav-header">MENU</li>
        <li class="nav-item">
        <a href="./table.php" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>Table</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="./view_db_example.php" class="nav-link active">
            <i class="fas fa-circle nav-icon"></i>
            <p>DB Table</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="./graphs.php" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>Graph</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>Export</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="login.php?logout" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>Logout</p>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <div class="breadcrumb float-sm-right" id="today-date">
            </div>
            <script>
                var today = new Date();
                var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                document.getElementById('today-date').textContent = date;
            </script>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">Merk</th>
                      <th class="text-center">Pabrik</th>
                      <th class="text-center">Warna</th>
                      <th class="text-center">Plat Nomor</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($mobil = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $mobil['merk']; ?></td>
                          <td class="text-center"><?php echo $mobil['pabrik']; ?></td>
                          <td class="text-center"><?php echo $mobil['warna']; ?></td>
                          <td class="text-center"><?php echo $mobil['plat_nomor']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
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
<script src="admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin-lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin-lte/dist/js/demo.js"></script>
</body>
</html>
