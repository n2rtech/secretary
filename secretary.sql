-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 02:09 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secretary`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_informations`
--

CREATE TABLE `calendar_informations` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `from_time` time NOT NULL,
  `start` datetime DEFAULT NULL,
  `to_date` date NOT NULL,
  `to_time` time DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_activity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(161) NOT NULL,
  `message_status` int(11) NOT NULL DEFAULT 0 COMMENT '0=>off;1=>on',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_informations`
--

INSERT INTO `calendar_informations` (`id`, `employee_id`, `from_date`, `from_time`, `start`, `to_date`, `to_time`, `end`, `event_type`, `event_activity`, `status`, `message_status`, `created_at`) VALUES
(1, 1, '2021-09-20', '02:05:27', '2021-09-20 02:58:43', '2021-09-21', '01:05:27', '2021-09-21 09:59:41', '1', '2', '', 0, '2021-09-21 09:54:57'),
(2, 1, '2021-09-21', '02:05:27', '2021-09-22 02:59:52', '2021-09-21', '05:05:27', '2021-09-22 05:59:31', '1', '2', '', 0, '2021-09-21 09:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(10) UNSIGNED NOT NULL,
  `companyID` varchar(100) NOT NULL,
  `Searchword` text NOT NULL,
  `NameFirst` varchar(100) NOT NULL,
  `NamesMiddle` varchar(100) NOT NULL,
  `NameLast` varchar(100) NOT NULL,
  `GroupPhone` varchar(100) NOT NULL,
  `Phonenumber` varchar(100) NOT NULL,
  `Mobilephone` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Zipcode` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `GroupEmail` text NOT NULL,
  `PersonalEmail` varchar(100) NOT NULL,
  `Manager` text NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `ExtraEmail` text NOT NULL,
  `Language` varchar(100) NOT NULL,
  `SendMessage` int(11) NOT NULL,
  `Status` enum('enabled','disabled','','') NOT NULL,
  `LastLoginTime` datetime NOT NULL,
  `MetaTimeCreated` datetime NOT NULL,
  `MetaDeleted` enum('yes','no','','') NOT NULL DEFAULT 'no',
  `MetaTimeDeleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `companyID`, `Searchword`, `NameFirst`, `NamesMiddle`, `NameLast`, `GroupPhone`, `Phonenumber`, `Mobilephone`, `Address`, `Zipcode`, `Town`, `GroupEmail`, `PersonalEmail`, `Manager`, `Department`, `Description`, `Username`, `Password`, `ExtraEmail`, `Language`, `SendMessage`, `Status`, `LastLoginTime`, `MetaTimeCreated`, `MetaDeleted`, `MetaTimeDeleted`) VALUES
(3, '10', 'mannequin', 'Lene', '', '', '', '80808080', '80808080', '8492 South Tallwood Dr. San Jose, CA 95112', '', '', '', 'mj@test.dk', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(4, '11', 'comforter', 'Ginger', 'Stein', 'Plant', '', '3853169889', '3853169889', '9704 Front Ave. Westminster, CA 92683', '', '', '', 'tattooman@aol.com', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(5, '12', 'pacifier', 'Del', 'Commishun', 'Phineum', '', '3857577865', '3857577865', '8567 Taylor Drive San Jose, CA 95127', '', '', '', 'chaikin@yahoo.com', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 3, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(6, '13', 'ventriloquist', 'Rose', '', 'Bush', '', '3857021561', '3857021561', '24 Canal Ave. Vallejo, CA 94591', '', '', '', 'satch@optonline.net', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(7, '14', 'effigy', 'Perry', '', 'Scope', '', '3853258499', '3853258499', '466 Cooper Dr. North Hollywood, CA 91605', '', '', '', 'neuffer@live.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(8, '15', 'boob', 'Frank', '', 'N.', '', '3852223887', '3852223887', '50 Hill St. Pico Rivera, CA 90660', '', '', '', 'magusnet@me.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 5, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(9, '16', 'dummies', 'Roy', 'Cheef', 'L.', '', '3852037636', '3852037636', 'Pico Rivera, CA 90660 ', '', '', '', 'pakaste@me.com', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 6, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(10, '17', 'form', 'Pat', '', 'Thettick', '', '3857801851', '3857801851', 'Sylmar, CA 91342 ', '', '', '', 'johndo@sbcglobal.net', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(11, '18', 'Quaker', 'Percy', 'Toffis', 'Kewshun', '', '3857092390', '3857092390', 'Fountain Valley, CA 92708 ', '', '', '', 'sscorpio@att.net', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 8, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(12, '19', 'bridge', 'Rod', '', 'Knee', '', '3858199607', '3858199607', '231 Magnolia St. Oxnard, CA 93033', '', '', '', 'kenja@aol.com', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(13, '20', 'Aunt', 'Hank', '', 'R.', '', '3852569761', '3852569761', '62 Rockville Drive Los Angeles, CA 90026', '', '', '', 'squirrel@yahoo.com', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(14, '21', 'dum?dum', 'Bridget', '', 'Theriveaquai', '', '3850411909', '3850411909', '9394 Henry Smith Ave. Oakland, CA 94601', '', '', '', 'kingma@outlook.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(15, '22', 'chowderhead', 'Pat', 'Awl', 'N.', '', '3853772740', '3853772740', 'Oakland, CA 94601 ', '', '', '', 'madanm@mac.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(16, '23', 'phantom', 'Karen', '', 'Onnabit', '', '3859491840', '3859491840', 'Suite 47 Azusa, CA 91702', '', '', '', 'krueger@att.net', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(17, '24', 'soother', 'Col', '', 'Fays', '', '3855462168', '3855462168', '7078 Pierce Rd. Antioch, CA 94509', '', '', '', 'munson@verizon.net', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 3, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(18, '25', 'thumbnail', 'Fay', '', 'Daway', '', '3859151978', '3859151978', 'Antioch, CA 94509 ', '', '', '', 'bcevc@outlook.com', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(19, '26', 'binky', 'Joe', '', 'V.', '', '3857494953', '3857494953', 'San Pablo, CA 94806 ', '', '', '', 'hampton@me.com', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(20, '27', 'dottle', 'Wes', 'Convenshun', 'Yabinlatelee', '', '3859184796', '3859184796', 'Victorville, CA 92392 95 S. Thompson St.', '', '', '', 'maikelnai@icloud.com', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 5, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(21, '28', 'dumbbell', 'Colin', '', 'Sik', '', '3853791960', '3853791960', '95 S. Thompson St. ', '', '', '', 'dcoppit@outlook.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 6, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(22, '29', 'mannikin', 'Greg', '', 'Arias', '', '3854303149', '3854303149', '7956 Kirkland Street ', '', '', '', 'agolomsh@live.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(23, '30', 'declarer', 'Toi', '', 'Story', '', '3850670812', '3850670812', '378 Talbot Ave. ', '', '', '', 'cliffordj@yahoo.ca', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 8, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(24, '31', 'manikin', 'Gene', 'Cry', 'Eva', '', '3854727974', '3854727974', 'Canyon Country, CA 91351 68 West Orange Drive', '', '', '', 'smallpaul@optonline.net', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(25, '32', 'manakin', 'Jen', '', 'Tile', '', '3854758839', '3854758839', 'San Francisco, CA 94112 ', '', '', '', 'eidac@msn.com', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(26, '33', 'mort', 'Simon', '', 'Sais', '', '3853997996', '3853997996', 'Van Nuys, CA 91405 ', '', '', '', 'shrapnull@aol.com', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(27, '34', 'towie', 'Peter', '', 'Owt', '', '3858101328', '3858101328', '7040 Fawn Dr. Anaheim, CA 92805', '', '', '', 'roamer@att.net', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(28, '35', 'table', 'Hugh', '', 'N.', '', '3855790155', '3855790155', '8470 Rockland Street Sunnyvale, CA 94086', '', '', '', 'simone@me.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(29, '36', 'hare', 'Lee', 'Undawair', 'Nonmi', '', '3857518459', '3857518459', '45 Lincoln Rd. ', '', '', '', 'thurston@hotmail.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 3, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(30, '37', 'feint', 'Lynne', '', 'Gwafranca', '', '3855436924', '3855436924', 'Vista, CA 92083 15 School Ave.', '', '', '', 'tubajon@sbcglobal.net', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(31, '38', 'dumb', 'Art', '', 'Decco', '', '3854352248', '3854352248', 'Ontario, CA 91762 766 Wild Rose Street', '', '', '', 'camenisch@mac.com', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(32, '39', 'doll', 'Lynne', '', 'Gwistic', '', '3852951485', '3852951485', 'Fremont, CA 94538 9099 S. Arnold St.', '', '', '', 'dvdotnet@optonline.net', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 5, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(33, '40', 'hand', 'Polly', '', 'Ester', '', '3857416424', '3857416424', '9099 S. Arnold St. Watsonville, CA 95076', '', '', '', 'phizntrg@yahoo.ca', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 6, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(34, '41', 'Charlie', 'Oscar', '', 'Nommanee', '', '3850154523', '3850154523', '358 South Clinton Drive Huntington Park, CA 90255', '', '', '', 'suresh@live.com', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(35, '42', 'crossruff', 'Laura', 'Kwayted', 'Biding', '', '3855971732', '3855971732', '207 Pineknoll Lane Cupertino, CA 95014', '', '', '', 'hstiles@me.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 8, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(36, '43', 'Chase', 'Laura', 'Thabalanz', 'Norda', '', '3852223887', '3852223887', 'Cupertino, CA 95014 ', '', '', '', 'andale@msn.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(37, '44', 'display', 'Des', '', 'Ignayshun', '', '3852037636', '3852037636', 'Wilmington, CA 90744 41 State St.', '', '', '', 'inico@me.com', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(38, '45', 'giant', 'Mike', '', 'Rowe-Soft', '', '3857801851', '3857801851', 'Lompoc, CA 93436 651 Marlborough St.', '', '', '', 'ahuillet@comcast.net', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(39, '46', 'overlay', 'Anne', '', 'T.', '', '3857092390', '3857092390', '651 Marlborough St. ', '', '', '', 'flakeg@icloud.com', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(40, '47', 'layout', 'Wayde', '', 'N.', '', '3858199607', '3858199607', '247 Blackburn Drive ', '', '', '', 'sakusha@mac.com', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(41, '48', 'carousel', 'Dee', '', 'Mandingboss', '', '3852569761', '3852569761', '367 Sunset Dr. Los Angeles, CA 90022', '', '', '', 'plover@live.com', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 3, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(42, '49', 'greyhound', 'Sly', '', 'Meedentalfloss', '', '3850411909', '3850411909', 'Los Angeles, CA 90022 ', '', '', '', 'louise@mac.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(43, '50', 'knucklehead', 'Stanley', '', 'Knife', '', '3853772740', '3853772740', 'Compton, CA 90221 ', '', '', '', 'jshirley@outlook.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(44, '51', 'putz', 'Wynn', '', 'Dozeaplikayshun', '', '3859491840', '3859491840', 'Baldwin Park, CA 91706 ', '', '', '', 'squirrel@live.com', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 5, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00'),
(45, '52', 'entry', 'Mal', '', 'Ajusted', '', '3855462168', '3855462168', '555 Columbia Ave. Los Angeles, CA 90001', '', '', '', 'zyghom@hotmail.com', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 6, 'enabled', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_groups`
--

