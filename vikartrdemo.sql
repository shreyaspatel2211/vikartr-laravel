-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: vikartrdemo
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_user_id_foreign` (`user_id`),
  CONSTRAINT `blog_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'Domain & Hosting','sdfsdgdfsf','sdgkjfddfgfgfgsf','dfsdgs','public/storage/images/team/1716959794.png','public/storage/images/team/1716959794.png','Author','How to host website on any hosting provider?',1,'2024-05-30 05:03:33',NULL),(2,'Domain & Hosting','XZvxcvbcvb','ZXCZVxcv','xzcv','public/storage/images/blog/1717047695_banner.png','public/storage/images/blog/1717047695_icon.jpg','author','ZXc',1,'2024-05-30 00:11:35','2024-05-30 00:11:35'),(3,'do','We denounce with righteous indige nation and dislike men who are so beguiled and demo realized by the charms of pleasure of the moment, so blinded by desire, that','We denounce with righteous indige nation and dislike men who are so beguiled and demo realized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue cannot foresee. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled data structures manages data in technology.','We can easily manage if we will only take, each day, the burden appointed to it. But the load will be too heavy for us if we carry yesterday’s burden over again today, and then add the burden of the morrow before we are required to bear it.','public/storage/images/blog/1717049483_banner.jpg','public/storage/images/blog/1717049483_icon.png','author','How to host website on any hosting provider?',1,'2024-05-30 00:41:23','2024-05-30 00:41:23');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `call_booking`
--

DROP TABLE IF EXISTS `call_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `call_booking` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `call_booking_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `call_booking`
--

