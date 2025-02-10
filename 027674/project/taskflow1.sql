-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2025 at 07:32 AM
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
-- Database: `taskflow1`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `read_status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `message`, `read_status`, `created_at`) VALUES
(172, 14, 'A new member has joined: SSSS', 'read', '2025-02-08 08:02:44'),
(174, 1, 'User sad has undone their submission for the project: this better work', 'read', '2025-02-08 08:12:07'),
(177, 1, 'User sad has turned in the project: this better work', 'read', '2025-02-08 08:12:29'),
(180, 1, 'User sad has undone their submission for the project: this better work', 'read', '2025-02-08 08:12:33'),
(183, 1, 'User sad has turned in the project: this better work', 'read', '2025-02-08 08:12:39'),
(186, 1, 'User sad has undone their submission for the project: this better work', 'read', '2025-02-08 08:12:45'),
(190, 4, 'fruity_cereal has created a new project: nnn', 'read', '2025-02-08 10:24:23'),
(201, 1, 'User sad has turned in the project: m', 'read', '2025-02-08 10:30:46'),
(204, 1, 'User sad has undone their submission for the project: m', 'read', '2025-02-08 10:30:49'),
(207, 1, 'User sad has turned in the project: m', 'read', '2025-02-08 10:30:51'),
(210, 1, 'User sad has undone their submission for the project: m', 'read', '2025-02-08 10:30:52'),
(213, 1, 'User sad has turned in the project: this better work', 'read', '2025-02-08 10:52:13'),
(216, 1, 'User sad has undone their submission for the project: this better work', 'read', '2025-02-08 10:52:35'),
(221, 4, 'fruity_cereal has created a new project: ok', 'read', '2025-02-08 10:58:22'),
(234, 4, 'fruity_cereal has created a new project: kokok', 'read', '2025-02-08 10:58:35'),
(247, 4, 'fruity_cereal has created a new project: hi', 'read', '2025-02-09 06:02:01'),
(260, 4, 'fruity_cereal has created a new project: down here were lonely', 'read', '2025-02-09 06:56:32'),
(271, 1, 'A new member has joined: ydk', 'read', '2025-02-09 07:51:42'),
(274, 4, 'A new member has joined: ydk', 'read', '2025-02-09 07:51:42'),
(286, 1, 'User sad has turned in the project: this better work', 'read', '2025-02-09 07:59:09'),
(289, 1, 'User sad has undone their submission for the project: this better work', 'read', '2025-02-09 07:59:18'),
(292, 1, 'User sad has turned in the project: this better work', 'read', '2025-02-09 07:59:19'),
(295, 1, 'User sad has undone their submission for the project: this better work', 'read', '2025-02-09 08:35:35'),
(298, 1, 'User sad has turned in the project: this better work', 'read', '2025-02-09 08:36:13'),
(301, 1, 'User sad has undone their submission for the project: this better work', 'read', '2025-02-09 08:36:14'),
(304, 1, 'User sad has turned in the project: this better work', 'read', '2025-02-09 08:36:15'),
(307, 1, 'User sad has undone their submission for the project: yesy', 'read', '2025-02-09 08:54:21'),
(310, 1, 'User sad has turned in the project: yesy', 'read', '2025-02-09 08:54:22'),
(313, 1, 'A new member has joined: Hi', 'read', '2025-02-09 10:11:48'),
(391, 1, 'User sad has turned in the project: some project', 'read', '2025-02-09 10:22:05'),
(392, 2, 'fruity_cereal has created a new project: omg', 'unread', '2025-02-09 10:22:49'),
(393, 3, 'fruity_cereal has created a new project: omg', 'unread', '2025-02-09 10:22:49'),
(394, 4, 'fruity_cereal has created a new project: omg', 'unread', '2025-02-09 10:22:49'),
(395, 5, 'fruity_cereal has created a new project: omg', 'unread', '2025-02-09 10:22:49'),
(396, 17, 'fruity_cereal has created a new project: omg', 'unread', '2025-02-09 10:22:49'),
(397, 2, 'fruity_cereal has created a new project: project 2', 'unread', '2025-02-09 10:23:10'),
(398, 3, 'fruity_cereal has created a new project: project 2', 'unread', '2025-02-09 10:23:10'),
(399, 4, 'fruity_cereal has created a new project: project 2', 'unread', '2025-02-09 10:23:10'),
(400, 5, 'fruity_cereal has created a new project: project 2', 'unread', '2025-02-09 10:23:10'),
(401, 17, 'fruity_cereal has created a new project: project 2', 'unread', '2025-02-09 10:23:10'),
(402, 2, 'fruity_cereal has created a new project: project 3', 'unread', '2025-02-09 10:23:13'),
(403, 3, 'fruity_cereal has created a new project: project 3', 'unread', '2025-02-09 10:23:13'),
(404, 4, 'fruity_cereal has created a new project: project 3', 'unread', '2025-02-09 10:23:13'),
(405, 5, 'fruity_cereal has created a new project: project 3', 'unread', '2025-02-09 10:23:13'),
(406, 17, 'fruity_cereal has created a new project: project 3', 'unread', '2025-02-09 10:23:13'),
(407, 2, 'fruity_cereal has created a new project: project 4', 'unread', '2025-02-09 10:23:15'),
(408, 3, 'fruity_cereal has created a new project: project 4', 'unread', '2025-02-09 10:23:15'),
(409, 4, 'fruity_cereal has created a new project: project 4', 'unread', '2025-02-09 10:23:15'),
(410, 5, 'fruity_cereal has created a new project: project 4', 'unread', '2025-02-09 10:23:15'),
(411, 17, 'fruity_cereal has created a new project: project 4', 'unread', '2025-02-09 10:23:15'),
(412, 2, 'fruity_cereal has created a new project: project 5', 'unread', '2025-02-09 10:23:19'),
(413, 3, 'fruity_cereal has created a new project: project 5', 'unread', '2025-02-09 10:23:19'),
(414, 4, 'fruity_cereal has created a new project: project 5', 'unread', '2025-02-09 10:23:19'),
(415, 5, 'fruity_cereal has created a new project: project 5', 'unread', '2025-02-09 10:23:19'),
(416, 17, 'fruity_cereal has created a new project: project 5', 'unread', '2025-02-09 10:23:19'),
(417, 2, 'fruity_cereal has created a new project: project 6', 'unread', '2025-02-09 10:23:25'),
(418, 3, 'fruity_cereal has created a new project: project 6', 'unread', '2025-02-09 10:23:25'),
(419, 4, 'fruity_cereal has created a new project: project 6', 'unread', '2025-02-09 10:23:25'),
(420, 5, 'fruity_cereal has created a new project: project 6', 'unread', '2025-02-09 10:23:25'),
(421, 17, 'fruity_cereal has created a new project: project 6', 'unread', '2025-02-09 10:23:25'),
(422, 1, 'A new member has joined: Someone', 'read', '2025-02-09 10:24:05'),
(423, 2, 'A new member has joined: Someone', 'unread', '2025-02-09 10:24:05'),
(424, 3, 'A new member has joined: Someone', 'unread', '2025-02-09 10:24:05'),
(425, 4, 'A new member has joined: Someone', 'unread', '2025-02-09 10:24:05'),
(426, 5, 'A new member has joined: Someone', 'unread', '2025-02-09 10:24:05'),
(427, 17, 'A new member has joined: Someone', 'unread', '2025-02-09 10:24:05'),
(428, 18, 'A new member has joined: Someone', 'unread', '2025-02-09 10:24:05'),
(429, 1, 'A new member has joined: plabu', 'read', '2025-02-10 05:19:50'),
(430, 2, 'A new member has joined: plabu', 'unread', '2025-02-10 05:19:50'),
(431, 3, 'A new member has joined: plabu', 'unread', '2025-02-10 05:19:50'),
(432, 4, 'A new member has joined: plabu', 'unread', '2025-02-10 05:19:50'),
(433, 5, 'A new member has joined: plabu', 'unread', '2025-02-10 05:19:50'),
(434, 17, 'A new member has joined: plabu', 'unread', '2025-02-10 05:19:50'),
(435, 18, 'A new member has joined: plabu', 'unread', '2025-02-10 05:19:50'),
(436, 19, 'A new member has joined: plabu', 'read', '2025-02-10 05:19:50'),
(444, 1, 'User plabu has turned in the project: project 3', 'read', '2025-02-10 05:21:19'),
(445, 1, 'User plabu has undone their submission for the project: project 3', 'read', '2025-02-10 05:21:21'),
(446, 1, 'User plabu has turned in the project: omg', 'read', '2025-02-10 05:21:26'),
(447, 2, 'fruity_cereal has created a new project: okkkkkk', 'unread', '2025-02-10 05:22:12'),
(448, 3, 'fruity_cereal has created a new project: okkkkkk', 'unread', '2025-02-10 05:22:12'),
(449, 4, 'fruity_cereal has created a new project: okkkkkk', 'unread', '2025-02-10 05:22:12'),
(450, 5, 'fruity_cereal has created a new project: okkkkkk', 'unread', '2025-02-10 05:22:12'),
(451, 17, 'fruity_cereal has created a new project: okkkkkk', 'unread', '2025-02-10 05:22:12'),
(452, 18, 'fruity_cereal has created a new project: okkkkkk', 'unread', '2025-02-10 05:22:12'),
(453, 19, 'fruity_cereal has created a new project: okkkkkk', 'unread', '2025-02-10 05:22:12'),
(454, 1, 'A new member has joined: cha', 'unread', '2025-02-10 05:25:11'),
(455, 2, 'A new member has joined: cha', 'unread', '2025-02-10 05:25:11'),
(456, 3, 'A new member has joined: cha', 'unread', '2025-02-10 05:25:11'),
(457, 4, 'A new member has joined: cha', 'read', '2025-02-10 05:25:11'),
(458, 5, 'A new member has joined: cha', 'unread', '2025-02-10 05:25:11'),
(459, 17, 'A new member has joined: cha', 'unread', '2025-02-10 05:25:11'),
(460, 18, 'A new member has joined: cha', 'unread', '2025-02-10 05:25:11'),
(461, 19, 'A new member has joined: cha', 'unread', '2025-02-10 05:25:11'),
(462, 20, 'A new member has joined: cha', 'read', '2025-02-10 05:25:11'),
(469, 2, 'fruity_cereal has created a new project: s', 'unread', '2025-02-10 05:42:34'),
(470, 3, 'fruity_cereal has created a new project: s', 'unread', '2025-02-10 05:42:34'),
(471, 4, 'fruity_cereal has created a new project: s', 'read', '2025-02-10 05:42:34'),
(472, 5, 'fruity_cereal has created a new project: s', 'unread', '2025-02-10 05:42:34'),
(473, 17, 'fruity_cereal has created a new project: s', 'unread', '2025-02-10 05:42:34'),
(474, 18, 'fruity_cereal has created a new project: s', 'unread', '2025-02-10 05:42:34'),
(475, 19, 'fruity_cereal has created a new project: s', 'unread', '2025-02-10 05:42:34'),
(476, 20, 'fruity_cereal has created a new project: s', 'unread', '2025-02-10 05:42:34'),
(477, 1, 'User sad has undone their submission for the project: some project', 'unread', '2025-02-10 05:43:20'),
(478, 19, 'User sad has undone their submission for the project: some project', 'unread', '2025-02-10 05:43:20'),
(479, 20, 'User sad has undone their submission for the project: some project', 'unread', '2025-02-10 05:43:20'),
(480, 1, 'User sad has turned in the project: some project', 'unread', '2025-02-10 05:43:21'),
(481, 19, 'User sad has turned in the project: some project', 'unread', '2025-02-10 05:43:21'),
(482, 20, 'User sad has turned in the project: some project', 'unread', '2025-02-10 05:43:21'),
(483, 1, 'User sad has turned in the project: omg', 'unread', '2025-02-10 05:48:25'),
(484, 19, 'User sad has turned in the project: omg', 'unread', '2025-02-10 05:48:25'),
(485, 20, 'User sad has turned in the project: omg', 'unread', '2025-02-10 05:48:25'),
(486, 1, 'User sad has turned in the project: project 5', 'unread', '2025-02-10 05:55:14'),
(487, 19, 'User sad has turned in the project: project 5', 'unread', '2025-02-10 05:55:14'),
(488, 20, 'User sad has turned in the project: project 5', 'unread', '2025-02-10 05:55:14'),
(489, 2, 'fruity_cereal has created a new project: okokok', 'unread', '2025-02-10 06:04:00'),
(490, 3, 'fruity_cereal has created a new project: okokok', 'unread', '2025-02-10 06:04:00'),
(491, 4, 'fruity_cereal has created a new project: okokok', 'read', '2025-02-10 06:04:00'),
(492, 5, 'fruity_cereal has created a new project: okokok', 'unread', '2025-02-10 06:04:00'),
(493, 17, 'fruity_cereal has created a new project: okokok', 'unread', '2025-02-10 06:04:00'),
(494, 18, 'fruity_cereal has created a new project: okokok', 'unread', '2025-02-10 06:04:00'),
(495, 19, 'fruity_cereal has created a new project: okokok', 'unread', '2025-02-10 06:04:00'),
(496, 20, 'fruity_cereal has created a new project: okokok', 'unread', '2025-02-10 06:04:00'),
(497, 1, 'User sad has turned in the project: project 3', 'unread', '2025-02-10 06:04:36'),
(498, 19, 'User sad has turned in the project: project 3', 'unread', '2025-02-10 06:04:36'),
(499, 20, 'User sad has turned in the project: project 3', 'unread', '2025-02-10 06:04:36'),
(500, 1, 'User sad has undone their submission for the project: some project', 'unread', '2025-02-10 06:24:01'),
(501, 19, 'User sad has undone their submission for the project: some project', 'unread', '2025-02-10 06:24:01'),
(502, 20, 'User sad has undone their submission for the project: some project', 'unread', '2025-02-10 06:24:01'),
(503, 1, 'User sad has turned in the project: some project', 'unread', '2025-02-10 06:24:02'),
(504, 19, 'User sad has turned in the project: some project', 'unread', '2025-02-10 06:24:02'),
(505, 20, 'User sad has turned in the project: some project', 'unread', '2025-02-10 06:24:02'),
(506, 1, 'A new member has joined: meijinoobgirl', 'unread', '2025-02-10 06:26:27'),
(507, 2, 'A new member has joined: meijinoobgirl', 'unread', '2025-02-10 06:26:27'),
(508, 3, 'A new member has joined: meijinoobgirl', 'unread', '2025-02-10 06:26:27'),
(509, 4, 'A new member has joined: meijinoobgirl', 'unread', '2025-02-10 06:26:27'),
(510, 5, 'A new member has joined: meijinoobgirl', 'unread', '2025-02-10 06:26:27'),
(511, 17, 'A new member has joined: meijinoobgirl', 'unread', '2025-02-10 06:26:27'),
(512, 18, 'A new member has joined: meijinoobgirl', 'unread', '2025-02-10 06:26:27'),
(513, 19, 'A new member has joined: meijinoobgirl', 'unread', '2025-02-10 06:26:27'),
(514, 20, 'A new member has joined: meijinoobgirl', 'unread', '2025-02-10 06:26:27'),
(515, 21, 'A new member has joined: meijinoobgirl', 'read', '2025-02-10 06:26:27'),
(521, 1, 'meijinoobgirl has created a new project: GPA 4', 'unread', '2025-02-10 06:31:13'),
(522, 2, 'meijinoobgirl has created a new project: GPA 4', 'unread', '2025-02-10 06:31:13'),
(523, 3, 'meijinoobgirl has created a new project: GPA 4', 'unread', '2025-02-10 06:31:13'),
(524, 4, 'meijinoobgirl has created a new project: GPA 4', 'unread', '2025-02-10 06:31:13'),
(525, 5, 'meijinoobgirl has created a new project: GPA 4', 'unread', '2025-02-10 06:31:13'),
(526, 17, 'meijinoobgirl has created a new project: GPA 4', 'unread', '2025-02-10 06:31:13'),
(527, 18, 'meijinoobgirl has created a new project: GPA 4', 'unread', '2025-02-10 06:31:13'),
(528, 19, 'meijinoobgirl has created a new project: GPA 4', 'unread', '2025-02-10 06:31:13'),
(529, 20, 'meijinoobgirl has created a new project: GPA 4', 'unread', '2025-02-10 06:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `description`, `created_by`, `due_date`, `created_at`, `updated_at`) VALUES
(34, 'omg', 'you say what..', 1, '2025-01-26', '2025-02-09 10:22:49', '2025-02-09 10:22:49'),
(35, 'project 2', 'sike', 1, '2025-02-02', '2025-02-09 10:23:10', '2025-02-09 10:24:24'),
(36, 'project 3', NULL, 1, NULL, '2025-02-09 10:23:13', '2025-02-09 10:23:13'),
(37, 'project 4', NULL, 1, NULL, '2025-02-09 10:23:15', '2025-02-09 10:23:15'),
(38, 'project 5', 'hi\r\n', 1, NULL, '2025-02-09 10:23:19', '2025-02-10 06:03:49'),
(39, 'project 6', NULL, 1, NULL, '2025-02-09 10:23:25', '2025-02-09 10:23:25'),
(41, 's', NULL, 1, NULL, '2025-02-10 05:42:34', '2025-02-10 05:42:34'),
(42, 'okokok', 'kkkk', 1, NULL, '2025-02-10 06:04:00', '2025-02-10 06:04:00'),
(43, 'GPA 4', NULL, 21, '2025-02-21', '2025-02-10 06:31:13', '2025-02-10 06:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `turn_ins`
--

CREATE TABLE `turn_ins` (
  `turn_in_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `turned_in_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('On Time','Late') NOT NULL DEFAULT 'On Time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turn_ins`
