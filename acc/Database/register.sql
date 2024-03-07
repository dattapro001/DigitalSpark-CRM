-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 04:47 PM
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
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `client_id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id`, `name`, `client_id`, `project_id`) VALUES
(7, 'Email Marketing', 698914873, 2229);

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

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `project_name` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `end` date NOT NULL,
  `wallet` text NOT NULL,
  `amount` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `project_name`, `project_id`, `end`, `wallet`, `amount`, `client_id`) VALUES
(1, 'Web Development', 2224, '2024-01-05', '245 632 638 894', 390, 231567348),
(2, 'Pay Per Click', 2226, '2024-01-07', '453 562 785 334', 120, 125437845),
(3, 'Social Media Marketing', 2227, '2024-02-05', '231 657 349 427', 145, 231784570),
(4, 'Content Marketing', 2228, '2024-01-02', '567 349 204 153', 578, 154678935),
(5, 'Search Engine Optimization', 2225, '2024-02-01', '748 923 451 648', 476, 176235890),
(6, 'Email Marketing', 2229, '2024-02-04', '290 451 648 224', 178, 612349032),
(7, 'Web Development', 2224, '2024-01-06', '452 892 314 639', 208, 712395430),
(8, 'Social Media Marketing', 2227, '2024-01-17', '783 253 860 358', 222, 341578396),
(9, 'Email Marketing', 2229, '2024-01-06', '672 341 893 460', 245, 213493480),
(10, 'Content Marketing', 2228, '2024-01-17', '189 342 672 803', 222, 128934287),
(11, 'Web Development', 2224, '2024-01-25', '435 693 105 438', 110, 145267396),
(12, 'Content Marketing', 2228, '2024-02-03', '235 739 450 839', 133, 231579540),
(13, 'Social Media Marketing', 2227, '2024-02-07', '234 567 239 157', 380, 213493481),
(14, 'Email Marketing', 2229, '2024-01-30', '345 672 349 703', 203, 231456923),
(15, 'Social Media Marketing', 2227, '2024-01-22', '324 563 489 034', 134, 234516781),
(17, 'Pay Per Click', 2226, '2024-01-16', '453 763 984 358', 240, 431287904),
(18, 'Content Marketing', 2228, '2024-02-06', '342 765 892 345', 880, 143278945),
(19, 'Content Marketing', 2228, '2024-02-02', '235 628 693 408', 100, 134256378),
(20, 'Email Marketing', 2229, '2024-03-21', '698 709 337 885', 123, 1475496409);

-- --------------------------------------------------------

--
-- Table structure for table `chat-bg`
--

