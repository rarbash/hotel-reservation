-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2021 at 08:19 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `css325_zwell_hotel`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `build_details_per_month` ()  BEGIN
 DROP TABLE IF EXISTS details_per_month;

 CREATE TABLE details_per_month (
  month VARCHAR(15),
  people_count INT(10),
  reservation_count INT(10),
  total_income FLOAT
 );

 INSERT INTO details_per_month
  (SELECT res.month, res.people_count, pay.reservation_count, pay.total_income FROM 
  ((SELECT MONTHNAME(reservation.check_in_date) AS month, SUM(reservation.people_amount) AS people_count 
  FROM reservation GROUP BY month ORDER BY month) AS res INNER JOIN 
  (SELECT MONTHNAME(payment.date) AS month, COUNT(payment.amount) AS reservation_count, SUM(payment.amount) AS total_income 
  FROM payment GROUP BY month ORDER BY month) AS pay ON res.month = pay.month) 
  ORDER BY STR_TO_DATE(CONCAT('0001 ', res.month, ' 01'), '%Y %M %d'));
  
  SELECT * FROM details_per_month;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `mobile_no`, `email_address`, `country`) VALUES
(150001, 'Warat', 'Kulkij', '0815625457', 'wark1@hotmail.com', 'Thailand'),
(150002, 'Napisa', 'Phat', '0832569992', 'napip89@hotmail.com', 'Japan'),
(150003, 'Chanatiwat', 'Nil', '0855854258', 'chanan40@gmail.com', 'America'),
(150004, 'Kawiya', 'Poen', '0815478853', 'kawip55@yahoo.com', 'Japan'),
(150005, 'John', 'Cena', '0875264412', 'johnc01@gmail.com', 'America'),
(150006, 'Katy', 'Perry', '0895211020', 'katyp5@hotmail.com', 'America'),
(150007, 'Vladimir', 'Putin', '0822148655', 'putinv@yahoo.com', 'Russia'),
(150008, 'Ed', 'Word', '0894125547', 'edwd96@gmail.com', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `details_per_month`
--

CREATE TABLE `details_per_month` (
  `month` varchar(15) DEFAULT NULL,
  `people_count` int(10) DEFAULT NULL,
  `reservation_count` int(10) DEFAULT NULL,
  `total_income` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details_per_month`
--

INSERT INTO `details_per_month` (`month`, `people_count`, `reservation_count`, `total_income`) VALUES
('June', 4, 1, 3000),
('July', 6, 1, 4500),
('August', 8, 1, 6000),
('September', 6, 3, 6000),
('October', 7, 2, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  `rassignment_id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `date`, `amount`, `rassignment_id`, `staff_id`) VALUES
(895601, '2021-06-06', 3000, 4101, 23002),
(895602, '2021-07-31', 4500, 4102, 23005),
(895603, '2021-08-16', 6000, 4103, 23008),
(895604, '2021-09-06', 1500, 4104, 23007),
(895605, '2021-09-12', 3000, 4105, 23001),
(895606, '2021-09-11', 1500, 4106, 23006),
(895607, '2021-10-05', 4500, 4107, 23007),
(895608, '2021-10-13', 1500, 4108, 23008);

-- --------------------------------------------------------

--
-- Table structure for table `request_service`
--

CREATE TABLE `request_service` (
  `request_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `detail` varchar(250) NOT NULL,
  `rassignment_id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_service`
--

INSERT INTO `request_service` (`request_id`, `date`, `time`, `detail`, `rassignment_id`, `staff_id`) VALUES
(98801, '2021-06-04', '19:10:29', 'Lights in the bathroom cannot turn on', 4101, 23003),
(98802, '2021-07-30', '20:28:02', 'Air conditioner is not cool', 4102, 23005),
(98803, '2021-09-09', '08:33:05', 'refrigerator is not cool', 4105, 23001),
(98804, '2021-10-02', '18:11:23', 'Light in the bedroom cannot turn on', 4107, 23007),
(98805, '2021-10-11', '16:47:08', 'Air conditioner is not cool', 4108, 23006);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `room_type_id` int(3) UNSIGNED NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `people_amount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `customer_id`, `room_type_id`, `check_in_date`, `check_out_date`, `people_amount`) VALUES
(62281, 150002, 201, '2021-06-03', '2021-06-06', 4),
(62282, 150008, 301, '2021-07-28', '2021-07-31', 6),
(62283, 150004, 401, '2021-08-09', '2021-08-16', 8),
(62284, 150006, 101, '2021-09-02', '2021-09-06', 2),
(62285, 150001, 201, '2021-09-09', '2021-09-12', 3),
(62286, 150007, 101, '2021-09-09', '2021-09-11', 1),
(62287, 150005, 301, '2021-10-01', '2021-10-05', 5),
(62288, 150003, 101, '2021-10-10', '2021-10-13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(4) UNSIGNED NOT NULL,
  `room_number` int(4) NOT NULL,
  `room_type_id` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_number`, `room_type_id`) VALUES
(1011, 11, 101),
(1012, 12, 101),
(1013, 13, 101),
(1021, 21, 201),
(1022, 22, 201),
(1031, 31, 301),
(1032, 32, 301),
(1041, 41, 401);

-- --------------------------------------------------------

--
-- Table structure for table `room_assignment`
--

CREATE TABLE `room_assignment` (
  `rassignment_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(4) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `people_amount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_assignment`
--

INSERT INTO `room_assignment` (`rassignment_id`, `room_id`, `reservation_id`, `people_amount`) VALUES
(4101, 1021, 62281, 4),
(4102, 1031, 62282, 6),
(4103, 1041, 62283, 8),
(4104, 1011, 62284, 2),
(4105, 1022, 62285, 3),
(4106, 1013, 62286, 1),
(4107, 1031, 62287, 5),
(4108, 1011, 62288, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(3) UNSIGNED NOT NULL,
  `min_people` int(2) NOT NULL,
  `max_people` int(2) NOT NULL,
  `room_size` float NOT NULL,
  `bed` int(2) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `min_people`, `max_people`, `room_size`, `bed`, `price`) VALUES
(101, 1, 2, 0, 2, 1500),
(201, 1, 4, 0, 2, 3000),
(301, 1, 6, 0, 3, 4500),
(401, 1, 8, 0, 4, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `mobile_no`, `email_address`) VALUES
(23001, 'Bua', 'Kao', '0884554869', 'buastaff1@gmail.com'),
(23002, 'Joe', 'Dep', '0862154110', 'joestaff2@gmail.com'),
(23003, 'Gary', 'Worry', '0818896550', 'garystaff3@gmail.com'),
(23004, 'Mary', 'Hoods', '0836669852', 'marystaff4@gmail.com'),
(23005, 'Ken', 'Kaneki', '0887745852', 'kenstaff5@gmail.com'),
(23006, 'Toru', 'Zenba', '0865010020', 'torustaff6@gmail.com'),
(23007, 'Mare', 'Whale', '0829560260', 'marestaff7@gmail.com'),
(23008, 'Somjit', 'Pon', '0995466811', 'somjitstaff8@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `rassignment_id_payment` (`rassignment_id`),
  ADD KEY `staff_id_payment` (`staff_id`);

--
-- Indexes for table `request_service`
--
ALTER TABLE `request_service`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `rassignment_id_request_service` (`rassignment_id`),
  ADD KEY `staff_id_request_service` (`staff_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `customer_id_reservation` (`customer_id`),
  ADD KEY `room_type_id_reservation` (`room_type_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_type_id_room` (`room_type_id`);

--
-- Indexes for table `room_assignment`
--
ALTER TABLE `room_assignment`
  ADD PRIMARY KEY (`rassignment_id`),
  ADD KEY `room_id_room_assignment` (`room_id`),
  ADD KEY `reservation_id_room_assignment` (`reservation_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `rassignment_id_payment` FOREIGN KEY (`rassignment_id`) REFERENCES `room_assignment` (`rassignment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_id_payment` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `request_service`
--
ALTER TABLE `request_service`
  ADD CONSTRAINT `rassignment_id_request_service` FOREIGN KEY (`rassignment_id`) REFERENCES `room_assignment` (`rassignment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_id_request_service` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `customer_id_reservation` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_type_id_reservation` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_type_id_room` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);

--
-- Constraints for table `room_assignment`
--
ALTER TABLE `room_assignment`
  ADD CONSTRAINT `reservation_id_room_assignment` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_id_room_assignment` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
