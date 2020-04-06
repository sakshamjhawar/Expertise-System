-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 05:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `id` varchar(10) NOT NULL,
  `award_id` int(11) NOT NULL,
  `award_name` varchar(80) NOT NULL,
  `award_agency` varchar(80) NOT NULL,
  `url` varchar(40) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `award_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`id`, `award_id`, `award_name`, `award_agency`, `url`, `remark`, `award_date`) VALUES
('1RVISF01', 8791, 'Subject Expert', 'VTUE', 'NULL', 'NULL', '2012-05-23'),
('1RVISF02', 987, 'Best Researcher', 'VTUA', NULL, NULL, '2010-09-09'),
('1RVISF03', 8768, 'Best Researcher', 'NPTEL', NULL, NULL, '2012-09-05'),
('1RVISF04', 8734, 'Best Research Person', 'JNTU', NULL, NULL, '2015-03-26'),
('1RVISF05', 4690, 'Best Faculty Coordinator', 'SAP India', NULL, NULL, '2014-09-04'),
('1RVISF06', 6789, 'Best Researcher', 'NPTELHRD', NULL, NULL, '2009-04-06'),
('1RVISF07', 7897, 'Best Coordinator', 'VTU', NULL, NULL, '2009-06-23'),
('1RVISF08', 8888, 'Best Teacher', 'VTU', 'NULL', 'NULL', '2015-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `book_or_chapter` varchar(20) NOT NULL,
  `book_title` varchar(100) DEFAULT NULL,
  `book_edition` varchar(20) NOT NULL,
  `publisher_name` varchar(20) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `id` varchar(10) NOT NULL,
  `book_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `role`, `book_or_chapter`, `book_title`, `book_edition`, `publisher_name`, `isbn`, `id`, `book_date`) VALUES
