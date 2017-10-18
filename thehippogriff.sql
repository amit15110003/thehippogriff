-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2017 at 02:25 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thehippogriff`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'amit', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(200) NOT NULL,
  `uid` int(200) NOT NULL,
  `productid` int(200) NOT NULL,
  `item` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `productid`, `item`) VALUES
(74, 9, 35, 1),
(72, 9, 34, 0),
(50, 12, 37, 1),
(73, 9, 39, 10);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `category` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `picture`) VALUES
(22, 'Necklaces', 'category1.jpg'),
(21, 'Ear Rings', 'category1.jpg'),
(20, 'Rings', 'category1.jpg'),
(23, 'Pendants', 'category1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(50) NOT NULL,
  `email` text NOT NULL,
  `msg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `addr` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `uid`, `fname`, `lname`, `mob`, `country`, `town`, `state`, `pin`, `addr`) VALUES
(1, 9, 'amit', 'anand', '9631310568', 'India', 'roorkee', 'uttrakhand', '247667', 'iitr, iitr1'),
(7, 12, 'hetss', 'hess', '88899494', 'hse', 'hse', 'hs', '949494949', 'hse');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(100) NOT NULL,
  `productid` int(10) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `productid`, `img`) VALUES
(10, 36, 'category.png'),
(11, 36, 'category1.png'),
(9, 36, 'category8.jpg'),
(5, 34, 'category6.jpg'),
(8, 34, 'category7.jpg'),
(12, 39, 'category9.jpg'),
(13, 39, 'category10.jpg'),
(14, 39, 'category11.jpg'),
(15, 39, 'category12.jpg'),
(16, 40, 'category13.jpg'),
(17, 40, 'category14.jpg'),
(18, 40, 'category15.jpg'),
(19, 43, 'category16.jpg'),
(20, 46, 'category17.jpg'),
(21, 46, 'category18.jpg'),
(22, 46, 'category19.jpg'),
(23, 37, 'category20.jpg'),
(24, 37, 'category21.jpg'),
(25, 37, 'category22.jpg'),
(26, 46, 'category23.jpg'),
(27, 37, 'category24.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `itemorder`
--

CREATE TABLE `itemorder` (
  `id` bigint(100) NOT NULL,
  `orderid` bigint(100) NOT NULL,
  `uid` int(255) NOT NULL,
  `productid` int(255) NOT NULL,
  `item` int(10) NOT NULL,
  `status` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemorder`
--

INSERT INTO `itemorder` (`id`, `orderid`, `uid`, `productid`, `item`, `status`) VALUES
(1, 1, 9, 35, 1, ' '),
(2, 1, 9, 34, 2, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scategory` varchar(20) NOT NULL,
  `cost` float NOT NULL,
  `category` varchar(20) NOT NULL,
  `Descr` varchar(2000) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `purity` varchar(20) NOT NULL,
  `color` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `view` bigint(20) NOT NULL,
  `rate` float NOT NULL,
  `review` int(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `posted`, `scategory`, `cost`, `category`, `Descr`, `picture`, `purity`, `color`, `gender`, `view`, `rate`, `review`, `status`) VALUES
(34, 'Agrafe earrings', '2017-05-28 07:40:48', 'Rings-heardt1', 258, 'Rings', 'Precious metals have always been a detector of prosperity and high social rank. Just remember that jewelry was always a very inaccessible good for ordinary people. Only kings and emperors, priests and pirates could own the jewelry. Ancients believed that precious stones have always had some magical power that is why jewelry was so rare and prohibitive.', 'product3.jpg', 'Gold 18cr', '', 'Women', 4, 4.5, 2, 'hosted'),
(33, 'nf', '2017-05-28 07:40:48', 'Rings-heardt1', 20, 'Rings', 'srra', 'product3.jpg', 'Gold 18cr', 'Black', 'Women', 3, 2.75, 4, 'hosted'),
(35, 'sdibfsag', '2017-05-28 07:40:48', 'Ear Rings-dimond', 30, 'Ear Rings', 'bzf zfvbsz sf b ss vw agsag', 'product3.jpg', 'Gold 18cr', '', 'Women', 6, 3, 4, 'hosted'),
(36, 'awv', '2017-05-28 07:40:48', '22-rose', 0, 'Ear Rings', 'gas', 'product3.jpg', 'Gold 18cr', '', 'Women', 0, 2, 4, 'hosted'),
(37, 'gfs', '2017-05-28 07:40:48', 'Ear Rings-dimond', 250, 'Necklaces', 'sdzg', 'product3.jpg', 'Gold 18cr', '', 'Women', 18, 4, 3, 'hosted'),
(38, 'dsv', '2017-05-28 07:40:48', 'Ear Rings-dimond', 243, 'Ear Rings', 'daf', 'product3.jpg', 'Gold 18cr', '', 'Women', 0, 3.5, 4, 'hosted'),
(39, 'bf', '2017-05-28 07:40:48', 'Ear Rings-dimond', 0, 'Necklaces', 'bds', 'product2.jpg', 'Gold 18cr', '', 'Women', 1, 5, 1, 'hosted'),
(40, 'srr', '2017-05-28 07:40:48', 'Ear Rings-dimond', 5465, 'Necklaces', 'jxncg', 'product4.jpg', '14 kt', '', 'Women', 1, 2, 1, 'hosted'),
(41, 'axfm', '2017-05-28 07:40:48', 'Ear Rings-dimond', 34, 'Necklaces', ' bf ', '', '14 kt', '', 'Women', 0, 0, 0, 'hosted'),
(42, 'dfh', '2017-05-28 07:40:48', 'Ear Rings-dimond', 0, 'Necklaces', ' xdh ', '', '14 kt', '', 'Women', 0, 0, 0, 'hosted'),
(43, 'SILICONEER | Swachh Bharat Abhiyan', '2017-05-28 07:40:48', 'Ear Rings-dimond', 58, 'Necklaces', 'mhx  \r\nyky \r\nfXZ\r\n&#945; h$  # %ufjf&#960;  ', 'product.png', '14 kt', '', 'Women', 0, 0, 0, 'hosted'),
(44, 'RG', '2017-05-28 07:40:48', 'Ear Rings-dimond', 0, 'Necklaces', 'GW SEG', 'product5.jpg', '14 kt', '', 'Women', 0, 0, 0, 'hosted'),
(45, 'Agrafe earrings', '2017-05-31 19:29:06', 'Rings-heardt1', 119999, 'Rings', 'Precious metals have always been a detector of prosperity and high social rank. Just remember that jewelry was always a very inaccessible good for ordinary people. Only kings and emperors, priests and pirates could own the jewelry. Ancients believed that precious stones have always had some magical power that is why jewelry was so rare and prohibitive.', '', 'Gold 18cr', '', 'Women', 0, 0, 0, 'hosted'),
(46, 'Agrafe earrings', '2017-05-31 19:29:43', 'Rings-heardt1', 110000, 'Rings', 'Precious metals have always been a detector of prosperity and high social rank. Just remember that jewelry was always a very inaccessible good for ordinary people. Only kings and emperors, priests and pirates could own the jewelry. Ancients believed that precious stones have always had some magical power that is why jewelry was so rare and prohibitive.', '', 'Gold 18cr', '', 'Women', 0, 0, 0, 'hosted');

-- --------------------------------------------------------

--
-- Table structure for table `purity`
--

CREATE TABLE `purity` (
  `id` int(20) NOT NULL,
  `purity` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purity`
--

INSERT INTO `purity` (`id`, `purity`) VALUES
(16, '14 kt'),
(15, 'Gold 14cr');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `productid` int(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `rate` int(2) NOT NULL,
  `review` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `uid`, `productid`, `uname`, `rate`, `review`) VALUES
(23, 9, 35, 'amit amit', 4, 'jcy'),
(22, 9, 33, 'amit amit', 1, 'bzdf'),
(21, 9, 33, 'amit amit', 1, 'bzf '),
(20, 9, 33, 'amit amit', 4, 'bzf '),
(19, 9, 33, 'amit amit', 5, 'bzf '),
(24, 9, 36, 'amit amit', 5, ''),
(25, 9, 35, 'amit amit', 2, 'ug'),
(26, 9, 35, 'amit amit', 2, 'ug'),
(27, 9, 37, 'amit amit', 5, 'j'),
(28, 9, 37, 'amit amit', 5, 'y'),
(29, 9, 35, 'amit amit', 4, 'uoj '),
(30, 9, 37, 'amit amit', 2, 'ug'),
(31, 9, 34, 'amit amit', 5, 'ehhwe wtb 3h egg he 4w ww'),
(32, 9, 39, 'amit amit', 5, 'srhysr'),
(33, 9, 38, 'amit amit', 4, '-9['),
(34, 9, 38, 'amit amit', 2, 'T\\.9?'),
(35, 9, 38, 'amit amit', 3, '9/'),
(36, 9, 38, 'amit amit', 5, '/3'),
(37, 9, 40, 'amit amit', 2, 'ew'),
(38, 9, 36, 'amit amit', 1, 'eha3hh'),
(39, 9, 36, 'amit amit', 1, '5yq3qtq'),
(40, 9, 36, 'amit amit', 1, 'w4ghw4y'),
(41, 12, 34, 'amit amit', 4, 'reg\r\njt\r\nhetz');

-- --------------------------------------------------------

--
-- Table structure for table `scategory`
--

CREATE TABLE `scategory` (
  `id` bigint(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `descr` varchar(2000) NOT NULL,
  `category` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scategory`
--

INSERT INTO `scategory` (`id`, `name`, `descr`, `category`) VALUES
(37, 'dimond', '', 'Ear Rings'),
(36, 'heardt1', '', 'Rings'),
(35, 'rose', '', '22'),
(34, 'heart', '', '20');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `h1` text NOT NULL,
  `h2` text NOT NULL,
  `address` text NOT NULL,
  `color` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `picture`, `h1`, `h2`, `address`, `color`) VALUES
(7, 'slider2.jpg', 'Hello', '', '', '#FF0000');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`) VALUES
(10, 'amitanand.kvj.2@gmail.com'),
(9, 'amitanand.kvj.255@gmail.com'),
(8, 'amitanand.kvj.3@gmail.com'),
(7, 'amitanand.kvj.2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(20) NOT NULL,
  `color` text NOT NULL,
  `colorcode` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `color`, `colorcode`) VALUES
(15, 'Black', '#000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contact` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `gender`, `address`, `created`, `modified`, `password`, `contact`) VALUES
(9, 'amit', 'anand', 'amitanand.kvj.3@gmail.com', '', '', '2017-03-16 17:41:55', '2017-10-18 01:45:52', '202cb962ac59075b964b07152d234b70', 86986);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `productid` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `uid`, `productid`) VALUES
(200, 9, 37),
(207, 9, 35),
(142, 12, 34),
(201, 9, 39),
(203, 9, 34),
(141, 12, 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemorder`
--
ALTER TABLE `itemorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purity`
--
ALTER TABLE `purity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scategory`
--
ALTER TABLE `scategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `itemorder`
--
ALTER TABLE `itemorder`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `purity`
--
ALTER TABLE `purity`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `scategory`
--
ALTER TABLE `scategory`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
