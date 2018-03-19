-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: optimal_tariff
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `calls`
--

DROP TABLE IF EXISTS `calls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unlimited` tinyint(1) NOT NULL,
  `tariff_minute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calls`
--

LOCK TABLES `calls` WRITE;
/*!40000 ALTER TABLE `calls` DISABLE KEYS */;
INSERT INTO `calls` VALUES (1,'Безлим',1,'0','0','0','2018-03-19 10:34:55','2018-03-19 10:34:55');
/*!40000 ALTER TABLE `calls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest_book`
--

DROP TABLE IF EXISTS `guest_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guest_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unread` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest_book`
--

LOCK TABLES `guest_book` WRITE;
/*!40000 ALTER TABLE `guest_book` DISABLE KEYS */;
INSERT INTO `guest_book` VALUES (1,1,'Инокентий','developer@developer.com','Я простой человек который пришол на сайта, что бы оставить свой коментарий','','127.0.0.1','2018-03-13 13:47:41','2018-03-13 13:52:00');
/*!40000 ALTER TABLE `guest_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_content`
--

DROP TABLE IF EXISTS `home_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_content`
--

LOCK TABLES `home_content` WRITE;
/*!40000 ALTER TABLE `home_content` DISABLE KEYS */;
INSERT INTO `home_content` VALUES (4,'2018-03-11 22:00:00',NULL),(5,'2018-03-11 22:00:00',NULL),(6,'2018-03-11 22:00:00',NULL);
/*!40000 ALTER TABLE `home_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_content_translations`
--

DROP TABLE IF EXISTS `home_content_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_content_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `home_content_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `home_content_translations_home_content_id_locale_unique` (`home_content_id`,`locale`),
  KEY `home_content_translations_locale_index` (`locale`),
  CONSTRAINT `home_content_translations_home_content_id_foreign` FOREIGN KEY (`home_content_id`) REFERENCES `home_content` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_content_translations`
--

LOCK TABLES `home_content_translations` WRITE;
/*!40000 ALTER TABLE `home_content_translations` DISABLE KEYS */;
INSERT INTO `home_content_translations` VALUES (1,4,'ru','ЕКОНОМНЫЙ ТАРИФ?','<ul>\r\n	<li>На что идут деньги?</li>\r\n	<li>Какой тариф выгоден?</li>\r\n	<li>Все честно и бесплатно!</li>\r\n</ul>'),(2,5,'ru','ПОДБОР ОПТИМАЛЬНОГО ТАРИФА','<p>&nbsp; &nbsp;Сервис подсчитает, сколько бы вы отдавали за те же услуги на других тарифах, и подберет оптимальние тарифные опции.</p>\r\n\r\n<p>&nbsp; &nbsp;Подбирите тариф себе, родным и друзьям!</p>'),(3,6,'ru','МЫ НАЙДЕМ ДЛЯ ВАС ЛУЧШИЙ ТАРИФ!','<p>&nbsp; &nbsp;Выбрать сотовый тариф не просто. Можно воспользоваться советом друга или продавца, но выбор окажется не оптимальным. Или прикинуть, сколько будеш говорить, но в жизни все окажется иначе. Поетому оптимальный тариф только у половины абонентов.</p>\r\n\r\n<p>&nbsp; &nbsp;Привликая клиентов, операторы сотовой связи регулярно выпускают новые тарифы, опции и услуги. Как в этом разобратся?!</p>');
/*!40000 ALTER TABLE `home_content_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internet_packages`
--

DROP TABLE IF EXISTS `internet_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internet_packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unlimited` tinyint(1) NOT NULL,
  `tariff_package` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internet_packages`
--

LOCK TABLES `internet_packages` WRITE;
/*!40000 ALTER TABLE `internet_packages` DISABLE KEYS */;
INSERT INTO `internet_packages` VALUES (1,'Безлим пакетов',1,'0','0','0','2018-03-19 10:38:40','2018-03-19 10:39:22');
/*!40000 ALTER TABLE `internet_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locales`
--

DROP TABLE IF EXISTS `locales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locales`
--

LOCK TABLES `locales` WRITE;
/*!40000 ALTER TABLE `locales` DISABLE KEYS */;
/*!40000 ALTER TABLE `locales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unlimited` tinyint(1) NOT NULL,
  `tariff_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'Безлим СМС и ММС',1,'0','0','0','2018-03-19 10:38:26','2018-03-19 10:39:40');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_02_22_131814_entrust_setup_tables',1),(4,'2017_03_10_220240_create_slider_table',1),(5,'2017_03_11_093507_create_guest_book',1),(6,'2017_03_11_172340_create_locales_table',1),(7,'2017_03_12_000501_create_random_text_header_table',1),(8,'2017_03_12_150436_create_home_content_table',1),(9,'2017_03_12_185756_create_news_table',1),(10,'2017_03_14_220353_create_operators_table',1),(11,'2017_03_19_170504_create_region_table',1),(12,'2018_03_13_162638_create_call_table',2),(13,'2018_03_14_103740_create_message_table',2),(14,'2018_03_14_104944_create_internet_package_table',3),(25,'2018_03_19_095709_create_tariff_names_table',4),(26,'2018_03_19_095711_create_regular_payments_table',4),(27,'2018_03_19_095827_create_tariffs_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_news_id` int(10) unsigned NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `number_of_views` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_type_news_id_foreign` (`type_news_id`),
  CONSTRAINT `news_type_news_id_foreign` FOREIGN KEY (`type_news_id`) REFERENCES `type_news` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'sotsseti-bez-ogranicheniy',1,1,3,'images/uploads/0a6c78c934198b1b3d0c5c392b9d5e2f.jpg','2018-03-12 11:22:21','2018-03-13 13:01:30'),(2,'test',2,1,2,'images/uploads/df606ca740e986b9a119353d60fc84e0.png','2018-03-12 12:54:19','2018-03-13 14:02:46');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_translations`
--

DROP TABLE IF EXISTS `news_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_news` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_news` text COLLATE utf8_unicode_ci NOT NULL,
  `full_news` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_translations_news_id_locale_unique` (`news_id`,`locale`),
  KEY `news_translations_locale_index` (`locale`),
  CONSTRAINT `news_translations_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_translations`
--

LOCK TABLES `news_translations` WRITE;
/*!40000 ALTER TABLE `news_translations` DISABLE KEYS */;
INSERT INTO `news_translations` VALUES (1,1,'ru','Соцсети без ограничений','Общайтесь с друзьями сколько угодно. Самые популярные соцсети и мессенджеры мира включены.','<p>фывавыф</p>'),(2,2,'ru','Ололоха звичайний','дуже короткий опис дуже короткий опис дуже короткий опис','<p>фвыа фывафвыа фыва фвыа фывафыва вфыа вфы</p>');
/*!40000 ALTER TABLE `news_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operators`
--

DROP TABLE IF EXISTS `operators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `operator_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `operator_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `operator_color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operators`
--

LOCK TABLES `operators` WRITE;
/*!40000 ALTER TABLE `operators` DISABLE KEYS */;
INSERT INTO `operators` VALUES (1,'Киевстар','images/uploads/80808c1c0c232763172948d0d1a4f933.jpg','#6899D3',1,'2018-03-13 12:12:58','2018-03-19 14:28:35');
/*!40000 ALTER TABLE `operators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region_translations`
--

DROP TABLE IF EXISTS `region_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `region_translations_region_id_locale_unique` (`region_id`,`locale`),
  KEY `region_translations_locale_index` (`locale`),
  CONSTRAINT `region_translations_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region_translations`
--

LOCK TABLES `region_translations` WRITE;
/*!40000 ALTER TABLE `region_translations` DISABLE KEYS */;
INSERT INTO `region_translations` VALUES (1,1,'ru','Киевская'),(2,2,'ru','Хмельницкая');
/*!40000 ALTER TABLE `region_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,1,'2018-03-19 11:01:49','2018-03-19 11:01:49'),(2,1,'2018-03-19 11:02:04','2018-03-19 11:02:04');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regular_payment_translations`
--

DROP TABLE IF EXISTS `regular_payment_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regular_payment_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `regular_payment_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `regular_payment_translations_regular_payment_id_locale_unique` (`regular_payment_id`,`locale`),
  KEY `regular_payment_translations_locale_index` (`locale`),
  CONSTRAINT `regular_payment_translations_regular_payment_id_foreign` FOREIGN KEY (`regular_payment_id`) REFERENCES `regular_payments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regular_payment_translations`
--

LOCK TABLES `regular_payment_translations` WRITE;
/*!40000 ALTER TABLE `regular_payment_translations` DISABLE KEYS */;
INSERT INTO `regular_payment_translations` VALUES (1,1,'ru','Месячный платёж');
/*!40000 ALTER TABLE `regular_payment_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regular_payments`
--

DROP TABLE IF EXISTS `regular_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regular_payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regular_payments`
--

LOCK TABLES `regular_payments` WRITE;
/*!40000 ALTER TABLE `regular_payments` DISABLE KEYS */;
INSERT INTO `regular_payments` VALUES (1,1,'2018-03-19 13:07:25','2018-03-19 13:07:25');
/*!40000 ALTER TABLE `regular_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Администратор','Доступ к админ панели','2018-03-19 11:05:29','2018-03-19 11:05:29');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (1,1,1,'images/uploads/442beb041adbd10cfe195072f28d028c.jpg','2018-03-12 13:52:05','2018-03-12 13:52:05'),(2,2,1,'images/uploads/b3ee81a1019d93803fd22c45ae351b51.jpg','2018-03-12 13:52:17','2018-03-12 13:52:17'),(3,3,1,'images/uploads/68a7cb60e8bbf27bb15f284b3575d65b.jpg','2018-03-12 13:52:32','2018-03-12 13:52:32'),(4,4,1,'images/uploads/c7645c99888838fb3ed9ba3ff532ef77.jpg','2018-03-12 13:52:35','2018-03-12 13:52:51');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_networks`
--

DROP TABLE IF EXISTS `social_networks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_networks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `social_networks_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_networks`
--

LOCK TABLES `social_networks` WRITE;
/*!40000 ALTER TABLE `social_networks` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_networks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_package`
--

DROP TABLE IF EXISTS `social_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_package` (
  `social_id` int(10) unsigned NOT NULL,
  `package_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`social_id`,`package_id`),
  KEY `social_package_package_id_foreign` (`package_id`),
  CONSTRAINT `social_package_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `internet_packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `social_package_social_id_foreign` FOREIGN KEY (`social_id`) REFERENCES `social_networks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_package`
--

LOCK TABLES `social_package` WRITE;
/*!40000 ALTER TABLE `social_package` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tariff_name_translations`
--

DROP TABLE IF EXISTS `tariff_name_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tariff_name_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tariff_name_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tariff_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tariff_name_translations_tariff_name_id_locale_unique` (`tariff_name_id`,`locale`),
  KEY `tariff_name_translations_locale_index` (`locale`),
  CONSTRAINT `tariff_name_translations_tariff_name_id_foreign` FOREIGN KEY (`tariff_name_id`) REFERENCES `tariff_names` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tariff_name_translations`
--

LOCK TABLES `tariff_name_translations` WRITE;
/*!40000 ALTER TABLE `tariff_name_translations` DISABLE KEYS */;
INSERT INTO `tariff_name_translations` VALUES (1,1,'ru','для простих члоловіків');
/*!40000 ALTER TABLE `tariff_name_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tariff_names`
--

DROP TABLE IF EXISTS `tariff_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tariff_names` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tariff_names`
--

LOCK TABLES `tariff_names` WRITE;
/*!40000 ALTER TABLE `tariff_names` DISABLE KEYS */;
INSERT INTO `tariff_names` VALUES (1,1,'2018-03-19 13:07:15','2018-03-19 13:07:15');
/*!40000 ALTER TABLE `tariff_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tariff_region`
--

DROP TABLE IF EXISTS `tariff_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tariff_region` (
  `tariff_id` int(10) unsigned NOT NULL,
  `region_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tariff_id`,`region_id`),
  KEY `tariff_region_region_id_foreign` (`region_id`),
  CONSTRAINT `tariff_region_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tariff_region_tariff_id_foreign` FOREIGN KEY (`tariff_id`) REFERENCES `tariffs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tariff_region`
--

LOCK TABLES `tariff_region` WRITE;
/*!40000 ALTER TABLE `tariff_region` DISABLE KEYS */;
INSERT INTO `tariff_region` VALUES (1,1);
/*!40000 ALTER TABLE `tariff_region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tariffs`
--

DROP TABLE IF EXISTS `tariffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tariffs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `network_call_id` int(10) unsigned NOT NULL,
  `other_call_id` int(10) unsigned NOT NULL,
  `fixed_call_id` int(10) unsigned NOT NULL,
  `message_id` int(10) unsigned NOT NULL,
  `internet_package_id` int(10) unsigned NOT NULL,
  `tariff_name_id` int(10) unsigned NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `operator_id` int(10) unsigned NOT NULL,
  `regular_payment_id` int(10) unsigned NOT NULL,
  `price` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tariffs_network_call_id_foreign` (`network_call_id`),
  KEY `tariffs_other_call_id_foreign` (`other_call_id`),
  KEY `tariffs_fixed_call_id_foreign` (`fixed_call_id`),
  KEY `tariffs_message_id_foreign` (`message_id`),
  KEY `tariffs_internet_package_id_foreign` (`internet_package_id`),
  KEY `tariffs_tariff_name_id_foreign` (`tariff_name_id`),
  KEY `tariffs_operator_id_foreign` (`operator_id`),
  KEY `tariffs_regular_payment_id_foreign` (`regular_payment_id`),
  CONSTRAINT `tariffs_fixed_call_id_foreign` FOREIGN KEY (`fixed_call_id`) REFERENCES `calls` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tariffs_internet_package_id_foreign` FOREIGN KEY (`internet_package_id`) REFERENCES `internet_packages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tariffs_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tariffs_network_call_id_foreign` FOREIGN KEY (`network_call_id`) REFERENCES `calls` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tariffs_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tariffs_other_call_id_foreign` FOREIGN KEY (`other_call_id`) REFERENCES `calls` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tariffs_regular_payment_id_foreign` FOREIGN KEY (`regular_payment_id`) REFERENCES `regular_payments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tariffs_tariff_name_id_foreign` FOREIGN KEY (`tariff_name_id`) REFERENCES `tariff_names` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tariffs`
--

LOCK TABLES `tariffs` WRITE;
/*!40000 ALTER TABLE `tariffs` DISABLE KEYS */;
INSERT INTO `tariffs` VALUES (1,1,1,1,1,1,1,'111',1,1,122,0,NULL,'2018-03-19 13:07:57','2018-03-19 13:39:21');
/*!40000 ALTER TABLE `tariffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `text_header`
--

DROP TABLE IF EXISTS `text_header`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_header` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `text_header`
--

LOCK TABLES `text_header` WRITE;
/*!40000 ALTER TABLE `text_header` DISABLE KEYS */;
INSERT INTO `text_header` VALUES (1,1,'2018-03-12 11:14:06','2018-03-12 11:14:06');
/*!40000 ALTER TABLE `text_header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `text_header_translations`
--

DROP TABLE IF EXISTS `text_header_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_header_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text_header_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `initials` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `random_text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `text_header_translations_text_header_id_locale_unique` (`text_header_id`,`locale`),
  KEY `text_header_translations_locale_index` (`locale`),
  CONSTRAINT `text_header_translations_text_header_id_foreign` FOREIGN KEY (`text_header_id`) REFERENCES `text_header` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `text_header_translations`
--

LOCK TABLES `text_header_translations` WRITE;
/*!40000 ALTER TABLE `text_header_translations` DISABLE KEYS */;
INSERT INTO `text_header_translations` VALUES (1,1,'ru','Простой Человек','Выбрал тарифы для себя и своих близких, теперь звонки и интернет это дешево');
/*!40000 ALTER TABLE `text_header_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_news`
--

DROP TABLE IF EXISTS `type_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_news` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_news`
--

LOCK TABLES `type_news` WRITE;
/*!40000 ALTER TABLE `type_news` DISABLE KEYS */;
INSERT INTO `type_news` VALUES (1,'1',NULL,NULL),(2,'2',NULL,NULL);
/*!40000 ALTER TABLE `type_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_social` tinyint(1) NOT NULL DEFAULT '0',
  `ip` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Простий','Чоловік','porsche839@gmail.com','$2y$10$5JD4Kwz5B8vDxZID93Dul.3pAnFTEFtwEO7bRfIEJ6bEOW3NUo1lm','grnOIVOjFcCB8vUGnl3sLFyDnkQewQvYAfw9fhChQxccDz6lRQVFvbXAl1VS',1,0,'127.0.0.1','2018-03-12 10:49:38','2018-03-12 10:49:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'optimal_tariff'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-19 17:11:07
