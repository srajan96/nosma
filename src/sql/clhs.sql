-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2016 at 07:02 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_users`
--

CREATE TABLE `active_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_users`
--

INSERT INTO `active_users` (`id`, `user`, `session_id`, `hash`, `expires`) VALUES
(3, 1, '9bkc6onsl3tb49iuh1je9phtc3', 'b8dbf0247a28e4a6556d93c43a7bc1c99e48e633fc40abdb98f94b21884b0680736cea689982aa6457113bd62cdd9fa1d4e7cad0e4732d69a4721c8858ab872f', 1473787007),
(4, 1, '9bkc6onsl3tb49iuh1je9phtc3', 'b8dbf0247a28e4a6556d93c43a7bc1c99e48e633fc40abdb98f94b21884b0680736cea689982aa6457113bd62cdd9fa1d4e7cad0e4732d69a4721c8858ab872f', 1473787007),
(5, 1, '9bkc6onsl3tb49iuh1je9phtc3', 'b8dbf0247a28e4a6556d93c43a7bc1c99e48e633fc40abdb98f94b21884b0680736cea689982aa6457113bd62cdd9fa1d4e7cad0e4732d69a4721c8858ab872f', 1473787007),
(6, 1, '9bkc6onsl3tb49iuh1je9phtc3', 'b8dbf0247a28e4a6556d93c43a7bc1c99e48e633fc40abdb98f94b21884b0680736cea689982aa6457113bd62cdd9fa1d4e7cad0e4732d69a4721c8858ab872f', 1473787007);

-- --------------------------------------------------------

--
-- Table structure for table `batting_scorecard`
--

CREATE TABLE `batting_scorecard` (
  `s_match_id` int(11) NOT NULL DEFAULT '0',
  `s_player_id` int(11) NOT NULL DEFAULT '0',
  `s_runs` int(11) DEFAULT NULL,
  `s_balls_faced` int(11) DEFAULT NULL,
  `s_fours` int(11) DEFAULT NULL,
  `s_sixes` int(11) DEFAULT NULL,
  `s_caught_by` int(11) DEFAULT NULL,
  `s_bowled_by` int(11) DEFAULT NULL,
  `s_league_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bowling_scorecard`
--

CREATE TABLE `bowling_scorecard` (
  `s_match_id` int(11) NOT NULL DEFAULT '0',
  `s_player_id` int(11) NOT NULL DEFAULT '0',
  `s_overs` int(11) DEFAULT NULL,
  `s_wickets` int(11) DEFAULT NULL,
  `s_maiden_overs` int(11) DEFAULT NULL,
  `s_wides` int(11) DEFAULT NULL,
  `s_no_balls` int(11) DEFAULT NULL,
  `s_leg_byes` int(11) DEFAULT NULL,
  `s_league_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commentary`
--

CREATE TABLE `commentary` (
  `innings_id` int(11) NOT NULL DEFAULT '0',
  `ball_number` int(11) NOT NULL DEFAULT '0',
  `comment` varchar(255) DEFAULT NULL,
  `result_of_ball` varchar(20) DEFAULT NULL,
  `fixture_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `f_match_id` int(11) NOT NULL,
  `f_team1_id` int(11) DEFAULT NULL,
  `f_team2_id` int(11) DEFAULT NULL,
  `f_venue` int(11) DEFAULT NULL,
  `f_date` date DEFAULT NULL,
  `f_winner_id` int(11) DEFAULT NULL,
  `f_league_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grounds`
--

