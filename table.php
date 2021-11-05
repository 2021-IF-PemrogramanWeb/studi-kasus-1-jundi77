<?php

session_start();

// Cek kalau sudah login
if(!isset($_SESSION["loggedin"]) or !$_SESSION["loggedin"]){
  header("location: login.php");
  exit;
}

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
        <a href="./table.php" class="nav-link active">
            <i class="fas fa-circle nav-icon"></i>
            <p>Table</p>
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
        <div class="col-md-2 col-xs-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                Tabel Reason
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-10 col-xs-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 10px">No</th>
                      <th class="text-center">On</th>
                      <th class="text-center">Off</th>
                      <th class="text-center">Ack by</th>
                      <th class="text-center">Reason</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">1</td>
                      <td class="text-center">Kamis, 25/02/2021,<br>19:41:50</td>
                      <td class="text-center">Kamis, 25/02/2021,<br>21:00:50</td>
                      <td class="text-center">
                          Act: Audiyatra <br>
                          Dis: Rizaldy, Gathot
                      </td>
                      <td>
                          1. Interlock Hose Reel Front
                      </td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">Minggu, 01/03/2021,<br>22:41:50</td>
                        <td class="text-center">Minggu, 01/03/2021,<br>22:41:50</td>
                        <td class="text-center"></td>
                        <td>
                            2. Interlock Hose Reel Rear
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">Minggu, 01/03/2021,<br>23:30:00</td>
                        <td class="text-center">Minggu, 01/03/2021,<br>00:30:00</td>
                        <td class="text-center"></td>
                        <td>
                            3. Interlock Input Coupler Stow
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-center">Selasas, 03/03/2021,<br>08:30:30</td>
                        <td class="text-center">Selasas, 03/03/2021,<br>09:30:30</td>
                        <td class="text-center"></td>
                        <td>
                            4. Interlock Input Hose Boom Stow
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-center">Kamis, 05/03/2021,<br>08:30:30</td>
                        <td class="text-center">Kamis, 05/03/2021,<br>10:30:30</td>
                        <td class="text-center"></td>
                        <td>
                            9. Interlock Bonding Static Reel Front
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td class="text-center">Jumat, 06/03/2021,<br>08:30:30</td>
                        <td class="text-center">Jumat, 06/03/2021,<br>08:45:30</td>
                        <td class="text-center"></td>
                        <td>
                            10. Interlock Bonding Static Reel Rear
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">7</td>
                        <td class="text-center">Senin, 08/03/2021,<br>08:30:30</td>
                        <td class="text-center">Senin, 08/03/2021,<br>08:30:30</td>
                        <td class="text-center"></td>
                        <td>
                            15. Interlock System Fault
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">8</td>
                        <td class="text-center">Selasa, 16/03/2021,<br>08:30:30</td>
                        <td class="text-center">Selasa, 16/03/2021,<br>08:30:30</td>
                        <td class="text-center"></td>
                        <td>
                            16. Breakdown
                        </td>
                    </tr>
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