CREATE TABLE `employee_groups` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_groups`
--

INSERT INTO `employee_groups` (`id`, `employee_id`, `group_id`, `updated_at`, `created_at`) VALUES
(1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 21, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 24, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 34, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 25, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 6, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `department`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sales', 'Management', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'HR', 'Management', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Management', 'Management', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'TL', 'Management', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `reciver_id` int(11) NOT NULL,
  `time_sent` time NOT NULL,
  `in_draft` int(11) NOT NULL DEFAULT 0 COMMENT '0=>message;1=>in_draft;2=>sent',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `mobile`, `email`, `subject`, `body`, `comment`, `sender_id`, `reciver_id`, `time_sent`, `in_draft`, `created_at`, `updated_at`) VALUES
(1, 'Krishna Mishra', '9026574061', 'er.krishna.mishra@gmail.com', 'Email Message', 'Email Message Email Message Email Message', NULL, NULL, 1, '33:08:38', 0, '2021-09-20 18:08:38', '0000-00-00 00:00:00'),
(2, 'Krishna Mishra', '9026574061', 'er.krishna.mishra@gmail.com', 'Email Message', 'Email Message Email Message Email Message', NULL, NULL, 3, '33:08:38', 0, '2021-09-20 18:08:38', '0000-00-00 00:00:00'),
(3, 'Krishna Mishra', '9026574061', 'er.krishna.mishra@gmail.com', 'Email Message', 'Email Message Email Message Email Message', NULL, NULL, 6, '33:08:38', 0, '2021-09-20 18:08:38', '0000-00-00 00:00:00'),
(4, 'Krishna Mishra', '9026574061', 'er.krishna.mishra@gmail.com', 'Email Message', 'Email Message Email Message Email Message', NULL, NULL, 6, '33:08:38', 0, '2021-09-20 18:08:38', '0000-00-00 00:00:00'),
(5, 'Krishna Mishra', '9026574061', 'er.krishna.mishra@gmail.com', 'Email Message', 'Email Message Email Message Email Message', NULL, NULL, 1, '33:08:38', 0, '2021-09-20 18:08:38', '0000-00-00 00:00:00'),
(6, 'Krishna Mishra', '9026574061', 'er.krishna.mishra@gmail.com', 'Email Message', 'Email Message Email Message Email Message', NULL, NULL, 12, '33:08:38', 0, '2021-09-20 18:08:38', '0000-00-00 00:00:00'),
(7, 'Krishna Mishra', '9026574061', 'test@gmail.com', 'Test Subject', 'Test Message', NULL, NULL, 11, '00:00:00', 0, '2021-09-23 13:04:55', '2021-09-23 13:04:55'),
(8, 'Krishna Mishra', '9026574061', 'test@gmail.com', 'Test Subject', 'Test Message', NULL, NULL, 11, '00:00:00', 0, '2021-09-23 13:09:28', '2021-09-23 13:09:28'),
(9, 'Adrienne Ward', '52', 'bitu@mailinator.com', 'Libero delectus acc', 'Fuga Minus neque as', NULL, NULL, 34, '00:00:00', 0, '2021-09-23 13:18:26', '2021-09-23 13:18:26'),
(10, 'Adrienne Ward', '52', 'bitu@mailinator.com', 'Libero delectus acc', 'Fuga Minus neque as', NULL, NULL, 34, '00:00:00', 0, '2021-09-23 13:18:26', '2021-09-23 13:18:26'),
(11, 'Adrienne Ward', '52', 'bitu@mailinator.com', 'Libero delectus acc', 'Fuga Minus neque as', NULL, NULL, 34, '00:00:00', 0, '2021-09-23 13:18:26', '2021-09-23 13:18:26'),
(12, 'Lael Valdez', '96', 'gopyjyz@mailinator.com', 'Assumenda eius dolor', 'Et cupidatat quia do', NULL, NULL, 3, '00:00:00', 0, '2021-09-23 13:20:47', '2021-09-23 13:20:47'),
(13, 'Ginger Jimenez', '91', 'bepepaqowi@mailinator.com', 'Nisi pariatur Dolor', 'Magna eligendi eius', NULL, NULL, 36, '00:00:00', 0, '2021-09-23 13:21:44', '2021-09-23 13:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `message_receivers`
--

CREATE TABLE `message_receivers` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message_tmp_receivers`
--

