<?php
// Karyawan.php

abstract class Karyawan {
    // Properti tetap protected (Enkapsulasi untuk Inheritance)
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarPerhari;

    // Konstruktor Induk
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar) {
        $this->id_karyawan      = $id;
        $this->nama_karyawan    = $nama;
        $this->departemen       = $dept;
        $this->hariKerjaMasuk   = $hariKerja;
        $this->gajiDasarPerhari = $gajiDasar;
    }

    // ==========================================
    // GETTER METHODS (Solusi aman untuk View)
    // ==========================================
    public function getIdKaryawan() {
        return $this->id_karyawan;
    }

    public function getNamaKaryawan() {
        return $this->nama_karyawan;
    }

    public function getDepartemen() {
        return $this->departemen;
    }

    public function getHariKerjaMasuk() {
        return $this->hariKerjaMasuk;
    }

    public function getGajiDasarPerhari() {
        return $this->gajiDasarPerhari;
    }

    // Abstract Methods
    abstract public function hitungGajiBersih();
    abstract public function tampilkanProfilKaryawan();
}
?>