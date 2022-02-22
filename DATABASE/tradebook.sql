-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 07:35 AM
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
-- Database: `tradebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `server` enum('mt4','mt5') NOT NULL DEFAULT 'mt5',
  `leverage` varchar(210) NOT NULL,
  `basecur` varchar(250) NOT NULL,
  `account` int(11) NOT NULL,
  `cpassword` varchar(120) NOT NULL,
  `cipassword` varchar(120) NOT NULL,
  `cppassword` varchar(120) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `server`, `leverage`, `basecur`, `account`, `cpassword`, `cipassword`, `cppassword`, `created_at`, `updated_at`) VALUES
(1, 32, 'mt5', '20', 'USD', 548730, '12345', '12345', '12345', '2021-04-29 21:38:55', '2021-05-01 07:07:04'),
(2, 33, 'mt5', '20', 'USD', 847731, '12345', '12345', '12345', '2021-05-01 11:42:11', '2021-05-01 05:42:11'),
(3, 34, 'mt5', '20', 'USD', 847898, '12345', '12345', '12345', '2021-05-01 11:44:58', '2021-05-01 05:44:58'),
(4, 35, 'mt5', '20', 'USD', 847959, '12345', '12345', '12345', '2021-05-01 11:45:59', '2021-05-01 05:45:59'),
(5, 36, 'mt5', '20', 'USD', 849449, '12345', '12345', '12345', '2021-05-01 12:10:49', '2021-05-01 06:10:49'),
(6, 37, 'mt5', '20', 'USD', 973487, '12345', '12345', '12345', '2021-12-20 10:11:27', '2021-12-20 04:11:27'),
(7, 38, 'mt5', '20', 'USD', 11095, '12345', '12345', '12345', '2022-01-01 10:24:55', '2022-01-01 04:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(19) NOT NULL,
  `attachmentable_id` bigint(19) DEFAULT NULL,
  `attachmentable_type` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `attachmentable_id`, `attachmentable_type`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'post', 'img-20210410-60719b37d0d95.jpg', '2021-04-10 18:33:59', '2021-04-10 12:33:59'),
(4, 5, 'comment', 'img-20210411-6072b10c18dc9.jpg', '2021-04-11 14:19:24', '2021-04-11 08:19:24'),
(5, 15, 'post', 'img-20210419-607d8de011464.jpg', '2021-04-19 20:04:16', '2021-04-19 14:04:16'),
(6, 8, 'comment', 'img-20210419-607d8e1e119a5.jpg', '2021-04-19 20:05:18', '2021-04-19 14:05:18'),
(7, 17, 'post', 'img-20210419-607d917a8751a.jpg', '2021-04-19 20:19:38', '2021-04-19 14:19:38'),
(8, 9, 'comment', 'img-20210419-607d91c345464.jpg', '2021-04-19 20:20:51', '2021-04-19 14:20:51'),
(9, 12, 'comment', 'img-20210501-608cef601fc77.png', '2021-05-01 12:04:16', '2021-05-01 06:04:16'),
(10, 13, 'comment', 'img-20210501-608cf341af47d.jpg', '2021-05-01 12:20:49', '2021-05-01 06:20:49'),
(11, 14, 'comment', 'img-20210507-6095085ebd3a0.png', '2021-05-07 15:29:02', '2021-05-07 09:29:02'),
(12, 62, 'post', 'img-20210510-60992bae9e719.jpg', '2021-05-10 18:48:46', '2021-05-10 12:48:46'),
(13, 65, 'post', 'img-20211218-61bdd58a335da.jpg', '2021-12-18 18:35:22', '2021-12-18 12:35:22'),
(16, 10, 'reply', NULL, '2021-12-22 11:41:22', '2021-12-22 05:41:22'),
(102, 38, 'user', '1641356499.png', '2022-01-05 10:21:39', '2022-01-05 09:36:17'),
(104, 2, 'user', '1641377992.png', '2022-01-05 16:19:52', '2022-01-05 10:19:52'),
(105, 29, 'user', '1641378301.png', '2022-01-05 16:25:01', '2022-01-05 10:25:01'),
(106, 19, 'user', '1641378498.png', '2022-01-05 16:28:18', '2022-01-05 10:28:18'),
(107, 31, 'user', '1641386339.png', '2022-01-05 18:38:59', '2022-01-05 12:38:59'),
(111, 38, 'cover_image', '1641474675.png', '2022-01-06 19:11:16', '2022-01-06 13:11:16'),
(112, 38, 'cover_image', '1641474707.png', '2022-01-06 19:11:47', '2022-01-06 13:11:47'),
(113, 38, 'cover_image', '1641474855.png', '2022-01-06 19:14:15', '2022-01-06 13:14:15'),
(114, 38, 'cover_image', '1641474917.png', '2022-01-06 19:15:17', '2022-01-06 13:15:17'),
(115, 38, 'cover_image', '1641475518.png', '2022-01-06 19:25:18', '2022-01-06 13:25:18'),
(116, 38, 'cover_image', '1641475589.png', '2022-01-06 19:26:29', '2022-01-06 13:26:29'),
(117, 38, 'cover_image', '1641475711.png', '2022-01-06 19:28:31', '2022-01-06 13:28:31'),
(118, 38, 'cover_image', '1641475782.png', '2022-01-06 19:29:42', '2022-01-06 13:29:42'),
(119, 38, 'cover_image', '1641475827.png', '2022-01-06 19:30:27', '2022-01-06 13:30:27'),
(120, 38, 'cover_image', '1641475870.png', '2022-01-06 19:31:10', '2022-01-06 13:31:10'),
(121, 38, 'cover_image', '1641476026.png', '2022-01-06 19:33:46', '2022-01-06 13:33:46'),
(122, 2, 'cover_image', '1641476317.png', '2022-01-06 19:38:37', '2022-01-06 13:38:37'),
(123, 38, 'cover_image', '1641476631.png', '2022-01-06 19:43:51', '2022-01-06 13:43:51'),
(124, 38, 'cover_image', '1641477234.png', '2022-01-06 19:53:54', '2022-01-06 13:53:54'),
(125, 38, 'cover_image', '1641477278.png', '2022-01-06 19:54:38', '2022-01-06 13:54:38'),
(126, 38, 'cover_image', '1641477617.png', '2022-01-06 20:00:17', '2022-01-06 14:00:17'),
(127, 29, 'cover_image', '1641966368.png', '2022-01-12 11:46:08', '2022-01-12 05:46:08'),
(128, 83, 'comment', 'img-20220112-61de6c39196cd.jpeg', '2022-01-12 06:50:49', '2022-01-12 00:50:49'),
(129, 38, 'user', '1641967525.png', '2022-01-12 12:05:25', '2022-01-12 06:05:25'),
(130, 38, 'cover_image', '1641967578.png', '2022-01-12 12:06:18', '2022-01-12 06:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `comment` longtext NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `comment_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `comment_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'I am good to comment', 1, 27, '2021-04-10 07:32:11', '2021-04-10 07:32:11', NULL),
(2, 'Post for comment', 1, 27, '2021-04-10 07:32:56', '2021-04-10 07:32:56', NULL),
(3, 'This is comment type', 1, 27, '2021-04-10 23:55:45', '2021-04-10 23:55:45', NULL),
(4, 'Comment without image', 1, 27, '2021-04-11 00:22:15', '2021-04-11 00:22:15', NULL),
(5, 'I am arif. I am here to comment to you', 5, 27, '2021-04-11 02:19:24', '2021-04-11 02:19:24', NULL),
(6, 'Comment 1', 16, 29, '2021-04-19 10:04:51', '2021-04-19 10:04:51', NULL),
(7, 'Comment 1', 16, 29, '2021-04-19 10:04:55', '2021-04-19 10:04:55', NULL),
(8, 'Comment with image', 16, 29, '2021-04-19 10:05:18', '2021-04-19 10:05:18', NULL),
(9, 'I am comment', 18, 27, '2021-04-19 10:20:51', '2021-04-19 10:20:51', NULL),
(10, 'demo 3', 26, 35, '2021-05-01 01:58:03', '2021-05-01 01:58:03', NULL),
(11, 'demo 3 ggg', 26, 35, '2021-05-01 01:59:12', '2021-05-01 01:59:12', NULL),
(12, 'demo 3', 25, 35, '2021-05-01 02:04:16', '2021-05-01 02:04:16', NULL),
(13, 'test', 24, 36, '2021-05-01 02:20:49', '2021-05-01 02:20:49', NULL),
(14, 'O you are roni', 36, 27, '2021-05-07 05:29:02', '2021-05-07 05:29:02', NULL),
(15, 'kkkkk BBBBBBB CCCCCCCCC', 50, 27, '2021-05-08 07:28:01', '2021-05-08 07:28:01', NULL),
(16, 'dfgdf gdfg', 47, 27, '2021-05-08 07:36:57', '2021-05-08 07:36:57', NULL),
(17, 'asd \r\n', 43, 27, '2021-05-08 08:26:06', '2021-05-08 08:26:06', NULL),
(18, 'asd \r\n', 43, 27, '2021-05-08 08:26:19', '2021-05-08 08:26:19', NULL),
(19, 'I am test comment', 51, 27, '2021-05-08 08:33:13', '2021-05-08 08:33:13', NULL),
(20, 'gg gh', 50, 5, '2021-05-08 09:26:16', '2021-05-08 09:26:16', NULL),
(21, 'gg gh', 50, 5, '2021-05-08 09:26:25', '2021-05-08 09:26:25', NULL),
(22, 'I am feet to go', 51, 5, '2021-05-08 09:27:53', '2021-05-08 09:27:53', NULL),
(23, 'Comment test', 51, 5, '2021-05-08 11:07:30', '2021-05-08 11:07:30', NULL),
(24, 'df sdfsfd', 52, 5, '2021-05-09 01:30:51', '2021-05-09 01:30:51', NULL),
(25, 'sdf sdfsf', 51, 5, '2021-05-09 01:31:12', '2021-05-09 01:31:12', NULL),
(26, 'sdf sdfsf', 51, 5, '2021-05-09 01:31:17', '2021-05-09 01:31:17', NULL),
(27, 'ok gtr cr', 54, 27, '2021-05-09 01:51:36', '2021-05-09 01:51:36', NULL),
(28, 'fg dgdg', 54, 27, '2021-05-09 01:55:59', '2021-05-09 01:55:59', NULL),
(29, 'R f fg fg fgfg', 54, 27, '2021-05-09 02:45:54', '2021-05-09 02:45:54', NULL),
(30, 'hay you', 61, 27, '2021-05-09 07:47:41', '2021-05-09 07:47:41', NULL),
(31, 'What can I do for you?', 61, 5, '2021-05-09 07:48:41', '2021-05-09 07:48:41', NULL),
(32, 'I am ready to go', 61, 27, '2021-05-09 08:00:07', '2021-05-09 08:00:07', NULL),
(33, 'O k go you now', 61, 27, '2021-05-09 08:03:02', '2021-05-09 08:03:02', NULL),
(34, 'Abcdefghijklmonp', 61, 27, '2021-05-09 08:06:26', '2021-05-09 08:06:26', NULL),
(35, 'Abcdefghijklmonp', 61, 27, '2021-05-09 08:07:59', '2021-05-09 08:07:59', NULL),
(36, 'ret etret', 61, 27, '2021-05-09 08:08:41', '2021-05-09 08:08:41', NULL),
(37, 'tyu tyutyu', 61, 27, '2021-05-09 08:09:56', '2021-05-09 08:09:56', NULL),
(38, 'uyi yui', 59, 27, '2021-05-09 08:12:35', '2021-05-09 08:12:35', NULL),
(39, 'fh fhf hfh', 59, 27, '2021-05-09 08:14:25', '2021-05-09 08:14:25', NULL),
(40, 'dfh dfhd h', 59, 27, '2021-05-09 08:17:27', '2021-05-09 08:17:27', NULL),
(41, 'dfh dfhd h', 59, 27, '2021-05-09 08:18:31', '2021-05-09 08:18:31', NULL),
(42, 'ghj gjgj', 58, 27, '2021-05-09 08:19:01', '2021-05-09 08:19:01', NULL),
(43, 'gh fghfh', 58, 27, '2021-05-09 08:21:13', '2021-05-09 08:21:13', NULL),
(44, 'gh fghfh', 58, 27, '2021-05-09 08:21:16', '2021-05-09 08:21:16', NULL),
(45, 'gh fghfh', 58, 27, '2021-05-09 08:21:18', '2021-05-09 08:21:18', NULL),
(46, 'gh fghfh', 58, 27, '2021-05-09 08:21:19', '2021-05-09 08:21:19', NULL),
(47, 'gh fghfh', 58, 27, '2021-05-09 08:21:19', '2021-05-09 08:21:19', NULL),
(48, 'gh fghfh', 58, 27, '2021-05-09 08:21:20', '2021-05-09 08:21:20', NULL),
(49, 'gh fghfh', 58, 27, '2021-05-09 08:21:20', '2021-05-09 08:21:20', NULL),
(50, 'gh fghfh', 58, 27, '2021-05-09 08:21:21', '2021-05-09 08:21:21', NULL),
(51, 'hh hgjhj ghjf', 60, 27, '2021-05-09 08:25:48', '2021-05-09 08:25:48', NULL),
(52, 'hh hgjhj ghjf', 60, 27, '2021-05-09 08:28:42', '2021-05-09 08:28:42', NULL),
(53, 'yutyutu tyu', 61, 27, '2021-05-09 08:29:20', '2021-05-09 08:29:20', NULL),
(54, 'ple okk', 61, 27, '2021-05-09 08:34:52', '2021-05-09 08:34:52', NULL),
(55, 'kkkk   hhhhh', 61, 27, '2021-05-09 08:58:36', '2021-05-09 08:58:36', NULL),
(56, '554545', 61, 27, '2021-05-09 09:00:18', '2021-05-09 09:00:18', NULL),
(57, 'I agree your post', 62, 5, '2021-05-10 08:49:37', '2021-05-10 08:49:37', NULL),
(58, 'It would be better if you help me', 64, 2, '2021-12-18 05:24:26', '2021-12-18 05:24:26', NULL),
(59, 'I am here to help you', 64, 28, '2021-12-18 05:50:37', '2021-12-18 05:50:37', NULL),
(60, 'where have you been for so long', 64, 28, '2021-12-18 05:59:40', '2021-12-18 05:59:40', NULL),
(61, 'Oh, Yes I am  ready to help you', 64, 27, '2021-12-18 06:15:20', '2021-12-18 06:15:20', NULL),
(62, 'hfkfyhryruri', 60, 2, '2021-12-18 23:52:51', '2021-12-18 23:52:51', NULL),
(63, 'nice post\r\n', 86, 37, '2021-12-20 23:59:24', '2021-12-20 23:59:24', NULL),
(64, 'yes', 86, 37, '2021-12-20 23:59:42', '2021-12-20 23:59:42', NULL),
(65, 'hi', 85, 37, '2021-12-21 04:00:44', '2021-12-21 04:00:44', NULL),
(66, 'Hi ', 4, 37, '2021-12-21 09:19:06', '2021-12-21 09:19:06', NULL),
(67, 'i am commenting here', 87, 37, '2021-12-22 00:07:43', '2021-12-22 00:07:43', NULL),
(68, 'another comment', 85, 37, '2021-12-22 00:24:11', '2021-12-22 00:24:11', NULL),
(69, 'good', 6, 37, '2021-12-22 06:54:54', '2021-12-22 06:54:54', NULL),
(70, 'This is my another comment \r\n', 87, 37, '2021-12-22 23:33:15', '2021-12-22 23:33:15', NULL),
(71, 'comment', 15, 37, '2021-12-22 23:35:07', '2021-12-22 23:35:07', NULL),
(72, 'I am commenting\r\n', 4, 37, '2021-12-22 23:46:53', '2021-12-22 23:46:53', NULL),
(73, 'comment here', 14, 31, '2021-12-23 08:43:23', '2021-12-23 08:43:23', NULL),
(74, 'I am comment also', 5, 37, '2021-12-25 02:04:53', '2021-12-25 02:04:53', NULL),
(75, 'hi', 91, 37, '2021-12-29 07:26:16', '2021-12-29 07:26:16', NULL),
(76, 'hi', 91, 37, '2021-12-29 07:26:18', '2021-12-29 07:26:18', NULL),
(77, 'hi', 91, 37, '2021-12-29 07:26:20', '2021-12-29 07:26:20', NULL),
(78, 'hi', 91, 37, '2021-12-29 07:26:22', '2021-12-29 07:26:22', NULL),
(79, 'I am commenting here', 94, 19, '2022-01-05 06:47:11', '2022-01-05 06:47:11', NULL),
(80, 'This is my another comment ', 94, 19, '2022-01-05 07:05:51', '2022-01-05 07:05:51', NULL),
(81, 'This is third comment', 94, 19, '2022-01-05 07:20:05', '2022-01-05 07:20:05', NULL),
(82, 'I can comment everywhere', 93, 19, '2022-01-05 07:20:42', '2022-01-05 07:20:42', NULL),
(83, 'comment with photo', 96, 29, '2022-01-12 00:50:49', '2022-01-12 00:50:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `follow_id` bigint(20) NOT NULL,
  `main` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `follow_id`, `main`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 27, 29, 1, '2021-04-24 19:13:47', '2021-04-26 10:27:16', NULL),
(6, 29, 27, 0, '2021-04-24 19:13:47', '2021-04-24 13:13:47', NULL),
(7, 29, 28, 1, '2021-04-26 13:11:40', '2021-04-26 07:11:40', NULL),
(8, 28, 29, 0, '2021-04-26 13:11:40', '2021-04-26 07:11:40', NULL),
(27, 27, 36, 1, '2021-05-04 08:52:29', '2021-05-04 02:52:29', NULL),
(28, 36, 27, 0, '2021-05-04 08:52:29', '2021-05-04 02:52:29', NULL),
(139, 2, 38, 1, '2022-01-06 14:40:27', '2022-01-06 08:40:27', NULL),
(140, 38, 2, 0, '2022-01-06 14:40:27', '2022-01-06 08:40:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `friend_id` bigint(20) NOT NULL,
  `main` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `main`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 27, 5, 1, '2021-04-24 18:05:26', '2021-04-26 10:28:58', NULL),
(12, 5, 27, 0, '2021-04-24 18:05:26', '2021-04-24 12:05:26', NULL),
(19, 27, 28, 1, '2021-04-24 18:05:49', '2021-04-26 10:29:18', NULL),
(20, 28, 27, 0, '2021-04-24 18:05:49', '2021-04-24 12:05:49', NULL),
(21, 29, 28, 1, '2021-04-26 13:11:37', '2021-04-26 07:11:37', NULL),
(22, 28, 29, 0, '2021-04-26 13:11:37', '2021-04-26 07:11:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hb_country`
--

