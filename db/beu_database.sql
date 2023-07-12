-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 04:41 AM
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
  `jobposting_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `ID` int(11) NOT NULL,
  `Date_created` datetime NOT NULL,
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

INSERT INTO `tbl_employee` (`ID`, `Date_created`, `Fname`, `Lname`, `Mname`, `Bday`, `Gender`, `Cstat`, `Religion`, `Cnum`, `Email`, `City`, `Barangay`, `Address`, `Title`, `SSS`, `Tin`, `Phil_health`, `Pag_ibig`, `Introduction`, `Employee_image`) VALUES
(1, '2023-06-27 03:45:52', 'John Marti', 'Demonteverde', 'Cusi', '2002-06-05', 'male', 'single', 'Catholic', '09604436812', 'johnmartin@outlook.com', 'Bacolod Cityy', 'Granada', 'Patricia Homes', 'Mobile Dev', '23234', '55555', '44444', '26262', 'Hello! I\'m JD, a highly motivated and passionate fourth-year Computer Science student with a strong interest in software development. I have a solid foundation in programming languages like Java, Python, and C++, along with expertise in data structures, algorithms, and web development using HTML, CSS, and JavaScript. I thrive in collaborative environments, possess excellent problem-solving abilities, and actively seek opportunities to learn and grow. Currently seeking internship opportunities, I am eager to apply my skills and contribute to building innovative solutions as a software developer. Let\'s connect and discuss how I can add value to your organization!', 'IMG_0313_(1).JPG'),
(14, '2023-06-27 11:03:31', 'Paul Martin', 'Cuenca', 'Benedicto', '2001-11-24', 'male', 'single', 'Catholic', '09479505192', '@polcuenca', 'Bacolod City', 'Mansilingan', 'adelfa st. victorina heights', 'Web Dev', '1929222222', '757875', '8686', '8686', 'Hello! I\'m Paul, a highly motivated and passionate fourth-year Computer Science student with a strong interest in software development. I have a solid foundation in programming languages like Java, Python, and C++, along with expertise in data structures, algorithms, and web development using HTML, CSS, and JavaScript. I thrive in collaborative environments, possess excellent problem-solving abilities, and actively seek opportunities to learn and grow. Currently seeking internship opportunities, I am eager to apply my skills and contribute to building innovative solutions as a software developer. Let\'s connect and discuss how I can add value to your organization!', '347548042_184571507478516_7611925746711583073_n1.jpg'),
(18, '2023-06-27 11:15:14', 'Gonrad', 'Castañeda', 'G.', '2023-06-27', 'male', 'single', 'Yes', '62622003', '@igonrad', 'Bacolod City', 'Villamonte', 'Circle Inn', 'Game Developer', '15262626', '181515', '0651518515', '258181', 'Hello! I\'m Gon, a highly motivated and passionate fourth-year Computer Science student with a strong interest in software development. I have a solid foundation in programming languages like Java, Python, and C++, along with expertise in data structures, algorithms, and web development using HTML, CSS, and JavaScript. I thrive in collaborative environments, possess excellent problem-solving abilities, and actively seek opportunities to learn and grow. Currently seeking internship opportunities, I am eager to apply my skills and contribute to building innovative solutions as a software developer. Let\'s connect and discuss how I can add value to your organization!', 'default.png'),
(27, '2023-06-29 10:55:16', 'Katrina', 'Sheesh', 'God', '2023-06-29', 'male', 'single', 'Catholic', '5555555', '@katrinadiz', 'BACOLOD CITY', 'Villamonte', 'Kats Street', '', '616216161', '515165151', '15151515', '5151515', 'Yes I am Kat', 'default.png'),
(28, '2023-06-29 13:04:08', 'Fred', 'Cuenca', 'O.', '1970-02-24', 'male', 'single', 'Catholic', '5435', '@fred', 'Bacolod City', 'Mansilingan', 'Blk11', '', '55555', '55555', '5555', '55555', '', 'default.png'),
(29, '2023-06-29 15:45:08', 'Kayla', 'Pajanconi', 'Tangub', '1999-10-13', 'female', 'single', 'Religion', '09090909', '@kayla', 'Hinigaran', 'Barangay', 'Hinigaran City', '', '111', '222', '333', '444', '', 'default.png'),
(31, '2023-06-30 10:28:14', 'Fausto', 'Boko', 'John', '2023-06-30', 'male', 'single', 'rgrgrgr', '252626', '@boko', 'grgrg', 'rgvregvre', 'edfvdfvrdfv', '', '4578', '7575', '57575', '75757', '', 'default.png');

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
(25, 14, '4th', 'University of St. La Salle', 'Student', '', '2023-07-10', '2023-07-27', 10),
(36, 27, '4th', 'Colegio San Agustin - Bacolod', 'Student', '', '2023-07-04', '2023-07-06', 100),
(38, 29, '4th', 'University Of St. La Salle', 'Student', 'Hi', '2023-07-04', '2023-07-06', 123),
(41, 18, '12312123123123', '1123123', '123123', '12312321', '2023-07-06', '2023-07-12', 123123),
(43, 14, 'qweqwe', 'qweqwe', 'qweqweqwe', '', '2023-07-03', '2023-07-06', 123123),
(45, 14, 'JJJJJJJJJJ', 'JJJJJJJJJJ', 'JJJJJJJJJJ', '', '2023-07-12', '2023-07-28', 123123),
(58, 1, 'COLLEGE', 'University Of Saint La Salle - Bacolod', 'Student', '1st - 4th year', '2023-07-07', '2023-07-28', 200);

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
(14, 1, 'MAGIC', 'expert', 99),
(15, 14, 'laravel', 'beginner', 3),
(22, 14, 'java', 'beginner', 1),
(23, 1, 'C++', 'advance', 99);

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
(1, 3, 'LOPUES EAST', 'lopues@gmail.com', '<p>In the year 1992, Lopue\'s Department Store incorporated underwent changes in its corporate structure and establishes three (3) new independent corporations. From mere branch, Lopue\'s San Sebastian had stood independently to rebuild its own image and identity as it has under the stewardship of Mr. Leonito D. Lopue. <br><br>Despite the store reorganization, it has maintained its structure as one of the top taxpayers of Bacolod City. Starting with annual sales of 35 million, the store had steadily increased its share in the market to i85 million and now relishes a sales volume of 220 million. as befits a pioneer organization has stood the test of time as it has maintained its image as \"<strong>Your complete Department store and supermarket for high quality products and services.</strong>\"</p>', 'lopues east', 'bacolod', 'villamonte', 'Sa lopues east ngayunn', 'Retail', '123456', '123456789', 2147483647, 'lopues.jpg', '2023-06-27 09:47:55'),
(6, 2, 'Fausto JC E. Boko', 'faustojcboko@gmail.com', '<p><span style=\"font-family: \'arial black\', sans-serif;\">Table of truth</span></p>\n<table style=\"border-collapse: collapse; width: 99.9807%;\" border=\"1\"><colgroup><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"></colgroup>\n<tbody>\n<tr>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">gwapo</td>\n<td style=\"text-align: center;\">mas gwapo</td>\n<td style=\"text-align: center;\">pinaka gwapo</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">bok</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">pol</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">jide</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n</tr>\n</tbody>\n</table>', 'Business Inn', 'Bacolod', 'Granadaaa', 'Charito Heights', 'Information Technology', '0908', '222222', 90855, 'to-infinity-and-beyond-chad4.jpg', '2023-06-27 16:23:54'),
(7, 0, 'Pol B. Cuenca', 'pol@gmail.com', '<p>TELUS International designs, builds and delivers next-generation digital solutions to enhance the customer experience (CX) for global and disruptive brands. The company&rsquo;s services support the full lifecycle of its clients&rsquo; digital transformation journeys and enable them to more quickly embrace next-generation digital technologies to deliver better business outcomes. TELUS International&rsquo;s integrated solutions and capabilities span digital strategy, innovation, consulting and design, digital transformation and IT lifecycle solutions, data annotation and intelligent automation, and omnichannel CX solutions that include content moderation, trust and safety solutions, and other managed solutions. Fueling all stages of company growth, TELUS International partners with brands across high growth industry verticals, including tech and games, communications and media, eCommerce and fintech, healthcare, and travel and hospitality.</p>\n<p><strong>Industry</strong><br><span style=\"color: rgb(126, 140, 141);\">IT Services and IT Consulting</span><br><br><strong>Company size</strong><br><span style=\"color: rgb(126, 140, 141);\">10,001+ employees</span><br><span style=\"color: rgb(126, 140, 141);\">29,162 on LinkedIn&nbsp;</span><br><br><strong>Headquarters</strong><br><span style=\"color: rgb(126, 140, 141);\">Vancouver, British Columbia</span></p>', 'Lopues North-West', 'Bacolod', 'Brgy Balay', 'Balay', 'Education', '13579', '9999', 8888, 'giga_chad_steven.jpg', '2023-06-29 10:57:41'),
(8, 0, 'Jideh C. Demonteverde', 'jd@gmail.com', '', 'Spark ni Jd', 'Bacolod', 'Patricia Homes', 'Balay ni jd', 'Transportation and Logistics', '111112', '767676', 5555, 'default.png', '2023-06-29 11:00:18');

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
(37, 1, 1, 'assistant manager', '2023-06-07', '2023-06-17', 'part time', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere quam massa, quis facilisis enim mollis eget. Sed sollicitudin tortor vel nibh sollicitudin sagittis. Fusce tempor arcu at leo venenatis', '2023-06-30 00:00:00', 1, '0000-00-00'),
(38, 7, 29, 'manager sa tanan', '2011-01-18', '2023-06-30', 'Expired', 10, 'its me ', '2023-06-30 00:00:00', 0, '0000-00-00'),
(39, 6, 14, 'member', '2023-06-02', '2023-06-30', 'not hired', 2, 'hehehe', '2023-06-30 00:00:00', 0, '0000-00-00'),
(40, 8, 31, 'janitor', '2023-06-03', '2023-06-30', 'wala', 2, 'hahahaha', '2023-06-30 15:29:37', 0, '0000-00-00'),
(41, 1, 27, 'CEO', '2009-02-18', '2021-02-02', 'its status', 10, 'a god dizon', '2023-06-30 15:30:55', 0, '0000-00-00'),
(42, 6, 28, 'Manager', '2023-06-06', '2023-06-29', 'Bakod', 999, 'SSSSSSSS', '2023-06-30 16:03:54', 0, '0000-00-00'),
(50, 1, 14, 'worker', '2023-05-03', '2023-07-20', 'full time', 3, '', '2023-07-06 11:19:17', 0, NULL),
(55, 6, 1, 'manager', '2023-05-12', '2023-07-14', 'full time', 5, '', '2023-07-07 14:14:34', 1, NULL),
(62, 8, 1, 'Customer', '2023-07-11', '2023-07-19', 'Semi Full Time', 99, '', '2023-07-11 14:51:06', 0, NULL);

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
-- Table structure for table `tbl_jobposting`
--

CREATE TABLE `tbl_jobposting` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp(),
  `filled` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_jobposting`
