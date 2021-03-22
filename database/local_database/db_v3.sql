-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2021 at 11:52 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youniti`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

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
(39, '2021_03_12_174827_drop_columns_noteurs_note_suggestion_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(8, 'App\\Models\\User', 1),
(10, 'App\\User', 1),
(9, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `new_features`
--

CREATE TABLE `new_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen_at` timestamp NULL DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `seen_at`, `read_at`, `created_at`, `updated_at`) VALUES
('2f78b0a8-c3ee-4ff0-8b29-bf8733e146e0', 'App\\Notifications\\AdminNotif', 'App\\Models\\User', 1, '{\"user_id\":1,\"verb\":\"admin.info.test\",\"message\":\"Vous avez re\\u00e7u une notification de test\"}', '2021-03-22 08:55:55', '2021-03-22 08:55:55', '2021-03-22 08:55:25', '2021-03-22 08:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'post-manage', 'web', '2020-12-27 00:12:24', '2020-12-27 00:12:24'),
(2, 'user-manage', 'web', '2020-12-27 00:13:28', '2020-12-27 00:13:28'),
(3, 'dev-tools-access', 'web', '2020-12-27 00:14:25', '2020-12-27 00:14:25'),
(4, 'news-manage', 'web', '2020-12-27 00:14:44', '2020-12-27 00:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
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
  `validate_by` bigint(20) UNSIGNED DEFAULT NULL,
  `validate_at` datetime DEFAULT NULL,
  `validated_at` timestamp NULL DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user`, `user_id`, `scope`, `type`, `type2`, `content`, `is_active`, `is_published`, `version`, `status`, `validate_status`, `validate`, `validate_by`, `validate_at`, `validated_at`, `date`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Public', 'info', NULL, 'Offre de stage Abidjan Côte D\'Ivoire à CinetPay', 1, 1, 2, 1, 1, 0, 1, '2020-12-23 19:28:11', NULL, '2020-12-23 19:28:11', '2020-12-23 19:28:11', '2020-12-23 19:28:22'),
