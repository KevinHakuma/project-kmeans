<?php
require_once ('../config/config.php');

session_start();

if (isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<!-- Preloader -->
<?php
include ('preloader.php');
?>

<!-- header -->
<?php
include ('header.php');
?>

<?php
include ('../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a> -->
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a> -->
          <div class="dropdown-divider"></div>
          <!-- <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a> -->
          <div class="dropdown-divider"></div>
          <!-- <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a> -->
          <div class="dropdown-divider"></div>
          <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
        </div>
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i> -->
        </a>
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button"> -->
          <!-- <i class="fas fa-th-large"></i> -->
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SKTO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kuesioner.php" class="nav-link active">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Isi Kuesioner
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data_pengguna.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kmeans/kmean_table.php" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Hitung Kmeans
              </p>
            </a>
          </li>
        </ul>
      <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kuesioner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kuesioner</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Petunjuk</h5>
            </div>
            <div class="card-body">
                <ul type="bullet">
                    <li><p class="card-text">Dalam upaya untuk meningkatkan kualitas layanan di toko online Shopee, kami mohon Anda memberikan penilaian mengenai pengalaman belanja Anda secara objektif dan jujur.</p></li><br>
                    <li><p class="card-text">Harap dicatat bahwa jawaban yang Anda berikan tidak akan memengaruhi pengalaman belanja online Anda selanjutnya.</p></li><br>
                    <li><p class="card-text">Isilah kolom dengan tanda centang sesuai dengan pendapat Anda berdasarkan skala berikut:</p></li>
                    <ul type="circle">
                        <li>Sangat Tidak Puas Skor = 1</li>
                        <li>Tidak Puas Skor = 2</li>
                        <li>Netral Skor = 3</li>
                        <li>Puas Skor = 4</li>
                        <li>Sangat Puas Skor = 5</li>
                    </ul><br>
                </ul>
                <!-- <a href="#" >Isi Kuesioner</a> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Isi Kuesioner</button>
            </div>
        </div>
    </section>
  </div>

  <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Kuesioner</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="proses_simpan.php" method="post">
            <div class="modal-body">
              <!-- <p>One fine body&hellip;</p> -->
              <div class="col-sm-6">
                    <div class="form-group clearfix">
                          <ol>
                            <li>
                            <p>Masukan Nama Anda?</p>
                            <input type="text" name="nama" id="nama">
                            </li> <br>

                            <li>
                                <p>Seberapa puas Anda dengan produk yang Anda beli?</p>
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="produk_puas" value="1" id="radioProdukPuas1">
                                    <label for="radioProdukPuas1">
                                        Sangat Tidak Puas
                                    </label>
                                </div>
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="produk_puas" value="2" id="radioProdukPuas2">
                                    <label for="radioProdukPuas2">
                                        Tidak Puas
                                    </label>
                                </div>
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="produk_puas" value="3" id="radioProdukPuas3">
                                    <label for="radioProdukPuas3">
                                        Biasa Saja
                                    </label>
                                </div>
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="produk_puas" value="4" id="radioProdukPuas4">
                                    <label for="radioProdukPuas4">
                                        Puas
                                    </label>
                                </div>
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="produk_puas" value="5" id="radioProdukPuas5">
                                    <label for="radioProdukPuas5">
                                        Sangat Puas
                                    </label>
                                </div>
                            </li> <br>

                            <li>
                              <p>Seberapa puas Anda dengan layanan pelanggan kami?</p>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="layanan_puas" value="1" id="radioLayananPuas1">
                                  <label for="radioLayananPuas1">
                                      Sangat Tidak Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="layanan_puas" value="2" id="radioLayananPuas2">
                                  <label for="radioLayananPuas2">
                                      Tidak Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="layanan_puas" value="3" id="radioLayananPuas3">
                                  <label for="radioLayananPuas3">
                                      Biasa Saja
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="layanan_puas" value="4" id="radioLayananPuas4">
                                  <label for="radioLayananPuas4">
                                      Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="layanan_puas" value="5" id="radioLayananPuas5">
                                  <label for="radioLayananPuas5">
                                      Sangat Puas
                                  </label>
                              </div>
                            </li> <br>

                            <li>
                              <p>Seberapa mudah Anda menemukan produk yang Anda cari di toko online kami?</p>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="mudah_produk" value="1" id="radioMudahProduk1">
                                  <label for="radioMudahProduk1">
                                      Sangat Tidak Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="mudah_produk" value="2" id="radioMudahProduk2">
                                  <label for="radioMudahProduk2">
                                      Tidak Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="mudah_produk" value="3" id="radioMudahProduk3">
                                  <label for="radioMudahProduk3">
                                      Biasa Saja
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="mudah_produk" value="4" id="radioMudahProduk4">
                                  <label for="radioMudahProduk4">
                                      Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="mudah_produk" value="5" id="radioMudahProduk5">
                                  <label for="radioMudahProduk5">
                                      Sangat Puas
                                  </label>
                              </div>
                            </li> <br>

                            <li>
                              <p>Seberapa besar kemungkinan Anda akan membeli produk dari toko kami lagi di masa mendatang?</p>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="kemungkinan_beli" value="1" id="radioKemungkinanBeli1">
                                  <label for="radioKemungkinanBeli1">
                                      Sangat Kecil
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="kemungkinan_beli" value="2" id="radioKemungkinanBeli2">
                                  <label for="radioKemungkinanBeli2">
                                      Kecil
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="kemungkinan_beli" value="3" id="radioKemungkinanBeli3">
                                  <label for="radioKemungkinanBeli3">
                                      Sedang
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="kemungkinan_beli" value="4" id="radioKemungkinanBeli4">
                                  <label for="radioKemungkinanBeli4">
                                      Besar
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="kemungkinan_beli" value="5" id="radioKemungkinanBeli5">
                                  <label for="radioKemungkinanBeli5">
                                      Sangat Besar
                                  </label>
                              </div>
                            </li> <br>

                            <li>
                              <p>Seberapa besar kemungkinan Anda akan merekomendasikan toko online kami kepada teman atau keluarga?</p>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="kemungkinan_rekomendasi" value="1" id="radioKemungkinanRekomendasi1">
                                  <label for="radioKemungkinanRekomendasi1">
                                      Sangat Kecil
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="kemungkinan_rekomendasi" value="2" id="radioKemungkinanRekomendasi2">
                                  <label for="radioKemungkinanRekomendasi2">
                                      Kecil
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="kemungkinan_rekomendasi" value="3" id="radioKemungkinanRekomendasi3">
                                  <label for="radioKemungkinanRekomendasi3">
                                      Sedang
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="kemungkinan_rekomendasi" value="4" id="radioKemungkinanRekomendasi4">
                                  <label for="radioKemungkinanRekomendasi4">
                                      Besar
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="kemungkinan_rekomendasi" value="5" id="radioKemungkinanRekomendasi5">
                                  <label for="radioKemungkinanRekomendasi5">
                                      Sangat Besar
                                  </label>
                              </div>
                            </li> <br>

                            <li>
                              <p>Seberapa puas Anda dengan proses pengiriman dan waktu pengiriman produk?</p>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="pengiriman_puas" value="1" id="radioPengirimanPuas1">
                                  <label for="radioPengirimanPuas1">
                                      Sangat Tidak Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="pengiriman_puas" value="2" id="radioPengirimanPuas2">
                                  <label for="radioPengirimanPuas2">
                                      Tidak Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="pengiriman_puas" value="3" id="radioPengirimanPuas3">
                                  <label for="radioPengirimanPuas3">
                                      Biasa Saja
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="pengiriman_puas" value="4" id="radioPengirimanPuas4">
                                  <label for="radioPengirimanPuas4">
                                      Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="pengiriman_puas" value="5" id="radioPengirimanPuas5">
                                  <label for="radioPengirimanPuas5">
                                      Sangat Puas
                                  </label>
                              </div>
                            </li> <br>

                            <li>
                              <p>Seberapa responsif dan membantu layanan pelanggan kami dalam menangani pertanyaan atau masalah Anda?</p>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="layanan_responsif" value="1" id="radioLayananResponsif1">
                                  <label for="radioLayananResponsif1">
                                      Sangat Tidak Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="layanan_responsif" value="2" id="radioLayananResponsif2">
                                  <label for="radioLayananResponsif2">
                                      Tidak Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="layanan_responsif" value="3" id="radioLayananResponsif3">
                                  <label for="radioLayananResponsif3">
                                      Biasa Saja
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="layanan_responsif" value="4" id="radioLayananResponsif4">
                                  <label for="radioLayananResponsif4">
                                      Puas
                                  </label>
                              </div>
                              <div class="icheck-success d-inline">
                                  <input type="radio" name="layanan_responsif" value="5" id="radioLayananResponsif5">
                                  <label for="radioLayananResponsif5">
                                      Sangat Puas
                                  </label>
                              </div>
                          </ol>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!-- <b>Version</b> 3.2.0 -->
    </div>
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Herman</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
<?php
if (isset($_GET['success'])) { // Ubah 'succes' menjadi 'success'
    $s = $_GET['success']; // Ubah 'succes' menjadi 'success'
    if ($s == 1) {
        echo "<script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'success',
            title: 'Data Berhasil Disimpan!'
        })</script>";
    } else if ($s == 2) {
        echo "<script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'center-top',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'error',
            title: 'Data Tidak Tersimpan!'
        })</script>";
    } else {
        echo '';
    }
}
?>
</html>
