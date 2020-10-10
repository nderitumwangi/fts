-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 04:29 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fts`
--

-- --------------------------------------------------------

--
-- Table structure for table `tenderpreneurs`
--

CREATE TABLE `tenderpreneurs` (
  `tp_no` int(11) NOT NULL,
  `tp_name` varchar(20) NOT NULL,
  `kra_cert` varchar(20) NOT NULL,
  `certificate` varchar(20) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `t_no` int(11) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `t_category` varchar(20) NOT NULL,
  `t_description` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `measurement` varchar(20) NOT NULL,
  `projected_price` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `deadline_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`t_no`, `t_name`, `t_category`, `t_description`, `quantity`, `measurement`, `projected_price`, `status`, `deadline_date`) VALUES
(1, 'kieni', '2', 'sdfgj', 3, 'km', 234567, 'OnGoing', '2020-08-10'),
(2, 'wertyu', '2', 'ertyui', 2, 'wertyui', 0, 'wertyu', '2020-08-10'),
(3456, 'sdfgh', '2', 'wertyui2444', 1, 'wertyu', 34567, 'Completed', '2020-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_no` int(11) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `Level` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_no`, `First_name`, `Last_name`, `Email`, `Department`, `Level`, `Password`) VALUES
(1, 'Steve', 'Munyaka', 'steve@gmail.com', 'Managerial ', 'Adminstrator', 'secret'),
(2, 'werty', 'sdfgh', 'sdfgh', 'ddfgh', 'wertyu', 'wedrfty'),
(3, 'werty', 'sdfgh', 'sdfgh', 'ddfgh', 'wertyu', 'wedrfty'),
(4, 'mmm', 'bnnn', 'nmmk', 'hjkm', 'jkmn', 'hjkm'),
(5, 'rty', 'dfghj', 'fgjh', 'xcvb', 'dfghj', 'ertyui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tenderpreneurs`
--
ALTER TABLE `tenderpreneurs`
  ADD PRIMARY KEY (`tp_no`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`t_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tenderpreneurs`
--
ALTER TABLE `tenderpreneurs`
  MODIFY `tp_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
