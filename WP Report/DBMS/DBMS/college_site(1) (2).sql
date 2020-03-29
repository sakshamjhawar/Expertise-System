-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2015 at 06:58 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE IF NOT EXISTS `award` (
  `id` varchar(10) NOT NULL,
  `aid` int(11) NOT NULL,
  `aname` varchar(80) NOT NULL,
  `agency` varchar(80) NOT NULL,
  `url` varchar(40) DEFAULT NULL,
  `rmk` varchar(100) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `adate` date DEFAULT NULL,
  PRIMARY KEY (`id`,`aid`),
  KEY `aid` (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `bid` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `bc` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `edition` varchar(20) DEFAULT NULL,
  `pub_name` varchar(20) NOT NULL,
  `isbn` int(11) DEFAULT NULL,
  `id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`bid`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE IF NOT EXISTS `book_authors` (
  `id` varchar(10) NOT NULL,
  `bid` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `aname` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`bid`,`ano`),
  KEY `book_authors_ibfk_2` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_chapters`
--

CREATE TABLE IF NOT EXISTS `book_chapters` (
  `id` varchar(10) NOT NULL,
  `bid` int(11) NOT NULL,
  `cno` int(10) NOT NULL,
  `cname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`bid`,`cno`),
  KEY `book_chapters_ibfk_2` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `communityuser`
--

CREATE TABLE IF NOT EXISTS `communityuser` (
  `cid` int(11) NOT NULL,
  `name_of_event` varchar(40) NOT NULL,
  `role` varchar(40) DEFAULT NULL,
  `loc` varchar(40) DEFAULT NULL,
  `date_of_event` date DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `add_info` varchar(40) DEFAULT NULL,
  `id` varchar(10) NOT NULL,
  PRIMARY KEY (`cid`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE IF NOT EXISTS `conference` (
  `id` varchar(10) NOT NULL,
  `aid` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `ctype` varchar(100) NOT NULL,
  `rarea` varchar(100) NOT NULL,
  `ppj` varchar(5) NOT NULL,
  `prj_name` varchar(100) DEFAULT NULL,
  `prj_title` varchar(100) DEFAULT NULL,
  `cname` varchar(200) NOT NULL,
  `org` varchar(100) DEFAULT NULL,
  `fdate` date NOT NULL,
  `tdate` date NOT NULL,
  `venue` varchar(100) NOT NULL,
  `pages` varchar(10) NOT NULL,
  `abstract` varchar(500) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `file` varchar(500) NOT NULL,
  PRIMARY KEY (`id`,`aid`,`con_id`),
  KEY `ctype` (`ctype`),
  KEY `cid` (`con_id`),
  KEY `conference_ibfk_2` (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conference_authors`
--

CREATE TABLE IF NOT EXISTS `conference_authors` (
  `id` varchar(10) NOT NULL,
  `con_id` int(11) NOT NULL,
  `author` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`con_id`,`author`),
  KEY `con_id` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE IF NOT EXISTS `consultancy` (
  `con_id` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `client` varchar(80) NOT NULL,
  `title` varchar(80) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `revenue` varchar(15) NOT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `labs` varchar(100) DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`con_id`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_fac_inv`
--

CREATE TABLE IF NOT EXISTS `consultancy_fac_inv` (
  `id` varchar(10) NOT NULL,
  `con_id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`con_id`,`fname`),
  KEY `consultancy_fac_inv_ibfk_3` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `crs_id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `ug_pg` varchar(80) NOT NULL,
  `sem` int(2) NOT NULL DEFAULT '0',
  `year` int(4) DEFAULT NULL,
  `num` int(4) DEFAULT NULL,
  `pass` decimal(5,2) NOT NULL,
  `id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`crs_id`,`sem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_exg_prg`
--

CREATE TABLE IF NOT EXISTS `faculty_exg_prg` (
  `id` varchar(10) NOT NULL,
  `inst` varchar(20) NOT NULL,
  `sub` varchar(20) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `ug_pg` varchar(20) NOT NULL,
  `ctype` varchar(20) NOT NULL,
  `details` varchar(20) DEFAULT NULL,
  `fback` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_mem`
--

CREATE TABLE IF NOT EXISTS `faculty_mem` (
  `fid` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `phno` varchar(30) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `doj` date NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `fid` (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_mem`
--

INSERT INTO `faculty_mem` (`fid`, `username`, `pwd`, `fname`, `lname`, `addr`, `phno`, `picture`, `gender`, `email`, `doj`) VALUES
('rv1213', 'aman', 'aman', 'aman', 'aman', 'jsdkjv', '730838133', '', 'male', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `governance`
--

CREATE TABLE IF NOT EXISTS `governance` (
  `gid` int(11) NOT NULL,
  `name_of_committee` varchar(80) NOT NULL,
  `status_of_committee` varchar(80) NOT NULL,
  `ser_from` date NOT NULL,
  `ser_to` date DEFAULT NULL,
  `role` varchar(80) NOT NULL,
  `responsibility` varchar(80) DEFAULT NULL,
  `id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`gid`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE IF NOT EXISTS `journal` (
  `id` varchar(10) NOT NULL,
  `jid` int(11) NOT NULL,
  `jtype` varchar(20) NOT NULL,
  `rarea` varchar(100) DEFAULT NULL,
  `ppj` varchar(5) NOT NULL,
  `prj_name` varchar(100) DEFAULT NULL,
  `prj_title` varchar(100) NOT NULL,
  `pages` int(11) NOT NULL,
  `abst` varchar(100) NOT NULL,
  `keywords` varchar(30) NOT NULL,
  `jname` varchar(100) NOT NULL,
  `vol` int(11) NOT NULL,
  `issue` int(11) NOT NULL,
  `date` date NOT NULL,
  `imp` varchar(100) DEFAULT NULL,
  `ci` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`,`jid`),
  KEY `jid` (`jid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journal_authors`
--

CREATE TABLE IF NOT EXISTS `journal_authors` (
  `id` varchar(10) NOT NULL,
  `jid` int(11) NOT NULL,
  `aname` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`jid`,`aname`),
  KEY `journal_authors_ibfk_2` (`jid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` varchar(10) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `password`) VALUES
('rv1213', 'aman');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` varchar(10) NOT NULL,
  `qf` varchar(10) NOT NULL,
  `inst` varchar(100) NOT NULL,
  `locn` varchar(100) NOT NULL,
  `unv` varchar(100) NOT NULL,
  `jmonth` varchar(15) DEFAULT NULL,
  `jyear` int(11) DEFAULT NULL,
  `pyear` int(11) NOT NULL,
  `per` decimal(4,2) NOT NULL,
  `cls` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`qf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prof_mem`
--

CREATE TABLE IF NOT EXISTS `prof_mem` (
  `id` varchar(10) NOT NULL,
  `mem_num` varchar(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `mem_type` varchar(15) NOT NULL,
  `fyear` date DEFAULT NULL,
  `tyear` date DEFAULT NULL,
  PRIMARY KEY (`id`,`mem_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` varchar(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `pi` varchar(40) NOT NULL,
  `ci` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `sdate` date NOT NULL,
  `cdate` date DEFAULT NULL,
  `dur` varchar(40) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `dept` varchar(40) DEFAULT NULL,
  `abstract` varchar(100) NOT NULL,
  `fun_agency` varchar(25) DEFAULT NULL,
  `url` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`,`pid`),
  KEY `pid` (`pid`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects_assoc_dept`
--

CREATE TABLE IF NOT EXISTS `projects_assoc_dept` (
  `id` varchar(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `dept` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`pid`,`dept`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects_co_inv`
--

CREATE TABLE IF NOT EXISTS `projects_co_inv` (
  `id` varchar(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `co_in_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`pid`,`co_in_id`),
  KEY `projects_co_inv_ibfk_2` (`pid`),
  KEY `projects_co_inv_ibfk_3` (`co_in_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seminar_workshop`
--

CREATE TABLE IF NOT EXISTS `seminar_workshop` (
  `id` varchar(10) NOT NULL,
  `swid` int(11) NOT NULL,
  `sem_or_wrk` varchar(25) NOT NULL,
  `sw_type` varchar(25) NOT NULL,
  `sw_title` varchar(100) NOT NULL,
  `sw_oa` varchar(25) NOT NULL,
  `sw_date1` date NOT NULL,
  `sw_date2` date NOT NULL,
  `role` varchar(30) NOT NULL,
  `loc` varchar(30) NOT NULL,
  `org` varchar(50) NOT NULL,
  `sw_level` varchar(25) NOT NULL,
  `sw_area` varchar(50) NOT NULL,
  `url1` varchar(70) NOT NULL,
  PRIMARY KEY (`id`,`swid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `award`
--
ALTER TABLE `award`
  ADD CONSTRAINT `award_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD CONSTRAINT `book_authors_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_authors_ibfk_1` FOREIGN KEY (`id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_chapters`
--
ALTER TABLE `book_chapters`
  ADD CONSTRAINT `book_chapters_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_chapters_ibfk_1` FOREIGN KEY (`id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `communityuser`
--
ALTER TABLE `communityuser`
  ADD CONSTRAINT `communityuser_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `award` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conference_authors`
--
ALTER TABLE `conference_authors`
  ADD CONSTRAINT `conference_authors_ibfk_2` FOREIGN KEY (`con_id`) REFERENCES `conference` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conference_authors_ibfk_1` FOREIGN KEY (`id`) REFERENCES `conference` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD CONSTRAINT `consultancy_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy_fac_inv`
--
ALTER TABLE `consultancy_fac_inv`
  ADD CONSTRAINT `consultancy_fac_inv_ibfk_3` FOREIGN KEY (`con_id`) REFERENCES `consultancy` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultancy_fac_inv_ibfk_1` FOREIGN KEY (`id`) REFERENCES `consultancy` (`id`),
  ADD CONSTRAINT `consultancy_fac_inv_ibfk_2` FOREIGN KEY (`id`) REFERENCES `consultancy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_exg_prg`
--
ALTER TABLE `faculty_exg_prg`
  ADD CONSTRAINT `faculty_exg_prg_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `governance`
--
ALTER TABLE `governance`
  ADD CONSTRAINT `governance_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journal_authors`
--
ALTER TABLE `journal_authors`
  ADD CONSTRAINT `journal_authors_ibfk_2` FOREIGN KEY (`jid`) REFERENCES `journal` (`jid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_authors_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prof_mem`
--
ALTER TABLE `prof_mem`
  ADD CONSTRAINT `prof_mem_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects_assoc_dept`
--
ALTER TABLE `projects_assoc_dept`
  ADD CONSTRAINT `projects_assoc_dept_ibfk_3` FOREIGN KEY (`id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_assoc_dept_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `projects` (`pid`);

--
-- Constraints for table `projects_co_inv`
--
ALTER TABLE `projects_co_inv`
  ADD CONSTRAINT `projects_co_inv_ibfk_3` FOREIGN KEY (`co_in_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_co_inv_ibfk_1` FOREIGN KEY (`id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_co_inv_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `projects` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seminar_workshop`
--
ALTER TABLE `seminar_workshop`
  ADD CONSTRAINT `seminar_workshop_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_mem` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
