-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 10:08 AM
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
(100, 54, 50, 'Remote Software Developer', 'ACCEPTED', '2023-08-07'),
(101, 54, 54, 'Remote Software Developer', 'UNDER REVIEW', '2023-08-07');

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

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`id`, `employee_id`, `level`, `institution`, `title`, `description`, `start_date`, `end_date`) VALUES
(65, 54, 'COLLEGE', 'dfsfsf', 'sdfs', '<p>sdfsdf</p>', '2023-08-02', '2023-08-17');

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
(18, 1, 50, 'Remote Software Developer', 'Full time', NULL, 1, 1, '2023-08-07', NULL);

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
(32, 6, '0000-00-00 00:00:00', 'John Martin', 'Demonteverde', 'Cusi', '2022-08-16', 'male', 'single', 'Chicken Joyism', '5655656', 'chicken@gmail.com', 0, 0, 'Bacolod City', 'Chicken', 'Charito Heights', 'UI/UX Developer', '1233', '22222', '331313', '12323131', '<p>Helloo</p>', 'JD2by.png'),
(36, 20, '2023-07-19 13:15:15', 'Martin', 'Cuenca', 'Benedicto', '2001-11-24', 'male', 'single', 'Catholic', '0947950555', 'polcuenca242@gmail.com', 0, 0, 'BACOLOD CITY', 'Mansilingan', 'adelfa st. victorina heights', '', '19292', '020', '2626', '626', '', '347548042_184571507478516_7611925746711583073_n2.jpg'),
(50, 35, '2023-08-02 12:14:28', 'Fausto John', 'Boko', 'Esclavia', '2001-05-06', 'male', 'single', 'Catholic', '09085579204', 'faustojcboko@gmail.com', 0, 0, 'Bacolod City (Capital)', 'Granada', 'Charito Heights', 'Full Stack Developer', '', '', '', '', '<p><strong>GWAPO KO</strong></p>', 'pp.jpg'),
(52, 39, '2023-08-04 10:31:52', 'Kayla', 'Pajanconi', 'Tangub', '1999-10-13', 'male', 'single', 'Catholic', '09222667813', 'kpajanconi7@gmail.com', 0, 0, 'Hinigaran', 'Camba-og', 'Hinigaran', '', '', '', '', '', '', 'last.png'),
(53, 40, '2023-08-04 10:46:10', 'Paul Martin', 'Cuenca', '', '2023-11-24', 'male', 'single', 'Catholic', '55555', 'paulcuenca242@gmail.com', 0, 0, 'Bacolod City', 'Mansilingan', 'adelfa st. victorina heights', '', '', '', '', '', '', 'default.png'),
(54, 41, '2023-08-07 15:45:46', 'Pol', 'Cuenca', '', '2008-03-28', 'male', 'single', 'catholic', '99999', 's2020576@usls.edu.ph', 0, 0, 'Bacolod City', 'Mansilingan', 'adelfa street', 'gwapo', '', '', '', '', '<p>sdfsdfs</p>', 'chicken.png');

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
(39, 36, 'PHP', 'beginner', 2),
(42, 32, 'C#', 'beginner', 1),
(43, 50, 'PHP', 'advance', 2),
(44, 50, 'JavaScript', 'advance', 2),
(45, 32, 'Java', 'expert', 5);

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
(1, 3, 'Boko', 'lopues@gmail.com', '<p>In the year 1992, Lopue\'s Department Store incorporated underwent changes in its corporate structure and establishes three (3) new independent corporations. From mere branch, Lopue\'s San Sebastian had stood independently to rebuild its own image and identity as it has under the stewardship of <span style=\"text-decoration: underline;\">Mr. Leonito D. Lopue</span>. Hatdog<br><br>Despite the store reorganization, it has maintained its structure as one of the top taxpayers of Bacolod City. Starting with annual sales of 35 million, the store had steadily increased its share in the market to i85 million and now relishes a sales volume of 220 million. as befits a pioneer organization has stood the test of time as it has maintained its image as \"<strong>Your complete Department store and supermarket for high quality products and services.</strong>\"</p>', 'Ubiquity', '', '', 'Bacolod city', 'villamonte', 'Sa lopues east ngayunn', 'Retail', '123456', '123456789', 2147483647, 'download.png', 0, '2023-06-27 09:47:55'),
(6, 2, 'Seda', 'businessinn@gmail.com', '<p><span style=\"font-family: \'arial black\', sans-serif;\">Table of truth</span></p>\n<table style=\"border-collapse: collapse; width: 99.9807%;\" border=\"1\"><colgroup><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"></colgroup>\n<tbody>\n<tr>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">gwapo</td>\n<td style=\"text-align: center;\">mas gwapo</td>\n<td style=\"text-align: center;\">pinaka gwapo</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">bok</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">x</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">pol</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">jide</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n</tr>\n</tbody>\n</table>', 'Seda Centrio', '', '', 'Bacolod city', 'Granadaaa', 'Charito Heights', 'Hospitality and Tourism', '0908', '22222', 90855, 'Seda_Hotel.jpg', 0, '2023-06-27 16:23:54'),
(7, 4, 'boko', 'pol@gmail.com', '<p>Founded in 1851, Bank of the Philippine Islands is&nbsp;<strong>the first bank in the Philippines and in the Southeast Asian region</strong>. BPI is a universal bank and together with its subsidiaries and affiliates, it offers a wide range of financial products and solutions that serve both retail and corporate clients.</p>', 'BPI', '', '', 'Bacolod city', 'Brgy Balay', 'Balay', 'Finance and Banking', '13579', '9999', 8888, 'unnamed1.png', 0, '2023-06-29 10:57:41'),
(12, 24, 'Google', 'watsons@gmail.com', '<p><em><strong>Google</strong></em>, one of the world\'s most influential and ubiquitous technology companies, was founded by Larry Page and Sergey Brin in September 1998. The company\'s humble beginnings started in a garage at <strong>Stanford University</strong>, where the two visionary computer scientists, fueled by their passion for organizing and making information universally accessible, began developing a revolutionary search engine algorithm.</p>\n<p>Their breakthrough innovation, known as PageRank, brought a new level of efficiency to web searches by ranking pages based on their relevance and importance, as determined by the number and quality of links pointing to them. This algorithm revolutionized the way people accessed information on the internet, providing more accurate and valuable search results.</p>', 'Google', '', '', 'Bacolod city', 'Barangay 12', 'GF SM City Bacolod North Wing Poblacion Reclamation Area', 'Media and Entertainment', '09123456789', '', 0, 'google-g-2015-logo-png-transparent.png', 0, '2023-07-20 09:21:01');

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
(58, 1, 'REACT Frontend Developer- WORK FROM HOME', '<p><strong>Job Role:</strong></p>\r\n<p>We are looking for a Front End React developer to join our fast growing team. We are looking for an exceptional problem solver who can deliver a top class code base.</p>\r\n<p><strong>Technical Requirements:</strong></p>\r\n<ul>\r\n<li>Excellent ability to code in ReactJS and React Native</li>\r\n<li>3 to 5+ years of relevant work experience as a software engineer, software developer, frontend developer, or full stack developer</li>\r\n<li>Formal computer science or software engineer qualification is preferred but not required.</li>\r\n<li>Experience debugging using popular JavaScript-based tools like Chrome Developer Console</li>\r\n<li>Experience working with MongoDB</li>\r\n</ul>\r\n<p>Key Actions</p>\r\n<ul>\r\n<li>An ability to effectively deliver high quality code and continue to raise the bar at a high performing company</li>\r\n<li>Complete technical verification of design and architecture</li>\r\n<li>Perform code reviews</li>\r\n<li>Work with the team to solve technical difficulties and ascertain the best deployment approach when needed</li>\r\n</ul>\r\n<p>About you</p>\r\n<ul>\r\n<li>A desire and the ability to build something great.</li>\r\n<li>An ability to effectively execute designated sprint schedules.</li>\r\n<li>The willingness to learn and adapt your methodologies, and the ability to share your learnings with the team.</li>\r\n<li>A team player who can communicate appropriately for the role.</li>\r\n</ul>\r\n<p>Job Type: Full-time</p>\r\n<p>Salary: Php100,000.00 - Php150,000.00 per month</p>\r\n<p>Benefits:</p>\r\n<ul>\r\n<li>Work from home</li>\r\n</ul>\r\n<p>Schedule:</p>\r\n<ul>\r\n<li>8 hour shift</li>\r\n</ul>\r\n<p>Experience:</p>\r\n<ul>\r\n<li>React: 4 years (Preferred)</li>\r\n</ul>', '', '2023-07-28 22:32:00', '2023-07-31', 'Open', '', 'Rotating shift', 'Full time', 'HTML, CSS, Bootstrap, React, Javascript'),
(67, 1, 'eCommerce Developer', '<p><strong>Job Description:</strong></p>\r\n<p>Design, build and configure applications to meet business process and application requirements. Work with the platform technologies and languages such as Java, Spring, HTML, CSS, JavaScript, and REST/API services. - Customize the platform\'s storefront accelerator to build fully functioning e-commerce sites on desktop, tablet, and mobile devices - All code must conform to platform-specific & industry-leading practices.</p>\r\n<p><strong>Responsibilities:</strong></p>\r\n<ul>\r\n<li>Demonstrated ability to understand technical documentation such as functional requirements and technical designs and translate these documents into working code.</li>\r\n<li>Demonstrated ability to debug and troubleshoot issues with both existing and new code on the SAP Commerce platform</li>\r\n<li>Develop Digital Consumer experiences based on a foundation of Hybris</li>\r\n<li>Develop awesome features such as product search, order management, promotions, store locator, social ecommerce etc</li>\r\n<li>Setup Hybris development environments and sandboxes</li>\r\n<li>Develop and deploy simple custom CMS components</li>\r\n<li>Diagnose and solve technical problems related to commerce and Hybris implementation</li>\r\n<li>Write application code that exceeds the defined quality standards</li>\r\n<li>Knowledge of project and collaboration tools such as JIRA, Rally, Microsoft Teams, Confluence, and SharePoint.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>With at least 1-2 years of Hybris development experience</li>\r\n<li>Hybris with work experience on WCMS, Commerce, Checkout and Cart, Order Management, User Groups, Product and Catalog management, internationalization, BB,BC, Promotions, scenarios, CSC, Cron Jobs, Impexes etc</li>\r\n<li>Solid understanding of SAP Commerce Cloud (Hybris) architecture. - Solid understanding of both Object-Oriented concepts and the MVC paradigm.</li>\r\n<li>Minimum primary skill and other technical skill required Servlets, JSP, Struts, Spring MVC, MsSQl, JQuery, Java/J2EE</li>\r\n<li>Good communication and team handling skills</li>\r\n<li>Good analytical and presentation skills</li>\r\n<li>Knowledge on software architecture and multiple project methodologies: waterfall, agile, Scrum, et al.</li>\r\n<li>SAP hybris developer certification is a plus</li>\r\n</ul>\r\n<p><strong>Join our high-performing team and enjoy these benefits:</strong></p>\r\n<ul>\r\n<li>Healthcare Insurance (HMO) & Life Insurance coverage from day 1 of employment</li>\r\n<li>Expanded maternity leave up to 120 days*</li>\r\n<li>Expanded paternity leave up to 30 days*</li>\r\n<li>Employee Stock Purchase Pan</li>\r\n<li>Loyalty and Christmas Gift</li>\r\n<li>Inclusion and Diversity Benefits</li>\r\n<li>Night Differential</li>\r\n<li>Allowances</li>\r\n<li>Car and housing plan</li>\r\n<li>Company-sponsored trainings like upskilling and certification</li>\r\n<li>Flexible Working Arrangements</li>\r\n<li>Healthy and Encouraging Work Environment</li>\r\n</ul>\r\n<p><strong>What we believe</strong></p>\r\n<p>All our leaders are committed to building a better, stronger, and more durable company for future generations to create positive, long-lasting change. Inclusion and diversity are fundamental to our culture and core values. Our rich diversity makes us more innovative and creative, which helps us better serve our clients and our communities.</p>\r\n<p>Our position as partner to many of the world’s leading businesses, organizations and governments affords us both an extraordinary opportunity and a tremendous responsibility to make a difference. Sustainability is one of our greatest responsibilities, which we embed it into everything we do and for everyone we work with.</p>\r\n<p>Accenture is committed to providing equal employment opportunities for persons with disabilities. Please let your recruiter know if you require reasonable accommodation to enable your participation in the recruitment process, they will be happy to assist you.</p>\r\n<p><strong>TERMS AND CONDITIONS</strong></p>\r\n<p>The company provides an equal opportunity employment and welcomes applications from all sections of society and does not discriminate on grounds of race, religion, or belief, ethnic or national origin, disability, age, citizenship, marital, domestic, or civil partnership status, sexual orientation, gender identity, or any other basis as protected by applicable law.</p>\r\n<p>Job Type: Full-time</p>\r\n<p>Pay: Php42,000.00 - Php64,000.00 per month</p>\r\n<p>Benefits:</p>\r\n<ul>\r\n<li>Health insurance</li>\r\n<li>Life insurance</li>\r\n<li>Paid training</li>\r\n</ul>\r\n<p>Schedule:</p>\r\n<ul>\r\n<li>8 hour shift</li>\r\n<li>Rotational shift</li>\r\n</ul>\r\n<p>Supplemental pay types:</p>\r\n<ul>\r\n<li>13th month salary</li>\r\n<li>Overtime pay</li>\r\n<li>Performance bonus</li>\r\n</ul>', '', '2023-08-04 00:16:23', '2023-08-28', 'Open', 'PHP 42,000 - PHP 64,000 a month', 'Day', 'Full time', 'PHP, Laravel, Javascript'),
(74, 1, 'Python Developer', '<p><strong>Responsibilities:</strong></p>\r\n<ul>\r\n<li>Design and implementation of low-latency, high-availability, and performant applications</li>\r\n<li>Integration of user-facing elements developed by front-end developers with server-side logic</li>\r\n<li>Writing reusable, testable, and efficient code</li>\r\n<li>Integration of data storage solutions</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Bachelor\'s Degree in Computer Science, Information Technology or other relevant fields</li>\r\n<li>Expert in Python, with knowledge of at least one Python web framework (Django, Flask, etc)</li>\r\n<li>Able to integrate multiple data sources and databases into one system</li>\r\n<li>Proficient understanding of code versioning tools (Git, Mercurial or SVN)</li>\r\n<li>Familiarity with event-driven programming in Python</li>\r\n<li>Knowledge of user authentication and authorization between multiple systems, servers, and environments</li>\r\n<li>Able to create database schemas that represent and support business processes</li>\r\n<li>Understanding of the threading limitations of Python, and multi-process architecture</li>\r\n<li>Understanding of server-side templating languages (Jinja 2, Mako, etc)</li>\r\n<li>Understanding of front-end technologies, such as JavaScript, HTML5, and CSS3</li>\r\n<li>Understanding of accessibility and security compliance</li>\r\n<li>Understanding of fundamental design principles behind a scalable application</li>\r\n<li>Understanding of the differences between multiple delivery platforms, such as mobile vs desktop, and optimizing output to match the specific platform</li>\r\n<li>Able to create database schemas that represent and support business processes</li>\r\n<li>Strong unit test and debugging skills</li>\r\n</ul>\r\n<p><strong>Join our high-performing team and enjoy these benefits:</strong></p>\r\n<ul>\r\n<li>Healthcare Insurance (HMO) & Life Insurance coverage from day 1 of employment</li>\r\n<li>Expanded maternity leave up to 120 days*</li>\r\n<li>Expanded paternity leave up to 30 days*</li>\r\n<li>Employee Stock Purchase Pan</li>\r\n<li>Loyalty and Christmas Gift</li>\r\n<li>Inclusion and Diversity Benefits</li>\r\n<li>Night Differential</li>\r\n<li>Allowances</li>\r\n<li>Car and housing plan</li>\r\n<li>Company-sponsored trainings like upskilling and certification</li>\r\n<li>Flexible Working Arrangements</li>\r\n<li>Healthy and Encouraging Work Environment</li>\r\n</ul>\r\n<p><em>*Terms & Conditions apply</em></p>\r\n<p><strong>What we believe</strong></p>\r\n<p>All our leaders are committed to building a better, stronger, and more durable company for future generations to create positive, long-lasting change. Inclusion and diversity are fundamental to our culture and core values. Our rich diversity makes us more innovative and creative, which helps us better serve our clients and our communities.</p>\r\n<p>Our position as partner to many of the world’s leading businesses, organizations and governments affords us both an extraordinary opportunity and a tremendous responsibility to make a difference. Sustainability is one of our greatest responsibilities, which we embed it into everything we do and for everyone we work with.</p>\r\n<p>Accenture is committed to providing equal employment opportunities for persons with disabilities. Please let your recruiter know if you require reasonable accommodation to enable your participation in the recruitment process, they will be happy to assist you.</p>\r\n<p><strong>TERMS AND CONDITIONS</strong></p>\r\n<p>The company provides an equal opportunity employment and welcomes applications from all sections of society and does not discriminate on grounds of race, religion, or belief, ethnic or national origin, disability, age, citizenship, marital, domestic, or civil partnership status, sexual orientation, gender identity, or any other basis as protected by applicable law.</p>\r\n<p>Job Type: Full-time</p>\r\n<p>Pay: Php42,000.00 - Php64,000.00 per month</p>\r\n<p>Benefits:</p>\r\n<ul>\r\n<li>Company events</li>\r\n<li>Gym membership</li>\r\n<li>Health insurance</li>\r\n<li>Paid training</li>\r\n</ul>\r\n<p>Schedule:</p>\r\n<ul>\r\n<li>8 hour shift</li>\r\n<li>Rotational shift</li>\r\n</ul>\r\n<p>Supplemental pay types:</p>\r\n<ul>\r\n<li>13th month salary</li>\r\n<li>Overtime pay</li>\r\n<li>Performance bonus</li>\r\n</ul>', '', '2023-08-04 00:43:28', '2023-08-30', 'Open', 'PHP 42,000 - PHP 64,000 a month', 'Day', 'Full time', 'Python, Django, Javascript, React'),
(75, 12, 'Fullstack Web Developer', '<p><strong>Job Description:</strong> We are seeking a skilled and experienced Fullstack Web Developer to join our dynamic team. As a Fullstack Web Developer, you will be responsible for designing, developing, and maintaining web applications that deliver exceptional user experiences. Your role will involve working on both the front-end and back-end of our projects, collaborating with cross-functional teams to bring creative ideas to life.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Develop and maintain responsive and interactive web applications using modern web technologies.</li>\r\n<li>Collaborate with designers, product managers, and other developers to create user-friendly interfaces and intuitive experiences.</li>\r\n<li>Build and optimize back-end systems to handle high volumes of data and traffic.</li>\r\n<li>Ensure the technical feasibility of UI/UX designs and implement them accordingly.</li>\r\n<li>Participate in code reviews, testing, and debugging processes to ensure high-quality deliverables.</li>\r\n<li>Stay up-to-date with industry trends and best practices to continuously improve our development processes.</li>\r\n</ul>\r\n<p><strong>Skill Requirements:</strong></p>\r\n<ul>\r\n<li>Proven experience as a Fullstack Web Developer or similar role.</li>\r\n<li>Proficient in front-end technologies such as HTML5, CSS3, JavaScript, and modern JavaScript frameworks (e.g., React, Angular, or Vue.js).</li>\r\n<li>Strong experience in back-end development using Node.js, Python, Ruby, Java, or similar technologies.</li>\r\n<li>Familiarity with server-side frameworks (e.g., Express.js, Django, Ruby on Rails) and RESTful APIs.</li>\r\n<li>Experience with database systems like MySQL, PostgreSQL, MongoDB, or similar.</li>\r\n<li>Knowledge of version control systems (e.g., Git) and CI/CD pipelines.</li>\r\n<li>Ability to work collaboratively in an agile environment and communicate effectively with team members.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>A passion for staying up-to-date with emerging technologies and industry trends.</li>\r\n</ul>\r\n<p><strong>Preferred Qualifications:</strong></p>\r\n<ul>\r\n<li>Bachelor\'s degree in Computer Science, Software Engineering, or a related field.</li>\r\n<li>Previous experience working on e-commerce platforms or SaaS applications.</li>\r\n<li>Familiarity with cloud platforms such as AWS, Azure, or Google Cloud.</li>\r\n<li>Knowledge of containerization technologies like Docker and container orchestration with Kubernetes.</li>\r\n</ul>\r\n<p>Join our team and contribute to building innovative and user-centric web applications that have a real impact on our users\' lives. This is an exciting opportunity to work in a fast-paced, collaborative environment with opportunities for career growth and personal development.</p>\r\n<p><em>Note: Please include your portfolio or links to relevant projects when applying for this position.</em></p>\r\n<p><strong>Location:</strong> Bacolod City/Philippines</p>\r\n<p><strong>How to Apply:</strong> Please send your updated resume and a cover letter detailing your relevant experience and why you are a suitable fit for this role to [Email Address]. We look forward to hearing from you!</p>', '', '2023-08-04 10:30:16', '2023-08-04', 'Open', '', 'Flextime', 'Full time', 'Java, SQL, PHP'),
(76, 1, 'Test1', '<p>sample post</p>', '', '2023-08-04 11:00:19', '2023-08-12', 'Open', '500,000', 'Day shift', 'Shift work', 'php, laravel'),
(77, 1, 'test', '<p>5555</p>', '', '2023-08-04 11:01:06', '2023-08-11', 'Open', '500,000', 'Day shift', 'Full time', 'Java, SQL, PHP');

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
(149, 35, 3, 'Application Accepted', 'Lopues Ni Gonrad has accepted your application in the job post Remote Software Developer.', 'jobposting?id=54', 1, 0, '2023-08-03 13:50:20'),
(150, 3, 6, 'New Applicant in your job post', 'A new applicant has applied to your job post.', 'jobposting?id=51', 1, 0, '2023-08-04 10:41:04'),
(151, 6, 3, 'Application Accepted', 'Ubiquity has accepted your application in the job post Short-term Project-based Back End Web Developer.', 'jobposting?id=51', 1, 0, '2023-08-04 10:41:58'),
(152, 3, 40, 'New Applicant in your job post', 'A new applicant has applied to your job post.', 'jobposting?id=54', 1, 0, '2023-08-04 10:54:33'),
(153, 40, 3, 'Application Accepted', 'Ubiquity has accepted your application in the job post Remote Software Developer.', 'jobposting?id=54', 0, 0, '2023-08-04 10:56:02'),
(154, 2, 6, 'New Applicant in your job post', 'A new applicant has applied to your job post.', 'jobposting?id=56', 0, 0, '2023-08-04 15:37:56'),
(155, 3, 35, 'New Applicant in your job post', 'A new applicant has applied to your job post.', 'jobposting?id=52', 1, 1, '2023-08-07 11:07:16'),
(158, 3, 35, 'New Applicant in your job post', 'A new applicant has applied to your job post.', 'jobposting?id=54', 1, 1, '2023-08-07 14:18:04'),
(163, 35, 3, 'Application Status', 'Your application in the job post Remote Software Developer has been UNDER REVIEW.', 'jobposting?id=54', 0, 0, '2023-08-07 15:31:16'),
(164, 35, 3, 'Application Status', 'Your application in the job post Remote Software Developer has been SCHEDULE FOR INTERVIEW.', 'jobposting?id=54', 0, 0, '2023-08-07 15:31:38'),
(165, 35, 3, 'Application Status', 'Your application in the job post Remote Software Developer has been UNDER REVIEW.', 'jobposting?id=54', 0, 0, '2023-08-07 15:32:46'),
(166, 35, 3, 'Application Status', 'Your application in the job post Remote Software Developer has been SCHEDULE FOR INTERVIEW.', 'jobposting?id=54', 0, 0, '2023-08-07 15:34:51'),
(167, 35, 3, 'Application Status', 'Your application in the job post Remote Software Developer has been UNDER REVIEW.', 'jobposting?id=54', 0, 0, '2023-08-07 15:36:30'),
(168, 35, 3, 'Application Status', 'Your application in the job post Remote Software Developer has been SCHEDULE FOR INTERVIEW.', 'jobposting?id=54', 0, 0, '2023-08-07 15:36:41'),
(169, 35, 3, 'Application Status', 'Your application in the job post Remote Software Developer has been ACCEPTED.', 'jobposting?id=54', 0, 0, '2023-08-07 15:37:44'),
(170, 35, 3, 'Application Status', 'Your application in the job post Remote Software Developer has been ACCEPTED.', 'jobposting?id=54', 0, 0, '2023-08-07 15:40:04'),
(171, 35, 3, 'Application Status', 'Your application in the job post Remote Software Developer has been ACCEPTED.', 'jobposting?id=54', 0, 0, '2023-08-07 15:42:12'),
(172, 3, 41, 'New Applicant in your job post', 'A new applicant has applied to your job post.', 'jobposting?id=54', 1, 1, '2023-08-07 15:52:08'),
(173, 41, 3, 'Application Accepted', 'Ubiquity has accepted your application in the job post Remote Software Developer and is now under review. Thank you', 'jobposting?id=54', 1, 0, '2023-08-07 16:00:47'),
(174, 41, 3, 'Application Accepted', 'Ubiquity has accepted your application in the job post Remote Software Developer and is now under review. Thank you', 'jobposting?id=54', 1, 0, '2023-08-07 16:00:52'),
(175, 41, 3, 'Application Accepted', 'Ubiquity has accepted your application in the job post Remote Software Developer and is now under review. Thank you', 'jobposting?id=54', 1, 0, '2023-08-07 16:02:33'),
(176, 41, 3, 'Application Accepted', 'Ubiquity has accepted your application in the job post Remote Software Developer and is now under review. Thank you', 'jobposting?id=54', 1, 0, '2023-08-07 16:04:35');

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
(2, 32, 'Cuenca_INTERNSHIP_INFORMATION_SHEET.pdf', 437.48, '2023-08-04'),
(3, 53, 'Demonteverde_INTERNSHIP_UNDERTAKING_docx_(1).pdf', 63.91, '2023-08-04'),
(4, 50, 'Fausto_John_Claire_Boko_Software_Engineer_Internship_Resume.pdf', 119.08, '2023-08-07'),
(5, 54, 'Fausto_John_Claire_Boko_Software_Engineer_Internship_Resume.pdf', 119.08, '2023-08-07');

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
(20, 'polcuenca242@gmail.com', '835de90f3a845fbc4fa8142d2712ce4da4b8ec17', 'EMPLOYEE', 'lT>)c2V(HY>eoCCBitd#y@FmeXeyvYy)2Xp@\\P0$?C/eNm#v)V', 0),
(24, 'watsons@gmail.com', 'd9abaa4ec106938b7f2ebdf26f24455f4b270477', 'EMPLOYER', 'qfbLy!3)b7~X@($0TXBemGcbs$Sog$8^R1hiT@2DmwN9qJsSnB', 0),
(35, 'faustojcboko@gmail.com', '8d3a4faf661a8a99db16fca4646aaddfb41537a5', 'EMPLOYEE', '0626caa95006fdb28aea578620236724d07e2691:cc0f8391e3f14cc6221ce2ec00593d821632abb2:f1df4f63298002def98bde589c616b0b4966f5b8', 1),
(39, 'kpajanconi7@gmail.com', 'a1d54d0adca4c12ce42e0aeb5573dcb134e42526', 'EMPLOYEE', 'd24844ee5c5004c4ea6fc40d4b55da640d780eac', 1),
(40, 'paulcuenca242@gmail.com', 'bf1d34aeb6ce919e0fc142ef1b20265397865f76', 'EMPLOYEE', '89f0adcab406ebe9883bd4942d8bb1bfd302a67b', 1),
(41, 's2020576@usls.edu.ph', 'd5c19bccee79c155eb23c1c65a06ac6b9d3a86d6', 'EMPLOYEE', '369a3b148e9ffc0ce6800097d39947a95b125962', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_education`
--
ALTER TABLE `tbl_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_employed`
--
ALTER TABLE `tbl_employed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_employee_skill`
--
ALTER TABLE `tbl_employee_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  ADD CONSTRAINT `fk_Employee_ID` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
