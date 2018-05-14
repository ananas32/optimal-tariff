-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: optimal_tariff
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calls`
--

LOCK TABLES `calls` WRITE;
/*!40000 ALTER TABLE `calls` DISABLE KEYS */;
INSERT INTO `calls` VALUES (1,'Безлим',1,'0','0','0','2018-03-19 10:34:55','2018-03-19 10:34:55'),(2,'Звонки на другие сети 30 мин, звонки на другие мобильные, после использования 30 минут - 0,60 грн/мин',0,'30','1','0.6','2018-03-19 22:00:12','2018-05-08 08:48:11'),(3,'Звонки на городские номера по Украине - 1,50 грн/мин',0,'0','1','1.5','2018-05-08 08:48:51','2018-05-08 08:48:51'),(4,'Звонки на другие сети 60 мин, звонки на другие мобильные, после использования 60 минут - 0,60 грн/мин',0,'60','1','0.6','2018-05-08 09:01:37','2018-05-08 09:01:37'),(5,'Звонки на другие сети 150 мин, звонки на другие мобильные, после использования 150 минут - 0,60 грн/ми',0,'150','1','0.6','2018-05-08 09:08:24','2018-05-08 09:08:24'),(6,'Звонки на другие сети 300 мин, звонки на другие мобильные, после использования 300 минут - 0,60 грн/ми',0,'300','1','0.6','2018-05-08 09:17:26','2018-05-08 09:17:26'),(7,'Звонки на другие сети 400 мин, звонки на другие мобильные, после использования 400 минут - 0,60 грн/ми',0,'400','1','0.6','2018-05-08 09:31:44','2018-05-08 09:31:44');
/*!40000 ALTER TABLE `calls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dropdown_texts`
--

DROP TABLE IF EXISTS `dropdown_texts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dropdown_texts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dropdown_texts`
--

LOCK TABLES `dropdown_texts` WRITE;
/*!40000 ALTER TABLE `dropdown_texts` DISABLE KEYS */;
INSERT INTO `dropdown_texts` VALUES (1,'Середня кількість дзвінків на день','2018-03-23 10:17:46','2018-03-23 10:17:46'),(2,'Середня довжина дзвінків','2018-03-23 10:18:01','2018-03-23 10:18:01'),(3,'Частота використань в місяць','2018-03-23 10:18:13','2018-03-23 10:18:13'),(4,'Пакети (в середньому на день)','2018-03-23 10:18:24','2018-03-23 10:18:24');
/*!40000 ALTER TABLE `dropdown_texts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_dropdowns`
--

DROP TABLE IF EXISTS `form_dropdowns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_dropdowns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dropdown_text_id` int(10) unsigned NOT NULL,
  `text_dropdown` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `form_dropdowns_dropdown_text_id_foreign` (`dropdown_text_id`),
  CONSTRAINT `form_dropdowns_dropdown_text_id_foreign` FOREIGN KEY (`dropdown_text_id`) REFERENCES `dropdown_texts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_dropdowns`
--

LOCK TABLES `form_dropdowns` WRITE;
/*!40000 ALTER TABLE `form_dropdowns` DISABLE KEYS */;
INSERT INTO `form_dropdowns` VALUES (1,1,'1-5','6'),(2,2,'4-5','4'),(3,3,'Каждий день','30'),(4,4,'Торба','55'),(5,1,'4-5','33');
/*!40000 ALTER TABLE `form_dropdowns` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internet_packages`
--

