-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 03:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventtbl`
--

CREATE TABLE `eventtbl` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `schedule` datetime NOT NULL,
  `dateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventtbl`
--

INSERT INTO `eventtbl` (`id`, `title`, `Description`, `schedule`, `dateDate`, `status`) VALUES
(1, 'Metting one', 'Hello every One our event is assigned at Home land hotel', '2021-11-29 00:00:00', '2021-11-28 15:41:57', 1),
(2, 'Metting Two', 'All of you your Invited ', '2021-12-01 00:00:00', '2021-11-28 15:47:16', 1),
(3, 'Meting three', 'required date and time', '2021-12-04 00:00:00', '2021-11-28 15:53:24', 1),
(4, 'Event one ', 'taka care', '2021-11-28 15:54:00', '2021-11-28 15:54:52', 1),
(5, 'youth event', 'trigrognrtwng', '2021-12-01 00:00:00', '2021-11-30 09:44:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settingtbl`
--

CREATE TABLE `settingtbl` (
  `id` int(11) NOT NULL,
  `user_id` int(3) NOT NULL,
  `event_id` int(3) NOT NULL,
  `status` int(3) NOT NULL,
  `dateDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `uid` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `phoneNumber` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Status` int(3) NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`uid`, `Firstname`, `Lastname`, `phoneNumber`, `email`, `password`, `Status`, `addedDate`) VALUES
(38, 'Enock', 'Ndagijimana', '0783982872', 'ndagijimanaenock22@gmail.com', '$2y$10$nzTyTzlLMrEtaqsZ/TjtfODWuAwmiM.kkN.Bh6.N2vCE2ZlYe4fLK', 1, '2021-11-28 13:32:37'),
(39, 'Enock', 'meston', '+250783982872', 'ndagijimanaenock11@gmail.com', '$2y$10$ZSrETyQg7RCA9UeZMvizi.E5qnttOyWBn0pU/TbZariPb.c2hSrxu', 1, '2021-11-28 14:10:31'),
(40, 'haruna', 'harun2', '0783982872', 'ndayisabyearon@gmail.com', '$2y$10$RdWq88lOJ5UeiCP9lQ6TJO8A0IroIbS3vZznx3ouVu/Ef5YC633r2', 1, '2021-11-30 09:40:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventtbl`
--
ALTER TABLE `eventtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settingtbl`
--
ALTER TABLE `settingtbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventtbl`
--
ALTER TABLE `eventtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settingtbl`
--
ALTER TABLE `settingtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11787;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `settingtbl`
--
ALTER TABLE `settingtbl`
  ADD CONSTRAINT `settingtbl_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `eventtbl` (`id`),
  ADD CONSTRAINT `settingtbl_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `usertbl` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
