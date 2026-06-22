<?php
// KaryawanMagang.php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    // Properti tambahan spesifik Karyawan Magang
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    // Konstruktor subclass
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $uangSaku, $sertifikat) {
        // Memanggil konstruktor class induk
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        
        // Inisialisasi properti spesifik anak
        $this->uangSakuBulanan = $uangSaku;
        $this->sertifikatKampusMerdeka = $sertifikat;
    }

    // Method Khusus: Query SQL SELECT + WHERE dan Instansiasi menjadi Array of Objects
    public static function getBySertifikat($pdo, $keywordSertifikat) {
        // Menggunakan LIKE untuk fleksibilitas pencarian sertifikat Kampus Merdeka
        $sql = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Magang' AND sertifikat_kampus_merdeka LIKE :sertifikat";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sertifikat' => '%' . $keywordSertifikat . '%']);
        
        $daftarMagang = [];
        // Looping hasil query database
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Instansiasi langsung menjadi objek KaryawanMagang
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

    // Implementasi abstract method (kosong/default dulu)
    public function hitungGajiBersih() {
        return 0;
    }

    public function tampilkanProfilKaryawan() {
        return "";
    }
}
?>