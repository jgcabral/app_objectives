-- Adminer 4.8.1 MySQL 5.7.36 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `bd_objective`;
CREATE DATABASE `bd_objective` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_objective`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `goal_id` bigint(20) unsigned NOT NULL,
  `activity_id` bigint(20) unsigned NOT NULL,
  `time` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actions_goal_id_index` (`goal_id`),
  KEY `actions_activity_id_index` (`activity_id`),
  CONSTRAINT `actions_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `actions_goal_id_foreign` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `actions` (`id`, `goal_id`, `activity_id`, `time`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	15,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(2,	1,	2,	15,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(3,	1,	3,	15,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(4,	1,	4,	15,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04');

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `goal_id` bigint(20) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activities_goal_id_index` (`goal_id`),
  CONSTRAINT `activities_goal_id_foreign` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `activities` (`id`, `goal_id`, `description`, `created_at`, `updated_at`) VALUES
(1,	1,	'Reading',	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(2,	2,	'Writing',	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(3,	3,	'Listening',	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(4,	4,	'Speaking',	'2021-12-14 11:55:04',	'2021-12-14 11:55:04');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `goals`;
CREATE TABLE `goals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `objective_id` bigint(20) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `approach` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goals_objective_id_index` (`objective_id`),
  CONSTRAINT `goals_objective_id_foreign` FOREIGN KEY (`objective_id`) REFERENCES `objectives` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `goals` (`id`, `objective_id`, `description`, `finished`, `approach`, `created_at`, `updated_at`) VALUES
(1,	1,	'Presente Simple to be, to have, to have got',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(2,	1,	'Auxiliar do/does preguntas y negaciones',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(3,	1,	'Adjetivos posesivos',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(4,	1,	'Sustantivos: singular y plural',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(5,	1,	'Quantifiers: how much/many, some/any',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(6,	1,	'This/that, these/those',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(7,	1,	'Imperativos, let??s',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(8,	1,	'Expresi??n de la posesi??n (genitivo saj??n)',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(9,	1,	'Adverbios de frecuencia y expresiones temporales',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(10,	1,	'Preposiciones de lugar y tiempo (in, on,at, to)',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(11,	1,	'Pasado Simple: ???to be??? y verbos de uso cotidiano',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(12,	1,	'Can/can??t ',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(13,	1,	'Presente Continuo',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(14,	1,	'There is/are, there was/there were, Art??culos determinado e indeterminado',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(15,	1,	'Pronombres interrogativos',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(16,	1,	'N??meros ordinales y cardinale',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(17,	1,	'Conectores and, or, but.',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(18,	1,	'Pronombres personales.',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04'),
(19,	1,	'Pronombres objetos.',	0,	43829,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2021_12_07_221356_create_objetives_table',	1),
(5,	'2021_12_07_221509_create_goals_table',	1),
(6,	'2021_12_07_222345_create_activities_table',	1),
(7,	'2021_12_07_222348_create_actions_table',	1),
(8,	'2021_12_07_223032_create_progress_table',	1);

DROP TABLE IF EXISTS `objectives`;
CREATE TABLE `objectives` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `objectives_user_id_index` (`user_id`),
  CONSTRAINT `objectives_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `objectives` (`id`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	'Ingl??s - A2',	1,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `progress`;
CREATE TABLE `progress` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `action_id` bigint(20) unsigned NOT NULL,
  `time` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `progress_action_id_index` (`action_id`),
  CONSTRAINT `progress_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Juan',	'jgc1984@gmail.com',	NULL,	'$2y$10$NKEJK5cR91EfZw/GbsYlyOYHJye3jEHACivmbE15aMdmXL6HJ3bGu',	NULL,	'2021-12-14 11:55:04',	'2021-12-14 11:55:04');

-- 2021-12-14 11:56:28
