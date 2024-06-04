-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2024 at 08:10 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbookingmeetingroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_meeting_rooms`
--

DROP TABLE IF EXISTS `booking_meeting_rooms`;
CREATE TABLE IF NOT EXISTS `booking_meeting_rooms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topicOfMeeting` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directedBy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameDirectedBy` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meetingLevel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regulator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interOfficeOrDepartmental` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `isApprove` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_meeting_rooms`
--

INSERT INTO `booking_meeting_rooms` (`id`, `date`, `topicOfMeeting`, `directedBy`, `nameDirectedBy`, `meetingLevel`, `regulator`, `interOfficeOrDepartmental`, `member`, `room`, `time`, `description`, `isApprove`, `created_at`, `updated_at`) VALUES
(1, '2024-05-11', 'Jamison Hegmann', 'ប្រធានអង្គភាព', '0d4QWAHYYH', '8', '3', 'ផែនការ និង បណ្តុះបណ្តាល', '71', 'B', 'B 2-3', 'XwEM9X715x', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(2, '2024-06-02', 'Mr. Jefferey Hegmann', 'ប្រធានការិយាល័យ រដ្ឋបាល និង ហិរញ្ញវត្ថុ', 'iiI1MS9Moy', '4', '5', 'សវនកម្មទី ១', '13', 'A', 'A 7-8, A 8-9', 'e0YX0bOt0H', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(3, '2024-05-07', 'Dr. Frederik Friesen Jr.', 'ប្រធាននាយកដ្ឋាន សវនកម្មទី ១', '9pureCFMn9', '6', '2', 'សវនកម្មទី ៣', '79', 'A', 'B 7-8, B 8-9', 'oahSCvT9I4', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(4, '2024-05-16', 'Dr. Zack Champlin', 'អនុប្រធានការិយាល័យ រដ្ឋបាល និង ហិរញ្ញវត្ថុ', '6eoTs7d1bA', '3', '6', 'សវនកម្មទី ៣', '25', 'B', 'B 7-8, B 8-9', 'CCC0sIzKXK', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(5, '2024-05-13', 'Eulah Schulist', 'ប្រធានការិយាល័យ សវនកម្មទី ៤', '38pllFa0BM', '3', '3', 'សវនកម្មទី ២', '79', 'B', 'B 7-8, B 8-9', '2LRNpgehPO', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(6, '2024-05-30', 'Mr. Jarret Johnson Sr.', 'អនុប្រធានការិយាល័យ សវនកម្មទី ១', 'M2ey56cVLg', '9', '4', 'ផែនការ និង បណ្តុះបណ្តាល', '64', 'B', 'A 2-3', 'sswyygmci6', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(7, '2024-05-05', 'Chanelle Kutch', 'អនុប្រធាននាយកដ្ឋាន សវនកម្មទី ២', 'QKV45bajXz', '9', '6', 'រដ្ឋបាល និង ហិរញ្ញវត្ថុ', '83', 'A', 'A 7-8, A 8-9', 'mWXZKOsaoW', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(8, '2024-05-13', 'Brendan Huel', 'អនុប្រធាននាយកដ្ឋាន កិច្ចការទូទៅ', 'jYb5I2wGuf', '5', '4', 'សវនកម្មទី ៤', '0', 'A', 'A 7-8, A 8-9', '5jOWEJMpxR', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(9, '2024-05-17', 'Elenor Kessler DVM', 'អនុប្រធានការិយាល័យ សវនកម្មទី ១', '4roqpFYWQ5', '1', '1', 'សវនកម្មទី ៣', '11', 'A', 'B 7-8, B 8-9', 'tKodVxPUTA', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(10, '2024-05-29', 'Prof. Wyman Pacocha', 'ប្រធានការិយាល័យ សវនកម្មទី ៤', 'C2PS1ZtkHF', '6', '2', 'ផែនការ និង បណ្តុះបណ្តាល', '1', 'A', 'B 7-8, B 8-9', 'WkClg8NOyI', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(11, '2024-05-20', 'Judd Monahan MD', 'ប្រធាននាយកដ្ឋាន សវនកម្មទី ១', 'yVtBdOM9MI', '8', '2', 'សវនកម្មទី ៣', '18', 'A', 'B 7-8, B 8-9', '3ZBZgAmeRb', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(12, '2024-05-05', 'Maximo Brown DVM', 'អនុប្រធាននាយកដ្ឋាន សវនកម្មទី ១', 'PCvXe3Q6r2', '2', '5', NULL, '68', 'A', 'B 7-8, B 8-9', 'DuxlvgVXXS', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(13, '2024-05-05', 'Abby West', 'ប្រធានការិយាល័យ សវនកម្មទី ២', '4k3Zxr5ENB', '2', '4', 'សវនកម្មទី ៤', '17', 'A', 'A 2-3', 'RHqnR7Y7hK', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(14, '2024-05-26', 'Noe Ritchie', 'ប្រធានការិយាល័យ សវនកម្មទី ១', 'JJwjp2pqHU', '5', '5', 'សវនកម្មទី ៤', '92', 'B', 'A 2-3', 'mzAS6aOkWN', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(15, '2024-05-28', 'Tania Lehner', 'ប្រធានការិយាល័យ គ្រប់គ្រងព័ត៌មានវិទ្យា', 'iAgYdAnqWS', '4', '5', 'សវនកម្មទី ២', '34', 'B', 'B 2-3', 'vqLsgpMdmy', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(16, '2024-06-01', 'Stone Leannon', 'ប្រធានការិយាល័យ គ្រប់គ្រងព័ត៌មានវិទ្យា', 'GENiIZJDDJ', '4', NULL, 'សវនកម្មទី ២', '26', 'B', 'A 2-3', 'Ucwt3yp6BU', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(17, '2024-05-30', 'Katelyn Kovacek', 'អនុប្រធានការិយាល័យ ផែនការ និង បណ្តុះបណ្តាល', 'CT5cp9d6Gi', '6', '5', 'សវនកម្មទី ២', '77', 'A', 'B 7-8, B 8-9', 'OkRO167OAJ', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(18, '2024-05-28', 'Jesus Steuber', 'អនុប្រធានការិយាល័យ សវនកម្មទី ២', 'mOG6KgoIK5', '6', NULL, 'សវនកម្មទី ១', '34', 'B', 'A 7-8, A 8-9', '5g5Eqi6vEH', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(19, '2024-05-25', 'Mr. Toy Cormier DVM', 'អនុប្រធាននាយកដ្ឋាន សវនកម្មទី ១', 'jPh6lFhYqo', '7', '6', 'រដ្ឋបាល និង ហិរញ្ញវត្ថុ', '19', 'B', 'B 2-3', 'XjYfaFaDzT', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(20, '2024-05-15', 'Patsy Dare', 'អនុប្រធាននាយកដ្ឋាន កិច្ចការទូទៅ', '4ucaciapX8', '6', '2', 'សវនកម្មទី ៤', '30', 'B', 'A 2-3', 'aO8USysu6s', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(21, '2024-05-19', 'Gwen Beahan', 'អនុប្រធាននាយកដ្ឋាន សវនកម្មទី ១', 'gvaTMHnNCr', '1', '3', 'រដ្ឋបាល និង ហិរញ្ញវត្ថុ', '95', 'A', 'A 2-3', 'vBa6MUyrOx', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(22, '2024-05-28', 'Kevon Beahan Sr.', 'អនុប្រធាននាយកដ្ឋាន សវនកម្មទី ១', 'PtrSarOLXL', '6', '4', 'សវនកម្មទី ១', '88', 'B', 'B 2-3', 'X4V3fR0GpR', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(23, '2024-05-25', 'Mr. Sherwood Schmeler MD', 'អនុប្រធានអង្គភាព', '2CM4RcwRq5', '8', '4', 'រដ្ឋបាល និង ហិរញ្ញវត្ថុ', '88', 'B', 'A 7-8, A 8-9', '9YlkBEtJkh', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(24, '2024-06-04', 'Jayce Harris', 'អនុប្រធានការិយាល័យ ផែនការ និង បណ្តុះបណ្តាល', 'wZO5AsVTck', '8', '1', 'សវនកម្មទី ៣', '62', 'A', 'A 2-3', 'GI5fc4fjBF', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(25, '2024-06-01', 'Josefa Kuhic', 'ប្រធាននាយកដ្ឋាន សវនកម្មទី ១', 'GnuwK62ZwP', '9', '2', NULL, '98', 'B', 'B 2-3', 'YV3k2xkeAf', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(26, '2024-05-08', 'Prof. Edgardo Nicolas MD', 'ប្រធានការិយាល័យ សវនកម្មទី ២', 'UsOOO5w2hl', '3', '1', 'ផែនការ និង បណ្តុះបណ្តាល', '94', 'A', 'A 2-3', 'Rt8JHI5IdU', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(27, '2024-05-17', 'Walton Rogahn', 'ប្រធាននាយកដ្ឋាន សវនកម្មទី ២', 'AGVoCixwFi', '7', '3', 'សវនកម្មទី ១', '46', 'B', 'B 7-8, B 8-9', 'jTn2EgkNgb', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(28, '2024-05-14', 'Jacinthe Huels', 'អនុប្រធានការិយាល័យ សវនកម្មទី ៤', 'fmRGCxG3T6', '2', '5', 'រដ្ឋបាល និង ហិរញ្ញវត្ថុ', '25', 'A', 'B 7-8, B 8-9', 'KdlMQx9VWM', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(29, '2024-06-04', 'Christ Harber', 'អនុប្រធាននាយកដ្ឋាន សវនកម្មទី ១', '8f2mHuy4vO', '9', '3', 'គ្រប់គ្រងព័ត៌មានវិទ្យា', '52', 'A', 'A 7-8, A 8-9', 'yy714cG4xh', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(30, '2024-05-11', 'Mr. Cleve Raynor', 'អនុប្រធានការិយាល័យ គ្រប់គ្រងព័ត៌មានវិទ្យា', 'MNynADbG5B', '9', NULL, 'សវនកម្មទី ១', '18', 'A', 'A 7-8, A 8-9', 'VVznjwJgt5', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(31, '2024-05-23', 'Mr. Al Gibson', 'ប្រធាននាយកដ្ឋាន កិច្ចការទូទៅ', 'fYZyTT4f1S', '3', '1', 'ផែនការ និង បណ្តុះបណ្តាល', '67', 'B', 'A 7-8, A 8-9', 'PFAou3rxDm', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(32, '2024-05-21', 'Mrs. Melyssa Bogan', 'អនុប្រធានការិយាល័យ សវនកម្មទី ២', 'EbRMwYQ82v', '1', '1', 'ផែនការ និង បណ្តុះបណ្តាល', '52', 'A', 'A 7-8, A 8-9', 'YadY9jYTbH', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(33, '2024-05-25', 'Prof. Ethel Mills', 'ប្រធានអង្គភាព', '4nscrLq79s', '2', '4', 'រដ្ឋបាល និង ហិរញ្ញវត្ថុ', '62', 'A', 'A 2-3', 'mPGlZIeccY', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(34, '2024-05-07', 'Corene O\'Keefe', 'ប្រធានការិយាល័យ សវនកម្មទី ១', '5mdFffkjEo', '9', NULL, NULL, '73', 'A', 'B 2-3', 'P8YAFDFaYu', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(35, '2024-05-30', 'Rachael Lebsack II', 'ប្រធានការិយាល័យ រដ្ឋបាល និង ហិរញ្ញវត្ថុ', 'xQkaMGOA61', '4', '2', 'សវនកម្មទី ២', '39', 'A', 'B 2-3', 'yqc7AKniVF', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(36, '2024-05-16', 'Mrs. Kiera Gottlieb', 'អនុប្រធានការិយាល័យ សវនកម្មទី ៤', 'XsCOZzFnvJ', '1', NULL, 'សវនកម្មទី ១', '23', 'A', 'B 7-8, B 8-9', '2dejaz7PRr', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(37, '2024-06-03', 'Hyman Rippin V', 'អនុប្រធាននាយកដ្ឋាន សវនកម្មទី ១', 'yHnEwO4qlb', '3', '6', 'ផែនការ និង បណ្តុះបណ្តាល', '8', 'B', 'A 7-8, A 8-9', 'vgy5D1embH', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(38, '2024-06-03', 'Jennings Quitzon', 'អនុប្រធានការិយាល័យ ផែនការ និង បណ្តុះបណ្តាល', '1LGz44dZEh', '3', '4', 'គ្រប់គ្រងព័ត៌មានវិទ្យា', '90', 'A', 'A 2-3', 'ReqbpRhhZH', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(39, '2024-05-26', 'Gunner Ondricka', 'អនុប្រធានការិយាល័យ សវនកម្មទី ១', 'BYDQEe1ihy', '8', '6', 'សវនកម្មទី ១', '76', 'A', 'A 7-8, A 8-9', 'GeSMAQgPZ3', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(40, '2024-05-07', 'Rebekah Jaskolski', 'អនុប្រធានការិយាល័យ សវនកម្មទី ១', '9ndWOPOX2n', '9', '1', NULL, '86', 'A', 'B 7-8, B 8-9', 'v5yfBLVW2L', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(41, '2024-05-20', 'Korbin Cormier', 'ប្រធានការិយាល័យ សវនកម្មទី ២', '0auiGwve6P', '1', '6', 'ផែនការ និង បណ្តុះបណ្តាល', '3', 'B', 'A 7-8, A 8-9', 'CymBJ9vZLu', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(42, '2024-05-07', 'Bill Mayer', 'អនុប្រធាននាយកដ្ឋាន សវនកម្មទី ១', 'a2YlvMggtL', '8', '1', 'ផែនការ និង បណ្តុះបណ្តាល', '41', 'B', 'B 2-3', 'c8rHmmBPa9', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(43, '2024-05-31', 'Lavada Sporer I', 'ប្រធានការិយាល័យ គ្រប់គ្រងព័ត៌មានវិទ្យា', 'wQEzm0eKaw', '4', '6', 'សវនកម្មទី ៣', '50', 'A', 'B 7-8, B 8-9', 'igjW2ki7o9', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(44, '2024-05-19', 'Gregoria Dicki', 'អនុប្រធាននាយកដ្ឋាន សវនកម្មទី ២', 'P9Ibj3PPTA', '8', '2', 'សវនកម្មទី ៤', '79', 'A', 'A 2-3', '6MFaHSx7BH', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(45, '2024-05-15', 'Ellie Beier DVM', 'ប្រធានការិយាល័យ រដ្ឋបាល និង ហិរញ្ញវត្ថុ', '8d390dJYeo', '8', '3', 'គ្រប់គ្រងព័ត៌មានវិទ្យា', '70', 'B', 'A 2-3', 'X7h2o1lJaB', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(46, '2024-06-03', 'Suzanne Maggio Sr.', 'ប្រធានការិយាល័យ រដ្ឋបាល និង ហិរញ្ញវត្ថុ', 'fLHFhHj1xd', '8', NULL, 'សវនកម្មទី ៣', '12', 'B', 'B 2-3', 'MAmITWzpUa', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(47, '2024-05-07', 'Jayme Gaylord', 'ប្រធានការិយាល័យ សវនកម្មទី ៣', 'LLksp6xR2i', '1', '1', 'ផែនការ និង បណ្តុះបណ្តាល', '30', 'B', 'A 7-8, A 8-9', 'CNAcU1X7jH', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(48, '2024-05-11', 'Mr. Geovany Price', 'ប្រធានការិយាល័យ សវនកម្មទី ៤', 'H0UvoKQTdJ', '3', '3', 'គ្រប់គ្រងព័ត៌មានវិទ្យា', '35', 'B', 'A 7-8, A 8-9', 'NJwvN97oxg', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(49, '2024-05-09', 'Susan Gleason', 'ប្រធានការិយាល័យ សវនកម្មទី ៤', 'DOjHrtUBcC', '2', '1', 'គ្រប់គ្រងព័ត៌មានវិទ្យា', '41', 'A', 'A 2-3', 'LaOQ8pW1r1', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(50, '2024-05-27', 'Dr. Dianna Ratke', 'អនុប្រធានអង្គភាព', 'IlOBik95Oo', '9', '6', 'សវនកម្មទី ២', '37', 'A', 'B 7-8, B 8-9', 'M4ndxwUGiB', '0', '2024-06-04 08:04:59', '2024-06-04 08:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

DROP TABLE IF EXISTS `guests`;
CREATE TABLE IF NOT EXISTS `guests` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bookingId` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guests_bookingid_foreign` (`bookingId`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `bookingId`, `name`, `position`, `email`, `phoneNumber`, `created_at`, `updated_at`) VALUES
(1, 1, 'Neva Hartmann V', 'rQ0bzJtqmo', 'kunze.macie@example.net', 'OQNLYym1rj', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(2, 2, 'Amie Gaylord', '3vU8I1afNu', 'chesley.jerde@example.org', '3JqWdyUJlb', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(3, 3, 'Estevan Lesch', 'NcHvcQwIAc', 'tyree34@example.org', '30KGr9lw0A', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(4, 4, 'Mrs. Arianna Volkman', '0kCphfppQw', 'mdaugherty@example.org', 'MWnBT0pFWv', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(5, 5, 'Russel Hickle', 'AqnXOYaCe3', 'loconner@example.com', 'Jbzm98jmcV', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(6, 6, 'Mr. Barton Stark', 'JFlSRmyWps', 'thalia.crona@example.com', '8KzKdtYIC1', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(7, 7, 'Alba Dooley', 'upylaN1BnF', 'rkreiger@example.net', 'sOs5ygu8dQ', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(8, 8, 'Dr. Lula Will DVM', 'dhIiSJVBCW', 'fritz.marvin@example.com', 'wGQF2D4ZMj', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(9, 9, 'Heloise Mosciski', 'MPToj1L1JE', 'wlesch@example.com', 'ibjNLexj71', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(10, 10, 'Dr. Quentin Fisher PhD', 'qWLo66ZDnb', 'crystel30@example.com', 'Zs4HwMDBhQ', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(11, 11, 'Annalise Terry III', 'NMhq3sjDVw', 'alvena.schuppe@example.org', 'IvkzbMgzK2', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(12, 12, 'Dr. Anna Friesen DVM', '9YkoLsV2Cz', 'price.haylie@example.org', 'jfl72TSyvT', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(13, 13, 'Mr. Newell Emmerich Jr.', '2rScelKUET', 'moshe.goyette@example.org', 'rZ4DLGuXu0', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(14, 14, 'Miss Madie Treutel', 'UDPFQ5hbgM', 'garth.cassin@example.org', '8je9QlpRyW', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(15, 15, 'Anibal Gusikowski', 'BfqKslVEj1', 'brady29@example.org', '4ASMnpzp2Y', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(16, 16, 'Valentina Breitenberg I', 'jElWqygy6X', 'littel.dakota@example.net', 'TucP4dE4Sw', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(17, 17, 'Mona Bosco IV', 'LOD1fif8aD', 'nturner@example.com', '0e2fRAoNJ5', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(18, 18, 'Carlo Olson', 'gonXcQKSAZ', 'camylle85@example.org', 'N7YbqPWXYg', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(19, 19, 'Moshe Murphy MD', 'iHfGqHFrtT', 'sammie43@example.net', 'FeYhuLNuZr', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(20, 20, 'Greta Carroll', '6Vp3I51HpQ', 'preston.medhurst@example.com', 'yKhi2rvrXn', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(21, 21, 'Haskell Bashirian', 'yHDbR2EpI9', 'jakayla74@example.net', 'xFJWFLX1KQ', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(22, 22, 'Antone Reynolds', 'gaAUIMjIdY', 'stan68@example.net', 'f7EbNG8gYz', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(23, 23, 'Jannie Stokes', '83Rvo2gthu', 'alejandrin.larson@example.com', 'zRlFvER8sB', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(24, 24, 'Ms. Annetta Stracke I', '1PbYlL6MUs', 'tabernathy@example.net', 'xdGrAR2iPR', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(25, 25, 'Jacky Nienow', 'OETs1MRRG3', 'micah20@example.com', 'TuHef23aEH', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(26, 26, 'Mr. Bertram Reinger MD', '54b6uj8p8L', 'danyka13@example.org', 'VWv2aYHLHD', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(27, 27, 'Ms. Marielle Kub', 'V6xigzN6UJ', 'werner.haag@example.net', 'UL3Q68Adk2', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(28, 28, 'Percival Mann', 'Ah0jpWY3ti', 'nannie62@example.net', 'AftIKaxWgc', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(29, 29, 'Carlee Renner', 'GEJvYkvBmg', 'mariane.ullrich@example.com', 'mBvbpMS2Mb', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(30, 30, 'Stanton Ondricka', 'ByuGD9DjoR', 'purdy.yadira@example.net', 'z6ALHyAA50', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(31, 31, 'Prof. Brayan Schinner', 'rEmuNB6kPg', 'faustino.roob@example.net', 'IdfDGcn9ye', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(32, 32, 'Shaylee O\'Keefe', 'AjppiiPa4I', 'jaeden66@example.net', 'bxx99G0dYa', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(33, 33, 'Victoria Bergstrom', 'nWVJ3j9dpE', 'kertzmann.gwen@example.net', 'v5cw8Zk8gf', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(34, 34, 'Johann Upton', '8wwSh3hKOx', 'austin.kulas@example.org', '3eGa6qm3T8', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(35, 35, 'Dr. Tremaine Hoppe MD', 'nv1DwbnOXC', 'hagenes.jasmin@example.com', 'Unsw7uZ5CQ', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(36, 36, 'Leta Murray', 'q6Bd7lU7R4', 'dstrosin@example.com', '7sY0mBxUx8', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(37, 37, 'Enid Rempel Sr.', 'wVbGxtFfs2', 'aaltenwerth@example.com', 'zQFCdwR1IV', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(38, 38, 'Elmo Kuphal PhD', 'jq2z3ZH6KM', 'doris.olson@example.net', 'liPFwkY9gS', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(39, 39, 'Mr. Reid Spencer MD', 'chVonvw0Wa', 'charlene.becker@example.net', 'zx97Jxy3i7', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(40, 40, 'Mitchell Brown', 'w2mKjncOUX', 'zachary.ziemann@example.org', 'qsg5eJDSQx', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(41, 41, 'Newell King', '9mvLQWFi1K', 'esta.hessel@example.org', 'LHIlfcRPLu', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(42, 42, 'Shaina Cremin', 'E1og1IWxi2', 'prosacco.norma@example.com', 'o8UdXUwc7B', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(43, 43, 'Anibal Hayes', '32sIxTYn1a', 'hyman41@example.com', 'MBLLj3wKta', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(44, 44, 'Shanon Hudson', 'jK6ETSn95n', 'destinee36@example.net', 'Nbkq5Bmwsw', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(45, 45, 'Dr. Maybell Padberg', 'QZKuO2obEo', 'thad.bartoletti@example.org', 'bEaqXNQ05v', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(46, 46, 'Brook Stoltenberg', 'eFgI9YGJQa', 'lia81@example.org', 'xE3SUJ18w6', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(47, 47, 'Prof. Mozell Ryan V', '4gk7CzqJEx', 'maxime.denesik@example.com', 'M18FT6DfFu', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(48, 48, 'Ms. Winifred Dare V', 'sZIJ9y9DDS', 'imosciski@example.com', '3iBhGFpBY8', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(49, 49, 'Mr. Hadley Bins DDS', 'RPH1O3Ca5F', 'nader.jose@example.org', 'm26CB3B6If', '2024-06-04 08:04:59', '2024-06-04 08:04:59'),
(50, 50, 'Ms. Chanel Grimes Jr.', 'utVNvT8Npg', 'oswaldo33@example.net', 'JnMWYdq5IL', '2024-06-04 08:04:59', '2024-06-04 08:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '0001_01_01_000000_create_users_table', 1),
(34, '2024_03_26_070543_create_booking_meeting_rooms', 1),
(35, '2024_05_09_072415_create_guests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('zHLqDXrl09VXZlE5hvMg5Jo6R9TnslpS3KwdKUQx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSldxUW5kMjlpMWdyS2NyZUZ5ZTVOc2dIZ2JjM0VRcllkelh6eUN2dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/cGFnZT0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1717488349);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
