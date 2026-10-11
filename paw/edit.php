<?php
include "Konek.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id        = (int)$_POST['id'];
    $nama      = trim($_POST['nama_kamar']);
    $tipe      = trim($_POST['tipe']);
    $ukuran    = trim($_POST['ukuran']);
    $harga     = (int)$_POST['harga'];
    $fasilitas = trim($_POST['fasilitas']);
    $gambar    = trim($_POST['gambar']);

    $stmt = mysqli_prepare($conn,
        "UPDATE kamar SET nama_kamar=?, tipe=?, ukuran=?, harga=?, fasilitas=?, gambar=?
         WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sssissi", $nama, $tipe, $ukuran, $harga, $fasilitas, $gambar, $id);
    mysqli_stmt_execute($stmt);

    header("Location: admin.php");
    exit;
}

$id = (int)($_GET['id'] ?? 0);
$stmt = mysqli_prepare($conn, "SELECT * FROM kamar WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$row) {
    die("Data kamar tidak ditemukan. <a href='admin.php'>Kembali</a>");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kamar - Kos Tia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="topbar">KOS TIA - Edit Kamar</div>

    <div class="form-box">
        <form method="post">
            <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">

            <label>Nama Kamar</label>
            <input type="text" name="nama_kamar" value="<?= e($row['nama_kamar']) ?>" required>

            <label>Tipe</label>
            <input type="text" name="tipe" value="<?= e($row['tipe']) ?>" required>

            <label>Ukuran</label>
            <input type="text" name="ukuran" value="<?= e($row['ukuran']) ?>" required>

            <label>Harga / Bulan </label>
            <input type="number" name="harga" min="0" value="<?= (int)$row['harga'] ?>" required>

            <label>Fasilitas </label>
            <textarea name="fasilitas" rows="3"><?= e($row['fasilitas']) ?></textarea>

            <label>Nama File Gambar</label>
            <input type="text" name="gambar" value="<?= e($row['gambar']) ?>">

            <button type="submit" class="tombol">Simpan Perubahan</button>
            <a href="admin.php" class="tombol tombol-hapus">Batal</a>
        </form>
    </div>

</body>
</html>