LOCK TABLES `internet_packages` WRITE;
/*!40000 ALTER TABLE `internet_packages` DISABLE KEYS */;
INSERT INTO `internet_packages` VALUES (1,'Интернет мобильный - 500 МБ Мобильный интернет, после использования тарифных 500 МБ 50 МБ - 5,00 грн',0,'500','50','5','2018-03-19 10:38:40','2018-05-08 08:51:35'),(2,'Интернет мобильный - 3000 МБ Мобильный интернет, после использования тарифных 3000 МБ 50 МБ - 5,00 грн',0,'3000','50','5','2018-05-08 09:04:48','2018-05-08 09:04:48'),(3,'Интернет мобильный - 6000 МБ Мобильный интернет, после использования тарифных 6000 МБ 100 МБ - 10,00 грн',0,'6000','100','10','2018-05-08 09:11:32','2018-05-08 09:11:32'),(4,'Безлим',1,'0','0','0','2018-05-08 09:17:56','2018-05-08 09:17:56');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'SMS по Украине, пакет 100 SMS - 2,00 грн/пакет',0,'0','100','2','2018-03-19 10:38:26','2018-05-08 08:52:29'),(2,'MMS по Украине 100 пакетов по 10 MMS в сутки, 10 MMS в сутки - 2,00 грн',0,'0','10','2','2018-05-07 13:24:47','2018-05-08 08:53:54'),(3,'SMS на украинские номера - 150, SMS по Украине, пакет 100 SMS - 2,00 грн/пакет',0,'150','100','2','2018-05-08 09:10:19','2018-05-08 09:10:19'),(4,'SMS на украинские номера - 300, SMS по Украине, пакет 100 SMS - 2,00 грн/паке',0,'300','100','2','2018-05-08 09:18:56','2018-05-08 09:18:56'),(5,'SMS на украинские номера - 400, SMS по Украине, пакет 100 SMS - 2,00 грн/паке',0,'400','100','2','2018-05-08 09:30:59','2018-05-08 09:30:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_02_22_131814_entrust_setup_tables',1),(4,'2017_03_10_220240_create_slider_table',1),(5,'2017_03_11_093507_create_guest_book',1),(6,'2017_03_11_172340_create_locales_table',1),(7,'2017_03_12_000501_create_random_text_header_table',1),(8,'2017_03_12_150436_create_home_content_table',1),(9,'2017_03_12_185756_create_news_table',1),(10,'2017_03_14_220353_create_operators_table',1),(11,'2017_03_19_170504_create_region_table',1),(12,'2018_03_13_162638_create_call_table',2),(13,'2018_03_14_103740_create_message_table',2),(14,'2018_03_14_104944_create_internet_package_table',3),(25,'2018_03_19_095709_create_tariff_names_table',4),(26,'2018_03_19_095711_create_regular_payments_table',4),(27,'2018_03_19_095827_create_tariffs_table',4),(29,'2018_03_23_114426_create_form_dropdown_table',5);
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
INSERT INTO `news` VALUES (1,'4g-svyaz-v-ukraine-chto-eto-takoe-i-kogda-zarabotaet',1,1,3,'images/uploads/02d7d2f2da257ef6f9ce7373c2b424e0.jpg','2018-03-12 11:22:21','2018-03-19 21:45:19'),(2,'fiskalnaya-sluzhba-prokommentirovala-obyski-v-kievstare',2,1,2,'images/uploads/24850cf445db2ad87caf322e6025047b.jpg','2018-03-12 12:54:19','2018-03-19 21:53:06');
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
INSERT INTO `news_translations` VALUES (1,1,'ru','4G-связь в Украине. Что это такое и когда заработает','На заседании 4 июля Кабинет Министров Украины одобрил условия введения связи четвертого поколения (4G)','<p>Мобильная связь третьего поколения &ndash; 3G &ndash; в Украине&nbsp;<a href=\"http://gordonua.com/news/society/Operatory-mobilnoy-svyazi-Letom-v-Ukraine-budet-polnocennyy-3G-internet-72774.html\">начала работать в 2015 году</a>&nbsp;(с 2007 филиал &quot;Укртелекома&quot; Utel предоставлял услуги беспроводного 3G-интернета). Лицензии на предоставление услуг в этом стандарте получили три оператора: lifecell, &quot;Vodafone Украина&quot; и &quot;Киевстар&quot;. Сейчас услуга доступна примерно половине населения страны.</p>\r\n\r\n<p>Главное отличие 4G от 3G в скорости передачи данных. Так, в соответствии со спецификацией Международного союза электросвязи, минимальная скорость передачи данных в сети четвертого поколения должна составлять 1 Гбит/с для стационарных объектов и пользователей, перемещающихся с низкой скоростью, и 100 Мбит/с для пользователей, перемещающихся с высокой скоростью (для сетей третьего поколения это 2 Мбит/с и 348 кбит/с соответственно). К примеру, на скорости 100&ndash;150 Мбит/с сайты открываются почти мгновенно, загрузка фильма в HD-качестве занимает до 10 минут. Сейчас это обычная скорость &quot;стационарного&quot; интернета.</p>\r\n\r\n<p>Кроме того, 4G-сети (стандарт LTE) предоставляют абонентам широкополосный доступ к интернету &ndash; это значит, что пользоваться сетью без &quot;проседания&quot; скорости доступа сможет больше людей. Например, на стадионе во время матча из-за большого количества подключений 3G-сеть работает или очень медленно, или вовсе отключается. 4G-сеть должна справляться с такими нагрузками.</p>\r\n\r\n<p>Наверное, единственный недостаток &ndash; не все смартфоны, которые работают с 3G, поддерживают стандарт LTE, поэтому чтобы воспользоваться новой сетью, придется сменить мобильное устройство.</p>\r\n\r\n<p>Указ о внедрении в Украине &quot;подвижной (мобильной) связи четвертого поколения&quot; президент Петр Порошенко&nbsp;<a href=\"http://www.president.gov.ua/documents/4452015-19277\" target=\"_blank\">подписал</a>&nbsp;летом 2015 года. В документе говорилось, что связь 4G должна заработать в 2017 году.</p>\r\n\r\n<p>Председатель Национальной комиссии Украины по регулированию связи и информатизации (НКРСИ) Александр Животовский в мае 2015-го&nbsp;<a href=\"http://gordonua.com/news/money/glava-nackomissii-po-regulirovaniyu-svyazi-v-ukraine-4g-poyavitsya-v-techenie-goda-dvuh-82515.html\" target=\"_blank\">объяснял</a>, что на внедрение нового стандарта нужно до двух лет. За это время нужно &quot;провести инвентаризацию радиочастотного ресурса&quot;, а затем найти и выделить новые радиочастоты и внедрить &quot;технологическую нейтральность&quot;.</p>\r\n\r\n<p>Под технологической нейтральностью подразумевается право оператора связи разворачивать в своем частотном ресурсе такой стандарт связи, который он посчитает необходимым, тогда как по действующему украинскому законодательству, телеком-операторы получают лицензии на частоты в привязке к технологии. Например, сейчас в Украине используются четыре диапазона &ndash; 850, 900, 1800 и 2100: в первом работает CDMA-оператор, второй и третий отведены под GSM и последний &ndash; под 3G, то есть развивать 4G в этих диапазонах по нынешним нормам операторы не имеют права.</p>\r\n\r\n<p>В Верховной Раде законопроект, который вводит принцип технейтральности, был&nbsp;<a href=\"http://w1.c1.rada.gov.ua/pls/zweb2/webproc4_1?pf3511=59907\" target=\"_blank\">зарегистрирован</a>&nbsp;еще в августе 2016 года, в апреле 2017-го документ&nbsp;<a href=\"http://w1.c1.rada.gov.ua/pls/zweb2/webproc4_1?pf3511=61601\" target=\"_blank\">одобрил</a>&nbsp;профильный комитет парламента, но в сессионном зале его пока не рассматривали.</p>\r\n\r\n<p>Портал&nbsp;<a href=\"https://ain.ua/2017/05/19/chto-nuzhno-dlya-polnocennogo-zapuska-3g-i-4g-v-ukraine\" target=\"_blank\">AIN</a>, специализирующийся на новостях об IT, отмечал, что принцип технологической нейтральности позволил бы национальным операторам в кратчайшие сроки внедрить связь четвертого поколения по всей стране, потому что им не пришлось бы менять существующее оборудование. Без технейтральности операторы будут вынуждены ставить новые вышки, работающие в новом диапазоне, а значит, покрытие будет не стопроцентным и сеть будет работать хорошо, скорее всего, только в крупных городах.</p>\r\n\r\n<p>При этом в компании &quot;Vodafone Украина&quot; изданию &quot;ГОРДОН&quot; отметили, что &quot;4G &ndash; это технология для передачи больших объемов данных, поэтому никто в мире сплошного покрытия 4G не строит&quot;.</p>\r\n\r\n<p>&quot;4G &ndash; это технология для &quot;интернета вещей&quot;, для обслуживания огромного количества подключенных устройств, которые генерируют много трафика. Поэтому 4G-сети будут строиться там, где будет сконцентрирован трафик, в больших городах, густонаселенных территориях. На остальных территориях будет вполне достаточно емкости 3G&quot;, &ndash; отметила PR-директор &quot;Vodafone Украина&quot; Виктория Рубан.</p>\r\n\r\n<hr />\r\n<p>К внедрению 4G телеком-операторы начали готовиться в 2016 году. В частности, &quot;Киевстар&quot;, Vodafone и lifecell договорились о рефарминге &ndash; обмене частотами диапазона 1800 МГц (это должно ускорить внедрение нового стандарта и улучшить покрытие), а также&nbsp;<a href=\"https://www.epravda.com.ua/rus/publications/2016/08/1/600969/\" target=\"_blank\">провели тестирование</a>&nbsp;4G-сети, модернизировали базовые станции и&nbsp;<a href=\"https://www.vodafone.ua/uk/news/190-vodafone-ukrayina-perejshla-na-usim-karti-z-pidtrimkoyu-4g\" target=\"_blank\">сим-карты</a>.</p>\r\n\r\n<p>По итогам сегодняшнего заседания пресс-служба правительства сообщила, что Кабмин одобрил &quot;требования к работе операторов, условия проведения тендеров на продажу лицензий и стоимость лицензий&quot;. Начальная стоимость лицензий 4G составит около 6,3 млрд грн: 2,3 млрд &ndash; за диапазон 2600 МГц и 4 млрд &ndash; за диапазон 1800 МГц. Когда именно пройдут тендеры по продаже частот, пока неизвестно. В случае с 3G&nbsp;<a href=\"http://gordonua.com/news/money/Kabmin-utverdil-usloviya-prodazhi-licenziy-na-vnedrenie-3G-49986.html\">от момента утверждения условий тендера</a>&nbsp;до&nbsp;<a href=\"http://gordonua.com/infographics/3G-internet-v-Ukraine-INFOGRAFIKA-74800.html\">начала работы связи нового поколения</a>&nbsp;прошло около полугода.</p>\r\n\r\n<p>В пресс-службе &quot;Киевстара&quot; изданию &quot;ГОРДОН&quot; заявили, что сроки запуска 4G &quot;зависят от того, на каких частотах будет внедряться новая технология&quot;.</p>\r\n\r\n<p>&quot;На сегодня НКРСИ предлагает два варианта: диапазон 2600 МГц и диапазон 1800 МГц. В первом случае телеком-операторам понадобится строить новые сети, что требует времени. Во втором &ndash; сроки могут быть максимально сокращены и покрытие будет во много раз больше&quot;, &ndash; добавили в компании.</p>\r\n\r\n<p>Осенью прошлого года директор по корпоративному управлению и контролю &quot;Vodafone Украина&quot; Олег Проживальский&nbsp;<a href=\"https://www.epravda.com.ua/rus/publications/2016/10/3/607202/\" target=\"_blank\">говорил</a>, что оператор начнет разворачивать сеть LTE в 2018 году. Сейчас в компании отмечают, что технически уже готовы к внедрению 4G.</p>\r\n\r\n<p>&quot;Сейчас, при строительстве 3G-сети, мы устанавливаем базовые станции нового поколения. Это так называемое 4G-ready-оборудование, которое поддерживает стандарт 4G. Однако далеко не все зависит от технических вопросов. Есть экономические факторы, такие как покупательная способность людей, готовность платить за более технологически продвинутые, а значит, и более дорогие услуги, процент смартфонов, которые в состоянии поддерживать 4G&quot;, &ndash; отметила PR-директор &quot;Vodafone Украина&quot; Виктория Рубан.</p>\r\n\r\n<p>По ее данным, сейчас смартфоны с поддержкой LTE есть лишь у 10% украинцев. Портал&nbsp;<a href=\"https://ain.ua/2017/05/19/chto-nuzhno-dlya-polnocennogo-zapuska-3g-i-4g-v-ukraine\" target=\"_blank\">AIN</a>&nbsp;писал, что критической массой пользователей, которая нужна для запуска новой технологии, является барьер в 7%, и три крупнейших телеком-оператора этот барьер уже преодолели.</p>'),(2,2,'ru','Фискальная служба прокомментировала обыски в \"Киевстаре\"','Обыски в главном офисе компании \"Киевстар\" проводили в рамках расследования дела о неуплате налогов.','<p>Во время проведения обыска велась видеозапись Обыски в главном офисе компании &quot;Киевстар&quot; проводили в рамках расследования дела о неуплате налогов в размере около 2,4 млрд грн налогов. Об этом сообщила пресс-секретарь Государственной фискальной службы Наталья Непряхина в Facebook. &quot;Сотрудниками налоговой милиции Офиса крупных налогоплательщиков ДФС в рамках расследования уголовного производства по факту неуплаты около 2,4 млрд грн налогов, 4 января 2018 по фактическому месту расположения офисных помещений ЧАО &quot;Киевстар&quot; с целью отыскания и изъятия документов, имеющих&nbsp;объективное значение в уголовном производстве, проведен обыск&quot;, - сообщила Непряхина. Она добавила, что обыск проведен в&nbsp;исполнение постановления следственного судьи от 3 января 2018 года и соответствующее ходатайство следователя было согласовано процессуальным руководителем - прокурором Генеральной прокуратуры Украины. &quot;Во время проведения обыска в соответствии с изменениями в Уголовно-процессуальном кодексе велась видеозапись&quot;, - отметила чиновница.<br />\r\n&nbsp;</p>');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operators`
--

LOCK TABLES `operators` WRITE;
/*!40000 ALTER TABLE `operators` DISABLE KEYS */;
INSERT INTO `operators` VALUES (1,'kyivstar','images/uploads/ae91989a48bff4190460c55256f971f7.jpg','#00A0FF',1,'2018-03-13 12:12:58','2018-03-20 08:15:28'),(2,'lifecell','images/uploads/78fc9511231a7245a7418ef94483a283.jpg','#FFCB05',1,'2018-03-19 21:27:18','2018-03-19 21:27:18'),(3,'vodafone','images/uploads/1218b871f5fa45fd08a5313deacebd5e.png','#F0001F',1,'2018-03-19 21:36:53','2018-03-19 21:36:53');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region_translations`
--

