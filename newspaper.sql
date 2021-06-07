-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 03:30 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newspaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `adminame` varchar(150) NOT NULL,
  `adminpassword` varchar(150) NOT NULL,
  `adminstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `adminame`, `adminpassword`, `adminstatus`) VALUES
(1, 'admin', 'Toiohomai123', 1),
(2, 'dev', 'dev123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `address`) VALUES
(1, 'Brookfield', 'Brookfield, Tauranga, 3110'),
(2, 'Brookfieldasdas', 'Brookfield, Tauranga, 3115');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_address` varchar(400) NOT NULL,
  `client_phone` varchar(20) NOT NULL,
  `client_email` varchar(500) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `enterDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updateTime` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_address`, `client_phone`, `client_email`, `logo`, `price`, `enterDate`, `updateTime`, `status`) VALUES
(1, 'Bay of plenty times', 'aaaaa', '111111111', 'sad@ahsdbhjasd.omcl', 'boptimes.jpg', 350, '2021-05-11 21:21:51', '2021-05-11 11:20:27', 1),
(2, 'The New Zealand Herald', 'sadsad', '2121312312312', 'asdasdads@sadasd.asds', 'NZ-herald-logo.jpg', 450, '2021-05-11 21:21:51', '2021-05-11 11:20:27', 1),
(3, 'Sun Media ', 'asdnjasdgkasdkh', '1231231231233', 'ascsadsj@jdhvuad.asddas', 'sunlive-logo.png', 350, '2021-05-11 21:23:31', '2021-05-11 11:23:05', 1),
(4, 'Test', 'kslmdfksdf', '2342423', 'kenkw@shbda.aa', 'logo-social.png', 99, '2021-06-03 00:18:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contact_id` int(11) NOT NULL,
  `firstname` varchar(70) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `email` varchar(300) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `enterdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_id`, `firstname`, `lastname`, `email`, `subject`, `message`, `enterdate`) VALUES
(1, 'asdsdas', 'dsafsdffds', 'sdfsd@gasg.kk', 'jsadkhad', 'jkhnsdjhsdj', '2021-05-12 22:26:13'),
(2, 'asdsdassdsad', 'dsafsdffds', 'sdfsasdsd-asd@gasg.kk', 'jsadkhad', 'jkhnsdjhsdj asdasdasd asdasdas', '2021-05-12 22:26:55'),
(3, 'asdsdassdsad', 'dsafsdffds', 'sdfsasdsd-asd@gasg.kk', 'jsadkhad', 'jkhnsdjhsdj asdasdasd asdasdas', '2021-05-13 11:48:19'),
(4, 'asdasdas', 'asdasd', 'asdasd@sdasd.asd', 'asdasd', 'asdasdasd', '2021-05-22 15:29:43'),
(5, 'asdasd', 'asd', 'asd@asddas.asdasd', 'asdasdasd', 'asdasdasda\r\nasdasdasdsd', '2021-05-22 15:30:15'),
(6, 'qwwqqw', 'qwqw', 'qwqw@asdasd.cac', 'asdsd', 'asdasdasd asdasdasd', '2021-05-22 15:43:14'),
(7, 'qwwqqw', 'qwqw', 'qwqw@asdasd.cac', 'asdsd', 'asdasdasd asdasdasd', '2021-05-22 15:46:36'),
(8, 'qwwqqw', 'qwqw', 'qwqw@asdasd.cac', 'asdsd', 'asdasdasd asdasdasd', '2021-05-22 15:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(300) NOT NULL,
  `customer_pwd` varchar(300) NOT NULL,
  `customer_gender` varchar(30) NOT NULL,
  `address_code` int(11) NOT NULL,
  `enterDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_phone`, `customer_email`, `customer_pwd`, `customer_gender`, `address_code`, `enterDate`, `updateTime`) VALUES
(1, 'Sagar Devkota', '5a Sharyn Place, Brookfield, Tauranga', '323224324', 'sagar@gmail.com', 'Ab12345678@', 'male', 1, '2021-05-11 21:03:47', '2021-05-11 11:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_name` varchar(250) NOT NULL,
  `delivery_email` varchar(250) NOT NULL,
  `delivery_gender` varchar(10) NOT NULL,
  `delivery_password` varchar(250) NOT NULL,
  `delivery_address` varchar(300) NOT NULL,
  `operating_area` varchar(150) NOT NULL,
  `enterDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updateDate` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `delivery_name`, `delivery_email`, `delivery_gender`, `delivery_password`, `delivery_address`, `operating_area`, `enterDate`, `updateDate`, `status`) VALUES
(1, 'Sagar', 'sagar@gmail.com', 'male', 'Ab12345678', 'asdasdasdadad', '1', '2021-05-11 21:19:30', '2021-05-11 11:19:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `orderitem` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `enterDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`orderitem`, `order_id`, `client_id`, `enterDate`) VALUES
(1, 1, 1, '2021-05-28 12:28:50'),
(2, 1, 2, '2021-05-28 12:28:50'),
(3, 2, 1, '2021-05-28 12:42:41'),
(4, 2, 2, '2021-05-28 12:42:41'),
(5, 3, 2, '2021-06-01 20:14:20'),
(6, 4, 1, '2021-06-02 21:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `enterDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `status`, `enterDate`) VALUES
(1, 1, 1, '2021-05-28 12:28:50'),
(4, 1, 1, '2021-06-02 21:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery`
--

CREATE TABLE `order_delivery` (
  `order_delivery_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `enter_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_delivery`
--

INSERT INTO `order_delivery` (`order_delivery_id`, `delivery_id`, `order_id`, `enter_date`) VALUES
(11, 1, 1, '2021-06-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`orderitem`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_delivery`
--
ALTER TABLE `order_delivery`
  ADD PRIMARY KEY (`order_delivery_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `orderitem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_delivery`
--
ALTER TABLE `order_delivery`
  MODIFY `order_delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
