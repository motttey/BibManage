-- MySQL dump 10.13  Distrib 5.6.24, for osx10.9 (x86_64)
--
-- Host: localhost    Database: webapp
-- ------------------------------------------------------
-- Server version	5.6.24

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
-- Table structure for table `bib`
--

DROP TABLE IF EXISTS `bib`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bib` (
  `bibindex` int(11) NOT NULL DEFAULT '0',
  `bibtype` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`bibindex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bib`
--

LOCK TABLES `bib` WRITE;
/*!40000 ALTER TABLE `bib` DISABLE KEYS */;
INSERT INTO `bib` VALUES (1,2,2006),(2,1,2009),(3,3,2012),(4,2,1999),(5,3,2011),(6,1,2014),(7,3,2014),(8,3,2004),(9,2,1991),(10,1,2011),(11,1,2006),(12,3,2010),(13,2,2004),(14,2,2011),(15,2,2011),(16,2,2005),(17,1,1990),(18,1,2009),(19,2,2014),(20,3,2006);
/*!40000 ALTER TABLE `bib` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `bibindex` int(11) NOT NULL DEFAULT '0',
  `authorindex` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bibindex`,`authorindex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (2,1,'Computational Support for Sketching Design','Gave Johnson','Now Publishers'),(2,2,'Computational Support for Sketching Design','Mark D. Gross','Now Publishers'),(2,3,'Computational Support for Sketching Design','Jason Hong','Now Publishers'),(2,4,'Computational Support for Sketching Design','Ellen Yi-Luen Do','Now Publishers'),(6,1,'ユーザエクスペリエンスの測定','Tom Tullis','東京電機大学出版局'),(6,2,'ユーザエクスペリエンスの測定','Albert William','東京電機大学出版局'),(10,1,'ビューティフルビジュアライゼーション(THEORY/IN/PRACTICE)','Julie Steele','オライリージャパン'),(10,2,'ビューティフルビジュアライゼーション(THEORY/IN/PRACTICE)','Noah Illinsky','オライリージャパン'),(11,1,'知性の創発と起源','鈴木 宏昭','オーム社'),(11,2,'知性の創発と起源','人工知能学会','オーム社'),(17,1,'誰のためのデザイン？ 認知科学者のデザイン原論','Donald A. Norman','六曜社'),(18,1,'色彩デザイン学','三井直樹','六曜社'),(18,2,'色彩デザイン学','三井秀樹','六曜社');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fullpaper`
--

