<?php
include 'Konek.php';

$query = mysqli_query($conn, "SELECT * FROM kamar");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kamar Kos</title>
</head>
<body>

    <h1>Data Kamar Kos</h1>

    <a href="tambah.php">+ Tambah Kamar</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Kamar</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo htmlspecialchars($data['nama_kamar']); ?></td>
                <td>Rp<?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($data['status']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
                    |
                    <a href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>

    </table>

</body>
</html>