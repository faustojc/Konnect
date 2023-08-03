-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 02:24 PM
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
  `job_title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_applicant`
--

INSERT INTO `tbl_applicant` (`id`, `job_id`, `employee_id`, `job_title`, `status`, `date_created`) VALUES
(90, 51, 50, 'Short-term Project-based Back End Web Developer', 'ACCEPTED', '2023-08-02'),
(94, 53, 50, 'Web developer (Pasig)', 'ACCEPTED', '2023-08-03'),
(95, 54, 50, 'Remote Software Developer', 'ACCEPTED', '2023-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education`
--

CREATE TABLE `tbl_education` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employed`
--

CREATE TABLE `tbl_employed` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `job_description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `date_started` date NOT NULL DEFAULT current_timestamp(),
  `date_ended` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employed`
--

INSERT INTO `tbl_employed` (`id`, `employer_id`, `employee_id`, `job_title`, `job_type`, `job_description`, `is_active`, `is_verified`, `date_started`, `date_ended`) VALUES
(10, 1, 32, 'Full Stack Developer', 'Full time', '<p>hahahaha</p>', 0, 0, '2023-08-01', '2023-10-19'),
(11, 1, 50, 'Web developer (Pasig)', 'Permanent', NULL, 1, 0, '2023-08-03', NULL),
(12, 1, 50, 'Short-term Project-based Back End Web Developer', 'Shift work', NULL, 1, 0, '2023-08-03', NULL),
(13, 1, 50, 'Remote Software Developer', 'Full time', NULL, 1, 0, '2023-08-03', NULL);

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
  `Region` int(11) NOT NULL,
  `Province` int(11) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Barangay` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `SSS` varchar(255) NOT NULL,
  `Tin` varchar(255) NOT NULL,
  `Phil_health` varchar(255) NOT NULL,
  `Pag_ibig` varchar(255) NOT NULL,
  `Introduction` text NOT NULL,
  `Employee_image` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`ID`, `user_id`, `Date_created`, `Fname`, `Lname`, `Mname`, `Bday`, `Gender`, `Cstat`, `Religion`, `Cnum`, `Email`, `Region`, `Province`, `City`, `Barangay`, `Address`, `Title`, `SSS`, `Tin`, `Phil_health`, `Pag_ibig`, `Introduction`, `Employee_image`) VALUES
