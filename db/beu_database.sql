-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 02:19 PM
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
(12, 36, 36, 'ACCEPTED'),
(17, 35, 36, 'REJECTED'),
(50, 48, 32, 'REJECTED'),
(51, 36, 32, 'REJECTED'),
(52, 35, 32, 'ACCEPTED'),
(53, 33, 32, 'ACCEPTED'),
(55, 53, 36, 'PENDING'),
(56, 52, 36, 'PENDING'),
(57, 51, 36, 'PENDING');

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
(32, 6, '0000-00-00 00:00:00', 'LEFT', 'DEADZZ', 'FOUR', '2022-08-16', 'male', 'single', 'Chicken Joyism', '5655656', 'chicken@gmail.com', 'Bacolod City', 'Chicken', 'Charito Heights', 'L4D2', '1233', '22222', '331313', '12323131', '<p>hahahaha</p>', 'le_four_ded_2.jpg'),
(33, 7, '0000-00-00 00:00:00', 'Kayla', 'Pajanconi', 'Tangub', '1999-10-13', 'female', 'single', 'Roman Catholic', '09222667813', 'kaypajanconi@gmail.com', 'Hinigaran', 'camba-og', 'Dinandan', '', '', '', '', '', '', 'default.png'),
(36, 20, '2023-07-19 13:15:15', 'Martinnn', 'Cuenca', 'Benedicto', '2001-11-24', 'male', 'single', 'Catholic', '0947950555', 'polcuenca242@gmail.com', 'BACOLOD CITY', 'Mansilingan', 'adelfa st. victorina heights', '', '19292', '020', '2626', '626', '', 'default.png');

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
(39, 36, 'PHP', 'beginner', 2);

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
(6, 2, 'Business Inn', 'businessinn@gmail.com', '<p><span style=\"font-family: \'arial black\', sans-serif;\">Table of truth</span></p>\n<table style=\"border-collapse: collapse; width: 99.9807%;\" border=\"1\"><colgroup><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"><col style=\"width: 25.0241%;\"></colgroup>\n<tbody>\n<tr>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">gwapo</td>\n<td style=\"text-align: center;\">mas gwapo</td>\n<td style=\"text-align: center;\">pinaka gwapo</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">bok</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">x</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">pol</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"text-align: center;\">jide</td>\n<td style=\"text-align: center;\">&nbsp;</td>\n<td style=\"text-align: center;\">x</td>\n<td style=\"text-align: center;\">x</td>\n</tr>\n</tbody>\n</table>', 'Business Inn Hotel', 'Bacolod', 'Granadaaa', 'Charito Heights', 'Hospitality and Tourism', '0908', '22222', 90855, 'to-infinity-and-beyond-chad4.jpg', '2023-06-27 16:23:54'),
(7, 4, 'Pol B. Cuenca', 'pol@gmail.com', '<p>TELUS International designs, builds and delivers next-generation digital solutions to enhance the customer experience (CX) for global and disruptive brands. The company&rsquo;s services support the full lifecycle of its clients&rsquo; digital transformation journeys and enable them to more quickly embrace next-generation digital technologies to deliver better business outcomes. TELUS International&rsquo;s integrated solutions and capabilities span digital strategy, innovation, consulting and design, digital transformation and IT lifecycle solutions, data annotation and intelligent automation, and omnichannel CX solutions that include content moderation, trust and safety solutions, and other managed solutions. Fueling all stages of company growth, TELUS International partners with brands across high growth industry verticals, including tech and games, communications and media, eCommerce and fintech, healthcare, and travel and hospitality.</p>\n<p><strong>Industry</strong><br><span style=\"color: rgb(126, 140, 141);\">IT Services and IT Consulting</span><br><br><strong>Company size</strong><br><span style=\"color: rgb(126, 140, 141);\">10,001+ employees</span><br><span style=\"color: rgb(126, 140, 141);\">29,162 on LinkedIn&nbsp;</span><br><br><strong>Headquarters</strong><br><span style=\"color: rgb(126, 140, 141);\">Vancouver, British Columbia</span></p>', 'Lopues North-West', 'Bacolod', 'Brgy Balay', 'Balay', 'Education', '13579', '9999', 8888, 'giga_chad_steven.jpg', '2023-06-29 10:57:41'),
(10, 5, 'Chicken joyism', 'gabchicken@gmail.com', '', 'CHICKEN NI GAB LOPEZ', 'City of Gab\'s Chicken', 'Brgy Gab', 'Balay ni gab', 'Information Technology', '123', '', 0, 'chicken.png', '2023-07-13 19:46:33'),
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
(28, 32, 7),
(30, 36, 1),
(31, 36, 6);

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
  `job_type` varchar(255) NOT NULL,
  `skills_req` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_jobposting`
--

INSERT INTO `tbl_jobposting` (`id`, `employer_id`, `title`, `description`, `date_posted`, `start_date`, `filled`, `salary`, `shift`, `job_type`, `skills_req`) VALUES
(33, 1, 'Virtual Assistant | WORK-FROM-HOME', 'At Outsourced Doers we recruit smart-working home-based Digital Marketing Virtual Assistants (VAs) and match them with clients (known as Founders) globally.\n\nThe Digital Marketing Virtual Assistant role is a remote assistant who will handle all the aspects of digital marketing and administrative work for the client.\n\nSimply put, digital marketing is a term used to describe online advertising. Common formats include email marketing, social media marketing, display advertising, blogs, and other digital formats.', '2023-07-04 15:40:15', NULL, 'OPEN', '10,000.00', 'Day-Shift', 'Permanent', ''),
(35, 1, 'Technical Support Engineer I, Document Control - Blended WFH', 'In this role, you will:\r\n\r\nIdentify applicable documents as per the customer’s requirements and specifications.\r\nAttend document review meetings with the Project Administrator, Project Manager, and Document Controller.\r\nManage the documentation approval cycle and final documentation delivery to the customer (gather, prepare, and submit).', '2023-07-04 16:03:35', NULL, 'OPEN', '', '', '', ''),
(36, 1, 'Assistant Manager, Accounting| Urdaneta', 'Job Description:\r\n\r\nASSISTS IN OPERATIONS AND MANAGEMENT: Provides assistance for the overall operations and management of the accounting department of the assigned business unit\r\n\r\n· IMPLEMENTATION\r\n\r\nEnsures efficient implementation of integral plan for the control of financial transactions\r\n\r\n· REPORTS AND ANALYSIS', '2023-07-07 10:20:58', NULL, 'CLOSED', '', '', '', ''),
(45, 10, 'UI/UX', '<p>A UI/UX job description typically involves designing and improving user interfaces and experiences by conducting user research, creating wireframes and prototypes, collaborating with cross-functional teams, and ensuring a seamless and visually appealing interaction between users and digital products or services.</p>', '2023-07-17 15:37:31', NULL, 'OPEN', '15,000.00', 'Day-Shift', 'Part-Time', ''),
(48, 1, 'UI/UX Developer', '<p>A UI/UX job description typically involves designing and improving user interfaces and experiences by conducting user research, creating wireframes and prototypes, collaborating with cross-functional teams, and ensuring a seamless and visually appealing interaction between users and digital products or services.</p>', '2023-07-17 15:37:31', NULL, 'OPEN', '20,000.00', 'Night-Shift', 'Permanent', ''),
(50, 10, 'Software Developer (Permanent WFH)', '<p>As our operations expand in the Philippines, we are looking to hire highly motivated candidates who can grow with the company. As a Software Developer, you will be trained to be able to participate in the whole software development lifecycle: From inception and business analysis, development, testing, deployment and production support.</p>\r\n<p>We observe a 5-day (Monday to Friday) 40-hour work week with a remote friendly, flexible and asynchronous working schedule (core hours are between 3pm PHT and 8pm PHT.) Philippine holidays are observed with exceptions that depend on project circumstances.</p>\r\n<p>We build, operate and maintain B2B and B2C software solutions for Fortune 500 companies that are being used by their customers in at least 50 countries worldwide.</p>\r\n<p>You must have&nbsp;<strong>recent professional full-stack web application development experience</strong>&nbsp;using any popular application development framework to qualify.</p>\r\n<p>Recent graduates of a Bachelor Degree in Computer Science or Information Technology from a CHED-recognized Center of Excellence (CoE) or Center of Development (CoD) institution who belong to the top 15% of their graduating class are welcome to apply.</p>\r\n<p>Successful applicants will join an intensive tech stack and engineering practices training program that will last from 4 to 6 weeks.</p>\r\n<p><strong>Must-have Requirements</strong></p>\r\n<ul>\r\n<li>Recent professional full-stack application development experience using any of the following frameworks:&nbsp;<strong>ASP.NET</strong>, Laravel, Spring Boot, Express, Django, Ruby on Rails</li>\r\n<li>Adept at using any of the following database management systems:&nbsp;<strong>SQL Server</strong>,&nbsp;<strong>PostgreSQL</strong>, Oracle, MySQL/MariaDB, Sqlite, MongoDB, Firebase, Redis</li>\r\n<li>Confident in implementing responsive web pages with standards HTML5 and CSS3</li>\r\n<li>Able to converse fluently in English and Filipino in a professional setting</li>\r\n</ul>\r\n<p><strong>Preferred Qualifications</strong></p>\r\n<ul>\r\n<li>Experience in the&nbsp;<strong>Microsoft ASP.NET tech stack</strong>&nbsp;(Webforms, MVC, WebAPI) is an advantage.</li>\r\n<li>Working knowledge of any popular Javascript frontend framework (<strong>Svelte,&nbsp;</strong>Vue, NextJS, React)</li>\r\n<li>Have an eye for aesthetics, able to participate in user interface and experience design initiatives.</li>\r\n<li>Familiar working with any of the popular cloud computing services (Microsoft Azure, Amazon AWS, Google GCP)</li>\r\n<li>You have projects that are actively used in production</li>\r\n</ul>\r\n<p><strong>What&rsquo;s in it for you:</strong></p>\r\n<ul>\r\n<li>Government-mandated benefits (SSS, Philhealth, Pag-Ibig) on day 1</li>\r\n<li>Premium healthcare insurance coverage for you and one dependent (with Maxicare) upon regularization</li>\r\n<li>Up to 24 days paid leave credits annually</li>\r\n<li>Opportunity for technical growth with professional training and continuing education subsidy</li>\r\n<li>Work with a young, vibrant, results-oriented team in a flat and supportive engineering centric organization.</li>\r\n</ul>\r\n<p><strong>What it takes to be part of the team:</strong></p>\r\n<ul>\r\n<li>You must have an active wired Internet connection subscription (DSL, Fiber or Cable) with a reputable ISP that has nationwide coverage prior to being hired.</li>\r\n<li>Excellent command of the English language (listening comprehension, speaking, reading and writing) in a professional setting is absolutely required.</li>\r\n<li>Can confidently work with foreign colleagues abroad</li>\r\n</ul>', '2023-07-21 16:29:16', '2023-07-11', 'OPEN', '46,000 - PHP 72.00', 'Day', 'Permanent', 'C++,  Java'),
(51, 1, 'Short-term Project-based Back End Web Developer', '<p>You&rsquo;ll develop the back-end logic for 2 lens tools/app for the website and also work on different databases that contain lens information.</p>\r\n<p>The project will include developing a (1)&rdquo;lens comparison tool&rdquo; which can take, modify, and display a photo (before vs after photo, like adding a custom filter) depending on the lens information provided (different lens tint/increased saturation via spectrum data). The 2nd tool is a (2) &ldquo;lens selector tool&rdquo; which outputs the appropriate lens for the customer based on the input criteria from a user (functions similar to a query).</p>\r\n<p>The front end of the website will be handled by a different team.<br>This is a work-from-home (WFH) position in the Philippines.</p>\r\n<p>Hue Lens is an entrepreneurial American lens technology company that designs and supplies world-class polymer lenses to customers around the world. We are entrepreneurial, result-focused, and fast-paced. Our lenses deliver the highest enhancement to human visual performance and health.</p>\r\n<p>Position: Project Based<br>Estimated Duration: ~ 3 months<br>Compensation / contract price: ? 200,000 - 300,000 (negotiable) commensurate with work experience, educational attainment, fit, and performance.<br>Time: Output-based, but may have a morning or evening meeting for some updates to match US time.</p>\r\n<p>Note: Successful completion of this project may lead to future projects/opportunities.</p>\r\n<p><strong>Requirements:</strong></p>\r\n<ul>\r\n<li>BS Computer Science / Information Technology degree or equivalent background</li>\r\n<li>Able to communicate well in English (both verbally and in writing)</li>\r\n<li>At least 5 years of professional experience in databases and back-end web development SQL, MySQL, PostgreSQL, MongoDB.</li>\r\n</ul>\r\n<p>Java, PHP</p>\r\n<ul>\r\n<li>Able to show completed projects that showcase their work experience.</li>\r\n<li>Experience in other back-end languages is a plus (C#, C++, Python, etc.).</li>\r\n<li>Great problem solver and follows best practices in web development.</li>\r\n<li>Provides subject matter knowledge and understands the company&rsquo;s overall goals for the application.</li>\r\n</ul>\r\n<p>Job Type: Temporary<br>Contract length: 3 months</p>\r\n<p>Pay: Php75,000.00 - Php100,000.00 per month</p>\r\n<p>Schedule:</p>\r\n<ul>\r\n<li>Flextime</li>\r\n</ul>', '2023-07-22 21:20:50', '2023-11-08', 'Open', 'PHP 75,000 - PHP 100,000 a month', 'Flextime', 'Shift work', 'C++, Java, PHP'),
(52, 1, 'Senior Full Stack Developer', '<p>We specialize in solutions for online video content management and video streaming for web, mobile, and connectedTV / smartTV platforms.</p>\r\n<p>Your expertise in application development, database management, troubleshooting, and security measures will be used to implement UI designs, construct APIs, connect the two, and set up server infrastructure. You will also assist with adding improvements to our products, maintaining code repositories and managing technical documentation.</p>\r\n<p>------------------------------------------------------------------------------------------------------------</p>\r\n<p><strong>Job Details:</strong></p>\r\n<ul>\r\n<li>Job Location: Cebu City Office</li>\r\n<li>Monday - Friday, 9 AM - 6 PM Central Standard Time in the USA with 1 hour break</li>\r\n<li>Salary based on qualifications, PHP 50,000 - PHP 100,000 per month</li>\r\n<li>Full-time job</li>\r\n<li>Paid onboarding provided</li>\r\n</ul>\r\n<p><strong>Job Requirements and Qualifications:</strong></p>\r\n<ul>\r\n<li>At least 5 years experience in frontend web application development with Javascript frameworks such as Angular or React</li>\r\n<li>At least 5 years experience with back-end programming using Python, especially some experience with Django</li>\r\n<li>At least 3 years of Database design and management experience, including proficiency of both SQL and NoSQL databases, especially PostgreSQL</li>\r\n<li>Experience managing git repositories and CI/CD workflows with tools like Jenkins</li>\r\n<li>DevOps knowledge in linux (ubuntu), nginx, and cloud services like Oracle Cloud/AWS</li>\r\n<li>Ability to identify, troubleshoot, and debug application issues to ensure smooth functionality</li>\r\n<li>Knowledge of Agile / Scrum development methodology and workflows</li>\r\n<li>Experience with documentation (System and API structures) using tools like Postman and Swagger etc.</li>\r\n<li>Ability to preform code testing and analysis</li>\r\n<li>Team player is a must, as team collaboration is necessary for all of our positions</li>\r\n<li>College Degree in IT related field of study such as Computer Science or equivalent.</li>\r\n</ul>\r\n<p>Job Type: Full-time</p>\r\n<p>Pay: Php50,000.00 - Php100,000.00 per month</p>\r\n<p>Benefits:</p>\r\n<ul>\r\n<li>Paid training</li>\r\n<li>Pay raise</li>\r\n</ul>\r\n<p>Schedule:</p>\r\n<ul>\r\n<li>8 hour shift</li>\r\n</ul>\r\n<p>Supplemental pay types:</p>\r\n<ul>\r\n<li>13th month salary</li>\r\n</ul>', '2023-07-22 21:29:19', '0000-00-00', 'Open', 'PHP 50,000 - PHP 100,000 a month', 'Day', 'Full time', 'Java, PHP, HTML/CSS, JS'),
(53, 1, 'Web developer (Pasig)', '<p><strong>Responsibilities</strong></p>\r\n<ul>\r\n<li>Cloud-based Web application development using open-source technologies (PHP Laravel or Golang) on AWS.</li>\r\n<li>Play a vital role in the team.</li>\r\n<li>Coordinate with the Singapore HQ team for day-to-day tasks.</li>\r\n<li>Responsible for estimating, planning, managing all tasks, and reporting progress.</li>\r\n<li>Cross-browser compatibility testing.</li>\r\n<li>Run &amp; operate existing production and staging environments, including troubleshooting and impact analysis.</li>\r\n<li>Ad-hoc maintenance support.</li>\r\n<li>Assist in the documentation.</li>\r\n</ul>\r\n<p><strong>Requirements</strong></p>\r\n<ul>\r\n<li>At least&nbsp;<strong>three years</strong>&nbsp;of web development experience in PHP or Go, JavaScript, React JS, PostgreSQL.</li>\r\n<li>Those with more than&nbsp;<strong>five years</strong>&nbsp;experience will be considered as senior position.</li>\r\n<li>Good understanding of API-first approach and FE &amp; BE segregation.</li>\r\n<li>Good understanding of cyber security and OWASP top 10.</li>\r\n<li>Good communicator &amp; self-motivated.</li>\r\n<li>Strong analytical skills.</li>\r\n<li>Problem solver.</li>\r\n<li>A team player.</li>\r\n<li>Able to work independently.</li>\r\n<li>A can-do attitude.</li>\r\n<li>Resourcefulness.</li>\r\n<li>Detail-oriented.</li>\r\n<li>Good time management and responsible.</li>\r\n<li>Willing to learn.</li>\r\n<li>Able to handle stress.</li>\r\n</ul>\r\n<p><strong>Key required skills</strong></p>\r\n<ul>\r\n<li>PHP Laravel or Golang</li>\r\n<li>Frontend (React JS, vanilla JavaScript).</li>\r\n<li>RDBMS SQL (PostgreSQL, MySQL).</li>\r\n<li>AWS services.</li>\r\n</ul>\r\n<p><strong>Good to have skills</strong></p>\r\n<ul>\r\n<li>Linux server administration.</li>\r\n<li>NoSQL (MongoDB, DynamoDB, Redis).</li>\r\n<li>Time series database (QuestDB, Influxdb).</li>\r\n<li>Analytic and visualization tools (Grafana).</li>\r\n<li>Mobile app development experience using Flutter or React Native.</li>\r\n</ul>\r\n<p>Job Types: Full-time, Permanent</p>\r\n<p>Salary: Php50,000.00 - Php100,000.00 per month</p>\r\n<p>Schedule:</p>\r\n<ul>\r\n<li>Day shift</li>\r\n</ul>\r\n<p>Supplemental pay types:</p>\r\n<ul>\r\n<li>13th month salary</li>\r\n</ul>\r\n<p>Ability to commute/relocate:</p>\r\n<ul>\r\n<li>Ortigas Pasig: Reliably commute or planning to relocate before starting work (Required)</li>\r\n</ul>\r\n<p>Application Question(s):</p>\r\n<ul>\r\n<li>When can you start the job?</li>\r\n<li>What is your current salary and expected salary?</li>\r\n<li>Will you willing to take a technical assessment to demonstrate your technical skills?</li>\r\n</ul>\r\n<p>Experience:</p>\r\n<ul>\r\n<li>AWS: 3 years (Preferred)</li>\r\n<li>React JS: 2 years (Preferred)</li>\r\n<li>PostgreSQL: 2 years (Preferred)</li>\r\n<li>PHP Laravel: 5 years (Preferred)</li>\r\n</ul>', '2023-07-22 21:37:20', '2023-10-25', 'Open', 'PHP 50,000 - PHP 100,000 a month', 'Day', 'Permanent', 'PHP, React, Laravel'),
(54, 1, 'Remote Software Developer', '<p>Location: Philippines (remote)</p>\r\n<p>Company Overview:</p>\r\n<p>We are a dynamic and rapidly expanding organization in the e-learning industry, dedicated to providing innovative educational solutions. As part of our growth strategy, we are seeking a skilled Software Developer to join our talented team in the Philippines. This is an exciting opportunity to play a vital role in leading the rebuilding of our current e-learning system, addressing existing bugs, and contributing to its successful relaunch in the market.</p>\r\n<p>Responsibilities:</p>\r\n<p>1. System Rebuilding: Take charge of the rebuilding process for our current e-learning system, leveraging your expertise in software development to enhance its functionality, scalability, and user experience.</p>\r\n<p>2. Bug Fixing: Identify and troubleshoot software issues and bugs within the e-learning system, utilizing problem-solving skills to rectify issues promptly and ensure a smooth user experience.</p>\r\n<p>3. Collaborative Development: Collaborate with cross-functional teams, including designers, product managers, and quality assurance professionals, to ensure the successful implementation of new features and improvements.</p>\r\n<p>4. Technology Stack: Utilize your proficiency in various programming languages and technologies to code, test, and debug software modules, following best practices and coding standards.</p>\r\n<p>5. Performance Optimization: Identify opportunities to optimize the performance and efficiency of the e-learning system, conducting code reviews and implementing improvements to enhance speed, stability, and scalability.</p>\r\n<p>6. Documentation and Reporting: Maintain comprehensive documentation of system changes, feature enhancements, and bug fixes, ensuring clear and concise information for future reference and knowledge transfer.</p>\r\n<p>7. Market Relaunch Support: Collaborate closely with the marketing and business development teams to support the successful relaunch of the e-learning system, providing technical expertise and contributing to the marketing strategy.</p>\r\n<p>8. Agile Development: Participate in agile development processes, including sprint planning, daily stand-ups, and retrospectives, fostering a collaborative and iterative work environment.</p>\r\n<p>Qualifications:</p>\r\n<p>- Bachelor\'s degree in Computer Science, Software Engineering, or a related field.</p>\r\n<p>- Proven experience as a Software Developer, preferably working on large-scale web applications or e-learning systems.</p>\r\n<p>- Strong proficiency in programming languages such as Java, Python, or JavaScript, and related frameworks and libraries.</p>\r\n<p>- Solid understanding of software development principles, methodologies, and best practices.</p>\r\n<p>- Experience with front-end development technologies (HTML, CSS, JavaScript, etc.) and modern web development frameworks (React, Angular, Vue.js, etc.).</p>\r\n<p>- Familiarity with database systems (SQL, NoSQL) and experience in database design and optimization.</p>\r\n<p>- Knowledge of version control systems (Git, SVN) and collaborative development workflows.</p>\r\n<p>- Excellent problem-solving skills with a detail-oriented and analytical mindset.</p>\r\n<p>- Strong communication and teamwork abilities to collaborate effectively with multidisciplinary teams.</p>\r\n<p>- Proven ability to meet project deadlines and deliver high-quality software solutions.</p>\r\n<p>- Experience working in an Agile/Scrum environment is a plus.</p>\r\n<p>Join our team today and make a significant impact on the future of e-learning! Please submit your resume and portfolio showcasing your previous work to be considered for this exciting opportunity.</p>\r\n<p>Job Type: Full-time</p>\r\n<p>Salary: Php1,200,000.00 per year</p>', '2023-07-22 21:46:46', '2023-07-31', 'Open', 'PHP 1,200,000 a year', 'Day', 'Full time', 'Agile/Scrum, Git, SVN, SQL, NoSQL, HTML, CSS, JavaScript, etc.');

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
(2, 'bi@gmail.com', '95d04a4f3e63f77b08a01dd95694292320e952aa', 'EMPLOYER', 'u@$~jgJJD4U1w^smk1G.w(Y&2C8RXOFCD0NUTvIQ1AsY9V<~hD'),
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
  ADD KEY `fk_notif_user_id` (`user_id`),
  ADD KEY `fk_notif_from_user_id` (`from_user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_employee_educ`
--
ALTER TABLE `tbl_employee_educ`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_employee_skill`
--
ALTER TABLE `tbl_employee_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
  ADD CONSTRAINT `fk_notif_from_user_id` FOREIGN KEY (`from_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notif_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD CONSTRAINT `fk_training_employee_id` FOREIGN KEY (`Employee_id`) REFERENCES `tbl_employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
