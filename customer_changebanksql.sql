-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 20, 2021 lúc 09:55 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banktree`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daohan`
--

CREATE TABLE `daohan` (
  `id` int(11) NOT NULL,
  `currentBank` text NOT NULL,
  `hoTen` varchar(150) NOT NULL,
  `CL` double NOT NULL,
  `CMND` text NOT NULL,
  `sdt` text NOT NULL,
  `TSTC` text NOT NULL,
  `giatriTTSTC` double NOT NULL,
  `targetBank` text NOT NULL,
  `incom` double NOT NULL,
  `hoKhau` text NOT NULL,
  `CIC` text NOT NULL,
  `phapLy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `daohan`
--

INSERT INTO `daohan` (`id`, `currentBank`, `hoTen`, `CL`, `CMND`, `sdt`, `TSTC`, `giatriTTSTC`, `targetBank`, `incom`, `hoKhau`, `CIC`, `phapLy`) VALUES
(1, 'ACB', 'test', 50, '1', '0025', 'abc', 222, 'VCB', 55, 'abc', 't', 'ok'),
(2, 'VCB', 'Testo', 10, '056456', '090328', 'HVH', 200, 'BIDV', 22, '', 'Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)', 'Độc thân');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `daohan`
--
ALTER TABLE `daohan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `daohan`
--
ALTER TABLE `daohan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
