-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 05:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewakuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(128) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `qty` int(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_uuid`, `qty`, `user_id`, `email`, `created_at`, `updated_at`) VALUES
(5, '76e8462e-bcba-11eb-ab96-d8c4976ac772', 1, 8, '', '2021-06-03 19:09:19', '2021-06-03 19:09:19'),
(6, 'ff808f08b5bb34e72048a4e964e993e0', 1, 8, '', '2021-06-03 19:09:23', '2021-06-03 19:09:23'),
(7, '143a2eed342d5e31f0d42568f9ff26d1', 1, 8, '', '2021-06-03 19:09:37', '2021-06-03 19:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `uuid` varchar(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL DEFAULT 0,
  `stock` int(128) NOT NULL,
  `condition_product` varchar(32) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `uuid`, `user_id`, `name`, `price`, `image1`, `image2`, `image3`, `descriptions`, `category`, `rating`, `stock`, `condition_product`, `created_at`, `updated_at`) VALUES
(1, '76e8462e-bcba-11eb-ab96-d8c4976ac772', 5, 'Robot', 11349000, 'laptop1.jpg', 'laptop2.jpg', 'laptop3.jpg', 'Processor : Intel core i5 10200\r\nMemory : 8GB\r\nStorage : 512GB SSD\r\nGraphics : NVIDIA GTX1650Ti 4GB\r\nOp.System : Windows 10 \r\nDisplay : 15.6FHD\r\n\r\nKelengkapan :\r\n- Unit Laptop\r\n- Charger\r\n- Kartu Garansi\r\n- Box / Dus Laptop\r\n- BACKPACK AIR\r\n', 'Notebook', 0, 10, 'New', NULL, '2021-05-26 02:46:28'),
(49, 'a30d387607bbac4416e4dda9959f06fc', 1, '22', 22, 'fotocu.jpg', 'fotocu.jpg', 'fotocu.jpg', '222', 'Notebook', 0, 222, 'New', '2021-05-26 02:36:22', '2021-05-26 02:36:22'),
(51, '40f577f6a605baf677d7fe9586671d6a', 2, 'Teeeess', 10000, 'laptop2.jpg', 'avatar.jpg', 'banner-3.jpg', 'Tessseess', 'Notebook', 0, 10, 'New', '2021-05-26 03:17:05', '2021-05-26 03:17:05'),
(52, '476d5da12adca4a5d137ee56623dc6a4', 5, 'Laptop Asus Terbaru ‘ZenBook 1', 200000, 'laptop-asus-terbaru-8-534x400.jpg', 'data.jpg', 'aadb3168125526988bda406208dabe4e.jpg', 'ZenBook UX331UAL memiliki ketebalan yang sama seperti saudaranya, ZenBook UX331UN yakni hanya 13,9 milimeter. Tetapi kelebihan seri ZenBook UX331UAL memiliki bobot lebih ringan, yaitu di bawah 1 kilogram tepatnya 985 gram. Ini karena laptop Asus terbaru ini menggunakan konstruksi magnesium alloy yang sangat ringan dan penggunaan integrated graphics. Selain agar lebih sejuk, lebih hemat energi dan pada akhirnya membantu bobot laptop keseluruhan menjadi lebih enteng.', 'Notebook', 0, 20, 'New', '2021-05-26 03:22:46', '2021-05-26 03:22:46'),
(53, 'ff808f08b5bb34e72048a4e964e993e0', 5, 'Laptop Asus Terbaru ‘ZenBook 1', 2000000, 'laptop-asus-terbaru-8-534x400_1.jpg', 'aadb3168125526988bda406208dabe4e.jpg', 'data.jpg', 'Pada ZenBook 13 UX331UAL diperkuat oleh prosesor tercepat Intel Core i generasi ke-8, yakni Core i5-8250U. Demi menopang performa tinggi yang ditawarkan, ASUS memadankan prosesor tersebut dengan RAM tercepat 8GB DDR4 2133MHz. Sedangkan pada penyimpanan kecepatan tinggi dan handal laptop ini berbasis M.2 SSD dengan kapasitas 256GB.\r\n\r\nUntuk dapur pacu Asus ZenBook 13 UX331UAL menyematkan prosesor dengan dua varian yakni, Core i7-8850U dengan RAM 16GB LPDDR3 dan internal storage 512GB SSD atau Core i5-8250U dengan RAM 8GB LPDDR3 dan internal storage 256GB. Kedua varian tersebut telah dibenamkan GPU bertenaga berbasis Nvidia GeForce MX150 dengan VRAM 2GB di dalamnya.', 'Notebook', 0, 20, 'New', '2021-05-26 03:24:50', '2021-05-26 03:24:50'),
(54, '143a2eed342d5e31f0d42568f9ff26d1', 8, 'Gaming Screen', 1200000, 'HUD_TES1.jpg', '', '', 'Laptop atau komputer jinjing adalah komputer pribadi yang berukuran relatif kecil dan ringan. Beratnya berkisar dari 1–6 kg, tergantung pada ukuran, bahan, dan spesifikasi laptop tersebut. Sumber daya laptop berasal dari baterai atau adaptor A/C yang dapat digunakan untuk mengisi ulang baterai dan menyalakan laptop itu sendiri. Baterai laptop pada umumnya dapat bertahan sekitar 2 hingga 6 jam sebelum akhirnya habis, tergantung dari cara pemakaian, spesifikasi, dan ukuran baterai. Laptop terkadang disebut juga dengan komputer notebook atau notebook saja.\r\n\r\nSebagai komputer pribadi, laptop memiliki fungsi yang sama dengan komputer desktop (desktop computers) pada umumnya. Komponen yang terdapat di dalamnya sama persis dengan komponen pada desktop, hanya saja ukurannya diperkecil, dijadikan lebih ringan, lebih tidak panas, dan lebih hemat daya.', '1', 0, 122, 'New', '2021-06-03 07:35:29', '2021-06-03 16:17:09'),
(55, 'c96a47e251bed31a251cf41605f2d0df', 8, '3D File', 2000000, 'avatar_1.jpg', 'laptop2_1.jpg', 'HUD_TES1.jpg', 'A', 'Notebook', 0, 22, 'New', '2021-06-03 07:50:41', '2021-06-03 07:50:41'),
(56, '56b3f5ea6184d78f266297e0ab0256a2', 8, 'Tes lageee', 1222222, 'laptop2_2.jpg', 'me.jpg', 'Bambang Merah-Baru.jpg', 'Laptop kebanyakan menggunakan layar LCD (Liquid Crystal Display) berukuran 10 inci hingga 17 inci tergantung dari ukuran laptop itu sendiri. Selain itu, papan ketik yang terdapat pada laptop juga kadang-kadang dilengkapi dengan papan sentuh yang berfungsi sebagai \"pengganti\" tetikus. Papan ketik dan tetikus tambahan dapat dipasang melalui soket Universal Serial Bus maupun PS/2 jika tersedia.', 'Notebook', 0, 12, 'New', '2021-06-03 07:54:41', '2021-06-03 07:54:41'),
(57, 'b6d54818db8576a0db671cf445c152dd', 8, 'Tes lagieeiee', 22222, 'avatar_2.jpg', 'avatar_1.jpg', 'avatar_1.jpg', 'tes', 'Smartphone', 0, 2222, 'New', '2021-06-03 07:59:59', '2021-06-03 07:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(128) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` int(8) NOT NULL,
  `balance` int(255) NOT NULL,
  `reputation` int(128) NOT NULL,
  `phone` int(128) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `avatar`, `email`, `password`, `isAdmin`, `balance`, `reputation`, `phone`, `created_at`, `updated_at`) VALUES
