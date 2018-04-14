-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2018 lúc 12:59 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date_ordered` date NOT NULL,
  `total` double NOT NULL,
  `token` varchar(40) COLLATE utf16_unicode_ci NOT NULL,
  `token_date` varchar(30) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_ordered`, `total`, `token`, `token_date`) VALUES
(1, 1, '2018-03-27', 55, '90youKsjq8FTdLD1wZjbUQUUU0xVXy', '1522155556'),
(4, 4, '2018-03-27', 67, 'iA3LFGdhFbJP7E5ioeOZkdRsBvi5ix', '1522156083'),
(14, 14, '2018-03-27', 20, '6Z853HD0WML4CYhcZFDsIhakuMmysv', '1522156801'),
(15, 15, '2018-03-31', 25, 'l0evhziEujybGe1cIbTQVbztGluKa', '1522502135');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `bill_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 7, 1, 55),
(2, 4, 3, 1, 12),
(3, 4, 7, 1, 55),
(4, 14, 5, 1, 20),
(5, 15, 8, 1, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `phone`) VALUES
(1, 'tèo', 'nanopro1410@gmail.com', '112', '123'),
(4, 'nguoiwf bạn A', 'nanopro14@gmail.com', '123', '12312313'),
(14, 'nguoiwf bạn A', 'nanopro1410@gmail.com', 'nanopro14@gmail.com', '1234'),
(15, 'nguoiwf bạn A', 'nanopro14@gmail.com', 'nanopro14@gmail.com', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf16_unicode_ci DEFAULT NULL,
  `selected` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `selected`) VALUES
(42, 37, 'nguoi-ban-a-0.jpg', 1),
(43, 37, 'nguoi-ban-a-1.jpg', 1),
(44, 37, 'nguoi-ban-a-2.png', 1),
(45, 37, 'nguoi-ban-a-3.png', 1),
(46, 40, 'mon-hang-gi-do-0.jpg', 1),
(47, 40, 'mon-hang-gi-do-1.jpg', 1),
(48, 40, 'mon-hang-gi-do-2.jpg', 1),
(49, 40, 'mon-hang-gi-do-3.jpg', 1),
(50, 40, 'mon-hang-gi-do-4.jpg', 1),
(51, 40, 'mon-hang-gi-do-5.jpg', 1),
(52, 41, 'mon-hang-cua-thuc-0.jpg', 1),
(53, 41, 'mon-hang-cua-thuc-1.jpg', 1),
(54, 41, 'mon-hang-cua-thuc-2.jpg', 1),
(55, 41, 'mon-hang-cua-thuc-3.jpg', 1),
(56, 41, 'mon-hang-cua-thuc-4.gif', 1),
(57, 41, 'mon-hang-cua-thuc-5.jpg', 1),
(62, 43, 'gai-cua-thanh-0.jpg', 1),
(63, 43, 'gai-cua-thanh-1.jpg', 1),
(64, 43, 'gai-cua-thanh-2.jpg', 1),
(65, 43, 'gai-cua-thanh-3.jpg', 1),
(66, 43, 'gai-cua-thanh-4.jpg', 1),
(67, 44, 'nuot-na-2-0.jpg', 1),
(68, 44, 'nuot-na-2-1.jpg', 1),
(69, 44, 'nuot-na-2-2.jpg', 1),
(70, 44, 'nuot-na-2-3.jpg', 1),
(71, 44, 'nuot-na-2-4.jpg', 1),
(72, 45, 'gu-cua-thuc-0.jpg', 1),
(73, 45, 'gu-cua-thuc-1.jpg', 1),
(74, 45, 'gu-cua-thuc-2.jpg', 1),
(75, 45, 'gu-cua-thuc-3.jpg', 1),
(76, 45, 'gu-cua-thuc-4.jpg', 1),
(77, 45, 'gu-cua-thuc-5.jpg', 1),
(78, 45, 'gu-cua-thuc-6.jpg', 1),
(79, 46, 'tai-sao-web-toan-anh-gai-0.jpg', 1),
(80, 46, 'tai-sao-web-toan-anh-gai-1.jpg', 1),
(81, 46, 'tai-sao-web-toan-anh-gai-2.gif', 1),
(82, 46, 'tai-sao-web-toan-anh-gai-3.jpg', 1),
(83, 46, 'tai-sao-web-toan-anh-gai-4.jpg', 1),
(84, 46, 'tai-sao-web-toan-anh-gai-5.png', 1),
(85, 47, 'them-anh-met-ghe-0.jpg', 1),
(86, 47, 'them-anh-met-ghe-1.jpg', 1),
(87, 47, 'them-anh-met-ghe-2.jpg', 1),
(88, 47, 'them-anh-met-ghe-3.jpg', 1),
(89, 47, 'them-anh-met-ghe-4.jpg', 1),
(90, 47, 'them-anh-met-ghe-5.jpg', 1),
(91, 48, 'them-bao-nhieu-cho-du-0.jpg', 1),
(92, 48, 'them-bao-nhieu-cho-du-1.gif', 1),
(93, 48, 'them-bao-nhieu-cho-du-2.png', 1),
(94, 48, 'them-bao-nhieu-cho-du-3.jpg', 1),
(95, 48, 'them-bao-nhieu-cho-du-4.jpg', 1),
(96, 49, 'for-the-emperor-0.jpg', 1),
(97, 49, 'for-the-emperor-1.jpg', 1),
(98, 49, 'for-the-emperor-2.jpg', 1),
(99, 49, 'for-the-emperor-3.png', 1),
(100, 49, 'for-the-emperor-4.jpg', 1),
(101, 49, 'for-the-emperor-5.jpg', 1),
(102, 49, 'for-the-emperor-6.jpg', 1),
(103, 50, 'nhieu-vo-lo-0.jpg', 1),
(104, 50, 'nhieu-vo-lo-1.jpg', 1),
(105, 50, 'nhieu-vo-lo-2.jpg', 1),
(106, 50, 'nhieu-vo-lo-3.jpg', 1),
(107, 50, 'nhieu-vo-lo-4.jpg', 1),
(108, 50, 'nhieu-vo-lo-5.jpg', 1),
(109, 50, 'nhieu-vo-lo-6.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `id_url` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf16_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `sl_hienco` int(11) NOT NULL,
  `price` double NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `unit` varchar(50) COLLATE utf16_unicode_ci DEFAULT 'cái',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `img` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_type`, `id_url`, `name`, `detail`, `date_added`, `sl_hienco`, `price`, `discount`, `unit`, `active`, `img`, `featured`, `deleted_at`) VALUES
