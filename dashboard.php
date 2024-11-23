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
            margin: 0;
            padding: 0;
        }
        /* Sidebar */
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

        /* Header */
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
    </style>
</head>
<body>

    <!-- Sidebar -->
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
        <div class="table-container">
            <div class="form-inline mb-3">
                <label class="mr-2">Tanggal Mulai:</label>
                <input type="date" class="form-control mr-2">
                <label class="mr-2">Tanggal Akhir:</label>
                <input type="date" class="form-control mr-2">
                <a href="ocr.html" class="btn btn-primary mr-2">Tambah</a>
                <label class="mr-2">Kantor:</label>
                <select class="form-control mr-2">
                    <option>Kantor Cikampek</option>
                </select>
                <input type="text" class="form-control" placeholder="Cari...">
            </div>

            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Terima</th>
                        <th>No SO</th>
                        <th>Nama SO</th>
                        <th>Asal Data</th>
                        <th>Nama Debitur</th>
                        <th>Cabang</th>
                        <th>Status Data</th>
                        <th>Status SPPK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP code for dynamic data rendering would go here -->
                    <?php
                    $data = [
                        ["no" => 1, "tanggal" => "10/02/2024 12:07", "no_so" => "4-130-202-15238", "nama_so" => "Wendi Nugraha Nurrahmansyah", "aum_data" => "M8", "nama_debitur" => "Oki Hermanto", "cabang" => "Kantor Cikampek", "status_data" => "complete", "status_sppk" => "waiting"],
                        ["no" => 2, "tanggal" => "11/02/2024 13:45", "no_so" => "4-130-202-15489", "nama_so" => "Wendi Nugraha Nurrahmansyah", "aum_data" => "M8", "nama_debitur" => "Deddi Rochman", "cabang" => "Kantor Cikampek", "status_data" => "waiting", "status_sppk" => "waiting"]
                    ];

                    foreach ($data as $row) {
                        echo "<tr>";
                        echo "<td>{$row['no']}</td>";
                        echo "<td>{$row['tanggal']}</td>";
                        echo "<td>{$row['no_so']}</td>";
                        echo "<td>{$row['nama_so']}</td>";
                        echo "<td>{$row['aum_data']}</td>";
                        echo "<td>{$row['nama_debitur']}</td>";
                        echo "<td>{$row['cabang']}</td>";
                        echo "<td>{$row['status_data']}</td>";
                        echo "<td>{$row['status_sppk']}</td>";
                        echo "<td><button class='btn btn-warning btn-sm'>Edit</button> <button class='btn btn-danger btn-sm'>Delete</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
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
            const menuItem = event.target.closest('.menu-item');
            menuItem.classList.toggle('active');
        }
    </script>
</body>
</html>
