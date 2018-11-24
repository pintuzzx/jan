-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2018 at 07:05 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enam_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_master`
--

CREATE TABLE `account_master` (
  `a_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL DEFAULT '1',
  `account_type` int(11) NOT NULL,
  `u_account_id` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_master`
--

INSERT INTO `account_master` (`a_id`, `user_id`, `branch_id`, `account_type`, `u_account_id`, `created_at`, `amount`, `status`) VALUES
(1, 1, 1, 1, '01010001000001', '2018-11-13 00:00:00', 200.00, 0),
(2, 1, 1, 1, '01010001000001', '2019-11-13 00:00:00', 100.00, 1),
(3, 1, 1, 55, '55010001000001', '2019-11-13 00:00:00', NULL, 1),
(4, 1, 1, 2, '02010001000001', '2019-11-13 00:00:00', 100000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_type_master`
--

CREATE TABLE `account_type_master` (
  `a_id` int(11) NOT NULL,
  `ac_type` varchar(100) NOT NULL,
  `ac_code` int(11) NOT NULL,
  `lock_period` float(10,2) NOT NULL,
  `rate` float(10,2) NOT NULL,
  `s_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type_master`
--

INSERT INTO `account_type_master` (`a_id`, `ac_type`, `ac_code`, `lock_period`, `rate`, `s_id`, `status`) VALUES
(1, 'janmit_common', 1, 0.00, 0.00, 1, 1),
(2, 'janmit_saving', 55, 0.00, 0.00, 1, 1),
(3, 'janmit_fund', 2, 3.00, 7.50, 1, 1),
(4, 'janmit_plus', 4, 5.00, 8.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `b_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `update_at` datetime NOT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`b_id`, `name`, `address`, `contact_no`, `created_at`, `created_by`, `update_at`, `updated_by`, `status`) VALUES
(1, 'Bhilai', 'model towwn bhilai', '9999999991,2323232323', '2018-11-04 03:10:14', 1, '2018-11-04 09:14:27', 1, 1),
(2, 'durg', 'ganjpara', '890', '2018-11-04 08:57:15', 1, '2018-11-04 09:10:53', 1, 1),
(3, 'nehru nagar', 'nehru nagar east', '9989898980', '2018-11-04 08:59:48', 1, '0000-00-00 00:00:00', NULL, 0),
(4, 'nehru nagar', 'nehru nagar east', '9989898980', '2018-11-04 09:00:15', 1, '0000-00-00 00:00:00', NULL, 1),
(5, 'asd', 'asdasd', 'asd', '2018-11-04 09:01:11', 1, '0000-00-00 00:00:00', NULL, 0),
(6, 'nano', 'asd', 'asda', '2018-11-04 09:01:36', 1, '2018-11-04 09:32:20', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'employee', 'janmit employee');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '47.247.86.146', 'admin@admin.com', 1542192404);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `s_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`s_id`, `name`, `status`) VALUES
(1, '2018-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `t_id` int(11) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `mode` enum('cash','cheque') NOT NULL,
  `crdr_mode` enum('credit','debit') NOT NULL,
  `amount` double(11,3) NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `branch_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`t_id`, `account_no`, `detail`, `mode`, `crdr_mode`, `amount`, `created_by`, `created_at`, `status`, `branch_id`) VALUES
(1, '55010001000001', 'self', 'cash', 'credit', 1010.000, 1, '2018-11-11 00:00:00', 1, 1),
(2, '01010001000001', 'self', 'cash', 'credit', 200.000, 1, '2018-11-11 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `branch_id` int(11) DEFAULT '1',
  `phone` varchar(20) DEFAULT NULL,
  `dob` date NOT NULL,
  `cast` enum('gen','obc','st','sc') NOT NULL DEFAULT 'gen',
  `nominee` varchar(100) NOT NULL,
  `nominee_relation` varchar(100) NOT NULL,
  `nominee_age` int(11) NOT NULL,
  `nominee_joined` tinyint(1) NOT NULL DEFAULT '0',
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `work_type` enum('job','business','house_wife','farmer','gov_employee','other') NOT NULL,
  `work_address` text NOT NULL,
  `work_contact` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `sign` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `company` varchar(40) NOT NULL,
  `address` varchar(60) NOT NULL,
  `father_husband` enum('father','husband') DEFAULT 'father',
  `father_husband_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `branch_id`, `phone`, `dob`, `cast`, `nominee`, `nominee_relation`, `nominee_age`, `nominee_joined`, `father_name`, `mother_name`, `work_type`, `work_address`, `work_contact`, `photo`, `sign`, `gender`, `company`, `address`, `father_husband`, `father_husband_name`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1542192455, 1, 'Admin', 'istrator', NULL, '0', '0000-00-00', 'gen', '', '', 0, 0, '', '', 'job', '', '', '', '', '', '', '', 'father', ''),
(2, '127.0.0.1', 'rahul', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'rahul@gmail.com', '', NULL, NULL, NULL, 1268889823, 1540707715, 1, 'rahul', 'sinha', 1, '0', '0000-00-00', 'gen', '', '', 0, 0, '', '', 'job', '', '', '', '', '', '', '', 'father', ''),
(3, '', 'rahulsinha', '', NULL, 'rahul@gmail.com', NULL, NULL, NULL, NULL, 1231243, NULL, 1, 'rahul', 'sinha', 1, '9770866241', '2018-11-02', 'gen', 'pankaj', 'friend', 23, 1, '', '', 'job', 'Colony, Rawatbhata', '9770866241', '', '', 'm', '', '', 'father', 'kl sinha'),
(7, '::1', 'nehasharma', '$2y$08$.94Sh6Dws4oxne2sgTb92OwXNWbGlAel64OU1zk8BfKvJ6SZZoO5i', NULL, 'neha@gmail.com', NULL, NULL, NULL, NULL, 1541925894, NULL, 1, 'neha', 'sharma', 2, '9770866241', '2018-11-02', 'st', 'pankaj kumar', 'brother', 12, 0, '', '', 'other', 'flat-22\nbhangel', '9770866241', '7_mem.png', '7_sign.png', 'f', 'janmit', '', 'father', 'vivek sharma');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 7, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_master`
--
ALTER TABLE `account_master`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `account_type` (`account_type`);

--
-- Indexes for table `account_type_master`
--
ALTER TABLE `account_type_master`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `account_no` (`account_no`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_master`
--
ALTER TABLE `account_master`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `account_type_master`
--
ALTER TABLE `account_type_master`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_master`
--
ALTER TABLE `account_master`
  ADD CONSTRAINT `account_master_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_type_master`
--
ALTER TABLE `account_type_master`
  ADD CONSTRAINT `account_type_master_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `session` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