(3, 3, 3, 'món đồ 3', '', '2018-02-07 21:12:00', 85, 12, 0, '', 0, '', 1, '2018-04-08 07:06:17'),
(5, 1, 5, 'món hàng 5', '', '2018-02-08 06:00:00', 32, 20, 0, '', 0, 'girl1.jpg', 1, '2018-04-08 07:32:05'),
(6, 2, 6, 'món hàng 6', '', '2018-02-08 00:00:00', 52, 99, 0, '', 0, 'girl2.jpg', 1, '2018-04-09 22:31:52'),
(7, 3, 7, 'món hàng  7', '', '0000-00-00 00:00:00', 12, 55, 0, '', 0, 'girl3.jpg', 1, '2018-04-09 22:32:04'),
(8, 4, 8, 'món hàng 8', '', '0000-00-00 00:00:00', 24, 25, 0, '', 0, 'girl3.jpg', 1, '2018-04-09 22:32:05'),
(9, 3, 9, 'món hàng 9', '', '0000-00-00 00:00:00', 69, 35, 0, '', 0, 'product1.jpg', 1, '2018-04-09 22:32:07'),
(28, 1, 34, 'bồ cũ thành1', 'gái', '2018-04-02 12:45:36', 12, 100, 0, 'cái', 1, 'bo-cu-thanh-0.jpg', 1, '2018-04-10 03:27:12'),
(30, 1, 36, 'bồ cũ thức', 'gái', '2018-04-02 12:46:55', 12, 100, 0, 'cái', 1, 'bo-cu-thuc-0.jpg', 1, '2018-04-10 03:28:07'),
(32, 5, 38, 'bạn gái cũ của trung phan', 'những người con gái đã bước qua đời trung', '2018-04-02 01:20:10', 2, 500000, 0, 'cái', 1, 'ban-gai-cu-cua-trung-phan-0.png', 1, '2018-04-10 03:28:57'),
(33, 2, 49, 'ngọc zuby', 'sắp cưới', '2018-04-02 04:37:16', 12, 15000, 0, 'cái', 1, 'ngoc-zuby-5.jpg', 1, '2018-04-10 03:29:59'),
(34, 3, 50, 'Bồ tiến một ngày nào đó', 'Xinh quá cơ', '2018-04-09 09:05:12', 12, 5000, 0, 'cái', 1, 'bo-tien-mot-ngay-nao-do-4.jpg', 1, '2018-04-10 03:32:24'),
(35, 1, NULL, 'Hàng chất lượng cao 1', 'Đây là gái', '2018-04-10 12:34:18', 25, 5000, 0, 'cái', 1, 'hang-chat-luong-cao-1-0.jpg', 1, '2018-04-10 03:41:03'),
(36, 4, NULL, 'Đồ lót thái lan', 'Vẫn là gái', '2018-04-10 12:43:48', 14, 90000, 0, 'cái', 1, 'do-lot-thai-lan-0.jpg', 1, '2018-04-10 03:41:38'),
(37, 3, 53, 'người bạn A', 'người bạn A', '2018-04-10 01:33:14', 1, 500, 0, 'cái', 1, 'nguoi-ban-a-0.jpg', 1, NULL),
(38, 2, 54, 'Người bạn B', 'BCD', '2018-04-10 01:33:57', 6, 4500, 0, 'cái', 1, 'nguoi-ban-b-0.jpg', 1, '2018-04-10 03:30:36'),
(39, 5, 55, 'trtyr', '123', '2018-04-10 01:52:38', 1, 234, 0, 'cái', 1, 'trtyr-0.jpg', 1, '2018-04-09 23:52:45'),
(40, 1, 56, 'Món hàng gì đó', 'Xinh đấy', '2018-04-13 09:01:08', 12, 12314, 0, 'cái', 1, 'mon-hang-gi-do-0.jpg', 1, NULL),
(41, 1, 57, 'Món hàng của Thức', 'cũng hơi xinh', '2018-04-13 09:01:42', 12, 1200, 0, 'cái', 1, 'mon-hang-cua-thuc-0.jpg', 1, NULL),
(43, 1, 59, 'Gái của THành', 'Đẹp nuột', '2018-04-13 09:02:53', 3, 1200, 0, 'cái', 1, 'gai-cua-thanh-0.jpg', 1, NULL),
(44, 2, 60, 'Nuột nà 2', 'nuộtttt', '2018-04-13 09:03:44', 2, 1233, 0, 'cái', 1, 'nuot-na-2-0.jpg', 1, NULL),
(45, 2, 61, 'Gu của thức', 'ghê đeíe', '2018-04-13 09:04:28', 7, 1100, 0, 'cái', 1, 'gu-cua-thuc-0.jpg', 1, NULL),
(46, 3, 62, 'Tại sao web toàn ảnh gái', 'vì hết cái up rồi', '2018-04-13 09:05:18', 5, 11000, 0, 'cái', 1, 'tai-sao-web-toan-anh-gai-0.jpg', 1, NULL),
(47, 4, 63, 'Thêm ảnh mệt ghê', 'sắp xong rồi', '2018-04-13 09:05:58', 3, 123900, 0, 'cái', 1, 'them-anh-met-ghe-0.jpg', 1, NULL),
(48, 4, 64, 'Thêm bao nhiêu cho đủ', 'custodian', '2018-04-13 09:06:40', 9, 1100, 0, 'cái', 1, 'them-bao-nhieu-cho-du-0.jpg', 1, NULL),
(49, 5, 65, 'For the emperor', 'emepror\'s finests', '2018-04-13 09:07:32', 11100, 123, 0, 'cái', 1, 'for-the-emperor-0.jpg', 1, NULL),
(50, 5, 66, 'Nhiều vờ lờ', 'hí hí', '2018-04-13 09:08:05', 121, 11000, 0, 'cái', 1, 'nhieu-vo-lo-0.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_url`
--

CREATE TABLE `product_url` (
  `id` int(11) NOT NULL,
  `url` varchar(50) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_url`
--

INSERT INTO `product_url` (`id`, `url`) VALUES
(1, '112'),
(2, 'dd'),
(3, 'gggg'),
(4, 'mon-hang-4'),
(5, 'mon-hang-5'),
(6, 'mon-hang-6'),
(7, 'mon-do99'),
(8, 'mon-hang-8'),
(9, 'mon-hang-9'),
(10, 'mon-hang-10'),
(11, 'mon-hang-11'),
(32, 'bo-thanh'),
(34, 'bo-cu-thanh1'),
(36, 'bo-cu-thuc'),
(37, 'bo-sap-cuoi-cua-mini'),
(38, 'ban-gai-cu-cua-trung-phan'),
(39, 'mon-do-1'),
(40, 'mon-do-1'),
(41, 'mon-do-1'),
(42, 'mon-do-1'),
(43, 'mon-do-1'),
(44, 'mon-do-1'),
(45, 'mon-do-1'),
(46, 'mon-do-1'),
(47, 'cu'),
(48, 'mon-do-1'),
(49, 'ngoc-zuby'),
(50, 'bo-tien-mot-ngay-nao-do'),
(53, 'nguoi-ban-a'),
(54, 'nguoi-ban-b'),
(55, 'trtyr'),
(56, 'mon-hang-gi-do'),
(57, 'mon-hang-cua-thuc'),
(59, 'gai-cua-thanh'),
(60, 'nuot-na-2'),
(61, 'gu-cua-thuc'),
(62, 'tai-sao-web-toan-anh-gai'),
(63, 'them-anh-met-ghe'),
(64, 'them-bao-nhieu-cho-du'),
(65, 'for-the-emperor'),
(66, 'nhieu-vo-lo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `id_url` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `type_name`, `id_url`) VALUES
(1, 'Loại A', 1),
(2, 'Loại B', 2),
(3, 'Loại C', 3),
(4, 'Loại D', 4),
(5, 'Loại Đặc biệt', 5),
(7, 'loại cũ', 9),
(8, 'loại mèo', 10),
(9, 'loại mèo 2', 11),
(10, 'loại mèo 3', 12),
(11, 'loại mèo 3', 13),
(12, 'loại chó', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_url`
--

CREATE TABLE `type_url` (
  `id` int(11) NOT NULL,
  `url` varchar(50) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_url`
--

INSERT INTO `type_url` (`id`, `url`) VALUES
(1, 'loai-a'),
(2, 'loai-B'),
(3, 'loai-C'),
(4, 'loai-D'),
(5, 'loai-DB'),
(9, 'loai-cu'),
(10, 'loai-meo'),
(11, 'loai-meo-2'),
(12, 'loai-meo-3'),
(13, 'loai-meo-3'),
(14, 'loai-cho');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`bill_id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `img` (`img`),
  ADD KEY `id_url` (`id_url`),
  ADD KEY `id_type` (`id_type`);

--
-- Chỉ mục cho bảng `product_url`
--
ALTER TABLE `product_url`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_url` (`id_url`);

--
-- Chỉ mục cho bảng `type_url`
--
ALTER TABLE `type_url`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `product_url`
--
ALTER TABLE `product_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `type_url`
--
ALTER TABLE `type_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_url`) REFERENCES `product_url` (`id`);

--
-- Các ràng buộc cho bảng `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_ibfk_1` FOREIGN KEY (`id_url`) REFERENCES `type_url` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
