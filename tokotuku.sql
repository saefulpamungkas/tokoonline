-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 01:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokotuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'CANON'),
(2, 'FUJIFILM'),
(3, 'SONY');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_pengiriman` varchar(200) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_pengiriman`, `tarif`) VALUES
(1, 'JNE', 20000),
(2, 'JXT', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `telp_pelanggan` varchar(200) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telp_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'pelanggan@gmail.com', '123', 'Pelanggan', '081234233165', 'Sragen'),
(4, 'saeful@gmail.com', '123', 'Saeful Pamungkas', '08123456789', 'Jl Boyolayar Ngargosari Sumberlawang Sragen'),
(6, 'ipul@gmail.com', '123', 'Ipul', '0811223344', 'Jl Boyolayar Ngargosari Sumberlawang Sragen'),
(7, 'naruto@gmail.com', '123', 'Naruto', '0811223344', 'Jl Konoha Surakarta'),
(8, 'momon@gmail.com', '123', 'Momon', '081234233234', 'Jl Konoha Surakarta'),
(9, 'budi@mail.com', '123', 'Budi', '0811223344', 'Jl Konoha No 2 Surakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(22, 24, 'Ipul', 'BRI', 16020000, '2022-01-04', '20220104051841notaBRI.jpg'),
(23, 25, 'Pelanggan', 'BRI', 11020000, '2022-01-04', '20220104100202notaBRI.jpg'),
(24, 26, 'Saeful', 'BRI', 14020000, '2022-01-04', '20220104101343notaBRI.jpg'),
(25, 27, 'Saeful Pamungkas', 'BRI', 18020000, '2022-01-04', '20220104101900notaBRI.jpg'),
(26, 29, 'Saeful Pamungkas', 'BRI', 19020000, '2022-01-06', '20220106053821notaBRI.jpg'),
(27, 36, 'Pelanggan', 'BRI', 6020000, '2022-01-06', '20220106112252Star-Clipart-PNG.jpg'),
(28, 37, 'Naruto', 'BCA', 12020000, '2022-01-06', '20220106112819Star-Clipart-PNG.jpg'),
(29, 38, 'Pelanggan', 'BRI', 9020000, '2022-01-06', '20220106113614Star-Clipart-PNG.jpg'),
(30, 39, 'Naruto', 'BRI', 8020000, '2022-01-06', '20220106173351notaBRI.jpg'),
(31, 40, 'Momon', 'BRI', 12020000, '2022-01-07', '20220107033224notaBRI.jpg'),
(32, 41, 'Budi', 'BRI', 12020000, '2022-01-07', '20220107042136notaBRI.jpg'),
(33, 42, 'Saeful Pamungkas', 'BRI', 10020000, '2022-01-07', '20220107090519notaBRI.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_pengiriman` varchar(200) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(200) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_pengiriman`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(24, 6, 1, '2022-01-04', 16020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'barang dikirim', 'ABC123'),
(25, 1, 1, '2022-01-04', 11020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'barang dikirim', 'ABC123'),
(26, 4, 1, '2022-01-04', 14020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'barang dikirim', 'ABC123'),
(27, 4, 1, '2022-01-04', 18020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'Sudah saya kirim pembayaran', ''),
(28, 4, 1, '2022-01-05', 12020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'pending', ''),
(29, 4, 1, '2022-01-06', 19020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'barang dikirim', 'ABC123'),
(30, 1, 1, '2022-01-06', 12020000, 'JNE', 20000, 'Sragen', 'pending', ''),
(31, 1, 1, '2022-01-06', 8020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'pending', ''),
(32, 1, 1, '2022-01-06', 5020000, 'JNE', 20000, 'Sragen', 'pending', ''),
(33, 1, 1, '2022-01-06', 16020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'pending', ''),
(34, 4, 1, '2022-01-06', 6020000, 'JNE', 20000, 'Surakarata', 'pending', ''),
(35, 4, 1, '2022-01-06', 5020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'pending', ''),
(36, 1, 1, '2022-01-06', 6020000, 'JNE', 20000, 'Sragen', 'Sudah saya kirim pembayaran', ''),
(37, 7, 1, '2022-01-06', 12020000, 'JNE', 20000, 'Jl Konoha Surakarta', 'barang dikirim', 'ABC123'),
(38, 1, 1, '2022-01-06', 9020000, 'JNE', 20000, 'Jl Konohagakure Surakarta Jawa Tengah', 'lunas', 'ABC123'),
(39, 7, 1, '2022-01-06', 8020000, 'JNE', 20000, 'Jl Konoha Surakarta', 'Sudah saya kirim pembayaran', ''),
(40, 8, 1, '2022-01-07', 12020000, 'JNE', 20000, 'Jl Konoha Surakarta', 'barang dikirim', 'ABC123'),
(41, 9, 1, '2022-01-07', 12020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'barang dikirim', 'ABC123'),
(42, 4, 1, '2022-01-07', 10020000, 'JNE', 20000, 'Jl Boyolayar Ngargosari Sumberlawang Sragen', 'barang dikirim', 'ABC123');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`) VALUES
(25, 24, 8, 2, '', 0, 0),
(26, 24, 11, 1, '', 0, 0),
(27, 25, 8, 1, '', 0, 0),
(28, 25, 7, 1, '', 0, 0),
(29, 26, 8, 1, '', 0, 0),
(30, 26, 12, 1, '', 0, 0),
(31, 27, 8, 3, '', 0, 0),
(32, 28, 12, 1, '', 0, 0),
(33, 28, 11, 1, '', 0, 0),
(34, 36, 8, 1, '', 0, 0),
(35, 37, 8, 2, '', 0, 0),
(36, 38, 14, 1, '', 0, 0),
(37, 39, 13, 1, '', 0, 0),
(38, 40, 8, 2, '', 0, 0),
(39, 41, 8, 2, '', 0, 0),
(40, 42, 8, 1, '', 0, 0),
(41, 42, 11, 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(200) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(7, 1, 'Canon EOS850D', 5000000, 'canon EOS 850D.png', '•	Sensor APS-C CMOS 24,1 megapiksel+ perekaman video 4K\r\n•	45 titik AF semua tipe silang (jendela bidik) dan Dual Pixel CMOS AF (Live View)\r\n•	Konektivitas Wi-Fi + ergonomik dan interface yang mudah digunakan\r\n        ', 5),
(8, 1, 'Canon EOS RP', 6000000, 'canon EOS RP.png', '•	Sensor CMOS full-frame 26,2MP\r\n•	Kecepatan fokus 0,05 det.\r\n•	4.779 pilihan area fokus\r\n        ', 5),
(9, 1, 'Canon G7', 7000000, 'canon G7.png', '•	Prosesor Gambar DIGIC 8 & Sensor CMOS 1 inci\r\n•	4,2 x zoom optik (24mm - 100mm)\r\n•	30fps (Mode Raw Burst - One Shot AF)\r\n•	20,1 megapiksel\r\n•	Perekaman Video 4K (tanpa krop)\r\n•	Live Streaming\r\n', 5),
(10, 2, 'Fujifilm T3', 7000000, 'Fujifilm T3.png', 'Fujifilm X-T3 merupakan kamera mirrorless Fujifilm dengan ketajaman video Full HD. Didukung dengan ISO sebesar 160-12800, mirrorless Fujifilm X-T3 ini dilengkapi pula dengan viewfinder Electronic dan sensor CMOS APS-C. Rilis tahun: 2018.', 5),
(11, 2, 'Fujifil 50S', 4000000, 'Fujifilm 50S.png', '•	51.4MP 43.8 x 32.9mm CMOS Sensor\r\n•	X-Processor Pro Image Processor\r\n•	Removable 3.69m-Dot OLED EVF\r\n•	3.2″ 2.36m-Dot Tilting Touchscreen LCD\r\n•	117-Point Contrast-Detection AF System\r\n•	Extended ISO 50-102400, 3 fps Shooting\r\n•	Full HD 1080p Video Recording at 30 fps\r\n•	Multi Aspect Ratio Shooting\r\n', 5),
(12, 2, 'Fujifilm XA5', 8000000, 'fujiflm T3.png', '•	51.4MP 43.8 x 32.9mm CMOS Sensor\r\n•	X-Processor Pro Image Processor\r\n•	Removable 3.69m-Dot OLED EVF\r\n•	3.2″ 2.36m-Dot Tilting Touchscreen LCD\r\n•	117-Point Contrast-Detection AF System\r\n•	Extended ISO 50-102400, 3 fps Shooting\r\n•	Full HD 1080p Video Recording at 30 fps\r\n•	Multi Aspect Ratio Shooting\r\n', 5),
(13, 3, 'Sony RX10', 8000000, 'soni rx10.png', '•	New 20.2 MP (effective) 1.0-type Exmor RS™ CMOS sensor\r\n•	Bright ZEISS Vario-Sonnar T* 24-200mm F2.8 lens\r\n•	Superspeed shooting capabilities\r\n', 5),
(14, 3, 'Sony A7', 9000000, 'soni A7.png', 'Censor Full Frame 24,3MP\r\nSensor baru luar biasa ini memiliki semua elemen untuk gambar kelas dunia: resolusi tinggi, sensitivitas teratas, rentang dinamis ekstrem, detail tak tertandingi, dan noise rendah.        ', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
