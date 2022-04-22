-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 06:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(5) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'admin', 'Admin', 2147483647, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-03-02 20:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(11) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `VehicleCat`) VALUES
(6, '3 wheeler Auto'),
(5, '4 Wheeler Tractor'),
(3, 'Four Wheeler'),
(2, 'Three Wheeler'),
(4, 'Three Wheeler Autoo'),
(1, 'Two Wheeler');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `ID` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `EnquiryNumber` varchar(120) NOT NULL,
  `EnquiryType` varchar(120) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `EnquiryDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminResponse` varchar(250) DEFAULT NULL,
  `AdminStatus` int(11) DEFAULT NULL,
  `AdminRemarkdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`ID`, `UserId`, `EnquiryNumber`, `EnquiryType`, `Description`, `EnquiryDate`, `AdminResponse`, `AdminStatus`, `AdminRemarkdate`) VALUES
(1, 10, '320977403', 'Service Related Enquiry', 'I want service my bike can u please give me price.', '2021-03-07 05:33:46', 'Prices of servicing bike given below.', 1, '2021-03-07 06:33:19'),
(2, 9, '612700713', 'Parts Related Enquiry', 'Can you change ggjhg parts of my bike and how much its cost', '2021-03-08 05:33:44', 'Yes we can. its cost is 8500 rs', 1, '2021-03-08 05:33:44'),
(3, 11, '467395787', 'Service Related Enquiry', 'I want to know cost of spares parts of maruti suzuki car.', '2021-03-15 04:33:08', 'Dear Mayank,\r\nThere is different spare of different company and price dependent on that so please visit to our service centre so we can assist you better.', 1, '2021-03-15 04:33:08'),
(4, 7, '368658342', 'Price Related Enquiry', 'I want to know the price of servicing three-wheeler.', '2021-03-25 00:33:26', 'This is sample text for testing.', 1, '2021-03-25 00:33:26'),
(5, 13, '425316470', 'Service Related Enquiry', 'I want to know the price of four wheeler service', '2021-04-04 05:34:47', 'This is sample remark for testing', 1, '2021-04-04 05:34:47'),
(6, 14, '364765545', 'Price Related Enquiry', 'kjljlkjkjj', '2021-12-24 03:42:35', '', 0, '2021-12-24 03:42:35'),
(7, 15, '322007242', 'Other Enquiry', 'This is for testing.', '2021-12-24 16:59:47', 'Hi, How ca I Help you', 1, '2021-12-24 16:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquirytype`
--

