-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-05-10 18:37:02
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mis2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `ComId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ProjectId` int(11) NOT NULL,
  `ComText` varchar(200) NOT NULL,
  `ComTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `comment`
--

INSERT INTO `comment` (`ComId`, `UserId`, `ProjectId`, `ComText`, `ComTime`) VALUES
(126, 18, 71, 'å˜¿å˜¿', '2017-04-01 16:18:05'),
(127, 18, 71, 'å˜¿å˜¿', '2017-04-01 16:19:26'),
(129, 18, 71, '123', '2017-04-02 16:42:30'),
(136, 18, 69, '123', '2017-04-08 14:41:53'),
(137, 18, 69, '123', '2017-04-08 14:45:50'),
(138, 18, 69, '123', '2017-04-08 14:46:58'),
(139, 18, 69, '123', '2017-04-08 14:47:01'),
(140, 18, 69, '123', '2017-04-08 14:47:48'),
(148, 18, 75, '456', '2017-04-08 14:56:28'),
(149, 18, 75, '42353', '2017-04-08 14:56:31'),
(150, 18, 75, '424', '2017-04-08 14:58:06'),
(151, 18, 76, 'æ¸¬è©¦', '2017-04-08 15:04:51'),
(152, 18, 77, 'å¤§å®¶å¥½ï¼Œè¨˜å¾—ä¾†è€ƒæœŸä¸­è€ƒ', '2017-04-08 15:09:14'),
(153, 19, 77, 'çŸ¥é“äº†', '2017-04-08 15:09:42'),
(154, 20, 77, 'ç‚ºå•¥æ‹’çµ•æ²’ç”Ÿæ•ˆ', '2017-04-08 15:10:08'),
(155, 18, 78, 'ä½ å¥½', '2017-04-08 15:19:55'),
(156, 19, 78, 'çœŸå°', '2017-04-08 15:20:25'),
(157, 18, 77, 'ä½ å¥½å—Ž', '2017-04-09 15:51:04'),
(158, 19, 79, 'å°', '2017-04-09 15:54:35'),
(159, 18, 79, 'å°å°', '2017-04-09 15:56:44'),
(160, 18, 77, 'test me pls.....', '2017-04-09 23:31:28'),
(161, 21, 81, 'hello', '2017-04-10 13:11:56'),
(162, 21, 81, 'today hootttt', '2017-04-10 19:44:21'),
(163, 21, 81, '今天打牌\r\n', '2017-04-13 23:25:11'),
(164, 21, 81, 'helloooooo', '2017-04-17 15:28:35'),
(165, 21, 82, 'hello\r\n', '2017-04-30 15:52:47'),
(166, 21, 82, 'today tst', '2017-04-30 17:07:19');

-- --------------------------------------------------------

--
-- 資料表結構 `customers`
--

CREATE TABLE `customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'TEST', 'root@yahoo.com', '2017-04-23 07:32:41', '2017-04-23 07:32:41'),
(2, 'testing', 'test@yahoo.com', '2017-04-23 09:58:36', '2017-04-23 09:58:36'),
(3, 'nccumis', 'root@yahoo.com', '2017-04-24 14:46:17', '2017-04-24 14:46:17'),
(4, 'root', 'test0@yahoo.com', '2017-04-26 13:49:24', '2017-04-26 13:49:24'),
(5, 'TEST', 'test@yahoo.com', '2017-05-01 17:25:05', '2017-05-01 17:25:05');

-- --------------------------------------------------------

--
-- 資料表結構 `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block',
  `userId` int(100) DEFAULT NULL,
  `projectId` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`, `userId`, `projectId`) VALUES
