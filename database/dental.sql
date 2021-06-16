-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 07:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_ID` int(11) NOT NULL,
  `user_ID` int(3) UNSIGNED NOT NULL,
  `treatment_ID` int(11) DEFAULT 1,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `deposit` int(11) NOT NULL DEFAULT 1,
  `receipt_number` varchar(50) DEFAULT NULL,
  `receipt_url` varchar(50) DEFAULT NULL,
  `deposit_amount` float(10,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_ID`, `user_ID`, `treatment_ID`, `date`, `time`, `deposit`, `receipt_number`, `receipt_url`, `deposit_amount`, `status`) VALUES
(150, 35, 1, '2021-06-01', '9.00am-10.00am', 2, 'h8wal4pj', 'https://dev.toyyibpay.com/h8wal4pj', 50.00, 2),
(151, 42, 2, '2021-06-02', '10.00am-11.00am', 2, 'xbn6czed', 'https://dev.toyyibpay.com/xbn6czed', 50.00, 3),
(153, 44, 6, '2021-05-21', '3.00pm-4.00pm', 2, NULL, NULL, 0.00, 3),
(155, 35, 3, '2021-05-30', '9.00am-10.00am', 2, NULL, NULL, 0.00, 3),
(156, 48, 4, '2021-06-03', '10.00am-11.00am', 2, 'd0brggz8', 'https://dev.toyyibpay.com/d0brggz8', 50.00, 3),
(157, 42, 8, '2021-05-19', '11.00am-12.00pm', 2, 'quy2v1r9', 'https://dev.toyyibpay.com/quy2v1r9', 50.00, 3),
(158, 36, 3, '2021-06-01', '10.00am-11.00am', 2, 'kyhjqgpr', 'https://dev.toyyibpay.com/kyhjqgpr', 50.00, 3),
(160, 40, 4, '2021-06-04', '3.00pm-4.00pm', 2, 'iedc3212', 'https://dev.toyyibpay.com/iedc3212', 50.00, 3),
(161, 41, 5, '2021-06-02', '2.00pm-3.00pm', 2, 't0kfn62d', 'https://dev.toyyibpay.com/t0kfn62d', 50.00, 3),
(162, 46, 3, '2021-06-22', '3.00pm-4.00pm', 2, NULL, NULL, 0.00, 2),
(163, 45, 4, '2021-06-18', '9.00am-10.00am', 2, NULL, NULL, 0.00, 2),
(164, 49, 1, '2021-06-17', '2.00pm-3.00pm', 2, 'qdaq6p61', 'https://dev.toyyibpay.com/qdaq6p61', 50.00, 2),
(165, 48, 6, '2021-06-17', '12.00pm-1.00pm', 2, 'm2dk5g2r', 'https://dev.toyyibpay.com/m2dk5g2r', 50.00, 2),
(166, 42, 6, '2021-06-23', '11.00am-12.00pm', 2, 'ucocgj4y', 'https://dev.toyyibpay.com/ucocgj4y', 50.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_ID` int(11) NOT NULL,
  `app_ID` int(11) NOT NULL,
  `dr_name` varchar(100) NOT NULL,
  `medicine` text NOT NULL,
  `deposit_amount` float(10,2) NOT NULL DEFAULT 50.00,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_ID`, `app_ID`, `dr_name`, `medicine`, `deposit_amount`, `price`, `created_at`) VALUES
