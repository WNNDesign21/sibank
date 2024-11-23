<?php
session_start();
$login_success = false; // Flag untuk status login berhasil
$login_failed = false;  // Flag untuk status login gagal

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Koneksi database
    $conn = new mysqli('localhost', 'root', '', 'sibank');

    // Cek apakah koneksi berhasil
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query untuk cek username dan password
    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    
    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $login_success = true; // Set flag login berhasil
    } else {
        $login_failed = true; // Set flag login gagal
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initialscale=1.0" />
    <title>Project</title>
    <link rel="stylesheet" href="css/login.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="js/script.js" defer></script>
</head>
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
            visibility: hidden; /* Hidden by default */
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
            transform: translateY(100%); /* Mulai dari bawah */
            animation: slideIn 1s forwards; /* Animasi masuk */
        }

        @keyframes slideIn {
            from {
                transform: translateY(100%); /* Mulai dari bawah */
            }
            to {
                transform: translateY(0); /* Bergerak ke tengah */
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
</body>
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
</html>