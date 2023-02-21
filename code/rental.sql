-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 03:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `year` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `papers` varchar(100) NOT NULL,
  `reg_no` varchar(30) NOT NULL,
  `price` bigint(20) NOT NULL,
  `km` int(11) NOT NULL,
  `excess` int(11) NOT NULL,
  `mileage` float NOT NULL,
  `c_stat` int(11) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `renter_id`, `company`, `name`, `year`, `model`, `image`, `papers`, `reg_no`, `price`, `km`, `excess`, `mileage`, `c_stat`, `availability`) VALUES
(5, 1, 'Toyota', 'innovva', 2000, 2, 'car1.jpg', '', 'KL05AS1752', 750, 150, 10, 1, 1, 1),
(6, 2, 'maruti', 'maruti 800', 2010, 3, '800.jpg', '', 'kl34e4567', 600, 150, 10, 17, 1, 1),
(7, 3, 'Mahindra', 'xuv 500', 2020, 1, 'xuv 500.jpg', '', 'kl05as1756', 780, 150, 10, 6, 1, 0),
(8, 3, 'Renault', 'Triber', 2010, 2, 'Renault-Triber-PNG-Photos.png', '', 'kl05as1759', 780, 140, 9, 4, 1, 1),
(10, 5, 'Suzuki', 'dzire', 2020, 3, 'dzire.png', '', 'kl05as3752', 600, 150, 10, 12, 1, 1),
(11, 9, 'renalt', 'duster', 2010, 1, 'Renault-Triber-PNG-Photos.png', '', 'kl05as1754', 750, 150, 10, 12, 1, 1),
(13, 3, 'toyota', 'corolla', 2022, 3, 'corolla.jpg', '', 'KL34D6754', 789, 130, 0, 12, 1, 1),
(20, 4, 'Maruti', 'Swift', 2010, 1, 'swift.jpg', '', 'KL34D6122', 800, 150, 10, 12, 1, 1),
(21, 4, 'Tata', 'Sumo', 2000, 2, 'sumo.jpg', 'assignment_ML1.pdf', 'KL34D6151', 800, 150, 15, 12, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `addresss` varchar(100) NOT NULL,
  `place` varchar(50) NOT NULL,
  `licence` varchar(100) DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `log_id`, `fname`, `lname`, `email`, `phone`, `addresss`, `place`, `licence`) VALUES
(1, 3, 'arun', 'babu', '', 9447017805, 'koplantharachirayil', 'punchavayal', 'null'),
(2, 4, 'alen', 'philip', 'alan@gmail.com', 9447017345, 'kottayam', 'kerala', 'null'),
(4, 12, 'babu', 'suresh', 'wwwarunbabu49@gmail.com', 9656968676, 'koplantharachirayil', 'punchavayal', 'null'),
(5, 14, 'akshay', 'kumar', 'arunbabu8074@gmail.com', 9878654334, 'house', 'punchavayal', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `usertype` int(11) NOT NULL,
  `statuss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `username`, `passwd`, `usertype`, `statuss`) VALUES
(1, 'admin', 'admin', 0, 1),
(2, 'drax', 'drax', 2, 1),
(3, 'arun', 'arun1234', 1, 0),
(4, 'alen', 'alen', 1, 1),
(5, 'manu', 'manu', 2, 1),
(7, 'abhi', 'abhi', 2, 1),
(8, 'arun1', 'arun1', 2, 1),
(9, 'don', 'don', 2, 1),
(10, 'sonu', 'sonu', 2, 1),
(11, 'aaaa', 'aaaa', 2, 1),
(12, 'babu12', '1234', 1, 1),
(13, 'george', 'george', 2, 1),
(14, 'akshay', 'akshay', 1, 1),
(15, 'grace', 'grace', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `sender_id`, `receiver_id`, `message`) VALUES
(1, 2, 3, 'hai'),
(2, 3, 2, 'helo'),
(5, 2, 5, 'how r u'),
(6, 3, 7, 'how r u'),
(7, 3, 7, 'how r u'),
(8, 3, 7, 'ggh'),
(9, 3, 7, '1234'),
(10, 2, 0, 'done'),
(11, 2, 0, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model`) VALUES
(1, 'suv'),
(2, 'muv'),
(3, 'sedan');

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE `renter` (
  `renter_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `addresss` varchar(100) NOT NULL,
  `place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`renter_id`, `log_id`, `fname`, `lname`, `email`, `phone`, `addresss`, `place`) VALUES
(1, 2, 'wargod', 'drax', 'wargoddrax@gmail.com', 9543214567, 'wargod', 'kerala'),
(2, 5, 'manu', 'sunu', 'qwe@gmail.com', 9447017876, 'hjk', 'punchavayal'),
(3, 7, 'abhi', 'babu', 'abhi@gmail.com', 9447017805, 'koplantharachirayil', 'punchavayal'),
(4, 8, 'arun', 'babu', 'arunbabu2023a@mca.ajce.in', 9447017805, 'koplantharachirayil', 'punchavayal'),
(5, 9, 'don', 'don', 'don@gmail.com', 9876543210, 'sdfs', 'munk'),
(6, 10, 'sonu', 'sonu', 'sonu@gmail.com', 8798654321, 'house', 'koovapally'),
(8, 13, 'george', 'jacob', 'georgejacob2023a@mca.ajce.in', 8798654321, 'house', 'punchavayal'),
(9, 15, 'babu', 'suresh', 'gracekjoseph@gmail.com', 9656968676, 'house', 'koovapally');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `book_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `book_date` date NOT NULL,
  `drop_date` date NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`book_id`, `cus_id`, `car_id`, `book_date`, `drop_date`, `stat`) VALUES
(2, 4, 6, '2022-11-17', '0000-00-00', 0),
(3, 4, 6, '2022-11-12', '0000-00-00', 0),
(4, 4, 6, '2022-11-12', '2022-11-13', 0),
(5, 4, 11, '2022-11-17', '2022-11-18', 1),
(6, 4, 6, '2022-11-25', '2022-12-08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `email`, `token`) VALUES
(31, 'gracekjoseph@gmail.com', 336044);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `renter_id` (`renter_id`),
  ADD KEY `model` (`model`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD KEY `foreign key` (`log_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`),
  ADD UNIQUE KEY `unique` (`username`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`renter_id`),
  ADD KEY `log_id` (`log_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `renter`
--
ALTER TABLE `renter`
  MODIFY `renter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`renter_id`) REFERENCES `renter` (`renter_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`model`) REFERENCES `model` (`model_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`log_id`) REFERENCES `login` (`log_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `renter`
--
ALTER TABLE `renter`
  ADD CONSTRAINT `renter_ibfk_1` FOREIGN KEY (`log_id`) REFERENCES `login` (`log_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
