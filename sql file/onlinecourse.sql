-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 09:02 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-01-24 16:21:18', '21-05-2018 03:31:37 PM');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `courseCode` varchar(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `noofSeats` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseCode`, `courseName`, `noofSeats`, `department`, `creationDate`, `updationDate`) VALUES
(1, 'BICS', 'Computer Science', 50, '9', '2018-09-30 20:19:16', '27-10-2018 12:06:04 PM'),
(2, 'BTC', 'Telecommunications', 50, '', '2018-09-30 20:20:16', '01-10-2018 11:13:31 PM'),
(4, 'test', 'Test', 10, '9', '2018-10-26 20:47:50', '27-10-2018 09:50:06 AM');

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolls`
--

CREATE TABLE `courseenrolls` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `session` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `course` int(11) NOT NULL,
  `enrollDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseenrolls`
--

INSERT INTO `courseenrolls` (`id`, `studentRegno`, `pincode`, `session`, `department`, `level`, `semester`, `course`, `enrollDate`) VALUES
(13, '101292', '249884', 8, 9, 6, 'Semester 1', 1, '2018-10-27 08:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `courseunit`
--

CREATE TABLE `courseunit` (
  `courseid` int(11) NOT NULL,
  `unitid` int(11) NOT NULL,
  `unitname` varchar(255) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `creationDate`) VALUES
(9, 'Information Technology', '2018-09-24 12:57:26'),
(10, 'Mathematical Sciences', '2018-09-30 20:18:11'),
(11, 'Engineering', '2018-09-30 20:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `creationDate`) VALUES
(5, 'Year 1', '2017-02-09 19:04:04'),
(6, 'Year 2', '2017-02-09 19:04:12'),
(9, 'Year 3', '2018-10-23 09:25:48'),
(10, 'Year 4', '2018-10-23 09:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `Semester` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `Semester`, `creationDate`) VALUES
(8, '2018', 'Semester 1', '2018-10-27 05:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentRegno` varchar(255) NOT NULL,
  `studentPhoto` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentRegno`, `studentPhoto`, `password`, `studentName`, `email`, `pincode`, `session`, `department`, `semester`, `creationdate`, `updationDate`) VALUES
('101292', 'amani.jpg', '8c32e5048bc4fbfc5dc53c89a36c0812', 'Amani Usagi', 'amani@mail.com', '249884', '', '', '', '2018-09-20 09:39:15', '03-10-2018 11:15:51 PM'),
('101366', 'mi-redmi-note-4-na-original-imaeqdxqcrfshtqu.jpeg', '21e69453eb63e522375dbc251a0e8465', 'Hellen Queen', NULL, '141290', '', '', '', '2018-10-22 13:35:52', '22-10-2018 04:38:57 PM'),
('102334', 'avatar.png', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'George Mwaniki', NULL, '882506', '', '', '', '2018-09-30 17:58:47', ''),
('111111', NULL, 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Test Student', NULL, '129721', '', '', '', '2018-10-17 12:56:13', ''),
('112233', NULL, 'e88a254ce4248cca0a7a84eb59727474', 'tutor test', 'tutortest@mail.com', '548826', '', '', '', '2018-10-27 09:35:09', ''),
('344566', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Hubert Kivuguto', NULL, '552297', '', '', '', '2018-09-30 18:11:31', ''),
('444888', NULL, 'a152e841783914146e4bcd4f39100686', 'George Mwangi', NULL, '343760', '', '', '', '2018-10-01 20:36:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblanswer`
--

CREATE TABLE `tblanswer` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `resources` varchar(255) NOT NULL,
  `replyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblanswer`
--

