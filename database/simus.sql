-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Sep 2020 pada 11.13
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alamat`
--

CREATE TABLE `tb_alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` varchar(265) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `kode_pos` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alamat`
--

INSERT INTO `tb_alamat` (`id_alamat`, `id_kota`, `alamat`, `kecamatan`, `kode_pos`) VALUES
(1, 92, 'Jl. Indrayasa', 'Bojongloa Kidul', '40236'),
(2, 21, 'Jl. Indrayasa Cibaduyut', 'Bojongloa Kidul', '40326'),
(3, 23, 'Jl. Soekarno Hatta', 'Bojongloa Kidul', '40236'),
(8, 24, 'Jl. Idrayasa 02', 'Bojongloa Kidul', '40236'),
(9, 5, '', '', ''),
(10, 2, '', '', ''),
(11, 1, '', '', ''),
(12, 23, '', '', ''),
(13, 2, '', '', ''),
(14, 1, '', '', ''),
(15, 2, '', '', ''),
(16, 1, '', '', ''),
(17, 1, '', '', ''),
(18, 5, '', '', ''),
(19, 4, '', '', ''),
(20, 4, '', '', ''),
(21, 3, '', '', ''),
(22, 1, '', '', ''),
(23, 23, '', '', ''),
(24, 23, '', '', ''),
(25, 2, '', '', ''),
(26, 1, '', '', ''),
(27, 1, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(128) NOT NULL,
  `isi_berita` text NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul_berita`, `isi_berita`, `tgl`) VALUES
(24, 'Krim', '<p>Kirim<br></p>', '2020-09-01 12:46:53'),
(25, 'Tes Berita Baru', '<p>tes berita baru<br></p>', '2020-09-03 08:14:53'),
(26, 'Lebih mengenal sejarah lewat aplikasi Museum Monumen Perjuangan Rakyat Jawa Barat', '<p>Ini Isi dari pesan yang akan dikirim pada email subscriber website<br></p>', '2020-09-05 03:16:06'),
(27, 'Info Terbaru dari Museum', '<p>Ini Info terbaru dari museum monpera<br></p>', '2020-09-05 19:57:54'),
(28, 'terbaru berita', '<p>ini berita terbaru<br></p>', '2020-09-06 14:46:01'),
(29, 'Info terbaru museum', '<p>ini ifo terbaru museum<br></p>', '2020-09-06 15:54:26'),
(30, 'kirirm', '<p>Kirim<br></p>', '2020-09-07 10:59:38'),
(31, 'tes', '<p>tess<br></p>', '2020-09-07 11:11:36'),
(32, 'cekceke', '<p>cedkeada<br></p>', '2020-09-07 11:14:25'),
(33, 'rfrfrv', '<p>gyggyt<br></p>', '2020-09-07 11:25:45'),
(34, 'cekkk', '<p>fdssfsd<br></p>', '2020-09-07 11:38:16'),
(35, '1243', '<p>2414rr<br></p>', '2020-09-07 11:39:31'),
(36, '1234fddf', '<p>hjghgjg<br></p>', '2020-09-07 11:47:42'),
(37, '232', '<p>gfdgfd<br></p>', '2020-09-07 11:50:03'),
(38, '123', '<p>fgfdgd<br></p>', '2020-09-07 11:52:48'),
(39, 'wewe', '<p>wewqqw<br></p>', '2020-09-07 11:54:19'),
(40, 'ceckekekke', '<p>dgdfssf<br></p>', '2020-09-07 12:02:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_blog_artikel`
--

CREATE TABLE `tb_blog_artikel` (
  `id_artikel` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sub_judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `isi_artikel` longtext CHARACTER SET latin1 NOT NULL,
  `keterangan_gambar` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT 1,
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `waktu_input` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_blog_artikel`
--

INSERT INTO `tb_blog_artikel` (`id_artikel`, `id_kategori`, `username`, `judul`, `sub_judul`, `judul_seo`, `aktif`, `isi_artikel`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`, `waktu_input`) VALUES
(312, 64, 'admin', 'Sejarah Lengkap Peristiwa Bandung Lautan Api', '', 'sejarah-lengkap-peristiwa-bandung-lautan-api', 'Y', '<p><b style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Peristiwa Bandung Lautan Api</b><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>adalah peristiwa<span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/Kebakaran\" class=\"mw-redirect\" title=\"Kebakaran\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">kebakaran</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>besar yang terjadi di kota<span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/Bandung\" class=\"mw-redirect\" title=\"Bandung\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">Bandung</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">, provinsi<span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/Jawa_Barat\" title=\"Jawa Barat\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">Jawa Barat</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">,<span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/Indonesia\" title=\"Indonesia\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">Indonesia</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>pada<span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/24_Maret\" title=\"24 Maret\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">23 Maret</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/1946\" title=\"1946\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">1946</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">. Dalam waktu tujuh jam, sekitar 200.000 penduduk Bandung</span><sup id=\"cite_ref-1\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-weight: 400; font-style: normal; font-size: 11.2px; color: rgb(32, 33, 34); font-family: sans-serif; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><a href=\"https://id.wikipedia.org/wiki/Bandung_Lautan_Api#cite_note-1\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">[1]</a></sup><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>membakar rumah mereka, meninggalkan kota menuju pegunungan di daerah<span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/Selatan\" title=\"Selatan\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">selatan</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>Bandung. Hal ini dilakukan untuk mencegah tentara<span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/Blok_Sekutu_(Perang_Dunia_II)\" class=\"mw-redirect\" title=\"Blok Sekutu (Perang Dunia II)\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">Sekutu</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>dan tentara<span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/NICA\" class=\"mw-redirect\" title=\"NICA\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">NICA</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/Belanda\" title=\"Belanda\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">Belanda</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>untuk dapat menggunakan kota Bandung sebagai markas strategis militer dalam<span>&nbsp;</span></span><a href=\"https://id.wikipedia.org/wiki/Perang_Kemerdekaan_Indonesia\" class=\"mw-redirect\" title=\"\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">Perang Kemerdekaan Indonesia</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">.</span></p><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><b>Latar Belakang</b><br></span></p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Pasukan<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Inggris\" title=\"Inggris\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Inggris</a><span>&nbsp;</span>bagian dari Brigade MacDonald tiba di Bandung pada tanggal<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/12_Oktober\" title=\"12 Oktober\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">12 Oktober</a><span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/1945\" title=\"1945\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1945</a>. Sejak semula hubungan mereka dengan pemerintah RI sudah tegang. Mereka menuntut agar semua senjata api yang ada di tangan penduduk, kecuali TKR, diserahkan kepada mereka. Orang-orang Belanda yang baru dibebaskan dari kamp tawanan mulai melakukan tindakan-tindakan yang mulai mengganggu keamanan. Akibatnya, bentrokan bersenjata antara Inggris dan TKR tidak dapat dihindari. Malam tanggal<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/24_November\" title=\"24 November\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">21 November</a><span>&nbsp;</span>1945,<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/TKR\" class=\"mw-redirect\" title=\"TKR\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">TKR</a><span>&nbsp;</span>dan badan-badan perjuangan melancarkan serangan terhadap kedudukan-kedudukan Inggris di bagian utara, termasuk<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Hotel_Savoy_Homann\" title=\"Hotel Savoy Homann\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Hotel Homann</a><span>&nbsp;</span>dan<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Hotel_Preanger\" class=\"mw-redirect\" title=\"Hotel Preanger\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Hotel Preanger</a><span>&nbsp;</span>yang mereka gunakan sebagai markas. Tiga hari kemudian, MacDonald menyampaikan ultimatum kepada Gubernur Jawa Barat agar Bandung Utara dikosongkan oleh penduduk Indonesia, termasuk pasukan bersenjata.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Ultimatum Tentara Sekutu agar<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Tentara_Republik_Indonesia\" title=\"Tentara Republik Indonesia\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Tentara Republik Indonesia</a><span>&nbsp;</span>(TRI, sebutan bagi<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/TNI\" class=\"mw-redirect\" title=\"TNI\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">TNI</a><span>&nbsp;</span>pada saat itu) meninggalkan kota Bandung mendorong TRI untuk melakukan operasi \"<a href=\"https://id.wikipedia.org/w/index.php?title=Bumihangus&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Bumihangus (halaman belum tersedia)\" style=\"text-decoration: none; color: rgb(165, 88, 88); background: none;\">bumihangus</a>\". Para pejuang pihak<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Republik_Indonesia\" class=\"mw-redirect\" title=\"Republik Indonesia\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Republik Indonesia</a><span>&nbsp;</span>tidak rela bila Kota Bandung dimanfaatkan oleh pihak Sekutu dan NICA. Keputusan untuk membumihanguskan<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Bandung\" class=\"mw-redirect\" title=\"Bandung\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Bandung</a><span>&nbsp;</span>diambil melalui musyawarah<span>&nbsp;</span><a href=\"https://id.wikipedia.org/w/index.php?title=Madjelis_Persatoean_Perdjoangan_Priangan&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Madjelis Persatoean Perdjoangan Priangan (halaman belum tersedia)\" style=\"text-decoration: none; color: rgb(165, 88, 88); background: none;\">Madjelis Persatoean Perdjoangan Priangan</a><span>&nbsp;</span>(MP3) di hadapan semua kekuatan perjuangan pihak Republik Indonesia, pada tanggal<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/24_Maret\" title=\"24 Maret\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">23 Maret</a><span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/1946\" title=\"1946\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1946</a><sup id=\"cite_ref-2\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-weight: normal; font-style: normal; font-size: 11.2px;\"><a href=\"https://id.wikipedia.org/wiki/Bandung_Lautan_Api#cite_note-2\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">[2]</a></sup>. Kolonel<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Abdoel_Haris_Nasoetion\" class=\"mw-redirect\" title=\"Abdoel Haris Nasoetion\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Abdoel Haris Nasoetion</a><span>&nbsp;</span>selaku Komandan Divisi III<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/TRI\" class=\"mw-disambig\" title=\"TRI\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">TRI</a><span>&nbsp;</span>mengumumkan hasil musyawarah tersebut dan memerintahkan evakuasi Kota Bandung.<sup class=\"noprint Inline-Template\" style=\"line-height: 1; font-size: 11.2px;\"><span title=\"Kalimat yang diikuti tag ini membutuhkan rujukan.&nbsp;since November 2007\" style=\"white-space: nowrap;\">[<i><a href=\"https://id.wikipedia.org/wiki/Wikipedia:Kutip_sumber_tulisan\" title=\"Wikipedia:Kutip sumber tulisan\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">butuh rujukan</a></i>]</span></sup><span>&nbsp;</span>Hari itu juga, rombongan besar penduduk Bandung mengalir panjang meninggalkan kota Bandung dan malam itu pembakaran kota berlangsung.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Bandung sengaja dibakar oleh TRI dan rakyat setempat dengan maksud agar Sekutu tidak dapat menggunakan Bandung sebagai markas strategis militer. Di mana-mana asap hitam mengepul membubung tinggi di udara dan semua listrik mati. Tentara Inggris mulai menyerang sehingga pertempuran sengit terjadi. Pertempuran yang paling besar terjadi di Desa<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Dayeuhkolot,_Bandung\" title=\"Dayeuhkolot, Bandung\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Dayeuhkolot</a>, sebelah selatan Bandung, di mana terdapat<span>&nbsp;</span><a href=\"https://id.wikipedia.org/w/index.php?title=Gudang_amunisi&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Gudang amunisi (halaman belum tersedia)\" style=\"text-decoration: none; color: rgb(165, 88, 88); background: none;\">gudang amunisi</a><span>&nbsp;</span>besar milik Tentara Sekutu. Dalam pertempuran ini<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Muhammad_Toha\" title=\"Muhammad Toha\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Muhammad Toha</a><span>&nbsp;</span>dan<span>&nbsp;</span><a href=\"https://id.wikipedia.org/w/index.php?title=Ramdan&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Ramdan (halaman belum tersedia)\" style=\"text-decoration: none; color: rgb(165, 88, 88); background: none;\">Ramdan</a>, dua anggota milisi BRI (Barisan Rakjat Indonesia) terjun dalam misi untuk menghancurkan gudang amunisi tersebut. Muhammad Toha berhasil meledakkan gudang tersebut dengan<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Dinamit\" title=\"Dinamit\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">dinamit</a>. Gudang besar itu meledak dan terbakar bersama kedua milisi tersebut di dalamnya. Staf pemerintahan kota Bandung pada mulanya akan tetap tinggal di dalam kota, tetapi demi keselamatan mereka, maka pada pukul 21.00 itu juga ikut dalam rombongan yang mengevakuasi dari Bandung. Sejak saat itu, kurang lebih pukul 24.00 Bandung Selatan telah kosong dari penduduk dan TRI. Tetapi api masih membubung membakar kota, sehingga Bandung pun menjadi lautan api.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Pembumihangusan Bandung tersebut dianggap merupakan strategi yang tepat dalam<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Perang_Kemerdekaan_Indonesia\" class=\"mw-redirect\" title=\"Perang Kemerdekaan Indonesia\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Perang Kemerdekaan Indonesia</a><span>&nbsp;</span>karena kekuatan TRI dan milisi rakyat tidak sebanding dengan kekuatan pihak Sekutu dan NICA yang berjumlah besar. Setelah peristiwa tersebut, TRI bersama milisi rakyat melakukan perlawanan secara gerilya dari luar Bandung. Peristiwa ini mengilhami lagu<span>&nbsp;</span><i><a href=\"https://id.wikipedia.org/wiki/Halo,_Halo_Bandung\" title=\"Halo, Halo Bandung\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Halo, Halo Bandung</a></i><span>&nbsp;</span>yang nama penciptanya masih menjadi bahan<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Kontroversi_pencipta_lagu_Halo,_Halo_Bandung\" class=\"mw-redirect\" title=\"Kontroversi pencipta lagu Halo, Halo Bandung\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">perdebatan</a>.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Beberapa tahun kemudian, lagu \"<i>Halo, Halo Bandung</i>\" secara resmi ditulis, menjadi kenangan akan emosi yang para pejuang kemerdekaan Republik Indonesia alami saat itu, menunggu untuk kembali ke kota tercinta mereka yang telah menjadi lautan api.</p><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><b><br></b></span></p><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><b>Asal Istilah</b></span></p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Istilah<span>&nbsp;</span><i>Bandung Lautan Api</i><span>&nbsp;</span>menjadi istilah yang terkenal setelah peristiwa pembumihangusan tersebut. Jenderal<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/A.H_Nasution\" class=\"mw-redirect mw-disambig\" title=\"A.H Nasution\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">A.H Nasution</a><span>&nbsp;</span>adalah Jenderal TRI yang dalam pertemuan di<span>&nbsp;</span><i>Regentsweg</i><span>&nbsp;</span>(sekarang Jalan<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Dewi_Sartika\" title=\"Dewi Sartika\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Dewi Sartika</a>), setelah kembali dari pertemuannya dengan<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Sutan_Sjahrir\" class=\"mw-redirect\" title=\"Sutan Sjahrir\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Sutan Sjahrir</a><span>&nbsp;</span>di<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Jakarta\" class=\"mw-redirect\" title=\"Jakarta\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Jakarta</a>, memutuskan strategi yang akan dilakukan terhadap Kota Bandung setelah menerima ultimatum Inggris tersebut.</p><blockquote class=\"templatequote\" style=\"overflow: hidden; margin: 1em 0px; padding: 0px 40px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><p style=\"margin: 0.5em 0px;\">\"Jadi saya kembali dari Jakarta, setelah bicara dengan Sjahrir itu. Memang dalam pembicaraan itu di Regentsweg, di pertemuan itu, berbicaralah semua orang. Nah, disitu timbul pendapat dari Rukana, Komandan Polisi Militer di Bandung. Dia berpendapat, “Mari kita bikin Bandung Selatan menjadi lautan api.” Yang dia sebut lautan api, tetapi sebenarnya lautan air.\"-A.H Nasution,<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/1_Mei\" title=\"1 Mei\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1 Mei</a><span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/1997\" title=\"1997\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1997</a></p></blockquote><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Istilah<span>&nbsp;</span><i>Bandung Lautan Api</i><span>&nbsp;</span>muncul pula di harian<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Suara_Merdeka\" title=\"Suara Merdeka\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Suara Merdeka</a><span>&nbsp;</span>tanggal<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/26_Maret\" title=\"26 Maret\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">26 Maret</a><span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/1946\" title=\"1946\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">1946</a>. Seorang<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Wartawan\" title=\"Wartawan\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">wartawan</a><span>&nbsp;</span>muda saat itu, yaitu<span>&nbsp;</span><a href=\"https://id.wikipedia.org/w/index.php?title=Atje_Bastaman&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Atje Bastaman (halaman belum tersedia)\" style=\"text-decoration: none; color: rgb(165, 88, 88); background: none;\">Atje Bastaman</a>, menyaksikan pemandangan pembakaran Bandung dari bukit<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Gunungleutik,_Ciparay,_Bandung\" title=\"Gunungleutik, Ciparay, Bandung\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Gunung Leutik</a><span>&nbsp;</span>di sekitar<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Pameungpeuk,_Garut\" title=\"Pameungpeuk, Garut\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Pameungpeuk</a>,<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Garut\" class=\"mw-redirect\" title=\"Garut\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Garut</a>. Dari puncak itu Atje Bastaman melihat Bandung yang memerah dari<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Cicadas,_Cibeunying_Kidul,_Bandung\" title=\"Cicadas, Cibeunying Kidul, Bandung\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Cicadas</a><span>&nbsp;</span>sampai dengan<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Cimindi,_Cigugur,_Pangandaran\" title=\"Cimindi, Cigugur, Pangandaran\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Cimindi</a>.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Setelah tiba di<span>&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Tasikmalaya\" class=\"mw-redirect\" title=\"Tasikmalaya\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">Tasikmalaya</a>, Atje Bastaman dengan bersemangat segera menulis berita dan memberi judul \"<i>Bandoeng Djadi Laoetan Api</i>\". Namun karena kurangnya ruang untuk tulisan judulnya, maka judul berita diperpendek menjadi \"<i>Bandoeng Laoetan Api</i>\".</p><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"></span></p>', 'Peristiwa Bandung Lautan Api', 'Minggu', '2020-07-19', '04:27:27', 'b7cb38baeed82f309ca018a429698db1.jpg', 3, 'sejarah,museum', 'Y', '2020-09-05 03:07:38'),
(313, 64, 'admin', 'Monumen Perjuangan Rakyat Jabar, Sajikan Potret Perjuangan Mempertahankan Kemerdekaan', '', 'monumen-perjuangan-rakyat-jabar-sajikan-potret-perjuangan-mempertahankan-kemerdekaan', 'Y', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">Monumen Perjuangan atau lebih di kenal sebagai Monju merupakan salah satu tempat wisata bersejarah yang memang sudah menjadi ikon penting kota Bandung. Bagaimana tidak? Monumen Perjuangan Rakyat Jawa Barat menjadi bukti sejarah bagaimana perjuangan rakyat Jawa Barat mempertahankan kemerdekaan dari tahun 1945-1949.</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">Ketua Historia van Bandung, E. Ganda Permana menyampaikan, Monju juga merekam beberapa pertempuran penting yang terjadi pada masa itu melalui koleksi diorama yang dipajang di museum. Monju sendiri mulai resmi dibuka dan digunakan pada 23 Agustus 1995, dan diresmikan oleh Gubernur Jawa Barat, Raden Nana Nuriana.</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">Ganda mengatakan, Monju sendiri memiliki model bangunan yang menyerupai bambu runcing yang mana model dari bangunan ini dipadukan dengan gaya arsitektur yang modern.&nbsp;&nbsp;</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">Monumen perjuangan Jabar mengisahkan tentang merebut, mempertahankan, dan melanjutkan kemerdekaan Indonesia di provinsi Jabar. Filosofi taas monumen berbentuk bambu runcing. Filosofinya dengan bambu runcing rakyat bahkan bisa merebut, mempertahankan, dan melanjutkan perjuangan, ungkap Ganda saat ditemui di monju, Selasa (13/8/2019).</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">Sementara itu, Ganda juga menyampaikann Monju kini hanya memiliki tujuh koleksi saja di dalam museumnya. Tentu hal itu tidak sebanding dengan luasnya ruangan yang di gunakan tersebut. Alhasil, lanjut Ganda, berbagai koleksi replika dari sejarah perjuangan masih diinventarisir.</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">Di bawah monumen perjuangan ada museum, disana ada tujuh diorama jadi sebelum kemerdekaan masa-masa kerajaan, masa terbentuk nasionalisme, kemerdekaan, mempertahankan kemerdekaan dari serangan Belanda, dan melanjutkan kemerdekaan. Dan untuk koleksi lainnya sedang menginventalisir karena ada yang rusak dan sebagainya, lanjut Ganda.</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">Sementara itu tujuh diorama dari potret sejarah tersebut yakni Diorama Perjuangan Sultan Agung Tirtayasa Bersama Rakyat Menentang Kolonial Belanda Tahun 1658, Diorama Partisipasi Rakyat Dalam Pembangunan Jalan di Sumedang, Diorama Perundingan Linggarjati 1946, Diorama Bandung Lautan Api 24 Maret 1946, Diorama Long Mach Siliwangi Januari 1949, Diorama Konfrensi Asia Afrika di Bandung 1955, dan Diorama Operasi Pagar Betis (Operasi Brata Yuda) 1962.</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">Sementara itu, Komunitas Historia van Bandung (HvB), sebuah perkumpulan yang peduli terhadap sejarah bangsa dan memiliki visi untuk menjadikan Bandung sebagai kota wisata perjuangan. HvB pun selalu mengemas penyampaian edukasi dan informasi seputar peristiwa-peristiwa perjuangan bangsa melalui program yang dikemas dengan cara yang unik dan menarik. </p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><br></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">sumber: </p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><a href=\"https://ayobandung.com/read/2019/08/13/60536/monumen-perjuangan-rakyat-jabar-sajikan-potret-perjuangan-mempertahankan-kemerdekaan\">https://ayobandung.com/read/2019/08/13/60536/monumen-perjuangan-rakyat-jabar-sajikan-potret-perjuangan-mempertahankan-kemerdekaan</a></p>', '', 'Minggu', '2020-07-19', '04:30:45', '8adc7f9327f42cbe1d1ed8e144d5bccc.jpg', 24, 'sejarah,museum', 'Y', '2020-09-05 03:07:28');
INSERT INTO `tb_blog_artikel` (`id_artikel`, `id_kategori`, `username`, `judul`, `sub_judul`, `judul_seo`, `aktif`, `isi_artikel`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`, `waktu_input`) VALUES
(314, 64, 'admin', 'Monumen Perjuangan Rakyat Jawa Barat dan Upaya Peningkatannya', 'Museum Monumen Perjuangan Rakyat Jawa Barat', 'monumen-perjuangan-rakyat-jawa-barat-dan-upaya-peningkatannya', 'Y', '<div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><b>Pendahuluan</b></div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">Tujuan dibangunnya Monumen Perjuangan Rakyat Jawa Barat adalah sebagai Museum Sejarah Perjuangan Rakyat Jawa Barat. Monumen Perjuangan Rakyat Jawa Barat dikenal oleh masyarakat dengan istilah “Monju” (Monumen Perjuangan). Monju memiliki koleksi yang peristiwa-peristiwa kesejarahan di wilayah Jawa Barat yang ditata di ruangan pameran tetap. Koleksi berupa diorama-diorama dan relief-relief kesejarahan Jawa Barat. Akan tetapi koleksi tersebut sangat kurang memadai dan hingga sekarang koleksinya belum bertambah.. &nbsp;Monju belum mengelola koleksi, merawat, dan memublikasikan koleksi secara optimal.&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Peraturan Pemerintah No. 19 Tahun 1995 menyatakan museum mempunyai tugas pokok menyimpan, merawat, dan memanfaatkan benda-benda bukti hasil budaya manusia serta alam dan lingkungannya guna menunjang upaya perlindungan dan pelestarian kekayaan budaya bangsa. ICOM (International Council of Museums) &nbsp;telah merumuskan definisi &nbsp;museum yaitu lembaga yang bersifat tetap, tidak mencari keuntungan, melayani masyarakat dan perkembangannya, terbuka untuk umum, yang memperoleh, merawat, mengkomunikasikan dan memamerkan, untuk tujuan-tujuan studi, pendidikan dan kesenangan, barang-barang pembuktian manusia dan lingkungannya. Oleh karena itu bagaimana agar Monju dapat melaksanakan tugas dan fungsi sebagai museum? Upaya-upaya apa yang harus dilakukan Monju?. Berdasarkan hal tersebut maka kami akan mencoba mencari solusi bagi permasalahan tersebut dan diharapkan dapat menjadi bahan masukan bagi pengelola Monju.&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><b>Pembahasan </b></div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><b><br></b></div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Monumen Perjuangan Rakyat Jawa Barat terletak di Jalan Dipati Ukur No. 48, Kota Bandung. Lokasinya berhadapan dengan Gedung Sate dan di depan Kampus Universitas Padjadjaran (Unpad), Kota Bandung. Monumen berdiri di atas tanah seluas ± 72.040 m² dan luas bangunan ± 2.143 m². serta model bangunannya, berbentuk bambu runcing yang dipadukan dengan gaya arsitektur modern. Monumen diresmikan penggunaanya oleh Gubernur Jawa Barat, R. Nuriana pada tanggal 23 Agustus 1995.&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Monju memiliki koleksi hanya berupa 7 buah diorama pada ruang pameran tetap, dan tidak sebanding dengan luas ruangan pameran tetap, sehingga banyak area pameran tetap yang masih kosong belum terisi koleksi. Ada pun koleksi diorama pada ruang pameran tetap tersebut adalah:&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">1.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Diorama Perjuangan Sultan Agung Tirtayasa Bersama Rakyat Menentang Kolonial Belanda Tahun 1658</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">2.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Diorama Partisipasi Rakyat Dalam Pembangunan Jalan di Sumedang</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">3.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Diorama Perundingan Linggarjati 1946</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">4.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Diorama Bandung Lautan Api 24 Maret 1946</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">5.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Diorama Long Mach Siliwangi Januari 1949</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">6.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Diorama Konfrensi Asia Afrika di Bandung 1955</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">7.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Diorama Operasi Pagar Betis (Operasi Brata Yuda) 1962.&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><br></div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Di samping itu terdapat relief pada bagian dinding depan Monju. Relief ini menceritakan sejarah perjuangan rakyat &nbsp;Jawa Barat &nbsp;mulai dari masa kerajaan, masa pergerakan, masa kemerdekaan, dan masa mempertahankan kemerdekaan dalam melawan penjajahan baik Belanda, Inggris dan Jepang.&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Selain itu Monju dilengkapi pula oleh ruang audiovisual, dan ruang perpustakaan yang akan digunakan sebagai sarana dalam memberikan informasi sejarah perjuangan rakyat Jawa Barat bagi pengunjung. Akan tetapi untuk bahan informasi melalui audiovisual masih belum memadai. Monju juga mempunyai halaman yang luas, mushola, dan toilet yang nyaman untuk memberikan pelayanan bagi pengunjung.&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Monumen adalah bangunan dan tempat yang mempunyai nilai sejarah yang penting karena itu dipelihara dan dilindungi oleh Negara. Dengan demikian Monumen Perjuangan Rakyat Jawa Barat adalah bangunan dan tempat yang mempunyai nilai sejarah perjuangan bangsa khususnya dalam merebut, menegakkan, membela, dan mempertahankan, serta mengisi kemerdekaan Republik Indonesia. Hal tersebut menimbulkan pertanyaan, apakah peristiwa bersejarah yang telah terjadi di lokasi monumen ini?. Apakah peristiwa sejarah tentang perjuangan para pemuda dalam mempertahankan Gedung Sate terhadap tentara NICA? &nbsp;Menginggat lokasi Monju dan Gedung Sate berdekatan, mungkin dapat menjadi salah satu alternatif bahwa lokasi Monju mempunyai peristiwa sejarah perjuangan yang memiliki nilai-nilai kepahlawanan.&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Dari nama “Monumen Perjuangan Rakyat Jawa Barat”, jelas bahwa museum ini juga merupakan tempat penting yang bertujuan dapat mengungkapkan dan menjelaskan berbagai hal menyangkut sejarah perjuangan kemerdekaan, baik dalam perjuangan menegakkan, membela, dan mempertahankan proklamasi kemerdekaan RI, maupun dalam perjuangan menentang kehadiran dan usaha Belanda yang hendak memulihkan kembali kedudukan kekuasaan pemerintah kolonial Belanda di wilayah Jawa Barat. Selain itu juga bertujuan untuk mengungkapkan dan menjelaskan peran para pejuang dan peristiwa-peristiwa sejarah perjuangan bangsa di wilayah ini.</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><br></div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Monju diharapkan dapat bermanfaat bagi rakyat pada umumnya yaitu:</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">1.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Menanamkan semangat persatuan dan kesatuan dalam kehidupan berbangsa dan bernegara</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">2.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Membangkitkan semangat nasionalisme dan kebanggaan nasional</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">3.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Melestarikan jiwa dan semangat kepahlawanan dalam kehidupan berbangsa dan bernegara</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">4.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Menanamkan keteladanan bagi generasi penerus dalam kesinambungan perjuangan bangsa mengisi kemerdekaan</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">5.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Menyajikan informasi kesejarahan di kalangan masyarakat pada umumnya.&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><br></div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Monju memiliki peran yang cukup signifikan sebagaimana tersebut di atas, oleh karena itu perlu diupayakan peningkatannya sebagai berikut:</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">1.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Membuat Visi dan Misi Monju sesuai dengan Visi dan Misi Propinsi Jawa Barat, kesejarahan Jawa Barat dan definisi Museum. Melalui visi dan misi dapat dirumuskan apa yang diharapkan dan yang akan dilakukan oleh Monju. &nbsp;Oleh karena itu perlu kerjasama dari berbagai kalangan pemerintahan, akademisi, dan masyarakat/LSM sehingga dirumuskan visi dan misi Monju. Visi dan Misi ini akan menjadi acuan pengelolaan Monju.&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">2.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Monju harus menambah koleksi melalui pembelian dalam bentuk benda realia atau pembuatan replika, pembuatan diorama, dan pencetakan dokumentasi foto kesejarahan. Oleh karena itu perlu diprogramkan kegiatan pembelian atau pembuatan replika koleksi yang dimiliki masyarakat. Selain juga masyarakat dapat menitipkan koleksinya di Monju agar koleksi itu terpelihara namun tetap disebutkan nama penyumbang koleksi benda cagar budaya tersebut. Menambah jumlah diorama dan mencetak foto kesejarahan sebagai bahan materi pada ruang pameran tetap Monju.</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">3.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Koleksi pada ruang pameran tetap Monju, apabila bertambah jumlahnya perlu di tata ulang dengan mempertimbangan estetika, sarana dan prasarana pameran, pencahayaan, sirkulasi udara dan arus pengunjung. Sekarang ini sirkulasi udara pada ruangan-ruangan dalam monju kurang memadai sehingga udara dalam ruangan panas dan baunya apek (kurang enak). Menata koleksi pada ruangan<span>&nbsp;</span><a href=\"http://www.smokesolution.com/products/smoking-area/\" title=\"Smoking\r\nArea\" style=\"color: rgb(0, 0, 0); text-decoration: none; border-style: none;\">smoking area</a><span>&nbsp;</span>pameran tetap perlu bekerjasama dengan kurator museum, sejarawan, disain interior atau arsitektur, sehingga penataan koleksi, estetika, sirkulasi udara, dan sinar/cahaya akan dapat mencegah kerusakan koleksi dan memberikan kenyamanan bagi pengunjung.</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">4.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Membuat atau pengadaan bahan dokumentasi visual. Membuat dokumentasi merupakan kegiatan mendokumentasikan kegiatan Monju dalam hal pengadaan koleksi, konservasi, penataan pameran, dan publikasi koleksi melalui rekaman film. Sedang pengadaan adalah pembelian dokumentasi film tentang museum lainnya dan pengelolaannya. Kedua dokumentasi visual ini dapat digunakan untuk bahan publikasi kepada masyarakat dan dapat ditayangkan di Ruang Audivisual.</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">5.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Sosialisasi Monju mengenai koleksi museum dan pengelolaanya dapat dilakukan melalui undangan ke sekolah-sekolah di Kota/Kab. Jawa Barat untuk berkunjung ke pameran tetap monju, sosialisasi ke sekolah-sekolah, penyelenggaraan pameran temporer, berbagai lomba tingkat pelajar, ceramah, seminar, lokakarya, penerbitan leaflet, dan lainnya. Bahkan mengalang kerjasama lintas sektoral dengan berbagai instansi pemerintah, swasta maupun asing dalam berbagai kegiatan.</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\">6.<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Meningkatkan SDM Museum melalui keikutsertaan pada diklat-diklat, pendidikan formal, seminar, dan lokakarya tentang permuseuman.&nbsp;</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Monju sejak April 2010 dikelola oleh Balai Pengelolaan Kepurbakalaan, Sejarah dan Nilai &nbsp;Tradisional (BPKSNT), Dinas Kebudayaan dan Pariwisata Propinsi Jawa Barat. Dengan demikian mengelola, mengembangkan dan memanfaatkan Monju agar dapat berguna bagi masyarakat Jawa Barat merupakan salah satu tugas BPKSNT selain pengelolaan kepurbakalaan, sejarah dan nilai tradisional Jawa Barat. Dengan demikian Monju sebagai tempat perlindungan, pelestarian dan penginformasiaan koleksi museum kepada masyarakat agar masyarakat lebih mengenal sejarah bangsanya dan diharapkan tumbuh rasa nasionalisme bangsa Indonesia.</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><br></div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>Pepatah mengatakan bahwa ‘tak kenal maka tak sayang, tak sayang maka tak cinta’, pepatah ini sangat mengena sekali dengan kesadaran masyarakat yang kurang perhatian dengan keberadaan museum. &nbsp;Semoga upaya peningkatan Monju dapat menjadikan masyarakat menjadi lebih mengenal dan mencintai sejarah dan memperkokoh rasa kebangsaan, serta meningkatnya apresiasi masyarakat dengan berkunjung ke museum-museum. (Heni Fajria Rif’ati, Pegawai BPKSNT, Disparbud Jabar)</div><div style=\"color: rgb(22, 15, 7); font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" align=\"justify\"><br></div>', 'Gambar monumen Perjuangan', 'Rabu', '2020-07-22', '03:05:51', '6c480c795c5e60ee766a57cc6c9e84f1.jpg', 13, 'sejarah,museum,internet', 'Y', '2020-09-11 02:55:43'),
(315, 64, 'admin', 'Cerita di Kongres Nasional Pertama Central Sarikat Islam 1916 di Bandung', '', 'cerita-di-kongres-nasional-pertama-central-sarikat-islam-1916-di-bandung', 'Y', 'Selama sepekan, tanggal 17 sampai 24 Juni 1916, di alun-alun Bandung seperti ada pasar malam. Bukan pasar malam sebenarnya yang sedang berlangsung, melainkan Kongres Sarikat Islam.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Panitia Kongres bertekad membuat waktu itu juga menjadi pekan untuk berpesta. Seluruh alun-alun dipajang, tarup pesta yang besar dibangun, dimana dibuka buffet untuk jualan makanan dan minuman yang dapat mengelus-ngelus lidah. Gubuk-gubuk dibangun berderet dalam garis yang rapih, dimana dipamerkan dan dijual macam-macam barang kerajinan rakyat. Hasil bersih dari usaha itu akan didarmakan kepada Sekolah Agama Islam yang belum berselang lama didirikan.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Para pengunjung yang akan datang, diduga terdiri dari segala lapisan masyarakat, tidak kurang-kurang dari lapisan atas. Karena itu penerimaan tamu jangan kurang menunjukan penghargaan kepada pengunjung-pengunjung itu. Para ibu guru dari Sekolah Keutamaan Putri dikerahkan untuk melayani tamu-tamu yang datang di buffet untuk menikmati makanan dan minuman yang dihidangkan. Dengan pakaian yang rapih dan tindak-tanduk yang sopan serta hormat, para ibu guru itu memperlihatkan kecantikan lahir dan batin, yang wanita-wanita Parahiangan pandai benar melaksanakannya. Pekan itu sekaligus bukti, bahwa wanita Indonesia, tidak ketinggalan dari saudaranya kaum pria dalam perjuangan mencapai kemajuan, yang pada waktu itu sedang meliputi kehidupan bangsa.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Tiap siang hari di alun-alun itu diadakan perlombaan olah raga, sedang tiap malam diadakan pertunjukan bioskop atau wayang. Penerangan alun-alun itu diatur sangat sempurna, sehingga hampir tidak ada bedanya waktu siang dan malam. Malah malam lebih menarik dengan lampion-lampion yang warna-warni, dan pajangan-pajangan yang baru menarik di waktu malam.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Pada hari Minggu siang tanggal 18 Juni diadakan pawai besar yang berjalan teratur melalui jalan-jalan raya Bandung. Semula pawai itu juga akan membawa Bendera Turki. Tapi maksud ini tidak dilaksanakan, berdasar larangan dari Assisten Residen.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Kongres Sarikat Islam yang berlangsung pada pekan itu lengkapnya dinamakan Kongres Nasional Pertama Central Sarikat Islam. Nama yang agak panjang ini tidak berlebihan dan tiap perkataan ada artinya. Sudah lebih dulu Sarikat Islam mengadakan Kongres, yang pertama di Surabaya, di tahun 1914. Tapi kongres itu adalah Kongres Lokal Sarikat Islam.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Sarikat Islam, yang didirikan pertama di Surakarta dalam tahun 1905, sangat menarik perhatian umum, sehingga dilain-lain tempat orang juga ingin mendirikan perkumpulan-perkumpulan dengan maksud dan tujuan yang sama. Izin baru diberikan oleh Pemerintah Kolonial pada tahun 1912, atau lebih tepat baru disahkan sebagai badan hukum (rechtspersoon) dalam tahun 1912. Dan badan hukum itu disahkan hanya untuk Sarikat Islam setempat demi setempat atau secara lokal. Kemudian baru tahun 1914 disahkan Central Sarikat Islam sebagai badan hukum yang meliputi seluruh tanah air.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Karena itu, waktu diadakan kongres di tahun 1916, maka kongres ini sudah meliputi Sarikat Islam di seluruh Hindia Belanda, dan tepatlah dinamakan Kongres Nasional Pertama. Nasional berarti dalam hubungan seluruh bangsa, tidak lagi setempat atau lokal. Di kemudian hari ada pergerakan lain yang kalau mengadakan kongres, kongres itu dinamakan dengan kata-kata seperti kongres Sarikat Islam. Kongres Nasional Pertama Partai Komunis. Untuk partai ini perkataan nasional dipakai untuk membedakan dari kongres internasional. Partai Komunis adalah partai yang sifatnya internasional, yang periodik mengadakan kongresnya. Kongres nasional bagi partai itu berarti terbatas di dalam satu bangsa saja.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Kongres Nasional Pertama Central Sarikat Islam ini dihadiri oleh 80 utusan dari Lokal Sarikat Islam dari Jawa, Sumatera, Kalimantan, Bali dan Sulawesi. Suatu jumlah yang pada waktu itu sudah merupakan jumlah yang tidak kecil.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Kongres tersebut terdiri dari 3 macam rapat</p><ol style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em 1.5em; padding: 0px; list-style: decimal; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><li style=\"box-sizing: border-box; border: 0px; font-family: inherit; font-size: 18px; font-style: normal; font-weight: normal; line-height: 30.6px; margin: 0.5em 0px 0px; padding: 0px;\">Rapat pendahuluan pada hari Sabtu, tanggal 17 Juni 1916 dan rapat-rapat tertutup. Rapat-rapat ini hanya dihadiri oleh anggota dari Pimpinan Pusat, atau dengan nama yang dipakai waktu itu “Centraal Bestuur”</li><li style=\"box-sizing: border-box; border: 0px; font-family: inherit; font-size: 18px; font-style: normal; font-weight: normal; line-height: 30.6px; margin: 0.5em 0px 0px; padding: 0px;\">Dua rapat terbuka di alun-alun, pada hari Minggu, tanggal 18 Juni dan Senin,19 Juni 1916, dimana tiap-tiap orang dapat datang dan mendengarkan pidato-pidato yang diadakan.</li><li style=\"box-sizing: border-box; border: 0px; font-family: inherit; font-size: 18px; font-style: normal; font-weight: normal; line-height: 30.6px; margin: 0.5em 0px 0px; padding: 0px;\">Enam rapat di salah satu bangsal dari<span>&nbsp;</span><em style=\"box-sizing: border-box; border: 0px; font-family: inherit; font-size: 18px; font-style: italic; font-weight: normal; line-height: 1; margin: 0px; padding: 0px;\">Societiet Concordia</em>, yang hanya dapat dihadiri oleh para utusan dan anggota-anggota Sarikat Islam Lokal, serta undangan dan utusan dari pergerakan sahabat dan pers.</li></ol><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Yang paling penting dalam kongres itu, bagi sejarah perkembangan politik di Indonesia, ialah pidato Ketuanya Tjokroaminoto yang diucapkan pada rapat umum di alun-alun pada hari Minggu tanggal 18 Juni 1916.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Pada hari Minggu pagi rakyat sudah mulai datang berduyun-duyun di alun-alun Bandung. Di salah satu pojok dari alun-alun itu didirikan podium dimana Panitia Kongres dan Pengurus Centra Sarikat Islam mengambil tempat.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Pada saat yang ditentukan, maka datanglah anggota-anggota Pengurus Central Sarikat Islam, dengan berpakaian rok, yaitu celana hitam, jas buka hitam, bagian belakang panjang sampai di lutut, dengan dasi putih. Meskipun iklim Bandung agak dingin, tapi pakaian rok pasti masih sangat panas. Tapi begitulah rupa-rupanya protokol di waktu itu masih dijunjung tinggi.</p><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Beberapa bagian dari pidato Tjokroaminoto, yang seluruhnya makan waktu dua jam, yang dikutip disini :</p><blockquote style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 40px 0px; padding: 0px; overflow-wrap: break-word; position: relative; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><p style=\"box-sizing: border-box; border: 0px; font-family: inherit; font-size: 1.2em; font-style: normal; font-weight: 300; line-height: 34.56px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; text-align: justify;\">“<em style=\"box-sizing: border-box; border: 0px; font-family: inherit; font-size: 21.6px; font-style: italic; font-weight: normal; line-height: 1; margin: 0px; padding: 0px;\">Semakin lama, semakin tambah kesadaran orang, baikpun di Nederland maupun di Hindia, bahwa “Pemerintahan sendiri” adalah perlu. Lebih lama lebih dirasakan, bahwa tidak patut lagi Hindia diperintah oleh Nederland, seperti tuan tanah mengurus persil-persilnya. Tidak patut lagi untuk memandang Hindia sebagai sapi perasan, yang hanya mendapat makan karena susunya; tidak pantas lagi untuk memandang negeri ini sebagai tempay untuk didatangi dengan maksud mencari untung, dan sekarang juga sudah tidak patut lagi, bahwa penduduknya, terutama putera-buminya, tidak punya hak untuk ikut bicara dalam urusan pemerintahan, yang mengatur nasibnya</em>”</p><p style=\"box-sizing: border-box; border: 0px; font-family: inherit; font-size: 1.2em; font-style: normal; font-weight: 300; line-height: 34.56px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; text-align: justify;\">“<em style=\"box-sizing: border-box; border: 0px; font-family: inherit; font-size: 21.6px; font-style: italic; font-weight: normal; line-height: 1; margin: 0px; padding: 0px;\">Kita menyadari dan mengerti benar, bahwa mengadakan pemerintahan sendiri, adalah satu hal yang sangat sulit, dan bagi kita hal itu laksana suatu mimpi. Akan tetapi bukan impian dalam waktu tidur, tapi harapan yang tertentu, yang dapat dilaksanakan JIKA KITA BERUSAHA DENGAN SEGALA KEKUATAN YANG ADA PADA KITA, dan dengan memakai segala daya upaya melalui jalan yang benar dan menurut hukum</em>”.</p><p style=\"box-sizing: border-box; border: 0px; font-family: inherit; font-size: 1.2em; font-style: normal; font-weight: 300; line-height: 34.56px; margin: 0px; padding: 0px; overflow-wrap: break-word; text-align: justify;\">“<em style=\"box-sizing: border-box; border: 0px; font-family: inherit; font-size: 21.6px; font-style: italic; font-weight: normal; line-height: 1; margin: 0px; padding: 0px;\">Di bawah Pemerintahan yang tiranik dan dholim, hak-hak dan kebebasan itu dicapai dengan REVOLUSI, sedang dari suatu pemerintahan yang bijaksana dengan EVOLUSI</em>”.</p></blockquote><p style=\"box-sizing: border-box; border: 0px; font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-weight: 400; line-height: 32.4px; margin: 0px 0px 1.1em; padding: 0px; overflow-wrap: break-word; color: rgb(68, 68, 68); font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\">Begitulah cerita di sekitar Kongres Nasional Pertama Centra Sarikat Islam 1916 di Bandung.', '', 'Minggu', '2020-07-19', '04:20:31', '81de6ebada2aff8bf3a6a944f0998426.jpg', 17, 'sejarah,museum', 'Y', '2020-09-01 02:20:25');
INSERT INTO `tb_blog_artikel` (`id_artikel`, `id_kategori`, `username`, `judul`, `sub_judul`, `judul_seo`, `aktif`, `isi_artikel`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`, `waktu_input`) VALUES
(317, 62, 'admin', 'Peringatan Bandung Lautan Api ke- 72 Digelar', 'Dilaksanakan Bulan Maret', 'peringatan-bandung-lautan-api-ke-72-digelar', 'Y', '<p>REPUBLIKA.CO.ID,  BANDUNG --Pemerintah Kota (Pemkot) Bandung memperingati peristiwa<a href=\"https://republika.co.id/tag/bandung-lautan-api\"> Bandung Lautan Api </a>ke-72 tahun 2018. Berbagai rangkaian acara digelar untuk mengenang peristiwa bersejarah yang terjadi pada 24 Maret 1946 itu.<br><br>Rangkaian acara dimulai dengan ziarah ke Taman Makam Pahlawan (TMP) Cikutra yang dilakukan para pejabat Pemkot<a href=\"https://republika.co.id/tag/bandung\"> Bandung </a>bersama\r\n sejumlah organisasi seperti Legiun Veteran Republik Indonesia (LVRI), \r\ntokoh masyarakat, unsur TNI melakukan ziarah ke Taman Makam Pahlawan \r\n(TMP) di Cikutra, Jumat (23/3) pagi. Pada agenda tersebut, LVRI Kota \r\nBandung akan menjadi tamu kehormatan. Selain itu juga diundang, Dewan \r\nHarian Cabang (DHC) 45, Komite Nasional Pemuda Indonesia (KNPI), Karang \r\nTaruna, pelajar, Pramuka.<br><br>Ketua DPC LVRI Kota Bandung, Patmo \r\nmengatakan, melalui acara ziarah ini merupakan momentun untuk \r\nmengingatkan warga Bandung agar tidak melupakan sejarah. BLA menjadi \r\nbagian sejarah penting atas kemerdakaan Indonesia.<br><br>\"Ini sejarah \r\ntanggal 24 Maret 1946 ini harus tetap ingat sampai kapan pun karena ini \r\nperjuangan bangsa kita untuk memerdekakan kita melawan penjajah yang \r\nakan menempati Bandung,\" kata Patmo di TMP Cikutra.<br><br>Patmo \r\nmenuturkan, pengorbanan para pejuang yang saat itu menghanguskan \r\nrumahnya sendiri agar tidak diduduki oleh para penjajah merupakan \r\nsemangat yang harus diteladani oleh generasi saat ini. Ia berharap \r\ngenerasi saat ini dapat melanjutkan perjuangan para pejuang terdahulu \r\ndengan mengisi kemerdekaan dengan memajukan bangsa.<br><br>Kepala Bidang\r\n Pemasaran Dinas Kebudayaan dan Pariwisata (Disbudpar) Kota Bandung, \r\nAswin Sulaeman menuturkan, Pemkot Bandung telah menyiapkan serangkaian \r\nacara untuk memperingati Bandung Lautan Api (BLA). Selain ziarah digelar\r\n pula pawai obor untuk memperingati pembumihangusan Bandung kala itu. \r\nApi yang diarak dari Tegalega ke Balai Kota Bandung menyimbolkan \r\nperjuangan dan api yang meluluhlantakkan Kota Bandung.<br><br>\"Dari \r\nTegalega sampai Balai Kota akan ada sekitar 5.000 orang yang akan \r\nberjalan pawai. Start-nya mulai pukul 19.00 WIB, finish di Plaza Balai \r\nKota,\" kata Aswin.<br><br>Rute-rute yang akan dilalui pada pawai obor \r\nantara lain Taman Tegalega, Jalan Moh. Toha, Jalan Dewi Sartika, Jalan \r\nDalem Kaum, Alun-alun Timur, Jalan Asia Afrika, Jalan ABC (banceuy), \r\nJalan Cikapundung, Jalan Braga, Jalan Viaduct, Jalan Perintis \r\nKemerdekaan, Jalan Wastukancana, dan berakhir di Plaza Balai Kota \r\nBandung.<br><br>\"Di Balai Kota nanti akan ada penyulutan api utama oleh Pj. Wali Kota Bandung,\" katanya.<br><br>Keesokan\r\n harinya, tepat pada 24 Maret, Pemkot Bandung akan menggelar Upacara \r\nPeringatan Bandung Lautan Api di Plaza Balai Kota Bandung. Upacara itu \r\njuga akan dihadiri oleh Forum Komunikasi Pimpinan Daerah (FKPD) Kota \r\nBandung.</p><p>Sumber: <br></p><p>https://republika.co.id/berita/nasional/daerah/18/03/23/p61sb1335-peringatan-bandung-lautan-api-ke-72-digelar<br></p>', 'Gambar parade-obor-di-monumen-bandung-lautan-api-di-teggalega', 'Selasa', '2020-09-01', '02:31:42', '047ff57df411d4052bb27c2b4d641814.jpg', 7, 'sejarah', 'Y', '2020-09-11 02:55:29'),
(318, 62, 'admin', 'Peringatan Hari Lahir Dewi Sartika, Pesan Ceu Popong : Jadilah Wanita yang Baik', 'Dilaksanakan Bulan Desember', 'peringatan-hari-lahir-dewi-sartika-pesan-ceu-popong--jadilah-wanita-yang-baik', 'Y', '<p><p><strong>Bandung</strong> - Tanggal 4 Desember diperingati sebagai hari \r\nlahirnya Pahlawan Nasional Raden Dewi Sartika. Berbagai elemen \r\nmasyarakat di Kota Bandung memperingatinya dengan menggelar berbagai \r\nkegiatan napak tilas tokoh pejuang wanita asal Sunda tersebut.<br><br>Peringatan\r\n tahun ini dilakukan mulai dari tabur bunga dan ziarah makam Raden Dewi \r\nSartika. Setelah melakukan napak tilas, berbagai elemen masyarakat yang \r\nberasal dari pelajar, pemuda, veteran perang, unsur Pemkot Bandung \r\nhingga keluarga besar berkumpul di sekolah yang didirikan oleh Raden \r\nDewi Sartika.<br><br>Kemudian kegiatan dilanjukan dengan saresehan dan \r\ndialog interaktif bersama tokoh wanita asal Jawa Barat Popong Otje \r\nDjundjunan. Dalam kesempatan itu, Ceu Popong merefleksikan kembali \r\ntentang sosok Raden Dewi Sartika yang dikenal sebagai pejuang \r\npendidikan.<br><br></p>\r\n\r\n<div class=\"parallax_detail parallaxB\" style=\"margin:0px auto 20px auto;position: relative;\">\r\n<div class=\"parallax_abs\" style=\"width:430px;\">\r\n<div class=\"parallax_fix\" style=\"width:430px;\">\r\n<div class=\"parallax_ads\" style=\"width:430px;\">\r\n\r\n\r\n</div>\r\n</div>\r\n</div>\r\n</div>Ceu Popong menceritakan Raden Dewi Sartika merupakan sosok yang \r\nulet, pekerja keras dan pantang menyerah. Pada zamannya, Raden Dewi \r\nSartika sangat konsen memperjuangkan hak pendidikan untuk wanita. \r\nMengingat pada massa itu wanita sulit untuk mengakses pendidikan.<br><br>\"Kita\r\n jangan melihat jaman sekarang, gak aneh (wanita sekolah). Bila dulu \r\nwanita sakolah sangat sulit. beliau datang ke setiap rumah menggedor \r\npintu rumah untuk minta anak perempuan sekolah, meskipun pada umumnya \r\nsaat itu menolak,\" kata Ceu Popong di SMP Dewi Sartika, Jalan Kautamaan \r\nIstri, Minggu (4/12/2016).<br><br>Meski sempat mendapat penolakan, kata \r\ndia, Raden Dewi Sartika tidak menyerah. Saat itu hanya ada beberapa \r\nwanita yang bersedia untuk ikut belajar bersamanya. Dengan memanfaatkan \r\ndapur rumahnya, Raden Dewi Sartika mulai menularkan ilmu kepada wanita \r\nlainnya.<br><br>Perjuangannya tidak sampai di situ. Raden Dewi Sartika \r\npun menjual barang-barang berharga miliknya untuk mulai merintis \r\nmembangun sebuah sekolah sederhana waktu itu. Seiring berjalannya waktu,\r\n hak wanita untuk mengakses pendidikan mulai terbuka lebar hingga saat \r\nini.<br><br>\"Makanya saya bilang beliau (Raden Dewi Sartika) adalah \r\nsalah satu perintis emansipasi wanita saat itu selain Ibu Kartini. Hanya\r\n saja Raden Dewi Sartika konsen di bidang pendidikan. Karyanya nyata \r\ndengan berdirinya sekolah ini (SMP Dewi Sartika),\" ujar dia.<br><br>\"Bukan\r\n berati kita harus seperti beliau (Raden Dewi Sartika), karena zamanya \r\nsudah beda. Ada satu bahasa setiap waktu ada orangnya, setiap orang ada \r\nwaktunya,\" menambahkan.<br><br>Menurutnya bagi wanita generasi penerus \r\nbangsa saa ini, banyak hal yang bisa dilakukan sesuai dengan kapasitas \r\ndan kemampuan masing-masing.<br><br>\"Kalau ingin mengikuti dan \r\nmenghargai Raden Dewi Sartika jadilah wanita yang baik. Kalau jadi \r\npresiden jadi yang baik, jadi wali kota jadilah yang baik, jadi pejabat \r\nyang baik,\" kata dia.        \r\n		\r\n        <strong>(ern/ern).</strong></p><p><strong><br></strong></p><p>sumber: </p><p>https://news.detik.com/berita-jawa-barat/d-3362270/peringatan-hari-lahir-dewi-sartika-pesan-ceu-popong--jadilah-wanita-yang-baik<br><strong></strong></p>', 'gambar peringatan hari lahir dewi sartika', 'Selasa', '2020-09-01', '02:38:39', 'c5327d055a8b9043eb98cc6d1495035a.jpg', 3, 'sejarah', 'Y', '2020-09-20 07:26:13'),
(319, 62, 'admin', 'Jawa Barat Expo 2016', 'Dilaksanakan Bulan Oktober', 'jawa-barat-expo-2016', 'Y', 'Hadir dan ramaikan kegiatan Jabar expo 2016<br>', 'jabar expo 2016', 'Selasa', '2020-09-01', '02:44:43', '3c2d8dc43a5a58e5eefc036f5a98bbc2.jpg', 4, 'sejarah,museum,internet', 'Y', '2020-09-05 19:49:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_blog_kategori`
--

CREATE TABLE `tb_blog_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `sidebar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_blog_kategori`
--

INSERT INTO `tb_blog_kategori` (`id_kategori`, `nama_kategori`, `username`, `kategori_seo`, `aktif`, `sidebar`) VALUES
(62, 'Event', 'admin', 'event', '', 2),
(64, 'Artikel', 'admin', 'artikel', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_blog_tag`
--

CREATE TABLE `tb_blog_tag` (
  `id_tag` int(5) NOT NULL,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_blog_tag`
--

INSERT INTO `tb_blog_tag` (`id_tag`, `nama_tag`, `username`, `tag_seo`, `count`) VALUES
(60, 'internet', 'admin', 'internet', 0),
(74, 'Museum', 'admin', 'museum', 0),
(75, 'Sejarah', 'admin', 'sejarah', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_faq`
--

CREATE TABLE `tb_faq` (
  `id_faq` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_faq`
--

INSERT INTO `tb_faq` (`id_faq`, `nama`, `email`, `pertanyaan`, `jawaban`) VALUES
(1, 'admin', 'admin@email.com', 'Museum Monumen Perjuangan Rakyat Jawa Barat tutup hari apa saja?', 'Museum Monumen Perjuangan Rakyat Jawa Barat buka setiap hari Senin - Jumat. Pukul : 09.00 - 15.00, kecuali tanggal merah.'),
(3, 'admin', 'admin@email.com', 'Apakah harus Reservasi untuk mengunjungi Museum Monumen Perjuangan Rakyat Jawa Barat ?', 'Iya. Reservasi dapat dilakukan melalui aplikasi Museum Monumen Perjuangan Rakyat Jawa Barat. Dengan reservasi bisa mempermudahkan untuk masuk ke Museum, jadi Sahabat Museum tidak perlu ribet mengeluarkan KTP dan tidak perlu mengantri.'),
(5, 'admin', 'admin@email.com', 'Bolehkah membawa makanan dan minuman ke dalam Museum Monumen Perjuangan Rakyat Jawa Barat?', 'Tidak boleh. Makanan dan Minuman bisa dititipkan dibagian Front Office'),
(9, 'Resepsionis', 'resepsionis@gmail.com', 'Bolehkah foto-foto di dalam gedung Museum Monumen Perjuangan Rakyat Jawa Barat ?', 'Boleh, tapi flash dimatikan.'),
(19, 'bd', 'admin@email.com', 'cea', 'null');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `nama`, `rating`, `deskripsi`, `gambar`) VALUES
(1, 'Hall/Lobby', '4.3', 'Dengan luas 600 m2 hall/lobby digunakan sebagai ruang tunggu pengunjung museum.', 'museum.jpg'),
(2, 'Ruang Diorama', '4.4', 'Menampilkan diorama peristiwa-peristiwa penting.', 'diorama peristiwa penting travelingyuk.jpg'),
(3, 'Ruang Patung dan Senjata Tentara', '4.4', 'Memamerkan patung-patung dan senjata-senjata tentara.', 'patung tentara detik.jpg'),
(4, 'Ruang Pamer Temporer', '4.5', 'Digunakan untuk pameran yang pada umumnya tematik sesuai dengan tengah dipamerkan.', 'Diorama beritabaik.jpg'),
(5, 'Lebih Mengenal Jawa Barat', '4.5', 'Menampilkan informasi-informasi tentang peristiwa, kota / kab. di Jawa Barat.', 'Mengenal jawa barat travelingyuk.jpg'),
(6, 'Auditorium', '4.3', 'Digunakan sebagai tempat meeting, seminar, sosialisasi, diskusi, pemutaran film, dan tempat memutar lagu-lagu perjuangan.', 'auditorium detikcom.jpg'),
(7, 'Perpustakaan', '4.0', 'Pengunjung bisa menggunakan mengunjungi perpustakaan museum', 'perpustakaan trepelincom.jpg'),
(8, 'Toilet dan Mushola', '4.0', 'Didalam museum terdapat toilet dan Mushola yang dapat digunakna oleh pengunjung.', 'monpera travelingyuk.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `id_reservasi` varchar(11) NOT NULL,
  `start_time` varchar(20) NOT NULL,
  `end_time` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `id_reservasi`, `start_time`, `end_time`, `kategori`, `jumlah`, `nama`, `alamat`) VALUES
(13, 'RM0001', '08-09-2020 9:00 AM', '08-09-2020 9:30 AM', 'TK / PAUD', '100', 'roni Setiawan', 'Jl. Bandung'),
(20, 'RM0002', '07-09-2020 9:30 AM', '07-09-2020 9:00 AM', 'SMP', '100', 'Wowo', 'jl. Aceh'),
(22, 'RM0006', '14-09-2020 1:00 PM', '14-09-2020 2:00 PM', 'Umum', '10', 'Robi Darwis', 'Jl. Garut Bandung'),
(24, 'RM0003', '8-9-2020 2:00 PM', '8-9-2020 2:30 PM', 'SMA / SMK', '50', 'Nizar', 'jl. banda'),
(25, 'RM0007', '14-09-2020 10:00 AM', '14-09-2020 10:30 AM', 'SMP', '20', 'Imas Maysaroh', 'Jl.bandung'),
(26, 'RM0006', '30-09-2020 1:00 PM', '30-09-2020 2:00 PM', 'Umum', '50', 'Robi Darwis', 'Jl. Garut Bandung'),
(27, 'RM0004', '10-9-2020 10:0:0', '10-9-2020 10:30 AM', 'SMA / SMK', '50', 'Rona R', 'jl. ciamis raya'),
(29, 'RM0008', '02-10-2020 9:00 AM', '02-10-2020 9:30 AM', 'SD', '60', 'Roni Saja', 'Jl. Tasikmalaya'),
(31, 'RM0007', '28-09-2020 10:00 AM', '28-09-2020 10:30 AM', 'SMP', '20', 'Imas Maysaroh', 'Jl.bandung'),
(32, 'RM0001', '08-09-2020 9:00 AM', '08-09-2020 9:30 AM', 'TK / PAUD', '100', 'roni Setiawan', 'Jl. Bandung'),
(34, 'RM0002', '07-09-2020 9:30 AM', '07-09-2020 10:00 AM', 'SMP', '70', 'Wowo', 'jl. Aceh'),
(35, 'RM0010', '25-09-2020 11:00 AM', '25-09-2020 11:30 AM', 'Universitas / PT', '100', 'Roni Setiawan', 'Jl. Bandung Raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_koleksi`
--

CREATE TABLE `tb_kategori_koleksi` (
  `id_kategori_koleksi` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `kategori_seo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_koleksi`
--

INSERT INTO `tb_kategori_koleksi` (`id_kategori_koleksi`, `nama_kategori`, `kategori_seo`) VALUES
(1, 'Pakaian Bersejarah', 'pakaianbersejarah'),
(2, 'Senjata Bersejarah', 'senjatabersejarah'),
(3, 'Benda Pusaka', 'bendapusaka'),
(5, 'Benda Sejarah', 'benda-sejarah'),
(6, 'Senjata Rampasan', 'senjata-rampasan'),
(7, 'Benda Replika', 'benda-replika'),
(8, 'Benda Rampasan', 'benda-rampasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_pengunjung`
--

CREATE TABLE `tb_kategori_pengunjung` (
  `id_kategori_pengunjung` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_pengunjung`
--

INSERT INTO `tb_kategori_pengunjung` (`id_kategori_pengunjung`, `nama_kategori`) VALUES
(1, 'TK / PAUD'),
(2, 'SD'),
(3, 'SMP'),
(4, 'SMA / SMK'),
(5, 'Universitas / PT'),
(6, 'Umum'),
(7, 'Mancanegara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_koleksi`
--

CREATE TABLE `tb_koleksi` (
  `id_koleksi` int(11) NOT NULL,
  `id_ukuran` varchar(6) NOT NULL,
  `id_kategori_koleksi` int(11) NOT NULL,
  `nama_pencatat` varchar(50) NOT NULL,
  `no_registrasi` int(11) NOT NULL,
  `tanggal_pencatatan` varchar(12) NOT NULL,
  `nama_koleksi` varchar(256) NOT NULL,
  `koleksi_seo` varchar(256) NOT NULL,
  `asal_koleksi` varchar(256) NOT NULL,
  `pemilik_asal` varchar(256) NOT NULL,
  `cara_perolehan` varchar(256) NOT NULL,
  `sumber_pusaka` varchar(256) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_koleksi`
--

INSERT INTO `tb_koleksi` (`id_koleksi`, `id_ukuran`, `id_kategori_koleksi`, `nama_pencatat`, `no_registrasi`, `tanggal_pencatatan`, `nama_koleksi`, `koleksi_seo`, `asal_koleksi`, `pemilik_asal`, `cara_perolehan`, `sumber_pusaka`, `foto`, `deskripsi`) VALUES
(23, 'UK0001', 5, 'penata', 1, '2020-09-01', 'Koper Besi Belanda', 'koper-besi-belanda', '', '', '', '', '37af9dd25b87eff66851b260d7444f0a.jpg', ''),
(24, 'UK0002', 6, 'penata', 2, '2020-09-01', 'Stand Gun', 'stand-gun', '', '', '', '', '409f143728ee44ff8391aed6b4a179de.jpg', ''),
(25, 'UK0003', 6, 'penata', 3, '2020-09-01', 'Helm Prajurit Belanda', 'helm-prajurit-belanda', '', '', '', '', 'e12fa4bdb95b2afacdfc4a987366f698.jpg', '&lt;p&gt;Helm prajurit belanda yang berhasil dirampas oleh tentara Indonesia&lt;br&gt;&lt;/p&gt;'),
(26, 'UK0004', 6, 'penata', 4, '2020-09-01', 'Senjata Laras Panjang/Brend Light Machine Gun', 'senjata-laras-panjangbrend-light-machine-gun', '', '', '', '', '8f8dd8c6cd0e5d5a651b1e2a5a4c37de.jpg', '&lt;p&gt;Senjata laras panjang yang berhasil direbut tentara Indonesia dari tangan penjajah&lt;br&gt;&lt;/p&gt;'),
(27, 'UK0005', 5, 'penata', 5, '2020-09-01', 'Golok Revolusi (bercangkang P64cm L7cm)', 'golok-revolusi-bercangkang-p64cm-l7cm', '', '', '', '', '188c7ac7d9f58ad7bddf8e6a8a17f889.jpg', '&lt;p&gt;Salah satu senjata yang digunakan rakay untuk melawan penjajah adalah dengan golok, rakyat berjuang pantang menyerah kepada para penjajah melawan dengan segala senjata yang dimiliki demi kebebasan dan kemerdekaan negara Indonesia. &lt;/p&gt;'),
(28, 'UK0006', 7, 'penata', 6, '2020-09-01', 'Granat (Replika) ', 'granat-replika-', '', '', '', '', 'a18cfe37fbe47103a8f97a29ea0cc2d4.jpg', '&lt;p&gt;Replika Granat yang digunakan para penjajah untuk menghancurkan wilayah-wilayah yang menjadi sasaran, dan untuk mengancurkan rakyat dengan rasa takut.&lt;br&gt;&lt;/p&gt;'),
(30, 'UK0008', 2, 'penata', 8, '2020-09-01', 'Samurai / Katan (bercangkang P74cm L4cm)', 'samurai--katan-bercangkang-p74cm-l4cm', '', '', '', '', '8dfe82fc1007f1a28248c1f1bcd877ac.jpg', '&lt;p&gt;Senjata samurai atau katana merupakan senjata yang biasanya digunakan penjajah belanda, dan menjadi salah satu senjata mereka&lt;br&gt;&lt;/p&gt;'),
(32, 'UK0010', 8, 'penata', 10, '2020-09-01', 'Topi Laken', 'topi-laken', '', '', '', '', '24652b87a5262a9d281b1ccdf7d3dc21.jpg', '&lt;p&gt;Topi Laken digunakan untuk melindugi kepala&lt;br&gt;&lt;/p&gt;'),
(33, 'UK0011', 5, 'penata', 11, '2020-09-01', 'Teropong', 'teropong', '', '', '', '', '989158284e2cd83b72e550bec6ce8808.jpg', '&lt;p&gt;Teropong biasa digunakan untuk memantau pergerakan dari jarak jauh&lt;br&gt;&lt;/p&gt;'),
(34, 'UK0012', 6, 'penata', 12, '2020-09-01', 'Pistol VOC', 'pistol-voc', '', '', '', '', '623379d877adb7625ad29d113eedf370.jpg', '&lt;p&gt;Senjata VOC merupakan senjata yang digunakan para tentara atau para penjajah dari belanda&lt;br&gt;&lt;/p&gt;'),
(35, 'UK0013', 6, 'penata', 13, '2020-09-01', 'Pistol VOC', 'pistol-voc', '', '', '', '', 'ae55904436d8e7c19ceb6a10c8c1bcd0.jpg', 'Pistol VOC digunakan para penjajah belanda untuk menembaki rakyat yang tidak taat aturan mereka.&lt;br&gt;'),
(36, 'UK0014', 5, 'penata', 14, '2020-09-01', 'Telepon Jaman Belanda', 'telepon-jaman-belanda', '', '', '', '', 'da8c9272d9aa449c92d98f13e3f3c75d.jpg', '&lt;p&gt;Telepon digunakan para penjajah belanda untuk saling terhubung dengan penjajah lain, atau untuk berkomunikasi tentang kepentingan mereka sendiri.&lt;br&gt;&lt;/p&gt;'),
(37, 'UK0015', 5, 'penata', 15, '2020-09-01', 'Telepon', 'telepon', '', '', '', '', '1ba082ef3cf6071c02c1cf84928ab1f3.jpg', '&lt;p&gt;Telepon digunakan untuk komunikasi jarak jauh para penjajah&lt;br&gt;&lt;/p&gt;'),
(38, 'UK0016', 6, 'penata', 16, '2020-09-01', 'Pistol Colt', 'pistol-colt', '', '', '', '', 'a2e8da6e0a597efc6302ae81034c86b6.jpg', '&lt;p&gt;Pistol digunakan para penjajah sebagai senjata mereka.&lt;br&gt;&lt;/p&gt;'),
(39, 'UK0017', 3, 'penata', 17, '2020-09-01', 'Golok Pusaka (bercangkang P32cm L5cm)', 'golok-pusaka-bercangkang-p32cm-l5cm', 'BANDUNG', 'LVRI', 'Titipan', '', 'bbbdbd3e1e58d2d8a0466fef6f62b8fe.jpg', '&lt;p&gt;Golok Pusaka merupakan senjata pusaka yang digunakan rakyat untuk melawan penjajah.&lt;br&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kota`
--

CREATE TABLE `tb_kota` (
  `kota_id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kota`
--

INSERT INTO `tb_kota` (`kota_id`, `provinsi_id`, `nama_kota`) VALUES
(1, 21, 'Aceh Barat'),
(2, 21, 'Aceh Barat Daya'),
(3, 21, 'Aceh Besar'),
(4, 21, 'Aceh Jaya'),
(5, 21, 'Aceh Selatan'),
(6, 21, 'Aceh Singkil'),
(7, 21, 'Aceh Tamiang'),
(8, 21, 'Aceh Tengah'),
(9, 21, 'Aceh Tenggara'),
(10, 21, 'Aceh Timur'),
(11, 21, 'Aceh Utara'),
(12, 32, 'Agam'),
(13, 23, 'Alor'),
(14, 19, 'Ambon'),
(15, 34, 'Asahan'),
(16, 24, 'Asmat'),
(17, 1, 'Badung'),
(18, 13, 'Balangan'),
(19, 15, 'Balikpapan'),
(20, 21, 'Banda Aceh'),
(21, 18, 'Bandar Lampung'),
(22, 9, 'Kab. Bandung'),
(23, 9, 'Kota Bandung'),
(24, 9, 'Bandung Barat'),
(25, 29, 'Banggai'),
(26, 29, 'Banggai Kepulauan'),
(27, 2, 'Bangka'),
(28, 2, 'Bangka Barat'),
(29, 2, 'Bangka Selatan'),
(30, 2, 'Bangka Tengah'),
(31, 11, 'Bangkalan'),
(32, 1, 'Bangli'),
(33, 13, 'Banjar'),
(34, 9, 'Banjar'),
(35, 13, 'Banjarbaru'),
(36, 13, 'Banjarmasin'),
(37, 10, 'Banjarnegara'),
(38, 28, 'Bantaeng'),
(39, 5, 'Bantul'),
(40, 33, 'Banyuasin'),
(41, 10, 'Banyumas'),
(42, 11, 'Banyuwangi'),
(43, 13, 'Barito Kuala'),
(44, 14, 'Barito Selatan'),
(45, 14, 'Barito Timur'),
(46, 14, 'Barito Utara'),
(47, 28, 'Barru'),
(48, 17, 'Batam'),
(49, 10, 'Batang'),
(50, 8, 'Batang Hari'),
(51, 11, 'Batu'),
(52, 34, 'Batu Bara'),
(53, 30, 'Bau-Bau'),
(54, 9, 'Bekasi'),
(55, 9, 'Bekasi'),
(56, 2, 'Belitung'),
(57, 2, 'Belitung Timur'),
(58, 23, 'Belu'),
(59, 21, 'Bener Meriah'),
(60, 26, 'Bengkalis'),
(61, 12, 'Bengkayang'),
(62, 4, 'Bengkulu'),
(63, 4, 'Bengkulu Selatan'),
(64, 4, 'Bengkulu Tengah'),
(65, 4, 'Bengkulu Utara'),
(66, 15, 'Berau'),
(67, 24, 'Biak Numfor'),
(68, 22, 'Bima'),
(69, 22, 'Bima'),
(70, 34, 'Binjai'),
(71, 17, 'Bintan'),
(72, 21, 'Bireuen'),
(73, 31, 'Bitung'),
(74, 11, 'Blitar'),
(75, 11, 'Blitar'),
(76, 10, 'Blora'),
(77, 7, 'Boalemo'),
(78, 9, 'Bogor'),
(79, 9, 'Bogor'),
(80, 11, 'Bojonegoro'),
(81, 31, 'Bolaang Mongondow (Bolmong)'),
(82, 31, 'Bolaang Mongondow Selatan'),
(83, 31, 'Bolaang Mongondow Timur'),
(84, 31, 'Bolaang Mongondow Utara'),
(85, 30, 'Bombana'),
(86, 11, 'Bondowoso'),
(87, 28, 'Bone'),
(88, 7, 'Bone Bolango'),
(89, 15, 'Bontang'),
(90, 24, 'Boven Digoel'),
(91, 10, 'Boyolali'),
(92, 10, 'Brebes'),
(93, 32, 'Bukittinggi'),
(94, 1, 'Buleleng'),
(95, 28, 'Bulukumba'),
(96, 16, 'Bulungan (Bulongan)'),
(97, 8, 'Bungo'),
(98, 29, 'Buol'),
(99, 19, 'Buru'),
(100, 19, 'Buru Selatan'),
(101, 30, 'Buton'),
(102, 30, 'Buton Utara'),
(103, 9, 'Ciamis'),
(104, 9, 'Cianjur'),
(105, 10, 'Cilacap'),
(106, 3, 'Cilegon'),
(107, 9, 'Cimahi'),
(108, 9, 'Cirebon'),
(109, 9, 'Cirebon'),
(110, 34, 'Dairi'),
(111, 24, 'Deiyai (Deliyai)'),
(112, 34, 'Deli Serdang'),
(113, 10, 'Demak'),
(114, 1, 'Denpasar'),
(115, 9, 'Depok'),
(116, 32, 'Dharmasraya'),
(117, 24, 'Dogiyai'),
(118, 22, 'Dompu'),
(119, 29, 'Donggala'),
(120, 26, 'Dumai'),
(121, 33, 'Empat Lawang'),
(122, 23, 'Ende'),
(123, 28, 'Enrekang'),
(124, 25, 'Fakfak'),
(125, 23, 'Flores Timur'),
(126, 9, 'Garut'),
(127, 21, 'Gayo Lues'),
(128, 1, 'Gianyar'),
(129, 7, 'Gorontalo'),
(130, 7, 'Gorontalo'),
(131, 7, 'Gorontalo Utara'),
(132, 28, 'Gowa'),
(133, 11, 'Gresik'),
(134, 10, 'Grobogan'),
(135, 5, 'Gunung Kidul'),
(136, 14, 'Gunung Mas'),
(137, 34, 'Gunungsitoli'),
(138, 20, 'Halmahera Barat'),
(139, 20, 'Halmahera Selatan'),
(140, 20, 'Halmahera Tengah'),
(141, 20, 'Halmahera Timur'),
(142, 20, 'Halmahera Utara'),
(143, 13, 'Hulu Sungai Selatan'),
(144, 13, 'Hulu Sungai Tengah'),
(145, 13, 'Hulu Sungai Utara'),
(146, 34, 'Humbang Hasundutan'),
(147, 26, 'Indragiri Hilir'),
(148, 26, 'Indragiri Hulu'),
(149, 9, 'Indramayu'),
(150, 24, 'Intan Jaya'),
(151, 6, 'Jakarta Barat'),
(152, 6, 'Jakarta Pusat'),
(153, 6, 'Jakarta Selatan'),
(154, 6, 'Jakarta Timur'),
(155, 6, 'Jakarta Utara'),
(156, 8, 'Jambi'),
(157, 24, 'Jayapura'),
(158, 24, 'Jayapura'),
(159, 24, 'Jayawijaya'),
(160, 11, 'Jember'),
(161, 1, 'Jembrana'),
(162, 28, 'Jeneponto'),
(163, 10, 'Jepara'),
(164, 11, 'Jombang'),
(165, 25, 'Kaimana'),
(166, 26, 'Kampar'),
(167, 14, 'Kapuas'),
(168, 12, 'Kapuas Hulu'),
(169, 10, 'Karanganyar'),
(170, 1, 'Karangasem'),
(171, 9, 'Karawang'),
(172, 17, 'Karimun'),
(173, 34, 'Karo'),
(174, 14, 'Katingan'),
(175, 4, 'Kaur'),
(176, 12, 'Kayong Utara'),
(177, 10, 'Kebumen'),
(178, 11, 'Kediri'),
(179, 11, 'Kediri'),
(180, 24, 'Keerom'),
(181, 10, 'Kendal'),
(182, 30, 'Kendari'),
(183, 4, 'Kepahiang'),
(184, 17, 'Kepulauan Anambas'),
(185, 19, 'Kepulauan Aru'),
(186, 32, 'Kepulauan Mentawai'),
(187, 26, 'Kepulauan Meranti'),
(188, 31, 'Kepulauan Sangihe'),
(189, 6, 'Kepulauan Seribu'),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(191, 20, 'Kepulauan Sula'),
(192, 31, 'Kepulauan Talaud'),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)'),
(194, 8, 'Kerinci'),
(195, 12, 'Ketapang'),
(196, 10, 'Klaten'),
(197, 1, 'Klungkung'),
(198, 30, 'Kolaka'),
(199, 30, 'Kolaka Utara'),
(200, 30, 'Konawe'),
(201, 30, 'Konawe Selatan'),
(202, 30, 'Konawe Utara'),
(203, 13, 'Kotabaru'),
(204, 31, 'Kotamobagu'),
(205, 14, 'Kotawaringin Barat'),
(206, 14, 'Kotawaringin Timur'),
(207, 26, 'Kuantan Singingi'),
(208, 12, 'Kubu Raya'),
(209, 10, 'Kudus'),
(210, 5, 'Kulon Progo'),
(211, 9, 'Kuningan'),
(212, 23, 'Kupang'),
(213, 23, 'Kupang'),
(214, 15, 'Kutai Barat'),
(215, 15, 'Kutai Kartanegara'),
(216, 15, 'Kutai Timur'),
(217, 34, 'Labuhan Batu'),
(218, 34, 'Labuhan Batu Selatan'),
(219, 34, 'Labuhan Batu Utara'),
(220, 33, 'Lahat'),
(221, 14, 'Lamandau'),
(222, 11, 'Lamongan'),
(223, 18, 'Lampung Barat'),
(224, 18, 'Lampung Selatan'),
(225, 18, 'Lampung Tengah'),
(226, 18, 'Lampung Timur'),
(227, 18, 'Lampung Utara'),
(228, 12, 'Landak'),
(229, 34, 'Langkat'),
(230, 21, 'Langsa'),
(231, 24, 'Lanny Jaya'),
(232, 3, 'Lebak'),
(233, 4, 'Lebong'),
(234, 23, 'Lembata'),
(235, 21, 'Lhokseumawe'),
(236, 32, 'Lima Puluh Koto/Kota'),
(237, 17, 'Lingga'),
(238, 22, 'Lombok Barat'),
(239, 22, 'Lombok Tengah'),
(240, 22, 'Lombok Timur'),
(241, 22, 'Lombok Utara'),
(242, 33, 'Lubuk Linggau'),
(243, 11, 'Lumajang'),
(244, 28, 'Luwu'),
(245, 28, 'Luwu Timur'),
(246, 28, 'Luwu Utara'),
(247, 11, 'Madiun'),
(248, 11, 'Madiun'),
(249, 10, 'Magelang'),
(250, 10, 'Magelang'),
(251, 11, 'Magetan'),
(252, 9, 'Majalengka'),
(253, 27, 'Majene'),
(254, 28, 'Makassar'),
(255, 11, 'Malang'),
(256, 11, 'Malang'),
(257, 16, 'Malinau'),
(258, 19, 'Maluku Barat Daya'),
(259, 19, 'Maluku Tengah'),
(260, 19, 'Maluku Tenggara'),
(261, 19, 'Maluku Tenggara Barat'),
(262, 27, 'Mamasa'),
(263, 24, 'Mamberamo Raya'),
(264, 24, 'Mamberamo Tengah'),
(265, 27, 'Mamuju'),
(266, 27, 'Mamuju Utara'),
(267, 31, 'Manado'),
(268, 34, 'Mandailing Natal'),
(269, 23, 'Manggarai'),
(270, 23, 'Manggarai Barat'),
(271, 23, 'Manggarai Timur'),
(272, 25, 'Manokwari'),
(273, 25, 'Manokwari Selatan'),
(274, 24, 'Mappi'),
(275, 28, 'Maros'),
(276, 22, 'Mataram'),
(277, 25, 'Maybrat'),
(278, 34, 'Medan'),
(279, 12, 'Melawi'),
(280, 8, 'Merangin'),
(281, 24, 'Merauke'),
(282, 18, 'Mesuji'),
(283, 18, 'Metro'),
(284, 24, 'Mimika'),
(285, 31, 'Minahasa'),
(286, 31, 'Minahasa Selatan'),
(287, 31, 'Minahasa Tenggara'),
(288, 31, 'Minahasa Utara'),
(289, 11, 'Mojokerto'),
(290, 11, 'Mojokerto'),
(291, 29, 'Morowali'),
(292, 33, 'Muara Enim'),
(293, 8, 'Muaro Jambi'),
(294, 4, 'Muko Muko'),
(295, 30, 'Muna'),
(296, 14, 'Murung Raya'),
(297, 33, 'Musi Banyuasin'),
(298, 33, 'Musi Rawas'),
(299, 24, 'Nabire'),
(300, 21, 'Nagan Raya'),
(301, 23, 'Nagekeo'),
(302, 17, 'Natuna'),
(303, 24, 'Nduga'),
(304, 23, 'Ngada'),
(305, 11, 'Nganjuk'),
(306, 11, 'Ngawi'),
(307, 34, 'Nias'),
(308, 34, 'Nias Barat'),
(309, 34, 'Nias Selatan'),
(310, 34, 'Nias Utara'),
(311, 16, 'Nunukan'),
(312, 33, 'Ogan Ilir'),
(313, 33, 'Ogan Komering Ilir'),
(314, 33, 'Ogan Komering Ulu'),
(315, 33, 'Ogan Komering Ulu Selatan'),
(316, 33, 'Ogan Komering Ulu Timur'),
(317, 11, 'Pacitan'),
(318, 32, 'Padang'),
(319, 34, 'Padang Lawas'),
(320, 34, 'Padang Lawas Utara'),
(321, 32, 'Padang Panjang'),
(322, 32, 'Padang Pariaman'),
(323, 34, 'Padang Sidempuan'),
(324, 33, 'Pagar Alam'),
(325, 34, 'Pakpak Bharat'),
(326, 14, 'Palangka Raya'),
(327, 33, 'Palembang'),
(328, 28, 'Palopo'),
(329, 29, 'Palu'),
(330, 11, 'Pamekasan'),
(331, 3, 'Pandeglang'),
(332, 9, 'Pangandaran'),
(333, 28, 'Pangkajene Kepulauan'),
(334, 2, 'Pangkal Pinang'),
(335, 24, 'Paniai'),
(336, 28, 'Parepare'),
(337, 32, 'Pariaman'),
(338, 29, 'Parigi Moutong'),
(339, 32, 'Pasaman'),
(340, 32, 'Pasaman Barat'),
(341, 15, 'Paser'),
(342, 11, 'Pasuruan'),
(343, 11, 'Pasuruan'),
(344, 10, 'Pati'),
(345, 32, 'Payakumbuh'),
(346, 25, 'Pegunungan Arfak'),
(347, 24, 'Pegunungan Bintang'),
(348, 10, 'Pekalongan'),
(349, 10, 'Pekalongan'),
(350, 26, 'Pekanbaru'),
(351, 26, 'Pelalawan'),
(352, 10, 'Pemalang'),
(353, 34, 'Pematang Siantar'),
(354, 15, 'Penajam Paser Utara'),
(355, 18, 'Pesawaran'),
(356, 18, 'Pesisir Barat'),
(357, 32, 'Pesisir Selatan'),
(358, 21, 'Pidie'),
(359, 21, 'Pidie Jaya'),
(360, 28, 'Pinrang'),
(361, 7, 'Pohuwato'),
(362, 27, 'Polewali Mandar'),
(363, 11, 'Ponorogo'),
(364, 12, 'Pontianak'),
(365, 12, 'Pontianak'),
(366, 29, 'Poso'),
(367, 33, 'Prabumulih'),
(368, 18, 'Pringsewu'),
(369, 11, 'Probolinggo'),
(370, 11, 'Probolinggo'),
(371, 14, 'Pulang Pisau'),
(372, 20, 'Pulau Morotai'),
(373, 24, 'Puncak'),
(374, 24, 'Puncak Jaya'),
(375, 10, 'Purbalingga'),
(376, 9, 'Purwakarta'),
(377, 10, 'Purworejo'),
(378, 25, 'Raja Ampat'),
(379, 4, 'Rejang Lebong'),
(380, 10, 'Rembang'),
(381, 26, 'Rokan Hilir'),
(382, 26, 'Rokan Hulu'),
(383, 23, 'Rote Ndao'),
(384, 21, 'Sabang'),
(385, 23, 'Sabu Raijua'),
(386, 10, 'Salatiga'),
(387, 15, 'Samarinda'),
(388, 12, 'Sambas'),
(389, 34, 'Samosir'),
(390, 11, 'Sampang'),
(391, 12, 'Sanggau'),
(392, 24, 'Sarmi'),
(393, 8, 'Sarolangun'),
(394, 32, 'Sawah Lunto'),
(395, 12, 'Sekadau'),
(396, 28, 'Selayar (Kepulauan Selayar)'),
(397, 4, 'Seluma'),
(398, 10, 'Semarang'),
(399, 10, 'Semarang'),
(400, 19, 'Seram Bagian Barat'),
(401, 19, 'Seram Bagian Timur'),
(402, 3, 'Serang'),
(403, 3, 'Serang'),
(404, 34, 'Serdang Bedagai'),
(405, 14, 'Seruyan'),
(406, 26, 'Siak'),
(407, 34, 'Sibolga'),
(408, 28, 'Sidenreng Rappang/Rapang'),
(409, 11, 'Sidoarjo'),
(410, 29, 'Sigi'),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)'),
(412, 23, 'Sikka'),
(413, 34, 'Simalungun'),
(414, 21, 'Simeulue'),
(415, 12, 'Singkawang'),
(416, 28, 'Sinjai'),
(417, 12, 'Sintang'),
(418, 11, 'Situbondo'),
(419, 5, 'Sleman'),
(420, 32, 'Solok'),
(421, 32, 'Solok'),
(422, 32, 'Solok Selatan'),
(423, 28, 'Soppeng'),
(424, 25, 'Sorong'),
(425, 25, 'Sorong'),
(426, 25, 'Sorong Selatan'),
(427, 10, 'Sragen'),
(428, 9, 'Subang'),
(429, 21, 'Subulussalam'),
(430, 9, 'Sukabumi'),
(431, 9, 'Sukabumi'),
(432, 14, 'Sukamara'),
(433, 10, 'Sukoharjo'),
(434, 23, 'Sumba Barat'),
(435, 23, 'Sumba Barat Daya'),
(436, 23, 'Sumba Tengah'),
(437, 23, 'Sumba Timur'),
(438, 22, 'Sumbawa'),
(439, 22, 'Sumbawa Barat'),
(440, 9, 'Sumedang'),
(441, 11, 'Sumenep'),
(442, 8, 'Sungaipenuh'),
(443, 24, 'Supiori'),
(444, 11, 'Surabaya'),
(445, 10, 'Surakarta (Solo)'),
(446, 13, 'Tabalong'),
(447, 1, 'Tabanan'),
(448, 28, 'Takalar'),
(449, 25, 'Tambrauw'),
(450, 16, 'Tana Tidung'),
(451, 28, 'Tana Toraja'),
(452, 13, 'Tanah Bumbu'),
(453, 32, 'Tanah Datar'),
(454, 13, 'Tanah Laut'),
(455, 3, 'Tangerang'),
(456, 3, 'Tangerang'),
(457, 3, 'Tangerang Selatan'),
(458, 18, 'Tanggamus'),
(459, 34, 'Tanjung Balai'),
(460, 8, 'Tanjung Jabung Barat'),
(461, 8, 'Tanjung Jabung Timur'),
(462, 17, 'Tanjung Pinang'),
(463, 34, 'Tapanuli Selatan'),
(464, 34, 'Tapanuli Tengah'),
(465, 34, 'Tapanuli Utara'),
(466, 13, 'Tapin'),
(467, 16, 'Tarakan'),
(468, 9, 'Tasikmalaya'),
(469, 9, 'Tasikmalaya'),
(470, 34, 'Tebing Tinggi'),
(471, 8, 'Tebo'),
(472, 10, 'Tegal'),
(473, 10, 'Tegal'),
(474, 25, 'Teluk Bintuni'),
(475, 25, 'Teluk Wondama'),
(476, 10, 'Temanggung'),
(477, 20, 'Ternate'),
(478, 20, 'Tidore Kepulauan'),
(479, 23, 'Timor Tengah Selatan'),
(480, 23, 'Timor Tengah Utara'),
(481, 34, 'Toba Samosir'),
(482, 29, 'Tojo Una-Una'),
(483, 29, 'Toli-Toli'),
(484, 24, 'Tolikara'),
(485, 31, 'Tomohon'),
(486, 28, 'Toraja Utara'),
(487, 11, 'Trenggalek'),
(488, 19, 'Tual'),
(489, 11, 'Tuban'),
(490, 18, 'Tulang Bawang'),
(491, 18, 'Tulang Bawang Barat'),
(492, 11, 'Tulungagung'),
(493, 28, 'Wajo'),
(494, 30, 'Wakatobi'),
(495, 24, 'Waropen'),
(496, 18, 'Way Kanan'),
(497, 10, 'Wonogiri'),
(498, 10, 'Wonosobo'),
(499, 24, 'Yahukimo'),
(500, 24, 'Yalimo'),
(501, 5, 'Yogyakarta'),
(502, 35, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_negara`
--

CREATE TABLE `tb_negara` (
  `id_negara` int(11) NOT NULL,
  `kode` varchar(2) NOT NULL DEFAULT '',
  `nama` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_negara`
--

INSERT INTO `tb_negara` (`id_negara`, `kode`, `nama`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `id_alamat`, `email`, `username`, `password`, `no_telp`, `nama_lengkap`, `jenis_kelamin`, `foto`, `aktif`, `level`, `tgl_daftar`) VALUES
(2, 1, 'admin@email.com', 'admin', '$2y$10$HUxuti9Nt3txPhF32Am78e/BGOKuMr/IMJK2XVCsHqmikQDwHFCUK', '0899999999999', 'Administrator', 'Laki-laki', '92665291f4d80900d014ce526f68fe1a.png', 1, 1, '2020-06-17'),
(4, 2, 'koordinator@email.com', 'koordinator', '$2y$10$e.ZiSTkdnOfdvOARwVwxw.DNOcpp/fhJNeGr2wVwi3V2cmAJPmRw.', '081522222222', 'Koordinator', 'Laki-laki', 'default.jpg', 1, 2, '2020-06-17'),
(5, 3, 'resepsionis@gmail.com', 'resepsionis', '$2y$10$VPYdTqMA2EAq8HxzR/eccOCdP9ZhE8cQXB8QGbSbgrA.8q4CFF2a2', '082222222222', 'Resepsionis', 'Laki-laki', 'default.jpg', 1, 3, '2020-07-06'),
(15, 8, 'penatapameran@email.com', 'penata', '$2y$10$A3.nNziHDy3uG/kLYXWBIuLljlJ/z8RJqK0uNI4bDEAKXZHuljpsC', '08555555555', 'Penata Pameran', 'Perempuan', 'default.jpg', 1, 4, '2020-07-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna_token`
--

CREATE TABLE `tb_pengguna_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna_token`
--

INSERT INTO `tb_pengguna_token` (`id`, `email`, `token`, `dibuat`) VALUES
(18, 'ronisetiawant@gmail.com', 'q+jtUAroh6XjFU5ysM9UDjhsSrcCYe3ocee5gGI7h0M=', 1599775979);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `nama` varchar(50) NOT NULL,
  `id_card` varchar(20) NOT NULL,
  `no_id` varchar(20) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengunjung`
--

INSERT INTO `tb_pengunjung` (`id_pengunjung`, `tanggal`, `waktu`, `kategori`, `jumlah`, `nama`, `id_card`, `no_id`, `negara`, `provinsi`, `kota`, `alamat`, `kode_pos`, `petugas`) VALUES
(54, '2020-09-16', '11:15:59', 'SD', 150, 'Banyu', 'Paspor', '320611245452422', 'Indonesia', 'Jawa Barat', 'Bandung Barat', 'Jl. Bandung', 653263, 'resepsionis'),
(55, '2020-09-16', '11:15:45', 'TK / PAUD', 50, 'Bany', 'Paspor', '320611245452422', 'Andorra', 'Jawa Barat', 'Bandung Barat', 'Jl. Bandung', 653263, 'resepsionis'),
(56, '2020-09-06', '11:15:26', 'SMP', 50, 'Izam', 'Paspor', '320611245452422', 'Albania', 'Jawa Barat', 'Bandung Barat', 'Jl. Bandung', 653263, 'resepsionis'),
(57, '2020-09-16', '01:03:21', 'SMP', 50, 'roni Setiawan', 'KTP', '320611245452422', 'Albania', 'Jawa Barat', 'Bandung Barat', 'Jl. Bandung', 653263, 'resepsionis'),
(58, '2020-09-16', '02:52:22', 'SMA / SMK', 50, 'Rona R', 'KTP', '2312530852184', 'Indonesia', 'Jawa Barat', 'Ciamis', 'jl. ciamis raya', 40412, 'resepsionis'),
(59, '2020-09-05', '19:55:09', 'SD', 60, 'Roni Saja', 'KTP', '32011652626556', 'Indonesia', 'Jawa Barat', 'Tasikmalaya', 'Jl. Tasikmalaya', 40417, 'resepsionis'),
(60, '2020-09-07', '14:42:59', 'Universitas / PT', 10, 'Nizar Ilham', 'KTP', '3206442564525', 'Indonesia', 'Jawa Barat', 'Bandung', 'jl. Bandung', 41231, 'resepsionis'),
(61, '2020-09-16', '15:48:54', 'Universitas / PT', 120, 'Roni Setiawan', 'KTP', '32061126565365', 'Indonesia', 'Jawa Barat', 'Kota Bandung', 'Jl. Bandung Raya', 40236, 'resepsionis'),
(62, '2020-09-16', '13:28:52', 'Umum', 21, 'weqe', 'KTP', '2312319', 'Azerbaijan', 'Kalimantan Tengah', 'Alor', '3121', 3424, 'resepsionis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `provinsi_id` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`provinsi_id`, `nama_provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara'),
(35, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` varchar(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_card` varchar(20) NOT NULL,
  `no_id` varchar(20) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_pos` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `status` varchar(10) NOT NULL,
  `status_notif` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `tanggal`, `waktu`, `kategori`, `jumlah`, `nama`, `id_card`, `no_id`, `negara`, `provinsi`, `kota`, `alamat`, `kode_pos`, `email`, `no_telp`, `foto`, `status`, `status_notif`, `keterangan`) VALUES
('RM0001', '08-09-2020', '9:00 AM', 'TK / PAUD', '100', 'roni Setiawan', 'KTP', '320611245452422', 'Indonesia', 'Jawa Barat', 'Bandung Barat', 'Jl. Bandung', '653263', 'iyeuroni@gmail.com', '123456', '89d0a9d89ae9e9c544120d99b36556e8.PNG', '3', 0, '123'),
('RM0002', '07-09-2020', '9:30 AM', 'SMP', '70', 'Wowo', 'KTP', '320123123122', 'Indonesia', 'Bali', 'Aceh Utara', 'jl. Aceh', '32132', 'iyeuroni@gmail.com', '08562562512', '653c8b7dbbbcf0e9b6eb171064ab2b30.jpg', '2', 0, 'Ditolak'),
('RM0003', '8-9-2020', '2:00 PM', 'SMA / SMK', '50', 'Nizar', 'KTP', '32108425162458', 'Indonesia', 'Jawa Barat', 'Bandung', 'jl. banda', '40451', 'iyeuroni@gmail.com', '08521154824', ' ', '4', 0, 'Jadwal pada tanggal yang diajukan sudah penuh.'),
('RM0004', '10-9-2020', '10:0:0', 'SMA / SMK', '50', 'Rona R', 'KTP', '2312530852184', 'Indonesia', 'Jawa Barat', 'Ciamis', 'jl. ciamis raya', '40412', 'iyeuroni@gmail.com', '085215468752', ' ', '2', 0, ''),
('RM0006', '30-09-2020', '1:00 PM', 'Umum', '50', 'Robi Darwis', 'KTP', '32361123524211', 'Indonesia', 'Jawa Barat', 'Garut', 'Jl. Garut Bandung', '40422', 'inikeempat151@gmail.com', '085324165262', '08ba0d31ea9aa770ed604ef8c89f619a.jpg', '3', 0, '11'),
('RM0007', '28-09-2020', '10:00 AM', 'SMP', '20', 'Imas Maysaroh', 'KTP', '3215625362839', 'Indonesia', 'Jawa Barat', 'Bandung Barat', 'Jl.bandung', '40432', 'inikeempat151@gmail.com', '0825145221', 'c033c36878c4b6abee816602c12408d1.jpg', '3', 0, ''),
('RM0008', '02-10-2020', '9:00 AM', 'SD', '60', 'Roni Saja', 'KTP', '32011652626556', 'Indonesia', 'Jawa Barat', 'Tasikmalaya', 'Jl. Tasikmalaya', '40417', 'inikeempat151@gmail.com', '0856215622', 'a81b1d11bd32805864419747d5645172.jpg', '1', 1, ''),
('RM0009', '1-10-2020', '12:0:0', 'Universitas / PT', '10', 'Nizar Ilham', 'KTP', '3206442564525', 'Indonesia', 'Jawa Barat', 'Bandung', 'jl. Bandung', '41231', 'iyeuroni@gmail.com', '08521134547', ' ', '2', 2, 'tolak'),
('RM0010', '25-09-2020', '11:00 AM', 'Universitas / PT', '100', 'Roni Setiawan', 'KTP', '32061126565365', 'Indonesia', 'Jawa Barat', 'Kota Bandung', 'Jl. Bandung Raya', '40236', 'iyeuroni@gmail.com', '0852155663521', '4284c04823370749585719f8e07ad0f3.jpg', '1', 1, '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saran_masukan`
--

CREATE TABLE `tb_saran_masukan` (
  `id_saran_masukan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_saran_masukan`
--

INSERT INTO `tb_saran_masukan` (`id_saran_masukan`, `tanggal`, `nama`, `email`, `subjek`, `pesan`, `status`) VALUES
(16, '2020-09-05', 'Ronnie', 'iyeuroni@gmail.com', 'Pesan', 'pelayanan pemandu museum baik sekali, terima kasih', 1),
(17, '2020-09-05', 'Ceksaran', 'iyeuroni@gmail.com', 'Saran', 'ini saran', 0),
(18, '2020-09-05', 'Saran', 'iyeuroni@gmail.com', 'Saran', 'saran', 0),
(19, '2020-09-05', 'Roni Setiawan', 'iyeuroni@gmail.com', 'Pesan', 'Mohon untuk mengadakan event atau pameran koleksi museum Mohon untuk mengadakan event atau pameran koleksi museum Mohon untuk mengadakan event atau pameran koleksi museum Mohon untuk mengadakan event atau pameran koleksi museum', 0),
(20, '2020-09-06', 'Nizar Ilham', 'iyeuroni@gmail.com', 'Pesan', 'ini adalah pesan supaya museum lebih baik', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_statistik`
--

CREATE TABLE `tb_statistik` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_statistik`
--

INSERT INTO `tb_statistik` (`id`, `ip`, `tanggal`, `hits`, `online`) VALUES
(18, '::1', '2020-09-01', 54, '1598978534'),
(19, '::1', '2020-09-02', 20, '1599020984'),
(20, '127.0.0.1', '2020-09-03', 40, '1599065725'),
(21, '127.0.0.1', '2020-09-03', 100, '1599091492'),
(22, '::1', '2020-09-03', 190, '1599133919'),
(23, '::1', '2020-09-04', 44, '1599199931'),
(24, '::1', '2020-09-05', 319, '1599310898'),
(25, '::1', '2020-09-06', 528, '1599382600'),
(26, '::1', '2020-09-07', 11558, '1599476289'),
(27, '127.0.0.1', '2020-09-09', 2235, '1599662643'),
(28, '::1', '2020-09-10', 4519, '1599757199'),
(29, '::1', '2020-09-11', 11529, '1599843599'),
(30, '127.0.0.1', '2020-09-11', 8541, '1599834509'),
(31, '::1', '2020-09-12', 16056, '1599914390'),
(32, '::1', '2020-09-13', 8227, '1599983208'),
(33, '::1', '2020-09-13', 8227, '1599983208'),
(34, '127.0.0.1', '2020-09-14', 8940, '1600036698'),
(35, '::1', '2020-09-16', 14333, '1600266997'),
(36, '::1', '2020-09-17', 12329, '1600337892'),
(37, '192.168.1.3', '2020-09-17', 7, '1600317438'),
(38, '::1', '2020-09-18', 18236, '1600443106'),
(39, '::1', '2020-09-19', 132, '1600483015'),
(40, '::1', '2020-09-20', 12388, '1600608719'),
(41, '::1', '2020-09-21', 25, '1600705705'),
(42, '::1', '2020-09-22', 13928, '1600793754'),
(43, '::1', '2020-09-23', 24445, '1600880399'),
(44, '::1', '2020-09-24', 11433, '1600916532'),
(45, '::1', '2020-09-25', 4, '1601025084');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subs`
--

CREATE TABLE `tb_subs` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_subs`
--

INSERT INTO `tb_subs` (`id`, `email`, `aktif`) VALUES
(17, 'iyeuroni@gmail.com', 1),
(18, 'inikeempat151@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ukuran_koleksi`
--

CREATE TABLE `tb_ukuran_koleksi` (
  `id_ukuran` varchar(6) NOT NULL,
  `tinggi` varchar(20) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `lebar` varchar(20) NOT NULL,
  `diameter` varchar(20) NOT NULL,
  `berat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ukuran_koleksi`
--

INSERT INTO `tb_ukuran_koleksi` (`id_ukuran`, `tinggi`, `panjang`, `lebar`, `diameter`, `berat`) VALUES
('UK0001', '20 cm', '56 cm', '30 cm', '', ''),
('UK0002', '30 cm', '78 cm', '6 cm', '', ''),
('UK0003', '24 cm', '', '29 cm', '96 cm', ''),
('UK0004', '23 cm', '116 cm', '5 cm', '', ''),
('UK0005', '', '74 cm', '4 cm', '', ''),
('UK0006', '11 cm', '4 cm', '', '12 cm', ''),
('UK0008', '103 cm', '3 cm', '', '', ''),
('UK0010', '17 cm', '', '', '37 cm', ''),
('UK0011', '', '16 cm', '10 cm', '', ''),
('UK0012', '', '42 cm', '5 cm', '', ''),
('UK0013', '', '46 cm', '6 cm', '', ''),
('UK0014', '9 cm', '21 cm', '15 cm', '', ''),
('UK0015', '14 cm', '25 cm', '16 cm', '', ''),
('UK0016', '16 cm', '23 cm ', '3 cm', '', ''),
('UK0017', '42 cm', '36 cm', '3 cm', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_web_identitas`
--

CREATE TABLE `tb_web_identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kota_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `maps` text NOT NULL,
  `facebook` varchar(128) NOT NULL,
  `twitter` varchar(128) NOT NULL,
  `instagram` varchar(128) NOT NULL,
  `youtube` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_web_identitas`
--

INSERT INTO `tb_web_identitas` (`id_identitas`, `nama_website`, `email`, `url`, `no_telp`, `kota_id`, `alamat`, `meta_deskripsi`, `meta_keyword`, `favicon`, `maps`, `facebook`, `twitter`, `instagram`, `youtube`) VALUES
(1, 'Museum Monumen Perjuangan Rakyat Jawa Barat', 'simusmonpera@gmail.com', 'http://localhost/simus', '+6285156616898', 22, 'Jl. Dipati Ukur No.48, Lebakgede, Kecamatan Coblong', 'Sistem Informasi Museum Monumen Perjuangan Rakyat Jawa Barat', 'Museum Monumen Perjuangan Rakyat Jawa Barat', '0ed8cf4375ad1b80280d1d3ed3b12817.png', '-6.893374, 107.618863', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://youtube.com/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_web_logo`
--

CREATE TABLE `tb_web_logo` (
  `id_logo` int(5) NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_web_logo`
--

INSERT INTO `tb_web_logo` (`id_logo`, `gambar`) VALUES
(15, '48618dd93e450355d4d3513eb0687e57.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_web_menu`
--

CREATE TABLE `tb_web_menu` (
  `id_menu` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL DEFAULT 0,
  `nama_menu` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('ya','tidak') NOT NULL DEFAULT 'ya',
  `position` varchar(20) DEFAULT 'Bottom',
  `urutan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_web_menu`
--

INSERT INTO `tb_web_menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`) VALUES
(150, 0, 'Koleksi ', 'koleksi', 'ya', 'menu utama', 2),
(152, 0, 'Home', '', 'ya', 'menu utama', 1),
(155, 0, 'Artikel', 'artikel', 'ya', 'menu utama', 4),
(165, 0, 'Tentang', '', 'ya', 'menu utama', 5),
(166, 165, 'Sejarah Museum', 'page/sejarah_museum', 'ya', 'menu utama', 1),
(167, 165, 'Profile Museum', 'page/profile_museum', 'ya', 'menu utama', 2),
(168, 0, 'Reservasi', 'reservasi', 'ya', 'menu utama', 3),
(170, 0, 'Profile Museum', 'page/profile_museum', 'ya', 'menu bawah', 1),
(171, 0, 'Sejarah Museum', 'page/sejarah_museum', 'ya', 'menu bawah', 2),
(172, 0, 'FAQ', 'page/faq', 'ya', 'menu utama', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_web_slide`
--

CREATE TABLE `tb_web_slide` (
  `id_slide` int(5) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `link` varchar(128) NOT NULL,
  `ket` text NOT NULL,
  `gambar_besar` varchar(128) NOT NULL,
  `gambar_kecil` varchar(128) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_web_slide`
--

INSERT INTO `tb_web_slide` (`id_slide`, `judul`, `link`, `ket`, `gambar_besar`, `gambar_kecil`, `waktu`) VALUES
(28, 'Museum Monumen Perjuangan Rakyat Jawa Barat', 'https://www.youtube.com/watch?v=cviJPibkhvU&feature=youtu.be', 'Mari berkunjung ke Musuem', 'c94d213ec81f061fe80c47fa2c60709e.jpg', 'f1ac1a7a93dfe322e6137e27fc3a98cc.jpg', '2020-07-20 00:58:31'),
(29, 'Light Museum Monumen Perjuangan Rakyat Jawa Barat', 'artikel/detail/monumen-perjuangan-rakyat-jawa-barat-dan-upaya-peningkatannya', 'Museum Monumen Perjuangan Rakyat Jawa Barat', '118c5eb343de4fce71263f82ad03cc72.jpg', 'b01b82dd6a28f40a1635cd59d1bf86e8.jpg', '2020-07-20 01:02:27'),
(30, 'Ragam Koleksi Sejarah di Museum', 'artikel/detail/monumen-perjuangan-rakyat-jabar-sajikan-potret-perjuangan-mempertahankan-kemerdekaan', 'Jangan lupakan sejarah. Mari ke museum', '75b711186fe0785a375d4b59d1d16a1c.jpg', '594ceb7e9148c334008f6ef1f895383d.jpg', '2020-07-20 01:04:03'),
(31, 'Monumen Perjuangan Rakyat Jabar, Sajikan Potret Perjuangan Mempertahankan Kemerdekaan', 'artikel/detail/monumen-perjuangan-rakyat-jabar-sajikan-potret-perjuangan-mempertahankan-kemerdekaan', 'Monumen Perjuangan Rakyat Jawa Barat menjadi bukti sejarah bagaimana perjuangan rakyat Jawa Barat mempertahankan kemerdekaan dari tahun 1945-1949.', '773b8807853fffb8fc2211d392b47f62.jpg', '7b763799a42a8d3400e5938510e053b2.jpg', '2020-09-01 02:15:56'),
(32, 'Sejarah Lengkap Peristiwa Bandung Lautan Api', 'artikel/detail/sejarah-lengkap-peristiwa-bandung-lautan-api', 'Peristiwa Bandung Lautan Api adalah peristiwa kebakaran besar yang terjadi di kota Bandung, provinsi Jawa Barat, Indonesia pada 23 Maret 1946. ', 'd17349107ba1d770297b634666c9d374.jpg', 'd577684ab888365549bd2a8a96bc6a97.jpg', '2020-09-01 02:16:22'),
(33, 'Peringatan Bandung Lautan Api ke- 72 Digelar', 'artikel/detail/peringatan-bandung-lautan-api-ke-72-digelar', 'Berbagai rangkaian acara digelar untuk mengenang peristiwa bersejarah yang terjadi pada 24 Maret 1946 itu', 'aa507310351165d9d3496beaa3efe71d.jpg', '6c7f0c35dbf444cce1443a9dede388e9.jpg', '2020-09-01 02:17:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_alamat`
--
ALTER TABLE `tb_alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tb_blog_artikel`
--
ALTER TABLE `tb_blog_artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `fk_kategori_artikel` (`id_kategori`);

--
-- Indeks untuk tabel `tb_blog_kategori`
--
ALTER TABLE `tb_blog_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_blog_tag`
--
ALTER TABLE `tb_blog_tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indeks untuk tabel `tb_faq`
--
ALTER TABLE `tb_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indeks untuk tabel `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori_koleksi`
--
ALTER TABLE `tb_kategori_koleksi`
  ADD PRIMARY KEY (`id_kategori_koleksi`);

--
-- Indeks untuk tabel `tb_kategori_pengunjung`
--
ALTER TABLE `tb_kategori_pengunjung`
  ADD PRIMARY KEY (`id_kategori_pengunjung`);

--
-- Indeks untuk tabel `tb_koleksi`
--
ALTER TABLE `tb_koleksi`
  ADD PRIMARY KEY (`id_koleksi`);

--
-- Indeks untuk tabel `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indeks untuk tabel `tb_negara`
--
ALTER TABLE `tb_negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `fk_alamat` (`id_alamat`);

--
-- Indeks untuk tabel `tb_pengguna_token`
--
ALTER TABLE `tb_pengguna_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indeks untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indeks untuk tabel `tb_saran_masukan`
--
ALTER TABLE `tb_saran_masukan`
  ADD PRIMARY KEY (`id_saran_masukan`);

--
-- Indeks untuk tabel `tb_statistik`
--
ALTER TABLE `tb_statistik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_subs`
--
ALTER TABLE `tb_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ukuran_koleksi`
--
ALTER TABLE `tb_ukuran_koleksi`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `tb_web_identitas`
--
ALTER TABLE `tb_web_identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indeks untuk tabel `tb_web_logo`
--
ALTER TABLE `tb_web_logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indeks untuk tabel `tb_web_menu`
--
ALTER TABLE `tb_web_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tb_web_slide`
--
ALTER TABLE `tb_web_slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_alamat`
--
ALTER TABLE `tb_alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_blog_artikel`
--
ALTER TABLE `tb_blog_artikel`
  MODIFY `id_artikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT untuk tabel `tb_blog_kategori`
--
ALTER TABLE `tb_blog_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `tb_blog_tag`
--
ALTER TABLE `tb_blog_tag`
  MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_faq`
--
ALTER TABLE `tb_faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_koleksi`
--
ALTER TABLE `tb_kategori_koleksi`
  MODIFY `id_kategori_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_pengunjung`
--
ALTER TABLE `tb_kategori_pengunjung`
  MODIFY `id_kategori_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_koleksi`
--
ALTER TABLE `tb_koleksi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5003;

--
-- AUTO_INCREMENT untuk tabel `tb_negara`
--
ALTER TABLE `tb_negara`
  MODIFY `id_negara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna_token`
--
ALTER TABLE `tb_pengguna_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `provinsi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_saran_masukan`
--
ALTER TABLE `tb_saran_masukan`
  MODIFY `id_saran_masukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_statistik`
--
ALTER TABLE `tb_statistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_subs`
--
ALTER TABLE `tb_subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_web_identitas`
--
ALTER TABLE `tb_web_identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_web_logo`
--
ALTER TABLE `tb_web_logo`
  MODIFY `id_logo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_web_menu`
--
ALTER TABLE `tb_web_menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT untuk tabel `tb_web_slide`
--
ALTER TABLE `tb_web_slide`
  MODIFY `id_slide` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_blog_artikel`
--
ALTER TABLE `tb_blog_artikel`
  ADD CONSTRAINT `fk_kategori_artikel` FOREIGN KEY (`id_kategori`) REFERENCES `tb_blog_kategori` (`id_kategori`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_kategori_koleksi`
--
ALTER TABLE `tb_kategori_koleksi`
  ADD CONSTRAINT `tb_kategori_koleksi_ibfk_1` FOREIGN KEY (`id_kategori_koleksi`) REFERENCES `tb_koleksi` (`id_kategori_koleksi`);

--
-- Ketidakleluasaan untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `fk_alamat` FOREIGN KEY (`id_alamat`) REFERENCES `tb_alamat` (`id_alamat`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