(32, 6, '0000-00-00 00:00:00', 'LEFT', 'DEADZZ', 'FOUR', '2022-08-16', 'male', 'single', 'Chicken Joyism', '5655656', 'chicken@gmail.com', 0, 0, 'Bacolod City', 'Chicken', 'Charito Heights', 'L4D2', '1233', '22222', '331313', '12323131', '<p>hahahaha</p>', 'le_four_ded_2.jpg'),
(33, 7, '0000-00-00 00:00:00', 'Kayla', 'Pajanconi', 'Tangub', '1999-10-13', 'female', 'single', 'Roman Catholic', '09222667813', 'kaypajanconi@gmail.com', 0, 0, 'Hinigaran', 'camba-og', 'Dinandan', '', '', '', '', '', '', 'default.png'),
(36, 20, '2023-07-19 13:15:15', 'Martin', 'Cuenca', 'Benedicto', '2001-11-24', 'male', 'single', 'Catholic', '0947950555', 'polcuenca242@gmail.com', 0, 0, 'BACOLOD CITY', 'Mansilingan', 'adelfa st. victorina heights', '', '19292', '020', '2626', '626', '', '347548042_184571507478516_7611925746711583073_n2.jpg'),
(40, 25, '2023-07-27 09:50:15', 'Katrina', 'Dizon', 'G.', '2001-03-27', 'female', 'single', 'Catholic', '5555', 'katrina@gmail.com', 0, 0, 'BACOLOD CITY', 'Villamonte', 'kat\'s street', '', '', '', '', '', '', 'default.png'),
(41, 26, '2023-07-27 10:20:19', 'John Martis', 'mART', 'Bo', '2023-07-05', 'male', 'single', 'dgfdgfdgfdgd', '123444', 'doe@gmail.com', 0, 0, 'dfgdgdgd', 'dgfdgfd', 'dfgdgfdf', '', '', '', '', '', '<p>gwapo ko</p>', 'default.png'),
(50, 35, '2023-08-02 12:14:28', 'Fausto JC', 'Boko', '', '2001-05-06', 'male', 'single', 'Catholic', '09085579204', 'faustojcboko@gmail.com', 0, 0, 'Bacolod City (Capital)', 'Granada', 'Charito Heights', 'Full Stack Developer', '', '', '', '', '<p><strong>GWAPO KO</strong></p>', 'pp.jpg');

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
(34, 32, 'PHP', 'beginner', 2),
(36, 32, 'C++', 'beginner', 2),
(37, 32, 'laravel', 'beginner', 2),
(38, 32, 'JS', 'beginner', 2),
(39, 36, 'PHP', 'beginner', 2),
(40, 41, 'PHP', 'beginner', 123),
(41, 41, 'Javascript', 'beginner', 123),
(42, 32, 'C#', 'beginner', 1),
(43, 50, 'PHP', 'advance', 2),
(44, 50, 'JavaScript', 'advance', 2);

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
  `region` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `business_type` varchar(255) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `sss` varchar(255) NOT NULL,
  `tin` int(12) NOT NULL,
  `image` tinytext DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_employer`
--

INSERT INTO `tbl_employer` (`id`, `user_id`, `employer_name`, `email`, `summary`, `tradename`, `region`, `province`, `city`, `barangay`, `address`, `business_type`, `contact_number`, `sss`, `tin`, `image`, `is_verified`, `date_created`) VALUES
(1, 3, 'LOPUES EAST', 'lopues@gmail.com', '<p>In the year 1992, Lopue\'s Department Store incorporated underwent changes in its corporate structure and establishes three (3) new independent corporations. From mere branch, Lopue\'s San Sebastian had stood independently to rebuild its own image and identity as it has under the stewardship of <span style=\"text-decoration: underline;\">Mr. Leonito D. Lopue</span>. XD<br><br>Despite the store reorganization, it has maintained its structure as one of the top taxpayers of Bacolod City. Starting with annual sales of 35 million, the store had steadily increased its share in the market to i85 million and now relishes a sales volume of 220 million. as befits a pioneer organization has stood the test of time as it has maintained its image as \"<strong>Your complete Department store and supermarket for high quality products and services.</strong>\"</p>', 'Lopues ni Gonrad', '', '', 'Bacolod city', 'villamonte', 'Sa lopues east ngayunn', 'Retail', '123456', '123456789', 2147483647, 'Screenshot_2023-03-08_101524.png', 0, '2023-06-27 09:47:55'),
(6, 2, 'Business Inn', 'businessinn@gmail.com', '<p><span style=\"font-family: \'arial black\', sans-serif;\">Table of truth</span></p>\n<table style=\"border-collapse: collapse; width: 99.9807%;\" border=\"1\"><colgroup><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"></colgroup>\n<tbody>\n<tr>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">gwapo</td>\n<td style=\"text-align: center;\">mas gwapo</td>\n<td style=\"text-align: center;\">pinaka gwapo</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">bok</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">x</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">pol</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">jide</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n</tr>\n</tbody>\n</table>', 'Business Inn Hotel', '', '', 'Bacolod city', 'Granadaaa', 'Charito Heights', 'Hospitality and Tourism', '0908', '22222', 90855, 'Screenshot_20221206_074006.png', 0, '2023-06-27 16:23:54'),
(7, 4, 'Chowking Bing Chilling', 'pol@gmail.com', '<p>TELUS International designs, builds and delivers next-generation digital solutions to enhance the customer experience (CX) for global and disruptive brands. The company&rsquo;s services support the full lifecycle of its clients&rsquo; digital transformation journeys and enable them to more quickly embrace next-generation digital technologies to deliver better business outcomes. TELUS International&rsquo;s integrated solutions and capabilities span digital strategy, innovation, consulting and design, digital transformation and IT lifecycle solutions, data annotation and intelligent automation, and omnichannel CX solutions that include content moderation, trust and safety solutions, and other managed solutions. Fueling all stages of company growth, TELUS International partners with brands across high growth industry verticals, including tech and games, communications and media, eCommerce and fintech, healthcare, and travel and hospitality.</p>\n<p><strong>Industry</strong><br><span style=\"color: rgb(126, 140, 141);\">IT Services and IT Consulting</span><br><br><strong>Company size</strong><br><span style=\"color: rgb(126, 140, 141);\">10,001+ employees</span><br><span style=\"color: rgb(126, 140, 141);\">29,162 on LinkedIn&nbsp;</span><br><br><strong>Headquarters</strong><br><span style=\"color: rgb(126, 140, 141);\">Vancouver, British Columbia</span></p>', 'Chowking Bing Chilling', '', '', 'Bacolod city', 'Brgy Balay', 'Balay', 'Education', '13579', '9999', 8888, 'chowking.png', 0, '2023-06-29 10:57:41'),
(12, 24, 'AKKKKKIIIINNGGGG SINNTAAAAA', 'watsons@gmail.com', '', 'AKKKKKIIIINNGGGG SINNTAAAAA', '', '', 'Bacolod city', 'Barangay 12', 'GF SM City Bacolod North Wing Poblacion Reclamation Area', 'Retail', '09123456789', '', 0, 'gelo.png', 0, '2023-07-20 09:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employment`
--