INSERT INTO `tblanswer` (`id`, `postid`, `userid`, `answer`, `resources`, `replyDate`) VALUES
(1, 1, 101366, 'you have not used css well', '', '2018-11-01 12:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `id` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `postDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`id`, `courseid`, `userid`, `question`, `postDate`) VALUES
(1, 1, 101292, 'My question is this... test', '2018-10-28 09:29:20'),
(2, 2, 101292, 'My question 2 is this....test 2', '2018-10-28 09:29:20'),
(3, 4, 101292, 'My question 3 is this.... test 3\r\nWhy cant you align yourself?', '2018-10-28 09:29:20'),
(4, 1, 101366, 'This is a test Question for the forum', '2018-11-01 19:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `tutorenrolls`
--

CREATE TABLE `tutorenrolls` (
  `id` int(11) NOT NULL,
  `tutorRegno` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `session` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `course` int(11) NOT NULL,
  `enrollDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorenrolls`
--

INSERT INTO `tutorenrolls` (`id`, `tutorRegno`, `pincode`, `session`, `department`, `semester`, `course`, `enrollDate`) VALUES
(11, '900800', '138276', 8, 9, 'Semester 1', 1, '2018-10-27 09:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `TutorRegno` varchar(255) NOT NULL,
  `tutorPhoto` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `tutorName` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`TutorRegno`, `tutorPhoto`, `password`, `tutorName`, `email`, `pincode`, `session`, `department`, `semester`, `creationdate`, `updationDate`) VALUES
('900800', '', 'a63cae038d7660bec434567c7ccc7504', 'Daniel Machanje', 'dmachanje@gmail.com', '138276', '', '', '', '2018-09-30 18:08:32', '03-10-2018 11:12:01 PM');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `studentRegno`, `userip`, `loginTime`, `logout`, `status`) VALUES
(50, '101292', 0x3a3a3100000000000000000000000000, '2018-10-01 20:39:02', '', 1),
(51, '101292', 0x3a3a3100000000000000000000000000, '2018-10-02 17:32:42', '02-10-2018 08:58:51 PM', 1),
(52, '101292', 0x3a3a3100000000000000000000000000, '2018-10-03 20:15:32', '03-10-2018 11:15:54 PM', 1),
(53, '101292', 0x3a3a3100000000000000000000000000, '2018-10-03 20:16:11', '03-10-2018 11:22:21 PM', 1),
(54, '101292', 0x3a3a3100000000000000000000000000, '2018-10-03 20:22:31', '03-10-2018 11:24:01 PM', 1),
(55, '101292', 0x3a3a3100000000000000000000000000, '2018-10-03 21:16:28', '04-10-2018 12:19:05 AM', 1),
(56, '101292', 0x3a3a3100000000000000000000000000, '2018-10-04 07:41:29', '04-10-2018 10:41:33 AM', 1),
(57, '101292', 0x3a3a3100000000000000000000000000, '2018-10-04 08:01:07', '04-10-2018 11:16:38 AM', 1),
(58, '101292', 0x3a3a3100000000000000000000000000, '2018-10-04 09:31:04', '', 1),
(59, '102334', 0x3a3a3100000000000000000000000000, '2018-10-07 07:39:08', '07-10-2018 10:41:30 AM', 1),
(60, '101292', 0x3a3a3100000000000000000000000000, '2018-10-07 19:04:09', '07-10-2018 10:17:13 PM', 1),
(61, '101292', 0x3a3a3100000000000000000000000000, '2018-10-08 13:03:39', '', 1),
(62, '101292', 0x3a3a3100000000000000000000000000, '2018-10-16 14:43:01', '16-10-2018 05:43:49 PM', 1),
(63, '101292', 0x3a3a3100000000000000000000000000, '2018-10-17 10:24:48', '', 1),
(64, '101292', 0x3a3a3100000000000000000000000000, '2018-10-17 13:06:40', '17-10-2018 04:14:39 PM', 1),
(65, '101292', 0x3a3a3100000000000000000000000000, '2018-10-21 16:09:04', '', 1),
(66, '101292', 0x3a3a3100000000000000000000000000, '2018-10-22 12:22:42', '22-10-2018 03:26:55 PM', 1),
(67, '101292', 0x3a3a3100000000000000000000000000, '2018-10-22 12:40:15', '22-10-2018 04:36:36 PM', 1),
(68, '101366', 0x3a3a3100000000000000000000000000, '2018-10-22 13:36:45', '22-10-2018 04:39:05 PM', 1),
(69, '101366', 0x3a3a3100000000000000000000000000, '2018-10-22 13:39:15', '', 1),
(70, '101292', 0x3a3a3100000000000000000000000000, '2018-10-23 09:29:44', '', 1),
(71, '101292', 0x3a3a3100000000000000000000000000, '2018-10-24 10:57:45', '', 1),
(72, '102334', 0x3a3a3100000000000000000000000000, '2018-10-25 11:12:55', '25-10-2018 02:13:35 PM', 1),
(73, '102334', 0x3a3a3100000000000000000000000000, '2018-10-25 11:22:03', '25-10-2018 02:22:18 PM', 1),
(74, '101292', 0x3a3a3100000000000000000000000000, '2018-10-26 10:08:00', '26-10-2018 01:08:41 PM', 1),
(75, '101366', 0x3a3a3100000000000000000000000000, '2018-10-26 10:08:47', '26-10-2018 02:30:50 PM', 1),
(76, '101292', 0x3a3a3100000000000000000000000000, '2018-10-26 12:56:07', '', 1),
(77, '101292', 0x3a3a3100000000000000000000000000, '2018-10-26 16:13:01', '', 1),
(78, '101292', 0x3a3a3100000000000000000000000000, '2018-10-26 16:13:44', '26-10-2018 07:13:46 PM', 1),
(79, '101292', 0x3a3a3100000000000000000000000000, '2018-10-26 19:39:04', '', 1),
(80, '101292', 0x3a3a3100000000000000000000000000, '2018-10-26 19:47:38', '', 1),
(81, '101292', 0x3a3a3100000000000000000000000000, '2018-10-26 20:59:40', '', 1),
(82, '101292', 0x3a3a3100000000000000000000000000, '2018-10-27 05:58:59', '', 1),
(83, '101292', 0x3a3a3100000000000000000000000000, '2018-10-31 22:31:32', '', 1),
(84, '101292', 0x3a3a3100000000000000000000000000, '2018-11-01 14:32:22', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseunit`
--
ALTER TABLE `courseunit`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentRegno`);

--
-- Indexes for table `tblanswer`
--
ALTER TABLE `tblanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorenrolls`
--
ALTER TABLE `tutorenrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`TutorRegno`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `courseunit`
--
ALTER TABLE `courseunit`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblanswer`
--
ALTER TABLE `tblanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutorenrolls`
--
ALTER TABLE `tutorenrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
