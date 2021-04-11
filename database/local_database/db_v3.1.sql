-- --------------------------------------------------------
-- 主机:                           localhost
-- 服务器版本:                        5.7.24 - MySQL Community Server (GPL)
-- 服务器OS:                        Win64
-- HeidiSQL 版本:                  10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for youniti
CREATE DATABASE IF NOT EXISTS `youniti` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `youniti`;

-- Dumping structure for table youniti.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.failed_jobs: ~0 rows (大约)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table youniti.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.migrations: ~13 rows (大约)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(27, '2014_10_12_000000_create_users_table', 1),
	(28, '2014_10_12_100000_create_password_resets_table', 1),
	(29, '2019_08_19_000000_create_failed_jobs_table', 1),
	(30, '2020_05_11_213840_create_search_user_model', 1),
	(31, '2020_10_26_072813_create_notifications_table', 1),
	(32, '2020_05_07_163008_new_features', 2),
	(33, '2020_10_01_091418_create_posts_table', 3),
	(34, '2020_10_28_141909_create_permission_tables', 3),
	(35, '2021_01_12_004730_create_suggestions_table', 4),
	(36, '2021_03_10_052633_add_user_author_type_suggestions_table', 5),
	(38, '2021_03_12_150248_create_suggestion_user_table', 6),
	(39, '2021_03_12_174827_drop_columns_noteurs_note_suggestion_table', 7),
	(40, '2021_04_04_121405_drop_column_auser_author_type_suggestion_table', 8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table youniti.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.model_has_permissions: ~0 rows (大约)
DELETE FROM `model_has_permissions`;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table youniti.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.model_has_roles: ~3 rows (大约)
DELETE FROM `model_has_roles`;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(8, 'App\\Models\\User', 1),
	(10, 'App\\User', 1),
	(9, 'App\\Models\\User', 9);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table youniti.new_features
CREATE TABLE IF NOT EXISTS `new_features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_author_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `new_features_user_author_id_foreign` (`user_author_id`),
  CONSTRAINT `new_features_user_author_id_foreign` FOREIGN KEY (`user_author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.new_features: ~1 rows (大约)
DELETE FROM `new_features`;
/*!40000 ALTER TABLE `new_features` DISABLE KEYS */;
INSERT INTO `new_features` (`id`, `title`, `content`, `user_author_id`, `created_at`) VALUES
	(1, 'Test', 'Test 2', 1, '2021-04-09 00:00:00');
/*!40000 ALTER TABLE `new_features` ENABLE KEYS */;

-- Dumping structure for table youniti.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen_at` timestamp NULL DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.notifications: ~1 rows (大约)
DELETE FROM `notifications`;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `seen_at`, `read_at`, `created_at`, `updated_at`) VALUES
	('2f78b0a8-c3ee-4ff0-8b29-bf8733e146e0', 'App\\Notifications\\AdminNotif', 'App\\Models\\User', 1, '{"user_id":1,"verb":"admin.info.test","message":"Vous avez re\\u00e7u une notification de test"}', '2021-03-22 08:55:55', '2021-03-22 08:55:55', '2021-03-22 08:55:25', '2021-03-22 08:55:55');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table youniti.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.password_resets: ~0 rows (大约)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table youniti.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.permissions: ~4 rows (大约)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'post-manage', 'web', '2020-12-27 00:12:24', '2020-12-27 00:12:24'),
	(2, 'user-manage', 'web', '2020-12-27 00:13:28', '2020-12-27 00:13:28'),
	(3, 'dev-tools-access', 'web', '2020-12-27 00:14:25', '2020-12-27 00:14:25'),
	(4, 'news-manage', 'web', '2020-12-27 00:14:44', '2020-12-27 00:14:44');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table youniti.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `scope` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Public',
  `type` enum('','info','bourse','stage','job','event') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'info',
  `type2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `version` int(11) NOT NULL DEFAULT '2',
  `status` int(11) NOT NULL DEFAULT '0',
  `validate_status` int(11) NOT NULL DEFAULT '3',
  `validate` tinyint(1) NOT NULL DEFAULT '0',
  `validate_by` bigint(20) unsigned DEFAULT NULL,
  `validate_at` datetime DEFAULT NULL,
  `validated_at` timestamp NULL DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_foreign` (`user`),
  KEY `posts_user_id_foreign` (`user_id`),
  KEY `posts_validate_by_foreign` (`validate_by`),
  CONSTRAINT `posts_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `posts_validate_by_foreign` FOREIGN KEY (`validate_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.posts: ~3 rows (大约)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `user`, `user_id`, `scope`, `type`, `type2`, `content`, `is_active`, `is_published`, `version`, `status`, `validate_status`, `validate`, `validate_by`, `validate_at`, `validated_at`, `date`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'Public', 'info', NULL, 'CinetPay recherche son futur Responsable Technique en Côte d\'Ivoire.\r\nPostulez ici ==> https://lnkd.in/djpR7ri\r\n#CinetPay #embauche #emploi', 1, 1, 2, 1, 1, 0, 1, '2021-04-07 14:10:38', NULL, '2021-04-07 14:10:38', '2021-04-07 14:10:38', '2021-04-07 14:10:44'),
	(2, 1, 1, 'Public', 'info', NULL, '🚨 J\'ai postulé en ligne, j\'ai déposé mon CV bon nombre de sociétés, j\'ai tout tenté.\r\n\r\nMalheureusement aucun retour jusqu\'à ce jour.\r\n\r\nMême si vous n\'avez pas d\'opportunités à me proposer , un simple j\'aime ou un partage , me sera bénéfique.\r\n\r\nPar avance , merci à toutes les personnes qui me soutiennent et merci à vous pour avoir pris le temps de me lire.\r\n\r\n📜Diplôme : Bachelor RH\r\n\r\n🔍Recherche : Alternance RH\r\n\r\n📧 Mail :\r\nmonakhachane18@icloud.com\r\n\r\n#candidats', 1, 1, 2, 1, 1, 0, 1, '2021-04-07 14:34:05', NULL, '2021-04-07 14:34:05', '2021-04-07 14:34:05', '2021-04-07 14:34:30'),
	(3, 1, 1, 'Public', 'info', NULL, 'Super une nouvelle publication', 0, 0, 2, 0, 1, 0, 1, '2021-04-07 14:51:47', NULL, '2021-04-07 14:51:47', '2021-04-07 14:51:47', '2021-04-07 14:51:47');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table youniti.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.roles: ~5 rows (大约)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(7, 'admin', 'web', '2020-12-21 22:39:45', '2020-12-21 22:39:45'),
	(8, 'developer', 'web', '2020-12-21 22:39:45', '2020-12-21 22:39:45'),
	(9, 'moderator', 'web', '2020-12-21 22:39:45', '2020-12-21 22:39:45'),
	(10, 'member', 'web', '2020-12-21 22:39:45', '2020-12-21 22:39:45'),
	(11, 'superadmin', 'web', '2021-04-05 07:41:51', '2021-04-05 07:41:51');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table youniti.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.role_has_permissions: ~7 rows (大约)
DELETE FROM `role_has_permissions`;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 7),
	(2, 7),
	(4, 7),
	(3, 8),
	(4, 8),
	(1, 9),
	(3, 9);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table youniti.searchuserindex
CREATE TABLE IF NOT EXISTS `searchuserindex` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) unsigned NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `searchuserindex_users_id_foreign` (`users_id`),
  CONSTRAINT `searchuserindex_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.searchuserindex: ~2 rows (大约)
DELETE FROM `searchuserindex`;
/*!40000 ALTER TABLE `searchuserindex` DISABLE KEYS */;
INSERT INTO `searchuserindex` (`id`, `users_id`, `keywords`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Dje Bi;Jean-Marc;Dje Bi Jean-Marc;Jean-Marc Dje Bi', '2020-12-21 23:51:56', '2020-12-21 23:51:56'),
	(2, 9, 'Badra;Ali;Badra Ali;Ali Badra', '2020-12-21 23:51:56', '2020-12-21 23:51:56');
/*!40000 ALTER TABLE `searchuserindex` ENABLE KEYS */;

-- Dumping structure for table youniti.suggestions
CREATE TABLE IF NOT EXISTS `suggestions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_author_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suggestions_user_author_id_foreign` (`user_author_id`),
  CONSTRAINT `suggestions_user_author_id_foreign` FOREIGN KEY (`user_author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.suggestions: ~4 rows (大约)
DELETE FROM `suggestions`;
/*!40000 ALTER TABLE `suggestions` DISABLE KEYS */;
INSERT INTO `suggestions` (`id`, `content`, `etat`, `date`, `user_author_id`, `created_at`, `updated_at`) VALUES
	(13, 'Je pense que les publications devraient posséder des commentaires.', 0, '2021-03-06 11:03:22', 9, '2021-03-06 11:03:22', '2021-03-06 15:53:37'),
	(19, 'test', 0, '2021-03-28 20:44:47', 1, '2021-03-28 20:44:47', '2021-03-28 20:44:47'),
	(20, 'yoyo*', 0, '2021-03-28 20:54:15', 1, '2021-03-28 20:54:15', '2021-03-28 20:54:15'),
	(21, 'ii____', 0, '2021-04-04 11:41:18', 1, '2021-04-04 11:41:18', '2021-04-04 11:41:18');
/*!40000 ALTER TABLE `suggestions` ENABLE KEYS */;

-- Dumping structure for table youniti.suggestion_user
CREATE TABLE IF NOT EXISTS `suggestion_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `suggestion_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `note` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suggestion_user_suggestion_id_foreign` (`suggestion_id`),
  KEY `suggestion_user_user_id_foreign` (`user_id`),
  CONSTRAINT `suggestion_user_suggestion_id_foreign` FOREIGN KEY (`suggestion_id`) REFERENCES `suggestions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `suggestion_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.suggestion_user: ~1 rows (大约)
DELETE FROM `suggestion_user`;
/*!40000 ALTER TABLE `suggestion_user` DISABLE KEYS */;
INSERT INTO `suggestion_user` (`id`, `suggestion_id`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
	(6, 13, 1, 3, '2021-03-22 07:34:37', '2021-03-22 07:34:37');
/*!40000 ALTER TABLE `suggestion_user` ENABLE KEYS */;

-- Dumping structure for table youniti.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `date_inscription` timestamp NULL DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emploi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `universite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_staff` tinyint(1) NOT NULL DEFAULT '0',
  `staff_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `version` int(10) unsigned NOT NULL DEFAULT '3',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table youniti.users: ~2 rows (大约)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `nom`, `prenom`, `email`, `pays`, `numero`, `password`, `active`, `date_inscription`, `ville`, `commune`, `promo1`, `promo2`, `emploi`, `universite`, `is_staff`, `staff_role`, `version`, `photo`, `is_superadmin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'tidev', 'Dje Bi', 'Jean-Marc', 'jeanmarcdjebi@gmail.com', 'CI', '', '$2y$10$ar6CfRa.e/6nj1XZhDpbLOU1HCE8WW5i/zMR1/JpEHavNsZdT5VPO', 0, NULL, '', '', '2014', '2017', 'Etudiant', 'LCA', 1, 'admin', 3, '1.png', 1, NULL, 'qW0wZpzumsPYTyERXAzIK2AjSvcUxZVqas229InpSirwxaOsEUwEPM3DDKxk', '2020-12-16 17:14:43', '2021-03-11 00:50:35'),
	(9, NULL, 'Badra', 'Ali', 'ali.badra@gmail.com', NULL, NULL, '$2y$10$ar6CfRa.e/6nj1XZhDpbLOU1HCE8WW5i/zMR1/JpEHavNsZdT5VPO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'member', 3, '9.png', 0, NULL, 'lcGd3XKYTcZydBDSkeS2MNiTetAlEaJLtjn8U2IFwEouP1MKzKcOB2fdcBcw', '2020-12-21 22:48:42', '2021-03-06 11:01:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
