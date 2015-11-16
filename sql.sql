CREATE DATABASE  IF NOT EXISTS `shake` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `shake`;
-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: shake
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `drive`
--

DROP TABLE IF EXISTS `drive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` bigint(20) NOT NULL,
  `major` bigint(20) NOT NULL,
  `minor` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_active_time` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `poi_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `apply_id` int(11) NOT NULL,
  `page_ids` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `drive_device_id` (`device_id`),
  KEY `drive_major` (`major`),
  KEY `drive_minor` (`minor`),
  KEY `drive_status` (`status`),
  KEY `drive_last_active_time` (`last_active_time`),
  KEY `drive_uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drive`
--

LOCK TABLES `drive` WRITE;
/*!40000 ALTER TABLE `drive` DISABLE KEYS */;
INSERT INTO `drive` VALUES (45,2685089,10028,54010,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446800528,134138,'[\"123\",123123]'),(46,2688044,10028,56789,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446801010,134314,NULL),(47,2688045,10028,56790,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446801010,134314,NULL),(48,2688046,10028,56791,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446801010,134314,NULL),(49,2688047,10028,56792,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446801010,134314,NULL),(50,2688048,10028,56793,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446801010,134314,NULL),(51,2688049,10028,56794,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446801010,134314,NULL),(52,2688050,10028,56795,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446801010,134314,NULL),(53,2688051,10028,56796,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446801010,134314,NULL),(54,2688052,10028,56797,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446801010,134314,NULL),(55,2688053,10028,56798,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'接口测试',1,1446801010,134314,NULL),(56,2690692,10028,58599,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'测试',1,1446873524,135152,NULL),(57,2690693,10028,58600,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'测试',1,1446873524,135152,NULL),(58,2856662,10030,65359,0,0,'FDA50693-A4E2-4FB1-AFCF-C6EB07647825',0,'123',1,1447644295,142774,NULL);
/*!40000 ALTER TABLE `drive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagemanage`
--

DROP TABLE IF EXISTS `pagemanage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagemanage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '所属id',
  `page_id` varchar(255) NOT NULL COMMENT '页面id',
  `title` varchar(12) NOT NULL COMMENT '主标题',
  `description` varchar(14) NOT NULL COMMENT '副标题',
  `page_url` varchar(255) DEFAULT NULL COMMENT '跳转连接',
  `icon_url` varchar(255) NOT NULL COMMENT '图片',
  `comment` varchar(30) DEFAULT NULL COMMENT '备注',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagemanage`
--

LOCK TABLES `pagemanage` WRITE;
/*!40000 ALTER TABLE `pagemanage` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagemanage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `red_packets`
--

DROP TABLE IF EXISTS `red_packets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `red_packets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mch_billno` varchar(255) NOT NULL,
  `mch_id` varchar(255) NOT NULL,
  `wxappid` varchar(255) NOT NULL,
  `send_name` varchar(255) NOT NULL,
  `hb_type` varchar(255) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_num` int(11) NOT NULL,
  `amt_type` varchar(255) NOT NULL,
  `wishing` varchar(255) NOT NULL,
  `act_name` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `auth_mchid` varchar(255) NOT NULL,
  `auth_appid` varchar(255) NOT NULL,
  `risk_cntl` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `sp_ticket` varchar(255) DEFAULT NULL,
  `detail_id` varchar(255) DEFAULT NULL,
  `send_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `red_packets`
--

LOCK TABLES `red_packets` WRITE;
/*!40000 ALTER TABLE `red_packets` DISABLE KEYS */;
INSERT INTO `red_packets` VALUES (8,'1272328501201511133813415912','1272328501','wxee5f674259607538','人脉圈','NORMAL',1,1,'ALL_RAND','测试红包','测试红包','测试红包','1272328501','wxee5f674259607538','NORMAL',0,0,'v1|cUxFhXKVQHEQYodn7GY5wRZYfRqCpMKnhG11KIYlGZEO5AxD/P256oY+MysKf56fYlcLv3KmaIFr3ebnn3pS0VR6eb4DoPIqalr+pBIxRmzW168l0o2Qe9ALCOyRFh7zlGiq+mArioOHCxhjsy20ow==','0010607609201511130301168972',2147483647),(9,'1272328501201511131913426407','1272328501','wxee5f674259607538','人脉圈','NORMAL',1,1,'ALL_RAND','测试红包','测试红包','测试红包','1272328501','wxee5f674259607538','NORMAL',1,1447384785,'v1|cUxFhXKVQHEQYodn7GY5wX3cA+tqWWn0Cusg7pmWA9YO5AxD/P256oY+MysKf56fYlcLv3KmaIFr3ebnn3pS0TitTtvDEceoV6pPlylVJ+MeZXYS3dFqxY9RX3k9w95sioUPtMshD7kW3agNvWz9Ag==','0010607609201511130301361089',2147483647),(10,'1272328501201511162716091695','1272328501','wxee5f674259607538','人脉圈','NORMAL',1,1,'ALL_RAND','123','123','123','1272328501','wxee5f674259607538','NORMAL',1,1447644432,'v1|cUxFhXKVQHEQYodn7GY5wVwGbvPEVomqgvYqWkCDSOEO5AxD/P256oY+MysKf56fYlcLv3KmaIFr3ebnn3pS0fcxxgP2noDBD0TICEqbe0YFA0eHhrL4AE39EbnfuOBODZE/h1Xg52W2E057ylg5lQ==','0010607609201511160308018528',2147483647);
/*!40000 ALTER TABLE `red_packets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reg_drive`
--

DROP TABLE IF EXISTS `reg_drive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reg_drive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `apply_reason` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `poi_id` int(11) DEFAULT NULL,
  `apply_id` float NOT NULL,
  `audit_status` int(11) NOT NULL,
  `audit_comment` varchar(255) DEFAULT NULL,
  `apply_time` int(11) NOT NULL,
  `audit_time` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reg_drive_apply_id` (`apply_id`),
  KEY `reg_drive_apply_audit_status` (`audit_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reg_drive`
--

LOCK TABLES `reg_drive` WRITE;
/*!40000 ALTER TABLE `reg_drive` DISABLE KEYS */;
INSERT INTO `reg_drive` VALUES (1,1,'接口测试','接口测试',NULL,134138,2,'审核已通过',1447643888,1447643888,NULL),(2,10,'接口测试','接口测试',NULL,134314,2,'审核已通过',1447643888,1447643888,1),(3,2,'测试','测试',NULL,135152,2,'审核已通过',1447643888,1447643888,1),(4,1,'123','123',NULL,142774,2,'审核已通过',1447643888,1447643888,NULL);
/*!40000 ALTER TABLE `reg_drive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `logintime` int(11) NOT NULL,
  `regtime` int(11) NOT NULL,
  `lastlogintime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersextends`
--

DROP TABLE IF EXISTS `usersextends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usersextends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersextends`
--

LOCK TABLES `usersextends` WRITE;
/*!40000 ALTER TABLE `usersextends` DISABLE KEYS */;
/*!40000 ALTER TABLE `usersextends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wechat_config`
--

DROP TABLE IF EXISTS `wechat_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wechat_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `appid` varchar(255) NOT NULL,
  `appsecret` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`),
  KEY `wechatConfig_uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wechat_config`
--

LOCK TABLES `wechat_config` WRITE;
/*!40000 ALTER TABLE `wechat_config` DISABLE KEYS */;
INSERT INTO `wechat_config` VALUES (1,1,'wxee5f674259607538','7dc588e636b185912d24d23b14a83099');
/*!40000 ALTER TABLE `wechat_config` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-16 11:38:06
