-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 01:44 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `a_no` int(11) NOT NULL,
  `t_no` int(11) NOT NULL,
  `tp_no` int(11) NOT NULL,
  `quoted_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`a_no`, `t_no`, `tp_no`, `quoted_amount`) VALUES
(1, 23456, 234567, 234567),
(2, 1234, 1, 12345678),
(3, 1234, 1, 12345678),
(4, 2345, 34444, 12345),
(5, 233, 45555, 456789);

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `approval_no` int(11) NOT NULL,
  `a_no` int(11) NOT NULL,
  `approval_status` varchar(20) NOT NULL,
  `approval_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `b_code` int(11) NOT NULL,
  `b_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation` (
  `con_no` int(11) NOT NULL,
  `t_no` int(11) NOT NULL,
  `amt_received` int(20) NOT NULL,
  `con_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `his_no` int(11) NOT NULL,
  `t_no` int(11) NOT NULL,
  `a_no` int(11) NOT NULL,
  `tp_no` int(11) NOT NULL,
  `review` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `email` varchar(20) NOT NULL,
  `pass` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenderpreneurs`
--

INSERT INTO `tenderpreneurs` (`tp_no`, `tp_name`, `kra_cert`, `certificate`, `contact`, `email`, `pass`) VALUES
(1, 'Tenderpreneur Kimani', 'ertyuio', '123456', 78900000, 'tp@fts.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(2, 'qwertyu', '234567', '2134567', 1234567, 'owner@maduka.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(3, 'qwertyu', '234567', '2134567', 1234567, 'ownerf@maduka.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(4, 'qwertyu', '234567', '2134567', 1234567, 'ownerfg@maduka.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(5, 'qwertyu', '234567', '2134567', 1234567, 'ownerfg@maduka.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(6, 'qwertyu', '234567', '2134567', 1234567, 'ownerfgee@maduka.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(7, 'sdfgh', '23456', 'asdfgh', 12345678, 'chibesa@maduka.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(8, 'wertyui', '23456789', 'wertyu', 2345678, 'admin@fts.com', '5ebe2294ecd0e0f08eab7690d2a6ee69');

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
  `deadline_date` date NOT NULL,
  `added_on_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`t_no`, `t_name`, `t_category`, `t_description`, `quantity`, `measurement`, `projected_price`, `status`, `deadline_date`, `added_on_date`) VALUES
(0, 'sdfgh', '2', 'wdrfghjk', 3, 'ertyui', 234567, 'Completed', '2020-10-20', '2020-10-02 10:59:13'),
(1234, '1qwert', '3', 'asdfgh', 4, 'km', 0, 'On Going', '2020-09-30', '2020-09-26 06:20:00'),
(2345, 'sdfghj', '1', 'wertyu', 4, 'fghj', 12345678, 'Completed', '2020-10-09', '2020-09-29 08:43:43'),
(3456, 'sdfgh', '2', 'wertyui2444', 1, 'wertyu', 34567, 'Completed', '2020-08-04', '2020-09-26 06:20:00'),
(1234567, 'asdfghjk', '2', 'sdfghjk', 2, 'qwertyu', 0, 'Completed', '2020-09-30', '2020-09-26 06:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_no` int(11) NOT NULL,
  `tp_no` int(11) NOT NULL,
  `account_no` int(20) NOT NULL,
  `trans_date` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_no`, `First_name`, `Last_name`, `Email`, `Department`, `Level`, `Password`) VALUES
(5, 'Candidate', 'dfghj', 'candidate@fts.com', 'xcvb', 'Candidate', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(8, 'qwer', 'wert', 'staff@fts.com', 'Tender', 'Staff', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(10, 'Admin', 'wertyu', 'admin@fts.com', 'wqerty', 'Admin', '5ebe2294ecd0e0f08eab7690d2a6ee69');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`a_no`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`his_no`);

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `a_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `his_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenderpreneurs`
--
ALTER TABLE `tenderpreneurs`
  MODIFY `tp_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
