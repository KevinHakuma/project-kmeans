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
        header("Location: kuesioner.php?success=1");
    } else {
        header("Location: kuesioner.php?success=2");
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
