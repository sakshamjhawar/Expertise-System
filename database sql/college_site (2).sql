-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2015 at 08:58 AM
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
('C90e-320lS', 3, 'aman', 'aman', 'https://www', '', '2014-02-09'),
('C90e-320lS', 4, 'pqr', 'pqr', '', '', '2014-02-09'),
('C90e-320lS', 5, 'a', 'b', '', '', '2014-02-09'),
('C90e-320lS', 6, 'vd', 'sfe', '', 'sdfdv', '2014-02-09'),
('C90e-320lS', 7, 'a', 'b', '', '', '2014-02-09'),
('C90e-320lS', 8, 'd', 'd', '', '', '2015-04-30'),
('C90e-320lS', 9, 'nc', 'nc', '', '', '2015-04-30'),
('C90e-320lS', 10, 'nc', 'nc', 'https://www.google.com', '', '2015-04-30'),
('C90e-320lS', 11, 'mnbsf', 'bdav,', '', '', '2015-04-30'),
('C90e-320lS', 12, 'fbs', 'vdds,', '', '', '2015-04-30'),
('C90e-320lS', 13, 'fbfs', 'av,', '', '', '2015-04-30'),
('C90e-320lS', 14, 'dsg', 'sdvs', 'https://www.googl', '', '2015-04-30'),
('C90e-320lS', 19, 'nmbam', 'nvsamv', 'http://hbaf.hgjfsa', 'kjsagvbvsa, hgsjv', '2015-04-16'),
('C90e-320lS', 20, 'kvdh', 'jlhjas', 'http://hkhsd.d,jhghs', 'hkjvd, gwfjg', '2015-04-30'),
('C90e-320lS', 21, 'jbavs', 'jaskcj', '', '', '2015-04-30'),
('C90e-320lS', 22, 'hgc', 'kback', '', '', '2015-04-30'),
('C90e-320lS', 23, 'ritu', 'ritu', '', '', '2015-04-30'),
('C90e-320lS', 24, 'ritu1', 'ritu', '', '', '2015-04-30'),
('C90e-320lS', 25, 'rituq', 'ritu', '', '', '2015-04-30'),
('C90e-320lS', 26, 'rituq', 'ritu', '', '', '2015-04-30'),
('C90e-320lS', 27, 'amanana', 'jaksbcb', '', '', '2015-04-30'),
('C90e-320lS', 28, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 29, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 30, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 31, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 32, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 33, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 34, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 35, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 36, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 37, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 38, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 39, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 40, 'yayyyyy', 'f', '', '', '2015-04-30'),
('C90e-320lS', 41, 'gjgj', 'gjg', 'http://www.', 'gjgj', '2015-05-02'),
('C90e-320lS', 42, 'gjgj', 'gjg', 'http://www.', 'gjgj', '2015-05-02'),
('C90e-320lS', 43, 'no', 'no', '', '', '2015-05-02'),
('C90e-320lS', 44, 'jajbskb', 'bksdbvk', 'http://wbhj.', 'vjhvcaj', '2015-05-02'),
('C90e-320lS', 45, ',b,abc', 'bbac', '', 'bmbv', '2015-05-02'),
('C90e-320lS', 46, 'amazon', 'amazon', '', 'kjbdv', '2015-05-02'),
('C90e-320lS', 47, 'ds,vn', 'jds', '', '', '2015-05-02'),
('C90e-320lS', 48, 'ds,vn', 'jds', '', '', '2015-05-02'),
('C90e-320lS', 49, 'ds,vn', 'jds', '', '', '2015-05-02'),
('C90e-320lS', 50, 'Check', 'Check', 'http://www.check.com', 'Check', '2015-11-11'),
('C90e-320lS', 51, 'Check', 'Check', 'http://www.check.com', 'Check', '2015-11-11'),
('C90e-320lS', 52, 'Check', 'Check', 'http://www.check.com', 'Check', '2015-11-11'),
('C90e-320lS', 53, 'Check', 'Check', 'http://www.check.com', 'Check', '2015-11-11'),
('C90e-320lS', 54, 'Check', 'Check', 'http://www.check.com', '', '2015-11-11'),
('C90e-320lS', 55, 'Check', 'Check', '', '', '2015-11-11'),
('C90e-320lS', 56, 'Check', 'Check', '', '', '2015-11-11'),
('C90e-320lS', 57, 'feksf', 'sfkjfsk', '', '', '2015-11-11'),
('C90e-320lS', 58, 'kdjgk', 'dgldffkgld', '', '', '2015-11-11'),
('C90e-320lS', 59, 'ldgfl', ',ldfkg;d', '', '', '2015-11-11'),
('C90e-320lS', 60, 'Check', 'Check', '', 'Check', '2015-11-11'),
('C90e-320lS', 61, 'Check', 'Check', '', 'Check', '2015-11-11'),
('C90e-320lS', 62, 'Check', 'Check', '', 'Check', '2015-11-11'),
('C90e-320lS', 63, 'fskjfds', 'skfjdskfjs', '', '', '2015-11-11'),
('C90e-320lS', 64, 'pk', 'pk', '', '', '2015-11-11'),
('C90e-320lS', 65, 'chekc', 'check', '', '', '2015-11-11'),
('C90e-320lS', 66, 'gflgdk', 'dsflkfls', '', '', '2015-11-11'),
('C90e-320lS', 67, 'vivek', 'vivek', '', '', '2015-11-11'),
('C90e-320lS', 68, 'vivek', 'vivek', '', '', '2015-11-11'),
('C90e-320lS', 69, 'vivek', 'vivek', '', '', '2015-11-11'),
('C90e-320lS', 70, 'vivek', 'vivek', '', '', '2015-11-11'),
('C90e-320lS', 71, 'vivek', 'vivek', '', '', '2015-11-11'),
('C90e-320lS', 72, 'vivek', 'vivek', '', '', '2015-11-11'),
('C90e-320lS', 73, 'vivek', 'vivek', '', '', '2015-11-11'),
('C90e-320lS', 74, 'ghf', 'fghgdh', '', '', '2015-11-11'),
('C90e-320lS', 75, 'jkjkjkjkjk', 'jkjkjkjkjkjkjkjk', '', '', '2015-11-11'),
('C90e-320lS', 76, 's', 's', '', '', '2015-11-11'),
('C90e-320lS', 77, 'k', 'k', '', '', '2015-11-11'),
('C90e-320lS', 78, 's', 's', '', '', '2015-11-11'),
('C90e-320lS', 79, 'k', 'k', '', '', '2015-11-11'),
('C90e-320lS', 80, 'k', 'k', '', '', '2015-11-11'),
('C90e-320lS', 81, 'p', 'p', '', '', '2015-11-11'),
('C90e-320lS', 82, 'l', 'l', '', '', '2015-11-11'),
('C90e-320lS', 83, 'a', 'a', '', '', '2015-11-11'),
('C90e-320lS', 84, 'm', 'm', '', '', '2015-11-11'),
('C90e-320lS', 85, 'm', 'm', '', '', '2015-11-11'),
('C90e-320lS', 86, 'n', 'n', '', '', '2015-11-11'),
('C90e-320lS', 87, 'q', 'q', '', '', '2015-11-11'),
('C90e-320lS', 88, 'f', 'f', '', '', '2015-11-11'),
('C90e-320lS', 89, 'x', 'x', '', '', '2015-11-11'),
('C90e-320lS', 90, 'y', 'y', '', '', '2015-11-11'),
('C90e-320lS', 91, 't', 't', '', '', '2015-11-11'),
('C90e-320lS', 92, 't', 't', '', '', '2015-11-11'),
('C90e-320lS', 93, 'h', 'h', '', '', '2015-11-11'),
('C90e-320lS', 94, 'h', 'h', '', '', '2015-11-11'),
('C90e-320lS', 95, 'h', 'h', '', '', '2015-11-11'),
('C90e-320lS', 96, 'f', 'f', '', '', '2015-11-11'),
('C90e-320lS', 97, 'f', 'f', '', '', '2015-11-11'),
('C90e-320lS', 98, 'd', 'd', '', '', '2015-11-11'),
('C90e-320lS', 99, 'pkvg', 'pkvg', '', '', '2015-11-11'),
('C90e-320lS', 100, 'vivekg', 'vivekg', '', '', '2015-11-11'),
('C90e-320lS', 101, 'g', 'g', '', '', '2015-11-11'),
('C90e-320lS', 102, 'j', 'j', '', '', '2015-11-11');

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

