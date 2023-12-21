<?php
session_start();
require_once ('../config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];

    $produk_puas = $_POST['produk_puas'];
    $layanan_puas = $_POST['layanan_puas'];
    $mudah_produk = $_POST['mudah_produk'];
    $kemungkinan_beli = $_POST['kemungkinan_beli'];
    $kemungkinan_rekomendasi = $_POST['kemungkinan_rekomendasi'];
    $pengiriman_puas = $_POST['pengiriman_puas'];
    $layanan_responsif = $_POST['layanan_responsif'];

    $stmt = $koneksi->prepare("INSERT INTO tb_kuesioner (nama, produk_puas, layanan_puas, mudah_produk, kemungkinan_beli, kemungkinan_rekomendasi, pengiriman_puas, layanan_responsif) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nama, $produk_puas, $layanan_puas, $mudah_produk, $kemungkinan_beli, $kemungkinan_rekomendasi, $pengiriman_puas, $layanan_responsif);

    if ($stmt->execute()) {
        // Now, perform K-means clustering

        $data = array($produk_puas, $layanan_puas, $mudah_produk, $kemungkinan_beli, $kemungkinan_rekomendasi, $pengiriman_puas, $layanan_responsif);

        // K-means clustering logic
        $k = 2;
        $maxIterations = 100;
        $centers = array();

        for ($i = 0; $i < $k; $i++) {
            $centers[] = $data[array_rand($data)];
        }

        for ($iteration = 0; $iteration < $maxIterations; $iteration++) {
            $assignments = array();

            foreach ($data as $point) {
                $distances = array();

                foreach ($centers as $center) {
                    $distances[] = abs($point - $center);
                }

                $assignments[] = array_search(min($distances), $distances);
            }

            $newCenters = array();

            for ($i = 0; $i < $k; $i++) {
                $clusterPoints = array_filter($data, function ($assign) use ($i) {
                    return $assign == $i;
                });

                $newCenters[] = array_sum($clusterPoints) / count($clusterPoints);
            }

            if ($newCenters === $centers) {
                break;
            }

            $centers = $newCenters;
        }

        $finalAssignments = $assignments;

        $jumlahPuas = array_count_values($finalAssignments)[0];
        $jumlahTidakPuas = array_count_values($finalAssignments)[1];

        // Save the clustering results to tb_hasil_kuesioner
        $stmtHasil = $koneksi->prepare("INSERT INTO tb_hasil_kuesioner (nama, jumlah_puas, jumlah_tidak_puas) VALUES (?, ?, ?)");
        $stmtHasil->bind_param("sii", $nama, $jumlahPuas, $jumlahTidakPuas);
        $stmtHasil->execute();
        $stmtHasil->close();

        // Redirect to the kuesioner.php page with success parameter
        header("Location: kuesioner.php?success=1");
    } else {
        header("Location: kuesioner.php?success=2");
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