CREATE TABLE `tblenquirytype` (
  `ID` int(11) NOT NULL,
  `EnquiryType` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblenquirytype`
--

INSERT INTO `tblenquirytype` (`ID`, `EnquiryType`) VALUES
(4, 'Other Enquiry'),
(3, 'Parts Related Enquiry'),
(2, 'Price Related Enquiry'),
(1, 'Service Related Enquiry');

-- --------------------------------------------------------

--
-- Table structure for table `tblmechanics`
--

CREATE TABLE `tblmechanics` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Address` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmechanics`
--

INSERT INTO `tblmechanics` (`ID`, `FullName`, `MobileNumber`, `Email`, `Address`) VALUES
(1, 'Shonaya', 8287654547, 'lal@gmail', 'H.NO 6/8 New Delhi'),
(2, 'Naveen', 7967890288, 'munna@gmail.com', '6790 Plot, Delhi'),
(3, 'Rashid', 5399365859, 'rashid@gmail.com', '45-A, gali no 50, new colony new delhi'),
(4, 'Rahul Kumar', 9865486484, 'rahul@gmail.com', 'c/o, Mohan Rajnagar near metro place B3/4144'),
(5, 'Harish Singh', 7697547903, 'harish@gmail.com', 'gh-67, sohna road haryana'),
(6, 'Jone', 8976565718, 'jone@gmail.com', 'shastri Niketan gali no:75 near baikund dham neelgari Himchal Pradesh'),
(8, 'amit singh', 256974123, 'amit@test.com', 'New Delhi India');

-- --------------------------------------------------------

--
-- Table structure for table `tblservicerequest`
--

CREATE TABLE `tblservicerequest` (
  `ID` int(10) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ServiceNumber` char(20) NOT NULL,
  `Category` varchar(120) DEFAULT NULL,
  `VehicleName` varchar(120) DEFAULT NULL,
  `VehicleModel` varchar(120) DEFAULT NULL,
  `VehicleBrand` varchar(120) DEFAULT NULL,
  `VehicleRegno` varchar(120) DEFAULT NULL,
  `ServiceDate` date DEFAULT NULL,
  `ServiceTime` varchar(100) DEFAULT NULL,
  `DeliveryType` varchar(120) DEFAULT NULL,
  `PickupAddress` varchar(120) DEFAULT NULL,
  `ServicerequestDate` timestamp NULL DEFAULT current_timestamp(),
  `ServiceBy` varchar(120) DEFAULT NULL,
  `ServiceCharge` int(10) DEFAULT NULL,
  `PartsCharge` int(10) DEFAULT NULL,
  `OtherCharge` int(10) DEFAULT NULL,
  `AdminRemark` varchar(120) DEFAULT NULL,
  `AdminStatus` varchar(120) DEFAULT NULL,
  `AdminRemarkdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservicerequest`
--

INSERT INTO `tblservicerequest` (`ID`, `UserId`, `ServiceNumber`, `Category`, `VehicleName`, `VehicleModel`, `VehicleBrand`, `VehicleRegno`, `ServiceDate`, `ServiceTime`, `DeliveryType`, `PickupAddress`, `ServicerequestDate`, `ServiceBy`, `ServiceCharge`, `PartsCharge`, `OtherCharge`, `AdminRemark`, `AdminStatus`, `AdminRemarkdate`) VALUES
(1, 7, '530203057', 'Two Wheeler', 'Activa Scooter', '3G', 'Honda', 'DL3C AR-4851', '2021-04-24', '00:00:00', 'pickupservice', 'Mayur Vihar Phase 1 New Delhi', '2021-04-03 04:34:44', 'Harish Singh', 1234, 500, 0, 'This sample text for testing.', '3', '2021-12-24 04:42:33'),
(2, 7, '300012550', 'Two Wheeler', 'Pulsor ', '220CC', 'Bajaj', 'UP13 AB3111', '2021-04-04', '13:11', 'dropservice', '', '2021-04-03 04:34:09', '', 0, 0, 0, '', '2', '2021-12-24 04:42:33'),
(3, 13, '826535329', 'Two Wheeler', 'Activa', '3g', 'Honda', 'DL3C AR 4861', '2021-04-09', '12:30', 'pickupservice', 'Mayur Vihar Phase 1 Delhi', '2021-04-04 05:34:58', 'Naveen', 1200, 1100, 100, 'Service done', '3', '2021-12-24 04:42:33'),
(4, 14, '293257314', 'Four Wheeler', 'Maruti Suziki', '7894', 'Maruti', 'DL-98776', '2021-12-26', '09:57', 'pickupservice', 'Testjhgjhgjhg', '2021-12-24 03:42:22', 'Rahul Kumar', 1200, 890, 123, 'Your service car service is in progress', '3', '2021-12-24 04:42:33'),
(5, 14, '856784543', 'Two Wheeler', 'khkhjk', 'hkjhkj', 'hkjhkjh', 'hkjhkj', '2021-12-25', '14:01', 'pickupservice', ';lkk;l;k', '2021-12-24 04:42:37', '', 0, 0, 0, '', '1', '2021-12-24 04:42:33'),
(6, 15, '976606276', 'Two Wheeler', 'Activa', '4G', 'Honda', 'UP78AG7890', '2021-12-26', '12:31', 'pickupservice', 'Ghaziabad 201017', '2021-12-24 17:02:14', 'Rashid', 845, 120, 120, 'Service Done', '3', '2021-12-24 17:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNo` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNo`, `Email`, `Password`, `RegDate`) VALUES
(7, 'Thisal Perera', 6677777777, 'anuj@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-03-01 00:33:21'),
(8, 'Anuj', 3456778888, 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-03-01 00:33:01'),
(13, 'Test user', 1234567890, 'testuser@test.com', 'f925916e2754e5e03f75dd58a5733251', '2021-04-04 05:34:04'),
(14, 'Test Test Test', 7878787878, 'testtest@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-24 03:42:58'),
(16, 'Tharindu Weerasooriya', 889765283, 'tjk.23@gmail.com', 'e864a59d5d3fb7d439dd4ddd4797ab22', '2022-03-23 12:55:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VehicleCat` (`VehicleCat`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `eqtype` (`EnquiryType`);

--
-- Indexes for table `tblenquirytype`
--
ALTER TABLE `tblenquirytype`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EnquiryType` (`EnquiryType`);

--
-- Indexes for table `tblmechanics`
--
ALTER TABLE `tblmechanics`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FullName` (`FullName`);

--
-- Indexes for table `tblservicerequest`
--
ALTER TABLE `tblservicerequest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblenquirytype`
--
ALTER TABLE `tblenquirytype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblmechanics`
--
ALTER TABLE `tblmechanics`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblservicerequest`
--
ALTER TABLE `tblservicerequest`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD CONSTRAINT `eqtype` FOREIGN KEY (`EnquiryType`) REFERENCES `tblenquirytype` (`EnquiryType`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
