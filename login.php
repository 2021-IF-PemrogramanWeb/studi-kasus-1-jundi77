<?php

session_start();

// Cek kalau sudah login
if(isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] === true){
  header("location: table.php");
  exit;
}

$username = $password = $username_err = $password_err = $wrong = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (empty(trim($_POST["username"]))) {
    $username_err = "Masukkan username";
  } else {
    $username = $_POST["username"];
  }

  if (empty(trim($_POST["password"]))) {
    $password_err = "Masukkan password";
  } else {
    $password = $_POST["password"];
  }

  if (empty($username_err) && empty($password_err)) {
    include 'db_connection.php';
    $sql = "SELECT * FROM users WHERE username = ?";
    if ($stmt = mysqli_prepare($db, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      $param_username = $username;

      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_pass, $comments);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_pass)) {
              $_SESSION["loggedin"] = true;
              $_SESSION["user"] = [
                'id' => $id,
                'username' => $username,
                'comments' => $comments,
              ];

            } else {
              $username_err = 'Username atau password salah';
            }
          }
        } else {
          $username_err = 'User tidak ditemukan';
        }
      }
      mysqli_stmt_close($stmt);
    }
    mysqli_close($db);
  }

  if (empty($username_err) || empty($password_err)) {
    $_SESSION['flash_message'] = [];
    $_SESSION['flash_message']['username_err'] = $username_err;
    $_SESSION['flash_message']['password_err'] = $password_err;
  }

  header("location: login.php");
  return;
}


// DEFAULT pakai GET
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin-lte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="./assets/logo.jpg" alt="Logo" width="100px">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>

      <form action="login.php" method="post">
        <?php
        if (isset($_SESSION['flash_message']) && isset($_SESSION['flash_message']['username_err']) && !empty($_SESSION['flash_message']['username_err'])) {
        ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $_SESSION['flash_message']['username_err']; ?>
        </div>
        <?php
        }
        ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php
        if (isset($_SESSION['flash_message']) && isset($_SESSION['flash_message']['password_err']) && !empty($_SESSION['flash_message']['password_err'])) {
        ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $_SESSION['flash_message']['password_err']; ?>
        </div>
        <?php
        }
        ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin-lte/dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
if(isset($_SESSION['flash_message'])) {
  unset($_SESSION['flash_message']);
}
?>