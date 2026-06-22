<?php
// KaryawanKontrak.php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $durasiKontrak, $agensi) {
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        $this->durasiKontrakBulan = $durasiKontrak;
        $this->agensiPenyalur = $agensi;
    }

    /**
     * OVERRIDING: Perhitungan Gaji Bersih Karyawan Kontrak
     * Rumus: hariKerjaMasuk * gajiDasarPerhari (Murni kehadiran)
     */
    public function hitungGajiBersih() {
        return $this->hariKerjaMasuk * $this->gajiDasarPerhari;
    }

    public static function getByAgensi($pdo, $namaAgensi) {
        $sql = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Kontrak' AND agensi_penyaluran = :agensi";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['agensi' => $namaAgensi]);
        
        $daftarKontrak = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

    public function tampilkanProfilKaryawan() {
        // Akan kita implementasikan lengkap di tahap selanjutnya
        return "";
    }
}
?>