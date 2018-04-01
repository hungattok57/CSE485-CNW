-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 30, 2018 lúc 09:40 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `id` int(11) NOT NULL,
  `tenchuyenmuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `id` int(11) NOT NULL,
  `tensach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenchuyenmuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trichdan` text COLLATE utf8_unicode_ci NOT NULL,
  `gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `anhsach` text COLLATE utf8_unicode_ci NOT NULL,
  `filesach` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`id`, `tensach`, `tacgia`, `tenchuyenmuc`, `trichdan`, `gioithieu`, `anhsach`, `filesach`) VALUES
(1, 'Tôi thấy hoa vàng trên cỏ xanh', 'Nguyễn Nhật Ánh', 'Truyện', 'Tôi thấy lặng lẽ vương qua mình', 'Tôi thấy hoa vàng trên cỏ xanh là một tự sách nổi tiếng của tác giả Nguyễn Nhật Ánh', 'http://localhost/BTL/images/backend-developer.png', 'http://localhost/BTL/sach_data/models-mark-manson.pdf'),
(2, 'Tứ Thư Lãnh Đạo', 'Hòa Nhân', 'Sách Kỹ Năng', 'aaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'http://localhost/BTL/images/frontend.png', 'http://localhost/BTL/sach_data/Sachvui.Com-thuat-doc-nguoi-thach-chan-ngu.pdf'),
(3, 'Sách Giáo Khoa', 'Nguyễn Xuân Hùng', 'Sách Giáo Khoa', 'Không trích dẫn gì', 'Cũng chẳng có giới thiệu luôn', 'http://localhost/BTL/images/29595478_669768273193767_7672903040164542347_n.jpg', 'http://localhost/BTL/sach_data/JavaScriptNotesForProfessionals.pdf'),
(4, 'Sách Tiếng Anh', 'Nguyễn Xuân Hùng', 'SGK', 'Không Có Gì', 'Cũng Không Có Gì Luôn', 'http://localhost/BTL/images/29541005_669768276527100_8779059409661131450_n.jpg', 'http://localhost/BTL/sach_data/Danh-Thuc-Con-Nguoi-Phi-Thuong-Trong-Ban.pdf'),
(5, 'Sách Giáo Khoa Tiếng Việt', 'Nguyễn Xuân Hùng', 'Sách Giáo Khoa', 'Sách Giáo Khoa Dạy Tiếng Việt', 'Bộ sách GK dạy Tiếng Việt cho người Việt và người nước ngoài', 'http://localhost/BTL/images/29595316_669768333193761_1020660588881034729_n.jpg', 'http://localhost/BTL/sach_data/Sức Mạnh Của Tập Trung - Jack Canfield, Mark Victor Hansen, Les Hewitt.epub');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
