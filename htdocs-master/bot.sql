-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2021 at 02:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `identifier` text NOT NULL,
  `msg_eng` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `identifier`, `msg_eng`) VALUES
(1, '1', '            <p>Please select any option:</p>\n            <button class=\"option\" onclick=\"send(\'Book Appointment\',\'1-1\');\">\n              1. Book Appointment\n            </button>\n            <button class=\"option\" onclick=\"send(\'Information (Tips)\',\'1-2\');\">\n              2. Information (Tips)\n            </button>\n            <button class=\"option\" onclick=\"send(\'Emergency Contact\',\'1-3\');\">\n              3. Emergency Contect\n            </button>\n            <button class=\"option\" onclick=\"send(\'Contact Us\',\'1-4\');\">\n              4. Contact Us\n            </button>\n            <button class=\"option\" onclick=\"send(\'FAQs\',\'1-5\');\">\n              5. FAQs\n            </button>'),
(2, '1-1', '<p>Please Enter SSN Number</p>\n<form onsubmit=\"ssnCheck(event)\">\n  <input type=\"number\" name=\"ssn\" placeholder=\"Enter SSN here.\" required/>\n  <input type=\"submit\" name=\"submit\" />\n</form>'),
(3, '1-2', '            <p>To know more about Information(Tips)</p>\n            <a target=\"_blank\" class=\"bot-link\" href=\"#\"\n              >Click here <i class=\"fas fa-link\"></i\n            ></a>'),
(4, '1-3', '            <p>In emergency you can contact here.</p>\r\n            <a class=\"bot-link\" href=\"tel:+1-847-555-5555\">\r\n              <i class=\"fas fa-phone-alt\"></i> +1-847-555-5555\r\n            </a>\r\n            <a class=\"bot-link\" href=\"tel:+1-847-555-5555\">\r\n              <i class=\"fas fa-phone-alt\"></i> +1-847-666-6666\r\n            </a>'),
(5, '1-4', '            <p>Visit our contact us page below</p>\r\n            <a target=\"_blank\" class=\"bot-link\" href=\"#\"\r\n              >Click here <i class=\"fas fa-link\"></i\r\n            ></a>'),
(6, '1-5', '            <p>Frequently asked questions</p>\r\n            <a target=\"_blank\" class=\"bot-link\" href=\"#\"\r\n              >click to open <i class=\"fas fa-link\"></i\r\n            ></a>');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `first` int(11) NOT NULL DEFAULT 0,
  `second` int(11) NOT NULL DEFAULT 0,
  `third` int(11) NOT NULL DEFAULT 0,
  `fourth` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `date`, `first`, `second`, `third`, `fourth`) VALUES
(1, '2021-12-07', 0, 1, 0, 0),
(2, '2021-12-08', 0, 5, 0, 0),
(3, '2021-12-09', 0, 0, 0, 0),
(4, '2021-12-10', 0, 0, 0, 0),
(5, '2021-12-13', 0, 0, 0, 0),
(6, '2021-12-14', 0, 0, 0, 0),
(7, '2021-12-15', 0, 0, 0, 0),
(8, '2021-12-16', 0, 0, 0, 0),
(9, '2021-12-17', 0, 0, 0, 0),
(10, '2021-12-20', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ssn` text NOT NULL,
  `1st_dose_date` date DEFAULT NULL,
  `1st_dose_slot` text DEFAULT NULL,
  `1st_dose_status` tinyint(4) DEFAULT 0,
  `2nd_dose_date` date DEFAULT NULL,
  `2nd_dose_slot` text DEFAULT NULL,
  `2nd_dose_status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
