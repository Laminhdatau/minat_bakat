-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Sep 17, 2023 at 01:54 PM
-- Server version: 5.7.43
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_muti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biodata`
--

CREATE TABLE `tbl_biodata` (
  `nis` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ortu` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL,
  `id_jurusan` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_biodata`
--

INSERT INTO `tbl_biodata` (`nis`, `nama`, `alamat`, `email`, `ortu`, `status`, `id_jurusan`) VALUES
('1', 'Admin', 'Tolangohula', 'admin@gmail.com', '', 0, '0'),
('1010', 'lamin', '', '', '', 2, '2,3,2'),
('198261781717', 'GuBK', 'HUANGOBOTU', 'nc.ekohidayat@gmail.com', 'Jumadi', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jur_pel`
--

CREATE TABLE `tbl_jur_pel` (
  `nis` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_jur_pel`
--

INSERT INTO `tbl_jur_pel` (`nis`, `id_jurusan`, `id_pelajaran`) VALUES
('1010', 2, 1),
('1010', 3, 5),
('1010', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_jurusan`
--

CREATE TABLE `tbl_mst_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
  `id_pelajaran` int(11) NOT NULL,
  `pelajaran` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_mst_pelajaran`
--

INSERT INTO `tbl_mst_pelajaran` (`id_pelajaran`, `pelajaran`, `id_jurusan`) VALUES
(1, 'AGAMA', 2),
(2, 'MATEMATIKA', 2),
(4, 'BAHASA INDONESIA', 2),
(5, 'PENDIDIKAN JASMANI', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_role`
--

CREATE TABLE `tbl_mst_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
  `id_nilai` int(11) NOT NULL,
  `nis` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `id_pelajaran` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nilai` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `nis`, `id_pelajaran`, `nilai`) VALUES
(1, '1010', '1,5,4', '99,88,77');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_keaktifan`
--

CREATE TABLE `tbl_nilai_keaktifan` (
  `nis` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `id_pelajaran` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nilai_keaktifan` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_nilai_keaktifan`
--

INSERT INTO `tbl_nilai_keaktifan` (`nis`, `id_pelajaran`, `nilai_keaktifan`) VALUES
('1010', '1,5,4', '78,60,80');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_keterampilan`
--

CREATE TABLE `tbl_nilai_keterampilan` (
  `nis` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `id_pelajaran` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nilai_keterampilan` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_nilai_keterampilan`
--

INSERT INTO `tbl_nilai_keterampilan` (`nis`, `id_pelajaran`, `nilai_keterampilan`) VALUES
('1010', '1,5,4', '67,66,56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pilihan_mapel`
--

CREATE TABLE `tbl_pilihan_mapel` (
  `id_pilihan_mapel` int(11) NOT NULL,
  `nis` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `id_pelajaran` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_pilihan_mapel`
--

INSERT INTO `tbl_pilihan_mapel` (`id_pilihan_mapel`, `nis`, `id_pelajaran`) VALUES
(1, '1010', '1,5,4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user_image` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'default.jpg',
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `id_role` int(11) NOT NULL,
  `nis` varchar(40) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `user_image`, `password`, `id_role`, `nis`) VALUES
(1, 'admin', 'LOGO2.png', 'c4ca4238a0b923820dcc509a6f75849b', 1, '1'),
(2, 'gurubk', 'default.jpg', 'c4ca4238a0b923820dcc509a6f75849b', 2, '2'),
(13, 'lamin', 'default.jpg', 'c4ca4238a0b923820dcc509a6f75849b', 3, '1010');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_allnilai`
-- (See below for the actual view)
--
CREATE TABLE `v_allnilai` (
`nis` varchar(40)
,`nama` varchar(100)
,`id_pelajaran` int(11)
,`pelajaran` varchar(30)
,`nilai` varchar(255)
,`nilaikeaktifan` varchar(255)
,`nilaiterampil` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jurusan`
-- (See below for the actual view)
--
CREATE TABLE `v_jurusan` (
`nis` varchar(40)
,`id_jurusan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jurusan_nama`
-- (See below for the actual view)
--
CREATE TABLE `v_jurusan_nama` (
`nis` varchar(40)
,`id_jurusan` text
,`jurusan` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_nilai`
-- (See below for the actual view)
--
CREATE TABLE `v_nilai` (
`nis` varchar(40)
,`id_pelajaran` varchar(255)
,`nilai` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_nilai_aktif`
-- (See below for the actual view)
--
CREATE TABLE `v_nilai_aktif` (
`nis` varchar(255)
,`id_pelajaran` varchar(255)
,`nilaikeaktifan` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_nilai_tampil`
-- (See below for the actual view)
--
CREATE TABLE `v_nilai_tampil` (
`nis` varchar(255)
,`id_pelajaran` varchar(255)
,`nilaiterampil` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pelajaran`
-- (See below for the actual view)
--
CREATE TABLE `v_pelajaran` (
`nis` varchar(40)
,`nama` varchar(100)
,`pelajaran` varchar(30)
,`id_pelajaran` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_allnilai`
--
DROP TABLE IF EXISTS `v_allnilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_allnilai`  AS SELECT DISTINCT `p`.`nis` AS `nis`, `p`.`nama` AS `nama`, `p`.`id_pelajaran` AS `id_pelajaran`, `p`.`pelajaran` AS `pelajaran`, `n`.`nilai` AS `nilai`, `na`.`nilaikeaktifan` AS `nilaikeaktifan`, `nt`.`nilaiterampil` AS `nilaiterampil` FROM ((((`v_pelajaran` `p` join `v_jurusan` `j`) join `v_nilai` `n`) join `v_nilai_aktif` `na`) join `v_nilai_tampil` `nt`) WHERE ((`p`.`nis` = `j`.`nis`) AND (`p`.`nis` = `n`.`nis`) AND (`p`.`nis` = `na`.`nis`) AND (`p`.`nis` = `nt`.`nis`) AND (`j`.`nis` = `n`.`nis`) AND (`j`.`nis` = `na`.`nis`) AND (`j`.`nis` = `nt`.`nis`) AND (`n`.`nis` = `na`.`nis`) AND (`n`.`nis` = `nt`.`nis`) AND (`na`.`nis` = `nt`.`nis`) AND (`p`.`id_pelajaran` = `n`.`id_pelajaran`) AND (`p`.`id_pelajaran` = `na`.`id_pelajaran`) AND (`p`.`id_pelajaran` = `nt`.`id_pelajaran`) AND (`n`.`id_pelajaran` = `na`.`id_pelajaran`) AND (`n`.`id_pelajaran` = `nt`.`id_pelajaran`) AND (`na`.`id_pelajaran` = `nt`.`id_pelajaran`)) ORDER BY `p`.`nis` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_jurusan`
--
DROP TABLE IF EXISTS `v_jurusan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_jurusan`  AS SELECT `b`.`nis` AS `nis`, group_concat(`j`.`id_jurusan` separator ',') AS `id_jurusan` FROM (`tbl_biodata` `b` join `tbl_mst_jurusan` `j` on((find_in_set(`j`.`id_jurusan`,`b`.`id_jurusan`) and (`b`.`nis` not in (1,2))))) GROUP BY `b`.`nis`, `j`.`id_jurusan` ;

-- --------------------------------------------------------

--
-- Structure for view `v_jurusan_nama`
--
DROP TABLE IF EXISTS `v_jurusan_nama`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_jurusan_nama`  AS SELECT `v`.`nis` AS `nis`, `v`.`id_jurusan` AS `id_jurusan`, `j`.`jurusan` AS `jurusan` FROM (`v_jurusan` `v` join `tbl_mst_jurusan` `j`) WHERE (`v`.`id_jurusan` = `j`.`id_jurusan`) ORDER BY `v`.`nis` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_nilai`
--
DROP TABLE IF EXISTS `v_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_nilai`  AS SELECT `tbl_nilai`.`nis` AS `nis`, substring_index(substring_index(`tbl_nilai`.`id_pelajaran`,',',`numbers`.`n`),',',-(1)) AS `id_pelajaran`, substring_index(substring_index(`tbl_nilai`.`nilai`,',',`numbers`.`n`),',',-(1)) AS `nilai` FROM (`tbl_nilai` join (select 1 AS `n` union all select 2 AS `n` union all select 3 AS `n`) `numbers` on(((char_length(`tbl_nilai`.`id_pelajaran`) - char_length(replace(`tbl_nilai`.`id_pelajaran`,',',''))) >= (`numbers`.`n` - 1)))) ORDER BY `tbl_nilai`.`nis` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_nilai_aktif`
--
DROP TABLE IF EXISTS `v_nilai_aktif`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_nilai_aktif`  AS SELECT `tbl_nilai_keaktifan`.`nis` AS `nis`, substring_index(substring_index(`tbl_nilai_keaktifan`.`id_pelajaran`,',',`numbers`.`n`),',',-(1)) AS `id_pelajaran`, substring_index(substring_index(`tbl_nilai_keaktifan`.`nilai_keaktifan`,',',`numbers`.`n`),',',-(1)) AS `nilaikeaktifan` FROM (`tbl_nilai_keaktifan` join (select 1 AS `n` union all select 2 AS `n` union all select 3 AS `n`) `numbers` on(((char_length(`tbl_nilai_keaktifan`.`id_pelajaran`) - char_length(replace(`tbl_nilai_keaktifan`.`id_pelajaran`,',',''))) >= (`numbers`.`n` - 1)))) ORDER BY `tbl_nilai_keaktifan`.`nis` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_nilai_tampil`
--
DROP TABLE IF EXISTS `v_nilai_tampil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_nilai_tampil`  AS SELECT `tbl_nilai_keterampilan`.`nis` AS `nis`, substring_index(substring_index(`tbl_nilai_keterampilan`.`id_pelajaran`,',',`numbers`.`n`),',',-(1)) AS `id_pelajaran`, substring_index(substring_index(`tbl_nilai_keterampilan`.`nilai_keterampilan`,',',`numbers`.`n`),',',-(1)) AS `nilaiterampil` FROM (`tbl_nilai_keterampilan` join (select 1 AS `n` union all select 2 AS `n` union all select 3 AS `n`) `numbers` on(((char_length(`tbl_nilai_keterampilan`.`id_pelajaran`) - char_length(replace(`tbl_nilai_keterampilan`.`id_pelajaran`,',',''))) >= (`numbers`.`n` - 1)))) ORDER BY `tbl_nilai_keterampilan`.`nis` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_pelajaran`
--
DROP TABLE IF EXISTS `v_pelajaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_pelajaran`  AS SELECT `b`.`nis` AS `nis`, `b`.`nama` AS `nama`, substring_index(substring_index(`p`.`pelajaran`,',',`numbers`.`n`),',',-(1)) AS `pelajaran`, `p`.`id_pelajaran` AS `id_pelajaran` FROM ((((((`tbl_biodata` `b` left join `tbl_pilihan_mapel` `pm` on((`pm`.`nis` = `b`.`nis`))) left join `tbl_mst_pelajaran` `p` on(find_in_set(`p`.`id_pelajaran`,`pm`.`id_pelajaran`))) left join `tbl_nilai` `n` on(((`n`.`nis` = `b`.`nis`) and (`n`.`id_pelajaran` = `pm`.`id_pelajaran`)))) left join `tbl_nilai_keaktifan` `ka` on((`ka`.`nis` = `b`.`nis`))) left join `tbl_nilai_keterampilan` `t` on((`t`.`nis` = `b`.`nis`))) join (select 1 AS `n` union all select 2 AS `n` union all select 3 AS `n` union all select 4 AS `n` union all select 5 AS `n`) `numbers` on(((char_length(`p`.`pelajaran`) - char_length(replace(`p`.`pelajaran`,',',''))) >= (`numbers`.`n` - 1)))) WHERE (`b`.`id_jurusan` <> 1) GROUP BY `b`.`nis`, `p`.`id_pelajaran`, `numbers`.`n` ORDER BY `b`.`nis` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_jur_pel`
--
ALTER TABLE `tbl_jur_pel`
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_pelajaran` (`id_pelajaran`),
  ADD KEY `nis` (`nis`);

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
-- Indexes for table `tbl_nilai_keaktifan`
--
ALTER TABLE `tbl_nilai_keaktifan`
  ADD KEY `nis` (`nis`),
  ADD KEY `id_pelajaran` (`id_pelajaran`);

--
-- Indexes for table `tbl_nilai_keterampilan`
--
ALTER TABLE `tbl_nilai_keterampilan`
  ADD KEY `nis` (`nis`),
  ADD KEY `id_pelajaran` (`id_pelajaran`);

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
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_mst_pelajaran`
--
ALTER TABLE `tbl_mst_pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mst_role`
--
ALTER TABLE `tbl_mst_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pilihan_mapel`
--
ALTER TABLE `tbl_pilihan_mapel`
  MODIFY `id_pilihan_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jur_pel`
--
ALTER TABLE `tbl_jur_pel`
  ADD CONSTRAINT `tbl_jur_pel_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_mst_jurusan` (`id_jurusan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jur_pel_ibfk_2` FOREIGN KEY (`id_pelajaran`) REFERENCES `tbl_mst_pelajaran` (`id_pelajaran`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jur_pel_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `tbl_biodata` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_nilai_keaktifan`
--
ALTER TABLE `tbl_nilai_keaktifan`
  ADD CONSTRAINT `tbl_nilai_keaktifan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tbl_user` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_nilai_keterampilan`
--
ALTER TABLE `tbl_nilai_keterampilan`
  ADD CONSTRAINT `tbl_nilai_keterampilan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tbl_user` (`nis`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;