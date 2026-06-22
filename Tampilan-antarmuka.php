<?php
// Tampilan-antarmuka.php
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanMagang.php';

// Mengambil data dari database menggunakan static method subclass
$daftarTetap    = KaryawanTetap::getByDepartemen($pdo, 'Finance'); 
$daftarKontrak  = KaryawanKontrak::getByAgensi($pdo, 'PT Mitra Sumber Daya');
$daftarMagang   = KaryawanMagang::getBySertifikat($pdo, 'MSIB');

// Helper format Rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi & Slip Gaji Karyawan - UAS PBO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .nav-tabs .nav-link.active { background-color: #0d6efd; color: white; border-color: #0d6efd; }
        .card { box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: none; margin-bottom: 30px; }
        .table th { background-color: #f1f3f5; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark">Sistem Manajemen & Slip Gaji Karyawan</h2>
        <p class="text-muted">Database: <span class="badge bg-secondary">DB_UAS_PBO_TI1C_RaqilSyabana</span></p>
    </div>

    <ul class="nav nav-tabs justify-content-center mb-4" id="karyawanTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link active fw-semibold" id="tetap-tab" data-bs-toggle="tab" data-bs-target="#tetap" type="button" role="tab">💼 Karyawan Tetap</button>
        </li>
        <li class="nav-item">
            <button class="nav-link fw-semibold" id="kontrak-tab" data-bs-toggle="tab" data-bs-target="#kontrak" type="button" role="tab">📄 Karyawan Kontrak</button>
        </li>
        <li class="nav-item">
            <button class="nav-link fw-semibold" id="magang-tab" data-bs-toggle="tab" data-bs-target="#magang" type="button" role="tab">🎓 Karyawan Magang</button>
        </li>
    </ul>

    <div class="tab-content" id="karyawanTabContent">
        
        <div class="tab-pane fade show active" id="tetap" role="tabpanel">
            <div class="card p-4">
                <h4 class="mb-3 text-success fw-bold">Daftar Slip Gaji: Karyawan Tetap (Dept: Finance)</h4>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Karyawan</th>
                                <th>Departemen</th>
                                <th>Kehadiran</th>
                                <th>Gaji / Hari</th>
                                <th>Tunjangan Kesehatan</th>
                                <th class="text-primary">Gaji Bersih (Polimorfisme)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($daftarTetap)): ?>
                                <tr><td colspan="7" class="text-center text-muted">Tidak ada data karyawan tetap.</td></tr>
                            <?php else: ?>
                                <?php foreach($daftarTetap as $kt): ?>
                                    <tr>
                                        <td><code><?= $kt->getIdKaryawan(); ?></code></td>
                                        <td><strong><?= $kt->getNamaKaryawan(); ?></strong></td>
                                        <td><?= $kt->getDepartemen(); ?></td>
                                        <td><?= $kt->getHariKerjaMasuk(); ?> Hari</td>
                                        <td><?= formatRupiah($kt->getGajiDasarPerhari()); ?></td>
                                        <td><span class="text-success">+ Ada (Dihitung Sistem)</span></td>
                                        <td class="fw-bold text-primary"><?= formatRupiah($kt->hitungGajiBersih()); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="kontrak" role="tabpanel">
            <div class="card p-4">
                <h4 class="mb-3 text-warning fw-bold">Daftar Slip Gaji: Karyawan Kontrak (Agensi: PT Mitra Sumber Daya)</h4>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Karyawan</th>
                                <th>Departemen</th>
                                <th>Kehadiran</th>
                                <th>Gaji / Hari</th>
                                <th class="text-primary">Gaji Bersih (Polimorfisme)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($daftarKontrak)): ?>
                                <tr><td colspan="6" class="text-center text-muted">Tidak ada data karyawan kontrak.</td></tr>
                            <?php else: ?>
                                <?php foreach($daftarKontrak as $kk): ?>
                                    <tr>
                                        <td><code><?= $kk->getIdKaryawan(); ?></code></td>
                                        <td><strong><?= $kk->getNamaKaryawan(); ?></strong></td>
                                        <td><?= $kk->getDepartemen(); ?></td>
                                        <td><?= $kk->getHariKerjaMasuk(); ?> Hari</td>
                                        <td><?= formatRupiah($kk->getGajiDasarPerhari()); ?></td>
                                        <td class="fw-bold text-primary"><?= formatRupiah($kk->hitungGajiBersih()); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="magang" role="tabpanel">
            <div class="card p-4">
                <h4 class="mb-3 text-info fw-bold">Daftar Slip Gaji: Karyawan Magang (Program: MSIB / Kampus Merdeka)</h4>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Karyawan</th>
                                <th>Departemen</th>
                                <th>Kehadiran</th>
                                <th>Gaji Dasar / Hari</th>
                                <th class="text-danger">Potongan Pelatihan</th>
                                <th class="text-primary">Gaji Bersih (Polimorfisme)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($daftarMagang)): ?>
                                <tr><td colspan="7" class="text-center text-muted">Tidak ada data karyawan magang.</td></tr>
                            <?php else: ?>
                                <?php foreach($daftarMagang as $km): ?>
                                    <tr>
                                        <td><code><?= $km->getIdKaryawan(); ?></code></td>
                                        <td><strong><?= $km->getNamaKaryawan(); ?></strong></td>
                                        <td><?= $km->getDepartemen(); ?></td>
                                        <td><?= $km->getHariKerjaMasuk(); ?> Hari</td>
                                        <td><?= formatRupiah($km->getGajiDasarPerhari()); ?></td>
                                        <td><span class="text-danger">20%</span></td>
                                        <td class="fw-bold text-primary"><?= formatRupiah($km->hitungGajiBersih()); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>