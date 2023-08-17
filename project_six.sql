-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2023 at 11:59 PM
-- Server version: 8.0.32-0ubuntu0.22.10.2
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_six`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biodata`
--

CREATE TABLE `tbl_biodata` (
  `nis` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ortu` varchar(100) NOT NULL,
  `id_jurusan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_biodata`
--

INSERT INTO `tbl_biodata` (`nis`, `nama`, `alamat`, `email`, `ortu`, `id_jurusan`) VALUES
('0', 'Admin', 'Huangobotu', 'admin@gmail.com', '-', 1),
('1', 'Guru BK', 'Huangobotu', 'gurubk@gmail.com', '-', 1),
('198261781717', 'EKO HIDAYAT', 'HUANGOBOTU', 'nc.ekohidayat@gmail.com', 'Jumadi', 3),
('198261781718', 'SITI NURLIANI', 'HUANGOBOTU', 'sitilia@gmail.com', 'Mukhsin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_jurusan`
--

CREATE TABLE `tbl_mst_jurusan` (
  `id_jurusan` int NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_mst_jurusan`
--

INSERT INTO `tbl_mst_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'GURU'),
(2, 'UMUM'),
(3, 'RPL'),
(4, 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_pelajaran`
--

CREATE TABLE `tbl_mst_pelajaran` (
  `id_pelajaran` int NOT NULL,
  `pelajaran` varchar(30) NOT NULL,
  `id_jurusan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_mst_pelajaran`
--

INSERT INTO `tbl_mst_pelajaran` (`id_pelajaran`, `pelajaran`, `id_jurusan`) VALUES
(1, 'AGAMA', 2),
(2, 'MATEMATIKA', 2),
(4, 'BAHASA INDONESIA', 2),
(5, 'PENDIDIKAN JASMANI', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_role`
--

CREATE TABLE `tbl_mst_role` (
  `id_role` int NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_mst_role`
--

INSERT INTO `tbl_mst_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Guru BK'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int NOT NULL,
  `nis` varchar(40) NOT NULL,
  `id_pelajaran` int NOT NULL,
  `nilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `nis`, `id_pelajaran`, `nilai`) VALUES
(1, '198261781717', 1, 80),
(2, '198261781717', 2, 90),
(3, '198261781717', 4, 80);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pilihan_mapel`
--

CREATE TABLE `tbl_pilihan_mapel` (
  `id_pilihan_mapel` int NOT NULL,
  `nis` varchar(40) NOT NULL,
  `id_pelajaran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pilihan_mapel`
--

INSERT INTO `tbl_pilihan_mapel` (`id_pilihan_mapel`, `nis`, `id_pelajaran`) VALUES
(1, '198261781717', 2),
(2, '198261781717', 4),
(3, '198261781717', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int NOT NULL,
  `nis` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `id_role`, `nis`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '0'),
(2, 'gurubk', '2ac04ec7fa4d34385573011704636f6c', 2, '1'),
(3, 'ekohidayat', 'c77f88c8f28f183e41124a0ae4aa0a20', 3, '198261781717'),
(4, 'sitinurliani', 'ca713f09ea4459f18edc2d00aceb6cd1', 3, '198261781718');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `tbl_mst_jurusan`
--
ALTER TABLE `tbl_mst_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_mst_pelajaran`
--
ALTER TABLE `tbl_mst_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `tbl_mst_role`
--
ALTER TABLE `tbl_mst_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_pelajaran` (`id_pelajaran`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tbl_pilihan_mapel`
--
ALTER TABLE `tbl_pilihan_mapel`
  ADD PRIMARY KEY (`id_pilihan_mapel`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_pelajaran` (`id_pelajaran`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mst_jurusan`
--
ALTER TABLE `tbl_mst_jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_mst_pelajaran`
--
ALTER TABLE `tbl_mst_pelajaran`
  MODIFY `id_pelajaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mst_role`
--
ALTER TABLE `tbl_mst_role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pilihan_mapel`
--
ALTER TABLE `tbl_pilihan_mapel`
  MODIFY `id_pilihan_mapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