CREATE TABLE `tbl_employment` (
  `id` int(255) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `date_started` datetime NOT NULL DEFAULT current_timestamp(),
  `date_ended` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_employment`
--

INSERT INTO `tbl_employment` (`id`, `employer_id`, `employee_id`, `job_title`, `job_type`, `job_description`, `is_verified`, `date_started`, `date_ended`) VALUES
(76, 1, 32, 'Full Stack Developer', 'Full time', '<p>hahahaha</p>', 0, '2023-08-01 00:00:00', '2023-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `rating` tinyint(5) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `user_id`, `from_user_id`, `message`, `rating`, `date_created`) VALUES
(1, 6, 3, '<p><strong>GOOD JOB!</strong></p>', 4, '2023-07-24'),
(2, 6, 3, '<p><strong>GOOD JOB!</strong></p>', 4, '2023-07-24'),
(3, 6, 3, '<p>boko</p>', 5, '2023-07-24'),
(4, 6, 3, '<p>bhtbggb</p>', 4, '2023-07-24'),
(12, 6, 3, '<p>bokokoooo</p>', 2, '2023-07-27'),
(13, 6, 3, '<p>ggrgrgrg</p>', 1, '2023-07-27'),
(14, 24, 6, '<p>AKING SINTA</p>', 1, '2023-07-27'),
(15, 3, 6, '<p>hatdog</p>', 2, '2023-07-27'),
(16, 2, 6, '<p>hahhaasdasd</p>', 1, '2023-07-27');

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
(28, 32, 7),
(30, 36, 1),
(31, 36, 6),
(33, 41, 1),
(37, 50, 6),
(38, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobposting`
--

CREATE TABLE `tbl_jobposting` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp(),
  `start_date` date DEFAULT NULL,
  `filled` varchar(255) DEFAULT NULL,
  `salary` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `skills_req` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_jobposting`
--

INSERT INTO `tbl_jobposting` (`id`, `employer_id`, `title`, `description`, `location`, `date_posted`, `start_date`, `filled`, `salary`, `shift`, `job_type`, `skills_req`) VALUES
(33, 1, 'Virtual Assistant | WORK-FROM-HOME', 'At Outsourced Doers we recruit smart-working home-based Digital Marketing Virtual Assistants (VAs) and match them with clients (known as Founders) globally.\n\nThe Digital Marketing Virtual Assistant role is a remote assistant who will handle all the aspects of digital marketing and administrative work for the client.\n\nSimply put, digital marketing is a term used to describe online advertising. Common formats include email marketing, social media marketing, display advertising, blogs, and other digital formats.', 'Bacolod City', '2023-07-04 15:40:15', NULL, 'OPEN', '10,000.00', 'Day-Shift', 'Permanent', ''),
(35, 1, 'Technical Support Engineer I, Document Control - Blended WFH', 'In this role, you will:\r\n\r\nIdentify applicable documents as per the customer’s requirements and specifications.\r\nAttend document review meetings with the Project Administrator, Project Manager, and Document Controller.\r\nManage the documentation approval cycle and final documentation delivery to the customer (gather, prepare, and submit).', 'Bacolod City', '2023-07-04 16:03:35', NULL, 'OPEN', '', '', '', ''),
(36, 1, 'Assistant Manager, Accounting| Urdaneta', 'Job Description:\r\n\r\nASSISTS IN OPERATIONS AND MANAGEMENT: Provides assistance for the overall operations and management of the accounting department of the assigned business unit\r\n\r\n· IMPLEMENTATION\r\n\r\nEnsures efficient implementation of integral plan for the control of financial transactions\r\n\r\n· REPORTS AND ANALYSIS', 'Bacolod City', '2023-07-07 10:20:58', NULL, 'CLOSED', '', '', '', ''),
(48, 1, 'UI/UX Developer', '<p>A UI/UX job description typically involves designing and improving user interfaces and experiences by conducting user research, creating wireframes and prototypes, collaborating with cross-functional teams, and ensuring a seamless and visually appealing interaction between users and digital products or services.</p>', 'Bacolod City', '2023-07-17 15:37:31', NULL, 'OPEN', '20,000.00', 'Night-Shift', 'Permanent', ''),
(51, 1, 'Short-term Project-based Back End Web Developer', '<p>You&rsquo;ll develop the back-end logic for 2 lens tools/app for the website and also work on different databases that contain lens information.</p>\r\n<p>The project will include developing a (1)&rdquo;lens comparison tool&rdquo; which can take, modify, and display a photo (before vs after photo, like adding a custom filter) depending on the lens information provided (different lens tint/increased saturation via spectrum data). The 2nd tool is a (2) &ldquo;lens selector tool&rdquo; which outputs the appropriate lens for the customer based on the input criteria from a user (functions similar to a query).</p>\r\n<p>The front end of the website will be handled by a different team.<br>This is a work-from-home (WFH) position in the Philippines.</p>\r\n<p>Hue Lens is an entrepreneurial American lens technology company that designs and supplies world-class polymer lenses to customers around the world. We are entrepreneurial, result-focused, and fast-paced. Our lenses deliver the highest enhancement to human visual performance and health.</p>\r\n<p>Position: Project Based<br>Estimated Duration: ~ 3 months<br>Compensation / contract price: ? 200,000 - 300,000 (negotiable) commensurate with work experience, educational attainment, fit, and performance.<br>Time: Output-based, but may have a morning or evening meeting for some updates to match US time.</p>\r\n<p>Note: Successful completion of this project may lead to future projects/opportunities.</p>\r\n<p><strong>Requirements:</strong></p>\r\n<ul>\r\n<li>BS Computer Science / Information Technology degree or equivalent background</li>\r\n<li>Able to communicate well in English (both verbally and in writing)</li>\r\n<li>At least 5 years of professional experience in databases and back-end web development SQL, MySQL, PostgreSQL, MongoDB.</li>\r\n</ul>\r\n<p>Java, PHP</p>\r\n<ul>\r\n<li>Able to show completed projects that showcase their work experience.</li>\r\n<li>Experience in other back-end languages is a plus (C#, C++, Python, etc.).</li>\r\n<li>Great problem solver and follows best practices in web development.</li>\r\n<li>Provides subject matter knowledge and understands the company&rsquo;s overall goals for the application.</li>\r\n</ul>\r\n<p>Job Type: Temporary<br>Contract length: 3 months</p>\r\n<p>Pay: Php75,000.00 - Php100,000.00 per month</p>\r\n<p>Schedule:</p>\r\n<ul>\r\n<li>Flextime</li>\r\n</ul>', 'Bacolod City', '2023-07-22 21:20:50', '2023-11-08', 'Open', 'PHP 75,000 - PHP 100,000 a month', 'Flextime', 'Shift work', 'C++, Java, PHP'),
(52, 1, 'Senior Full Stack Developer', '<p>We specialize in solutions for online video content management and video streaming for web, mobile, and connectedTV / smartTV platforms.</p>\r\n<p>Your expertise in application development, database management, troubleshooting, and security measures will be used to implement UI designs, construct APIs, connect the two, and set up server infrastructure. You will also assist with adding improvements to our products, maintaining code repositories and managing technical documentation.</p>\r\n<p>------------------------------------------------------------------------------------------------------------</p>\r\n<p><strong>Job Details:</strong></p>\r\n<ul>\r\n<li>Job Location: Cebu City Office</li>\r\n<li>Monday - Friday, 9 AM - 6 PM Central Standard Time in the USA with 1 hour break</li>\r\n<li>Salary based on qualifications, PHP 50,000 - PHP 100,000 per month</li>\r\n<li>Full-time job</li>\r\n<li>Paid onboarding provided</li>\r\n</ul>\r\n<p><strong>Job Requirements and Qualifications:</strong></p>\r\n<ul>\r\n<li>At least 5 years experience in frontend web application development with Javascript frameworks such as Angular or React</li>\r\n<li>At least 5 years experience with back-end programming using Python, especially some experience with Django</li>\r\n<li>At least 3 years of Database design and management experience, including proficiency of both SQL and NoSQL databases, especially PostgreSQL</li>\r\n<li>Experience managing git repositories and CI/CD workflows with tools like Jenkins</li>\r\n<li>DevOps knowledge in linux (ubuntu), nginx, and cloud services like Oracle Cloud/AWS</li>\r\n<li>Ability to identify, troubleshoot, and debug application issues to ensure smooth functionality</li>\r\n<li>Knowledge of Agile / Scrum development methodology and workflows</li>\r\n<li>Experience with documentation (System and API structures) using tools like Postman and Swagger etc.</li>\r\n<li>Ability to preform code testing and analysis</li>\r\n<li>Team player is a must, as team collaboration is necessary for all of our positions</li>\r\n<li>College Degree in IT related field of study such as Computer Science or equivalent.</li>\r\n</ul>\r\n<p>Job Type: Full-time</p>\r\n<p>Pay: Php50,000.00 - Php100,000.00 per month</p>\r\n<p>Benefits:</p>\r\n<ul>\r\n<li>Paid training</li>\r\n<li>Pay raise</li>\r\n</ul>\r\n<p>Schedule:</p>\r\n<ul>\r\n<li>8 hour shift</li>\r\n</ul>\r\n<p>Supplemental pay types:</p>\r\n<ul>\r\n<li>13th month salary</li>\r\n</ul>', 'Bacolod City', '2023-07-22 21:29:19', '0000-00-00', 'Open', 'PHP 50,000 - PHP 100,000 a month', 'Day', 'Full time', 'Java, PHP, HTML/CSS, JS'),
(53, 1, 'Web developer (Pasig)', '<p><strong>Responsibilities</strong></p>\r\n<ul>\r\n<li>Cloud-based Web application development using open-source technologies (PHP Laravel or Golang) on AWS.</li>\r\n<li>Play a vital role in the team.</li>\r\n<li>Coordinate with the Singapore HQ team for day-to-day tasks.</li>\r\n<li>Responsible for estimating, planning, managing all tasks, and reporting progress.</li>\r\n<li>Cross-browser compatibility testing.</li>\r\n<li>Run &amp; operate existing production and staging environments, including troubleshooting and impact analysis.</li>\r\n<li>Ad-hoc maintenance support.</li>\r\n<li>Assist in the documentation.</li>\r\n</ul>\r\n<p><strong>Requirements</strong></p>\r\n<ul>\r\n<li>At least&nbsp;<strong>three years</strong>&nbsp;of web development experience in PHP or Go, JavaScript, React JS, PostgreSQL.</li>\r\n<li>Those with more than&nbsp;<strong>five years</strong>&nbsp;experience will be considered as senior position.</li>\r\n<li>Good understanding of API-first approach and FE &amp; BE segregation.</li>\r\n<li>Good understanding of cyber security and OWASP top 10.</li>\r\n<li>Good communicator &amp; self-motivated.</li>\r\n<li>Strong analytical skills.</li>\r\n<li>Problem solver.</li>\r\n<li>A team player.</li>\r\n<li>Able to work independently.</li>\r\n<li>A can-do attitude.</li>\r\n<li>Resourcefulness.</li>\r\n<li>Detail-oriented.</li>\r\n<li>Good time management and responsible.</li>\r\n<li>Willing to learn.</li>\r\n<li>Able to handle stress.</li>\r\n</ul>\r\n<p><strong>Key required skills</strong></p>\r\n<ul>\r\n<li>PHP Laravel or Golang</li>\r\n<li>Frontend (React JS, vanilla JavaScript).</li>\r\n<li>RDBMS SQL (PostgreSQL, MySQL).</li>\r\n<li>AWS services.</li>\r\n</ul>\r\n<p><strong>Good to have skills</strong></p>\r\n<ul>\r\n<li>Linux server administration.</li>\r\n<li>NoSQL (MongoDB, DynamoDB, Redis).</li>\r\n<li>Time series database (QuestDB, Influxdb).</li>\r\n<li>Analytic and visualization tools (Grafana).</li>\r\n<li>Mobile app development experience using Flutter or React Native.</li>\r\n</ul>\r\n<p>Job Types: Full-time, Permanent</p>\r\n<p>Salary: Php50,000.00 - Php100,000.00 per month</p>\r\n<p>Schedule:</p>\r\n<ul>\r\n<li>Day shift</li>\r\n</ul>\r\n<p>Supplemental pay types:</p>\r\n<ul>\r\n<li>13th month salary</li>\r\n</ul>\r\n<p>Ability to commute/relocate:</p>\r\n<ul>\r\n<li>Ortigas Pasig: Reliably commute or planning to relocate before starting work (Required)</li>\r\n</ul>\r\n<p>Application Question(s):</p>\r\n<ul>\r\n<li>When can you start the job?</li>\r\n<li>What is your current salary and expected salary?</li>\r\n<li>Will you willing to take a technical assessment to demonstrate your technical skills?</li>\r\n</ul>\r\n<p>Experience:</p>\r\n<ul>\r\n<li>AWS: 3 years (Preferred)</li>\r\n<li>React JS: 2 years (Preferred)</li>\r\n<li>PostgreSQL: 2 years (Preferred)</li>\r\n<li>PHP Laravel: 5 years (Preferred)</li>\r\n</ul>', 'Bacolod City', '2023-07-22 21:37:20', '2023-10-25', 'Open', 'PHP 50,000 - PHP 100,000 a month', 'Day', 'Permanent', 'PHP, React, Laravel'),
(54, 1, 'Remote Software Developer', '<p>Location: Philippines (remote)</p>\r\n<p>Company Overview:</p>\r\n<p>We are a dynamic and rapidly expanding organization in the e-learning industry, dedicated to providing innovative educational solutions. As part of our growth strategy, we are seeking a skilled Software Developer to join our talented team in the Philippines. This is an exciting opportunity to play a vital role in leading the rebuilding of our current e-learning system, addressing existing bugs, and contributing to its successful relaunch in the market.</p>\r\n<p>Responsibilities:</p>\r\n<p>1. System Rebuilding: Take charge of the rebuilding process for our current e-learning system, leveraging your expertise in software development to enhance its functionality, scalability, and user experience.</p>\r\n<p>2. Bug Fixing: Identify and troubleshoot software issues and bugs within the e-learning system, utilizing problem-solving skills to rectify issues promptly and ensure a smooth user experience.</p>\r\n<p>3. Collaborative Development: Collaborate with cross-functional teams, including designers, product managers, and quality assurance professionals, to ensure the successful implementation of new features and improvements.</p>\r\n<p>4. Technology Stack: Utilize your proficiency in various programming languages and technologies to code, test, and debug software modules, following best practices and coding standards.</p>\r\n<p>5. Performance Optimization: Identify opportunities to optimize the performance and efficiency of the e-learning system, conducting code reviews and implementing improvements to enhance speed, stability, and scalability.</p>\r\n<p>6. Documentation and Reporting: Maintain comprehensive documentation of system changes, feature enhancements, and bug fixes, ensuring clear and concise information for future reference and knowledge transfer.</p>\r\n<p>7. Market Relaunch Support: Collaborate closely with the marketing and business development teams to support the successful relaunch of the e-learning system, providing technical expertise and contributing to the marketing strategy.</p>\r\n<p>8. Agile Development: Participate in agile development processes, including sprint planning, daily stand-ups, and retrospectives, fostering a collaborative and iterative work environment.</p>\r\n<p>Qualifications:</p>\r\n<p>- Bachelor\'s degree in Computer Science, Software Engineering, or a related field.</p>\r\n<p>- Proven experience as a Software Developer, preferably working on large-scale web applications or e-learning systems.</p>\r\n<p>- Strong proficiency in programming languages such as Java, Python, or JavaScript, and related frameworks and libraries.</p>\r\n<p>- Solid understanding of software development principles, methodologies, and best practices.</p>\r\n<p>- Experience with front-end development technologies (HTML, CSS, JavaScript, etc.) and modern web development frameworks (React, Angular, Vue.js, etc.).</p>\r\n<p>- Familiarity with database systems (SQL, NoSQL) and experience in database design and optimization.</p>\r\n<p>- Knowledge of version control systems (Git, SVN) and collaborative development workflows.</p>\r\n<p>- Excellent problem-solving skills with a detail-oriented and analytical mindset.</p>\r\n<p>- Strong communication and teamwork abilities to collaborate effectively with multidisciplinary teams.</p>\r\n<p>- Proven ability to meet project deadlines and deliver high-quality software solutions.</p>\r\n<p>- Experience working in an Agile/Scrum environment is a plus.</p>\r\n<p>Join our team today and make a significant impact on the future of e-learning! Please submit your resume and portfolio showcasing your previous work to be considered for this exciting opportunity.</p>\r\n<p>Job Type: Full-time</p>\r\n<p>Salary: Php1,200,000.00 per year</p>', 'Bacolod City', '2023-07-22 21:46:46', '2023-07-31', 'Open', 'PHP 1,200,000 a year', 'Day', 'Full time', 'Agile/Scrum, Git, SVN, SQL, NoSQL, HTML, CSS, JavaScript, etc.'),
(56, 6, 'Senior Software Engineer', '<p>We are seeking a highly skilled and motivated Senior Software Engineer to join our dynamic and innovative team. As a Senior Software Engineer, you will play a key role in designing, developing, and maintaining cutting-edge software solutions that drive our company\'s success. Your expertise will contribute to the development of complex systems and applications, and you will have the opportunity to work on exciting projects that have a significant impact on our customers and industry.</p>', 'Bacolod City', '2023-07-24 15:51:15', '2023-07-24', 'Open', '100,000 a month', 'Day', 'Full time', 'Java, SQL, PHP'),
(58, 1, 'REACT Frontend Developer- WORK FROM HOME', '<p><strong>Job Role:</strong></p>\r\n<p>We are looking for a Front End React developer to join our fast growing team. We are looking for an exceptional problem solver who can deliver a top class code base.</p>\r\n<p><strong>Technical Requirements:</strong></p>\r\n<ul>\r\n<li>Excellent ability to code in ReactJS and React Native</li>\r\n<li>3 to 5+ years of relevant work experience as a software engineer, software developer, frontend developer, or full stack developer</li>\r\n<li>Formal computer science or software engineer qualification is preferred but not required.</li>\r\n<li>Experience debugging using popular JavaScript-based tools like Chrome Developer Console</li>\r\n<li>Experience working with MongoDB</li>\r\n</ul>\r\n<p>Key Actions</p>\r\n<ul>\r\n<li>An ability to effectively deliver high quality code and continue to raise the bar at a high performing company</li>\r\n<li>Complete technical verification of design and architecture</li>\r\n<li>Perform code reviews</li>\r\n<li>Work with the team to solve technical difficulties and ascertain the best deployment approach when needed</li>\r\n</ul>\r\n<p>About you</p>\r\n<ul>\r\n<li>A desire and the ability to build something great.</li>\r\n<li>An ability to effectively execute designated sprint schedules.</li>\r\n<li>The willingness to learn and adapt your methodologies, and the ability to share your learnings with the team.</li>\r\n<li>A team player who can communicate appropriately for the role.</li>\r\n</ul>\r\n<p>Job Type: Full-time</p>\r\n<p>Salary: Php100,000.00 - Php150,000.00 per month</p>\r\n<p>Benefits:</p>\r\n<ul>\r\n<li>Work from home</li>\r\n</ul>\r\n<p>Schedule:</p>\r\n<ul>\r\n<li>8 hour shift</li>\r\n</ul>\r\n<p>Experience:</p>\r\n<ul>\r\n<li>React: 4 years (Preferred)</li>\r\n</ul>', '', '2023-07-28 22:32:00', '2023-07-31', 'Open', '', 'Rotating shift', 'Full time', 'HTML, CSS, Bootstrap, React, Javascript');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `link` text DEFAULT NULL,
  `is_displayed` tinyint(1) NOT NULL DEFAULT 0,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `user_id`, `from_user_id`, `title`, `message`, `link`, `is_displayed`, `is_read`, `date_created`) VALUES
(144, 3, 35, 'New Applicant in your job post', 'A new applicant has applied to your job post.', 'jobposting?id=53', 1, 0, '2023-08-03 12:35:55'),
(145, 35, 3, 'Application Accepted', 'Lopues Ni Gonrad has accepted your application in the job post Web developer (Pasig).', 'jobposting?id=53', 1, 0, '2023-08-03 12:37:13'),
(146, 35, 3, 'Application Accepted', 'Lopues Ni Gonrad has accepted your application in the job post Short-term Project-based Back End Web Developer.', 'jobposting?id=51', 1, 0, '2023-08-03 13:20:14'),
(147, 3, 35, 'New Applicant in your job post', 'A new applicant has applied to your job post.', 'jobposting?id=53', 1, 0, '2023-08-03 13:31:03'),
(148, 3, 35, 'New Applicant in your job post', 'A new applicant has applied to your job post.', 'jobposting?id=54', 1, 0, '2023-08-03 13:49:06'),
(149, 35, 3, 'Application Accepted', 'Lopues Ni Gonrad has accepted your application in the job post Remote Software Developer.', 'jobposting?id=54', 1, 0, '2023-08-03 13:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resume`
--

CREATE TABLE `tbl_resume` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` float NOT NULL,
  `date_uploaded` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_resume`
--

INSERT INTO `tbl_resume` (`id`, `employee_id`, `file_name`, `file_size`, `date_uploaded`) VALUES
(1, 50, 'Fausto_John_Claire_Boko_Software_Engineer_Internship_Resume.docx', 20.62, '2023-08-03');

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
(15, 32, 'sdasdas', '<p>asdasdasdas</p>', 'asdasd', 'asasdasdasdasd', '2023-07-20', '2023-07-27', 123123),
(16, 32, 'dqasdas', '<p>asdasdasdasd</p>', '2131231', 'dadasdsa', '2023-07-20', '2023-07-29', 123123);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `locker` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `password`, `user_type`, `locker`, `is_verified`) VALUES
(2, 'bi@gmail.com', '95d04a4f3e63f77b08a01dd95694292320e952aa', 'EMPLOYER', 'u@$~jgJJD4U1w^smk1G.w(Y&2C8RXOFCD0NUTvIQ1AsY9V<~hD', 0),
(3, 'lopues@gmail.com', '488ba4bc58d39f02c84d51f2d579ebcb6f614b6f', 'EMPLOYER', 'f~oZ!yr7%Q^CEpMV&S#Z8TICz(r$?(GOrQaYM>rjK&Gt64gCUO', 0),
(4, 'pol@gmail.com', '464f2961c6ea64e833467a148afd87bcf91982ab', 'EMPLOYER', 'cE$hL^t2oS&zs&$7NQoNRahuMgOt.cN)!&Nt6&gW7If!txT$Vt', 0),
(5, 'gabchicken@gmail.com', '26aa893d5c8d46bdff3c93f51dcb9db8ea242cb6', 'EMPLOYER', 'd9ImbIOAh5Cvh&Wd\\w4Ey61q^9u1do?HC5EUfcAH72!%G(@MpB', 0),
(6, 'chicken@gmail.com', 'ead99718058240d3017368b1ec8b18bde5ebb4f5', 'EMPLOYEE', 'S(RC0J^1W^U.f6&F~\\A18xJBAK/Ur%Zf1mAAKTP5#N@1(si@o(', 0),
(7, 'kaypajanconi@gmail.com', '838c8d537322b98e2f84f758dfcb07a5a960d1bd', 'EMPLOYEE', 'Q8pW@DJzfu9hE@C8rbl>?>rdo)s3*YwHxW6~Z@rit\\v@wmED0$', 0),
(20, 'polcuenca242@gmail.com', '835de90f3a845fbc4fa8142d2712ce4da4b8ec17', 'EMPLOYEE', 'lT>)c2V(HY>eoCCBitd#y@FmeXeyvYy)2Xp@\\P0$?C/eNm#v)V', 0),
(23, 'ayeemarty@outlook.com', 'a19a93a06fbe9f2e65c105470bb6f6dcc9c8aeab', 'EMPLOYEE', 'ERWS2@~j1eS5&gO19!H#%h04F>wD>7G\\9p?Z~g4FUH.~Dj$L7~', 0),
(24, 'watsons@gmail.com', 'd9abaa4ec106938b7f2ebdf26f24455f4b270477', 'EMPLOYER', 'qfbLy!3)b7~X@($0TXBemGcbs$Sog$8^R1hiT@2DmwN9qJsSnB', 0),
(25, 'katrina@gmail.com', '6c33f9ac86beaa164a915929d89fe42406e63fd2', 'EMPLOYEE', 'wBxN?K!?1P#ryQ(#41OT/&\\JE1ZKSN315?BhfjnG1TB7z7GY.K', 0),
(26, 'doe@gmail.com', '2326f71d5942bd4efa5d2cafbaa57e8071c42c75', 'EMPLOYEE', '11ue!uwwgV9^>14&bN/<Vz3s90(1Wp\\#p910asxYlbzc*^f!m9', 0),
(27, 'test@gmail.com', '39f5693f9e10015320360641b0b96a3ed82f506a', 'EMPLOYEE', 'j5EuCVi/$kuru4i%&6Ua>T9q3>EpIoKTIFhvXd$PtqRF%AdpRL', 0),
(35, 'faustojcboko@gmail.com', '8d3a4faf661a8a99db16fca4646aaddfb41537a5', 'EMPLOYEE', '0626caa95006fdb28aea578620236724d07e2691:cc0f8391e3f14cc6221ce2ec00593d821632abb2:f1df4f63298002def98bde589c616b0b4966f5b8', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_applicant_employee_id` (`employee_id`),
  ADD KEY `fk_applicant_job_id` (`job_id`);

--
-- Indexes for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Employee_ID` (`employee_id`);

--
-- Indexes for table `tbl_employed`
--
ALTER TABLE `tbl_employed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employed_employer_id` (`employer_id`),
  ADD KEY `fk_employed_employee_id` (`employee_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`ID`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`) USING BTREE,
  ADD KEY `fk_employment_employer_id` (`employer_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_feedback_user_id` (`user_id`),
  ADD KEY `fk_feedback_from_user_id` (`from_user_id`);

--
-- Indexes for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_follow_employee_id` (`employee_id`),
  ADD KEY `fk_follow_employer_id` (`employer_id`);

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
  ADD KEY `fk_notif_user_id` (`user_id`),
  ADD KEY `fk_notif_from_user_id` (`from_user_id`);

--
-- Indexes for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resume_employee_id` (`employee_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tbl_education`
--
ALTER TABLE `tbl_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_employed`
--
ALTER TABLE `tbl_employed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_employee_skill`
--
ALTER TABLE `tbl_employee_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_employer`
--
ALTER TABLE `tbl_employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_employment`
--
ALTER TABLE `tbl_employment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_skill`
--
ALTER TABLE `tbl_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD CONSTRAINT `fk_applicant_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_applicant_job_id` FOREIGN KEY (`job_id`) REFERENCES `tbl_jobposting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD CONSTRAINT `fk_Employee_ID` FOREIGN KEY (`Employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employed`
--
ALTER TABLE `tbl_employed`
  ADD CONSTRAINT `fk_employed_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employed_employer_id` FOREIGN KEY (`employer_id`) REFERENCES `tbl_employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `fk_feedback_from_user_id` FOREIGN KEY (`from_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_feedback_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  ADD CONSTRAINT `fk_follow_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_follow_employer_id` FOREIGN KEY (`employer_id`) REFERENCES `tbl_employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  ADD CONSTRAINT `fk_jobposting_employer_id` FOREIGN KEY (`employer_id`) REFERENCES `tbl_employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD CONSTRAINT `fk_notif_from_user_id` FOREIGN KEY (`from_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notif_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  ADD CONSTRAINT `fk_resume_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`ID`);

--
-- Constraints for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD CONSTRAINT `fk_training_employee_id` FOREIGN KEY (`Employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
