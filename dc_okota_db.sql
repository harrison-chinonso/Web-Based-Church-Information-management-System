-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 11:36 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dc_okota_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `arcmember_tb`
--

CREATE TABLE `arcmember_tb` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone` text NOT NULL,
  `phone2` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `cell` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `marital` varchar(30) NOT NULL,
  `age` varchar(20) NOT NULL,
  `birthday` varchar(30) NOT NULL,
  `mvpdate` varchar(30) NOT NULL,
  `2ndtime` varchar(30) NOT NULL,
  `dcabasic` varchar(30) NOT NULL,
  `mat` varchar(30) NOT NULL,
  `enc` varchar(30) NOT NULL,
  `discipleship` varchar(30) NOT NULL,
  `school_of_ministry` varchar(30) NOT NULL,
  `dli` varchar(30) NOT NULL,
  `note` text NOT NULL,
  `referral` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arcmember_tb`
--

INSERT INTO `arcmember_tb` (`id`, `firstname`, `lastname`, `phone`, `phone2`, `email`, `gender`, `dept`, `address`, `cell`, `area`, `marital`, `age`, `birthday`, `mvpdate`, `2ndtime`, `dcabasic`, `mat`, `enc`, `discipleship`, `school_of_ministry`, `dli`, `note`, `referral`) VALUES
(4, 'Harry', 'Mark', '08033000665', '08060396501', 'harrykillz@yahoo.com', 'Male', 'Teen', '4 Emervik close Okota.', 'Century Cell 2', 'Jakande', 'Divorced', '', '05 Oct, 2018', 'Oct 10, 2018', '05 Oct, 2018', '05 Nov, 2018', '09 Oct, 2018', '05 Jan, 2018', '15 Feb, 2019', '20 Feb, 2020', '25 Jun, 2014', 'yes it was me', 'Harrison');

-- --------------------------------------------------------

--
-- Table structure for table `area_tb`
--