CREATE TABLE `chat-bg` (
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat-bg`
--

INSERT INTO `chat-bg` (`id`, `image`) VALUES
(1, 'chat-5');

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
(3, 'Mugdho datta', 'rontheboss00797@gmail.com', 'Facing some problem in this website', '', 'Your professional bio is not only relevant when applying for jobs, seeking new clients, or networking — it also gives the world a brief snapshot of who you are and your professional ideals.'),
(5, 'Snigdha  Dev', 'snighdhadev031@gmail.com', 'Facing Problem while ordering', '01778672595', 'I hope this message finds you well. I am currently facing some challenges while trying to place an order on your platform. Despite my attempts, the system seems to be presenting errors, making it difficult for me to complete the transaction.');

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
(4, '524 460 624 389', 820, '1234', 698914873),
(18, '698 709 337 885', 846, '1234', 1475496409),
(19, '925 118 272 659', 0, '6973', 1514683350),
(20, '352 567 389 234', 0, '1234', 197501281);

-- --------------------------------------------------------

--
-- Table structure for table `c_marketing`
--

CREATE TABLE `c_marketing` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `des_1` text NOT NULL,
  `des_2` text NOT NULL,
  `des_3` text NOT NULL,
  `des_4` text NOT NULL,
  `des_5` text NOT NULL,
  `des_6` text NOT NULL,
  `des_7` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_marketing`
--

INSERT INTO `c_marketing` (`id`, `name`, `bio`, `image`, `unique_id`, `amount`, `des_1`, `des_2`, `des_3`, `des_4`, `des_5`, `des_6`, `des_7`) VALUES
(1, 'Content Marketing', 'Master storyteller shaping content landscapes with compelling narratives. Wordsmith at heart.\r\n\r\n', 'content-bg.svg', 2228, 115, 'Define goals audience and core messaging.,\r\n', 'Schedule topics formats and distribution channels.,\r\n', 'Develop engaging and informative articles videos etc.,\r\n', 'Optimize content for search engine visibility.,\r\n', 'Plan how and where to share content effectively.,\r\n', 'Encourage comments shares and feedback.,\r\n', 'Monitor metrics to refine future content strategies.\r\n\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `bio` text NOT NULL,
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
  `interest1` varchar(200) NOT NULL,
  `interest2` varchar(200) NOT NULL,
  `interest3` varchar(200) NOT NULL,
  `join_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `bio`, `email`, `password`, `unique_id`, `active_status`, `status`, `suspend_date`, `code`, `image`, `cover`, `phone`, `country`, `profession`, `interest1`, `interest2`, `interest3`, `join_date`) VALUES
(20, 'Mugdho Datta Tiyash', '', 'dattapro001@gmail.com', 'Mug10@', 197501281, 'Offline', '', '0000-00-00', '', 'mug.jpg', '', '', '', '', '', '', '', '2023-11-29'),
(30, 'mugdho datta', 'Hello! I\'m Mugdho Datta, a passionate and dedicated development based in Sylhet,Bangladesh. With a background in Web development,Logo aNd Graphics Design, I thrive on [Describe what excites or motivates you in your field].', 'dattapro002@gmail.com', 'Mug09@', 698914873, 'Offline', '', '0000-00-00', '', 'profile-3.jpg', '', '01772612825', 'Bangladesh', 'Graphics Designer', 'Logo Designing', 'Web Development & Coding', 'Gaming & Gardaning', '2023-12-07'),
(32, 'snigdha Dev', '', 'snigdhadev031@gmail.com', 'Mug10@', 331574340, 'Active', '', '0000-00-00', '', 'snigdha.jpeg', '', '', '', '', '', '', '', '2024-03-02'),
(44, 'Mugdho Retiano', '', 'mugdha.syl48@gmail.com', 'Mug10@', 1475496409, 'Offline', '', '0000-00-00', '', 'profile-9.jpg', '', '', '', '', '', '', '', '2024-03-02');

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
  `skill_1` text NOT NULL,
  `skill_2` text NOT NULL,
  `skill_3` text NOT NULL,
  `skill_4` text NOT NULL,
  `d_profile` varchar(100) NOT NULL,
  `d_cover` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`d_id`, `name`, `unique_id`, `active_status`, `status`, `suspend_date`, `email`, `d_bio`, `d_code`, `d_pass`, `d_mobile`, `d_country`, `d_skill`, `skill_1`, `skill_2`, `skill_3`, `skill_4`, `d_profile`, `d_cover`, `date`) VALUES
(1, 'Tiyash Martin', 1122222222, 'Offline', '', '0000-00-00', 'TiyashFork23@gmail.com', 'Beyond the screen, this developer is an avid advocate for best practices in software development, ensuring robust and scalable applications. Whether optimizing performance, debugging intricacies, or staying abreast of the latest industry trends, they are dedicated to delivering high-quality software that stands the test of time.', '', 'Mug08@', '01758506585', 'Bangladesh', 'Front-end developer', 'Software Architecture and Design:\r\nLeveraging my expertise in software architecture, I design scalable and efficient solutions that form the backbone of robust applications.', 'Cutting-Edge Technologies:\r\nKeeping pace with the latest in technology, I explore and implement innovative tools and frameworks to ensure our projects stay ahead in the dynamic tech landscape.', 'Full-Stack Development:\r\nProficient in both front-end and back-end technologies, I bring ideas to life by seamlessly integrating user interfaces with powerful server-side functionalities.', 'Agile Methodologies:\r\nProficient in Agile methodologies, I adapt quickly to changing project requirements, ensuring flexibility and responsiveness in our development processes.', 'mug.jpg', '', '2023-09-13'),
(2, 'Fenon Kristin', 1111111111, 'Active ', '', '0000-00-00', 'kristinDark03@gmail.com', 'The goal of your resume is to sell you enough to get a recruiter phone call and continue the process. This is a very different goal from telling your entire professional story. Your goal should be to showcase to the company why you’re a good fit for the position they are recruiting for.', '', 'Mug10@', '+8801758506585', 'Australia', 'full Steck Developer', '', '', '', '', 'profile-7.jpg', 'user2.jpg', '2023-11-30'),
(3, 'Hridyanshu Younag\r\n', 1638463793, 'Offline', '', '0000-00-00', 'Younag56@gmail.com', '', '', 'Mug10@', '', '', 'Logo Designer', '', '', '', '', 'profile-3.jpg', '', '2023-08-11'),
(4, 'Rupsha Roy', 1627819524, 'Offline', '', '0000-00-00', 'royrupsha@gmail.com', '', '', 'Mug10@', '', '', 'App Developer', '', '', '', '', 'rupsha.jpeg', '', '2023-12-02'),
(5, 'Shahariar Manna', 1627103596, 'Active', 'suspend', '2024-03-07', 'apurborshi@gmail.com', '', '', 'Mug10@', '', '', 'SEO Expert', '', '', '', '', 'profile-11.jpg', '', '2023-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `e_marketing`
--

CREATE TABLE `e_marketing` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `des_1` text NOT NULL,
  `des_2` text NOT NULL,
  `des_3` text NOT NULL,
  `des_4` text NOT NULL,
  `des_5` text NOT NULL,
  `des_6` text NOT NULL,
  `des_7` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_marketing`
--

INSERT INTO `e_marketing` (`id`, `name`, `bio`, `image`, `unique_id`, `amount`, `des_1`, `des_2`, `des_3`, `des_4`, `des_5`, `des_6`, `des_7`) VALUES
(1, 'Email Marketing', 'Strategic email architect shaping compelling campaigns for targeted engagement and conversions.\r\n\r\n', 'email-bg.svg', 2229, 130, 'Define the purpose and expected outcomes of campaigns.,\r\n', 'Divide the audience for personalized content delivery.,\r\n', 'Craft engaging and persuasive email content.,\r\n', 'Ensure visually appealing and mobile-responsive emails.,\r\n', 'Set up automated workflows for targeted messaging.,\r\n', 'Test variations to improve open and click-through rates.,\r\n', 'Monitor metrics for insights and campaign refinement.\r\n\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `manager_name` varchar(255) NOT NULL,
  `dev_name` varchar(255) NOT NULL,
  `manager_id` int(255) NOT NULL,
  `dev_id` int(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `dev1_name` varchar(255) NOT NULL,
  `dev1_id` int(255) NOT NULL,
  `dev2_name` varchar(255) NOT NULL,
  `dev2_id` int(255) NOT NULL,
  `dev3_name` varchar(255) NOT NULL,
  `dev3_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dev_email` varchar(255) NOT NULL,
  `file` longtext NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `type`, `manager_name`, `dev_name`, `manager_id`, `dev_id`, `project_name`, `project_id`, `dev1_name`, `dev1_id`, `dev2_name`, `dev2_id`, `dev3_name`, `dev3_id`, `email`, `dev_email`, `file`, `details`) VALUES
(8, 'manager', 'Chinmoy Datta Priom', '', 1122222222, 0, 'Social Media Marketing', 2227, 'Chinmoy Datta Priom', 1111111111, 'Saurov Karmokar', 1638463793, 'Shahariar Manna', 1627103596, 'manager001@gmail.com', '', 'fpdf186.zip', 'dfsfsfsfsfwfsfsfsfsfwsf sfwsefesf sfs wfsf'),
(16, 'manager', 'Chinmoy Datta Priom', '', 1010101012, 0, 'Web Development', 2224, 'Chinmoy Datta Priom', 1122222222, 'Saurov Karmokar', 1638463793, 'Shahariar Manna', 1627103596, 'manager001@gmail.com', '', 'demooo.pdf', 'The inclusion of databases in Level 1 DFDs allows for a more detailed understanding of how data is processed and stored within the system. The specific components and details in the diagram will vary based on the characteristics and requirements of the system being represented.');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `active_status` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `skill` text NOT NULL,
  `skill_1` text NOT NULL,
  `skill_2` text NOT NULL,
  `skill_3` text NOT NULL,
  `skill_4` text NOT NULL,
  `experience` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `email`, `password`, `unique_id`, `active_status`, `profile`, `bio`, `skill`, `skill_1`, `skill_2`, `skill_3`, `skill_4`, `experience`) VALUES
(1, 'Chinmoy Datta Priom', 'manager001@gmail.com', 'Mug10@', 1010101012, 'Offline', 'man-1.jpeg', 'John Smith is an accomplished and results-driven manager with over a decade of experience in strategic leadership and team management. His exceptional organizational skills and keen business acumen have consistently contributed to the success of the teams he oversees. Known for his effective communication and problem-solving abilities, John has a proven track record of delivering projects on time and within budget.', 'Change Management: Experience in guiding teams through periods of change, whether it be organizational restructuring, process improvements, or shifts in company culture.\r\n\r\nPerformance Management: Track record of evaluating and improving team performance through goal setting, regular feedback, and addressing performance issues when necessary.', 'Leadership: Managers should inspire, motivate, and guide their teams toward common goals. Strong leadership involves setting a vision, making decisions, and fostering a positive and productive work environment.', 'Problem Solving: Managers encounter various challenges, and the ability to analyze situations, identify solutions, and make informed decisions is vital for success.', 'Communication: Clear and effective communication is crucial for conveying expectations, providing feedback, and maintaining transparency within the team. Managers must excel in both verbal and written communication.', 'Decision Making: Managers are often required to make timely and well-informed decisions. This involves weighing pros and cons, considering potential outcomes, and choosing the best course of action.', 'Team Leadership: Experience in leading and managing teams, including setting goals, assigning tasks, and overseeing day-to-day operations.\r\n\r\nProject Management: Hands-on experience in planning, executing, and monitoring projects to ensure they are completed on time, within budget, and meet quality standards.\r\n\r\nDecision-Making: Demonstrated history of making sound and timely decisions in various situations, considering the impact on the team and the organization.'),
(2, 'Tiyash Datta', 'manager002@gmail.com', 'Man10@', 1324523671, 'Offline', 'man-2.jpeg', '', '', '', '', '', '', ''),
(3, 'Saurov Karmokar', 'manager003@gmail.com', 'Mug10@', 1314274782, 'Active', 'man-3.jpg', '', '', '', '', '', '', ''),
(4, 'Manna Shahariar', 'manager004@gmail.com', 'Mug10@', 1536781954, 'Offline', 'man-4.jpg', '', '', '', '', '', '', ''),
(5, 'Diago Berlin', 'manager005@gmail.com', 'Mug10@', 1837254965, 'Offline', 'man-5.jpeg', '', '', '', '', '', '', '');

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
(222, 698914873, 2001200120, 'from admin panel'),
(223, 2001200120, 698914873, 'from client panel'),
(224, 698914873, 2001200120, 'again admin panel'),
(225, 1627103596, 2001200120, 'from admin panel dev'),
(226, 1122222222, 1627103596, 'form dev profile to manager '),
(227, 2001200120, 1627103596, 'i am from dev panel manna'),
(228, 1627103596, 2001200120, 'ok then its working perfectly '),
(229, 1122222222, 2001200120, 'from admin panel to manager'),
(230, 2001200120, 1122222222, 'i am from manager panel'),
(231, 1122222222, 2001200120, 'ok then look like its working'),
(238, 1111111111, 1122222222, 'dgh'),
(239, 2001200120, 1122222222, 'asas'),
(244, 2001200120, 1122222222, 'ok'),
(246, 1010101012, 1122222222, 'from dev to manager'),
(249, 2001200120, 1010101012, 'hi'),
(250, 2001200120, 1010101012, 'what are you doing now?'),
(251, 1010101012, 2001200120, 'nothing special'),
(252, 2001200120, 1122222222, 'hello'),
(253, 1536781954, 2001200120, 'the developer facing some problem'),
(254, 1627819524, 2001200120, 'correction should be done with in 2 days'),
(255, 331574340, 2001200120, 'yes, mem how can i help you?'),
(256, 2001200120, 1010101012, 'lets meet today'),
(257, 1010101012, 2001200120, 'here and when?'),
(258, 2001200120, 1010101012, 'in evening 4 pm?'),
(259, 1010101012, 2001200120, 'ok'),
(260, 2001200120, 1627819524, 'but sir i need more time at least 1 week'),
(261, 1627819524, 2001200120, 'ok then find a new job'),
(262, 197501281, 2001200120, 'good finish this as soon as possible'),
(263, 1010101012, 1627819524, 'sir admin doesn\'t understand my problem'),
(264, 1627819524, 1010101012, 'what happened?'),
(265, 1010101012, 1627819524, 'i need more time to complete this project but '),
(266, 1627819524, 1010101012, 'no rupsha this should be done as soon as possible.'),
(267, 2001200120, 1627819524, 'please sir'),
(268, 2001200120, 1010101012, 'rupsha need more time'),
(269, 1010101012, 2001200120, 'Its not possible now'),
(270, 1010101012, 2001200120, 'tell her to submit this '),
(271, 1627819524, 2001200120, 'ok i give you 3 days now complete it'),
(272, 2001200120, 1010101012, 'ok she will submit this within 3 days'),
(273, 1010101012, 2001200120, 'better now'),
(274, 2001200120, 197501281, 'approve my request plzz'),
(275, 197501281, 2001200120, 'ok let me check it');

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
  `unique_id` int(255) NOT NULL,
  `wallet_number` text NOT NULL,
  `project_id` int(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_info`
--

INSERT INTO `pay_info` (`name`, `id`, `country`, `address`, `postal`, `city`, `email`, `unique_id`, `wallet_number`, `project_id`, `project_name`, `amount`) VALUES
('chinmoy datta', 32, 'Bangladesh', 'murila nathpara 201 villa', 2001, 'sylhet', 'rontheboss00797@gmail.com', 1475496409, '698 709 337 885', 2229, '', 127);

-- --------------------------------------------------------

--
-- Table structure for table `ppc`
--

CREATE TABLE `ppc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `des_1` text NOT NULL,
  `des_2` text NOT NULL,
  `des_3` text NOT NULL,
  `des_4` text NOT NULL,
  `des_5` text NOT NULL,
  `des_6` text NOT NULL,
  `des_7` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ppc`
--

INSERT INTO `ppc` (`id`, `name`, `bio`, `image`, `unique_id`, `amount`, `des_1`, `des_2`, `des_3`, `des_4`, `des_5`, `des_6`, `des_7`) VALUES
(1, 'Pay Per Click', 'Passionate PPC strategist optimizing ads for maximum impact and conversion. Results-driven marketer.\r\n\r\n', 'PPC_img1.png', 2226, 120, 'Define specific PPC campaign targets and outcomes.,\r\n', 'Choose relevant keywords and set bid amounts.,\r\n', 'Craft compelling ads for target audience engagement.,\r\n', 'Ensure landing pages align with ad content and goals.,\r\n', 'Distribute budget effectively across campaigns.,\r\n', 'Regularly assess and adjust ads for optimal results.,\r\n', 'Implement tools to measure and report conversions.\r\n\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `manager` varchar(255) NOT NULL,
  `manager_id` int(255) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `amount` int(255) NOT NULL,
  `developer_1` varchar(255) NOT NULL,
  `developer_2` varchar(255) NOT NULL,
  `developer_3` varchar(255) NOT NULL,
  `developer_1_id` int(255) NOT NULL,
  `dev_1_pog` int(255) NOT NULL,
  `developer_2_id` int(255) NOT NULL,
  `dev_2_pog` int(255) NOT NULL,
  `developer_3_id` int(255) NOT NULL,
  `dev_3_pog` int(255) NOT NULL,
  `des_1` text NOT NULL,
  `des_2` text NOT NULL,
  `des_3` text NOT NULL,
  `des_4` text NOT NULL,
  `des_5` text NOT NULL,
  `des_6` text NOT NULL,
  `des_7` text NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_id` int(255) NOT NULL,
  `bill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `status`, `start`, `end`, `manager`, `manager_id`, `unique_id`, `file`, `description`, `amount`, `developer_1`, `developer_2`, `developer_3`, `developer_1_id`, `dev_1_pog`, `developer_2_id`, `dev_2_pog`, `developer_3_id`, `dev_3_pog`, `des_1`, `des_2`, `des_3`, `des_4`, `des_5`, `des_6`, `des_7`, `client_name`, `client_id`, `bill`) VALUES
(29, 'Web Development', 'On-Hold', '0000-00-00', '2024-03-11', 'Chinmoy Datta Priom', 1010101012, 2224, '', '', 200, 'Hridyanshu Younag', 'Rupsha Roy', 'Shahariar Manna', 1638463793, 24, 1627819524, 52, 1627103596, 18, 'Adapt to various devices for seamless interaction.', 'Ensure consistent performance across different web browsers.', 'Design for growth and optimize for swift loading.', 'Implement robust protocols to safeguard user data.', 'Create an intuitive structure for easy exploration.', 'Integrate a user-friendly system for efficient content updates.', 'Apply best practices for enhanced online visibility.', 'Mugdho Datta Tiyash', 197501281, 'Paid'),
(30, 'Content Marketing', 'Pending', '2024-03-02', '2024-03-07', 'Saurov Karmokar', 1314274782, 2228, '', '', 156, 'Hridyanshu Younag', 'Rupsha Roy', 'Shahariar Manna', 1638463793, 0, 1627819524, 0, 1627103596, 0, 'Craft compelling material for audience connection.', 'Ensure content adapts seamlessly across various devices.', 'Tailor content to individual preferences for targeted messaging.', 'Experiment with elements to optimize content performance.', 'Divide audience for personalized and effective content campaigns.', 'Implement automated workflows for timely and relevant content delivery.', 'Utilize data insights to refine strategies and improve content impact.', 'Mugdho Datta Tiyash', 331574340, 'Due'),
(32, 'Email Marketing', 'Processing', '0000-00-00', '2024-03-21', 'Chinmoy Datta Priom', 1010101012, 2229, '', '', 123, 'Tiyash Martin', 'Fenon Kristin', 'Shahariar Manna', 1122222222, 35, 1111111111, 13, 1627103596, 15, 'Craft compelling emails for audience resonance.', 'Ensure emails render seamlessly on various screens.', 'Tailor content to individual preferences and behaviors.', 'Experiment with different elements to enhance email performance.', 'Divide your audience for more personalized and effective communication.', 'Set up automated workflows for timely and relevant emails.', 'Utilize data insights to refine strategies and improve email campaigns.', 'Mugdho Retiano', 1475496409, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `des_1` text NOT NULL,
  `des_2` text NOT NULL,
  `des_3` text NOT NULL,
  `des_4` text NOT NULL,
  `des_5` text NOT NULL,
  `des_6` text NOT NULL,
  `des_7` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `name`, `bio`, `image`, `unique_id`, `amount`, `des_1`, `des_2`, `des_3`, `des_4`, `des_5`, `des_6`, `des_7`) VALUES
(1, 'Search Engine Optimization', 'Keyword whisperer and SEO maestro optimizing digital landscapes for visibility and success.\r\n\r\n', 'seo-bg.svg', 2225, 150, 'Identify relevant keywords for optimization strategy.,\r\n', 'Optimize meta tags headers and content.,', 'Backlink building and social media promotion.,\r\n', 'Develop SEO-friendly and engaging content.,\r\n', 'Ensure website structure and performance.,\r\n', 'Enhance local search visibility and presence.,\r\n', 'Track performance analyze data and report insights.\r\n\r\n\r\n\r\n\r\n');

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
(44, 'Shahariar Manna', 'apurborshi@gmail.com', 'Code of Conduct Violations:Engaging in behavior that goes against the established code of conduct for developers on the CRM platform.', '2024-03-07', '2024-03-03', 'suspend', 'developer', 1627103596);

-- --------------------------------------------------------

--
-- Table structure for table `s_marketing`
--

CREATE TABLE `s_marketing` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `des_1` text NOT NULL,
  `des_2` text NOT NULL,
  `des_3` text NOT NULL,
  `des_4` text NOT NULL,
  `des_5` text NOT NULL,
  `des_6` text NOT NULL,
  `des_7` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s_marketing`
--

INSERT INTO `s_marketing` (`id`, `name`, `bio`, `image`, `unique_id`, `amount`, `des_1`, `des_2`, `des_3`, `des_4`, `des_5`, `des_6`, `des_7`) VALUES
(1, 'Social Media Marketing', 'Crafting social media magic—engagement, growth, and impactful brand narratives. Social storyteller.\r\n\r\n', 'social-bg.svg', 2227, 170, 'Define goals target audience and content approach.,\r\n', 'Plan and produce engaging content in advance.,\r\n', 'Choose and tailor platforms to target audience.,\r\n', 'Foster connections through comments and messages.,\r\n', 'Implement targeted paid campaigns for wider reach.,\r\n', 'Monitor metrics and adjust strategy for improvement.,\r\n', 'Identify and engage with influencers for partnerships.\r\n\r\n\r\n\r\n\r\n');

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
(7, '23232323', '878 098 347 697', '50', 'datta', 'priom'),
(8, '2443243242334', '524 460 624 389', '500', 'Chinmoy ', 'Datta'),
(9, '2443243242334', '524 460 624 389', '500', 'Chinmoy ', 'Datta'),
(10, '12345673', '698 709 337 885', '500', 'Priom', 'datta'),
(11, '12345673', '698 709 337 885', '500', 'Priom', 'datta'),
(12, '23415673', '698 709 337 885', '100', 'fahim', 'Priom');

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

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `des_1` text NOT NULL,
  `des_2` text NOT NULL,
  `des_3` text NOT NULL,
  `des_4` text NOT NULL,
  `des_5` text NOT NULL,
  `des_6` text NOT NULL,
  `des_7` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `name`, `bio`, `image`, `unique_id`, `amount`, `des_1`, `des_2`, `des_3`, `des_4`, `des_5`, `des_6`, `des_7`) VALUES
(1, 'Web Development', 'Building digital experiences through expert web development coding creativity and seamless user interfaces.\r\n\r\n', 'web-bg.svg\r\n', 2224, 108, 'Define scope goals and deliverables.,', 'Outline project phases and key deadlines.,', 'Specify tasks for each team member.,', 'Breakdown of costs and required materials.,', 'Establish channels and frequency of updates.,\r\n', 'Identify potential issues and mitigation plans.,\r\n', 'Ensure standards for project success.\r\n\r\n\r\n\r\n\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat-bg`
--
ALTER TABLE `chat-bg`
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
-- Indexes for table `c_marketing`
--
ALTER TABLE `c_marketing`
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
-- Indexes for table `e_marketing`
--
ALTER TABLE `e_marketing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `ppc`
--
ALTER TABLE `ppc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspend`
--
ALTER TABLE `suspend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_marketing`
--
ALTER TABLE `s_marketing`
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
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `chat-bg`
--
ALTER TABLE `chat-bg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `crm_wallet`
--
ALTER TABLE `crm_wallet`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `c_marketing`
--
ALTER TABLE `c_marketing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `d_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `e_marketing`
--
ALTER TABLE `e_marketing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `pay_info`
--
ALTER TABLE `pay_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ppc`
--
ALTER TABLE `ppc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suspend`
--
ALTER TABLE `suspend`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `s_marketing`
--
ALTER TABLE `s_marketing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
