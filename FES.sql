-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2017 at 02:28 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `FES`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `myusername` varchar(20) NOT NULL,
  `mypassword` varchar(20) NOT NULL,
  `dept` varchar(200) NOT NULL,
  KEY `dept` (`dept`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`myusername`, `mypassword`, `dept`) VALUES
('IS', 'IS', 'IS'),
('CS', 'CS', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE IF NOT EXISTS `award` (
  `Award_name` varchar(20) NOT NULL,
  `Agency` varchar(20) NOT NULL,
  `A_year` int(20) NOT NULL,
  `url` varchar(20) NOT NULL,
  `ESSN` varchar(200) NOT NULL,
  `certificate` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`Award_name`),
  KEY `ESSN` (`ESSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`Award_name`, `Agency`, `A_year`, `url`, `ESSN`, `certificate`, `image`) VALUES
('Best faculty', 'RVCE', 2015, 'http://werfg.com', '12345678', '1.html', 'Screenshot from 2017-11-13 21:46:18.png'),
('best professor', 'rvce', 2017, 'www.htnl.com', '108015', '', ''),
('best teacher', 'MHRD', 2016, 'http://kjdgvkdfg', '108014', '', ''),
('Mrs Smart', 'VTU', 2015, 'http//:bhfjshwf', '108014', '', ''),
('Performer of  year', 'AICTE', 2015, 'http//:hfsfgfgjf', '108014', '', ''),
('Researcher of  year', 'Cognizant', 2015, 'http//:datnltics.com', '108014', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE IF NOT EXISTS `consultancy` (
  `period` int(20) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `Client_name` varchar(20) NOT NULL,
  `Fac_involved` varchar(20) NOT NULL,
  `revenue_generated` int(20) NOT NULL,
  `Essn` varchar(20) NOT NULL,
  `URL` varchar(200) NOT NULL,
  PRIMARY KEY (`period`,`c_name`,`Client_name`,`Essn`),
  KEY `Essn` (`Essn`),
  KEY `Essn_2` (`Essn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`period`, `c_name`, `Client_name`, `Fac_involved`, `revenue_generated`, `Essn`, `URL`) VALUES
(1, 'software consultancy', 'rajesh', 'Chetana R M', 10000, '108016', 'http://softwarecon.com'),
(2, 'ISE consultancy', 'harsha', 'Dr Ramakanth kumar', 6788778, '1RV13ISE013', 'www.rvce.com'),
(3, 'DAT solutions', 'arpitha', 'N K Cauvery', 78884, '1RV13ISE012', 'www.datsolutions.com'),
(5, 'SAS projects', 'chethan', 'Dr.  B M sagar', 100000, '123456', 'http://sas.com');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `branch` varchar(20) NOT NULL,
  `course_code` varchar(10) NOT NULL DEFAULT '',
  `course_name` varchar(50) DEFAULT NULL,
  `year` int(4) NOT NULL DEFAULT '0',
  `semester` varchar(10) DEFAULT NULL,
  `section` varchar(1) NOT NULL,
  `ESSN` varchar(200) NOT NULL,
  PRIMARY KEY (`course_code`,`year`,`ESSN`),
  KEY `ESSN` (`ESSN`),
  KEY `ESSN_2` (`ESSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`branch`, `course_code`, `course_name`, `year`, `semester`, `section`, `ESSN`) VALUES
('IS', '12HSM61', 'management organizational behaviour', 2017, '6', 'A', '1RV13ISE012'),
('IS', '12IS62', 'software engineering', 2017, '6', 'A', '1RV13ISE012'),
('IS', '12IS63', 'computer network security', 2017, '6', 'A', '1RV13ISE012'),
('IS', '12IS64', 'database  management system', 2017, '6', 'A', '1RV13ISE012'),
('IS', '12is72', 'web ', 2017, '7', 'A', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `title`) VALUES
('CS', 'Computer Science'),
('IS', 'Information Science');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `university` varchar(50) NOT NULL,
  `year_of_reg` int(4) DEFAULT NULL,
  `year_of_completion` int(4) NOT NULL DEFAULT '0',
  `guided_by` varchar(200) NOT NULL,
  `ESSN` varchar(50) NOT NULL DEFAULT '',
  `certificate` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`year_of_completion`,`ESSN`),
  KEY `ESSN` (`ESSN`),
  KEY `ESSN_2` (`ESSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`university`, `year_of_reg`, `year_of_completion`, `guided_by`, `ESSN`, `certificate`, `image`) VALUES
('VTU', 2006, 2009, 'Dr Ramakanth Kumar', '1RV13ISE013', '', ''),
('VTU', 2010, 2013, 'Dr Ramakanth Kumar', '123456', '', ''),
('VTU', 2012, 2013, 'Dr Ramakanth Kumar', '1RV13ISE012', '', ''),
('VTU', 2011, 2015, 'NK cauvery', '12345678', '', ''),
('AICTE', 2012, 2016, 'Dr Ramakanth Kumar', '108014', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `name` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `mobile_no` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `ESSN` varchar(50) NOT NULL DEFAULT '',
  `qualification` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `designation` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dept` varchar(2) NOT NULL,
  PRIMARY KEY (`ESSN`),
  KEY `dept` (`dept`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `dob`, `mobile_no`, `email`, `gender`, `address`, `ESSN`, `qualification`, `doj`, `designation`, `password`, `dept`) VALUES
('Dr Nagaraj Cholli', '1985-10-06', '9449662560', 'nagaraj@gmail.com', 'M', '32,1st cross hanumanath nagar', '108014', 'M.tech', '2012-04-02', 'Assosiate professor', 'nagaraj', 'IS'),
('swarnalatha', '1980-04-04', '9865437231', 'swarnalatha@gmail.com', 'F', 'RV college of engineering', '108015', 'M.tech', '2015-04-07', 'Assistant Professor', 'swarna', 'IS'),
('chetana R M', '1970-04-03', '8973524136', 'chetanarm@gmail.com', 'F', 'RV college of engineering', '108016', 'M.tech', '2012-04-12', 'Assistant Professor', 'chetana', 'IS'),
('Dr. B M Sagar', '1965-11-06', '9877536234', 'sagarbm@gmail.com', 'M', 'RV college of engineering', '123456', 'M.tech', '2012-05-02', 'Assosiate professor', 'sagar', 'IS'),
('harsha', '1993-11-06', '9591968969', 'harsha@gmail.com', 'male', 'zdhvga', '12345678', 'B.tech', '2016-02-09', 'professor', 'harsha', 'IS'),
('N K Cauvery', '1979-09-06', '8476912345', 'cauvery@gmail.com', 'F', '#3,1st main,3rd cross,banashankari', '1RV13ISE012', 'M.tech', '2010-10-03', 'HOD', 'cauvery', 'IS'),
('Dr Ramakanth kumar', '1960-04-27', '9591968969', 'ramakanth@gmail.com', 'M', '#27,basvangudi ,banglore', '1RV13ISE013', 'M.tech', '2013-04-05', 'Assosiate professor', 'ramakanth', 'IS'),
('Arpitha', '1996-04-09', '8951130241', 'appu@gmail.com', 'F', 'Bangalore', '1rv14is009', 'B.tech', '2014-01-01', 'student', 'arpitha', 'IS'),
('Roopa', '1985-06-06', '8766549322', 'roopa@gmail.com', 'F', 'Bangalore', '1rv15is020', 'B.tech', '2010-10-01', 'SDC', 'roopa', 'IS');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_login`
--

CREATE TABLE IF NOT EXISTS `faculty_login` (
  `myusername` varchar(30) NOT NULL,
  `mypassword` varchar(30) NOT NULL,
  PRIMARY KEY (`myusername`,`mypassword`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_login`
--

INSERT INTO `faculty_login` (`myusername`, `mypassword`) VALUES
('108016', 'chetana'),
('111', 'harsha'),
('12345', '12345'),
('123456', 'sagar'),
('12345678', 'harsha'),
('1RV13ISE012', 'cauvery'),
('1RV13ISE013', 'ramakanth'),
('1rv14is009', 'arpitha'),
('1rv15is020', 'roppa'),
('1rv15is404', 'abc'),
('ise', 'ise');

-- --------------------------------------------------------

--
-- Table structure for table `invited_talk`
--

CREATE TABLE IF NOT EXISTS `invited_talk` (
  `topic` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `research_area` varchar(20) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `ESSN` varchar(20) NOT NULL,
  `Participation_level` varchar(20) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY (`date`,`ESSN`),
  KEY `Essn` (`ESSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invited_talk`
--

INSERT INTO `invited_talk` (`topic`, `date`, `research_area`, `org_name`, `ESSN`, `Participation_level`, `remarks`) VALUES
('faculty development program', '2013-05-26', 'C V raman Nagar', 'rvce', '1RV13ISE013', 'PG', ''),
('Information security', '2014-09-22', 'security network', 'dbit', '1RV13ISE012', 'PG', ''),
('SAP-HYBRIS TE', '2015-04-10', 'cloud platform', 'nit', '1RV13ISE012', 'UG', '');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE IF NOT EXISTS `paper` (
  `paper_num` int(10) DEFAULT NULL,
  `published_by` varchar(50) DEFAULT NULL,
  `ISBN` int(20) NOT NULL,
  `paper_type` varchar(25) DEFAULT NULL,
  `ESSN` varchar(20) NOT NULL DEFAULT '',
  `paper_topic` varchar(20) NOT NULL,
  `co_author` varchar(20) NOT NULL,
  `URL` varchar(200) NOT NULL,
  `certificate` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`ISBN`,`ESSN`),
  KEY `ESSN` (`ESSN`),
  KEY `ESSN_2` (`ESSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`paper_num`, `published_by`, `ISBN`, `paper_type`, `ESSN`, `paper_topic`, `co_author`, `URL`, `certificate`, `image`) VALUES
(1, 'Anisha B S ', 22781021, 'international jernoul', '123456', 'vSphere Anlysis tool', 'Sachin D joshi,Raj', 'http://vsphereanalysis.com', '', ''),
(2, 'Dr Sagar B M', 23191022, 'state level', '123456', 'Dictionary implmtn ', 'Rahul R, Anisha B S', 'www.dictionary.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patent`
--

CREATE TABLE IF NOT EXISTS `patent` (
  `year_of_reg` int(20) NOT NULL,
  `Essn` int(11) NOT NULL,
  `patent_title` varchar(20) NOT NULL,
  `patent_type` varchar(20) NOT NULL,
  `Faculty_name` varchar(20) NOT NULL,
  `certificate` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`Essn`,`patent_title`),
  KEY `Essn` (`Essn`),
  KEY `Essn_2` (`Essn`),
  KEY `Essn_3` (`Essn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patent`
--

INSERT INTO `patent` (`year_of_reg`, `Essn`, `patent_title`, `patent_type`, `Faculty_name`, `certificate`, `image`) VALUES
(2011, 123456, 'cnstrtv prduvctive F', 'planning patent', 'swarnalatha', '', ''),
(2017, 123456, 'Dictionary Implement', 'software patent', 'Dr. B M Sagar', '', ''),
(2011, 123456, 'Software ageing ', 'Software patent', 'Dr Nagaraj Cholli', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `pno` int(10) NOT NULL DEFAULT '0',
  `project_name` varchar(50) DEFAULT NULL,
  `year_of_sanction` int(4) DEFAULT NULL,
  `period` int(10) DEFAULT NULL,
  `ESSN` varchar(50) NOT NULL DEFAULT '',
  `amt_sanctioned` varchar(20) NOT NULL,
  `funding_org` varchar(20) NOT NULL,
  `URL` varchar(200) NOT NULL,
  `certificate` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`pno`,`ESSN`),
  KEY `ESSN` (`ESSN`),
  KEY `ESSN_2` (`ESSN`),
  KEY `ESSN_3` (`ESSN`),
  KEY `ESSN_4` (`ESSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pno`, `project_name`, `year_of_sanction`, `period`, `ESSN`, `amt_sanctioned`, `funding_org`, `URL`, `certificate`, `image`) VALUES
(1, 'Analysis and Design of GPS based Target tracking', 2005, 1, '1RV13ISE012', '4.30 LAKHS', 'Naval Research Delhi', 'www.gpsanalysis.com', '', ''),
(2, 'Continuous and descrete infrastructure modelling', 2006, 2, '1RV13ISE012', '10.00 LAKHS', 'General motors Blr', 'http://descrete.com', '', ''),
(3, 'adaptive texture methods for automatic  detective ', 2008, 2, '1RV13ISE012', '7.784 LAKHS', 'armament Research ND', 'http://adaptive_texture.com', '', ''),
(4, 'Effective multimedia information retrieval', 2012, 3, '1RV13ISE012', '12.9 lakhs', 'GE (R &D) blore', 'www.effective_multi.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `technical_faculty`
--

CREATE TABLE IF NOT EXISTS `technical_faculty` (
  `name` varchar(10) NOT NULL DEFAULT '',
  `dob` date DEFAULT NULL,
  `mobile_no` int(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `ESSN` varchar(50) NOT NULL DEFAULT '',
  `qualification` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `designation` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`name`,`email`,`ESSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technical_faculty`
--

INSERT INTO `technical_faculty` (`name`, `dob`, `mobile_no`, `email`, `gender`, `address`, `ESSN`, `qualification`, `doj`, `designation`, `password`) VALUES
('vinay', '1985-04-10', 98765432, 'vinay@gmail.com', 'M', '#3,3rd cross,basavangudi', '1RV14ISE011', 'B.Tech', '2013-04-11', 'Technical', 'vinay'),
('vinayak', '1986-08-10', 897653422, 'vinayak@gmail.com', 'M', '32,1st cross vijaynagar', '1RV14ISE010', 'B.Tech', '2012-04-02', 'Technical', 'vinayak');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE IF NOT EXISTS `workshop` (
  `workshop_ID` varchar(10) NOT NULL,
  `topic` varchar(30) NOT NULL,
  `year` int(4) DEFAULT NULL,
  `ESSN` varchar(50) NOT NULL,
  `workshop_mode` varchar(30) NOT NULL,
  `Workshop_type` varchar(20) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY (`workshop_ID`,`ESSN`),
  KEY `ESSN` (`ESSN`),
  KEY `ESSN_2` (`ESSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`workshop_ID`, `topic`, `year`, `ESSN`, `workshop_mode`, `Workshop_type`, `remarks`) VALUES
('1024002', 'E-Kanban TE connectivity', 2015, '1RV13ISE012', 'UG', 'national', ''),
('201400', 'technology training', 2013, '1RV13ISE012', 'conducted', 'national', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`dept`) REFERENCES `department` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `award`
--
ALTER TABLE `award`
  ADD CONSTRAINT `award_ibfk_1` FOREIGN KEY (`ESSN`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE;

--
-- Constraints for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD CONSTRAINT `consultancy_ibfk_1` FOREIGN KEY (`Essn`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultancy_ibfk_2` FOREIGN KEY (`Essn`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`ESSN`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`ESSN`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_ibfk_3` FOREIGN KEY (`ESSN`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`ESSN`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`dept`) REFERENCES `department` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invited_talk`
--
ALTER TABLE `invited_talk`
  ADD CONSTRAINT `invited_talk_ibfk_1` FOREIGN KEY (`ESSN`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE;

--
-- Constraints for table `paper`
--
ALTER TABLE `paper`
  ADD CONSTRAINT `paper_ibfk_1` FOREIGN KEY (`ESSN`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`ESSN`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE;

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`ESSN`) REFERENCES `faculty` (`ESSN`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
