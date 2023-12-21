<?php
require_once ('../../config/config.php');

session_start();

if (isset($_SESSION['user_id'])) {
  header("Location: ../login.php");
  exit;
}

$query = "SELECT nama,username FROM tb_users";
$result = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="en">

<!-- Preloader -->
<?php
include ('../preloader.php');
?>

<!-- header -->
<?php
include ('../header.php');
?>

<?php
include ('../../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Hitung Kmeans</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
    <a href="../index.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../kuesioner.php" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Isi Kuesioner
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../data_pengguna.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kmeans/kmean_table.php" class="nav-link active">
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
            <h1>K-Means</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">K-Means</li>
            </ol>
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
              <div class="card-header">
                <form method="post">
                  <button type="submit" class="btn btn-primary" name="hitungKmeansBtn">Hitung Kmeans</button>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jarak ke Centroid 1</th>
                        <th>Jarak ke Centroid 2</th>
                        <th>Jarak ke Centroid 3</th>
                        <th>Jarak Terdekat</th>
                        <th>Cluster</th>
                    </tr>
                    </thead>
                    <tbody id="resultBody">
                    <?php
                    if (isset($_POST['hitungKmeansBtn'])) {
                      // Fungsi untuk menghitung jarak euclidean antara dua titik
                      function euclideanDistance($point1, $point2) {
                        $sum = 0;
                        $n = count($point1);

                        for ($i = 1; $i < $n; $i++) {
                            $sum += pow($point1[$i] - $point2[$i], 2);
                        }

                        return sqrt($sum);
                    }

                    // Fungsi untuk mengelompokkan data ke dalam cluster
                    function assignToClusters($data, $centroids) {
                        $clusters = array();

                        foreach ($data as $point) {
                            $minDistance = PHP_INT_MAX;
                            $assignedCluster = -1;

                            foreach ($centroids as $index => $centroid) {
                                $distance = euclideanDistance($point, $centroid);

                                if ($distance < $minDistance) {
                                    $minDistance = $distance;
                                    $assignedCluster = $index;
                                }
                            }

                            $clusters[$assignedCluster][] = $point;
                        }

                        return $clusters;
                    }

                    // Fungsi untuk memeriksa apakah dua set centroid sama atau tidak
                    function areCentroidsEqual($centroids1, $centroids2) {
                        foreach ($centroids1 as $index => $centroid) {
                            if (euclideanDistance(array_slice($centroid, 1), array_slice($centroids2[$index], 1)) > 0.0001) {
                                return false;
                            }
                        }
                        return true;
                    }

                    // Fungsi untuk menghitung rata-rata dari titik-titik dalam suatu cluster
                    function updateCentroids($clusters) {
                        $centroids = array();

                        foreach ($clusters as $cluster) {
                            $n = count($cluster);
                            $sums = array_fill(0, count($cluster[0]), 0);

                            foreach ($cluster as $point) {
                                foreach ($point as $index => $value) {
                                    $sums[$index] += is_numeric($value) ? $value : 0;
                                }
                            }

                            $centroids[] = array_map(function ($sum) use ($n) {
                                return $sum / $n;
                            }, $sums);
                        }

                        return $centroids;
                    }

                    // Fungsi untuk menginisialisasi centroid secara acak
                    function initializeRandomCentroids($data, $k) {
                        $centroids = [];

                        for ($i = 0; $i < $k; $i++) {
                            $centroids[] = $data[mt_rand(0, count($data) - 1)];
                        }

                        return $centroids;
                    }

                    // Fungsi k-means utama
                    function kMeans($data, $k, $maxIterations = 100) {
                        // Inisialisasi centroid awal secara acak
                        $centroids = initializeRandomCentroids($data, $k);

                        for ($i = 0; $i < $maxIterations; $i++) {
                            // Langkah 1: Mengelompokkan data ke dalam cluster
                            $clusters = assignToClusters($data, $centroids);

                            // Langkah 2: Menghitung ulang centroid dari setiap cluster
                            $newCentroids = updateCentroids($clusters);

                            // Jika centroid tidak berubah, keluar dari iterasi
                            if (areCentroidsEqual($newCentroids, $centroids)) {
                                break;
                            }

                            $centroids = $newCentroids;
                        }

                        return ['clusters' => $clusters, 'centroids' => $centroids];
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "kmeans";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $query = "SELECT nama, produk_puas, layanan_puas, mudah_produk, kemungkinan_beli, kemungkinan_rekomendasi, pengiriman_puas, layanan_responsif FROM tb_kuesioner";
                    $result = $conn->query($query);

                    // Contoh penggunaan
                    $data = array();
                    while ($row = $result->fetch_assoc()) {
                        $data[] = array(
                            $row['nama'],
                            $row['produk_puas'],
                            $row['layanan_puas'],
                            $row['mudah_produk'],
                            $row['kemungkinan_beli'],
                            $row['kemungkinan_rekomendasi'],
                            $row['pengiriman_puas'],
                            $row['layanan_responsif']
                        );
                    }

                    $k = 3; // Jumlah cluster yang diinginkan
                    $result = kMeans($data, $k);

                    $counter = 1;
                    foreach ($data as $point) {
                        $jarakKeCentroid = array();
                        foreach ($result['centroids'] as $centroid) {
                            $jarakKeCentroid[] = euclideanDistance(array_slice($point, 1), array_slice($centroid, 1));
                        }

                        $jarakTerdekat = min($jarakKeCentroid);
                        $clusterIndexTerdekat = array_search($jarakTerdekat, $jarakKeCentroid);

                        echo '<tr>';
                        echo '<td>' . $counter++ . '</td>';
                        echo '<td>' . $point[0] . '</td>';
                        foreach ($jarakKeCentroid as $distance) {
                            echo '<td>' . $distance . '</td>';
                        }
                        echo '<td>' . $jarakTerdekat . '</td>';
                        echo '<td>' . ($clusterIndexTerdekat + 1) . '</td>';
                        echo '</tr>';
                     }
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!-- <b>Version</b> 3.2.0 -->
    </div>
    <strong>Copyright &copy; 2023 <a href="#">Herman</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
