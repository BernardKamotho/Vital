-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2026 at 07:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Vital`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthcertificat_app_form`
--

CREATE TABLE `birthcertificat_app_form` (
  `notification_no` int(11) NOT NULL,
  `cfname` varchar(100) NOT NULL,
  `cmname` varchar(100) NOT NULL,
  `csurname` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `tob` varchar(100) NOT NULL,
  `pob` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `balive` varchar(50) NOT NULL,
  `bdead` varchar(50) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `residence` varchar(100) NOT NULL,
  `capc_info` varchar(100) NOT NULL,
  `reg_ass` varchar(100) NOT NULL,
  `reg_name` varchar(100) NOT NULL,
  `applicant_idno` varchar(50) NOT NULL,
  `birthcertNo` varchar(50) NOT NULL,
  `reg_date` varchar(50) NOT NULL,
  `applicant_phone` varchar(50) NOT NULL,
  `sob` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Not Approved',
  `who_saved` varchar(50) NOT NULL,
  `applicant_confirm` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `birthcertificat_app_form`
--

INSERT INTO `birthcertificat_app_form` (`notification_no`, `cfname`, `cmname`, `csurname`, `dob`, `gender`, `tob`, `pob`, `district`, `balive`, `bdead`, `father_name`, `mother_name`, `residence`, `capc_info`, `reg_ass`, `reg_name`, `applicant_idno`, `birthcertNo`, `reg_date`, `applicant_phone`, `sob`, `status`, `who_saved`, `applicant_confirm`, `approved_by`) VALUES
(12324357, 'samuel', 'akina', 'mayo', '1998-02-14', 'Male', 'Single', 'nairobi', 'nairobi', '2', '0', 'kim', 'mary', 'ngong', 'Parent', 'nairobi', 'kamau', '12332112', '7e8bc459-0315-11eb-9e11-a8a1590ea667', '20/09/30', '0712345678', 'Alive', 'Rejected', 'juliani', 'Yes', 'ann'),
(12324358, 'lewis', 'mburu', 'kamau', '2020-10-07', 'Male', 'Single', 'nairobi', 'nairobi', '2', '0', 'kamau', 'mary', 'kasa', 'Parent', 'kasa', 'james', '12345678', '26414b23-0554-11eb-9e11-a8a1590ea667', '20/10/03', '0728465191', 'Alive', 'Approved', 'kamaa', 'Yes', 'juliani'),
(12324359, 'lewis', 'mburi', 'kamaa', '10/01/20', 'Male', 'Single', 'nairobi', 'nairobi', '2', '0', 'josiah', 'maty', 'kasa', 'Other', 'kasa', 'moses', '12345678', '', '', '07893646668', 'Born Alive', 'Approved', '', '', 'jon'),
(12324360, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Approved', '', '', 'jon'),
(12324361, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Approved', '', '', 'ben'),
(12324362, 'John', 'Kenedy', 'Johan', '2023-05-05', 'Male', 'Single', 'Westlands', 'Nairobi', '4', '0', 'Joel', 'Anita', 'Kikuyu', 'Midwife', 'Westlands', 'July', '45454545', '39aa8d31-eb52-11ed-a9c6-a8a1590ea667', '23/05/05', '0729225710', 'Alive', 'Approved', 'ben', 'Yes', 'ben');

-- --------------------------------------------------------

--
-- Table structure for table `deathcertificate_form`
--

CREATE TABLE `deathcertificate_form` (
  `deceased_idno` int(50) NOT NULL,
  `permit_number` int(50) NOT NULL,
  `defname` varchar(100) NOT NULL,
  `demname` varchar(100) NOT NULL,
  `desurname` varchar(100) NOT NULL,
  `dod` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `cause_a` varchar(100) NOT NULL,
  `cause_b` varchar(100) NOT NULL,
  `cause_c` varchar(100) NOT NULL,
  `other_conditions` varchar(100) NOT NULL,
  `next_of_kin_id` varchar(50) NOT NULL,
  `title_practioner` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `practioner_name` varchar(50) NOT NULL,
  `regs_name` varchar(50) NOT NULL,
  `date_rvd` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Not Approved',
  `user_applied` varchar(50) NOT NULL DEFAULT 'Not Applied',
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deathcertificate_form`
--

INSERT INTO `deathcertificate_form` (`deceased_idno`, `permit_number`, `defname`, `demname`, `desurname`, `dod`, `gender`, `age`, `occupation`, `street`, `town`, `hospital`, `cause_a`, `cause_b`, `cause_c`, `other_conditions`, `next_of_kin_id`, `title_practioner`, `date`, `practioner_name`, `regs_name`, `date_rvd`, `status`, `user_applied`, `approved_by`) VALUES
(67676767, 12345, 'Ken', 'Njuguna', 'Eric', '2020-09-01', 'Male', 23, 'Teacher', 'Mwiki', 'Kasarani', 'St Francis', 'Due to A', 'na', 'na', 'Due to A', '78945613', 'Sr.', '2020-09-01', 'Joan Kamau', 'Mwangi Maina', '2020-09-01', 'Approved', 'Applied', 'alexi'),
(456767676, 3000000, 'Alex', 'Ken', 'Kamau', '0000-00-00', 'Male', 23, 'Driver', 'Kawangware', 'lavington', 'Mathari', 'Due to B', 'na', 'na', 'Due to D because of A', '1000000', 'Dr', '09/17/20', 'Lilian Mumbi', 'Joan Kamau', '09/17/20', 'Approved', 'Applied', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'clerk',
  `id_number` int(100) NOT NULL,
  `ussd_pin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `id_number`, `ussd_pin`) VALUES
(31, 'admin', 'sunshine', 'modcomlearning@gmail.com', 'Admin', 88888888, '5678'),
(58, 'juliani', '987654321', 'juliani@gmail.com', 'Registrar', 987654, 'juliani.85'),
(60, 'oposh', '12345678', 'oposh@gmail.com', 'Hospital', 2147483647, 'oposh.42'),
(62, 'kamaa', '76543211', 'kamaa@gmail.com', 'Chief', 12345678, 'kamaa.76'),
(63, 'poly', '65432111', 'poly@gmail.com', 'HospitalD', 3456789, 'poly.17'),
(66, 'farah', '12345678', 'farah@gmail.com', 'Chief', 24910000, 'farah.42'),
(67, 'jon', '12345678', 'jon@gmail.com', 'Registrar', 23232323, 'jon.33'),
(68, 'tom', '12345678', 'tom@gmail.com', 'Chief', 24889988, 'tom.50'),
(69, 'john', '12345678', 'john@gmail.com', 'Chief', 25858991, 'john.50'),
(70, 'ann', '12345678', 'ann@gmail.com', 'Registrar', 56565656, 'ann.98'),
(71, 'ben', '12345678', 'stevemunga883@gmail.com', 'Registrar', 7894561, 'ben.67'),
(72, 'eric', '12345678', 'rdews@mail.com', 'Chief', 7894562, 'eric.40'),
(74, 'Rose', '12345678', 'tomtriel@gmail.com', 'User', 45454545, ''),
(79, 'Alex Wambu', 'poiloilo', 'ale@gmail.com', 'Admin', 34521, 'Alex Wambu.24'),
(80, 'cjey', 'cjey.@14', '13324@gmail.com', 'Admin', 0, 'cjey.46');

-- --------------------------------------------------------

--
-- Table structure for table `userstbl`
--

CREATE TABLE `userstbl` (
  `idnumber` varchar(50) NOT NULL,
  `pin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userstbl`
--

INSERT INTO `userstbl` (`idnumber`, `pin`) VALUES
('24917089', 4545);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthcertificat_app_form`
--
ALTER TABLE `birthcertificat_app_form`
  ADD PRIMARY KEY (`notification_no`);

--
-- Indexes for table `deathcertificate_form`
--
ALTER TABLE `deathcertificate_form`
  ADD PRIMARY KEY (`deceased_idno`),
  ADD UNIQUE KEY `permit_number` (`permit_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `ussd_pin` (`ussd_pin`);

--
-- Indexes for table `userstbl`
--
ALTER TABLE `userstbl`
  ADD PRIMARY KEY (`idnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthcertificat_app_form`
--
ALTER TABLE `birthcertificat_app_form`
  MODIFY `notification_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12324363;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