(1001, 'editor', 'book', 'Introduction to design and analysis of algorithms', '2', 'Pearson', '1001-2002', '1RVISF01', '0000-00-00'),
(70007, 'Author', 'Book', 'Compiler Principles, Techniques and tools', '2', 'Pearson', '6789-0977', '1RVISF04', NULL),
(80008, 'Author', 'Multimedia Computing', 'Multimedia Computing', '1', 'Mangalore University', '9808-6789', '1RVISF02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE `book_authors` (
  `id` varchar(10) NOT NULL,
  `book_id` int(11) NOT NULL,
  `author_number` int(11) NOT NULL,
  `author_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_authors`
--

INSERT INTO `book_authors` (`id`, `book_id`, `author_number`, `author_name`) VALUES
('1RVISF01', 1001, 0, 'anany levitin'),
('1RVISF02', 80008, 2, 'XYZ'),
('1RVISF04', 70007, 2, 'Shobha G');

-- --------------------------------------------------------

--
-- Table structure for table `book_chapters`
--

CREATE TABLE `book_chapters` (
  `id` varchar(10) NOT NULL,
  `book_id` int(11) NOT NULL,
  `chapter_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_chapters`
--

INSERT INTO `book_chapters` (`id`, `book_id`, `chapter_name`) VALUES
('1RVISF01', 1001, 'Analysis of algorithms'),
('1RVISF01', 1001, 'Dynamic programming'),
('1RVISF04', 70007, 'Compilers'),
('1RVISF04', 70007, 'Parsing'),
('1RVISF02', 80008, 'Introduction to Multimedia networking'),
('1RVISF02', 80008, 'Multimedia over ATM Networks'),
('1RVISF02', 80008, 'Multimedia over IP');

-- --------------------------------------------------------

--
-- Table structure for table `communityuser`
--

CREATE TABLE `communityuser` (
  `community_user_id` varchar(11) NOT NULL,
  `name_of_event` varchar(40) NOT NULL,
  `role` varchar(40) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  `date_of_event` date DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `additional_information` varchar(40) DEFAULT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communityuser`
--

INSERT INTO `communityuser` (`community_user_id`, `name_of_event`, `role`, `location`, `date_of_event`, `url`, `additional_information`, `id`) VALUES
('cui01', 'Kannda-telugu translator', 'Member', 'Hyderabad', '2016-01-01', 'NULL', 'NULL', '1RVISF01'),
('cui02', 'Networking Fair', 'Member', 'Mysore', '2012-09-09', NULL, NULL, '1RVISF02'),
('cui03', 'Software Engineering Career Fair', 'Coordinator', 'Bengaluru', '2001-06-09', NULL, NULL, '1RVISF03'),
('cui04', 'Advanced Multimedia Processing Event', 'Member', 'Mangalore', '2009-04-02', NULL, NULL, '1RVISF04'),
('cui05', 'SAP University Program', 'Member', 'Pune', '2013-09-09', NULL, NULL, '1RVISF05'),
('cui06', 'Computing Technology Event', 'Member', 'Mysore', '2014-09-09', NULL, NULL, '1RVISF06'),
('cui07', 'Advanced android programming', 'Member', 'Bengaluru', '2012-01-01', 'NULL', 'NULL', '1RVISF07'),
('cui08', 'System architecture', 'Member', 'Bengaluru', '2011-01-01', 'NULL', 'NULL', '1RVISF08');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `id` varchar(10) NOT NULL,
  `conference_id` int(11) NOT NULL,
  `conference_type` varchar(100) NOT NULL,
  `research_area` varchar(100) NOT NULL,
  `paper_associated_project` varchar(5) NOT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `conference_name` varchar(200) NOT NULL,
  `organizer` varchar(100) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `venue` varchar(100) NOT NULL,
  `abstract` varchar(500) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `file` varchar(500) NOT NULL,
  `from_page` int(11) DEFAULT NULL,
  `to_page` int(11) DEFAULT NULL,
  `paper_title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`id`, `conference_id`, `conference_type`, `research_area`, `paper_associated_project`, `project_name`, `conference_name`, `organizer`, `from_date`, `to_date`, `venue`, `abstract`, `keywords`, `file`, `from_page`, `to_page`, `paper_title`) VALUES
('1RVISF01', 1001, 'Training', 'Instructional design', 'No', 'NULL', 'Instructional design and delivery', 'National teahers institute', '2006-08-02', '2006-09-02', 'Chennai', 'training', 'instl. delivery', 'rms-conference-instldelivery', 0, 0, 'NULL'),
('1RVISF02', 7889, 'Research', 'Cloud Infrastructure', 'No', NULL, 'Intl. Conference on recent trends of Computer Technology in Academia', 'JRNRV University', '2012-04-21', '2012-04-23', 'Udaipur', 'Cloud computing is an ubiquitous tool in shared pools and high-level network services.', 'IaaS,PaaS,SaaS', 'Cloud computing is an ubiquitous tool in shared pools and high-level network services.', NULL, NULL, 'Cloud Computing - A survey Paper'),
('1RVISF03', 5678, 'Research', 'Data Analytics', 'Yes', NULL, 'National Conference on Frontiers of Computer Science', 'DBIT', '2014-05-15', '2014-05-17', 'Bengaluru', 'Data Analytics is the process of discovering and modeling data to support decision making.', 'Business Intelligence, EDA', 'Predictive Analysis helps in knowledge discovery, confirmatory data analysis, exploratory data analysis.', NULL, NULL, 'Real Time Data Analytics using Hadoop'),
('1RVISF04', 2456, 'Research', 'Advanced Multimedia Processing', 'No', NULL, 'International Conference on EC', NULL, '2005-10-28', '2014-05-19', 'Bengaluru', 'Rendering dynamic scenes in mobile arrays', 'HDTV Applications', 'Rendering dynamic scenes in mobile arrays', NULL, NULL, 'Post Processing of Digital Images'),
('1RVISF05', 5005, 'Recent trends in IT', 'Image processing', 'NULL', 'NULL', 'Methodical Approaches to Develop OCR Systems for Indian Languages', 'National conference of trends', '2010-01-01', '2010-01-02', 'Bengaluru', 'natural languages processing', 'NLP', 'NULL', 0, 0, 'NULL'),
('1RVISF06', 6006, 'Networks', 'CN', 'NULL', 'NULL', 'Atnet algo', 'National conference of trends', '2010-01-01', '2010-01-02', 'Bengaluru', 'CNS', 'Cn', 'NULL', 0, 0, 'NULL'),
('1RVISF07', 7007, 'Recent trends', 'Programming', 'NULL', 'NULL', 'Source code repo', 'National conference of trends', '2010-01-01', '2010-01-02', 'Bengaluru', 'Best practise in coding', 'coding', 'NULL', 0, 0, 'NULL'),
('1RVISF08', 8008, 'Recent trends', 'Android Programming', 'NULL', 'NULL', 'android', 'National conference of trends', '2010-01-01', '2010-01-02', 'Bengaluru', 'android', 'android', 'NULL', 0, 0, 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `conference_authors`
--

CREATE TABLE `conference_authors` (
  `id` varchar(10) NOT NULL,
  `conference_id` int(11) NOT NULL,
  `author_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference_authors`
--

INSERT INTO `conference_authors` (`id`, `conference_id`, `author_name`) VALUES
('1RVISF01', 1001, 'Anantha murthy'),
('1RVISF02', 7889, 'Sharvani G S'),
('1RVISF03', 5678, 'Sho'),
('1RVISF05', 5005, 'Anantha murthy'),
('1RVISF06', 6006, 'Anantha murthy'),
('1RVISF07', 7007, 'karthik'),
('1RVISF08', 8008, 'hruthvik');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE `consultancy` (
  `consultancy_id` int(11) NOT NULL,
  `client` varchar(80) NOT NULL,
  `work_title` varchar(80) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `revenue_generated` varchar(15) NOT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `labs_allocated` varchar(100) DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `id` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`consultancy_id`, `client`, `work_title`, `start_date`, `end_date`, `revenue_generated`, `summary`, `labs_allocated`, `url`, `id`) VALUES
(1001, 'RMD engineering college', 'video retreival', '2012-06-23', '2012-07-23', '150000', 'NULL', 'NULL', 'NULL', '1RVISF01'),
(2002, 'samsung', 'NULL', '2012-06-23', '2012-07-23', '150000', 'NULL', 'NULL', 'NULL', '1RVISF02'),
(3003, 'NULL', 'NULL', '2012-06-23', '2012-07-23', '150000', 'NULL', 'NULL', 'NULL', '1RVISF03'),
(4563, 'TE Connectivty', 'Sensory rotors', '2008-09-07', '2009-08-19', '2,00,000', NULL, NULL, NULL, '1RVISF04'),
(5005, 'NITK', 'NULL', '2012-06-23', '2012-07-23', '150000', 'NULL', 'NULL', 'NULL', '1RVISF05'),
(6006, 'Sapient', 'NULL', '2012-06-23', '2012-07-23', '150000', 'NULL', 'NULL', 'NULL', '1RVISF06'),
(7007, 'Intuit', 'NULL', '2013-06-23', '2014-07-23', '77700', 'NULL', 'NULL', 'NULL', '1RVISF07'),
(8008, 'JP morgan', 'NULL', '2011-06-23', '2013-07-23', '77700', 'NULL', 'NULL', 'NULL', '1RVISF08');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_collaboration`
--

CREATE TABLE `consultancy_collaboration` (
  `id` varchar(10) NOT NULL,
  `consultancy_id` int(11) NOT NULL,
  `collaborator_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultancy_collaboration`
--

INSERT INTO `consultancy_collaboration` (`id`, `consultancy_id`, `collaborator_name`) VALUES
('1RVISF01', 1001, 'INTUIT'),
('1RVISF02', 2002, 'microsoft'),
('1RVISF03', 3003, 'ktm'),
('1RVISF04', 4563, 'ABC'),
('1RVISF05', 5005, 'apache'),
('1RVISF06', 6006, 'Xampp'),
('1RVISF07', 7007, 'sparx'),
('1RVISF08', 8008, 'JP morgan');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_student_involved`
--

CREATE TABLE `consultancy_student_involved` (
  `id` varchar(10) NOT NULL,
  `consultancy_id` int(11) NOT NULL,
  `student_usn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultancy_student_involved`
--

INSERT INTO `consultancy_student_involved` (`id`, `consultancy_id`, `student_usn`) VALUES
('1RVISF01', 1001, '1RV15IS016'),
('1RVISF02', 2002, '1RV15IS014'),
('1RVISF03', 3003, '1RV15IS011'),
('1RVISF04', 4563, '1RV12IS789'),
('1RVISF04', 4563, '1RV12IS790'),
('1RVISF05', 5005, '1RV15IS011'),
('1RVISF06', 6006, '1RV15IS016'),
('1RVISF07', 7007, '1RV15IS016'),
('1RVISF08', 8008, '1RV15IS016');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(30) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `semester` int(11) NOT NULL,
  `syllabus_year` year(4) NOT NULL,
  `academic_year` year(4) NOT NULL,
  `ug_pg` varchar(4) NOT NULL,
  `no_of_students` int(11) NOT NULL,
  `id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `semester`, `syllabus_year`, `academic_year`, `ug_pg`, `no_of_students`, `id`) VALUES
('12HSM61', 'MOB', 6, 2012, 2018, 'UG', 72, '1RVISF02'),
('12IS33', 'DAA', 4, 2012, 2018, 'UG', 72, '1RVISF04'),
('12IS61', 'CN', 6, 2012, 2018, 'UG', 12, '1RVISF06'),
('12IS62', 'SE', 6, 2012, 2018, 'UG', 72, '1RVISF03'),
('12IS64', 'DBMS', 6, 2012, 2018, 'UG', 72, '1RVISF01'),
('12IS66', 'SC', 6, 2012, 2018, 'UG', 12, '1RVISF07'),
('12IS6C2', 'CSPA', 6, 2012, 2018, 'UG', 12, '1RVISF05'),
('12ISC63', 'HPC', 6, 2012, 2018, 'UG', 12, '1RVISF08');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_book`
--

CREATE TABLE `faculty_book` (
  `fid` varchar(10) NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_book`
--

INSERT INTO `faculty_book` (`fid`, `bid`) VALUES
('1RVISF04', 70007),
('1RVISF02', 80008),
('1RVISF01', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_exchange_program`
--

CREATE TABLE `faculty_exchange_program` (
  `id` varchar(10) NOT NULL,
  `institution` varchar(40) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ug_pg` varchar(20) NOT NULL,
  `collaboration_type` varchar(20) NOT NULL,
  `feedback` text NOT NULL,
  `faculty_exchange_program_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_exchange_program`
--

INSERT INTO `faculty_exchange_program` (`id`, `institution`, `subject`, `start_date`, `end_date`, `ug_pg`, `collaboration_type`, `feedback`, `faculty_exchange_program_id`) VALUES
('1RVISF01', 'RVCE', 'Research', '2006-08-01', '2006-09-02', 'PG', 'community', 'building automatic translator', 'fep01'),
('1RVISF02', 'Universal Education', 'Research', '2010-08-09', '2010-08-19', 'PG', 'Community', 'Helped to build the overview of different types of communities in Research', 'fep02'),
('1RVISF03', 'University of Arizona', 'Contract Agreements', '2011-09-09', '2011-09-24', 'UG', 'Hierarchial', 'Helped to explore the various technicalities associated with the CSR agreements', 'fep03'),
('1RVISF04', 'RVCE', 'Computer Community', '2006-09-09', '2006-09-12', 'PG', 'Service', 'Helped in exploring the different computer communities', 'fep04'),
('1RVISF05', 'BIT', 'Data Analytics', '2009-08-08', '2009-09-08', 'PG', 'Service', 'Helped to understand Corporate Social Responsibilities.', 'fep05'),
('1RVISF06', 'BMSCE', 'Community User', '2008-09-09', '2008-09-19', 'PG', 'Community', 'Helped in understanding the different prevalent computer societies', 'fep06'),
('1RVISF07', 'KSIT', 'Sentimental Analysis', '2007-08-09', '2007-08-19', 'UG', 'Service', 'Helped in sentimental analysis of social media tweets', 'fep07'),
('1RVISF08', 'RVCE', 'Research', '2006-08-01', '2006-09-02', 'PG', 'community', 'instructional design', 'fep08');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_fep`
--

CREATE TABLE `faculty_fep` (
  `fid` varchar(20) NOT NULL,
  `fepid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_fep`
--

INSERT INTO `faculty_fep` (`fid`, `fepid`) VALUES
('1RVISF01', 1001),
('1RVISF03', 4567),
('1RVISF07', 5678),
('1RVISF04', 7495),
('1RVISF05', 7689),
('1RVISF08', 8008),
('1RVISF02', 8790),
('1RVISF06', 8954);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_journal`
--

CREATE TABLE `faculty_journal` (
  `journal_id` int(11) NOT NULL,
  `fid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_journal`
--

INSERT INTO `faculty_journal` (`journal_id`, `fid`) VALUES
(2098, '1RVISF02'),
(6789, '1RVISF03'),
(6746, '1RVISF04'),
(1245, '1RVISF01'),
(5005, '1RVISF05'),
(6006, '1RVISF06'),
(7007, '1RVISF07'),
(7008, '1RVISF08');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_member`
--

CREATE TABLE `faculty_member` (
  `fid` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_of_join` date NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_member`
--

INSERT INTO `faculty_member` (`fid`, `name`, `username`, `password`, `address`, `phone_number`, `picture`, `gender`, `email`, `date_of_join`, `date_of_birth`, `department`, `role`) VALUES
('1RVISF01', 'Rajashekara Murthy S', 'rajashekaramurthys@rvce.edu.in', 'rms@123', 'Nagarbhavi', '720420644', 'www.rvce.edu.in/rms', 'Male', 'rajashekaramurthys@rvce.edu.in', '2000-09-09', '1985-09-02', 'ISE', 'Associate Professor'),
('1RVISF02', 'Smitha GR', 'smithagr@rvce.edu.in', 'sgr@123', 'Rajajinagar', '7204240644', 'www.rvce.edu.in/ise-sgr', 'Female', 'smithagr@rvce.edu.in', '2007-12-30', '1978-12-31', 'ISE', 'Assistant Professor'),
('1RVISF03', 'Padmashree T', 'padmashreet@rvce.edu.in', 'pt@123', 'Vijaynagar', '7204240644', 'www.rvce.edu.in/ise-pt', 'Female', 'padmashreet@rvce.edu.in', '2008-12-31', '1975-12-31', 'ISE', 'Assistant Professor'),
('1RVISF04', 'Dr.B M Sagar', 'sagarbm@rvce.edu.in', 'bms@123', 'RR Nagar', '7204240644', 'www.rvce.edu.in/ise-bms', 'Male', 'sagarbm@rvce.edu.in', '2002-12-31', '1973-12-31', 'ISE', 'Associate Professor'),
('1RVISF05', 'Rashmi R', 'rashmir@rvce.edu.in', 'rr@123', 'N R Colony', '7204246052', 'www.rvce.edu.in/rr', 'Female', 'rashmir@rvce.edu.in', '2009-09-09', '1984-09-04', 'ISE', 'Assistant Professor'),
('1RVISF06', 'Dr.N K Cauvery', 'cauverynk@rvce.edu.in', 'nkc@123', 'Kengeri', '7204240644', 'www.rvce.edu.in/ise-cauvery', 'Female', 'cauverynk@rvce.edu.in', '2000-08-30', '1978-09-08', 'ISE', 'HOD'),
('1RVISF07', 'Kavitha S N', 'kavithasn@rvce.edu.in', 'ksn@123', 'Banashankari', '7204240644', 'www.rvce.edu.in/ise-ksn', 'Female', 'kavithasn@rvce.edu.in', '2007-09-09', '1976-09-07', 'ISE', 'Assistant Professor'),
('1RVISF08', 'Priya D', 'priyad@rvce.edu.in', 'pd@123', 'Basvangudi', '720420648', 'www.rvce.edu.in/ise-priya', 'Female', 'priyad@rvce.edu.in', '2008-10-21', '1980-05-23', 'ISE', ' Assistant professor');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_project`
--

CREATE TABLE `faculty_project` (
  `fid` varchar(30) DEFAULT NULL,
  `project_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_project`
--

INSERT INTO `faculty_project` (`fid`, `project_id`) VALUES
('1RVISF01', '1001'),
('1RVISF02', '2002'),
('1RVISF03', '3003'),
('1RVISF04', '7689'),
('1RVISF05', '5005'),
('1RVISF06', '6006'),
('1RVISF07', '7007'),
('1RVISF08', '8008');

-- --------------------------------------------------------

--
-- Table structure for table `governance`
--

CREATE TABLE `governance` (
  `governance_id` varchar(11) NOT NULL,
  `name_of_committee` varchar(80) NOT NULL,
  `status_of_committee` varchar(80) NOT NULL,
  `served_from` date NOT NULL,
  `served_to` date DEFAULT NULL,
  `role` varchar(80) NOT NULL,
  `responsibility` varchar(80) DEFAULT NULL,
  `id` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `governance`
--

INSERT INTO `governance` (`governance_id`, `name_of_committee`, `status_of_committee`, `served_from`, `served_to`, `role`, `responsibility`, `id`) VALUES
('gov01', 'CSI', 'Advise', '2009-05-03', NULL, 'Governing Member', NULL, '1RVISF01'),
('gov02', 'NPTEL', 'Permanent', '2007-09-07', '2015-09-12', 'President', NULL, '1RVISF02'),
('gov03', 'NPTEL', 'Monitor Compliance', '2012-04-03', NULL, 'Deputy Member', NULL, '1RVISF03'),
('gov03', 'IDREJ', 'Review Board', '2009-08-07', '2009-12-06', 'Member', NULL, '1RVISF05'),
('gov04', 'Referral Legislation', 'Permanent', '2007-09-09', '2010-08-07', 'Member', NULL, '1RVISF04'),
('gov06', 'NBA', 'Review Board', '2014-09-07', '2015-08-07', 'Deputy Chairperson', NULL, '1RVISF06'),
('gov07', 'IJRERD', 'Publication', '2008-05-02', '2009-08-02', 'Member', NULL, '1RVISF07'),
('gov08', 'IEEE', 'Publication Review', '2005-08-07', '2006-08-07', 'Member', NULL, '1RVISF08');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` varchar(10) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `journal_type` varchar(20) NOT NULL,
  `research_area` varchar(100) DEFAULT NULL,
  `paper_associated_project` varchar(5) NOT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `paper_title` varchar(100) NOT NULL,
  `abstract` varchar(100) NOT NULL,
  `keywords` varchar(30) NOT NULL,
  `journal_name` varchar(100) NOT NULL,
  `volume` int(11) NOT NULL,
  `issue` int(11) NOT NULL,
  `impact_factor` varchar(100) DEFAULT NULL,
  `citation index` varchar(50) DEFAULT NULL,
  `from_page` int(11) DEFAULT NULL,
  `to_page` int(11) DEFAULT NULL,
  `journal_month` varchar(10) DEFAULT NULL,
  `journal_year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `journal_id`, `journal_type`, `research_area`, `paper_associated_project`, `project_name`, `paper_title`, `abstract`, `keywords`, `journal_name`, `volume`, `issue`, `impact_factor`, `citation index`, `from_page`, `to_page`, `journal_month`, `journal_year`) VALUES
('1RVISF01', 1245, 'Research', 'NLP', 'Yes', 'Morphological Analysis', 'Morphological Analyzer for Kannada', 'Kannada is a highly inflectional language', 'Inflection,Derivation', 'IEEE', 4, 2, NULL, '20', 1, 4, 'January', 2009),
('1RVISF02', 2098, 'Research', 'Multimedia Computing', 'Yes', NULL, 'Detection of global motion patterns using video motion detection system', 'Image processing has diversified applications in video detection systems', 'Detection,classification', 'CiiT International Journal', 3, 10, NULL, NULL, 719, 723, 'May', 2013),
('1RVISF05', 5005, 'research', 'Networks', 'Yes', 'Network security', 'Atnet algo', 'security in network using new algo', 'cn', 'atner algo', 1, 3, 'NULL', 'NULL', 0, 0, '08', 2015),
('1RVISF06', 6006, 'research', 'coding', 'Yes', 'programming', 'coding repo', 'repository for code', 'coding', 'repo', 1, 3, 'NULL', 'NULL', 0, 0, '08', 2015),
('1RVISF04', 6746, 'Research', 'NLP', '', NULL, 'Conversion of kannada text image file to machine editable format', 'Conversion of kannada text image file to machine editable format using DBMS Approach', 'DBMS,Schema', 'International journal of computers', 2, 6, NULL, NULL, NULL, NULL, NULL, 2008),
('1RVISF03', 6789, 'Research', 'Adhoc networks', 'No', NULL, 'A short study of Wireless Sensor networks ', 'Wireless networks refer to a group of spatially dispersed networks.', 'Spatial access,WSN', 'International journal for mobile and Ad-hoc networks', 2, 2, NULL, NULL, NULL, NULL, 'May', 2012),
('1RVISF07', 7007, 'research', 'android', 'Yes', 'programming', 'advanced android prog', 'android', 'coding', 'NULL', 1, 3, 'NULL', 'NULL', 0, 0, '08', 2015),
('1RVISF08', 7008, 'research', 'android', 'Yes', 'programming', 'advanced android prog', 'android', 'coding', 'NULL', 1, 3, 'NULL', 'NULL', 0, 0, '08', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `journal_authors`
--

CREATE TABLE `journal_authors` (
  `id` varchar(10) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `author_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_authors`
--

INSERT INTO `journal_authors` (`id`, `journal_id`, `author_name`) VALUES
('1RVISF01', 1245, 'Sachin D'),
('1RVISF02', 2098, 'Shravani GS'),
('1RVISF03', 6789, 'N K Cauvery'),
('1RVISF04', 6746, 'Shobha G'),
('1RVISF05', 5005, 'K V Vishwanatha'),
('1RVISF06', 6006, 'B M Sagar'),
('1RVISF07', 7007, 'Akul S'),
('1RVISF08', 7008, 'Shobha G');

-- --------------------------------------------------------

--
-- Table structure for table `professional_membership`
--

CREATE TABLE `professional_membership` (
  `id` varchar(10) NOT NULL,
  `membership_number` varchar(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `membership_type` varchar(15) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professional_membership`
--

INSERT INTO `professional_membership` (`id`, `membership_number`, `name`, `membership_type`, `from_date`, `to_date`) VALUES
('1RVISF01', 'mem001', 'CSI', 'permanent', '2006-01-01', '0000-00-00'),
('1RVISF02', 'mem899', 'CSI', 'Full-fledged', '2009-08-09', NULL),
('1RVISF03', 'mem003', 'ISB', 'Permanent', '2010-05-01', '0000-00-00'),
('1RVISF04', 'mem799', 'ITSC', 'permanent', '2012-01-01', NULL),
('1RVISF05', 'mem098', 'IJRERD', 'permanent', '2012-05-01', '0000-00-00'),
('1RVISF06', 'mem006', 'Springer', '20 years', '2011-09-19', '0000-00-00'),
('1RVISF07', 'mem007', 'CSI', 'permanent', '2007-02-10', '0000-00-00'),
('1RVISF08', 'mem008', 'TE', '7 years', '2010-06-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` varchar(10) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `join_month` int(2) NOT NULL,
  `pass_month` int(2) NOT NULL,
  `join_year` year(4) DEFAULT NULL,
  `pass_year` year(4) NOT NULL,
  `percentage` decimal(4,2) NOT NULL,
  `qualiification` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `institution`, `location`, `university`, `join_month`, `pass_month`, `join_year`, `pass_year`, `percentage`, `qualiification`) VALUES
('1RVISF01', 'RVCE', 'BENGALURU', 'VTU', 9, 8, 2001, 2002, '98.00', 'MTech,Ph.D'),
('1RVISF02', 'RVCE', 'Bengaluru', 'VTU', 2001, 2005, NULL, 2006, '95.00', 'MTech,Ph.D'),
('1RVISF03', 'RVCE', 'Bengaluru', 'VTU', 2000, 2004, NULL, 2006, '98.00', 'MTech,Ph.D'),
('1RVISF04', 'RVCE', 'Bengaluru', 'VTU', 10, 12, NULL, 2001, '98.00', 'M.Tech, P.G. Dip, Ph.D'),
('1RVISF05', 'RVCE', 'Bengaluru', 'VTU', 9, 9, 1997, 2001, '97.00', 'MTech,Ph.D'),
('1RVISF06', 'RVCE', 'Bengaluru', 'VTU', 1996, 2000, NULL, 2002, '96.00', 'MTech,Ph.D'),
('1RVISF07', 'RVCE', 'BENGALURU', 'VTU', 9, 8, 2005, 2006, '91.00', 'MTech,Ph.D'),
('1RVISF08', 'RVCE', 'BENGALURU', 'VTU', 9, 8, 2005, 2006, '91.00', 'MTech,Ph.D');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` varchar(10) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_title` varchar(40) NOT NULL,
  `principal_investigator` varchar(40) NOT NULL,
  `project_status` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `close_date` date DEFAULT NULL,
  `project_cost` int(11) NOT NULL,
  `department` varchar(40) DEFAULT NULL,
  `abstract` varchar(100) NOT NULL,
  `funding_agency` varchar(25) DEFAULT NULL,
  `url` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_id`, `project_title`, `principal_investigator`, `project_status`, `start_date`, `close_date`, `project_cost`, `department`, `abstract`, `funding_agency`, `url`) VALUES
('1RVISF01', 1001, 'translator', 'isb hyderabad', 'going on', '2017-01-01', '0000-00-00', 20000, 'NLP', 'telugu and kannada translator', 'hyderabad govt', 'NULL'),
('1RVISF02', 2002, 'wireless sensors', 'samsung', 'going on', '2015-01-01', '0000-00-00', 20000, 'iot', 'iot', 'hyderabad govt', 'NULL'),
('1RVISF03', 3003, 'coding repo', 'TE', 'going on', '2015-01-01', '0000-00-00', 20000, 'dbms', 'dbms', 'null', 'NULL'),
('1RVISF04', 7689, 'A new framework for language analysis', 'ABC', 'Completed', '2014-11-12', '2016-05-12', 1323000, 'ISE', 'Used to understand inflectional forms of a language', NULL, NULL),
('1RVISF05', 5005, 'networks', 'cisco', 'going on', '2015-01-01', '0000-00-00', 20000, 'cns', 'cns', 'null', 'NULL'),
('1RVISF06', 6006, 'se', 'sap', 'going on', '2016-07-03', '0000-00-00', 2000, 'soft computing', 'cns', 'null', 'NULL'),
('1RVISF07', 6006, 'se', 'sap', 'going on', '2016-07-03', '0000-00-00', 2000, 'soft computing', 'cns', 'null', 'NULL'),
('1RVISF08', 8008, 'se', 'sap', 'going on', '2016-07-03', '0000-00-00', 2000, 'soft computing', 'cns', 'null', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `project_associated_departments`
--

CREATE TABLE `project_associated_departments` (
  `id` varchar(10) NOT NULL,
  `project_id` int(11) NOT NULL,
  `department` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_associated_departments`
--

INSERT INTO `project_associated_departments` (`id`, `project_id`, `department`) VALUES
('1RVISF01', 1001, 'ISE'),
('1RVISF02', 2002, 'ECE'),
('1RVISF03', 3003, 'CSE'),
('1RVISF04', 7689, 'CSE'),
('1RVISF05', 5005, 'ISE'),
('1RVISF06', 6006, 'ISE'),
('1RVISF07', 6006, 'CSE'),
('1RVISF08', 8008, 'ISE');

-- --------------------------------------------------------

--
-- Table structure for table `project_co_investigator`
--

CREATE TABLE `project_co_investigator` (
  `id` varchar(10) NOT NULL,
  `project_id` int(11) NOT NULL,
  `co_investigaor_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_co_investigator`
--

INSERT INTO `project_co_investigator` (`id`, `project_id`, `co_investigaor_id`) VALUES
('1RVISF01', 1001, '1RVISF04'),
('1RVISF02', 2002, '1RVISF03'),
('1RVISF03', 3003, '1RVISF01'),
('1RVISF04', 7689, '1RVISF02'),
('1RVISF05', 5005, '1RVISF01'),
('1RVISF06', 6006, '1RVISF04'),
('1RVISF07', 6006, '1RVISF04'),
('1RVISF08', 8008, '1RVISF05');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id` varchar(10) NOT NULL,
  `seminar_title` varchar(100) NOT NULL,
  `seminar_organizing_authority` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `role` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `seminar_level` varchar(25) NOT NULL,
  `seminar_area` varchar(50) NOT NULL,
  `target_audience` varchar(30) DEFAULT NULL,
  `seminar_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id`, `seminar_title`, `seminar_organizing_authority`, `start_date`, `end_date`, `role`, `location`, `seminar_level`, `seminar_area`, `target_audience`, `seminar_id`) VALUES
('1RVISF01', 'Instructional design and arch', 'NIST', '2012-02-02', '2012-03-02', 'member', 'Chennai', 'National', 'Tech education', 'Lecturers', 's01'),
('1RVISF03', 'Software Engineering Principles', 'NITK', '2009-09-09', '2009-09-12', 'Organizer', 'Mangalore', 'Advanced', 'Software Engineering', 'Lecturers', 's03'),
('1RVISF04', 'Session on data structures', 'SJBIT', '2016-07-21', '2016-07-23', 'Presenter', 'Bengaluru', 'College', 'Tech Education', 'Students and Teachers', 's04'),
('1RVISF05', 'SAP Technology', 'SAP', '2011-09-09', '2011-09-10', 'Member', 'Bengaluru', 'Industry', 'seminar_area', 'Lecturers', 's05'),
('1RVISF06', 'data based embedding of image stegonography', 'national technical centre', '2013-07-21', '2013-07-23', 'presenter', 'bengaluru', 'national', 'tech education', 'students and teachers', 's06'),
('1RVISF07', 'SIP push to talk service', 'international journal of ', '2013-04-21', '2013-04-23', 'presenter', 'bengaluru', 'national', 'tech education', 'students and teachers', 's07'),
('1RVISF08', 'data structures using c++', 'RVCE', '2017-06-21', '2017-06-23', 'presenter', 'bengaluru', 'college', 'tech education', 'students and teachers', 's08');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id` varchar(10) NOT NULL,
  `workshop_title` varchar(100) NOT NULL,
  `workshop_area` varchar(100) NOT NULL,
  `workshop_organizing_authority` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `role` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `workshop_level` varchar(25) NOT NULL,
  `target_audience` varchar(30) DEFAULT NULL,
  `workshop_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id`, `workshop_title`, `workshop_area`, `workshop_organizing_authority`, `start_date`, `end_date`, `role`, `location`, `workshop_level`, `target_audience`, `workshop_id`) VALUES
('1RVISF01', 'NLP Rule-based Approach', 'NLP', 'Central Govt', '2009-09-09', '2009-09-10', 'Convenor', 'Mysuru', 'Advanced', 'Lecturers', 'w01'),
('1RVISF02', 'Different approaches to Parts Of Speech (POS)Tagging', 'computer science', 'RVCE', '2011-01-10', '2011-01-13', 'participant', 'bengaluru', 'advanced', 'engg students', 'w02'),
('1RVISF03', 'Frontiers of Computer Science', 'computer science', 'DBIT', '2014-01-23', '2014-01-25', 'participant', 'bengaluru', 'advanced', 'engg students', 'w03'),
('1RVISF04', 'Hash-Based String Matching Algorithm For Network Intrusion Prevention systems (NIPS)', 'technology', 'RVCE', '2011-02-23', '2011-02-25', 'participant', 'bengaluru', 'advanced', 'engg students', 'w04'),
('1RVISF05', 'Enterprise Architectures', 'Management', 'RVCE', '2014-10-11', '2014-10-13', 'Organizer', 'Bengaluru', 'Advanced', NULL, 'w05'),
('1RVISF06', 'Development Of ITSM Attachment Viewer: An Web UI Application', 'technology', 'RVCE', '2011-02-23', '2011-02-25', 'participant', 'bengaluru', 'advanced', 'engg students', 'w06'),
('1RVISF07', 'object tracking using neural networks', 'technology', 'RVCE', '2014-05-23', '2014-05-25', 'participant', 'bengaluru', 'advanced', 'engg students', 'w07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`id`,`award_id`),
  ADD KEY `aid` (`award_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`) USING BTREE,
  ADD KEY `id` (`id`);

--
-- Indexes for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD PRIMARY KEY (`id`,`book_id`,`author_number`),
  ADD KEY `book_authors_ibfk_2` (`book_id`);

--
-- Indexes for table `book_chapters`
--
ALTER TABLE `book_chapters`
  ADD PRIMARY KEY (`book_id`,`id`,`chapter_name`),
  ADD KEY `book_chapters_ibfk_2` (`book_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `communityuser`
--
ALTER TABLE `communityuser`
  ADD PRIMARY KEY (`community_user_id`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id`,`conference_id`),
  ADD KEY `ctype` (`conference_type`),
  ADD KEY `cid` (`conference_id`);

--
-- Indexes for table `conference_authors`
--
ALTER TABLE `conference_authors`
  ADD PRIMARY KEY (`id`,`conference_id`,`author_name`),
  ADD KEY `con_id` (`conference_id`);

--
-- Indexes for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD PRIMARY KEY (`consultancy_id`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `consultancy_collaboration`
--
ALTER TABLE `consultancy_collaboration`
  ADD PRIMARY KEY (`id`,`consultancy_id`),
  ADD KEY `consultancy_id` (`consultancy_id`);

--
-- Indexes for table `consultancy_student_involved`
--
ALTER TABLE `consultancy_student_involved`
  ADD PRIMARY KEY (`id`,`consultancy_id`,`student_usn`),
  ADD KEY `consultancy_id` (`consultancy_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `faculty_book`
--
ALTER TABLE `faculty_book`
  ADD KEY `bid` (`bid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `faculty_exchange_program`
--
ALTER TABLE `faculty_exchange_program`
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `faculty_fep`
--
ALTER TABLE `faculty_fep`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `fid` (`fid`),
  ADD KEY `fepid` (`fepid`);

--
-- Indexes for table `faculty_journal`
--
ALTER TABLE `faculty_journal`
  ADD KEY `journal_id` (`journal_id`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `faculty_member`
--
ALTER TABLE `faculty_member`
  ADD PRIMARY KEY (`fid`,`username`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `governance`
--
ALTER TABLE `governance`
  ADD PRIMARY KEY (`governance_id`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`journal_id`) USING BTREE,
  ADD KEY `jid` (`journal_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `journal_authors`
--
ALTER TABLE `journal_authors`
  ADD PRIMARY KEY (`id`,`journal_id`,`author_name`),
  ADD KEY `journal_authors_ibfk_2` (`journal_id`);

--
-- Indexes for table `professional_membership`
--
ALTER TABLE `professional_membership`
  ADD PRIMARY KEY (`id`,`membership_number`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`,`project_id`,`project_title`),
  ADD KEY `pid` (`project_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `project_associated_departments`
--
ALTER TABLE `project_associated_departments`
  ADD PRIMARY KEY (`id`,`project_id`,`department`),
  ADD KEY `pid` (`project_id`);

--
-- Indexes for table `project_co_investigator`
--
ALTER TABLE `project_co_investigator`
  ADD PRIMARY KEY (`id`,`project_id`,`co_investigaor_id`),
  ADD KEY `projects_co_inv_ibfk_2` (`project_id`),
  ADD KEY `projects_co_inv_ibfk_3` (`co_investigaor_id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`workshop_id`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `award`
--
ALTER TABLE `award`
  ADD CONSTRAINT `award_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `award_ibfk_3` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD CONSTRAINT `book_authors_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_authors_ibfk_7` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_chapters`
--
ALTER TABLE `book_chapters`
  ADD CONSTRAINT `book_chapters_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_chapters_ibfk_7` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `communityuser`
--
ALTER TABLE `communityuser`
  ADD CONSTRAINT `communityuser_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `communityuser_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conference_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conference_authors`
--
ALTER TABLE `conference_authors`
  ADD CONSTRAINT `conference_authors_ibfk_3` FOREIGN KEY (`conference_id`) REFERENCES `conference` (`conference_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conference_authors_ibfk_4` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD CONSTRAINT `consultancy_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultancy_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy_collaboration`
--
ALTER TABLE `consultancy_collaboration`
  ADD CONSTRAINT `consultancy_collaboration_ibfk_2` FOREIGN KEY (`consultancy_id`) REFERENCES `consultancy` (`consultancy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultancy_collaboration_ibfk_3` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy_student_involved`
--
ALTER TABLE `consultancy_student_involved`
  ADD CONSTRAINT `consultancy_student_involved_ibfk_4` FOREIGN KEY (`consultancy_id`) REFERENCES `consultancy` (`consultancy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultancy_student_involved_ibfk_5` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_book`
--
ALTER TABLE `faculty_book`
  ADD CONSTRAINT `faculty_book_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE,
  ADD CONSTRAINT `faculty_book_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_book_ibfk_3` FOREIGN KEY (`fid`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_exchange_program`
--
ALTER TABLE `faculty_exchange_program`
  ADD CONSTRAINT `faculty_exchange_program_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_exchange_program_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`),
  ADD CONSTRAINT `faculty_exchange_program_ibfk_3` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`),
  ADD CONSTRAINT `faculty_exchange_program_ibfk_4` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_fep`
--
ALTER TABLE `faculty_fep`
  ADD CONSTRAINT `faculty_fep_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty_member` (`fid`),
  ADD CONSTRAINT `faculty_fep_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_journal`
--
ALTER TABLE `faculty_journal`
  ADD CONSTRAINT `faculty_journal_ibfk_1` FOREIGN KEY (`journal_id`) REFERENCES `journal` (`journal_id`),
  ADD CONSTRAINT `faculty_journal_ibfk_2` FOREIGN KEY (`journal_id`) REFERENCES `journal` (`journal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_journal_ibfk_3` FOREIGN KEY (`fid`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_journal_ibfk_4` FOREIGN KEY (`fid`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `governance`
--
ALTER TABLE `governance`
  ADD CONSTRAINT `governance_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `governance_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journal_authors`
--
ALTER TABLE `journal_authors`
  ADD CONSTRAINT `journal_authors_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_authors_ibfk_2` FOREIGN KEY (`journal_id`) REFERENCES `journal` (`journal_id`);

--
-- Constraints for table `professional_membership`
--
ALTER TABLE `professional_membership`
  ADD CONSTRAINT `professional_membership_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professional_membership_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_associated_departments`
--
ALTER TABLE `project_associated_departments`
  ADD CONSTRAINT `project_associated_departments_ibfk_4` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `project_associated_departments_ibfk_5` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_associated_departments_ibfk_6` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_co_investigator`
--
ALTER TABLE `project_co_investigator`
  ADD CONSTRAINT `project_co_investigator_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_co_investigator_ibfk_4` FOREIGN KEY (`co_investigaor_id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_co_investigator_ibfk_5` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_co_investigator_ibfk_6` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seminar`
--
ALTER TABLE `seminar`
  ADD CONSTRAINT `seminar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seminar_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workshop_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
