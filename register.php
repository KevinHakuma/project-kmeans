<?php
session_start();

if (isset($_SESSION['user_id'])) {
  // Jika pengguna sudah login, arahkan ke halaman beranda atau tempat yang sesuai.
  header("Location: login.php");
  exit;
}

require_once ('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Basic validation (you may want to add more)
    if (empty($nama) || empty($username) || empty($password)) {
        // Handle validation errors
        echo "All fields are required.";
    } else {
        // Insert user data into the database (you should hash the password in a real-world scenario)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertQuery = "INSERT INTO tb_users (nama, username, password) VALUES ('$nama', '$username', '$hashedPassword')";

        if ($koneksi->query($insertQuery) === TRUE) {
            // Registration successful, you can redirect to the login page or another page
            header("Location: login.php");
            exit;
        } else {
            // Handle database error
            echo "Error: " . $insertQuery . "<br>" . $koneksi->error;
        }
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SKTO | Sign up</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="app/index2.html" class="h1"><b>SKTO</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register here</p>

      <form action="" method="post">
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="nama" required name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="username" required name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-4">
            <!-- <button type="submit" class="btn btn-primary btn-block">Sign In</button> -->
            <input type="submit" class="btn btn-primary btn-block" name="register" value="register">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        <a href="login.php" class="text-center">Login Here</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="app/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="app/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
<?php
if (isset ($_GET['error'])) {
$x = ($_GET['error']);
  if ($x==1) {
    echo "<script>
    var Toast = Swal.mixin({
      toast: true,
      position: 'center-top',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      icon: 'error',
      title: 'Login Gagal'
    })</script>";
  } else if ($x==2) {
    echo "<script>
    var Toast = Swal.mixin({
      toast: true,
      position: 'center-top',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      icon: 'warning',
      title: 'Silahkan Inputkan Username & Password'
    })</script>";
  } else {
    echo '';
  }
}
?>
</html>
