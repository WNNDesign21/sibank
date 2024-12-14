<?php
header('Content-Type: application/json'); // Respons dalam format JSON
include 'koneksi.php';

$response = []; // Array untuk menyimpan respons

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $no_kk = $_POST['no_kk'];
    $nama = $_POST['name'];
    $tempat_lahir = $_POST['tempatlahir'];
    $tanggal_lahir = $_POST['tgllahir'];
    $tanggal_lahir_db = null;

    if (!empty($tanggal_lahir)) {
        $tanggal_lahir_db = DateTime::createFromFormat('d-m-Y', $tanggal_lahir)->format('Y-m-d');
    }

    $jenis_kelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];
    $rtrw = $_POST['rtrw'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupatenKota = $_POST['kabupatenKota'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];
    $status_perkawinan = $_POST['statusperkawinan'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $nama_ibu = $_POST['nama_ibu'];
    $no_npwp = $_POST['no_npwp'];
    $pendidikan = $_POST['pendidikan'];
    $no_hp = $_POST['no_hp'];

    // Nilai default untuk pasangan
    $nik_psg = null;

    // Validasi apakah NIK sudah ada
    $cekNik = "SELECT nik FROM debitur WHERE nik = ?";
    $stmt = $conn->prepare($cekNik);
    $stmt->bind_param("s", $nik);
    $stmt->execute();
    $resultNik = $stmt->get_result();

    if ($resultNik->num_rows > 0) {
        $response['status'] = 'error';
        $response['message'] = 'Gagal menyimpan data, NIK sudah terdaftar.';
        echo json_encode($response);
        exit();
    }

    // Eksekusi query pasangan hanya jika status perkawinan adalah "Kawin"
    if (strtolower($status_perkawinan) === "kawin") {
        $nik_psg = $_POST['nik-psg'];
        $name_psg = $_POST['name-psg'];
        $tempatlahir_psg = $_POST['tempatlahir-psg'];
        $tgllahir_psg = $_POST['tgllahir-psg'];
        $tgllahir_psg_db = null;

        if (!empty($tgllahir_psg)) {
            $tgllahir_psg_db = DateTime::createFromFormat('d-m-Y', $tgllahir_psg)->format('Y-m-d');
        }

        $jeniskelamin_psg = $_POST['jeniskelamin-psg'];
        $alamat_psg = $_POST['alamat-psg'];
        $rtrw_psg = $_POST['rtrw-psg'];
        $desa_psg = $_POST['desa-psg'];
        $kecamatan_psg = $_POST['kecamatan-psg'];
        $kabupatenKota_psg = $_POST['kabupatenKota-psg'];
        $agama_psg = $_POST['agama-psg'];
        $pekerjaan_psg = $_POST['pekerjaan-psg'];

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
            $response['status'] = 'error';
            $response['message'] = 'Error saat menyimpan data pasangan: ' . $conn->error;
            echo json_encode($response);
            exit();
        }
    }

    // Perintah INSERT ke tabel DEBITUR
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

    if ($stmt_debitur->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Data debitur berhasil disimpan!';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error saat menyimpan data debitur: ' . $conn->error;
    }

    echo json_encode($response);
    exit();
}
?>