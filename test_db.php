<?php
// Tampilkan error agar kita bisa melihat masalahnya
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Panggil config
$config = require __DIR__ . '/includes/config.php';
$sslmode = getenv('DB_SSLMODE') ?: 'require';

try {
    $dsn = "pgsql:host={$config['db_host']};port={$config['db_port']};dbname={$config['db_name']};sslmode={$sslmode}";
    
    // Tambahkan timeout 5 detik agar tidak menggantung
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 5 
    ];

    $pdo = new PDO($dsn, $config['db_user'], $config['db_pass'], $options);
    echo "<h1>Koneksi Database BERHASIL!</h1>";
    
} catch (PDOException $e) {
    echo "<h1>Koneksi Database GAGAL!</h1>";
    echo "<p>Pesan Error: " . $e->getMessage() . "</p>";
}