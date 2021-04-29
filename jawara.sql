-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2021 pada 03.09
-- Versi server: 10.1.28-MariaDB
-- Versi PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jawara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `noformulir` varchar(30) DEFAULT NULL,
  `tglformulir` text,
  `notelp` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nama` text,
  `lokasi_absen` varchar(100) DEFAULT NULL,
  `jarak` varchar(30) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`noformulir`, `tglformulir`, `notelp`, `nama`, `lokasi_absen`, `jarak`, `foto`) VALUES
('0000000', '*<Salam>,* \r\nMohon mengisi absen dengan sabar \r\n( _urut menunggu pertanyaan berikutnya_ )', 'Terimakasih ☺️🙏, data absen yang anda kirimkan telah kami terima.', '*Ketikkan Nama :*', '<-7.529724,109.292467>\r\n *Share Loc* :\r\n( _pastikan share loc sudah dideteksi dengan akurat_ )', 'otomatis', '*Swa Foto*  :\r\n( _Selfie Foto dengan camera_)'),
('0000001', '09-04-2021 17:37', 'BPJSTK_AZIZ', '_', '_', '_', '_'),
('0000002', '13-04-2021 14:05', 'Wahyu Atmoko', 'wahyu', 'absen_lokasi_absen_0000002.jpg', '138,07 km', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'auwfar', 'f0a047143d1da15b630c73f0256d5db0', 'Achmad Chadil Auwfar', 'Koala.jpg'),
(2, 'ozil', 'f4e404c7f815fc68e7ce8e3c2e61e347', 'Mesut ', 'profil2.jpg'),
(3, 'aziz', 'b85dc795ba17cb243ab156f8c52124e1', 'Aziz Masruhan', '10241.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarprog`
--

