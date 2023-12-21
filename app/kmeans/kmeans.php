<?php

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
// Prepare the data to be returned as JSON
// Prepare the data to be returned as JSON
$response = [
    'clusters' => $result['clusters'],
    'centroids' => $result['centroids']
];

// Output the JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Menampilkan hasil clustering
echo "---------------------------------------------------------------\n";
echo "| Nama\t\t| Jarak ke Centroid 1\t| Jarak ke Centroid 2\t| Jarak ke Centroid 3\t| Jarak Terdekat\t| Cluster\t|\n";
echo "---------------------------------------------------------------\n";

// Iterate over the original dataset (in the order it appears in the table)
foreach ($data as $point) {
    $jarakKeCentroid = array();
    foreach ($result['centroids'] as $centroid) {
        $jarakKeCentroid[] = euclideanDistance(array_slice($point, 1), array_slice($centroid, 1));
    }

    $jarakTerdekat = min($jarakKeCentroid);
    $clusterIndexTerdekat = array_search($jarakTerdekat, $jarakKeCentroid);

    echo "| " . $point[0] . "\t\t| " . implode("\t| ", $jarakKeCentroid) . "\t| " . $jarakTerdekat . "\t| " . ($clusterIndexTerdekat + 1) . "\t|\n";
}

// echo "---------------------------------------------------------------\n";

?>


<!-- INI KODE BERHASIL  -->