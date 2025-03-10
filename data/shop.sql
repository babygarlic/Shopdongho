-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2024 lúc 04:55 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Đồng Hồ Casio'),
(2, 'Đồng Hồ Citizen'),
(3, 'Đồng Hồ Orient'),
(4, 'Đồng Hồ NAKZEN'),
(7, 'Đồng Hồ Omega');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `macdinh` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachi`
--

INSERT INTO `diachi` (`id`, `nguoidung_id`, `diachi`, `macdinh`) VALUES
(1, 7, 'lx ag', 1),
(2, 7, 'lx ag', 1),
(3, 8, 'gfgfgf', 1),
(4, 10, 'bbbnb', 1),
(5, 11, 'Quận Cầu Giấy, Hà Nội', 1),
(6, 12, 'Quận 1 , HCM', 1),
(7, 7, 'Phường bến nghé Quận 1 TP HCM', 1),
(8, 7, 'gò vấp HCM\r\n', 1),
(9, 13, '123 trần hưng đạo mỹ bình long xuyên an giang', 1),
(10, 14, 'An giang', 1),
(11, 7, '123', 1),
(12, 15, 'Hà Nội', 1),
(13, 16, 'Hà Nội', 1),
(14, 17, 'Hà Nội', 1),
(15, 18, 'Chaau doc an giang', 1),
(16, 19, 'gtfuyjvhh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi_id` int(11) DEFAULT NULL,
  `ngay` datetime NOT NULL DEFAULT current_timestamp(),
  `tongtien` float NOT NULL DEFAULT 0,
  `ghichu` varchar(255) DEFAULT NULL,
  `trangthai` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `nguoidung_id`, `diachi_id`, `ngay`, `tongtien`, `ghichu`, `trangthai`) VALUES
