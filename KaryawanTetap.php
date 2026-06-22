<?php
// KaryawanTetap.php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    private $tunjanganKesehatan;
    private $opsiSahamId;

    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $tunjangan, $sahamId) {
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        $this->tunjanganKesehatan = $tunjangan;
        $this->opsiSahamId = $sahamId;
    }

    /**
     * OVERRIDING: Perhitungan Gaji Bersih Karyawan Tetap
     * Rumus: (hariKerjaMasuk * gajiDasarPerhari) + tunjanganKesehatan
     */
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerhari) + $this->tunjanganKesehatan;
    }

    public static function getByDepartemen($pdo, $dept) {
        $sql = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Tetap' AND departemen = :dept";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['dept' => $dept]);
        
        $daftarTetap = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

    public function tampilkanProfilKaryawan() {
        // Akan kita implementasikan lengkap di tahap selanjutnya
        return "";
    }
}
?>