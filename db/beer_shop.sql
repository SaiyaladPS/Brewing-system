-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 05:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beer_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(5) NOT NULL,
  `cate_name` varchar(50) NOT NULL,
  `variable` varchar(10) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `variable`, `remark`, `user_id`) VALUES
(1, 'ເບຍ', '1', '', 1),
(2, 'ນຳ້ອັດລົມ', '1', '', 1),
(3, 'ເຄື່ອງດື່ມຊູກໍາລັງ', '1', '', 1),
(4, 'ນຳ້ດື່ມ', '1', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(5) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `recover` varchar(5) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `fname`, `lname`, `tel`, `remark`, `recover`, `user_id`) VALUES
(1, 'ທ້າວ ຄໍາຫຼ້າ', 'ນາມມະວົງ', '02093311816', '', '1', 1),
(2, 'ທ້າວ ມີ', 'ແສນທາ', '02076967569', '', '1', 1),
(3, 'ທ້າວ ເພັດພູວັນ', 'ລາດສະບຸດ', '020 93153508', '', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dis_id` int(5) NOT NULL,
  `dis_name` varchar(50) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `recover` varchar(5) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dis_id`, `dis_name`, `pro_id`, `remark`, `recover`, `user_id`) VALUES
(1, 'ປາກອູ', 1, '', '1', 1),
(2, 'ຊຽງເງີນ', 1, '', '1', 1),
(3, 'ຫຼວງພະບາງ', 1, '', '1', 1),
(4, 'ໂພນໄຊ', 1, '', '1', 1),
(5, 'ນຳ້ບາກ', 1, '', '1', 1),
(6, 'ນາວຽງຄໍາ', 2, '', '1', 1),
(7, 'ໄຊຍະບູລີ', 7, '', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `or_id` int(5) NOT NULL,
  `bill_fly` varchar(50) NOT NULL,
  `odate` date NOT NULL,
  `otime` time NOT NULL,
  `pro_id` int(5) NOT NULL,
  `oqty` int(5) NOT NULL,
  `sprice` decimal(12,0) NOT NULL,
  `amount` decimal(12,0) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `cus_id` int(5) NOT NULL,
  `selec` varchar(5) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`or_id`, `bill_fly`, `odate`, `otime`, `pro_id`, `oqty`, `sprice`, `amount`, `remark`, `cus_id`, `selec`, `user_id`) VALUES