LOCK TABLES `call_booking` WRITE;
/*!40000 ALTER TABLE `call_booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `call_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `careers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `careers_city_id_foreign` (`city_id`),
  CONSTRAINT `careers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `careers`
--

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
INSERT INTO `careers` VALUES (1,'PHP Developer','public/storage/images/careers/1717148935.png','2 + years','php-developer',2,'2024-05-31 04:18:55','2024-05-31 04:26:41'),(2,'Laravel Developer','public/storage/images/careers/1717149444.png','2 + years','laravel_developer',2,'2024-05-31 04:27:24','2024-05-31 04:27:24'),(3,'Backend PHP Developer','public/storage/images/careers/1717149493.png','2 + years','backend_php_developer',2,'2024-05-31 04:28:13','2024-05-31 04:28:13'),(4,'Cloud Backend Services','public/storage/images/careers/1717149524.png','2 + years','Cloud Backend Services',2,'2024-05-31 04:28:44','2024-05-31 04:28:44'),(5,'Mern Stack Developer','public/storage/images/careers/1717149546.png','2 + years','Mern Stack Developer',2,'2024-05-31 04:29:06','2024-05-31 04:29:06'),(6,'React Native Developer','public/storage/images/careers/1717149586.png','2 + years','React Native Developer',2,'2024-05-31 04:29:46','2024-05-31 04:29:46'),(7,'Flutter Developer','public/storage/images/careers/1717149605.png','2 + years','Flutter Developer',2,'2024-05-31 04:30:05','2024-05-31 04:30:05');
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'IT Solutions',NULL,NULL),(2,'web develoment','2024-05-22 03:36:41','2024-05-22 03:36:41');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint unsigned NOT NULL,
  `state_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_country_id_foreign` (`country_id`),
  KEY `city_state_id_foreign` (`state_id`),
  CONSTRAINT `city_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `city_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Ahmedabad','ahm',1,1,NULL,NULL),(2,'Gandhinagar','gj',1,1,NULL,NULL);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_category_id_foreign` (`category_id`),
  CONSTRAINT `company_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=943 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Vikartr Technologies','vt',1,NULL,NULL),(3,'Comapny2','Comapny2',NULL,'2024-06-06 06:00:01','2024-06-06 06:00:01'),(4,'Company1','Company1',NULL,'2024-06-06 06:00:01','2024-06-06 06:00:01'),(5,'Vikartr Technologies','Vikartr Technologies',NULL,'2024-06-06 06:00:01','2024-06-06 06:00:01'),(429,'3one4 Capital IFSC Fund','3one4 Capital IFSC Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(430,'A91 Partners GIFT Trust II','A91 Partners GIFT Trust II',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(431,'Abans Diversified Fund','Abans Diversified Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(432,'Abans Investment Fund','Abans Investment Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(433,'ABSL Global Emerging Market Equity Fund (IFSC)','ABSL Global Emerging Market Equity Fund (IFSC)',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(434,'ABSL Index Linked Fund (IFSC)','ABSL Index Linked Fund (IFSC)',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(435,'Airavat Capital India Fund','Airavat Capital India Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(436,'Airavat Global Technology Fund NR','Airavat Global Technology Fund NR',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(437,'Airavat Global Technology Fund R','Airavat Global Technology Fund R',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(438,'Aivot Capital Fund','Aivot Capital Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(439,'Alchemy Alternative Investment Trust','Alchemy Alternative Investment Trust',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(440,'Alpha Alternatives Equity Absolute Return Fund','Alpha Alternatives Equity Absolute Return Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(441,'Alpha Alternatives Global Fund I','Alpha Alternatives Global Fund I',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(442,'Alpha Alternatives Nifty Plus Fund','Alpha Alternatives Nifty Plus Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(443,'Alpha Alternatives Special Situations Offshore Fund','Alpha Alternatives Special Situations Offshore Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(444,'Asha Ventures GIFT Trust','Asha Ventures GIFT Trust',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(445,'ASK Real Estate Fund 2','ASK Real Estate Fund 2',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(446,'Athera GIFT Fund IV','Athera GIFT Fund IV',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(447,'Avinya Ventures Offshore','Avinya Ventures Offshore',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(448,'Blume Ventures Gift Trust 1Y','Blume Ventures Gift Trust 1Y',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(449,'Blume Ventures Gift Trust IV','Blume Ventures Gift Trust IV',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(450,'BUSINESS EXCELLENCE FUND','BUSINESS EXCELLENCE FUND',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(451,'Centre Court Capital Global Fund I','Centre Court Capital Global Fund I',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(452,'Centre Court Capital IFSC Fund I','Centre Court Capital IFSC Fund I',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(453,'Chanakya Wealth Creation Fund','Chanakya Wealth Creation Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(454,'Chiratae Ventures International Fund V','Chiratae Ventures International Fund V',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(455,'CX Partners Fund 3','CX Partners Fund 3',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(456,'Dovetail Investment Fund (IFSC)','Dovetail Investment Fund (IFSC)',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(457,'DSP India IFSC Fund','DSP India IFSC Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(458,'EA Real Estate LLP','EA Real Estate LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(459,'EH Fund IFSC LLP','EH Fund IFSC LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(460,'EISAF II IFSC LLP','EISAF II IFSC LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(461,'Equirus Long Horizon Offshore Investments','Equirus Long Horizon Offshore Investments',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(462,'ES Special Asset IFSC LLP','ES Special Asset IFSC LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(463,'ESOF III Fund IFSC LLP','ESOF III Fund IFSC LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(464,'EWON Special Asset Fund IFSC LLP','EWON Special Asset Fund IFSC LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(465,'Fireside Ventures Investment IFSC Fund III','Fireside Ventures Investment IFSC Fund III',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(466,'Five Rivers India Fund (IFSC)','Five Rivers India Fund (IFSC)',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(467,'Girik Multicap India Fund','Girik Multicap India Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(468,'Grand Anicut (IFSC) Fund 4','Grand Anicut (IFSC) Fund 4',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(469,'HDFC Capital Fund of Funds- 3','HDFC Capital Fund of Funds- 3',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(470,'HDFC India Balanced Advantage Fund','HDFC India Balanced Advantage Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(471,'HDFC India Equity Savings Fund','HDFC India Equity Savings Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(472,'HDFC India Flexi Cap Fund','HDFC India Flexi Cap Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(473,'HDFC India Mid-Cap Opportunities Fund','HDFC India Mid-Cap Opportunities Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(474,'HDFC India Nifty 50 Fund','HDFC India Nifty 50 Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(475,'HDFC India Small Cap Fund','HDFC India Small Cap Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(476,'IE India Special Asset Fund III IFSC LLP','IE India Special Asset Fund III IFSC LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(477,'IIFL India Opportunities Fund','IIFL India Opportunities Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(478,'India Alternatives Fund','India Alternatives Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(479,'India ESG Engagement Fund','India ESG Engagement Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(480,'India Life Sciences Fund IV','India Life Sciences Fund IV',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(481,'India Offshore Credit Opportunities Fund','India Offshore Credit Opportunities Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(482,'India Offshore Credit Opportunities Fund II','India Offshore Credit Opportunities Fund II',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(483,'INDIA OPPORTUNITIES IFSC FUND TRUST','INDIA OPPORTUNITIES IFSC FUND TRUST',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(484,'India Realty Excellence','India Realty Excellence',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(485,'Investcorp India Warehousing IFSC Trust','Investcorp India Warehousing IFSC Trust',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(486,'ITI Long-Short Equity Offshore Fund (IFSC)','ITI Long-Short Equity Offshore Fund (IFSC)',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(487,'IYP II IFSC LLP','IYP II IFSC LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(488,'Jashvik Capital AIF Trust','Jashvik Capital AIF Trust',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(489,'Kedaara Capital Growth Fund IV','Kedaara Capital Growth Fund IV',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(490,'Kedaara Capital Growth Fund-III LLP','Kedaara Capital Growth Fund-III LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(491,'Kedaara Venna Holding','Kedaara Venna Holding',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(492,'Kedaara Victoria Holding','Kedaara Victoria Holding',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(493,'Kotak Data Center Fund IFSC','Kotak Data Center Fund IFSC',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(494,'Kotak India Commercial Real Estate Fund IFSC','Kotak India Commercial Real Estate Fund IFSC',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(495,'Kotak Performing RE Credit Strategy Fund II IFSC','Kotak Performing RE Credit Strategy Fund II IFSC',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(496,'Kotak Real Estate Fund- X IFSC','Kotak Real Estate Fund- X IFSC',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(497,'Kotak Strategic Situations Fund - II IFSC','Kotak Strategic Situations Fund - II IFSC',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(498,'Lighthouse Canton (IFSC) Fund 1','Lighthouse Canton (IFSC) Fund 1',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(499,'LR India Fund II IFSC','LR India Fund II IFSC',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(500,'Madiba46664','Madiba46664',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(501,'Millingtonia Capital AIF','Millingtonia Capital AIF',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(502,'MO India GIFT City Fund','MO India GIFT City Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(503,'Morgan Stanley IFSC Fund','Morgan Stanley IFSC Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(504,'Mplier Capital Trust','Mplier Capital Trust',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(505,'Multiples Private Equity GIFT Fund IV (FUND)','Multiples Private Equity GIFT Fund IV (FUND)',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(506,'Nuvama India Edge Fund','Nuvama India Edge Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(507,'Nuvama Late-Stage Growth Equity Fund 4','Nuvama Late-Stage Growth Equity Fund 4',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(508,'PCGF 1.6 GIFT CITY FUND','PCGF 1.6 GIFT CITY FUND',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(509,'Phillip Greater India Engagement Fund','Phillip Greater India Engagement Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(510,'Rangoli India Fund','Rangoli India Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(511,'Realty Excellence Trust VI GC','Realty Excellence Trust VI GC',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(512,'REBOoT Bharat MSME Scheme','REBOoT Bharat MSME Scheme',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(513,'Rising Fintech LLP','Rising Fintech LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(514,'Sameeksha India Flexicap Equity Fund (“the Fund”)','Sameeksha India Flexicap Equity Fund (“the Fund”)',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(515,'SBI Investment Opportunities Fund (IFSC)','SBI Investment Opportunities Fund (IFSC)',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(516,'Singularity Global Opportunities Fund','Singularity Global Opportunities Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(517,'SMC IFSC Global Opportunities Fund','SMC IFSC Global Opportunities Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(518,'Stakeboat GIFT City Fund I','Stakeboat GIFT City Fund I',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(519,'Stride Ventures Global Debt Fund I','Stride Ventures Global Debt Fund I',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(520,'Terazo Investment Trust','Terazo Investment Trust',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(521,'TradeAir Fund','TradeAir Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(522,'True Beacon Global AIF','True Beacon Global AIF',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(523,'True North (GIFT) Fund VII','True North (GIFT) Fund VII',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(524,'True North Credit Opportunities (GIFT) Fund I LLP','True North Credit Opportunities (GIFT) Fund I LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(525,'Venture Catalyst Offshore Angel Fund','Venture Catalyst Offshore Angel Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(526,'Vincit Capital','Vincit Capital',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(527,'Vivriti Fixed Income Fund-Series 3 IFSC LLP','Vivriti Fixed Income Fund-Series 3 IFSC LLP',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(528,'Vivriti IFSC CAT 2 Trust','Vivriti IFSC CAT 2 Trust',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(529,'Vivriti IFSC CAT 3 Trust','Vivriti IFSC CAT 3 Trust',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(530,'Waterfield Flagship GIFT Fund II','Waterfield Flagship GIFT Fund II',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(531,'We Founder Circle Global Angels Fund','We Founder Circle Global Angels Fund',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(532,'Yugadi Capital','Yugadi Capital',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22'),(817,'ABANS GLOBAL BROKING (IFSC) PRIVATE LIMITED','ABANS GLOBAL BROKING (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(818,'ADROIT FINANCIAL SERVICES(IFSC) PVT. LTD.','ADROIT FINANCIAL SERVICES(IFSC) PVT. LTD.',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(819,'AJMERA X-CHANGE (IFSC) PRIVATE LIMITED','AJMERA X-CHANGE (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(820,'ANAND RATHI INTERNATIONAL VENTURES (IFSC) PVT LTD','ANAND RATHI INTERNATIONAL VENTURES (IFSC) PVT LTD',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(821,'ANTIQUE STOCK BROKING (IFSC) LIMITED','ANTIQUE STOCK BROKING (IFSC) LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(822,'Appreciate Broking IFSC Private Limited','Appreciate Broking IFSC Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(823,'ARIHANT CAPITAL (IFSC) LIMITED','ARIHANT CAPITAL (IFSC) LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(824,'ARYA FINTRADE (IFSC) PVT LTD','ARYA FINTRADE (IFSC) PVT LTD',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(825,'ASHIKA STOCK BROKING IFSC PVT LTD','ASHIKA STOCK BROKING IFSC PVT LTD',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(826,'Axis Bank Limited - IBU','Axis Bank Limited - IBU',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(827,'Bank of Baroda - IBU','Bank of Baroda - IBU',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(828,'BONANZA PORTFOLIO (IFSC) PRIVATE LIMITED','BONANZA PORTFOLIO (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(829,'DAGA BUSINESS (INTERNATIONAL) STOCK BROKERS (IFSC) PVT. LTD.','DAGA BUSINESS (INTERNATIONAL) STOCK BROKERS (IFSC) PVT. LTD.',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(830,'DAYCO SECURITIES IFSC PVT. LTD.','DAYCO SECURITIES IFSC PVT. LTD.',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(831,'DIVYA PORTFOLIO (IFSC) PRIVATE LIMITED','DIVYA PORTFOLIO (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(832,'DOLAT CAPITAL IFSC PRIVATE LIMITED','DOLAT CAPITAL IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(833,'DYNAMIC EQUITIES (IFSC) PRIVATE LIMITED','DYNAMIC EQUITIES (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(834,'East India IFSC Private Limited','East India IFSC Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(835,'EDELWEISS SECURITIES (IFSC) LIMITED','EDELWEISS SECURITIES (IFSC) LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(836,'EMKAY GLOBAL FINANCIAL SERVICES IFSC PVT. LTD.','EMKAY GLOBAL FINANCIAL SERVICES IFSC PVT. LTD.',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(837,'ESTEE IFSC PRIVATE LIMITED','ESTEE IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(838,'EVERMORE GLOBAL (IFSC) PRIVATE LIMITED','EVERMORE GLOBAL (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(839,'EXCEL BROKING (IFSC) PRIVATE LIMITED','EXCEL BROKING (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(840,'FINDOC INVESTMART (IFSC) PRIVATE LIMITED','FINDOC INVESTMART (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(841,'GATEWAY FINANCIAL SERVICES (IFSC) PVT. LTD.','GATEWAY FINANCIAL SERVICES (IFSC) PVT. LTD.',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(842,'Geojit IFSC Limited','Geojit IFSC Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(843,'GLOBE CAPITAL (IFSC) LIMITED','GLOBE CAPITAL (IFSC) LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(844,'GOGIA CAPITAL IFSC PRIVATE LIMITED','GOGIA CAPITAL IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(845,'GOLDMINE IFSC PRIVATE LIMITED','GOLDMINE IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(846,'GRD SECURITIES IFSC LIMITED','GRD SECURITIES IFSC LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(847,'Growth Global Securities (IFSC) Private Limited','Growth Global Securities (IFSC) Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(848,'Groww IFSC Private Limited','Groww IFSC Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(849,'IBISP IFSC Private Limited','IBISP IFSC Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(850,'INBROK (IFSC) PRIVATE LIMITED','INBROK (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(851,'INDIRA SECURITIES (IFSC) PRIVATE LIMITED','INDIRA SECURITIES (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(852,'INDmoney Global (IFSC) Private Limited','INDmoney Global (IFSC) Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(853,'INDO THAI GLOBE FIN (IFSC) LIMITED','INDO THAI GLOBE FIN (IFSC) LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(854,'IVIK Securities (IFSC) Private Limited','IVIK Securities (IFSC) Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(855,'JAINAM IFSC MAVENS PVT. LTD.','JAINAM IFSC MAVENS PVT. LTD.',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(856,'JUNOMONETA INTERNATIONAL (IFSC) PRIVATE LIMITED','JUNOMONETA INTERNATIONAL (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(857,'K2J Global (IFSC) LLP','K2J Global (IFSC) LLP',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(858,'KARVY BROKING (IFSC) LIMITED','KARVY BROKING (IFSC) LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(859,'LKP IFSC Private Limited','LKP IFSC Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(860,'Loonycorn Quant Investments (IFSC) Private Limited','Loonycorn Quant Investments (IFSC) Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(861,'MAJORTREND CAPITAL IFSC PRIVATE LIMITED','MAJORTREND CAPITAL IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(862,'MANSUKH IFSC BROKING PRIVATE LIMITED','MANSUKH IFSC BROKING PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(863,'MARWADI INTL SECURITIES SERVICES (IFSC) LTD','MARWADI INTL SECURITIES SERVICES (IFSC) LTD',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(864,'MOTILAL OSWAL FINSEC IFSC LTD.','MOTILAL OSWAL FINSEC IFSC LTD.',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(865,'OPEN FUTURES AND COMMODITIES IFSC PRIVATE LIMITED','OPEN FUTURES AND COMMODITIES IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(866,'PACE FINANCIAL (IFSC) PRIVATE LIMITED','PACE FINANCIAL (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(867,'PHILLIP VENTURES IFSC PRIVATE LIMITED','PHILLIP VENTURES IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(868,'PLUSTRADE HOLDING (IFSC) PRIVATE LIMITED','PLUSTRADE HOLDING (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(869,'PRARAMBH INTERNATIONAL IFSC LIMITED','PRARAMBH INTERNATIONAL IFSC LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(870,'Quadeye IFSC Private Limited','Quadeye IFSC Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(871,'RAGHUNANDAN CAPITAL (IFSC) PRIVATE LIMITED','RAGHUNANDAN CAPITAL (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(872,'RARU CAPITAL IFSC PRIVATE LIMITED','RARU CAPITAL IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(873,'SGX INDIA CONNECT IFSC PRIVATE LIMITED','SGX INDIA CONNECT IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(874,'SHARE INDIA SECURITIES (IFSC) PRIVATE LIMITED','SHARE INDIA SECURITIES (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(875,'SIHL GLOBAL INVESTMENTS (IFSC) PRIVATE LIMITED','SIHL GLOBAL INVESTMENTS (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(876,'SILVER STREAM EQUITIES (IFSC) PRIVATE LIMITED','SILVER STREAM EQUITIES (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(877,'SMC GLOBAL IFSC PRIVATE LIMITED','SMC GLOBAL IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(878,'STAR FINVEST (IFSC) PRIVATE LIMITED','STAR FINVEST (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(879,'STOCKHOLDING SECURITIES IFSC LIMITED','STOCKHOLDING SECURITIES IFSC LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(880,'String AI IFSC Private Limited','String AI IFSC Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(881,'SUNRISE GILTS (IFSC) PRIVATE LIMITED','SUNRISE GILTS (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(882,'SYNERGY DEALCOM (IFSC) PRIVATE LIMITED','SYNERGY DEALCOM (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(883,'TIPSONS CAPITAL IFSC PVT LTD','TIPSONS CAPITAL IFSC PVT LTD',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(884,'TRADEAIR (IFSC) PRIVATE LIMITED','TRADEAIR (IFSC) PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(885,'Tradewalk IFSC Private Limited','Tradewalk IFSC Private Limited',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(886,'WEGMANS FINANCIAL SERVICES IFSC PRIVATE LIMITED','WEGMANS FINANCIAL SERVICES IFSC PRIVATE LIMITED',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17'),(888,'Aadidaivam International Private Limited','Aadidaivam International Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(889,'Acumen Aviation Leasing IFSC Private Limited','Acumen Aviation Leasing IFSC Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(890,'Amicorp Trustee (India) Private Limited','Amicorp Trustee (India) Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(891,'Ascent Fund Services (India) Private Limited','Ascent Fund Services (India) Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(892,'Axis Trustee Services Limited','Axis Trustee Services Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(893,'Akssai IFSC Private Limited','Akssai IFSC Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(894,'Aurtus Consulting LLP','Aurtus Consulting LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(895,'Basiz Fund Services Private Limited','Basiz Fund Services Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(896,'Beacon Trusteeship Limited','Beacon Trusteeship Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(897,'BFSI Edge Compliance Consultants Private Limited','BFSI Edge Compliance Consultants Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(898,'BSR & Co. LLP','BSR & Co. LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(899,'Befree Global Services LLP','Befree Global Services LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(900,'BullionEx Services LLP','BullionEx Services LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(901,'Catalyst Trusteeship Limited','Catalyst Trusteeship Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(902,'CNK Khandwala & Associates','CNK Khandwala & Associates',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(903,'Computer Age Management Services Limited','Computer Age Management Services Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(904,'Crest Finserv Limited','Crest Finserv Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(905,'Cyril Amarchand Mangaldas - OFC','Cyril Amarchand Mangaldas - OFC',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(906,'Dhaval Vussonji & Partners','Dhaval Vussonji & Partners',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(907,'Economic Laws Practice','Economic Laws Practice',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(908,'Enefu Advisors LLP','Enefu Advisors LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(909,'Entigrity Services LLP','Entigrity Services LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(910,'Ernst & Young LLP','Ernst & Young LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(911,'Finolutions LLP','Finolutions LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(912,'Grant Thornton Bharat LLP','Grant Thornton Bharat LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(913,'IC Legal','IC Legal',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(914,'IDBI Trusteeship Services Limited','IDBI Trusteeship Services Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(915,'In.Corp Corporate Services LLP','In.Corp Corporate Services LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(916,'IQ EQ India IFSC Services Private Limited','IQ EQ India IFSC Services Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(917,'JA Square Energy Ventures LLP','JA Square Energy Ventures LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(918,'Kaytes Business Consulting LLP','Kaytes Business Consulting LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(919,'Kfin Technologies Limited','Kfin Technologies Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(920,'Khandar Mehta & Shah','Khandar Mehta & Shah',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(921,'KPMG Assurance and Consulting Services LLP','KPMG Assurance and Consulting Services LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(922,'Mitcon Credentia Trusteeship Services Limited','Mitcon Credentia Trusteeship Services Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(923,'Nishith Desai Associates','Nishith Desai Associates',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(924,'NorthStar Growth Advisors LLP','NorthStar Growth Advisors LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(925,'Nyasa Capital Advisors LLP','Nyasa Capital Advisors LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(926,'Ohm Dovetail Global Services (IFSC) Private Limited','Ohm Dovetail Global Services (IFSC) Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(927,'Ops Fund Services Private Limited','Ops Fund Services Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(928,'Ops Global Capital Advisors Private Limited','Ops Global Capital Advisors Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(929,'Orbis Trusteeship Services Private Limited','Orbis Trusteeship Services Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(930,'PBG Smart Accountants LLP','PBG Smart Accountants LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(931,'PKM Advisory Services LLP','PKM Advisory Services LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(932,'Price Waterhouse & Co. LLP','Price Waterhouse & Co. LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(933,'Raval & Trivedi Associates LLP','Raval & Trivedi Associates LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(934,'RBSA Capital Advisors LLP','RBSA Capital Advisors LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(935,'Swift India Corporate Services LLP','Swift India Corporate Services LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(936,'Saigal Seatrade LLP','Saigal Seatrade LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(937,'Smart Accountants Services One LLP','Smart Accountants Services One LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(938,'Treelife Ventures Services IFSC Private Limited','Treelife Ventures Services IFSC Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(939,'Throgmorton Services India LLP','Throgmorton Services India LLP',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(940,'Vistra ITCL (India) Limited','Vistra ITCL (India) Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(941,'Vman Aviation Services IFSC Private Limited','Vman Aviation Services IFSC Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28'),(942,'WeRoute Global Fund Solutions Private Limited','WeRoute Global Fund Solutions Private Limited',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint unsigned DEFAULT NULL,
  `state_id` bigint unsigned DEFAULT NULL,
  `country_id` bigint unsigned DEFAULT NULL,
  `company_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_user_id_foreign` (`user_id`),
  KEY `contact_city_id_foreign` (`city_id`),
  KEY `contact_state_id_foreign` (`state_id`),
  KEY `contact_country_id_foreign` (`country_id`),
  KEY `contact_company_id_foreign` (`company_id`),
  CONSTRAINT `contact_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `contact_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `contact_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `contact_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`),
  CONSTRAINT `contact_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1047 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (436,'Siddarth','Pai','siddarth@3one4capital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building,  11th Floor, Block no. 13B',NULL,NULL,NULL,NULL,429),(437,'','Prajesh Dawda','prajesh@a91partners.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building, Block -13B',NULL,NULL,NULL,NULL,430),(438,'Pavel','Gurianov','pg@finsightvc.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, Fifth Floor, Block 13B',NULL,NULL,NULL,NULL,431),(439,'','Mahesh Kumar','mahesh.kumar@abans.co.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, Fifth Floor, Block 13B',NULL,NULL,NULL,NULL,432),(440,'Utsav','Shah','utsav.shah@adityabirlacapital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building,  Second Floor',NULL,NULL,NULL,NULL,433),(441,'Utsav','Shah','utsav.shah@adityabirlacapital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building,  Second Floor',NULL,NULL,NULL,NULL,434),(442,'Pejavar','Rohit Bhat','rohit@airavatcap.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Accelerator, Ground Floor',NULL,NULL,NULL,NULL,435),(443,'Pejavar','Rohit Bhat','rohit@airavatcap.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Accelerator, Ground Floor',NULL,NULL,NULL,NULL,436),(444,'Pejavar','Rohit Bhat','rohit@airavatcap.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Accelerator, Ground Floor',NULL,NULL,NULL,NULL,437),(445,'','Alok Tiwari','alok@aivot.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building, 16th Floor',NULL,NULL,NULL,NULL,438),(446,'Chirag','Pandya','compliance@alchemycapital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building, 11th Floor',NULL,NULL,NULL,NULL,439),(447,'Navin','Ganesh','navin.ganesh@alt-alpha.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building,  Sixth Floor',NULL,NULL,NULL,NULL,440),(448,'Navin','Ganesh','navin.ganesh@alt-alpha.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building,  Sixth Floor',NULL,NULL,NULL,NULL,441),(449,'','Mahek Gandhi','mahek.gandhi@alt-alpha.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building,  Sixth Floor',NULL,NULL,NULL,NULL,442),(450,'','Mahek Gandhi','mahek.gandhi@alt-alpha.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building,  Sixth Floor',NULL,NULL,NULL,NULL,443),(451,'Amit','Mehta','amit@ashaventures.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Accelerator, Ground Floor',NULL,NULL,NULL,NULL,444),(452,'Saubhagya','Pathak','aubhagya.pathak@askpiagiftcity.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Tower,  4th Floor',NULL,NULL,NULL,NULL,445),(453,'','Rutvik Doshi','rutvik@atheravp.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' GIFT Aspire 3, Wing C',NULL,NULL,NULL,NULL,446),(454,'Gaurav','Singhvi','gaurav@wefounderscircle.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Building No. 15A, 4th Floor',NULL,NULL,NULL,NULL,447),(455,'Ashish','Fafadia','ashish@blume.vc',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature, 6th Floor',NULL,NULL,NULL,NULL,448),(456,'Ashish','Fafadia','ashish@blume.vc',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature, 6th Floor',NULL,NULL,NULL,NULL,449),(457,'','Naveen Gupta','naveen.gupta@motilaloswal.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 3rd floor',NULL,NULL,NULL,NULL,450),(458,'Faraz','Abdi','Faraz.abdi@centrecourtcapital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Pragya Accelerator,  Ground Floor',NULL,NULL,NULL,NULL,451),(459,'Faraz','Abdi','Faraz.abdi@centrecourtcapital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Pragya Accelerator,  Ground Floor',NULL,NULL,NULL,NULL,452),(460,'Jay','Girish Thakkar','jay.thakkar@cwcfund.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building, 6th Floor',NULL,NULL,NULL,NULL,453),(461,'','Swaminathan Sankar','swami@chiratae.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Accelerator,  Ground Floor',NULL,NULL,NULL,NULL,454),(462,'Jayanta','Kumar Basu','jayanta@cxpartners.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Hiranandani Signature Building, 11th Floor',NULL,NULL,NULL,NULL,455),(463,'Bhagyashree','Sutaria','bhagyashree.sutaria@dovetailindia.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 16th Floor',NULL,NULL,NULL,NULL,456),(464,'','Vaibhav Modi','Vaibhav.modi1@dspim.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Towers, 4th floor',NULL,NULL,NULL,NULL,457),(465,'','Moreshwar Panchal','moreshwar.panchal@edelweissalts.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT House, first floor',NULL,NULL,NULL,NULL,458),(466,'','Moreshwar Panchal','moreshwar.panchal@edelweissalts.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT House, first floor',NULL,NULL,NULL,NULL,459),(467,'','Moreshwar Panchal','moreshwar.panchal@edelweissalts.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT House, first floor',NULL,NULL,NULL,NULL,460),(468,'Neeraj','Gaurh','neeraj.gaurh@equirus.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' GIFT Aspire 3, Co-working desk no.14',NULL,NULL,NULL,NULL,461),(469,'','Moreshwar Panchal','moreshwar.panchal@edelweissalts.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT House, first floor',NULL,NULL,NULL,NULL,462),(470,'','Moreshwar Panchal','moreshwar.panchal@edelweissalts.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT House, first floor',NULL,NULL,NULL,NULL,463),(471,'','Moreshwar Panchal','moreshwar.panchal@edelweissalts.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT House, first floor',NULL,NULL,NULL,NULL,464),(472,'Dipanjan','Basu','dipanjan@firesideventures.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'PRAGYA, ',NULL,NULL,NULL,NULL,465),(473,'Pankaj','Chopra','pankaj@5riversindia.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building, 16th Floor',NULL,NULL,NULL,NULL,466),(474,'Maneesh','Matthew','maneeshmathew01@gmail.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building, 16th Floor',NULL,NULL,NULL,NULL,467),(475,'Venkatesh','Parthasarathi','venkatesh@anicutcapital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Tower, 4th Floor',NULL,NULL,NULL,NULL,468),(476,'Vrishali','Nayak','vrishalin@hdfccapital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Pragya Accelerator,  Ground Floor',NULL,NULL,NULL,NULL,469),(477,'Ashish','Mohnot','AshishM@hdfcfund.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Hiranandani Signature, 11th Floor ',NULL,NULL,NULL,NULL,470),(478,'Ashish','Mohnot','AshishM@hdfcfund.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Hiranandani Signature, 11th Floor ',NULL,NULL,NULL,NULL,471),(479,'Ashish','Mohnot','AshishM@hdfcfund.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Hiranandani Signature, 11th Floor ',NULL,NULL,NULL,NULL,472),(480,'Ashish','Mohnot','AshishM@hdfcfund.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Hiranandani Signature, 11th Floor ',NULL,NULL,NULL,NULL,473),(481,'Ashish','Mohnot','AshishM@hdfcfund.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Hiranandani Signature, 11th Floor ',NULL,NULL,NULL,NULL,474),(482,'Ashish','Mohnot','AshishM@hdfcfund.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Hiranandani Signature, 11th Floor ',NULL,NULL,NULL,NULL,475),(483,'Gaurav','A Patel','gaurav.patel@edelweissalts-gift.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT House,  First Floor',NULL,NULL,NULL,NULL,476),(484,'Suraj','Khyani','suraj.khyani@iiflw.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 11th Floor',NULL,NULL,NULL,NULL,477),(485,'','Sandeep Shaw','Sandeep.shaw@blacksoil.co.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Building no. 15A, 4th Floor',NULL,NULL,NULL,NULL,478),(486,'','Utsav Shah','utsav.shah@adityabirlacapital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, Second Floor',NULL,NULL,NULL,NULL,479),(487,'','Sumit Gupta','sumit.gupta@invascent.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature, Fifteenth Floor',NULL,NULL,NULL,NULL,480),(488,'Ashish','Shiwalkar','ashish.shiwalkar@investec.co.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'PRAGYA ACCELERATOR, Block No. 15',NULL,NULL,NULL,NULL,481),(489,'Ashish','Shiwalkar','ashish.shiwalkar@investec.co.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'PRAGYA ACCELERATOR, Block No. 16',NULL,NULL,NULL,NULL,482),(490,'','Sapna Kannaidas','skannaidas@investcorp.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, Fourth Floor',NULL,NULL,NULL,NULL,483),(491,'Naveen','Gupta','naveen.gupta@motilaloswal.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building, 3rd floor',NULL,NULL,NULL,NULL,484),(492,'Sapna','Kannaidas','skannaidas@investcorp.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, Fourth Floor',NULL,NULL,NULL,NULL,485),(493,'','Bhavesh Kataria','bhavesh.katariya@itiorg.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building,  11th Floor',NULL,NULL,NULL,NULL,486),(494,'','Gaurav A Patel','gaurav.patel@edelweissalts-gift.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT House, First Floor',NULL,NULL,NULL,NULL,487),(495,'Naresh','Patwari','npatwari@jashvikcapital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT Aspire 2, Office No.01, Desk No. 08',NULL,NULL,NULL,NULL,488),(496,'','Hemant Agrawal','Hemant.agrawal@kedaaragiftcity.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 9th Floor',NULL,NULL,NULL,NULL,489),(497,'','Hemant Agrawal','Hemant.agrawal@kedaaragiftcity.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 9th Floor',NULL,NULL,NULL,NULL,490),(498,'','Hemant Agrawal','Hemant.agrawal@kedaaragiftcity.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 9th Floor',NULL,NULL,NULL,NULL,491),(499,'','Hemant Agrawal','Hemant.agrawal@kedaaragiftcity.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 9th Floor',NULL,NULL,NULL,NULL,492),(500,'Jignesh','Dave','jignesh.dave@kotak.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT Aspire 3,, Office No. E-1,',NULL,NULL,NULL,NULL,493),(501,'Jignesh','Dave','jignesh.dave@kotak.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT Aspire 3,, Office No. E-1,',NULL,NULL,NULL,NULL,494),(502,'Jignesh','Dave','jignesh.dave@kotak.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT Aspire 3,, Office No. E-1,',NULL,NULL,NULL,NULL,495),(503,'Jignesh','Dave','jignesh.dave@kotak.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT Aspire 3,, Office No. E-1,',NULL,NULL,NULL,NULL,496),(504,'Jignesh','Dave','jignesh.dave@kotak.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT Aspire 3,, Office No. E-1,',NULL,NULL,NULL,NULL,497),(505,'','Rajesh Begwani','rajesh.begwani@lighthouse-canton.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Accelerator, FF Floor',NULL,NULL,NULL,NULL,498),(506,'Kushal','Agrawal','kushal@lightrock.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya,  4th Floor',NULL,NULL,NULL,NULL,499),(507,'','Siddarth Pai','siddarth@3one4capital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT Aspire 3, Co-working Desk No 18',NULL,NULL,NULL,NULL,500),(508,'Raghav','Sanwal','misha@millingtonia.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'PRAGYA,  Fourth Floor',NULL,NULL,NULL,NULL,501),(509,'Naveen','Gupta','naveen.gupta@motilaloswal.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building,, 3rd Floor',NULL,NULL,NULL,NULL,502),(510,'Nilay','Bipin Dani','Nilay.Dani@MorganStanley.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'BIFC, 11th Floor',NULL,NULL,NULL,NULL,503),(511,'','Pramod Dhembare','drpramod@fidelitydiagnostics.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature, Sixteenth Floor',NULL,NULL,NULL,NULL,504),(512,'Kaushal','Kapadia','Kaushal.Kapadia@multiplesequity.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 4th Floor',NULL,NULL,NULL,NULL,505),(513,'Jigar','Rathod','rathod.jigar@nuvama.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Tower,  11th Floor',NULL,NULL,NULL,NULL,506),(514,'Jigar','Rathod','rathod.jigar@nuvama.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Tower,  11th Floor',NULL,NULL,NULL,NULL,507),(515,'P','Sivaram','sp@phicapital.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, ',NULL,NULL,NULL,NULL,508),(516,'','Mihir Sanjay Shirgaonkar','mshirgaonkar@phillipcapital.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building,  Fifth Floor',NULL,NULL,NULL,NULL,509),(517,'','Krishna Prasad V','compliance@unifiinvestment.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' GIFT Aspire Three Building, Unit No 22, Office E-6',NULL,NULL,NULL,NULL,510),(518,'','Naveen Gupta','naveen.gupta@motilaloswal.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature Building, 6th Floor',NULL,NULL,NULL,NULL,511),(519,'Suthesh','Nair','accounts@opsglobal.sg',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Hiranandani Signature, 6th Floor',NULL,NULL,NULL,NULL,512),(520,'Vishal','Sabhar','vishal@risingcapitalgroup.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT One Tower,, 3rd Floor',NULL,NULL,NULL,NULL,513),(521,'','Tarang Parmar','simlops@sameeksha.capital',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT Aspire 3, Office D-4, D-6 and C-1',NULL,NULL,NULL,NULL,514),(522,'Yashpal','Sharma','yashpal.sharma@sbimf.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 2nd Floor',NULL,NULL,NULL,NULL,515),(523,'Purvi','Parkeria','purvi@singularityamc.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'PRAGYA, Fourth Floor',NULL,NULL,NULL,NULL,516),(524,'Ankit','Bathla ','branch@smcglobalifsc.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 2nd Floor',NULL,NULL,NULL,NULL,517),(525,'Srinivas','Baratam','srinivas@stakeboat.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'GIFT Aspire 3, Co-working Desk No 9, Wing C',NULL,NULL,NULL,NULL,518),(526,'Vivek','Jain','vivek@strideventures.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' GIFT Aspire 3, Co-working Desk No 26',NULL,NULL,NULL,NULL,519),(527,'Shaan','Zaveri','shaan@terazo.network',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'PRAGYA, Fourth Floor',NULL,NULL,NULL,NULL,520),(528,'Aalap','Gandhi','gandhi_aalap@yahoo.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Bldg., 	Unit No. 402, 4th Floor,',NULL,NULL,NULL,NULL,521),(529,'Riddhish','Shah','	riddhish@truebeacon.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Signature Building, 	3rd Floor 334 B',NULL,NULL,NULL,NULL,522),(530,'Nitin','Nayak','nitin@truenorth.co.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature,  Sixteen Floor',NULL,NULL,NULL,NULL,523),(531,'Nitin','Nayak','nitin@truenorth.co.in',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Signature,  Sixteen Floor',NULL,NULL,NULL,NULL,524),(532,'Nishit','Golchha','nmgolchha@gmail.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'PRAGYA”, Unit No. 419, 420, 421 (Cabin No. 1A) Fourth Floor',NULL,NULL,NULL,NULL,525),(533,'','Rishab Siroya','rishab@carpediem-capital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Accelerator, GB-16',NULL,NULL,NULL,NULL,526),(534,'Parth','Shah','po.ifsc@vivritiiamc.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Towers,, 4th Floor,',NULL,NULL,NULL,NULL,527),(535,'Parth','Shah','po.ifsc@vivritiiamc.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Towers,, 4th Floor,',NULL,NULL,NULL,NULL,528),(536,'Parth','Shah','po.ifsc@vivritiiamc.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Towers,, 4th Floor,',NULL,NULL,NULL,NULL,529),(537,'','Kartik Kini','kartik.kini@waterfieldadvisors.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Accelerator,  GF Floor,',NULL,NULL,NULL,NULL,530),(538,'','Gaurav Singhvi','	gaurav@wefounderscircle.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,' Building No. 15A, 4th Floor',NULL,NULL,NULL,NULL,531),(539,'Hithendra','Ramachandran','hithendra@carpediem-capital.com',NULL,'2024-06-06 06:07:22','2024-06-06 06:07:22',NULL,'Pragya Accelerator, GB-16',NULL,NULL,NULL,NULL,532),(820,'compliance','abans.co.in','compliance@abans.co.in',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17',NULL,'Signature Building, 11th Floor',NULL,NULL,NULL,NULL,817),(821,'infoifsc','adroitfinancial.com','infoifsc@adroitfinancial.com',NULL,'2024-06-07 06:52:17','2024-06-07 06:52:17',NULL,'SIGNATURE BUILDING, FIFTH FLOOR,',NULL,NULL,NULL,NULL,818),(906,'compliance','abans.co.in','info@adi.international',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature, 506',NULL,NULL,NULL,NULL,888),(907,'infoifsc','adroitfinancial.com','alok.anand@acumen.aero',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani signature, 	Unit no. 214, 2nd Floor',NULL,NULL,NULL,NULL,889),(908,'t.aboobaker','amicorp.com','t.aboobaker@amicorp.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani signature,        16th Floor',NULL,NULL,NULL,NULL,890),(909,'Jayesh','ascentgfs.com','Jayesh@ascentgfs.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Pragya Towers, 4th floor',NULL,NULL,NULL,NULL,891),(910,'kulkarni.makarand','axistrustee.com','kulkarni.makarand@axistrustee.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature, 	533, 5th Floor,',NULL,NULL,NULL,NULL,892),(911,'info','akssai.com','info@akssai.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Pragya Accelerator, Unit GB-11, Ground Floor,',NULL,NULL,NULL,NULL,893),(912,'akshi.jain','aurtusconsulting.com','akshi.jain@aurtusconsulting.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Pragya Building , Unit No 419+420+421/Cabin No: 2, 4th floor',NULL,NULL,NULL,NULL,894),(913,'sesha','basizfa.com','sesha@basizfa.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature, 	416, 4th Floor',NULL,NULL,NULL,NULL,895),(914,'vitthal','beacontrustee.co.in','vitthal@beacontrustee.co.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building,, 1639',NULL,NULL,NULL,NULL,896),(915,'mitenchawda','bfsiedge.com','mitenchawda@bfsiedge.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Brigade International Financial Center., 	Unit No. 602 B',NULL,NULL,NULL,NULL,897),(916,'rupenshah2','bsraffiliates.com','rupenshah2@bsraffiliates.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Brigade International Financial Center, Office No. 405A, 4th Floor',NULL,NULL,NULL,NULL,898),(917,'jnkaccounts','befree.com.au','jnkaccounts@befree.com.au',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'BIFC, 302',NULL,NULL,NULL,NULL,899),(918,'vipulmodi66','yahoo.com','vipulmodi66@yahoo.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'BIFC, Unit No. 1112, 11th Floor',NULL,NULL,NULL,NULL,900),(919,'umesh.salvi','ctltrustee.com','umesh.salvi@ctltrustee.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature,, 627, 6th Floor',NULL,NULL,NULL,NULL,901),(920,'darshit','cnkkhandwala.com','darshit@cnkkhandwala.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building,  6th floor',NULL,NULL,NULL,NULL,902),(921,'Ramcharan.sr','camsonline.com','Ramcharan.sr@camsonline.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building,, 5th Floor',NULL,NULL,NULL,NULL,903),(922,'skapadia','crestfinserv.com','skapadia@crestfinserv.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'GIFT Aspire 3, Co-working Desk No. 4',NULL,NULL,NULL,NULL,904),(923,'cam.tax','cyrilshroff.com','cam.tax@cyrilshroff.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Prgya Tower, 4th Floor',NULL,NULL,NULL,NULL,905),(924,'dhval','dvassociates.co.in','dhval@dvassociates.co.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature, 4th Floor',NULL,NULL,NULL,NULL,906),(925,'NishantShah','elp-in.com','NishantShah@elp-in.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building, 6th floor',NULL,NULL,NULL,NULL,907),(926,'smit.patel','hotmail.com','smit.patel@hotmail.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature, 5th Floor',NULL,NULL,NULL,NULL,908),(927,'valay','entigrity.com','valay@entigrity.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Brigade International Financial Centre, 1st Floor',NULL,NULL,NULL,NULL,909),(928,'keyur.shah','in.ey.com','keyur.shah@in.ey.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Zonal Facility Centre Center, Office No. 4 (Unit No. 5), Wing 1',NULL,NULL,NULL,NULL,910),(929,'apoorva.vora','finolutions.co.in','apoorva.vora@finolutions.co.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building, 16th Floor',NULL,NULL,NULL,NULL,911),(930,'dhanraj.bhagat','in.gt.com','dhanraj.bhagat@in.gt.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Brigade International Financial Center,, 6th floor,',NULL,NULL,NULL,NULL,912),(931,'indrajit.mishra','icul.in','indrajit.mishra@icul.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Prgya Tower,,  4th Floor,',NULL,NULL,NULL,NULL,913),(932,'sunny','idbitrustee.com','sunny@idbitrustee.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building,  2nd Floor',NULL,NULL,NULL,NULL,914),(933,'inderpreet.chadha','incorpadvisory.in','inderpreet.chadha@incorpadvisory.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building, Unit No, 405, 4th Floor',NULL,NULL,NULL,NULL,915),(934,'atul.muchhala','iqeq.com','atul.muchhala@iqeq.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Pragya Accelerator, Unit No. GB– 08',NULL,NULL,NULL,NULL,916),(935,'jampani.srinivas','gmail.com','jampani.srinivas@gmail.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature, Unit no-329',NULL,NULL,NULL,NULL,917),(936,'kriyangkaria','kaytesconsulting.com','kriyangkaria@kaytesconsulting.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,' Pragya Accelerator , 	GA – 03',NULL,NULL,NULL,NULL,918),(937,'anshul.jain','kfintech.com','anshul.jain@kfintech.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building,, 4th Floor',NULL,NULL,NULL,NULL,919),(938,'Amish','kmsindia.in','Amish@kmsindia.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Brigade International Financial Centre, 11th Floor',NULL,NULL,NULL,NULL,920),(939,'rajanvasa','Kpmg.Com','rajanvasa@Kpmg.Com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Brigade International Financial Center, 4th Floor,',NULL,NULL,NULL,NULL,921),(940,'venkatesh','mitconcredentia.in','venkatesh@mitconcredentia.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature ,  6th Floor',NULL,NULL,NULL,NULL,922),(941,'radhika.parikh','nishithdesai.com','radhika.parikh@nishithdesai.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Prgya Tower, 4th Floor',NULL,NULL,NULL,NULL,923),(942,'hitesh','northstargrowthadvisors.com','hitesh@northstargrowthadvisors.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'GIFT Aspire 2,, Co-working unit no. 4, office No. 1 Desk No. 19',NULL,NULL,NULL,NULL,924),(943,'rajesh','nyasacapital.in','rajesh@nyasacapital.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature, 237',NULL,NULL,NULL,NULL,925),(944,'mahesh.shekdar','ohmdovetail.com','mahesh.shekdar@ohmdovetail.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building, 1634, 16th Floor',NULL,NULL,NULL,NULL,926),(945,'shabarish','basizfa.com','shabarish@basizfa.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature , 5th floor,',NULL,NULL,NULL,NULL,927),(946,'sesha','basizfa.com','sesha@basizfa.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature,,  6th floor,',NULL,NULL,NULL,NULL,928),(947,'rohit.gupta','orbisfinancial.in','rohit.gupta@orbisfinancial.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature, 6th Floor',NULL,NULL,NULL,NULL,929),(948,'r.burman','pbgsmartaccts.com','r.burman@pbgsmartaccts.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'BIFC, 11th Floor,',NULL,NULL,NULL,NULL,930),(949,'pkm','pkmadvisory.com','pkm@pkmadvisory.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'GIFT Aspire 3, Office C-9,',NULL,NULL,NULL,NULL,931),(950,'suresh.v.swamy','pwc.com','suresh.v.swamy@pwc.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'ZFC Building, Office No. 4, Unit -5',NULL,NULL,NULL,NULL,932),(951,'#VALUE!','','',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'BIFC , 11th Floor',NULL,NULL,NULL,NULL,933),(952,'rajeev','rbsa.in','rajeev@rbsa.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'GIFT Aspire 3, office No. 7 (Unit No. 16),',NULL,NULL,NULL,NULL,934),(953,'radhika.parikh','nishithdesai.com','radhika.parikh@nishithdesai.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Prgya Tower, 4th Floor',NULL,NULL,NULL,NULL,935),(954,'accounts','saigalseatrade.com','accounts@saigalseatrade.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature, 16 Floor',NULL,NULL,NULL,NULL,936),(955,'vivek','smartaccts.com','vivek@smartaccts.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'BIFC , 11th Floor',NULL,NULL,NULL,NULL,937),(956,'jitesh','treelife.in','jitesh@treelife.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,', Ground Floor',NULL,NULL,NULL,NULL,938),(957,'mandar.mhatre','apexfunds.in','mandar.mhatre@apexfunds.in',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building, 656',NULL,NULL,NULL,NULL,939),(958,'Ashish.Mane','vistra.com','Ashish.Mane@vistra.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Hiranandani Signature, 6th Floor',NULL,NULL,NULL,NULL,940),(959,'finance.vasipl','vman.aero','finance.vasipl@vman.aero',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building, 16th Floor',NULL,NULL,NULL,NULL,941),(960,'kavitha','werouteglobal.com','kavitha@werouteglobal.com',NULL,'2024-06-07 07:15:28','2024-06-07 07:15:28',NULL,'Signature Building, 2nd floor',NULL,NULL,NULL,NULL,942),(961,'compliance','abans.co.in','compliance@abans.co.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Signature Building, 11th Floor',NULL,NULL,NULL,NULL,817),(962,'infoifsc','adroitfinancial.com','	deepakkedia@rathi.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, FIFTH FLOOR,',NULL,NULL,NULL,NULL,818),(963,'infoifsc','aryafingroup.com','infoifsc@aryafingroup.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'GIFT ASPIRE 1 , GROUND FLOOR',NULL,NULL,NULL,NULL,819),(964,'	info','augmont.in','	info@augmont.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, SIXTH FLOOR',NULL,NULL,NULL,NULL,820),(965,'	ifsc','eisec.com','	ifsc@eisec.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, UNIT NO. 314,',NULL,NULL,NULL,NULL,821),(966,'	compliance','emkayglobal.com','	compliance@emkayglobal.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Signature Tower, 16th Floor',NULL,NULL,NULL,NULL,822),(967,'compliance','myfindoc.com','compliance@myfindoc.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING,  4TH FLOOR',NULL,NULL,NULL,NULL,823),(968,'	ifsclearing','globecapital.com','	ifsclearing@globecapital.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, THIRD FLOOR',NULL,NULL,NULL,NULL,824),(969,'	Samir','Goldmine.net.in','	Samir@Goldmine.net.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, FOURTH FLOOR',NULL,NULL,NULL,NULL,825),(970,'	sunil.teli','icicibank.com','	sunil.teli@icicibank.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Hiranandani Signature,, 4th Floor',NULL,NULL,NULL,NULL,826),(971,'	rashmi.purohit','motilaloswal.com','	rashmi.purohit@motilaloswal.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Brigade International Financial Center,, 10th Floor',NULL,NULL,NULL,NULL,827),(972,'	ajay','smcindiaonline.com','	ajay@smcindiaonline.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, SECOND FLOOR',NULL,NULL,NULL,NULL,828),(973,'compmlro.ibu','statebank.com','compmlro.ibu@statebank.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'THE SIGNATURE BUILDING, SECOND FLOOR',NULL,NULL,NULL,NULL,829),(974,'	archana.jain','stockholding.com','	archana.jain@stockholding.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, 2ND FLOOR',NULL,NULL,NULL,NULL,830),(975,'	gift','stockholding.com','	gift@stockholding.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE TOWER, UNIT 230',NULL,NULL,NULL,NULL,831),(976,'	Tony.Ricci','StoneX.com','	Tony.Ricci@StoneX.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, UNIT NO. 238',NULL,NULL,NULL,NULL,832),(977,'shridhar','dynamiclevels.com','shridhar@dynamiclevels.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, SECOND FLOOR',NULL,NULL,NULL,NULL,833),(978,'ifsc','eisec.com','ifsc@eisec.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Pragya Tower, 4th Floor',NULL,NULL,NULL,NULL,834),(979,'cs','edelweissfin.com','cs@edelweissfin.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE TOWER, UNIT NO. - 907',NULL,NULL,NULL,NULL,835),(980,'compliance','emkayglobal.com','compliance@emkayglobal.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, , FIFTH FLOOR',NULL,NULL,NULL,NULL,836),(981,'ebo','esteeadvisors.com','ebo@esteeadvisors.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'THE SIGNATURE BUILDING, THIRD FLOOR',NULL,NULL,NULL,NULL,837),(982,'yp','evermore.in','yp@evermore.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, 7TH FLOOR',NULL,NULL,NULL,NULL,838),(983,'anilkedia','excelstockbroking.com','anilkedia@excelstockbroking.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING , SECOND FLOOR',NULL,NULL,NULL,NULL,839),(984,'compliance','myfindoc.com','compliance@myfindoc.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING , 3RD FLOOR',NULL,NULL,NULL,NULL,840),(985,'gatewaytrust','gmail.com','gatewaytrust@gmail.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'GIFT ASPIRE 1, UNIT NO. 36/18',NULL,NULL,NULL,NULL,841),(986,'sojimon','geojit.com','sojimon@geojit.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, 	UNIT NO. 1641',NULL,NULL,NULL,NULL,842),(987,'ifsclearing','globecapital.com','ifsclearing@globecapital.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, 2ND FLOOR',NULL,NULL,NULL,NULL,843),(988,'accounts','gogiacap.com','accounts@gogiacap.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, 4th FLOOR',NULL,NULL,NULL,NULL,844),(989,'Samir','Goldmine.net.in','Samir@Goldmine.net.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, THIRD FLOOR',NULL,NULL,NULL,NULL,845),(990,'grdifsc','grdgroupz.com','grdifsc@grdgroupz.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, THIRD FLOOR',NULL,NULL,NULL,NULL,846),(991,'gsplifsc','growthsec.in','gsplifsc@growthsec.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Signature Building,, 11th Floor',NULL,NULL,NULL,NULL,847),(992,'gsplifsc','growthsec.in','gsplifsc@growthsec.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Signature Building,, 11th Floor',NULL,NULL,NULL,NULL,848),(993,'mail','ibisp.in','mail@ibisp.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Signature Tower,  5th Floor',NULL,NULL,NULL,NULL,849),(994,'artem.vologdin','inbrok.in','artem.vologdin@inbrok.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Pragya Accelerator,,  Ground Floor,',NULL,NULL,NULL,NULL,850),(995,'vishus','indiratrade.com','vishus@indiratrade.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING,, FOURTH FLOOR',NULL,NULL,NULL,NULL,851),(996,'compliance','indmoney.com','compliance@indmoney.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Pragya Accelerato, Ground Floor',NULL,NULL,NULL,NULL,852),(997,'indothaigroup','indothai.co.in','indothaigroup@indothai.co.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, THIRD FLOOR',NULL,NULL,NULL,NULL,853),(998,'shamir.biswas','kivicapital.in','shamir.biswas@kivicapital.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Gift Aspire 3,  Office E-7',NULL,NULL,NULL,NULL,854),(999,'jainamifsc','gmail.com','jainamifsc@gmail.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'GIFT ASPIRE 1 , GROUND FLOOR',NULL,NULL,NULL,NULL,855),(1000,'admin','junomoneta.in','admin@junomoneta.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, FOURTEEN FLOOR',NULL,NULL,NULL,NULL,856),(1001,'rashi.h19','gmail.com','rashi.h19@gmail.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Signature Building, 4th Floor',NULL,NULL,NULL,NULL,857),(1002,'compsec','karvy.com','compsec@karvy.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, THIRD FLOOR',NULL,NULL,NULL,NULL,858),(1003,'manish_pandya','lkpsec.com','manish_pandya@lkpsec.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Signature Building,, 11th Floor',NULL,NULL,NULL,NULL,859),(1004,'vitthal','loonycorn.com','vitthal@loonycorn.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Signature Building, Unit no 809',NULL,NULL,NULL,NULL,860),(1005,'kushal.dalal','majortrend.in','kushal.dalal@majortrend.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, 	UNIT NO. 239',NULL,NULL,NULL,NULL,861),(1006,'shrenik.n','moneysukh.com','shrenik.n@moneysukh.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Signature Building, 5th Floor',NULL,NULL,NULL,NULL,862),(1007,'marwadi.ifsc','marwadigroup.in','marwadi.ifsc@marwadigroup.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, SECOND FLOOR,',NULL,NULL,NULL,NULL,863),(1008,'rashmi.purohit','motilaloswal.com','rashmi.purohit@motilaloswal.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, THIRD FLOOR,',NULL,NULL,NULL,NULL,864),(1009,'sanjayrawal','openfutures.in','sanjayrawal@openfutures.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE TOWER, SIXTH FLOOR',NULL,NULL,NULL,NULL,865),(1010,'nitingarg','pacefin.in','nitingarg@pacefin.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, 4TH FLOOR',NULL,NULL,NULL,NULL,866),(1011,'rbhambhani','phillipcapital.in','rbhambhani@phillipcapital.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, FIFTH FLOOR',NULL,NULL,NULL,NULL,867),(1012,'compliance','pluswealth.net','compliance@pluswealth.net',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, FIFTH FLOOR',NULL,NULL,NULL,NULL,868),(1013,'krunal','prarambhsec.om','krunal@prarambhsec.om',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, 2ND FLOOR',NULL,NULL,NULL,NULL,869),(1014,'ckeshv','quadeye.com','ckeshv@quadeye.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'GIFT Aspire 2,, Coworking Unit no 4, Office No 1,',NULL,NULL,NULL,NULL,870),(1015,'askus','rmoneyindia.com','askus@rmoneyindia.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, SECOND FLOOR',NULL,NULL,NULL,NULL,871),(1016,'infolahoti','gmail.com','infolahoti@gmail.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING,,  11TH FLOOR,',NULL,NULL,NULL,NULL,872),(1017,'viswajeet.tripathy','sgx.com','viswajeet.tripathy@sgx.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'BIFC , 4TH FLOOR',NULL,NULL,NULL,NULL,873),(1018,'vikas_cs','shareindia.com','vikas_cs@shareindia.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'THE SIGNATURE BUILDING, , FOURTH FLOOR',NULL,NULL,NULL,NULL,874),(1019,'utpal.shah','sihl.in','utpal.shah@sihl.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING,, 9TH FLOOR,',NULL,NULL,NULL,NULL,875),(1020,'hitesh.hakani','silverstream.co.in','hitesh.hakani@silverstream.co.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, SECOND FLOOR',NULL,NULL,NULL,NULL,876),(1021,'ajay','smcindiaonline.com','ajay@smcindiaonline.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, 2ND FLOOR,',NULL,NULL,NULL,NULL,877),(1022,'starifsc','starfinvest.in','starifsc@starfinvest.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE, 3RD FLOOR,',NULL,NULL,NULL,NULL,878),(1023,'gift','stockholding.com','gift@stockholding.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE,, 5TH FLOOR,',NULL,NULL,NULL,NULL,879),(1024,'compliance','stringifsc.com','compliance@stringifsc.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Pragya Tower,, 4th Floor,',NULL,NULL,NULL,NULL,880),(1025,'info','sunrisegilts.co.in','info@sunrisegilts.co.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE,  5th FLOOR',NULL,NULL,NULL,NULL,881),(1026,'synergyifsc','gmail.com','synergyifsc@gmail.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, SECOND FLOOR',NULL,NULL,NULL,NULL,882),(1027,'yagnesh.upadhyay','tipsons.com','yagnesh.upadhyay@tipsons.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING,  SIXTH FLOOR,',NULL,NULL,NULL,NULL,883),(1028,'ifsc','tradeair.in','ifsc@tradeair.in',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'SIGNATURE BUILDING, FOURTH FLOOR',NULL,NULL,NULL,NULL,884),(1029,'Udit_agg','yahoo.com','Udit_agg@yahoo.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'Pragya Accelerator, GF Floor',NULL,NULL,NULL,NULL,885),(1030,'sudeep346','gmail.com','sudeep346@gmail.com',NULL,'2024-06-07 07:18:51','2024-06-07 07:18:51',NULL,'GIFT ASPIRE 1 , UNIT NO. 37/3',NULL,NULL,NULL,NULL,886),(1031,'compliance','abans.co.in','compliance@abans.co.in',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Signature Building, 4th Floor',NULL,NULL,NULL,NULL,817),(1032,'deepakkedia','rathi.com','deepakkedia@rathi.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Signature, 6th Floor,',NULL,NULL,NULL,NULL,818),(1033,'infoifsc','aryafingroup.com','infoifsc@aryafingroup.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Signature Building,, 3rd Floor',NULL,NULL,NULL,NULL,819),(1034,'info','augmont.in','info@augmont.in',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Signature Building, Third Floor',NULL,NULL,NULL,NULL,820),(1035,'ifsc','eisec.com','ifsc@eisec.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Pragya Tower, 4th Floor',NULL,NULL,NULL,NULL,821),(1036,'compliance','emkayglobal.com','compliance@emkayglobal.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Signature,, Fifth Floor',NULL,NULL,NULL,NULL,822),(1037,'compliance','myfindoc.com','compliance@myfindoc.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'SIGNATURE BUILDING,, THIRD FLOOR,',NULL,NULL,NULL,NULL,823),(1038,'ifsclearing','globecapital.com','ifsclearing@globecapital.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Signature Building,  2nd Floor',NULL,NULL,NULL,NULL,824),(1039,'Samir','Goldmine.net.in','Samir@Goldmine.net.in',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,' Aspire One , 	Unit 39, ground floor',NULL,NULL,NULL,NULL,825),(1040,'sunil.teli','icicibank.com','sunil.teli@icicibank.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'IFSC Banking Unit,, Wing E, Office No-E-2 & E-4 (Unit 18 & 20),',NULL,NULL,NULL,NULL,826),(1041,'rashmi.purohit','motilaloswal.com','rashmi.purohit@motilaloswal.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Signature Building,, , Third Floor',NULL,NULL,NULL,NULL,827),(1042,'ajay','smcindiaonline.com','ajay@smcindiaonline.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Signature Building,, 2nd Floor',NULL,NULL,NULL,NULL,828),(1043,'compmlro.ibu','statebank.com','compmlro.ibu@statebank.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Hiranandani Signature Tower, 14th Floor',NULL,NULL,NULL,NULL,829),(1044,'archana.jain','stockholding.com','archana.jain@stockholding.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'Hiranandani Signature Tower, 	Unit No. 308/A, Third Level',NULL,NULL,NULL,NULL,830),(1045,'gift','stockholding.com','gift@stockholding.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'SIGNATURE, FIFTH FLOOR',NULL,NULL,NULL,NULL,831),(1046,'Tony.Ricci','StoneX.com','Tony.Ricci@StoneX.com',NULL,'2024-06-07 07:22:54','2024-06-07 07:22:54',NULL,'GIFT House,,  1st Floor,',NULL,NULL,NULL,NULL,832);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `country_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'India','ind',NULL,NULL),(2,'United State Of America\r\n','usa',NULL,NULL),(3,'United Kingdom','uk',NULL,NULL),(5,'Hongkong','hk',NULL,NULL);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_logs`
--

DROP TABLE IF EXISTS `email_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contact_id` bigint unsigned NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email_logs_contact_id_foreign` (`contact_id`),
  CONSTRAINT `email_logs_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_logs`
--

LOCK TABLES `email_logs` WRITE;
/*!40000 ALTER TABLE `email_logs` DISABLE KEYS */;
INSERT INTO `email_logs` VALUES (1,972,'	ajay@smcindiaonline.com','success','2024-06-10 18:47:39','2024-06-12 14:51:04');
/*!40000 ALTER TABLE `email_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leaves` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leaves_user_id_foreign` (`user_id`),
  CONSTRAINT `leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaves`
--

LOCK TABLES `leaves` WRITE;
/*!40000 ALTER TABLE `leaves` DISABLE KEYS */;
/*!40000 ALTER TABLE `leaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_logs`
--

DROP TABLE IF EXISTS `message_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contact_id` bigint unsigned NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `message_logs_contact_id_foreign` (`contact_id`),
  CONSTRAINT `message_logs_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_logs`
--

LOCK TABLES `message_logs` WRITE;
/*!40000 ALTER TABLE `message_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_05_08_082331_create_call_booking_table',2),(6,'2024_05_09_060314_create_service_table',3),(7,'2024_05_09_111320_add_slug_to_service_table',4),(8,'2024_05_13_100820_create_worklogs_table',5),(9,'2024_05_13_102407_add_description_to_worklogs_table',6),(10,'2024_05_13_105239_create_worklogs_table',7),(11,'2024_05_14_051513_create_roles_table',8),(12,'2024_05_14_051757_add_role_to_users_table',9),(13,'2024_05_14_054044_create_project_table',10),(14,'2024_05_14_113912_remove_project_name_from_worklogs',11),(15,'2024_05_14_114135_add_project_id_to_worklogs',12),(16,'2024_05_14_132754_create_project_user_table',13),(17,'2024_05_15_102611_create_contact_table',14),(18,'2024_05_16_044924_add_user_id_to_contact',15),(19,'2024_05_16_062534_create_permission_tables',16),(20,'2024_05_20_055714_drop_permission_tables',17),(21,'2024_05_20_060507_create_permission_tables',18),(22,'2024_05_22_052055_create_category_table',19),(23,'2024_05_22_052640_create_company_table',20),(24,'2024_05_22_053549_create_country_table',21),(25,'2024_05_22_053744_create_state_table',22),(27,'2024_05_22_053844_create_city_table',23),(28,'2024_05_22_140038_add_address_to_contact_table',24),(29,'2024_05_28_095147_create_portfolio_table',25),(30,'2024_05_28_103637_create_blog_table',26),(31,'2024_05_28_105736_create_blog_table',27),(32,'2024_05_28_112158_create_team_table',28),(33,'2024_05_29_052921_create_blog_post_table',29),(34,'2024_05_29_062852_add_fields_to_blog_table',30),(35,'2024_05_29_063204_add_fields_to_blog_post_table',31),(36,'2024_05_30_045537_create_blog_table',32),(37,'2024_05_30_045844_create_blog_table',33),(38,'2024_05_30_045935_create_blog_table',34),(39,'2024_05_31_045737_add_fields_in_service',35),(40,'2024_05_31_055039_add_fields_in_portfolio',36),(41,'2024_05_31_055650_add_fields_country_portfolio',37),(42,'2024_05_31_071846_add_fields_slug_portfolio',38),(43,'2024_05_31_075323_add_fields_long_description_to_service',39),(44,'2024_05_31_091206_create_careers_table',40),(45,'2024_05_31_093919_create_careers_table',41);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(4,'App\\Models\\User',3),(2,'App\\Models\\User',6),(3,'App\\Models\\User',7);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view role','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(2,'create role','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(3,'update role','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(4,'delete role','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(5,'view permission','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(6,'create permission','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(7,'update permission','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(8,'delete permission','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(9,'view user','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(10,'create user','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(11,'update user','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(12,'delete user','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(13,'view product','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(14,'create product','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(15,'update product','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(16,'delete product','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(18,'admin panel','web','2024-05-21 06:31:40','2024-05-21 06:31:40');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sourceType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `streams` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint unsigned DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio_country_id_foreign` (`country_id`),
  CONSTRAINT `portfolio_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (1,'Query Mate','Elevating Customer Support with AI-Powered Chatbot Automation','public/storage/images/portfolio/1717141769.png','public/storage/images/portfolio//1717141769_country.svg','Web','public/storage/images/portfolio//1717141769_source.svg',NULL,'2024-05-31 02:19:29','Node JS,React JS,Open AI',5,'service1'),(2,'Query Mate','Elevating Customer Support with AI-Powered Chatbot Automation','public/storage/images/portfolio/1717141807.png','public/storage/images/portfolio//1717141807_country.svg','Web','public/storage/images/portfolio//1717141807_source.svg',NULL,'2024-05-31 02:20:07','Node JS,React JS,Open AI',5,'portfolio'),(3,'Query Mate','Elevating Customer Support with AI-Powered Chatbot Automation','public/storage/images/portfolio/1717141839.png','public/storage/images/portfolio//1717141839_country.svg','Web','public/storage/images/portfolio//1717141839_source.svg',NULL,'2024-05-31 02:20:39','Node JS,React JS,Open AI',5,'querymate'),(4,'Query Mate','Elevating Customer Support with AI-Powered Chatbot Automation','public/storage/images/portfolio/1717141876.png','public/storage/images/portfolio//1717141876_country.svg','Web','public/storage/images/portfolio//1717141876_source.svg',NULL,'2024-05-31 02:21:16','Node JS,React JS,Open AI',5,'querymate1'),(5,'Query Mate','Elevating Customer Support with AI-Powered Chatbot Automation','public/storage/images/portfolio/1717141906.png','public/storage/images/portfolio//1717141906_country.svg','Web','public/storage/images/portfolio//1717141906_source.svg',NULL,'2024-05-31 02:21:46','Node JS,React JS,Open AI',5,'querymate2'),(6,'Query Mate','Elevating Customer Support with AI-Powered Chatbot Automation','public/storage/images/portfolio/1717141935.png','public/storage/images/portfolio//1717141935_country.svg','Web','public/storage/images/portfolio//1717141935_source.svg',NULL,'2024-05-31 02:22:15','Node JS,React JS,Open AI',5,'querymate3');
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'vikartr demo laravel','vikartr demo',NULL,'2024-05-15 07:39:27'),(3,'laravel crud demo','laravel crud demo','2024-05-14 07:21:17','2024-05-14 07:21:17'),(4,'laravel admin panel','laravel admin panel','2024-05-14 07:28:08','2024-05-14 07:28:08'),(5,'hesed','hesed','2024-05-15 04:16:23','2024-05-15 04:35:30'),(6,'vikartr demo laravel','vikartr demo laravel','2024-05-15 04:37:48','2024-05-15 04:37:48'),(7,'laravel admin panel','laravel admin panel','2024-05-15 07:39:19','2024-05-15 07:39:19'),(8,'vikartr demo laravel','vikartr demo laravel','2024-05-16 00:38:18','2024-05-16 00:38:18'),(9,'vikartr demo laravel','vikartr demo laravel','2024-05-16 00:38:30','2024-05-16 00:38:30'),(10,'laravel admin panel','laravel admin panel','2024-05-16 00:39:06','2024-05-16 00:39:06'),(11,'laravel admin panel','laravel admin panel','2024-05-16 00:39:18','2024-05-16 00:39:18');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_user`
--

DROP TABLE IF EXISTS `project_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_user`
--

LOCK TABLES `project_user` WRITE;
/*!40000 ALTER TABLE `project_user` DISABLE KEYS */;
INSERT INTO `project_user` VALUES (3,5,1,NULL,NULL),(4,5,3,NULL,NULL),(6,5,1,NULL,NULL),(7,5,3,NULL,NULL),(9,5,2,NULL,NULL),(10,6,1,NULL,NULL),(11,6,3,NULL,NULL),(12,1,2,NULL,NULL),(14,1,3,NULL,NULL),(15,7,2,NULL,NULL),(16,7,3,NULL,NULL),(17,1,4,NULL,NULL),(18,8,2,NULL,NULL),(19,9,2,NULL,NULL),(20,10,3,NULL,NULL),(21,11,3,NULL,NULL);
/*!40000 ALTER TABLE `project_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(18,1),(9,3),(13,3),(15,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super-admin','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(2,'admin','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(3,'staff','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(4,'user','web','2024-05-21 00:00:42','2024-05-21 00:00:42'),(7,'student','web','2024-05-21 23:25:04','2024-05-21 23:25:04');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `streams` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'Web Application Development','Vikartr Technologies is at the forefront of web application development, pioneering innovative solutions that empower businesses to thrive in the digital age.','public/storage/images/service/1717131037.jpg','web_application',NULL,'2024-05-31 05:53:21','Node JS,React JS,Open AI','<p>1. Vikartr Technologies is at the forefront of web application development, pioneering innovative solutions that empower businesses to thrive in the digital age.</p><p>2. With a passion for technology and a commitment to excellence, we specialize in turning ideas into dynamic, user-centric web applications that drive growth and success.</p><p>3. We follow agile methodologies to ensure that our web development projects are delivered on time and within budget. Through iterative development cycles and transparent communication, we keep you involved every step of the way, providing regular updates and soliciting feedback to ensure that the final product exceeds your expectations. We provide ongoing support and maintenance services to ensure that your solution remains secure, reliable, and optimized for peak performance. From troubleshooting technical issues to implementing updates and enhancements, we\'re here to support you every step of the way.</p>'),(2,'Ecommerce Development','Our speciality at Vikartr Technologies is enabling companies to prosper in the cut-throat realm of online retail.','public/storage/images/service/1717133454.jpg','ecommerce_development',NULL,'2024-05-31 05:54:45','Node JS,React JS,Open AI','<p>1. Our speciality at Vikartr Technologies is enabling companies to prosper in the cut-throat realm of online retail. We provide specialized solutions that promote growth, improve customer engagement, and optimize return on investment because we have a thorough understanding of market trends, consumer behavior, and cutting edge technologies.</p><p>2.Whether you\'re a startup looking to establish your online presence or an established brand seeking to optimise your eCommerce platform, we have the expertise and experience to meet your unique needs.We understand the importance of scalability and security in eCommerce. That\'s why we leverage robust and scalable technologies to build platforms that can grow with your business, accommodating increasing traffic and transaction volumes without compromising performance or security.</p><p>3. In today\'s competitive eCommerce landscape, user experience is paramount. We design and develop eCommerce platforms with a focus on usability, intuitive navigation, and seamless functionality.</p>'),(3,'Mobile App Development','Paving the way in mobile app development, Vikartr Technologies provides customized solutions to companies looking to succeed in the','public/storage/images/service/1717133466.jpg','mobile_app_development',NULL,'2024-05-31 05:56:12','Node JS,React JS,Open AI','<p>1. Paving the way in mobile app development, Vikartr Technologies provides customized solutions to companies looking to succeed in the always developing digital market. By consistently emphasizing innovation and designing with the user in thoughts, we enable our clients to fully utilize mobile technology like ios, android , flutter, react native to accomplish unprecedented success.</p><p>2. Harnessing the power of Apple\'s ecosystem, we create sleek and sophisticated iOS applications that deliver unparalleled performance and user experience.With expertise in Android development, we cater to the diverse needs of businesses across the globe, delivering high-quality applications that resonate with Android users.As pioneers in Flutter development, we leverage Google\'s revolutionary UI toolkit to create stunning cross-platform applications with a single codebase.With React Native\'s flexibility and performance, we empower businesses to accelerate their time-to-market and stay ahead of the competition.</p><p>3. Our team of professionals is made up of knowledgeable developers with an abundance of experience creating mobile apps, so every project is completed to the highest standards.In order to create creative solutions that transcend industry standards and exceed our clients\' changing needs, we embrace developing technology and best practices.</p>'),(4,'UI/UX Design','Here at Vikartr Technologies, we believe that excellent design is about more than simply looks; it\'s about establishing meaningful and fluid','public/storage/images/service/1717133476.jpg','ui_ux_design',NULL,'2024-05-31 05:56:27','Node JS,React JS,Open AI','<p>1. Here at Vikartr Technologies, we believe that excellent design is about more than simply looks; it\'s about establishing meaningful and fluid interactions that raise user happiness and retention.</p><p>2. Aesthetics are vital in UI design because they influence how people see things and feel things. Utilizing our proficiency in color theory, typography, and visual hierarchy, we create aesthetically captivating interfaces that bolster brand identity and engage audiences. We customize our designs to fit your brand\'s personality and appeal to your target market, whether that be through energetic and immersive experiences or sleek and minimalist designs.</p><p>3. To keep ahead of the curve in the fast-paced field of digital design, creativity is essential. At Vikartr Technologies, we\'re dedicated to lifelong learning and discovery. We keep up with new developments in tools, technologies, and trends to push the limits of what\'s feasible in UI/UX design.</p>'),(5,'eLearning Application','At Vikartr Technologies, we believe that education is the key to unlocking human potential and advancing societal progress. With this goal in mind,','public/storage/images/service/1717133487.jpg','e_learning_application',NULL,'2024-05-31 05:56:42','Node JS,React JS,Open AI','<p>1. At Vikartr Technologies, we believe that education is the key to unlocking human potential and advancing societal progress. With this goal in mind, we are innovators in developing technology-enabled e-learning programmes that make learning accessible, interesting, and fun for learners of all ages and backgrounds.</p><p>2. We approach the development of eLearning applications in a personalized manner, collaborating closely with our clients to comprehend their unique requirements and customizing our solutions in response. We possess the skills and imagination to realize your idea, be it an all-inclusive online learning platform, an online classroom, or a mobile learning application.We are aware that organizations and educational institutions have changing needs over time.</p><p>3. We are aware that organizations and educational institutions have changing needs over time. Because of this, we create eLearning applications that are versatile and scalable, making it simple to expand, customize, and integrate them with other platforms and systems. Our solutions can change to accommodate your expanding needs, whether you\'re serving a small number of pupils or a large global audience.</p>'),(6,'Cloud Consulting','Vikartr Technologies is committed to assisting companies in realizing the full potential of cloud computing as a means of fostering creativity,','public/storage/images/service/1717133502.jpg','cloud_consulting',NULL,'2024-05-31 05:57:03','Node JS,React JS,Open AI','<p>1. Vikartr Technologies is committed to assisting companies in realizing the full potential of cloud computing as a means of fostering creativity, adaptability, and expansion. Being the leading provider of cloud consulting services, we support businesses in navigating the cloud\'s intricacies and confidently achieving their strategic goals by providing professional advice and specialized solutions.</p><p>2. Our deep understanding of top cloud platforms, including AWS, Azure, and Google Cloud, contributes a plethora of technical know-how. We use the newest cloud technologies, such as serverless architecture and infrastructure as code (IaC), containerisation, and microservices, to create scalable, secure, and resilient solutions that satisfy the needs of contemporary corporate environments. Our first concern when it comes to cloud consulting is security. To protect their data and apps in the cloud, we assist clients in putting strong security measures and best practices into place. Our services cover identity and access management (IAM), encryption, and compliance auditing to make sure our clients\' cloud environments are secure and compliant with regulations.</p><p>3. We are aware of how critical minimizing expenses and cloud resource optimisation are. Our cloud specialists collaborate closely with customers to find areas where money may be saved, enhance resource efficiency, and boost cloud performance. We assist clients in optimizing the return on their cloud investments through the use of reserved instances, auto-scaling policies, and rightsizing instances.</p>'),(7,'Devops Consulting','We understand that every organization is unique, with its own set of challenges and objectives. That\'s why we take a personalized approach to DevOps consulting, working closely with','public/storage/images/service/1717133516.jpg','devops_consulting',NULL,'2024-05-31 05:57:24','Node JS,React JS,Open AI','<p>We understand that every organization is unique, with its own set of challenges and objectives. That\'s why we take a personalized approach to DevOps consulting, working closely with our clients to understand their specific needs and goals. Whether you\'re looking to adopt DevOps practices from scratch or optimize your existing processes, we provide customized solutions that align with your business requirements and drive tangible results.</p><p>We at Vikartr Technologies are proponents of ongoing development. We accompany our clients on their DevOps journey, offering guidance at every turn to improve cooperation, streamline procedures, and spur creativity. We don\'t just give solutions. By providing continuous assistance, instruction, and guidance, we enable our clients to adopt DevOps concepts and reach their maximum potential.</p><p>Our past performance is quite evident. We have assisted countless businesses, ranging from multinational corporations to startups, in achieving their DevOps objectives across a wide range of industries. Utilizing automation, putting best practices into practice, and encouraging teamwork, we have often helped our clients achieve quantifiable gains in output, quality, and commercial results.</p>'),(8,'Digital Marketing','From search engine optimization (SEO) and pay-per-click (PPC) advertising to social media marketing and content creation, we offer a comprehensive suite of digital marketing','public/storage/images/service/1717133531.jpg','digital_marketing',NULL,'2024-05-31 05:57:40','Node JS,React JS,Open AI','<p>From search engine optimization (SEO) and pay-per-click (PPC) advertising to social media marketing and content creation, we offer a comprehensive suite of digital marketing services tailored to suit the unique needs and objectives of each client.</p><p>We believe in the power of strategy to drive success in digital marketing. That\'s why we take a strategic approach to every campaign, starting with a thorough analysis of your business, industry, and target audience.We leverage advanced analytics tools and technologies to track and measure the performance of our campaigns, providing you with actionable insights that enable you to optimize your marketing efforts and achieve better results.</p><p>The essence of every single thing we do is creativity OR Creativity is at the heart of everything we do OR Ready to take your digital marketing efforts to the next level? Partner with Vikartr Technologies and let us help you achieve your goals.</p>'),(9,'AI Development','Heading the way in breakthrough artificial intelligence (AI) is VikarTR Technologies. We are a top IT firm committed to enabling businesses to prosper in','public/storage/images/service/1717133547.jpg','ai_development',NULL,'2024-05-31 05:57:57','Node JS,React JS,Open AI','<p>Heading the way in breakthrough artificial intelligence (AI) is VikarTR Technologies. We are a top IT firm committed to enabling businesses to prosper in the era of intelligent machines by releasing the revolutionary potential of artificial intelligence.</p><p>From natural language processing and computer vision to predictive analytics and robotic process automation, we specialize in a wide range of AI applications across diverse industries. Whether you\'re in healthcare, finance, retail, manufacturing, or any other sector, our AI solutions are tailored to meet your specific needs and deliver measurable results.Innovation is at the core of everything we do. We stay at the forefront of AI research and development, constantly exploring new technologies, algorithms, and methodologies to push the boundaries of what\'s possible. We invest in our team\'s skills and expertise, fostering a culture of continuous learning and innovation that drives our success.</p><p>At VikarTR Technologies, we are committed to developing and deploying AI solutions ethically and responsibly. We prioritize transparency, fairness, and accountability in all our AI endeavors.</p>'),(10,'CRM Development','At Vikartr Technologies, we recognise how important it is to have efficient CRM systems in the competitive business climate of today.','public/storage/images/service/1717133570.jpg','crm_development',NULL,'2024-05-31 05:58:14','Node JS,React JS,Open AI','<p>At Vikartr Technologies, we recognise how important it is to have efficient CRM systems in the competitive business climate of today.</p><p>Our talented development team has plenty of experience and knowledge when it comes to creating unique CRM solutions that optimise customer engagement, increase productivity, and streamline operations.Leveraging the latest technologies and development frameworks, we build CRM solutions that are not only powerful and scalable but also intuitive and user-friendly. From robust backend databases to seamless frontend interfaces, we ensure that our CRM systems provide a seamless experience for users across all touchpoints.</p><p>Our CRM solutions are equipped with a comprehensive range of features designed to optimize sales, marketing, and customer service processes.</p>'),(11,'Custom Software Development','Our proficient team of developers uses the newest frameworks, tools, and techniques to create software that is reliable, scalable, and future-proof. We keep up with the latest developments in technology.','public/storage/images/service/1717133589.jpg','custom_software_development',NULL,'2024-05-31 05:58:32','Node JS,React JS,Open AI','<p>Our proficient team of developers uses the newest frameworks, tools, and techniques to create software that is reliable, scalable, and future-proof. We keep up with the latest developments in technology. Whether it\'s enterprise systems, mobile apps, web apps, or custom integrations, we make the most of contemporary technology to provide creative solutions that both meet and surpass our clients\' expectations.Our rigorous quality assurance processes encompass comprehensive testing, code reviews, and performance optimization to ensure that every software solution we deliver meets the highest standards of reliability, security, and performance.</p><p>Our firm Vikartr Technologies specializes in developing custom software that is suited to the particular requirements and objectives of companies in a variety of industries.</p><p>We enable our clients to stay ahead of the competition and accomplish their digital goals with accuracy and efficiency by unwaveringly committing to innovation and excellence.</p>'),(12,'Software as a Service Development','Your Partner in Software as a Service Development.','public/storage/images/service/1717133599.jpg','software_service_development',NULL,'2024-05-31 05:59:04','Node JS,React JS,Open AI','<p>Your Partner in Software as a Service Development.</p><p>With years of experience in the IT industry, we have developed a deep understanding of various sectors and verticals. From healthcare and finance to e-commerce and beyond, our team possesses the expertise and domain knowledge to deliver SaaS solutions that address the specific needs and requirements of your industry, helping you stay ahead of the competition and drive innovation.</p><p>we develop robust, scalable, and secure SaaS applications.Whether it\'s cloud-native architectures, microservices, or containerization, we harness the power of technology to create SaaS solutions that are flexible, adaptable, and future-proof, ensuring that your business remains agile and competitive in the long run.</p>');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `state_code_unique` (`code`),
  KEY `state_country_id_foreign` (`country_id`),
  CONSTRAINT `state_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'Gujarat','guj',1,NULL,NULL),(2,'Scotland','sco',3,NULL,NULL),(3,'Maharashtra','mh',1,NULL,NULL),(4,'Wales','wal',3,NULL,NULL),(5,'Madhyapradesh','mp',1,NULL,NULL),(6,'New York','ny',2,NULL,NULL),(7,'Bihar','bh',1,NULL,NULL),(8,'New Mexico','nm',2,NULL,NULL);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'John Doe','CEO & CTO','public/storage/images/team/1716959283.jpeg','2024-05-28 07:13:41','2024-05-28 23:38:03'),(2,'Doe John','Marketing Director','public/storage/images/team/1716900250.jpeg','2024-05-28 07:14:10','2024-05-28 07:14:10'),(3,'Lita Hayden','Graphic Designer','public/storage/images/team/1716900266.jpeg','2024-05-28 07:14:26','2024-05-28 07:14:26'),(4,'William Sendrick','Developer','public/storage/images/team/1716900295.jpeg','2024-05-28 07:14:55','2024-05-28 07:14:55');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_shops`
--

DROP TABLE IF EXISTS `user_shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_shops` (
  `user_id` bigint unsigned NOT NULL,
  `shop_id` bigint unsigned NOT NULL,
  KEY `user_shops_user_id_foreign` (`user_id`),
  CONSTRAINT `user_shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_shops`
--

LOCK TABLES `user_shops` WRITE;
/*!40000 ALTER TABLE `user_shops` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','superadmin@gmail.com',NULL,'$2y$10$chHgrYT9xR4zFP5USkUvrOANnfZ97erraoqLeQiMyRmmWMcYAPpCO',NULL,'2024-05-21 00:00:42','2024-05-21 00:00:42',1),(2,'Admin','admin@gmail.com',NULL,'$2y$10$395f.9KCSnXmkprtLynqsOsf0tX0TWTgrDqEM0uIC8HIXJcNzm5SK',NULL,'2024-05-21 00:00:43','2024-05-21 00:00:43',2),(3,'Staff','staff@gmail.com',NULL,'$2y$10$AViDqtILx5d8ayv5nxucDOkx5bctbjpfNSIJSdzP.9LOmv.V2ZFny',NULL,'2024-05-21 00:00:43','2024-05-21 00:00:43',4),(6,'test','test@gmail.com',NULL,'$2y$10$gkKaYZ1CqnAsDbAj6AJ2ouvCcwOR2chtWr9cAC079NP447JgsoOEq',NULL,'2024-06-27 06:24:02','2024-06-27 06:24:02',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worklogs`
--

DROP TABLE IF EXISTS `worklogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worklogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `worklogs_user_id_foreign` (`user_id`),
  KEY `worklogs_project_id_foreign` (`project_id`),
  CONSTRAINT `worklogs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  CONSTRAINT `worklogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worklogs`
--

LOCK TABLES `worklogs` WRITE;
/*!40000 ALTER TABLE `worklogs` DISABLE KEYS */;
INSERT INTO `worklogs` VALUES (1,'2024-05-14','sdasfsdf',1,'2024-05-14 06:24:32','2024-05-14 06:24:32',1),(4,'2024-05-14','hgjhgjrhdj',1,'2024-05-14 07:32:00','2024-05-14 07:32:00',3),(5,'2024-05-13','hjhjgfjrtrt',1,'2024-05-14 07:32:18','2024-05-14 07:32:18',1),(6,'2024-05-15','shdjfjgfhjfgkhkjafsadf',1,'2024-05-14 23:18:46','2024-05-14 23:33:56',3),(7,'2024-05-15','hdjhgjghkggglf',1,'2024-05-14 23:42:41','2024-05-15 06:21:26',4);
/*!40000 ALTER TABLE `worklogs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-27 13:28:31
