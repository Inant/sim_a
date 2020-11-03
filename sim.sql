-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 05:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_kelas` tinyint(2) NOT NULL,
  `id_kelasRombel` smallint(4) NOT NULL,
  `id_jadwalPelajaran` mediumint(5) NOT NULL,
  `nisn` varchar(8) NOT NULL,
  `ket` enum('A','I','S','H') NOT NULL,
  `tanggal_absen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaranspp`
--

CREATE TABLE `detail_pembayaranspp` (
  `kode_detaiSpp` varchar(8) NOT NULL,
  `kd_pembayaran_spp` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_karyawan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran_tanggungan`
--

CREATE TABLE `detail_pembayaran_tanggungan` (
  `kd_detail_pembayaran_tanggungan` varchar(7) NOT NULL,
  `kd_pembayaran_tanggungan` varchar(7) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nominal_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_rapot`
--

CREATE TABLE `detail_rapot` (
  `id_detail` int(11) NOT NULL,
  `id_rapot` int(11) NOT NULL,
  `id_mataPelajaran` tinyint(4) NOT NULL,
  `nilai` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade_nilai`
--

CREATE TABLE `grade_nilai` (
  `id_gradeNilai` tinyint(3) NOT NULL,
  `nilai` tinyint(3) NOT NULL,
  `nilai_akhir` int(11) NOT NULL,
  `predikat` varchar(2) NOT NULL,
  `ket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histori_kelas`
--

CREATE TABLE `histori_kelas` (
  `id_historiKelas` mediumint(6) NOT NULL,
  `id_kelasRombel` smallint(4) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `id_tahunAkademik` mediumint(6) NOT NULL,
  `id_rapot` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histori_semester`
--

CREATE TABLE `histori_semester` (
  `id_historiSemester` int(6) NOT NULL,
  `nisn` varchar(8) NOT NULL,
  `id_kelasRombel` smallint(4) NOT NULL,
  `id_tahunAkademik` mediumint(5) NOT NULL,
  `id_nilai` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwalPelajaran` mediumint(5) NOT NULL,
  `id_kelasRombel` smallint(4) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_ruangan` smallint(3) NOT NULL,
  `id_mataPelajaran` tinyint(4) NOT NULL,
  `id_jamPelajaran` mediumint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jam_pelajaran`
--

CREATE TABLE `jam_pelajaran` (
  `id_jamPelajaran` mediumint(5) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') NOT NULL,
  `jam` tinyint(2) NOT NULL,
  `pukul` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(6) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('k001', 'Teknik Komputer dan jaringan s'),
('k006', 'Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_nilai`
--

CREATE TABLE `kategori_nilai` (
  `id_kategoriNilai` int(6) NOT NULL,
  `nama_kategoriNilai` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` tinyint(2) NOT NULL,
  `nama_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(5, '1322'),
(6, '11'),
(7, '116'),
(8, '19'),
(9, '123'),
(10, '11111'),
(11, '1231'),
(12, '7'),
(13, '9'),
(14, '6'),
(15, 'sss22'),
(16, '133qq'),
(17, '13'),
(18, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_rombel`
--

CREATE TABLE `kelas_rombel` (
  `id_kelasRombel` smallint(4) NOT NULL,
  `id_kelas` tinyint(2) NOT NULL,
  `id_jurusan` varchar(6) NOT NULL,
  `nama_kelasRombel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_rombel`
--

INSERT INTO `kelas_rombel` (`id_kelasRombel`, `id_kelas`, `id_jurusan`, `nama_kelasRombel`) VALUES
(3, 5, 'k006', ''),
(8, 5, 'k006', ''),
(9, 5, 'k006', ''),
(10, 5, 'k006', ''),
(11, 13, 'k001', 'tklksjsjs1'),
(12, 5, 'k006', 'tkj2'),
(13, 5, 'k006', 'tkj2');

-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id_kurikulum` tinyint(3) NOT NULL,
  `nama_kurikulum` varchar(30) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` tinyint(4) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `id_kelas` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `nama_mapel`, `id_kelas`) VALUES
(1, 'ips', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(7) NOT NULL,
  `id_rombel` smallint(4) NOT NULL,
  `nisn` varchar(8) NOT NULL,
  `id_mataPelajaran` tinyint(4) NOT NULL,
  `id_tahunAkademik` mediumint(6) NOT NULL,
  `nilai` tinyint(3) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `kode_pembayaran_spp` varchar(8) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `beasiswa` enum('y','t') NOT NULL,
  `id_spp` tinyint(3) NOT NULL,
  `bulan` enum('juli') NOT NULL,
  `total` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `jumlah_kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_tanggungan`
--

CREATE TABLE `pembayaran_tanggungan` (
  `kd_pembayaran_tanggungan` varchar(7) NOT NULL,
  `id_tanggungan` mediumint(5) NOT NULL,
  `nominal_tanggungan` int(11) NOT NULL,
  `nisn` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rapot`
--

CREATE TABLE `rapot` (
  `id_rapot` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `id_tahunAkademik` mediumint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` smallint(3) NOT NULL,
  `nama_ruangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'r43'),
(2, 'r9'),
(3, 'r198'),
(4, '12d');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah_info`
--

CREATE TABLE `sekolah_info` (
  `id_sekolahInfo` tinyint(1) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `npsn` varchar(30) NOT NULL,
  `nss` varchar(44) NOT NULL,
  `alamat` varchar(44) NOT NULL,
  `kodePos` tinyint(5) NOT NULL,
  `kecamatan` varchar(44) NOT NULL,
  `kabupaten` varchar(44) NOT NULL,
  `provinsi` varchar(44) NOT NULL,
  `noTelp` tinyint(13) NOT NULL,
  `website` varchar(44) NOT NULL,
  `email` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(15) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `agama` enum('islam','khatolik','kriten','hindu','budha','konghuchu','lainnya') NOT NULL,
  `foto` blob NOT NULL,
  `nomor_hp` tinyint(15) NOT NULL,
  `id_orangTua` int(7) NOT NULL,
  `id_rombel` int(7) NOT NULL,
  `id_jurusan` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` tinyint(3) NOT NULL,
  `nama_spp` varchar(20) NOT NULL,
  `nominal` int(11) NOT NULL,
  `id_kelas` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` mediumint(6) NOT NULL,
  `tahun_akademik` varchar(15) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `status` enum('Aktif','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `semester`, `status`) VALUES
(5, '2020/2021', 'Ganjil', 'Aktif'),
(6, '2020/2021', 'Genap', 'Tidak'),
(7, '2020/2024', 'Ganjil', 'Aktif'),
(8, '2020/20241', 'Ganjil', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tanggungan`
--

CREATE TABLE `tanggungan` (
  `id_tanggungan` mediumint(5) NOT NULL,
  `nama_tanggungan` varchar(30) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `target_tanggungan`
--

CREATE TABLE `target_tanggungan` (
  `id_targetTanggungan` mediumint(5) NOT NULL,
  `id_tanggungan` mediumint(5) NOT NULL,
  `id_kelas` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namaPengguna` varchar(50) NOT NULL,
  `hakAkses` enum('s','sd') NOT NULL,
  `id_child` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_waliKelas` mediumint(6) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_tahunAkademik` smallint(5) NOT NULL,
  `id_kelasRombel` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `detail_pembayaranspp`
--
ALTER TABLE `detail_pembayaranspp`
  ADD PRIMARY KEY (`kode_detaiSpp`);

--
-- Indexes for table `histori_kelas`
--
ALTER TABLE `histori_kelas`
  ADD PRIMARY KEY (`id_historiKelas`);

--
-- Indexes for table `histori_semester`
--
ALTER TABLE `histori_semester`
  ADD PRIMARY KEY (`id_historiSemester`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwalPelajaran`);

--
-- Indexes for table `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  ADD PRIMARY KEY (`id_jamPelajaran`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_rombel`
--
ALTER TABLE `kelas_rombel`
  ADD PRIMARY KEY (`id_kelasRombel`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`kode_pembayaran_spp`);

--
-- Indexes for table `pembayaran_tanggungan`
--
ALTER TABLE `pembayaran_tanggungan`
  ADD PRIMARY KEY (`kd_pembayaran_tanggungan`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `sekolah_info`
--
ALTER TABLE `sekolah_info`
  ADD PRIMARY KEY (`id_sekolahInfo`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `tanggungan`
--
ALTER TABLE `tanggungan`
  ADD PRIMARY KEY (`id_tanggungan`);

--
-- Indexes for table `target_tanggungan`
--
ALTER TABLE `target_tanggungan`
  ADD PRIMARY KEY (`id_targetTanggungan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_waliKelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histori_kelas`
--
ALTER TABLE `histori_kelas`
  MODIFY `id_historiKelas` mediumint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwalPelajaran` mediumint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  MODIFY `id_jamPelajaran` mediumint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kelas_rombel`
--
ALTER TABLE `kelas_rombel`
  MODIFY `id_kelasRombel` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sekolah_info`
--
ALTER TABLE `sekolah_info`
  MODIFY `id_sekolahInfo` tinyint(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` tinyint(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_tahun_akademik` mediumint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tanggungan`
--
ALTER TABLE `tanggungan`
  MODIFY `id_tanggungan` mediumint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_waliKelas` mediumint(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
