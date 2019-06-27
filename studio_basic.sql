-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2019 at 06:04 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ankushgo_studio_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `homeslider`
--

CREATE TABLE `homeslider` (
  `SliderID` int(11) NOT NULL,
  `SliderImage` varchar(500) DEFAULT NULL,
  `SliderTitle` varchar(400) DEFAULT NULL,
  `ActiveFl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeslider`
--

INSERT INTO `homeslider` (`SliderID`, `SliderImage`, `SliderTitle`, `ActiveFl`) VALUES
(1, 'slider-bg1.jpg', 'Welcome to Studio Basics', 1),
(2, 'slider-bg2.jpg', 'Design World with us', 1),
(3, 'slider-bg3.jpg', 'Architects & Designers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ProjectID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `ProjectTitle` varchar(100) DEFAULT NULL,
  `ProjectDescription` text,
  `LocationID` int(11) DEFAULT NULL,
  `ProjectMapLocation` varchar(1000) DEFAULT NULL,
  `ActiveFl` int(11) DEFAULT NULL,
  `Appointment` varchar(100) DEFAULT NULL,
  `Area` varchar(100) DEFAULT NULL,
  `ClientName` varchar(100) DEFAULT NULL,
  `Engineer` varchar(100) DEFAULT NULL,
  `Completion` varchar(100) DEFAULT NULL,
  `Capacity` varchar(100) DEFAULT NULL,
  `QuantitySurveyor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectID`, `CategoryID`, `ProjectTitle`, `ProjectDescription`, `LocationID`, `ProjectMapLocation`, `ActiveFl`, `Appointment`, `Area`, `ClientName`, `Engineer`, `Completion`, `Capacity`, `QuantitySurveyor`) VALUES
(1, 1, '1A, 75, NIT Faridabad', 'TRUE FACADE HOUSE\r\n\r\nMaterial Truthfulness\r\nThis residence was proposed on a plot of 350sq yds in Faridabad. \r\nThe story that its facade tells is about the reality of material which is been kept in exosed finishes. \r\nWood and Concrete is amalgamated  in a manner to give the elevation a simle,\r\nsubtle and elegant look.\r\n\r\nSpace frame is used over the projected terrace to enhance the mordernist nature of the structure.', 1, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(2, 1, '46, Lotus Enclave, Pitampura', 'INTRUDED FACADE\r\n\r\nThe brief demands a house with variety of family spaces  and a great \r\nfacade with material like wood and stone. \r\n\r\n\r\nWe provided the besoke results by using wood  greystone  and beige finishes for facade with warm interiors. \r\n\r\nThe top floor of the house is dedicated to a multipurpose  space comprises of a \r\nsmall library, pool table, study , bay window sitting, home theatre and lavish sitting areas.\r\n\r\nSuch that this space could be used by the son for hosting small gatherings between his young fellows.', 2, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(3, 1, '312, Phase 1, Vivek vihar', 'Vivek Vihar (interior design)\r\n\r\nthe apartment is of quite small size of 1100 sqft consisting of 3 bedrooms of comparatively small sizes.\r\nThe challenge was to provide the necessary convinience to all the individuals in their rooms respectively.\r\nEvery corney of the house is considered as a utility space to fulfill all requirements of the clients.', 3, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(4, 1, '1069, Sector 15, Faridabad', 'MASS AND VOID\r\n\r\n\r\nThe residence exists in a posh colony of faridabad and was designed to bring out a result that was clean , minimalistic, well ventilated and open.\r\n\r\nWe decided to place a courtyard within  the house that brings in the light and air, and takes out all the negetivity out of the house,\r\n as believed by the Vastu Shastra. \r\nA play of masses and voids can be seen which brings out terraces at different levels.', 1, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(5, 1, 'Competition Badkhal lake, public park', 'CURING THE DEAD LAKE\r\n\r\nBadhkal, used to be a beautiful, man-made lake created in 1912.\r\n \r\nSurrounded by low hills and pristine nature.\r\nDue to total drying up of the water caused\r\n by man-made environmental \r\ngoofups such as wanton mining leading to blockage of water and\r\n the \r\ncommercial usage of the water, the lake turned into a grassy barren\r\n plain.\r\nAs the term Re-evolution states, \r\nthe artificial lake which was once a \r\nfresh water lake and later on depleted, will be evolved to its original \r\nform.', 4, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(6, 1, 'DC-99, Avantika, Ghaziabad', '\r\nURBAN HOME\r\n\r\nThe residence consists of three identical floors with a common cutout.\r\n\r\nElevation is enhanced with a mild steel jaali  and a continous I-Section beam going vertically\r\nfrom bottom to top and then get converted into a pargola on terrace.\r\n\r\n\r\n\r\nInterior is styled in contemorary setting with all the needs and requirements of an upper middle class family.', 5, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(7, 1, 'Eggmaniac Karkardooma Complex', 'Eggmaniac Karkardooma Complex', 6, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(8, 1, 'Housing Hindon Airport', 'Housing Hindon Airport', 7, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(9, 1, 'Housing In Combodia', 'Housing In Combodia', 8, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(10, 1, 'Jain Marble Home, Sahibabad', 'Jain Marble home is envisaged as a world class modern piece of \r\narchitecture to present a vast variety of stones and tiles at one stop.', 9, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(11, 1, 'Residence @ sec-13, Vasundhara, Ghaziabad', 'Residence @ sec-13, Vasundhara, Ghaziabad', 5, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(12, 1, 'Residence @ Swarnjayanti Puram', 'Residence @ Swarnjayanti Puram', 10, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(13, 1, 'Shop cum Office @ Gandhi Nagar, Delhi', 'Shop cum Office @ Gandhi Nagar, Delhi', 11, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE'),
(14, 1, 'Smart Housing (Conceptual)', 'Smart Housing (Conceptual)', 12, 'google map full location here', 1, 'Appointment', 'Area', 'ClientName', 'Engineer', '2018', '18 ton', 'APPLE');

-- --------------------------------------------------------

--
-- Table structure for table `projectaward`
--

CREATE TABLE `projectaward` (
  `AwardID` int(11) NOT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `AwardName` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projectaward`
--

INSERT INTO `projectaward` (`AwardID`, `ProjectID`, `AwardName`) VALUES
(1, 1, '1st Ranking '),
(2, 2, '1st Ranking '),
(3, 3, '2nd Ranking '),
(4, 4, '3rd Ranking '),
(5, 5, '1st Ranking '),
(6, 6, '2nd Ranking '),
(7, 7, '3rd Ranking '),
(8, 8, '1st Ranking '),
(9, 9, '2nd Ranking '),
(10, 10, '3rd Ranking '),
(11, 11, '1st Ranking '),
(12, 12, '2nd Ranking '),
(13, 13, '3rd Ranking '),
(14, 14, '1st Ranking ');

-- --------------------------------------------------------

--
-- Table structure for table `projectcategory`
--

CREATE TABLE `projectcategory` (
  `CategoryID` int(11) NOT NULL,
  `CatergoryName` varchar(100) DEFAULT NULL,
  `ActiveFl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projectcategory`
--

INSERT INTO `projectcategory` (`CategoryID`, `CatergoryName`, `ActiveFl`) VALUES
(1, 'Project', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projectgallery`
--

CREATE TABLE `projectgallery` (
  `GalleryID` int(11) NOT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `FilePath` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projectgallery`
--

INSERT INTO `projectgallery` (`GalleryID`, `ProjectID`, `FilePath`) VALUES
(1, 1, 'f1.jpg'),
(27, 2, 'p1.jpg'),
(28, 2, 'p2.jpg'),
(29, 2, 'p3.jpg'),
(30, 2, 'p4.jpg'),
(31, 2, 'p5.jpg'),
(32, 3, 'V1.bmp'),
(33, 3, 'v2.bmp'),
(34, 3, 'V3.bmp'),
(35, 3, 'V4.bmp'),
(36, 3, 'v5.bmp'),
(37, 4, 'f21.jpg'),
(38, 4, 'f22.jpg'),
(39, 5, 'c1.jpg'),
(40, 5, 'c2.jpg'),
(41, 5, 'c3.jpg'),
(42, 5, 'c4.jpg'),
(43, 5, 'c5.jpg'),
(44, 6, 'd1.jpg'),
(45, 6, 'd2.jpg'),
(46, 6, 'd3.jpg'),
(47, 6, 'd4.jpg'),
(48, 6, 'd5.jpg'),
(49, 6, 'd6.jpg'),
(50, 6, 'd7.jpg'),
(51, 7, 'e1.jpg'),
(52, 7, 'e2.jpg'),
(53, 7, 'e3.jpg'),
(54, 7, 'e4.jpg'),
(55, 7, 'e5.jpg'),
(56, 7, 'e6.jpg'),
(57, 7, 'e7.jpg'),
(58, 8, 'H1.bmp'),
(59, 8, 'H2.jpg'),
(60, 8, 'H3.bmp'),
(61, 8, 'H4.bmp'),
(62, 9, 'hc1.jpg'),
(63, 9, 'hc2.jpg'),
(64, 9, 'hc3.jpg'),
(65, 9, 'hc4.jpg'),
(66, 9, 'hc5.jpg'),
(67, 9, 'hc6.jpg'),
(68, 9, 'hc7.jpg'),
(69, 9, 'hc8.jpg'),
(70, 9, 'hc9.jpg'),
(71, 9, 'hc10.jpg'),
(72, 10, 'j1.bmp'),
(73, 10, 'j2.bmp'),
(74, 10, 'j3.bmp'),
(75, 10, 'j4.bmp'),
(76, 10, 'j5.bmp'),
(77, 11, 'r1.jpg'),
(78, 11, 'r2.jpg'),
(79, 11, 'r3.jpg'),
(80, 11, 'r4.jpg'),
(81, 11, 'r5.jpg'),
(82, 12, 's1.bmp'),
(83, 12, 's2.jpg'),
(84, 12, 's3.jpg'),
(85, 12, 's4.jpeg'),
(86, 13, 'g1.JPG'),
(87, 13, 'g2.JPG'),
(88, 13, 'g3.JPG'),
(89, 13, 'g4.JPG'),
(90, 13, 'g5.JPG'),
(91, 13, 'g6.JPG'),
(92, 13, 'g7.JPG'),
(93, 13, 'g8.JPG'),
(94, 13, 'g9.JPG'),
(95, 13, 'g10.JPG'),
(96, 14, 'sh1.png'),
(97, 14, 'sh2.png'),
(98, 14, 'sh3.png'),
(99, 14, 'sh4.png'),
(100, 14, 'sh5.jpg'),
(101, 14, 'sh6.jpg'),
(102, 14, 'sh7.jpg'),
(103, 14, 'sh8.JPG'),
(104, 14, 'sh9.JPG'),
(105, 14, 'sh10.png'),
(106, 14, 'sh11.png'),
(107, 14, 'sh12.png'),
(108, 14, 'sh13.png'),
(109, 14, 'sh14.png'),
(110, 14, 'sh15.png'),
(111, 14, 'sh16.png'),
(112, 14, 'sh17.JPG'),
(113, 14, 'sh18.png');

-- --------------------------------------------------------

--
-- Table structure for table `projectlocation`
--

CREATE TABLE `projectlocation` (
  `LocationID` int(11) NOT NULL,
  `LocationTitle` varchar(100) DEFAULT NULL,
  `ActiveFl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projectlocation`
--

INSERT INTO `projectlocation` (`LocationID`, `LocationTitle`, `ActiveFl`) VALUES
(1, 'Faridabad', 1),
(2, 'Pitampura', 1),
(3, 'Vivek vihar', 1),
(4, ' Badkhal lake, public park', 1),
(5, 'Ghaziabad', 1),
(6, 'Eggmaniac Karkardooma Complex', 1),
(7, 'Housing Hindon Airport', 1),
(8, 'Housing In Combodia', 1),
(9, 'Sahibabad', 1),
(10, 'Swarnjayanti Puram', 1),
(11, 'Gandhi Nagar, Delhi', 1),
(12, 'Smart Housing (Conceptual)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projectteam`
--

CREATE TABLE `projectteam` (
  `TeamID` int(11) NOT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `TeamName` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projectteam`
--

INSERT INTO `projectteam` (`TeamID`, `ProjectID`, `TeamName`) VALUES
(1, 1, 'Team 1'),
(2, 2, 'Team 1'),
(3, 3, 'Team 1'),
(4, 4, 'Team 1'),
(5, 5, 'Team 1'),
(6, 6, 'Team 1'),
(7, 7, 'Team 1'),
(8, 8, 'Team 1'),
(9, 9, 'Team 1'),
(10, 10, 'Team 1'),
(11, 11, 'Team 1'),
(12, 12, 'Team 1'),
(13, 13, 'Team 1'),
(14, 14, 'Team 1'),
(37, 12, 'Team 2'),
(38, 13, 'Team 2'),
(39, 14, 'Team 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homeslider`
--
ALTER TABLE `homeslider`
  ADD PRIMARY KEY (`SliderID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectID`);

--
-- Indexes for table `projectaward`
--
ALTER TABLE `projectaward`
  ADD PRIMARY KEY (`AwardID`);

--
-- Indexes for table `projectcategory`
--
ALTER TABLE `projectcategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `projectgallery`
--
ALTER TABLE `projectgallery`
  ADD PRIMARY KEY (`GalleryID`);

--
-- Indexes for table `projectlocation`
--
ALTER TABLE `projectlocation`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `projectteam`
--
ALTER TABLE `projectteam`
  ADD PRIMARY KEY (`TeamID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homeslider`
--
ALTER TABLE `homeslider`
  MODIFY `SliderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `projectaward`
--
ALTER TABLE `projectaward`
  MODIFY `AwardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `projectcategory`
--
ALTER TABLE `projectcategory`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projectgallery`
--
ALTER TABLE `projectgallery`
  MODIFY `GalleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `projectlocation`
--
ALTER TABLE `projectlocation`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projectteam`
--
ALTER TABLE `projectteam`
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