(6, 12, 6, '2024-12-14 00:12:07', 2412000, NULL, 1),
(7, 7, 7, '2024-12-14 03:16:01', 187947000, NULL, 1),
(8, 7, 8, '2024-12-14 03:19:52', 2684000, NULL, 1),
(9, 13, 9, '2024-12-14 19:08:10', 20526000, NULL, 1),
(10, 14, 10, '2024-12-14 21:25:41', 5096000, NULL, 1),
(11, 7, 11, '2024-12-16 20:31:10', 2684000, NULL, 1),
(15, 18, 15, '2024-12-18 11:06:10', 2412000, NULL, 1),
(16, 19, 16, '2024-12-18 13:14:34', 2684000, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangct`
--

CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `mathang_id` int(11) NOT NULL,
  `dongia` float NOT NULL DEFAULT 0,
  `soluong` int(11) NOT NULL DEFAULT 1,
  `thanhtien` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangct`
--

INSERT INTO `donhangct` (`id`, `donhang_id`, `mathang_id`, `dongia`, `soluong`, `thanhtien`) VALUES
(12, 6, 29, 2412000, 1, 2412000),
(13, 7, 26, 2684000, 1, 2684000),
(14, 7, 28, 10263000, 1, 10263000),
(15, 7, 30, 175000000, 1, 175000000),
(16, 8, 26, 2684000, 1, 2684000),
(17, 9, 28, 10263000, 2, 20526000),
(18, 10, 29, 2412000, 1, 2412000),
(19, 10, 26, 2684000, 1, 2684000),
(20, 11, 26, 2684000, 1, 2684000),
(22, 15, 29, 2412000, 1, 2412000),
(23, 16, 26, 2684000, 1, 2684000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `tenkhuyenmai` varchar(255) NOT NULL,
  `mota` text DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `phantramgiam` decimal(5,2) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `tenkhuyenmai`, `mota`, `banner`, `phantramgiam`, `ngaybatdau`, `ngayketthuc`, `trangthai`) VALUES
(6, 'giáng sinh an lành', 'giảm tất cả các mặc hàng', 'images/products/banner-login.jpg', 25.00, '2024-01-01', '2024-02-02', 0),
(8, 'Xuân 2025', 'Tết 2025', 'images/products/1670968212_133_Chia-se-16-hinh-nen-Fantasy-chat-luong-4K-sieu.jpg', 15.00, '2024-11-12', '2025-02-01', 0),
(9, 'Noel', 'mung giang sinh', 'images/products/banner2.jpg', 12.00, '2024-02-02', '2025-03-02', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mathang`
--

CREATE TABLE `mathang` (
  `id` int(11) NOT NULL,
  `tenmathang` varchar(255) NOT NULL,
  `mota` text DEFAULT NULL,
  `giagoc` float NOT NULL DEFAULT 0,
  `giaban` float NOT NULL DEFAULT 0,
  `soluongton` int(11) NOT NULL DEFAULT 0,
  `hinhanh` varchar(255) DEFAULT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `luotmua` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mathang`
--

INSERT INTO `mathang` (`id`, `tenmathang`, `mota`, `giagoc`, `giaban`, `soluongton`, `hinhanh`, `danhmuc_id`, `luotxem`, `luotmua`) VALUES
(25, 'Đồng hồ NAKZEN 40 mm Nam SS4073G-7', '<p>Đối tượng sử dụng:Nam Đường kính mặt:40 mm Dây đeo:Thép không gỉ Độ rộng dây:20 mm Khung viền:Thép không gỉ Độ dày mặt:8 mm Chất liệu mặt kính:Kính khoáng Mineral Tên bộ máy:Hãng không công bố Thời gian sử dụng pin:Khoảng 2 năm Kháng nước:3 ATM - Rửa tay, đi mưa Tiện ích:Lịch ngày Nguồn năng lượng:Pin Loại máy:Pin (Quartz) Loại pin sử dụng:SR621/621SW Sản xuất tại:Trung Quốc Thương hiệu của:Nhật Bản Hãng:NAKZEN. Xem thông tin hãng</p>', 815000, 715000, 98, 'images/nakzen-ss4073g-7-nam-cont-1-700x467.jpg', 4, 7, 0),
(26, 'Đồng hồ Casio 40 mm Nam MTP-M300D-7AVDF', 'Đối tượng sử dụng:\r\nNam\r\nĐường kính mặt:\r\n40 mm\r\nDây đeo:\r\nThép không gỉ\r\nĐộ rộng dây:\r\n19.8 mm\r\nKhung viền:\r\nThép không gỉ\r\nĐộ dày mặt:\r\n9.3 mm\r\nChất liệu mặt kính:\r\nKính khoáng Mineral\r\nTên bộ máy:\r\n3744\r\nThời gian sử dụng pin:\r\nKhoảng 3 năm\r\nKháng nước:\r\n5 ATM - Đi mưa, tắm\r\nTiện ích:\r\nLịch ngày\r\nLịch thứ\r\nLịch tuần trăng\r\nNguồn năng lượng:\r\nPin\r\nLoại máy:\r\nPin (Quartz)\r\nLoại pin sử dụng:\r\nSR621SW\r\nSản xuất tại:\r\nNhật Bản/ Thái Lan/ Trung Quốc (tùy lô hàng)\r\nThương hiệu của:\r\nNhật Bản\r\nHãng:\r\nCASIO. Xem thông tin hãng', 2684000, 2684000, 44, 'images/products/casio-mtp-m300d-7avdf-nam-1-1-750x500.jpg', 1, 3, 0),
(27, 'Đồng hồ Orient Vietnam Special Edition 41.5 mm Nam RA-AS0106L30B', 'Đối tượng sử dụng:\r\nNam\r\nĐường kính mặt:\r\n41.5 mm\r\nDây đeo:\r\nDa tổng hợp\r\nĐộ rộng dây:\r\n20 mm\r\nKhung viền:\r\nThép không gỉ\r\nĐộ dày mặt:\r\n13.8 mm\r\nChất liệu mặt kính:\r\nKính khoáng Mineral\r\nTên bộ máy:\r\nCaliber F6L24\r\nThời gian trữ dây cót:\r\nKhoảng 40 tiếng\r\nKháng nước:\r\n3 ATM - Rửa tay, đi mưa\r\nTiện ích:\r\nĐồng hồ Sun & Moon\r\nNguồn năng lượng:\r\nCơ tự động\r\nLoại máy:\r\nCơ tự động (Automatic)\r\nBộ sưu tập:\r\nVietnam Special Edition\r\nSản xuất tại:\r\nThái Lan\r\nThương hiệu của:\r\nNhật Bản\r\nHãng:\r\nORIENT. Xem thông tin hãng', 15200000, 15100000, 20, 'images/products/orient-ra-as0106l30b-nam-1-638684901280757694-750x500.jpg', 3, 1, 0),
(28, 'Đồng hồ Citizen Tsuyosa 40 mm Nam NJ0152-51X', 'Đối tượng sử dụng:\r\nNam\r\nĐường kính mặt:\r\n40 mm\r\nChất liệu dây:\r\nThép không gỉ\r\nMạ dây:\r\nmạ PVD\r\nĐộ rộng dây:\r\nHãng không công bố\r\nChất liệu khung viền:\r\nThép không gỉ\r\nMạ viền:\r\nmạ PVD\r\nĐộ dày mặt:\r\n11.7 mm\r\nChất liệu mặt kính:\r\nKính Sapphire\r\nTên bộ máy:\r\nCaliber 8210\r\nThời gian trữ dây cót:\r\nKhoảng 40 tiếng\r\nKháng nước:\r\n5 ATM - Đi mưa, tắm\r\nTiện ích:\r\nLịch ngày\r\nNguồn năng lượng:\r\nCơ tự động\r\nLoại máy:\r\nCơ tự động (Automatic)\r\nBộ sưu tập:\r\nTsuyosa\r\nSản xuất tại:\r\nNhật Bản/ Trung Quốc/ Thái Lan (tùy lô hàng)\r\nThương hiệu của:\r\nNhật Bản\r\nHãng:\r\nCITIZEN. Xem thông tin hãng', 10263000, 10263000, 17, 'images/products/citizen-nj0152-51x-nam-1-638629597821954665-750x500.jpg', 2, 1, 0),
(29, 'Đồng hồ Casio 34 mm Nam MTP-M305D-1AVDF', 'Đối tượng sử dụng:\r\nNam\r\nĐường kính mặt:\r\n34 mm\r\nDây đeo:\r\nThép không gỉ\r\nĐộ rộng dây:\r\n20 mm\r\nKhung viền:\r\nThép không gỉ\r\nĐộ dày mặt:\r\n9.3 mm\r\nChất liệu mặt kính:\r\nKính khoáng Mineral\r\nTên bộ máy:\r\nHãng không công bố\r\nThời gian sử dụng pin:\r\nKhoảng 3 năm\r\nKháng nước:\r\n5 ATM - Đi mưa, tắm\r\nTiện ích:\r\nLịch ngày - thứ\r\nLịch tuần trăng\r\nNguồn năng lượng:\r\nPin\r\nLoại máy:\r\nPin (Quartz)\r\nLoại pin sử dụng:\r\nSR621SW\r\nSản xuất tại:\r\nNhật Bản/ Thái Lan/ Trung Quốc (tùy lô hàng)\r\nThương hiệu của:\r\nNhật Bản\r\nHãng:\r\nCASIO. Xem thông tin hãng', 2412000, 2412000, 246, 'images/products/casio-mtp-m305d-1avdf-nam-1-750x500.jpg', 1, 5, 0),
(30, 'Đồng Hồ Omega - Nam 231.20.42.21.08.001', 'Thương hiệu: Omega\r\nXuất xứ: Thụy Sỹ\r\nĐối tượng: Nam\r\nDòng sản phẩm: Omega Seamaster\r\nKháng nước: 15atm\r\nLoại máy: Cơ tự động\r\nChất liệu kính: Kính Sapphire\r\nChất liệu dây: Dây Vàng & thép không gỉ\r\nSize mặt: 41.5mm\r\nĐộ dầy: 13.1mm\r\nKhoảng trữ cót: 60 tiếng\r\nTiện ích: Dạ quang, Lịch ngày, Giờ, phút, giây', 175000000, 175000000, 2, 'images/products/omega-seamaster-aqua-terra-150m-23120422108001-l.png', 7, 3, 0),
(32, 'Đồng hồ Orient Contemporary 40 mm Nam RA-TX0302S10B', 'Đối tượng sử dụng:\r\nNam\r\nĐường kính mặt:\r\n40 mm\r\nDây đeo:\r\nThép không gỉ\r\nĐộ rộng dây:\r\n20 mm\r\nKhung viền:\r\nThép không gỉ\r\nĐộ dày mặt:\r\n11.1 mm\r\nChất liệu mặt kính:\r\nKính Sapphire\r\nTên bộ máy:\r\nVS752\r\nThời gian sử dụng pin:\r\nKhoảng 6 tháng\r\nKháng nước:\r\n5 ATM - Đi mưa, tắm\r\nTiện ích:\r\nBấm giờ (Chronograph)\r\nLịch ngày\r\nĐồng hồ 24 giờ\r\nKim dạ quang\r\nNguồn năng lượng:\r\nÁnh sáng\r\nLoại máy:\r\nNăng lượng ánh sáng\r\nLoại pin sử dụng:\r\nHãng không công bố\r\nBộ sưu tập:\r\nContemporary\r\nSản xuất tại:\r\nThái Lan\r\nThương hiệu của:\r\nNhật Bản\r\nHãng:\r\nORIENT. Xem thông tin hãng', 6922000, 6922000, 50, 'images/products/orient-ra-tx0302s10b-nam-1-638654688640004251-750x500.jpg', 3, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mathang_khuyenmai`
--

CREATE TABLE `mathang_khuyenmai` (
  `id` int(11) NOT NULL,
  `khuyenmai_id` int(11) NOT NULL,
  `mathang_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mathang_khuyenmai`
--

INSERT INTO `mathang_khuyenmai` (`id`, `khuyenmai_id`, `mathang_id`, `soluong`, `created_at`) VALUES
(4, 6, 30, 1, '2024-12-17 15:24:25'),
(5, 6, 29, 2, '2024-12-17 15:24:25'),
(6, 6, 28, 3, '2024-12-17 15:24:25'),
(13, 8, 30, 1, '2024-12-17 16:22:53'),
(14, 8, 29, 1, '2024-12-17 16:22:53'),
(15, 8, 28, 1, '2024-12-17 16:22:53'),
(16, 8, 27, 1, '2024-12-17 16:22:53'),
(17, 8, 26, 1, '2024-12-17 16:22:53'),
(18, 8, 25, 1, '2024-12-17 16:22:53'),
(19, 9, 32, 3, '2024-12-18 07:19:32'),
(20, 9, 30, 2, '2024-12-18 07:19:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `loai` tinyint(4) NOT NULL DEFAULT 3,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`) VALUES
(1, 'Admin@gmail.com', '0583130289', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Thanh Sang', 1, 1, 'hinh_usser.jpg'),
(2, 'def@abc.com', '11111111', 'e10adc3949ba59abbe56e057f20f883e', 'Mèo máy Doraemon', 2, 1, 'avatar.jpg'),
(3, 'ghi@abc.com', '0988994685', '900150983cd24fb0d6963f7d28e17f72', 'Nhân viên GHI', 2, 1, NULL),
(7, 'khachhang1@gmail.com', '0123456789', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn Minh', 3, 1, NULL),
(8, 'tva123456@gmail.com', '8877666569', 'f9a38ff5304fe81f652ab83e17b795fc', 'dsdsds', 3, 1, NULL),
(9, 'abc9999@abc.com', '9998878899', 'e10adc3949ba59abbe56e057f20f883e', 'fdfdfdfd', 2, 1, NULL),
(10, 'abc88888888@abc.com', '889898999', 'e10adc3949ba59abbe56e057f20f883e', 'ggggg', 3, 1, NULL),
(11, 'Thanhsang@gmail', '0583130289', '235d91d58d661136b9f6ddbf7699d551', 'Nguyễn Thanh Sang', 3, 1, NULL),
(12, 'Thanhsang@gmail', '0391371232', '86a18861ea43d5ba9f7f47a805b273b9', 'Nguyễn Thanh Sang', 3, 1, NULL),
(13, 'abc@abc.com', '0283712313', '8caf22fa924533407fc9f15afa40ac3d', 'Dương Minh Tiến', 3, 1, NULL),
(14, 'khachhang2@gmail.com', '0912382311', '34b884fca0b028153cf8c138dd3822c8', 'Thái Minh Mẩn', 3, 1, NULL),
(15, 'vuongle@gmail.com', '09342432', 'bc936c7ed017ff4a38db2a62a939c112', 'Lê Thanh Vương', 3, 1, NULL),
(16, 'vuongle@gmail.com', '09342432', 'bc936c7ed017ff4a38db2a62a939c112', 'Lê Thanh Vương', 3, 1, NULL),
(17, 'vuongle@gmail.com', '09342432', 'bc936c7ed017ff4a38db2a62a939c112', 'Lê Thanh Vương', 3, 1, NULL),
(18, 'maaan@gmail.com', '0391371222', '3ea4a5101c12c18d90abb9cfab6eb619', 'Nguyen van b', 3, 1, NULL),
(19, 'vuongle@gmail.com', '43876567', '0f5f73989470fa634c14b359cd7bf156', 'Lê Thanh Vương', 3, 1, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`),
  ADD KEY `diachi_id` (`diachi_id`);

--
-- Chỉ mục cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `mathang_id` (`mathang_id`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Chỉ mục cho bảng `mathang_khuyenmai`
--
ALTER TABLE `mathang_khuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khuyenmai_id` (`khuyenmai_id`),
  ADD KEY `mathang_id` (`mathang_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `diachi`
--
ALTER TABLE `diachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `mathang`
--
ALTER TABLE `mathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `mathang_khuyenmai`
--
ALTER TABLE `mathang_khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD CONSTRAINT `diachi_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `donhangct_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhangct_ibfk_2` FOREIGN KEY (`mathang_id`) REFERENCES `mathang` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `mathang_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `mathang_khuyenmai`
--
ALTER TABLE `mathang_khuyenmai`
  ADD CONSTRAINT `mathang_khuyenmai_ibfk_1` FOREIGN KEY (`khuyenmai_id`) REFERENCES `khuyenmai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mathang_khuyenmai_ibfk_2` FOREIGN KEY (`mathang_id`) REFERENCES `mathang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