(9, 155, 'Muhammad Hariz bin Rusli', '[{\"name\":\"consultation\",\"quantity\":\"2\",\"price\":\"12\"},{\"name\":\"antibiotik\",\"quantity\":\"1\",\"price\":\"2\"}]', 50.00, 626, '2021-06-16 01:03:49'),
(10, 153, 'Manisah binti Abdul Samah ', '[{\"name\":\"consultation\",\"quantity\":\"1\",\"price\":\"25\"},{\"name\":\"x-ray\",\"quantity\":\"2\",\"price\":\"30\"},{\"name\":\"antibiotic\",\"quantity\":\"2\",\"price\":\"12\"},{\"name\":\"paracetamol\",\"quantity\":\"2\",\"price\":\"10\"}]', 50.00, 279, '2021-05-30 01:54:30'),
(12, 151, 'Siti Fatimah binti Khairudin', '[{\"name\":\"consultation\",\"quantity\":\"1\",\"price\":\"25\"},{\"name\":\"other\",\"quantity\":\"1\",\"price\":\"30\"},{\"name\":\"antibiotic\",\"quantity\":\"2\",\"price\":\"15\"},{\"name\":\"paracetamol\",\"quantity\":\"2\",\"price\":\"18\"},{\"name\":\"other\",\"quantity\":\"1\",\"price\":\"20\"}]', 50.00, 791, '2021-06-16 03:13:56'),
(13, 157, 'Manisah binti Abdul Samah ', '[{\"name\":\"consultation\",\"quantity\":\"1\",\"price\":\"25\"},{\"name\":\"x-ray\",\"quantity\":\"1\",\"price\":\"50\"},{\"name\":\"antibiotic\",\"quantity\":\"1\",\"price\":\"12\"}]', 50.00, 1537, '2021-05-25 03:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `dentist_ID` int(11) NOT NULL,
  `dr_name` varchar(50) NOT NULL,
  `IC` varchar(20) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dentist`
--

INSERT INTO `dentist` (`dentist_ID`, `dr_name`, `IC`, `phoneNo`, `email`, `address`) VALUES
(1, 'Manisah binti Abdul Samah ', '920201045622', '0128371920', 'manisah@gmail.com', 'Ayer Keroh, Melaka'),
(2, 'Siti Fatimah binti Khairudin', '900612075056', '01114356837', 'fatimah@gmail.com', 'Durian Tunggal, Melaka'),
(3, 'Fairoz bin Hisham', '920313055093', '01124837192', 'fairoz@gmail.com', 'Merlimau, Melaka'),
(4, 'Muhammad Hariz bin Rusli', '910610075023', '0167281002', 'hariz@gmail.com', 'Ayer Keroh, Melaka');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `user_ID` int(3) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `IC` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `DOB` date DEFAULT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`user_ID`, `username`, `password`, `fullname`, `IC`, `gender`, `DOB`, `phoneNo`, `email`, `address`) VALUES
(35, 'farhan', '$2y$10$VyFzmnyuzm.K4tPYdpGoh.wSHpyoMu2OZTxBY4gB/.bvaqf7fQOdG', 'Muhammad Farhan Bin Ishak', '860102015033', 'male', '1986-01-02', '0132341287', 'farhan32@yahoo.com', 'Seremban, Negeri Sembilan'),
(36, 'hairul', '$2y$10$i3anHpp9v/CDO2ciV2JdV.KjMwAWcD9fb8lKIMxFL5T3tGc/NDLrK', 'Muhd Hairul Bin Ibrahim', '980505055063', 'male', '1998-05-05', '0162361527', 'hairul@gmail.com', 'Perak'),
(40, 'amirah', '$2y$10$dIs8bUSZcySOZ6wEH5AQIuDpgSeKWr3.GWVBrTLi8RlC59vnEZKiy', 'nurul amirah binti hassan', '970701055002', 'female', '1999-11-09', '0198234817', 'amirah@gmail.com', 'melaka'),
(41, 'hanee', '$2y$10$XWtazbEymVjdbUYh6zIh9eSoGjLRZOcTC3V6NSgg7NZyBCT0fqaiu', 'nur hanee binti zainudin', '970601055032', 'female', '1997-10-02', '0176251782', 'hanee41@yahoo.com', 'selangor'),
(42, 'maisarah', '$2y$10$.yKrE/4g4G4HIVvdYqKT3.cmsKILOPb4b0o2xssFWDzoGEfgifGum', 'siti maisarah binti sulaiman', '970605055983', 'female', '1997-11-10', '01926718273', 'maisarah@gmail.com', ' No.5, Jalan Mutiara, Taman Mutiara,, Balai Panjang 75250 Melaka, Melaka, 75250 Melaka'),
(43, 'azzan', '$2y$10$6Oyeve/XIborQig4/gJ/HurbJAiuVZy8YgpaX0TkhJCaDp.HAOAEO', 'azzan adlina binti muhd razali', '980506025032', 'female', '1998-03-06', '0178624152', 'azzan@gmail.com', 'melaka'),
(44, 'hana', '$2y$10$UbDmckRv8PZDuQ/i.jJ4qeyMigwJR8xgaRfXKsC7Yy3fSLhHNwq2S', 'Hannah Delisha', '931203055002', 'female', '1993-12-03', '0176532819', 'hana@gmail.com', 'pahang'),
(45, 'intan', '$2y$10$JC59SthNC4ViTZjt9SkoLOODou68SnKescoao0xBzGp96TH6KDpay', 'nur intan syafinaz binti bazli', '970514045032', 'female', '1997-05-14', '0123456726', 'intan@gmail.com', 'LOT 148,. JALAN HAJI SUPI,. KG SALAK TINGGI. 43900 SEPANG. SELANGOR'),
(46, 'syahid', '$2y$10$tkmyOpnYiIumkNosEGTkuu9EHWfTVsCY6PWfEGfGxiCvrHOxMshve', 'Muhd Syahid Bin Nazri', '960606055060', 'male', '1996-12-24', '0172516279', 'syahid32@gmail.com', 'No 208, Blok 1, Jalan 1/9 Seksyen 1 43650 Bandar Baru Bangi, Selangor'),
(48, 'aishah', '$2y$10$/sIXlWXJGFfS7..3j1pFHuLWLBBaUe86VA0rT2O9UghHvM1Al7Lmy', 'Nurul Aishah Binti Rosli', '970701055002', 'female', '1997-07-01', '0105758045', 'aishahrosli61@gmail.com', 'No.468, Felda Palong 2, Gemas, N. Sembilan'),
(49, 'husna', '$2y$10$FfSHwLUlm6yZkwQ.7qrC7.BVCePqz3.hLs8nLEgygMUAbReNL3Zpa', 'Husna Maisarah Binti Samad', '900612075056', 'Female', '1990-06-12', '0172819201', 'husna@gmail.com', 'Kuantan, Pahang '),
(67, 'aina', '$2y$10$O0f1gaNsN.A5cKmnUBlzc.XFYxax7rPYZCrQtCMbUxgTK25ho2os2', 'Nurul Aina Alisya Binti Umar', '000119045054', '', '2000-01-19', '0198271820', 'aina@gmail.com', 'Durian Tunggal, Melaka');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `username`, `password`) VALUES
(1, 'staff', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treatment_ID` int(11) UNSIGNED NOT NULL,
  `treatment_name` varchar(100) NOT NULL,
  `fees` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treatment_ID`, `treatment_name`, `fees`) VALUES
(1, 'crown and bridge              ', 800),
(2, 'denture   ', 700),
(3, 'extraction ', 200),
(4, 'filling ', 150),
(5, 'orthodontics ', 5000),
(6, 'scalling ', 200),
(8, 'veneer ', 1500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_ID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_ID`),
  ADD UNIQUE KEY `bill_ID` (`bill_ID`),
  ADD KEY `app_ID` (`app_ID`);

--
-- Indexes for table `dentist`
--
ALTER TABLE `dentist`
  ADD PRIMARY KEY (`dentist_ID`),
  ADD KEY `dr_name` (`dr_name`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatment_name`),
  ADD KEY `treatment_ID` (`treatment_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dentist`
--
ALTER TABLE `dentist`
  MODIFY `dentist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `user_ID` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treatment_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `appID_fk` FOREIGN KEY (`app_ID`) REFERENCES `appointment` (`app_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
