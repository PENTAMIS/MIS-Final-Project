-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-04-13 17:55:00
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
(162, 22, 86, '你好嗎？\r\n', '2017-04-10 17:02:52'),
(163, 22, 86, '操', '2017-04-12 15:42:29');

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
(1, 'ROOT', 'root@yahoo.com', '2017-03-24 23:36:42', '2017-03-24 23:36:42'),
(2, 'ADMIN', 'admin1111@yahoo.com', '2017-03-26 04:56:20', '2017-03-26 04:56:20'),
(3, 'QQ', 'quadratic999@yahoo.com', '2017-03-26 07:10:09', '2017-03-26 07:10:09'),
(4, 'TEST', 'test123@yahoo.com', '2017-04-09 00:19:44', '2017-04-09 00:19:44');

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
(1, '372731e84dd86f7b38ef2dba7abb44b46d922163e499e2f31d8787739f421cad', 1465, 1, 1, '2017-03-24 23:36:42', '2017-03-24 23:36:43'),
(2, 'd127fc6b1b141db46752adcc31572e14c2872c68d4d6e7bd0a688c4a93f03af0', 805, 1, 2, '2017-03-26 04:56:20', '2017-03-26 04:56:21'),
(3, '06b29c3d3fe757bcf71df629ac8eaf6694aa02f1332eef5b44ad4af9605d71ab', 355, 1, 3, '2017-03-26 07:10:09', '2017-03-26 07:10:11'),
(4, '5c8b760635ff01d5cc3dd40bde24ba2ba596bdc4ca7aa13f3005f835c3881e5b', 155, 1, 4, '2017-04-09 00:19:44', '2017-04-09 00:19:46');

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
(1, 1, 1, 2),
(2, 1, 3, 5),
(3, 1, 5, 7),
(4, 2, 1, 1),
(5, 2, 4, 5),
(6, 3, 1, 1),
(7, 3, 2, 1),
(8, 4, 2, 1);

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
(1, 1, 0, '7yac3hnb', '2017-03-24 23:36:43', '2017-03-24 23:36:43'),
(2, 2, 0, '4hn5g6vf', '2017-03-26 04:56:21', '2017-03-26 04:56:21'),
(3, 3, 0, 'pmztkmmf', '2017-03-26 07:10:11', '2017-03-26 07:10:11'),
(4, 4, 0, 'hnbn9dg3', '2017-04-09 00:19:46', '2017-04-09 00:19:46');

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
(34, '????', '??? ???????? <a href=\"project_home.php?id=86\">???</a>', 22, 86, ',root@yahoo.com'),
(35, '????', '??? ???????? <a href=\"project_home.php?id=86\">???</a>', 22, 86, ',root@yahoo.com');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `price` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(86, 22, '', '經濟學', '經濟學', '翁永和', '2017-04-10', '2017-04-05'),
(87, 22, '', '測試', '測試', '測試', '2017-04-12', '2017-04-06'),
(88, 22, '', '幹嘛', '幹嘛', '幹嘛', '2017-04-12', '2017-04-06');

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

-- --------------------------------------------------------

--
-- 資料表結構 `projects_stage_missions`
--

CREATE TABLE `projects_stage_missions` (
  `missionId` int(11) NOT NULL,
  `projects_stageId` int(11) NOT NULL,
  `missionName` int(11) NOT NULL,
  `missionMembers` int(11) NOT NULL,
  `missionDate` int(11) NOT NULL,
  `missionContent` int(11) NOT NULL,
  `file_upload` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `userId` int(100) DEFAULT NULL,
  `missionId` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
(22, '鄭俊彥', 'root@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '法律三', 103303040, 987548754, '我很小', '當很小的人', NULL);

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
  MODIFY `ComId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
--
-- 使用資料表 AUTO_INCREMENT `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- 使用資料表 AUTO_INCREMENT `projects`
--
ALTER TABLE `projects`
  MODIFY `projectId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- 使用資料表 AUTO_INCREMENT `projects_stage`
--
ALTER TABLE `projects_stage`
  MODIFY `projects_stageId` int(100) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `projects_stage_missions`
--
ALTER TABLE `projects_stage_missions`
  MODIFY `missionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `subcomment`
--
ALTER TABLE `subcomment`
  MODIFY `SubComId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
