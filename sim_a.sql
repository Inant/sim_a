-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2020 pada 13.54
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_a`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
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
-- Struktur dari tabel `bidang_keahlian`
--

CREATE TABLE `bidang_keahlian` (
  `id_bidang_keahlian` tinyint(4) NOT NULL,
  `nama_bidang_keahlian` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bidang_keahlian`
--

INSERT INTO `bidang_keahlian` (`id_bidang_keahlian`, `nama_bidang_keahlian`) VALUES
(1, 'Teknologi Informasi'),
(2, 'Administrasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran_tanggungan`
--

CREATE TABLE `detail_pembayaran_tanggungan` (
  `kd_detail_pembayaran_tanggungan` varchar(7) NOT NULL,
  `kd_pembayaran_tanggungan` varchar(7) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nominal_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_rapot`
--

CREATE TABLE `detail_rapot` (
  `id_detail` int(11) NOT NULL,
  `id_rapot` int(11) NOT NULL,
  `id_kkm` tinyint(4) NOT NULL,
  `nilai` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `grade_nilai`
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
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(30) NOT NULL,
  `nama_guru` varchar(150) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nuptk` varchar(50) NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Kong hu chu','Hindu','Budha') NOT NULL,
  `alamat_jalan` varchar(255) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `nama_dusun` varchar(100) NOT NULL,
  `desa_kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sk_cpns` varchar(150) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nik`, `nuptk`, `agama`, `alamat_jalan`, `rt`, `rw`, `nama_dusun`, `desa_kelurahan`, `kecamatan`, `kode_pos`, `telepon`, `hp`, `email`, `sk_cpns`, `npwp`, `kewarganegaraan`, `foto`) VALUES
('195704111980032004', 'April Daniati', '', 'Padang Panjang', '1957-04-11', '1374025104571989', '1743735636300012', '', 'Jl.Perintis Kemerdekaan No.121 B', '3', '0', '', 'Balai-Balai', 'Kec. Padang Panjang Barat', 27114, '0751461692', '081267771344', 'dankrez48@gmail.com', '56483/C/2/80', '081556565453', '', ''),
('195806161984032002', 'Aisyah', 'Perempuan', 'Bukittinggi', '1958-06-16', '1374025104571989', '3948736639300012', 'Islam', 'Birugo Puhun 80.266', '0', '0', '', 'Tarok Dipo', 'Kec. Aur Birugo Tigo Baleh', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '822/1412/III-BKD-2005', '475928198202000', '', ''),
('195806161984000001', 'Aina Yonavia', 'Perempuan', 'Bukittinggi', '1989-02-28', '1374025104571989', '', 'Islam', 'Jl.bonjo Baru By Pass', '3', '5', '', 'Tarok DIpo', 'Kec. Guguk Panjang', 26122, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('196209051987031007', 'Amri Jaya', 'Laki-Laki', 'Jakarta', '1962-09-05', '1374025104571989', '1237740641300043', 'Islam', 'Jorong Biaro', '0', '0', '', 'Biaro Gadang', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '1402/IV.E/KWPK-1987', '', '', ''),
('195806161984000016', 'Agus Musanib', 'Laki-Laki', 'Bali', '1950-02-02', '1374025104571989', '', 'Islam', 'Prof.M.Yamin, SH', '4', '4', '', 'Tarok Dipo', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('195901241986032002', 'Asbaidar', 'Perempuan', 'Pakan Kamis', '1959-01-24', '1374025104571989', '6456737638300012', 'Islam', 'Bukareh', '0', '0', '', 'Bukareh', 'Kec. Tilatang Kamang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '873/IV.E/Kwpk-1986', '475928271202000', '', ''),
('196703011992031006', 'Azwaldi', 'Laki-Laki', 'Agam', '1967-03-01', '1374025104571989', '5633745648200022', 'Islam', 'Jorong Aia Kaciak', '0', '0', '', 'Nagari Kubang Putiah', 'Kec. Banuhampu', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '2746/IV/KWPK-1993', '698210374202000', '', ''),
('196812211997022002', 'Darmawati', 'Perempuan', 'Bukittinggi', '1968-12-21', '1374025104571989', '8553746649300023', 'Islam', 'Jl.Syekh Arrasuli No.66E', '4', '1', '', 'Aur Tajungkang Tengah Saw', 'Kec. Guguk Panjang', 26111, '0751461692', '081267771344', 'dankrez48@gmail.com', '16872/A2/Kp/1997', '150070308202000', '', ''),
('196312041987031000', 'Dasmir', 'Laki-Laki', 'Magek,Agam', '1963-03-04', '1374025104571989', '0536741643200023', 'Islam', 'Jln. Sawah Dangka No. 58 A III Kampung Gadut', '0', '0', '', 'Koto Tangah', 'Kec. Tilatang Kamang', 26152, '0751461692', '081267771344', 'dankrez48@gmail.com', '501/IV.E/Kwpk-1987', '146058979202000', '', ''),
('198406142009012003', 'Dellya', 'Perempuan', 'Bukittinggi', '1984-06-14', '1374025104571989', '3946762664210112', 'Islam', 'Parak Kongsi Jorong Parik Putuih', '0', '0', '', 'Ampang Gadang', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/022-5D/BKD-2009', '', '', ''),
('198012112005012005', 'Desi Eriani', 'Perempuan', 'Payakumbuh', '1980-12-11', '1374025104571989', '7543758660300113', 'Islam', 'Balai Nan Duo No.57', '3', '1', '', 'Balai Nan Duo', 'Kec. Payakumbuh Barat', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/034/5D-BKD/2005', '475928404202000', '', ''),
('196305141990032003', 'Desmainil', 'Perempuan', 'Barulak', '1963-05-14', '1374025104571989', '', 'Islam', 'Komplek Taman Asri Blok E.1 ', '0', '0', 'Parik Putuih', 'Ampang Gadang', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '167/IV-A/KWPK-1990', '', '', ''),
('198312252009022007', 'Destri Eka Putri', 'Perempuan', 'Kambing VII', '1983-12-25', '1374025104571989', '6557761663300133', 'Islam', 'Jl Prof M Yamin SH Gang Langsat No 78', '2', '2', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 26132, '0751461692', '081267771344', 'dankrez48@gmail.com', '813.3/56/KKD-SWL/2009', '780971883203000', '', ''),
('195806161984000002', 'Dian Lestari', 'Laki-Laki', 'Bukittinggi', '1989-08-03', '1374025104571989', '', 'Islam', 'Jalan Ahmad Karim Nomor 96', '2', '4', '', 'Benteng Pasar Atas', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('195912121986021004', 'Edwardi', 'Laki-Laki', 'Sungai Landir', '1959-12-12', '1374025104571989', '4544737639200063', 'Islam', 'Jl.Pakoan Indah II No.83 Jorong Aro Kandikir', '0', '0', '', 'Gaduik', 'Kec. Guguk Panjang', 26122, '0751461692', '081267771344', 'dankrez48@gmail.com', '822/979/III-bkd-2005', '', '', ''),
('197411132000032007', 'Efayanti', 'Perempuan', 'Balingka', '1974-11-13', '1374025104571989', '4445752654300023', 'Islam', 'Jl.Pakoan Indah III Gang Arwana No.1 Jorong Aro Kandikir', '0', '0', '', 'Gaduik', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '8527/A2/kp/2000', '476470810202000', '', ''),
('197110292005011003', 'Efrizal M', 'Laki-Laki', 'Bukittinggi', '1971-10-29', '1374025104571989', '1361749652200013', 'Islam', 'Jl;.Raya Tigo Baleh No.8', '1', '6', '', 'Pakan Labuah', 'Kec. Aur Birugo Tigo Baleh', 26134, '0751461692', '081267771344', 'dankrez48@gmail.com', 'bkd.049/813.3/Kep/Wako-2005', '', '', ''),
('195806161984000003', 'Ega Nerifalinda', 'Perempuan', 'Pekan Kamis', '1983-03-20', '1374025104571989', '', 'Islam', 'Jorong Padang Canting', '0', '0', '', 'Kapau', 'Kec. Tilatang Kamang', 26152, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('196709021991032006', 'Eli Noverma', 'Perempuan', 'Ampalu Gurun, Batusa', '1967-09-02', '1374025104571989', '6234745648300033', 'Islam', 'Jl.Haji Miskin No. 91A Palolok', '0', '0', '', 'Campago Ipuh', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '822/005/disdikpora.bkt/skt-200', '', '', ''),
('197004031997022001', 'Elianis', 'Perempuan', 'Pasanehan', '1970-04-03', '1374025104571989', '0735748650300032', 'Islam', 'Bonjo Alam', '0', '0', '', 'Ampang Gadang', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '16858/A2.KP.1997', '', '', ''),
('196709271989031003', 'Elno', 'Laki-Laki', 'Agam', '1967-09-27', '1374025104571989', '5259745646200003', 'Islam', 'Perumahan Pasia Permai No.7', '0', '0', 'Cibuak Ameh', 'Pasia', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '1474/IV.E/KWP-1989', '475928412202000', '', ''),
('196109191988031006', 'Elza Refni', 'Laki-Laki', 'Padang Lawas', '1961-09-19', '1374025104571989', '8251739641200023', 'Islam', 'Komplek Veteran Guguk Randah Jl.Ak Gani', '5', '2', '', 'Campago Guguak Bulek', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '760/IV.E/Kwpk-1988', '475928172202000', '', ''),
('195806161984000004', 'Erdison', 'Laki-Laki', 'Sungai Liku', '1981-01-03', '1374025104571989', '', 'Islam', 'Birugo Bungo', '2', '1', '', 'Birugo', 'Kec. Aur Birugo Tigo Baleh', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('196202191990032001', 'Erlis', 'Perempuan', 'Tampunik, Agam', '1962-02-19', '1374025104571989', '8551740641300032', 'Islam', 'Tampunik', '0', '0', '', 'Tampunik', 'Kec. Tilatang Kamang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '525/IV.E/Kwpk-1990', '475928438202000', '', ''),
('196308051983012001', 'Ernawilis', 'Perempuan', 'Palembayan', '1963-09-05', '1374025104571989', '7137741642300043', 'Islam', 'Perumnas Blok H7 ', '0', '0', 'Jorong Kudang Duo', 'Bukik Batabuah', 'Kec. Candung', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '1357/c/3/1982', '476474077202000', '', ''),
('197305312014061001', 'Erwin', 'Laki-Laki', 'Bandung', '1973-05-31', '1374025104571989', '5863751653200002', 'Islam', 'Jl.Merapi 2986', '1', '4', '', 'Puhun Tembok', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/043-5D/BKD-2014', '', '', ''),
('195712091982022001', 'Faridawaty', 'Perempuan', 'Tanjung Karang', '1957-12-09', '1374025104571989', '2541735636300013', 'Islam', 'Perumahan Kubang Duo B.12 Koto Panjang', '0', '0', '', 'Bukik Batabuah', 'Kec. Candung', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '40250/C/2/82', '475928370202000', '', ''),
('195806161984000005', 'Fauzana Fitri zalona', 'Laki-Laki', 'Bukittinggi', '1988-05-27', '1374025104571989', '', 'Islam', 'Jl.Soekarno Hatta No.17', '4', '0', '', 'Bukit Surungan', 'Kec. Padang Panjang Barat', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('196307251987112001', 'Firdawati', 'Perempuan', 'Bukittinggi', '1963-07-25', '1374025104571989', '7057741642300003', 'Islam', 'Jl.Hamka No.15', '3', '6', '', 'tarok dipo', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '1000/IV.E/Kwpk-1987', '152702387202000', '', ''),
('197908232006042004', 'Fitria Lisa', 'Perempuan', 'Sungai Tanang', '1979-08-23', '1374025104571989', '4155757659302005', 'Islam', 'Pandan Gadang', '0', '0', '', 'Sungai Tanang', 'Kec. Banuhampu', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/007-5D/BKD-2006', '476473566202000', '', ''),
('196005151984032003', 'Floria Napolis', 'Perempuan', 'Tanjung Pandan', '1960-05-15', '1374025104571989', '5847738639300052', 'Islam', 'Jl.Soekarno Hatta No.17', '0', '0', '', 'Bukit Surungan', 'Kec. Padang Panjang Barat', 21175, '0751461692', '081267771344', 'dankrez48@gmail.com', '78167/C/K.IV.I/84', '475928339202000', '', ''),
('197305292003122001', 'Frimayasti', 'Perempuan', 'Bukittinggi', '1973-05-29', '1374025104571989', '3861751653300012', 'Islam', 'Jl.Bahder Johan No.43', '2', '5', '', 'Puhun Tembok', 'Kec. Mandiangin Koto Selayan', 26124, '0751461692', '081267771344', 'dankrez48@gmail.com', '800.05/25/WK-PYK/2004', '671678688204000', '', ''),
('196310031988032002', 'Hanifah', 'Perempuan', 'Bukittinggi', '1963-10-03', '1374025104571989', '4335741644300013', 'Islam', 'Sanjai Dalam No.32', '0', '0', '', 'Manggis Ganting', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '53766/A.2.IV/c/1998', '', '', ''),
('198105182009011003', 'Herman Novia Rozi', 'Laki-Laki', 'Kab.Lima Puluh Kota', '1981-05-18', '1374025104571989', '8850759660200002', 'Islam', 'Jl. Nurul Huda No. 32 S', '2', '5', '', 'Tarok Dipo', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/081-5D/BKD-2009', '149385536202000', '', ''),
('198512152009012003', 'Indrawati', 'Perempuan', 'Pasaman', '1985-12-15', '1374025104571989', '9547763664210073', 'Islam', 'Bukit Ambacang', '6', '1', '', 'Kubu Gulai Bancah', 'Kec. Mandiangin Koto Selayan', 26122, '0751461692', '081267771344', 'dankrez48@gmail.com', '813.3/128/BKPL-2009', '153409362202000', '', ''),
('196712271991012002', 'Irma Hadi Surya', 'Perempuan', 'Bukittinggi', '1967-12-27', '1374025104571989', '7559745647300033', 'Islam', 'Jl. Bantolaweh 4c', '2', '1', '', 'Kayu Kubu', 'Kec. Guguk Panjang', 26115, '0751461692', '081267771344', 'dankrez48@gmail.com', '5182/A2IV/IC/1991', '776386260202000', '', ''),
('198401272005012003', 'Irma Yunita', 'Perempuan', 'Kab. Agam', '1984-01-27', '1374025104571989', '', 'Islam', 'Jl.Jendral Sudirman', '2', '2', '', 'Birugo', 'Kec. Aur Birugo Tigo Baleh', 26138, '0751461692', '081267771344', 'dankrez48@gmail.com', '813-117/5D-BKD/2005', '165216417202000', '', ''),
('195806161984000006', 'Jusnawita', 'Perempuan', 'Bukittinggi', '1976-09-22', '1374025104571989', '2754754658300002', 'Islam', 'Jl.Raya Tigo Baleh No.B', '0', '0', '', 'Pakan Labuah', 'Kec. Aur Birugo Tigo Baleh', 26134, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('196207071989032002', 'Khairiati', 'Perempuan', 'Curup', '1962-07-07', '1374025104571989', '8039740641300033', 'Islam', 'Jl.Merak No. 185 Perumnas Kubang Putih', '0', '0', 'Kampuang Nan V', 'Kubang Putih', 'Kec. Banuhampu', 26181, '0751461692', '081267771344', 'dankrez48@gmail.com', '881/IV.E/Kwpk-1989', '475928297202000', '', ''),
('197705032009012002', 'Khairina Hafni', 'Perempuan', 'Bukittinggi', '1977-05-03', '1374025104571989', '8835755657300022', 'Islam', 'Jorong Sungai Tanang Ketek', '0', '0', '', 'Sungai Tanang', 'Kec. Banuhampu', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/100-5D/BKD-2009', '149385528202000', '', ''),
('195904211984031004', 'Krisnal Razali', 'Laki-Laki', 'Lubuk Basung', '1959-04-21', '1374025104571989', '5753737638200022', 'Islam', 'Komplek PU 2977 Merapi', '0', '0', '', 'Puhun Tembok', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '822/876/DISDIKBKT/TU-08', '473928371202000', '', ''),
('198011132009012004', 'Kurnia Mira Lestari', 'Perempuan', 'Payakumbuh', '1980-11-13', '1374025104571989', '4445758660300033', 'Islam', 'Jl.Ipuh Mandiangin', '6', '2', '', 'Campago Ipuh', 'Kec. Mandiangin Koto Selayan', 26121, '0751461692', '081267771344', 'dankrez48@gmail.com', '813.3/142/BKPL-2009', '', '', ''),
('197001122007012005', 'Lasmiyenti', 'Perempuan', 'Bukittinggi', '1970-01-12', '1374025104571989', '5444748650300002', 'Islam', 'Ladang Cangkiah', '2', '2', '', 'Ladang Cangkiah', 'Kec. Aur Birugo Tigo Baleh', 26135, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/255-5D/BKD-2007', '149838688200200', '', ''),
('196411041994122001', 'Leli Novianti', 'Perempuan', 'Bukittinggi', '1964-11-04', '1374025104571989', '3436742644300033', 'Islam', 'Jl.Jambu No.22', '2', '3', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '85052Acc1994', '', '', ''),
('197505102006042004', 'Leni Marlina', 'Perempuan', 'Lundang', '1975-05-10', '1374025104571989', '3842753655300052', 'Islam', 'Lundang', '0', '0', '', 'Lundang', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '188.45/276/821.13/KTPS/WSL/BKD-2006', '480991330201000', '', ''),
('195806161984000007', 'Lidya Puspita Sari', 'Perempuan', 'Bukittinggi', '1984-08-05', '1374025104571989', '', 'Islam', 'Jl.Kehamikam', '4', '2', '', 'Belakang Balok', 'Kec. Aur Birugo Tigo Baleh', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('196608201993032006', 'Lili Suyani', 'Perempuan', 'Agam', '1966-08-20', '1374025104571989', '8152744647300033', 'Islam', 'simpang empat padang lua', '0', '0', 'padang lua', 'banuhampu', 'Kec. Banuhampu', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '271/IV.E/KWPK-1993', '', '', ''),
('196002071984031003', 'M.Nasir', 'Laki-Laki', 'Bukittinggi', '1960-02-07', '1374025104571989', '5539738639200022', 'Islam', 'Jl.H.Abdul Manan', '0', '0', '', 'Campago Ipuh', 'Kec. Mandiangin Koto Selayan', 26121, '0751461692', '081267771344', 'dankrez48@gmail.com', '41607/c/KIV.I/84', '', '', ''),
('196412271989032005', 'Maria Magdalena', 'Perempuan', 'Payakumbuh', '1964-12-27', '1374025104571989', '5559742644300043', 'Islam', 'Koto Tuo Nagari Panyalaian', '0', '0', '', 'Koto Tuo', 'Kec. Sepuluh Koto', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '431/IV.E/KWPK-1989', '', '', ''),
('195903161984031001', 'Masrafli', 'Laki-Laki', 'Padang', '1959-03-16', '1374025104571989', '1648737639200022', 'Islam', 'Jl.Titih Padang Tarok', '0', '0', '', '-', 'Kec. Baso', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '30/01/1986', '475928164202000', '', ''),
('195904031982021006', 'Masril Hakim', 'Laki-Laki', 'Bukittinggi', '1959-04-03', '1374025104571989', '7735737638200022', 'Islam', 'Sawah Sianik', '1', '1', '', 'Nan Balimo', 'Kec. Tanjung Harapan', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '39863/C/2/82', '476470687202000', '', ''),
('195806161984000008', 'Megawati', 'Perempuan', 'Bukittinggi', '1985-02-28', '1374025104571989', '', 'Islam', 'Jl. Prof. M. Yamin, SH', '1', '1', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 26131, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('195608041980032002', 'Meiri Hasnetty', 'Perempuan', 'Bukittinggi', '1956-08-04', '1374025104571989', '2136734635300013', 'Islam', 'Jl. H. Abdul Manan', '3', '1', '', 'Campago Guguak Bulek', 'Kec. Mandiangin Koto Selayan', 26128, '0751461692', '081267771344', 'dankrez48@gmail.com', '23800/C/2/1980', '475928487202000', '', ''),
('198710052010012011', 'Meliya Defrina', 'Perempuan', 'Agam', '1987-10-05', '1374025104571989', '', 'Islam', 'Jl.Perintis Kemerdekaan No.146', '1', '2', '', 'jati', 'Kec. Padang Timur', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/119-5D/BKD-2010', '', '', ''),
('196403171988032004', 'Metraneliza', 'Perempuan', 'Patapaian', '1964-03-17', '1374025104571989', '3649742643300042', 'Islam', 'Komplek SMA Negeri 1 Bukittinggi', '0', '0', '', 'Pakan Kurai', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '975/IV.E/Kwpk-1988', '476470877202000', '', ''),
('197412162008012001', 'Mira Fujiati', 'Perempuan', 'Guguk Tinggi', '1974-12-16', '1374025104571989', '7548752654300033', 'Islam', 'Jl.Anggur No.2', '4', '3', '', 'Puhun Pintu Kabun', 'Kec. Mandiangin Koto Selayan', 26123, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/253/BKD-2008', '', '', ''),
('196307311989032003', 'Misteti', 'Perempuan', 'Bukittinggi', '1963-07-31', '1374025104571989', '7063741642300023', 'Islam', 'Koto Katiak No. 20 Tigo Baleh', '1', '2', 'Koto Katiak No. 20 Tigo Baleh', 'Parit Antang', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '801/IV.E/KWPK-89', '476470711202000', '', ''),
('197508102002122002', 'Murnita', 'Perempuan', 'Padang Kudo', '1975-08-10', '1374025104571989', '7142753655300053', 'Islam', 'Padang Kudo Kanagarian Batagak, Agam', '0', '0', '', 'Batagak', 'Kec. Sungai Pua', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '870/045/5d/2002', '476470828202000', '', ''),
('196301121987032005', 'Musniar', 'Perempuan', 'Bukittinggi', '1963-01-12', '1374025104571989', '2444741642300032', 'Islam', 'pakan kurai', '2', '4', '', 'tarok dipo', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '1108/8.E/KWPK-1987', '476472980202000', '', ''),
('195802141982021001', 'Naan', 'Laki-Laki', 'Tanah Datar', '1958-02-14', '1374025104571989', '6546736638200022', 'Islam', 'Jl.Puding Mas No. 20, Bukittinggi', '2', '3', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 26131, '0751461692', '081267771344', 'dankrez48@gmail.com', '39868/C/2/82', '', '', ''),
('195702161981032002', 'Nadra Juami', 'Perempuan', 'Solok', '1957-02-16', '1374025104571989', '1548735637300012', 'Islam', 'Mahkota Mas E.7 Garegeh, Bukittinggi', '3', '1', '', 'Garegeh', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '4739/C/K.IV.1/1984', '475928206202000', '', ''),
('195709071984122001', 'Nilusmi', 'Perempuan', 'Agam', '1957-09-07', '1374025104571989', '9239735637300013', 'Islam', 'Perumahan Bukittinggi Indah No.3B', '0', '0', '', 'Pakan Labuah', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '823.4/1233/bd-2007', '', '', ''),
('198411032008032001', 'Nofitatri Purnama', 'Perempuan', 'Jakarta', '1984-11-03', '1374025104571989', '2435762663300063', 'Islam', 'Kp Tangah', '0', '0', 'Jorong Tigo Kampuang', 'Salo', 'Kec. Baso', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813.3/49/KKD-SWL/2008', '149350621203000', '', ''),
('195806161984000009', 'Nova Camelia', 'Perempuan', 'Bukittinggi', '1991-11-15', '1374025104571989', '', 'Islam', 'Panji Jorong Tigo SUrau', '0', '0', '', 'Koto Baru III Jorong', 'Kec. Baso', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('196107121984122002', 'Nurlaili', 'Perempuan', 'Agam', '1961-07-12', '1374025104571989', '0044739641300053', 'Islam', 'Perum Wisma Ganting Permai No.55F', '3', '0', '', 'Pulai Anak Air', 'Kec. Guguk Panjang', 26125, '0751461692', '081267771344', 'dankrez48@gmail.com', '2783/IV.E/KWPK-1985', '476470752202000', '', ''),
('198605012009011001', 'Oki Surya Ananda', 'Laki-Laki', 'Kab.Agam', '1986-05-01', '1374025104571989', '7833764665110052', 'Islam', 'Kampung Pisang Bansa', '0', '0', '', 'Kamang Mudiak', 'Kec. Kamang Magek', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/146-5D/BKD-2009', '149385510202000', '', ''),
('197910182002122002', 'Oktamira', 'Perempuan', 'Bukittinggi', '1979-10-18', '1374025104571989', '3350757659300023', 'Islam', 'Jakmesis', '0', '0', 'jr. Koto Marapak', 'Lambah', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '870/013/5D/2002', '', '', ''),
('195806161984000010', 'Putra Alfajri Wanto', 'Laki-Laki', 'Bukittinggi', '1990-04-17', '1374025104571989', '', 'Islam', 'Kayu Rantingan', '0', '0', '', 'Bukik Batabuah', 'Kec. Candung', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('197709072003122004', 'Rahmawati', 'Perempuan', 'Payakumbuh', '1977-09-07', '1374025104571989', '2239755656300033', 'Islam', 'Jl.Dahlia No.86', '2', '2', '', 'Padang Tinggi', 'Kec. Payakumbuh Barat', 26224, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/050/5D-BKD/2003', '476470885202000', '', ''),
('198208182009012004', 'Rahmawitri', 'Perempuan', 'Padang', '1982-08-18', '1374025104571989', '7150760661300073', 'Islam', 'Jl.Terpadu No.19', '4', '4', '', 'Kalumbuk', 'Kec. Kuranji', 25155, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/152-5D/Bkd-2009', '149385551200200', '', ''),
('196807021995122002', 'Rahmayenti Bustami', 'Perempuan', 'Bukittinggi', '1968-07-02', '1374025104571989', '6034746649300003', 'Islam', 'Jl.Sumur', '2', '1', '', 'Koto Selayan', 'Kec. Mandiangin Koto Selayan', 26126, '0751461692', '081267771344', 'dankrez48@gmail.com', '65989/A2/Kp/1995', '476471727202000', '', ''),
('196802131994032006', 'Rasti Mirza', 'Perempuan', 'Agam', '1968-02-13', '1374025104571989', '2545746648300032', 'Islam', 'Kapau', '0', '0', '', 'Kapau', 'Kec. Tilatang Kamang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '33/IV.E/KWPK/1994', '', '', ''),
('195806161984000011', 'Rezki Putra', 'Laki-Laki', 'Payakumbuh', '1987-02-15', '1374025104571989', '', 'Islam', 'Jorong Padang Ambacang', '0', '0', 'Kenag SItujuah Banda Dalam', 'Kenag SItujuah Banda Dalam', 'Kec. Situjuah Limo Nagari', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('195806161984000012', 'Riadi', 'Laki-Laki', 'Simarpinggan', '1974-10-04', '1374025104571989', '2336752656200003', 'Islam', 'Komplek SMA Negeri 3 Bukittinggi', '4', '4', '', 'Tarok Dipo', 'Kec. Guguk Panjang', 26117, '0751461692', '081267771344', 'dankrez48@gmail.com', '800.669.sma.3.bkt-2012', '', '', ''),
('197706132006042010', 'Rini', 'Perempuan', 'Bukittinggi', '1977-06-13', '1374025104571989', '2945755656300022', 'Islam', 'Jl.Pintu Kabun Gang Kemuning', '2', '4', '', 'Puhun Pintu Kabun', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/091-5D/BKD-2006', '475928230202000', '', ''),
('198302102009011003', 'Riry Mardiyan', 'Laki-Laki', 'Bukittinggi', '1983-02-10', '1374025104571989', '9542761662200012', 'Islam', 'Jl. Prof M Yamin SH Gang Mengkudu No. 32', '2', '2', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 26123, '0751461692', '081267771344', 'dankrez48@gmail.com', '822/498/Disdik-Bkt/KGB-2012', '149385494202000', '', ''),
('196109291986032004', 'Rismitri', 'Perempuan', 'Maninjau', '1961-09-29', '1374025104571989', '3261739640300043', 'Islam', 'Komplek RSAM', '1', '1', '', 'Bukit Apit Puhun', 'Kec. Guguk Panjang', 26114, '0751461692', '081267771344', 'dankrez48@gmail.com', '2268/IV.E/Kwpk-1986', '475928396202000', '', ''),
('195806161984000013', 'Rozi Kurniawan', 'Laki-Laki', 'Sigiran', '1989-07-05', '1374025104571989', '', 'Islam', 'Jl. Malalak-Sicincin', '0', '0', 'Jorong Sigiran', 'Malalak Utara', 'Kec. Malalak', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('195608281982032004', 'Salmah', 'Perempuan', 'Bukittinggi', '1956-08-28', '1374025104571989', '', 'Islam', 'Jl.H.Miskin No.61 B', '2', '5', '', 'Campago Ipuh', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '01/03/1982', '475471768202000', '', ''),
('196701152014061002', 'Suhardiman', 'Laki-Laki', 'Pasaman', '1967-01-15', '1374025104571989', '1034743653200003', 'Islam', 'Komplek SMA Negeri 3 Bukittinggi', '4', '4', '', 'Tarok Dipo', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/041-5D/BKT-2014', '', '', ''),
('196109081984122001', 'Syamsiwarni', 'Perempuan', 'Agam', '1961-09-08', '1374025104571989', '3240739641300043', 'Islam', 'Jl.Cendrawasih I No.145 Perumnas KP.Nan Limo', '0', '0', '', 'Kubang Putih', 'Kec. Guguk Panjang', 26181, '0751461692', '081267771344', 'dankrez48@gmail.com', '822/408/disdik-bkt/tu-08', '', '', ''),
('196412051989032005', 'Telfi Yendra', 'Perempuan', 'Tanah Datar', '1964-12-05', '1374025104571989', '8537742644300033', 'Islam', 'Jl.Lubuk Bawah No.07, Tangah Jua', '3', '3', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '1434/IVE/Kwpk-89', '475928263202000', '', ''),
('197301032006042005', 'Tuti Triana', 'Perempuan', 'Pakan Sinayan', '1973-01-03', '1374025104571989', '3435751651300002', 'Islam', 'Jl.Gurun Panjang No.36G', '1', '6', '', 'Pakan Kurai', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '822/221/Disdik-Bkt/SKT-2011', '475928255202000', '', ''),
('197001091994122001', 'Vera Tri Ningsih', 'Perempuan', 'Maluku', '1970-01-09', '1374025104571989', '2441748649300032', 'Islam', 'Jl. Melati 03 Komplek Inkorba', '1', '6', 'Sanjai', 'Campago Guguak Bulek', 'Kec. Mandiangin Koto Selayan', 26128, '0751461692', '081267771344', 'dankrez48@gmail.com', '84347/A2/C/1994', '148612591204000', '', ''),
('197906062009012002', 'Vivi Sunarti', 'Perempuan', 'Balai Talang', '1979-06-06', '1374025104571989', '3938757659300042', 'Islam', 'Balai Talang', '0', '0', '', 'Balai Talang', 'Kec. Guguak', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '448/108.23.2/SMU.01/KP-2003', '', '', ''),
('196107051985122003', 'Yelfina', 'Perempuan', 'Bukittinggi', '1961-07-05', '1374025104571989', '0037739641300023', 'Islam', 'Jl.Banuhampu Raya No. 306', '0', '0', '', 'Kambung Nan Limo', 'Kec. Banuhampu', 26186, '0751461692', '081267771344', 'dankrez48@gmail.com', '12/IV.E/Kwpk-1986', '', '', ''),
('196306101988032005', 'Yernita', 'Perempuan', 'Magek', '1963-06-10', '1374025104571989', '4942741643300052', 'Islam', 'Jl. Bukik Cangang', '1', '2', '', 'Bukik Cangang-Kayu Ramang', 'Kec. Guguk Panjang', 26116, '0751461692', '081267771344', 'dankrez48@gmail.com', '279/IV.E/KWPK-88', '476470695202000', '', ''),
('196201081985012001', 'Yetmaliar', 'Perempuan', 'Lubuk Basung', '1962-01-08', '1374025104571989', '9440740641300032', 'Islam', 'Parit Rantang Hilir Jorong III Sangkir', '0', '0', '', 'Lubuk Basung', 'Kec. Guguk Panjang', 26415, '0751461692', '081267771344', 'dankrez48@gmail.com', '1864/IV.E/Kwpk-1985', '476470778202000', '', ''),
('195806161984000014', 'Yosnimar', 'Perempuan', 'Bukittinggi', '1984-03-09', '1374025104571989', '4641762663300032', 'Islam', 'Jl.Soekarno Hatta Gang Manunggal No.06, Jangkak', '1', '4', '', 'Campago Ipuh', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '800.669.sma.3.bkt-2012', '', '', ''),
('196107101984122001', 'Yulfah Yetti', 'Perempuan', 'Agam', '1961-07-10', '1374025104571989', '1042739640300023', 'Islam', 'Jl.Prof.M.Yamin,SH', '0', '0', '', 'Aur Kuning', 'Kec. Guguk Panjang', 26117, '0751461692', '081267771344', 'dankrez48@gmail.com', '822/407/disdik.bkt/tu-2008', '593529272202000', '', ''),
('195806161984000015', 'Yulia Sari', 'Perempuan', 'Bukittingi', '1986-01-27', '1374025104571989', '', 'Islam', 'Jl.Padang Gamuak No.16 B', '1', '5', '', 'Tarok Dipo', 'Kec. Guguk Panjang', 26117, '0751461692', '081267771344', 'dankrez48@gmail.com', '', '', '', ''),
('195811111982022002', 'Yusnel', 'Perempuan', 'Matur, Agam', '1958-11-11', '1374025104571989', '3443736638300043', 'Islam', 'Perumahan Bukittinggi Indah No.B9', '1', '7', '', 'Pakan Labuah', 'Kec. Aur Birugo Tigo Baleh', 26134, '0751461692', '081267771344', 'dankrez48@gmail.com', '42091/C/2/82', '475928214202000', '', ''),
('196208161990112001', 'Zaitun', 'Perempuan', 'Matur', '1962-08-16', '1374025104571989', '7148740641300053', 'Islam', 'Jl.Prof.M.Yamin,SH', '0', '0', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 26131, '0751461692', '081267771344', 'dankrez48@gmail.com', '822/359/DISDIK-B19/BKT-200', '476470950202000', '', ''),
('195801181985121001', 'Zetri Zainal', 'Laki-Laki', 'Batu Taba', '1958-01-18', '1374025104571989', '5450736639200002', 'Islam', 'Jorong Tanah Nyariang', '0', '0', '', 'Batu Taba', 'Kec. Ampek Angkek', 26191, '0751461692', '081267771344', 'dankrez48@gmail.com', '119/IV.E/KWPK-86', '476470786202000', '', ''),
('196911131994122001', 'Zulfiwadris', 'Perempuan', 'Bukittinggi', '1969-11-13', '1374025104571989', '7445747649300023', 'Islam', 'baringin', '0', '0', '', 'Gadut', 'Kec. Tilatang Kamang', 0, '0751461692', '081267771344', 'dankrez48@gmail.com', '81903/A2/C/1994', '', '', ''),
('197712282006042005', 'Zulvanisma', 'Perempuan', 'Situjuh Batur,50Kota', '1977-12-28', '1374025104571989', '3560755657300033', 'Islam', 'Jl.Khatib Sulaiman, Situjuh Batur', '0', '0', '', 'Situjuah Batua', 'Kec. Situjuah Limo Nagari', 26263, '0751461692', '081267771344', 'dankrez48@gmail.com', '813/005-5D/BKD-2006', '476470836202000', '', ''),
('', 'dani ardiyansyah', 'Laki-Laki', 'grrtrt', '2020-10-21', '9999999999999999', '2232', 'Islam', '', '3', '3', 'tegalan', 'jdsdkj', 'e', 68154, '081556565453', '081556565453', 'danipasker.ks@gmail.com', 'dsdsd', 'sdsd', 'WNI', ''),
('115704111980032011', 'dani ardiyansyah', 'Laki-Laki', 'grrtrt', '2020-10-13', '5444444444s', '081556565453', 'Islam', 'jl bangsal', '08155', '08155', 'tegalan', 'jdsdkj', 'jkjkjk', 68154, '081556565453', '081556565453', 'danipasker.ks@gmail.com', 'dsdsd', '081556565453', 'WNI', ''),
('117704111980032011', 'MArkus', 'Laki-Laki', 'Jember', '2008-05-05', '9999999999999999', '246', 'Islam', 'jl klopogowok', '01', '03', 'tegalan', 'Langkap', 'Bangsalsari', 68154, '081556565453', '081556565453', 'danipasker.ks@gmail.com', 'spk/118', 'g6', 'WNI', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_kelas`
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
-- Struktur dari tabel `jadwal_pelajaran`
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
-- Struktur dari tabel `jam_pelajaran`
--

CREATE TABLE `jam_pelajaran` (
  `id_jamPelajaran` mediumint(5) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') NOT NULL,
  `jam_ke` tinyint(3) NOT NULL,
  `pukul_dari` time NOT NULL,
  `pukul_sampai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jam_pelajaran`
--

INSERT INTO `jam_pelajaran` (`id_jamPelajaran`, `hari`, `jam_ke`, `pukul_dari`, `pukul_sampai`) VALUES
(1, 'selasa', 1, '14:10:00', '00:00:00'),
(3, 'sabtu', 2, '18:10:00', '00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(6) NOT NULL,
  `id_bidang_keahlian` tinyint(4) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_bidang_keahlian`, `nama_jurusan`) VALUES
('K0004', 1, 'TKJ'),
('k001', 1, 'Teknik Komputer dan jaringan s'),
('K005', 2, 'Analisi Kimia'),
('k006', 2, 'Pertanian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_nilai`
--

CREATE TABLE `kategori_nilai` (
  `id_kategoriNilai` int(6) NOT NULL,
  `nama_kategoriNilai` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` tinyint(4) NOT NULL,
  `nama_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(19, '10'),
(20, '11'),
(21, '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_rombel`
--

CREATE TABLE `kelas_rombel` (
  `id_kelasRombel` smallint(4) NOT NULL,
  `id_kelas` tinyint(2) NOT NULL,
  `id_jurusan` varchar(6) NOT NULL,
  `nama_kelasRombel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas_rombel`
--

INSERT INTO `kelas_rombel` (`id_kelasRombel`, `id_kelas`, `id_jurusan`, `nama_kelasRombel`) VALUES
(14, 19, 'k001', 'TKJ 1'),
(15, 19, 'K005', 'ANK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok_mapel`
--

CREATE TABLE `kelompok_mapel` (
  `id_kelompok_mapel` tinyint(4) NOT NULL,
  `nama_kelompok_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_kkm_perkelas`
--

CREATE TABLE `mapel_kkm_perkelas` (
  `id_kkm` mediumint(9) NOT NULL,
  `id_mapel` tinyint(4) NOT NULL,
  `id_kelas` tinyint(4) NOT NULL,
  `nilai_kkm` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` tinyint(4) NOT NULL,
  `id_kelompok_mapel` tinyint(4) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `id_kelompok_mapel`, `nama_mapel`) VALUES
(2, 0, 'Keamanan Sistem Inpormasi'),
(3, 0, 'MAtematika'),
(4, 0, 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(7) NOT NULL,
  `id_rombel` smallint(4) NOT NULL,
  `nisn` varchar(8) NOT NULL,
  `id_mapel` tinyint(4) NOT NULL,
  `id_tahunAkademik` mediumint(6) NOT NULL,
  `nilai` tinyint(3) NOT NULL,
  `id_kategoriNilai` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_un`
--

CREATE TABLE `nilai_un` (
  `id_nilai_un` int(11) NOT NULL,
  `bi` float NOT NULL,
  `big` float NOT NULL,
  `mtk` float NOT NULL,
  `ipa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtua`
--

CREATE TABLE `orangtua` (
  `id_orangTua` int(9) NOT NULL,
  `nama_bapak` varchar(50) NOT NULL,
  `pekerjaan_bapak` enum('petani','buruh') NOT NULL,
  `penghasilan_bapak` int(11) NOT NULL,
  `alamat_bapak` varchar(100) NOT NULL,
  `tanggal_lahir_bapak` date NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` enum('petani') NOT NULL,
  `penghasilan_ibu` int(11) NOT NULL,
  `alamat_ibu` varchar(100) NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` enum('petani') NOT NULL,
  `perhasilan _wali` int(11) NOT NULL,
  `alamat_wali` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `kode_pembayaran_spp` varchar(8) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `id_spp` tinyint(4) NOT NULL,
  `tanggal_trx` tinyint(4) NOT NULL,
  `bulan_dari` tinyint(4) NOT NULL,
  `bulan_sampai` tinyint(4) NOT NULL,
  `tahun_dari` year(4) NOT NULL,
  `tahun_sampai` year(4) NOT NULL,
  `nominal` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_tanggungan`
--

CREATE TABLE `pembayaran_tanggungan` (
  `kd_pembayaran_tanggungan` varchar(7) NOT NULL,
  `id_tanggungan` mediumint(5) NOT NULL,
  `nominal_tanggungan` int(11) NOT NULL,
  `nisn` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_pendaftaran` varchar(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama_calon_siswa` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kodepos` mediumint(7) NOT NULL,
  `jenis_pendidikan` enum('SMP','lainnya') NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `id_wali` mediumint(7) NOT NULL,
  `id_pilihan_jurusan` mediumint(7) NOT NULL,
  `id_nilai` mediumint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilihan_jurusan`
--

CREATE TABLE `pilihan_jurusan` (
  `id_pilihaan_jurusan` int(11) NOT NULL,
  `pil_1` enum('tkj') NOT NULL,
  `pil_2` enum('tkj') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapot`
--

CREATE TABLE `rapot` (
  `id_rapot` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `id_tahunAkademik` mediumint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` smallint(3) NOT NULL,
  `nama_ruangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah_info`
--

CREATE TABLE `sekolah_info` (
  `id_sekolahInfo` tinyint(1) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `npsn` varchar(30) NOT NULL,
  `nss` varchar(44) NOT NULL,
  `alamat` varchar(44) NOT NULL,
  `kodePos` mediumint(7) NOT NULL,
  `kecamatan` varchar(44) NOT NULL,
  `kabupaten` varchar(44) NOT NULL,
  `provinsi` varchar(44) NOT NULL,
  `noTelp` tinyint(13) NOT NULL,
  `website` varchar(44) NOT NULL,
  `email` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sekolah_info`
--

INSERT INTO `sekolah_info` (`id_sekolahInfo`, `nama_sekolah`, `npsn`, `nss`, `alamat`, `kodePos`, `kecamatan`, `kabupaten`, `provinsi`, `noTelp`, `website`, `email`) VALUES
(1, 'SMK 5 jember', 'jhhj', 'hjhj', 'hhjh', 68154, 'hjhjhjhj', 'jh', 'hjjhh', 7, '6', 'dadasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
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
  `potongan` int(11) NOT NULL,
  `beasiswa` tinyint(1) NOT NULL,
  `id_orangTua` int(9) NOT NULL,
  `id_rombel` mediumint(9) NOT NULL,
  `id_jurusan` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` tinyint(3) NOT NULL,
  `nama_spp` varchar(20) NOT NULL,
  `nominal` int(11) NOT NULL,
  `id_kelas` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `nama_spp`, `nominal`, `id_kelas`) VALUES
(1, 'SPP kelas 10', 500000, 19),
(2, 'spp kelas 11', 600000, 19),
(3, 'spp kelas 12', 200000, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` mediumint(6) NOT NULL,
  `tahun_akademik` varchar(15) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `status` enum('Aktif','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `semester`, `status`) VALUES
(5, '2020/2021', 'Ganjil', 'Aktif'),
(6, '2020/2021', 'Genap', 'Tidak'),
(10, '2021/2022', 'Ganjil', 'Tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggungan`
--

CREATE TABLE `tanggungan` (
  `id_tanggungan` mediumint(5) NOT NULL,
  `nama_tanggungan` varchar(30) NOT NULL,
  `nominal` int(11) NOT NULL,
  `id_kelas` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanggungan`
--

INSERT INTO `tanggungan` (`id_tanggungan`, `nama_tanggungan`, `nominal`, `id_kelas`) VALUES
(1, 'Daftar Ulang', 1000000, 19),
(2, 'Studi tour', 50000, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `target_tanggungan`
--

CREATE TABLE `target_tanggungan` (
  `id_targetTanggungan` mediumint(5) NOT NULL,
  `id_tanggungan` mediumint(5) NOT NULL,
  `id_kelas` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_waliKelas` mediumint(6) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_tahun_akademik` mediumint(6) NOT NULL,
  `id_kelasRombel` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_waliKelas`, `nip`, `id_tahun_akademik`, `id_kelasRombel`) VALUES
(1, '195806161984032002', 8, 12),
(2, '195704111980032004', 10, 14);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `bidang_keahlian`
--
ALTER TABLE `bidang_keahlian`
  ADD PRIMARY KEY (`id_bidang_keahlian`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `histori_kelas`
--
ALTER TABLE `histori_kelas`
  ADD PRIMARY KEY (`id_historiKelas`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwalPelajaran`);

--
-- Indeks untuk tabel `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  ADD PRIMARY KEY (`id_jamPelajaran`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kelas_rombel`
--
ALTER TABLE `kelas_rombel`
  ADD PRIMARY KEY (`id_kelasRombel`);

--
-- Indeks untuk tabel `kelompok_mapel`
--
ALTER TABLE `kelompok_mapel`
  ADD PRIMARY KEY (`id_kelompok_mapel`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`kode_pembayaran_spp`);

--
-- Indeks untuk tabel `pembayaran_tanggungan`
--
ALTER TABLE `pembayaran_tanggungan`
  ADD PRIMARY KEY (`kd_pembayaran_tanggungan`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `sekolah_info`
--
ALTER TABLE `sekolah_info`
  ADD PRIMARY KEY (`id_sekolahInfo`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indeks untuk tabel `tanggungan`
--
ALTER TABLE `tanggungan`
  ADD PRIMARY KEY (`id_tanggungan`);

--
-- Indeks untuk tabel `target_tanggungan`
--
ALTER TABLE `target_tanggungan`
  ADD PRIMARY KEY (`id_targetTanggungan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_waliKelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bidang_keahlian`
--
ALTER TABLE `bidang_keahlian`
  MODIFY `id_bidang_keahlian` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `histori_kelas`
--
ALTER TABLE `histori_kelas`
  MODIFY `id_historiKelas` mediumint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwalPelajaran` mediumint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  MODIFY `id_jamPelajaran` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kelas_rombel`
--
ALTER TABLE `kelas_rombel`
  MODIFY `id_kelasRombel` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sekolah_info`
--
ALTER TABLE `sekolah_info`
  MODIFY `id_sekolahInfo` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_tahun_akademik` mediumint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tanggungan`
--
ALTER TABLE `tanggungan`
  MODIFY `id_tanggungan` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_waliKelas` mediumint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
