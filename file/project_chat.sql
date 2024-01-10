-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2020 at 01:41 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `chat_pengirim` int(11) NOT NULL,
  `chat_penerima` int(11) NOT NULL,
  `chat_isi` text COLLATE utf8mb4_bin NOT NULL,
  `chat_waktu` datetime NOT NULL,
  `chat_status` int(11) NOT NULL,
  `chat_tipe` varchar(10) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `online_id` int(11) NOT NULL,
  `online_pengirim` int(11) NOT NULL,
  `online_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_foto` text,
  `user_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_nama`, `user_password`, `user_foto`, `user_status`) VALUES
(1, 'rahmad@gmail.com', 'Rahmat Syah Jaya', '6ad14ba9986e3615423dfca256d04e3f', '186312963_Kevin-Micnick.jpg', 'online'),
(2, 'junaidi@gmail.com', 'Junaidi', '6ad14ba9986e3615423dfca256d04e3f', '410522440_poco.jpg', 'offline'),
(3, 'wendy@gmail.com', 'Wendy Waka', '6ad14ba9986e3615423dfca256d04e3f', '', 'online'),
(4, 'jhony@gmail.com', 'Jhony Rambo', '6ad14ba9986e3615423dfca256d04e3f', '', 'online'),
(6, 'malasngoding@gmail.com', 'Malas Ngoding', '6ad14ba9986e3615423dfca256d04e3f', '989315468_avatar1.png', 'online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`online_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `online_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
