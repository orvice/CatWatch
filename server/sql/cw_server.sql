-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `cw_server`;
CREATE TABLE `cw_server` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `server_cate` int(32) NOT NULL,
  `server_name` varchar(128) NOT NULL,
  `server_api_add` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cw_server` (`id`, `server_cate`, `server_name`, `server_api_add`) VALUES
(1,	2,	'sfo',	'http://sfo.shadowx.com/CatWatch/client/api.php');

-- 2015-03-18 16:37:59