DROP TABLE IF EXISTS `fullpaper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fullpaper` (
  `bibindex` int(11) NOT NULL DEFAULT '0',
  `authorindex` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `magazine` varchar(100) DEFAULT NULL,
  `vol` int(11) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `page` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`bibindex`,`authorindex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fullpaper`
--

LOCK TABLES `fullpaper` WRITE;
/*!40000 ALTER TABLE `fullpaper` DISABLE KEYS */;
INSERT INTO `fullpaper` VALUES (1,1,'デザイナの行動分析によるデザイン支援ツールの設計と評価','田野 俊一','情報処理学会論文誌',48,3,'pp.1113-1124'),(1,2,'デザイナの行動分析によるデザイン支援ツールの設計と評価','佐々木 勇介','情報処理学会論文誌',48,3,'pp.1113-1124'),(1,3,'デザイナの行動分析によるデザイン支援ツールの設計と評価','岩田 満','情報処理学会論文誌',48,3,'pp.1113-1124'),(1,4,'デザイナの行動分析によるデザイン支援ツールの設計と評価','橋山 智訓','情報処理学会論文誌',48,3,'pp.1113-1124'),(4,1,'デザイン描画を支援するユーザインタフェース','田野 俊一','情報処理学会論文誌',82,10,'pp.1694-1709'),(4,2,'デザイン描画を支援するユーザインタフェース','市野 順子','情報処理学会論文誌',82,10,'pp.1694-1709'),(9,1,'The dialectics of sketching','Goldschmidt Gabriela','Creativity Research Journal',4,2,'pp.123-143'),(13,1,'創造的情報創出のためのナレッジインタラクションデザイン','中小路 久美代','人工知能学会論文誌',19,2,'pp.154-165'),(13,2,'創造的情報創出のためのナレッジインタラクションデザイン','山本 恭裕','人工知能学会論文誌',19,2,'pp.154-165'),(14,1,'Web上で編集/派生可能なイラストツールの研究','神原 啓介','情報処理学会論文誌  ',52,4,'pp.1621-1634'),(14,2,'Web上で編集/派生可能なイラストツールの研究','永田 周一','情報処理学会論文誌  ',52,4,'pp.1621-1634'),(14,3,'Web上で編集/派生可能なイラストツールの研究','塚田 浩二','情報処理学会論文誌  ',52,4,'pp.1621-1634'),(15,1,'デザイン支援環境のデザインとしてのメタデザイン','中小路 久美代','日本デザイン学会論文誌',18,69,'pp.30-33'),(16,1,'Design sketches and sketch design tools','Ellen Yi-Luen Do','ACM Knowledge-Based Systems',18,8,'pp.383-405 '),(19,1,'デスクトップ上の画面変化に基づく取り消し操作の可視化手法','坂本 有沙','情報処理学会論文誌',55,8,'pp.1899-1908'),(19,2,'デスクトップ上の画面変化に基づく取り消し操作の可視化手法','片山 拓也','情報処理学会論文誌',55,8,'pp.1899-1908'),(19,3,'デスクトップ上の画面変化に基づく取り消し操作の可視化手法','寺田 努','情報処理学会論文誌',55,8,'pp.1899-1908'),(19,4,'デスクトップ上の画面変化に基づく取り消し操作の可視化手法','塚本 昌彦','情報処理学会論文誌',55,8,'pp.1899-1908');
/*!40000 ALTER TABLE `fullpaper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shortpaper`
--

DROP TABLE IF EXISTS `shortpaper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shortpaper` (
  `bibindex` int(11) NOT NULL DEFAULT '0',
  `authorindex` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `magazine` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bibindex`,`authorindex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shortpaper`
--

LOCK TABLES `shortpaper` WRITE;
/*!40000 ALTER TABLE `shortpaper` DISABLE KEYS */;
INSERT INTO `shortpaper` VALUES (3,1,'軌跡に基づいたundo/redoインタフェース','大江 龍人','情報処理学会研究報告, CHI'),(3,2,'軌跡に基づいたundo/redoインタフェース','志築 文太郎','情報処理学会研究報告, CHI'),(3,3,'軌跡に基づいたundo/redoインタフェース','田中 二郎','情報処理学会研究報告, CHI'),(5,1,'Nonlinear revision control for images','Hsiang-Ting Chen','ACM SIGGRAPH'),(5,2,'Nonlinear revision control for images','Li-Yi Wei','ACM SIGGRAPH'),(5,3,'Nonlinear revision control for images','Chun-Fa Chang','ACM SIGGRAPH'),(7,1,'CAUSALITY: A Conceptual Model of Interaction History','Mathieu Nancel','ACM CHI'),(7,2,'CAUSALITY: A Conceptual Model of Interaction History','Andy Cockburn','ACM CHI'),(8,1,'デザイン発想支援システムは何を支援しうるのか？','野口 尚孝','人工知能学会全国大会'),(8,2,'デザイン発想支援システムは何を支援しうるのか？','永井 由佳里','人工知能学会全国大会'),(12,1,'Chronicle: Capture, Exploration, and Playback of Document Workflow Histories','Tovi Grossman','ACM UIST'),(12,2,'Chronicle: Capture, Exploration, and Playback of Document Workflow Histories','Justin Matejka','ACM UIST'),(12,3,'Chronicle: Capture, Exploration, and Playback of Document Workflow Histories','George Fitzmaurice','ACM UIST'),(20,1,'時間情報を利用した手描きスケッチングツール','中小路 久美代','インタラクション'),(20,2,'時間情報を利用した手描きスケッチングツール','山本 恭裕','インタラクション'),(20,3,'時間情報を利用した手描きスケッチングツール','西中 芳幸','インタラクション');
/*!40000 ALTER TABLE `shortpaper` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-27 22:50:47
