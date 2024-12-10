<?php

include('koneksi.php');

session_start(); // Memulai session

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
    <title>MSO</title>
    <link rel="stylesheet" href="dashboard2.css" />
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js
"></script>
    <link
      href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css
"
      rel="stylesheet"
    />
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
          <li><a href="#">Memorandum SO</a></li>
          <li><a href="#">Memorandum AO</a></li>
          <li><a href="#">Memorandum HM</a></li>
          <li><a href="#">Memorandum BM</a></li>
          <li><a href="#">Memorandum CA</a></li>
          <li><a href="CAA.html">CAA</a></li>
        </ul>
      </nav>
      <button class="logout">Logout</button>
    </aside>

    <div class="container">
      <h2>MEMORANDUM SALES OFFICER</h2>
      <div class="table-container">
        <table class="data-table">
          <thead>
            <tr>
              <th>NO</th>
              <th>DATE</th>
              <th>ID APPLICATION</th>
              <th>CUSTOMER NAME</th>
              <th>MARKETING NAME</th>
              <th>DHS STATUS</th>
              <th>MH STATUS</th>
              <th>TOOLS</th>
            </tr>
          </thead>
          <tbody>
            <!-- Tambahkan data dengan total lebih dari 15 baris -->

            <tr>
              <td>1</td>
              <td>SO-1806240001</td>
              <td>ADHI NUR FAJAR</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>2</td>
              <td>SO-1806240002</td>
              <td>ARIE SETYA BUDIMAN</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>3</td>
              <td>SO-1806240003</td>
              <td>ADE NASIHUL UMAM</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>4</td>
              <td>SO-1806240004</td>
              <td>ROFI FEBRIAN AJI</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5</td>
              <td>SO-1806240005</td>
              <td>RIVERIO</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>125,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>1</td>
              <td>SO-1806240001</td>
              <td>ADHI NUR FAJAR</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>2</td>
              <td>SO-1806240002</td>
              <td>ARIE SETYA BUDIMAN</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>3</td>
              <td>SO-1806240003</td>
              <td>ADE NASIHUL UMAM</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>4</td>
              <td>SO-1806240004</td>
              <td>ROFI FEBRIAN AJI</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5</td>
              <td>SO-1806240005</td>
              <td>RIVERIO</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>125,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>1</td>
              <td>SO-1806240001</td>
              <td>ADHI NUR FAJAR</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>2</td>
              <td>SO-1806240002</td>
              <td>ARIE SETYA BUDIMAN</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>3</td>
              <td>SO-1806240003</td>
              <td>ADE NASIHUL UMAM</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>4</td>
              <td>SO-1806240004</td>
              <td>ROFI FEBRIAN AJI</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>5</td>
              <td>SO-1806240005</td>
              <td>RIVERIO</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>-</td>

              <td>-</td>
            </tr>
            <tr>
              <td>1</td>
              <td>SO-1806240001</td>
              <td>ADHI NUR FAJAR</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>2</td>
              <td>SO-1806240002</td>
              <td>ARIE SETYA BUDIMAN</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>3</td>
              <td>SO-1806240003</td>
              <td>ADE NASIHUL UMAM</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>4</td>
              <td>SO-1806240004</td>
              <td>ROFI FEBRIAN AJI</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5</td>
              <td>SO-1806240005</td>
              <td>RIVERIO</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>125,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>1</td>
              <td>SO-1806240001</td>
              <td>ADHI NUR FAJAR</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>2</td>
              <td>SO-1806240002</td>
              <td>ARIE SETYA BUDIMAN</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>3</td>
              <td>SO-1806240003</td>
              <td>ADE NASIHUL UMAM</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>4</td>
              <td>SO-1806240004</td>
              <td>ROFI FEBRIAN AJI</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5</td>
              <td>SO-1806240005</td>
              <td>RIVERIO</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>125,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>1</td>
              <td>SO-1806240001</td>
              <td>ADHI NUR FAJAR</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>
              <td>450,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>2</td>
              <td>SO-1806240002</td>
              <td>ARIE SETYA BUDIMAN</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>200,000,000</td>
              <td>-</td>
            </tr>
            <tr>
              <td>3</td>
              <td>SO-1806240003</td>
              <td>ADE NASIHUL UMAM</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>
              <td>100,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>4</td>
              <td>SO-1806240004</td>
              <td>ROFI FEBRIAN AJI</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>
              <td>150,000,000</td>

              <td>-</td>
            </tr>
            <tr>
              <td>5</td>
              <td>SO-1806240005</td>
              <td>RIVERIO</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>125,000,000</td>
              <td>-</td>

              <td>-</td>
            </tr>
            <!-- Tambahkan baris hingga lebih dari 15 -->
          </tbody>
        </table>
      </div>
      <!-- Tombol Add New -->
      <div class="tombol">
        <button class="add-new-btn" onclick="Lanjut()">Add New</button>
      </div>
      <!-- POP UP Upload -->
      <div id="Upload" class="Upload">
        <div class="Upload-content">
          <label>SILAHKAN LANJUTKAN INPUT</label>
          <!-- Tombol Uplod -->
          <div class="tombol">
            <button class="upload-btn" onclick="Upload()">Upload</button>
          </div>
        </div>
      </div>
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

      // Fungsi untuk membuka Upload
      function openUpload() {
        document.getElementById("Upload").style.display = "block";
      }
      // Fungsi untuk menangani klik di luar popup
      window.onclick = function (event) {
        var modal = document.querySelector(".Upload");
        var content = document.querySelector(".Upload-content");

        // Jika klik terjadi di luar modal, sembunyikan modal
        if (event.target == modal) {
          modal.style.display = "none";
        }
      };

      function Lanjut() {
        // // alert("test");
        // document.getElementById("Upload").style.display = "block";
        Swal.fire({
          title: "Lanjutkan Inputan Data Debitur",
          icon: "success",
          confirmButtonText: "OK",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "input_MSO.php";
          }
        });
      }
    </script>
  </body>
</html>
