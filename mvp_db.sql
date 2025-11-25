-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2025 pada 15.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvp_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembalap`
--

CREATE TABLE `pembalap` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tim` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `poinMusim` int(11) DEFAULT 0,
  `jumlahMenang` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembalap`
--

INSERT INTO `pembalap` (`id`, `nama`, `tim`, `negara`, `poinMusim`, `jumlahMenang`) VALUES
(1, 'Lewis Hamilton', 'Mercedes', 'United Kingdom', 340, 11),
(2, 'Max Verstappen', 'Red Bull', 'Netherlands', 335, 10),
(3, 'Valtteri Bottas', 'Mercedes', 'Finland', 203, 2),
(4, 'Sergio Perez', 'Red Bull', 'Mexico', 190, 1),
(5, 'Carlos Sainz', 'Ferrari', 'Spain', 150, 0),
(6, 'Daniel Ricciardo', 'McLaren', 'Australia', 115, 1),
(7, 'Charles Leclerc', 'Ferrari', 'Monaco', 95, 0),
(8, 'Lando Norris', 'McLaren', 'United Kingdom', 88, 0),
(9, 'Pierre Gasly', 'AlphaTauri', 'France', 75, 0),
(10, 'Fernando Alonso', 'Alpine', 'Spain', 65, 0),
(11, 'kentang', 'Mercedes', 'United Kingdom', 23, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `race_event`
--

CREATE TABLE `race_event` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_laps` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `race_event`
--

INSERT INTO `race_event` (`id`, `nama`, `lokasi`, `tanggal`, `jumlah_laps`) VALUES
(1, 'MotoGP Qatar Grand Prix', 'Lusail International Circuit', '2025-03-10', 22),
(2, 'MotoGP Mandalika', 'Pertamina Mandalika Circuit', '2025-04-01', 27),
(3, 'F1 Bahrain GP', 'Sakhir Circuit', '2025-03-02', 57),
(4, 'F1 Monaco GP', 'Circuit de Monaco', '2025-05-25', 78),
(5, 'Superbike Indonesia Round', 'Mandalika Circuit', '2025-10-15', 19),
(6, 'daging', 'Mandalika', '2025-12-14', 19);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembalap`
--
ALTER TABLE `pembalap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `race_event`
--
ALTER TABLE `race_event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembalap`
--
ALTER TABLE `pembalap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `race_event`
--
ALTER TABLE `race_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
