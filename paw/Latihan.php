<?php include "Konek.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kos Tia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="topbar">KOS TIA</div>

    <div class="container">
        <table>
            <tr>
                <th>Nama Kamar</th>
                <th>Tipe</th>
                <th>Ukuran</th>
                <th>Harga / Bulan</th>
                <th>Fasilitas</th>
            </tr>

            <?php
            $hasil = mysqli_query($conn, "SELECT * FROM kamar ORDER BY id");
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
            <tr>
                <td><?= e($row['nama_kamar']) ?></td>
                <td><?= e($row['tipe']) ?></td>
                <td><?= e($row['ukuran']) ?></td>
                <td><?= rupiah($row['harga']) ?></td>
                <td><?= e($row['fasilitas']) ?></td>
            </tr>
            <?php } ?>
        </table>

        <p>
            <a href="Latihan2.php" class="tombol">Selengkapnya</a>
            <a href="admin.php" class="tombol tombol-edit">Kelola Data (Admin)</a>
        </p>
    </div>

</body>
</html>