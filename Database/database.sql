-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2019 lúc 06:47 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tsl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdondathang`
--

CREATE TABLE `chitietdondathang` (
  `MaChiTietDonDatHang` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `MaSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdondathang`
--

INSERT INTO `chitietdondathang` (`MaChiTietDonDatHang`, `SoLuong`, `GiaBan`, `MaDonDatHang`, `MaSanPham`) VALUES
(1, 3, 1050000, '1', 3),
(2, 4, 660000, '1', 11),
(3, 5, 1050000, '2', 3),
(4, 1, 950000, '2', 6),
(5, 1, 790000, '3', 2),
(6, 2, 660000, '3', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `MaDonDatHang` int(11) NOT NULL,
  `NgayLap` datetime DEFAULT NULL,
  `TongThanhTien` int(11) DEFAULT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaTinhTrang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`MaDonDatHang`, `NgayLap`, `TongThanhTien`, `MaTaiKhoan`, `MaTinhTrang`) VALUES
(1, '2019-12-27 22:35:23', 5790000, 1, 4),
(2, '2019-12-27 22:58:54', 6200000, 1, 3),
(3, '2019-12-28 12:19:55', 2110000, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHangSanXuat` int(11) NOT NULL,
  `TenHangSanXuat` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSanXuat`, `TenHangSanXuat`, `BiXoa`) VALUES
(1, 'Samsung', 0),
(2, 'Crucial  ', 0),
(3, 'Sandisk  ', 0),
(4, 'Kingston', 0),
(5, 'Western Digital ', 0),
(6, 'Plextor  ', 0),
(7, 'Intel', 0),
(8, 'Seagate', 0),
(9, 'G.Skill', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoaiSanPham` int(11) NOT NULL,
  `TenLoaiSanPham` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `BiXoa`) VALUES
(1, 'SSD', 0),
(2, 'Thẻ nhớ', 0),
(3, 'USB', 0),
(4, 'RAM', 0),
(5, 'HDD', 0),
(6, 'Ổ CỨNG DESKTOP/CLOUD', 0),
(7, 'PHỤ KIỆN', 0),
(8, 'đasdđ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaSanPham` int(11) DEFAULT NULL,
  `NgayNhap` date DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `SoLuotXem` int(11) DEFAULT 0,
  `MoTa` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 0,
  `MaLoaiSanPham` int(11) NOT NULL,
  `MaHangSanXuat` int(11) NOT NULL,
  `BaoHanh` int(12) DEFAULT NULL,
  `SoLuongDaBan` int(12) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `HinhURL`, `GiaSanPham`, `NgayNhap`, `SoLuong`, `SoLuotXem`, `MoTa`, `BiXoa`, `MaLoaiSanPham`, `MaHangSanXuat`, `BaoHanh`, `SoLuongDaBan`) VALUES
