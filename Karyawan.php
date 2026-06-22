<?php
// Karyawan.php

abstract class Karyawan {
    // Properti terenkapsulasi (protected agar bisa diakses oleh kelas anak/turunan)
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarPerhari;

    // Konstruktor untuk menginisialisasi properti saat objek baru dari kelas anak dibuat
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar) {
        $this->id_karyawan      = $id;
        $this->nama_karyawan    = $nama;
        $this->departemen       = $dept;
        $this->hariKerjaMasuk   = $hariKerja;
        $this->gajiDasarPerhari = $gajiDasar;
    }

    // Abstract Method 1: Menghitung gaji bersih (Wajib diisi logikanya di kelas anak)
    abstract public function hitungGajiBersih();

    // Abstract Method 2: Menampilkan profil lengkap karyawan (Wajib diisi logikanya di kelas anak)
    abstract public function tampilkanProfilKaryawan();
}
?>