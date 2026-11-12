<?php
$page_title = "Beranda";
require __DIR__ . '/includes/koneksi.php'; 

try {
    $totalBuku = $pdo->query("SELECT COUNT(*) FROM buku")->fetchColumn();
    $totalAnggota = $pdo->query("SELECT COUNT(*) FROM anggota")->fetchColumn();
    $totalDipinjam = $pdo->query("SELECT COUNT(*) FROM peminjaman WHERE status = 'dipinjam'")->fetchColumn();
} catch (PDOException $e) {
    die("<h1>Error pada Query Database:</h1><p>" . $e->getMessage() . "</p>");
}

include __DIR__ . '/includes/header.php';
?>

<section>
    <h2>Selamat Datang di Sistem Perpustakaan Mini</h2>
    <p>Aplikasi sederhana untuk mengelola data buku dan anggota perpustakaan.</p>
</section>

<section>
    <h2>Ringkasan</h2>
    <article>
        <h3>Total Buku</h3>
        <p><?php echo $totalBuku; ?></p>
    </article>
    <article>
        <h3>Total Anggota</h3>
        <p><?php echo $totalAnggota; ?></p>
    </article>
    <article>
        <h3>Sedang Dipinjam</h3>
        <p><?php echo $totalDipinjam; ?></p>
    </article>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>