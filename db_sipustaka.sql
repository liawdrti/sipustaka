-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 06:07 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipustaka`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAllForKembali` ()  BEGIN
    SELECT * FROM tb_kembali INNER JOIN tb_pinjam ON tb_kembali.id_pinjam=tb_pinjam.id_pinjam INNER JOIN tb_siswa ON tb_pinjam.nis=tb_siswa.nis INNER JOIN tb_buku ON tb_pinjam.id_buku=tb_buku.id_buku;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) DEFAULT NULL,
  `cover_buku` varchar(100) DEFAULT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `isbn` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `cover_buku`, `jumlah_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`) VALUES
(1, 'Maaf Tuhan, Aku Hampir Menyerah', 'buku.jpg', 22, 'Alfialghazi', 'Sahima', 2020, '9786026744470'),
(2, 'Atomics Habits', 'atomic_habits.jpg', 14, 'James Clear', 'Gramedia', 2019, '9780593189641'),
(5, 'Pemodelan Perangkat Lunak Kelas XI', 'deef801d1211aa3215d2a37ad4cc887c.jpg', 12, 'Patwiyanto', 'Andi Publisher', 2018, '9789792969573'),
(6, 'Komputer & Jaringan Dasar Kelas X', '2ef92bbfaac002dbecb2d9b8d50f24c4.jpeg_2200x2200q80.jpg.webp', 1, 'Patwiyanto', 'Andi Publisher', 2018, '9789792969085'),
(7, 'Zero To One', 'buku-zero-to-one.jpg', 6, 'Peter Thiel', 'Gramedia', 2018, '9786020321486');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `wali_kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `wali_kelas`) VALUES
(1, 'X RPL 1', 'Anita Widiya S.Pd'),
(2, 'X RPL 2', 'Amadia Lena S.Kom'),
(3, 'XI RPL 1', 'Budi Wahono S.T'),
(4, 'XI RPL 2', 'Susi Widiastuti S.Pd'),
(5, 'XII RPL 1', 'Hendery Wijaya S.Kom'),
(6, 'XII RPL 2', 'Johan Risyaf S.T');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `id_pinjam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `tgl_kembali`, `id_pinjam`) VALUES
(7, '2022-03-10', 22),
(9, '2022-03-12', 15),
(10, '2022-03-14', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telp_pegawai` varchar(100) DEFAULT NULL,
  `alamat_pegawai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_pegawai`, `username`, `password`, `telp_pegawai`, `alamat_pegawai`) VALUES
(1, 'Lia', 'liawdrti', 'c935ef558ee7139435f7a4a9d8be6002', '081995278445', 'Jl. Antang Barat No. 1'),
(2, 'Azka', 'Petugas2', '21232f297a57a5a743894a0e4a801fc3', '081252509988', 'Jl. Permai 2'),
(3, 'Aulia', 'admin', '21232f297a57a5a743894a0e4a801fc3', '089798787878', 'Jl. Jalan'),
(4, 'alia', 'aliaa', '827ccb0eea8a706c4c34a16891f84e7b', '08199675677', 'Jl. Delima');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `tgl_pinjam`, `jatuh_tempo`, `status`, `nis`, `id_buku`) VALUES
(14, '2022-03-04', '2022-03-12', 'dipinjam', 12234, 1),
(15, '2022-03-08', '2022-03-11', 'dikembalikan', 13312, 2),
(17, '2022-03-14', '2022-03-14', 'dipinjam', 144129, 1),
(22, '2022-03-13', '2022-03-16', 'dikembalikan', 144121, 1),
(23, '2022-03-10', '2022-03-13', 'dipinjam', 144121, 2),
(26, '2022-03-10', '2022-03-11', 'dikembalikan', 13455, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `foto_siswa` varchar(100) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `jk_siswa` varchar(100) DEFAULT NULL,
  `telp_siswa` varchar(100) DEFAULT NULL,
  `alamat_siswa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama_siswa`, `foto_siswa`, `id_kelas`, `jk_siswa`, `telp_siswa`, `alamat_siswa`) VALUES
(12234, 'Maudy Amanda', 'p-siswa.jpg', 6, 'Perempuan', '081995279090', 'Jl. Suprapto Selatan'),
(13312, 'Azriel Pratama', 'siswaa.jpg', 5, 'Laki-laki', '083647889782', 'Jl. Wengga Agung'),
(13455, 'Andi', 'siswaa.jpg', 2, 'Laki-laki', '087656765678', 'Jl. Pramuka'),
(144121, 'Dion Hidayat', 'siswa-3.jpg', 2, 'Laki-laki', '081252509889', 'Jl. Menteng'),
(144129, 'Miranda Aulia', 'miranda aulia.jpg', 5, 'Perempuan', '081994589876', 'Jl. Pramuka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `FK_PINJAM` (`id_pinjam`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `FK_SISWA` (`nis`),
  ADD KEY `FK_BUKU` (`id_buku`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `FK_KELAS` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD CONSTRAINT `FK_PINJAM` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`);

--
-- Constraints for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD CONSTRAINT `FK_BUKU` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SISWA` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `FK_KELAS` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
