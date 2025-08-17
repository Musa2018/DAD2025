-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2025 at 01:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dad`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_types`
--

CREATE TABLE `area_types` (
  `area_types_id` int(11) NOT NULL,
  `area_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `area_types`
--

INSERT INTO `area_types` (`area_types_id`, `area_type`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(150) NOT NULL,
  `categories_nameAr` varchar(150) NOT NULL,
  `categories_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `damages`
--

CREATE TABLE `damages` (
  `damages_id` int(11) NOT NULL,
  `farms_id` int(11) NOT NULL,
  `damages_damageDate` date NOT NULL,
  `damages_documentationDate` date NOT NULL,
  `damages_description` text NOT NULL,
  `damage_cause_id` int(11) NOT NULL,
  `damages_isImplement` int(11) NOT NULL,
  `damages_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `damage_cause`
--

CREATE TABLE `damage_cause` (
  `damage_cause_id` int(11) NOT NULL,
  `damage_cause_name` varchar(50) NOT NULL,
  `damage_cause_nameAr` varchar(50) NOT NULL,
  `damage_cause_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `damage_types`
--

CREATE TABLE `damage_types` (
  `damage_types_id` int(11) NOT NULL,
  `damage_types_name` varchar(50) NOT NULL,
  `damage_types_nameAr` varchar(50) NOT NULL,
  `damage_types_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `documents_id` int(11) NOT NULL,
  `documents_name` varchar(150) NOT NULL,
  `documents_types_id` int(11) NOT NULL,
  `damages_id` int(11) NOT NULL,
  `documents_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents_types`
--

CREATE TABLE `documents_types` (
  `documents_types_id` int(11) NOT NULL,
  `documents_type` varchar(150) NOT NULL,
  `documents_typeAr` varchar(150) NOT NULL,
  `documents_types_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donors_id` int(11) NOT NULL,
  `donors_name` varchar(150) NOT NULL,
  `donors_nameAr` varchar(150) NOT NULL,
  `donors_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmers_id` int(11) NOT NULL,
  `farmers_name` varchar(150) NOT NULL,
  `farmers_birthdate` date NOT NULL,
  `farmers_phone` varchar(15) NOT NULL,
  `farmers_identity` varchar(10) NOT NULL,
  `farmers_address` text NOT NULL,
  `gender_id` int(11) NOT NULL,
  `governorates_id` int(11) NOT NULL,
  `localities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `farms_id` int(11) NOT NULL,
  `farms_localAddress` text NOT NULL,
  `farms_area` float NOT NULL,
  `farms_basin` varchar(10) NOT NULL,
  `farms_plot` varchar(10) NOT NULL,
  `farms_longitude` varchar(150) NOT NULL,
  `farms_latitude` varchar(150) NOT NULL,
  `governorates_id` int(11) NOT NULL,
  `localities_id` int(11) NOT NULL,
  `ownership_types_id` int(11) NOT NULL,
  `area_types_id` int(11) NOT NULL,
  `farmers_id` int(11) NOT NULL,
  `farms_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `genderAr` varchar(5) NOT NULL,
  `gender_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `governorates_id` int(11) NOT NULL,
  `governorates_name` varchar(50) NOT NULL,
  `governorates_nameAr` varchar(50) NOT NULL,
  `governorates_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`governorates_id`, `governorates_name`, `governorates_nameAr`, `governorates_date`) VALUES
(1, 'Gaza', 'غزة', '2025-08-16 22:37:28'),
(2, 'North Gaza', 'شمال غزة', '2025-08-16 22:38:05'),
(3, 'Deir Al Balah', 'دير البلح', '2025-08-16 22:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `implementation`
--

CREATE TABLE `implementation` (
  `implementation_id` int(11) NOT NULL,
  `projects_id` int(11) NOT NULL,
  `damages_id` int(11) NOT NULL,
  `value` float NOT NULL,
  `implementation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `items_id` int(11) NOT NULL,
  `items_quantity` int(11) NOT NULL,
  `items_percentage` int(11) NOT NULL,
  `damage_types_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `subCategories_id` int(11) NOT NULL,
  `damages_id` int(11) NOT NULL,
  `items_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `localities`
--

CREATE TABLE `localities` (
  `localities_id` int(11) NOT NULL,
  `localities_name` varchar(50) NOT NULL,
  `localities_nameAr` varchar(50) NOT NULL,
  `governorates_id` int(11) NOT NULL,
  `localities_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ownership_types`
--

CREATE TABLE `ownership_types` (
  `ownership_types_id` int(11) NOT NULL,
  `ownership_types_name` varchar(50) NOT NULL,
  `ownership_types_nameAr` varchar(50) NOT NULL,
  `ownership_types_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projects_id` int(11) NOT NULL,
  `projects_name` varchar(150) NOT NULL,
  `projects_nameAr` varchar(150) NOT NULL,
  `projects_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `donors_id` int(11) NOT NULL,
  `budget` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subCategories_id` int(11) NOT NULL,
  `subCategories_name` varchar(150) NOT NULL,
  `subCategories_nameAr` varchar(150) NOT NULL,
  `price` float NOT NULL,
  `units_id` int(11) NOT NULL,
  `subCategories_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `units_id` int(11) NOT NULL,
  `units_name` varchar(20) NOT NULL,
  `units_nameAr` varchar(20) NOT NULL,
  `units_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(100) NOT NULL,
  `users_phone` varchar(100) NOT NULL,
  `users_verifycode` int(11) NOT NULL,
  `users_email` varchar(100) NOT NULL,
  `users_approve` tinyint(4) NOT NULL DEFAULT 0,
  `users_password` varchar(100) NOT NULL,
  `users_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `governorates_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_phone`, `users_verifycode`, `users_email`, `users_approve`, `users_password`, `users_created`, `governorates_id`) VALUES
(25, 'musahamad', '0592055651', 87096, 'musa_hamd1@hotmail.com', 1, '7c222fb2927d828af22f592134e8932480637c0d', '2023-11-15 19:24:15', NULL),
(36, 're', '0595', 74895, 'musa.m@moa.pna.ps', 1, '$2y$10$PGx1cv5/fceREpPArXf.BeckhkzqW19CXHTb2ED52EPyuwvl/SUVq', '2025-08-17 10:54:39', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_types`
--
ALTER TABLE `area_types`
  ADD PRIMARY KEY (`area_types_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`),
  ADD UNIQUE KEY `categories_name` (`categories_name`),
  ADD UNIQUE KEY `categories_nameAr` (`categories_nameAr`);

--
-- Indexes for table `damages`
--
ALTER TABLE `damages`
  ADD PRIMARY KEY (`damages_id`),
  ADD KEY `damage_cause_id` (`damage_cause_id`),
  ADD KEY `farms_id` (`farms_id`);

--
-- Indexes for table `damage_cause`
--
ALTER TABLE `damage_cause`
  ADD PRIMARY KEY (`damage_cause_id`),
  ADD UNIQUE KEY `damage_cause_name` (`damage_cause_name`),
  ADD UNIQUE KEY `damage_cause_nameAr` (`damage_cause_nameAr`);

--
-- Indexes for table `damage_types`
--
ALTER TABLE `damage_types`
  ADD PRIMARY KEY (`damage_types_id`),
  ADD UNIQUE KEY `damage_types_name` (`damage_types_name`),
  ADD UNIQUE KEY `damage_types_nameAr` (`damage_types_nameAr`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`documents_id`),
  ADD KEY `damages_id` (`damages_id`),
  ADD KEY `documents_types_id` (`documents_types_id`);

--
-- Indexes for table `documents_types`
--
ALTER TABLE `documents_types`
  ADD PRIMARY KEY (`documents_types_id`),
  ADD UNIQUE KEY `documents_type` (`documents_type`),
  ADD UNIQUE KEY `documents_typeAr` (`documents_typeAr`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donors_id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmers_id`),
  ADD UNIQUE KEY `farmers_phone` (`farmers_phone`),
  ADD UNIQUE KEY `farmers_identity` (`farmers_identity`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `governorates_id` (`governorates_id`),
  ADD KEY `localities_id` (`localities_id`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`farms_id`),
  ADD KEY `farmers_id` (`farmers_id`),
  ADD KEY `farms_ibfk_3` (`localities_id`),
  ADD KEY `ownership_types_id` (`ownership_types_id`),
  ADD KEY `farms_ibfk_2` (`governorates_id`),
  ADD KEY `area_types_id` (`area_types_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`),
  ADD UNIQUE KEY `gender` (`gender`),
  ADD UNIQUE KEY `genderAr` (`genderAr`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`governorates_id`),
  ADD UNIQUE KEY `governorates_name` (`governorates_name`),
  ADD UNIQUE KEY `governorates_nameAr` (`governorates_nameAr`);

--
-- Indexes for table `implementation`
--
ALTER TABLE `implementation`
  ADD PRIMARY KEY (`implementation_id`),
  ADD KEY `damages_id` (`damages_id`),
  ADD KEY `projects_id` (`projects_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`items_id`),
  ADD KEY `damage_types_id` (`damage_types_id`),
  ADD KEY `categories_id` (`categories_id`),
  ADD KEY `subCategories_id` (`subCategories_id`),
  ADD KEY `damages_id` (`damages_id`);

--
-- Indexes for table `localities`
--
ALTER TABLE `localities`
  ADD PRIMARY KEY (`localities_id`),
  ADD UNIQUE KEY `localities_name` (`localities_name`),
  ADD UNIQUE KEY `localities_nameAr` (`localities_nameAr`),
  ADD KEY `governorates_id` (`governorates_id`);

--
-- Indexes for table `ownership_types`
--
ALTER TABLE `ownership_types`
  ADD PRIMARY KEY (`ownership_types_id`),
  ADD UNIQUE KEY `ownership_types_name` (`ownership_types_name`),
  ADD UNIQUE KEY `ownership_types_nameAr` (`ownership_types_nameAr`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projects_id`),
  ADD KEY `donors_id` (`donors_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subCategories_id`),
  ADD UNIQUE KEY `subCategories_name` (`subCategories_name`),
  ADD UNIQUE KEY `subCategories_nameAr` (`subCategories_nameAr`),
  ADD KEY `units_id` (`units_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`units_id`),
  ADD UNIQUE KEY `units_name` (`units_name`),
  ADD UNIQUE KEY `units_nameAr` (`units_nameAr`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_email` (`users_email`),
  ADD UNIQUE KEY `users_phone` (`users_phone`),
  ADD KEY `fk_users_governorates` (`governorates_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_types`
--
ALTER TABLE `area_types`
  MODIFY `area_types_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `damages`
--
ALTER TABLE `damages`
  MODIFY `damages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `damage_cause`
--
ALTER TABLE `damage_cause`
  MODIFY `damage_cause_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `damage_types`
--
ALTER TABLE `damage_types`
  MODIFY `damage_types_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `documents_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents_types`
--
ALTER TABLE `documents_types`
  MODIFY `documents_types_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donors_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `farms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `governorates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `implementation`
--
ALTER TABLE `implementation`
  MODIFY `implementation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `localities`
--
ALTER TABLE `localities`
  MODIFY `localities_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ownership_types`
--
ALTER TABLE `ownership_types`
  MODIFY `ownership_types_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projects_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subCategories_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `units_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `damages`
--
ALTER TABLE `damages`
  ADD CONSTRAINT `damages_ibfk_1` FOREIGN KEY (`damage_cause_id`) REFERENCES `damage_cause` (`damage_cause_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `damages_ibfk_2` FOREIGN KEY (`farms_id`) REFERENCES `farms` (`farms_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`damages_id`) REFERENCES `damages` (`damages_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`documents_types_id`) REFERENCES `documents_types` (`documents_types_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farmers`
--
ALTER TABLE `farmers`
  ADD CONSTRAINT `farmers_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farmers_ibfk_2` FOREIGN KEY (`governorates_id`) REFERENCES `governorates` (`governorates_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farmers_ibfk_3` FOREIGN KEY (`localities_id`) REFERENCES `localities` (`localities_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farms`
--
ALTER TABLE `farms`
  ADD CONSTRAINT `farms_ibfk_1` FOREIGN KEY (`farmers_id`) REFERENCES `farmers` (`farmers_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farms_ibfk_2` FOREIGN KEY (`governorates_id`) REFERENCES `governorates` (`governorates_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farms_ibfk_3` FOREIGN KEY (`localities_id`) REFERENCES `localities` (`localities_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farms_ibfk_4` FOREIGN KEY (`ownership_types_id`) REFERENCES `ownership_types` (`ownership_types_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farms_ibfk_5` FOREIGN KEY (`area_types_id`) REFERENCES `area_types` (`area_types_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `implementation`
--
ALTER TABLE `implementation`
  ADD CONSTRAINT `implementation_ibfk_1` FOREIGN KEY (`damages_id`) REFERENCES `damages` (`damages_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `implementation_ibfk_2` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`projects_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`damage_types_id`) REFERENCES `damage_types` (`damage_types_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_3` FOREIGN KEY (`subCategories_id`) REFERENCES `subcategories` (`subCategories_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_4` FOREIGN KEY (`damages_id`) REFERENCES `damages` (`damages_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `localities`
--
ALTER TABLE `localities`
  ADD CONSTRAINT `localities_ibfk_1` FOREIGN KEY (`governorates_id`) REFERENCES `governorates` (`governorates_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`donors_id`) REFERENCES `donors` (`donors_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`units_id`) REFERENCES `units` (`units_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_governorates` FOREIGN KEY (`governorates_id`) REFERENCES `governorates` (`governorates_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
