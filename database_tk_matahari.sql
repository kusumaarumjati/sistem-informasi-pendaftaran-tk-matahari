-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2021 pada 10.55
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tk_scenario`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `daftar` ()  begin
	/**select s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_daftar,
	j.nama_jenis from pembayaran p right join siswa s on(s.noinduk_siswa = p.noinduk_siswa)
	left join jenis_pembayaran j on (j.id_jenis = p.jenis_pembayaran);**/
	select s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_daftar,
	j.nama_jenis from pembayaran p left join siswa s on(s.noinduk_siswa = p.noinduk_siswa)
	left join jenis_pembayaran j on (j.id_jenis = p.jenis_pembayaran) where j.id_jenis = 'JN01';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `daftar_spp` ()  BEGIN
	select s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_daftar,
	j.nama_jenis from pembayaran p right join siswa s on(s.noinduk_siswa = p.noinduk_siswa)
	left join jenis_pembayaran j on (j.id_jenis = p.jenis_pembayaran);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `siswa_lulus` ()  BEGIN
	SELECT s.noinduk_siswa, s.nama_siswa, s.tgl_masuk, s.tgl_lulus, s.alamat,
	w.nama_walmur FROM siswa s JOIN walimurid w ON(s.walmur = w.nik_walmur)
	WHERE tgl_lulus != '0000-00-00' AND status_siswa = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `siswa_pindah` ()  BEGIN
	SELECT s.noinduk_siswa, s.nama_siswa, s.tgl_masuk, s.tgl_lulus, s.alamat,
	w.nama_walmur FROM siswa s JOIN walimurid w ON(s.walmur = w.nik_walmur)
	WHERE tgl_lulus = '0000-00-00' AND status_siswa = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spp` ()  BEGIN
	/**select s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_daftar,
	j.nama_jenis from pembayaran p right join siswa s on(s.noinduk_siswa = p.noinduk_siswa)
	left join jenis_pembayaran j on (j.id_jenis = p.jenis_pembayaran);**/
	SELECT s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_daftar,
	j.nama_jenis FROM pembayaran p LEFT JOIN siswa s ON(s.noinduk_siswa = p.noinduk_siswa)
	RIGHT JOIN jenis_pembayaran j ON (j.id_jenis = p.jenis_pembayaran) WHERE j.id_jenis = 'JN02';
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `jarakspp` (`idpem` CHAR(10)) RETURNS INT(11) BEGIN
DECLARE lama INT;
SELECT extract(day from tgl_bayar) INTO lama
FROM pembayaran
WHERE no_bayar = idpem;
RETURN lama;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `lamadaftar` (`idpem` CHAR(10)) RETURNS INT(11) BEGIN
DECLARE lama INT;
SELECT TIMESTAMPDIFF(day, tgl_daftar, tgl_bayar) INTO lama
FROM pembayaran
WHERE no_bayar = idpem;
RETURN lama;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis` char(5) NOT NULL,
  `nama_jenis` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis`, `nama_jenis`, `status`) VALUES
('JN01', 'Pendaftaran', 0),
('JN02', 'SPP', 0),
('JN03', 'SPP bulanan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_ruang_kelas` char(1) NOT NULL,
  `nama_ruang_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_ruang_kelas`, `nama_ruang_kelas`) VALUES
