-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2023 lúc 10:50 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `idnd` int(10) NOT NULL,
  `idsp` int(10) NOT NULL,
  `ngaybl` varchar(30) NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) NOT NULL,
  `tendm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`) VALUES
(1, 'Sản phẩm giảm giá'),
(2, 'Sản phẩm bán chạy'),
(26, 'Coffee đóng chai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) NOT NULL,
  `idnd` int(10) NOT NULL,
  `ngaymua` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `idnd`, `ngaymua`) VALUES
(3, 1, '2023-11-09 16:22:41'),
(4, 2, '2023-11-10 19:59:01'),
(5, 2, '2023-11-29 16:30:47'),
(6, 2, '2023-11-30 21:21:42'),
(7, 2, '2023-12-02 23:52:42'),
(8, 2, '2023-12-06 15:21:05'),
(9, 2, '2023-12-06 15:21:30'),
(10, 2, '2023-12-06 15:23:12'),
(11, 1, '2023-12-07 23:16:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `id` int(10) NOT NULL,
  `idsp` int(10) NOT NULL,
  `idhd` int(10) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `cachthanhtoan` varchar(50) NOT NULL,
  `soluongban` int(10) NOT NULL,
  `giatong` double(10,2) NOT NULL,
  `trangthai` varchar(50) NOT NULL,
  `ghichu` text DEFAULT NULL,
  `tenkhachhang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`id`, `idsp`, `idhd`, `sdt`, `email`, `diachi`, `cachthanhtoan`, `soluongban`, `giatong`, `trangthai`, `ghichu`, `tenkhachhang`) VALUES
(2, 1, 3, '0912345678', 'admin@gmail.com', 'Đà Nẵng', 'Thẻ tín dụng', 1, 10000.00, 'Đã thanh toán', 'admin', 'admin'),
(3, 2, 4, '0123123123', 'user@gmail.com', 'Đà Nẵng', 'ZaloPay', 2, 40000.00, 'Đã thanh toán', 'user', 'user'),
(4, 1, 6, '336875656', 'user@gmail.com', '245 btdr', 'Thẻ tín dụng', 1, 65000.00, 'Đã thanh toán', 'sdrg', 'user'),
(5, 7, 7, '66456567', 'user@gmail.com', '436 hjyfiuuj', 'Thẻ tín dụng', 1, 10000.00, 'Chưa thanh toán', 'hjuk', 'Vi'),
(6, 1, 8, '77890', 'user@gmail.com', ' 678 hjk', 'Thanh toán khi nhận hàng', 1, 10000.00, 'Chưa thanh toán', 'jj', 'Vi'),
(7, 49, 9, '4478375', 'user@gmail.com', '44', 'Thanh toán khi nhận hàng', 1, 60000.00, 'Chưa thanh toán', '', 'frjerkg'),
(8, 38, 10, '75879', 'user@gmail.com', '45 ggdf', 'Thanh toán khi nhận hàng', 1, 50000.00, 'Đã thanh toán', 'fkvd', 'Vi'),
(9, 1, 11, '4534524', 'admin@gmail.com', '123 dfuhufk', 'Thanh toán khi nhận hàng', 1, 20000.00, 'Chưa thanh toán', 'fwr', 'Vi'),
(10, 56, 11, '4534524', 'admin@gmail.com', '123 dfuhufk', 'Thanh toán khi nhận hàng', 1, 50000.00, 'Chưa thanh toán', 'fwr', 'Vi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(10) NOT NULL,
  `tennd` varchar(100) NOT NULL,
  `sdt` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `diachi` text NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `tennd`, `sdt`, `email`, `matkhau`, `diachi`, `role`) VALUES
(1, 'admin', 912345601, 'admin@gmail.com', '123', '123, Đà Nẵng', 'admin'),
(2, 'user', 2147483647, 'user@gmail.com', '1234', '123, abc', 'user'),
(7, 'Khánh Vi ', 123456789, 'khanhvi@gmail.com', '111', '123 Nguyễn Tri ', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) NOT NULL,
  `iddm` int(10) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `gia` double(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `soluong` int(10) NOT NULL,
  `ngaynhap` date DEFAULT NULL,
  `mota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `iddm`, `tensp`, `gia`, `img`, `soluong`, `ngaynhap`, `mota`) VALUES
(1, 1, 'Cà phê đen', 20000.00, '../uploadimage/coffee(1).jfif', 83, '2023-11-07', 'Cà phê đen'),
(2, 1, 'Cà phê', 20000.00, '../uploadimage/coffee(2).jfif', 88, '2023-11-07', 'Cà phê '),
(4, 1, 'Cà phê 1', 10000.00, '../uploadimage/coffee(13).jfif', 85, '2023-11-07', 'Cà phê đen1'),
(6, 2, 'Cà phê 3', 10000.00, '../uploadimage/coffee(15).jfif', 45, '2023-11-07', 'Cà phê đen3'),
(7, 2, 'Cà phê 4', 10000.00, '../uploadimage/coffee(16).jfif', 54, '2023-11-07', 'Cà phê đen4'),
(36, 1, 'coffee 3', 50000.00, '../uploadimage/coffee(3).jfif', 50, '2023-11-29', 'cf3'),
(38, 1, 'coffee 4', 50000.00, '../uploadimage/coffee(4).jfif', 4, '2023-11-29', 'cf4'),
(48, 2, 'coffee 5', 50000.00, '../uploadimage/coffee(5).jfif', 50, '2023-11-13', 'fuyfuyfu'),
(49, 2, 'coffee 6', 60000.00, '../uploadimage/coffee(6).jfif', 3, '2023-11-23', 'tyduyfui'),
(50, 2, 'coffee 7', 50000.00, '../uploadimage/coffee(7).jfif', 667, '2023-11-14', 'dtdyuyu'),
(51, 2, 'coffee 8', 70000.00, '../uploadimage/coffee(8).jfif', 68, '2023-11-17', 'cfyuvfiu'),
(52, 2, 'coffee 9', 70000.00, '../uploadimage/coffee(9).jfif', 88, '2023-11-01', 'cdtycyuvf'),
(53, 2, 'coffee 10', 78000.00, '../uploadimage/coffee(10).jfif', 77, '2023-11-21', 'tuy6uf7of9p'),
(54, 2, 'coffee 11', 65000.00, '../uploadimage/coffee(11).jfif', 54, '2023-11-15', 'gcdtdyyu'),
(55, 2, 'coffee 12', 33000.00, '../uploadimage/coffee(12).jfif', 66, '2023-11-21', '86786f78fguy'),
(56, 1, 'coffee 17', 50000.00, '../uploadimage/coffee(17).jfif', 1, '2023-11-30', 'cf17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnd` (`idnd`),
  ADD KEY `idsp` (`idsp`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnd` (`idnd`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsp` (`idsp`),
  ADD KEY `idhd` (`idhd`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddm` (`iddm`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`idnd`) REFERENCES `nguoidung` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`idnd`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`idhd`) REFERENCES `hoadon` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
