<?php include "Konek.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Kamar - Kos Tia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="topbar">KOS TIA</div>

    <?php
    $hasil = mysqli_query($conn, "SELECT * FROM kamar ORDER BY id");
    while ($row = mysqli_fetch_assoc($hasil)) {
        $daftar = array_filter(array_map('trim', explode(',', $row['fasilitas'])));
    ?>
    <div class="kamar">
        <h1><?= e($row['nama_kamar']) ?></h1>

        <img src="<?= e($row['gambar']) ?>" alt="Gambar <?= e($row['nama_kamar']) ?>">

        <div class="deskripsi">
            <h2>Deskripsi</h2>
            <p>
                <?= e($row['nama_kamar']) ?> merupakan kamar <?= e(strtolower($row['tipe'])) ?>
                dengan ukuran <?= e($row['ukuran']) ?>.
            </p>

            <p>Fasilitas:</p>
            <ol>
                <?php foreach ($daftar as $f) { ?>
                    <li><?= e($f) ?></li>
                <?php } ?>
            </ol>

            <p><strong>Harga:</strong> <?= rupiah($row['harga']) ?> / bulan</p>
        </div>
    </div>
    <?php } ?>

    <div class="kembali-wrap">
        <a href="Latihan.php" class="tombol">Kembali</a>
    </div>

</body>
</html>