LOCK TABLES `region_translations` WRITE;
/*!40000 ALTER TABLE `region_translations` DISABLE KEYS */;
INSERT INTO `region_translations` VALUES (1,1,'ru','Киевская'),(2,2,'ru','Хмельницкая'),(3,3,'ru','Тернопольская');
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
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,1,'kv','2018-03-19 11:01:49','2018-03-20 15:39:55'),(2,1,'hm','2018-03-19 11:02:04','2018-03-20 15:40:06'),(3,1,'tr','2018-03-19 21:39:41','2018-03-20 15:41:31');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regular_payment_translations`
--

LOCK TABLES `regular_payment_translations` WRITE;
/*!40000 ALTER TABLE `regular_payment_translations` DISABLE KEYS */;
INSERT INTO `regular_payment_translations` VALUES (1,1,'ru','Месячный платёж'),(2,2,'ru','Годовой платёж'),(3,3,'ru','Дневной платёж');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regular_payments`
--

LOCK TABLES `regular_payments` WRITE;
/*!40000 ALTER TABLE `regular_payments` DISABLE KEYS */;
INSERT INTO `regular_payments` VALUES (1,1,'2018-03-19 13:07:25','2018-03-19 13:07:25'),(2,1,'2018-03-19 21:57:07','2018-03-19 21:57:07'),(3,1,'2018-03-19 21:57:22','2018-03-19 21:57:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tariff_name_translations`
--

LOCK TABLES `tariff_name_translations` WRITE;
/*!40000 ALTER TABLE `tariff_name_translations` DISABLE KEYS */;
INSERT INTO `tariff_name_translations` VALUES (1,1,'ru','Безлим Разговоры'),(2,2,'ru','Тарифный план «Сделай сам»'),(3,3,'ru','Безвиз уикенд'),(4,4,'ru','Безлим Соцсети'),(5,5,'ru','Безлим Видео'),(6,6,'ru','Максимальный Безлим'),(7,7,'ru','Киевстар 4G'),(8,8,'ru','Киевстар 4G Extra'),(9,9,'ru','Киевстар 4G Ultra'),(10,10,'ru','Лайфхак начальный'),(11,11,'ru','Лайфхак Плюс');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tariff_names`
--

LOCK TABLES `tariff_names` WRITE;
/*!40000 ALTER TABLE `tariff_names` DISABLE KEYS */;
INSERT INTO `tariff_names` VALUES (1,1,'2018-03-19 13:07:15','2018-05-08 08:54:25'),(2,1,'2018-03-19 22:01:53','2018-03-19 22:01:53'),(3,1,'2018-03-19 22:02:39','2018-03-19 22:02:39'),(4,1,'2018-05-08 09:00:30','2018-05-08 09:00:30'),(5,1,'2018-05-08 09:11:54','2018-05-08 09:13:09'),(6,1,'2018-05-08 09:19:18','2018-05-08 09:19:18'),(7,1,'2018-05-08 09:25:12','2018-05-08 09:25:12'),(8,1,'2018-05-08 09:27:58','2018-05-08 09:27:58'),(9,1,'2018-05-08 09:30:25','2018-05-08 09:30:25'),(10,1,'2018-05-08 09:38:29','2018-05-08 09:38:29'),(11,1,'2018-05-08 09:38:42','2018-05-08 09:38:42');
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
INSERT INTO `tariff_region` VALUES (1,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(2,2),(3,2),(3,3);
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
  `mms_message_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tariffs`
--

LOCK TABLES `tariffs` WRITE;
/*!40000 ALTER TABLE `tariffs` DISABLE KEYS */;
INSERT INTO `tariffs` VALUES (1,1,2,3,1,1,1,'https://kyivstar.ua/ru/mm/tariffs/prepaid/unlimtalks',1,1,55,1,NULL,'2018-03-19 13:07:57','2018-05-08 08:59:46',2),(2,1,1,1,2,1,2,'qq',2,1,20,1,NULL,'2018-03-19 21:37:28','2018-05-07 13:25:04',NULL),(3,2,1,2,1,1,3,'лкуук',3,1,22,1,NULL,'2018-03-19 22:04:15','2018-03-19 22:04:15',NULL),(4,1,4,3,1,2,4,'https://kyivstar.ua/ru/mm/tariffs/prepaid/unlimsocial',1,1,75,1,NULL,'2018-05-08 09:03:58','2018-05-08 09:05:11',2),(5,1,5,3,3,3,5,'https://kyivstar.ua/ru/mm/tariffs/prepaid/unlimvideo',1,1,95,1,NULL,'2018-05-08 09:14:54','2018-05-08 09:14:54',2),(6,1,6,3,4,4,6,'https://kyivstar.ua/ru/mm/tariffs/prepaid/maxunlim',1,1,155,1,NULL,'2018-05-08 09:20:53','2018-05-08 09:20:53',2),(7,1,5,3,3,4,7,'https://kyivstar.ua/ru/mm/tariffs/contract/ks4g',1,1,95,1,NULL,'2018-05-08 09:26:52','2018-05-08 09:26:52',2),(8,1,6,6,4,4,8,'https://kyivstar.ua/ru/mm/tariffs/contract/ks4gextra',1,1,95,1,NULL,'2018-05-08 09:29:40','2018-05-08 09:29:40',2),(9,1,7,7,5,4,8,'https://kyivstar.ua/ru/mm/tariffs/contract/ks4gultra',1,1,275,1,NULL,'2018-05-08 09:33:06','2018-05-08 09:33:06',2);
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
INSERT INTO `users` VALUES (1,'Простий','Чоловік','porsche839@gmail.com','$2y$10$5JD4Kwz5B8vDxZID93Dul.3pAnFTEFtwEO7bRfIEJ6bEOW3NUo1lm','eWKClSWdy48haqfBYG29o82kn9Cn50ng5vYTKrEkl9ts2FtcYJ4PvgWVWshw',1,0,'127.0.0.1','2018-03-12 10:49:38','2018-03-12 10:49:38');
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

-- Dump completed on 2018-05-14 17:17:20
