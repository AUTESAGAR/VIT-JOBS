-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 06:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vit_jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `uname`, `pwd`) VALUES
(1, 'Admin', 'Admin@123', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `name`, `uname`, `pwd`, `mobile`, `email`, `adr`) VALUES
(1, 'Komal Gore', 'Komal@123', 'Komal@123', 985622536, 'komalgore642@gmail.com', 'Chh.Sambhajinagar');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `banner` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `banner`, `location`) VALUES
(1, 'Java Fullstack Developer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, labore? Impedit iure, cum accusamus nemo id libero iusto quisquam suscipit, nisi, incidunt inventore repellat possimus saepe eos. Aut unde, officia deserunt aperiam id minima voluptates fugiat totam explicabo animi quis, velit quaerat, delectus asperiores enim?', '../uploads/post-9.jpg', 'Pune'),
(3, 'PHP Fullstack', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore corporis esse ipsum debitis dignissimos iusto eaque quae, neque, commodi iure repellendus nemo corrupti!', '../uploads/post-10.jpg', 'Chennai'),
(5, 'Node Js Fullstack Developer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, labore? Impedit iure, cum accusamus nemo id libero iusto quisquam suscipit, nisi, incidunt inventore repellat possimus saepe eos. Aut unde, officia deserunt aperiam id minima voluptates fugiat totam explicabo animi quis, velit quaerat, delectus asperiores enim?', '../uploads/post-5.jpg', 'Delhi'),
(6, 'React Frontend Developer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, labore? Impedit iure, cum accusamus nemo id libero iusto quisquam suscipit, nisi, incidunt inventore repellat possimus saepe eos. Aut unde, officia deserunt aperiam id minima voluptates fugiat totam explicabo animi quis, velit quaerat, delectus asperiores enim?', '../uploads/post-7.jpg', 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `photo` text NOT NULL,
  `adr` text NOT NULL,
  `otp` bigint(20) NOT NULL,
  `join_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pwd`, `mobile`, `photo`, `adr`, `otp`, `join_id`) VALUES
(2, 'Sagar Aute', 'vitaursoft@gmail.com', 'abc', 7028327450, './uploads/like.png', 'Ratnapur', 184194, 1),
(3, 'Kiran Pawar', 'kiran@gmail.com', '', 9856255326, './uploads/d.jpg', 'Kannad', 0, 1),
(4, 'Ajay', 'ajay@gmail.com', 'Ajay@123', 9856255326, './uploads/a1.jpg', 'Chh,Sambhajinagar', 831253, 1),
(5, 'a', 'a', '', 0, './uploads/f.png', 'a', 0, 1),
(6, '', '', '', 0, './uploads/', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_application`
--

CREATE TABLE `user_application` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `apply_for` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_joining` varchar(255) NOT NULL,
  `date_of_leaving` varchar(255) NOT NULL,
  `experience_year` varchar(255) NOT NULL,
  `add_info` text NOT NULL,
  `join_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_application`
--

INSERT INTO `user_application` (`id`, `full_name`, `email`, `mobile`, `apply_for`, `resume`, `gender`, `date_of_joining`, `date_of_leaving`, `experience_year`, `add_info`, `join_id`) VALUES
(1, 'Kiran Subhash Pawar', 'vitaursoft@gmail.com', 7028327450, 'Java Fullstack Developer', './uploads/resume/d.jpg', 'Male', '2020-03-01', '2025-01-16', '4 Years, 10 Months, 21 Days', 'I Am Fullstack Develper With Any Type Of Domain.', 1),
(2, 'Sagar Sajan Aute', 'Ratnapur', 7028327450, 'Node Js Fullstack Developer', './uploads/resume/Super Mall Modules.docx', 'Male', '2018-12-13', '2025-01-16', '6 Years, 1 Months, 4 Days', 'Fullstack Develper', 2),
(3, 'Ajay Kailas Ghodke', 'ajay@gmail.com', 9856255326, 'Java Fullstack Developer', './uploads/resume/table.html', 'Male', '2025-01-01', '2025-01-18', '0 Years, 0 Months, 17 Days', 'Demo', 4),
(4, 'a', 'a', 0, 'PHP Fullstack', './uploads/resume/samir.jpg', '0', '2024-12-30', '2025-01-25', '0 Years, 0 Months, 26 Days', 'a', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vit_jobs` (`join_id`);

--
-- Indexes for table `user_application`
--
ALTER TABLE `user_application`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_application`
--
ALTER TABLE `user_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `vit_jobs` FOREIGN KEY (`join_id`) REFERENCES `user_application` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
