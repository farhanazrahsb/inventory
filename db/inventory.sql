-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 25 Jul 2024 pada 01.26
-- Versi server: 5.7.36
-- Versi PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_category`
--

DROP TABLE IF EXISTS `p_category`;
CREATE TABLE IF NOT EXISTS `p_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`) VALUES
(4, 'Konsumsi', '2024-07-23 21:41:52', '2024-07-24 07:23:33'),
(5, 'Pembersih', '2024-07-24 07:15:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

DROP TABLE IF EXISTS `p_item`;
CREATE TABLE IF NOT EXISTS `p_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `barcode` (`barcode`),
  KEY `p_item_ibfk_1` (`category_id`),
  KEY `p_item_ibfk_2` (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `created`, `updated`) VALUES
(1, 'A001', 'Kopi', 4, 3, 10000, 100, '2024-07-24 11:41:29', '2024-07-25 06:55:04'),
(4, 'A002', 'Teh', 4, 2, 6000, 100, '2024-07-24 11:43:37', '2024-07-25 06:55:16'),
(6, 'A003', 'Pasta Gigi', 5, 2, 8000, 100, '2024-07-24 12:04:51', '2024-07-25 06:55:30'),
(11, 'A004', 'Sabun Mandi', 5, 2, 3000, 100, '2024-07-24 13:21:46', '2024-07-25 06:55:34'),
(12, 'A005', 'Sampo', 5, 2, 12000, 100, '2024-07-24 13:22:22', '2024-07-25 06:55:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_unit`
--

DROP TABLE IF EXISTS `p_unit`;
CREATE TABLE IF NOT EXISTS `p_unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(2, 'Pack', '2024-07-24 11:30:00', NULL),
(3, 'Bungkus', '2024-07-24 11:30:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_total` int(11) NOT NULL,
  `price_total` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `date`, `item_id`, `item_total`, `price_total`, `created`, `updated`) VALUES
(1, '2024-07-23', 4, 1, 10000, '2024-07-24 16:59:32', '2024-07-25 06:49:31'),
(2, '2024-07-25', 1, 2, 2000, '2024-07-25 07:38:26', NULL),
(3, '2024-07-25', 1, 4, 25000, '2024-07-25 07:40:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(8, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Farhan', 'Jl. Mana', 1),
(9, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'Azra', 'Jl. Bebas0', 2);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
