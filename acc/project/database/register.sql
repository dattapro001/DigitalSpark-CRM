-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 05:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `active_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `image`, `unique_id`, `email`, `code`, `password`, `role`, `active_status`) VALUES
(1, 'Admin Panel', 'admin-pofile.jpg\r\n', 2001200120, 'admin01@gmail.com', '', 'Admin01@', 'admin', 'typically replies within an hour ');

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `function` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`id`, `name`, `date`, `email`, `reason`, `status`, `function`) VALUES
(12, 'snigdha Dev', '2023-12-07', 'snigdhadev031@gmail.com', 'Failure to Keep Software Updated:Neglecting to update and maintain developed software, leading to compatibility issues.', 'ban', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `phone`, `message`) VALUES
(2, 'Chinmoy Datta Priom', 'dattapro001@gmail.com', 'Facing some problem in this website', '01758506585', 'messagemessagemessagemessagemessagemessagemessagemessagemessagemessage'),
(3, 'Mugdho datta', 'rontheboss00797@gmail.com', 'Facing some problem in this website', '', 'Your professional bio is not only relevant when applying for jobs, seeking new clients, or networking — it also gives the world a brief snapshot of who you are and your professional ideals.'),
(4, 'Mugdho datta', 'rontheboss00797@gmail.com', 'Facing some problem in this website', '', 'Your professional bio is not only relevant when applying for jobs, seeking new clients, or networking — it also gives the world a brief snapshot of who you are and your professional ideals.');

-- --------------------------------------------------------

--
-- Table structure for table `crm_wallet`
--

CREATE TABLE `crm_wallet` (
  `id` int(20) NOT NULL,
  `number` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `unique_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crm_wallet`
--

INSERT INTO `crm_wallet` (`id`, `number`, `amount`, `password`, `unique_id`) VALUES
(2, '878 098 347 697', 320, '', 1081370095),
(3, '415 099 347 519', 0, '', 1041879458),
(4, '524 460 624 389', 0, '', 698914873);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `active_status` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `suspend_date` date NOT NULL,
  `code` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `hobby1` varchar(200) NOT NULL,
  `hobby2` varchar(200) NOT NULL,
  `hobby3` varchar(200) NOT NULL,
  `join_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `bio`, `email`, `password`, `unique_id`, `active_status`, `status`, `suspend_date`, `code`, `image`, `cover`, `phone`, `country`, `profession`, `hobby1`, `hobby2`, `hobby3`, `join_date`) VALUES
(20, 'Mugdho Datta Tiyash', '', 'dattapro001@gmail.com', 'Mug10@', 197501281, 'Offline', '', '0000-00-00', '', 'mug.jpg', '', '', '', '', '', '', '', '2023-11-29'),
(30, 'mugdho datta', '', 'dattapro002@gmail.com', 'Mug10@', 698914873, 'Offline', '', '0000-00-00', '', 'profile-10.jpg', '', '', '', '', '', '', '', '2023-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `d_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `active_status` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `suspend_date` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `d_bio` varchar(1000) NOT NULL,
  `d_code` varchar(100) NOT NULL,
  `d_pass` varchar(100) NOT NULL,
  `d_mobile` varchar(100) NOT NULL,
  `d_country` varchar(100) NOT NULL,
  `d_skill` varchar(100) NOT NULL,
  `d_profile` varchar(100) NOT NULL,
  `d_cover` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`d_id`, `name`, `unique_id`, `active_status`, `status`, `suspend_date`, `email`, `d_bio`, `d_code`, `d_pass`, `d_mobile`, `d_country`, `d_skill`, `d_profile`, `d_cover`, `date`) VALUES
