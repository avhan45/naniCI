-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2022 pada 04.32
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nani3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `crips`
--

CREATE TABLE `crips` (
  `id_crips` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `crips` varchar(100) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `crips`
--

INSERT INTO `crips` (`id_crips`, `id_kriteria`, `crips`, `keterangan`, `nilai`) VALUES
(2, 1, 'Menyusun dan membuat rencana pembelajaran', 'A', '35'),
(3, 1, 'Melakukan penilaian dan mengevaluasi peserta didik', 'B', '25'),
(4, 1, 'mengembangkan kurikulum dengan baik', 'C', '20'),
(5, 1, 'Menerapkan pembelajaran yang mendidik', 'D', '10'),
(6, 1, 'Melaksanakan pembelajaran dengan baik', 'E', '10'),
(7, 2, 'Berperilaku sesuai dengan nilai dan norma', 'A', '30'),
(8, 2, 'Tegas dan Bertanggung jawab', 'B', '20'),
(9, 2, 'Mampu bekerja sama dalam tim', 'C', '20'),
(10, 2, 'mempunyai jiwa kepemimpinan', 'D', '20'),
(11, 2, 'Mandiri dan bijaksana', 'E', '10'),
(12, 4, 'Menguasai materi pelajaran dengan baik', 'A', '40'),
(13, 4, 'Menguasai standar kompetensi (SK), Kompetensi Dasar (KD),  dan tujuan pembelajaran dengan baik', 'B', '30'),
(14, 4, 'Mampu mengembangkan materi pelajaran dengan kreatif', 'C', '20'),
(15, 4, 'Mampu memanfaatkan teknologi informasi dan komunikasi dalam proses pembelajaran', 'D', '10'),
(16, 5, 'Mampu berkomunikasi dan bergaul secara efektif dengan sesama pendidik, tenaga kependidikan dan atasa', 'A', '40'),
(17, 5, 'Mampu bergaul dan berkomunikasi secara efektif dengan peserta didik, orang tua peserta didik dan mas', 'B', '30'),
(18, 5, 'Mampu berkomunikasi dengan baik secara lisan, tulisan dan isyarat. ', 'C', '20'),
(19, 5, 'mampu dalam mengambil keputusan dengan baik', 'D', '10'),
(20, 6, 'melaksanakan tata tertib sekolah dengan baik', 'A', '40'),
(21, 6, 'tepat waktu dalam mengajar', 'B', '30'),
(22, 6, 'Mengakhiri pembelajaran tepat waktu', 'C', '20'),
(23, 6, 'Rapi dalam berpenampilan', 'D', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `nip`, `alamat`) VALUES
(1, 'ANDRIANI, S.Pd', 2147483647, 'Kendari'),
(3, 'BASNES', 2147483647, 'Wua Wua'),
(4, 'DARLIA, S.Pd', 2147483647, 'Mandonga'),
(5, 'DAUD, S.Pd', 2147483647, 'Lepo Lepo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(20) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `attribut` varchar(20) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `kriteria`, `attribut`, `bobot`) VALUES
(1, 'C1', 'nilai keterampilan mengajar', 'benefit', 30),
(2, 'C2', 'nilai kepribadian', 'benefit', 25),
(4, 'C3', 'nilai profesional', 'benefit', 15),
(5, 'C4', 'nilai sosial', 'benefit', 20),
(6, 'C5', 'nilai kedisiplinan', 'benefit', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_crips` int(11) NOT NULL,
  `nilai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_guru`, `id_kriteria`, `id_crips`, `nilai`) VALUES
(15, 1, 1, 2, '5'),
(16, 1, 2, 11, '4'),
(19, 1, 4, 15, '4'),
(20, 1, 5, 19, '4'),
(21, 1, 6, 23, '5'),
(22, 3, 1, 6, '4'),
(23, 3, 2, 11, '3'),
(24, 3, 4, 15, '3'),
(25, 3, 5, 19, '3'),
(26, 3, 6, 23, '2'),
(27, 4, 1, 6, '5'),
(28, 4, 2, 11, '3'),
(29, 4, 4, 15, '4'),
(30, 4, 5, 19, '3'),
(31, 4, 6, 23, '5'),
(32, 5, 1, 6, '4'),
(33, 5, 2, 11, '3'),
(34, 5, 4, 15, '2'),
(35, 5, 5, 19, '3'),
(36, 5, 6, 23, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `normalisasi`
--

CREATE TABLE `normalisasi` (
  `id_normalisasi` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_normalisasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `normalisasi`
--

INSERT INTO `normalisasi` (`id_normalisasi`, `id_guru`, `id_kriteria`, `nilai_normalisasi`) VALUES
(1, 1, 1, '1.00'),
(2, 1, 2, '1.00'),
(3, 1, 4, '1.00'),
(4, 1, 5, '1.00'),
(5, 1, 6, '1.00'),
(6, 3, 1, '0.80'),
(7, 3, 2, '0.75'),
(8, 3, 4, '0.75'),
(9, 3, 5, '0.75'),
(10, 3, 6, '0.40'),
(11, 4, 1, '1.00'),
(12, 4, 2, '0.75'),
(13, 4, 4, '1.00'),
(14, 4, 5, '0.75'),
(15, 4, 6, '1.00'),
(16, 5, 1, '0.80'),
(17, 5, 2, '0.75'),
(18, 5, 4, '0.50'),
(19, 5, 5, '0.75'),
(20, 5, 6, '0.40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perhitungan`
--

CREATE TABLE `perhitungan` (
  `id_perhitungan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_perhitungan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perhitungan`
--

INSERT INTO `perhitungan` (`id_perhitungan`, `id_guru`, `id_kriteria`, `nilai_perhitungan`) VALUES
(1, 1, 1, 0.3),
(2, 3, 1, 0.24),
(3, 4, 1, 0.3),
(4, 5, 1, 0.24),
(5, 1, 2, 0.25),
(6, 3, 2, 0.1875),
(7, 4, 2, 0.1875),
(8, 5, 2, 0.1875),
(9, 1, 4, 0.15),
(10, 3, 4, 0.1125),
(11, 4, 4, 0.15),
(12, 5, 4, 0.075),
(13, 1, 5, 0.2),
(14, 3, 5, 0.15),
(15, 4, 5, 0.15),
(16, 5, 5, 0.15),
(17, 1, 6, 0.15),
(18, 3, 6, 0.06),
(19, 4, 6, 0.15),
(20, 5, 6, 0.06);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rangking`
--

CREATE TABLE `rangking` (
  `id_rangking` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nilai_rangking` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rangking`
--

INSERT INTO `rangking` (`id_rangking`, `id_guru`, `nilai_rangking`) VALUES
(1, 1, '1.05000002'),
(2, 3, '0.74999999'),
(3, 4, '0.93750002'),
(4, 5, '0.71250000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `crips`
--
ALTER TABLE `crips`
  ADD PRIMARY KEY (`id_crips`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id_normalisasi`);

--
-- Indeks untuk tabel `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`id_perhitungan`);

--
-- Indeks untuk tabel `rangking`
--
ALTER TABLE `rangking`
  ADD PRIMARY KEY (`id_rangking`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `crips`
--
ALTER TABLE `crips`
  MODIFY `id_crips` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id_normalisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `id_perhitungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `rangking`
--
ALTER TABLE `rangking`
  MODIFY `id_rangking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
