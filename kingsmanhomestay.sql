-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 02:50 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingsmanhomestay`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`) VALUES
(2, 'Phòng giường đơn'),
(3, 'Phòng giường đôi'),
(4, 'Phòng giường ba');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ID` int(11) NOT NULL,
  `Name` varchar(500) CHARACTER SET utf8 NOT NULL COMMENT 'tên file hình ảnh kèm theo định dạng hình ảnh, Ví dụ: hinh1.jpg hoặc hinh2.png',
  `RoomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `Name`, `RoomID`) VALUES
(1, '80368200.jpg', 1),
(2, '114938123.jpg', 1),
(3, '114938125.jpg', 1),
(4, '114938133.jpg', 2),
(5, '114938136.jpg', 2),
(6, '80368169.jpg', 2),
(7, '78472245.jpg', 3),
(8, '78472251.jpg', 3),
(9, '78472249.jpg', 3),
(10, '80368185.jpg', 4),
(11, '5_w.jpg', 5),
(12, '6318_rokga_00_p_1024x768.jpg', 6),
(13, 'lux357gr.146482_1600x900-LUXROOM-.jpg', 7),
(14, 'Sofitel-Singapore-Sentosa-Luxury-Room-827x465.jpg', 8),
(15, '4_Bedroom_Luxurious_Homestay_in_Arossim_-_South_Goa_Indianhomestays__13_.jpg', 4),
(16, 'image_upmarket-4-bedroom-residential-home-on-the-most-prestigious-road-of-umhlanga-rocks_9ePJ1ErplhaI.jpg', 5),
(17, 'Hunters_Rest_2nd_visit_33.jpg.1366x768_q85_crop_upscale.jpg', 6),
(18, 'singha-sanasa-luxury-homestay-5.jpg', 7),
(19, '65029156.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `moderators`
--

CREATE TABLE `moderators` (
  `ID` int(11) NOT NULL,
  `Fullname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moderators`
--

INSERT INTO `moderators` (`ID`, `Fullname`, `Username`, `Password`) VALUES
(1, 'Kingsman', 'Kingsman', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `CustomerIdentifyNumber` varchar(30) DEFAULT NULL COMMENT 'Số chứng minh nhân dân của khách hàng',
  `CustomerName` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CustomerPhone` varchar(20) NOT NULL,
  `CustomerAddress` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'địa chỉ này khi khách nhận phòng nhân viên xem qua giấy chứng minh của họ để biết để qua mục chỉnh sửa đơn hàng để mà cập nhật lại',
  `RoomID` int(11) NOT NULL,
  `CheckInDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CheckOutDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Total` float NOT NULL COMMENT 'total = giá phòng * (CheckOutDate - CheckInDate)',
  `Note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `NumberOfCall` int(11) NOT NULL DEFAULT '0' COMMENT 'Số lần gọi điện thoại cho khách hàng',
  `Status` tinyint(1) NOT NULL COMMENT '1: Chưa nhận phòng | 2: Đã nhận phòng | 3: Đã thanh toán | 4: Đã hủy ',
  `CreationTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày hóa đơn này được tạo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `CustomerIdentifyNumber`, `CustomerName`, `CustomerPhone`, `CustomerAddress`, `RoomID`, `CheckInDate`, `CheckOutDate`, `Total`, `Note`, `NumberOfCall`, `Status`, `CreationTime`) VALUES
(1, '12345678', 'Nhân', '1234567', 'địa chỉ này khi khách nhận phòng nhân viên xem qua giấy chứng minh của họ để biết để qua mục chỉnh sửa đơn hàng để mà cập nhật lại', 1, '2017-12-09 17:00:00', '2017-12-13 17:00:00', 800000, NULL, 0, 3, '2017-12-03 18:36:44'),
(2, NULL, 'Justin Bieber', '012839812', NULL, 2, '2017-12-11 17:00:00', '2017-12-15 17:00:00', 2000000, NULL, 0, 3, '2017-12-05 10:42:26'),
(6, NULL, 'Messi', '1234567', NULL, 3, '2017-12-04 17:00:00', '2017-12-06 17:00:00', 1400000, NULL, 0, 3, '2017-12-05 16:57:13'),
(7, NULL, 'Ronaldo', '123456', NULL, 1, '2017-12-15 17:00:00', '2017-12-18 17:00:00', 900000, NULL, 0, 3, '2017-12-05 17:04:42'),
(8, NULL, 'Sơn Tùng M-TP', '12434546789', NULL, 3, '2017-12-02 17:00:00', '2017-12-03 17:00:00', 700000, 'Test ghi chú', 2, 3, '2017-12-06 11:17:26'),
(9, '999999', 'Selena Gomes', '99999999', 'Test địa chỉ', 4, '2017-12-11 17:00:00', '2017-12-13 17:00:00', 1400000, '', 0, 3, '2017-12-06 18:01:06'),
(10, NULL, 'Trấn Thành', '124352467', NULL, 4, '2017-12-09 17:00:00', '2017-12-10 17:00:00', 700000, NULL, 3, 3, '2017-12-06 18:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mô tả chi tiết phòng',
  `Ultilities` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mổ tả các tiện ích của phòng',
  `NumberOfPeople` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: Còn trống | 0: Không trống (đã có người thuê)',
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `Name`, `Description`, `Ultilities`, `NumberOfPeople`, `Price`, `Status`, `CategoryID`) VALUES
(1, 'Tên Phòng 1', 'Đây là mô tả', 'Đây là mô tả tiện ích', 2, 300000, 1, 2),
(2, 'Tên Phòng 2', 'Đây là mô tả phòng \r\n2', 'Đây là mô tả tiện ích', 4, 500000, 1, 3),
(3, 'Tên Phòng 3', 'Đây là mô tả phòng 3', 'Đây là mô tả tiện ích', 6, 700000, 1, 4),
(4, 'Test', 'Test mô tả', 'Test tiện ích phòng', 6, 700000, 1, 4),
(5, 'Luxury room', 'Mô tả Luxury room', 'đây là tieejnn ích', 4, 1200000, 1, 4),
(6, 'Test room', 'Test room mô tả', 'Test room tiện ích', 2, 1500000, 1, 2),
(7, 'Giường đôi ', 'Giường đôi  mô tả', 'Giường đôi  tiện ích', 2, 100000, 1, 3),
(8, 'Phòng đẹp', 'Đây là phòng đẹp, giá rẻ bèo', 'Tiện ích rẻ bèo theo giá :)', 2, 150000, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `rooms` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `rooms` (`ID`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
