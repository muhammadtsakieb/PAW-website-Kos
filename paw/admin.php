<?php include "Konek.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kos Tia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="topbar">KOS TIA - Admin</div>

    <div class="container">
        <p>
            <a href="tambah.php" class="tombol">+ Tambah Kamar</a>
            <a href="Latihan.php" class="tombol">Lihat Halaman Utama</a>
        </p>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Kamar</th>
                <th>Tipe</th>
                <th>Ukuran</th>
                <th>Harga / Bulan</th>
                <th>Fasilitas</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            $hasil = mysqli_query($conn, "SELECT * FROM kamar ORDER BY id");
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= e($row['nama_kamar']) ?></td>
                <td><?= e($row['tipe']) ?></td>
                <td><?= e($row['ukuran']) ?></td>
                <td><?= rupiah($row['harga']) ?></td>
                <td><?= e($row['fasilitas']) ?></td>
                <td><?= e($row['gambar']) ?></td>
                <td class="aksi">
                    <a href="edit.php?id=<?= (int)$row['id'] ?>" class="tombol tombol-edit">Edit</a>
                    <form method="post" action="hapus.php"
                          onsubmit="return confirm('Yakin hapus <?= e($row['nama_kamar']) ?>?');">
                        <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                        <button type="submit" class="tombol tombol-hapus">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>