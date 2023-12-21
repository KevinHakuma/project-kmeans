<?php
require_once ('../config/config.php');

if (isset($_SESSION['user_id'])) {
  header("Location: ../login.php");
  exit;
}

// Query to get the total number of respondents
$queryRespondents = "SELECT COUNT(*) as totalRespondents FROM tb_kuesioner";
$resultRespondents = $koneksi->query($queryRespondents);

// Default value in case of an error
$totalRespondents = 0;

if ($resultRespondents && $resultRespondents->num_rows > 0) {
    $row = $resultRespondents->fetch_assoc();
    $totalRespondents = $row['totalRespondents'];
}

$queryUser = "SELECT COUNT(*) as totalUser FROM tb_users";
$resultUser = $koneksi->query($queryUser);

// Default value in case of an error
$totalUser = 0;

if ($resultUser && $resultUser->num_rows > 0) {
    $row = $resultUser->fetch_assoc();
    $totalUser = $row['totalUser'];
}
?>


    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $totalRespondents; ?></h3>

                <p>Responden</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="kuesioner.php" class="small-box-footer">More Info <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totalUser; ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="data_pengguna.php" class="small-box-footer">More Info <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas"></i></a>
            </div> -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>