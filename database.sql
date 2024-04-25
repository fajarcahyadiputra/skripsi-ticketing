-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk ticketing
CREATE DATABASE IF NOT EXISTS `ticketing` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ticketing`;

-- membuang struktur untuk table ticketing.agents
CREATE TABLE IF NOT EXISTS `agents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomer_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domisili` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_depan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agents_user_id_foreign` (`user_id`),
  CONSTRAINT `agents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ticketing.agents: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` (`id`, `user_id`, `nik`, `perusahaan`, `email`, `nomer_hp`, `domisili`, `nama_belakang`, `nama_depan`, `jenis_kelamin`, `tanggal_lahir`, `jabatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 5, '4616147177344405', 'fajar group', 'fajarcahyadiputra@gmail.com', '3434343', 'ererere', 'cahyadi putra', 'fajar', 'laki-laki', '2024-03-15', 'rr343', '2024-03-30 15:24:35', '2024-03-30 15:42:13', '2024-03-30 15:42:13'),
	(2, 5, '4616147177344405', 'fajar group', 'fajarcahyadiputra@gmail.com', '087374374733', 'kota bekasi', 'cahyadi putra', 'asep', 'laki-laki', '1998-06-11', 'apa saja', '2024-03-30 15:48:19', '2024-03-30 15:48:19', NULL);
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;

-- membuang struktur untuk table ticketing.log_executions
CREATE TABLE IF NOT EXISTS `log_executions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint(20) unsigned NOT NULL,
  `rx_olt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rx_onu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_ont` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_acs` enum('ok','nok') COLLATE utf8mb4_unicode_ci NOT NULL,
  `wifi_config` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conn_state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chanel_use` int(11) NOT NULL,
  `interference` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dns_server` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speed_test` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_success` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wan_trafic` enum('ok','nok','tidak bisa di ukur') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lan_trafic` enum('ok','nok','tidak bisa di ukur') COLLATE utf8mb4_unicode_ci NOT NULL,
  `wlan` int(11) NOT NULL,
  `lan` int(11) NOT NULL,
  `cpu` int(11) NOT NULL,
  `memory` int(11) NOT NULL,
  `firewall_level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` enum('before','after') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `alasan_dispatch` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eskalasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_solution` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_draft` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_queued` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `log_executions_ticket_id_foreign` (`ticket_id`),
  CONSTRAINT `log_executions_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ticketing.log_executions: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `log_executions` DISABLE KEYS */;
INSERT INTO `log_executions` (`id`, `ticket_id`, `rx_olt`, `rx_onu`, `temp_ont`, `status_acs`, `wifi_config`, `conn_state`, `ext_ip`, `chanel_use`, `interference`, `phone_state`, `dns_server`, `speed_test`, `rate_success`, `wan_trafic`, `lan_trafic`, `wlan`, `lan`, `cpu`, `memory`, `firewall_level`, `condition`, `created_at`, `updated_at`, `deleted_at`, `alasan_dispatch`, `eskalasi`, `action_solution`, `ticket_draft`, `ticket_queued`, `keterangan`) VALUES
	(2, 10, '-21.49', '-3245454', '56', 'ok', '2.4GHz/5GHz - Single SSID', 'CONNECTED', 'IPV6', 1, 'INTERFERENCE', 'REGISTERED', 'PUBLIC', 'DOWNLOAD OK - UPLOAD NOK', 'DOWNLOAD OK - UPLOAD NOK', 'ok', 'ok', 44, 45, 12, 33, 'HIGH', 'before', '2024-04-17 14:15:37', '2024-04-17 15:46:10', NULL, 'Closed by FCR ROC', 'REGISTERED', 'REGISTERED', '223', '22', 'coba'),
	(3, 11, 'ssf', 'fdgdg', 'sdwr', 'ok', '2.4GHz/5GHz - Single SSID', 'DISCONNECTED', 'IPV6', 1, 'INTERFERENCE', 'UNREGISTER', 'PRIVATE', 'DOWNLOAD NOK - UPLOAD OK', 'DOWNLOAD - UPLOAD | NOK', 'ok', 'ok', 22, 33, 22, 11, 'HIGH', 'before', '2024-04-17 15:48:09', '2024-04-17 15:48:09', NULL, 'Dispatch - Pelanggan reject close', 'UNREGISTER', 'TIDAK BISA DIUKUR', 'fsdf', NULL, 'csfsf');
/*!40000 ALTER TABLE `log_executions` ENABLE KEYS */;

-- membuang struktur untuk table ticketing.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ticketing.migrations: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2014_10_12_000000_create_users_table', 1),
	(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(8, '2024_03_30_132731_create_table_agent', 1),
	(9, '2024_03_30_133418_create_ticket_table', 1),
	(10, '2024_03_30_134519_create_log_execution_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table ticketing.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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

-- Membuang data untuk tabel ticketing.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table ticketing.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) unsigned NOT NULL,
  `no_tiket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_inet` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomer_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_pcrf` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_usetv` enum('ok','nok','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `usage_pcrf` enum('ok','isoliran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_customer` enum('enable','isoliran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `radius_package` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_profile` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_profile` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_model` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `pcrf_package` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onu_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_agent_id_foreign` (`agent_id`),
  CONSTRAINT `tickets_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ticketing.tickets: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` (`id`, `agent_id`, `no_tiket`, `no_inet`, `nomer_hp`, `witel`, `sto`, `paket_pcrf`, `status_usetv`, `usage_pcrf`, `status_customer`, `radius_package`, `reference_profile`, `current_profile`, `nama_model`, `version`, `created_at`, `updated_at`, `deleted_at`, `pcrf_package`, `onu_type`, `version_id`) VALUES
	(10, 2, '1212155555', '23', '0895378889471', 'JAKTIM', 'CPP', 'ok', 'ok', 'ok', 'enable', 'INETNLOY50', 'UP-19456KB0/DOWN-56320KB0', 'UP-19456KB0/DOWN-56320KB0', 'ZTE B860H V2.1', 'V81111346.0062', '2024-04-17 14:15:37', '2024-04-17 15:46:44', NULL, 'INETNLOY50', '3344', '44'),
	(11, 2, '434343', '55555', '0895378889471', 'JAKBAR', 'CLD', 'dfdf', 'ok', 'ok', 'enable', 'fhf', 'gdgd', 'dfd', 'dfd', 'vdd', '2024-04-17 15:48:09', '2024-04-17 15:52:10', '2024-04-17 15:52:10', 'gdgdg', 'ggfg', 'ffh');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;

-- membuang struktur untuk table ticketing.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('agent','manajer','tim_analis','officer','supervisor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'agent',
  `status_aktif` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `nomer_tlpn` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ticketing.users: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nama`, `nik`, `password`, `role`, `status_aktif`, `nomer_tlpn`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'agent', '1345673467894356', '$2y$10$ueaXAktin4O43/dtf4MPkeQLyUEBVGrCifU5zKSZfDxJdqvFMCx8y', 'agent', 'aktif', '0896726478264', '', '2024-03-30 14:54:57', '2024-03-30 14:54:57', NULL),
	(2, 'officer', '4211357640870505', '$2y$10$DU4CPhupw50RCvwOV5ybIOAnExIETWDIKzUAAtHerls0/IMfnABzm', 'officer', 'aktif', '0896728274', '', '2024-03-30 14:54:57', '2024-03-30 14:54:57', NULL),
	(3, 'tim analis', '9350630355126922', '$2y$10$BBL/UNICnwoIISWK3Wome.nI87v5PEbURW4XPPBOtfYy8YbGZBXBe', 'tim_analis', 'aktif', '0896728274', '', '2024-03-30 14:54:57', '2024-03-30 14:54:57', NULL),
	(4, 'manajer', '6481130746012762', '$2y$10$aBPcLZEiJvYvB2S7P62wTeC2zljca73Bp8UdIJVQYNz/MefJb0pje', 'manajer', 'aktif', '089672884033', '', '2024-03-30 14:54:57', '2024-03-30 14:54:57', NULL),
	(5, 'supervisor', '9389354572118372', '$2y$10$JtmyLo6wKJP45Qhmebm3rOQ3N.tNyyToMNJThRZNQvL32B8/S2TJ6', 'supervisor', 'aktif', '089673434334', '', '2024-03-30 14:54:57', '2024-03-30 14:54:57', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
