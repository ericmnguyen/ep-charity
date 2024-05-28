-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 06:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ep_charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `accountId` int(11) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `contactNumber` varchar(50) DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`accountId`, `emailAddress`, `password`, `firstName`, `lastName`, `contactNumber`, `createdDate`, `roleId`) VALUES
(1, 'company11@example.com', '$2y$10$1/AJIiuFQU6pZP16xpEXKejQC9WdWQQZtlzQSUL1v1QKxJpE2SfIS', 'Porter', 'Schneider', '86', '2024-05-22 15:56:26', 1),
(2, 'company@example.com', '$2y$10$9iA1YM.pOqcXR6N6I.JyxedUjKMjvGnVnlPQZ1FATLu1KpoGWwMJK', 'Emerson', 'Schroeder', '910', '2024-05-22 15:57:28', 1),
(3, 'admin@example.com', '$2y$10$8E9uQkEvtxFUThtB1vyrROlU8jxZf87HLNrxNIB0XbB5xtsEg4U/a', 'Oprah', 'Mcneil', '45', '2024-05-22 15:58:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `AccountEvent`
--

CREATE TABLE `AccountEvent` (
  `eventId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `accountEventStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `companyId` int(11) NOT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `accountId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`companyId`, `companyName`, `website`, `image`, `accountId`) VALUES
(1, 'Ayers Conner Co', 'https://www.zic.tv', NULL, 1),
(2, 'Holloway and Joseph Trading', 'https://www.pugim.com.au', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Event`
--

CREATE TABLE `Event` (
  `eventId` int(11) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `eventType` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `venueName` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `locationType` enum('In-Person','Online','Hybrid') NOT NULL,
  `maxAttendees` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `eventStatus` enum('Published','Ongoing','Finished') NOT NULL,
  `accountId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Event`
--

INSERT INTO `Event` (`eventId`, `eventName`, `description`, `eventType`, `startDate`, `endDate`, `startTime`, `endTime`, `venueName`, `address`, `locationType`, `maxAttendees`, `createdAt`, `eventStatus`, `accountId`) VALUES
(1, 'Veronica Castro', 'Voluptatum aliqua E', 'Voluptatem quo sed q', '1981-12-17', '1983-08-24', '20:55:00', '09:14:00', 'Teagan Parks', 'Eius nostrum accusan', 'In-Person', 54, '2024-05-22 16:01:46', 'Ongoing', 2),
(2, 'Carson Dickson', 'Non itaque esse odio', 'Non est officia cupi', '1999-12-14', '2019-11-13', '22:26:00', '03:31:00', 'Melinda Alvarez', 'Magna ratione cupida', 'Hybrid', 35, '2024-05-22 16:06:04', 'Published', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `reviewId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `message` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(50) NOT NULL
) ;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`roleId`, `roleName`) VALUES
(1, 'company'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `staffId` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `interests` varchar(255) DEFAULT NULL,
  `recognition` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `accountId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`staffId`, `address`, `dateOfBirth`, `gender`, `skills`, `interests`, `recognition`, `image`, `accountId`) VALUES
(1, NULL, '1990-02-04', NULL, NULL, NULL, NULL, NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`accountId`),
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `AccountEvent`
--
ALTER TABLE `AccountEvent`
  ADD PRIMARY KEY (`eventId`,`accountId`),
  ADD KEY `accountId` (`accountId`);

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`companyId`),
  ADD KEY `accountId` (`accountId`);

--
-- Indexes for table `Event`
--
ALTER TABLE `Event`
  ADD PRIMARY KEY (`eventId`),
  ADD KEY `accountId` (`accountId`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `accountId` (`accountId`),
  ADD KEY `eventId` (`eventId`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`staffId`),
  ADD KEY `accountId` (`accountId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `companyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Event`
--
ALTER TABLE `Event`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Staff`
--
ALTER TABLE `Staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Account`
--
ALTER TABLE `Account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `Role` (`roleId`);

--
-- Constraints for table `AccountEvent`
--
ALTER TABLE `AccountEvent`
  ADD CONSTRAINT `accountevent_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `Event` (`eventId`),
  ADD CONSTRAINT `accountevent_ibfk_2` FOREIGN KEY (`accountId`) REFERENCES `Account` (`accountId`);

--
-- Constraints for table `Company`
--
ALTER TABLE `Company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `Account` (`accountId`);

--
-- Constraints for table `Event`
--
ALTER TABLE `Event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `Account` (`accountId`);

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `Account` (`accountId`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`eventId`) REFERENCES `Event` (`eventId`);

--
-- Constraints for table `Staff`
--
ALTER TABLE `Staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `Account` (`accountId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
