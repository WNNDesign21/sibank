<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <script src="js/navbar.js" defer></script>
</head>

<body>
    <div id="mySidenav" class="sidenav">
        <a href="#">Dashboard</a>
        <a href="#">Memo SO</a>
        <a href="#">Memo AO</a>
        <a href="#">Memo BM</a>
        <a href="#">Memo CA</a>
        <a href="#">CAA</a>
        <a href="logout.php">Logout</a>
    </div>

    <span class="navbar-toggle" onclick="toggleNav()">&#62;</span>

    <div class="wrapper">
        <h2>Dashboard</h2>
        <h2>
            <a href="add_loan.php">Add New Customer</a>
        </h2>
        <div class="table-responsive">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                <?php
                // Koneksi dan ambil data pinjaman
                $conn = new mysqli('localhost', 'root', '', 'sibank');
                $result = $conn->query("SELECT * FROM loans");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['nama_cust']}</td><td>{$row['pinjaman']}</td><td>{$row['tanggal']}</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>