CREATE TABLE `area_tb` (
  `id` int(11) NOT NULL,
  `reportdate` varchar(30) NOT NULL,
  `target` int(11) NOT NULL,
  `totalmember` int(11) NOT NULL,
  `number_of_cells` int(11) NOT NULL,
  `cellheld` int(11) NOT NULL,
  `newcell` int(11) NOT NULL,
  `cellattend` int(11) NOT NULL,
  `sundayattend` int(11) NOT NULL,
  `premvp` int(11) NOT NULL,
  `newmvp` int(11) NOT NULL,
  `2ndtimer` int(11) NOT NULL,
  `workforce` int(11) NOT NULL,
  `outreach` int(11) NOT NULL,
  `dcabasic` int(11) NOT NULL,
  `mat` int(11) NOT NULL,
  `enc` int(11) NOT NULL,
  `dli` int(11) NOT NULL,
  `visit` int(11) NOT NULL,
  `calls` int(11) NOT NULL,
  `referral` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_tb`
--

INSERT INTO `area_tb` (`id`, `reportdate`, `target`, `totalmember`, `number_of_cells`, `cellheld`, `newcell`, `cellattend`, `sundayattend`, `premvp`, `newmvp`, `2ndtimer`, `workforce`, `outreach`, `dcabasic`, `mat`, `enc`, `dli`, `visit`, `calls`, `referral`) VALUES
(1, 'Oct 25, 2018', 120, 786, 683, 57, 564, 7465, 64576, 8668775, 7564, 0, 6564, 765, 646, 546, 564, 67574, 75, 7664, 'Harrison');

-- --------------------------------------------------------

--
-- Table structure for table `cell_tb`
--

CREATE TABLE `cell_tb` (
  `id` int(11) NOT NULL,
  `reportdate` varchar(40) NOT NULL,
  `name_of_cell` varchar(50) NOT NULL,
  `cellleader` varchar(50) NOT NULL,
  `target` int(11) NOT NULL,
  `cellpop` int(11) NOT NULL,
  `start` varchar(30) NOT NULL,
  `end` varchar(30) NOT NULL,
  `cellattend` int(11) NOT NULL,
  `sundayattend` int(11) NOT NULL,
  `2ndtimer` int(11) NOT NULL,
  `churchmvp` int(11) NOT NULL,
  `cellmvp` int(11) NOT NULL,
  `offering` int(11) NOT NULL,
  `dcabasic` int(11) NOT NULL,
  `mat` int(11) NOT NULL,
  `enc` int(11) NOT NULL,
  `dli` int(11) NOT NULL,
  `visit` int(11) NOT NULL,
  `cellperson` text NOT NULL,
  `referral` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cell_tb`
--

INSERT INTO `cell_tb` (`id`, `reportdate`, `name_of_cell`, `cellleader`, `target`, `cellpop`, `start`, `end`, `cellattend`, `sundayattend`, `2ndtimer`, `churchmvp`, `cellmvp`, `offering`, `dcabasic`, `mat`, `enc`, `dli`, `visit`, `cellperson`, `referral`) VALUES
(1, 'Oct 25, 2018', 'Chika', 'Okota Cell 1', 898, 98, '898', '898', 98, 98, 98, 989, 898, 98, 98, 898, 8, 8, 9, '', ''),
(2, 'Oct 16, 2018', 'Okota Road Cell1', 'Tolulope Sofela', 50, 39, '08:24 PM', '02:24 PM', 12, 30, 2, 3, 2, 700, 2, 3, 3, 2, 2, '', 'Harrison'),
(3, 'Oct 17, 2018', 'Okota Road Cell1', 'Tolulope Sofela', 50, 39, '08:24 PM', '02:24 PM', 12, 30, 2, 3, 2, 700, 2, 3, 3, 2, 2, '', 'Harrison'),
(8, 'Oct 22, 2018', 'Okota Road Cell1', 'Tolulope Sofela', 89, 87, '08:20 PM', '12:41 PM', 65, 66, 6, 65, 76, 760, 6, 1, 2, 1, 2, '', 'Harrison'),
(31, 'Oct 18, 2018', 'Okota Road Cell1', 'Tolulope Sofela', 6, 77, '07:20 PM', '01:25 PM', 65, 54, 7, 6, 4, 3, 5, 3, 5, 4, 3, '', 'Harrison'),
(56, 'Oct 18, 2018', 'Okota Road Cell1', 'Tolulope Sofela', 6, 77, '07:20 PM', '01:25 PM', 65, 54, 7, 6, 4, 3, 5, 3, 5, 4, 3, '', 'Harrison'),
(57, 'Nov 19, 2018', 'Okota Cell 1', 'Tolulope Sofela', 5, 5, '06:24 PM', '12:21 PM', 4, 4, 0, 5, 3, 4, 0, 4, 5, 4, 5, '', 'Harrison');

-- --------------------------------------------------------

--
-- Table structure for table `consolidation_db`
--

CREATE TABLE `consolidation_db` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(10) NOT NULL,
  `basic_start` varchar(15) NOT NULL,
  `basic_end` varchar(15) NOT NULL,
  `mat_start` varchar(15) NOT NULL,
  `mat_end` varchar(15) NOT NULL,
  `enc_session` varchar(15) NOT NULL,
  `dli_session` varchar(15) NOT NULL,
  `soul_won` varchar(30) NOT NULL,
  `follow_up` varchar(50) NOT NULL,
  `responsibility` text NOT NULL,
  `area` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consolidation_db`
--

INSERT INTO `consolidation_db` (`id`, `reg_no`, `basic_start`, `basic_end`, `mat_start`, `mat_end`, `enc_session`, `dli_session`, `soul_won`, `follow_up`, `responsibility`, `area`) VALUES
(1, 'dca001', 'Oct 10,2018', 'Oct 05, 2018', '', 'Oct 10, 2018', 'Oct 10,2018', 'Oct 10,2018', 'Junior', 'Junior', 'Ushering', 'Jakande'),
(2, 'dca002', 'Oct 10,2018', '', '', 'Oct 10,2018', 'Oct 10,2018', 'Oct 10,2018', '', '', '', 'Okota'),
(3, 'dca003', 'Oct 10,2018', '', '', '', '', '', '', '', '', 'Okota'),
(4, 'dca004', 'Oct 10,2018', '', '', '', '', '', '', '', '', 'Jakande'),
(10, 'dca102', '', '', 'Nov 10, 2019', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_tb`
--

CREATE TABLE `course_tb` (
  `id` int(11) NOT NULL,
  `dcabasic` varchar(50) NOT NULL,
  `dcamaturity` varchar(50) NOT NULL,
  `discipleship` varchar(50) NOT NULL,
  `school_of_ministry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tb`
--

INSERT INTO `course_tb` (`id`, `dcabasic`, `dcamaturity`, `discipleship`, `school_of_ministry`) VALUES
(1, 'DCA 101: NEW BIRTH', 'DCA 201: ETERNAL LIFE (THE DIVINE LIFE)', '', ''),
(2, 'DCA 102: ASSURANCE OF SALVATION', 'DCA 202: MAN IN THREE DIMENSIONS', '', ''),
(3, 'DCA 103: CHRISTIAN DEVOTION', 'DCA 203: HOW TO BE LED OF THE SPIRIT', '', ''),
(4, 'DCA 104: STUDY OF THE WORD', 'DCA 204: FRUIT OF THE SPIRIT', '', ''),
(5, 'DCA 105: HOLY GHOST BAPTISM', 'DCA 205: FAITH', '', ''),
(6, 'DCA 106: SOUL-WINNING', 'DCA 206: AGAPE LOVE', '', ''),
(7, 'DCA 107: CHRISTIAN FELLOWSHIP', 'DCA 207: VICTORIOUS CHRISTIAN LIVING', '', ''),
(8, 'DCA 108: CHRISTIAN STEWARDSHIP', 'DCA 208: THE BENEFITS OF THE WILL', '', ''),
(9, 'DCA 109: UNDERSTANDING DELIVERANCE', 'DCA 209: PRINCIPLES OF EFFECTIVE PRAYER', '', ''),
(10, 'DCA 110: WATER BAPTISM', 'DCA 210: THE PRESENT DAY MINISTRY OF JESUS CHRIST', '', ''),
(11, 'DCA 111: DOMINION CITY AND YOU', 'DCA 211: LAY MINISTRY', '', ''),
(12, 'DCA 112: UNDERSTANDING THE CELL SYSTEM', 'DCA 212: HOW TO START AND RUN A CELL', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dca_score_tb`
--

CREATE TABLE `dca_score_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `DCAreg_no` varchar(20) NOT NULL,
  `DCA_201` varchar(20) NOT NULL,
  `DCA_202` varchar(20) NOT NULL,
  `DCA_203` varchar(20) NOT NULL,
  `DCA_204` varchar(40) DEFAULT NULL,
  `DCA_205` varchar(40) DEFAULT NULL,
  `DCA_206` varchar(40) DEFAULT NULL,
  `DCA_207` varchar(40) DEFAULT NULL,
  `DCA_208` varchar(40) DEFAULT NULL,
  `DCA_209` varchar(40) DEFAULT NULL,
  `DCA_210` varchar(40) DEFAULT NULL,
  `DCA_211` varchar(40) DEFAULT NULL,
  `DCA_212` varchar(40) DEFAULT NULL,
  `DCA_101` varchar(40) DEFAULT NULL,
  `DCA_102` varchar(40) DEFAULT NULL,
  `DCA_103` varchar(40) DEFAULT NULL,
  `DCA_104` varchar(40) DEFAULT NULL,
  `DCA_105` varchar(40) DEFAULT NULL,
  `DCA_106` varchar(40) DEFAULT NULL,
  `DCA_107` varchar(40) DEFAULT NULL,
  `DCA_108` varchar(40) DEFAULT NULL,
  `DCA_109` varchar(40) DEFAULT NULL,
  `DCA_110` varchar(40) DEFAULT NULL,
  `DCA_111` varchar(40) DEFAULT NULL,
  `DCA_112` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dca_score_tb`
--

INSERT INTO `dca_score_tb` (`id`, `DCAreg_no`, `DCA_201`, `DCA_202`, `DCA_203`, `DCA_204`, `DCA_205`, `DCA_206`, `DCA_207`, `DCA_208`, `DCA_209`, `DCA_210`, `DCA_211`, `DCA_212`, `DCA_101`, `DCA_102`, `DCA_103`, `DCA_104`, `DCA_105`, `DCA_106`, `DCA_107`, `DCA_108`, `DCA_109`, `DCA_110`, `DCA_111`, `DCA_112`) VALUES
(15, 'dca102', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `follow_tb`
--

CREATE TABLE `follow_tb` (
  `id` int(11) NOT NULL,
  `mvpdate` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `area` varchar(20) NOT NULL,
  `called` varchar(10) NOT NULL DEFAULT 'No',
  `sms` varchar(10) NOT NULL DEFAULT 'No',
  `letter_prepared` varchar(10) NOT NULL DEFAULT 'No',
  `letter_collected` varchar(10) NOT NULL DEFAULT 'No',
  `letter_recieved` varchar(10) NOT NULL DEFAULT 'No',
  `letter_sentout` varchar(10) NOT NULL DEFAULT 'No',
  `person_responsible` varchar(20) NOT NULL DEFAULT 'No',
  `person_responsible_phone` varchar(20) NOT NULL DEFAULT 'No',
  `cell_leader` varchar(20) NOT NULL,
  `letter_delievered` varchar(10) NOT NULL DEFAULT 'No',
  `date_of_delievery` varchar(20) NOT NULL,
  `sign_copy_returned` varchar(10) NOT NULL DEFAULT 'No',
  `visited` varchar(10) NOT NULL DEFAULT 'No',
  `date_of_visit` varchar(20) NOT NULL,
  `2ndtime` varchar(11) NOT NULL DEFAULT 'No',
  `joined_cell` varchar(11) NOT NULL DEFAULT 'No',
  `enc` varchar(11) NOT NULL DEFAULT 'No',
  `joined_dca` varchar(11) NOT NULL DEFAULT 'No',
  `joined_mat` varchar(11) NOT NULL DEFAULT 'No',
  `joined_dept` varchar(11) NOT NULL DEFAULT 'No',
  `discipleship` varchar(11) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow_tb`
--

INSERT INTO `follow_tb` (`id`, `mvpdate`, `firstname`, `lastname`, `phone`, `area`, `called`, `sms`, `letter_prepared`, `letter_collected`, `letter_recieved`, `letter_sentout`, `person_responsible`, `person_responsible_phone`, `cell_leader`, `letter_delievered`, `date_of_delievery`, `sign_copy_returned`, `visited`, `date_of_visit`, `2ndtime`, `joined_cell`, `enc`, `joined_dca`, `joined_mat`, `joined_dept`, `discipleship`) VALUES
(1, 'Nov 15, 2018', 'Ikechukwu', 'Chinonso', '987987650', 'Jakande', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Nov 20, 2019', 'Harrison', 'Praise', '09087650983', 'Jakande', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Mar 15, 2018', 'Jude', 'Thomas', '09054672310', 'Ilasa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_tb`
--

CREATE TABLE `member_tb` (
  `id` int(11) NOT NULL,
  `DCAreg_no` varchar(20) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `phone` text NOT NULL,
  `phone2` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `cell` varchar(40) NOT NULL,
  `area` varchar(40) NOT NULL,
  `marital` varchar(30) NOT NULL,
  `age` varchar(20) NOT NULL,
  `birthday` varchar(30) NOT NULL,
  `mvpdate` varchar(30) NOT NULL,
  `2ndtime` varchar(30) NOT NULL,
  `dcabasic` varchar(30) NOT NULL,
  `mat` varchar(30) NOT NULL,
  `enc` varchar(40) NOT NULL,
  `discipleship` varchar(30) NOT NULL,
  `school_of_ministry` varchar(30) NOT NULL,
  `dli` varchar(30) NOT NULL,
  `note` text NOT NULL,
  `referral` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_tb`
--

INSERT INTO `member_tb` (`id`, `DCAreg_no`, `firstname`, `lastname`, `phone`, `phone2`, `email`, `gender`, `dept`, `address`, `cell`, `area`, `marital`, `age`, `birthday`, `mvpdate`, `2ndtime`, `dcabasic`, `mat`, `enc`, `discipleship`, `school_of_ministry`, `dli`, `note`, `referral`) VALUES
(1, 'dca001', 'Raymond', 'Joy', '08060396501', '90907676575775', 'ray@gmail.com', 'female', 'Choir', '23 skjhujg sjhihihi', 'Canal Cell 3', 'Jakande', 'married', '', 'Oct 15, 2018', 'Oct 03, 2018', 'Oct 20, 2018', '', '', 'Oct 10,2018', '', '', 'Oct 10,2018', ' its not me', 'Chika'),
(2, 'dca002', 'Chris', 'Praise', '', '9083765242', 'praise@gmail.com', 'female', 'Media', 'No 7 Chris Praise str. canal', 'Okota Road Cell1', 'Okota', 'divorced', '', '', 'Oct 30, 2018', 'Oct 26, 2018', '', '', 'Oct 10,2018', 'Oct 01, 2018', 'Oct 12, 2018', 'Oct 10,2018', 'He is now a worker in ushering department\r\n2018-10-31 10:28:19\r\nHe Just Joined a cell last week\r\n2018-10-31 15:04:21<br>Just gave his life to christ\r\n2018-10-31 15:07:26', 'Harrison'),
(3, 'dca003', 'Timothy ', 'Ifeanyi', '09087653421', '080764876525', 'timify@gmail.com', 'female', 'Santuary', 'No 3 St str. ajao', 'Century Cell 2', 'Ejigbo', 'single', '', 'Oct 26, 2018', 'Oct 29, 2018', 'Oct 24, 2018', '', '', 'Oct 02, 2018', '', '', '', '', 'Harrison'),
(4, 'dca004', 'Harry', 'Mark', '08033000665', '08060396501', 'harrykillz@yahoo.com', 'Male', 'Teen', '4 Emervik close Okota.', 'httygyyyy', 'Jakande', 'Divorced', '', '05 Oct, 2018', 'Oct 10, 2018', '05 Oct, 2018', '', '', '05 Jan, 2018', '15 Feb, 2019', '20 Feb, 2020', '25 Jun, 2014', 'yes it was me', 'Harrison'),
(5, '', 'Harry', 'Chinonso', '08067453217', '', 'shianett@gmail.com', '', '', '', '', 'Okota', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '', 'John', 'Matthew', '09087432176', '', 'johnmatt@gmail.com', '', '', '', '', 'Okota', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '', 'Chika', 'Andrew', '08138601115', '098098776667', 'shianett@gmail.com', 'Male', '', 'nhjshguhajhnaqncia', 'httygyyyy', 'Jakande', 'Single', '', 'Oct 10, 2018', 'Oct 10, 2018', 'Oct 10, 2018', '', '', '', '', '', '', ' not Gin yes we made it yes we made it yes we made it yes we made it<br>He is now a worker in ushering department\n2018-10-31 15:14:48<br>An Usher\n2018-11-09 09:46:38', 'Harrison'),
(14, '', 'Chika', 'Andrew', '08138601115', '098098776667', 'shianett@gmail.com', 'Male', '', 'nhjshguhajhnaqncia', 'httygyyyy', 'Jakande', 'Single', '', 'Oct 10, 2018', 'Oct 10, 2018', 'Oct 10, 2018', '', '', '', '', '', '', ' not Gin yes we made it yes we made it yes we made it yes we made it<br>He is now a worker in ushering department\n2018-10-31 15:14:48<br>An Usher\n2018-11-09 09:46:38', 'Harrison');

-- --------------------------------------------------------

--
-- Table structure for table `mvp_tb`
--

CREATE TABLE `mvp_tb` (
  `id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `phone` text NOT NULL,
  `phone2` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `cell` varchar(40) NOT NULL,
  `area` varchar(40) NOT NULL,
  `marital` varchar(30) NOT NULL,
  `age` varchar(20) NOT NULL,
  `birthday` varchar(30) NOT NULL,
  `mvpdate` varchar(30) NOT NULL,
  `2ndtime` varchar(30) NOT NULL,
  `3rdtime` varchar(30) NOT NULL,
  `note` text NOT NULL,
  `referral` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvp_tb`
--

INSERT INTO `mvp_tb` (`id`, `firstname`, `lastname`, `phone`, `phone2`, `email`, `gender`, `address`, `cell`, `area`, `marital`, `age`, `birthday`, `mvpdate`, `2ndtime`, `3rdtime`, `note`, `referral`) VALUES
(1, 'John', 'Andrew', '08138601115', '  098098776667', 'shianett@gmail.com', 'Male', 'jshguhajhnancia', 'httygyyyy', 'Jakande', 'MARRIED', '', '', 'Oct 10, 2018', 'Oct 10, 2018', '', ' not Gin yes we made it yes we made it yes we made it yes we made it<br>He is now a worker in ushering department\n2018-10-31 15:14:48<br>An Usher\n2018-11-09 09:46:38', 'Harrison'),
(2, 'Mark', 'Andrew', '08138601115', '  098098776667', 'shianett@gmail.com', 'Male', 'jshguhajhnancia', 'httygyyyy', 'Jakande', 'Single', '', '', 'Oct 10, 2018', 'Oct 10, 2018', '', '', 'Harrison'),
(3, 'Chika', 'Andrew', '08138601115', ' 098098776667', 'shianett@gmail.com', 'Male', 'jshguhajhnancia', 'httygyyyy', 'Jakande', 'Single', '', '', 'Oct 10, 2018', 'Oct 10, 2018', '', '', 'Harrison');

-- --------------------------------------------------------

--
-- Table structure for table `newarea_tb`
--

CREATE TABLE `newarea_tb` (
  `id` int(11) NOT NULL,
  `area` varchar(40) NOT NULL,
  `referal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newarea_tb`
--

INSERT INTO `newarea_tb` (`id`, `area`, `referal`) VALUES
(1, 'Ago 1', ''),
(2, 'Ago 2', ''),
(3, 'Ago 3', ''),
(4, 'Okota', ''),
(5, 'Isolo', ''),
(6, 'Ijesha', ''),
(7, 'Ilasa', ''),
(8, 'Lawanson', ''),
(9, 'Ejigbo', ''),
(10, 'Oke Afa', ''),
(11, 'Isheri', ''),
(12, 'Jakande', ''),
(13, 'Ikotun', ''),
(14, 'Mafoluku', ''),
(15, 'Ajegunle', ''),
(16, 'Others', '');

-- --------------------------------------------------------

--
-- Table structure for table `newbeliever_tb`
--

CREATE TABLE `newbeliever_tb` (
  `id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `phone` text NOT NULL,
  `phone2` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `birthday` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `marital` varchar(20) NOT NULL,
  `decisiondate` varchar(30) NOT NULL,
  `mvpdate` varchar(30) NOT NULL,
  `2ndtime` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `cell` varchar(30) NOT NULL,
  `referral` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newbeliever_tb`
--

INSERT INTO `newbeliever_tb` (`id`, `firstname`, `lastname`, `phone`, `phone2`, `email`, `address`, `birthday`, `gender`, `marital`, `decisiondate`, `mvpdate`, `2ndtime`, `area`, `cell`, `referral`) VALUES
(1, 'Chris', 'Prince', '08060396501', ' 09087965489', 'shianett@gmail.com', 'No 12 Cresent Avenue, Canal Estate', '', 'female', 'divorced', 'Oct 19, 2016', 'Apr 25, 2019', 'Jan 24, 2018', 'Oke Afa', 'Okota Cell 1', 'Harrison');

-- --------------------------------------------------------

--
-- Table structure for table `newcell_tb`
--

CREATE TABLE `newcell_tb` (
  `id` int(11) NOT NULL,
  `cellname` varchar(40) NOT NULL,
  `celladdress` varchar(40) NOT NULL,
  `cellleader` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `marital` varchar(30) NOT NULL,
  `hostname` varchar(30) NOT NULL,
  `hostphone` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `referal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newcell_tb`
--

INSERT INTO `newcell_tb` (`id`, `cellname`, `celladdress`, `cellleader`, `phone`, `gender`, `marital`, `hostname`, `hostphone`, `area`, `referal`) VALUES
(1, 'Okota Road Cell1', 'No 5 Kunmi Adebiyi Str, Off Okota Road, ', 'Tolulope Sofela', '08138601115', 'male', 'single', 'Mr and Mrs Eze Chika', '08060396501', 'Jakande', 'Chika'),
(2, 'Canal Cell 3', 'No 5 Kunmi Adebiyi Str, Off Okota Road, ', 'Tolulope Sofela', '08033000665', 'female', 'married', 'Mr and Mrs Eze Chika', '08060396501', 'Oke Afa', 'harry'),
(3, 'Century Cell 2', 'No 5 Kunmi Adebiyi Str, Off Okota Road, ', 'Tolulope Sofela', '09034527656', 'male', 'single', 'Mr and Mrs Eze Chika', '08060396501', 'Mafoluku', 'harry');

-- --------------------------------------------------------

--
-- Table structure for table `newdept_tb`
--

CREATE TABLE `newdept_tb` (
  `id` int(11) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `referal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newdept_tb`
--

INSERT INTO `newdept_tb` (`id`, `dept`, `referal`) VALUES
(1, 'Administration', ''),
(2, 'Book Shop', ''),
(3, 'Children Church', ''),
(4, 'Choir', ''),
(5, 'Dominion City Academy Management', ''),
(6, 'Follow Up', ''),
(7, 'Info Desk', ''),
(8, 'Maintainance', ''),
(9, 'Media', ''),
(10, 'Outreach and Missions', ''),
(11, 'Prayer', ''),
(12, 'Santuary', ''),
(13, 'Sound and Equipments', ''),
(14, 'Teen\'s Church', ''),
(15, 'Ushering', ''),
(16, 'Welfare', ''),
(17, 'Greeters', 'Harrison');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `area` varchar(32) NOT NULL,
  `cellname` varchar(40) NOT NULL,
  `rol` varchar(32) NOT NULL,
  `picture` varchar(40) NOT NULL DEFAULT 'p.jpg',
  `active` int(11) NOT NULL DEFAULT '0',
  `avtivate_id` varchar(64) NOT NULL,
  `referral` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`id`, `username`, `email`, `pass`, `firstname`, `lastname`, `area`, `cellname`, `rol`, `picture`, `active`, `avtivate_id`, `referral`) VALUES
(1, 'harry', 'harrykillz@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Harrison', 'Chinonso', 'Jakande', 'Century Cell 2', 'Administrator', 'Stan.jpg', 1, '9877', 'Harrison'),
(2, 'Tolu', 'Shianett@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Chika', 'Andrew', 'Jakande', 'Century Cell 2', 'Mvp Personnel', 'img.jpg', 1, '', 'Harrison'),
(4, 'John', 'harrykillz@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', 'Chris', 'Joy', 'Oke Afa', '', 'Cell Leader', 'p.jpg', 1, '', 'Harrison'),
(6, 'Ada', 'Adaadmin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Adaobi', 'Okpala', 'Jakande', 'Okota Road Cell1', 'DCA Staff', 'Adao Ikwueto.jpg', 1, '', 'Harrison'),
(7, 'Amara', 'Amarachi@dcaacada.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Amarachi', 'Philips', 'Ejigbo', 'Canal Cell 3', 'Head Of Department', '', 0, '', 'Harrison'),
(8, 'Ebube', 'Joephil@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tolulope', 'Dipo', 'Ago 3', 'Canal Cell 3', 'Area Cordinator', '', 1, '', 'Harrison');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arcmember_tb`
--
ALTER TABLE `arcmember_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_tb`
--
ALTER TABLE `area_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cell_tb`
--
ALTER TABLE `cell_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consolidation_db`
--
ALTER TABLE `consolidation_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tb`
--
ALTER TABLE `course_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dca_score_tb`
--
ALTER TABLE `dca_score_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_tb`
--
ALTER TABLE `follow_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_tb`
--
ALTER TABLE `member_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvp_tb`
--
ALTER TABLE `mvp_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newarea_tb`
--
ALTER TABLE `newarea_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newbeliever_tb`
--
ALTER TABLE `newbeliever_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newcell_tb`
--
ALTER TABLE `newcell_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newdept_tb`
--
ALTER TABLE `newdept_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arcmember_tb`
--
ALTER TABLE `arcmember_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `area_tb`
--
ALTER TABLE `area_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cell_tb`
--
ALTER TABLE `cell_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `consolidation_db`
--
ALTER TABLE `consolidation_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_tb`
--
ALTER TABLE `course_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dca_score_tb`
--
ALTER TABLE `dca_score_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `follow_tb`
--
ALTER TABLE `follow_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_tb`
--
ALTER TABLE `member_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mvp_tb`
--
ALTER TABLE `mvp_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newarea_tb`
--
ALTER TABLE `newarea_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `newbeliever_tb`
--
ALTER TABLE `newbeliever_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newcell_tb`
--
ALTER TABLE `newcell_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newdept_tb`
--
ALTER TABLE `newdept_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
