-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2015 at 04:43 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `college site`
--
CREATE DATABASE `college site` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `college site`;

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE IF NOT EXISTS `award` (
  `aid` varchar(11) NOT NULL,
  `aname` varchar(80) NOT NULL,
  `agency` varchar(80) NOT NULL,
  `url` varchar(40) DEFAULT NULL,
  `rmk` varchar(100) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `adate` date DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`aid`, `aname`, `agency`, `url`, `rmk`, `file`, `adate`) VALUES
('2', 'jhds', 'jhs', '', '', '', '2015-02-10'),
('20', 'abc', 'abc', '', '', NULL, '2014-02-09'),
('3', 'kjfk', 'kjsdk', 'www.abcd.com', 'hsdkj', '', '2015-02-27'),
('4', 'Vivek', 'Vivek', 'abc', 'abc', NULL, '2014-02-09'),
('5', 'abc', 'abc', '', '', NULL, '2014-02-09'),
('6', '', '', '', '', NULL, '2014-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `bid` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `bc` varchar(20) NOT NULL,
  `chapter` varchar(20) DEFAULT NULL,
  `title` varchar(20) NOT NULL,
  `edition` varchar(20) DEFAULT NULL,
  `author1` varchar(20) NOT NULL,
  `author2` varchar(20) DEFAULT NULL,
  `pub_name` varchar(20) NOT NULL,
  `isbn` int(11) DEFAULT NULL,
  `mon` varchar(15) NOT NULL,
  `year` int(11) NOT NULL,
  `other` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bid`, `role`, `bc`, `chapter`, `title`, `edition`, `author1`, `author2`, `pub_name`, `isbn`, `mon`, `year`, `other`) VALUES
(1, 'Reviewer', 'Book', 'jdj', 'jfsj', 'kj', 'kjdk', '', 'kjfk', 0, 'April', 1999, '');

-- --------------------------------------------------------

--
-- Table structure for table `communityuser`
--

CREATE TABLE IF NOT EXISTS `communityuser` (
  `communityid` int(11) NOT NULL,
  `name_of_event` varchar(40) NOT NULL,
  `role` varchar(40) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  `date_of_event` date DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `additional_info` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communityuser`
--

INSERT INTO `communityuser` (`communityid`, `name_of_event`, `role`, `location`, `date_of_event`, `url`, `additional_info`) VALUES
(1, 'fbhhj', 'Nature conservation officer', 'Jabalpur', '2015-01-20', 'www.abcd.com', ''),
(2, 'ksd', 'Academic librarian', 'Achabal', '2015-01-21', 'www.abcd.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE IF NOT EXISTS `conference` (
  `aid` int(11) NOT NULL,
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
  `author1` varchar(100) NOT NULL,
  `author2` varchar(100) DEFAULT NULL,
  `author3` varchar(100) DEFAULT NULL,
  `pages` varchar(10) NOT NULL,
  `abstract1` varchar(500) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `others` varchar(500) DEFAULT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`aid`, `ctype`, `rarea`, `ppj`, `prj_name`, `prj_title`, `cname`, `org`, `fdate`, `tdate`, `venue`, `author1`, `author2`, `author3`, `pages`, `abstract1`, `keywords`, `url`, `others`, `file`) VALUES
(1, 'National', '', 'Yes', '', '', 'kskf', '', '0000-00-00', '0000-00-00', 'kfk', 'kdk', '', '', '23k', 'mns', 'kwd', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `conference_or_journal`
--

CREATE TABLE IF NOT EXISTS `conference_or_journal` (
  `cjid` int(11) NOT NULL,
  `cj` varchar(40) NOT NULL,
  `type_of_cj` varchar(40) NOT NULL,
  `name_of_cj` varchar(40) NOT NULL,
  `role` varchar(40) NOT NULL,
  `accept` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference_or_journal`
--

INSERT INTO `conference_or_journal` (`cjid`, `cj`, `type_of_cj`, `name_of_cj`, `role`, `accept`, `url`) VALUES
(1, 'Conference', 'National', 'jkd', 'Reviewer', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE IF NOT EXISTS `consultancy` (
  `consultancyid` int(11) NOT NULL,
  `client` varchar(80) NOT NULL,
  `title` varchar(80) NOT NULL,
  `sdate` date NOT NULL,
  `cdate` date NOT NULL,
  `f1` varchar(50) NOT NULL,
  `f2` varchar(50) DEFAULT NULL,
  `f3` varchar(50) DEFAULT NULL,
  `revenue` varchar(15) NOT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `labs` varchar(100) DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`consultancyid`, `client`, `title`, `sdate`, `cdate`, `f1`, `f2`, `f3`, `revenue`, `summary`, `labs`, `url`, `others`) VALUES
(1, 'jhdj', 'jhjd', '2015-01-20', '2015-01-20', 'jsh', 'jkd', 'kswj', '12', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `cid` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `ug_pg` varchar(80) NOT NULL,
  `sem` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `num` int(4) DEFAULT NULL,
  `pass` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `title`, `ug_pg`, `sem`, `year`, `num`, `pass`) VALUES
(1, 'dfs', 'UG', 3, 2014, 23, '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_mem`
--

CREATE TABLE IF NOT EXISTS `faculty_mem` (
  `fid` int(11) NOT NULL,
  `inst` varchar(20) NOT NULL,
  `sub` varchar(20) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `ug_pg` varchar(20) NOT NULL,
  `ctype` varchar(20) NOT NULL,
  `fback` varchar(20) NOT NULL,
  `details` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_mem`
--

INSERT INTO `faculty_mem` (`fid`, `inst`, `sub`, `sdate`, `edate`, `ug_pg`, `ctype`, `fback`, `details`) VALUES
(0, 'kdk', 'jkdjsl', '2015-01-20', '0000-00-00', 'UG', '', '', ''),
(0, 'kf', 'kdek', '2015-01-20', '0000-00-00', 'UG', '', '', ''),
(0, 'ijsfak', 'jhjsd', '2015-01-21', '0000-00-00', 'PG', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `governance`
--

CREATE TABLE IF NOT EXISTS `governance` (
  `committee_id` int(11) NOT NULL,
  `name_of_committee` varchar(80) NOT NULL,
  `status_of_committee` varchar(80) NOT NULL,
  `service_from` date NOT NULL,
  `service_to` date DEFAULT NULL,
  `role` varchar(80) NOT NULL,
  `responsibility` varchar(80) DEFAULT NULL,
  `additional_info` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `governance`
--

INSERT INTO `governance` (`committee_id`, `name_of_committee`, `status_of_committee`, `service_from`, `service_to`, `role`, `responsibility`, `additional_info`) VALUES
(0, 'kd', 'University', '2015-01-20', '2015-01-20', 'hdhks', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE IF NOT EXISTS `journal` (
  `jid` int(11) NOT NULL,
  `ctype` varchar(20) NOT NULL,
  `rarea` varchar(100) DEFAULT NULL,
  `ppj` varchar(5) NOT NULL,
  `prj_name` varchar(100) DEFAULT NULL,
  `prj_title` varchar(100) NOT NULL,
  `author1` varchar(100) NOT NULL,
  `author2` varchar(100) DEFAULT NULL,
  `author3` varchar(100) DEFAULT NULL,
  `pages` int(11) NOT NULL,
  `abst` varchar(100) NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `jname` varchar(100) NOT NULL,
  `vol` int(11) NOT NULL,
  `issue` int(11) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` int(11) NOT NULL,
  `imp` varchar(100) DEFAULT NULL,
  `ci` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `mem_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prof_mem`
--

CREATE TABLE IF NOT EXISTS `prof_mem` (
  `cid` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `mem` varchar(40) NOT NULL,
  `type` varchar(15) NOT NULL,
  `fyear` date DEFAULT NULL,
  `tyear` date DEFAULT NULL,
  `others` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prof_mem`
--

INSERT INTO `prof_mem` (`cid`, `name`, `mem`, `type`, `fyear`, `tyear`, `others`) VALUES
(1, 'hdj', '287', 'Lifetime', '0000-00-00', '0000-00-00', 'isj'),
(2, 'jhsj', 'uid', 'Lifetime', '0000-00-00', '0000-00-00', 'hs');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `pid` int(11) NOT NULL,
  `qf` varchar(10) NOT NULL,
  `inst` varchar(100) NOT NULL,
  `locn` varchar(100) NOT NULL,
  `unv` varchar(100) NOT NULL,
  `jmonth` varchar(15) DEFAULT NULL,
  `jyear` int(11) DEFAULT NULL,
  `pyear` int(11) NOT NULL,
  `per` decimal(4,2) NOT NULL,
  `cls` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`pid`, `qf`, `inst`, `locn`, `unv`, `jmonth`, `jyear`, `pyear`, `per`, `cls`) VALUES
(1, 'B.Tech', 'jhd', 'dds', 'sd', '-1', -1, 2001, '87.00', 'FCD');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `pid` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `pi` varchar(40) NOT NULL,
  `ci` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `sdate` date NOT NULL,
  `cdate` date DEFAULT NULL,
  `duration` varchar(40) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `dept` varchar(40) DEFAULT NULL,
  `abstract` varchar(100) NOT NULL,
  `agency` varchar(25) DEFAULT NULL,
  `url` varchar(25) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pid`, `title`, `pi`, `ci`, `status`, `sdate`, `cdate`, `duration`, `cost`, `dept`, `abstract`, `agency`, `url`, `others`) VALUES
(1, 'dhjhjdh', 'jhdh', '', 'In-progress', '2015-01-20', '1887-12-09', '', 636, '', 'hkjsba', 'jkhdaskj', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_workshop`
--

CREATE TABLE IF NOT EXISTS `seminar_workshop` (
  `sem_or_wrk` varchar(25) NOT NULL,
  `sw_type` varchar(25) NOT NULL,
  `sw_title` varchar(100) NOT NULL,
  `sw_oa` varchar(25) NOT NULL,
  `sw_date1` date NOT NULL,
  `sw_date2` date NOT NULL,
  `loc` varchar(30) NOT NULL,
  `org` varchar(50) NOT NULL,
  `sw_level` varchar(25) NOT NULL,
  `sw_area` varchar(50) NOT NULL,
  `url1` varchar(70) NOT NULL,
  `add_info` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
