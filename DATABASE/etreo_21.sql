-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2021 at 05:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etreo_21`
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
(5, 36, 'mt5', '20', 'USD', 849449, '12345', '12345', '12345', '2021-05-01 12:10:49', '2021-05-01 06:10:49');

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
(12, 62, 'post', 'img-20210510-60992bae9e719.jpg', '2021-05-10 18:48:46', '2021-05-10 12:48:46');

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
(57, 'I agree your post', 62, 5, '2021-05-10 08:49:37', '2021-05-10 08:49:37', NULL);

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
(28, 36, 27, 0, '2021-05-04 08:52:29', '2021-05-04 02:52:29', NULL);

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
(95, 62, 5, 'post', '2021-05-10 12:55:51', '2021-05-10 12:55:51', NULL);

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
(31, 'unfollowed your profile', 'unfollow', 5, 'user', 27, 0, '2021-05-10 19:04:01', '2021-05-10 13:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post` longtext DEFAULT NULL,
  `shared` bigint(20) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post`, `shared`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 27, 'I jdf udfgjdre', 0, '2021-04-10 12:33:59', '2021-04-10 06:33:59', NULL),
(2, 27, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2021-04-11 07:45:32', '2021-04-11 01:45:32', NULL),
(3, 27, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2021-04-11 07:45:49', '2021-04-11 01:45:49', NULL),
(4, 19, 'The Common Data Set is a product of the Common Data Set Initiative, &quot;a collaborative effort among data providers in the higher education community and publishers as represented by the College Board, Peterson&#039;s, and U.S. News &amp; World Report.&quot;', 0, '2021-04-11 07:50:56', '2021-04-11 01:50:56', NULL),
(5, 19, 'I am Tanmoy from other poster. Without image', 0, '2021-04-11 08:13:28', '2021-04-11 02:13:28', NULL),
(6, 19, 'ok im', 0, '2021-04-11 09:29:40', '2021-04-11 03:29:40', NULL),
(24, 29, 'I am Tanmoy Biswas. This is my post', 0, '2021-04-24 09:14:22', '2021-04-24 03:14:22', NULL),
(23, 30, 'I am Raju. This is my post', 0, '2021-04-24 09:11:38', '2021-04-24 03:11:38', NULL),
(22, 28, 'I am Sumon. This is my post', 0, '2021-04-24 09:10:25', '2021-04-24 03:10:25', NULL),
(21, 19, 'I am Tanmoy. This is my post', 0, '2021-04-24 09:09:18', '2021-04-24 03:09:18', NULL),
(20, 5, 'I am Roni. This is my post', 0, '2021-04-24 09:08:09', '2021-04-24 03:08:09', NULL),
(14, 29, 'I am the poster', 0, '2021-04-19 16:03:57', '2021-04-19 10:03:57', NULL),
(15, 29, 'Post with image', 0, '2021-04-19 16:04:16', '2021-04-19 10:04:16', NULL),
(17, 27, 'JUSFsd fsdf', 0, '2021-04-19 16:19:38', '2021-04-19 10:19:38', NULL),
(19, 27, 'I am Arif. This is my post', 0, '2021-04-24 09:06:43', '2021-04-24 03:06:43', NULL),
(25, 33, 'Test demo 1 post', 0, '2021-05-01 07:54:31', '2021-05-01 01:54:31', NULL),
(26, 34, 'Test demo 2 post', 0, '2021-05-01 07:55:44', '2021-05-01 01:55:44', NULL),
(27, 35, 'Test demo 3 post', 0, '2021-05-01 07:56:55', '2021-05-01 01:56:55', NULL),
(35, 27, 'I am happy to share', 34, '2021-05-07 12:51:12', '2021-05-07 06:51:12', NULL),
(34, 5, 'I roni. This is my post for notification', 0, '2021-05-07 08:50:31', '2021-05-07 02:50:31', NULL),
(36, 5, 'Post from roni', 0, '2021-05-07 11:11:13', '2021-05-07 05:11:13', NULL),
(37, 27, 'This is demo post. For time upate', 0, '2021-05-07 17:19:40', '2021-05-07 11:19:40', NULL),
(38, 27, 'New post is here', 0, '2021-05-07 17:36:43', '2021-05-07 11:36:43', NULL),
(39, 27, 'ghfhfhfh', 0, '2021-05-07 17:38:46', '2021-05-07 11:38:46', NULL),
(40, 27, 'I am rweadt to go', 0, '2021-05-08 07:13:53', '2021-05-08 01:13:53', NULL),
(41, 27, 'I am fdfd', 0, '2021-05-08 07:42:12', '2021-05-08 01:42:12', NULL),
(42, 27, 'I am ok to fine', 0, '2021-05-08 08:01:41', '2021-05-08 02:01:41', NULL),
(43, 27, 'D fsf right to finr', 0, '2021-05-08 12:06:10', '2021-05-08 06:06:10', NULL),
(44, 27, 'I am fine to post real time', 0, '2021-05-08 12:09:58', '2021-05-08 06:09:58', NULL),
(45, 27, 'asda dad ad', 0, '2021-05-08 12:12:45', '2021-05-08 06:12:45', NULL),
(46, 27, 'Doffg 7890111', 0, '2021-05-08 12:16:19', '2021-05-08 06:16:19', NULL),
(47, 27, 'sf sfsf', 0, '2021-05-08 12:17:11', '2021-05-08 06:17:11', NULL),
(48, 27, 'fh fhgfhfh', 0, '2021-05-08 12:21:00', '2021-05-08 06:21:00', NULL),
(49, 5, 'I am from roni', 0, '2021-05-08 12:31:50', '2021-05-08 06:31:50', NULL),
(50, 27, 'fgh fhfh', 0, '2021-05-08 13:27:33', '2021-05-08 07:27:33', NULL),
(51, 27, 'Building Real TIme Post System', 0, '2021-05-08 14:27:13', '2021-05-08 08:27:13', NULL),
(52, 5, 'fsdf sfds fsf', 51, '2021-05-08 21:04:29', '2021-05-08 15:04:29', NULL),
(53, 5, 'I am post for roni. Is comment notification is test', 0, '2021-05-09 07:32:24', '2021-05-09 01:32:24', NULL),
(54, 5, 'Secend Post of comment notification test', 0, '2021-05-09 07:35:19', '2021-05-09 01:35:19', NULL),
(55, 27, 'Hofh dd8785 drtert 007', 53, '2021-05-09 14:04:16', '2021-05-09 08:04:16', NULL),
(56, 27, 'rtyr ytry', 0, '2021-05-09 10:05:38', '2021-05-09 04:05:38', NULL),
(57, 27, 'hfghfh fh  007', 56, '2021-05-09 14:06:29', '2021-05-09 08:06:29', NULL),
(58, 27, 'ggggg', 54, '2021-05-09 14:15:28', '2021-05-09 08:15:28', NULL),
(59, 5, 'yahoo go to you', 54, '2021-05-09 14:21:19', '2021-05-09 08:21:19', NULL),
(60, 27, 'dfg dfgdfg dgd', 0, '2021-05-09 10:36:17', '2021-05-09 04:36:17', NULL),
(61, 5, 'hghg fhhf', 60, '2021-05-09 10:39:55', '2021-05-09 04:39:55', NULL),
(62, 27, 'Post with image', 0, '2021-05-10 14:48:46', '2021-05-10 08:48:46', NULL),
(63, 27, 'I am post', 0, '2021-05-10 15:25:27', '2021-05-10 09:25:27', NULL);

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
(4, 28, 2, 27, '2021-04-28 09:08:02', '2021-04-28 07:22:13');

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
  `role_type` enum('user','staff','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `state`, `postcode`, `birthplace`, `passport_number`, `city`, `country`, `address`, `gender`, `dob`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `active_code`, `security`, `gac`, `ref`, `level`, `role_type`) VALUES
(2, 'Guru', 'Ahmed', 'arifbcmc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2018-07-12 00:29:42', '2020-03-05 14:55:45', '1', '5e616751beb5d', '1', 'W5R5UJAY5RMH2E72', 0, 4, 'user'),
(5, 'Roni', 'Mondol', 'roni@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1984-10-24', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2020-03-04 05:05:59', '2020-03-04 05:05:59', '0', '1185b7e93e307b9a4be0d42958d0caf3', '1', NULL, 0, 0, 'user'),
(19, 'BTanmoy', 'BBiswas', 'tanmoy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1990-06-03', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-02 22:35:22', '2021-04-02 22:35:26', '0', NULL, '1', NULL, 0, 0, 'user'),
(27, 'Arifx', 'Ahmadz', 'arif@gmail.com', '0121548795', NULL, 9009, 'Zimbabwe', '46546463464', 'Dhaka', 'Bangladesh', 'Dhaka', 'Male', '1994-08-11', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-03 04:36:09', '2021-04-22 11:39:06', '0', 'eGFTT2FQeEVaajhjbmxLVy93cFpoUT09', '1', NULL, 0, 0, 'user'),
(28, 'Sumon', 'Shamrat', 'sumon@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1970-01-01', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-07 02:09:21', '2021-04-07 02:09:22', '0', NULL, '1', NULL, 0, 0, 'user'),
(29, 'Tanmoy', 'Biswas', 'tanmoyb.cse@gmail.com', '0121548795', NULL, 9009, 'Zimbabwe', '', 'Dhaka', 'Bangladesh', 'Dhaka', 'Male', '1994-08-11', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-18 21:52:33', '2021-04-19 10:11:19', '0', NULL, '1', NULL, 0, 0, 'user'),
(30, 'Raju', 'Mondal', 'rajumondal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1993-01-03', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-18 22:03:26', '2021-04-19 10:03:26', '0', NULL, '1', NULL, 0, 0, 'user'),
(31, 'Noman', 'Nwhere', 'noman@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '2011-07-03', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-28 23:32:59', '2021-04-29 11:32:59', '0', NULL, '1', NULL, 0, 0, 'user'),
(32, 'One', 'Last', 'one@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1984-10-24', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-04-28 23:38:55', '2021-04-29 11:38:55', '0', NULL, '1', NULL, 0, 0, 'user'),
(33, 'Demo', '1', 'demotest1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1984-10-24', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-05-01 01:42:10', '2021-05-01 01:42:10', '1', NULL, '1', NULL, 0, 0, 'user'),
(34, 'Demo', '2', 'demotest2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '2003-01-02', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-05-01 01:44:58', '2021-05-01 01:44:58', '1', NULL, '1', NULL, 0, 0, 'user'),
(35, 'Demo', '3', 'demotest3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '2002-01-01', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-05-01 01:45:59', '2021-05-01 01:45:59', '1', NULL, '1', NULL, 0, 0, 'user'),
(36, 'Ronix22', 'Mondalz22', 'ronimondalnil@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1970-01-01', 'YlRKSlJndG9HbFdzTzdQQm9vM0d6Zz09', NULL, '2021-05-01 02:10:49', '2021-05-01 02:10:49', '1', NULL, '1', NULL, 0, 0, 'user');

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
(5, 27, 'fdg fg fdgd fgdg', 'dfg dfg', '', 'dfgdfgdfg', 'www.google.com', '2021-04-26 08:56:32', '2021-04-26 05:42:24');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users_additional_info`
--
ALTER TABLE `users_additional_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
