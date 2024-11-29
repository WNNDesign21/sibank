<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Memorandum SO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
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
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Memorandum SO Section -->
        <div class="form-section">
            <div class="section-title">MEMORANDUM SO</div>
            <form>
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
                        <input type="text" class="form-control" placeholder="Nominal Pengajuan">
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

        <!-- Data Calon Debitur Section -->
        <div class="form-section">
            <div class="section-title">DATA CALON DEBITUR</div>
            <form>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label>No KTP</label>
                        <input type="text" class="form-control" placeholder="1234567812345678">
                    </div>
                    <div class="col-md-4">
                        <label>No Kartu Keluarga</label>
                        <input type="text" class="form-control" placeholder="1234567812345678">
                    </div>
                    <div class="col-md-4">
                        <label>No NPWP</label>
                        <input type="text" class="form-control" placeholder="1234567812345678">
                    </div>
                    <div class="col-md-4">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Karawang">
                    </div>
                    <div class="col-md-4">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label>Nama Debitur</label>
                        <input type="text" class="form-control" placeholder="Adhi Nur Fajar">
                    </div>
                    <div class="col-md-4">
                        <label>Nama Ibu Kandung</label>
                        <input type="text" class="form-control" placeholder="Nama Ibu Kandung">
                    </div>
                    <div class="col-md-4">
                        <label>Pendidikan</label>
                        <input type="text" class="form-control" placeholder="S1/Sederajat">
                    </div>
                    <div class="col-md-4">
                        <label>Agama</label>
                        <input type="text" class="form-control" placeholder="Islam">
                    </div>
                    <div class="col-md-6">
                        <label>Alamat Sesuai KTP</label>
                        <textarea class="form-control" rows="2" placeholder="Perumahan ABC Blok A No.1"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Alamat Domisili</label>
                        <textarea class="form-control" rows="2" placeholder="Perumahan ABC Blok A No.1"></textarea>
                    </div>
                </div>
            </form>
        </div>

        <!-- Lampiran Section -->
        <div class="form-section">
            <div class="section-title">LAMPIRAN</div>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="upload-box">
                        <label for="ktpDebitur">Upload KTP Debitur</label>
                        <input type="file" id="ktpDebitur" name="lampiran_ktp" accept="image/*">
                        <div class="placeholder">KTP Debitur</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="upload-box">
                        <label for="kkDebitur">Upload Kartu Keluarga</label>
                        <input type="file" id="kkDebitur" name="lampiran_kk" accept="image/*">
                        <div class="placeholder">Kartu Keluarga</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="upload-box">
                        <label for="fotoDebitur">Upload Foto Debitur</label>
                        <input type="file" id="fotoDebitur" name="lampiran_foto_debitur" accept="image/*">
                        <div class="placeholder">Foto Debitur</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="upload-box">
                        <label for="fotoPasangan">Upload Foto Pasangan</label>
                        <input type="file" id="fotoPasangan" name="lampiran_foto_pasangan" accept="image/*">
                        <div class="placeholder">Foto Pasangan</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</body>
</html>
