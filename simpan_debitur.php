<?php
header('Content-Type: application/json');
include 'koneksi.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        ob_start();

        // Ambil data input
        $nik = $_POST['nik'] ?? '';
        $no_kk = $_POST['no_kk'] ?? '';
        $nama = $_POST['name'] ?? '';
        $tempat_lahir = $_POST['tempatlahir'] ?? '';
        $tanggal_lahir = $_POST['tgllahir'] ?? '';
        $tanggal_lahir_db = !empty($tanggal_lahir) ? DateTime::createFromFormat('d-m-Y', $tanggal_lahir)->format('Y-m-d') : null;

        $jenis_kelamin = $_POST['jeniskelamin'] ?? '';
        $alamat = $_POST['alamat'] ?? '';
        $rtrw = $_POST['rtrw'] ?? '';
        $desa = $_POST['desa'] ?? '';
        $kecamatan = $_POST['kecamatan'] ?? '';
        $kabupatenKota = $_POST['kabupatenKota'] ?? '';
        $agama = $_POST['agama'] ?? '';
        $pekerjaan = $_POST['pekerjaan'] ?? '';
        $status_perkawinan = $_POST['statusperkawinan'] ?? '';
        $kewarganegaraan = $_POST['kewarganegaraan'] ?? '';
        $nama_ibu = $_POST['nama_ibu'] ?? '';
        $no_npwp = $_POST['no_npwp'] ?? '';
        $pendidikan = $_POST['pendidikan'] ?? '';
        $no_hp = $_POST['no_hp'] ?? '';

        // Nilai default untuk pasangan
        $nik_psg = null;

        // Validasi apakah NIK sudah ada
        $cekNik = "SELECT nik FROM debitur WHERE nik = ?";
        $stmt = $conn->prepare($cekNik);
        $stmt->bind_param("s", $nik);
        $stmt->execute();
        $resultNik = $stmt->get_result();

        if ($resultNik->num_rows > 0) {
            ob_end_clean();
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menyimpan data, NIK sudah terdaftar.'
            ]);
            exit();
        }

        if (strtolower($status_perkawinan) === "kawin") {
            $nik_psg = $_POST['nik-psg'] ?? '';
            $name_psg = $_POST['name-psg'] ?? '';
            $tempatlahir_psg = $_POST['tempatlahir-psg'] ?? '';
            $tgllahir_psg = $_POST['tgllahir-psg'] ?? '';
            $tgllahir_psg_db = !empty($tgllahir_psg) ? DateTime::createFromFormat('d-m-Y', $tgllahir_psg)->format('Y-m-d') : null;

            $jeniskelamin_psg = $_POST['jeniskelamin-psg'] ?? '';
            $alamat_psg = $_POST['alamat-psg'] ?? '';
            $rtrw_psg = $_POST['rtrw-psg'] ?? '';
            $desa_psg = $_POST['desa-psg'] ?? '';
            $kecamatan_psg = $_POST['kecamatan-psg'] ?? '';
            $kabupatenKota_psg = $_POST['kabupatenKota-psg'] ?? '';
            $agama_psg = $_POST['agama-psg'] ?? '';
            $pekerjaan_psg = $_POST['pekerjaan-psg'] ?? '';

            $sql_pasangan = "INSERT INTO pasangan 
                (nik, nama, tempat_lahir, tgllahir, jeniskelamin, alamat, rtrw, desa, kecamatan, kabupatenKota, agama, pekerjaan) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_pasangan = $conn->prepare($sql_pasangan);
            $stmt_pasangan->bind_param(
                "ssssssssssss",
                $nik_psg,
                $name_psg,
                $tempatlahir_psg,
                $tgllahir_psg_db,
                $jeniskelamin_psg,
                $alamat_psg,
                $rtrw_psg,
                $desa_psg,
                $kecamatan_psg,
                $kabupatenKota_psg,
                $agama_psg,
                $pekerjaan_psg
            );

            if (!$stmt_pasangan->execute()) {
                throw new Exception('Error saat menyimpan data pasangan: ' . $stmt_pasangan->error);
            }
        }

        // Simpan data ke tabel debitur
        $sql_debitur = "INSERT INTO debitur 
            (nik, no_kk, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, rtrw, desa, kecamatan, kota, agama, pekerjaan, status_perkawinan, nik_pasangan, kewarganegaraan, nama_ibu, no_npwp, pendidikan, no_hp) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_debitur = $conn->prepare($sql_debitur);
        $stmt_debitur->bind_param(
            "ssssssssssssssssssss",
            $nik,
            $no_kk,
            $nama,
            $tempat_lahir,
            $tanggal_lahir_db,
            $jenis_kelamin,
            $alamat,
            $rtrw,
            $desa,
            $kecamatan,
            $kabupatenKota,
            $agama,
            $pekerjaan,
            $status_perkawinan,
            $nik_psg,
            $kewarganegaraan,
            $nama_ibu,
            $no_npwp,
            $pendidikan,
            $no_hp
        );

        if (!$stmt_debitur->execute()) {
            throw new Exception('Error saat menyimpan data debitur: ' . $stmt_debitur->error);
        }

        // Simpan data pinjaman
        $id_pinjaman = date('dmYHis');
        $tanggal_input = date('Y-m-d H:i:s');
        $sumber = $_POST['sumber_aplikasi'] ?? '';
        $nama_sumber = $_POST['nama_sumber'] ?? '';
        $nama_sales = $_POST['nama_sales'] ?? '';
        $pinjaman = str_replace('.', '', $_POST['pinjaman'] ?? ''); // Hapus pemisah ribuan
        $tenor = $_POST['tenor'] ?? '';
        $tujuan = $_POST['tujuan'] ?? '';
        $produk = $_POST['produk'] ?? '';
        $deskripsi = $_POST['deskripsi'] ?? '';

        $sql_pinjaman = "INSERT INTO pinjaman (id_pinjaman, tanggal_input, sumber, nama_sumber, nama_sales, pinjaman, tenor, tujuan, produk, deskripsi, nik) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_pinjaman = $conn->prepare($sql_pinjaman);
        $stmt_pinjaman->bind_param(
            "sssssssssss",
            $id_pinjaman,
            $tanggal_input,
            $sumber,
            $nama_sumber,
            $nama_sales,
            $pinjaman,
            $tenor,
            $tujuan,
            $produk,
            $deskripsi,
            $nik
        );

        if (!$stmt_pinjaman->execute()) {
            throw new Exception('Error saat menyimpan data pinjaman: ' . $stmt_pinjaman->error);
        }

        ob_end_clean();
        echo json_encode([
            'status' => 'success',
            'message' => 'Data debitur dan pinjaman berhasil disimpan!'
        ]);
        exit();
    }
} catch (Exception $e) {
    ob_end_clean();
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>
