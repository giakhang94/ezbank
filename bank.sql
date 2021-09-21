-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 21, 2021 lúc 08:34 AM
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
-- Cơ sở dữ liệu: `bank`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `bank` varchar(150) NOT NULL,
  `12m_interest` float NOT NULL,
  `fix_interest` float NOT NULL,
  `time_buy` int(11) NOT NULL,
  `time_build` int(11) NOT NULL,
  `time_consumer` int(11) NOT NULL,
  `time_business` int(11) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bank`
--

INSERT INTO `bank` (`id`, `bank`, `12m_interest`, `fix_interest`, `time_buy`, `time_build`, `time_consumer`, `time_business`, `logo`) VALUES
(1, 'EzBank', 8, 12, 300, 180, 96, 12, '1_1632201206.png'),
(2, 'ACB', 6.5, 11, 320, 150, 84, 12, '2_1632201154.png'),
(4, 'VIB', 9, 12.7, 360, 180, 96, 24, '4_1631974906.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `demand` text NOT NULL,
  `incom` float NOT NULL,
  `HK` text NOT NULL,
  `CIC` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `sdt`, `email`, `demand`, `incom`, `HK`, `CIC`, `status`) VALUES
(2, 'Nguyễn Gia Khang', '0903282901', 'ngk.khang94@gmail.com', 'Vay mua nhà 3tỷ, vay 500trđ', 35000000, 'Tỉnh khác', 'Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)', 0);

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
(2, 'VCB', 'Testo', 10, '056456', '090328', 'HVH', 200, 'BIDV', 22, '', 'Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)', 'Độc thân'),
(3, 'VCB', 'Khang', 2, '056456', '100', 'HVH', 200, 'BIDV', 35000000, 'TP.HCM', 'Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)', 'Độc thân'),
(4, 'VCB', 'Khang', 1, '056456', '0903282901', 'HVH', 200, 'BIDV', 35000000, 'TP.HCM', 'Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)', 'Độc thân'),
(5, 'VCB', 'Khang', 2, '056456', '0903282901', 'HVH', 200, 'BIDV', 35000000, 'TP.HCM', 'Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)', 'Độc thân'),
(6, 'VCB', 'Khang', 22, '056456', '0903282901', 'Vĩnh Long', 200, 'BIDV', 35000000, 'Tỉnh khác', 'Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)', 'Độc thân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `user_name` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `user_name`, `pass`, `email`, `phone`) VALUES
(1, 'Khang Nguyễn', 'khang_admin', '4993011d458fece6de9949710102c2c5ad616545', 'ngk.khang94@gmail.com', '0903282901'),
(2, 'Heo Phương', 'phuong_mod', '669789a8c338354c8939202a4b0c1cd9f40a501a', 'phuong@gmail.com', '0903292901');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `daohan`
--
ALTER TABLE `daohan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`) USING HASH;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `daohan`
--
ALTER TABLE `daohan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