(1, 'Mugdho Datta Tiyash', 1122222222, 'Offline', '', '0000-00-00', 'dattapro002@gmail.com', '', '', 'Mug08@', '01758506585', 'Bangladesh', 'Front-end developer', 'mug.jpg', '', '2023-09-13'),
(2, 'Chinmoy Datta Priom', 1111111111, 'Active ', 'suspend', '2023-12-27', 'rontheboss00797@gmail.com', 'The goal of your resume is to sell you enough to get a recruiter phone call and continue the process. This is a very different goal from telling your entire professional story. Your goal should be to showcase to the company why you’re a good fit for the position they are recruiting for.', '', 'Mug09@', '+8801758506585', 'Australia', 'full Steck Developer', 'mug.jpg', 'user2.jpg', '2023-11-30'),
(3, 'Saurov Karmokar', 1638463793, 'Offline', '', '0000-00-00', 'dattapro001@gmail.com', '', '', 'Mug10@', '', '', 'Logo Designer', 'profile-3.jpg', '', '2023-08-11'),
(4, 'snigdha Dev', 1627819524, 'Offline', '', '0000-00-00', 'snigdhadev031@gmail.com', '', '', 'Mug10@', '', '', 'App Developer', 'profile-6.jpg', '', '2023-12-02'),
(5, 'Shahariar Manna', 1627103596, 'Offline', '', '0000-00-00', 'apurborshi@gmail.com', '', '', 'Mug10@', '', '', 'SEO Expert', 'profile-11.jpg', '', '2023-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(212, 2001200120, 197501281, 'now it is working'),
(213, 2001200120, 1081370095, 'hayre kopal'),
(214, 2001200120, 1081370095, 'bujram na kuntha'),
(215, 2001200120, 1081370095, 'bujram na kuntha'),
(216, 2001200120, 1081370095, 'bujram na kuntha'),
(217, 2001200120, 1111111111, 'working .'),
(218, 2001200120, 1111111111, 'then'),
(219, 1081370095, 2001200120, 'from client panel'),
(220, 2001200120, 698914873, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `pay_info`
--

CREATE TABLE `pay_info` (
  `name` varchar(255) NOT NULL,
  `id` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal` int(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `unique_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_info`
--

INSERT INTO `pay_info` (`name`, `id`, `country`, `address`, `postal`, `city`, `email`, `unique_id`) VALUES
('chinmoy datta', 9, 'Bangladesh', 'murila nathpara 201 villa', 2001, 'sylhet', 'dattapro002@gmail.com', 1081370095),
('mugdho datta', 10, '', '', 0, '', '', 1041879458),
('mugdho datta', 11, '', '', 0, '', '', 698914873);

-- --------------------------------------------------------

--
-- Table structure for table `suspend`
--

CREATE TABLE `suspend` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `suspend_date` date NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `function` text NOT NULL,
  `unique_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suspend`
--

INSERT INTO `suspend` (`id`, `name`, `email`, `reason`, `suspend_date`, `date`, `status`, `function`, `unique_id`) VALUES
(32, 'Chinmoy Datta Priom', 'rontheboss00797@gmail.com', 'Inadequate Documentation:Failure to provide accurate and comprehensive documentation for the developed applications.', '2023-12-27', '2023-12-08', 'suspend', 'developer', 1111111111);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(20) NOT NULL,
  `number` varchar(255) NOT NULL,
  `crm_number` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `number`, `crm_number`, `amount`, `first_name`, `last_name`) VALUES
(6, '232134234', '878 098 347 697', '38', 'sfsf', 'sfsfsf'),
(7, '23232323', '878 098 347 697', '50', 'datta', 'priom');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(2, 1347568372, 'mugdho', 'datta', 'dattapro002@gmail.com', '90961ff99097fd7e6b15f9eb4ec98ec6', '1699343229mugdho.jpeg', 'Offline now'),
(4, 1495562185, 'snigdha', 'Dev', 'snigdhadev031@gmail.com', '90961ff99097fd7e6b15f9eb4ec98ec6', '1699790596saurov.jpeg', 'Offline now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_wallet`
--
ALTER TABLE `crm_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `pay_info`
--
ALTER TABLE `pay_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspend`
--
ALTER TABLE `suspend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crm_wallet`
--
ALTER TABLE `crm_wallet`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `d_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `pay_info`
--
ALTER TABLE `pay_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suspend`
--
ALTER TABLE `suspend`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
