-- phpMyAdmin SQL Dump
-- version 3.4.10.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2013 at 12:03 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xianq`
--

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Author`
--

CREATE TABLE IF NOT EXISTS `KXT209_Author` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(255) NOT NULL,
  `MName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Affiliation` text NOT NULL,
  `Updated_date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `KXT209_Author`
--

INSERT INTO `KXT209_Author` (`ID`, `FName`, `MName`, `LName`, `Affiliation`, `Updated_date`) VALUES
(1, 'Paul', '', 'Compton', 'University of New South Wales', '2013-01-23 16:45:48'),
(2, 'Byeong', '', 'Kang', 'University of New South Wales', '2013-01-23 16:45:48'),
(3, 'Phillip', '', 'Preston', 'University of New South Wales', '2013-01-23 16:45:48'),
(4, 'Mary', '', 'Mulholland', 'University of New South Wales', '2013-01-23 16:45:48'),
(5, 'Ivan', '', 'Bindoff', 'University of Tasmania, School of Computing', '2013-01-23 17:40:40'),
(6, 'Byeong', 'Ho', 'Kang', 'University of Tasmania, School of Computing', '2013-01-23 17:40:40'),
(7, 'Tristan', '', 'Ling', 'University of Tasmania, School of Computing', '2013-01-23 17:40:40'),
(8, 'Peter', '', 'Tenni', 'University of Tasmania, Unit for Medical Outcomes and Research Evaluations', '2013-01-23 17:40:40'),
(9, 'Gregory', '', 'Peterson', 'University of Tasmania, Unit for Medical Outcomes and Research Evaluations', '2013-01-23 17:40:40'),
(10, 'Anura', '', 'Guruge', 'Independent technical analyst and consultant', '2013-02-11 20:30:15'),
(11, 'Kris', '', 'Jamsa', '', '2013-02-11 20:32:24'),
(12, 'Amanda', '', 'Spink', 'Loughborough University', '2013-02-11 20:36:16'),
(13, 'Bernard', 'James', 'Jansen', 'Loughborough University', '2013-02-11 20:36:16'),
(14, 'fn', 'mn', 'ln', 'afli', '2013-05-19 10:55:29'),
(15, 'fn1', 'fn2', 'fn3', 'afli2', '2013-05-19 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Books`
--

CREATE TABLE IF NOT EXISTS `KXT209_Books` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text NOT NULL,
  `Pub_id` int(11) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `Published_date` date NOT NULL,
  `Updated_date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `KXT209_Books`
--

INSERT INTO `KXT209_Books` (`ID`, `Title`, `Pub_id`, `URL`, `Published_date`, `Updated_date`) VALUES
(1, 'Knowledge Acquisition without Analysis', 1, 'http://citeseerx.ist.psu.edu/viewdoc/download?doi=10.1.1.31.7951&rep=rep1&type=pdf', '1993-01-01', '2013-01-23 16:45:48'),
(2, 'Applying MCRDR to a Multidisciplinary Domain', 2, 'http://eprints.utas.edu.au/4801/1/4801.pdf', '2007-01-01', '2013-01-23 17:40:40'),
(3, 'Web Services: Theory and Practice', 3, 'http://books.google.com.au/books?id=NzC06L8UWfsC&printsec=frontcover', '2004-01-01', '2013-02-11 20:30:15'),
(4, '.NET Web Services Solutions', 4, 'http://books.google.com.au/books?id=bop3qVqOLzwC&printsec=frontcover', '2006-01-01', '2013-02-11 20:32:24'),
(5, 'Web Search: Public Searching on the Web', 5, 'http://books.google.com.au/books?id=frL0EpijeEMC&printsec=frontcover', '2004-01-01', '2013-02-11 20:36:16'),
(6, 'testbook1', 6, 'www.google.com', '2013-05-16', '2013-05-19 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Books_author`
--