(1, '101101109', '2022-08-10', '10:10:52', 1, 3, 120000, 360000, '', 1, '2', 1),
(2, '101101109', '2022-08-10', '10:11:08', 6, 1, 110000, 110000, '', 1, '2', 1),
(3, '101101109', '2022-08-10', '10:11:39', 5, 1, 150000, 150000, '', 1, '2', 1),
(4, '101101233', '2022-08-10', '10:12:11', 3, 2, 100000, 200000, '', 2, '2', 1),
(5, '101101233', '2022-08-10', '10:12:32', 1, 5, 120000, 600000, '', 2, '2', 1),
(6, '101101233', '2022-08-10', '10:12:59', 6, 2, 110000, 220000, '', 2, '2', 1),
(7, '101121755', '2022-08-10', '12:18:02', 1, 1, 120000, 120000, '', 1, '2', 3),
(8, '101121857', '2022-08-11', '00:16:43', 1, 1, 120000, 120000, '', 1, '2', 1),
(9, '101121857', '2022-08-11', '00:16:56', 2, 1, 130000, 130000, '', 1, '2', 1),
(10, '101121857', '2022-08-11', '00:17:07', 1, 1, 120000, 120000, '', 1, '2', 1),
(11, '101121857', '2022-08-11', '00:17:18', 4, 2, 80000, 160000, '', 1, '2', 1),
(12, '101121857', '2022-08-11', '00:18:02', 4, 10, 80000, 800000, '', 1, '2', 1),
(13, '101121857', '2022-08-11', '00:18:13', 5, 1, 150000, 150000, '', 1, '2', 1),
(14, '101121857', '2022-08-11', '00:18:24', 3, 1, 100000, 100000, '', 1, '2', 1),
(15, '101121857', '2022-08-11', '00:18:34', 1, 1, 120000, 120000, '', 1, '2', 1),
(16, '101121857', '2022-08-11', '00:18:44', 1, 1, 120000, 120000, '', 1, '2', 1),
(17, '101121857', '2022-08-11', '00:18:56', 1, 2, 120000, 240000, '', 1, '2', 1),
(18, '101121857', '2022-08-11', '00:19:10', 2, 1, 130000, 130000, '', 1, '2', 1),
(19, '101023222', '2022-08-11', '14:32:21', 1, 1, 120000, 120000, '', 1, '2', 1),
(20, '101023222', '2022-08-11', '14:32:34', 2, 1, 130000, 130000, '', 1, '2', 1),
(21, '101070520', '2022-08-12', '11:50:02', 1, 3, 120000, 360000, '', 2, '2', 1),
(22, '101070520', '2022-08-12', '11:50:19', 1, 1, 120000, 120000, '', 2, '2', 1),
(23, '101070520', '2022-08-16', '19:06:32', 1, 1, 120000, 120000, '', 2, '2', 1),
(24, '101120502', '2022-08-17', '19:52:18', 8, 10, 170000, 1700000, '', 2, '2', 1),
(26, '101120502', '2022-08-21', '12:05:19', 1, 1, 120000, 120000, '', 2, '2', 1),
(27, '101120600', '2022-08-21', '12:05:51', 2, 1, 130000, 130000, '', 1, '2', 1),
(28, '101120600', '2022-08-21', '12:05:59', 1, 1, 120000, 120000, '', 1, '2', 1),
(30, '101044454', '2022-08-22', '16:45:00', 1, 1, 120000, 120000, '', 1, '2', 1),
(31, '101124310', '2022-08-22', '16:45:12', 2, 1, 130000, 130000, '', 2, '2', 1),
(32, '101124310', '2022-08-22', '16:45:21', 3, 20, 100000, 2000000, '', 2, '2', 1),
(33, '101124310', '2022-08-23', '12:34:12', 1, 2, 120000, 240000, '', 2, '2', 1),
(34, '101124310', '2022-08-23', '12:34:30', 3, 2, 100000, 200000, '', 2, '2', 1),
(35, '101124310', '2022-08-23', '12:36:35', 5, 1, 150000, 150000, '', 2, '2', 1),
(36, '101124310', '2022-08-23', '12:43:09', 2, 3, 130000, 390000, '', 2, '2', 1),
(37, '101124310', '2022-08-23', '12:43:35', 5, 2, 150000, 300000, '', 2, '2', 1),
(38, '101125058', '2022-08-23', '12:51:06', 1, 1, 120000, 120000, '', 3, '2', 1),
(39, '101010537', '2022-08-23', '13:05:45', 2, 2, 130000, 260000, '', 1, '2', 1),
(40, '101085913', '2022-08-23', '18:36:15', 1, 1, 120000, 120000, '', 1, '2', 2),
(41, '101085913', '2022-08-23', '20:59:12', 8, 2, 170000, 340000, '', 1, '2', 1),
(42, '101085913', '2022-08-23', '20:59:24', 5, 1, 150000, 150000, '', 1, '2', 1),
(43, '101120847', '2022-08-24', '00:09:03', 3, 2, 100000, 200000, '', 3, '2', 1),
(44, '101075028', '2022-08-24', '07:50:03', 1, 2, 120000, 240000, '', 1, '2', 2),
(45, '101075028', '2022-08-24', '07:50:11', 3, 1, 100000, 100000, '', 1, '2', 2),
(46, '101075028', '2022-08-24', '07:50:46', 8, 10, 170000, 1700000, '', 1, '2', 2),
(47, '101093012', '2022-08-24', '09:30:11', 8, 50, 170000, 8500000, '', 1, '1', 2),
(48, '101093012', '2022-08-24', '09:30:25', 7, 50, 110000, 5500000, '', 1, '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(5) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `cate_id` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `variable` varchar(10) NOT NULL,
  `bprice` decimal(12,0) NOT NULL,
  `sprice` decimal(12,0) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `cate_id`, `qty`, `variable`, `bprice`, `sprice`, `unit`, `remark`, `user_id`) VALUES
(1, 'ເບຍລາວ', 1, 120, '1', 100000, 120000, 'ລາງ', '', 1),
(2, 'ເບຍຊ້າງ', 1, 90, '1', 110000, 130000, 'ແກັດ', '', 1),
(3, 'ນຳ້ດື່ມໃຫຍ່', 4, 75, '1', 80000, 100000, 'ລາງ', '', 1),
(4, 'ນຳ້ດື່ມນ້ອຍ', 4, 88, '1', 60000, 80000, 'ລາງ', '', 1),
(5, 'M150', 3, 74, '1', 130000, 150000, 'ລາງ', '', 1),
(6, 'ເປບຊີ', 2, 97, '1', 90000, 110000, 'ລາງ', '', 1),
(7, 'ມີລີນດາ', 2, 30, '1', 90000, 110000, 'ລາງ', '', 1),
(8, 'leo', 1, 28, '1', 150000, 170000, 'ແກັດ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `pro_id` int(5) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL,
  `recover` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`pro_id`, `pro_name`, `remark`, `user_id`, `recover`) VALUES