--
-- Dumping data for table `award_images`
--

INSERT INTO `award_images` (`id`, `award_id`, `image_path`) VALUES
('C90e-320lS', 4, 'C90e-320lS_favicon.ico'),
('C90e-320lS', 5, 'C90e-320lS_favicon.ico'),
('C90e-320lS', 8, 'C90e-320lS_C20dA214lo_C1nA210jS_download_(1).jpg'),
('C90e-320lS', 11, 'C90e-320lS_loader.gif'),
('C90e-320lS', 11, 'C90e-320lS_photo.jpg'),
('C90e-320lS', 21, 'C90e-320lS_C1nA210jS_download.jpg'),
('C90e-320lS', 21, 'C90e-320lS_C1nA210jS_download_(2).jpg'),
('C90e-320lS', 22, 'C90e-320lS_download_(2).jpg'),
('C90e-320lS', 22, 'C90e-320lS_headphones.png'),
('C90e-320lS', 23, 'C90e-320lS_forgot-password-alert.png'),
('C90e-320lS', 23, 'C90e-320lS_register_confirmation.png'),
('C90e-320lS', 24, 'C90e-320lS_forgot_pass.png'),
('C90e-320lS', 24, 'C90e-320lS_login.png'),
('C90e-320lS', 43, 'C90e-320lS_ideal_filter1.png'),
('C90e-320lS', 43, 'C90e-320lS_original_noise.png'),
('C90e-320lS', 44, 'C90e-320lS_gaussian_flter.png'),
('C90e-320lS', 44, 'C90e-320lS_gaussian_flter1.png'),
('C90e-320lS', 44, 'C90e-320lS_pic1.jpg'),
('C90e-320lS', 44, 'C90e-320lS_Screenshot_from_2015-04-21_10_32_537[1].png'),
('C90e-320lS', 45, 'C90e-320lS_Screenshot_from_2015-04-21_10_32_53[1].png'),
('C90e-320lS', 46, 'C90e-320lS_award_report_select.png'),
('C90e-320lS', 46, 'C90e-320lS_award_update_overview.png'),
('C90e-320lS', 46, 'C90e-320lS_relocation.jpg'),
('C90e-320lS', 86, '../../user_files/C90e-320lS/awards/1447229344.jpg'),
('C90e-320lS', 87, '../../user_files/C90e-320lS/awards/1447229400.jpeg'),
('C90e-320lS', 87, '../../user_files/C90e-320lS/awards/1447229400.jpg'),
('C90e-320lS', 88, '../../user_files/C90e-320lS/awards/1447229932C:wamp	mpphp66DB.tmp.jpg'),
('C90e-320lS', 88, '../../user_files/C90e-320lS/awards/1447229932C:wamp	mpphp66FB.tmp.jpg'),
('C90e-320lS', 88, '../../user_files/C90e-320lS/awards/1447229932C:wamp	mpphp670C.tmp.jpg'),
('C90e-320lS', 88, '../../user_files/C90e-320lS/awards/1447229932C:wamp	mpphp670D.tmp.jpg'),
('C90e-320lS', 88, '../../user_files/C90e-320lS/awards/1447229933C:wamp	mpphp674C.tmp.jpg'),
('C90e-320lS', 88, '../../user_files/C90e-320lS/awards/1447229933C:wamp	mpphp675D.tmp.jpg'),
('C90e-320lS', 88, '../../user_files/C90e-320lS/awards/1447229933C:wamp	mpphp677D.tmp.jpg'),
('C90e-320lS', 88, '../../user_files/C90e-320lS/awards/1447229933C:wamp	mpphp677E.tmp.jpeg'),
('C90e-320lS', 89, '../../user_files/C90e-320lS/awards/1447230039C:wamp	mpphp9D5.tmp.jpg'),
('C90e-320lS', 89, '../../user_files/C90e-320lS/awards/1447230040C:wamp	mpphp9F5.tmp.jpg'),
('C90e-320lS', 89, '../../user_files/C90e-320lS/awards/1447230040C:wamp	mpphpA06.tmp.jpg'),
('C90e-320lS', 89, '../../user_files/C90e-320lS/awards/1447230040C:wamp	mpphpA16.tmp.jpg'),
('C90e-320lS', 89, '../../user_files/C90e-320lS/awards/1447230040C:wamp	mpphpA27.tmp.jpg'),
('C90e-320lS', 89, '../../user_files/C90e-320lS/awards/1447230040C:wamp	mpphpA38.tmp.jpg'),
('C90e-320lS', 89, '../../user_files/C90e-320lS/awards/1447230040C:wamp	mpphpA48.tmp.jpg'),
('C90e-320lS', 89, '../../user_files/C90e-320lS/awards/1447230040C:wamp	mpphpA59.tmp.jpeg'),
('C90e-320lS', 90, '../../user_files/C90e-320lS/awards/1447230235.jpeg'),
('C90e-320lS', 90, '../../user_files/C90e-320lS/awards/1447230235.jpg'),
('C90e-320lS', 91, '../../user_files/C90e-320lS/awards/1447230302.jpeg'),
('C90e-320lS', 91, '../../user_files/C90e-320lS/awards/1447230302.jpg'),
('C90e-320lS', 92, '../../user_files/C90e-320lS/awards/1447230352C:wamp	mpphpCE24.jpg'),
('C90e-320lS', 92, '../../user_files/C90e-320lS/awards/1447230352C:wamp	mpphpCE44.jpg'),
('C90e-320lS', 92, '../../user_files/C90e-320lS/awards/1447230352C:wamp	mpphpCE45.jpg'),
('C90e-320lS', 92, '../../user_files/C90e-320lS/awards/1447230352C:wamp	mpphpCE56.jpg'),
('C90e-320lS', 92, '../../user_files/C90e-320lS/awards/1447230352C:wamp	mpphpCE66.jpg'),
('C90e-320lS', 92, '../../user_files/C90e-320lS/awards/1447230352C:wamp	mpphpCE67.jpg'),
('C90e-320lS', 92, '../../user_files/C90e-320lS/awards/1447230352C:wamp	mpphpCE78.jpg'),
('C90e-320lS', 92, '../../user_files/C90e-320lS/awards/1447230352C:wamp	mpphpCE79.jpeg'),
('C90e-320lS', 93, '../../user_files/C90e-320lS/awards/1447230437C:wamp	mpphp1D51.jpg'),
('C90e-320lS', 93, '../../user_files/C90e-320lS/awards/1447230438C:wamp	mpphp1D71.jpg'),
('C90e-320lS', 93, '../../user_files/C90e-320lS/awards/1447230438C:wamp	mpphp1D82.jpg'),
('C90e-320lS', 93, '../../user_files/C90e-320lS/awards/1447230438C:wamp	mpphp1D83.jpg'),
('C90e-320lS', 93, '../../user_files/C90e-320lS/awards/1447230438C:wamp	mpphp1D93.jpg'),
('C90e-320lS', 93, '../../user_files/C90e-320lS/awards/1447230438C:wamp	mpphp1D94.jpg'),
('C90e-320lS', 93, '../../user_files/C90e-320lS/awards/1447230438C:wamp	mpphp1D95.jpg'),
('C90e-320lS', 93, '../../user_files/C90e-320lS/awards/1447230438C:wamp	mpphp1DA6.jpeg'),
('C90e-320lS', 94, '../../user_files/C90e-320lS/awards/1447230479C:wamp	mpphpC04F.jpg'),
('C90e-320lS', 94, '../../user_files/C90e-320lS/awards/1447230479C:wamp	mpphpC070.jpg'),
('C90e-320lS', 94, '../../user_files/C90e-320lS/awards/1447230479C:wamp	mpphpC080.jpg'),
('C90e-320lS', 94, '../../user_files/C90e-320lS/awards/1447230479C:wamp	mpphpC091.jpg'),
('C90e-320lS', 94, '../../user_files/C90e-320lS/awards/1447230480C:wamp	mpphpC092.jpg'),
('C90e-320lS', 94, '../../user_files/C90e-320lS/awards/1447230480C:wamp	mpphpC093.jpg'),
('C90e-320lS', 94, '../../user_files/C90e-320lS/awards/1447230480C:wamp	mpphpC0A4.jpg'),
('C90e-320lS', 94, '../../user_files/C90e-320lS/awards/1447230480C:wamp	mpphpC0A5.jpeg'),
('C90e-320lS', 95, '../../user_files/C90e-320lS/awards/1447230519C:wamp	mpphp5BEC.jpg'),
('C90e-320lS', 95, '../../user_files/C90e-320lS/awards/1447230519C:wamp	mpphp5C0C.jpg'),
('C90e-320lS', 95, '../../user_files/C90e-320lS/awards/1447230519C:wamp	mpphp5C2C.jpg'),
('C90e-320lS', 95, '../../user_files/C90e-320lS/awards/1447230519C:wamp	mpphp5C2D.jpg'),
('C90e-320lS', 95, '../../user_files/C90e-320lS/awards/1447230519C:wamp	mpphp5C2E.jpg'),
('C90e-320lS', 95, '../../user_files/C90e-320lS/awards/1447230519C:wamp	mpphp5C2F.jpg'),
('C90e-320lS', 95, '../../user_files/C90e-320lS/awards/1447230519C:wamp	mpphp5C40.jpg'),
('C90e-320lS', 95, '../../user_files/C90e-320lS/awards/1447230519C:wamp	mpphp5C41.jpeg'),
('C90e-320lS', 96, '../../user_files/C90e-320lS/awards/144723074111155.jpg'),
('C90e-320lS', 96, '../../user_files/C90e-320lS/awards/144723074118562.jpg'),
('C90e-320lS', 96, '../../user_files/C90e-320lS/awards/14472307412000.jpg'),
('C90e-320lS', 96, '../../user_files/C90e-320lS/awards/144723074120732.jpeg'),
('C90e-320lS', 96, '../../user_files/C90e-320lS/awards/144723074125545.jpg'),
('C90e-320lS', 96, '../../user_files/C90e-320lS/awards/144723074127342.jpg'),
('C90e-320lS', 96, '../../user_files/C90e-320lS/awards/144723074128143.jpg'),
('C90e-320lS', 96, '../../user_files/C90e-320lS/awards/14472307416093.jpg'),
('C90e-320lS', 97, '../../user_files/C90e-320lS/awards/144723076011239.jpg'),
('C90e-320lS', 97, '../../user_files/C90e-320lS/awards/14472307601446.jpg'),
('C90e-320lS', 97, '../../user_files/C90e-320lS/awards/144723076017153.jpg'),
('C90e-320lS', 97, '../../user_files/C90e-320lS/awards/144723076017300.jpeg'),
('C90e-320lS', 97, '../../user_files/C90e-320lS/awards/1447230760232.jpg'),
('C90e-320lS', 97, '../../user_files/C90e-320lS/awards/144723076026074.jpg'),
('C90e-320lS', 97, '../../user_files/C90e-320lS/awards/144723076029573.jpg'),
('C90e-320lS', 97, '../../user_files/C90e-320lS/awards/144723076031243.jpg'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/14472307821190.jpg'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/144723078216103.jpg'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/144723078217714.jpg'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/144723078219513.jpeg'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/144723078222845.jpg'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/144723078223188.jpg'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/144723078225219.jpg'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/144723078226668.png'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/144723078229429.png'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/14472307823072.jpg'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/1447230782638.jpg'),
('C90e-320lS', 98, '../../user_files/C90e-320lS/awards/14472307829183.png'),
('C90e-320lS', 99, '../../user_files/C90e-320lS/awards/144723092018570.jpg'),
('C90e-320lS', 99, '../../user_files/C90e-320lS/awards/144723092018801.jpg'),
('C90e-320lS', 99, '../../user_files/C90e-320lS/awards/144723092023320.jpg'),
('C90e-320lS', 99, '../../user_files/C90e-320lS/awards/14472309207931.jpg'),
('C90e-320lS', 99, '../../user_files/C90e-320lS/awards/144723092112247.jpg'),
('C90e-320lS', 99, '../../user_files/C90e-320lS/awards/144723092125430.jpg'),
('C90e-320lS', 99, '../../user_files/C90e-320lS/awards/14472309212989.jpeg'),
('C90e-320lS', 99, '../../user_files/C90e-320lS/awards/14472309214292.jpg'),
('C90e-320lS', 100, '../../../user_files/C90e-320lS/awards/144723121716859.jpg'),
('C90e-320lS', 100, '../../../user_files/C90e-320lS/awards/144723121722353.jpg'),
('C90e-320lS', 100, '../../../user_files/C90e-320lS/awards/144723121729816.jpg'),
('C90e-320lS', 100, '../../../user_files/C90e-320lS/awards/14472312172998.jpg'),
('C90e-320lS', 100, '../../../user_files/C90e-320lS/awards/14472312178375.jpg'),
('C90e-320lS', 100, '../../../user_files/C90e-320lS/awards/144723121811586.jpeg'),
('C90e-320lS', 100, '../../../user_files/C90e-320lS/awards/144723121824612.jpg'),
('C90e-320lS', 100, '../../../user_files/C90e-320lS/awards/14472312186029.jpg'),
('C90e-320lS', 101, '../user_files/C90e-320lS/awards/144723207021919.jpg'),
('C90e-320lS', 101, '../user_files/C90e-320lS/awards/14472320705868.jpg'),
('C90e-320lS', 101, '../user_files/C90e-320lS/awards/144723207111451.jpg'),
('C90e-320lS', 101, '../user_files/C90e-320lS/awards/144723207113784.jpg'),
('C90e-320lS', 101, '../user_files/C90e-320lS/awards/144723207123221.jpg'),
('C90e-320lS', 101, '../user_files/C90e-320lS/awards/144723207127953.jpg'),
('C90e-320lS', 101, '../user_files/C90e-320lS/awards/144723207130026.jpg'),
('C90e-320lS', 101, '../user_files/C90e-320lS/awards/14472320717190.jpeg'),
('C90e-320lS', 102, '../../user_files/C90e-320lS/awards/144723213911117.jpg'),
('C90e-320lS', 102, '../../user_files/C90e-320lS/awards/144723213922404.jpg'),
('C90e-320lS', 102, '../../user_files/C90e-320lS/awards/144723213922935.jpg'),
('C90e-320lS', 102, '../../user_files/C90e-320lS/awards/144723213925506.jpg'),
('C90e-320lS', 102, '../../user_files/C90e-320lS/awards/144723213926608.jpg'),
('C90e-320lS', 102, '../../user_files/C90e-320lS/awards/144723213930771.jpg'),
('C90e-320lS', 102, '../../user_files/C90e-320lS/awards/14472321404457.jpg'),
('C90e-320lS', 102, '../../user_files/C90e-320lS/awards/14472321406126.jpeg');

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
(1, 'Editor', 'Chapter', 'TOC', '1', 'vdbsk', 'jvbk', 'C90e-320lS', '2015-05-02'),
(2, 'Editor', 'Chapter', 'nasl', '4', 'kvdn', 'ksd', 'C90e-320lS', '2015-05-02'),
(3, 'Editor', 'Book', 'Treson', '1', 'bajbw', 'nvs,', 'C90e-320lS', '2015-05-02'),
(4, 'Editor', 'Book', 'Treson', '1', 'bajbw', 'nvs', 'C90e-320lS', '2015-05-02');

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
('C90e-320lS', 1, 1, 'sbjws'),
('C90e-320lS', 1, 2, 'mdsv'),
('C90e-320lS', 2, 1, 'dsv'),
('C90e-320lS', 2, 2, 'vsd'),
('C90e-320lS', 3, 1, 'me'),
('C90e-320lS', 3, 2, 'my name'),
('C90e-320lS', 4, 1, 'me'),
('C90e-320lS', 4, 2, 'my name');

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

--
-- Dumping data for table `book_chapters`
--

INSERT INTO `book_chapters` (`id`, `book_id`, `chapter_name`) VALUES
('C90e-320lS', 1, 'a'),
('C90e-320lS', 1, 'b'),
('C90e-320lS', 2, 'a'),
('C90e-320lS', 2, 'b'),
('C90e-320lS', 2, 'c'),
('C90e-320lS', 3, 'bsnja'),
('C90e-320lS', 3, 'jadvhj'),
('C90e-320lS', 4, 'bsnja'),
('C90e-320lS', 4, 'jadvhj');

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
(1, 'a', 's', 's', '2015-04-06', '', '', 'C90e-320lS'),
(2, 'a', 's', 's', '2015-04-06', 'www.xvv.com', '', 'C90e-320lS'),
(3, 'd', 's', 'fq', '0000-00-00', 'https://www.google.com', '', 'C90e-320lS'),
(4, 'TedX', 'Organizer', 'RVCE, Bangalore', '2015-05-02', '', 'It WAS A FUN EVENT', 'C90e-320lS');

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
('C90e-320lS', 1, 'International', 'Molecular biology', 'Yes', 'molecules project', 'abcd ', 'mooo', '2015-05-27', '2015-05-18', 'Bangalore', 'jsbakbkbsdkvbdgsvksdbk bsckv skckhvkjasvksakdvksdvk', 'kavgbakbbk', '', '', 5, 12, 'title of paper'),
('C90e-320lS', 2, 'National', 'Molecular biology', 'No', 'molecules project', 'abcd ', 'mooo', '2015-05-27', '2015-05-18', 'Bangalore', 'jsbakbkbsdkvbdgsvksdbk bsckv skckhvkjasvksakdvksdvk', 'kavgbakbbk', '', '', 5, 12, 'title of paper'),
('C90e-320lS', 3, 'National', 'ajcbkjabkcb', 'No', '', ',ajbvk', 'jhasvhk', '2015-05-02', '2015-05-02', 'jgasckgk', 'kjjbscKB', 'HKJHASK', '', '', 4, 7, 'jkvjgbak'),
('C90e-320lS', 4, 'International', 'bzxvkb', 'No', '', 'mbvkjdbk', 'kjvsahk', '2015-05-02', '2015-05-02', 'khavgkhg', 'nnbsahcv', 'kasv', '', '', 4, 6, 'bdvjb'),
('C90e-320lS', 5, 'National', 'vivek', 'Yes', '', 'vivek', '', '2015-11-12', '2015-11-12', 'vivek', 'vivek', 'vivek', '', '', 0, 0, ''),
('C90e-320lS', 6, 'National', 'vivek', 'Yes', '', 'vivek', 'vivkek', '2015-11-12', '2015-11-12', 'vivek', 'vivek', 'vivek', '', '', 1, 2, ''),
('C90e-320lS', 7, 'National', 'vivek', 'Yes', '', 'vivek', '', '2015-11-12', '2015-11-12', 'vivek', 'vivek', 'vivek', '', '', 1, 2, ''),
('C90e-320lS', 8, 'National', 'vivek', 'Yes', '', 'vivke', '', '2015-11-12', '2015-11-12', 'vivek', 'vivek', 'vivek', '', '', 1, 2, ''),
('C90e-320lS', 9, 'National', 'vpk', 'Yes', '', 'pk', '', '2015-11-12', '2015-11-12', 'pl', 'pk', 'pk', '', '', 1, 2, ''),
('C90e-320lS', 10, 'National', 'vpk', 'Yes', '', 'pk', '', '2015-11-12', '2015-11-12', 'pl', 'pk', 'pk', '', '', 1, 2, ''),
('C90e-320lS', 11, 'National', 'p', 'Yes', '', 'p', '', '2015-11-12', '2015-11-12', 'p', 'p', 'p', '', '', 1, 2, ''),
('C90e-320lS', 12, 'National', 'p', 'Yes', '', 'p', '', '2015-11-12', '2015-11-12', 'p', 'p', 'p', '', '', 1, 2, ''),
('C90e-320lS', 13, 'National', 'k', 'Yes', '', 'k', '', '2015-11-12', '2015-11-12', 'k', 'k', 'k', '', '', 1, 2, ''),
('C90e-320lS', 14, 'National', 'm', 'Yes', '', 'm', '', '2015-11-12', '2015-11-12', 'm', 'm', 'm', '', '', 1, 2, ''),
('C90e-320lS', 15, 'National', 'l', 'Yes', 'l', 'l', 'l', '2015-11-12', '2015-11-12', 'l', 'l', 'l', '', '', 1, 2, 'l');

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
('C90e-320lS', 1, 'me'),
('C90e-320lS', 1, 'sis'),
('C90e-320lS', 2, 'me'),
('C90e-320lS', 2, 'sis'),
('C90e-320lS', 3, 'davbk'),
('C90e-320lS', 3, 'dbab'),
('C90e-320lS', 3, 'kjgakg'),
('C90e-320lS', 4, 'jkbbaskjv'),
('C90e-320lS', 5, 'vivek'),
('C90e-320lS', 6, 'vivek'),
('C90e-320lS', 7, 'vivek'),
('C90e-320lS', 8, 'vivej'),
('C90e-320lS', 9, 'pk'),
('C90e-320lS', 10, 'pk'),
('C90e-320lS', 11, 'p'),
('C90e-320lS', 12, 'p'),
('C90e-320lS', 13, 'k'),
('C90e-320lS', 14, 'm'),
('C90e-320lS', 15, 'l');

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
(1, 'abv', 'nsam', '2015-04-27', '2015-04-27', '7824', ',bas,fb', 'kjbaskjb', 'kjbsdkvjb', 'C90e-320lS'),
(2, 'abv', 'nsam', '2015-04-27', '2015-04-27', '7824', ',bas,fb', 'kjbaskjb', 'kjbsdkvjb', 'C90e-320lS'),
(3, 'abv', 'nsam', '2015-04-27', '2015-04-27', '7824', ',bas,fb', 'kjbaskjb', 'kjbsdkvjb', 'C90e-320lS'),
(4, 'TCS', 'software trainer', '2015-05-03', '2015-05-20', '20000', '', '', '', 'C90e-320lS'),
(5, 'Infosys', 'software trainer', '2015-05-03', '2015-05-20', '200000', '', '', '', 'C90e-320lS');

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

--
-- Dumping data for table `consultancy_collaboration`
--

INSERT INTO `consultancy_collaboration` (`id`, `consultancy_id`, `collaborator_name`) VALUES
('C90e-320lS', 3, ',jbca,'),
('C90e-320lS', 5, 'TCS');

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
('C90e-320lS', 3, 'lanvl'),
('C90e-320lS', 5, 'Pooja V'),
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

--
-- Dumping data for table `consultancy_student_involved`
--

INSERT INTO `consultancy_student_involved` (`id`, `consultancy_id`, `student_usn`) VALUES
('C90e-320lS', 3, 'kjbsca'),
('C90e-320lS', 5, '1rv12is006');

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
('1', 'ifug', 'ggdss', 3, 'UG', 2004, 'Computer Science and Engineering'),
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

--
-- Dumping data for table `courses_taught`
--

INSERT INTO `courses_taught` (`id`, `course_id`, `academic_year`, `number_of_students`, `pass_percent`) VALUES
('C90e-320lS', '1', 2002, 18, '11.00'),
('C90e-320lS', '1', 2014, 355, '70.00'),
('C90e-320lS', '1', 2015, 36, '70.00'),
('C90e-320lS', '3', 1972, 23, '45.00');

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
('C90e-320lS', 1, 'BMS', 'DBMS', '2015-01-13', '2015-05-13', 'UG', 'College', '', 'bgkvdgkvds'),
('C90e-320lS', 2, 'BMS', 'DBMS', '2015-01-13', '2015-05-13', 'UG', 'College', '', 'bgkvdgkvds');

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
(1, 'CSI', 'existing', '2015-04-27', '2015-05-29', 'Student member', 'events', 'C90e-320lS'),
(2, 'CSI', 'existing', '2015-04-27', '2015-05-29', 'faculty member', '', 'C90e-320lS'),
(3, 'javdjgv', 'hvsahv', '2015-05-21', '2015-05-21', 'mbcmas', '', 'C90e-320lS');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE IF NOT EXISTS `journal` (
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
  `url` varchar(100) DEFAULT NULL,
  `from_page` int(11) DEFAULT NULL,
  `to_page` int(11) DEFAULT NULL,
  `journal_month` varchar(10) DEFAULT NULL,
  `journal_year` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`,`journal_id`),
  KEY `jid` (`journal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `journal_id`, `journal_type`, `research_area`, `paper_associated_project`, `project_name`, `paper_title`, `abstract`, `keywords`, `journal_name`, `volume`, `issue`, `impact_factor`, `citation index`, `url`, `from_page`, `to_page`, `journal_month`, `journal_year`) VALUES
('', 1, 'v', 'v', 'Yes', '', 'v', 'vv', 'v', 'v', 0, 0, 'v', 'v', '', 0, 0, 'January', 1960),
('C90e-320lS', 2, 'v', 'v', 'Yes', '', 'v', 'vv', 'v', 'v', 0, 0, 'v', 'v', '', 0, 0, 'January', 1960);

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
('C90e-320lS', 2, 'vv');

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

--
-- Dumping data for table `journal_file`
--

INSERT INTO `journal_file` (`id`, `journal_id`, `file_path`) VALUES
('C90e-320lS', 2, '../../user_files/C90e-320lS/journal/144734924315662.docx'),
('C90e-320lS', 2, '../../user_files/C90e-320lS/journal/1447349243937.pdf');

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

--
-- Dumping data for table `professional_membership`
--

INSERT INTO `professional_membership` (`id`, `membership_number`, `name`, `membership_type`, `from_date`, `to_date`) VALUES
('C90e-320lS', '1', 'CSI', 'Student', '2015-05-20', '2015-05-29'),
('C90e-320lS', '2', 'CSI', 'Student', '2015-05-20', '2015-05-29'),
('C90e-320lS', '3', 'CSI', 'Teacher', '2015-05-20', '2015-05-29');

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

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `qualification`, `institution`, `location`, `university`, `join_month`, `pass_month`, `join_year`, `pass_year`, `percentage`, `class1`, `qualification_file`) VALUES
('C90e-320lS', 'feg', 'ds', 'vd', 'vd', 5, 6, 2015, 2015, '23.00', '2', NULL),
('C90e-320lS', 'vdsv', 'ds', 'fees', 'f', 0, 0, 2002, 2002, '23.00', '2', NULL);

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
('C90e-320lS', 1, 'Big Data and Analytics', 'TCS', '2015-04-28', '2015-05-21', 'Attendee', 'Bangalore', 'International', 'Big Data and analytics', '', ''),
('C90e-320lS', 2, 'bszck', 'kjsdbvk', '2015-05-13', '2015-05-21', 'kjbavkb', 'jbkkvdb', 'National', 'lbsdkvb', '', ''),
('C90e-320lS', 3, 'sfdslfskl', 'dfgmmldfgkdl', '2015-11-04', '2015-11-25', 'sfdlskdfl', 'dfslkfsdlk', 'dfklsdfkdslk', 'lsdflfskladfs', '', '');

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
('C90e-320lS', 1, 'Swirl Around', 'Big Data', 'CDAC', '2015-04-28', '2015-05-21', 'Attendee', 'Bangalore', 'National', '', 'students');

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
  ADD CONSTRAINT `conference_files_ibfk_2` FOREIGN KEY (`conference_id`) REFERENCES `conference` (`conference_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conference_files_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `courses_taught_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_taught_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses_list` (`course_id`);

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
-- Constraints for table `journal_authors`
--
ALTER TABLE `journal_authors`
  ADD CONSTRAINT `journal_authors_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty_member` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_authors_ibfk_2` FOREIGN KEY (`journal_id`) REFERENCES `journal` (`journal_id`);

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
