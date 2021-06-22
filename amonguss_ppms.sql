-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2021 at 02:52 PM
-- Server version: 10.3.29-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amonguss_ppms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`) VALUES
('admin1', 'min@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `healthpatient`
--

CREATE TABLE `healthpatient` (
  `id` int(10) NOT NULL,
  `temperature` varchar(10) NOT NULL,
  `behaviour` varchar(100) NOT NULL,
  `symptom` varchar(100) NOT NULL,
  `medication` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `risklevel` varchar(100) NOT NULL,
  `userid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `healthpatient`
--

INSERT INTO `healthpatient` (`id`, `temperature`, `behaviour`, `symptom`, `medication`, `date`, `time`, `risklevel`, `userid`) VALUES
(36, '36', 'shaking', 'cough', 'Paracetamol 500mg', '2021-04-20', '21:36:00', 'Low Risk', 'PT 1003'),
(38, '36', 'shaking', 'cough', 'Paracetamol 500mg', '2021-04-20', '09:39:00', 'Low Risk', 'PT 1003'),
(39, '37.9', 'Shaking body', 'flu', 'none', '2021-04-21', '10:40:00', 'High Risk', 'PT 1003'),
(40, '36.5', 'cold', 'cough', 'Diclofenac Sodium 50mg', '2021-04-19', '21:42:00', 'Low Risk', 'PT 1001'),
(41, '39.1', 'Shaking body', 'cough', 'Paracetamol 500mg', '2021-04-20', '09:45:00', 'High Risk', 'PT 1001'),
(42, '38.5', 'cold', 'fever', 'none', '2021-04-20', '21:46:00', 'High Risk', 'PT 1001'),
(43, '36.6', 'shaking', 'No Sense', 'Paracetamol 500mg', '2021-04-19', '21:47:00', 'Low Risk', 'PT 1002'),
(44, '37.9', 'cold', 'fever', 'none', '2021-04-20', '09:48:00', 'High Risk', 'PT 1002'),
(45, '38.8', 'shaking', 'fever', 'Paracetamol 500mg', '2021-04-20', '21:48:00', 'High Risk', 'PT 1002'),
(46, '36.5', 'Shaking body', 'flu', 'none', '2021-04-19', '21:49:00', 'Low Risk', 'PT 1004'),
(47, '36', 'cold', 'None', 'none', '2021-04-20', '09:50:00', 'Low Risk', 'PT 1004'),
(48, '36.1', 'cold', 'flu', 'none', '2021-04-20', '21:50:00', 'Low Risk', 'PT 1004'),
(49, '36', 'shaking', 'No Sense', 'none', '2021-04-19', '21:52:00', 'Low Risk', 'PT 1003'),
(50, '36.9', 'cold', 'Fever', 'Paracetamol 500mg', '2021-04-19', '21:52:00', 'Low Risk', 'PT 1005'),
(51, '36.5', 'cold', 'cough', 'none', '2021-04-20', '09:53:00', 'Low Risk', 'PT 1005'),
(52, '36.0', 'cold', 'fever', 'none', '2021-04-20', '21:53:00', 'Low Risk', 'PT 1005'),
(53, '36.5', 'shaking', 'cough', 'Paracetamol 500mg', '2021-04-19', '21:56:00', 'Low Risk', 'PT 1006'),
(54, '37.9', 'shaking', 'No Sense', 'Paracetamol 500mg', '2021-04-20', '09:56:00', 'High Risk', 'PT 1006'),
(55, '37.9', 'cold', 'No Sense', 'Paracetamol 500mg', '2021-04-20', '21:57:00', 'High Risk', 'PT 1006'),
(56, '39', 'shaking', 'fever', 'Paracetamol 500mg', '2021-04-23', '10:32:00', 'High Risk', 'PT 1003'),
(57, '36', 'shaking', 'fever', 'Paracetamol 500mg', '2021-04-23', '10:16:00', 'Low Risk', 'PT 1003'),
(75, '36.5', 'Normal', 'Headache', 'Paracetamol', '2021-05-21', '23:52:00', 'Low Risk', 'PT 1003'),
(77, '38.0', 'normal', 'coughing', 'no medication', '2021-06-02', '21:22:00', 'High Risk', 'PT 1003'),
(78, '38', 'shaking', 'cold', 'vitamin c', '2021-06-15', '20:21:00', 'High Risk', 'PT 1003'),
(79, '38', 'shaking', 'fever', 'none', '2021-06-15', '20:45:00', 'High Risk', 'PT 1003'),
(80, '35.0', 'normal', 'no symptom', 'no medication', '2021-06-20', '22:03:00', 'Null', 'PT 1003');

-- --------------------------------------------------------

--
-- Table structure for table `medicalstaff`
--

CREATE TABLE `medicalstaff` (
  `userid` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `IcNo` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `medicalno` varchar(10) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicalstaff`
--

INSERT INTO `medicalstaff` (`userid`, `name`, `IcNo`, `email`, `address`, `medicalno`, `phoneno`, `password`) VALUES
('MS 1004', 'Azrin bin Mohd Azhar', '861205109913', 'azrin@gmail.com', 'No. 15 Jalan Murni, Taman Nirwana Indah, 45300 Sungai Besar, Sungai Besar', 'MS1003', '0163354972', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('MS 1002', 'Bazli Bin Muhammad', '710423026452', 'bazli@gmail.com', 'Lot A431, Jalan Sidang Salman, Kampung Baru Hutan, 08800 Gurun, Kedah', 'MS1002', '013694512', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('MS 1001', 'Siti Salmiah Binti Jamaluddin', '840318045568', 'siti@gmail.com', '20 Jln Jaya, Taman Jaya, 09400 Padang Serai Padang Serai Kedah', 'MS1001', '011234569', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `userid` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `IcNo` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `closecontact` varchar(100) NOT NULL,
  `dieseshistory` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `RegisterDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`userid`, `name`, `IcNo`, `email`, `phoneNo`, `address`, `closecontact`, `dieseshistory`, `password`, `RegisterDate`) VALUES
