<?php
// Mengatur koneksi ke database MySQL
$host = "localhost"; // Atau IP server database
$username = "root";  // Username database
$password = "";      // Password database (kosong jika tidak ada password)
$dbname = "sibank"; // Nama database yang akan digunakan

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