--

INSERT INTO `turn_ins` (`turn_in_id`, `project_id`, `user_id`, `turned_in_at`, `status`) VALUES
(6, 1, 5, '2025-02-07 10:57:59', 'On Time'),
(11, 9, 4, '2025-02-08 03:40:09', 'Late'),
(12, 9, 4, '2025-02-08 03:40:12', 'Late'),
(13, 9, 4, '2025-02-08 03:40:13', 'Late'),
(14, 9, 4, '2025-02-08 03:40:14', 'Late'),
(15, 10, 4, '2025-02-08 03:42:54', 'On Time'),
(16, 1, 3, '2025-02-08 03:52:18', 'Late'),
(17, 11, 10, '2025-02-08 04:50:29', 'On Time'),
(18, 9, 10, '2025-02-08 04:51:47', 'On Time'),
(19, 4, 10, '2025-02-08 04:52:44', 'On Time'),
(20, 4, 3, '2025-02-08 07:25:08', 'On Time'),
(29, 1, 4, '2025-02-09 08:36:15', 'Late'),
(30, 4, 4, '2025-02-09 08:54:22', 'On Time'),
(33, 34, 19, '2025-02-10 05:21:26', 'Late'),
(35, 34, 4, '2025-02-10 05:48:25', 'Late'),
(36, 38, 4, '2025-02-10 05:55:14', 'On Time'),
(37, 36, 4, '2025-02-10 06:04:36', 'On Time');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') DEFAULT 'member',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'fruity_cereal', 'ok', 'admin', '2025-02-07 08:49:30', '2025-02-07 08:50:28'),
(2, 'idk', 'ok', 'member', '2025-02-07 08:51:26', '2025-02-07 08:51:26'),
(3, 'gfsprettycool', 'notasme', 'member', '2025-02-07 09:12:29', '2025-02-07 09:12:29'),
(4, 'sad', 'sad', 'member', '2025-02-07 09:14:50', '2025-02-07 09:14:50'),
(5, 'ok', 'ok', 'member', '2025-02-07 10:57:52', '2025-02-07 10:57:52'),
(17, 'everyday', 'Hi1234', 'member', '2025-02-09 10:12:35', '2025-02-09 10:12:35'),
(18, 'Someone', 'Someone1', 'member', '2025-02-09 10:24:05', '2025-02-09 10:24:05'),
(19, 'plabu', 'PLABU8', 'admin', '2025-02-10 05:19:50', '2025-02-10 05:25:46'),
(20, 'cha', 'Bobby888', 'admin', '2025-02-10 05:25:11', '2025-02-10 05:25:51'),
(21, 'meijinoobgirl', 'Capi123', 'admin', '2025-02-10 06:26:27', '2025-02-10 06:26:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `turn_ins`
--
ALTER TABLE `turn_ins`
  ADD PRIMARY KEY (`turn_in_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `turn_ins`
--
ALTER TABLE `turn_ins`
  MODIFY `turn_in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `turn_ins`
--
ALTER TABLE `turn_ins`
  ADD CONSTRAINT `turn_ins_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  ADD CONSTRAINT `turn_ins_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
