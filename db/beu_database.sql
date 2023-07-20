-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 06:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beu_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant`
--

CREATE TABLE `tbl_applicant` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_applicant`
--

INSERT INTO `tbl_applicant` (`id`, `job_id`, `employee_id`, `status`) VALUES
(2, 35, 32, 'ACCEPTED'),
(4, 45, 32, 'PENDING'),
(11, 33, 32, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Mname` varchar(255) NOT NULL,
  `Bday` date NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Cstat` varchar(255) NOT NULL,
  `Religion` varchar(255) NOT NULL,
  `Cnum` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Barangay` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `SSS` varchar(255) NOT NULL,
  `Tin` varchar(255) NOT NULL,
  `Phil_health` varchar(255) NOT NULL,
  `Pag_ibig` varchar(255) NOT NULL,
  `Introduction` varchar(1000) NOT NULL,
  `Employee_image` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`ID`, `user_id`, `Date_created`, `Fname`, `Lname`, `Mname`, `Bday`, `Gender`, `Cstat`, `Religion`, `Cnum`, `Email`, `City`, `Barangay`, `Address`, `Title`, `SSS`, `Tin`, `Phil_health`, `Pag_ibig`, `Introduction`, `Employee_image`) VALUES
(1, 0, '2023-06-27 03:45:52', 'John Marti', 'Demonteverde', 'Cusi', '2002-06-05', 'male', 'single', 'Catholic', '09604436812', 'johnmartin@outlook.com', 'Bacolod Cityy', 'Granada', 'Patricia Homes', 'Mobile Dev', '23234', '55555', '44444', '26262', '<p style=\"line-height: 1.4; text-align: justify;\">Hello! I\'m <strong>JD</strong>, a highly <strong>motivated</strong> and <strong>passionate</strong> fourth-year<strong> Computer Science student </strong>with a strong interest in software development. I have a solid foundation in programming languages like Java, Python, and C++, along with expertise in data structures, algorithms, and web development using HTML, CSS, and JavaScript.</p>', 'IMG_0313_(1).JPG'),
(14, 0, '2023-06-27 11:03:31', 'Paul Martin', 'Cuenca', 'Benedicto', '2001-11-24', 'male', 'single', 'Catholic', '09479505192', '@polcuenca', 'Bacolod City', 'Mansilingan', 'adelfa st. victorina heights', 'Web Dev', '1929222222', '757875', '8686', '8686', 'Hello! I\'m Paul, a highly motivated and passionate fourth-year Computer Science student with a strong interest in software development. I have a solid foundation in programming languages like Java, Python, and C++, along with expertise in data structures, algorithms, and web development using HTML, CSS, and JavaScript. I thrive in collaborative environments, possess excellent problem-solving abilities, and actively seek opportunities to learn and grow. Currently seeking internship opportunities, I am eager to apply my skills and contribute to building innovative solutions as a software developer. Let\'s connect and discuss how I can add value to your organization!', '347548042_184571507478516_7611925746711583073_n1.jpg'),
(27, 0, '2023-06-29 10:55:16', 'Katrina', 'Sheesh', 'God', '2023-06-29', 'male', 'single', 'Catholic', '5555555', '@katrinadiz', 'BACOLOD CITY', 'Villamonte', 'Kats Street', 'GOD', '616216161', '515165151', '15151515', '5151515', '<p>Yes I am Kat have a <strong>kit kat</strong></p>', 'CheatEngine-logo2.png'),
(32, 6, '0000-00-00 00:00:00', 'left', 'dead', 'for', '2022-08-16', 'male', 'single', 'Chicken', '123456', 'chicken@gmail.com', 'Bacolod City', 'Chicken', 'Charito Heights', 'L4D2', '1233', '22222', '331313', '12323131', '<p>hahahaha</p>', '263088764_7252129248145876_7634209438953252272_n.jpg'),
(33, 7, '0000-00-00 00:00:00', 'Kayla', 'Pajanconi', 'Tangub', '1999-10-13', 'female', 'single', 'Roman Catholic', '09222667813', 'kaypajanconi@gmail.com', 'Hinigaran', 'camba-og', 'Dinandan', '', '', '', '', '', '', 'default.png'),
(36, 20, '2023-07-19 13:15:15', 'Martin', 'Cuenca', 'Benedicto', '2001-11-24', 'male', 'single', 'Catholic', '0947950555', 'polcuenca242@gmail.com', 'BACOLOD CITY', 'Mansilingan', 'adelfa st. victorina heights', '', '19292', '', '', '', '', 'default.png'),
(37, 21, '2023-07-19 15:23:46', 'Jideeh', 'Hehe', 'Cusi', '2002-03-28', 'male', 'single', 'Catholic', '09604436812', 'ayeemarty@outlook.com', 'Bacolod', 'Granada', 'Patricia Homes', '', '', '', '', '', '', 'default.png'),
(38, 22, '2023-07-19 15:27:03', 'Jideeh', 'Hehe', 'Cusi', '2002-03-28', 'male', 'single', 'Catholic', '09604436812', 'ayeemarty@outlook.com', 'Bacolod', 'Granada', 'Patricia Homes', '', '', '', '', '', '', 'default.png'),
(39, 23, '2023-07-19 15:45:42', 'Jideeh', 'Hehe', 'Cusi', '2002-03-28', 'male', 'single', '', '09604436812', 'ayeemarty@outlook.com', 'Bacolod', 'Granada', 'Patricia Homes', '', '', '', '', '', '', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_educ`
--

CREATE TABLE `tbl_employee_educ` (
  `ID` int(11) NOT NULL,
  `Employee_id` int(11) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `Institution` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_employee_educ`
--

INSERT INTO `tbl_employee_educ` (`ID`, `Employee_id`, `Level`, `Institution`, `Title`, `Description`, `Start_date`, `End_date`, `Hours`) VALUES
(1, 1, 'ELEMENTARY', 'Colegio San Agustin - Bacolod', 'Student', 'Grade 1 - Grade 12', '2023-07-28', '2023-08-05', 100),
(25, 14, 'College', 'University of St. La Salle', 'Computer Science', '', '2023-07-10', '2023-07-27', 10),
(36, 27, 'COLLEGE', 'Colegio San Agustin - Bacolod', 'Student', '1st - 4rd year', '2023-07-04', '2023-07-06', 100),
(43, 14, 'Senior High School', 'Liceo De La Salle', 'STEM', '', '2023-07-03', '2023-07-06', 123123),
(58, 1, 'COLLEGE', 'University Of Saint La Salle - Bacolod', 'Student', '1st - 5th year', '2023-07-07', '2023-07-28', 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_skill`
--

CREATE TABLE `tbl_employee_skill` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `proficiency` varchar(255) NOT NULL,
  `years_exp` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_employee_skill`
--

INSERT INTO `tbl_employee_skill` (`id`, `employee_id`, `skill`, `proficiency`, `years_exp`) VALUES
(4, 1, 'PHP', 'intermediate', 1),
(12, 1, 'Photoshop', 'expert', 5),
(13, 1, 'Java', 'intermediate', 2),
(15, 14, 'laravel', 'beginner', 3),
(22, 14, 'C++', 'advance', 1),
(23, 1, 'C++', 'expert', 99),
(25, 27, 'PHP', 'advance', 2),
(27, 27, 'C++', 'advance', 5),
(29, 27, 'C#', 'intermediate', 2),
(30, 27, 'React', 'beginner', 1),
(31, 27, 'JavaScript', 'advance', 3),
(34, 32, 'PHP', 'beginner', 2),
(36, 32, 'C++', 'beginner', 2),
(37, 32, 'laravel', 'beginner', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employer`
--

CREATE TABLE `tbl_employer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `summary` mediumtext NOT NULL,
  `tradename` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `business_type` varchar(255) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `sss` varchar(255) NOT NULL,
  `tin` int(12) NOT NULL,
  `image` tinytext DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_employer`
--

INSERT INTO `tbl_employer` (`id`, `user_id`, `employer_name`, `email`, `summary`, `tradename`, `city`, `barangay`, `address`, `business_type`, `contact_number`, `sss`, `tin`, `image`, `date_created`) VALUES
(1, 3, 'LOPUES EAST', 'lopues@gmail.com', '<p>In the year 1992, Lopue\'s Department Store incorporated underwent changes in its corporate structure and establishes three (3) new independent corporations. From mere branch, Lopue\'s San Sebastian had stood independently to rebuild its own image and identity as it has under the stewardship of Mr. Leonito D. Lopue. <br><br>Despite the store reorganization, it has maintained its structure as one of the top taxpayers of Bacolod City. Starting with annual sales of 35 million, the store had steadily increased its share in the market to i85 million and now relishes a sales volume of 220 million. as befits a pioneer organization has stood the test of time as it has maintained its image as \"<strong>Your complete Department store and supermarket for high quality products and services.</strong>\"</p>', 'lopues eastttt', 'bacolod', 'villamonte', 'Sa lopues east ngayunn', 'Retail', '123456', '123456789', 2147483647, 'lopues.jpg', '2023-06-27 09:47:55'),
(6, 2, 'Business Inn', 'businessinn@gmail.com', '<p><span style=\"font-family: \'arial black\', sans-serif;\">Table of truth</span></p>\n<table style=\"border-collapse: collapse; width: 99.9807%;\" border=\"1\"><colgroup><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"></colgroup>\n<tbody>\n<tr>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">gwapo</td>\n<td style=\"text-align: center;\">mas gwapo</td>\n<td style=\"text-align: center;\">pinaka gwapo</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">bok</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">x</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">pol</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">jide</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n</tr>\n</tbody>\n</table>', 'Business Inn Hotel', 'Bacolod', 'Granadaaa', 'Charito Heights', 'Hospitality and Tourism', '0908', '22222', 90855, 'to-infinity-and-beyond-chad4.jpg', '2023-06-27 16:23:54'),
(7, 4, 'Pol B. Cuenca', 'pol@gmail.com', '<p>TELUS International designs, builds and delivers next-generation digital solutions to enhance the customer experience (CX) for global and disruptive brands. The company&rsquo;s services support the full lifecycle of its clients&rsquo; digital transformation journeys and enable them to more quickly embrace next-generation digital technologies to deliver better business outcomes. TELUS International&rsquo;s integrated solutions and capabilities span digital strategy, innovation, consulting and design, digital transformation and IT lifecycle solutions, data annotation and intelligent automation, and omnichannel CX solutions that include content moderation, trust and safety solutions, and other managed solutions. Fueling all stages of company growth, TELUS International partners with brands across high growth industry verticals, including tech and games, communications and media, eCommerce and fintech, healthcare, and travel and hospitality.</p>\n<p><strong>Industry</strong><br><span style=\"color: rgb(126, 140, 141);\">IT Services and IT Consulting</span><br><br><strong>Company size</strong><br><span style=\"color: rgb(126, 140, 141);\">10,001+ employees</span><br><span style=\"color: rgb(126, 140, 141);\">29,162 on LinkedIn&nbsp;</span><br><br><strong>Headquarters</strong><br><span style=\"color: rgb(126, 140, 141);\">Vancouver, British Columbia</span></p>', 'Lopues North-West', 'Bacolod', 'Brgy Balay', 'Balay', 'Education', '13579', '9999', 8888, 'giga_chad_steven.jpg', '2023-06-29 10:57:41'),
(10, 5, 'Chicken', 'gabchicken@gmail.com', '', 'CHICKEN NI GAB ', 'City of Gab\'s Chicken', 'Brgy Gab', 'Balay ni gab', 'Information Technology', '123', '', 0, 'default.png', '2023-07-13 19:46:33'),
(11, 10, 'test doe', 'test@gmail.com', '', 'TEST', 'Zuckland', 'Granada', 'Meta', 'Food and Beverages', '123123', '', 0, 'default.png', '2023-07-18 10:35:12'),
(12, 24, 'John Doe', 'watsons@gmail.com', '', 'Watsons', 'Bacolod', 'Barangay 12', 'GF SM City Bacolod North Wing Poblacion Reclamation Area', 'Retail', '09123456789', '', 0, 'default.png', '2023-07-20 09:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employment`
--

CREATE TABLE `tbl_employment` (
  `ID` int(255) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `rating` int(5) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `show_status` tinyint(1) NOT NULL,
  `verified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_employment`
--

INSERT INTO `tbl_employment` (`ID`, `employer_id`, `employee_id`, `position`, `start_date`, `end_date`, `status`, `rating`, `job_description`, `date_created`, `show_status`, `verified`) VALUES
(37, 1, 1, 'assistant manager', '2023-03-09', '2023-06-17', 'part time', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere quam massa, quis facilisis enim mollis eget. Sed sollicitudin tortor vel nibh sollicitudin sagittis. Fusce tempor arcu at leo venenatis', '2023-06-30 00:00:00', 0, '0000-00-00'),
(39, 6, 14, 'member', '2022-09-08', '2023-06-30', 'not hired', 2, 'hehehe', '2023-06-30 00:00:00', 1, '0000-00-00'),
(41, 1, 27, 'CEO', '2009-02-18', '2021-02-02', 'its status', 10, 'a god dizon', '2023-06-30 15:30:55', 1, '0000-00-00'),
(50, 1, 14, 'WORKER', '2023-02-08', '2023-07-20', 'full time', 3, '', '2023-07-06 11:19:17', 1, NULL),
(55, 6, 1, 'manager', '2023-05-12', '2023-07-14', 'full time', 5, '', '2023-07-07 14:14:34', 1, NULL),
(63, 10, 27, 'CHICKEN GOD', '2023-05-24', '2023-07-19', 'THE CHICKEN', 99, '', '2023-07-14 21:21:03', 1, NULL),
(64, 10, 14, 'manok', '2023-07-05', '2023-07-08', 'Semi Full Time', 3, '', '2023-07-17 10:10:10', 1, NULL),
(68, 10, 1, 'manok', '2023-06-12', '2023-07-18', 'Full Time', 3, '', '2023-07-18 09:31:49', 1, NULL),
(71, 10, 32, 'manok', '2023-06-29', '2023-07-20', 'Full Time', 4, '', '2023-07-20 13:52:25', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `employment_ID` int(255) NOT NULL,
  `feedback` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `employee_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow`
--

CREATE TABLE `tbl_follow` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_follow`
--

INSERT INTO `tbl_follow` (`id`, `employee_id`, `employer_id`) VALUES
(26, 32, 6),
(27, 32, 1),
(28, 32, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobposting`
--

CREATE TABLE `tbl_jobposting` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp(),
  `start_date` date DEFAULT NULL,
  `filled` varchar(255) DEFAULT NULL,
  `salary` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_jobposting`
--

INSERT INTO `tbl_jobposting` (`id`, `employer_id`, `title`, `description`, `date_posted`, `start_date`, `filled`, `salary`, `shift`, `job_type`) VALUES
(33, 1, 'Virtual Assistant | WORK-FROM-HOME', 'At Outsourced Doers we recruit smart-working home-based Digital Marketing Virtual Assistants (VAs) and match them with clients (known as Founders) globally.\n\nThe Digital Marketing Virtual Assistant role is a remote assistant who will handle all the aspects of digital marketing and administrative work for the client.\n\nSimply put, digital marketing is a term used to describe online advertising. Common formats include email marketing, social media marketing, display advertising, blogs, and other digital formats.', '2023-07-04 15:40:15', NULL, 'OPEN', '10,000.00', 'Day-Shift', 'Permanent'),
(35, 1, 'Technical Support Engineer I, Document Control - Blended WFH', 'In this role, you will:\r\n\r\nIdentify applicable documents as per the customer’s requirements and specifications.\r\nAttend document review meetings with the Project Administrator, Project Manager, and Document Controller.\r\nManage the documentation approval cycle and final documentation delivery to the customer (gather, prepare, and submit).', '2023-07-04 16:03:35', NULL, 'OPEN', '', '', ''),
(36, 1, 'Assistant Manager, Accounting| Urdaneta', 'Job Description:\r\n\r\nASSISTS IN OPERATIONS AND MANAGEMENT: Provides assistance for the overall operations and management of the accounting department of the assigned business unit\r\n\r\n· IMPLEMENTATION\r\n\r\nEnsures efficient implementation of integral plan for the control of financial transactions\r\n\r\n· REPORTS AND ANALYSIS', '2023-07-07 10:20:58', NULL, 'CLOSED', '', '', ''),
(45, 10, 'UI/UX', '<p>A UI/UX job description typically involves designing and improving user interfaces and experiences by conducting user research, creating wireframes and prototypes, collaborating with cross-functional teams, and ensuring a seamless and visually appealing interaction between users and digital products or services.</p>', '2023-07-17 15:37:31', NULL, 'OPEN', '15,000.00', 'Day-Shift', 'Part-Time');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `is_displayed` tinyint(1) NOT NULL DEFAULT 0,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `user_id`, `title`, `message`, `is_displayed`, `is_read`, `date_created`) VALUES
(1, 6, 'Application Accepted', 'Your application has been accepted.', 1, 0, '2023-07-20 23:08:49'),
(2, 6, 'Application Accepted', 'Your application has been accepted.', 1, 0, '2023-07-20 23:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill`
--

CREATE TABLE `tbl_skill` (
  `id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `skill_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training`
--

CREATE TABLE `tbl_training` (
  `ID` int(11) NOT NULL,
  `Employee_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `training_description` varchar(1000) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `hours` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_training`
--

INSERT INTO `tbl_training` (`ID`, `Employee_id`, `title`, `training_description`, `venue`, `city`, `s_date`, `e_date`, `hours`) VALUES
(1, 1, 'Interactive Workshop on UI/UX Design: Crafting Engaging User Experiences', '<p style=\"line-height: 1.4; text-align: justify;\">Hello! I\'m JD, a highly motivated and passionate fourth-year Computer Science student with a strong interest in software development. I have a solid foundation in programming languages like <span style=\"text-decoration: underline;\"><strong>Java</strong></span>, <span style=\"text-decoration: underline;\"><strong>Python</strong></span>, and <span style=\"text-decoration: underline;\"><strong>C++</strong></span>, along with expertise in data structures, algorithms, and web development using <span style=\"text-decoration: underline;\"><strong>HTML</strong></span>, <span style=\"text-decoration: underline;\"><strong>CSS</strong></span>, and <span style=\"text-decoration: underline;\"><strong>JavaScript</strong></span>.</p>', 'SMX Convention', '', '2023-07-06', '2023-07-06', 600),
(4, 14, 'Test', '<p>Hello! I\'m Paul, a highly motivated and passionate fourth-year Computer Science student with a strong interest in software development. I have a solid foundation in programming languages like Java, Python, and C++, along with expertise in data structures, algorithms, and web development using HTML, CSS, and JavaScript. I thrive in collaborative environments, possess excellent problem-solving abilities, and actively seek opportunities to learn and grow. Currently seeking internship opportunities, I am eager to apply my skills and contribute to building innovative solutions as a software developer. Let\'s connect and discuss how I can add value to your organization!</p>', 'Balay ni pol', '', '2023-05-25', '2023-07-13', 12),
(8, 27, 'Yes I am Kat', '<p style=\"text-align: justify;\"><s><strong>Yes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes&nbsp;</strong></s></p>', 'Kat Function Halll', '', '2023-04-14', '2023-11-29', 2000),
(9, 27, 'IBM Full Stack Software Developer Professional Certificate', '<p><em><strong>LOREM IPSUM LOREM IPSUM LOREM IPSUM </strong>LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM<strong> IPSUM <span style=\"text-decoration: underline;\">LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM LOREM IPSUM&nbsp;</span></strong></em></p>', 'SA GYM', '', '2023-02-14', '2023-07-12', 200),
(10, 27, '[L4D2]', '<p style=\"padding-left: 40px;\"><span style=\"text-decoration: underline;\">Le for ded 2</span></p>', 'Online', 'Bacolod City', '2023-04-20', '2023-08-16', 200),
(11, 1, 'Mastering UI/UX Design: A Workshop for Designers and Innovators', '<p style=\"text-align: justify;\">Are you ready to take your UI/UX design skills to the next level and create experiences that leave a lasting impact? Join our intensive workshop designed for designers and innovators seeking to refine their UI/UX expertise and create user-centered designs that captivate and engage.</p>', 'SMX', '', '2023-07-18', '2023-07-18', 5),
(12, 1, 'Front-End Web Development Workshop: Building Modern and Responsive User Interfaces', '<p style=\"text-align: justify;\">In this hands-on training, our experienced instructors will guide you through the essential concepts and tools that form the foundation of front-end development. Whether you\'re a beginner looking to enter the field or an experienced developer seeking to enhance your skills, this workshop offers a dynamic learning experience tailored to all proficiency levels.</p>', 'Colegio San Agustin: Gymnasuim', '', '2023-07-17', '2023-07-27', 5),
(13, 1, '123123', '<p>123123</p>', '123123', '123123', '2023-07-08', '2023-07-21', 123123123),
(14, 1, 'Full-Stack Web Development Workshop: Creating Dynamic and Scalable Web Applications', '<p>In this immersive training program, our experienced instructors will guide you through the entire web development stack, covering both front-end and back-end technologies. Whether you\'re a beginner taking your first steps into web development or an experienced developer seeking to expand your skill set, this workshop offers a dynamic learning experience tailored to all proficiency levels.</p>', 'USLS Coliseum', 'Bacolod City', '2023-07-17', '2023-07-18', 101);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `locker` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `password`, `user_type`, `locker`) VALUES
(2, '', '95d04a4f3e63f77b08a01dd95694292320e952aa', 'EMPLOYER', 'u@$~jgJJD4U1w^smk1G.w(Y&2C8RXOFCD0NUTvIQ1AsY9V<~hD'),
(3, 'lopues@gmail.com', '488ba4bc58d39f02c84d51f2d579ebcb6f614b6f', 'EMPLOYER', 'f~oZ!yr7%Q^CEpMV&S#Z8TICz(r$?(GOrQaYM>rjK&Gt64gCUO'),
(4, 'pol@gmail.com', '464f2961c6ea64e833467a148afd87bcf91982ab', 'EMPLOYER', 'cE$hL^t2oS&zs&$7NQoNRahuMgOt.cN)!&Nt6&gW7If!txT$Vt'),
(5, 'gabchicken@gmail.com', '26aa893d5c8d46bdff3c93f51dcb9db8ea242cb6', 'EMPLOYER', 'd9ImbIOAh5Cvh&Wd\\w4Ey61q^9u1do?HC5EUfcAH72!%G(@MpB'),
(6, 'chicken@gmail.com', 'ead99718058240d3017368b1ec8b18bde5ebb4f5', 'EMPLOYEE', 'S(RC0J^1W^U.f6&F~\\A18xJBAK/Ur%Zf1mAAKTP5#N@1(si@o('),
(7, 'kaypajanconi@gmail.com', '838c8d537322b98e2f84f758dfcb07a5a960d1bd', 'EMPLOYEE', 'Q8pW@DJzfu9hE@C8rbl>?>rdo)s3*YwHxW6~Z@rit\\v@wmED0$'),
(20, 'polcuenca242@gmail.com', '835de90f3a845fbc4fa8142d2712ce4da4b8ec17', 'EMPLOYEE', 'lT>)c2V(HY>eoCCBitd#y@FmeXeyvYy)2Xp@\\P0$?C/eNm#v)V'),
(23, 'ayeemarty@outlook.com', 'a19a93a06fbe9f2e65c105470bb6f6dcc9c8aeab', 'EMPLOYEE', 'ERWS2@~j1eS5&gO19!H#%h04F>wD>7G\\9p?Z~g4FUH.~Dj$L7~'),
(24, 'watsons@gmail.com', 'd9abaa4ec106938b7f2ebdf26f24455f4b270477', 'EMPLOYER', 'qfbLy!3)b7~X@($0TXBemGcbs$Sog$8^R1hiT@2DmwN9qJsSnB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_applicant_employee_id` (`employee_id`),
  ADD KEY `fk_applicant_jobposting_id` (`job_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_educ`
--
ALTER TABLE `tbl_employee_educ`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Employee_ID` (`Employee_id`);

--
-- Indexes for table `tbl_employee_skill`
--
ALTER TABLE `tbl_employee_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employee_skill_employee_id` (`employee_id`);

--
-- Indexes for table `tbl_employer`
--
ALTER TABLE `tbl_employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employment`
--
ALTER TABLE `tbl_employment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `employee_id` (`employee_id`) USING BTREE,
  ADD KEY `fk_employment_employer_id` (`employer_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jobposting_employer_id` (`employer_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notif_user_id` (`user_id`);

--
-- Indexes for table `tbl_skill`
--
ALTER TABLE `tbl_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_training_employee_id` (`Employee_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_employee_educ`
--
ALTER TABLE `tbl_employee_educ`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_employee_skill`
--
ALTER TABLE `tbl_employee_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_employer`
--
ALTER TABLE `tbl_employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_employment`
--
ALTER TABLE `tbl_employment`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_skill`
--
ALTER TABLE `tbl_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD CONSTRAINT `fk_applicant_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_applicant_jobposting_id` FOREIGN KEY (`job_id`) REFERENCES `tbl_jobposting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employee_educ`
--
ALTER TABLE `tbl_employee_educ`
  ADD CONSTRAINT `fk_Employee_ID` FOREIGN KEY (`Employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employee_skill`
--
ALTER TABLE `tbl_employee_skill`
  ADD CONSTRAINT `fk_employee_skill_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employment`
--
ALTER TABLE `tbl_employment`
  ADD CONSTRAINT `fk_employment_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employment_employer_id` FOREIGN KEY (`employer_id`) REFERENCES `tbl_employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  ADD CONSTRAINT `fk_jobposting_employer_id` FOREIGN KEY (`employer_id`) REFERENCES `tbl_employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD CONSTRAINT `fk_notif_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD CONSTRAINT `fk_training_employee_id` FOREIGN KEY (`Employee_id`) REFERENCES `tbl_employee` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
