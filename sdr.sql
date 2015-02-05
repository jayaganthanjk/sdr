-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2015 at 04:24 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sdr`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_history`
--

CREATE TABLE IF NOT EXISTS `booking_history` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `check in` date NOT NULL,
  `check out` date NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `booking_history`
--

INSERT INTO `booking_history` (`id`, `name`, `address`, `phone`, `email`, `check in`, `check out`, `room_type`, `amount`, `adults`, `children`, `status`, `room_id`) VALUES
(1, 'jaya', 'NO.19', '9876543210', 'jk@gmail.com', '2015-02-27', '2015-02-28', 'Family', 3244, 5, 2, 'success', 0),
(2, 'Jaya', 'No.18,jawaharlal nehru,st,\r\nNew perungalathur,\r\nchennai-63', '9876543210', 'jayaganthanjk@gmail.com', '2015-02-11', '2015-02-12', 'Family', 3112, 4, 0, 'pending', 0),
(3, 'Jaya', 'No.18,jawaharlal nehru,st,\r\nNew perungalathur,\r\nchennai-63', '9876543210', 'jayaganthanjk@gmail.com', '2015-02-11', '2015-02-12', 'Family', 3112, 4, 0, 'pending', 0),
(4, 'Jaya', 'No.18,jawaharlal nehru,st,\r\nNew perungalathur,\r\nchennai-63', '9876543210', 'jayaganthanjk@gmail.com', '2015-02-11', '2015-02-12', 'Family', 3112, 4, 0, 'pending', 0),
(5, 'jk', '', '', '', '0000-00-00', '0000-00-00', '', 0, 0, 0, 'success', 0),
(6, 'jk', '', '', '', '0000-00-00', '0000-00-00', '', 0, 0, 0, 'pending', 0),
(7, 'jk', '', '', '', '0000-00-00', '0000-00-00', '', 0, 0, 0, 'pending', 0),
(8, 'jk', '', '', '', '0000-00-00', '0000-00-00', '', 0, 0, 0, 'pending', 0),
(9, 'jk', 'address', 'phone', 'email', '0000-00-00', '0000-00-00', 'room_name', 0, 0, 0, 'pending', 0),
(10, 'jaya', 'no', '9876543210', 'jayaganthanjk@gmail.com', '2015-02-12', '2015-02-13', 'Classic', 2151, 3, 0, 'pending', 0),
(11, 'jaya', 'mdsmfsd', '9876543210', 'jayaganthanjk@gmail.com', '2015-02-12', '2015-02-13', 'Classic', 2151, 3, 0, 'pending', 0),
(12, 'jaya', 'no.', '9876543210', 'jayaganthanjk@gmail.com', '2015-02-21', '2015-02-22', 'Family', 3112, 5, 0, 'success', 0),
(13, 'jaya', '', '9876543210', 'jayaganthanjk@gmail.com', '2015-02-05', '2015-02-06', 'Classic', 2151, 3, 0, 'pending', 0),
(14, 'jaya', 'jkjk', '9876543210', 'jayaganthanjk@gmail.com', '2015-02-05', '2015-02-06', 'Classic', 2151, 3, 0, 'pending', 2),
(15, 'jaya', 'NO.18,jawaharlal nehru st,\r\nchennai-63', '9876543210', 'jayaganthanjk@gmail.com', '2015-03-01', '2015-03-02', 'Classic', 2151, 3, 0, 'success', 2),
(16, 'admin', 'sdkfsldf', '9876543210', 'admin@gmail.com', '2015-02-14', '2015-02-19', 'Family', 17099, 7, 0, 'pending', 5),
(17, 'admin', 'sdkfsldf', '9876543210', 'admin@gmail.com', '2015-02-14', '2015-02-19', 'Family', 17099, 7, 0, 'success', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `cost` int(11) NOT NULL,
  `src` varchar(50) DEFAULT NULL,
  `persons` varchar(20) NOT NULL,
  `bed` varchar(50) DEFAULT NULL,
  `bath` int(11) NOT NULL,
  `tv` varchar(50) NOT NULL DEFAULT '0',
  `number_persons` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `cost`, `src`, `persons`, `bed`, `bath`, `tv`, `number_persons`) VALUES
(2, 'Classic Room', 1599, NULL, 'Double', 'King Size', 1, '28" LCD flat-screen tv', 3),
(3, 'Deluxe Room', 1799, 'deluxe-reserve.jpeg', 'Double', 'King Size', 1, '32" LCD flat-screen tv', 3),
(4, 'Suite Room', 2199, 'suite-reserve.jpg', 'Double', 'King Size', 1, '32" LCD flat-screen tv', 3),
(5, 'Family Room', 2699, NULL, 'Six', 'Twin King Size', 1, '32" LCD flat-screen tv', 8);

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE IF NOT EXISTS `room_booking` (
`id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `room_booking`
--

INSERT INTO `room_booking` (`id`, `room_name`, `room_id`, `date`) VALUES
(1, 'classic', 2, '2015-01-11'),
(2, 'classic', 2, '2015-01-13'),
(3, 'Classic Room', 2, '2015-01-16'),
(4, 'Classic Room', 2, '2015-01-31'),
(5, 'Family', 4, '2015-02-19'),
(6, 'Classic', 2, '2015-03-01'),
(7, 'Classic', 2, '2015-03-02'),
(8, 'Family', 5, '2015-02-14'),
(9, 'Family', 5, '2015-02-15'),
(10, 'Family', 5, '2015-02-16'),
(11, 'Family', 5, '2015-02-17'),
(12, 'Family', 5, '2015-02-18'),
(13, 'Family', 5, '2015-02-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_history`
--
ALTER TABLE `booking_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_booking`
--
ALTER TABLE `room_booking`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_history`
--
ALTER TABLE `booking_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `room_booking`
--
ALTER TABLE `room_booking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
