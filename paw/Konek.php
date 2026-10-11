<?php
$conn = mysqli_connect("localhost", "root", "", "kos_tia");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi bantu: amankan teks sebelum ditampilkan di HTML
function e($teks) {
    return htmlspecialchars($teks ?? '', ENT_QUOTES, 'UTF-8');
}

function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}
?>