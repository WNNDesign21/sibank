<?php
// Menghubungkan ke database
include('koneksi.php'); // Ganti dengan file koneksi Anda

// Cek apakah parameter nik ada di URL
if (isset($_GET['nik'])) {
    $nik_debitur = $_GET['nik'];

    // Mulai transaksi
    $conn->begin_transaction();

    try {
        // Query untuk mendapatkan nik_pasangan berdasarkan nik_debitur
        $sql_pasangan = "SELECT nik_pasangan FROM debitur WHERE nik = ?";
        $stmt_pasangan = $conn->prepare($sql_pasangan);
        $stmt_pasangan->bind_param('s', $nik_debitur); // Bind nik_debitur
        $stmt_pasangan->execute();
        $result_pasangan = $stmt_pasangan->get_result();

        if ($result_pasangan->num_rows > 0) {
            // Ambil nik_pasangan
            $row = $result_pasangan->fetch_assoc();
            $nik_pasangan = $row['nik_pasangan'];

            // Hapus data pasangan berdasarkan nik_pasangan
            $sql_hapus_pasangan = "DELETE FROM pasangan WHERE nik = ?";
            $stmt_hapus_pasangan = $conn->prepare($sql_hapus_pasangan);
            $stmt_hapus_pasangan->bind_param('s', $nik_pasangan);
            $stmt_hapus_pasangan->execute();
        }

        // Hapus data debitur berdasarkan nik_debitur
        $sql_hapus_debitur = "DELETE FROM debitur WHERE nik = ?";
        $stmt_hapus_debitur = $conn->prepare($sql_hapus_debitur);
        $stmt_hapus_debitur->bind_param('s', $nik_debitur);
        $stmt_hapus_debitur->execute();

        // Commit transaksi
        $conn->commit();

        // Redirect ke halaman dashboard setelah berhasil
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = 'dashboard.php'; // Ganti dengan halaman yang sesuai
              </script>";

    } catch (Exception $e) {
        // Rollback jika terjadi kesalahan
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

} else {
    // Jika tidak ada nik di URL
    echo "<script>
            alert('Nik tidak ditemukan!');
            window.location.href = 'dashboard.php'; // Ganti dengan halaman yang sesuai
          </script>";
}

$conn->close();
?>