CREATE TABLE `daftarprog` (
  `id` int(11) NOT NULL,
  `noformulir` varchar(30) DEFAULT NULL,
  `tglformulir` text,
  `notelp` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nama` text,
  `perusahaan` text,
  `wilayah` text,
  `tk` text NOT NULL,
  `program` text NOT NULL,
  `upah` text NOT NULL,
  `hitung` varchar(30) DEFAULT NULL COMMENT 'jml tk * Upah * rate * jml prog',
  `id_pic` varchar(10) DEFAULT NULL COMMENT 'id PIC yang menindklanjuti pendaftaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `daftarprog`
--

INSERT INTO `daftarprog` (`id`, `noformulir`, `tglformulir`, `notelp`, `nama`, `perusahaan`, `wilayah`, `tk`, `program`, `upah`, `hitung`, `id_pic`) VALUES
(2, NULL, '<Salam>, \r\nAnda akan mengisi formulir untuk perhitungan simulasi iuran. Mohon mengisi dengan urut (menunggu pertanyaan berikutnya). Terimakasih.\r\n', 'Terimakasih data sudah kami terima.\r\nNo. Permintaan : <NoFormulir>\r\n\r\nDownload Bukti Permohonan ketik :\r\nCEKDAFTAR#<NoFormulir>\r\n\r\nMohon tunggu untuk di hubungi petugas kami\r\nTerima Kasih\r\n', 'Nama Petugas / Pemohon (Ketik dengan KAPITAL)\r\n', 'Nama Perusahaan (Ketik dengan KAPITAL) \r\n', 'Ketik Wilayah Operasional (*Contoh : Semarang*)\r\n', 'Berapa jumlah Tenaga Kerja di dalam perusahaan anda ?', '<VALID:3;4>\r\nBerapa Program yang anda ingin ikuti, \r\nIsi *3* untuk : JKK,JKM dan JHT\r\nIsi *4* untuk : JKK, JKM, JHT dan JP?', 'Masukkan Dasar upah per TK yang di gunakan di perusahaan (dalam format angka tanpa pemisah titik atau koma) ', '0', NULL),
(7, '02', '2021-03-30', '62857411155177', 'Eko Suryanto', 'Surya Grup', 'Semarang', '1', '3', '1000000', '62400', '2'),
(12, '0009', '2021-04-20', '6285741155155', 'Aziz Masruhan', 'Masruhan Corp', 'Tegal', '1000', '2', '3000000', '277200', '2');

--
-- Trigger `daftarprog`
--
DELIMITER $$
CREATE TRIGGER `daftarprog_bi` BEFORE UPDATE ON `daftarprog` FOR EACH ROW IF (NEW.upah <> "_") THEN
	IF NEW.program = "3" THEN
		SET NEW.hitung = (NEW.upah * 0.0624);
    ELSE
    	SET NEW.hitung = (NEW.upah * 0.0924);
    END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `notelp` varchar(100) DEFAULT NULL,
  `form` varchar(250) DEFAULT NULL,
  `duplicate` varchar(3) DEFAULT NULL,
  `flag` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`notelp`, `form`, `duplicate`, `flag`) VALUES
('BPJSTK_AZIZ', 'daftarprog|nama|perusahaan|wilayah|tk|program|upah', 'YES', '0'),
('Wahyu Atmoko', 'absen|nama|lokasi_absen|jarak|foto', 'YES', '0'),
('hans syahrial', 'daftarprog|nama|perusahaan|wilayah|tk|program|upah', 'YES', '0'),
('BPJSTK Eko', 'daftarprog|nama|perusahaan|wilayah|tk|program|upah', 'YES', '0'),
('BPJTK Pak Tauchid', 'daftarprog|nama|perusahaan|wilayah|tk|program|upah', 'YES', '0'),
('BPJSTK Pak Iksar', 'daftarprog|nama|perusahaan|wilayah|tk|program|upah', 'YES', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grupwa`
--

CREATE TABLE `grupwa` (
  `id` varchar(20) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `grupwa`
--

INSERT INTO `grupwa` (`id`, `contact`, `name`) VALUES
('1', 'hans syahrial', 'hans syahrial'),
('2', 'Wahyu Atmoko', 'Wahyu Atmoko'),
('3', 'BPJSTK_AZIZ', 'BPJSTK_AZIZ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grupwa2`
--

CREATE TABLE `grupwa2` (
  `id` varchar(20) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `grupwa2`
--

INSERT INTO `grupwa2` (`id`, `contact`, `name`) VALUES
('1', 'Test_complain', 'Test_complain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelamin`
--

CREATE TABLE `kelamin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelamin`
--

INSERT INTO `kelamin` (`id`, `nama`) VALUES
(1, 'Laki laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhan`
--

CREATE TABLE `keluhan` (
  `id` int(11) NOT NULL,
  `noformulir` varchar(30) DEFAULT NULL,
  `tglformulir` text,
  `notelp` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nama` text,
  `ktp` text,
  `cabang` text,
  `Keluhan` text,
  `id_pic` varchar(10) DEFAULT NULL COMMENT 'id PIC yang menindklanjuti keluhan di kolom pic_ply'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `keluhan`
--

INSERT INTO `keluhan` (`id`, `noformulir`, `tglformulir`, `notelp`, `nama`, `ktp`, `cabang`, `Keluhan`, `id_pic`) VALUES
(14, '0001', '13-04-2021 11:50', 'Wahyu Atmoko', ' wahyu ', ' 3313170203920001 ', ' purwokerto ', ' antriannya lama banyak menumpuk tidak beraturan', NULL),
(15, '0002', '13-04-2021 12:24', 'Wahyu Atmoko', ' suasu ', ' 3312233645350001 ', ' magelang ', ' cs nya sewot bgt', NULL),
(16, '0003', '13-04-2021 12:29', 'Wahyu Atmoko', ' jojojo ', ' 12312312344554637 ', ' Purwokerto ', ' satpam e sengak', NULL),
(17, '0004', '13-04-2021 13:54', 'Wahyu Atmoko', ' wahyu', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama`) VALUES
(17, 'Jakarta'),
(21, 'Surabaya'),
(29, 'Malang'),
(30, 'Blitar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapping`
--

CREATE TABLE `mapping` (
  `pesan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ubah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `mapping`
--

INSERT INTO `mapping` (`pesan`, `ubah`) VALUES
('Maaf perintah tidak Terdaftar', 'Maaf pesan tidak dikenal system, silahkan ketik info');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `id_kelamin` int(1) DEFAULT NULL,
  `id_posisi` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `telp`, `id_kota`, `id_kelamin`, `id_posisi`, `status`) VALUES
('10', 'Antony Febriansyah Hartono', '082199568540', 21, 1, 1, 1),
('11', 'Hafizh Asrofil Al Banna', '087859615271', 1, 1, 1, 1),
('12', 'Faiq Fajrullah', '085736333728', 1, 1, 2, 1),
('3', 'Mustofa Halim', '081330493322', 1, 1, 3, 1),
('4', 'Dody Ahmad Kusuma Jaya', '083854520015', 1, 1, 2, 1),
('5', 'Mokhammad Choirul Ikhsan', '085749535400', 3, 1, 2, 1),
('7', 'Achmad Chadil Auwfar', '08984119934', 2, 1, 1, 1),
('8', 'Rizal Ferdian', '087777284179', 1, 1, 3, 1),
('9', 'Redika Angga Pratama', '083834657395', 1, 1, 3, 1),
('2', 'Wawan Dwi Prasetyo', '085745966707', 4, 1, 4, 1),
('0eea8a5dd609107e6eb80dac286a0304', 'Aziz Masruhan', '085741155177', 22, 1, 1, 1),
('927c327fa16eb3d3db6b60f5eab8d0d3', 'Aziz Masruhan', '085741155177', 30, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(12) NOT NULL,
  `perusahaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `perusahaan`) VALUES
(1, 'PT Telkom'),
(2, 'Indosat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesertatest`
--

CREATE TABLE `pesertatest` (
  `notelp` varchar(100) DEFAULT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pesertatest`
--

INSERT INTO `pesertatest` (`notelp`, `nis`, `nama`, `kelas`) VALUES
('Test5', '9208', 'ABIYAN ODI PANGESTU', 'X TSM 1'),
('Test2', '9209', 'ABIMANYU MAULIDA HASAN', 'X TB 1'),
('Test3', '9210', 'AFRIZAL RIZKIKA ALWI MAULANA', 'X BPDM 1'),
('Test4', '9211', 'AIDA WULAN SAPUTRI', 'X TL 1'),
('Test5', '9212', 'ANDRO SETIAWAN', 'X TL 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pic_keps`
--

CREATE TABLE `pic_keps` (
  `id` int(11) NOT NULL,
  `keyword` text NOT NULL,
  `nama` varchar(30) NOT NULL,
  `wa` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pic_keps`
--

INSERT INTO `pic_keps` (`id`, `keyword`, `nama`, `wa`, `email`) VALUES
(0, 'Semarang Pemuda', 'Wahyu', '6285725505850', 'wahyu.dwiatmoko@bpjsketenagakerjaan.go.id'),
(1, 'Surakarta', 'Putra', '6285723456789', 'hans.syahrial@bpjsketenagakerjaan.go.id'),
(2, 'Cilacap', 'hans', '6285746354623', 'aziz.masruhan@bpjsketenagakerjaan.go.id'),
(3, 'Yogyakarta', '', '', ''),
(4, 'Pekalongan', '', '', ''),
(5, 'Kudus', '', '', ''),
(6, 'Magelang', '', '', ''),
(7, 'Tegal', '', '', ''),
(8, 'Klaten', '', '', ''),
(9, 'Purwokerto', '', '', ''),
(10, 'Ungaran', '', '', ''),
(11, 'Semarang Majapahit', '', '', ''),
(12, 'Sukoharjo', '', '', ''),
(13, 'Sleman', '', '', ''),
(14, 'Boyolali', '', '', ''),
(15, 'Purbalingga', '', '', ''),
(16, 'Bantul', '', '', ''),
(17, 'Gunung Kidul', '', '', ''),
(18, 'Kulon Progo', '', '', ''),
(19, 'Jepara', '', '', ''),
(20, 'Pati', '', '', ''),
(21, 'Grobogan', '', '', ''),
(22, 'Karanganyar', '', '', ''),
(23, 'Pemalang', '', '', ''),
(24, 'Sragen', '', '', ''),
(25, 'Kebumen', '', '', ''),
(26, 'Banjarnegara', '', '', ''),
(27, 'Blora', '', '', ''),
(28, 'Batang', '', '', ''),
(29, 'Tamanggung', '', '', ''),
(30, 'Purworejo', '', '', ''),
(31, 'Wonosobo', '', '', ''),
(32, 'Rembang', '', '', ''),
(33, 'Brebes', '', '', ''),
(34, 'Kendal', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pic_pely`
--

CREATE TABLE `pic_pely` (
  `id` int(11) NOT NULL,
  `keyword` text NOT NULL,
  `nama` varchar(30) NOT NULL,
  `wa` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pic_pely`
--

INSERT INTO `pic_pely` (`id`, `keyword`, `nama`, `wa`, `email`) VALUES
(0, 'Semarang Pemuda', 'Wahyu', '6285725505850', 'wahyu.dwiatmoko@bpjsketenagakerjaan.go.id'),
(1, 'Surakarta', 'Putra', '6285723456789', 'hans.syahrial@bpjsketenagakerjaan.go.id'),
(2, 'Cilacap', 'hans', '6285746354623', 'aziz.masruhan@bpjsketenagakerjaan.go.id'),
(3, 'Yogyakarta', '', '', ''),
(4, 'Pekalongan', '', '', ''),
(5, 'Kudus', '', '', ''),
(6, 'Magelang', '', '', ''),
(7, 'Tegal', '', '', ''),
(8, 'Klaten', '', '', ''),
(9, 'Purwokerto', '', '', ''),
(10, 'Ungaran', '', '', ''),
(11, 'Semarang Majapahit', '', '', ''),
(12, 'Sukoharjo', '', '', ''),
(13, 'Sleman', '', '', ''),
(14, 'Boyolali', '', '', ''),
(15, 'Purbalingga', '', '', ''),
(16, 'Bantul', '', '', ''),
(17, 'Gunung Kidul', '', '', ''),
(18, 'Kulon Progo', '', '', ''),
(19, 'Jepara', '', '', ''),
(20, 'Pati', '', '', ''),
(21, 'Grobogan', '', '', ''),
(22, 'Karanganyar', '', '', ''),
(23, 'Pemalang', '', '', ''),
(24, 'Sragen', '', '', ''),
(25, 'Kebumen', '', '', ''),
(26, 'Banjarnegara', '', '', ''),
(27, 'Blora', '', '', ''),
(28, 'Batang', '', '', ''),
(29, 'Tamanggung', '', '', ''),
(30, 'Purworejo', '', '', ''),
(31, 'Wonosobo', '', '', ''),
(32, 'Rembang', '', '', ''),
(33, 'Brebes', '', '', ''),
(34, 'Kendal', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id`, `nama`) VALUES
(1, 'IT'),
(2, 'HRD'),
(3, 'Keuangan'),
(4, 'Produk'),
(5, 'Web Developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `notelp` varchar(100) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `soal` varchar(50) DEFAULT NULL,
  `nomor` varchar(50) DEFAULT NULL,
  `waktu` varchar(3) DEFAULT NULL,
  `mulai` varchar(50) DEFAULT NULL,
  `selesai` varchar(50) DEFAULT NULL,
  `acak` varchar(50) DEFAULT NULL,
  `kunci` varchar(100) DEFAULT NULL,
  `jawaban` varchar(100) DEFAULT NULL,
  `nilai` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `request` varchar(250) DEFAULT NULL,
  `autorespon` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keterangan_request` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `typeautorespon` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`request`, `autorespon`, `keterangan_request`, `typeautorespon`, `id`) VALUES
('CHATAUTOSCROLL', 'off', 'Scroll Setting', 'Setting', 1),
('LANGUAGE', 'Indonesia', 'Language Setting', 'Setting', 2),
('COLOR', '#8080FF;#0080C0', 'Color Setting', 'Setting', 3),
('BUTTON', '#8080FF', 'Button Setting', 'Setting', 4),
('FORMCOLOR', 'White', 'Form Color Setting', 'Setting', 5),
('FORMULIR', 'on', 'FORMULIR aktif', 'Setting', 6),
('FORMKONFIRMASI', 'off', 'FORMKONFIRMASI tidak aktif', 'Setting', 7),
('QUIZ', 'off', 'QUIZ tidak aktif', 'Setting', 8),
('TERJADWAL', 'off', 'TERJADWAL tidak aktif', 'Setting', 9),
('PESANERROR', 'off', 'PESANERROR tidak aktif', 'Setting', 10),
('AUTOARCHIVED', 'off', 'AUTOARCHIVED tidak aktif', 'Setting', 11),
('GROUPCHAT', 'on', 'GROUPCHAT aktif', 'Setting', 12),
('AUTORUN', 'off', 'AUTORUN tidak aktif', 'Setting', 13),
('SYSTRAY', 'off', 'SYSTRAY tidak aktif', 'Setting', 14),
('info', 'WhatsApp Autorespon dengan database MariaDb atau MySQL support emoticon 👌👍🙏', 'contoh pesan singkat', 'pesansingkat', 15),
('absen', 'absen|nama|lokasi_absen|jarak|foto', 'COMPLEX-YES', 'isiformulir', 16),
('UAS', 'UAS|pesertatest|notelp', '*ULANGAN AKHIR SEMESTER GASAL 2020/2021*\r\n\r\r\nMAPEL : MATEMATIKA\r\n\r\r\r\nWAKTU : <90 menit>\r\r\nNAMA : <NAMA>\r\r\nKELAS : <KELAS>\r\n\r\r\n\r\r\n*Petunjuk :* _copy pesan ini lalu isilah lembar jawab di bawah ini. Setelah semua nomor telah di isi (dijawab), lalu kirim kembali pesan ini  ke server._\r\r\n\r\r\n<LEMBARJAWAB>\r\n', 'BroadCastQuizPDF', 17),
('download', 'download sheet', '<AKSES:ADMIN>\r\ncontoh : download # pesertatest\r\n                download # pesertatest # where kelas=\'X TB 1\'\r\n                download # pesertatest # where nama like \'%abi%\'', 'downloadsheet', 18),
('testpesanterjadwal', 'pesertatest|notelp|Setiap-Hari|11:40', 'Semangat belajar setiap hari!\r\nSemoga sukses!🕺💃\r\n', 'Terjadwal', 19),
('aktivasi', 'pesertatest|nis', 'Selamat 🙏🙏, nomor anda telah diaktivasi dengan data sbb:\r\nNIS : <nis>\r\nNAMA : <nama>\r\nNo.WA : <notelp>\r\n', 'aktivasitoken', 20),
('carinama', 'pesertatest|nama|LIKE', 'notelp : <notelp>\r\n    nis      : <nis>\r\n    nama  : <nama>\r\n    kelas   : <kelas>', 'caridata', 21),
('ppdb', 'ppdb|nama|jk|alamat|foto', '<AUTOPDF:ON>\r\nCOMPLEX-YES', 'isiformulir', 22),
('MESSAGEINTERVAL', '3', 'Message Interval Setting', 'Setting', 23),
('tes', 'oke tes masuk', 'tes', 'pesansingkat', 29),
('daftarprog', 'daftarprog|nama|perusahaan|wilayah|tk|program|upah', '<DIGIT:4>\r\n\r\n<PREFIX:>\r\n\r\n<SUFIX:>\r\n\r\nCOMPLEX-YES', 'isiformulir', 30),
('hello', '<Salam>\r\n\r\nSalam PRIMA, Selamat datang di Official Whatsapp BPJS Ketenagakerjaan Kanwil Jateng dan DIY. Silahkan pilih informasi yang diinginkan :\r\n\r\n\r\n1. Informasi Program, ketik *PROGRAM*\r\n\r\n2. Permintaan Pendaftaran, ketik *DAFTARPROG*\r\n\r\n3. Keluhan pelayanan, ketik *KELUHAN*\r\n\r\nSilahkan balas sesuai dengan petunjuk.\r\nTerima kasih\r\n\r\n\r\n*Menu lain sedang di kembangkan', '-', 'pesansingkat', 31),
('program', 'Silahkan donwload Brosur disni :\r\n\r\n# Penerima Upah (PU) http://bit.ly/brosurpu\r\n# Bukan Penerima Upah (BPU) http://bit.ly/brosurbpu\r\n\r\nTerima kasih', '-', 'pesansingkat', 32),
('cekdaftar', 'daftarprog|noformulir|EXACT', 'Terima kasih telah menghubungi kami. \r\nSalam Prima', 'caridata', 33),
('keluhan', 'keluhan|nama|ktp|cabang|keluhan', '<AUTOFORWARD:grupwa2>\r\n<DIGIT:4>\r\n<PREFIX:>\r\n<SUFIX:>\r\nMEDIUM-YES', 'isiformulir', 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `uas`
--

CREATE TABLE `uas` (
  `soal` varchar(50) DEFAULT NULL,
  `kunci` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `uas`
--

INSERT INTO `uas` (`soal`, `kunci`) VALUES
('UAS-001', 'DCBDBEEAAC'),
('UAS-002', 'ABDCDEEABC'),
('UAS-003', 'DACEEBBDCA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftarprog`
--
ALTER TABLE `daftarprog`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kelamin`
--
ALTER TABLE `kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pic_keps`
--
ALTER TABLE `pic_keps`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pic_pely`
--
ALTER TABLE `pic_pely`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `daftarprog`
--
ALTER TABLE `daftarprog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
