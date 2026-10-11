<?php
include "Konek.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];

    $stmt = mysqli_prepare($conn, "DELETE FROM kamar WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

header("Location: admin.php");
exit;