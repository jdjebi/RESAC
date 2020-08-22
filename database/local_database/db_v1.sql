-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2020 at 05:28 PM
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
-- Table structure for table `batiment`
--

CREATE TABLE `batiment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `laravel_users`
--

CREATE TABLE `laravel_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2020_05_11_213840_create_search_user_model', 1),
(3, '2020_05_07_163008_new_features', 2),
(5, '2020_05_23_110908_add_remember_token_users_table', 3),
(6, '2014_10_12_100000_create_password_resets_table', 4),
(7, '2020_06_02_165454_add_user_account_version', 5),
(8, '2014_10_12_000000_create_users_table', 6),
(9, '2019_08_19_000000_create_failed_jobs_table', 6),
(10, '2020_06_22_161023_create_batiment', 6),
(11, '2020_08_10_230739_add_users_photo', 7);

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

--
-- Dumping data for table `new_features`
--

INSERT INTO `new_features` (`id`, `title`, `content`, `user_author_id`, `created_at`) VALUES
(1, 'Introduction à RESAC · Annuaire', 'super', 12, '2020-05-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ali.badra@gmail.com', '$2y$10$EIT2xGHYtKcGQr/AUen6VuGElFinJIK5VRGP1XmeG1zcYd4ppJBJq', '2020-06-29 07:32:36'),
('jeanmarcdjebi@gmail.com', '$2y$10$3HcEbuPFXuiZ3ahFXmI5LejfWILiXjlAfxf2YFB/HL0scbSDEN6Om', '2020-08-17 09:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `pub_v1`
--

CREATE TABLE `pub_v1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED DEFAULT NULL,
  `scope` varchar(20) NOT NULL DEFAULT 'Public',
  `type` varchar(20) NOT NULL DEFAULT 'post',
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `version` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '1',
  `validate` tinyint(1) DEFAULT '0',
  `validate_by` bigint(20) UNSIGNED DEFAULT NULL,
  `validate_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pub_v1`
--

INSERT INTO `pub_v1` (`id`, `user`, `scope`, `type`, `date`, `content`, `version`, `validate`, `validate_by`, `validate_at`) VALUES
(10, 12, 'Public', 'post', '2020-06-13 09:46:07', 'La Banque Orange recherche les profils suivants : \r\n\r\n- Chargé des procédures \r\n- Chargé de la comptabilité monétique\r\n- Chef Service LBC / FT \r\n- Chargé du contrôle Monétique\r\n- Assistant Service Conformité\r\n- Chef Service Marketing et Distribution\r\n- Assistant Service LBC / FT \r\n- Responsable des Moyens Généraux\r\n- Auditeur sénior \r\n- Assistant des Moyens Généraux\r\n- Chef d\'agence \r\n- Chargé de l\'administration et Paie\r\n- Chef Caisse \r\n- Analyste de Crédit\r\n- Assistant Clientèle \r\n- Chef Service Administration et suivi des crédits\r\n- Conseiller Clientèle \r\n- Chargé du Suivi des Crédits\r\n- Caissier \r\n- Chef Service Contrôle Permanent\r\n- Chef Service opérations monétiques & banque électronique \r\n- Responsable Service Risques\r\n- Chargé de compensation \r\n- Contrôleur Permanent\r\n- Chargé des Opérations Internationales\r\n- Ingénieur Sécurité\r\n- Chargé de Monétique et Banque Électronique \r\n- Chef Service Contrôle Financier\r\n- Chef Service Monétique et Banque électronique\r\n- Comptable\r\n- Chargé de mis en place et gestion de crédit et remboursement \r\n- Assistant Contrôle Financier\r\n- Assistant juriste (exp. Bancaire)\r\n\r\nLes CV sont reçus à l\'adresse recrutement.oba@orange.com', '1', 0, NULL, NULL),
(17, 12, 'Public', 'post', '2020-06-13 10:01:37', 'Voulez-vous faire de nouvelles expériences de travail ?\r\nVoulez-vous participer à la construction d’un vaste réseau social ? \r\nVoulez-vous accroître vos compétences ?\r\n Si oui, bonne nouvelle pour vous.\r\nMwaou recrute des développeurs bénévoles. \r\nCliquez sur le lien (en bas) et Intégrez , le groupe WhatsApp Mwaou Dev Challenge, des questions vous seront posées et des épreuves vous seront proposées afin de sélectionner les meilleurs.   \r\nDéjà félicitation à ceux qui seront sélectionnés et à bientôt.\r\n\r\nLe lien :  https://chat.whatsapp.com/K2rDNVWGROXJqaqXlHDjRV\r\n\r\n# Mwaou_Team', '1', 0, NULL, NULL),
(27, 13, 'Public', 'post', '2020-08-11 00:57:36', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', '1', 0, NULL, NULL);

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
(2, 12, 'Dje Bi;Jean-Marc;Dje Bi Jean-Marc;Jean-Marc Dje Bi', '2020-06-04 23:26:35', '2020-08-17 10:57:03'),
(3, 13, 'Badra;Ali;Badra Ali;Ali Badra', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(4, 356, '5e7df68d8e85c;5e7df68d8e85e;5e7df68d8e85c 5e7df68d8e85e;5e7df68d8e85e 5e7df68d8e85c', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(5, 357, '5e7df68d8e993;5e7df68d8e999;5e7df68d8e993 5e7df68d8e999;5e7df68d8e999 5e7df68d8e993', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(6, 358, '5e7df68d8eab7;5e7df68d8eab9;5e7df68d8eab7 5e7df68d8eab9;5e7df68d8eab9 5e7df68d8eab7', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(7, 359, '5e7df68d8ebd8;5e7df68d8ebda;5e7df68d8ebd8 5e7df68d8ebda;5e7df68d8ebda 5e7df68d8ebd8', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(8, 363, '5e7df68d8efa4;5e7df68d8efa6;5e7df68d8efa4 5e7df68d8efa6;5e7df68d8efa6 5e7df68d8efa4', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(9, 364, '5e7df68d8f096;5e7df68d8f097;5e7df68d8f096 5e7df68d8f097;5e7df68d8f097 5e7df68d8f096', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(10, 365, '5e7df68d8f17f;5e7df68d8f180;5e7df68d8f17f 5e7df68d8f180;5e7df68d8f180 5e7df68d8f17f', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(11, 419, 'Stéphano;Olivier;Stéphano Olivier;Olivier Stéphano', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(12, 427, 'Goli;Bob;Goli Bob;Bob Goli', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(13, 428, 'Kouassi;Paul;Kouassi Paul;Paul Kouassi', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(14, 429, 'Diarra;Ami;Diarra Ami;Ami Diarra', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(15, 430, 'Doumbia;Al;Doumbia Al;Al Doumbia', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(16, 431, 'Bamba;Djiakité;Bamba Djiakité;Djiakité Bamba', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(17, 432, 'Bi Dje;Paul Djordan;Bi Dje Paul Djordan;Paul Djordan Bi Dje', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(18, 433, 'Kouassi;Doudou bi Junior;Kouassi Doudou bi Junior;Doudou bi Junior Kouassi', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(19, 434, 'Stéphano;Bob;Stéphano Bob;Bob Stéphano', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(20, 435, 'Stéphano;Ckeick;Stéphano Ckeick;Ckeick Stéphano', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(21, 436, 'test;test;test test;test test', '2020-06-04 23:26:35', '2020-06-04 23:26:35'),
(22, 441, 'test;test;test test;test test', '2020-06-04 23:31:45', '2020-06-04 23:31:45'),
(23, 442, 'test;test;test test;test test', '2020-06-04 23:31:46', '2020-06-04 23:31:46'),
(24, 443, 'testSrHa;testmB6Q;testSrHa testmB6Q;testmB6Q testSrHa', '2020-06-04 23:32:45', '2020-06-04 23:32:45'),
(25, 444, 'testgcbf;testBr02;testgcbf testBr02;testBr02 testgcbf', '2020-06-04 23:32:46', '2020-06-04 23:32:46'),
(26, 447, 'testWV9l;testv3mY;testWV9l testv3mY;testv3mY testWV9l', '2020-06-04 23:36:08', '2020-06-04 23:36:08'),
(27, 448, 'testgIAX;testUXfU;testgIAX testUXfU;testUXfU testgIAX', '2020-06-04 23:36:09', '2020-06-04 23:36:09'),
(28, 449, 'Stéphano;Jean-Marc;Stéphano Jean-Marc;Jean-Marc Stéphano', '2020-06-04 23:39:08', '2020-06-04 23:39:08'),
(29, 450, 'Adja;Pauline;Adja Pauline;Pauline Adja', '2020-06-28 15:53:18', '2020-06-28 15:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `date_inscription` datetime DEFAULT CURRENT_TIMESTAMP,
  `ville` varchar(100) DEFAULT NULL,
  `commune` varchar(100) DEFAULT NULL,
  `promo1` varchar(20) DEFAULT NULL,
  `promo2` varchar(20) DEFAULT NULL,
  `emploi` varchar(255) DEFAULT NULL,
  `universite` varchar(255) DEFAULT NULL,
  `is_staff` int(11) NOT NULL DEFAULT '0',
  `staff_role` varchar(20) DEFAULT 'member',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `version` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nom`, `prenom`, `email`, `pays`, `numero`, `password`, `active`, `date_inscription`, `ville`, `commune`, `promo1`, `promo2`, `emploi`, `universite`, `is_staff`, `staff_role`, `remember_token`, `created_at`, `updated_at`, `version`, `photo`) VALUES
