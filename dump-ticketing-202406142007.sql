-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: ticketing
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

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
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomer_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domisili` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_depan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manajer` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kordinator` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agents_user_id_foreign` (`user_id`),
  CONSTRAINT `agents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` VALUES (1,10,'9389354572118378','fajar group','fajarcahyadiputra0@gmail.com','0898298','coba','fajar','cahyadi putra','perempuan','2024-04-10','5','2024-04-30 16:21:08','2024-06-12 07:05:03',NULL,'staff','5','assets/image/agent/1718175903-Jun.png'),(2,11,'9335653519313571','PT Kinambalu','jajang@gmail.com','08724827482','jakarta','jajang','supardii','laki-laki','2024-05-03','6','2024-05-02 08:44:00','2024-06-13 14:35:23',NULL,'apa saja','6','assets/image/agent/1718289312-Jun.png'),(3,12,'9389354572118643','fajar group','fajarcahyadiputra3@gmail.com','0987827482742','kota bekasi','fajar','02','laki-laki','2024-05-15','6','2024-05-06 06:48:59','2024-06-05 14:07:14','2024-06-05 14:07:14','staff','6',NULL),(4,13,'9389354572118522','PT Kinambalu','fajarcahyadiputra3@gmail.com','0877674267462','Bantargebang','didit','ujang','laki-laki','2024-05-27','5','2024-06-05 13:57:59','2024-06-05 14:06:52','2024-06-05 14:06:52','staff','5',NULL),(16,27,'9389354572118739','fajar group','fajarcahyadiputra3@gmail.com','08587482742','kota bekasi\r\nsubang','fajar','cahyadi putra 2','laki-laki','2024-06-05','5','2024-06-07 10:30:16','2024-06-12 07:24:17','2024-06-12 07:24:17','staff','5','assets/image/agent/1717757149-Jun.png'),(17,28,'9335653519314945','fajar group','fajarcahyadiputra3@gmail.com','0787987325','kota bekasi\r\nsubang','fajar','cahyadi putra 2','laki-laki','2024-06-06','5','2024-06-12 07:27:54','2024-06-13 13:53:04','2024-06-13 13:53:04','staff','5','assets/image/agent/1718177274-Jun.png');
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_after_executions`
--

DROP TABLE IF EXISTS `log_after_executions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_after_executions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint unsigned NOT NULL,
  `rx_olt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rx_onu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_ont` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_acs` enum('ok','nok') COLLATE utf8mb4_unicode_ci NOT NULL,
  `wifi_config` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conn_state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chanel_use` int NOT NULL,
  `interference` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dns_server` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speed_test` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_success` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wan_trafic` enum('ok','nok','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lan_trafic` enum('ok','nok','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `wlan` int NOT NULL,
  `lan` int NOT NULL,
  `cpu` int NOT NULL,
  `memory` int NOT NULL,
  `firewall_level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_after_executions_ticket_id_foreign` (`ticket_id`),
  CONSTRAINT `log_after_executions_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_after_executions`
--

LOCK TABLES `log_after_executions` WRITE;
/*!40000 ALTER TABLE `log_after_executions` DISABLE KEYS */;
INSERT INTO `log_after_executions` VALUES (1,4,'sf','ccwwa','33','ok','2.4GHz/5GHz - Single SSID','CONNECTED','IPV6',1,'INTERFERENCE','REGISTERED','PUBLIC','DOWNLOAD - UPLOAD | NOK','DOWNLOAD - UPLOAD | NOK','ok','ok',23,44,22,33,'HIGH','2024-04-30 16:30:15','2024-04-30 16:46:33',NULL),(2,11,'133','4566','66','ok','2.4GHz/5GHz - Dual SSID','CONNECTED','IPV6',1,'INTERFERENCE','UNREGISTER','PUBLIC','DOWNLOAD - UPLOAD | OK','DOWNLOAD - UPLOAD | OK','nok','nok',77,44,22,33,'LOW','2024-05-02 08:40:05','2024-05-02 08:49:19',NULL),(3,13,'8989','444','77','ok','2.4GHz/5GHz - Single SSID','DISCONNECTED','IPV4',1,'INTERFERENCE','UNREGISTER','PUBLIC','DOWNLOAD - UPLOAD | NOK','DOWNLOAD - UPLOAD | NOK','no','no',88,44,77,55,'HIGH','2024-05-02 08:46:36','2024-05-02 08:46:36',NULL),(4,14,'SDS','-3245454','56','ok','2.4GHz/5GHz - Dual SSID','DISCONNECTED','IPV6',1,'TIDAK INTERFERENCE','UNREGISTER','PUBLIC','TIDAK BISA DIUKUR','TIDAK BISA DIUKUR','nok','nok',22,33,22,44,'HIGH','2024-06-13 13:56:12','2024-06-13 13:56:28',NULL);
/*!40000 ALTER TABLE `log_after_executions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_before_executions`
--

DROP TABLE IF EXISTS `log_before_executions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_before_executions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint unsigned NOT NULL,
  `rx_olt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rx_onu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_ont` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_acs` enum('ok','nok') COLLATE utf8mb4_unicode_ci NOT NULL,
  `wifi_config` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conn_state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chanel_use` int NOT NULL,
  `interference` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dns_server` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speed_test` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_success` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wan_trafic` enum('ok','nok','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lan_trafic` enum('ok','nok','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `wlan` int NOT NULL,
  `lan` int NOT NULL,
  `cpu` int NOT NULL,
  `memory` int NOT NULL,
  `firewall_level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_before_executions_ticket_id_foreign` (`ticket_id`),
  CONSTRAINT `log_before_executions_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_before_executions`
--

LOCK TABLES `log_before_executions` WRITE;
/*!40000 ALTER TABLE `log_before_executions` DISABLE KEYS */;
INSERT INTO `log_before_executions` VALUES (2,4,'sf','ccwwa','33','ok','2.4GHz/5GHz - Single SSID','CONNECTED','IPV6',1,'INTERFERENCE','REGISTERED','PUBLIC','DOWNLOAD - UPLOAD | NOK','DOWNLOAD - UPLOAD | NOK','ok','ok',23,44,22,33,'HIGH','2024-04-30 16:30:15','2024-04-30 16:30:15',NULL),(3,11,'133','4566','66','ok','2.4GHz/5GHz - Dual SSID','CONNECTED','IPV6',1,'INTERFERENCE','UNREGISTER','PUBLIC','DOWNLOAD - UPLOAD | OK','DOWNLOAD NOK - UPLOAD OK','nok','nok',77,44,22,33,'LOW','2024-05-02 08:40:05','2024-05-02 08:40:05',NULL),(4,13,'8989','444','77','ok','2.4GHz/5GHz - Single SSID','DISCONNECTED','IPV4',1,'INTERFERENCE','UNREGISTER','PUBLIC','DOWNLOAD - UPLOAD | NOK','DOWNLOAD - UPLOAD | NOK','no','no',88,44,77,55,'HIGH','2024-05-02 08:46:36','2024-05-02 08:46:36',NULL),(5,14,'SDS','-3245454','56','ok','2.4GHz/5GHz - Dual SSID','DISCONNECTED','IPV6',1,'TIDAK INTERFERENCE','UNREGISTER','PUBLIC','TIDAK BISA DIUKUR','DOWNLOAD - UPLOAD | NOK','nok','nok',22,33,22,44,'HIGH','2024-06-13 13:56:12','2024-06-13 13:56:12',NULL);
/*!40000 ALTER TABLE `log_before_executions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_12_14_000001_create_personal_access_tokens_table',1),(3,'2024_03_30_132731_create_table_agent',1),(4,'2024_03_30_133418_create_ticket_table',1),(5,'2024_03_30_134519_create_log_execution_table',1),(6,'2024_04_25_155528_create_log_after_execution_table',1),(7,'2024_05_02_151359_add_colums_action_solution_in_tickets_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint unsigned NOT NULL,
  `no_tiket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_inet` bigint NOT NULL,
  `nomer_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `witel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_pcrf` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcrf_package` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_usetv` enum('ok','nok','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pusage_pcrf` enum('ok','isoliran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_customer` enum('enable','isoliran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_tiket` enum('closed','dispatch','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `radius_package` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_profile` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onu_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_profile` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_model` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_solution` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `eskalasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ticket_draft` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_queued` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_agent_id_foreign` (`agent_id`),
  CONSTRAINT `tickets_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (4,1,'224242',454464,'0895378889471','JAKSEL','TAN','ok','3535','ok','ok','enable','closed','757','8982','2424','44','22223','isdijs','33','huhiuhuh','hiuhiuhi','131s','21','fefegeg','2024-04-30 16:30:15','2024-04-30 16:46:33',NULL),(11,1,'87348735',23334556,'0876632638','BANTEN','PDR','vtrhe','feer','ok','ok','enable','closed','43','sdsxs','9835','3222','23213','uisjiud','V81111346.0062','wwwdwd','oioioi','444','55','defvrg','2024-05-02 08:40:05','2024-05-02 08:55:02',NULL),(13,2,'8466632',2333224,'087765765','JAKTIM','PSR','9898uiui','gdgdg','ok','ok','enable',NULL,'6676','SDS','2424','908989','879789','88787','55',NULL,NULL,NULL,NULL,NULL,'2024-05-02 08:46:36','2024-05-02 08:46:36',NULL),(14,1,'3878735',5335353,'0859353535464','JAKTIM','CKG','ok','445','ok','ok','enable','closed','3422','43543','4242','4646','534','SDS','V81111346.00wrw','uu','oo','fsdf','uy','tt','2024-06-13 13:56:12','2024-06-13 14:35:35','2024-06-13 14:35:35');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('agent','manajer','tim_analis','officer','supervisor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'agent',
  `status_aktif` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'agent','1345673467894356','$2y$10$hJ9RZn.ljRP9SqddlVm/3uN9lH2jcwBnKuKi7sneUG7PVD4tfI/IW','agent','aktif','2024-04-30 15:42:16','2024-04-30 15:42:16',NULL),(2,'officer','6384411683677304','$2y$10$wdi3ienP4y/bdowt/.gzl.60qDymPBctHzCobGa4StsBWmNYpPsLK','officer','aktif','2024-04-30 15:42:16','2024-06-05 15:05:42',NULL),(3,'tim analis','7226016959526750','$2y$10$bfZPCWK.yKGy23zkcqAtzeHFG1poEEuk9j70L2MNfd1Z1zL4Zqgey','tim_analis','aktif','2024-04-30 15:42:16','2024-04-30 15:42:16',NULL),(4,'manajer','4468170408190783','$2y$10$HGelPAA1xsSKoe1r761hI.rblovIpH2VE/1VzDPlYAHeNgvCCgEUm','manajer','aktif','2024-04-30 15:42:16','2024-04-30 15:51:18','2024-04-30 15:51:18'),(5,'supervisor','9335653519314971','$2y$10$RnKtTMkYeXLOoKYHp4Gcj.tmLb4nm/pu8renMk1H1dNMTTNN97T6q','supervisor','aktif','2024-04-30 15:42:16','2024-06-12 07:22:51',NULL),(6,'manager','9389354572118372','$2y$10$GqNQOYddNlVUgv4c8Qh8TuU1IU5goq9q80Q4qFo69ChjVk7OOiW8K','manajer','aktif','2024-04-30 15:53:58','2024-06-13 14:34:35',NULL),(10,'fajar cahyadi putra','9389354572118378','$2y$10$IS0wHJHi71NOyIYM13EUg.UafB1lPVQ6eB/rZ9McMnTS7viQI1xzu','agent','aktif','2024-04-30 16:21:08','2024-04-30 16:21:08',NULL),(11,'jajang supardi','9335653519313571','$2y$10$k0dw/C.8seXCY7JUF42CN.RB1.ddZNQoXmrEyQU0CMmfhXp71b9/2','agent','aktif','2024-05-02 08:44:00','2024-05-02 08:44:00',NULL),(12,'fajar 02','9389354572118643','$2y$10$0nrqcV807lwlic1dlYdqseNigdOx.jf279wkUgTaUgwCHWhzFmsG2','agent','aktif','2024-05-06 06:48:59','2024-06-05 14:07:09','2024-06-05 14:07:09'),(13,'didit ujang','9389354572118522','$2y$10$.8f5.lCE8tqwZ8QclWGfQuKh9fcrFp1/7iMhao9YJ7gozvXHBl316','agent','aktif','2024-06-05 13:57:59','2024-06-05 14:06:48','2024-06-05 14:06:48'),(27,'fajar cahyadi putra 2','9389354572118739','$2y$10$V8wfsRX6xDk6gbR1VPblA.MHgBQzxZx5PUSQw/PPsQYQcbjUmckNW','agent','aktif','2024-06-07 10:30:16','2024-06-12 07:24:17','2024-06-12 07:24:17'),(28,'fajar cahyadi putra 2','9335653519314945','$2y$10$jK10XK5ysR6SYoebQftbNOmNcth/T7YVZ2xWrkGA9Qj1mcm74.Ry2','agent','aktif','2024-06-12 07:27:54','2024-06-13 13:53:04','2024-06-13 13:53:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ticketing'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-14 20:07:38
