-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 12:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farnek_datatables`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`) VALUES
(1, 'Public Accountant'),
(2, 'Accounting Manager'),
(3, 'Administration Assistant'),
(4, 'President'),
(5, 'Administration Vice President'),
(6, 'Accountant'),
(7, 'Finance Manager'),
(8, 'Human Resources Representative'),
(9, 'Programmer'),
(10, 'Marketing Manager'),
(11, 'Marketing Representative'),
(12, 'Public Relations Representative'),
(13, 'Purchasing Clerk'),
(14, 'Purchasing Manager'),
(15, 'Sales Manager'),
(16, 'Sales Representative'),
(17, 'Shipping Clerk'),
(18, 'Stock Clerk'),
(19, 'Stock Manager');

-- --------------------------------------------------------

--
-- Table structure for table `live_records`
--

CREATE TABLE `live_records` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `designation` int(11) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_records`
--

INSERT INTO `live_records` (`id`, `name`, `phone`, `email`, `designation`, `age`) VALUES
(1, 'Steven King', '515.123.4567', 'steven.king@gmail.com', 4, 43),
(2, 'Neena Kochhar', '515.123.4568', 'neena.kochhar@gmail.com', 5, 40),
(3, 'Lex De Haan', '515.123.4569', 'lex.de haan@gmail.com', 5, 27),
(4, 'Alexander Hunold', '590.423.4567', 'alexander.hunold@gmail.com', 9, 41),
(5, 'Bruce Ernst', '590.423.4568', 'bruce.ernst@gmail.com', 9, 30),
(6, 'David Austin', '590.423.4569', 'david.austin@gmail.com', 9, 29),
(7, 'Valli Pataballa', '590.423.4560', 'valli.pataballa@gmail.com', 9, 32),
(8, 'Diana Lorentz', '590.423.5567', 'diana.lorentz@gmail.com', 9, 28),
(9, 'Nancy Greenberg', '515.124.4569', 'nancy.greenberg@gmail.com', 7, 45),
(10, 'Daniel Faviet', '515.124.4169', 'daniel.faviet@gmail.com', 6, 24),
(11, 'John Chen', '515.124.4269', 'john.chen@gmail.com', 6, 31),
(12, 'Ismael Sciarra', '515.124.4369', 'ismael.sciarra@gmail.com', 6, 39),
(13, 'Jose Manuel Urman', '515.124.4469', 'jose manuel.urman@gmail.com', 6, 31),
(14, 'Luis Popp', '515.124.4567', 'luis.popp@gmail.com', 6, 41),
(15, 'Den Raphaely', '515.127.4561', 'den.raphaely@gmail.com', 14, 38),
(16, 'Alexander Khoo', '515.127.4562', 'alexander.khoo@gmail.com', 13, 24),
(17, 'Shelli Baida', '515.127.4563', 'shelli.baida@gmail.com', 13, 31),
(18, 'Sigal Tobias', '515.127.4564', 'sigal.tobias@gmail.com', 13, 37),
(19, 'Guy Himuro', '515.127.4565', 'guy.himuro@gmail.com', 13, 44),
(20, 'Karen Colmenares', '515.127.4566', 'karen.colmenares@gmail.com', 13, 38),
(21, 'Matthew Weiss', '650.123.1234', 'matthew.weiss@gmail.com', 19, 37),
(22, 'Adam Fripp', '650.123.2234', 'adam.fripp@gmail.com', 19, 25),
(23, 'Payam Kaufling', '650.123.3234', 'payam.kaufling@gmail.com', 19, 39),
(24, 'Shanta Vollman', '650.123.4234', 'shanta.vollman@gmail.com', 19, 26),
(25, 'Irene Mikkilineni', '650.124.1224', 'irene.mikkilineni@gmail.com', 18, 40),
(26, 'John Russell', '', 'john.russell@gmail.com', 15, 25),
(27, 'Karen Partners', '', 'karen.partners@gmail.com', 15, 31),
(28, 'Jonathon Taylor', '', 'jonathon.taylor@gmail.com', 16, 35),
(29, 'Jack Livingston', '', 'jack.livingston@gmail.com', 16, 33),
(30, 'Kimberely Grant', '', 'kimberely.grant@gmail.com', 16, 37),
(31, 'Charles Johnson', '', 'charles.johnson@gmail.com', 16, 43),
(32, 'Sarah Bell', '650.501.1876', 'sarah.bell@gmail.com', 17, 30),
(33, 'Britney Everett', '650.501.2876', 'britney.everett@gmail.com', 17, 24),
(34, 'Jennifer Whalen', '515.123.4444', 'jennifer.whalen@gmail.com', 3, 31),
(35, 'Michael Hartstein', '515.123.5555', 'michael.hartstein@gmail.com', 10, 37),
(36, 'Pat Fay', '603.123.6666', 'pat.fay@gmail.com', 11, 43),
(37, 'Susan Mavris', '515.123.7777', 'susan.mavris@gmail.com', 8, 37),
(38, 'Hermann Baer', '515.123.8888', 'hermann.baer@gmail.com', 12, 33),
(39, 'Shelley Higgins', '515.123.8080', 'shelley.higgins@gmail.com', 2, 31),
(40, 'William Gietz', '515.123.8181', 'william.gietz@gmail.com', 1, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `live_records`
--
ALTER TABLE `live_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `live_records`
--
ALTER TABLE `live_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