('PT 1001', 'Nur Hayati Binti Kassim', '861205109918', 'nur@gmail.com', '0172649128', 'Suite 12A-2-1 Menara Pan Global 8 Lorong P Ramlee 50250, Kuala Lumpur, Wilayah Persekutuan', 'daughter, sister, father', 'cancer, asthma, flu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-03-22'),
('PT 1002', 'Mariah Batrisya Binti Kamal', '710423026452', 'mariah@gmail.com', '011469872612', 'No. 3 Lrg Mahsuri 7 Bayan Baru , 1950 Bayan Lepas, Pulau Pinang', 'Mother, older sister', 'Eyes cancer', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-03-22'),
('PT 1003', 'Wan Ikmal Bin Samsul', '840318045567', 'wan@gmail.com', '0153394681', '2147 Kampung Bagus ,17200 Rantau Panjang, Kelantan ', 'Colleague', 'cancer, asthma', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-03-22'),
('PT 1004', 'Haji Lahki Bin Samad', '670318045567', 'haji@gmail.com', '0196643001', '19 Jln Tpp 5/7 Taman Industri, 47100 Puchong, Selangor', 'Older brother, Manager', 'asthma', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-03-22'),
('PT 1005', 'Muhammad Shazwan Bin Ratib', '861205109919', 'shazwan@gmail.com', '01136549246', 'No. 74 Stadium Sultan Mohd Ke Iv Jln Mahmood, 15200 Kota Bharu, Kelantan ', 'Mother in law, sister', 'high pressure', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-03-22'),
('PT 1006', 'Nur Ain Binti Ghazali', '710423026452', 'ain@gmail.com', '01366984625', 'No. 45 Kampung Kubang Sepat, 06150 Alor Setar, Kedah', 'husband, daughter, son', 'asthma, low pressure', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-03-22'),
('PT 1009', 'Nur Azwin Binti Mohd Azhar', '990513109816', 'azwin@gmail.com', '0172649121', 'No. 45 03Rd Floor Jln Susur Dewata 1, Taman Larkin Perdana, 80350 Johor', 'mother, officemate', 'asthma', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(100) NOT NULL,
  `medicalstaffid` varchar(100) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `advice` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL,
  `userid` varchar(100) NOT NULL,
  `actionupdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `medicalstaffid`, `medicine`, `advice`, `action`, `Date`, `time`, `userid`, `actionupdate`) VALUES
(39, 'MS 1001', 'Acetaminophen 500mg', '3 kali sehari selepas makan', 'null', '2021-04-19', '09:58:00', 'PT 1001', 'success'),
(40, 'MS 1001', 'paracetamol 5mg', 'Makan sebelum tidur', 'null', '2021-04-19', '09:59:00', 'PT 1002', 'success'),
(41, 'MS 1001', 'Ibuprofen 35mg', '3 kali sehari selepas makan', 'Appointment', '2021-04-20', '10:01:00', 'PT 1002', 'fail'),
(42, 'MS 1001', 'Ibuprofen 35mg', '3 kali sehari selepas makan', 'null', '2021-04-20', '10:02:00', 'PT 1003', 'None'),
(43, 'MS 1001', 'paracetamol 5mg', '3 kali sehari selepas makan', 'null', '2021-04-21', '10:03:00', 'PT 1003', 'None'),
(44, 'MS 1001', 'Acetaminophen 500mg', 'Makan sebelum tidur', 'null', '2021-04-20', '10:04:00', 'PT 1004', 'fail'),
(45, 'MS 1001', 'paracetamol 5mg', '3 kali sehari selepas makan', 'null', '2021-04-20', '10:04:00', 'PT 1005', 'fail'),
(46, 'MS 1001', 'Acetaminophen 500mg', 'Makan sebelum tidur', 'null', '2021-04-20', '22:05:00', 'PT 1005', ''),
(47, 'MS 1001', 'Ibuprofen 35mg', '3 kali sehari selepas makan', 'null', '2021-04-21', '10:05:00', 'PT 1006', ''),
(48, 'MS 1001', 'none', 'none', 'Warded', '2021-04-21', '10:06:00', 'PT 1006', 'Done'),
(49, 'MS 1001', 'paracetamol 5mg', 'Makan sebelum tidur', 'warded', '2021-04-21', '10:37:00', 'PT 1003', 'success'),
(50, '261124', 'paracetemol', 'drink more water', 'make an appointment', '2021-06-02', '21:45:00', 'PT 1001', ''),
(51, 'MS 1001', 'paracetamol 5mg', '3 kali sehari selepas makan', 'Appointment', '2021-06-15', '20:28:00', 'PT 1001', ''),
(52, 'MS 1001', 'Acetaminophen 500mg', '3 kali sehari selepas makan', 'Appointment', '2021-06-15', '20:48:00', 'PT 1001', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `healthpatient`
--
ALTER TABLE `healthpatient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicalstaff`
--
ALTER TABLE `medicalstaff`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `healthpatient`
--
ALTER TABLE `healthpatient`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
