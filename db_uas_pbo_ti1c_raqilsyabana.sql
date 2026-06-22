-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 07:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1c_raqilsyabana`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `jenis_karyawan` enum('Kontrak','Tetap','Magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyaluran` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(20) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyaluran`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
('KAY-001', 'Andi Pratama', 'IT Support', 22, '250000.00', 'Tetap', NULL, NULL, '500000.00', 'ESOP-ANDI01', NULL, NULL),
('KAY-002', 'Budi Santoso', 'Finance', 20, '275000.00', 'Tetap', NULL, NULL, '600000.00', 'ESOP-BUDI02', NULL, NULL),
('KAY-003', 'Citra Lestari', 'HRD', 21, '260000.00', 'Tetap', NULL, NULL, '550000.00', 'ESOP-CITRA03', NULL, NULL),
('KAY-004', 'Dewi Sartika', 'Marketing', 22, '240000.00', 'Tetap', NULL, NULL, '500000.00', 'ESOP-DEWI04', NULL, NULL),
('KAY-005', 'Eko Prasetyo', 'Engineering', 23, '350000.00', 'Tetap', NULL, NULL, '750000.00', 'ESOP-EKO05', NULL, NULL),
('KAY-006', 'Fany Wijaya', 'Quality Assurance', 21, '280000.00', 'Tetap', NULL, NULL, '600000.00', 'ESOP-FANY06', NULL, NULL),
('KAY-007', 'Gilang Ramadhan', 'Data Science', 22, '380000.00', 'Tetap', NULL, NULL, '800000.00', 'ESOP-GILANG07', NULL, NULL),
('KAY-008', 'Hendra Wijaya', 'IT Support', 22, '200000.00', 'Kontrak', 12, 'PT Mitra Sumber Daya', NULL, NULL, NULL, NULL),
('KAY-009', 'Indah Permata', 'Marketing', 19, '180000.00', 'Kontrak', 6, 'PT Global Talent', NULL, NULL, NULL, NULL),
('KAY-010', 'Joko Susilo', 'Operations', 20, '190000.00', 'Kontrak', 12, 'PT Mitra Sumber Daya', NULL, NULL, NULL, NULL),
('KAY-011', 'Kartika Putri', 'Finance', 21, '210000.00', 'Kontrak', 24, 'PT Talent Nusantara', NULL, NULL, NULL, NULL),
('KAY-012', 'Lukman Hakim', 'Engineering', 22, '300000.00', 'Kontrak', 12, 'PT Tech Recruiters', NULL, NULL, NULL, NULL),
('KAY-013', 'Mega Utami', 'HRD', 20, '195000.00', 'Kontrak', 6, 'PT Global Talent', NULL, NULL, NULL, NULL),
('KAY-014', 'Naufal Abdi', 'Creative Design', 21, '200000.00', 'Kontrak', 12, 'PT Creative Source', NULL, NULL, NULL, NULL),
('KAY-015', 'Oki Syahputra', 'Engineering', 18, '100000.00', 'Magang', NULL, NULL, NULL, NULL, '2000000.00', 'MSIB-BATCH6-ENG'),
('KAY-016', 'Putri Ayu', 'Data Science', 20, '120000.00', 'Magang', NULL, NULL, NULL, NULL, '2400000.00', 'MSIB-BATCH6-DATA'),
('KAY-017', 'Rian Hidayat', 'Marketing', 15, '90000.00', 'Magang', NULL, NULL, NULL, NULL, '1800000.00', 'MANDIRI-UNIV-01'),
('KAY-018', 'Siti Aminah', 'HRD', 22, '100000.00', 'Magang', NULL, NULL, NULL, NULL, '2000000.00', 'MSIB-BATCH6-HR'),
('KAY-019', 'Taufik Hidayat', 'IT Support', 17, '100000.00', 'Magang', NULL, NULL, NULL, NULL, '2000000.00', 'MANDIRI-UNIV-02'),
('KAY-020', 'Vina Panduwinata', 'Finance', 21, '110000.00', 'Magang', NULL, NULL, NULL, NULL, '2200000.00', 'MSIB-BATCH6-FIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