(3, 1, 1, 'Public', 'info', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea porro necessitatibus esse voluptas vero nam dolorem dolor vel recusandae laboriosam illo nihil minus atque voluptatum, labore accusantium asperiores corporis repellendus! https://www.labtic.ci', 1, 1, 2, 1, 1, 0, 1, '2021-03-04 22:37:22', NULL, '2021-03-04 22:37:22', '2021-03-04 22:37:22', '2021-03-04 22:41:22'),
(4, 9, 9, 'Public', 'info', NULL, 'Je suis Badra Ali et ceci est ma première publication', 1, 1, 2, 1, 1, 0, 9, '2021-03-06 10:59:06', NULL, '2021-03-06 10:58:38', '2021-03-06 10:58:38', '2021-03-06 10:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(7, 'admin', 'web', '2020-12-21 22:39:45', '2020-12-21 22:39:45'),
(8, 'developer', 'web', '2020-12-21 22:39:45', '2020-12-21 22:39:45'),
(9, 'moderator', 'web', '2020-12-21 22:39:45', '2020-12-21 22:39:45'),
(10, 'member', 'web', '2020-12-21 22:39:45', '2020-12-21 22:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 7),
(2, 7),
(4, 7),
(3, 8),
(4, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `searchuserindex`
--

CREATE TABLE `searchuserindex` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `searchuserindex`
--

INSERT INTO `searchuserindex` (`id`, `users_id`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dje Bi;Jean-Marc;Dje Bi Jean-Marc;Jean-Marc Dje Bi', '2020-12-21 23:51:56', '2020-12-21 23:51:56'),
(2, 9, 'Badra;Ali;Badra Ali;Ali Badra', '2020-12-21 23:51:56', '2020-12-21 23:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_author_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'App\\Models\\User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `content`, `etat`, `date`, `user_author_id`, `created_at`, `updated_at`, `user_author_type`) VALUES
(9, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, neque? Doloribus earum sit cupiditate, praesentium', 0, '2021-03-04 20:02:11', 1, '2021-03-04 20:02:11', '2021-03-04 20:02:11', 'App\\Models\\User'),
(12, 'Perferendis, neque? Doloribus earum sit cupiditate, praesentium, quidem numquam officiis commodi', 0, '2021-03-04 20:03:02', 1, '2021-03-04 20:03:02', '2021-03-12 17:28:06', 'App\\Models\\User'),
(13, 'Je pense que les publications devraient posséder des commentaires.', 0, '2021-03-06 11:03:22', 9, '2021-03-06 11:03:22', '2021-03-06 15:53:37', 'App\\Models\\User'),
(15, 'Test suggestions 2', 0, '2021-03-08 07:56:18', 1, '2021-03-08 07:56:18', '2021-03-12 15:55:08', 'App\\Models\\User'),
(16, 'RSR', 0, '2021-03-22 07:05:54', 1, '2021-03-22 07:05:54', '2021-03-22 07:05:54', 'App\\Models\\User'),
(17, 'Supr', 0, '2021-03-22 07:08:36', 1, '2021-03-22 07:08:36', '2021-03-22 07:08:36', 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion_user`
--

CREATE TABLE `suggestion_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suggestion_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suggestion_user`
--

INSERT INTO `suggestion_user` (`id`, `suggestion_id`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(2, 15, 1, 4, '2021-03-12 15:40:42', '2021-03-12 15:40:42'),
(3, 15, 1, 2, '2021-03-12 15:55:08', '2021-03-12 15:55:08'),
(4, 12, 1, 1, '2021-03-12 17:28:07', '2021-03-12 17:28:07'),
(5, 16, 1, 1, '2021-03-22 07:06:35', '2021-03-22 07:06:35'),
(6, 13, 1, 3, '2021-03-22 07:34:37', '2021-03-22 07:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `version` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nom`, `prenom`, `email`, `pays`, `numero`, `password`, `active`, `date_inscription`, `ville`, `commune`, `promo1`, `promo2`, `emploi`, `universite`, `is_staff`, `staff_role`, `version`, `photo`, `is_superadmin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tidev', 'Dje Bi', 'Jean-Marc', 'jeanmarcdjebi@gmail.com', 'CI', '', '$2y$10$ar6CfRa.e/6nj1XZhDpbLOU1HCE8WW5i/zMR1/JpEHavNsZdT5VPO', 0, NULL, '', '', '2014', '2017', 'Etudiant', 'LCA', 1, 'admin', 3, '1.png', 1, NULL, 'nuM43ZhU29iuKLna15aHYzxsFVSAuzgAtt9XF0XFDVoYXmYjWOisNVyWZnIT', '2020-12-16 17:14:43', '2021-03-11 00:50:35'),
(9, NULL, 'Badra', 'Ali', 'ali.badra@gmail.com', NULL, NULL, '$2y$10$ar6CfRa.e/6nj1XZhDpbLOU1HCE8WW5i/zMR1/JpEHavNsZdT5VPO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'member', 3, '9.png', 0, NULL, 'lcGd3XKYTcZydBDSkeS2MNiTetAlEaJLtjn8U2IFwEouP1MKzKcOB2fdcBcw', '2020-12-21 22:48:42', '2021-03-06 11:01:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `new_features`
--
ALTER TABLE `new_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_features_user_author_id_foreign` (`user_author_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_foreign` (`user`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_validate_by_foreign` (`validate_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `searchuserindex`
--
ALTER TABLE `searchuserindex`
  ADD PRIMARY KEY (`id`),
  ADD KEY `searchuserindex_users_id_foreign` (`users_id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suggestions_user_author_id_foreign` (`user_author_id`);

--
-- Indexes for table `suggestion_user`
--
ALTER TABLE `suggestion_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suggestion_user_suggestion_id_foreign` (`suggestion_id`),
  ADD KEY `suggestion_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `new_features`
--
ALTER TABLE `new_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `searchuserindex`
--
ALTER TABLE `searchuserindex`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `suggestion_user`
--
ALTER TABLE `suggestion_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `new_features`
--
ALTER TABLE `new_features`
  ADD CONSTRAINT `new_features_user_author_id_foreign` FOREIGN KEY (`user_author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_validate_by_foreign` FOREIGN KEY (`validate_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `searchuserindex`
--
ALTER TABLE `searchuserindex`
  ADD CONSTRAINT `searchuserindex_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD CONSTRAINT `suggestions_user_author_id_foreign` FOREIGN KEY (`user_author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suggestion_user`
--
ALTER TABLE `suggestion_user`
  ADD CONSTRAINT `suggestion_user_suggestion_id_foreign` FOREIGN KEY (`suggestion_id`) REFERENCES `suggestions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `suggestion_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
