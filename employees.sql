-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 09:44 AM
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
(3, '10', 'mannequin', 'Lene', '', '', '', '80808080', '80808080', '8492 South Tallwood Dr. San Jose, CA 95112', '', '', '', 'contact@n2rtechnologies.com', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(4, '11', 'comforter', 'Ginger', 'Stein', 'Plant', '', '3853169889', '3853169889', '9704 Front Ave. Westminster, CA 92683', '', '', '', 'mohddanishking@gmail.com', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(5, '12', 'xsdwsd', 'Rahul', 'Commishun', 'Phineum', '', '3857577865', '3857577865', '8567 Taylor Drive San Jose, CA 95127', '', '', '', 'danish@n2rtechnologies.com', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 3, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(6, '13', 'zxsd', 'Avinash', '', 'Kumar', '', '3857021561', '3857021561', '24 Canal Ave. Vallejo, CA 94591', '', '', '', 'nurulhasan129@gmail.com', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(7, '14', 'dsgr', 'Sohrab', '', 'Khan', '', '3853258499', '3853258499', '466 Cooper Dr. North Hollywood, CA 91605', '', '', '', 'mdanish@n2rtechnologies.in', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(8, '15', 'rgfgr', 'Mohd', '', 'Danish', '', '3852223887', '3852223887', '50 Hill St. Pico Rivera, CA 90660', '', '', '', 'kavinash@n2rtechnologies.in', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 5, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(9, '16', 'dummies', 'Roy', 'Cheef', 'L.', '', '3852037636', '3852037636', 'Pico Rivera, CA 90660 ', '', '', '', 'pakaste@me.com', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 6, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(10, '17', 'form', 'Pat', '', 'Thettick', '', '3857801851', '3857801851', 'Sylmar, CA 91342 ', '', '', '', 'johndo@sbcglobal.net', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(11, '18', 'Quaker', 'Percy', 'Toffis', 'Kewshun', '', '3857092390', '3857092390', 'Fountain Valley, CA 92708 ', '', '', '', 'sscorpio@att.net', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 8, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(12, '19', 'bridge', 'Rod', '', 'Knee', '', '3858199607', '3858199607', '231 Magnolia St. Oxnard, CA 93033', '', '', '', 'kenja@aol.com', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(13, '20', 'Aunt', 'Hank', '', 'R.', '', '3852569761', '3852569761', '62 Rockville Drive Los Angeles, CA 90026', '', '', '', 'squirrel@yahoo.com', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(14, '21', 'dum?dum', 'Bridget', '', 'Theriveaquai', '', '3850411909', '3850411909', '9394 Henry Smith Ave. Oakland, CA 94601', '', '', '', 'kingma@outlook.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(15, '22', 'chowderhead', 'Pat', 'Awl', 'N.', '', '3853772740', '3853772740', 'Oakland, CA 94601 ', '', '', '', 'madanm@mac.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(16, '23', 'phantom', 'Karen', '', 'Onnabit', '', '3859491840', '3859491840', 'Suite 47 Azusa, CA 91702', '', '', '', 'krueger@att.net', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(17, '24', 'soother', 'Col', '', 'Fays', '', '3855462168', '3855462168', '7078 Pierce Rd. Antioch, CA 94509', '', '', '', 'munson@verizon.net', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 3, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(18, '25', 'thumbnail', 'Fay', '', 'Daway', '', '3859151978', '3859151978', 'Antioch, CA 94509 ', '', '', '', 'bcevc@outlook.com', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(19, '26', 'binky', 'Joe', '', 'V.', '', '3857494953', '3857494953', 'San Pablo, CA 94806 ', '', '', '', 'hampton@me.com', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(20, '27', 'dottle', 'Wes', 'Convenshun', 'Yabinlatelee', '', '3859184796', '3859184796', 'Victorville, CA 92392 95 S. Thompson St.', '', '', '', 'maikelnai@icloud.com', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 5, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(21, '28', 'dumbbell', 'Colin', '', 'Sik', '', '3853791960', '3853791960', '95 S. Thompson St. ', '', '', '', 'dcoppit@outlook.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 6, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(22, '29', 'mannikin', 'Greg', '', 'Arias', '', '3854303149', '3854303149', '7956 Kirkland Street ', '', '', '', 'agolomsh@live.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(23, '30', 'declarer', 'Toi', '', 'Story', '', '3850670812', '3850670812', '378 Talbot Ave. ', '', '', '', 'cliffordj@yahoo.ca', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 8, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(24, '31', 'manikin', 'Gene', 'Cry', 'Eva', '', '3854727974', '3854727974', 'Canyon Country, CA 91351 68 West Orange Drive', '', '', '', 'smallpaul@optonline.net', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(25, '32', 'manakin', 'Jen', '', 'Tile', '', '3854758839', '3854758839', 'San Francisco, CA 94112 ', '', '', '', 'eidac@msn.com', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(26, '33', 'mort', 'Simon', '', 'Sais', '', '3853997996', '3853997996', 'Van Nuys, CA 91405 ', '', '', '', 'shrapnull@aol.com', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(27, '34', 'towie', 'Peter', '', 'Owt', '', '3858101328', '3858101328', '7040 Fawn Dr. Anaheim, CA 92805', '', '', '', 'roamer@att.net', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(28, '35', 'table', 'Hugh', '', 'N.', '', '3855790155', '3855790155', '8470 Rockland Street Sunnyvale, CA 94086', '', '', '', 'simone@me.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(29, '36', 'hare', 'Lee', 'Undawair', 'Nonmi', '', '3857518459', '3857518459', '45 Lincoln Rd. ', '', '', '', 'thurston@hotmail.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 3, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(30, '37', 'feint', 'Lynne', '', 'Gwafranca', '', '3855436924', '3855436924', 'Vista, CA 92083 15 School Ave.', '', '', '', 'tubajon@sbcglobal.net', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(31, '38', 'dumb', 'Art', '', 'Decco', '', '3854352248', '3854352248', 'Ontario, CA 91762 766 Wild Rose Street', '', '', '', 'camenisch@mac.com', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(32, '39', 'doll', 'Lynne', '', 'Gwistic', '', '3852951485', '3852951485', 'Fremont, CA 94538 9099 S. Arnold St.', '', '', '', 'dvdotnet@optonline.net', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 5, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(33, '40', 'hand', 'Polly', '', 'Ester', '', '3857416424', '3857416424', '9099 S. Arnold St. Watsonville, CA 95076', '', '', '', 'phizntrg@yahoo.ca', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 6, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(34, '41', 'Charlie', 'Oscar', '', 'Nommanee', '', '3850154523', '3850154523', '358 South Clinton Drive Huntington Park, CA 90255', '', '', '', 'suresh@live.com', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(35, '42', 'crossruff', 'Laura', 'Kwayted', 'Biding', '', '3855971732', '3855971732', '207 Pineknoll Lane Cupertino, CA 95014', '', '', '', 'hstiles@me.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 8, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(36, '43', 'Chase', 'Laura', 'Thabalanz', 'Norda', '', '3852223887', '3852223887', 'Cupertino, CA 95014 ', '', '', '', 'andale@msn.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(37, '44', 'display', 'Des', '', 'Ignayshun', '', '3852037636', '3852037636', 'Wilmington, CA 90744 41 State St.', '', '', '', 'inico@me.com', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(38, '45', 'giant', 'Mike', '', 'Rowe-Soft', '', '3857801851', '3857801851', 'Lompoc, CA 93436 651 Marlborough St.', '', '', '', 'ahuillet@comcast.net', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(39, '46', 'overlay', 'Anne', '', 'T.', '', '3857092390', '3857092390', '651 Marlborough St. ', '', '', '', 'flakeg@icloud.com', '', 'Web Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(40, '47', 'layout', 'Wayde', '', 'N.', '', '3858199607', '3858199607', '247 Blackburn Drive ', '', '', '', 'sakusha@mac.com', '', 'SEO', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 2, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(41, '48', 'carousel', 'Dee', '', 'Mandingboss', '', '3852569761', '3852569761', '367 Sunset Dr. Los Angeles, CA 90022', '', '', '', 'plover@live.com', '', 'HR', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 3, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(42, '49', 'greyhound', 'Sly', '', 'Meedentalfloss', '', '3850411909', '3850411909', 'Los Angeles, CA 90022 ', '', '', '', 'louise@mac.com', '', 'PHP Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 4, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(43, '50', 'knucklehead', 'Stanley', '', 'Knife', '', '3853772740', '3853772740', 'Compton, CA 90221 ', '', '', '', 'jshirley@outlook.com', '', 'Laravel Developer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 1, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(44, '51', 'putz', 'Wynn', '', 'Dozeaplikayshun', '', '3859491840', '3859491840', 'Baldwin Park, CA 91706 ', '', '', '', 'squirrel@live.com', '', 'Freelancer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 5, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(45, '52', 'entry', 'Mal', '', 'Ajusted', '', '3855462168', '3855462168', '555 Columbia Ave. Los Angeles, CA 90001', '', '', '', 'zyghom@hotmail.com', '', 'Grafisk designer', '•Investering •Finansiering •Strategi •Ledelse •Udviklingsprojekt', '', '', '', '', 6, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10'),
(46, '123456', 'krishna', 'Krishna', 'Kumar', 'Mishra', '9026574061', '9026574061', '9026574061', 'Krishna Mishra Address', '225003', 'Lucknow', 'krishna@gmail.com', 'er.krishna.mishra@gmail.com', '', 'HR', 'Test Employee', '', '', '', '', 0, 'enabled', '2022-01-10 09:40:10', '2022-01-10 09:40:10', 'no', '2022-01-10 09:40:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
