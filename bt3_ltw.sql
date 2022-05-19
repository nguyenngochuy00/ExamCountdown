-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2022 lúc 11:19 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bt3_ltw`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`) VALUES
(24, 'Trần Nguyễn Ngọc Huy', 'huy', 'huy123@H', 'nguyenngochuy@gmail.com'),
(25, 'Trần Nguyễn Ngọc Huy', 'huy', '1234Huy@', 'nguyenngochuy@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `name`, `phone`, `email`, `address`, `subject`) VALUES
(1, 'Nguyễn Ngọc Huy', '0987657432', 'nguyenngochuy@gmail.com', 'Xã Vân Canh, H.Hoài Đức, Hà Nội', ''),
(2, 'Nguyễn Duy Mạnh', '+84987365214', 'nguyenduymanh@gmail.com', 'Phường Liên Mạc, Q.Bắc Từ Liêm, Hà Nội', ''),
(3, 'Trần Đỗ Minh', '0362159871', 'trandominh@gmail.com', 'Phường Tây Mỗ, Q.Nam Từ Liêm, Hà Nội', ''),
(4, 'Viết Minh Hiếu', '0315264987', 'vietminhhieu@gmail.com', 'Phường Phúc Diễn, Q.Nam Từ Liêm, Hà Nội', ''),
(5, 'Nguyễn Duy Anh', '+84987542365', 'nguyenduyanh@gmail.com', 'Phường Phúc Lý, Q.Bắc Từ Liêm, Hà Nội', ''),
(13, 'Nguyễn Minh Hiếu', '0987123456', 'nguyenminhhieu@gmail.com', 'Phường Tây Mỗ, Quận Nam Từ Liêm, Hà Nội', ''),
(14, 'Lò Văn Dự', '0967123485', 'lovandu@gmail.com', 'Xã Chiềng Ân, H.Mường La, Sơn La', ''),
(15, 'Nguyễn Tiến Đạt', '0372651351', 'nguyentiendat@gmail.com', 'Phường Phương Canh, Q.Nam Từ Liêm, Hà Nội', ''),
(16, 'Ngô Thị Khoa', '0976458123', 'ngothikhoa@gmail.com', 'Phường An Hoạch, TP.Thanh Hóa, Thanh Hóa', ''),
(17, 'Từ Hùng Cường', '0935786362', 'tuhungcuong@gmail.com', 'Phường Phúc Diễn, Q.Bắc Từ Liêm, Hà Nội', ''),
(27, 'Phạm Quang Hiếu', '0932654125', 'phamquanghieu@gmail.com', 'Phường Bà Triệu, TP.Nam Định, Nam Định', ''),
(28, 'Do Van Hien', '0314265368', 'dovanhien@gmail.com', 'Xã Chương Dương, H.Thường Tín, Hà Nội', ''),
(29, 'Trần Hùng Minh', '0354986321', 'tranhungminh@gmail.com', 'Xã Vân Canh, H.Hoài Đức, Hà Nội', ''),
(30, 'Nguyễn Văn Công', '0965325698', 'nguyenvancong@gmail.com', 'Phường Lam Sơn, TP.Thanh Hóa, Thanh Hóa', ''),
(31, 'Phạm Công Thắng', '+84965325642', 'phamcongthang@gmail.com', 'Xã Vân Canh, H.Hoài Đức, Hà Nội', ''),
(32, 'Doan Viet Dung', '0325698365', 'doanvietdung@gmail.com', 'Thị trấn Phú Minh, H.Phú Xuyên, Hà Nội', ''),
(33, 'Phạm Ngọc Hùng', '0326598365', 'phamngochung@gmail.com', 'Thị trấn Yên Viên, H.Gia Lâm, Hà Nội', ''),
(34, 'Nguyễn Lương Hải', '+84965324625', 'nguyenluonghai@gmail.com', 'Thị trấn Trôi, H.Hoài Đức, Hà Nội', ''),
(35, 'Phạm Thị Như Hiền', '+84925687395', 'phamthinhuhien@gmail.com', 'Phường Cổ Nhuế, Q.Bắc Từ Liêm, Hà Nội', ''),
(85, 'Jack Obrient', '0123456789', 'jackobrient@gmail.com', 'England', 'Toán, Văn, Anh'),
(86, 'Jack Obrient', '0123456789', 'jackobrient@gmail.com', 'England', 'Toán, Văn, Anh, Lý, Hóa, Sinh, Sử, Địa, Công dân'),
(87, 'Jack Obrient', '0123456789', 'jackobrient@gmail.com', 'England', 'Toán, Văn, Anh, Lý, Hóa, Sinh, Sử, Địa, Công dân'),
(121, 'Jack Obrient', '0123456789', 'ngochuy25120@gmail.com', 'England', 'Hóa'),
(139, 'Jack Obrient', '0123456789', 'ngochuy25120@gmail.com', 'England', 'Địa'),
(140, 'Jack Obrient', '0123456789', 'ngochuy25120@gmail.com', 'England', 'Anh'),
(141, 'Jack Obrient', '0123456789', 'ngochuy25120@gmail.com', 'England', 'Sinh'),
(142, 'Jack Obrient', '0123456789', 'ngochuy25120@gmail.com', 'England', 'Anh'),
(143, 'Jack Obrient', '0123456789', 'ngochuy25120@gmail.com', 'England', 'Anh'),
(144, 'Jack Obrient', '0123456789', 'ngochuy25120@gmail.com', 'England', 'Anh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
