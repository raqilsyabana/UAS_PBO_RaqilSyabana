<?php
// koneksi.php

$host     = 'localhost';
$dbname   = 'db_uas_pbo_ti1c_raqilsyabana';
$username = 'root'; // Silakan sesuaikan dengan konfigurasi MySQL Anda
$password = '';     // Silakan sesuaikan dengan konfigurasi MySQL Anda

try {
    // Membuat koneksi PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Mengatur atribut error mode ke Exception agar mempermudah debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Mengatur fetch mode default menjadi objek / associative array jika diperlukan
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // Jika koneksi gagal, hentikan skrip dan tampilkan pesan kesalahan
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>