CREATE TABLE `message_tmp_receivers` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `most_searched_keywords`
--

CREATE TABLE `most_searched_keywords` (
  `id` bigint(20) NOT NULL,
  `keyword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `most_searched_keywords`
--

INSERT INTO `most_searched_keywords` (`id`, `keyword`) VALUES
(1, 'phantom'),
(2, 'phantom'),
(3, 'tat'),
(4, 'tat'),
(5, 'tat'),
(6, 'comforter'),
(7, 'comforter'),
(8, 'comforter'),
(9, 'comforter'),
(10, 'comforter'),
(11, 'Lene'),
(12, 'Lene'),
(13, 'Lene'),
(14, 'ff'),
(15, 'ff'),
(16, 'ff'),
(17, 'ff'),
(18, 'ff'),
(19, 'Perry'),
(20, 'Perry'),
(21, 'roy'),
(22, 'Lene'),
(23, 'Perry'),
(24, 'ff'),
(25, 'roy'),
(26, 'roy'),
(27, 'Lene'),
(28, 'ff'),
(29, 'comforter'),
(30, 'phantom'),
(31, 'tat'),
(32, 'phantom'),
(33, 'roy'),
(34, 'pat'),
(35, 'pat'),
(36, 'phantom'),
(37, 'phantom'),
(38, 'phantom'),
(39, 'pa'),
(40, 'Rose'),
(41, 'Rose'),
(42, 'Rose'),
(43, 'Rose'),
(44, 'Rose'),
(45, 'Rose'),
(46, 'Rose'),
(47, 'Rose'),
(48, 'Rose'),
(49, 'Rose'),
(50, 'Rose'),
(51, 'Rose'),
(52, 'Rose'),
(53, 'Rose'),
(54, 'Rose'),
(55, 'pa'),
(56, 'Rose'),
(57, 'Gin'),
(58, 'Gin'),
(59, 'Gin'),
(60, 'Gin'),
(61, 'Gin'),
(62, 'Gin'),
(63, 'G'),
(64, 'G'),
(65, '88'),
(66, '88'),
(67, '99'),
(68, '99'),
(69, 'Kn'),
(70, 'Kn'),
(71, 'Rod'),
(72, 'Rod'),
(73, 'lene'),
(74, 'lene'),
(75, 'lene'),
(76, 'lene'),
(77, 'lene'),
(78, 'lene'),
(79, 'lene'),
(80, 'lene'),
(81, 'lene'),
(82, 'lene'),
(83, 'lene'),
(84, 'lene'),
(85, 'lene'),
(86, 'lene'),
(87, 'lene'),
(88, '88'),
(89, '88'),
(90, '88'),
(91, '88'),
(92, '88'),
(93, '88'),
(94, '88'),
(95, '88'),
(96, '88'),
(97, '88'),
(98, '88'),
(99, '88'),
(100, '88'),
(101, '88'),
(102, '88'),
(103, '88'),
(104, '88'),
(105, '88'),
(106, '88'),
(107, '88'),
(108, '88'),
(109, 'lene'),
(110, 'lene'),
(111, 'lene'),
(112, 'lene'),
(113, 'lene'),
(114, 'lene'),
(115, 'lene'),
(116, 'lene'),
(117, 'lene'),
(118, 'lene'),
(119, 'lene'),
(120, 'lene'),
(121, 'lene'),
(122, 'lene'),
(123, 'lene'),
(124, 'lene'),
(125, 'lene'),
(126, 'lene'),
(127, 'lene'),
(128, 'lene'),
(129, 'lene'),
(130, 'lene'),
(131, 'Roy'),
(132, 'Roy'),
(133, 'Roy'),
(134, 'Roy'),
(135, 'Roy'),
(136, 'Roy'),
(137, 'Roy'),
(138, 'Roy'),
(139, 'Roy'),
(140, 'Roy'),
(141, 'Roy'),
(142, 'Roy'),
(143, 'Roy'),
(144, 'Roy'),
(145, 'Roy'),
(146, 'Roy'),
(147, 'Roy'),
(148, 'Roy'),
(149, 'Roy'),
(150, 'Roy'),
(151, 'Roy'),
(152, 'ff'),
(153, 'ff'),
(154, 'ff'),
(155, 'ff'),
(156, 'lene'),
(157, 'lene'),
(158, 'lene'),
(159, 'lene'),
(160, 'Roy'),
(161, 'Roy'),
(162, 'Roy'),
(163, 'l'),
(164, 'l'),
(165, 'l'),
(166, 'l'),
(167, 'l'),
(168, 'l'),
(169, 'l'),
(170, 'l'),
(171, 'lene'),
(172, 'Hank'),
(173, 'Hank'),
(174, 'Hank'),
(175, 'Hank'),
(176, 'Hank'),
(177, 'Hank'),
(178, 'Hank'),
(179, 'lene'),
(180, 'lene'),
(181, 'lene'),
(182, 'lene'),
(183, 'lene'),
(184, 'lene'),
(185, 'lene'),
(186, 'lene'),
(187, 'lene'),
(188, 'lene'),
(189, 'lene'),
(190, 'lene'),
(191, 'lene'),
(192, 'lene'),
(193, 'lene'),
(194, 'lene'),
(195, 'lene'),
(196, 'lene'),
(197, 'lene'),
(198, 'lene'),
(199, 'lene'),
(200, 'lene'),
(201, 'lene'),
(202, 'lene'),
(203, 'lene'),
(204, 'lene'),
(205, 'lene'),
(206, 'lene'),
(207, 'lene'),
(208, 'lene'),
(209, 'lene'),
(210, 'lene'),
(211, 'd'),
(212, 'd'),
(213, 'd'),
(214, 'd'),
(215, 'd'),
(216, 'd'),
(217, 'd'),
(218, 'd'),
(219, 'd'),
(220, 'd'),
(221, 'f'),
(222, 'f'),
(223, 'f'),
(224, 'f'),
(225, 'f'),
(226, 'f'),
(227, 'f'),
(228, 'f'),
(229, 'f'),
(230, 'f'),
(231, 'f'),
(232, 'f'),
(233, 'f'),
(234, 'f'),
(235, 'f'),
(236, 'f'),
(237, 'w'),
(238, 'w'),
(239, 'w'),
(240, 'w'),
(241, 'w'),
(242, 'w'),
(243, 'w'),
(244, 'w'),
(245, 'w'),
(246, 'd'),
(247, 'd'),
(248, 'd'),
(249, 'd'),
(250, 'd'),
(251, 'd'),
(252, 'd'),
(253, 'd'),
(254, 'd'),
(255, 'd'),
(256, 'd'),
(257, 'd'),
(258, 'd'),
(259, 'd'),
(260, 'd'),
(261, 'd'),
(262, 'd'),
(263, 'd'),
(264, 'd'),
(265, 'd'),
(266, 'r'),
(267, 'r'),
(268, 'r'),
(269, 'r'),
(270, 'f'),
(271, 'f'),
(272, 'f'),
(273, 'f'),
(274, 'f'),
(275, 'tt'),
(276, 'tt'),
(277, '55'),
(278, 'l'),
(279, 'l'),
(280, 'h'),
(281, 'h'),
(282, 'h'),
(283, 'h'),
(284, 'Lene'),
(285, 'Lene'),
(286, 'lene'),
(287, 'Del'),
(288, 'Del'),
(289, 'Del'),
(290, 'll'),
(291, 'll'),
(292, 'l'),
(293, 'l'),
(294, 'd'),
(295, 'd'),
(296, 'lene'),
(297, 'lene'),
(298, '8'),
(299, '8'),
(300, '8'),
(301, '8'),
(302, '8'),
(303, '8'),
(304, '8'),
(305, '8'),
(306, '8'),
(307, '8'),
(308, '8'),
(309, '8'),
(310, '8'),
(311, '8'),
(312, '8'),
(313, '8'),
(314, '8'),
(315, '8'),
(316, '8'),
(317, '8'),
(318, '8'),
(319, '8'),
(320, '8'),
(321, '8'),
(322, '1'),
(323, '1'),
(324, 'ss'),
(325, 's'),
(326, 's'),
(327, '88'),
(328, '88'),
(329, '88'),
(330, '88'),
(331, 'l'),
(332, 'l'),
(333, 'l'),
(334, 'l'),
(335, 'l'),
(336, 'l'),
(337, 'l'),
(338, 'l'),
(339, 'l'),
(340, 'l'),
(341, 'l'),
(342, 'l'),
(343, 'l'),
(344, 'l'),
(345, 'l'),
(346, 'l'),
(347, 'l'),
(348, 'l'),
(349, 'l'),
(350, 'l'),
(351, 'l'),
(352, 'l'),
(353, 'l'),
(354, 'l'),
(355, 'l'),
(356, 'l'),
(357, 'l'),
(358, 'l'),
(359, 'l'),
(360, 'l'),
(361, 'l'),
(362, 'l'),
(363, 'l'),
(364, '88'),
(365, '88'),
(366, '88'),
(367, '88'),
(368, '88'),
(369, '88'),
(370, '88'),
(371, '88'),
(372, '88'),
(373, '88'),
(374, '88'),
(375, '88'),
(376, 'l'),
(377, 'l'),
(378, '88'),
(379, '88'),
(380, 'l'),
(381, 'l'),
(382, 'l'),
(383, 'l'),
(384, 'l'),
(385, 'l'),
(386, 'l'),
(387, 'l'),
(388, 'l'),
(389, 'l'),
(390, 'l'),
(391, 'l'),
(392, 'l'),
(393, '88'),
(394, '88'),
(395, '88'),
(396, '88'),
(397, '88'),
(398, 'r'),
(399, 'r'),
(400, 'r'),
(401, 'r'),
(402, 'r'),
(403, 'r'),
(404, '88'),
(405, '88'),
(406, '88'),
(407, '88'),
(408, '22'),
(409, '22'),
(410, '22'),
(411, 'l'),
(412, 'l'),
(413, 'l'),
(414, 'l'),
(415, 'l'),
(416, 'l'),
(417, 'l'),
(418, 'l'),
(419, 'l'),
(420, 'l'),
(421, 'l'),
(422, 'l'),
(423, 'l'),
(424, 'l'),
(425, 'l'),
(426, 'l'),
(427, 'l'),
(428, 'l'),
(429, 'w'),
(430, 'w'),
(431, 'w'),
(432, 'w'),
(433, 'w'),
(434, 'w'),
(435, 'w'),
(436, 'w'),
(437, 'w'),
(438, 'w'),
(439, 'w'),
(440, 'w'),
(441, 'w'),
(442, 'l'),
(443, 'l'),
(444, 'l'),
(445, 'l'),
(446, 'l'),
(447, 'g'),
(448, 'g'),
(449, 'g'),
(450, 'g'),
(451, 'g'),
(452, 'g'),
(453, 'g'),
(454, 'g'),
(455, 'g'),
(456, 'g'),
(457, 'g'),
(458, 'g'),
(459, '2'),
(460, '2'),
(461, 'l'),
(462, 'l'),
(463, 'l'),
(464, 'l'),
(465, 'l'),
(466, 'l'),
(467, 'l'),
(468, 'l'),
(469, 'l'),
(470, 'l'),
(471, 'l'),
(472, 'l'),
(473, 'l'),
(474, 'l'),
(475, 'l'),
(476, 'l'),
(477, 'l'),
(478, 'l'),
(479, 'l'),
(480, 'l'),
(481, 'l'),
(482, 'l'),
(483, 'l'),
(484, 'l'),
(485, 'l'),
(486, 'l'),
(487, 'l'),
(488, 'l'),
(489, 'l'),
(490, 'l'),
(491, 'l'),
(492, 'l'),
(493, 'l'),
(494, 'l'),
(495, 'l'),
(496, '88'),
(497, '88'),
(498, '8'),
(499, '8'),
(500, '8'),
(501, '8'),
(502, '8'),
(503, '8'),
(504, '8'),
(505, '8'),
(506, '8'),
(507, '8'),
(508, 'per'),
(509, 'per'),
(510, 'l');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users_manage', 'web', '2021-09-13 00:38:57', '2021-09-13 00:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2021-09-13 00:38:57', '2021-09-13 00:38:57'),
(2, 'User', 'web', '2021-09-13 00:42:49', '2021-09-13 00:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$vvKogFj/102qCzn7O7KWUeYoeD.ggxqt9P661VU6UphRIubzAQ8dq', 'XSzzeF9Q34W8zPcttlP92gzku7zEA7OClKqNmM3coeCoSVag69d9XMrg2iU5', '2021-09-12 19:08:58', '2021-09-12 19:16:50'),
(2, 'Krishna Mishra', 'krishna@gmail.com', '$2y$10$JVamGJJg4vgUu/NLfzXJyuVk6oxm49Voxpa8cJTAvweOkv.zwLEim', NULL, '2021-09-12 19:12:22', '2021-09-12 19:12:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_informations`
--
ALTER TABLE `calendar_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee_groups`
--
ALTER TABLE `employee_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_receivers`
--
ALTER TABLE `message_receivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_tmp_receivers`
--
ALTER TABLE `message_tmp_receivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `most_searched_keywords`
--
ALTER TABLE `most_searched_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_informations`
--
ALTER TABLE `calendar_informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `employee_groups`
--
ALTER TABLE `employee_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `message_receivers`
--
ALTER TABLE `message_receivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_tmp_receivers`
--
ALTER TABLE `message_tmp_receivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `most_searched_keywords`
--
ALTER TABLE `most_searched_keywords`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