(1, 'hello2', '2017-04-12', '2017-04-10 13:12:19', '2017-04-10 13:12:19', 1, 21, 81),
(2, 'hjk', '2017-04-04', '2017-04-30 15:52:39', '2017-04-30 15:52:39', 1, 21, 82),
(3, '123', '2017-04-12', '2017-05-10 00:00:00', '0000-00-00 00:00:00', 1, 18, NULL),
(4, '123', '2017-04-11', '2017-05-10 00:00:00', '0000-00-00 00:00:00', 1, 18, NULL),
(5, '123', '2017-04-13', '2017-05-10 00:00:00', '0000-00-00 00:00:00', 1, 18, NULL),
(6, '123', '2017-04-05', '2017-05-10 00:00:00', '0000-00-00 00:00:00', 1, 18, 77),
(7, '123', '2017-04-14', '2017-05-10 00:00:00', '0000-00-00 00:00:00', 1, 18, NULL),
(8, '123', '2017-04-06', '2017-05-10 00:00:00', '0000-00-00 00:00:00', 1, 18, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `hash` varchar(255) NOT NULL DEFAULT '',
  `total` float NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `orders`
--

INSERT INTO `orders` (`id`, `hash`, `total`, `paid`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, '1e9d232faa3b50b82f2a365704ff33f11201253d9e9dbecdfb159103e0627349', 365, 1, 1, '2017-04-23 07:32:41', '2017-04-23 07:32:43'),
(2, '36ca8b0442b7b167358691e2ef17f67b1738ca43e0fd175665ede610fc5e8fab', 205, 1, 2, '2017-04-23 09:58:36', '2017-04-23 09:58:37'),
(3, '4195c37e90ef181e801be0129031e5d8ee25bf6b0cb7d9b7ac5fcbf8c759d874', 205, 1, 3, '2017-04-24 14:46:17', '2017-04-24 14:46:18'),
(4, '8916bca4a6b3fbe7ff50c14cbfa36f71a89152615aecfd3ff7573eeb2c4047a5', 205, 1, 4, '2017-04-26 13:49:24', '2017-04-26 13:49:30'),
(5, '4025fc05bfb6653fa79cb70a364086991749f5ea9d550c147315aa2eda9a4f75', 111112000, 0, 21, '2017-05-01 17:23:47', '2017-05-01 17:23:47'),
(6, '8b8911b50e142b3d45bb958fb2a458c926975232b96bafd8acf8c020d3eb9244', 1146, 1, 5, '2017-05-01 17:25:05', '2017-05-01 17:25:07');

-- --------------------------------------------------------

--
-- 資料表結構 `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 4, 1),
(2, 1, 5, 3),
(3, 2, 1, 1),
(4, 3, 1, 1),
(5, 4, 1, 1),
(6, 5, 1, 3),
(7, 5, 2, 1),
(8, 5, 3, 1),
(9, 5, 4, 1),
(10, 5, 5, 1),
(11, 5, 33, 1),
(12, 5, 39, 1),
(13, 6, 1, 3),
(14, 6, 2, 1),
(15, 6, 3, 1),
(16, 6, 4, 1),
(17, 6, 5, 1),
(18, 6, 33, 1),
(19, 6, 39, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `payments`
--

CREATE TABLE `payments` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `failed` tinyint(1) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `failed`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'axew4mva', '2017-04-23 07:32:43', '2017-04-23 07:32:43'),
(2, 2, 0, 'mk4tfzwy', '2017-04-23 09:58:37', '2017-04-23 09:58:37'),
(3, 3, 0, '6gs8va8b', '2017-04-24 14:46:18', '2017-04-24 14:46:18'),
(4, 4, 0, '575m6x9y', '2017-04-26 13:49:30', '2017-04-26 13:49:30'),
(5, 5, 1, NULL, '2017-05-01 17:23:48', '2017-05-01 17:23:48'),
(6, 6, 0, '7f499jpv', '2017-05-01 17:25:07', '2017-05-01 17:25:07');

-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

CREATE TABLE `post` (
  `postId` int(11) NOT NULL,
  `postSource` text CHARACTER SET latin1 NOT NULL,
  `postText` text CHARACTER SET latin1 NOT NULL,
  `postUserId` int(100) DEFAULT NULL,
  `postProjectId` int(100) DEFAULT NULL,
  `postInvolvedMembers` char(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `post`
--

INSERT INTO `post` (`postId`, `postSource`, `postText`, `postUserId`, `postProjectId`, `postInvolvedMembers`) VALUES
(24, 'è²¼æ–‡ç™¼å¸ƒ', 'é„­ä¿Šå½¥ å·²ç™¼ä½ˆä¸€å‰‡è²¼æ–‡è‡³ ç¶“æ¿Ÿå­¸', 18, 77, 'root2@yahoo.com,root3@yahoo.comroot@yahoo.com'),
(25, 'è²¼æ–‡ç™¼å¸ƒ', 'æ——é­š å·²ç™¼ä½ˆä¸€å‰‡è²¼æ–‡è‡³ ç¶“æ¿Ÿå­¸', 19, 77, 'root2@yahoo.com,root3@yahoo.comroot2@yahoo.com'),
(26, 'è²¼æ–‡ç™¼å¸ƒ', 'Sean å·²ç™¼ä½ˆä¸€å‰‡è²¼æ–‡è‡³ ç¶“æ¿Ÿå­¸', 20, 77, 'root3@yahoo.comroot3@yahoo.com'),
(27, 'è²¼æ–‡ç™¼å¸ƒ', 'é„­ä¿Šå½¥ å·²ç™¼ä½ˆä¸€å‰‡è²¼æ–‡è‡³ æœƒè¨ˆå­¸', 18, 78, 'root2@yahoo.com,root3@yahoo.com,root@yahoo.com'),
(28, 'è²¼æ–‡ç™¼å¸ƒ', 'æ——é­š å·²ç™¼ä½ˆä¸€å‰‡è²¼æ–‡è‡³ æœƒè¨ˆå­¸', 19, 78, 'root2@yahoo.com,root3@yahoo.com,root@yahoo.com'),
(29, 'è²¼æ–‡ç™¼å¸ƒ', 'é„­ä¿Šå½¥ å·²ç™¼ä½ˆä¸€å‰‡è²¼æ–‡è‡³ ç¶“æ¿Ÿå­¸<a href=\"project_home.php?id=77\">', 18, 77, 'root3@yahoo.com,root@yahoo.com'),
(30, 'è²¼æ–‡ç™¼å¸ƒ', 'æ——é­š å·²ç™¼ä½ˆä¸€å‰‡è²¼æ–‡è‡³ æ¸¬è©¦<a href=\"project_home.php?id=79\">', 19, 79, 'root2@yahoo.com,root3@yahoo.com,root@yahoo.com'),
(31, 'è²¼æ–‡ç™¼å¸ƒ', 'é„­ä¿Šå½¥ å·²ç™¼ä½ˆä¸€å‰‡è²¼æ–‡è‡³ <a href=\"project_home.php?id=79\">æ¸¬è©¦</a>', 18, 79, 'root2@yahoo.com,root3@yahoo.com,root@yahoo.com'),
(32, '????', 'é„­ä¿Šå½¥ ???????? <a href=\"project_home.php?id=77\">ç¶“æ¿Ÿå­¸</a>', 18, 77, 'root3@yahoo.com,root@yahoo.com'),
(33, '????', '?? ???????? <a href=\"project_home.php?id=81\">????</a>', 21, 81, ',test0@yahoo.com'),
(34, '????', '?? ???????? <a href=\"project_home.php?id=81\">????</a>', 21, 81, ',test0@yahoo.com'),
(35, '????', '?? ???????? <a href=\"project_home.php?id=81\">????</a>', 21, 81, ',test0@yahoo.com'),
(36, '????', '?? ???????? <a href=\"project_home.php?id=81\">????</a>', 21, 81, ',test0@yahoo.com'),
(37, '????', '?? ???????? <a href=\"project_home.php?id=81\">????</a>', 21, 81, ',test0@yahoo.com'),
(38, '????', '?? ???????? <a href=\"project_home.php?id=82\">??</a>', 21, 82, ',test0@yahoo.com'),
(39, '????', '?? ???????? <a href=\"project_home.php?id=82\">??</a>', 21, 82, ',test0@yahoo.com'),
(40, '?????', 'é„­ä¿Šå½¥?<a href=\"project_home.php?id=77\">ç¶“æ¿Ÿå­¸</a>???????', 18, 77, 'root3@yahoo.com');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `userName` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `tag1` text,
  `tag2` text,
  `tag3` text,
  `tag4` text,
  `tag5` text,
  `rating` decimal(3,2) DEFAULT NULL,
  `price` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `projectName` varchar(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `products`
--

INSERT INTO `products` (`id`, `userName`, `title`, `slug`, `description`, `tag1`, `tag2`, `tag3`, `tag4`, `tag5`, `rating`, `price`, `image`, `projectName`, `stock`, `created_at`, `updated_at`) VALUES
(1, '試試', '國文：古今中外', 'ppp', 'The vertical space between the menu items is fully twice the height of the text itself. You’re looking at 12px font with just as much padding above and below it.', '1111', 'adidas\n', 'nike\n', 'chinese', NULL, '3.00', 200, 'http://i.imgur.com/TBKMTRP.png', NULL, 6, '2017-03-12 16:00:00', '2017-05-01 17:25:07'),
(2, '試試', '英文：演講', 'blow', 'that\'s all for now\n', '2222\n', '英文', NULL, NULL, NULL, '1.00', 150, 'http://i.imgur.com/w35xiVj.png', NULL, 9, '2014-03-14 16:00:00', '2017-05-01 17:25:07'),
(3, '晨浩', '通識', 'testing', 'thanks for sharing', '俊彥', NULL, NULL, NULL, NULL, '3.00', 100, 'http://i.imgur.com/mV60nYw.png', NULL, 6, '2016-03-12 16:00:00', '2017-05-01 17:25:07'),
(4, '俊彥', '資管', 'doggy', 'you little piece of ', 'nike', 'QQTAT', NULL, NULL, NULL, '1.40', 120, 'http://i.imgur.com/MJVIY3W.png', NULL, 5, '2017-04-12 16:00:00', '2017-05-01 17:25:07'),
(5, '魚魚', '專案', 'maybe', 'what the hhhhh are u doin', '資管畢業專案', '中文\n', NULL, NULL, NULL, '0.70', 80, 'http://i.imgur.com/MJVIY3W.png', NULL, 100, '2016-02-24 16:00:00', '2017-05-01 17:25:07'),
(6, '', 'CAT', '測試', 'i am a cat\n', NULL, NULL, NULL, NULL, NULL, '2.20', 0, 'http://i.imgur.com/MJVIY3W.png', NULL, 1, '2017-03-24 16:00:00', NULL),
(27, '試試', '我在TEST1234567', '我在T大', '大三上Investment', 'tg', '', '', '', '', NULL, 111, 'http://i.imgur.com/MJVIY3W.png', NULL, 1, NULL, NULL),
(28, '試試', '英文Today2016', '英文TEN沒', 'EN沒問題', 'english', 'communication', 'business', '', '', NULL, 222, 'http://i.imgur.com/TBKMTRP.png', NULL, 1, NULL, NULL),
(29, '試試', '中testPNG', '中test中te', '中testPNG', '中文', 'png', 'test', '', '', NULL, 123, 'http://i.imgur.com/rZLlpp8.png', NULL, 1, NULL, NULL),
(33, '試試', '政大GPA指標', '政大GNEW', 'NEW成績標準', 'nccu', 'gpa', 'gpa', '', '', NULL, 1, 'http://i.imgur.com/MJVIY3W.png', NULL, 2, NULL, '2017-05-01 17:25:07'),
(34, '試試', '政大GPA指標', '政大GNEW', 'NEW成績標準', '', '', 'hello test', '', '', NULL, 520, 'http://i.imgur.com/MJVIY3W.png', NULL, 1, NULL, NULL),
(38, '試試', '我沒IDEA3', '我沒Ipleas', 'please tell me project name', 'test3', 'nccu', '', '', '', NULL, 4444, 'http://i.imgur.com/rZLlpp8.png', '試試看吧', 1, NULL, NULL),
(39, '試試', 'CardGame', 'CardGamjust ', 'just some new db testing', 'first', 'test', 'ever', '', '', '5.00', 90, 'http://i.imgur.com/rZLlpp8.png', '打牌', 2, NULL, '2017-05-01 17:25:07');

-- --------------------------------------------------------

--
-- 資料表結構 `projects`
--

CREATE TABLE `projects` (
  `projectId` int(100) NOT NULL,
  `projectCreatorId` int(100) NOT NULL,
  `projectMembersId` varchar(200) DEFAULT NULL,
  `projectName` varchar(30) NOT NULL,
  `projectClassName` varchar(30) NOT NULL,
  `projectTeacher` varchar(30) NOT NULL,
  `projectCreatetime` date NOT NULL,
  `projectDeadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `projects`
--

INSERT INTO `projects` (`projectId`, `projectCreatorId`, `projectMembersId`, `projectName`, `projectClassName`, `projectTeacher`, `projectCreatetime`, `projectDeadline`) VALUES
(77, 18, 'root3@yahoo.com', 'ç¶“æ¿Ÿå­¸', 'ç¶“æ¿Ÿå­¸', 'ç¿æ°¸å’Œ', '2017-04-08', '2017-04-12'),
(78, 18, 'root3@yahoo.com', 'æœƒè¨ˆå­¸', 'æœƒè¨ˆå­¸', 'é»ƒé‡‘ç™¼', '2017-04-08', '2017-04-12'),
(79, 18, 'root2@yahoo.com,root3@yahoo.com', 'æ¸¬è©¦', 'æ¸¬è©¦', 'æ¸¬è©¦', '2017-04-08', '2017-04-04'),
(81, 21, '', '試試看吧', '試試課', '是是老師', '2017-04-09', '2017-04-30'),
(82, 21, '', '打牌', '麻將課', '豪哥', '2017-04-13', '2017-04-15'),
(83, 18, '', 'test', 'test', 'test', '2017-05-10', '2017-05-05'),
(84, 18, '', 'test', 'test', 'test', '2017-05-10', '2017-05-17');

-- --------------------------------------------------------

--
-- 資料表結構 `projects_stage`
--

CREATE TABLE `projects_stage` (
  `projects_stageId` int(100) NOT NULL,
  `projectId` int(100) NOT NULL,
  `project_stageStart` date NOT NULL,
  `project_stageEnd` date NOT NULL,
  `project_stageName` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `projects_stage`
--

INSERT INTO `projects_stage` (`projects_stageId`, `projectId`, `project_stageStart`, `project_stageEnd`, `project_stageName`) VALUES
(19, 78, '0000-00-00', '0000-00-00', ''),
(20, 78, '0000-00-00', '0000-00-00', ''),
(21, 78, '0000-00-00', '0000-00-00', ''),
(22, 79, '0000-00-00', '0000-00-00', ''),
(23, 79, '0000-00-00', '0000-00-00', ''),
(24, 79, '0000-00-00', '0000-00-00', ''),
(25, 82, '0000-00-00', '0000-00-00', ''),
(26, 82, '0000-00-00', '0000-00-00', ''),
(27, 82, '0000-00-00', '0000-00-00', ''),
(28, 83, '2017-05-11', '2017-05-31', 'test'),
(29, 84, '2017-01-01', '2017-05-31', 'test');

-- --------------------------------------------------------

--
-- 資料表結構 `projects_stage_missions`
--

CREATE TABLE `projects_stage_missions` (
  `missionId` int(11) NOT NULL,
  `projects_stageId` int(11) NOT NULL,
  `missionName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `missionMembers` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `missionDate` date NOT NULL,
  `missionContent` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `file_upload` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `projects_stage_missions`
--

INSERT INTO `projects_stage_missions` (`missionId`, `projects_stageId`, `missionName`, `missionMembers`, `missionDate`, `missionContent`, `file_upload`) VALUES
(202, 119, '白片', '', '2017-05-04', '白片一', 0),
(203, 119, '白片挖哈', '', '2017-05-06', '白片二', 0),
(204, 120, '紙本1', '', '2017-05-11', '紙本1', 0),
(205, 120, '紙本2', '', '2017-05-15', '紙本2', 0),
(206, 121, '最終發表', '', '2017-05-19', '最終發表', 0),
(207, 122, '小任務1', '', '2017-05-11', '', 0),
(208, 122, '小任務2', '', '2017-05-14', '', 0),
(209, 123, '小任務3', '', '2017-05-08', '', 0),
(210, 123, '小任務2', '', '2017-05-09', '', 0),
(211, 124, '小任務3', '', '2017-05-24', '', 0),
(212, 125, '小任務0', '', '2017-05-04', '', 1),
(213, 125, '小任務3', '', '2017-05-05', '', 1),
(214, 126, '小任務3', '', '2017-05-09', '', 1),
(215, 126, '小任務0', '', '2017-05-10', '', 1),
(216, 127, '小任務1', '', '2017-05-09', '', 1),
(217, 127, '小任務2', '', '2017-05-25', '', 1),
(218, 128, '小任務3', '', '2017-05-28', '', 1),
(219, 28, 'test', 'test', '2017-05-17', 'test', 1),
(220, 28, 'test', 'test', '2017-05-25', 'test', 1),
(221, 29, 'test', '', '2017-01-11', '', 1),
(222, 29, 'test', '', '2017-01-18', '', 1),
(223, 29, 'test', '', '2017-05-17', '', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `rating`
--

CREATE TABLE `rating` (
  `id` int(11) UNSIGNED NOT NULL,
  `userName` varchar(30) NOT NULL DEFAULT '',
  `product_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `feedback` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `rating`
--

INSERT INTO `rating` (`id`, `userName`, `product_id`, `score`, `feedback`) VALUES
(1, '試試', 1, 1, 'lol'),
(2, '試試', 1, 5, 'goood'),
(3, '試試', 2, 2, ''),
(4, '試試', 2, 4, 'op'),
(5, '試試', 1, 3, 'lovely'),
(6, '試試', 3, 4, 'hello todayyyyyy mis'),
(7, '試試', 3, 2, 'test ok ok'),
(8, '試試', 39, 5, 'new test');

-- --------------------------------------------------------

--
-- 資料表結構 `subcomment`
--

CREATE TABLE `subcomment` (
  `SubComId` int(11) NOT NULL,
  `ComId` int(11) NOT NULL,
  `SubComText` text CHARACTER SET latin1 NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `subcomment`
--

INSERT INTO `subcomment` (`SubComId`, `ComId`, `SubComText`, `UserId`) VALUES
(4, 129, 'su3cl3', 18),
(5, 126, '113', 18),
(6, 163, '???', 21),
(7, 163, '????', 21);

-- --------------------------------------------------------

--
-- 資料表結構 `tbl_uploads`
--

CREATE TABLE `tbl_uploads` (
  `id` int(10) NOT NULL,
  `file` varchar(100) CHARACTER SET latin1 NOT NULL,
  `type` varchar(30) CHARACTER SET latin1 NOT NULL,
  `size` int(11) NOT NULL,
  `projectId` int(100) DEFAULT NULL,
  `userId` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`id`, `file`, `type`, `size`, `projectId`, `userId`) VALUES
(26, 'å¯’å‡è¨ˆç•«.docx', 'docx', 13, 65, 19),
(27, 'three.xlsx', 'xlsx', 10, 66, 18),
(39, 'GPA.jpg', 'jpg', 77, 0, 21),
(40, 'Spreadsheet 5.1.xlsx', 'xlsx', 10, 0, 21),
(41, '2016_Fall Investments (Syllabus)20161114.docx', 'docx', 21, 0, 21),
(42, 'Screen Shot 2017-03-09 at 4.56.17 PM.png', 'png', 80, 0, 21),
(43, '17475117_1421066374625666_2082225024_o.png', 'png', 1325, 81, 21),
(44, 'mail_footer.png', 'png', 14, 82, 21);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) CHARACTER SET utf8 NOT NULL,
  `userEmail` varchar(60) CHARACTER SET utf8 NOT NULL,
  `userPass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `userDepartment` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `userStudentid` int(10) DEFAULT NULL,
  `userCellphone` int(11) DEFAULT NULL,
  `userIntroduction` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `userInterests` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `user_projectId_invited` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `userDepartment`, `userStudentid`, `userCellphone`, `userIntroduction`, `userInterests`, `user_projectId_invited`) VALUES
(18, 'é„­ä¿Šå½¥', 'root@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'è³‡ç®¡ä¸‰', 103306040, 9487, 'æˆ‘å°', 'æˆ‘å°', '72'),
(19, 'æ——é­š', 'root2@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'è³‡ç®¡ä¸‰', 103306000, 921234567, 'è‡ªæˆ‘ä»‹ç´¹', 'èˆˆè¶£', '67,68,72,73,74,75,77,78,79'),
(20, 'Sean', 'root3@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'è³‡ç®¡ä¸‰', 103306000, 912345678, 'è‡ªæˆ‘ä»‹ç´¹', 'èˆˆè¶£', '67,68,76,77,78,79'),
(21, '試試', 'test0@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '試試', 5550, 0, '', '', NULL);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ComId`);

--
-- 資料表索引 `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectId` (`projectId`) USING BTREE,
  ADD KEY `userId` (`userId`) USING BTREE;

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- 資料表索引 `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 資料表索引 `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `transaction_id` (`transaction_id`(191));

--
-- 資料表索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `postUserId` (`postUserId`),
  ADD KEY `postProjectId` (`postProjectId`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectId`),
  ADD KEY `IDX_projects_projectCreatorId` (`projectCreatorId`);

--
-- 資料表索引 `projects_stage`
--
ALTER TABLE `projects_stage`
  ADD PRIMARY KEY (`projects_stageId`),
  ADD KEY `projectId` (`projectId`);

--
-- 資料表索引 `projects_stage_missions`
--
ALTER TABLE `projects_stage_missions`
  ADD PRIMARY KEY (`missionId`);

--
-- 資料表索引 `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `subcomment`
--
ALTER TABLE `subcomment`
  ADD PRIMARY KEY (`SubComId`),
  ADD KEY `ComId` (`ComId`);

--
-- 資料表索引 `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `ComId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- 使用資料表 AUTO_INCREMENT `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- 使用資料表 AUTO_INCREMENT `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- 使用資料表 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- 使用資料表 AUTO_INCREMENT `projects`
--
ALTER TABLE `projects`
  MODIFY `projectId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- 使用資料表 AUTO_INCREMENT `projects_stage`
--
ALTER TABLE `projects_stage`
  MODIFY `projects_stageId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- 使用資料表 AUTO_INCREMENT `projects_stage_missions`
--
ALTER TABLE `projects_stage_missions`
  MODIFY `missionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;
--
-- 使用資料表 AUTO_INCREMENT `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `subcomment`
--
ALTER TABLE `subcomment`
  MODIFY `SubComId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`);

--
-- 資料表的 Constraints `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`postUserId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`postProjectId`) REFERENCES `projects` (`projectId`);

--
-- 資料表的 Constraints `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`projectCreatorId`) REFERENCES `users` (`userId`);

--
-- 資料表的 Constraints `projects_stage`
--
ALTER TABLE `projects_stage`
  ADD CONSTRAINT `projects_stage_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`);

--
-- 資料表的 Constraints `subcomment`
--
ALTER TABLE `subcomment`
  ADD CONSTRAINT `subcomment_ibfk_1` FOREIGN KEY (`ComId`) REFERENCES `comment` (`ComId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
