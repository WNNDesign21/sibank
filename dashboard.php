<?php
session_start(); // Memulai session
include('koneksi.php');

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika tidak ada session username, arahkan ke halaman login
    header("Location: login.php");
    exit();
}
$nama = $_SESSION['nama'];
$jabatan = $_SESSION['jabatan'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet"/>
  </head>
  <body>
    <header>
      <button class="hamburger" onclick="toggleSidebar()">☰</button>
      <div class="header-center">
        <h3><?php echo $nama; ?></h3>
        <p><?php echo $jabatan; ?></p>
      </div>
      <img src="assets/pp.png" alt="Profile Picture" />
    </header>

    <aside id="sidebar" class="sidebar">
      <img src="assets/pp.png" alt="Profile Picture" />
      <div class="profile">
        <h2><?php echo $nama; ?></h2>
        <p><?php echo $jabatan; ?></p>
      </div>
      <nav>
        <ul>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="mso.php">Memorandum SO</a></li>
          <li><a href="#">Memorandum AO</a></li>
          <li><a href="#">Memorandum HM</a></li>
          <li><a href="#">Memorandum BM</a></li>
          <li><a href="#">Memorandum CA</a></li>
          <li><a href="CAA.html">CAA</a></li>
        </ul>
      </nav>
      <div class="tombol">
            <form action="logout.php" method="POST">
                <button type="submit" class="btn-primary">Logout</button>
            </form>
        </div>
    </aside>

    <div class="container">
      <h2>DASHBOARD</h2>
    </div>

    <script>
      // Fungsi untuk= tombol hamburger
      function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const hamburger = document.querySelector(".hamburger");

        console.log("Sidebar classList:", sidebar.classList); // Log untuk debug
        sidebar.classList.toggle("sidebar-open");
        hamburger.classList.toggle("hamburger-open");
      }
    </script>
  </body>
</html>
