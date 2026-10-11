<?php
include "Konek.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama      = trim($_POST['nama_kamar']);
    $tipe      = trim($_POST['tipe']);
    $ukuran    = trim($_POST['ukuran']);
    $harga     = (int)$_POST['harga'];
    $fasilitas = trim($_POST['fasilitas']);
    $gambar    = trim($_POST['gambar']);

    $stmt = mysqli_prepare($conn,
        "INSERT INTO kamar (nama_kamar, tipe, ukuran, harga, fasilitas, gambar)
         VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssiss", $nama, $tipe, $ukuran, $harga, $fasilitas, $gambar);
    mysqli_stmt_execute($stmt);

    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kamar - Kos Tia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="topbar">KOS TIA - Tambah Kamar</div>

    <div class="form-box">
        <form method="post">
            <label>Nama Kamar</label>
            <input type="text" name="nama_kamar" required>

            <label>Tipe</label>
            <input type="text" name="tipe" placeholder="Standard / Premium" required>

            <label>Ukuran</label>
            <input type="text" name="ukuran" placeholder="3 x 3 m" required>

            <label>Harga / Bulan (angka saja)</label>
            <input type="number" name="harga" min="0" required>

            <label>Fasilitas (pisahkan dengan koma)</label>
            <textarea name="fasilitas" rows="3" placeholder="Kasur, Lemari, Meja"></textarea>

            <label>Nama File Gambar</label>
            <input type="text" name="gambar" placeholder="kamar_c.webp">

            <button type="submit" class="tombol">Simpan</button>
            <a href="admin.php" class="tombol tombol-hapus">Batal</a>
        </form>
    </div>

</body>
</html>