CREATE TABLE `hb_country` (
  `iso` char(2) NOT NULL,
  `printable_name` varchar(80) NOT NULL,
  `numcode` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hb_country`
--

INSERT INTO `hb_country` (`iso`, `printable_name`, `numcode`) VALUES
('AD', 'Andorra', 376),
('AE', 'United Arab Emirates', 971),
('AF', 'Afghanistan', 93),
('AG', 'Antigua and Barbuda', 268),
('AL', 'Albania', 355),
('AO', 'Angola', 244),
('AQ', 'Antarctica', 672),
('AR', 'Argentina', 54),
('AT', 'Austria', 43),
('AU', 'Australia', 61),
('AZ', 'Azerbaijan', 994),
('BA', 'Bosnia and Herzegovina', 387),
('BB', 'Barbados', 246),
('BD', 'Bangladesh', 880),
('BE', 'Belgium', 32),
('BF', 'Burkina Faso', 226),
('BG', 'Bulgaria', 359),
('BH', 'Bahrain', 973),
('BJ', 'Benin', 229),
('BN', 'Brunei Darussalam', 673),
('BO', 'Bolivia', 591),
('BR', 'Brazil', 55),
('BS', 'Bahamas', 242),
('BT', 'Bhutan', 975),
('BW', 'Botswana', 267),
('BY', 'Belarus', 375),
('BZ', 'Belize', 501),
('CA', 'Canada', 1),
('CF', 'Central African Republic', 236),
('CG', 'Congo', 242),
('CH', 'Switzerland', 41),
('CI', 'Cote D\'Ivoire', 384),
('CL', 'Chile', 56),
('CM', 'Cameroon', 237),
('CN', 'China', 86),
('CO', 'Colombia', 57),
('CR', 'Costa Rica', 506),
('CU', 'Cuba', 53),
('CV', 'Cape Verde', 132),
('CY', 'Cyprus', 357),
('CZ', 'Czech Republic', 420),
('DE', 'Germany', 49),
('DJ', 'Djibouti', 253),
('DK', 'Denmark', 45),
('DM', 'Dominica', 767),
('DO', 'Dominican Republic', 839),
('DZ', 'Algeria', 213),
('EC', 'Ecuador', 593),
('EE', 'Estonia', 372),
('EG', 'Egypt', 20),
('ER', 'Eritrea', 291),
('ES', 'Spain', 34),
('ET', 'Ethiopia', 231),
('FI', 'Finland', 358),
('FJ', 'Fiji', 242),
('FK', 'Falkland Islands (Malvinas)', 500),
('FM', 'Micronesia, Federated States of', 691),
('FR', 'France', 33),
('GA', 'Gabon', 241),
('GD', 'Grenada', 473),
('GE', 'Georgia', 995),
('GH', 'Ghana', 233),
('GL', 'Greenland', 299),
('GM', 'Gambia', 220),
('GN', 'Guinea', 324),
('GQ', 'Equatorial Guinea', 240),
('GR', 'Greece', 30),
('GT', 'Guatemala', 502),
('GU', 'Guam', 670),
('GW', 'Guinea-Bissau', 245),
('GY', 'Guyana', 592),
('HK', 'Hong Kong', 852),
('HN', 'Honduras', 504),
('HR', 'Croatia', 385),
('HT', 'Haiti', 509),
('HU', 'Hungary', 36),
('ID', 'Indonesia', 62),
('IE', 'Ireland', 353),
('IL', 'Israel', 972),
('IN', 'India', 91),
('IQ', 'Iraq', 964),
('IR', 'Iran, Islamic Republic of', 98),
('IS', 'Iceland', 354),
('IT', 'Italy', 39),
('JM', 'Jamaica', 876),
('JO', 'Jordan', 962),
('JP', 'Japan', 81),
('KE', 'Kenya', 254),
('KG', 'Kyrgyzstan', 417),
('KH', 'Cambodia', 855),
('KI', 'Kiribati', 686),
('KM', 'Comoros', 269),
('KP', 'Korea, Democratic People\'s Republic of', 850),
('KR', 'Korea, Republic of', 82),
('KW', 'Kuwait', 965),
('KZ', 'Kazakhstan', 7),
('LA', 'Lao People\'s Democratic Republic', 418),
('LB', 'Lebanon', 961),
('LC', 'Saint Lucia', 662),
('LI', 'Liechtenstein', 41),
('LK', 'Sri Lanka', 94),
('LR', 'Liberia', 231),
('LS', 'Lesotho', 266),
('LT', 'Lithuania', 370),
('LU', 'Luxembourg', 352),
('LV', 'Latvia', 371),
('LY', 'Libyan Arab Jamahiriya', 218),
('MA', 'Morocco', 212),
('MD', 'Moldova, Republic of', 373),
('MG', 'Madagascar', 261),
('MH', 'Marshall Islands', 692),
('MK', 'Macedonia, the Former Yugoslav Republic of', 807),
('ML', 'Mali', 466),
('MN', 'Mongolia', 976),
('MR', 'Mauritania', 222),
('MT', 'Malta', 356),
('MU', 'Mauritius', 230),
('MV', 'Maldives', 960),
('MW', 'Malawi', 265),
('MX', 'Mexico', 52),
('MY', 'Malaysia', 60),
('MZ', 'Mozambique', 258),
('NA', 'Namibia', 264),
('NE', 'Niger', 227),
('NG', 'Nigeria', 234),
('NI', 'Nicaragua', 505),
('NL', 'Netherlands', 31),
('NO', 'Norway', 47),
('NP', 'Nepal', 977),
('NR', 'Nauru', 674),
('NZ', 'New Zealand', 64),
('OM', 'Oman', 968),
('PA', 'Panama', 507),
('PE', 'Peru', 51),
('PG', 'Papua New Guinea', 675),
('PH', 'Philippines', 63),
('PK', 'Pakistan', 92),
('PL', 'Poland', 48),
('PS', 'Palestinian Territory, Occupied', NULL),
('PT', 'Portugal', 351),
('PY', 'Paraguay', 595),
('QA', 'Qatar', 974),
('RO', 'Romania', 40),
('RU', 'Russian Federation', 7),
('RW', 'Rwanda', 250),
('SA', 'Saudi Arabia', 966),
('SB', 'Solomon Islands', 677),
('SC', 'Seychelles', 690),
('SD', 'Sudan', 249),
('SE', 'Sweden', 46),
('SG', 'Singapore', 65),
('SI', 'Slovenia', 386),
('SK', 'Slovakia', 703),
('SL', 'Sierra Leone', 232),
('SN', 'Senegal', 221),
('SO', 'Somalia', 252),
('SR', 'Suriname', 597),
('ST', 'Sao Tome and Principe', 678),
('SV', 'El Salvador', 503),
('SY', 'Syrian Arab Republic', 963),
('SZ', 'Swaziland', 268),
('TD', 'Chad', 235),
('TG', 'Togo', 228),
('TH', 'Thailand', 66),
('TJ', 'Tajikistan', 7),
('TM', 'Turkmenistan', 993),
('TN', 'Tunisia', 216),
('TO', 'Tonga', 776),
('TR', 'Turkey', 90),
('TT', 'Trinidad and Tobago', 780),
('TV', 'Tuvalu', 688),
('TW', 'Taiwan, Province of China', 886),
('TZ', 'Tanzania, United Republic of', 255),
('UA', 'Ukraine', 380),
('UG', 'Uganda', 256),
('UK', 'United Kingdom', 44),
('US', 'United States', 1),
('UY', 'Uruguay', 598),
('UZ', 'Uzbekistan', 998),
('VA', 'Holy See (Vatican City State)', 376),
('VC', 'Saint Vincent and the Grenadines', 670),
('VE', 'Venezuela', 58),
('VN', 'Viet Nam', 84),
('VU', 'Vanuatu', 678),
('WS', 'Samoa', 685),
('YE', 'Yemen', 967),
('ZA', 'South Africa', 27),
('ZM', 'Zambia', 260),
('ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_of` enum('post','comment') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `item_id`, `user_id`, `like_of`, `created_at`, `updated_at`, `deleted_at`) VALUES
(23, 4, 19, 'post', '2021-04-12 05:23:17', '2021-04-12 05:23:17', NULL),
(13, 3, 27, 'post', '2021-04-11 12:45:39', '2021-04-11 12:45:39', NULL),
(38, 6, 27, 'post', '2021-04-12 08:02:31', '2021-04-12 08:02:31', NULL),
(19, 1, 27, 'comment', '2021-04-11 13:07:51', '2021-04-11 13:07:51', NULL),
(44, 5, 27, 'comment', '2021-04-12 08:28:22', '2021-04-12 08:28:22', NULL),
(41, 3, 19, 'comment', '2021-04-12 08:23:47', '2021-04-12 08:23:47', NULL),
(46, 12, 27, 'post', '2021-04-15 12:05:37', '2021-04-15 12:05:37', NULL),
(47, 11, 27, 'post', '2021-04-15 13:16:08', '2021-04-15 13:16:08', NULL),
(48, 13, 27, 'post', '2021-04-19 04:29:37', '2021-04-19 04:29:37', NULL),
(56, 18, 27, 'post', '2021-04-22 12:30:35', '2021-04-22 12:30:35', NULL),
(50, 17, 27, 'post', '2021-04-22 09:10:31', '2021-04-22 09:10:31', NULL),
(51, 16, 27, 'post', '2021-04-22 12:29:32', '2021-04-22 12:29:32', NULL),
(52, 15, 27, 'post', '2021-04-22 12:29:39', '2021-04-22 12:29:39', NULL),
(53, 14, 27, 'post', '2021-04-22 12:29:43', '2021-04-22 12:29:43', NULL),
(59, 9, 27, 'comment', '2021-04-22 12:32:30', '2021-04-22 12:32:30', NULL),
(60, 26, 35, 'post', '2021-05-01 05:57:12', '2021-05-01 05:57:12', NULL),
(62, 25, 35, 'post', '2021-05-01 05:57:19', '2021-05-01 05:57:19', NULL),
(63, 20, 36, 'post', '2021-05-01 06:37:38', '2021-05-01 06:37:38', NULL),
(64, 19, 36, 'post', '2021-05-01 06:37:40', '2021-05-01 06:37:40', NULL),
(65, 21, 36, 'post', '2021-05-01 06:37:43', '2021-05-01 06:37:43', NULL),
(66, 22, 36, 'post', '2021-05-01 06:37:45', '2021-05-01 06:37:45', NULL),
(67, 23, 36, 'post', '2021-05-01 06:37:46', '2021-05-01 06:37:46', NULL),
(71, 25, 36, 'post', '2021-05-01 06:38:07', '2021-05-01 06:38:07', NULL),
(72, 26, 36, 'post', '2021-05-01 06:38:09', '2021-05-01 06:38:09', NULL),
(73, 27, 36, 'post', '2021-05-01 06:38:10', '2021-05-01 06:38:10', NULL),
(78, 36, 27, 'post', '2021-05-07 09:15:47', '2021-05-07 09:15:47', NULL),
(79, 10, 5, 'comment', '2021-05-07 09:33:17', '2021-05-07 09:33:17', NULL),
(84, 50, 5, 'post', '2021-05-08 13:25:42', '2021-05-08 13:25:42', NULL),
(83, 14, 5, 'comment', '2021-05-07 10:51:55', '2021-05-07 10:51:55', NULL),
(85, 51, 5, 'post', '2021-05-08 15:03:59', '2021-05-08 15:03:59', NULL),
(86, 53, 5, 'comment', '2021-05-09 12:35:26', '2021-05-09 12:35:26', NULL),
(88, 53, 27, 'comment', '2021-05-09 12:58:05', '2021-05-09 12:58:05', NULL),
(89, 37, 27, 'comment', '2021-05-09 12:58:07', '2021-05-09 12:58:07', NULL),
(90, 30, 5, 'comment', '2021-05-09 13:01:17', '2021-05-09 13:01:17', NULL),
(93, 61, 27, 'post', '2021-05-10 05:50:00', '2021-05-10 05:50:00', NULL),
(94, 31, 27, 'comment', '2021-05-10 05:50:30', '2021-05-10 05:50:30', NULL),
(95, 62, 5, 'post', '2021-05-10 12:55:51', '2021-05-10 12:55:51', NULL),
(96, 63, 2, 'post', '2021-12-18 10:19:05', '2021-12-18 10:19:05', NULL),
(101, 64, 2, 'post', '2021-12-19 04:44:04', '2021-12-19 04:44:04', NULL),
(98, 65, 2, 'post', '2021-12-19 04:24:21', '2021-12-19 04:24:21', NULL),
(105, 85, 37, 'post', '2021-12-21 04:35:40', '2021-12-21 04:35:40', NULL),
(120, 80, 38, 'comment', '2022-01-12 05:11:36', '2022-01-12 05:11:36', NULL),
(117, 90, 37, 'post', '2021-12-29 14:46:26', '2021-12-29 14:46:26', NULL),
(121, 96, 2, 'post', '2022-01-12 05:35:11', '2022-01-12 05:35:11', NULL),
(122, 96, 38, 'post', '2022-01-12 05:38:46', '2022-01-12 05:38:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `notification` text DEFAULT NULL,
  `n_type` varchar(25) DEFAULT NULL,
  `n_for` bigint(20) NOT NULL,
  `u_type` enum('admin','user') NOT NULL DEFAULT 'user',
  `n_from` bigint(20) NOT NULL,
  `n_read` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification`, `n_type`, `n_for`, `u_type`, `n_from`, `n_read`, `created_at`, `updated_at`) VALUES
(1, 'unfollow your profile', 'unfollow', 5, 'user', 27, 1, '2021-05-09 20:57:43', '2021-05-10 01:49:27'),
(2, 'started follow your profile', 'follow', 5, 'user', 27, 1, '2021-05-10 10:41:23', '2021-05-10 01:49:27'),
(3, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 1, '2021-05-10 10:49:29', '2021-05-10 01:49:27'),
(4, 'started follow your profile', 'follow', 5, 'user', 27, 1, '2021-05-10 10:55:30', '2021-05-10 01:49:27'),
(5, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 1, '2021-05-10 10:58:35', '2021-05-10 01:49:27'),
(6, 'started follow your profile', 'follow', 5, 'user', 27, 1, '2021-05-10 11:02:49', '2021-05-10 01:49:27'),
(7, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 1, '2021-05-10 11:04:55', '2021-05-10 01:49:27'),
(8, 'started follow your profile', 'follow', 5, 'user', 27, 1, '2021-05-10 11:15:55', '2021-05-10 01:49:27'),
(9, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 13:59:31', '2021-05-10 07:59:31'),
(10, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 14:03:51', '2021-05-10 08:03:51'),
(11, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 14:12:13', '2021-05-10 08:12:13'),
(12, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 14:21:06', '2021-05-10 08:21:06'),
(13, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 14:22:07', '2021-05-10 08:22:07'),
(14, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 14:23:37', '2021-05-10 08:23:37'),
(15, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 14:25:18', '2021-05-10 08:25:18'),
(16, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 14:26:00', '2021-05-10 08:26:00'),
(17, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 14:28:40', '2021-05-10 08:28:40'),
(18, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 14:33:03', '2021-05-10 08:33:03'),
(19, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 14:33:28', '2021-05-10 08:33:28'),
(20, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 14:37:25', '2021-05-10 08:37:25'),
(21, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 14:42:55', '2021-05-10 08:42:55'),
(22, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 14:46:05', '2021-05-10 08:46:05'),
(23, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 14:46:06', '2021-05-10 08:46:06'),
(24, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 14:46:08', '2021-05-10 08:46:08'),
(25, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 19:02:03', '2021-05-10 13:02:03'),
(26, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 19:03:01', '2021-05-10 13:03:01'),
(27, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 19:03:50', '2021-05-10 13:03:50'),
(28, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 19:03:54', '2021-05-10 13:03:54'),
(29, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 19:03:56', '2021-05-10 13:03:56'),
(30, 'started follow your profile', 'follow', 5, 'user', 27, 0, '2021-05-10 19:04:00', '2021-05-10 13:04:00'),
(31, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 19:04:01', '2021-05-10 13:04:01'),
(32, 'started follow your profile', 'follow', 29, 'user', 37, 1, '2021-12-21 10:52:09', '2021-12-25 01:20:56'),
(33, 'unfollowed your profile', 'unfollow', 29, 'user', 37, 1, '2021-12-21 10:52:11', '2021-12-25 01:20:56'),
(34, 'started follow your profile', 'follow', 29, 'user', 37, 1, '2021-12-21 10:52:12', '2021-12-25 01:20:56'),
(35, 'unfollowed your profile', 'unfollow', 29, 'user', 37, 1, '2021-12-21 10:52:14', '2021-12-25 01:20:56'),
(36, 'started follow your profile', 'follow', 29, 'user', 37, 1, '2021-12-21 10:52:14', '2021-12-25 01:20:56'),
(37, 'unfollowed your profile', 'unfollow', 29, 'user', 37, 1, '2021-12-21 10:52:16', '2021-12-25 01:20:56'),
(38, 'started follow your profile', 'follow', 29, 'user', 37, 1, '2021-12-21 10:52:16', '2021-12-25 01:20:56'),
(39, 'unfollowed your profile', 'unfollow', 29, 'user', 37, 1, '2021-12-29 18:48:11', '2021-12-29 23:33:10'),
(40, 'started follow your profile', 'follow', 29, 'user', 37, 1, '2021-12-29 18:51:04', '2021-12-29 23:33:10'),
(41, 'unfollowed your profile', 'unfollow', 29, 'user', 37, 1, '2021-12-29 18:52:00', '2021-12-29 23:33:10'),
(42, 'started follow your profile', 'follow', 29, 'user', 37, 1, '2021-12-29 19:12:31', '2021-12-29 23:33:10'),
(43, 'unfollowed your profile', 'unfollow', 29, 'user', 37, 1, '2021-12-29 20:02:48', '2021-12-29 23:33:10'),
(44, 'started follow your profile', 'follow', 38, 'user', 2, 1, '2022-01-06 19:40:18', '2022-01-06 08:52:57'),
(45, 'unfollowed your profile', 'unfollow', 38, 'user', 2, 1, '2022-01-06 19:40:23', '2022-01-06 08:52:57'),
(46, 'started follow your profile', 'follow', 38, 'user', 2, 1, '2022-01-06 19:40:27', '2022-01-06 08:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `pageposts`
--

CREATE TABLE `pageposts` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `page_id` bigint(20) NOT NULL,
  `pagepost` longtext CHARACTER SET latin1 DEFAULT NULL,
  `shared` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pageposts`
--

INSERT INTO `pageposts` (`id`, `user_id`, `page_id`, `pagepost`, `shared`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 38, 0, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 0, '2022-01-11 10:40:08', '2022-01-11 04:40:08', NULL),
(2, 38, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 0, '2022-01-11 10:55:59', '2022-01-11 04:55:59', NULL),
(3, 38, 40, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 0, '2022-01-11 10:56:44', '2022-01-11 04:56:44', NULL),
(4, 38, 40, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia', 0, '2022-01-11 11:11:01', '2022-01-11 05:11:01', NULL),
(5, 38, 1, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', 0, '2022-01-11 11:42:59', '2022-01-11 05:42:59', NULL),
(6, 38, 1, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntu', 0, '2022-01-11 11:45:54', '2022-01-11 05:45:54', NULL),
(7, 38, 1, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes', 0, '2022-01-11 11:51:16', '2022-01-11 05:51:16', NULL),
(8, 38, 1, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem', 0, '2022-01-11 11:57:40', '2022-01-11 05:57:40', NULL),
(9, 38, 1, '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\n\n', 0, '2022-01-11 12:20:05', '2022-01-11 06:20:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pcategory` varchar(100) NOT NULL,
  `pdescription` longtext NOT NULL,
  `profilepic` varchar(50) DEFAULT NULL,
  `coverphoto` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `pname`, `pcategory`, `pdescription`, `profilepic`, `coverphoto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 38, 'Training ', 'Business', 'To build career ', '587408437.jpg', '1723323690.jpg', '2022-01-09 08:58:28', '2022-01-10 01:10:17', NULL),
(38, 38, 'developers club', 'sfsdf', '', '209942929.png', '207790028.png', '2022-01-10 07:09:06', '2022-01-10 02:19:42', NULL),
(39, 38, 'fsdkfsk', 'dfsdfsdf', 'sd', '509058612.png', '2070003135.png', '2022-01-10 08:19:17', '2022-01-10 02:24:39', NULL),
(40, 38, 'gdgdg', 'vfgdfgf', '', '1288061091.png', '1317048866.png', '2022-01-10 08:24:17', '2022-01-10 02:28:32', NULL),
(42, 38, 'football', 'sdfd', '', '274752492.png', '1808543061.png', '2022-01-10 08:31:14', '2022-01-10 02:31:31', NULL),
(44, 38, 'Event Management', 'ff', 'gfdf', '1954751770.png', '647367303.png', '2022-01-10 08:42:07', '2022-01-10 02:42:25', NULL),
(47, 38, 'Holiday Adda', 'ddfdf', 'fd', '405351431.jpg', '328389346.png', '2022-01-10 09:46:43', '2022-01-10 03:47:05', NULL),
(48, 38, 'Event managemnent', 'dgrgfg', '', '635652645.jpg', '1721013743.jpg', '2022-01-10 09:53:45', '2022-01-10 03:54:12', NULL),
(49, 2, 'Training Camp', 'business', 'to learn developing', '436284392.jpg', '201297027.jpg', '2022-01-11 13:54:28', '2022-01-11 07:56:04', NULL),
(50, 38, 'developing', 'business', '', '799197548.jpg', '139086019.jpg', '2022-01-12 07:07:10', '2022-01-12 01:07:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_id` bigint(20) NOT NULL,
  `post` longtext DEFAULT NULL,
  `pagepost` longtext DEFAULT NULL,
  `shared` bigint(20) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `page_id`, `post`, `pagepost`, `shared`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 19, 0, 'The Common Data Set is a product of the Common Data Set Initiative, &quot;a collaborative effort among data providers in the higher education community and publishers as represented by the College Board, Peterson&#039;s, and U.S. News &amp; World Report.&quot;', '', 0, '2021-04-11 07:50:56', '2021-04-11 01:50:56', NULL),
(5, 19, 0, 'I am Tanmoy from other poster. Without image', '', 0, '2021-04-11 08:13:28', '2021-04-11 02:13:28', NULL),
(6, 19, 0, 'ok im', '', 0, '2021-04-11 09:29:40', '2021-04-11 03:29:40', NULL),
(14, 29, 0, 'I am the poster', '', 0, '2021-04-19 16:03:57', '2021-04-19 10:03:57', NULL),
(15, 29, 0, 'Post with image', '', 0, '2021-04-19 16:04:16', '2021-04-19 10:04:16', NULL),
(90, 37, 0, '\r\nPHP Regular Expressions - W3Schoolshttps://www.w3schools.com &rsaquo; php &rsaquo; php_regex\r\nIn PHP, regular expressions are strings composed of delimiters, a pattern and optional modifiers. $exp = &quot;/w3schools/i&quot;;. In the example above, ... ', '', 0, '2021-12-27 14:22:45', '2021-12-27 08:22:45', NULL),
(89, 37, 0, 'http://www.java2s.com/ ', '', 0, '2021-12-27 07:45:34', '2021-12-27 01:45:34', NULL),
(88, 37, 0, 'Post with image dashing and nice', '', 85, '2021-12-21 07:23:08', '2021-12-21 23:17:12', NULL),
(87, 37, 0, 'Another Post Testing Testing2 testing3 testing4 5 6 ', '', 0, '2021-12-21 06:25:43', '2021-12-21 01:21:25', NULL),
(85, 37, 0, 'Post with image dashing', '', 0, '2021-12-20 06:54:43', '2021-12-20 23:25:50', NULL),
(91, 37, 0, 'fereerree difference ', '', 0, '2021-12-27 14:35:03', '2021-12-29 23:23:46', NULL),
(96, 19, 0, '        this is testing       344                      ', '', 0, '2022-01-05 13:22:08', '2022-01-12 00:58:24', NULL),
(93, 2, 0, 'Rizvi is very exsciteed                                     ', '', 0, '2022-01-01 05:17:31', '2021-12-31 23:17:31', NULL),
(94, 38, 0, '        this is testing                             ', '', 0, '2022-01-02 05:32:47', '2022-01-01 23:32:47', NULL),
(95, 38, 0, '        This is the post                            ', '', 0, '2022-01-05 08:14:13', '2022-01-11 23:52:01', '2022-01-12 05:52:01'),
(99, 38, 1, NULL, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences ', 0, '2022-01-11 12:35:59', '2022-01-11 06:35:59', NULL),
(100, 38, 1, NULL, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 0, '2022-01-11 13:09:49', '2022-01-11 07:09:49', NULL),
(101, 38, 1, NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', 0, '2022-01-11 13:15:29', '2022-01-11 07:15:29', NULL),
(102, 2, 49, NULL, 'randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators', 0, '2022-01-11 13:56:53', '2022-01-11 07:56:53', NULL),
(103, 38, 1, NULL, 'This is the post', 0, '2022-01-11 14:59:14', '2022-01-11 08:59:14', NULL),
(104, 38, 1, NULL, 'randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators', 0, '2022-01-11 15:24:35', '2022-01-11 09:24:35', NULL),
(105, 38, 1, NULL, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 0, '2022-01-11 15:29:37', '2022-01-11 09:29:37', NULL),
(106, 38, 1, NULL, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', 0, '2022-01-12 05:24:47', '2022-01-11 23:24:47', NULL),
(107, 38, 0, '          this is post        3444          5678         ', NULL, 0, '2022-01-12 06:58:47', '2022-01-12 01:00:52', '2022-01-12 07:00:52'),
(108, 38, 0, '  \r\nJavaTpoint - Crunchbase Company Profile &amp; Funding\r\nhttps://www.crunchbase.com\r\n&rsaquo; organization &rsaquo; javatpoint\r\nJavaTpoint is the hub of java programming languages in which you have various java programming languages concepts such as core java tutorial, sql, ...\r\nCompany Type: For Profit\r\nPhone Number: +91 9990449935\r\nFounded Date: May 17, 2013          \r\n                        ', NULL, 0, '2022-01-12 07:04:08', '2022-01-12 01:04:08', NULL),
(109, 38, 50, NULL, 'djhdfdkjfkddjsdkj', 0, '2022-01-12 07:07:53', '2022-01-12 01:07:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ratting` float NOT NULL,
  `ratted_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `ratting`, `ratted_by`, `created_at`, `updated_at`) VALUES
(3, 5, 3.5, 27, '2021-04-28 09:07:57', '2021-04-28 07:09:56'),
(4, 28, 2, 27, '2021-04-28 09:08:02', '2021-04-28 07:22:13'),
(5, 29, 3, 37, '2021-12-29 15:01:52', '2021-12-29 09:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `comment_id` bigint(20) NOT NULL,
  `reply` longtext NOT NULL,
  `reply_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `comment_id`, `reply`, `reply_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(47, 68, 'Tajuddin Ahmed this is Also', 2, '2021-12-25 03:20:53', '2021-12-25 03:20:53', '2021-12-25 14:20:53'),
(48, 67, 'Tajuddin Ahmed  i am commenting alson', 2, '2021-12-25 03:44:03', '2021-12-25 03:44:03', '2021-12-25 14:44:03'),
(49, 70, 'Tajuddin Ahmed Hi Taj', 2, '2021-12-25 04:02:31', '2021-12-25 04:02:31', '2021-12-25 15:02:31'),
(50, 67, 'Tajuddin Ahmed comment ', 2, '2021-12-25 04:09:42', '2021-12-25 04:09:42', '2021-12-25 15:09:42'),
(51, 65, 'Tajuddin Ahmed Hello', 2, '2021-12-25 04:11:46', '2021-12-25 04:11:46', '2021-12-25 15:11:46'),
(52, 71, 'Tajuddin Ahmed I can See', 2, '2021-12-25 04:13:39', '2021-12-25 04:13:39', '2021-12-25 15:13:39'),
(53, 72, 'Tajuddin Ahmed I am Also', 2, '2021-12-25 04:28:28', '2021-12-25 04:28:28', '2021-12-25 15:28:28'),
(54, 65, 'Tajuddin Ahmed Hwoook', 2, '2021-12-25 05:04:59', '2021-12-25 05:04:59', '2021-12-25 16:04:59'),
(55, 73, 'dcsdws', 2, '2021-12-25 05:07:15', '2021-12-25 05:07:15', '2021-12-25 16:07:15'),
(56, 65, 'Tajuddin Ahmed kdfjfjhdjjh', 2, '2021-12-25 05:10:25', '2021-12-25 05:10:25', '2021-12-25 16:10:25'),
(57, 67, 'sdsd', 2, '2021-12-25 05:11:55', '2021-12-25 05:11:55', '2021-12-25 16:11:55'),
(58, 67, 'Tajuddin Ahmed jhnghg mg gmnh', 2, '2021-12-25 05:13:16', '2021-12-25 05:13:16', '2021-12-25 16:13:16'),
(59, 75, 'Tajuddin Ahmed heloo', 37, '2021-12-29 07:27:56', '2021-12-29 07:27:56', '2021-12-29 18:27:56'),
(60, 80, 'BTanmoy BBiswas This is good', 38, '2022-01-11 23:36:13', '2022-01-11 23:36:13', '2022-01-12 10:36:13'),
(61, 83, 'Tanmoy Biswas comment ', 38, '2022-01-12 01:01:26', '2022-01-12 01:01:26', '2022-01-12 12:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` int(8) DEFAULT NULL,
  `birthplace` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_number` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `active_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `security` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `gac` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref` int(11) DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 0,
  `role_type` enum('user','staff','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `facebook_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `state`, `postcode`, `birthplace`, `passport_number`, `city`, `country`, `address`, `gender`, `dob`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `active_code`, `security`, `gac`, `ref`, `level`, `role_type`, `facebook_id`) VALUES
(2, 'Guru', 'Ahmed', 'arifbcmc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2018-07-12 00:29:42', '2020-03-05 14:55:45', '1', '5e616751beb5d', '1', 'W5R5UJAY5RMH2E72', 0, 4, 'user', NULL),
(5, 'Roni', 'Mondol', 'roni@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1984-10-24', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2020-03-04 05:05:59', '2020-03-04 05:05:59', '0', '1185b7e93e307b9a4be0d42958d0caf3', '1', NULL, 0, 0, 'user', NULL),
(19, 'BTanmoy', 'BBiswas', 'tanmoy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1990-06-03', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-02 22:35:22', '2021-04-02 22:35:26', '0', NULL, '1', NULL, 0, 0, 'user', NULL),
(27, 'Arifx', 'Ahmadz', 'arif@gmail.com', '0121548795', NULL, 9009, 'Zimbabwe', '46546463464', 'Dhaka', 'Bangladesh', 'Dhaka', 'Male', '1994-08-11', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-03 04:36:09', '2021-04-22 11:39:06', '0', 'eGFTT2FQeEVaajhjbmxLVy93cFpoUT09', '1', NULL, 0, 0, 'user', NULL),
(28, 'Sumon', 'Shamrat', 'sumon@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1970-01-01', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-07 02:09:21', '2021-04-07 02:09:22', '0', NULL, '1', NULL, 0, 0, 'user', NULL),
(29, 'Tanmoy', 'Biswas', 'tanmoyb.cse@gmail.com', '0121548795', NULL, 9009, 'Zimbabwe', '', 'Dhaka', 'Bangladesh', 'Dhaka', 'Male', '1994-08-11', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-18 21:52:33', '2021-04-19 10:11:19', '0', NULL, '1', NULL, 0, 0, 'user', NULL),
(30, 'Raju', 'Mondal', 'rajumondal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1993-01-03', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-18 22:03:26', '2021-04-19 10:03:26', '0', NULL, '1', NULL, 0, 0, 'user', NULL),
(31, 'Noman', 'Nwhere', 'noman@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '2011-07-03', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-28 23:32:59', '2021-04-29 11:32:59', '0', NULL, '1', NULL, 0, 0, 'user', NULL),
(32, 'One', 'Last', 'one@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1984-10-24', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-28 23:38:55', '2021-04-29 11:38:55', '0', NULL, '1', NULL, 0, 0, 'user', NULL),
(33, 'Demo', '1', 'demotest1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1984-10-24', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-05-01 01:42:10', '2021-05-01 01:42:10', '1', NULL, '1', NULL, 0, 0, 'user', NULL),
(34, 'Demo', '2', 'demotest2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '2003-01-02', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-05-01 01:44:58', '2021-05-01 01:44:58', '1', NULL, '1', NULL, 0, 0, 'user', NULL),
(35, 'Demo', '3', 'demotest3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '2002-01-01', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-05-01 01:45:59', '2021-05-01 01:45:59', '1', NULL, '1', NULL, 0, 0, 'user', NULL),
(36, 'Ronix22', 'Mondalz22', 'ronimondalnil@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1970-01-01', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-05-01 02:10:49', '2021-05-01 02:10:49', '1', NULL, '1', NULL, 0, 0, 'user', NULL),
(38, 'Tajuddin', 'Ahmed', 'tajuddinsec1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1984-10-24', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-12-31 23:24:55', '2021-12-31 23:24:55', '0', NULL, '1', NULL, 0, 0, 'user', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_additional_info`
--

CREATE TABLE `users_additional_info` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `about` longtext DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_additional_info`
--

INSERT INTO `users_additional_info` (`id`, `user_id`, `about`, `facebook`, `twitter`, `linkedin`, `website`, `created_at`, `updated_at`) VALUES
(5, 27, 'fdg fg fdgd fgdg', 'dfg dfg', '', 'dfgdfgdfg', 'www.google.com', '2021-04-26 08:56:32', '2021-04-26 05:42:24'),
(6, 37, 'web developer ', 'tajuddin023gmail.com', 'no', 'tajuddin511', '', '2021-12-30 09:20:21', '2021-12-30 03:24:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_country`
--
ALTER TABLE `hb_country`
  ADD PRIMARY KEY (`iso`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pageposts`
--
ALTER TABLE `pageposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_additional_info`
--
ALTER TABLE `users_additional_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pageposts`
--
ALTER TABLE `pageposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users_additional_info`
--
ALTER TABLE `users_additional_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