CREATE TABLE `grounds` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(40) DEFAULT NULL,
  `g_city` varchar(40) DEFAULT NULL,
  `g_country` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grounds`
--

INSERT INTO `grounds` (`g_id`, `g_name`, `g_city`, `g_country`) VALUES
(2, 'Wankhede', 'Mumbai', 'India'),
(3, 'Lords', 'London', 'England'),
(5, 'Holkar', 'Indore', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(40) DEFAULT NULL,
  `l_winner` varchar(40) DEFAULT NULL,
  `l_sixes` int(11) DEFAULT NULL,
  `l_fours` int(11) DEFAULT NULL,
  `l_wickets` int(11) DEFAULT NULL,
  `l_overs` int(11) DEFAULT NULL,
  `l_start_date` date NOT NULL,
  `l_win_points` int(11) NOT NULL,
  `l_user_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`l_id`, `l_name`, `l_winner`, `l_sixes`, `l_fours`, `l_wickets`, `l_overs`, `l_start_date`, `l_win_points`, `l_user_id`) VALUES
(4, 'kl', NULL, NULL, NULL, NULL, 16, '9877-06-05', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(40) DEFAULT NULL,
  `p_dob` date DEFAULT NULL,
  `p_runs` int(11) DEFAULT '0',
  `p_wickets` int(11) DEFAULT '0',
  `p_strike_rate` decimal(10,0) DEFAULT '0',
  `p_economy` decimal(10,0) DEFAULT '0',
  `p_average` decimal(10,0) DEFAULT '0',
  `p_batting_style` varchar(40) DEFAULT NULL,
  `p_bowling_style` varchar(40) DEFAULT NULL,
  `p_team_id` int(11) DEFAULT NULL,
  `p_league_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`p_id`, `p_name`, `p_dob`, `p_runs`, `p_wickets`, `p_strike_rate`, `p_economy`, `p_average`, `p_batting_style`, `p_bowling_style`, `p_team_id`, `p_league_id`) VALUES
(1, 'Sachin Tendulkar', '1978-09-07', 0, 0, '0', '0', '0', 'Right Hand Batsman', 'Right Hand Leg Spin', NULL, 0),
(2, 'Virat Kohli', '1298-02-25', 0, 0, '0', '0', '0', 'Right Hand Batsman', 'Left Hand Medium', NULL, 0),
(3, 'Akshay Vyas', '1995-02-05', 0, 0, '0', '0', '0', 'Right Hand Batsman', 'Right Hand Slow', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(40) DEFAULT NULL,
  `t_coach` varchar(40) DEFAULT NULL,
  `t_captain_id` int(11) DEFAULT NULL,
  `t_league_id` int(11) DEFAULT NULL,
  `t_points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `umpfix`
--

CREATE TABLE `umpfix` (
  `umpire_id` int(11) NOT NULL DEFAULT '0',
  `fixture_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `umpires`
--

CREATE TABLE `umpires` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(40) DEFAULT NULL,
  `u_experience` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `umpires`
--

INSERT INTO `umpires` (`u_id`, `u_name`, `u_experience`) VALUES
(2, 'Simon Tafuel', 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`) VALUES
(1, 'admin', 'Administrator', 'srajan1996@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_users`
--
ALTER TABLE `active_users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `batting_scorecard`
--
ALTER TABLE `batting_scorecard`
  ADD PRIMARY KEY (`s_match_id`,`s_player_id`,`s_league_id`);

--
-- Indexes for table `bowling_scorecard`
--
ALTER TABLE `bowling_scorecard`
  ADD PRIMARY KEY (`s_match_id`,`s_player_id`,`s_league_id`);

--
-- Indexes for table `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`fixture_id`,`innings_id`,`ball_number`);

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`f_match_id`);

--
-- Indexes for table `grounds`
--
ALTER TABLE `grounds`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_captain_id` (`t_captain_id`);

--
-- Indexes for table `umpfix`
--
ALTER TABLE `umpfix`
  ADD PRIMARY KEY (`umpire_id`,`fixture_id`);

--
-- Indexes for table `umpires`
--
ALTER TABLE `umpires`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_users`
--
ALTER TABLE `active_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `grounds`
--
ALTER TABLE `grounds`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `umpires`
--
ALTER TABLE `umpires`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`t_captain_id`) REFERENCES `players` (`p_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
