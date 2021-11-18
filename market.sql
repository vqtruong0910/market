-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 31, 2021 lúc 02:40 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `market`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Description`) VALUES
(1, 'Fruit', 'Trái cây tươi sạch được nhập khẩu từ Đà Lạt'),
(2, 'Green Vegetables', 'Rau xanh sạch rõ nguồn gốc vệ sinh an toàn thực ph'),
(3, 'Spices', 'Gia vị được chế biến vệ sinh an toàn thực phẩm'),
(6, 'Pea', 'Đậu ngon béo giòn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(10) NOT NULL,
  `Password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `FullName` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`CustomerID`, `Password`, `FullName`, `Address`, `City`) VALUES
(1, '123', 'truong', 'lagi', 'Binh Thuan'),
(5, '123', 'hello', 'Quan Cam', 'Ho Chi Minh'),
(6, '123', 'hello1', 'Quan Cam', 'Tu Nhan'),
(7, '123', 'truong123', 'asdasd', 'Ho Chi Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `VegetableID` int(10) NOT NULL,
  `Quantity` tinyint(4) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `VegetableID`, `Quantity`, `Price`) VALUES
(7, 1, 1, 5000),
(8, 1, 1, 5000),
(8, 2, 1, 2000),
(9, 1, 1, 5000),
(9, 5, 1, 6000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Total` float NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `Date`, `Total`, `Note`) VALUES
(7, 1, '2021-08-30', 5000, ''),
(8, 7, '2021-08-30', 7000, ''),
(9, 7, '2021-08-30', 11000, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vegetable`
--

CREATE TABLE `vegetable` (
  `VegetableID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `VegetableName` varchar(30) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vegetable`
--

INSERT INTO `vegetable` (`VegetableID`, `CategoryID`, `VegetableName`, `Unit`, `Amount`, `Image`, `Price`) VALUES
(1, 2, 'Rau ngót', 'Bó', 70, '20190701_083747_730217_rau-ngot.max-800x800.jpg', 5000),
(2, 3, 'Tiêu xay', 'Gram', 100, '4546_Nguon_SAM_Agritech.jpg', 2000),
(3, 1, 'Táo mỹ', 'Kg', 100, 'hinh51_dxyt.jpg', 50000),
(5, 2, 'Rau muống', 'Bó', 50, 'unnamed.jpg', 6000),
(6, 2, 'Rau muống', 'Bó', 50, 'unnamed.jpg', 6000),
(7, 2, 'Rau muống', 'Bó', 123, '', 123),
(8, 1, 'Dâu Tây', 'Kg', 50, 'anhdautay.jpg', 60000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`VegetableID`) USING BTREE,
  ADD KEY `VegetableID` (`VegetableID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Chỉ mục cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  ADD PRIMARY KEY (`VegetableID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  MODIFY `VegetableID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`VegetableID`) REFERENCES `vegetable` (`VegetableID`),
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Các ràng buộc cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  ADD CONSTRAINT `vegetable_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
