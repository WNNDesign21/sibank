<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .sidebar {
            width: 250px;
            background-color: #D32F2F;
            color: #fff;
            position: fixed;
            height: 100%;
            transition: width 0.3s;
            overflow-x: hidden;
            padding-top: 20px;
        }
        .sidebar.collapsed {
            width: 70px;
        }
        .sidebar .logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .sidebar img {
            width: 40px;
        }
        .sidebar a {
            color: #fff;
            padding: 10px;
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s;
        }
        .sidebar a:hover {
            background-color: #B71C1C;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar.collapsed a i {
            display: flex;
            justify-content: center;
            margin-right: 0;
        }
        .sidebar.collapsed a span {
            display: none;
        }
        
        /* Submenu */
        .submenu {
            display: none;
            padding-left: 20px;
        }
        .sidebar .menu-item.active .submenu {
            display: block;
        }
        .sidebar .menu-item .submenu-toggle {
            margin-left: auto;
            transition: transform 0.3s;
        }
        .sidebar .menu-item.active .submenu-toggle {
            transform: rotate(90deg);
        }
        
        /* Hide submenu toggle when sidebar is collapsed */
        .sidebar.collapsed .submenu-toggle {
            display: none;
        }

        .header {
            margin-left: 250px;
            padding: 10px;
            background-color: #C62828;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: margin-left 0.3s;
        }
        .header.collapsed {
            margin-left: 70px;
        }

        /* Main Content */
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        .content.collapsed {
            margin-left: 70px;
        }

        /* Table */
        .table-container {
            margin-top: 20px;
        }
        
        /* Toggle button */
        .toggle-btn {
            font-size: 20px;
            cursor: pointer;
        }

        .card-container {
            margin-bottom: -10px; /* Mengurangi jarak antar card */
            background-color: #f1f1f1;
            padding: 15px; /* Mengurangi padding di dalam card */
            border-radius: 8px;
        }

        .card {
            background-color: white;
            border: none;
            margin-bottom: 15px; /* Mengurangi margin antar card */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .header {
                margin-left: 0;
            }
            .content {
                margin-left: 0;
            }
        }

        /* Progress bar */
        .progress {
            display: none; /* Tersembunyi saat tidak digunakan */
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="sidebar" id="sidebar">
    <div class="logo">
        <img src="assets/logo.png" alt="Logo">
    </div>
    <a href="#"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
    
    <!-- Memorandum with Submenu -->
    <div class="menu-item">
        <a href="#" onclick="toggleSubmenu(event)">
            <i class="fas fa-file-alt"></i> <span>Memorandum</span>
            <i class="fas fa-chevron-right submenu-toggle"></i> <!-- Submenu toggle icon -->
        </a>
        <div class="submenu">
            <a href="#"><i class="fas fa-user-tie"></i> <span>Sales Officer</span></a>
            <a href="#"><i class="fas fa-user"></i> <span>Account Officer</span></a>
        </div>
    </div>

    <a href="#"><i class="fas fa-briefcase"></i> <span>Business</span></a>
    <a href="#"><i class="fas fa-calendar-alt"></i> <span>Daily Activity</span></a>
    <a href="logout.php"><i class="fas fa-calendar-alt"></i> <span>Logout</span></a>
</div>

<!-- Header -->
<div class="header" id="header">
    <span class="toggle-btn" onclick="toggleSidebar()"><i class="fas fa-bars"></i></span>
    <h2>Data Pengajuan Sales Officer</h2>
    <div>Wendi Nugraha Nurrahmansyah - Sales Officer</div>
</div>

<!-- Main Content -->
<div class="content" id="content">
    <h2>OCR KTP Reader dengan Pengaturan Khusus OCR.space API</h2>

    <!-- Card for Input Image -->
    <div class="card-container">
        <div class="card">
            <div class="card-body">
                <input type="file" id="ktpImage" accept="image/*" />
                <button class="btn btn-primary mt-2" onclick="processOCR()">Proses OCR</button>
                <!-- Progress bar -->
                <div class="progress mt-3">
                    <div id="ocrProgress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;">0%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card for OCR Result -->
    <div class="card-container">
        <div class="card">
            <div class="card-body">
                <h3>Hasil OCR:</h3>
                <pre id="ocrResult"></pre>
            </div>
        </div>
    </div>

    <!-- Card for Form -->
    <div class="card-container">
        <div class="card">
            <div class="card-body">
                <h3>Form Data KTP:</h3>
                <form id="ktpForm">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" /><br /><br />

                    <label for="nik">NIK:</label>
                    <input type="text" id="nik" name="nik" class="form-control" /><br /><br />

                    <label for="birthPlaceDate">Tempat, Tanggal Lahir:</label>
                    <input type="text" id="birthPlaceDate" name="birthPlaceDate" class="form-control" /><br /><br />

                    <label for="gender">Jenis Kelamin:</label>
                    <input type="text" id="gender" name="gender" class="form-control" /><br /><br />

                    <label for="address">Alamat:</label>
                    <textarea id="address" name="address" class="form-control"></textarea><br /><br />

                    <label for="rt">RT:</label>
                    <input type="text" id="rt" name="rt" class="form-control" /><br /><br />

                    <label for="rw">RW:</label>
                    <input type="text" id="rw" name="rw" class="form-control" /><br /><br />

                    <label for="desa">Desa/Kelurahan:</label>
                    <input type="text" id="desa" name="desa" class="form-control" /><br /><br />

                    <label for="kecamatan">Kecamatan:</label>
                    <input type="text" id="kecamatan" name="kecamatan" class="form-control" /><br /><br />

                    <label for="kabupatenKota">Kabupaten/Kota:</label>
                    <input type="text" id="kabupatenKota" name="kabupatenKota" class="form-control" /><br /><br />

                    <label for="religion">Agama:</label>
                    <input type="text" id="religion" name="religion" class="form-control" /><br /><br />

                    <label for="maritalStatus">Status Perkawinan:</label>
                    <input type="text" id="maritalStatus" name="maritalStatus" class="form-control" /><br /><br />
                    
                    <label for="job">Pekerjaan:</label>
                    <input type="text" id="job" name="job" class="form-control" /><br /><br />

                    <label for="nationality">Kewarganegaraan:</label>
                    <input type="text" id="nationality" name="nationality" class="form-control" /><br /><br />
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("collapsed");
        document.getElementById("header").classList.toggle("collapsed");
        document.getElementById("content").classList.toggle("collapsed");
    }

    function toggleSubmenu(event) {
        event.preventDefault();
        const menuItem = event.currentTarget.closest(".menu-item");
        menuItem.classList.toggle("active");
    }

    function processOCR() {
        const fileInput = document.getElementById("ktpImage").files[0];
        const apiKey = "K81624968088957"; // Ganti dengan API Key Anda

        if (!fileInput) {
            alert("Pilih gambar KTP terlebih dahulu!");
            return;
        }

        const progressBar = document.getElementById("ocrProgress");
        progressBar.style.width = "0%";
        progressBar.innerText = "0%";
        document.querySelector(".progress").style.display = "block";

        const formData = new FormData();
        formData.append("apikey", apiKey);
        formData.append("language", "eng");
        formData.append("file", fileInput);
        formData.append("isTable", true);
        formData.append("scale", true);
        formData.append("OCREngine", 2);

        fetch("https://api.ocr.space/parse/image", {
            method: "POST",
            body: formData
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.OCRExitCode === 1) {
                const parsedText = data.ParsedResults[0].ParsedText;
                document.getElementById("ocrResult").textContent = parsedText;
                autofillForm(parsedText);
            } else {
                document.getElementById("ocrResult").textContent = "Error: " + data.ErrorMessage;
            }
            document.querySelector(".progress").style.display = "none";
        })
        .catch((error) => {
            console.error("Error:", error);
            document.getElementById("ocrResult").textContent = "Terjadi kesalahan saat melakukan OCR.";
            document.querySelector(".progress").style.display = "none";
        });

        let progress = 0;
        const interval = setInterval(() => {
            progress += 10;
            progressBar.style.width = progress + "%";
            progressBar.innerText = progress + "%";
            if (progress >= 100) clearInterval(interval);
        }, 300);
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

    // Variasi Regex untuk mencari Kel/Desa, Kecamatan
    const desaMatch = parsedText.match(/Kel\/Desa\s*:\s*(.*)/i);
    const kecamatanMatch = parsedText.match(/Kecamatan\s*:\s*(.*)/i);
    const kewarganegaraanMatch = parsedText.match(/Kewarganegaraan\s*:\s*(.*)/i);

    const religionMatch = parsedText.match(/Agama\s*:\s*(.*)/i);
    const maritalStatusMatch = parsedText.match(
        /Status Perkawinan\s*:\s*([^\s]+)/i
    );
    const jobMatch = parsedText.match(/Pekerjaan\s*:\s*([^\s]+)/i);

    // Isi form dengan data yang ditemukan
    if (nameMatch) document.getElementById("name").value = nameMatch[1].trim();
    if (nikMatch) document.getElementById("nik").value = nikMatch[1].trim();

    if (birthPlaceDateMatch) {
        const birthPlace = birthPlaceDateMatch[1].trim();
        const birthDate = birthPlaceDateMatch[2].trim();
        document.getElementById(
            "birthPlaceDate"
        ).value = `${birthPlace}, ${birthDate}`;
    }

    if (genderMatch) document.getElementById("gender").value = genderMatch[1].trim();
    if (addressMatch) document.getElementById("address").value = addressMatch[1].trim();
    if (desaMatch) document.getElementById("desa").value = desaMatch[1].trim();
    if (kecamatanMatch) document.getElementById("kecamatan").value = kecamatanMatch[1].trim();

    if (kewarganegaraanMatch) {
        const kewarganegaraan = kewarganegaraanMatch[1].trim();
        // Ambil 3 huruf setelah kata kewarganegaraan
        const kabupatenKota = kewarganegaraan.substring(3).trim();
        document.getElementById("kabupatenKota").value = kabupatenKota;
    }

    if (religionMatch) document.getElementById("religion").value = religionMatch[1].trim();
    if (maritalStatusMatch) document.getElementById("maritalStatus").value = maritalStatusMatch[1].trim();
    if (jobMatch) document.getElementById("job").value = jobMatch[1].trim();
}

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
