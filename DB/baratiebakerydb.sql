-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2022 at 07:17 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baratiebakerydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

DROP TABLE IF EXISTS `tblcart`;
CREATE TABLE IF NOT EXISTS `tblcart` (
  `CartID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  PRIMARY KEY (`CartID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcounts`
--

DROP TABLE IF EXISTS `tblcounts`;
CREATE TABLE IF NOT EXISTS `tblcounts` (
  `CartRefer` varchar(200) NOT NULL,
  `CartCount` int(11) NOT NULL,
  `HistoryRefer` varchar(20) NOT NULL,
  `HistoryCount` int(11) NOT NULL,
  `ContentRefer` varchar(200) NOT NULL,
  `ContentCount` int(11) NOT NULL,
  PRIMARY KEY (`CartCount`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcounts`
--

INSERT INTO `tblcounts` (`CartRefer`, `CartCount`, `HistoryRefer`, `HistoryCount`, `ContentRefer`, `ContentCount`) VALUES
('CartR', 0, 'HistoryR', 13, 'ContentR', 1027);

-- --------------------------------------------------------

--
-- Table structure for table `tblhistory`
--

DROP TABLE IF EXISTS `tblhistory`;
CREATE TABLE IF NOT EXISTS `tblhistory` (
  `HistoryID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  PRIMARY KEY (`HistoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhistory`
--

INSERT INTO `tblhistory` (`HistoryID`, `ProductID`) VALUES
(5, 1022),
(4, 1015),
(3, 1011),
(2, 1006),
(1, 1001),
(6, 1003),
(7, 1008),
(8, 1013),
(9, 1017),
(10, 1018),
(11, 1026),
(12, 1011),
(13, 1002);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `ProdCategory` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProdImg` varchar(2000) NOT NULL,
  `ProdDesc` varchar(2000) NOT NULL,
  `Availability` int(5) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`ProdCategory`, `ProductID`, `ProductName`, `Price`, `OrderID`, `ProdImg`, `ProdDesc`, `Availability`) VALUES
(101, 1001, 'Sandwich Bread-Sliced', '500.00', 9001, 'Images/11 Sandwich Bread-Sliced.jpeg', 'Perfectly designed for holding square luncheon meat.', 1),
(102, 1002, 'Bread Loaf - Unsliced', '210.00', 9002, 'Images/12 Bread Loaf - Unsliced.jpeg', 'Large enough for more than one person and can be cut into slices.', 1),
(103, 1003, 'Butter Bread', '300.00', 9003, 'Images/13 Butter Bread.jpeg', 'Wheat bread enriched by added quantities of butter in the recipe.', 1),
(104, 1004, 'Brown Bread-Sliced', '270.00', 9004, 'Images/14 Brown Bread-Sliced.jpeg', 'Made with 100% whole grain flour and high in fibre, this is a health-friendly classic. Pack it in your children\'s lunches for a serving of whole grains.', 1),
(105, 1005, 'Currant Bread', '340.00', 9005, 'Images/15 Currant Bread.jpeg', 'European sweet bun that contains currants or raisins.', 1),
(201, 1006, 'Chicken Pizza', '195.00', 9006, 'Images/21 Chicken Pizza.jpeg', '', 1),
(202, 1007, 'Chicken Pastry', '150.00', 9007, 'Images/22 Chicken Pastry.jpeg', '', 1),
(203, 1008, 'Vegetable Roll', '130.00', 9008, 'Images/23 Vegetable Rolls.jpeg', '', 1),
(204, 1009, 'Chicken Roll', '140.00', 9009, 'Images/23 Vegetable Rolls.jpeg', '', 1),
(205, 1010, 'Vegetable Pastry', '130.00', 9010, 'Images/22 Chicken Pastry.jpeg', '', 1),
(301, 1011, 'Tea Bun', '100.00', 9011, 'Images/31 Tea Bun.jpg', '', 1),
(302, 1012, 'Cheese & Chicken Bun', '170.00', 9012, 'Images/32 Cheese and Chicken Bun.jpeg', '', 1),
(303, 1013, 'Plain Burger Bun', '70.00', 9013, 'Images/33 Plain Burger Bun.jpg', '', 1),
(304, 1014, 'Hot Dog', '200.00', 9014, 'Images/34 Hot Dog.jpg', '', 0),
(401, 1015, 'Butter Cake', '780.00', 9015, 'Images/41 Butter Cake.jpeg', 'Butter Cake 325 g', 1),
(402, 1016, 'Butter Cake', '1800.00', 9016, 'Images/42 Butter Cake 1kg.jpeg', 'Butter Cake 1kg', 1),
(403, 1017, 'Chocolate Cake', '2200.00', 9017, 'Images/43 Chocolate Cake 1kg.jpeg', 'Chocolate Cake 1kg', 1),
(404, 1018, 'Vanilla Cup Cake', '160.00', 9018, 'Images/44 Vanilla Cup Cake.jpeg', '', 1),
(405, 1019, 'Chocolate Cup Cake', '180.00', 9019, 'Images/45 Chocolate Cup Cake.jpeg', '', 1),
(406, 1020, 'Chocolate Fudge Gateau', '4500.00', 9020, 'Images/46 Chocolate Fudge Gateau 1kg.jpeg', 'Chocolate Fudge Gateau 1kg', 0),
(407, 1021, 'Banana Bread (Cake)', '375.00', 9021, 'Images/47 Banana Bread (Cake).jpeg', '', 1),
(501, 1022, 'Swiss Roll-Chocolate', '600.00', 9022, 'Images/51 Swiss Roll-Chocolate.jpeg', '', 1),
(502, 1023, 'Chocolate Chip Cookies', '125.00', 9023, 'Images/52 Chocolate Chip Cookies Packet.jpeg', 'Chocolate Chip Cookies Packet', 1),
(503, 1024, 'Bake Well Tart', '80.00', 9024, 'Images/53 Bake Well Tart.jpeg', '', 0),
(504, 1025, 'Coconut Macaroon', '130.00', 9025, 'Images/54 Coconut Macaroon.jpeg', '', 1),
(505, 1026, 'Cinnamon Roll', '110.00', 9026, 'Images/55 Cinnamon Roll.jpeg', '', 1),
(0, 0, ' ', '0.00', 0, 'Images/Nothing.png', ' ', 1),
(601, 1027, 'Chicken Burger', '155.00', 9027, 'Images/61 Chicken Burger.jpeg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `Email` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `UserImg` varchar(200) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`Email`, `Username`, `Password`, `Phone`, `Type`, `UserImg`) VALUES
('arophn@gmail.com', 'Aaroophan', 'BBAaroophan', '0768505131', 'Customer', 'Images/channels4_profile.jpg'),
('admin@baratie.com', 'admin', 'admin', '0123456789', 'Admin', 'Images/BaratieBakeryIcon.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
