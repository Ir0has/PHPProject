-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017 年 4 朁E06 日 09:11
-- サーバのバージョン： 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testphp`
--
CREATE DATABASE IF NOT EXISTS `testphp` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `testphp`;

-- --------------------------------------------------------

--
-- テーブルの構造 `leaguename`
--

DROP TABLE IF EXISTS `leaguename`;
CREATE TABLE IF NOT EXISTS `leaguename` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `leaguename` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 挿入前にテーブルを空にする `leaguename`
--

TRUNCATE TABLE `leaguename`;
--
-- テーブルのデータのダンプ `leaguename`
--

INSERT INTO `leaguename` (`no`, `leaguename`) VALUES(1, 'セントラルリーグ');
INSERT INTO `leaguename` (`no`, `leaguename`) VALUES(2, 'パシフィックリーグ');

-- --------------------------------------------------------

--
-- テーブルの構造 `teamname`
--

DROP TABLE IF EXISTS `teamname`;
CREATE TABLE IF NOT EXISTS `teamname` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `teamname` varchar(100) COLLATE utf8_bin NOT NULL,
  `leagueno` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 挿入前にテーブルを空にする `teamname`
--

TRUNCATE TABLE `teamname`;
--
-- テーブルのデータのダンプ `teamname`
--

INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(1, '読売ジャイアンツ', 1);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(2, '阪神タイガース', 1);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(3, '中日ドラゴンズ', 1);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(4, '横浜DeNAベイスターズ', 1);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(5, '広島東洋カープ', 1);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(6, '東京ヤクルトスワローズ', 1);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(7, 'オリックス・バファローズ', 2);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(8, '福岡ソフトバンクホークス', 2);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(9, '北海道日本ハムファイターズ', 2);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(10, '千葉ロッテマリーンズ', 2);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(11, '埼玉西武ライオンズ', 2);
INSERT INTO `teamname` (`no`, `teamname`, `leagueno`) VALUES(12, '東北楽天ゴールデンイーグルズ', 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `testact1`
--

DROP TABLE IF EXISTS `testact1`;
CREATE TABLE IF NOT EXISTS `testact1` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `teamno` int(11) NOT NULL,
  `backno` int(11) NOT NULL,
  `humname` varchar(60) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 挿入前にテーブルを空にする `testact1`
--

TRUNCATE TABLE `testact1`;
--
-- テーブルのデータのダンプ `testact1`
--

INSERT INTO `testact1` (`No`, `teamno`, `backno`, `humname`) VALUES(2, 3, 5, 'ｄなめ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
