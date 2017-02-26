-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017 �?02 ??20 ??14:55
-- 伺服器版本: 5.6.24
-- PHP 版本： 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `mis`
--

-- --------------------------------------------------------

--
-- 資料表結構 `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `projectId` int(100) NOT NULL,
  `projectCreatorId` int(100) NOT NULL,
  `projectMembersId` varchar(200) DEFAULT NULL,
  `projectName` varchar(30) NOT NULL,
  `projectClassName` varchar(30) NOT NULL,
  `projectTeacher` varchar(30) NOT NULL,
  `projectCreatetime` date NOT NULL,
  `projectDeadline` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `projects`
--

INSERT INTO `projects` (`projectId`, `projectCreatorId`, `projectMembersId`, `projectName`, `projectClassName`, `projectTeacher`, `projectCreatetime`, `projectDeadline`) VALUES
(61, 18, '0', 'æ¸¬è©¦äºŒ', 'æ¸¬è©¦äºŒ', 'æ¸¬è©¦äºŒ', '2017-02-05', '2017-02-01'),
(62, 18, '0', 'æ¸¬è©¦ä¸‰', 'æ¸¬è©¦ä¸‰', 'æ¸¬è©¦ä¸‰', '2017-02-05', '2017-02-01'),
(63, 18, '0', 'æ¸¬è©¦å››(æ¸¬è©¦)', 'æ¸¬è©¦å››(æ¸¬è©¦)', 'æ¸¬è©¦å››(æ¸¬è©¦)', '2017-02-05', '2017-02-04'),
(64, 18, '0', 'æ¸¬è©¦äº”ä½ å¥½', 'æ¸¬è©¦äº”', 'æ¸¬è©¦äº”', '2017-02-08', '2017-02-01'),
(65, 18, '19,20', 'æ¸¬è©¦é‚€è«‹', 'æ¸¬è©¦é‚€è«‹', 'æ¸¬è©¦é‚€è«‹', '2017-02-14', '2017-02-28'),
(66, 18, '19,20', '123', '123', '123', '2017-02-17', '2017-02-01');

-- --------------------------------------------------------

--
-- 資料表結構 `projects_stage`
--

CREATE TABLE IF NOT EXISTS `projects_stage` (
  `projects_stageId` int(100) NOT NULL,
  `projectId` int(100) NOT NULL,
  `project_stageStart` date NOT NULL,
  `project_stageEnd` date NOT NULL,
  `project_stageName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `projects_stage`
--

INSERT INTO `projects_stage` (`projects_stageId`, `projectId`, `project_stageStart`, `project_stageEnd`, `project_stageName`) VALUES
(47, 61, '0000-00-00', '0000-00-00', 'æ¸¬è©¦äºŒ'),
(48, 61, '0000-00-00', '0000-00-00', 'æ¸¬è©¦äºŒ'),
(49, 61, '0000-00-00', '0000-00-00', 'æ¸¬è©¦äºŒ'),
(50, 62, '2017-02-02', '2017-02-05', 'æ¸¬è©¦ä¸‰'),
(51, 62, '2017-02-06', '2017-02-10', 'æ¸¬è©¦ä¸‰'),
(52, 62, '2017-02-11', '2017-02-15', 'æ¸¬è©¦ä¸‰'),
(53, 63, '2017-02-02', '2017-02-05', 'æ¸¬è©¦å››(æ¸¬è©¦)'),
(54, 63, '2017-02-09', '2017-02-10', 'æ¸¬è©¦å››(æ¸¬è©¦)'),
(55, 63, '2017-02-11', '2017-02-15', 'æ¸¬è©¦å››'),
(56, 64, '2017-02-02', '2017-02-05', 'æ¸¬è©¦äº”'),
(57, 64, '2017-02-06', '2017-02-10', 'æ¸¬è©¦äº”'),
(58, 64, '2017-02-11', '2017-02-15', 'æ¸¬è©¦äº”'),
(59, 65, '0000-00-00', '0000-00-00', 'æ¸¬è©¦é‚€è«‹'),
(60, 65, '0000-00-00', '0000-00-00', 'æ¸¬è©¦é‚€è«‹'),
(61, 65, '0000-00-00', '0000-00-00', 'æ¸¬è©¦é‚€è«‹'),
(62, 66, '0000-00-00', '0000-00-00', ''),
(63, 66, '0000-00-00', '0000-00-00', ''),
(64, 66, '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- 資料表結構 `tbl_uploads`
--

CREATE TABLE IF NOT EXISTS `tbl_uploads` (
  `id` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `projectId` int(100) DEFAULT NULL,
  `userId` int(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userDepartment` varchar(20) DEFAULT NULL,
  `userStudentid` int(10) DEFAULT NULL,
  `userCellphone` int(11) DEFAULT NULL,
  `userIntroduction` varchar(300) DEFAULT NULL,
  `userInterests` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `userDepartment`, `userStudentid`, `userCellphone`, `userIntroduction`, `userInterests`) VALUES
(18, 'é„­ä¿Šå½¥', 'root@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'æ³•å¾‹ä¸‰', 103306040, 921685487, 'çœ‹æ³•å¾‹', 'ç¡è¦º'),
(19, 'æ——é­š', 'root2@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'è³‡ç®¡ä¸‰', 103306000, 921234567, 'è‡ªæˆ‘ä»‹ç´¹', 'èˆˆè¶£'),
(20, 'Sean', 'root3@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'è³‡ç®¡ä¸‰', 103306000, 912345678, 'è‡ªæˆ‘ä»‹ç´¹', 'èˆˆè¶£');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectId`), ADD KEY `IDX_projects_projectCreatorId` (`projectCreatorId`);

--
-- 資料表索引 `projects_stage`
--
ALTER TABLE `projects_stage`
  ADD PRIMARY KEY (`projects_stageId`), ADD KEY `projectId` (`projectId`);

--
-- 資料表索引 `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`), ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `projects`
--
ALTER TABLE `projects`
  MODIFY `projectId` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- 使用資料表 AUTO_INCREMENT `projects_stage`
--
ALTER TABLE `projects_stage`
  MODIFY `projects_stageId` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- 使用資料表 AUTO_INCREMENT `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- 已匯出資料表的限制(Constraint)
--

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
