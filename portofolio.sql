-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2021 pada 17.10
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portofolio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `nama`, `password`) VALUES
('Salman_Alfarissy', 'Salman Alfarissy', '3b72bb8777dbeeb0e878562f21dc68be');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'DEKSTOP'),
(2, 'MOBILE'),
(3, 'WEB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `project_id` varchar(50) NOT NULL,
  `nama_project` varchar(100) NOT NULL,
  `id_kategori` int(50) NOT NULL,
  `tanggal_project` date NOT NULL,
  `url_project` text NOT NULL,
  `detail_project` text NOT NULL,
  `slide1` text NOT NULL,
  `slide2` text NOT NULL,
  `slide3` text NOT NULL,
  `slide4` text NOT NULL,
  `slide5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`project_id`, `nama_project`, `id_kategori`, `tanggal_project`, `url_project`, `detail_project`, `slide1`, `slide2`, `slide3`, `slide4`, `slide5`) VALUES
('D001', 'Balanjokuy', 1, '2020-07-14', 'https://github.com/salmanalfarissy26/Balanjokuy.git', '<p>\r\n            Aplikasi balanjo kuy adalah aplikasi yang berbasis dekstop yang memudahkan suatu restauran, cafe maupun kantin dalam pengelolahan keuangan. Aplikasi ini mengkolaborasikan database sebagai penampungan data dalam transaksi. Aplikasi ini menggunakan 5 tabel dalam proses transaksi siantaranya table Detail_trans, Tkasir,Tmenu,Tpelanggan dan ttrans.\r\n            Beberapa fitura dari aplikasi ini diantaranya:\r\n            <ul>\r\n              <li>login untuk login admin ketika mengakses aplikasi ini.</li>\r\n              <li>Menu untuk meninputkan pesanan dan melakukan percetakan struk pesanan.</li>\r\n              <li>Detail Transaksi untuk menampilkan laporan transaksi baik harian,bulanan,maupun tahunan pada fitur ini kita juga bisa melakukan percetakan laporan detail transaksi tersebut.</li>\r\n            </ul>\r\n            jika tertarik mencoba aplikasi ini.Silahkan kunjungi link yang tersedia pada project information.\r\n          </p>', '131811desktop1.png', '555407desktop2.png', '555407desktop3.png', '555407desktop4.png', '555407desktop5.png'),
('D002', 'Project Sistem-Terdistribusi', 1, '2021-07-14', 'https://github.com/salmanalfarissy26/Sistem-Terdistribusi.git', 'Project Sistem Terdistribusi', '415253netbeans.jpg', '', '', '', ''),
('D003', 'Delphi-7-Citra-Digital', 1, '2021-07-12', 'https://github.com/salmanalfarissy26/Delphi-7-Citra-Digital.git', 'Project Delphi 7', '966244logo-delphi-7.jpg', '', '', '', ''),
('M001', 'AF Musik Player', 2, '2021-03-22', 'https://github.com/salmanalfarissy26/My_AF_Musik_Player.git', '<p>\r\n            Aplikasi Musik player online Dengan nama aplikasi,AF Musik Player adalah aplikasi yang memudahkan pengguna dalam mendengarkan musik secara online dan gratis.aplikasi ini akan menampilkan list dan memutar musik-musik  yang tersedia di soundclaude.Aplikasi dirancang dengan menggunakan API 21:Android 5.0(lollipop).Beberapa fitur dari aplikasi ini adalah:\r\n            <ul>\r\n              <li>Home untuk menampilkan menu utama dari aplikasi ini</li>\r\n              <li>List Lagu untuk menampilkan daftar lagu yang tersedia</li>\r\n              <li>Musik Player untuk melakukan play dan pause pada musik</li>\r\n              <li>About menampilkan tentang dari aplikasi ini sendiri</li>\r\n            </ul>\r\n            Jika tertarik untuk mecoba aplikasi ini.Silahkan kunjungi link project dari aplikasi ini yang tertera pada bagian project information.\r\n          </p>', '662144mobile.png', '662144mobile1.png', '662144mobile2.png', '662144mobile3.png', '662144mobile4.png'),
('M002', 'SIASIS Mobile', 2, '2021-07-05', 'https://github.com/salmanalfarissy26/SiasisMobile.git', '<p style=\r\n  \"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; padding: 0px; color: rgb(39, 40, 41); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">\r\n  SIASIS Mobile adalah aplikasi berbasis mobile yang di rancang untuk\r\n  memudahkan siswa dalam melakukan pengecekan serta memperbaiki biodata,melihat\r\n  daftar event-event yang di adakan sekolah,menyimpan raport,melihat jadwal\r\n  mata pelajaran,mengirim bukti pembayaran spp,melihat profil sekolah yang\r\n  berisi visi misi sekolah,dan data alumni.</p>\r\n\r\n  <p style=\r\n  \"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; padding: 0px; color: rgb(39, 40, 41); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">\r\n  Seperti itulah detail dari Aplikasi SIASIS mobile yang saya rancang.Jika\r\n  tertarik dengan project mobile tersebut silahkan kunjungi link yang tertera\r\n  pada bagian project information.</p>', '559219logo.png', '559219MobileSiasis1.JPG', '559219MobileSiasis2.JPG', '559219MobileSiasis5.JPG', '559219MobileSiasis4.JPG'),
('M003', 'Konversi-Angka-Huruf', 2, '2021-07-08', 'https://github.com/salmanalfarissy26/Konversi-Angka-Huruf.git', 'Mengkonversi dari angka ke huruf secara langsung', '651845androidstudio.png', '', '', '', ''),
('W001', 'Web', 3, '2020-07-14', 'https://github.com/salmanalfarissy26/berita.git', '<p>\r\n            Web berita adalah website yang di rancang untuk menampilkan informasi-informasi terbaru seputar olahraga,gaya hidup,politik dan lain-alin.Website ini dirancang untuk memenuhi tugas dari WEB programing saya semester 4.Adapn fitu-fitur dari Web tersebut seperti :\r\n            <ul>\r\n              <li>halaman utama untuk menampilkan informasi terkait berita-berita terbaru.</li>\r\n              <li>halaman Administrator untuk Menginputkan admin baru,berita,dan dari kategori berita.</li>\r\n            </ul> \r\n            Saya menggunakan bahasa php dan boostrap dalam pembuatan web tersebut.Seperti itulah detail dari web berita yang saya rancang.Jika tertarik dengan project web tersebut silahkan kunjungi link yang tertera pada bagian project information.\r\n          </p>', '399579web1.png', '399579web2.png', '399579web3.png', '', ''),
('W002', 'Web Admin SIASIS', 3, '2021-07-05', 'https://github.com/salmanalfarissy26/Web-SIASIS-Mobile.git', '<p style=\r\n  \"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; padding: 0px; color: rgb(39, 40, 41); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">\r\n  Web Admin SIASIS adalah website yang di rancang untuk Melakukan\r\n  penginputan,Update dan Delete data siswa,guru dan admin.Web ini memiliki 2\r\n  hak akses yaitu Administrator dan Guru,admin mengolah seluruh data baik\r\n  siswa,guru dan admin sendiri.sedangkan Guru hanya menglah data siswa seperti\r\n  penginputan raport siswa.Bahasa yang digunakan dalam pembuatan web ini adalah\r\n  php dan untuk tampilannya saya menggunakan bootstrap.</p>\r\n\r\n  <p style=\r\n  \"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; padding: 0px; color: rgb(39, 40, 41); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">\r\n  Seperti itulah detail dari Web Admin SIASIS yang saya rancang.Jika tertarik\r\n  dengan project web tersebut silahkan kunjungi link yang tertera pada bagian\r\n  project information.</p>', '753368WebSiasis1.JPG', '753368WebSiasis2.JPG', '753368WebSiasis3.JPG', '753368WebSiasis4.JPG', '753368WebSiasis5.JPG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
