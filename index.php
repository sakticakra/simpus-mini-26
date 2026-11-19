<?php
$page_title = "Beranda";
require __DIR__ . '/includes/koneksi.php'; 

print_r($pdo);
try {
    $totalBuku = $pdo->query("SELECT COUNT(*) FROM buku")->fetchColumn();
    $totalAnggota = $pdo->query("SELECT COUNT(*) FROM anggota")->fetchColumn();
    $totalDipinjam = $pdo->query("SELECT COUNT(*) FROM peminjaman WHERE status = 'dipinjam'")->fetchColumn();
} catch (PDOException $e) {
    die("<h1>Error pada Query Database:</h1><p>" . $e->getMessage() . "</p>");
}


?>