(1, 'SSD Crucial BX500 3D NAND SATA III 2.5 inch 1', 'SSD-Crucial-1.jpg', 499000, '2019-12-27', 30, 0, '- Chuẩn SSD: 2.5 inches </br>\r\n- Tốc độ đọc: 540 MB/s </br>\r\n- Tốc độ ghi: 500 MB/s </br>', 0, 1, 2, 3, 0),
(2, 'SSD Samsung NVMe PM961 M.2 PCIe Gen3 x4 128GB', 'SSD-Samsung-1.jpg', 790000, '2019-12-28', 30, 0, '- Chuẩn SSD: M.2 NVMe Gen3 x4 <br/>\r\n- Tốc độ đọc: 2800 MB/s <br/>\r\n- Tốc độ ghi: 600 MB/s <br/>', 0, 1, 1, 3, 0),
(3, 'SSD Kingston UV500 3D-NAND mSATA SATA III 240', 'SSD-Kingston-1.jpg', 1050000, '2019-12-30', 30, 0, '- Chuẩn SSD: mSATA <br/>\r\n- Tốc độ đọc: 520 MB/s <br/>\r\n- Tốc độ ghi: 500 MB/s <br/>', 0, 1, 4, 3, 0),
(4, 'SSD Crucial MX500 3D NAND SATA III 2.5 inch 2', 'SSD-Crucial-2.jpg', 1050000, '2019-12-26', 30, 0, '- Chuẩn SSD: 2.5 inches <br/>\r\n- Tốc độ đọc: 560 MB/s <br/>\r\n- Tốc độ ghi: 510 MB/s <br/>', 0, 1, 2, 3, 0),
(5, 'SSD Samsung 860 Evo 250GB 2.5-Inch SATA III M', 'SSD-Samsung-2.jpg', 1120000, '2018-08-30', 30, 0, 'Chuẩn SSD: 2.5 inches\r\nTốc độ đọc: 550 MB/s\r\nTốc độ ghi: 520 MB/s', 0, 1, 1, 3, 0),
(6, 'SSD Plextor M8V 256GB 2.5-Inch SATA III PX-25', 'SSD-Plextor-1.jpg', 950000, '2019-12-26', 30, 0, 'Chuẩn SSD: 2.5 inches\r\nTốc độ đọc: 560 MB/s\r\nTốc độ ghi: 510 MB/s', 0, 1, 6, 3, 0),
(7, 'SSD Kingston A400 M.2 2280 SATA 3 120GB SA400', 'SSD-Kingston-2.jpg', 550000, '2019-12-30', 33, 0, 'Chuẩn SSD: M.2 2280 SATA III\r\nTốc độ đọc: 500 MB/s\r\nTốc độ ghi: 320 MB/s', 0, 1, 4, 3, 0),
(8, 'SSD Kingston A400 SATA 3 120GB SA400S37/120G', 'SSD-Kingston-3.jpg', 550000, '2019-12-20', 33, 0, 'Chuẩn SSD: 2.5 inches\r\nTốc độ đọc: 500 MB/s\r\nTốc độ ghi: 320 MB/s', 0, 1, 4, 3, 0),
(9, 'SSD Seagate Firecuda 510 M.2 PCIe Gen3 x4 NVM', 'SSD-Seagate-1.jpg', 6500000, '2019-12-31', 33, 0, 'Chuẩn SSD: M.2 NVMe 1.3 Gen3 x4\r\nTốc độ đọc: 3450 MB/s\r\nTốc độ ghi: 3200 MB/s', 0, 1, 8, 3, 0),
(10, 'SSD Enterprise Seagate IronWolf 110 2.5 inch ', 'SSD-Seagate-2.jpg', 13500000, '2019-01-01', 33, 0, 'Chuẩn SSD: 2.5 inches\r\nTốc độ đọc: 560 MB/s\r\nTốc độ ghi: 535 MB/s', 0, 1, 8, 3, 0),
(11, 'Ram PC G.SKILL Aegis 8GB 2666MHz DDR4 (8GBx1)', 'RAM-GSkill-1.jpg', 660000, '2019-12-31', 32, 0, 'Loại sản phẩm: Ram PC\r\nDung lượng: 8GB (1 x 8GB) \r\nChuẩn: DDR4\r\nBus: 2666 Mhz\r\nĐiện áp: 1.2v', 0, 4, 9, 3, 0),
(12, 'Ram PC Kingston HyperX Fury Black 8GB 2666MHz', 'RAM-Kingston-1.jpg', 800000, '2019-12-26', 31, 0, 'Loại sản phẩm: Ram PC\r\nDung lượng: 8 GB(1 x 8 GB)\r\nChuẩn: DDR4\r\nBus: 2666 Mhz\r\nĐiện áp: 1.2v', 0, 4, 4, 3, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `TenDangNhap` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HoTen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `Xoa` tinyint(1) DEFAULT 0,
  `Quyen` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `TenDangNhap`, `MatKhau`, `HoTen`, `DiaChi`, `DienThoai`, `Email`, `NgaySinh`, `Xoa`, `Quyen`) VALUES
(1, 'admin', 'thachvi123', 'TranQUocTan', 'Trần Xuân Soạn, Quận 7, Hồ Chí Minh', '0335148544', 'quoctan342@gmail.com', '1999-06-05', 0, 1),
(2, 'Teeseven', '865856', 'Trần Quốc Tân', 'Hồ Chí Minh', '03351458444', 'teetrangtreo@gmail.com', '2222-08-09', 0, 0),
(7, 'TrumCuoi', 'Abc12345', 'TrumCuoi', 'Hồ Chí Minh', '03351485554', 'quoctan3422@gmail.com', '2018-01-01', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `MaTinhTrang` int(11) NOT NULL,
  `TenTinhTrang` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`MaTinhTrang`, `TenTinhTrang`) VALUES
(1, 'Chưa thanh toán'),
(2, 'Thanh toán '),
(3, 'Đã giao'),
(4, 'Chưa giao'),
(5, 'Đã hủy'),
(6, 'Đang giao');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  ADD PRIMARY KEY (`MaChiTietDonDatHang`);

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`MaDonDatHang`);

--
-- Chỉ mục cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHangSanXuat`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoaiSanPham`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`MaTinhTrang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  MODIFY `MaChiTietDonDatHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `MaDonDatHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHangSanXuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `MaTinhTrang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