('J', 'Daisy'),
('L', 'Rose'),
('M', 'Melati'),
('O', 'Kenanga'),
('U', 'Matahari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kel_bljr`
--

CREATE TABLE `kel_bljr` (
  `tingkat_tk` tinyint(1) NOT NULL,
  `anggota_kel` char(10) NOT NULL,
  `ruang_kelas` char(1) NOT NULL,
  `guru` char(5) NOT NULL,
  `tahun_ajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kel_bljr`
--

INSERT INTO `kel_bljr` (`tingkat_tk`, `anggota_kel`, `ruang_kelas`, `guru`, `tahun_ajar`) VALUES
(1, 'SWA0001', 'J', '1M123', 2015456),
(2, 'SWA0002', 'L', '2LK89', 2015456),
(2, 'SWA0003', 'M', '98760', 2016456),
(1, 'SWA0004', 'O', '78651', 2016456),
(1, 'SWA0005', 'U', '98760', 2017456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_nilai_bulanan`
--

CREATE TABLE `kriteria_nilai_bulanan` (
  `id_kriteria_nilai_bulanan` char(3) NOT NULL,
  `nama_kriteria_bulanan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria_nilai_bulanan`
--

INSERT INTO `kriteria_nilai_bulanan` (`id_kriteria_nilai_bulanan`, `nama_kriteria_bulanan`) VALUES
('KB1', 'Nilai Tugas'),
('KB2', 'Nilai Akhlak'),
('KB3', 'Nilai Kejujuran'),
('KB4', 'Nilai Kehadiran'),
('KB5', 'Nilai sopan santun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_nilai_harian`
--

CREATE TABLE `kriteria_nilai_harian` (
  `id_kriteria_harian` char(3) NOT NULL,
  `nama_kriteria_harian` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria_nilai_harian`
--

INSERT INTO `kriteria_nilai_harian` (`id_kriteria_harian`, `nama_kriteria_harian`) VALUES
('KH1', 'Nilai Ketepatan'),
('KH2', 'Nilai Keceriaan'),
('KH3', 'Nilai Keaktifan'),
('KH4', 'Nilai Kehadiran'),
('KH5', 'Nilai Kesopanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_bulanan`
--

CREATE TABLE `nilai_bulanan` (
  `id_nilai_bulanan` char(5) NOT NULL,
  `bulan_ambil_nilai` date NOT NULL,
  `nilai_bul_sis` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_bulanan`
--

INSERT INTO `nilai_bulanan` (`id_nilai_bulanan`, `bulan_ambil_nilai`, `nilai_bul_sis`) VALUES
('NBUL1', '2020-07-07', 'SWA0001'),
('NBUL2', '2020-07-07', 'SWA0002'),
('NBUL3', '2020-07-07', 'SWA0003'),
('NBUL4', '2020-07-07', 'SWA0004'),
('NBUL5', '2020-07-07', 'SWA0005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_harian`
--

CREATE TABLE `nilai_harian` (
  `id_nilai_harian` char(8) NOT NULL,
  `tgl_ambil_nilai` date NOT NULL,
  `krit_nil_har` char(3) NOT NULL,
  `nil_har_sis` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_harian`
--

INSERT INTO `nilai_harian` (`id_nilai_harian`, `tgl_ambil_nilai`, `krit_nil_har`, `nil_har_sis`) VALUES
('NHAR1', '0000-00-00', 'KH1', 'SWA0001'),
('NHAR2', '0000-00-00', 'KH2', 'SWA0002'),
('NHAR3', '0000-00-00', 'KH3', 'SWA0003'),
('NHAR4', '0000-00-00', 'KH4', 'SWA0004'),
('NHAR5', '0000-00-00', 'KH5', 'SWA0005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip_peg` char(5) NOT NULL,
  `nama_peg` varchar(50) NOT NULL,
  `jk_peg` tinyint(1) NOT NULL,
  `alamat_peg` varchar(100) NOT NULL,
  `notelp_peg` varchar(15) NOT NULL,
  `email_peg` varchar(40) DEFAULT NULL,
  `tglmasuk_peg` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip_peg`, `nama_peg`, `jk_peg`, `alamat_peg`, `notelp_peg`, `email_peg`, `tglmasuk_peg`, `username`, `password`) VALUES
('1M123', 'Kusuma', 1, 'Bojonegoro', '09817867567', 'kusuma@gmail.com', '2020-12-12', 'kusuma', '123'),
('2LK89', 'Arum', 1, 'Bojonegoro', '09817867567', 'arum@gmail.com', '2020-08-12', 'arum', '123'),
('6GHJI', 'ArumJati', 1, 'Bojonegoro', '09817867567', 'arumjati@gmail.com', '2020-09-12', 'arumi', '123'),
('78651', 'Andre', 0, 'Malang', '09817867567', 'andre@gmail.com', '0000-00-00', 'andre', '123'),
('98760', 'budi', 0, 'Surabaya', '099872839', 'budi@gmail.com', '2020-12-09', 'budi', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_bayar` char(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_byr` int(11) NOT NULL,
  `noinduk_siswa` char(10) NOT NULL,
  `jenis_pembayaran` char(5) NOT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no_bayar`, `tgl_bayar`, `jml_byr`, `noinduk_siswa`, `jenis_pembayaran`, `tgl_daftar`, `status`) VALUES
('PBYR001', '2021-01-02', 150000, 'SWA0002', 'JN01', '2021-01-01', 0),
('PBYR002', '2021-01-02', 150000, 'SWA0001', 'JN01', '2020-12-30', 0),
('PBYR003', '2021-01-02', 90000, 'SWA0002', 'JN02', '0000-00-00', 0),
('PBYR004', '2021-01-25', 90000, 'SWA0001', 'JN02', '0000-00-00', 0),
('PBYR005', '2021-01-02', 150000, 'SWA0001', 'JN01', '2020-12-28', 0),
('PBYR006', '2021-01-07', 150000, 'SWA0003', 'JN01', '2021-01-06', 0),
('PBYR007', '2021-01-16', 90000, 'SWA0004', 'JN02', '0000-00-00', 1);

--
-- Trigger `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `deadline_spp` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
IF (new.jenis_pembayaran != 'JN01') THEN
if ( SELECT jarakspp(new.no_bayar) <= 20) then
INSERT INTO rekap_spp (tgl_rekap, no_bayar, tgl_bayar, jml_byr, noinduk_siswa, jenis_pembayaran,STATUS, catatan)
VALUES
(NOW(), new.no_bayar, new.tgl_bayar, new.jml_byr, new.noinduk_siswa, new.jenis_pembayaran, 'LUNAS SPP', 'TEPAT WAKTU');
ELSE 
INSERT INTO rekap_spp (tgl_rekap, no_bayar, tgl_bayar, jml_byr, noinduk_siswa, jenis_pembayaran,STATUS, catatan)
VALUES
(NOW(), new.no_bayar, new.tgl_bayar, new.jml_byr, new.noinduk_siswa, new.jenis_pembayaran, 'LUNAS SPP', 'TERLAMBAT');
END IF ;
end if ;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pedaftaran_lunas` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
IF (new.jenis_pembayaran != 'JN02') THEN
IF (SELECT lamadaftar(new.no_bayar) <= 2 ) THEN
INSERT INTO rekap_pmbyrn_daftar (tgl_rekap, no_bayar, tgl_bayar, jml_byr, noinduk_siswa, jenis_pembayaran,STATUS, tgl_daftar, catatan)
VALUES
(NOW(), new.no_bayar, new.tgl_bayar, new.jml_byr, new.noinduk_siswa, new.jenis_pembayaran, 'LUNAS PENDAFTARAN',new.tgl_daftar, 'TEPAT WAKTU');
ELSE 
INSERT INTO rekap_pmbyrn_daftar (tgl_rekap, no_bayar, tgl_bayar, jml_byr, noinduk_siswa, jenis_pembayaran,STATUS, tgl_daftar, catatan)
VALUES
(NOW(), new.no_bayar, new.tgl_bayar, new.jml_byr, new.noinduk_siswa, new.jenis_pembayaran, 'LUNAS PENDAFTARAN',new.tgl_daftar, 'TERLAMBAT');
END IF ;
END IF ;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `telat_spp` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
IF (SELECT jarakspp(new.no_bayar) > 20) THEN
INSERT INTO rekap_pmbyrn_daftar (tgl_rekap, no_bayar, tgl_bayar, jml_byr, noinduk_siswa, jenis_pembayaran,STATUS, catatan)
VALUES
(NOW(), new.no_bayar, new.tgl_bayar, new.jml_byr, new.noinduk_siswa, new.jenis_pembayaran, 'LUNAS SPP', 'TERLAMBAT');
END IF ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prakarya`
--

CREATE TABLE `prakarya` (
  `id_prakarya` char(10) NOT NULL,
  `tgl_prakarya` date NOT NULL,
  `filepath_prakarya` varchar(100) NOT NULL,
  `noinduk_siswa1` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prakarya`
--

INSERT INTO `prakarya` (`id_prakarya`, `tgl_prakarya`, `filepath_prakarya`, `noinduk_siswa1`) VALUES
('PRK01', '0000-00-00', 'prakarya1', 'SWA0002'),
('PRK56', '0000-00-00', 'prakarya1', 'SWA0005'),
('PRK67', '0000-00-00', 'prakarya1', 'SWA0001'),
('PRK76', '0000-00-00', 'prakarya1', 'SWA0004'),
('PRK89', '0000-00-00', 'prakarya1', 'SWA0003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapot`
--

CREATE TABLE `rapot` (
  `id_rapot` char(5) NOT NULL,
  `cat_rapor` varchar(100) NOT NULL,
  `rapor_siswa` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rapot`
--

INSERT INTO `rapot` (`id_rapot`, `cat_rapor`, `rapor_siswa`) VALUES
('R01', 'belajar lagi ya', 'SWA0001'),
('R02', 'belajar lagi ya', 'SWA0003'),
('R03', 'belajar lagi ya', 'SWA0003'),
('R04', 'belajar lagi ya', 'SWA0004'),
('R05', 'belajar lagi ya', 'SWA0005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_pmbyrn_daftar`
--

CREATE TABLE `rekap_pmbyrn_daftar` (
  `id_rekap_pmbyrn_daftar` int(11) NOT NULL,
  `tgl_rekap` date NOT NULL,
  `no_bayar` char(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_byr` int(11) NOT NULL,
  `noinduk_siswa` char(10) NOT NULL,
  `jenis_pembayaran` char(5) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `catatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekap_pmbyrn_daftar`
--

INSERT INTO `rekap_pmbyrn_daftar` (`id_rekap_pmbyrn_daftar`, `tgl_rekap`, `no_bayar`, `tgl_bayar`, `jml_byr`, `noinduk_siswa`, `jenis_pembayaran`, `status`, `tgl_daftar`, `catatan`) VALUES
(57, '2021-01-02', 'PBYR001', '2021-01-02', 150000, 'SWA0002', 'JN01', 'LUNAS PENDAFTARAN', '2021-01-01', 'TEPAT WAKTU'),
(59, '2021-01-02', 'PBYR006', '2020-06-16', 150000, 'SWA0001', 'JN01', 'LUNAS PENDAFTARAN', '2020-06-10', 'TERLAMBAT'),
(60, '2021-01-02', 'PBYR005', '2021-01-02', 150000, 'SWA0001', 'JN01', 'LUNAS PENDAFTARAN', '2020-12-28', 'TERLAMBAT'),
(61, '2021-01-07', 'PBYR006', '2021-01-07', 150000, 'SWA0003', 'JN01', 'LUNAS PENDAFTARAN', '2021-01-06', 'TEPAT WAKTU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_spp`
--

CREATE TABLE `rekap_spp` (
  `id_rekap_spp` int(11) NOT NULL,
  `tgl_rekap` date NOT NULL,
  `no_bayar` char(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_byr` int(11) NOT NULL,
  `noinduk_siswa` char(10) NOT NULL,
  `jenis_pembayaran` char(5) NOT NULL,
  `status` varchar(30) NOT NULL,
  `catatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekap_spp`
--

INSERT INTO `rekap_spp` (`id_rekap_spp`, `tgl_rekap`, `no_bayar`, `tgl_bayar`, `jml_byr`, `noinduk_siswa`, `jenis_pembayaran`, `status`, `catatan`) VALUES
(22, '2021-01-02', 'PBYR003', '2021-01-02', 90000, 'SWA0002', 'JN02', 'LUNAS SPP', 'TEPAT WAKTU'),
(23, '2021-01-02', 'PBYR004', '2021-01-25', 90000, 'SWA0001', 'JN02', 'LUNAS SPP', 'TERLAMBAT'),
(24, '2021-01-11', 'PBYR007', '2021-01-16', 90000, 'SWA0004', 'JN02', 'LUNAS SPP', 'TEPAT WAKTU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `noinduk_siswa` char(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenkel` tinyint(1) NOT NULL,
  `tgllahir` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_lulus` date DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `anakke` int(11) DEFAULT NULL,
  `walmur` char(16) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `status_siswa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`noinduk_siswa`, `nama_siswa`, `jenkel`, `tgllahir`, `tgl_masuk`, `tgl_lulus`, `alamat`, `anakke`, `walmur`, `status`, `status_siswa`) VALUES
('SWA0001', 'Kai Kamal', 0, '2015-09-07', '2020-06-06', '0000-00-00', 'Hawai', 2, '108766556', 0, 1),
('SWA0002', 'Daniel Hwang', 0, '2016-08-14', '2020-06-06', '2022-06-06', 'Seoul', 3, '109878678', 0, 2),
('SWA0003', 'Rina Supriyadi', 1, '2021-01-05', '2021-01-24', '0000-00-00', 'Mojokerto', 1, '10203456', 0, 1),
('SWA0004', 'Soobin Choi', 0, '2021-01-09', '2021-01-25', '0000-00-00', 'Seoul', 4, '109878678', 0, 0),
('SWA0005', 'Taehyun', 0, '2021-01-31', '2021-01-31', '2021-01-30', 'Seoul', 2, '108766556', 0, 2),
('SWA0006', 'Andre Saputra', 0, '2021-01-16', '2021-01-30', '2021-01-30', 'Mojokerto', 2, '10398765', 0, 2),
('SWA0007', 'Beomgyu', 0, '2021-01-30', '2021-01-30', '0000-00-00', 'seoul', 2, '109878678', 0, 1),
('SWA0008', 'Karina', 1, '2017-09-05', '2021-01-30', '0000-00-00', 'Seoul', 1, '10203456', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahunajar` int(11) NOT NULL,
  `tahun_ajar` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahunajar`, `tahun_ajar`) VALUES
(2015456, '2015'),
(2016456, '2016'),
(2017456, '2017'),
(2018456, '2018'),
(2019456, '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terdapat`
--

CREATE TABLE `terdapat` (
  `id_kriteria_nilai_bulanan` char(3) NOT NULL,
  `nilai_bul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `terdapat`
--

INSERT INTO `terdapat` (`id_kriteria_nilai_bulanan`, `nilai_bul`) VALUES
('KB1', 90),
('KB2', 90),
('KB3', 95),
('KB4', 93),
('KB5', 94);

-- --------------------------------------------------------

--
-- Struktur dari tabel `terdiri`
--

CREATE TABLE `terdiri` (
  `id_kriteria_harian` char(3) NOT NULL,
  `id_nilai_harian` char(8) NOT NULL,
  `nilai_har` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `terdiri`
--

INSERT INTO `terdiri` (`id_kriteria_harian`, `id_nilai_harian`, `nilai_har`) VALUES
('KH1', 'NHAR1', 90),
('KH2', 'NHAR2', 90),
('KH3', 'NHAR3', 395),
('KH4', 'NHAR4', 93),
('KH5', 'NHAR5', 94);

-- --------------------------------------------------------

--
-- Struktur dari tabel `walimurid`
--

CREATE TABLE `walimurid` (
  `nik_walmur` char(16) NOT NULL,
  `nama_walmur` varchar(50) NOT NULL,
  `pekerjaan_Walmur` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `walimurid`
--

INSERT INTO `walimurid` (`nik_walmur`, `nama_walmur`, `pekerjaan_Walmur`, `status`) VALUES
('10198765', 'Darmawan', 'PNS', 0),
('10203456', 'Supriyadi', 'Petani', 0),
('10398765', 'Gunawan', 'Wirausaha', 0),
('108766556', 'Nabil Kamal', 'Artis', 0),
('10987656', 'Joko Damono', 'PNS', 0),
('109878678', 'Choi', 'Guru TK', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_ruang_kelas`);

--
-- Indeks untuk tabel `kel_bljr`
--
ALTER TABLE `kel_bljr`
  ADD PRIMARY KEY (`anggota_kel`,`ruang_kelas`,`guru`,`tahun_ajar`),
  ADD KEY `ruang_kelas` (`ruang_kelas`),
  ADD KEY `guru` (`guru`),
  ADD KEY `tahun_ajar` (`tahun_ajar`);

--
-- Indeks untuk tabel `kriteria_nilai_bulanan`
--
ALTER TABLE `kriteria_nilai_bulanan`
  ADD PRIMARY KEY (`id_kriteria_nilai_bulanan`);

--
-- Indeks untuk tabel `kriteria_nilai_harian`
--
ALTER TABLE `kriteria_nilai_harian`
  ADD PRIMARY KEY (`id_kriteria_harian`);

--
-- Indeks untuk tabel `nilai_bulanan`
--
ALTER TABLE `nilai_bulanan`
  ADD PRIMARY KEY (`id_nilai_bulanan`),
  ADD KEY `nilai_bul_sis` (`nilai_bul_sis`);

--
-- Indeks untuk tabel `nilai_harian`
--
ALTER TABLE `nilai_harian`
  ADD PRIMARY KEY (`id_nilai_harian`),
  ADD KEY `krit_nil_har` (`krit_nil_har`),
  ADD KEY `nil_har_sis` (`nil_har_sis`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip_peg`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_bayar`),
  ADD KEY `noinduk_siswa` (`noinduk_siswa`),
  ADD KEY `jenis_pembayaran` (`jenis_pembayaran`);

--
-- Indeks untuk tabel `prakarya`
--
ALTER TABLE `prakarya`
  ADD PRIMARY KEY (`id_prakarya`),
  ADD KEY `noinduk_siswa1` (`noinduk_siswa1`);

--
-- Indeks untuk tabel `rapot`
--
ALTER TABLE `rapot`
  ADD PRIMARY KEY (`id_rapot`),
  ADD KEY `rapor_siswa` (`rapor_siswa`);

--
-- Indeks untuk tabel `rekap_pmbyrn_daftar`
--
ALTER TABLE `rekap_pmbyrn_daftar`
  ADD PRIMARY KEY (`id_rekap_pmbyrn_daftar`);

--
-- Indeks untuk tabel `rekap_spp`
--
ALTER TABLE `rekap_spp`
  ADD PRIMARY KEY (`id_rekap_spp`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`noinduk_siswa`),
  ADD KEY `walmur` (`walmur`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahunajar`);

--
-- Indeks untuk tabel `terdapat`
--
ALTER TABLE `terdapat`
  ADD PRIMARY KEY (`id_kriteria_nilai_bulanan`);

--
-- Indeks untuk tabel `terdiri`
--
ALTER TABLE `terdiri`
  ADD PRIMARY KEY (`id_kriteria_harian`,`id_nilai_harian`),
  ADD KEY `id_nilai_harian` (`id_nilai_harian`);

--
-- Indeks untuk tabel `walimurid`
--
ALTER TABLE `walimurid`
  ADD PRIMARY KEY (`nik_walmur`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rekap_pmbyrn_daftar`
--
ALTER TABLE `rekap_pmbyrn_daftar`
  MODIFY `id_rekap_pmbyrn_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `rekap_spp`
--
ALTER TABLE `rekap_spp`
  MODIFY `id_rekap_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kel_bljr`
--
ALTER TABLE `kel_bljr`
  ADD CONSTRAINT `anggota_kel` FOREIGN KEY (`anggota_kel`) REFERENCES `siswa` (`noinduk_siswa`),
  ADD CONSTRAINT `guru` FOREIGN KEY (`guru`) REFERENCES `pegawai` (`nip_peg`),
  ADD CONSTRAINT `ruang_kelas` FOREIGN KEY (`ruang_kelas`) REFERENCES `kelas` (`id_ruang_kelas`),
  ADD CONSTRAINT `tahun_ajar` FOREIGN KEY (`tahun_ajar`) REFERENCES `tahun_ajaran` (`id_tahunajar`);

--
-- Ketidakleluasaan untuk tabel `nilai_bulanan`
--
ALTER TABLE `nilai_bulanan`
  ADD CONSTRAINT `nilai_bul_sis` FOREIGN KEY (`nilai_bul_sis`) REFERENCES `siswa` (`noinduk_siswa`);

--
-- Ketidakleluasaan untuk tabel `nilai_harian`
--
ALTER TABLE `nilai_harian`
  ADD CONSTRAINT `krit_nil_har` FOREIGN KEY (`krit_nil_har`) REFERENCES `kriteria_nilai_harian` (`id_kriteria_harian`),
  ADD CONSTRAINT `nil_har_sis` FOREIGN KEY (`nil_har_sis`) REFERENCES `siswa` (`noinduk_siswa`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `jenis_pembayaran` FOREIGN KEY (`jenis_pembayaran`) REFERENCES `jenis_pembayaran` (`id_jenis`),
  ADD CONSTRAINT `noinduk_siswa` FOREIGN KEY (`noinduk_siswa`) REFERENCES `siswa` (`noinduk_siswa`);

--
-- Ketidakleluasaan untuk tabel `prakarya`
--
ALTER TABLE `prakarya`
  ADD CONSTRAINT `noinduk_siswa1` FOREIGN KEY (`noinduk_siswa1`) REFERENCES `siswa` (`noinduk_siswa`);

--
-- Ketidakleluasaan untuk tabel `rapot`
--
ALTER TABLE `rapot`
  ADD CONSTRAINT `rapor_siswa` FOREIGN KEY (`rapor_siswa`) REFERENCES `siswa` (`noinduk_siswa`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `walmur` FOREIGN KEY (`walmur`) REFERENCES `walimurid` (`nik_walmur`);

--
-- Ketidakleluasaan untuk tabel `terdapat`
--
ALTER TABLE `terdapat`
  ADD CONSTRAINT `id_krieteria_nilai_bulanan` FOREIGN KEY (`id_kriteria_nilai_bulanan`) REFERENCES `kriteria_nilai_bulanan` (`id_kriteria_nilai_bulanan`);

--
-- Ketidakleluasaan untuk tabel `terdiri`
--
ALTER TABLE `terdiri`
  ADD CONSTRAINT `id_kriteria_harian` FOREIGN KEY (`id_kriteria_harian`) REFERENCES `kriteria_nilai_harian` (`id_kriteria_harian`),
  ADD CONSTRAINT `id_nilai_harian` FOREIGN KEY (`id_nilai_harian`) REFERENCES `nilai_harian` (`id_nilai_harian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
