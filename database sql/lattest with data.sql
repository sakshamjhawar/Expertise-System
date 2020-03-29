-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2015 at 08:05 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `college site`
--
CREATE DATABASE IF NOT EXISTS `college site` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `college site`;

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE IF NOT EXISTS `award` (
  `id` varchar(10) NOT NULL,
  `award_id` int(11) NOT NULL,
  `award_name` varchar(80) NOT NULL,
  `award_agency` varchar(80) NOT NULL,
  `url` varchar(40) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `award_date` date DEFAULT NULL,
  PRIMARY KEY (`id`,`award_id`),
  KEY `aid` (`award_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`id`, `award_id`, `award_name`, `award_agency`, `url`, `remark`, `award_date`) VALUES
('C90e-320lS', 1, 'CSI Best Teacher', 'CSI', 'http://www.csi.org', '', '2015-04-09'),
('C90e-320lS', 2, 'IEEE Best Paper', 'IEEE', 'http://www.ieee.org', 'Paper on Image Processing', '2015-11-05'),
('C90e-320lS', 3, 'Mentor', 'Mentor', '', '', '2015-10-27'),
('C90e-320lS', 4, 'Innovation Award', 'Innovation Pvt. Ltd.', '', 'DAWG', '2014-10-30'),
('C90e-320lS', 5, 'Researcher''s Award', 'TCS', '', 'Kernel Encryption', '2015-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `award_images`
--

CREATE TABLE IF NOT EXISTS `award_images` (
  `id` varchar(10) NOT NULL,
  `award_id` int(11) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`,`award_id`,`image_path`),
  KEY `award_images_ibfk_4` (`award_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `book_or_chapter` varchar(20) NOT NULL,
  `book_title` varchar(20) NOT NULL,
  `book_edition` varchar(20) NOT NULL,
  `publisher_name` varchar(20) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `id` varchar(10) NOT NULL,
  `book_date` date DEFAULT NULL,
  PRIMARY KEY (`book_id`,`id`),
  UNIQUE KEY `isbn` (`isbn`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `role`, `book_or_chapter`, `book_title`, `book_edition`, `publisher_name`, `isbn`, `id`, `book_date`) VALUES
(1, 'Editor', 'Book', 'DBMS', '1', 'Pearson', '1938492348', 'C90e-320lS', '2015-10-26'),
(2, 'Author', 'Book', 'Compiler Design', '1', 'Prestige', '5398593854', 'C90e-320lS', '2014-11-30'),
(3, 'Reviewer', 'Book', 'NLP', '2', 'Pearson', '9389482304', 'C90e-320lS', '2015-11-30'),
(4, 'Co-Author', 'Book', 'Cloud Computing', '2', 'Pearson', '7432484829', 'C90e-320lS', '2014-03-12'),
(5, 'Others', 'Book', 'Software Testing', '2', 'Pearson', '904298472', 'C90e-320lS', '2013-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE IF NOT EXISTS `book_authors` (
  `id` varchar(10) NOT NULL,
  `book_id` int(11) NOT NULL,
  `author_number` int(11) NOT NULL,
  `author_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`book_id`,`author_number`),
  KEY `book_authors_ibfk_2` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_authors`
--

INSERT INTO `book_authors` (`id`, `book_id`, `author_number`, `author_name`) VALUES
('C90e-320lS', 1, 1, 'NKC'),
('C90e-320lS', 2, 1, 'RMS'),
('C90e-320lS', 3, 1, 'BMS'),
('C90e-320lS', 4, 1, 'Smitha GR'),
('C90e-320lS', 5, 1, 'S. Nayak');

-- --------------------------------------------------------

--
-- Table structure for table `book_chapters`
--

CREATE TABLE IF NOT EXISTS `book_chapters` (
  `id` varchar(10) NOT NULL,
  `book_id` int(11) NOT NULL,
  `chapter_name` varchar(50) NOT NULL,
  PRIMARY KEY (`book_id`,`id`,`chapter_name`),
  KEY `book_chapters_ibfk_2` (`book_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `communityuser`
--

CREATE TABLE IF NOT EXISTS `communityuser` (
  `community_user_id` int(11) NOT NULL,
  `name_of_event` varchar(40) NOT NULL,
  `role` varchar(40) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  `date_of_event` date DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `additional_information` varchar(40) DEFAULT NULL,
  `id` varchar(10) NOT NULL,
  PRIMARY KEY (`community_user_id`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communityuser`
--

INSERT INTO `communityuser` (`community_user_id`, `name_of_event`, `role`, `location`, `date_of_event`, `url`, `additional_information`, `id`) VALUES
(1, 'Walkathon', 'Organizer', 'Townhall', '2015-10-27', '', '', 'C90e-320lS'),
(2, 'Orphange Visit', 'Organizer', 'Townhall', '2014-10-27', '', '', 'C90e-320lS'),
(3, 'Paper Drive', 'Organizer', 'Kormangala', '2013-10-27', '', '', 'C90e-320lS'),
(4, 'Mega Ryla', 'Organizer', 'WhiteField', '2013-01-18', '', '', 'C90e-320lS'),
(5, 'Blood Donation', 'Participant', 'RVCE', '2012-01-10', '', '', 'C90e-320lS');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE IF NOT EXISTS `conference` (
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
  `url` varchar(100) DEFAULT NULL,
  `file` varchar(500) NOT NULL,
  `from_page` int(11) DEFAULT NULL,
  `to_page` int(11) DEFAULT NULL,
  `paper_title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`conference_id`),
  KEY `ctype` (`conference_type`),
  KEY `cid` (`conference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`id`, `conference_id`, `conference_type`, `research_area`, `paper_associated_project`, `project_name`, `conference_name`, `organizer`, `from_date`, `to_date`, `venue`, `abstract`, `keywords`, `url`, `file`, `from_page`, `to_page`, `paper_title`) VALUES
('C90e-320lS', 1, 'National', 'Fuzzy Logic', 'No', '', 'Innovative Ideas', '', '2015-10-27', '2015-10-29', 'RVCE', 'Fuzzy Logic', 'Fuzzy Logic, Controller', '', '', 18, 24, 'Fuzzy Logic and Applications'),
('C90e-320lS', 2, 'National', 'DBMS', 'No', '', 'Innovative Ideas', '', '2015-10-27', '2015-10-29', 'RVCE', 'Non Relational DB', 'DBMS, RDBMS', '', '', 12, 15, 'Non Relational Databases'),
('C90e-320lS', 3, 'National', 'Algorithms', 'No', '', 'Algorithm Fair', '', '2014-10-17', '2014-10-29', 'Mysore', 'DBMS', 'DFA, DAWG', '', '', 16, 21, 'DAWG'),
('C90e-320lS', 4, 'National', 'Compilers', 'No', '', 'IEEE Convention', '', '2013-12-16', '2013-12-19', 'Coimbatore', 'Windowing Method', 'Optimization, Compilers', '', '', 16, 21, 'Optimization using Windows'),
('C90e-320lS', 5, 'International', 'Natural Language Processing', 'No', '', 'IEEE Convention', '', '2013-12-16', '2013-12-19', 'Coimbatore', 'Language Idendification', 'NLP, Bayes Classifier, NYSIIS', '', '', 37, 41, 'Language Identification');

-- --------------------------------------------------------

--
-- Table structure for table `conference_authors`
--

CREATE TABLE IF NOT EXISTS `conference_authors` (
  `id` varchar(10) NOT NULL,
  `conference_id` int(11) NOT NULL,
  `author_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`conference_id`,`author_name`),
  KEY `con_id` (`conference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference_authors`
--

INSERT INTO `conference_authors` (`id`, `conference_id`, `author_name`) VALUES
('C90e-320lS', 1, 'SGR'),
('C90e-320lS', 2, 'NKC'),
('C90e-320lS', 3, 'RMS'),
('C90e-320lS', 4, 'NKC'),
('C90e-320lS', 4, 'RMS'),
('C90e-320lS', 5, 'BMS'),
('C90e-320lS', 5, 'RMS');

-- --------------------------------------------------------

--
-- Table structure for table `conference_files`
--

CREATE TABLE IF NOT EXISTS `conference_files` (
  `id` varchar(10) NOT NULL DEFAULT '',
  `conference_id` int(11) NOT NULL DEFAULT '0',
  `file_path` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`conference_id`,`file_path`),
  KEY `conference_files_ibfk_2` (`conference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE IF NOT EXISTS `consultancy` (
  `consultancy_id` int(11) NOT NULL,
  `client` varchar(80) NOT NULL,
  `work_title` varchar(80) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `revenue_generated` varchar(15) NOT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `labs_allocated` varchar(100) DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`consultancy_id`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`consultancy_id`, `client`, `work_title`, `start_date`, `end_date`, `revenue_generated`, `summary`, `labs_allocated`, `url`, `id`) VALUES
(1, 'TCS', 'Fuzzy Logic', '2015-10-27', '2015-10-29', '10000', '', '', '', 'C90e-320lS'),
(2, 'Wipro', 'Advanced DataStructures', '2014-10-27', '2014-10-29', '10000', '', '1', '', 'C90e-320lS'),
(3, 'TE Connectivity', 'Asset Tracker', '2013-10-27', '2013-12-29', '20000', '', '1', '', 'C90e-320lS'),
(4, 'Samsung', 'Android Development', '2012-10-17', '2013-12-18', '100000', '', '1', '', 'C90e-320lS'),
(5, 'Infosys', 'Project Desinging', '2011-10-17', '2011-12-18', '100000', '', '3', '', 'C90e-320lS');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_collaboration`
--

CREATE TABLE IF NOT EXISTS `consultancy_collaboration` (
  `id` varchar(10) NOT NULL,
  `consultancy_id` int(11) NOT NULL,
  `collaborator_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`consultancy_id`),
  KEY `consultancy_id` (`consultancy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_faculty_involved`
--

CREATE TABLE IF NOT EXISTS `consultancy_faculty_involved` (
  `id` varchar(10) NOT NULL,
  `consultancy_id` int(11) NOT NULL,
  `faculty_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`consultancy_id`,`faculty_name`),
  KEY `consultancy_fac_inv_ibfk_3` (`consultancy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultancy_faculty_involved`
--

INSERT INTO `consultancy_faculty_involved` (`id`, `consultancy_id`, `faculty_name`) VALUES
('C90e-320lS', 2, 'Chethana Murthy'),
('C90e-320lS', 3, 'Chethana Murthy'),
('C90e-320lS', 3, 'Nagraj G Cholli'),
('C90e-320lS', 4, 'Anisha BS'),
('C90e-320lS', 4, 'Chethana Murthy'),
('C90e-320lS', 5, 'NKC'),
('C90e-320lS', 5, 'RMS');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_student_involved`
--

CREATE TABLE IF NOT EXISTS `consultancy_student_involved` (
  `id` varchar(10) NOT NULL,
  `consultancy_id` int(11) NOT NULL,
  `student_usn` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`consultancy_id`,`student_usn`),
  KEY `consultancy_id` (`consultancy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses_list`
--

CREATE TABLE IF NOT EXISTS `courses_list` (
  `course_id` varchar(8) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `course_name` varchar(40) NOT NULL,
  `semester` int(11) NOT NULL,
  `ug_pg` varchar(2) NOT NULL,
  `syllabus_year` year(4) NOT NULL,
  `Department` varchar(100) NOT NULL,
  PRIMARY KEY (`course_id`,`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_list`
--

INSERT INTO `courses_list` (`course_id`, `course_code`, `course_name`, `semester`, `ug_pg`, `syllabus_year`, `Department`) VALUES
('2', '12IS63', 'DBMS', 5, 'UG', 2007, 'Computer Science and Engineering'),
('3', '12IS64', 'SE', 5, 'UG', 2007, 'Information Science and Enginerring'),
('4', '12IS67', 'CNS', 7, 'UG', 2007, 'Electrical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `courses_taught`
--

CREATE TABLE IF NOT EXISTS `courses_taught` (
  `id` varchar(10) NOT NULL DEFAULT '',
  `course_id` varchar(8) NOT NULL,
  `academic_year` year(4) NOT NULL DEFAULT '0000',
  `number_of_students` int(4) DEFAULT NULL,
  `pass_percent` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`,`course_id`,`academic_year`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_exchange_program`
--

CREATE TABLE IF NOT EXISTS `faculty_exchange_program` (
  `id` varchar(10) NOT NULL,
  `faculty_exchange_program_id` int(11) NOT NULL,
  `institution` varchar(40) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ug_pg` varchar(20) NOT NULL,
  `collaboration_type` varchar(20) NOT NULL,
  `details_of_collaboration` varchar(20) DEFAULT NULL,
  `feedback` text NOT NULL,
  PRIMARY KEY (`id`,`faculty_exchange_program_id`),
  UNIQUE KEY `faculty_exchange_program_id` (`faculty_exchange_program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_exchange_program`
--

INSERT INTO `faculty_exchange_program` (`id`, `faculty_exchange_program_id`, `institution`, `subject`, `start_date`, `end_date`, `ug_pg`, `collaboration_type`, `details_of_collaboration`, `feedback`) VALUES
('C90e-320lS', 1, 'UCLA', 'DBMS', '2011-01-01', '2011-07-09', 'UG', 'Faculties', '', 'Environment was good.'),
('C90e-320lS', 2, 'Stanford', 'Fuzzy', '2012-01-01', '2012-07-09', 'UG', 'Faculties', '', 'Environment was good.'),
('C90e-320lS', 3, 'German University', 'TOC', '2013-06-02', '2013-07-09', 'UG', 'Faculties', '', 'Environment was good.'),
('C90e-320lS', 4, 'MIT', 'Algorithms', '2014-06-02', '2014-07-09', 'UG', 'Faculties', '', 'Environment was good.'),
('C90e-320lS', 5, 'IIT Bombay', 'Data Structures', '2015-06-02', '2015-07-09', 'UG', 'Faculties', '', 'Environment was good.');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_member`
--

CREATE TABLE IF NOT EXISTS `faculty_member` (
  `fid` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_of_join` date NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fid`,`username`),
  KEY `fid` (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_member`
--

INSERT INTO `faculty_member` (`fid`, `username`, `name`, `address`, `phone_number`, `picture`, `gender`, `email`, `date_of_join`, `date_of_birth`, `department`) VALUES
('17sB3312', 'bksrinivas@rvce.edu.in', 'B K Srinivas', 'rvce', '9980173921', '', 'Male', 'bksrinivas@rvce.edu.in', '2011-12-08', '1983-08-12', 'Information Science and Engineering'),
('22yA02h8', 'dnvinay@rvce.edu.in', 'Array Array', 'ISE Depat , RV College', '9845965157', '', 'Male', 'dnvinay@rvce.edu.in', '2013-02-07', '1977-07-15', 'Information Science and Engineering'),
('25ga4059', 'abc@gmail.com', 'agjsfg', 'mndkj', '7204240644', '', 'Male', 'abc@gmail.com', '2015-12-31', '2014-12-31', 'Information Science and Engineering'),
('C0dA41f6o', 'abcd@gmail.com', 'Aman Anand', '#80, Street no 123, Bangalore', '7204240644', '', 'Male', 'abcd@gmail.com', '2015-12-30', '2015-12-31', 'Computer Science and Engineering'),
('C12nA914kS', 'anand.sheen93@gmail.com', 'Aman', 'hvjavsc', '7204240644', '', 'Male', 'anand.sheen93@gmail.com', '2015-12-31', '2015-12-31', 'Computer Science and Engineering'),
('C22dA213ii', 'smithagr@rvce.edu.oun', 'Aman Anand', 'mnasj', '7204240644', '', 'Male', 'smithagr@rvce.edu.oun', '2013-12-31', '2014-12-31', 'Civil Engineering'),
('C5aV012jo', 'nsgupta.vivek@gmail.com', 'Vivek Gupta', 'nkjkj', '7204246052', '', 'Male', 'nsgupta.vivek@gmail.com', '2015-12-31', '2015-12-31', 'Computer Science and Engineering'),
('C5dl61i0i', 'smithagrs.cs@rvce.edu.oun', 'lnd', 'mbnavb', '7204240644', '', 'Male', 'smithagrs.cs@rvce.edu.oun', '2014-12-31', '2015-12-30', 'Civil Engineering'),
('C87jj8145i', 'smbnacbithagr@rvce.edu.oun', 'jbvakj', 'jbsavkj', '7204240644', '', 'Male', 'smbnacbithagr@rvce.edu.oun', '2015-12-30', '2014-12-31', 'Civil Engineering'),
('C89,m6189i', 'smith.agr@rvce.edu.oun', 'mnvd,', 'jbk', '7204240644', '', 'Male', 'smith.agr@rvce.edu.oun', '2015-12-30', '2014-12-31', 'Civil Engineering'),
('C8VV9120o', 'nsgupta.vivek@gmail.com', 'V', 'jfslfslfklsdkfdsl', '7204246052', '', 'Male', 'nsgupta.vivek@gmail.com', '2015-12-31', '2015-12-31', 'Computer Science and Engineering'),
('C90e-320lS', 'kpushpinder28@gmail.com', 'lol', 'jbkjsadbak', '7204240654', '', 'Male', 'kpushpinder28@gmail.com', '2015-12-31', '2015-12-31', 'Electrical Engineering'),
('I0dm3269n', 'smith.sagr@rvce.edu.oun', 'md', 'hjajv', '7204240644', '', 'Male', 'smith.sagr@rvce.edu.oun', '2015-12-30', '2014-12-31', 'Information Science and Engineering'),
('I11NR32hjn', 'nraghava@rvce.edu.in', 'Raghavendra N', '#6, 15th cross', '9141166455', '', 'Male', 'nraghava@rvce.edu.in', '2015-02-16', '1975-02-05', 'Information Science and Engineering'),
('I14dA81f3S', 'abd@gmail.com', 'Aman Anand', 'jhakjf', '7204240644', '', 'Male', 'abd@gmail.com', '2015-12-30', '2015-12-31', 'Information Science and Engineering'),
('I33nB421hn', 'bksrinavas@rvce.edu.in', 'B K Shrinivasan', 'jhasdifg', '7204240644', '', 'Male', 'bksrinavas@rvce.edu.in', '2002-10-29', '1978-12-06', 'Information Science and Engineering'),
('M14dA3192e', 'smithagr@rvce.edu.ou', 'Aman Anand', 'hmbacsj', '7204240644', '', 'Male', 'smithagr@rvce.edu.ou', '2015-12-30', '2014-12-31', 'Mechanical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `governance`
--

CREATE TABLE IF NOT EXISTS `governance` (
  `governance_id` int(11) NOT NULL,
  `name_of_committee` varchar(80) NOT NULL,
  `status_of_committee` varchar(80) NOT NULL,
  `served_from` date NOT NULL,
  `served_to` date DEFAULT NULL,
  `role` varchar(80) NOT NULL,
  `responsibility` varchar(80) DEFAULT NULL,
  `id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`governance_id`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `governance`
--

INSERT INTO `governance` (`governance_id`, `name_of_committee`, `status_of_committee`, `served_from`, `served_to`, `role`, `responsibility`, `id`) VALUES
(1, 'TCS', 'Company', '2012-11-12', '2012-12-10', 'Teacher', '', 'C90e-320lS'),
(2, 'Paypal', 'Company', '2011-10-10', '2011-11-10', 'Project Guide', '', 'C90e-320lS'),
(3, 'Amazon', 'Company', '2014-11-12', '2014-12-13', 'Project Guide', '', 'C90e-320lS'),
(4, 'Knolskaape', 'Company', '2010-01-10', '2010-03-13', 'Product Design', '', 'C90e-320lS'),
(5, 'Knolarity', 'Company', '2007-01-09', '2007-05-10', 'Guide', '', 'C90e-320lS');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE IF NOT EXISTS `journal` (
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
  `url` varchar(100) DEFAULT NULL,
  `from_page` int(11) DEFAULT NULL,
  `to_page` int(11) DEFAULT NULL,
  `journal_month` varchar(10) DEFAULT NULL,
  `journal_year` year(4) DEFAULT NULL,
  `id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`journal_id`),
  KEY `jid` (`journal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`journal_id`, `journal_type`, `research_area`, `paper_associated_project`, `project_name`, `paper_title`, `abstract`, `keywords`, `journal_name`, `volume`, `issue`, `impact_factor`, `citation index`, `url`, `from_page`, `to_page`, `journal_month`, `journal_year`, `id`) VALUES
(1, 'International', '', 'No', '', 'Cyber Crime Against Women', 'Cyber Crime -Abstract-', 'Cyber Crime, Women', 'Cyber Crime', 2, 13, '', '', '', 0, 0, 'June', 1999, 'C90e-320lS'),
(2, 'International', '', 'No', '', 'DAWG', 'DAWG -Abstract-', 'DAWG, DFA', 'DAWG Algorithms', 3, 15, '', '', '', 0, 0, 'June', 2015, 'C90e-320lS'),
(3, 'International', '', 'No', '', 'Applications of Kleens star', 'FAFL -Abstract-', 'FALF, DFA, Kleens Star', 'Finite Automata', 6, 15, '', '', '', 0, 0, 'June', 2012, 'C90e-320lS'),
(4, 'National', 'Fuzzy Logic', 'No', '', 'Fuzzy Logic Controller', 'Fuzzy Logic Controller', 'Fuzzy, Controller', 'Fuzzy Logic', 9, 8, '', '', '', 0, 0, 'June', 2007, 'C90e-320lS'),
(5, 'National', 'DBMS', 'No', '', 'DBMS', 'DBMS', 'DBMS, Databases', 'Databases', 9, 18, '', '', '', 0, 0, 'June', 1996, 'C90e-320lS');

-- --------------------------------------------------------

--
-- Table structure for table `journal_authors`
--

CREATE TABLE IF NOT EXISTS `journal_authors` (
  `id` varchar(10) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `author_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`journal_id`,`author_name`),
  KEY `journal_authors_ibfk_2` (`journal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_authors`
--

INSERT INTO `journal_authors` (`id`, `journal_id`, `author_name`) VALUES
('C90e-320lS', 1, 'RMS'),
('C90e-320lS', 1, 'Smithagr'),
('C90e-320lS', 2, 'Pushpinder'),
('C90e-320lS', 2, 'RMS'),
('C90e-320lS', 3, 'Pushpinder'),
('C90e-320lS', 3, 'RMS'),
('C90e-320lS', 4, 'RMS'),
('C90e-320lS', 4, 'SGR'),
('C90e-320lS', 5, 'NKC'),
('C90e-320lS', 5, 'RMS');

-- --------------------------------------------------------

--
-- Table structure for table `journal_file`
--

CREATE TABLE IF NOT EXISTS `journal_file` (
  `id` varchar(10) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`,`journal_id`,`file_path`),
  KEY `journal_id` (`journal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `professional_membership`
--

CREATE TABLE IF NOT EXISTS `professional_membership` (
  `id` varchar(10) NOT NULL,
  `membership_number` varchar(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `membership_type` varchar(15) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  PRIMARY KEY (`id`,`membership_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` varchar(10) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `join_month` int(2) NOT NULL,
  `pass_month` int(2) NOT NULL,
  `join_year` year(4) DEFAULT NULL,
  `pass_year` year(4) NOT NULL,
  `percentage` decimal(4,2) NOT NULL,
  `class1` varchar(10) NOT NULL,
  `qualification_file` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`,`qualification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_picture`
--

CREATE TABLE IF NOT EXISTS `profile_picture` (
  `id` varchar(10) NOT NULL,
  `path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_picture`
--

INSERT INTO `profile_picture` (`id`, `path`) VALUES
('C90e-320lS', '../../user_files/C90e-320lS/profile/profilepng');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` varchar(10) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_title` varchar(40) NOT NULL,
  `principal_investigator` varchar(40) NOT NULL,
  `citation_index` varchar(40) NOT NULL,
  `project_status` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `close_date` date DEFAULT NULL,
  `project_cost` int(11) NOT NULL,
  `department` varchar(40) DEFAULT NULL,
  `abstract` varchar(100) NOT NULL,
  `funding_agency` varchar(25) DEFAULT NULL,
  `url` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`,`project_id`,`project_title`),
  KEY `pid` (`project_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_associated_departments`
--

CREATE TABLE IF NOT EXISTS `project_associated_departments` (
  `id` varchar(10) NOT NULL,
  `project_id` int(11) NOT NULL,
  `department` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`project_id`,`department`),
  KEY `pid` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_co_investigator`
--

CREATE TABLE IF NOT EXISTS `project_co_investigator` (
  `id` varchar(10) NOT NULL,
  `project_id` int(11) NOT NULL,
  `co_investigaor_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`project_id`,`co_investigaor_id`),
  KEY `projects_co_inv_ibfk_2` (`project_id`),
  KEY `projects_co_inv_ibfk_3` (`co_investigaor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE IF NOT EXISTS `seminar` (
  `id` varchar(10) NOT NULL,
  `seminar_id` int(11) NOT NULL,
  `seminar_title` varchar(100) NOT NULL,
  `seminar_organizing_authority` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `role` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `seminar_level` varchar(25) NOT NULL,
  `seminar_area` varchar(50) NOT NULL,
  `url` varchar(70) NOT NULL,
  `target_audience` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`,`seminar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id`, `seminar_id`, `seminar_title`, `seminar_organizing_authority`, `start_date`, `end_date`, `role`, `location`, `seminar_level`, `seminar_area`, `url`, `target_audience`) VALUES
('C90e-320lS', 1, 'Robotics', 'RoboCorps', '2015-10-27', '2015-10-27', 'Organiser', 'RVCE', 'National', 'Robotics', '', 'Students'),
('C90e-320lS', 2, 'Hacking', 'VMWare', '2014-10-27', '2014-10-27', 'Organiser', 'RVCE', 'National', 'Network Security', '', 'Students'),
('C90e-320lS', 3, 'High Performance Computing', 'NVDIA', '2013-10-26', '2013-10-27', 'Organiser', 'RVCE', 'National', 'High Performance Computing', '', 'Students'),
('C90e-320lS', 4, 'Machine Learning', 'Random Pvt. Ltd.', '2012-10-26', '2012-10-27', 'Organiser', 'RVCE', 'National', 'Machine Learning', '', 'Students'),
('C90e-320lS', 5, 'Fuzzy', 'IISC', '2011-10-26', '2011-10-27', 'Organiser', 'IISC', 'National', 'Fuzzy Logic and Its Applications', '', 'Students');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `hash`) VALUES
('17sB3312', 'bksrinivas@rvce.edu.in', '83e85b5aec0dba2f6d6a44428dd1f207', '1', 'ab9a1d62638ccb42ffc05df0f700bcd1'),
('22yA02h8', 'dnvinay@rvce.edu.in', '87d8b564926a0ed2eba1a7742651f990', '1', '8a9dacb54b71340a606b1acfc2c467c8'),
('25ga4059', 'abc@gmail.com', 'd37a02355b871d23ff27e3af743e5445', '0', '234975dd449df87b083ff9ecab47a4bb'),
('C0dA41f6o', 'abcd@gmail.com', '51398fb0014cd6b7dba063ee8e21e7fc', '0', '5e74fa8146bc57cd05fb53fde12d3e32'),
('C12nA914kS', 'anand.sheen93@gmail.com', '51398fb0014cd6b7dba063ee8e21e7fc', '0', '3ad41877ed179b3472f4216389323bca'),
('C22dA213ii', 'smithagr@rvce.edu.oun', '51398fb0014cd6b7dba063ee8e21e7fc', '0', '6b4bd8382076d733ab157ce0acfc9665'),
('C5dl61i0i', 'smithagrs.cs@rvce.edu.oun', '9478884042a50123ad3e42f41421a9e5', '0', 'd9a02284723017d9053b102067eb0e00'),
('C87jj8145i', 'smbnacbithagr@rvce.edu.oun', '9f37f71821901d438271ec3489b3eb51', '0', '51c0b837efd83a68a0678b866d13488e'),
('C89,m6189i', 'smith.agr@rvce.edu.oun', 'd75c9260c7eb93aed213d451d4407315', '0', 'e588f9c06a6890a02e276a892a700813'),
('C8VV9120o', 'nsgupta.vivek@gmail.com', '108275ef9ff09f1d3747427195eb3d7b', '0', 'f6f605f31b24aa86f3dfb10b86e1258e'),
('C90e-320lS', 'kpushpinder28@gmail.com', 'd37a02355b871d23ff27e3af743e5445', '1', 'bae00ea1497b81c24daec7c96b687826'),
('I0dm3269n', 'smith.sagr@rvce.edu.oun', '51398fb0014cd6b7dba063ee8e21e7fc', '0', '7ab2141f61ddd1e449d752ebf77a963f'),
('I11NR32hjn', 'nraghava@rvce.edu.in', 'f0b6633ffc8906c050fa0e4d83906e03', '0', '03ac6e28df49ea8d360cc613baf3fb32'),
('I14dA81f3S', 'abd@gmail.com', '51398fb0014cd6b7dba063ee8e21e7fc', '0', 'e1b6820cb6b8446edd8c716c846c18a9'),
('I33nB421hn', 'bksrinavas@rvce.edu.in', '51398fb0014cd6b7dba063ee8e21e7fc', '0', 'a637e9c976cfc32d58a5a2bb03399d16'),
('M14dA3192e', 'smithagr@rvce.edu.ou', '51398fb0014cd6b7dba063ee8e21e7fc', '0', '9eb02f27e2c3e39b38c0f13ad41a0d31');

-- --------------------------------------------------------

--
-- Table structure for table `users_counts`
--

CREATE TABLE IF NOT EXISTS `users_counts` (
  `id` varchar(20) NOT NULL,
  `award` int(11) NOT NULL DEFAULT '0',
  `book` int(11) NOT NULL DEFAULT '0',
  `communityuser` int(11) NOT NULL DEFAULT '0',
  `conference` int(11) NOT NULL DEFAULT '0',
  `consultancy` int(11) NOT NULL DEFAULT '0',
  `courses` int(11) NOT NULL DEFAULT '0',
  `faculty_exchange_program` int(11) NOT NULL DEFAULT '0',
  `governance` int(11) NOT NULL DEFAULT '0',
  `journal` int(11) NOT NULL DEFAULT '0',
  `professional_membership` int(11) NOT NULL DEFAULT '0',
  `profile` int(11) NOT NULL DEFAULT '0',
  `project` int(11) NOT NULL DEFAULT '0',
  `seminar` int(11) NOT NULL DEFAULT '0',
  `workshop` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_counts`
--

INSERT INTO `users_counts` (`id`, `award`, `book`, `communityuser`, `conference`, `consultancy`, `courses`, `faculty_exchange_program`, `governance`, `journal`, `professional_membership`, `profile`, `project`, `seminar`, `workshop`) VALUES
('C90e-320lS', 66, 44, 44, 44, 46, 51, 51, 49, 51, 51, 51, 51, 51, 54);

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE IF NOT EXISTS `workshop` (
  `id` varchar(10) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `workshop_title` varchar(100) NOT NULL,
  `workshop_area` varchar(100) NOT NULL,
  `workshop_organizing_authority` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `role` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `workshop_level` varchar(25) NOT NULL,
  `url` varchar(70) NOT NULL,
  `target_audience` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`,`workshop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id`, `workshop_id`, `workshop_title`, `workshop_area`, `workshop_organizing_authority`, `start_date`, `end_date`, `role`, `location`, `workshop_level`, `url`, `target_audience`) VALUES
('C90e-320lS', 1, 'Embark', 'Enterpreneurship', 'ECell', '2015-10-27', '2015-10-29', 'Attendee', 'RVCE', 'College', 'http://www.embark.com', 'Faculties'),
('C90e-320lS', 2, 'Programmer''s Paradise', 'Programming', 'Mindscuptor', '2015-03-04', '2015-07-01', 'Attendee', 'Yeshwanthpur', 'National', 'http://www.mindsculptor.com', 'Faculties'),
('C90e-320lS', 3, 'Essence of Algorithms', 'Algorithms', 'RVCE', '2015-11-04', '2015-11-21', 'Organiser', 'RVCE', 'National', '', 'Students'),
('C90e-320lS', 4, 'Fuzzy Thinking', 'Fuzzy Logic', 'FuzzyWuzzy', '2014-12-30', '2015-01-08', 'Attendee', 'IISC', 'International', '', 'Faculties and Students'),
('C90e-320lS', 5, 'Robotics', 'Robotics', 'IIT Bombay', '2015-08-28', '2015-09-17', 'Attendee', 'IIT Bombay', 'International', 'www.iitb.com', 'Faculties');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `award`
--
ALTER TABLE `award`
  ADD CONSTRAINT `award_ibfk_2` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `award_images`
--
ALTER TABLE `award_images`
  ADD CONSTRAINT `award_images_ibfk_3` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `award_images_ibfk_4` FOREIGN KEY (`award_id`) REFERENCES `award` (`award_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `communityuser_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conference_authors`
--
ALTER TABLE `conference_authors`
  ADD CONSTRAINT `conference_authors_ibfk_3` FOREIGN KEY (`conference_id`) REFERENCES `conference` (`conference_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conference_authors_ibfk_4` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conference_files`
--
ALTER TABLE `conference_files`
  ADD CONSTRAINT `conference_files_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conference_files_ibfk_2` FOREIGN KEY (`conference_id`) REFERENCES `conference` (`conference_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD CONSTRAINT `consultancy_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy_collaboration`
--
ALTER TABLE `consultancy_collaboration`
  ADD CONSTRAINT `consultancy_collaboration_ibfk_2` FOREIGN KEY (`consultancy_id`) REFERENCES `consultancy` (`consultancy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultancy_collaboration_ibfk_3` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy_faculty_involved`
--
ALTER TABLE `consultancy_faculty_involved`
  ADD CONSTRAINT `consultancy_faculty_involved_ibfk_1` FOREIGN KEY (`id`) REFERENCES `consultancy` (`id`),
  ADD CONSTRAINT `consultancy_faculty_involved_ibfk_4` FOREIGN KEY (`consultancy_id`) REFERENCES `consultancy` (`consultancy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultancy_faculty_involved_ibfk_5` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy_student_involved`
--
ALTER TABLE `consultancy_student_involved`
  ADD CONSTRAINT `consultancy_student_involved_ibfk_4` FOREIGN KEY (`consultancy_id`) REFERENCES `consultancy` (`consultancy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultancy_student_involved_ibfk_5` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses_taught`
--
ALTER TABLE `courses_taught`
  ADD CONSTRAINT `courses_taught_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses_list` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_taught_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_exchange_program`
--
ALTER TABLE `faculty_exchange_program`
  ADD CONSTRAINT `faculty_exchange_program_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `governance`
--
ALTER TABLE `governance`
  ADD CONSTRAINT `governance_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `journal_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journal_authors`
--
ALTER TABLE `journal_authors`
  ADD CONSTRAINT `journal_authors_ibfk_2` FOREIGN KEY (`journal_id`) REFERENCES `journal` (`journal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_authors_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journal_file`
--
ALTER TABLE `journal_file`
  ADD CONSTRAINT `journal_file_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_file_ibfk_2` FOREIGN KEY (`journal_id`) REFERENCES `journal` (`journal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professional_membership`
--
ALTER TABLE `professional_membership`
  ADD CONSTRAINT `professional_membership_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_associated_departments`
--
ALTER TABLE `project_associated_departments`
  ADD CONSTRAINT `project_associated_departments_ibfk_4` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `project_associated_departments_ibfk_5` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_co_investigator`
--
ALTER TABLE `project_co_investigator`
  ADD CONSTRAINT `project_co_investigator_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_co_investigator_ibfk_4` FOREIGN KEY (`co_investigaor_id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_co_investigator_ibfk_5` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seminar`
--
ALTER TABLE `seminar`
  ADD CONSTRAINT `seminar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
