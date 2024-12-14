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

$sql = "SELECT 
            debitur.nik, 
            debitur.nama AS nama_debitur, 
            debitur.tempat_lahir AS tempat_lahir_debitur, 
            debitur.tanggal_lahir AS tanggal_lahir_debitur, 
            debitur.alamat AS alamat_debitur, 
            debitur.rtrw AS rtrw_debitur, 
            debitur.desa AS desa_debitur, 
            debitur.kecamatan AS kecamatan_debitur, 
            debitur.kota AS kota_debitur, 
            debitur.jenis_kelamin AS jenis_kelamin_debitur, 
            debitur.no_hp AS no_hp_debitur, 
            pasangan.nama AS nama_pasangan, 
            pasangan.tempat_lahir AS tempat_lahir_pasangan, 
            pasangan.tgllahir AS tanggal_lahir_pasangan
        FROM debitur
        LEFT JOIN pasangan ON debitur.nik_pasangan = pasangan.nik";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MSO</title>
    <link rel="stylesheet" href="css/dashboard.css" />
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
      <h1>MEMORANDUM SALES OFFICER</h1>
      <div class="table-container">
         <!-- Tombol Add New -->
      <div class="tombol">
        <button class="add-new-btn" onclick="Lanjut()">Add New</button>
      </div>
        <table border="1">
            <thead>
                <tr>
                  <th>No</th>
                    <th>Nama Debitur</th>
                    <th>Tempat Lahir Debitur</th>
                    <th>Tanggal Lahir Debitur</th>
                    <th>Alamat Debitur</th>
                    <th>Jenis Kelamin Debitur</th>
                    <th>Nomor HP Debitur</th>
                    <th>Nama Pasangan</th>
                    <th>Tempat Lahir Pasangan</th>
                    <th>Tanggal Lahir Pasangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama_debitur'] . "</td>";
                        echo "<td>" . $row['tempat_lahir_debitur'] . "</td>";
                        echo "<td>" . $row['tanggal_lahir_debitur'] . "</td>";
                        echo "<td>" . $row['alamat_debitur'], 
                        ",RT/RW ", $row['rtrw_debitur'],
                        ",KELURAHAN/DESA ", $row['desa_debitur'], 
                        ",KECAMATAN ", $row['kecamatan_debitur'], 
                        ",KABUPATEN/KOTA ", $row['kota_debitur'] . "</td>";
                        echo "<td>" . $row['jenis_kelamin_debitur'] . "</td>";
                        echo "<td>" . $row['no_hp_debitur'] . "</td>";
                        echo "<td>" . $row['nama_pasangan'] . "</td>";
                        echo "<td>" . $row['tempat_lahir_pasangan'] . "</td>";
                        echo "<td>" . $row['tanggal_lahir_pasangan'] . "</td>";
                        echo "<td>
        <a href='update_mso.php?nik=" . $row['nik'] . "' class='btn-edit'>Edit</a> <br> 
        <a href='lihat_mso.php?nik=" . $row['nik'] . "' class='btn-view'>Lihat</a> <br>
        <a href='hapus.php?nik=" . $row['nik'] . "' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Hapus</a>
      </td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
            window.location.href = "input_mso.php";
          }
        });
      }
    </script>
  </body>
</html>