(2, '', 'avatar.jpg', 'rahasia@gmail.com', '$2y$10$1slSCOQ3Y3CZlYt755JHkuL2DpoP/9WGCd3WJs2.8fhBo4TqvTOCW', 0, 0, 80, NULL, '2021-05-25 19:21:01', '2021-05-25 19:21:01'),
(5, 'Bambang Gunawan', 'avatar.jpg', 'bambanggunawan887@gmail.com', '$2y$10$a6CdxAMuvqQhE326peLDOeLfVAnOXIYA4RvAzWVCrt5FwXgJrAyzm', 1, 12020000, 78, NULL, '2021-05-25 19:40:35', '2021-05-25 19:40:35'),
(6, '', 'avatar.jpg', 'eko@gmail.com', '$2y$10$Uzit1RfGIATy7QsiRqhr9u1wUJiu/drp345IbMU6NYwRS23ya8pY.', 0, 0, 99, NULL, '2021-05-25 20:05:31', '2021-05-25 20:05:31'),
(7, '', 'avatar.jpg', 'paw@test.com', '$2y$10$KmVs2M6PkRgorAA7vtkc2.biXoCiUdX1j.uO1sfFrQ2Qs/nm0pAPq', 0, 0, 0, NULL, '2021-05-26 02:50:16', '2021-05-26 02:50:16'),
(8, 'Bambang', 'avatar.jpg', '123@gmail.com', '$2y$10$LiMvbkEkoxJ8h9edfBCnjeuy.p6.iSUWBMJsdogjWMJFMPaELg0wK', 1, 20000000, 99, NULL, '2021-06-03 06:00:23', '2021-06-03 06:00:23'),
(9, '', '', '321@gmail.com', '$2y$10$vSLYNafjoPWpQwqeN168suTrAvYHVPhwrIdg0pHDcQeD4ZPSI0FOO', 0, 0, 0, NULL, '2021-06-03 06:02:06', '2021-06-03 06:02:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
