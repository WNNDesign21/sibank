<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_cust = $_POST['nama_cust'];
    $pinjaman = $_POST['pinjaman'];
    $tanggal = $_POST['tanggal'];

    $conn = new mysqli('localhost', 'root', '', 'sibank');
    $conn->query("INSERT INTO loans (nama_cust, pinjaman, tanggal) VALUES ('$nama_cust', '$pinjaman', '$tanggal')");
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Loan</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <form method="POST">
        <h2>Add Loan</h2>
        Borrower Name: <input type="text" name="nama_cust" required>
        Amount: <input type="number" name="pinjaman" required>
        Date: <input type="date" name="tanggal" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
