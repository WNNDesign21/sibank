<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OCR KTP Reader with Custom Settings</title>
    <!-- Link ke Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
      }
      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
      }
      h2,
      h3 {
        color: #333;
      }
      .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        
      }
      label {
        font-weight: bold;
      }
      .image-upload-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
      }
      .image-upload-container input {
        margin-bottom: 10px;
      }
      .image-upload-container div {
        flex: 1;
      }
      .section-title {
            background-color: maroon;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
        }
        .form-section {
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
        }
        .upload-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            position: relative;
        }
        .upload-box input[type="file"] {
            display: none;
        }
        .upload-box label {
            cursor: pointer;
            color: #007bff;
        }
        .upload-box img {
            width: 100%;
            max-height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .upload-box .placeholder {
            color: #999;
        }
        .col-md-4{
          margin-bottom: 10px;
        }
        .ocr {
          margin-left: 20px;
          margin-right: 20px;
        }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>OCR KTP Reader with Custom Settings</h2>

      <!-- Input Gambar -->
           

      <div class="form-section">
            <div class="section-title">MEMORANDUM SO</div>
            <form class="form-container">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label>Sumber Aplikasi</label>
                        <input type="text" class="form-control" placeholder="Mitra Bisnis">
                    </div>
                    <div class="col-md-4">
                        <label>Nama Sumber</label>
                        <input type="text" class="form-control" placeholder="Nama Mitra Bisnis">
                    </div>
                    <div class="col-md-4">
                        <label>Nama Sales Officer</label>
                        <input type="text" class="form-control" placeholder="Nama Sales Officer">
                    </div>
                    <div class="col-md-4">
                        <label>Pengajuan</label>
                        <input type="text" id="amount" class="form-control" placeholder="Nominal Pengajuan" oninput="formatNumber(this)">
                    </div>
                    <div class="col-md-4">
                        <label>Tenor</label>
                        <select class="form-select">
                            <option value="6">6 Bulan</option>
                            <option value="6">12 Bulan</option>
                            <option value="6">24 Bulan</option>
                            <option value="6">36 Bulan</option>
                            <option value="6">48 Bulan</option>
                            <option value="6">60 Bulan</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Tujuan Pinjaman</label>
                        <select class="form-select">
                            <option value="KONSUMTIF">Konsumtif</option>
                            <option value="KONSUMTIF">Investasi</option>
                            <option value="KONSUMTIF">Liburan</option>
                            <option value="KONSUMTIF">Pendidikan</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Produk</label>
                        <input type="text" class="form-control" placeholder="Kredit Agunan Sertifikat">
                    </div>
                    <div class="col-md-8">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" placeholder="Kredit Spesial Karyawan">
                    </div>
                </div>
            </form>
        </div>

      <!-- Form untuk Pengisian Otomatis -->
      <div class="section-title">DATA PEMOHON</div>
      <div class="ocr">
      <input type="file" id="ktpImage" accept="image/*" class="form-control" />
      <button class="btn btn-primary mt-2" onclick="processOCR()">
        Proses OCR
      </button>
      </div>
      <!-- Hasil OCR -->
      <pre id="ocrResult" style="display: none;"></pre> 
      <form id="ktpForm" class="form-container">
        <!-- Menggunakan Grid System untuk Mengatur Input Form -->
        <div class="row">
          <div class="col-md-4">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" class="form-control" />
          </div>
          <div class="col-md-4">
            <label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" class="form-control" />
          </div>
          <div class="col-md-4">
            <label for="birthPlaceDate">Tempat Lahir:</label>
            <input
              type="text"
              id="birthPlaceDate"
              name="birthPlaceDate"
              class="form-control"
            />
          </div>
          <div class="col-md-4">
            <label for="nik">Tanggal Lahir:</label>
            <input type="text" id="tgl-lahir" name="nik" class="form-control" />
          </div>
          <div class="col-md-4">
            <label for="gender">Jenis Kelamin:</label>
            <input type="text" id="gender" name="gender" class="form-control" />
          </div>
          <div class="col-md-4">
            <label for="address">Alamat:</label>
            <textarea
              id="address"
              name="address"
              class="form-control"
            ></textarea>
          </div>
          <div class="col-md-4">
            <label for="desa">Desa/Kelurahan:</label>
            <input type="text" id="desa" name="desa" class="form-control" />
          </div>
          <div class="col-md-4">
            <label for="kecamatan">Kecamatan:</label>
            <input
              type="text"
              id="kecamatan"
              name="kecamatan"
              class="form-control"
            />
          </div>
          <div class="col-md-4">
            <label for="kabupatenKota">Kabupaten/Kota:</label>
            <input
              type="text"
              id="kabupatenKota"
              name="kabupatenKota"
              class="form-control"
            />
          </div>
          <div class="col-md-4">
            <label for="religion">Agama:</label>
            <input
              type="text"
              id="religion"
              name="religion"
              class="form-control"
            />
          </div>
          <div class="col-md-4">
            <label for="maritalStatus">Status Perkawinan:</label>
            <input
              type="text"
              id="maritalStatus"
              name="maritalStatus"
              class="form-control"
            />
          </div>
          <div class="col-md-4">
            <label for="job">Pekerjaan:</label>
            <input type="text" id="job" name="job" class="form-control" />
          </div>
          <div class="col-md-4">
            <label for="citizenship">Kewarganegaraan:</label>
            <input
              type="text"
              id="citizenship"
              name="citizenship"
              class="form-control"
            />
          </div>
        </div>
      </form>
      <div class="section-title">DATA PASANGAN</div>
<div class="ocr">
  <input type="file" id="ktpImage-psg" accept="image/*" class="form-control" />
  <button class="btn btn-primary mt-2" onclick="processOCRpsg()">Proses OCR</button>
  <pre id="ocrResult-psg" style="display: block;"></pre>
</div>

<form id="ktpForm-psg" class="form-container">
  <div class="row">
    <div class="col-md-4">
      <label for="name-psg">Nama Pasangan:</label>
      <input type="text" id="name-psg" name="name-psg" class="form-control" />
    </div>
    <div class="col-md-4">
      <label for="nik-psg">NIK:</label>
      <input type="text" id="nik-psg" name="nik-psg" class="form-control" />
    </div>
    <div class="col-md-4">
      <label for="birthPlaceDate-psg">Tempat Lahir:</label>
      <input type="text" id="birthPlaceDate-psg" name="birthPlaceDate-psg" class="form-control" />
    </div>
    <div class="col-md-4">
      <label for="tgl-lahir-psg">Tanggal Lahir:</label>
      <input type="text" id="tgl-lahir-psg" name="tgl-lahir-psg" class="form-control" />
    </div>
    <div class="col-md-4">
      <label for="gender-psg">Jenis Kelamin:</label>
      <input type="text" id="gender-psg" name="gender-psg" class="form-control" />
    </div>
    <div class="col-md-4">
      <label for="address-psg">Alamat:</label>
      <textarea id="address-psg" name="address-psg" class="form-control"></textarea>
    </div>
    <div class="col-md-4">
      <label for="desa-psg">Desa/Kelurahan:</label>
      <input type="text" id="desa-psg" name="desa-psg" class="form-control" />
    </div>
    <div class="col-md-4">
      <label for="kecamatan-psg">Kecamatan:</label>
      <input type="text" id="kecamatan-psg" name="kecamatan-psg" class="form-control" />
    </div>
    <div class="col-md-4">
      <label for="kabupatenKota-psg">Kabupaten/Kota:</label>
      <input type="text" id="kabupatenKota-psg" name="kabupatenKota-psg" class="form-control" />
    </div>
    <div class="col-md-4">
      <label for="religion-psg">Agama:</label>
      <input type="text" id="religion-psg" name="religion-psg" class="form-control" />
    </div>
    <div class="col-md-4">
      <label for="job-psg">Pekerjaan:</label>
      <input type="text" id="job-psg" name="job-psg" class="form-control" />
    </div>
    <div class="col-md-4">
      <label for="citizenship-psg">Kewarganegaraan:</label>
      <input type="text" id="citizenship-psg" name="citizenship-psg" class="form-control" />
    </div>
  </div>
</form>
      <!-- Upload File -->
      <div class="section-title">UPLOAD FILES</div>
      <form class="form-container">
        <div class="image-upload-container">
          <div>
            <label>KTP Debitur</label>
            <input type="file" name="ktpFile" class="form-control" />
          </div>
          <div>
            <label>Kartu Keluarga Debitur</label>
            <input type="file" name="kkFile" class="form-control" />
          </div>
          <div>
            <label>Foto NPWP Debitur</label>
            <input type="file" name="npwpFile" class="form-control" />
          </div>
          <div>
            <label>Foto Selfie Debitur</label>
            <input type="file" name="selfieFile" class="form-control" />
          </div>
        </div>
        <div class="button-container mt-3">
          <button type="submit" class="btn btn-success">Simpan Data</button>
        </div>
        </form>
    </div>

    <!-- Link ke Bootstrap JS dan dependensinya -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
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

      function autofillForm(parsedText) {
        // Regex untuk mencari data berdasarkan label yang umum di KTP
        const nameMatch = parsedText.match(/Nama\s*:\s*(.*)/i);
        const nikMatch = parsedText.match(/NIK\s*:\s*(\d+)/i);
        const birthPlaceDateMatch = parsedText.match(
          /Tempat\/Tgl Lahir\s*:\s*([A-Za-z\s]+),\s*(\d{2}-\d{2}-\d{4})/i
        );

        const genderMatch = parsedText.match(
          /Jenis Kelamin\s*:\s*(Laki-Laki|Perempuan)/i
        );
        const addressMatch = parsedText.match(/Alamat\s*:\s*(.*)/i);
        const desaMatch = parsedText.match(/Kel\/Desa\s*[:;]\s*(.*)/i);
        const kecamatanMatch = parsedText.match(/Kecamatan\s*[:;]\s*(.*)/i);
        const religionMatch = parsedText.match(/Agama\s*:\s*(.*)/i);
        const maritalStatusMatch = parsedText.match(
          /Status Perkawinan\s*:\s*(Kawin|Belum Kawin)/i
        );
        const jobMatch = parsedText.match(/Pekerjaan\s*:\s*(.*)/i);
        const citizenshipMatch = parsedText.match(
          /Kewarganegaraan\s*:\s*(.*)/i
        );

        // Mencari kata "Kabupaten" atau "Kota" dan mengambil teks setelahnya
        const kabupatenKotaMatch = parsedText.match(
          /kabupaten\s+([a-zA-Z\s]+)\s+NIK/i
        );

        // Menyimpan hasil OCR ke dalam form
        document.getElementById("name").value = nameMatch ? nameMatch[1] : "";
        document.getElementById("nik").value = nikMatch ? nikMatch[1] : "";
        if (birthPlaceDateMatch) {
          const birthPlace = birthPlaceDateMatch[1].trim();
          document.getElementById("birthPlaceDate").value = `${birthPlace}`;
          const birthDate = birthPlaceDateMatch[2].trim();
          document.getElementById("tgl-lahir").value = `${birthDate}`;
        }

        document.getElementById("gender").value = genderMatch
          ? genderMatch[1]
          : "";
        document.getElementById("address").value = addressMatch
          ? addressMatch[1]
          : "";
        document.getElementById("desa").value = desaMatch ? desaMatch[1] : "";
        document.getElementById("kecamatan").value = kecamatanMatch
          ? kecamatanMatch[1]
          : "";

        // Mengisi kabupaten/kota dengan data setelah kata "Kabupaten" atau "Kota"
        document.getElementById("kabupatenKota").value = kabupatenKotaMatch
          ? kabupatenKotaMatch[1] // Mengambil teks setelah "Kabupaten" atau "Kota"
          : "";

        document.getElementById("religion").value = religionMatch
          ? religionMatch[1]
          : "";
        document.getElementById("maritalStatus").value = maritalStatusMatch
          ? maritalStatusMatch[1]
          : "";
        document.getElementById("job").value = jobMatch ? jobMatch[1] : "";
        document.getElementById("citizenship").value = citizenshipMatch
          ? citizenshipMatch[1]
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
      body: formData
    })
    .then(response => response.json())
    .then(data => {
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
    const nikMatch = parsedText.match(/NIK\s*:\s*(\d+)/i);
    const birthPlaceDateMatch = parsedText.match(
      /Tempat\/Tgl Lahir\s*:\s*([A-Za-z\s]+),\s*(\d{2}-\d{2}-\d{4})/i
    );

    const genderMatch = parsedText.match(
      /Jenis Kelamin\s*:\s*(Laki-Laki|Perempuan)/i
    );
    const addressMatch = parsedText.match(/Alamat\s*:\s*(.*)/i);
    const desaMatch = parsedText.match(/Kel\/Desa\s*[:;]?\s*(.*)/i);
    const kecamatanMatch = parsedText.match(/Kecamatan\s*[:;]\s*(.*)/i);
    const religionMatch = parsedText.match(/Agama\s*:\s*(.*)/i);
    const jobMatch = parsedText.match(/Pekerjaan\s*:\s*([^\d]*)/i);
    const citizenshipMatch = parsedText.match(
      /Kewarganegaraan\s*:\s*(.*)/i
    );

    // Mencari kata "Kabupaten" atau "Kota" dan mengambil teks setelahnya
    const kabupatenKotaMatch = parsedText.match(
      /kabupaten\s+([a-zA-Z\s]+)\s+NIK/i
    );

    // Menyimpan hasil OCR ke dalam form
    document.getElementById("name-psg").value = nameMatch ? nameMatch[1] : "";
    document.getElementById("nik-psg").value = nikMatch ? nikMatch[1] : "";
    if (birthPlaceDateMatch) {
      const birthPlace = birthPlaceDateMatch[1].trim();
      document.getElementById("birthPlaceDate-psg").value = `${birthPlace}`;
      const birthDate = birthPlaceDateMatch[2].trim();
      document.getElementById("tgl-lahir-psg").value = `${birthDate}`;
    }

    document.getElementById("gender-psg").value = genderMatch
      ? genderMatch[1]
      : "";
    document.getElementById("address-psg").value = addressMatch
      ? addressMatch[1]
      : "";
    document.getElementById("desa-psg").value = desaMatch ? desaMatch[1] : "";
    document.getElementById("kecamatan-psg").value = kecamatanMatch
      ? kecamatanMatch[1]
      : "";

    // Mengisi kabupaten/kota dengan data setelah kata "Kabupaten" atau "Kota"
    document.getElementById("kabupatenKota-psg").value = kabupatenKotaMatch
      ? kabupatenKotaMatch[1] // Mengambil teks setelah "Kabupaten" atau "Kota"
      : "";

    document.getElementById("religion-psg").value = religionMatch
      ? religionMatch[1]
      : "";
    document.getElementById("job-psg").value = jobMatch ? jobMatch[1] : "";
    document.getElementById("citizenship-psg").value = citizenshipMatch
      ? citizenshipMatch[1]
      : "";
  }
    </script>
  </body>
</html>
