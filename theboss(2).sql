-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 06:26 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theboss`
--

-- --------------------------------------------------------

--
-- Table structure for table `department_files`
--

CREATE TABLE `department_files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `file_path` text NOT NULL,
  `assign_to` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_files`
--

INSERT INTO `department_files` (`id`, `user_id`, `file_name`, `file_type`, `parent_id`, `file_path`, `assign_to`) VALUES
(1, 1, 'test', 1, 1, 'department_files/operations', ''),
(2, 1, 'ab.jpg', 1, 1, 'department_files/operations/test', 'all'),
(3, 1, 'test Another', 1, 1, 'department_files/operations', ''),
(4, 1, 'mine test', 1, 1, 'department_files/operations', ''),
(5, 1, 'good', 1, 1, 'department_files/operations', ''),
(6, 1, 'si3.jpg', 1, 1, 'department_files/operations/good', 'all'),
(7, 1, 'te.jpg', 1, 1, 'department_files/operations/good', 'all'),
(8, 1, 'te1.jpg', 1, 1, 'department_files/operations/good', 'all'),
(9, 1, 'te2.jpg', 1, 1, 'department_files/operations/good', 'all'),
(10, 1, 'te3.jpg', 1, 1, 'department_files/operations/good', 'all'),
(11, 1, 'mine test', 1, 1, 'department_files/operations', '');

-- --------------------------------------------------------

--
-- Table structure for table `dept_cat`
--

CREATE TABLE `dept_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `folder_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_cat`
--

INSERT INTO `dept_cat` (`id`, `name`, `folder_name`) VALUES
(1, 'Operations', 'operations'),
(2, 'Human Resources', 'human-resources'),
(3, 'Bonus and Commissions', 'bonus-and-commissions');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `location` text NOT NULL,
  `office` varchar(200) NOT NULL,
  `fax` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `title`, `location`, `office`, `fax`, `latitude`, `longitude`, `created_by`) VALUES
(1, 'Corporate Headquarters', ' 7074 N.W. 77th Court\r\n  Miami. Florida 33166\r\n  Office: 305.974.1850\r\n  Fax: 305.402.0522', '', '', '', '', 1),
(2, 'Miami, Florida Branch', '7074 N.W. 77 Court\r\n  Miami. Florida 33166', '305.974.1850', '305.402.0522', '25.837684', '-80.322537', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `news_type` int(11) NOT NULL,
  `summary` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `news_type`, `summary`, `created_by`, `created_on`, `status`, `view_count`) VALUES
(1, 'Welcome to the B.O.S.S.', 1, 'Welcome to the B.O.S.S.\r\n\r\nI certainly hope you will find this site useful.', 1, '2016-11-19 01:36:00', 1, 15),
(2, 'Community Test', 2, 'Community Test', 1, '2016-11-19 10:11:23', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_attachments`
--

CREATE TABLE `news_attachments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL COMMENT 'from news table id',
  `attachment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quick_link`
--

CREATE TABLE `quick_link` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `window_open` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quick_link`
--

INSERT INTO `quick_link` (`id`, `name`, `link`, `window_open`) VALUES
(1, 'Enter Your Hours', 'https://staffingspecifix.tsheets.com/page/login', '_blank'),
(2, 'View Your Paystub(s)', 'https://www.epaystubaccess.com/acctmgr.asp?pgid=browser&mdid=scr1&verid=eng', '_blank');

-- --------------------------------------------------------

--
-- Table structure for table `related_content`
--

CREATE TABLE `related_content` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `related_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `language` varchar(200) DEFAULT NULL,
  `about_me` text,
  `my_blog` varchar(255) DEFAULT NULL,
  `my_website` varchar(255) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `skype` varchar(200) DEFAULT NULL,
  `hangout` varchar(200) DEFAULT NULL,
  `msn` varchar(200) DEFAULT NULL,
  `yahoo_chat` varchar(200) DEFAULT NULL,
  `skype_business` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `google` varchar(200) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `title`, `email`, `mobile_no`, `dob`, `gender`, `language`, `about_me`, `my_blog`, `my_website`, `photo`, `skype`, `hangout`, `msn`, `yahoo_chat`, `skype_business`, `linkedin`, `facebook`, `twitter`, `google`, `user_id`) VALUES