CREATE TABLE IF NOT EXISTS `KXT209_Books_author` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Book_id` int(11) NOT NULL,
  `Author_id` int(11) NOT NULL,
  `Updated_date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `KXT209_Books_author`
--

INSERT INTO `KXT209_Books_author` (`ID`, `Book_id`, `Author_id`, `Updated_date`) VALUES
(1, 1, 1, '2013-01-23 16:45:48'),
(2, 1, 2, '2013-01-23 16:45:48'),
(3, 1, 3, '2013-01-23 16:45:48'),
(4, 1, 4, '2013-01-23 16:45:48'),
(5, 2, 5, '2013-01-23 17:40:40'),
(6, 2, 6, '2013-01-23 17:40:40'),
(7, 2, 7, '2013-01-23 17:40:40'),
(8, 2, 8, '2013-01-23 17:40:40'),
(9, 2, 9, '2013-01-23 17:40:40'),
(10, 3, 10, '2013-02-11 20:30:15'),
(11, 4, 11, '2013-02-11 20:32:24'),
(12, 5, 12, '2013-02-11 20:36:16'),
(13, 5, 13, '2013-02-11 20:36:16'),
(14, 6, 14, '2013-05-19 10:55:29'),
(15, 6, 15, '2013-05-19 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Books_keyword`
--

CREATE TABLE IF NOT EXISTS `KXT209_Books_keyword` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Book_id` int(11) NOT NULL,
  `Keyword_id` int(11) NOT NULL,
  `Updated_Time` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `KXT209_Books_keyword`
--

INSERT INTO `KXT209_Books_keyword` (`ID`, `Book_id`, `Keyword_id`, `Updated_Time`) VALUES
(1, 1, 1, '2013-01-23 16:45:48'),
(2, 2, 2, '2013-01-23 17:40:40'),
(3, 3, 3, '2013-02-11 20:30:15'),
(4, 3, 4, '2013-02-11 20:30:15'),
(5, 3, 5, '2013-02-11 20:30:15'),
(6, 4, 6, '2013-02-11 20:32:24'),
(7, 5, 7, '2013-02-11 20:36:16'),
(8, 5, 8, '2013-02-11 20:36:16'),
(9, 5, 9, '2013-02-11 20:36:16'),
(10, 6, 10, '2013-05-19 10:55:29'),
(11, 6, 11, '2013-05-19 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Books_subject`
--

CREATE TABLE IF NOT EXISTS `KXT209_Books_subject` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Book_id` int(11) NOT NULL,
  `Subject_id` int(11) NOT NULL,
  `Updated_date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `KXT209_Books_subject`
--

INSERT INTO `KXT209_Books_subject` (`ID`, `Book_id`, `Subject_id`, `Updated_date`) VALUES
(1, 1, 1, '2013-01-23 16:45:48'),
(2, 2, 2, '2013-01-23 17:40:40'),
(3, 2, 3, '2013-01-23 17:40:40'),
(4, 2, 4, '2013-01-23 17:40:40'),
(5, 2, 5, '2013-01-23 17:40:40'),
(6, 2, 6, '2013-01-23 17:40:40'),
(7, 2, 7, '2013-01-23 17:40:40'),
(8, 3, 8, '2013-02-11 20:30:15'),
(9, 3, 9, '2013-02-11 20:30:15'),
(10, 3, 10, '2013-02-11 20:30:15'),
(11, 3, 11, '2013-02-11 20:30:15'),
(12, 4, 12, '2013-02-11 20:32:24'),
(13, 5, 13, '2013-02-11 20:36:16'),
(14, 5, 14, '2013-02-11 20:36:16'),
(15, 5, 14, '2013-02-11 20:36:16'),
(16, 6, 5, '2013-05-16 00:00:00'),
(17, 6, 36, '2013-05-19 10:55:29'),
(18, 6, 37, '2013-05-19 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Keyword`
--

CREATE TABLE IF NOT EXISTS `KXT209_Keyword` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Keyword` varchar(255) NOT NULL,
  `Updated_Time` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `KXT209_Keyword`
--

INSERT INTO `KXT209_Keyword` (`ID`, `Keyword`, `Updated_Time`) VALUES
(1, 'Artificial Intelligence', '2013-01-23 16:45:48'),
(2, 'Artificial Intelligence (incl. Robotics)', '2013-01-23 17:40:40'),
(3, 'Resource Directories', '2013-02-11 20:30:15'),
(4, 'Internet', '2013-02-11 20:30:15'),
(5, 'Web', '2013-02-11 20:30:15'),
(6, 'Windows Server & NT', '2013-02-11 20:32:24'),
(7, 'Storage & Retrieval', '2013-02-11 20:36:16'),
(8, 'Computer Science', '2013-02-11 20:36:16'),
(9, 'Intelligence (AI) & Semantics', '2013-02-11 20:36:16'),
(10, 'kw', '2013-05-19 10:55:29'),
(11, 'kw2', '2013-05-19 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Popularity`
--

CREATE TABLE IF NOT EXISTS `KXT209_Popularity` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) NOT NULL,
  `Element_id` int(11) NOT NULL,
  `Count` int(11) NOT NULL,
  `Created_time` datetime NOT NULL,
  `LUpdated_time` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `KXT209_Popularity`
--

INSERT INTO `KXT209_Popularity` (`ID`, `Type`, `Element_id`, `Count`, `Created_time`, `LUpdated_time`) VALUES
(1, 'Author', 10, 1, '2013-05-19 10:53:04', '2013-05-19 10:53:04'),
(2, 'Keyword', 3, 1, '2013-05-19 10:53:04', '0000-00-00 00:00:00'),
(3, 'Keyword', 4, 1, '2013-05-19 10:53:04', '0000-00-00 00:00:00'),
(4, 'Keyword', 5, 1, '2013-05-19 10:53:04', '0000-00-00 00:00:00'),
(5, 'Subject', 8, 1, '2013-05-19 10:53:04', '2013-05-19 10:53:04'),
(6, 'Subject', 9, 1, '2013-05-19 10:53:04', '2013-05-19 10:53:04'),
(7, 'Subject', 10, 1, '2013-05-19 10:53:04', '2013-05-19 10:53:04'),
(8, 'Subject', 11, 1, '2013-05-19 10:53:04', '2013-05-19 10:53:04'),
(9, 'Author', 5, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(10, 'Author', 6, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(11, 'Author', 7, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(12, 'Author', 8, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(13, 'Author', 9, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(14, 'Keyword', 2, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(15, 'Subject', 2, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(16, 'Subject', 3, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(17, 'Subject', 4, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(18, 'Subject', 5, 3, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(19, 'Subject', 6, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(20, 'Subject', 7, 2, '2013-05-19 10:53:24', '2013-05-19 11:26:54'),
(21, 'Author', 11, 1, '2013-05-19 10:53:34', '2013-05-19 10:53:34'),
(22, 'Keyword', 6, 1, '2013-05-19 10:53:34', '0000-00-00 00:00:00'),
(23, 'Subject', 12, 1, '2013-05-19 10:53:34', '2013-05-19 10:53:34'),
(24, 'Author', 1, 3, '2013-05-19 10:53:54', '2013-05-19 11:26:25'),
(25, 'Author', 2, 2, '2013-05-19 10:53:54', '2013-05-19 11:26:25'),
(26, 'Author', 3, 2, '2013-05-19 10:53:54', '2013-05-19 11:26:25'),
(27, 'Author', 4, 2, '2013-05-19 10:53:54', '2013-05-19 11:26:25'),
(28, 'Keyword', 1, 2, '2013-05-19 10:53:54', '2013-05-19 11:26:25'),
(29, 'Subject', 1, 2, '2013-05-19 10:53:54', '2013-05-19 11:26:25'),
(30, 'Author', 14, 1, '2013-05-19 10:56:15', '2013-05-19 10:56:15'),
(31, 'Author', 15, 1, '2013-05-19 10:56:15', '2013-05-19 10:56:15'),
(32, 'Keyword', 10, 1, '2013-05-19 10:56:15', '0000-00-00 00:00:00'),
(33, 'Keyword', 11, 1, '2013-05-19 10:56:15', '0000-00-00 00:00:00'),
(34, 'Subject', 36, 1, '2013-05-19 10:56:15', '2013-05-19 10:56:15'),
(35, 'Subject', 37, 1, '2013-05-19 10:56:15', '2013-05-19 10:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Publisher`
--

CREATE TABLE IF NOT EXISTS `KXT209_Publisher` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Updated_date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `KXT209_Publisher`
--

INSERT INTO `KXT209_Publisher` (`ID`, `Name`, `City`, `Country`, `Updated_date`) VALUES
(1, 'European Knowledge Acquisition Workshop 1993', 'Toulouse and Caylus', 'France', '2013-01-23 16:45:48'),
(2, '20th Australian Joint Conference on Artificial Intelligence', 'Gold Coast', 'Australia', '2013-01-23 17:40:40'),
(3, 'Digital Press, 2004', '', '', '2013-02-11 20:30:15'),
(4, 'John Wiley & Sons, 2006', '', '', '2013-02-11 20:32:24'),
(5, 'Springer, 2004', '', '', '2013-02-11 20:36:16'),
(6, 'pn', 'city', 'country', '2013-05-19 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_SearchType`
--

CREATE TABLE IF NOT EXISTS `KXT209_SearchType` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `KXT209_SearchType`
--

INSERT INTO `KXT209_SearchType` (`ID`, `Type`) VALUES
(1, 'Title'),
(2, 'Keyword'),
(3, 'Author'),
(4, 'Subject');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_SS5_product`
--

CREATE TABLE IF NOT EXISTS `KXT209_SS5_product` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `ID_2` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `KXT209_SS5_product`
--

INSERT INTO `KXT209_SS5_product` (`ID`, `Name`, `Price`, `Description`) VALUES
(1, 'iMac', 1999, '17 inch Apple All-in-One'),
(2, 'Macbook Pro Retina', 2799, '15 inch Apple Laptop with Retina display'),
(3, 'Alienware M18x Gaming Laptop', 3299, '18 inch DELL Gaming Laptop'),
(4, 'XPS One 2710 (Touch)', 2499, '27 inch DELL ALL-in-One'),
(11, '23', 213, '421'),
(77, 'aa', 2, 'abddea');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Subject`
--

CREATE TABLE IF NOT EXISTS `KXT209_Subject` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(255) NOT NULL,
  `Updated_date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `KXT209_Subject`
--

INSERT INTO `KXT209_Subject` (`ID`, `Subject`, `Updated_date`) VALUES
(1, 'Artificial Intelligence', '2013-01-23 16:45:48'),
(2, 'Artificial Intelligence (incl. Robotics)', '2013-01-23 17:40:40'),
(3, 'Mathematical Logic and Formal Languages', '2013-01-23 17:40:40'),
(4, 'Data Mining and Knowledge Discovery', '2013-01-23 17:40:40'),
(5, 'Information Systems Applications (incl.Internet)', '2013-01-23 17:40:40'),
(6, 'Information Storage and Retrieval', '2013-01-23 17:40:40'),
(7, 'Computation by Abstract Devices', '2013-01-23 17:40:40'),
(8, 'Computers', '2013-02-11 20:30:15'),
(9, 'Web', '2013-02-11 20:30:15'),
(10, 'Online Services', '2013-02-11 20:30:15'),
(11, 'Internet', '2013-02-11 20:30:15'),
(12, 'Operating Systems', '2013-02-11 20:32:24'),
(13, 'System Administration', '2013-02-11 20:36:16'),
(14, 'Computer Science', '2013-02-11 20:36:16'),
(36, 'sbj', '2013-05-19 10:55:29'),
(37, 'sbj2', '2013-05-19 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Test`
--

CREATE TABLE IF NOT EXISTS `KXT209_Test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_Users`
--

CREATE TABLE IF NOT EXISTS `KXT209_Users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Ulevel` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `MName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Birthdate` date NOT NULL,
  `Email` text NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Website` text NOT NULL,
  `Affli` text NOT NULL,
  `Updated_date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `KXT209_Users`
--

INSERT INTO `KXT209_Users` (`ID`, `Ulevel`, `Username`, `Password`, `FName`, `MName`, `LName`, `Birthdate`, `Email`, `Phone`, `Website`, `Affli`, `Updated_date`) VALUES
(14, 1, 'xianq', 'e7ce93111e9d9a7d3ad08c91afeda220', 'qiu', '', 'xian', '2010-01-01', 'qiuxan@gmail.com', 'qiuxan@gmail.com', '', 'dsafdas', '0000-00-00 00:00:00'),
(15, 2, 'qiuxan', 'e7ce93111e9d9a7d3ad08c91afeda220', 'qiu', '', 'xian', '2010-01-01', 'qiuxan@gmail.com', 'qiuxan@gmail.com', '', 'dsafdas', '2013-05-19 11:50:46'),
(16, 2, 'qiuxan1', 'e7ce93111e9d9a7d3ad08c91afeda220', 'dsafds', 'FAW', 'rewf', '2010-01-01', 'qiuxan@gmail.com', 'qiuxan@gmail.com', '', 'fda', '0000-00-00 00:00:00'),
(17, 1, 'qiuxan2', 'e7ce93111e9d9a7d3ad08c91afeda220', 'qiu', '', 'x', '2010-02-01', 'qiuxan@gmail.com', 'qiuxan@gmail.com', '', 'dsafs', '0000-00-00 00:00:00'),
(18, 2, 'qiuxan8912', 'e7ce93111e9d9a7d3ad08c91afeda220', 'qiuxan', '', '2', '2009-01-01', 'qiuxan@126.com', 'qiuxan@126.com', '', 'ew', '0000-00-00 00:00:00'),
(19, 2, 'qiuxansafsadf', 'e7ce93111e9d9a7d3ad08c91afeda220', 'sda', '', '6416', '2010-01-01', 'qiuxan@126.com', 'qiuxan@126.com', '', 'dsads', '2013-04-23 09:59:59'),
(20, 2, 'qiuxan33333', 'e7ce93111e9d9a7d3ad08c91afeda220', 'fssf', 'af', 'sfa', '2010-01-01', 'qiuxan@126.com', 'qiuxan@126.com', '', 'faafs', '2013-04-25 06:29:56'),
(21, 2, 'qiuxan333333', '4297f44b13955235245b2497399d7a93', 'fdsa', 'fsaddw', 'awfds', '2010-01-01', 'qiuxan@126.com', 'qiuxan@126.com', '', 'fsfasf', '2013-04-25 06:32:34'),
(22, 2, 't1213121', 'e7ce93111e9d9a7d3ad08c91afeda220', 'qiux', 'asd', 'fwea', '2009-03-03', 'qiuxan@gmail.com', 'qiuxan@gmail.com', '', 'wa', '2013-04-25 07:31:14'),
(23, 2, 'nimabi', 'e7ce93111e9d9a7d3ad08c91afeda220', 'sad', 'saf', 'wdaw', '2010-01-01', 'qiuxan@gmail.com', '2302509', '', 'saf', '2013-04-25 07:43:10'),
(24, 2, 'qiuxan555asdf', 'e7ce93111e9d9a7d3ad08c91afeda220', '2saf', 'fdsa', 'dsa', '2010-01-01', 'qiuxan@gmail.com', '', '', 'sdffads', '2013-04-25 08:29:27'),
(25, 1, 'admin', '4297f44b13955235245b2497399d7a93', 'saf', 'dsfa', 'fsa', '2013-05-09', '123@', '', 'wbsite', 'sfda', '2013-05-18 02:36:16'),
(26, 1, 'xianq2', 'e7ce93111e9d9a7d3ad08c91afeda220', 'qiu', '', 'xian', '2010-01-01', 'qiuxan@126.com', '', '', 'sdaf', '2013-05-14 01:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `KXT209_User_Library`
--

CREATE TABLE IF NOT EXISTS `KXT209_User_Library` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `Updated_Time` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `KXT209_User_Library`
--

INSERT INTO `KXT209_User_Library` (`ID`, `UserID`, `BookID`, `Updated_Time`) VALUES
(67, 25, 5, '2013-05-13 00:00:00'),
(68, 25, 3, '2013-05-13 09:29:03'),
(70, 25, 1, '2013-05-14 06:50:50'),
(71, 25, 2, '2013-05-14 00:00:00'),
(72, 25, 4, '2013-05-15 07:36:21'),
(76, 15, 1, '2013-05-18 05:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_access`
--

CREATE TABLE IF NOT EXISTS `tb_access` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `access_type` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_access`
--

INSERT INTO `tb_access` (`ID`, `access_type`) VALUES
(1, 'Full_Access'),
(2, 'Insert_Access'),
(3, 'Delete_Access'),
(4, 'Update_Access'),
(5, 'Search_Access');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `access_id` int(11) NOT NULL,
  `fullname` varchar(11) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`ID`, `username`, `password`, `access_id`, `fullname`) VALUES
(1, 'Full_User', 'ed2b1f468c5f915f3f1cf75d7068baae', 1, 'Full Staff'),
(2, 'Insert_User', 'ed2b1f468c5f915f3f1cf75d7068baae', 2, 'Insert Staf'),
(3, 'Delete_User', 'ed2b1f468c5f915f3f1cf75d7068baae', 3, 'Delete Staf'),
(4, 'Update_User', 'ed2b1f468c5f915f3f1cf75d7068baae', 4, 'Update Staf'),
(5, 'Search_User', 'ed2b1f468c5f915f3f1cf75d7068baae', 5, 'Search Staf'),
(6, 'qiuxan', 'b59c67bf196a4758191e42f76670ceba', 0, 'adfdfs');

-- --------------------------------------------------------

--
-- Table structure for table `tute8`
--

CREATE TABLE IF NOT EXISTS `tute8` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Country` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Population` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tute8`
--

INSERT INTO `tute8` (`ID`, `Country`, `City`, `Population`) VALUES
(1, 'AU', 'Adelaide', 1262940),
(2, 'AU', 'Brisbane', 2146577),
(3, 'AU', 'Canberra', 418292),
(4, 'AU', 'Darwin', 129062),
(5, 'AU', 'Hobart', 216276),
(6, 'AU', 'Melbourne', 4169103),
(7, 'AU', 'Perth', 1832114),
(8, 'AU', 'Sydney', 4605992),
(9, 'UK', 'Birmingham', 2284092),
(10, 'UK', 'Glasgow', 1199629),
(11, 'UK', 'Leeds', 1499465),
(12, 'UK', 'Liverpool', 816216),
(13, 'UK', 'London', 8278251),
(14, 'UK', 'Manchester', 2240230),
(15, 'UK', 'Newcastle', 879996),
(16, 'UK', 'Nottingham', 666358),
(17, 'US', 'Chicago', 9504753),
(18, 'US', 'Dalas', 6526548),
(19, 'US', 'Houston', 6086538),
(20, 'US', 'Los Angeles', 12944801),
(21, 'US', 'Miami', 5670125),
(22, 'US', 'New York City', 19015900),
(23, 'US', 'Philadelphia', 5992414),
(24, 'US', 'Washington,D.C', 5703948);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