(12, NULL, 'Dje Bi', 'Jean-Marc', 'jeanmarcdjebi@gmail.com', 'CI', '+255 47 37 28 02', '$2y$10$9f8NjXy87dfCsJpQOX/EkOak4VxjDjaqH7JQl1Wv62DACEya8oR7G', 0, '2020-03-22 12:01:12', 'Abidjan', 'Commerce', '2001', '2004', 'Web Designer', 'ESATIC', 1, 'admin', 'jFT6TU7kQlvyOLAz1LqHYiwm60h4hJP3oNE3uBJgQ3iU8Ifcgxj02wYIcPPW', NULL, '2020-08-19 08:20:22', 2, 'avatars/fOwybJqbV086cxH6EgtWMOJmWI7OU00W93FnwIm7.jpeg'),
(13, NULL, 'Badra', 'Ali', 'ali.badra@gmail.com', 'SA', '', '$2y$10$vbT7TwyRut1wBIB11PD8gOaeflSa05lT/WbOG.PzYM9MhgzccYkAS', 0, '2020-03-22 12:32:10', 'Abidjan', 'AngrÃ©', '2016', '2018', NULL, NULL, 0, 'member', 'j0wio1wLlZnFyCw5jQ7xC3yZ3Jb9U9khjUQE1P0KYH16MBSMwQS4pqRWXULQ', NULL, '2020-08-11 00:33:36', 2, 'avatars/vtpa12ByrbGexBJuMzdvYfqT5ffkMoVQiS3DNuPt.jpeg'),
(356, NULL, '5e7df68d8e85c', '5e7df68d8e85e', '5e7df68d8e85f@youco.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-03-27 12:50:21', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'admin', NULL, NULL, NULL, 1, NULL),
(357, NULL, '5e7df68d8e993', '5e7df68d8e999', '5e7df68d8e99a@youco.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-03-27 12:50:21', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(358, NULL, '5e7df68d8eab7', '5e7df68d8eab9', '5e7df68d8eaba@youco.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-03-27 12:50:21', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'admin', NULL, NULL, '2020-08-17 12:28:08', 1, NULL),
(359, NULL, '5e7df68d8ebd8', '5e7df68d8ebda', '5e7df68d8ebdb@youco.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-03-27 12:50:21', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(363, NULL, '5e7df68d8efa4', '5e7df68d8efa6', '5e7df68d8efa7@youco.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-03-27 12:50:21', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(364, NULL, '5e7df68d8f096', '5e7df68d8f097', '5e7df68d8f098@youco.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-03-27 12:50:21', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(365, NULL, '5e7df68d8f17f', '5e7df68d8f180', '5e7df68d8f181@youco.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-03-27 12:50:21', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(419, NULL, 'Stéphano', 'Olivier', 'stephi@gmail.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-04-08 10:27:31', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(427, NULL, 'Goli', 'Bob', 'tidev91@gmail.com', 'CI', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-04-15 19:19:21', 'Abidjan', 'Angré', '2000', '2003', NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(428, NULL, 'Kouassi', 'Paul', 'kouassi@gmail.com', 'CI', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-04-20 04:26:03', 'Bouaké', 'Commerce', '2000', '2003', 'Commercial', 'INPHB', 0, 'member', NULL, NULL, NULL, 1, NULL),
(429, NULL, 'Diarra', 'Ami', 'ami.78@gmail.com', '', '+255 47 37 28 21', '356a192b7913b04c54574d18c28d46e6395428ab', 0, '2020-04-22 03:57:51', '', '', '', '', '', '', 0, 'member', NULL, NULL, NULL, 1, NULL),
(430, NULL, 'Doumbia', 'Al', 'doum.bia@gmail.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-04-23 13:46:36', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(431, NULL, 'Bamba', 'Djiakité', 'dji.tk@gmail.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-04-23 13:47:09', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(432, NULL, 'Bi Dje', 'Paul Djordan', 'paul.djordan@gmail.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-04-23 13:48:41', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(433, NULL, 'Kouassi', 'Doudou bi Junior', 'doudou@gmail.com', NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-04-23 13:49:27', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(434, NULL, 'Stéphano', 'Bob', 'arcdjebi@gmail.com', NULL, NULL, '$2y$10$Hpi50ToNTFHRv7WMcvcSJ./B2PKxtwdEydOrjy.0eN5p6zWx.j01m', 0, '2020-06-04 01:16:39', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 1, NULL),
(435, NULL, 'Stéphano', 'Ckeick', 'superbadra@gmail.com', NULL, NULL, '$2y$10$ogq6gCC2H3YYmPlssKcAeOUz4BkB2uJ9nCm34MYjtQUJro.NwUWFi', 0, '2020-06-04 01:18:42', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, NULL, NULL, 2, NULL),
(436, NULL, 'test', 'test', 'testfAxR@gmail.com', NULL, NULL, '$2y$10$rIzZRtY0glQ.Itj27D5wouZXSPgaYu/ePd2bvBixn6bJG4/7EiaZO', 0, '2020-06-04 23:23:50', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:23:49', '2020-06-04 23:23:49', 2, NULL),
(437, NULL, 'test', 'test', 'test4xQX@gmail.com', NULL, NULL, '$2y$10$hQB.bVtRJ23zViIGwLNdUuO5cGlHlqNDi.qKip2XErBJly5QNoVdi', 0, '2020-06-04 23:26:58', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:26:58', '2020-06-04 23:26:58', 2, NULL),
(438, NULL, 'test', 'test', 'testJljX@gmail.com', NULL, NULL, '$2y$10$nCO1rTkRAgnL4kDNMhvjjuSTZ9AdkT4CXRU8zY549RZmE/0i417l.', 0, '2020-06-04 23:26:59', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:26:59', '2020-06-04 23:26:59', 2, NULL),
(439, NULL, 'test', 'test', 'test1hQb@gmail.com', NULL, NULL, '$2y$10$l7JzInfOwKGfKjbCirAsReaIahZUeUWe1jOYSePONxs7hAII/GBJK', 0, '2020-06-04 23:29:28', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:29:28', '2020-06-04 23:29:28', 2, NULL),
(440, NULL, 'test', 'test', 'testEa8f@gmail.com', NULL, NULL, '$2y$10$qEvOp/IPGC462kozGwHgZ.ZQXbHr4ULR4fWTUqIOKQ2LXsZdMGscu', 0, '2020-06-04 23:29:28', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:29:28', '2020-06-04 23:29:28', 2, NULL),
(441, NULL, 'test', 'test', 'test7BdQ@gmail.com', NULL, NULL, '$2y$10$6jIy5OKLduONTBJwdp0y8ugMSmeS.2YcCBNIzKNsyHiXH7fWJlcaC', 0, '2020-06-04 23:31:45', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:31:45', '2020-06-04 23:31:45', 2, NULL),
(442, NULL, 'test', 'test', 'test8DyY@gmail.com', NULL, NULL, '$2y$10$sveabkfyuR7befKvU2aJP.Cd9q67HYLAU8.v8Rx0z08Hi0q3W6ejO', 0, '2020-06-04 23:31:46', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:31:46', '2020-06-04 23:31:46', 2, NULL),
(443, NULL, 'testSrHa', 'testmB6Q', 'testl3lX@gmail.com', NULL, NULL, '$2y$10$3VvjtPakh0gMpNZIf2GhmuG5HYDNC7pteY88R3OmVwVsmlYsY1ZjS', 0, '2020-06-04 23:32:45', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:32:45', '2020-06-04 23:32:45', 2, NULL),
(444, NULL, 'testgcbf', 'testBr02', 'testJlQb@gmail.com', NULL, NULL, '$2y$10$Z85qEb/B.ITGKCKu6HGF3uCh02N.T7xMVq5Vo3MitMW9Mtt9vHhvC', 0, '2020-06-04 23:32:46', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:32:46', '2020-06-04 23:32:46', 2, NULL),
(445, NULL, 'testIbxw', 'testjaVH', 'testyfLJ@gmail.com', NULL, NULL, '$2y$10$PE92ESJ4I3m2okTmoPrIX..MzI9gOZoLTHAp5pEfcw7IHxZHZlt4G', 0, '2020-06-04 23:35:44', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:35:44', '2020-06-04 23:35:44', 2, NULL),
(446, NULL, 'testG77k', 'testGw0I', 'testBC3h@gmail.com', NULL, NULL, '$2y$10$1rwXrYVOGMpv2Jk08MYOnu.2VcsxiVolsp0m3W.A.1wa.W1.gpBCi', 0, '2020-06-04 23:35:52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:35:52', '2020-06-04 23:35:52', 2, NULL),
(447, NULL, 'testWV9l', 'testv3mY', 'test9JTI@gmail.com', NULL, NULL, '$2y$10$1ZZ/0rYJMRGYgqnjbJRi2ubFE/bBniwbRVNLyTLCTU4xC8/CLjSQG', 0, '2020-06-04 23:36:08', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:36:08', '2020-06-04 23:36:08', 2, NULL),
(448, NULL, 'testgIAX', 'testUXfU', 'testoLdM@gmail.com', NULL, NULL, '$2y$10$DxTRP8o849oHnvghMpzSguhYSxBw9WP2S2lsdaRf6ZQ3rwb.a9Yqa', 0, '2020-06-04 23:36:09', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:36:09', '2020-06-04 23:36:09', 2, NULL),
(449, NULL, 'Stéphano', 'Jean-Marc', 'jeanmarcdjebi3123@gmail.com', NULL, NULL, '$2y$10$1GsZZ/01xXim5PJRsbdOl.ReWd7WJfk0oRUKs9r8s0BHYRtPyxUne', 0, '2020-06-04 23:39:08', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', NULL, '2020-06-04 23:39:08', '2020-06-04 23:39:08', 2, NULL),
(450, NULL, 'Adja', 'Pauline', 'adja@resac.ci', NULL, NULL, '$2y$10$veNqJZPCIK0lVrBRZs4ZiOl/s/dWTeeck3VIqXA.c0RLPcXZksx0O', 0, '2020-06-28 15:53:18', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'member', '0ZKbdagoRAkt7ZyWeqgYZWAiVQip9qv24HBBhwk8t0VFwNWGGMMuIxck2p1X', '2020-06-28 15:53:18', '2020-08-12 11:55:36', 2, 'avatars/UfHTS6XRsbVsevM6GaV2w7RD8J3kItQFtQwzrAcq.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_users`
--
ALTER TABLE `laravel_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `laravel_users_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_features`
--
ALTER TABLE `new_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_new_features_users` (`user_author_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pub_v1`
--
ALTER TABLE `pub_v1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pub_v1_users` (`user`),
  ADD KEY `FK_pub_v1_users_2` (`validate_by`);

--
-- Indexes for table `searchuserindex`
--
ALTER TABLE `searchuserindex`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_searchuserindex_users` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batiment`
--
ALTER TABLE `batiment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravel_users`
--
ALTER TABLE `laravel_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `new_features`
--
ALTER TABLE `new_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pub_v1`
--
ALTER TABLE `pub_v1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `searchuserindex`
--
ALTER TABLE `searchuserindex`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `new_features`
--
ALTER TABLE `new_features`
  ADD CONSTRAINT `FK_new_features_users` FOREIGN KEY (`user_author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pub_v1`
--
ALTER TABLE `pub_v1`
  ADD CONSTRAINT `FK_pub_v1_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_pub_v1_users_2` FOREIGN KEY (`validate_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `searchuserindex`
--
ALTER TABLE `searchuserindex`
  ADD CONSTRAINT `FK_searchuserindex_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