--

INSERT INTO `tbl_jobposting` (`id`, `employer_id`, `title`, `description`, `date_posted`, `filled`) VALUES
(24, 6, 'final na dis', 'last', '2023-07-04 11:05:49', 'OPEN'),
(28, 6, 'job posting', 'description', '2023-07-04 14:24:56', 'OPEN'),
(32, 7, 'Sugar dad', 'apply now', '2023-07-04 15:39:00', 'OPEN'),
(33, 1, 'Virtual Assistant | WORK-FROM-HOME', 'At Outsourced Doers we recruit smart-working home-based Digital Marketing Virtual Assistants (VAs) and match them with clients (known as Founders) globally.\r\n\r\nThe Digital Marketing Virtual Assistant role is a remote assistant who will handle all the aspects of digital marketing and administrative work for the client.\r\n\r\nSimply put, digital marketing is a term used to describe online advertising. Common formats include email marketing, social media marketing, display advertising, blogs, and other digital formats.', '2023-07-04 15:40:15', 'OPEN'),
(35, 1, 'Technical Support Engineer I, Document Control - Blended WFH', 'In this role, you will:\r\n\r\nIdentify applicable documents as per the customer’s requirements and specifications.\r\nAttend document review meetings with the Project Administrator, Project Manager, and Document Controller.\r\nManage the documentation approval cycle and final documentation delivery to the customer (gather, prepare, and submit).', '2023-07-04 16:03:35', 'OPEN'),
(36, 1, 'Assistant Manager, Accounting| Urdaneta', 'Job Description:\r\n\r\nASSISTS IN OPERATIONS AND MANAGEMENT: Provides assistance for the overall operations and management of the accounting department of the assigned business unit\r\n\r\n· IMPLEMENTATION\r\n\r\nEnsures efficient implementation of integral plan for the control of financial transactions\r\n\r\n· REPORTS AND ANALYSIS', '2023-07-07 10:20:58', 'OPEN'),
(37, 1, 'Copywriter (Hybrid Working)', '<div class=\"z1s6m00 _1hbhsw66e\">\r\n<h4 class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7il _1d0g9qk4 y44q7iv y44q7i21\">Job Highlights</h4>\r\n</div>\r\n<div class=\"z1s6m00 _1hbhsw66e\">\r\n<ul class=\"z1s6m00 z1s6m03 _5135ge0 _5135ge6\">\r\n<li class=\"z1s6m00 _1hbhsw66u\">\r\n<div class=\"z1s6m00 _1hbhsw65a\">\r\n<div class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">\r\n<div class=\"z1s6m00 _1hbhsw65a _1hbhsw6fe _1hbhsw64 of5ilj2\" aria-hidden=\"true\">\r\n<div class=\"z1s6m00 _1hbhsw65u _1mx61b40 _1mx61b42\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"z1s6m00 _1hbhsw6r _1hbhsw6p _1hbhsw6a2\"><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">Award-winning culture and strong commitment to company values</span></div>\r\n</div>\r\n</li>\r\n<li class=\"z1s6m00 _1hbhsw66u\">\r\n<div class=\"z1s6m00 _1hbhsw65a\">\r\n<div class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">\r\n<div class=\"z1s6m00 _1hbhsw65a _1hbhsw6fe _1hbhsw64 of5ilj2\" aria-hidden=\"true\">\r\n<div class=\"z1s6m00 _1hbhsw65u _1mx61b40 _1mx61b42\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"z1s6m00 _1hbhsw6r _1hbhsw6p _1hbhsw6a2\"><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">SEEK is listed in the Top 20 Most Innovative Companies by Forbes</span></div>\r\n</div>\r\n</li>\r\n<li class=\"z1s6m00 _1hbhsw66u\">\r\n<div class=\"z1s6m00 _1hbhsw65a\">\r\n<div class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">\r\n<div class=\"z1s6m00 _1hbhsw65a _1hbhsw6fe _1hbhsw64 of5ilj2\" aria-hidden=\"true\">\r\n<div class=\"z1s6m00 _1hbhsw65u _1mx61b40 _1mx61b42\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"z1s6m00 _1hbhsw6r _1hbhsw6p _1hbhsw6a2\"><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">Founded in Melbourne, SEEK is now 6,000 people strong</span></div>\r\n</div>\r\n</li>\r\n</ul>\r\n</div>', '2023-07-07 10:31:11', 'OPEN'),
(40, 1, 'Senior Manager/Associate Vice President (AVP) ', '<div class=\"z1s6m00 _1hbhsw66e\">\r\n<h4 class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7il _1d0g9qk4 y44q7iv y44q7i21\">Job Description</h4>\r\n</div>\r\n<div class=\"z1s6m00 _1hbhsw66e\">\r\n<div class=\"_1x1c7ng0\" data-automation=\"jobDescription\">\r\n<div class=\"z1s6m00\">\r\n<p>The Trade &amp; Working Capital Operations group processes a variety of products that support international commerce by facilitating the purchase and sale of goods. The Trade &amp; Working Capital unit, at Philippines Corporate Center is responsible for the following set of activities for Asia Pacific, Europe, Middle East &amp; Africa and United States region:</p>\r\n<ul>\r\n<li>Issuance and Advising of Documentary Letters of Credit including&nbsp;Document Checking &amp; Remittances/Payments</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Settlement/Payments of Import &amp; Export bills under Letters of Credit (LC), Collections &amp; Open Account (OA) including&nbsp;Trade Advances/Loans &amp;&nbsp;Bank to Bank Reimbursements</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Documentary Collections &amp;&nbsp;Open Account</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Supply Chain Finance</li>\r\n</ul>\r\n<p><strong>Job Responsibilities:</strong></p>\r\n<p>As Specialty Product Manager II (Associate II) working in Night Shift, your key responsibilities are to:</p>\r\n<ul>\r\n<li>Manage the Commercial Letters of Credit (LC) &amp; Collections Team in the night shift, including being directly responsible for 5+ employees. Conduct daily huddles and meetings to pass on any process related updates. Create an inclusive environment for all employees</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Drive the goals setup by the Trade &amp; Working Capital Management. Co-ordinate with our ops partners globally to manage the work</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Processing/Releasing Collections &amp; Letters of Credit (LC) products Import Letters of Credit (LC) Issuance, Export Letters of Credit (LC) Advising/Confirmation &amp; Document Checking of Import Letters of Credit (LC) for our global clients</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Ensure the transactions are processed as per J.P. Morgan (JPM) policies as well as&nbsp;International Chamber of Commerce (ICC)&nbsp;Rules like&nbsp;Uniform Customs and Practice for Documentary Credits (UCP600)/ISBP(International Standard Banking Practice)/Uniform Rules for Bank-to-Bank Reimbursements (URR).</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Ensure all transactions assigned to the team are completed with utmost quality as per agreed Service Level Agreement (SLA)</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Monitor queues and assignment of transaction to the team including pending follow-up</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Identify any red flags/Office of Foreign Assets Control (OFAC)&nbsp;regulatory issues/Anti-Money Laundering (AML) &amp; Boycott language breach in the transaction and escalate for review</li>\r\n</ul>\r\n<p><strong>Required qualifications, capabilities, and skills:</strong></p>\r\n<ul>\r\n<li>4+ years of experience in managing a team</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Self-directed, highly motivated. Ability to balance multiple tasks and responsibilities. Strong work ethic and &rdquo;can do&rdquo; attitude.</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Ability to work independently and in a team environment, meeting tight deadlines. Must have the ability to work efficiently across the organization, cross&ndash;functional teams and multiple stakeholders. Willing to go above &amp; beyond to ensure timely delivery.</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Well versed with Uniform Rules for Collections (URC), Uniform Customs and Practice for Documentary Credits (UCP), Uniform Rules for Bank-to-Bank Reimbursements under Documentary Credits (URR) &amp; International Standard Banking Practice (ISBP)</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Subject Matter Expertise in the Letters of Credit (LC) Issuance/Advising/Confirmation &amp; Document checking process</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Project Management, Queue Monitoring, Work Allocation and Prioritization</li>\r\n</ul>\r\n<br>\r\n<ul>\r\n<li>Understanding of US Regulations &amp;&nbsp;Office of Foreign Assets Control (OFAC) Compliance</li>\r\n</ul>\r\n<p><strong>Preferred qualifications, capabilities and skills:</strong></p>\r\n<ul>\r\n<li>Certificate for Documentary Credit Specialists (CDCS) &amp; Certificate in International Trade and Finance (CITF) certifications will be an added preference</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', '2023-07-07 10:48:04', 'OPEN'),
(41, 1, 'System Support Analyst I (Service Desk)', '<div class=\"z1s6m00 _1hbhsw66y _1hbhsw673 _1hbhsw674\">\n<div class=\"z1s6m00\" data-automation=\"job-details-job-highlights\">\n<div class=\"z1s6m00 _5135ge0 _5135ge2\">\n<div class=\"z1s6m00 _1hbhsw66e\">\n<h4 class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7il _1d0g9qk4 y44q7iv y44q7i21\">Job Highlights</h4>\n</div>\n<div class=\"z1s6m00 _1hbhsw66e\">\n<ul class=\"z1s6m00 z1s6m03 _5135ge0 _5135ge6\">\n<li class=\"z1s6m00 _1hbhsw66u\">\n<div class=\"z1s6m00 _1hbhsw65a\">\n<div class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">\n<div class=\"z1s6m00 _1hbhsw65a _1hbhsw6fe _1hbhsw64 of5ilj2\" aria-hidden=\"true\">\n<div class=\"z1s6m00 _1hbhsw65u _1mx61b40 _1mx61b42\">&nbsp;</div>\n</div>\n</div>\n<div class=\"z1s6m00 _1hbhsw6r _1hbhsw6p _1hbhsw6a2\"><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">A competitive salary and benefits</span></div>\n</div>\n</li>\n<li class=\"z1s6m00 _1hbhsw66u\">\n<div class=\"z1s6m00 _1hbhsw65a\">\n<div class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">\n<div class=\"z1s6m00 _1hbhsw65a _1hbhsw6fe _1hbhsw64 of5ilj2\" aria-hidden=\"true\">\n<div class=\"z1s6m00 _1hbhsw65u _1mx61b40 _1mx61b42\">&nbsp;</div>\n</div>\n</div>\n<div class=\"z1s6m00 _1hbhsw6r _1hbhsw6p _1hbhsw6a2\"><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">Great workspaces with dedicated and motivated colleagues</span></div>\n</div>\n</li>\n<li class=\"z1s6m00 _1hbhsw66u\">\n<div class=\"z1s6m00 _1hbhsw65a\">\n<div class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">\n<div class=\"z1s6m00 _1hbhsw65a _1hbhsw6fe _1hbhsw64 of5ilj2\" aria-hidden=\"true\">\n<div class=\"z1s6m00 _1hbhsw65u _1mx61b40 _1mx61b42\">&nbsp;</div>\n</div>\n</div>\n<div class=\"z1s6m00 _1hbhsw6r _1hbhsw6p _1hbhsw6a2\"><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">A variety of career development tools, resources &amp; opportunities</span></div>\n</div>\n</li>\n</ul>\n</div>\n</div>\n</div>\n</div>\n<div class=\"z1s6m00 _1hbhsw66y _1hbhsw673 _1hbhsw674\">\n<div class=\"z1s6m00 _5135ge0 _5135ge2\">\n<div class=\"z1s6m00 _1hbhsw66e\">\n<h4 class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7il _1d0g9qk4 y44q7iv y44q7i21\">Job Description</h4>\n</div>\n<div class=\"z1s6m00 _1hbhsw66e\">\n<div class=\"_1x1c7ng0\" data-automation=\"jobDescription\">\n<div class=\"z1s6m00\">\n<p>Are you curious, motivated, and forward-thinking? At FIS you&rsquo;ll have the opportunity to work on some of the most challenging and relevant issues in financial services and technology. Our talented people empower us, and we believe in being part of a team that is open, collaborative, entrepreneurial, passionate and above all fun.</p>\n<p><strong><u>WHAT YOU WILL DO:</u></strong></p>\n<ul>\n<li>Drives issue resolution by making critical decisions that may impact multiple clients&rsquo; processing.</li>\n<li>Proactively investigates known and unknown error conditions and follows prescribed error correction procedures when they apply.</li>\n<li>Performs monitoring and operational management functions for associated hardware and software within 24x7 processing environment.</li>\n<li>Maintains peak performance at full capacity for all systems.</li>\n<li>Follows new/improved work procedures where appropriate, tests and implements program and/or systems changes, responds to processing problems and exercises sound judgment to make client impacting processing adjustments.</li>\n<li>Recognizes abnormal processing conditions and makes appropriate response decisions.</li>\n<li>Follows escalation procedures when appropriate to resolve errors in a timely manner.</li>\n<li>Makes use of available documentation to resolve errors and identifies/implements documentation gaps.</li>\n<li>Recognizes and implements/automates process enhancements.</li>\n<li>Monitors and responds accordingly to an array of system and application generated messages.</li>\n<li>Responds in a timely manner to questions and requests from incoming calls and incident tickets.</li>\n<li>Proactively maintains contact with clients and serves as client advocate to internal organizations.</li>\n<li>Analyzes problems/trends with client systems and applications and takes steps to avoid recurrence.</li>\n<li>Works on internal and external projects of various sizes, complexity.</li>\n<li>Contributes to existing and develops new solution approaches to the IT environment.</li>\n<li>Other related duties assigned as needed.</li>\n</ul>\n<p><strong><u>WHAT YOU BRING:</u></strong></p>\n<ul>\n<li><u>At least 3-6 years of experience as Service Desk Technical Support (L1/L2 Support)</u></li>\n<li><u>Mostly Virtual setup but must be willing to report to the office if needed (usually twice a week). Office location is at Ecoplaza Bldg, Magallanes, Makati</u></li>\n<li><u>Must be willing to work on night shift and shift schedules if needed</u></li>\n<li><u>Experience in Active Directory</u></li>\n<li><u>Experience in MS Exchange Server</u></li>\n<li><u>Experience in Server Troubleshooting</u></li>\n<li><u>Experience in Desktop Troubleshooting</u></li>\n<li>College Undergraduates and Non-Bachelor\'s Degree holders are welcome to apply</li>\n<li>Demonstrated knowledge of FIS products and services, financial services industry and mainframe and/or open systems operating systems</li>\n<li>Knowledge of clients objectives/business priorities and FIS role in achieving</li>\n<li>Ability to effectively use production control tools and resources encompassing mainframe, open system processing, processor link/Connex software, ATM&rsquo;s, environments</li>\n<li>Excellent customer service skills that build high levels of customer satisfaction for internal and external customers</li>\n<li>Excellent analytical, decision-making, problem-solving, team and time management skills</li>\n<li>Excellent verbal and written communication skills to technical and non-technical audiences of various levels in the organization, e.g., executive, management, individual contributors</li>\n<li>Willingly shares relevant technical and/or industry knowledge and expertise to other resources</li>\n<li>Ability to persuade and influence others on the best approach to take</li>\n<li>Ability to multi-task, deal with predefined deadlines</li>\n<li>Flexibility, versatility, dependability, positive outlook, strong work ethic</li>\n<li>Resourceful and proactive in gathering information and sharing ideas</li>\n<li>Ability to analyze all system processing delays, failures and errors to determine the appropriate action necessary for resolution</li>\n<li>Ability to use troubleshooting applications and tools for first and second level issues</li>\n<li>Ability to use and reference system related documentation</li>\n</ul>\n</div>\n</div>\n</div>\n</div>\n</div>\n<div class=\"z1s6m00 _1hbhsw66y _1hbhsw673 _1hbhsw674\">\n<div class=\"z1s6m00 _5135ge0 _5135ge2\">\n<div class=\"z1s6m00 _1hbhsw66e\">\n<h4 class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7il _1d0g9qk4 y44q7iv y44q7i21\">Additional Information</h4>\n</div>\n<div class=\"z1s6m00 _1hbhsw66e\">\n<div class=\"z1s6m00 _5135ge0 _5135ge7\">\n<div class=\"z1s6m00 _1hbhsw65a _1hbhsw6gi _5135ge2f\">\n<div class=\"z1s6m00 _1hbhsw6r pmwfa50 pmwfa57\">\n<div class=\"z1s6m00 _1hbhsw6n _1hbhsw66y _1hbhsw6aa\">\n<div class=\"z1s6m00 _5135ge0 _5135ge5\">\n<div class=\"z1s6m00 _1hbhsw66q\"><strong><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i3 y44q7i21 _1d0g9qk4 y44q7ia\">Career Level&nbsp;</span></strong></div>\n<div class=\"z1s6m00 _1hbhsw66q\"><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">1-4 Years Experienced Employee</span></div>\n<div class=\"z1s6m00 _1hbhsw66q\">&nbsp;</div>\n</div>\n</div>\n</div>\n<div class=\"z1s6m00 _1hbhsw6r pmwfa50 pmwfa57\">\n<div class=\"z1s6m00 _1hbhsw6n _1hbhsw66y _1hbhsw6aa\">\n<div class=\"z1s6m00 _5135ge0 _5135ge5\">\n<div class=\"z1s6m00 _1hbhsw66q\"><strong><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i3 y44q7i21 _1d0g9qk4 y44q7ia\">Qualification</span></strong></div>\n<div class=\"z1s6m00 _1hbhsw66q\"><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">Not Specified</span></div>\n<div class=\"z1s6m00 _1hbhsw66q\">&nbsp;</div>\n</div>\n</div>\n</div>\n<div class=\"z1s6m00 _1hbhsw6r pmwfa50 pmwfa57\">\n<div class=\"z1s6m00 _1hbhsw6n _1hbhsw66y _1hbhsw6aa\">\n<div class=\"z1s6m00 _5135ge0 _5135ge5\">\n<div class=\"z1s6m00 _1hbhsw66q\"><strong><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i3 y44q7i21 _1d0g9qk4 y44q7ia\">Years of Experience</span></strong></div>\n<div class=\"z1s6m00 _1hbhsw66q\"><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">3 years</span></div>\n</div>\n</div>\n</div>\n<div class=\"z1s6m00 _1hbhsw6r pmwfa50 pmwfa57\">\n<div class=\"z1s6m00 _1hbhsw6n _1hbhsw66y _1hbhsw6aa\">\n<div class=\"z1s6m00 _5135ge0 _5135ge5\">\n<div class=\"z1s6m00 _1hbhsw66q\"><strong><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i3 y44q7i21 _1d0g9qk4 y44q7ia\">Job Type</span></strong></div>\n<div class=\"z1s6m00 _1hbhsw66q\"><span class=\"z1s6m00 _1hbhsw64y y44q7i0 y44q7i1 y44q7i21 _1d0g9qk4 y44q7ia\">Full-Time</span></div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>', '2023-07-07 11:17:36', 'OPEN');

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
(1, 1, 'Interactive Workshop on UI/UX Design: Crafting Engaging User Experiences', 'In this hands-on workshop, our expert instructors will guide you through the entire UI/UX design process, from understanding user needs to designing prototypes and conducting usability tests. Whether you\'re a seasoned designer looking to enhance your skills or a beginner eager to enter the field, this workshop offers a comprehensive learning experience tailored to all proficiency levels.', 'SMX Convention', 'Bacolod City', '2023-07-06', '2023-07-06', 3),
(2, 1, 'TestTitleFront-End Web Development Workshop: Building Modern and Responsive User Interfaces', 'In this hands-on training, our experienced instructors will guide you through the essential concepts and tools that form the foundation of front-end development. Whether you\'re a beginner looking to enter the field or an experienced developer seeking to enhance your skills, this workshop offers a dynamic learning experience tailored to all proficiency levels.', 'USLS Coliseum', 'Bacolod City', '2021-07-06', '2023-07-28', 5),
(3, 1, 'Full-Stack Web Development Workshop: Creating Dynamic and Scalable Web Applications', 'In this immersive training program, our experienced instructors will guide you through the entire web development stack, covering both front-end and back-end technologies. Whether you\'re a beginner taking your first steps into web development or an experienced developer seeking to expand your skill set, this workshop offers a dynamic learning experience tailored to all proficiency levels.', 'CSAB Gymnasium', 'Bacolod City', '2023-07-07', '2023-07-28', 20),
(4, 14, 'dfg', 'sfg', 'fg', 'dfgf', '2023-05-25', '2023-07-13', 12),
(8, 27, 'Yes I am Kat', '<p style=\"text-align: justify;\">Yes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am KatYes I am Kat</p>', 'Kat Function Halll', 'Meow City', '2023-04-14', '2023-11-29', 2000);

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
(2, 'faustojcboko@gmail.com', '95d04a4f3e63f77b08a01dd95694292320e952aa', 'EMPLOYEE', 'u@$~jgJJD4U1w^smk1G.w(Y&2C8RXOFCD0NUTvIQ1AsY9V<~hD'),
(3, 'lopues@gmail.com', '488ba4bc58d39f02c84d51f2d579ebcb6f614b6f', 'EMPLOYER', 'f~oZ!yr7%Q^CEpMV&S#Z8TICz(r$?(GOrQaYM>rjK&Gt64gCUO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_applicant_employee_id` (`employee_id`),
  ADD KEY `fk_applicant_jobposting_id` (`jobposting_id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jobposting_employer_id` (`employer_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_employee_educ`
--
ALTER TABLE `tbl_employee_educ`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_employee_skill`
--
ALTER TABLE `tbl_employee_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_employer`
--
ALTER TABLE `tbl_employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_employment`
--
ALTER TABLE `tbl_employment`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_skill`
--
ALTER TABLE `tbl_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD CONSTRAINT `fk_applicant_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_applicant_jobposting_id` FOREIGN KEY (`jobposting_id`) REFERENCES `tbl_jobposting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employee_educ`
--
ALTER TABLE `tbl_employee_educ`
  ADD CONSTRAINT `fk_Employee_ID` FOREIGN KEY (`Employee_id`) REFERENCES `tbl_employee` (`ID`);

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
-- Constraints for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD CONSTRAINT `fk_training_employee_id` FOREIGN KEY (`Employee_id`) REFERENCES `tbl_employee` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
