<?php
session_start();

// Meng-include koneksi.php
include('koneksi.php'); 

$login_success = false; // Flag untuk status login berhasil
$login_failed = false;  // Flag untuk status login gagal

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil username dan password yang di-submit
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query untuk cek username dan password
    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

    if ($result) {
        // Periksa jika query berhasil dan ada hasil
        if ($result->num_rows > 0) {
            // Ambil data pengguna dari database
            $user = $result->fetch_assoc();
            
            // Simpan data dalam sesi
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username']; // Simpan username ke session
            $_SESSION['nama'] = $user['nama']; // Simpan nama ke session
            $_SESSION['jabatan'] = $user['jabatan']; // Simpan nama ke session
            
            $login_success = true; // Set flag login berhasil
        } else {
            $login_failed = true; // Set flag login gagal
        }
    } else {
        // Jika query gagal, tampilkan error
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="js/script.js" defer></script>
    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .overlay.show {
            visibility: visible;
            opacity: 1;
        }

        .popup {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transform: translateY(100%);
            animation: slideIn 1s forwards;
        }

        @keyframes slideIn {
            from {
                transform: translateY(100%);
            }
            to {
                transform: translateY(0);
            }
        }

        .popup h2 {
            margin-bottom: 10px;
        }

        .popup p {
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="assets/logo.png" alt="Bank Logo">
        <form method="post">
            <div class="input-container">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Type Your Username">
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Type Your Password">
            </div>
            <button type="submit" value="Login" class="btn">LOGIN</button>
        </form>
    </div>

    <div class="overlay" id="overlay">
        <div class="popup">
            <h2>Login Berhasil!</h2>
            <p>Anda akan diarahkan ke dashboard dalam 3 detik...</p>
        </div>
    </div>

    <script>
        <?php if ($login_success): ?>
            // Tampilkan pop-up overlay
            document.getElementById('overlay').classList.add('show');
            
            // Setelah 3 detik, redirect ke dashboard
            setTimeout(function() {
                window.location.href = 'dashboard.php';
            }, 3000);
        <?php elseif ($login_failed): ?>
            // Tampilkan alert jika login gagal
            alert('Login gagal: Username atau password salah!');
        <?php endif; ?>
    </script>
</body>
</html>
