<?php
// KaryawanTetap.php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    // Properti tambahan spesifik Karyawan Tetap
    private $tunjanganKesehatan;
    private $opsiSahamId;

    // Konstruktor subclass
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $tunjangan, $sahamId) {
        // Memanggil konstruktor class induk
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        
        // Inisialisasi properti spesifik anak
        $this->tunjanganKesehatan = $tunjangan;
        $this->opsiSahamId = $sahamId;
    }

    // Method Khusus: Query SQL SELECT + WHERE dan Instansiasi menjadi Array of Objects
    public static function getByDepartemen($pdo, $dept) {
        $sql = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Tetap' AND departemen = :dept";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['dept' => $dept]);
        
        $daftarTetap = [];
        // Looping hasil query database
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Instansiasi langsung menjadi objek KaryawanTetap
            $daftarTetap[] = new self(
                $row['id_karyawan'],
                $row['nama_karyawan'],
                $row['departemen'],
                $row['hari_kerja_masuk'],
                $row['gaji_dasar_per_hari'],
                $row['tunjangan_kesehatan'],
                $row['opsi_saham_id']
            );
        }
        return $daftarTetap;
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