(1, 'Alex', 'Fernandez', 'fff', 'afernandez@staffingspecifix.com', '9626662364', '1986-11-11', 1, '', 'fff', '0', '0', '1480790261.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Janet ', 'Lopez', '', 'jlopez@staffingspecifix.com', '9626662364', '1984-12-12', 1, '', 'ffff', '0', '0', NULL, '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `d_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(3) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `d_name`, `email`, `password`, `user_type`, `status`, `created_on`, `modified_on`) VALUES
(1, 'Alex Fernandez', 'afernandez@staffingspecifix.com', 'e6e061838856bf47e1de730719fb2609', 1, 'Active', '2016-11-17 00:28:54', NULL),
(2, 'Janet Lopez', 'jlopez@staffingspecifix.com', '04f2673f7fe99c9b60d3ecd200433e02', 2, 'Active', '2016-11-24 01:43:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `viewed_link` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `viewed_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `title`, `viewed_link`, `description`, `viewed_on`) VALUES
(2, 1, 'View CEO Message - Welcome to the B.O.S.S.', '0', 'View CEO Message - Welcome to the B.O.S.S.', '2016-12-03 19:55:41'),
(3, 1, 'View CEO Message - Welcome to the B.O.S.S.', 'http://localhost/theboss/news/view/1/1', 'View CEO Message - Welcome to the B.O.S.S.', '2016-12-03 19:56:19'),
(4, 1, 'View CEO Message - Welcome to the B.O.S.S.', 'http://localhost/theboss/news/view/1/1', 'View CEO Message - Welcome to the B.O.S.S.', '2016-12-03 20:01:15'),
(5, 1, 'View CEO Message - Welcome to the B.O.S.S.', 'http://localhost/theboss/news/view/1/1', 'View CEO Message - Welcome to the B.O.S.S.', '2016-12-03 20:01:40'),
(6, 1, 'View CEO Message - Welcome to the B.O.S.S.', 'http://localhost/theboss/news/view/1/1', 'View CEO Message - Welcome to the B.O.S.S.', '2016-12-03 20:01:59'),
(7, 1, 'View CEO Message - Welcome to the B.O.S.S.', 'http://localhost/theboss/news/view/1/1', 'View CEO Message - Welcome to the B.O.S.S.', '2016-12-03 20:06:38'),
(8, 1, 'View CEO Message - Welcome to the B.O.S.S.', 'http://localhost/theboss/news/view/1/1', 'View CEO Message - Welcome to the B.O.S.S.', '2016-12-03 20:07:15'),
(9, 1, 'View CEO Message - Welcome to the B.O.S.S.', 'http://localhost/theboss/news/view/1/1', 'View CEO Message - Welcome to the B.O.S.S.', '2016-12-03 20:11:42'),
(10, 1, 'View CEO Message - Welcome to the B.O.S.S.', 'http://localhost/theboss/news/view/1/1', 'View CEO Message - Welcome to the B.O.S.S.', '2016-12-03 20:12:06'),
(11, 1, 'View CEO Message - Welcome to the B.O.S.S.', 'http://localhost/theboss/news/view/1/1', 'View CEO Message - Welcome to the B.O.S.S.', '2016-12-03 20:12:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_files`
--
ALTER TABLE `department_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_cat`
--
ALTER TABLE `dept_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_attachments`
--
ALTER TABLE `news_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick_link`
--
ALTER TABLE `quick_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_content`
--
ALTER TABLE `related_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department_files`
--
ALTER TABLE `department_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dept_cat`
--
ALTER TABLE `dept_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news_attachments`
--
ALTER TABLE `news_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quick_link`
--
ALTER TABLE `quick_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `related_content`
--
ALTER TABLE `related_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
