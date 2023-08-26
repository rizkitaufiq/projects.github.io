-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Agu 2019 pada 21.17
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkkn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(100) NOT NULL,
  `nama_kelompok` varchar(100) NOT NULL,
  `lokasi` int(100) NOT NULL,
  `dpl` int(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `nama_kelompok`, `lokasi`, `dpl`, `latitude`, `longitude`) VALUES
(73, 'semboja', 35, 41, '-7.0195617158349135', '109.0894080637695'),
(74, 'randusari A', 35, 42, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(100) NOT NULL,
  `jenis_kkn` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `pendaftar` int(100) NOT NULL,
  `kuota` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `jenis_kkn`, `kabupaten`, `kecamatan`, `pendaftar`, `kuota`) VALUES
(35, 'Pemberdayaan Masyarakat', 'Tegal', 'Pagerbarang', 6, 100),
(36, 'Tematik', 'Purbalingga', 'Kalimanah', 2, 90),
(44, 'Tematik', 'Cilacap', 'Cilacap A', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelaporan`
--

CREATE TABLE `pelaporan` (
  `id_pelaporan` int(100) NOT NULL,
  `kelompok_kkn` int(100) NOT NULL,
  `kormades` int(100) NOT NULL,
  `tentatif` varchar(100) NOT NULL,
  `definitif` varchar(100) NOT NULL,
  `roadmap` varchar(100) NOT NULL,
  `lpj` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `komentar` varchar(255) NOT NULL,
  `revisi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelaporan`
--

INSERT INTO `pelaporan` (`id_pelaporan`, `kelompok_kkn`, `kormades`, `tentatif`, `definitif`, `roadmap`, `lpj`, `status`, `waktu`, `komentar`, `revisi`) VALUES
(18, 73, 12, 'tentatif_semboja.pdf', 'definitif_semboja.pdf', 'roadmap_semboja.pdf', 'lpj_semboja.pdf', 'diterima lppm', '2019-08-19 11:37:01', 'disahkan', 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawas`
--

CREATE TABLE `pengawas` (
  `id_pengawas` int(100) NOT NULL,
  `nama_pengawas` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status_pengawas` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengawas`
--

INSERT INTO `pengawas` (`id_pengawas`, `nama_pengawas`, `password`, `alamat`, `status_pengawas`) VALUES
(39, 'admin', 'admin', 'purwokerto', 1),
(41, 'Ibu Masfiah', 'Ibu M', 'Purwokerto Pusat', 2),
(42, 'dpl', 'dpl', 'Purwokerto ', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(100) NOT NULL,
  `penilai` int(100) NOT NULL,
  `menilai` varchar(100) NOT NULL,
  `keaktifan` int(100) NOT NULL,
  `kerjasama` int(100) NOT NULL,
  `disiplin` int(100) NOT NULL,
  `tanggung_jawab` int(100) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nilai` varchar(10) NOT NULL,
  `nilai_kelompok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `penilai`, `menilai`, `keaktifan`, `kerjasama`, `disiplin`, `tanggung_jawab`, `waktu`, `nilai`, `nilai_kelompok`) VALUES
(22, 13, 'Rizki', 95, 89, 93, 95, '2019-08-18 19:15:50', 'A', 73),
(23, 12, 'azmi', 76, 92, 90, 93, '2019-08-19 10:59:21', 'A', 73),
(24, 12, 'Lina', 75, 92, 86, 84, '2019-08-19 11:03:20', 'A', 73);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_kkn`
--

CREATE TABLE `peserta_kkn` (
  `id_peserta` int(100) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `lokasi_kkn` varchar(100) NOT NULL,
  `surat_cek_kesehatan` varchar(100) NOT NULL,
  `bukti_pendaftaran` varchar(100) NOT NULL,
  `konfirmasi` varchar(100) NOT NULL,
  `status_peserta` int(100) NOT NULL,
  `kelompok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta_kkn`
--

INSERT INTO `peserta_kkn` (`id_peserta`, `nama_mahasiswa`, `password`, `nim`, `lokasi_kkn`, `surat_cek_kesehatan`, `bukti_pendaftaran`, `konfirmasi`, `status_peserta`, `kelompok`) VALUES
(12, 'Rizki', 'rizki', 'H1D015009', '35', 'H1D015009', 'H1D015009', 'peserta', 3, 73),
(13, 'azmi', 'azmi', 'H1D015001', '35', 'H1D015001', 'H1D015001', 'peserta', 4, 73),
(14, 'Lina', 'lina', 'H1D015003', '35', 'H1D015003', 'H1D015003', 'peserta', 4, 73),
(15, 'Tama', 'tama', 'H1D015015', '35', 'H1D015015', 'H1D015015', 'peserta', 3, 74),
(16, 'rifqi', 'rifqi', 'H1D015004', '35', 'H1D015004', 'H1D015004', 'peserta', 4, 74),
(17, 'dejan', 'dejan', 'H1D015048', '35', 'H1D015048', 'H1D015048', 'peserta', 4, 74),
(18, 'example', 'example', 'example', '36', 'example', 'example', '', 0, 0),
(19, 'example1', 'example1', 'example1', '36', 'example1', 'example1', 'diterima', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'lppm'),
(2, 'dpl'),
(3, 'kormades'),
(4, 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`id_pelaporan`);

--
-- Indexes for table `pengawas`
--
ALTER TABLE `pengawas`
  ADD PRIMARY KEY (`id_pengawas`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `peserta_kkn`
--
ALTER TABLE `peserta_kkn`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `pelaporan`
--
ALTER TABLE `pelaporan`
  MODIFY `id_pelaporan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pengawas`
--
ALTER TABLE `pengawas`
  MODIFY `id_pengawas` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `peserta_kkn`
--
ALTER TABLE `peserta_kkn`
  MODIFY `id_peserta` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
