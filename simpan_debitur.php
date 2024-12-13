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
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $nama_ibu = $_POST['nama_ibu'];
    $no_npwp = $_POST['no_npwp'];
    $pendidikan = $_POST['pendidikan'];
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO debitur 
        (nik, no_kk, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, rtrw, desa, kecamatan, kota, agama, pekerjaan, status_perkawinan, kewarganegaraan, nama_ibu, no_npwp, pendidikan, no_hp) 
        VALUES ('$nik', '$no_kk', '$nama', '$tempat_lahir', '$tanggal_lahir_db', '$jenis_kelamin', '$alamat', '$rtrw', '$desa', '$kecamatan', '$kabupatenKota', '$agama', '$pekerjaan', '$status_perkawinan', '$kewarganegaraan', '$nama_ibu', '$no_npwp', '$pendidikan', '$no_hp')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Data berhasil disimpan!');
        window.location.href = '';
    </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>