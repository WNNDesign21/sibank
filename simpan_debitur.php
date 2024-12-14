<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $no_kk = $_POST['no_kk'];
    $nama = $_POST['name'];
    $tempat_lahir = $_POST['tempatlahir'];
    $tanggal_lahir = $_POST['tgllahir'];
    $tanggal_lahir_db = DateTime::createFromFormat('d-m-Y', $tanggal_lahir)->format('Y-m-d');
    $jenis_kelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];
    $rtrw = $_POST['rtrw'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupatenKota = $_POST['kabupatenKota'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];
    $status_perkawinan = $_POST['statusperkawinan'];
    $nik_psg = $_POST['nik-psg'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $nama_ibu = $_POST['nama_ibu'];
    $no_npwp = $_POST['no_npwp'];
    $pendidikan = $_POST['pendidikan'];
    $no_hp = $_POST['no_hp'];

    // Data pasangan
    $nik_psg = $_POST['nik-psg'];
    $name_psg = $_POST['name-psg'];
    $tempatlahir_psg = $_POST['tempatlahir-psg'];
    $tgllahir_psg = $_POST['tgllahir-psg'];  // Format Tanggal
    $tgllahir_psg_db = DateTime::createFromFormat('d-m-Y', $tgllahir_psg)->format('Y-m-d');
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
            VALUES ('$nik_psg', '$name_psg', '$tempatlahir_psg', '$tgllahir_psg_db', '$jeniskelamin_psg', '$alamat_psg', '$rtrw_psg', '$desa_psg', '$kecamatan_psg', '$kabupatenKota_psg', '$agama_psg', '$pekerjaan_psg')";

    
// Memeriksa apakah query INSERT ke tabel PASANGAN berhasil
if ($conn->query($sql_pasangan) === TRUE) {
    echo "<script>
    alert('Data berhasil disimpan!');
    window.location.href = ''; // Atur URL tujuan jika perlu
    </script>";

    // Perintah INSERT ke tabel DEBITUR
    $sql_debitur = "INSERT INTO debitur 
        (nik, no_kk, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, rtrw, desa, kecamatan, kota, agama, pekerjaan, status_perkawinan, nik_pasangan,kewarganegaraan, nama_ibu, no_npwp, pendidikan, no_hp) 
        VALUES ('$nik', '$no_kk', '$nama', '$tempat_lahir', '$tanggal_lahir_db', '$jenis_kelamin', '$alamat', '$rtrw', '$desa', '$kecamatan', '$kabupatenKota', '$agama', '$pekerjaan', '$status_perkawinan', '$nik_psg','$kewarganegaraan', '$nama_ibu', '$no_npwp', '$pendidikan', '$no_hp')";

    // Memeriksa apakah query INSERT ke tabel DEBITUR berhasil
    if ($conn->query($sql_debitur) === TRUE) {
        echo "<script>
        alert('Data pasangan berhasil disimpan!');
        window.location.href = ''; // Atur URL tujuan jika perlu
        </script>";
    } else {
        echo "Error saat menyimpan data pasangan: " . $conn->error;
    }

} else {
    echo "Error saat menyimpan data debitur: " . $conn->error;
}

// Menutup koneksi setelah semua query selesai
$conn->close();
}
?>