-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2017 at 09:45 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackdtu`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `childid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `childname` varchar(25) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`childid`, `id`, `childname`, `sex`, `dob`) VALUES
(2, 4, 'Rohit', 'm', '2005-02-12'),
(10, 4, 'Rohit', 'm', '2005-02-12'),
(13, 1, 'Akshay', 'm', '2016-06-07'),
(14, 1, 'Shalini', 'f', '1999-01-09'),
(15, 1, 'Rahul', 'f', '1998-02-05'),
(16, 1, 'Ila', 'f', '2015-06-03'),
(17, 11, 'Jack', 'm', '2005-02-12'),
(18, 1, 'Ajssjjd', 'm', '2017-02-19'),
(19, 1, 'Were', 'm', '2016-12-04'),
(20, 1, 'Akku', 'f', '2017-01-18'),
(21, 1, 'Annu', 'f', '2017-02-15'),
(22, 1, 'Andbvd', 'm', '2017-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `petid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `petname` varchar(25) NOT NULL,
  `pet` varchar(1) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`petid`, `id`, `petname`, `pet`, `dob`) VALUES
(1, 4, 'Brat', 'd', '2005-02-12'),
(2, 11, 'Bruno', 'd', '2005-02-12'),
(3, 1, 'Lily', 'c', '1999-02-13'),
(4, 1, 'Likkk', 'd', '2017-02-05'),
(5, 1, 'Doggy', 'd', '2017-01-15'),
(6, 1, 'Catt', 'c', '2017-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `petvaccines`
--

CREATE TABLE `petvaccines` (
  `petvaccid` int(11) NOT NULL,
  `petvaccname` varchar(25) NOT NULL,
  `months` int(11) NOT NULL,
  `pet` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petvaccines`
--

INSERT INTO `petvaccines` (`petvaccid`, `petvaccname`, `months`, `pet`) VALUES
(1, 'Parovirus', 1, 'd'),
(2, 'Coronavirus', 2, 'd'),
(3, 'Rabies', 3, 'd'),
(4, 'Leptospirosis', 4, 'd'),
(5, 'Lyme', 4, 'd'),
(6, 'Combination vaccine', 5, 'd'),
(7, 'Parainfluenza', 2, 'd'),
(8, 'DHPP', 3, 'd'),
(9, 'DHPP', 8, 'd'),
(10, 'Distemper', 12, 'd'),
(11, 'Feline Distemper', 2, 'c'),
(12, 'Feline Rhinotracheitis', 2, 'c'),
(13, 'Feline Calicivirus', 3, 'c'),
(14, 'Chlamydia', 4, 'c'),
(15, 'Rabies', 4, 'c'),
(16, 'Feline leukemia', 12, 'c'),
(17, 'Calici', 3, 'c'),
(18, 'Immunodeficiency Virus', 4, 'c'),
(19, 'FVRCP', 5, 'c'),
(20, 'Ovariohysterectomy', 6, 'c'),
(21, 'DEWORMING', 8, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `email`, `dob`, `sex`) VALUES
(1, 'aman', 'Aman', 'hello', 'msgmeaman@gmail.com', '1999-02-13', 'm'),
(4, 'ajul123', 'Ajul', 'raj12', 'ajulraj@gm.com', '1998-01-19', 'm'),
(11, 'amangarg', 'Aman Garg', 'aman', 'msgme@gmail.com', '1999-02-01', 'm'),
(12, 'majnu', 'Laila', 'yo', 'female@gmail.com', '0000-00-00', 'f'),
(13, 'Agio', 'Ahuk', 'Agjhyfg', 'Aaa@gmail.cm', '0000-00-00', 'f'),
(14, 'Sndkdks', 'Ajkala', '1dhdj', 'Jsnsm@.', '0000-00-00', 'm'),
(15, 'theshiela', 'Sheila', 'hello', 'sh@mail.cm', '2017-02-11', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `vaccid` int(11) NOT NULL,
  `vaccname` varchar(25) NOT NULL,
  `months` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccid`, `vaccname`, `months`) VALUES
(1, 'Hepatitis B Dose  1', 0),
(2, 'Hepatitis B Dose  2', 1),
(3, 'Hepatitis B Dose  3', 6),
(4, 'Rotavirus Dose 1', 2),
(5, 'Rotavirus Dose 2', 4),
(6, 'Diphtheria Dose 1', 2),
(7, 'Diphtheria Dose 2', 4),
(8, 'Diphtheria Dose 3', 6),
(9, 'Diphtheria Dose 4', 15),
(10, 'Polio Dose 1', 1),
(11, 'Polio Dose 2', 2),
(12, 'Polio Dose 3', 9),
(13, 'Mumps Dose 1', 12),
(14, 'Hepatitis B Dose 4', 18),
(15, 'Diphtheria Dose 5', 18),
(16, 'Diphtheria Dose 6', 48),
(17, 'Mumps Dose 2', 48),
(18, 'Polio Dose 4', 60),
(19, 'Influenza', 230),
(20, 'TDAP', 264),
(21, 'MMR', 348),
(22, 'VAR', 368),
(23, 'HZV', 720),
(24, 'HPV', 210),
(25, 'PCV 13', 780),
(26, 'PPSV 23', 812);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`childid`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petid`);

--
-- Indexes for table `petvaccines`
--
ALTER TABLE `petvaccines`
  ADD PRIMARY KEY (`petvaccid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`vaccid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `childid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `petid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `petvaccines`
--
ALTER TABLE `petvaccines`
  MODIFY `petvaccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `vaccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
