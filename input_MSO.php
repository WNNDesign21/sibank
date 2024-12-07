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
    <link rel="stylesheet" href="input_MSO.css" />
  </head>
  <body>
    <header>
      <button class="hamburger" onclick="toggleSidebar()">☰</button>
      <div class="header-center">
        <h3>WENDI NUGRAHA N</h3>
        <p>IT Staff</p>
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
      <div class="section-title">MEMORANDUM SO</div>

      <form>
        <div class="form-row">
          <div class="form-group">
            <label>Sumber Aplikasi</label>
            <select id="sumber-aplikasi" class="form-select">
            <option value="" disabled selected>Sumber Aplikasi</option>
              <option value="m-b">Mitra Bisnis</option>
              <option value="s-m">Social Media</option>
              <option value="t-m">Telemarketing</option>
              <option value="r-o">Repeat Order</option>
              <option value="b-r">Brosuring</option>
              <option value="w-i">Walkin</option>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Sumber</label>
            <input
              type="text"
              id="nama-sumber"
              class="form-control"
              placeholder="Nama Mitra Bisnis"
            />
          </div>
          <div class="form-group">
            <label>Nama Sales Officer</label>
            <input
              type="text"
              id="nama-sales"
              class="form-control"
              value="<?php echo $nama; ?>"
            disabled/>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Pengajuan</label>
            <input
              type="text"
              id="pengajuan"
              class="form-control"
              placeholder="Nominal Pengajuan"
              oninput="formatNumber(this)"
            />
          </div>
          <div class="form-group">
            <label>Tenor</label>
            <select id="tenor" class="form-select">
              <option value="6">6 Bulan</option>
              <option value="12">12 Bulan</option>
              <option value="24">24 Bulan</option>
              <option value="36">36 Bulan</option>
              <option value="48">48 Bulan</option>
              <option value="60">60 Bulan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tujuan Pinjaman</label>
            <select id="tujuan" class="form-select">
              <option value="Konsumtif">Konsumtif</option>
              <option value="Investasi">Investasi</option>
              <option value="Liburan">Liburan</option>
              <option value="Pendidikan">Pendidikan</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Produk</label>
            <input
              type="text"
              id="produk"
              class="form-control"
              placeholder="Kredit Agunan Sertifikat"
            />
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <input
              type="text"
              id="deskripsi"
              class="form-control"
              placeholder="Kredit Spesial Karyawan"
            />
          </div>
        </div>
      </form>
      <!-- Data PEMOHON Section -->

      <div class="section-title">DATA PEMOHOM</div>
      <div class="ocr">
        <input
          type="file"
          id="ktpImage"
          accept="image/*"
          class="form-control"
        />
        <button class="btn-primary" onclick="processOCR()">Proses OCR</button>
      </div>
      <!-- Hasil OCR -->
      <pre id="ocrResult" style="display: block"></pre>
      <form id="ktpForm">
        <div class="form-row">
        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" class="form-control" />
          </div>
        <div class="form-group">
            <label for="no-kk">No Kartu Keluarga:</label>
            <input type="text" id="nik" name="nik" class="form-control" />
          </div>
          <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" class="form-control" />
          </div>
          <div class="form-group">
            <label for="tempatlahir">Tempat Lahir:</label>
            <input
              type="text"
              id="tempatlahir"
              name="tempatlahir"
              class="form-control"
            />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="tgllahir">Tanggal Lahir:</label>
            <input
              type="text"
              id="tgllahir"
              name="tgllahir"
              class="form-control"
            />
          </div>

          <div class="form-group">
            <label for="jeniskelamin">Jenis Kelamin:</label>
            <input type="text" id="jeniskelamin" name="jeniskelamin" class="form-control" />
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea
              id="alamat"
              name="alamat"
              class="form-control"
            ></textarea>
          </div>
          <div class="form-group">
            <label for="desa">Desa/Kelurahan:</label>
            <input type="text" id="desa" name="desa" class="form-control" />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="kecamatan">Kecamatan:</label>
            <input
              type="text"
              id="kecamatan"
              name="kecamatan"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="kabupatenKota">Kabupaten/Kota:</label>
            <input
              type="text"
              id="kabupatenKota"
              name="kabupatenKota"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="agama">Agama:</label>
            <input
              type="text"
              id="agama"
              name="agama"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="pekerjaan">Pekerjaan:</label>
            <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="statusperkawinan">Status Perkawinan:</label>
            <input
              type="text"
              id="statusperkawinan"
              name="statusperkawinan"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="kewarganegaraan">Kewarganegaraan:</label>
            <input
              type="text"
              id="kewarganegaraan"
              name="kewarganegaraan"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="nama-ibu">Nama Ibu Kandung:</label>
            <input type="text" id="nama-ibu" name="nama-ibu" class="form-control" />
          </div>
          <div class="form-group">
            <label for="no-npwp">No NPWP:</label>
            <input type="text" id="no-npwp" name="no-npwp" class="form-control" />
          </div>
        </div>

        <div class="form-row">
        <div class="form-group">
            <label for="pendidikan">Pendidikan Terakhir:</label>
            <input type="text" id="pendidikan" name="pendidikan" class="form-control" />
          </div>
          <div class="form-group">
            <label for="no-hp">No Handphone:</label>
            <input type="text" id="no-hp" name="no-hp" class="form-control" />
          </div>
          <div class="form-group">
            <label for="rtrw">RT/RW:</label>
            <input type="text" id="rtrw" name="rtrw" class="form-control" />
          </div>
        </div>

        <!-- Data PASANGAN PEMOHON -->
        <div class="section-title">DATA PASANGAN PEMOHOM</div>
      </form>
      <div class="ocr">
        <input
          type="file"
          id="ktpImage-psg"
          accept="image/*"
          class="form-control"
        />
        <button class="btn-primary" onclick="processOCRpsg()">
          Proses OCR
        </button>
      </div>
      <!-- Hasil OCR -->
      <pre id="ocrResult-psg" style="display: block"></pre>
      <form id="ktpForm">
        <div class="form-row">
          <div class="form-group">
            <label for="name-psg">Nama:</label>
            <input
              type="text"
              id="name-psg"
              name="name-psg"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="nik-psg">NIK:</label>
            <input
              type="text"
              id="nik-psg"
              name="nik-psg"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="tempatlahir-psg">Tempat Lahir:</label>
            <input
              type="text"
              id="tempatlahir-psg"
              name="tempatlahir-psg"
              class="form-control"
            />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="tgllahir-psg">Tanggal Lahir:</label>
            <input
              type="text"
              id="tgllahir-psg"
              name="tgllahir-psg"
              class="form-control"
            />
          </div>

          <div class="form-group">
            <label for="jeniskelamin-psg">Jenis Kelamin:</label>
            <input
              type="text"
              id="jeniskelamin-psg"
              name="jeniskelamin-psg"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="alamat-psg">Alamat:</label>
            <textarea
              id="alamat-psg"
              name="alamat-psg"
              class="form-control"
            ></textarea>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="desa-psg">Desa/Kelurahan:</label>
            <input
              type="text"
              id="desa-psg"
              name="desa-psg"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="kecamatan-psg">Kecamatan:</label>
            <input
              type="text"
              id="kecamatan-psg"
              name="kecamatan-psg"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="kabupatenKota-psg">Kabupaten/Kota:</label>
            <input
              type="text"
              id="kabupatenKota-psg"
              name="kabupatenKota-psg"
              class="form-control"
            />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="agama-psg">Agama:</label>
            <input
              type="text"
              id="agama-psg"
              name="agama-psg"
              class="form-control"
            />
          </div>

          <div class="form-group">
            <label for="pekerjaan-psg">Pekerjaan:</label>
            <input
              type="text"
              id="pekerjaan-psg"
              name="pekerjaan-psg"
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="kewarganegaraan-psg">Kewarganegaraan:</label>
            <input
              type="text"
              id="kewarganegaraan-psg"
              name="kewarganegaraan-psg"
              class="form-control"
            />
          </div>
        </div>
      </form>

      <!-- Lampiran Section -->

      <div class="section-title">LAMPIRAN</div>
      <div class="form-row">
        <div class="form-group">
          <div class="upload-box">
            <label for="ktpDebitur">Upload KTP Debitur</label>
            <input
              type="file"
              id="ktpDebitur"
              name="lampiran_ktp"
              accept="image/*"
            />
          </div>
        </div>
        <div class="form-group">
          <div class="upload-box">
            <label for="kkDebitur">Upload Kartu Keluarga</label>
            <input
              type="file"
              id="kkDebitur"
              name="lampiran_kk"
              accept="image/*"
            />
          </div>
        </div>
        <div class="form-group">
          <div class="upload-box">
            <label for="fotoDebitur">Upload Foto NPWP Debitur</label>
            <input
              type="file"
              id="npwpDebitur"
              name="lampiran_npwp_debitur"
              accept="image/*"
            />
          </div>
        </div>
        <div class="form-group">
          <div class="upload-box">
            <label for="fotoPasangan">Upload Foto Selfie Debitur</label>
            <input
              type="file"
              id="fotoDebitur"
              name="lampiran_foto_debitur"
              accept="image/*"
            />
          </div>
        </div>
      </div>
    </div>
    <!-- Save Button -->
    <div class="tombol">
      <button class="btn-primary">Save</button>
    </div>

    <script>
      function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const hamburger = document.querySelector(".hamburger");
        sidebar.classList.toggle("sidebar-open");
        hamburger.classList.toggle("hamburger-open");
      }

      function processOCR() {
        const fileInput = document.getElementById("ktpImage").files[0];
        const apiKey = "K81624968088957"; // Ganti dengan API Key Anda

        if (!fileInput) {
          alert("Pilih gambar KTP terlebih dahulu!");
          return;
        }

        const formData = new FormData();
        formData.append("apikey", apiKey);
        formData.append("language", "eng"); // Menggunakan Bahasa Indonesia
        formData.append("file", fileInput);
        formData.append("isTable", true); // Mengaktifkan mode table recognition
        formData.append("scale", true); // Auto-enlarge content
        formData.append("OCREngine", 2); // Menggunakan OCR Engine 2

        fetch("https://api.ocr.space/parse/image", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.OCRExitCode === 1) {
              const parsedText = data.ParsedResults[0].ParsedText;
              document.getElementById("ocrResult").textContent = parsedText;

              // Memproses hasil OCR untuk diisi di form
              autofillForm(parsedText);
            } else {
              document.getElementById("ocrResult").textContent =
                "Error: " + data.ErrorMessage;
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            document.getElementById("ocrResult").textContent =
              "Terjadi kesalahan saat melakukan OCR.";
          });
      }
      // s*[:;]? kode ini untuk menentukan titik dua, titik koma, dan spasi
      // s*([^\d]*) kode ini untuk menghilangkan angka

      function autofillForm(parsedText) {
        // Regex untuk mencari data berdasarkan label yang umum di KTP
        const nameMatch = parsedText.match(/Nama\s*[:;]?\s*(.*)/i);
        const nikMatch = parsedText.match(/NIK\s*[:;]?\s*(\d+)/i);
        const tempatlahirMatch = parsedText.match(
          /Tempat\/Tgl Lahir\s*[:;]?\s*([A-Za-z\s]+),\s*(\d{2}-\d{2}-\d{4})/i
        );

        const jeniskelaminMatch = parsedText.match(
          /Jenis Kelamin\s*[:;]?\s*(Laki-Laki|Perempuan)/i
        );
        const alamatMatch = parsedText.match(/Alamat\s*[:;]?\s*(.*)/i);
        const rtrw = parsedText.match(/RW\s*[:;]?\s*(.*)/i);
        const desaMatch = parsedText.match(/Desa\s*[:;]?\s*(.*)/i);

        const kecamatanMatch = parsedText.match(/Kecamatan\s*[:;]\s*(.*)/i);
        const agamaMatch = parsedText.match(/Agama\s*[:;]?\s*(.*)/i);
        const statusperkawinanMatch = parsedText.match(
          /Status Perkawinan\s*[:;]?\s*(Kawin|Belum Kawin)/i
        );
        const pekerjaanMatch = parsedText.match(/Pekerjaan\s*[:;]?\s*([^\d]*)/i);
        const kewarganegaraanMatch = parsedText.match(
          /Kewarganegaraan\s*[:;]?\s*(.*)/i
        );

        // Mencari kata "Kabupaten" atau "Kota" dan mengambil teks setelahnya
        const kabupatenKotaMatch = parsedText.match(
          /kabupaten\s+([a-zA-Z\s]+)\s+NIK/i
        );

        // Menyimpan hasil OCR ke dalam form
        document.getElementById("name").value = nameMatch ? nameMatch[1] : "";
        document.getElementById("nik").value = nikMatch ? nikMatch[1] : "";
        if (tempatlahirMatch) {
          const birthPlace = tempatlahirMatch[1].trim();
          document.getElementById("tempatlahir").value = `${birthPlace}`;
          const birthDate = tempatlahirMatch[2].trim();
          document.getElementById("tgllahir").value = `${birthDate}`;
        }

        document.getElementById("jeniskelamin").value = jeniskelaminMatch
          ? jeniskelaminMatch[1]
          : "";
        document.getElementById("alamat").value = alamatMatch
          ? alamatMatch[1]
          : "";
        document.getElementById("rtrw").value = rtrw
          ? rtrw[1]
          : "";
        document.getElementById("desa").value = desaMatch ? desaMatch[1] : "";
        document.getElementById("kecamatan").value = kecamatanMatch
          ? kecamatanMatch[1]
          : "";

        // Mengisi kabupaten/kota dengan data setelah kata "Kabupaten" atau "Kota"
        document.getElementById("kabupatenKota").value = kabupatenKotaMatch
          ? kabupatenKotaMatch[1] // Mengambil teks setelah "Kabupaten" atau "Kota"
          : "";

        document.getElementById("agama").value = agamaMatch
          ? agamaMatch[1]
          : "";
        document.getElementById("statusperkawinan").value = statusperkawinanMatch
          ? statusperkawinanMatch[1]
          : "";
        document.getElementById("pekerjaan").value = pekerjaanMatch ? pekerjaanMatch[1] : "";
        document.getElementById("kewarganegaraan").value = kewarganegaraanMatch
          ? kewarganegaraanMatch[1]
          : "";
      }

      // PASANGAN
      function processOCRpsg() {
        const fileInput = document.getElementById("ktpImage-psg").files[0];
        const apiKey = "K81624968088957"; // Ganti dengan API Key Anda

        if (!fileInput) {
          alert("Pilih gambar KTP Pasangan terlebih dahulu!");
          return;
        }

        const formData = new FormData();
        formData.append("apikey", apiKey);
        formData.append("language", "eng"); // Menggunakan Bahasa Indonesia
        formData.append("file", fileInput);
        formData.append("isTable", true); // Mengaktifkan mode table recognition
        formData.append("scale", true); // Auto-enlarge content
        formData.append("OCREngine", 2); // Menggunakan OCR Engine 2

        fetch("https://api.ocr.space/parse/image", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.OCRExitCode === 1) {
              const parsedText = data.ParsedResults[0].ParsedText;
              document.getElementById("ocrResult-psg").textContent = parsedText;

              // Memproses hasil OCR untuk diisi di form
              autofillFormpsg(parsedText);
            } else {
              document.getElementById("ocrResult-psg").textContent =
                "Error: " + data.ErrorMessage;
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            document.getElementById("ocrResult-psg").textContent =
              "Terjadi kesalahan saat melakukan OCR.";
          });
      }

      function autofillFormpsg(parsedText) {
        // Regex untuk mencari data berdasarkan label yang umum di KTP
        const nameMatch = parsedText.match(/Nama\s*[;:]?\s*(.*)/i);
        const nikMatch = parsedText.match(/NIK\s*[:;]?\s*(\d+)/i);
        const tempatlahirMatch = parsedText.match(
          /Tempat\/Tgl Lahir\s*[:;]?\s*([A-Za-z\s]+),\s*(\d{2}-\d{2}-\d{4})/i
        );

        const jeniskelaminMatch = parsedText.match(
          /Jenis Kelamin\s*[:;]?\s*(Laki-Laki|Perempuan)/i
        );
        const alamatMatch = parsedText.match(/Alamat\s*[:;]?\s*(.*)/i);
        const desaMatch = parsedText.match(/Desa\s*[:;]?\s*(.*)/i);
        const kecamatanMatch = parsedText.match(/Kecamatan\s*[:;]?\s*(.*)/i);
        const agamaMatch = parsedText.match(/Agama\s*[:;]?\s*(.*)/i);
        const pekerjaanMatch = parsedText.match(/Pekerjaan\s*[:;]?\s*([^\d]*)/i);
        const kewarganegaraanMatch = parsedText.match(
          /Kewarganegaraan\s*[:;]?\s*(.*)/i
        );

        // Mencari kata "Kabupaten" atau "Kota" dan mengambil teks setelahnya
        const kabupatenKotaMatch = parsedText.match(
          /kabupaten\s+([a-zA-Z\s]+)\s+NIK/i
        );

        // Menyimpan hasil OCR ke dalam form
        document.getElementById("name-psg").value = nameMatch
          ? nameMatch[1]
          : "";
        document.getElementById("nik-psg").value = nikMatch ? nikMatch[1] : "";
        if (tempatlahirMatch) {
          const birthPlace = tempatlahirMatch[1].trim();
          document.getElementById("tempatlahir-psg").value = `${birthPlace}`;
          const birthDate = tempatlahirMatch[2].trim();
          document.getElementById("tgllahir-psg").value = `${birthDate}`;
        }

        document.getElementById("jeniskelamin-psg").value = jeniskelaminMatch
          ? jeniskelaminMatch[1]
          : "";
        document.getElementById("alamat-psg").value = alamatMatch
          ? alamatMatch[1]
          : "";
        document.getElementById("desa-psg").value = desaMatch
          ? desaMatch[1]
          : "";
        document.getElementById("kecamatan-psg").value = kecamatanMatch
          ? kecamatanMatch[1]
          : "";

        // Mengisi kabupaten/kota dengan data setelah kata "Kabupaten" atau "Kota"
        document.getElementById("kabupatenKota-psg").value = kabupatenKotaMatch
          ? kabupatenKotaMatch[1] // Mengambil teks setelah "Kabupaten" atau "Kota"
          : "";

        document.getElementById("agama-psg").value = agamaMatch
          ? agamaMatch[1]
          : "";
        document.getElementById("pekerjaan-psg").value = pekerjaanMatch ? pekerjaanMatch[1] : "";
        document.getElementById("kewarganegaraan-psg").value = kewarganegaraanMatch
          ? kewarganegaraanMatch[1]
          : "";
      }
    </script>
  </body>
</html>