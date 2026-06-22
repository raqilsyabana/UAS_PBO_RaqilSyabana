<?php
// KaryawanMagang.php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $uangSaku, $sertifikat) {
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        $this->uangSakuBulanan = $uangSaku;
        $this->sertifikatKampusMerdeka = $sertifikat;
    }

    /**
     * OVERRIDING: Perhitungan Gaji Bersih Karyawan Magang
     * Rumus: (hariKerjaMasuk * gajiDasarPerhari) * 0.80 (Potongan upah harian 20%)
     */
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerhari) * 0.80;
    }

    public static function getBySertifikat($pdo, $keywordSertifikat) {
        $sql = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Magang' AND sertifikat_campuran LIKE :sertifikat";
        // Menggunakan kolom sertifikat_kampus_merdeka sesuai struktur tabel awal
        $sql = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Magang' AND sertifikat_kampus_merdeka LIKE :sertifikat";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sertifikat' => '%' . $keywordSertifikat . '%']);
        
        $daftarMagang = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarMagang[] = new self(
                $row['id_karyawan'],
                $row['nama_karyawan'],
                $row['departemen'],
                $row['hari_kerja_masuk'],
                $row['gaji_dasar_per_hari'],
                $row['uang_saku_bulanan'],
                $row['sertifikat_kampus_merdeka']
            );
        }
        return $daftarMagang;
    }

    public function tampilkanProfilKaryawan() {
        // Akan kita implementasikan lengkap di tahap selanjutnya
        return "";
    }
}
?>