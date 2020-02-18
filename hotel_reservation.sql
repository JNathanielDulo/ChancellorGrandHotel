-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2018 at 05:12 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE `accomodation` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(1000) NOT NULL,
  `room_image` varchar(1000) NOT NULL,
  `room-price` varchar(1000) NOT NULL,
  `room-content` varchar(1500) NOT NULL,
  `room_adult` int(3) NOT NULL,
  `room_child` int(3) NOT NULL,
  `room_availability` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`room_id`, `room_type`, `room_image`, `room-price`, `room-content`, `room_adult`, `room_child`, `room_availability`) VALUES
(1, 'Standard Queen/Twin', 'AccomodationR1.jpg', '2750.00', 'The best substitute for those looking for relaxation within limited means.', 2, 2, '6'),
(2, 'Deluxe Queen', 'AccomodationR2.jpg', '3650.00', 'If you\'re on a tour with companions and prefer a semi-luxurious place to stay, this is the most suitable choice for you.', 2, 2, '8'),
(3, 'Superior Queen', 'AccomodationR3.jpg', '4850.00', 'Seorabeol is a great hideaway for families going on an out-of-town trip to Subic. It offers an alternative accommodation...', 2, 3, '8'),
(4, 'Superior King', 'AccomodationR4b.jpg', '5500.00', 'A spacious interior, with bigger beds and a generous dresser is the most precise description of this type...', 4, 4, '9'),
(5, 'Family Room', 'AccomodationR5.jpg', ' 6600.00', 'The highest level of luxury afforded in this Subic hotel, the Family Room is a 65-square meter...', 4, 4, '9');

-- --------------------------------------------------------

--
-- Table structure for table `accomodation_features`
--

CREATE TABLE `accomodation_features` (
  `room_list_item` int(11) NOT NULL,
  `room_list1` varchar(500) NOT NULL,
  `room_list2` varchar(500) NOT NULL,
  `room_list3` varchar(500) NOT NULL,
  `room_list4` varchar(500) NOT NULL,
  `room_list5` varchar(500) NOT NULL,
  `room_list6` varchar(500) NOT NULL,
  `room_list7` varchar(500) NOT NULL,
  `room_list8` varchar(500) NOT NULL,
  `room_list9` varchar(500) NOT NULL,
  `room_list10` varchar(500) NOT NULL,
  `room_list11` varchar(500) NOT NULL,
  `room_list12` varchar(500) NOT NULL,
  `room_list13` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomodation_features`
--

INSERT INTO `accomodation_features` (`room_list_item`, `room_list1`, `room_list2`, `room_list3`, `room_list4`, `room_list5`, `room_list6`, `room_list7`, `room_list8`, `room_list9`, `room_list10`, `room_list11`, `room_list12`, `room_list13`) VALUES
(1, 'Complimentary breakfast for two', 'Bottled water and bathroom essentials', 'Wireless Internet', 'Hair dryer', 'Hot & Cold standing shower', 'Vanity area', 'Cable television', 'Individually controlled air-conditioning unit', 'Personal Refrigerator', '', '', '', ''),
(2, 'Complimentary breakfast for two', 'Bottled water and bathroom essentials', 'Wireless Internet', 'Hair dryer', 'Hot & Cold standing shower', 'Full size vanity mirror', 'Coffee area', '21\' wall-mounted LCD TV', 'Individually controlled air-conditioning unit', 'Personal Refrigerator', 'Telephone', '', ''),
(3, 'Complimentary breakfast for two', 'Bottled water and bathroom essentials', 'Wireless Internet', 'Hair dryer', 'Bath tub', 'Full size vanity mirror', 'Coffee area', '32\' wall-mounted LCD TV', 'Individually controlled air-conditioning unit', 'Personal Refrigerator', 'Telephone', '', ''),
(4, 'Complimentary breakfast for two', 'Bottled water and bathroom essentials', 'Wireless Internet', 'Hair dryer', 'Hot & Cold Shower', 'Bath tub', 'Full size vanity mirror', 'Coffee Area', '32\' LCD TV', 'Individually controlled air-conditioning unit', 'Personal Refrigerator', 'Telephone', 'Adjustable bedside reading lights'),
(5, 'Complimentary breakfast for two', 'Bottled water and bathroom essentials', 'Wireless Internet', 'Hair dryer', 'Hot & Cold Shower', 'Bath tub on the bigger room', 'Full size vanity mirror', 'Coffee Area', '32\' LCD TV', 'Individually controlled air-conditioning unit', 'Personal Refrigerator', 'Telephone', 'Adjustable bedside reading lights');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `admin_photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `lastname`, `email`, `address`, `about`, `admin_photo`) VALUES
(1, 'admin', 'admin', 'Mykel', 'Flores', 'mykelandrww@gmail.com', 'Upper Ramirez St. Gordon Heights Olongapo City', 'Im a person that have responsibility to do the work and finished the work im a simple man but good ambition to company', 'admin1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `customer_no` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `landline` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `arrival_date` varchar(100) NOT NULL,
  `departure_date` varchar(100) NOT NULL,
  `adult` varchar(100) NOT NULL,
  `child` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `total_cost` varchar(100) NOT NULL,
  `sub_total` varchar(100) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `date_ago` varchar(500) NOT NULL,
  `valid_id` varchar(500) NOT NULL,
  `guest` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`customer_no`, `fname`, `lname`, `address`, `contact`, `landline`, `email`, `arrival_date`, `departure_date`, `adult`, `child`, `status`, `total_cost`, `sub_total`, `balance`, `date_ago`, `valid_id`, `guest`) VALUES