(1, 'ຫຼວງພະບາງ', '', 1, '0'),
(2, 'ວຽງຈັນ', '', 1, '0'),
(3, 'ນະຄອນຫຼວງ', '', 1, '0'),
(4, 'ຈໍໍາປາສັກ', '', 1, '0'),
(5, 'ສະຫວັນນະເຂດ', '', 1, '1'),
(6, 'ບໍ່ແກ້ວ', '', 1, '1'),
(7, 'ໄຊຍະບູລີ', '', 1, '1'),
(8, 'ຫຼວງນຳ້ທາ', '', 1, '1'),
(9, 'ເຊກອງ', '', 1, '1'),
(10, 'ອັດຕະປື', '', 1, '1'),
(11, 'ບໍລິຄຳໄຊ', '', 1, '1'),
(12, 'ຊຽງຂວາງ', '', 1, '1'),
(13, 'ຫົວພັນ', '', 1, '1'),
(14, 'ຄຳມ່ວນ', '', 1, '1'),
(15, 'ຜົ້ງສາລີ', '', 1, '1'),
(16, 'ອຸດົມໄຊ', '', 1, '1'),
(17, 'ສາລະວັນ', '', 1, '1'),
(18, 'ໄຊສົມບູນ', '', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `receives`
--

CREATE TABLE `receives` (
  `re_id` int(5) NOT NULL,
  `rdate` date NOT NULL,
  `rtime` time NOT NULL,
  `pro_id` int(5) NOT NULL,
  `rqty` int(5) NOT NULL,
  `bprice` decimal(12,0) NOT NULL,
  `amount` decimal(12,0) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receives`
--

INSERT INTO `receives` (`re_id`, `rdate`, `rtime`, `pro_id`, `rqty`, `bprice`, `amount`, `remark`, `user_id`) VALUES
(1, '2022-08-10', '10:08:47', 1, 100, 100000, 10000000, '', 1),
(2, '2022-08-10', '10:08:54', 2, 100, 110000, 11000000, '', 1),
(3, '2022-08-10', '10:09:01', 3, 100, 80000, 8000000, '', 1),
(4, '2022-08-10', '10:09:07', 4, 100, 60000, 6000000, '', 1),
(5, '2022-08-10', '10:09:14', 5, 50, 130000, 6500000, '', 1),
(6, '2022-08-10', '10:09:23', 6, 100, 90000, 9000000, '', 1),
(7, '2022-08-10', '10:09:34', 7, 80, 90000, 7200000, '', 1),
(8, '2022-08-11', '00:21:34', 1, 20, 100000, 2000000, '', 1),
(9, '2022-08-12', '11:49:33', 1, 10, 100000, 1000000, '', 1),
(10, '2022-08-17', '19:48:11', 8, 100, 150000, 15000000, '', 1),
(11, '2022-08-20', '22:27:44', 1, 10, 100000, 1000000, '', 1),
(12, '2022-08-21', '12:14:44', 5, 20, 130000, 2600000, '', 1),
(13, '2022-08-22', '16:46:13', 1, 10, 100000, 1000000, '', 1),
(14, '2022-08-23', '21:32:17', 5, 10, 130000, 1300000, '', 1),
(15, '2022-08-24', '00:08:13', 3, 3, 80000, 240000, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `lname` varchar(80) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `pro_id` int(5) NOT NULL,
  `dis_id` int(5) NOT NULL,
  `vill_id` int(5) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `remark` varchar(50) NOT NULL,
  `recover` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `gender`, `dob`, `pro_id`, `dis_id`, `vill_id`, `tel`, `status`, `username`, `password`, `date`, `remark`, `recover`) VALUES
(1, 'ຄໍາຫຼ້າ', 'ນາມມະວົງ', 'ຊາຍ', '2002-10-15', 1, 1, 1, '02092465779', 'ບໍລິຫານ', 'k', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', '2022-07-24', '', '1'),
(2, 'ມີ', 'ແສນທາ', 'ຊາຍ', '2000-12-30', 3, 2, 2, '02076967569', 'ຜູ້ຊື້', 'me', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', '2022-07-24', '', '1'),
(3, 'ໄມວ່າ', 'ເຮີ', 'ຍີງ', '2002-04-08', 1, 1, 3, '02077445276', 'ຜູ້ຂາຍ', 'm', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', '2022-07-24', '', '1'),
(4, 'mona', 'BLL', 'ຊາຍ', '2002-11-02', 7, 7, 3, '20551254', 'ບໍລິຫານ', 'mona', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2023-12-26', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `vill_id` int(5) NOT NULL,
  `vill_name` varchar(50) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `dis_id` int(5) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `recover` varchar(5) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`vill_id`, `vill_name`, `pro_id`, `dis_id`, `remark`, `recover`, `user_id`) VALUES
(1, 'ໂພນໂຮມ', 1, 1, '', '1', 1),
(2, 'ໂນນສະຫວ່າງ', 2, 6, '', '1', 1),
(3, 'ນາຕໍນ້ອຍ', 7, 7, '', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `receives`
--
ALTER TABLE `receives`
  ADD PRIMARY KEY (`re_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`),
  ADD KEY `vill_id` (`vill_id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`vill_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dis_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `or_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `receives`
--
ALTER TABLE `receives`
  MODIFY `re_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `vill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`),
  ADD CONSTRAINT `district_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `province_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `receives`
--
ALTER TABLE `receives`
  ADD CONSTRAINT `receives_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`),
  ADD CONSTRAINT `receives_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `village_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`),
  ADD CONSTRAINT `village_ibfk_2` FOREIGN KEY (`dis_id`) REFERENCES `district` (`dis_id`),
  ADD CONSTRAINT `village_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
