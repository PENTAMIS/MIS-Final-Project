-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-03-22 13:45:04
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mis`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `comment`
--

INSERT INTO `comment` (`ComId`, `UserId`, `ProjectId`, `ComText`, `ComTime`) VALUES
(102, 18, 68, '123', '2017-03-11 13:26:14'),
(104, 18, 68, '123', '2017-03-12 14:49:43'),
(105, 18, 68, 'é„­ä¿Šå½¥', '2017-03-12 14:49:49');

-- --------------------------------------------------------

--
-- 資料表結構 `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block',
  `userId` int(100) DEFAULT NULL,
  `projectId` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`, `userId`, `projectId`) VALUES
(28, '123', '2017-03-02', '2017-03-15 13:37:25', '2017-03-15 13:37:25', 1, 18, 69),
(29, '123', '2017-03-03', '2017-03-15 13:38:26', '2017-03-15 13:38:26', 1, 18, 69),
(30, '123', '2017-03-02', '2017-03-15 16:19:33', '2017-03-15 16:19:33', 1, 18, 70),
(31, '12132', '2017-03-15', '2017-03-22 13:13:54', '2017-03-22 13:13:54', 1, 18, 71),
(32, '1231', '2017-03-23', '2017-03-22 13:14:15', '2017-03-22 13:14:15', 1, 18, 71);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `projects`
--

INSERT INTO `projects` (`projectId`, `projectCreatorId`, `projectMembersId`, `projectName`, `projectClassName`, `projectTeacher`, `projectCreatetime`, `projectDeadline`) VALUES
(69, 18, '', 'é„­ä¿Šå½¥', 'é„­ä¿Šå½¥aèª²', 'é„­ä¿Šå½¥', '2017-03-15', '2017-06-05'),
(70, 18, '', 'æ——é­š', 'æ——é­š', 'æ——é­š', '2017-03-15', '0000-00-00'),
(71, 18, '', 'é„­éŸ¶å¨', 'é„­éŸ¶å¨', 'é„­éŸ¶å¨', '2017-03-15', '0000-00-00');

-- --------------------------------------------------------

--
-- 資料表結構 `projects_stage`
--

CREATE TABLE `projects_stage` (
  `projects_stageId` int(100) NOT NULL,
  `projectId` int(100) NOT NULL,
  `project_stageStart` date NOT NULL,
  `project_stageEnd` date NOT NULL,
  `project_stageName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `projects_stage`
--

INSERT INTO `projects_stage` (`projects_stageId`, `projectId`, `project_stageStart`, `project_stageEnd`, `project_stageName`) VALUES
(7, 70, '0000-00-00', '0000-00-00', 'æ——é­š'),
(8, 70, '0000-00-00', '0000-00-00', 'æ——é­š'),
(9, 70, '0000-00-00', '0000-00-00', 'æ——é­š'),
(10, 71, '0000-00-00', '0000-00-00', 'é„­éŸ¶å¨'),
(11, 71, '0000-00-00', '0000-00-00', 'é„­éŸ¶å¨'),
(12, 71, '0000-00-00', '0000-00-00', 'é„­éŸ¶å¨');

-- --------------------------------------------------------

--
-- 資料表結構 `tbl_uploads`
--

CREATE TABLE `tbl_uploads` (
  `id` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `projectId` int(100) DEFAULT NULL,
  `userId` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`id`, `file`, `type`, `size`, `projectId`, `userId`) VALUES
(26, 'å¯’å‡è¨ˆç•«.docx', 'docx', 13, 65, 19),
(27, 'three.xlsx', 'xlsx', 10, 66, 18);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userDepartment` varchar(20) DEFAULT NULL,
  `userStudentid` int(10) DEFAULT NULL,
  `userCellphone` int(11) DEFAULT NULL,
  `userIntroduction` varchar(300) DEFAULT NULL,
  `userInterests` varchar(200) DEFAULT NULL,
  `user_projectId_invited` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `userDepartment`, `userStudentid`, `userCellphone`, `userIntroduction`, `userInterests`, `user_projectId_invited`) VALUES
(18, 'æ¸¬æ˜¯12', 'root@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 0, 98787, '', '', ''),
(19, 'æ——é­š', 'root2@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'è³‡ç®¡ä¸‰', 103306000, 921234567, 'è‡ªæˆ‘ä»‹ç´¹', 'èˆˆè¶£', '67,68'),
(20, 'Sean', 'root3@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'è³‡ç®¡ä¸‰', 103306000, 912345678, 'è‡ªæˆ‘ä»‹ç´¹', 'èˆˆè¶£', '67,68');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ComId`);

--
-- 資料表索引 `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectId` (`projectId`) USING BTREE,
  ADD KEY `userId` (`userId`) USING BTREE;

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
  MODIFY `ComId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- 使用資料表 AUTO_INCREMENT `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- 使用資料表 AUTO_INCREMENT `projects`
--
ALTER TABLE `projects`
  MODIFY `projectId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- 使用資料表 AUTO_INCREMENT `projects_stage`
--
ALTER TABLE `projects_stage`
  MODIFY `projects_stageId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
-- 資料表的 Constraints `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`projectCreatorId`) REFERENCES `users` (`userId`);

--
-- 資料表的 Constraints `projects_stage`
--
ALTER TABLE `projects_stage`
  ADD CONSTRAINT `projects_stage_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