(238, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-07-14', '2017-07-15', '2', '2', 'checkout', '2750', '2750', '0', '07/14/2017  3:06:57am  ', '201510400', 'Regular'),
(239, 'Anthony', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '3245-2412', 'anthony@gmail.com', '2017-07-18', '2017-07-20', '2', '2', 'checkout', '6570', '3650', '0', '07/18/2017  5:52:11pm  ', '20341516', 'Senior'),
(240, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '3241-2351', 'mykelandrww@gmail.com', '07/19/2017', '07/21/2017', '4', '4', 'checkout', '16500', '5500', '0', '07/20/2017   12:01:15am  ', '', ''),
(241, 'Catherine', 'Palmario', 'Upper Ramirez', '+63(92)3214-2341', '5623-2414', 'catherine@gmail.com', '2017-07-20', '2017-07-21', '2', '2', 'checkout', '2200', '2750', '0', '07/20/2017  12:09:00am  ', '0', 'Member'),
(242, 'Mica', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '1234-1234', 'mica@gmail.com', '2017-07-20', '2017-07-21', '2', '3', 'checkout', '3880', '4850', '0', '07/20/2017  12:43:51am  ', '0', 'Member'),
(243, 'Jasmin', 'Giba', 'Acacia St. Gordon Heights Olongapo City', '+63(92)3214-2341', '2314-23241', 'jasmin@gmail.com', '2017-07-20', '2017-07-21', '4', '4', 'checkout', '5500', '5500', '0', '07/20/2017  12:46:55am  ', '201510400', 'Regular'),
(244, 'Carla', 'Jackson', 'Sta Rita 3f Olongapo City', '+63(92)3214-2341', '4323-1233', 'carla@yahoo.com', '2017-07-20', '2017-07-21', '4', '4', 'checkout', '6600', '6600', '0', '07/20/2017  12:50:23am  ', '20134512', 'Regular'),
(245, 'Michael', 'Flores', 'Keith St. Gordon Heights Olongapo City', '+63(93)1234-1234', '2324-23123', 'michael@yahoo.com', '2017-07-20', '2017-07-21', '2', '3', 'checkout', '4850', '4850', '0', '07/20/2017  12:52:41am  ', '3245642', 'Regular'),
(246, 'Julie', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(92)3214-2341', '4345-2321', 'julie_22@gmail.com', '2017-07-21', '2017-07-22', '4', '4', 'checkout', '11880', '6600', '0', '07/20/2017  12:54:57am  ', '2323145', 'Senior'),
(247, 'Mart', 'Macion', 'Harry St. Olongapo City', '+63(93)1234-1234', '2342-1324', 'mart@gmail.com', '2017-07-20', '2017-07-21', '2', '2', 'checkout', '3650', '3650', '0', '07/20/2017  1:23:53am  ', '201452672', 'Regular'),
(248, 'Neris', 'Millanio', 'Domingo St. Olongapo City ', '+63(93)1234-1234', '2324-2321', 'neris@gmail.com', '07/21/2017', '07/24/2017', '4', '4', 'checkout', '16500', '5500', '0', '07/20/2017   1:30:15am  ', '', 'Regular'),
(249, 'Mica', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '1234-1234', 'mica@gmail.com', '2017-07-21', '2017-07-22', '2', '2', 'checkout', '2960', '3700', '0', '07/21/2017  3:10:20am  ', '0', 'Member'),
(250, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2', '3', 'checkout', '5000', '4850', '0', '07/30/2017   1:37:51am  ', '', 'Regular'),
(251, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2', '3', 'checkout', '5000', '4850', '0', '07/30/2017   1:37:36am  ', '', 'Regular'),
(252, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2', '3', 'checkout', '5000', '4850', '0', '07/30/2017   1:37:25am  ', '', 'Regular'),
(253, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2', '3', 'checkout', '5000', '4850', '0', '07/30/2017   1:37:01am  ', '', 'Regular'),
(254, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2', '3', 'checkout', '5000', '4850', '0', '07/30/2017   1:37:14am  ', '', 'Regular'),
(255, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2', '3', 'checkout', '5000', '4850', '0', '07/30/2017   9:03:39pm  ', '', ''),
(256, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2', '3', 'Temporary', '5000', '4850', '0', '07/30/2017  2:22:56am  ', '', ''),
(257, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2', '3', 'checkout', '5000', '4850', '0', '07/30/2017   9:04:28pm  ', '', ''),
(258, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '2017-07-29', '2017-08-01', '2', '3', 'checkout', '14700', '4850', '0', '07/30/2017   9:04:11pm  ', '', ''),
(259, 'Mart', 'Macion', 'Gordon Heights Olongapo city', '+63(93)1234-1234', '2324-2323', 'mart@yahoo.com', '7/30/2017', '7/31/2017', '2', '2', 'checkout', '2800', '2750', '0', '07/30/2017   9:03:56pm  ', '', ''),
(260, 'mart', 'Macion', 'Sta Rita 3f Olongapo City', '+63(93)1234-1234', '2324-2323', 'mart@yahoo.com', '2017-07-31', '2017-08-02', '4', '4', 'checkout', '13400', '6600', '0', '08/01/2017   7:03:05am  ', '', ''),
(261, 'Mykel', 'flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/31/2017', '8/1/2017', '4', '4', 'Temporary', '6650', '6600', '0', '07/31/2017  3:56:02pm  ', '', ''),
(262, 'Mart', 'Macion', 'Victory line Olongapo city zambles', '+63(93)1234-1234', '1234-1234', 'mart@yahoo.com', '7/31/2017', '8/1/2017', '4', '4', 'Temporary', '6750', '6600', '0', '07/31/2017  4:18:46pm  ', '', ''),
(281, 'Alfred', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'ampet@gmail.com', '7/31/2017', '8/1/2017', '2', '3', 'checkout', '5000', '4850', '0', '08/01/2017   10:16:46pm  ', '', ''),
(282, 'trisha', 'flores', 'barreto subic zambales ', '+63(93)1234-1234', '3231-2324', 'trisha@yahoo.com', '7/31/2017', '8/1/2017', '2', '3', 'Temporary', '4850', '4850', '0', '07/31/2017  7:32:55pm  ', '', ''),
(283, 'Alex', 'luna', 'keith st. gordon heights olongapo city ', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/31/2017', '8/1/2017', '2', '3', 'checkout', '4850', '4850', '0', '08/01/2017   7:00:33am  ', '', ''),
(284, 'Mica', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '1234-1234', 'mica@gmail.com', '8/1/2017', '8/2/2017', '2', '2', 'checkout', '2750', '2750', '0', '08/01/2017   7:00:19pm  ', '', ''),
(285, 'Mica', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '1234-1234', 'mica@gmail.com', '8/1/2017', '8/2/2017', '2', '2', 'checkout', '2750', '2750', '0', '08/01/2017   4:37:45pm  ', '', 'Member'),
(286, 'michael', 'flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'freeman@yahoo.com', '8/1/2017', '8/2/2017', '2', '2', 'checkout', '2750', '2750', '0', '08/01/2017   7:00:03pm  ', '', 'Regular'),
(287, 'trisha', 'flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'trisha@yahoo.com', '8/1/2017', '8/2/2017', '4', '4', 'checkout', '6600', '6600', '0', '08/01/2017   6:59:41pm  ', '', 'Regular'),
(288, 'Mica', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '1234-1234', 'mica@gmail.com', '8/1/2017', '8/2/2017', '2', '2', 'checkout', '3750', '3650', '0', '08/01/2017   5:17:22pm  ', '', 'Member'),
(289, 'teresita', 'gomez', 'keith st. gordon heights olongapo city ', '+63(93)1234-1234', '', 'teresita@yahoo.com', '8/1/2017', '8/2/2017', '2', '3', 'checkout', '4900', '4850', '0', '08/01/2017   6:57:56pm  ', '', 'Regular'),
(290, 'teresita', 'gomez', 'keith st. gordon heights olongapo city ', '+63(93)1234-1234', '', 'teresita@yahoo.com', '2017-08-01', '2017-08-03', '2', '3', 'checkout', '9750', '4850', '0', '08/01/2017   6:59:15pm  ', '', 'Regular'),
(291, 'teresita', 'gomez', 'keith st. gordon heights olongapo city ', '+63(93)1234-1234', '', 'teresita@yahoo.com', '8/1/2017', '8/2/2017', '2', '3', 'checkout', '4900', '4850', '0', '08/01/2017   6:58:37pm  ', '', 'Regular'),
(292, 'teresita', 'gomez', 'keith st. gordon heights olongapo city ', '+63(93)1234-1234', '', 'teresita@yahoo.com', '8/1/2017', '8/2/2017', '2', '3', 'checkout', '4900', '4850', '0', '08/01/2017   6:58:17pm  ', '', 'Regular'),
(293, 'Juan', 'Junaco', 'Acacia St. Gordong Heights Olongapo City', '+63(93)1234-1234', '2324-2323', 'juan@yahoo.com', '8/2/2017', '8/3/2017', '2', '2', 'Pending', '2750', '2750', '0', '08/02/2017  4:22:50am  ', '', 'Regular'),
(294, 'Junior', 'Monato', 'Tabacuhan Olongapo City', '+63(93)1234-1234', '2324-2323', 'monats@gmail.com', '8/2/2017', '8/3/2017', '2', '2', 'Temporary', '2750', '2750', '0', '08/02/2017  4:25:10am  ', '', 'Regular'),
(295, 'julius', 'rob', 'block 15 gordon heights olongapo city', '+63(93)1234-1234', '', 'rob@yahoo.com', '8/2/2017', '8/3/2017', '2', '2', 'checkout', '2750', '2750', '0', '08/02/2017   7:15:13am  ', '', 'Regular'),
(296, 'Ben', 'Therdolt', '14 st. east bajac bajac olongapo city', '+63(93)1234-1234', '', 'ben@yahoo.com', '8/2/2017', '8/3/2017', '2', '2', 'checkout', '3650', '3650', '0', '08/02/2017   5:45:23am  ', '', 'Regular'),
(297, 'jhemuel', 'mercado', '3f sta rita olongapo city', '+63(93)1234-1234', '', 'jhem@gmail.com', '8/2/2017', '8/3/2017', '2', '2', 'Pending', '2750', '2750', '0', '08/02/2017  5:52:46am  ', '', 'Regular'),
(298, 'Arthur', 'Ramos', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '', 'bidowcabanglan@gmail.com', '2017-08-02', '2017-08-03', '2', '3', 'checkout', '4900', '4850', '0', '08/02/2017   9:55:35am  ', '', 'Regular'),
(299, 'Billy', 'Cabanglan', '14 st. east bajac bajac olongapo city', '+63(93)1234-1234', '', 'bidowcabanglan@gmail.com', '2017-08-02', '2017-08-03', '8', '8', 'Pending', '14100', '13900', '0', '08/02/2017  11:13:56am  ', '', 'Regular'),
(300, 'mykel', 'flores', 'Upper Ramirez St. Olongapo City', ' 63(93)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-05', '2017-12-08', '2', '2', 'pending', '7600', '0', '0', '12/03/2017  10:50:28pm  ', '', 'regular'),
(301, 'mykel', 'flores', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-05', '2017-12-11', '2', '2', 'checkout', '11250', '0', '0', '12/10/2017   12:20:04pm  ', '', 'regular'),
(302, 'mykel', 'flores', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-11', '2017-12-12', '2', '2', 'checkout', '11250', '0', '0', '12/11/2017   11:23:45pm  ', '', 'regular'),
(303, 'billy', 'cabanglan', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-11', '2017-12-12', '2', '2', 'checkout', '2750', '0', '0', '12/11/2017   11:23:57pm  ', '', 'regular'),
(304, 'neris', 'milanio', 'Upper Domingo St. Gordon Heights Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-14', '2017-12-16', '2', '2', 'checkout', '2750', '0', '0', '12/11/2017   11:24:13pm  ', '', 'regular'),
(305, 'rex', 'gocela', 'keith st. gordon heights olongapo city', ' 63(03)1234-1234', '1231-1234', 'mykelandrww@gmail.com', '2017-12-11', '2017-12-12', '2', '2', 'checkout', '3650', '0', '0', '12/11/2017   11:31:32pm  ', '', 'regular'),
(306, 'mica', 'flores', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mica@gmail.com', '2017-12-12', '2017-12-13', '2', '3', 'checkout', '4850', '0', '0', '12/12/2017  12:30:03am  ', '', 'regular'),
(307, 'vincent', 'cuenza', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'vincent@gmail.com', '2017-12-12', '2017-12-13', '4', '4', 'checkout', '6400', '0', '0', '12/12/2017  1:37:32am  ', '', 'regular'),
(308, 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo City', '+63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-12', '2017-12-14', '2', '2', 'checkout', '5500', '0', '0', '12/12/2017  2:47:46am  ', '201510400', 'Regular'),
(309, 'Carla', 'Jackson', 'Sta Rita. St Olongapo City', '+63(03)1234-1234', '1234-1234', 'carla@gmail.com', '2017-12-12', '2017-12-13', '2', '2', 'checkout', '2750', '0', '0', '12/12/2017  2:48:58am  ', '20152300', 'Regular'),
(310, 'Lance', 'Asiatico', 'Upper Ramirez St. Olongapo City', '+63(03)1234-1234', '1234-1234', 'lance@gmail.com', '2017-12-12', '2017-12-13', '2', '2', 'checkout', '2750', '0', '0', '12/12/2017  2:51:54am  ', '20133020', 'Regular'),
(311, 'Lance', 'Asiatico', 'Upper Ramirez St. Olongapo City', '+63(03)1234-1234', '1234-1234', 'lance@gmail.com', '2017-12-12', '2017-12-14', '2', '2', 'checkout', '5500', '0', '0', '12/12/2017  2:54:31am  ', '20133400', 'Regular'),
(312, 'mykel', 'flores', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-15', '2017-12-18', '2', '2', 'checkout', '8250', '0', '0', '12/15/2017  3:39:28am  ', '', 'regular'),
(313, 'junior', 'monato', 'acacia gordon heigts olongapo city', '+63(03)1234-1234', '1234-1234', 'monato@gmail.com', '2017-12-16', '2017-12-17', '2', '2', 'checkout', '8250', '0', '0', '12/15/2017  11:36:19am  ', '', 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `damage_item`
--

CREATE TABLE `damage_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_cost` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damage_item`
--

INSERT INTO `damage_item` (`item_id`, `item_name`, `item_cost`) VALUES
(1, 'Router', '1075'),
(2, 'LCD TV', '1500'),
(3, 'Pillows', '288'),
(4, 'Comforter', '1000'),
(5, 'Blanket', '310'),
(6, 'Refrigerator', '4000'),
(7, 'Aircon', '9000');

-- --------------------------------------------------------

--
-- Table structure for table `item_transaction`
--

CREATE TABLE `item_transaction` (
  `id` int(11) NOT NULL,
  `customer_no` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_quantity` varchar(100) NOT NULL,
  `item_total` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_transaction`
--

INSERT INTO `item_transaction` (`id`, `customer_no`, `item_name`, `item_quantity`, `item_total`) VALUES
(1, '249', 'Toothpaste', '1', '50'),
(4, '254', ' Pillow', '1', '100'),
(5, '254', ' Bed Sheet', '1', '100'),
(6, '255', ' Pillow', '1', '100'),
(7, '255', ' Bed Sheet', '1', '100'),
(8, '256', ' Pillow', '1', '100'),
(9, '256', ' Bed Sheet', '1', '100'),
(10, '257', ' Pillow', '1', '100'),
(11, '257', ' Bed Sheet', '1', '100'),
(12, '258', ' Pillow', '1', '100'),
(13, '258', ' Bed Sheet', '1', '100'),
(14, '259', ' Pillow', '1', '50'),
(15, '260', ' Pillow', '1', '50'),
(16, '260', ' Bed Sheet', '1', '50'),
(17, '260', ' Toothpaste', '1', '50'),
(18, '261', ' Pillow', '1', '50'),
(19, '262', ' Pillow', '1', '100'),
(20, '262', ' Bed Sheet', '1', '100'),
(21, '263', ' Pillow', '1', '100'),
(22, '263', ' Bed Sheet', '1', '100'),
(23, '264', ' Pillow', '1', '100'),
(24, '264', ' Bed Sheet', '1', '100'),
(25, '281', ' Pillow', '1', '100'),
(26, '281', ' Bed Sheet', '1', '100'),
(27, '288', ' Bed Sheet', '1', '100'),
(28, '289', ' Pillow', '1', '50'),
(29, '290', ' Pillow', '1', '50'),
(30, '291', ' Pillow', '1', '50'),
(31, '292', ' Pillow', '1', '50'),
(32, '298', ' Pillow', '1', '50'),
(33, '299', ' Pillow', '1', '50'),
(34, '299', ' Bed Sheet', '1', '50'),
(35, '299', ' Toothpaste', '1', '50');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_no` int(11) NOT NULL,
  `notif_subject` varchar(250) NOT NULL,
  `notif_time` varchar(250) NOT NULL,
  `notif_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_no`, `notif_subject`, `notif_time`, `notif_status`) VALUES
(3, 'Ben Therdolt', '08/02/2017  5:37:01am  ', '1'),
(4, 'jhemuel mercado', '08/02/2017  5:52:46am  ', '1'),
(5, 'Arthur Ramos', '08/02/2017  9:50:15am  ', '1'),
(6, 'Billy Cabanglan', '08/02/2017  11:13:56am  ', '1'),
(7, 'New Reservation', '12/03/2017  10:50:28pm  ', '1'),
(8, 'New Reservation', '12/10/2017  12:18:48pm  ', '1'),
(9, 'New Reservation', '12/11/2017  6:48:11am  ', '1'),
(10, 'New Reservation', '12/11/2017  11:15:22pm  ', '1'),
(11, 'New Reservation', '12/11/2017  11:20:10pm  ', '1'),
(12, 'New Reservation', '12/11/2017  11:30:01pm  ', '1'),
(13, 'New Reservation', '12/12/2017  12:30:03am  ', '1'),
(14, 'New Reservation', '12/12/2017  1:37:32am  ', '1'),
(15, 'New Reservation', '12/15/2017  3:39:28am  ', '1'),
(16, 'New Reservation', '12/15/2017  11:36:19am  ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_no` int(11) NOT NULL,
  `customer_id` varchar(500) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `landline` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `arrival` varchar(500) NOT NULL,
  `departure` varchar(500) NOT NULL,
  `checkout` varchar(500) NOT NULL,
  `total_cost` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_no`, `customer_id`, `fname`, `lname`, `address`, `contact`, `landline`, `email`, `arrival`, `departure`, `checkout`, `total_cost`) VALUES
(9, '1', 'Catherine', 'Palmario', 'Upper Ramirez St. Olongapo City', '+63(93)1234-1234', '3242-3213', 'catherine@yahoo.com', '06/01/2017', '06/02/2017', '2017/06/02', '2500'),
(10, '2', 'Michael', 'Flores', 'Upper Ramirez St. Olongapo City', '+63(93)1234-1234', '2341-2341', 'michael@yahoo.com', '06/02/2017', '06/03/2017', '2017/04/02', '2700'),
(11, '3', 'Jasmin', 'Giba', 'Acacia St Olongapo City', '+63(94)1234-1234', '2321-2411', 'jasmin@gmail.com', '06/02/2017', '06/02/2017', '2017/06/02', '3400'),
(12, '12', 'Alexies', 'Cana', 'brill st West bajac bajac Olongapo City', '09159675113', '', 'alex@gmail.com', '01/11/2017', '01/12/2017', '2017/01/12', '2700'),
(13, '13', 'Shem', 'limin', 'East bajac bajac Olongapo City', '09202025314', '424-00', 'shemllimin@gmail.com', '01/12/2017', '01/14/2017', '2017/01/14', '3400'),
(14, '14', 'lexi', 'belle', 'Pepsi Rooad', '09089539979', '', 'lexi@gmail.com', '01/13/2017', '01/14/2017', '2017/01/14', '3000'),
(15, '15', 'Romel', 'Castillo', 'Mabayuhan Road', '09159539979', '1345-2345', 'romelio@gmail.com', '01/16/2017', '01/18/2017', '2017/01/18', '4500'),
(16, '16', 'Reinalyn', 'Cabanglan', 'West Bajac Bajac ', '09167749675', '4535-3435', 'bidow@gmail.com', '01/17/2017', '01/18/2017', '2017/01/18', '3200'),
(17, '17', 'Alleah', 'Bastes', 'San Antonio', '09159673001', '', 'alleah@gmail.com', '01/19/2017', '01/20/2017', '2017/01/20', '2700'),
(18, '18', 'Billy', 'Cabanglan', 'Kalaklan Bridge Olongapo City', '+63(93)1234-1234', '1234-2341', 'billy@gmail.com', '01/21/2017', '01/23/2017', '2017/01/23', '4700'),
(19, '19', 'Jasmin', 'Giba', 'Acacia St Olongapo City', '+63(94)1234-1234', '2321-2411', 'jasmin@gmail.com', '01/22/2017', '01/23/2017', '2017/01/23', '3700'),
(20, '20', 'Mica ', 'Flores', 'Upper Ramirez St. Olongapo City', '+63(93)1234-1234', '', 'mica@gmail.com', '01/25/2017', '01/26/2017', '2017/01/26', '3700'),
(21, '21', 'Alexies', 'Cana', 'brill st West bajac bajac Olongapo City', '09159675113', '', 'alex@gmail.com', '01/27/2017', '01/30/2017', '2017/01/30', '6700'),
(22, '22', 'Lilia', 'Cabanglan', 'brill West Bajac Bajac', '09154627901', '2324-32323-3232', 'lilia@gmail.com', '02/01/2017', '02/03/2017', '2017/02/03', '3700'),
(23, '23', 'Margie', 'Garcia', 'Tapinac Olongapo City', '09151037567', '', 'Garcia@gmail.com', '02/02/2017', '02/03/2017', '2017/02/03', '3700'),
(24, '24', 'Shem', 'Limin', 'East bajac bajac Olongapo City', '09202025314', '424-00', 'shemllimin@gmail.com', '02/02/2017', '02/03/2017', '2017/02/03', '4700'),
(25, '25', 'Dahyun', 'Lee', 'Manila Philippines', '0915102345', '', 'dahyunie@gmail.com', '02/04/2017', '02/06/2017', '2017/02/06', '5300'),
(26, '26', 'Minari', 'Nani', 'Pampanga', '09276736901', '222-333-444', 'minari@gmail.com', '02/04/2017', '02/05/2017', '2017/02/05', '3700'),
(27, '27', 'Reinalyn', 'Cabanglan', 'West Bajac Bajac ', '09167749675', '4535-3435', 'bidow@gmail.com', '02/05/2017', '02/06/2017', '2017/02/06', '4300'),
(28, '28', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo City', '+63(94)1234-1234', '', 'mykelandrww@gmail.com', '02/05/2017', '02/07/2017', '2017/02/07', '5400'),
(29, '29', 'Billy', 'Cabanglan', 'Kalaklan Bridge Olongapo City\r\n', '+63(93)1234-1234', '', 'billy@gmail.com', '02/05/2017', '02/06/2017', '2017/02/06', '4600'),
(30, '30', 'Marvin', 'Baleros', 'Manila Philippines', '09231569302', '233-432', 'baleros@gmail.com', '02/05/2017', '02/08/2017', '2017/02/08', '6800'),
(31, '31', 'Alleah', 'Bastes', 'San Antonio', '09159673001', '', 'alleah@gmail.com', '02/06/2017', '02/07/2017', '2017/02/07', '4400'),
(32, '32', 'Lexi', 'Belle', 'Pepsi Rooad', '09089539979', '', 'lexi@gmail.com', '02/06/2017', '02/07/2017', '2017/02/07', '3400'),
(33, '33', 'Carla', 'Jackson', 'Sta. Rita 3f Olongapo City', '+63(94)1234-1234', '1234-4212 ', 'carla@gmail.com', '02/14/2017', '02/16/2017', '2017/02/16', '5300'),
(34, '34', 'Phil', 'Webster', 'Bulacan Philippines', '09089539979', '245-134', 'jacson@gmail.com', '02/15/2017', '02/16/2017', '2017/02/16', '4200'),
(35, '35', 'Torie', 'Black', 'Manila Philippines', '09234094382', '', 'blacktorie@gmail.com', '02/17/2017', '02/18/2017', '2017/02/18', '4600'),
(36, '36', 'Sasha', 'Grey', 'Romblon Philippines', '0916246774', '', 'akosisasha@gmail.com', '02/18/2017', '02/20/2017', '2017/02/20', '6700'),
(37, '37', 'Billy', 'Cabanglan', 'Kalaklan Bridge Olongapo City', '+63(93)1234-1234', '', 'billy@gmail.com', '02/20/2017', '02/21/2017', '2017/02/21', '4000'),
(40, '40', 'Skusta', 'Del Pillar', 'Pampanga ', '0923942728', '', 'skustadel@gmail.com', '03/02/2017', '03/03/2017', '2017/03/03', '4000'),
(41, '41', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo City', '+63(94)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '03/04/2017', '03/05/2017', '2017/03/05', '3500'),
(42, '42', 'Josh', 'Felipe', 'Banicain Olongapo CIty', '0945678367', '', 'josh@gmail.com', '03/05/2017', '03/06/2017', '2017/03/06', '4500'),
(43, '43', 'Wilinda', 'Baranda', 'Tabacuhan Olongapo City', '0908956779', '', 'baranda@gmail.com', '03/07/2017', '03/08/2017', '2017/03/08', '4000'),
(44, '44', 'Hannah', 'Fantone', 'Bataan', '09443435458', '', 'hannah@gmail.com', '03/10/2017', '03/11/2017', '2017/03/11', '4000'),
(45, '45', 'Billy', 'Cabanglan', 'Kalaklan Bridge Olongapo City', '+63(93)1234-1234', 'billy@gmail.com', '', '03/10/2017', '03/11/2017', '2017/03/11', '3700'),
(46, '46', 'Joe', 'Calma', 'Macabebe Pampanga', '0926256789', '', 'calma@gmail.com', '03/13/2017', '03/16/2017', '2017/03/16', '4300'),
(47, '47', 'Phil ', 'Webster', 'Bulacan Philippines', '09089539979', '245-134', 'jacson@gmail.com', '03/16/2017', '03/18/2017', '2017/03/18', '6500'),
(48, '48', 'Billy', 'Cabanglan', 'Kalaklan Bridge Olongapo City', '+63(93)1234-1234', '', 'billy@gmail.com', '03/20/2017', '03/21/2017', '2017/03/21', '4300'),
(49, '49', 'Cha', 'Sampan', 'East Bajac Bajac ', '09167749674', '2356-4444', 'chamo@gmail.com', '03/26/2017', '03/27/2017', '2017/03/27', '4000'),
(50, '50', 'Ej', 'Cabiling', 'Sibul Old Cabalan', '0923675840', '', 'cabiling@gmail.com', '04/05/2017', '04/06/2017', '2017/04/06', '4100'),
(51, '51', 'Margie', 'Garcia', 'East Tapinac Olongapo City', '0927867123', '', 'margmolharnx@gmail.com', '04/10/2017', '04/11/2017', '2017/04/11', '4200'),
(52, '52', 'Alleah', 'Bastes', 'San Antonio', '09159673001', '', 'alleah@gmail.com', '04/10/2017', '04/12/2017', '2017/04/12', '6000'),
(53, '53', 'Charmina', 'Lim', 'East Baja Bajac Olongapo City', '0945302392', '', 'charm@gmail.com', '04/15/2017', '04/16/2017', '2017/04/16', '3800'),
(54, '54', 'Jhossy', 'jlo', 'Banicain 1st Street', '09167859429', '', 'jlooooo@gmail.com', '04/20/2017', '04/21/2017', '2017/04/21', '4000'),
(55, '55', 'Jero', 'Boam', 'Makati City', '092373278', '', 'boam@gmail.com', '04/26/2017', '04/28/2017', '2017/04/28', '7000'),
(56, '56', 'Grundy', 'Galindez', 'Baretto 164 Olongapo City', '0921457292', '', 'ross@gmail.com', '05/04/2017', '05/05/2017', '2017/05/05', '4000'),
(57, '57', 'Tristan', 'Jayme', 'East Bajac Bajac', '0916772899', '', 'jayme29@gmail.com', '05/06/2017', '05/07/2017', '2017/05/07', '4100'),
(58, '58', 'Jessie', 'Padz', 'Bulacan Philippines', '090898989', '222-000', 'jesspad@gmail.com', '05/09/2017', '05/11/2017', '2017/05/11', '5600'),
(59, '59', 'Daffney', 'Labrador', 'Manila Philippines', '0916557289', '', 'daffmo@gmail.com', '05/15/2017', '05/16/2017', '2017/05/16', '4500'),
(60, '60', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo City', '+63(94)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '05/20/2017', '05/21/2017', '2017/05/21', '3700'),
(61, '61', 'Goo', 'Yoo', 'Manila Philippines', '092314567', '', 'youu@gmail.com', '05/25/2017', '05/26/2017', '2017/05/26', '4000'),
(62, '62', 'Billy', 'Cabanglan', 'Upper Ramirez St. Olongapo City', '+63(93)1234-1234', '', 'billy@gmail.com', '06/02/2017', '06/03/2017', '2017/06/03', '3700'),
(63, '63', 'Top', 'Lane', 'Bulacan', '09467749675', '204-000-22', 'topmid@gmail.com', '06/04/2017', '06/06/2017', '2017/06/06', '6000'),
(64, '64', 'Alleah', 'Bastes', 'San Antonio', '09159673001', '', 'alleah@gmail.com', '06/10/2017', '06/11/2017', '2017/06/11', '5000'),
(65, '65', 'Lexi', 'Belle', 'Pepsi Rooad', '09089539979', '', 'lexi@gmail.com', '06/13/2017', '06/15/2017', '2017/06/15', '6000'),
(66, '66', 'Jeo', 'Blanco', 'Castillejos', '0951031052', '', 'blanco@gmail.com', '06/17/2017', '06/18/2017', '2017/06/18', '4000'),
(67, '67', 'Alleah', 'Bastes', 'San Antonio', '09159673001', '', 'alleah@gmail.com', '06/21/2017', '06/22/2017', '2017/06/22', '4000'),
(68, '68', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo City', '+63(94)1234-1234', '', 'mykelandrww@gmail.com', '06/23/2017', '06/24/2017', '2017/06/24', '4000'),
(69, '69', 'Daesung', 'Kun', 'Pampanga', '09267749675', '', 'daesung@gmail.com', '06/25/2017', '06/26/2017', '2017/06/26', '4000'),
(70, '70', 'Billy', 'Cabanglan', 'Kalaklan Bridge Olongapo City', '+63(93)1234-1234', '', 'billy@gmail.com', '06/27/2017', '06/28/2017', '2017/06/28', '4000'),
(71, '249', 'Mica', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '1234-1234', 'mica@gmail.com', '7/21/2017', '07/22/2017', '2017/07/28', '2960'),
(72, '248', 'Neris', 'Millanio', 'Domingo St. Olongapo City ', '+63(93)1234-1234', '2324-2321', 'neris@gmail.com', '07/21/2017', '07/24/2017', '2017/07/28', '16500'),
(73, '247', 'Mart', 'Macion', 'Harry St. Olongapo City', '+63(93)1234-1234', '2342-1324', 'mart@gmail.com', '7/20/2017', '07/21/2017', '2017/07/28', '3650'),
(74, '246', 'Julie', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(92)3214-2341', '4345-2321', 'julie_22@gmail.com', '7/20/2017', '07/22/2017', '2017/07/28', '11880'),
(75, '245', 'Michael', 'Flores', 'Keith St. Gordon Heights Olongapo City', '+63(93)1234-1234', '2324-23123', 'michael@yahoo.com', '7/20/2017', '07/21/2017', '2017/07/28', '4850'),
(76, '244', 'Carla', 'Jackson', 'Sta Rita 3f Olongapo City', '+63(92)3214-2341', '4323-1233', 'carla@yahoo.com', '7/20/2017', '07/21/2017', '2017/07/28', '6600'),
(77, '243', 'Jasmin', 'Giba', 'Acacia St. Gordon Heights Olongapo City', '+63(92)3214-2341', '2314-23241', 'jasmin@gmail.com', '7/20/2017', '07/21/2017', '2017/07/28', '5500'),
(78, '250', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2017/07/30', '5000'),
(79, '254', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2017/07/30', '5000'),
(80, '253', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2017/07/30', '5000'),
(81, '252', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2017/07/30', '5000'),
(82, '251', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2017/07/30', '5000'),
(83, '258', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '08/01/2017', '2017/08/01', '14700'),
(84, '259', 'Mart', 'Macion', 'Gordon Heights Olongapo city', '+63(93)1234-1234', '2324-2323', 'mart@yahoo.com', '7/30/2017', '7/31/2017', '2017/08/01', '2800'),
(85, '288', 'Mica', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '1234-1234', 'mica@gmail.com', '8/1/2017', '8/2/2017', '2017/08/01', '3750'),
(86, '285', 'Mica', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '1234-1234', 'mica@gmail.com', '8/1/2017', '8/2/2017', '2017/08/01', '2750'),
(87, '283', 'Alex', 'luna', 'keith st. gordon heights olongapo city ', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/31/2017', '8/1/2017', '2017/08/01', '4850'),
(88, '289', 'teresita', 'gomez', 'keith st. gordon heights olongapo city ', '+63(93)1234-1234', '', 'teresita@yahoo.com', '8/1/2017', '8/2/2017', '2017/08/01', '4900'),
(89, '292', 'teresita', 'gomez', 'keith st. gordon heights olongapo city ', '+63(93)1234-1234', '', 'teresita@yahoo.com', '8/1/2017', '8/2/2017', '2017/08/01', '4900'),
(90, '291', 'teresita', 'gomez', 'keith st. gordon heights olongapo city ', '+63(93)1234-1234', '', 'teresita@yahoo.com', '8/1/2017', '8/2/2017', '2017/08/01', '4900'),
(91, '290', 'teresita', 'gomez', 'keith st. gordon heights olongapo city ', '+63(93)1234-1234', '', 'teresita@yahoo.com', '8/1/2017', '08/03/2017', '2017/08/01', '9750'),
(92, '287', 'trisha', 'flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'trisha@yahoo.com', '8/1/2017', '8/2/2017', '2017/08/01', '6600'),
(93, '286', 'michael', 'flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'freeman@yahoo.com', '8/1/2017', '8/2/2017', '2017/08/01', '2750'),
(94, '284', 'Mica', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '1234-1234', 'mica@gmail.com', '8/1/2017', '8/2/2017', '2017/08/01', '2750'),
(95, '260', 'mart', 'Macion', 'Sta Rita 3f Olongapo City', '+63(93)1234-1234', '2324-2323', 'mart@yahoo.com', '7/31/2017', '08/02/2017', '2017/08/01', '13400'),
(96, '257', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2017/08/01', '5000'),
(97, '255', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'mykelandrww@gmail.com', '7/29/2017', '7/30/2017', '2017/08/01', '5000'),
(98, '281', 'Alfred', 'Flores', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '2324-2323', 'ampet@gmail.com', '7/31/2017', '8/1/2017', '2017/08/02', '5288'),
(99, '295', 'julius', 'rob', 'block 15 gordon heights olongapo city', '+63(93)1234-1234', '', 'rob@yahoo.com', '8/2/2017', '8/3/2017', '2017/12/01', '2750'),
(100, '296', 'Ben', 'Therdolt', '14 st. east bajac bajac olongapo city', '+63(93)1234-1234', '', 'ben@yahoo.com', '8/2/2017', '8/3/2017', '2017/12/01', '3650'),
(101, '298', 'Arthur', 'Ramos', 'Upper Ramirez St. Olongapo CIty', '+63(93)1234-1234', '', 'bidowcabanglan@gmail.com', '8/2/2017', '8/3/2017', '2017/12/01', '4900'),
(102, '301', 'mykel', 'flores', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '12/05/2017', '12/11/2017', '2017/12/10', '20250'),
(103, '302', 'mykel', 'flores', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-11', '2017-12-12', '2017/12/11', '11250'),
(104, '303', 'billy', 'cabanglan', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-11', '2017-12-12', '2017/12/11', '2750'),
(105, '304', 'neris', 'milanio', 'Upper Domingo St. Gordon Heights Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-14', '2017-12-16', '2017/12/11', '2750'),
(106, '305', 'rex', 'gocela', 'keith st. gordon heights olongapo city', ' 63(03)1234-1234', '1231-1234', 'mykelandrww@gmail.com', '2017-12-11', '2017-12-12', '2017/12/12', '3650'),
(107, '310', 'Lance', 'Asiatico', 'Upper Ramirez St. Olongapo City', '+63(03)1234-1234', '1234-1234', 'lance@gmail.com', '12/12/2017', '12/13/2017', '2017/12/12', '2750'),
(108, '311', 'Lance', 'Asiatico', 'Upper Ramirez St. Olongapo City', '+63(03)1234-1234', '1234-1234', 'lance@gmail.com', '12/12/2017', '12/14/2017', '2017/12/14', '5500'),
(109, '308', 'Mykel', 'Flores', 'Upper Ramirez St. Olongapo City', '+63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '12/12/2017', '12/14/2017', '2017/12/14', '5500'),
(110, '307', 'vincent', 'cuenza', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'vincent@gmail.com', '2017-12-12', '2017-12-13', '2017/12/14', '6400'),
(111, '306', 'mica', 'flores', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mica@gmail.com', '2017-12-12', '2017-12-13', '2017/12/14', '4850'),
(112, '312', 'mykel', 'flores', 'Upper Ramirez St. Olongapo City', ' 63(03)1234-1234', '1234-1234', 'mykelandrww@gmail.com', '2017-12-15', '2017-12-18', '2017/12/15', '8250'),
(113, '313', 'junior', 'monato', 'acacia gordon heigts olongapo city', '+63(03)1234-1234', '1234-1234', 'monato@gmail.com', '2017-12-16', '2017-12-17', '2017/12/15', '8250'),
(114, '309', 'Carla', 'Jackson', 'Sta Rita. St Olongapo City', '+63(03)1234-1234', '1234-1234', 'carla@gmail.com', '12/12/2017', '12/13/2017', '2018/01/04', '2750');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_no` int(3) UNSIGNED ZEROFILL NOT NULL,
  `room_status` varchar(50) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `customer_no` varchar(50) NOT NULL,
  `arrival` varchar(50) NOT NULL,
  `departure` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_no`, `room_status`, `room_id`, `customer_no`, `arrival`, `departure`) VALUES
(011, 'Available', '1', '307', '2018-01-24', '2018-01-25'),
(012, 'Available', '1', '313', '2018-01-24', '2018-01-25'),
(013, 'Available', '1', '311', '2018-01-24', '2018-01-25'),
(014, 'Available', '1', '', '2018-01-24', '2018-01-25'),
(015, 'Available', '1', '', '2018-01-24', '2018-01-25'),
(016, 'Available', '1', '308', '2018-01-24', '2018-01-25'),
(017, 'Available', '1', '310', '2018-01-24', '2018-01-25'),
(018, 'Occupied', '1', '300', '2018-01-24', '2018-01-25'),
(019, 'Available', '1', '', '2018-01-24', '2018-01-25'),
(020, 'Available', '1', '', '2018-01-24', '2018-01-25'),
(021, 'Available', '2', '307', '2018-01-24', '2018-01-25'),
(022, 'Occupied', '2', '', '2018-01-24', '2018-01-25'),
(023, 'Occupied', '2', '', '2018-01-24', '2018-01-25'),
(024, 'Occupied', '2', '', '2018-01-24', '2018-01-25'),
(025, 'Occupied', '2', '', '2018-01-24', '2018-01-25'),
(026, 'Occupied', '2', '', '2018-01-24', '2018-01-25'),
(027, 'Occupied', '2', '', '2018-01-24', '2018-01-25'),
(028, 'Occupied', '2', '', '2018-01-24', '2018-01-25'),
(029, 'Occupied', '2', '', '2018-01-24', '2018-01-25'),
(030, 'Occupied', '2', '', '2018-01-24', '2018-01-25'),
(031, 'Available', '3', '306', '2018-01-24', '2018-01-25'),
(032, 'Available', '3', '', '2018-01-24', '2018-01-25'),
(033, 'Available', '3', '', '2018-01-24', '2018-01-25'),
(034, 'Available', '3', '', '2018-01-24', '2018-01-25'),
(035, 'Available', '3', '', '2018-01-24', '2018-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `room_item`
--

CREATE TABLE `room_item` (
  `item_no` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_quantity` varchar(100) NOT NULL,
  `item_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_item`
--

INSERT INTO `room_item` (`item_no`, `item_name`, `item_quantity`, `item_price`) VALUES
(1, 'Pillow', '50', 50),
(2, 'Bed Sheet', '20', 100),
(3, 'Toothpaste', '100', 50),
(4, 'Toilet Paper', '200', 30);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(100) NOT NULL,
  `customer_no` int(100) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_quantity` varchar(100) NOT NULL,
  `room_total` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `customer_no`, `room_name`, `room_quantity`, `room_total`) VALUES
(197, 238, 'Standard Queen/Twin', '1', '2750.00'),
(198, 239, 'Deluxe Queen', '1', '3650.00'),
(199, 240, 'Superior King', '1', '3000.00'),
(200, 241, 'Standard Queen/Twin', '1', '2750.00'),
(201, 242, 'Superior Queen', '1', '4850.00'),
(202, 243, 'Superior King', '1', '5500.00'),
(203, 244, 'Family Room', '1', ' 6600.00'),
(204, 245, 'Superior Queen', '1', '4850.00'),
(205, 246, 'Family Room', '1', ' 6600.00'),
(206, 247, 'Deluxe Queen', '1', '3650.00'),
(207, 248, 'Superior King', '1', '3000.00'),
(208, 249, 'Deluxe Queen', '1', '3650.00'),
(209, 250, 'Superior Queen', '1', ' 5000'),
(210, 251, 'Superior Queen', '1', '5000'),
(211, 252, 'Superior Queen', '1', '5000'),
(212, 253, 'Superior Queen', '1', '5000'),
(213, 254, 'Superior Queen', '1', '5000'),
(214, 255, 'Superior Queen', '1', '5000'),
(215, 256, 'Superior Queen', '1', '5000'),
(216, 257, 'Superior Queen', '1', '5000'),
(217, 258, 'Superior Queen', '1', '5000'),
(218, 259, 'Standard Queen/Twin', '1', '2750.00'),
(219, 260, 'Family Room', '1', '6600.00'),
(220, 261, 'Family Room', '1', '6600.00'),
(221, 262, 'Family Room', '1', '6600.00'),
(222, 263, 'Superior Queen', '1', '5000'),
(223, 264, 'Superior Queen', '1', '5000'),
(224, 281, 'Superior Queen', '1', '5000'),
(225, 282, 'Superior Queen', '1', '5000'),
(226, 283, 'Superior Queen', '1', '5000'),
(227, 284, 'Standard Queen/Twin', '1', '2750.00'),
(228, 285, 'Standard Queen/Twin', '1', '2750.00'),
(229, 286, 'Standard Queen/Twin', '1', '2750.00'),
(230, 287, 'Family Room', '1', '6600'),
(231, 288, 'Deluxe Queen', '1', '3650'),
(232, 289, 'Superior Queen', '1', '4850'),
(233, 290, 'Superior Queen', '1', '4850'),
(234, 291, 'Superior Queen', '1', '4850'),
(235, 292, 'Superior Queen', '1', '4850'),
(236, 293, 'Standard Queen/Twin', '1', '2750'),
(237, 294, 'Standard Queen/Twin', '1', '2750'),
(238, 295, 'Standard Queen/Twin', '1', '2750'),
(239, 296, 'Deluxe Queen', '1', '3650'),
(240, 297, 'Standard Queen/Twin', '1', '2750'),
(241, 298, 'Superior Queen', '1', '4850'),
(242, 299, 'Deluxe Queen', '2', '7300'),
(243, 299, 'Family Room', '1', '6600'),
(244, 305, 'Deluxe Queen', '1', '3650.00'),
(245, 306, 'Superior Queen', '1', '4850.00'),
(246, 307, 'Deluxe Queen', '1', '3650.00'),
(247, 307, 'Standard Queen/Twin', '1', '2750.00'),
(248, 308, 'Standard Queen/Twin', '1', '2750.00'),
(249, 309, 'Standard Queen/Twin', '1', '2750.00'),
(250, 311, 'Standard Queen/Twin', '1', '2750.00'),
(251, 312, 'Standard Queen/Twin', '1', '2750.00'),
(252, 313, 'Standard Queen/Twin', '1', '2750.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `accomodation_features`
--
ALTER TABLE `accomodation_features`
  ADD PRIMARY KEY (`room_list_item`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`customer_no`);

--
-- Indexes for table `damage_item`
--
ALTER TABLE `damage_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_transaction`
--
ALTER TABLE `item_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_no`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_no`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `room_item`
--
ALTER TABLE `room_item`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `accomodation_features`
--
ALTER TABLE `accomodation_features`
  MODIFY `room_list_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `customer_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `damage_item`
--
ALTER TABLE `damage_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item_transaction`
--
ALTER TABLE `item_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_no` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `room_item`
--
ALTER TABLE `room_item`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
