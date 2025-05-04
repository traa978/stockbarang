-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2025 pada 14.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockbarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `Kategori` varchar(50) NOT NULL,
  `Merek` varchar(50) NOT NULL,
  `Tipe` varchar(200) NOT NULL,
  `Penerima` varchar(50) NOT NULL,
  `TanggalKeluar` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barangkeluar`
--

INSERT INTO `barangkeluar` (`idkeluar`, `idbarang`, `Kategori`, `Merek`, `Tipe`, `Penerima`, `TanggalKeluar`, `qty`) VALUES
(1, 1, 'Handphone', 'iPhone', 'Apple iPhone 13 Pro Max', 'Diborong', '2025-05-04 11:58:49', 50),
(2, 2, 'Laptop', 'Advan', 'Advan Workplus /Ryzen 5-6600H/16GB/512GB SSD/14″ FHD IPS/Win 11 Home/Silver', 'Diborong', '2025-05-04 11:59:45', 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `Kategori` varchar(50) NOT NULL,
  `Merek` varchar(50) NOT NULL,
  `Tipe` varchar(200) NOT NULL,
  `Keterangan` varchar(200) NOT NULL,
  `TanggalMasuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barangmasuk`
--

INSERT INTO `barangmasuk` (`idmasuk`, `idbarang`, `Kategori`, `Merek`, `Tipe`, `Keterangan`, `TanggalMasuk`, `qty`) VALUES
(1, 1, 'Handphone', 'iPhone', 'Apple iPhone 13 Pro Max', 'Restock', '2025-05-04 10:44:11', 30),
(2, 3, 'Laptop', 'Asus', 'Asus TUF F15 FX506LH-I565B6B /Core i5-10300H/8GB/512GB SSD/VGA 4GB/15.6″/Win 10 Home/Bonfire Black', 'Restock', '2025-05-04 10:45:28', 20),
(3, 2, 'Laptop', 'Advan', 'Advan Workplus /Ryzen 5-6600H/16GB/512GB SSD/14″ FHD IPS/Win 11 Home/Silver', 'Restock', '2025-05-04 10:47:52', 5),
(4, 2, 'Laptop', 'Advan', 'Advan Workplus /Ryzen 5-6600H/16GB/512GB SSD/14″ FHD IPS/Win 11 Home/Silver', 'Restock', '2025-05-04 10:48:29', 5),
(5, 3, 'Laptop', 'Asus', 'Asus TUF F15 FX506LH-I565B6B /Core i5-10300H/8GB/512GB SSD/VGA 4GB/15.6″/Win 10 Home/Bonfire Black', 'Restock', '2025-05-04 11:20:13', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `loginform`
--

CREATE TABLE `loginform` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `loginform`
--

INSERT INTO `loginform` (`iduser`, `email`, `username`, `password`, `role`) VALUES
(1, '', 'Vinci', '12345', 'Admin'),
(21, 'awkawokawok@gmail.com', 'Artt', '12345', 'Developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `NamaBarang` varchar(25) NOT NULL,
  `Kategori` varchar(50) NOT NULL,
  `Merek` varchar(50) NOT NULL,
  `Tipe` varchar(200) NOT NULL,
  `Lokasi` varchar(50) NOT NULL,
  `Harga` int(50) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`idbarang`, `NamaBarang`, `Kategori`, `Merek`, `Tipe`, `Lokasi`, `Harga`, `stock`) VALUES
(1, 'iPhone 13 Pro Max', 'Handphone', 'iPhone', 'Apple iPhone 13 Pro Max', 'Rak A2, Lantai 1', 12000000, 1),
(2, 'Advan Workplus', 'Laptop', 'Advan', 'Advan Workplus /Ryzen 5-6600H/16GB/512GB SSD/14″ FHD IPS/Win 11 Home/Silver', 'Rak A1, Lantai 1', 7599000, 1),
(3, 'Asus TUF F15', 'Laptop', 'Asus', 'Asus TUF F15 FX506LH-I565B6B /Core i5-10300H/8GB/512GB SSD/VGA 4GB/15.6″/Win 10 Home/Bonfire Black', 'Rak A1, Lantai 1', 13200000, 34);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indeks untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indeks untuk tabel `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `loginform`
--
ALTER TABLE `loginform`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
