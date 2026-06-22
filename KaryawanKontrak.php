<?php
// KaryawanKontrak.php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    // Properti tambahan spesifik Karyawan Kontrak
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    // Konstruktor subclass
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $durasiKontrak, $agensi) {
        // Memanggil konstruktor class induk (Karyawan)
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        
        // Inisialisasi properti spesifik anak
        $this->durasiKontrakBulan = $durasiKontrak;
        $this->agensiPenyalur = $agensi;
    }

    // Method Khusus: Query SQL SELECT + WHERE dan Instansiasi menjadi Array of Objects
    public static function getByAgensi($pdo, $namaAgensi) {
        $sql = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Kontrak' AND agensi_penyaluran = :agensi";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['agensi' => $namaAgensi]);
        
        $daftarKontrak = [];
        // Looping hasil query database
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Instansiasi langsung menjadi objek KaryawanKontrak
            $daftarKontrak[] = new self(
                $row['id_karyawan'],
                $row['nama_karyawan'],
                $row['departemen'],
                $row['hari_kerja_masuk'],
                $row['gaji_dasar_per_hari'],
                $row['durasi_kontrak_bulan'],
                $row['agensi_penyaluran']
            );
        }
        return $daftarKontrak;
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