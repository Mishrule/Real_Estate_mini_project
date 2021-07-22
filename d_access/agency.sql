-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 11:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agentid` int(20) NOT NULL,
  `agentname` varchar(250) NOT NULL,
  `agentbio` varchar(250) NOT NULL,
  `agentlocation` varchar(250) NOT NULL,
  `agentcontact` varchar(250) NOT NULL,
  `agentemail` varchar(250) NOT NULL,
  `agentimage` varchar(250) NOT NULL,
  `createddate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agentid`, `agentname`, `agentbio`, `agentlocation`, `agentcontact`, `agentemail`, `agentimage`, `createddate`) VALUES
(7, 'Akwesi Mensah', 'Fair in complexion', 'Tansono', '111111111', 'agent@email.com', 'error-message-l10n-blazor-webassembly-form.png', 'July-20-2021 20:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `landlord`
--

CREATE TABLE `landlord` (
  `landlordid` int(20) NOT NULL,
  `landlordname` varchar(250) NOT NULL,
  `landlordbio` varchar(250) NOT NULL,
  `landlordlocation` varchar(250) NOT NULL,
  `landlordcontact` varchar(250) NOT NULL,
  `landlordpassword` varchar(250) NOT NULL,
  `landlordemail` varchar(250) NOT NULL,
  `landlordimage` varchar(250) NOT NULL,
  `createddate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `landlord`
--

INSERT INTO `landlord` (`landlordid`, `landlordname`, `landlordbio`, `landlordlocation`, `landlordcontact`, `landlordpassword`, `landlordemail`, `landlordimage`, `createddate`) VALUES
(4, 'Mr Seth', 'From Kumasi', 'Kumasi', '1234569854', '1', 'landlord@email.com', '768x432.jpg', 'July-20-2021 20:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(20) NOT NULL,
  `tenantname` varchar(250) NOT NULL,
  `propertyname` varchar(250) NOT NULL,
  `landlordname` varchar(250) NOT NULL,
  `monthstorent` varchar(250) NOT NULL,
  `amountpermonth` varchar(250) NOT NULL,
  `amountchargedbyagency` varchar(250) NOT NULL,
  `paymenttoagency` varchar(250) NOT NULL,
  `paymenttolandlord` varchar(250) NOT NULL,
  `totalpayment` varchar(250) NOT NULL,
  `transactionid` varchar(250) NOT NULL,
  `month` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `createddate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `tenantname`, `propertyname`, `landlordname`, `monthstorent`, `amountpermonth`, `amountchargedbyagency`, `paymenttoagency`, `paymenttolandlord`, `totalpayment`, `transactionid`, `month`, `year`, `createddate`) VALUES
(1, 'Fred Arthur', '7', 'Mr Seth', '12', '150', '50', '600', '1800', '2400', '1626906503534', 'July', '2021', 'July-21-2021 22:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `propid` int(20) NOT NULL,
  `propname` varchar(250) NOT NULL,
  `propDescription` varchar(250) NOT NULL,
  `proplocation` varchar(250) NOT NULL,
  `propstatus` varchar(250) NOT NULL,
  `proprooms` varchar(250) NOT NULL,
  `propbathrooms` varchar(250) NOT NULL,
  `propgarage` varchar(250) NOT NULL,
  `propwater` varchar(250) NOT NULL,
  `propfloortype` varchar(250) NOT NULL,
  `propagentname` varchar(250) NOT NULL,
  `proplandlord` varchar(250) NOT NULL,
  `proproomaction` varchar(250) NOT NULL,
  `propimage` varchar(250) NOT NULL,
  `propamount` varchar(250) NOT NULL,
  `propamountcharged` varchar(250) NOT NULL,
  `proptotal` varchar(20) NOT NULL,
  `createddate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propid`, `propname`, `propDescription`, `proplocation`, `propstatus`, `proprooms`, `propbathrooms`, `propgarage`, `propwater`, `propfloortype`, `propagentname`, `proplandlord`, `proproomaction`, `propimage`, `propamount`, `propamountcharged`, `proptotal`, `createddate`) VALUES
(7, 'Alvan lodge', 'Single room selfcontain,', 'Tanoso', 'Not Occupied', '1', '1', 'No', 'Yes', 'Cement', 'Akwesi Mensah', 'Mr Seth', 'InActive', 'Blazor-Development.jpg', '150', '50', '200', 'July-20-2021 20:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `propertyimage`
--

CREATE TABLE `propertyimage` (
  `propid` varchar(50) NOT NULL,
  `propimage` varchar(250) NOT NULL,
  `datecreated` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertyimage`
--

INSERT INTO `propertyimage` (`propid`, `propimage`, `datecreated`) VALUES
('2', '768x432.jpg', 'July-17-2021 14:07:03'),
('2', 'BlazorBackground.jpg', 'July-17-2021 15:08:45'),
('4', 'Blazor-Development.jpg', 'July-17-2021 22:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonalid` int(20) NOT NULL,
  `testimonalname` varchar(250) NOT NULL,
  `testimonaldescription` varchar(250) NOT NULL,
  `testimonallocation` varchar(250) NOT NULL,
  `testimonalimage` varchar(250) NOT NULL,
  `createddate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(20) NOT NULL,
  `userfirstname` varchar(250) NOT NULL,
  `userlastname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `userpassword` varchar(250) NOT NULL,
  `userlocation` varchar(250) NOT NULL,
  `useremail` varchar(250) NOT NULL,
  `useraccesslevel` varchar(250) NOT NULL,
  `userimage` varchar(250) NOT NULL,
  `createddate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `userfirstname`, `userlastname`, `username`, `userpassword`, `userlocation`, `useremail`, `useraccesslevel`, `userimage`, `createddate`) VALUES
(2, 'Kofi', 'Amanoh', 'kamanoh', '1', 'Ksi', 'user@mail.com', 'Administrator', '768x432.jpg', 'July-20-2021 16:23:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agentid`);

--
-- Indexes for table `landlord`
--
ALTER TABLE `landlord`
  ADD PRIMARY KEY (`landlordid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propid`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonalid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agentid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `landlord`
--
ALTER TABLE `landlord`
  MODIFY `landlordid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `propid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonalid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
