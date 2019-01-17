-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 jan 2019 om 21:25
-- Serverversie: 10.1.37-MariaDB
-- PHP-versie: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carcassonne`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `countdowns`
--

CREATE TABLE `countdowns` (
  `id` int(10) UNSIGNED NOT NULL,
  `round_minutes` int(10) UNSIGNED NOT NULL,
  `played_seconds` int(11) DEFAULT NULL,
  `resumed_seconds` int(11) DEFAULT NULL,
  `pause_timer` int(11) DEFAULT NULL,
  `paused_at` timestamp NULL DEFAULT NULL,
  `resumed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_11_11_171144_create_projects_table', 1),
(9, '2018_11_13_220027_create_tasks_table', 1),
(10, '2018_11_14_110001_create_todos_table', 1),
(11, '2018_11_25_154330_create_roles_table', 1),
(12, '2018_11_25_155734_create_rounds_table', 1),
(13, '2018_11_25_160217_create_tables_table', 1),
(14, '2018_11_25_163926_create_tables_users_table', 1),
(15, '2018_12_03_144419_create_verify_users_table', 1),
(16, '2018_12_06_131807_create_countdowns_table', 1),
(17, '2018_12_08_011842_create_theme_table', 1),
(18, '2018_12_09_215616_create_temp_users_table', 1),
(19, '2018_12_16_161105_create_news_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Judge', NULL, NULL),
(3, 'User', NULL, NULL),
(4, 'Stores', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rounds`
--

CREATE TABLE `rounds` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `round_number` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tables`
--

CREATE TABLE `tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `round_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tables_users`
--

CREATE TABLE `tables_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_points` int(10) UNSIGNED DEFAULT NULL,
  `weight` int(10) UNSIGNED DEFAULT NULL,
  `tournament_points` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `temp_users`
--

CREATE TABLE `temp_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `hash` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `theme`
--

CREATE TABLE `theme` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `modus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `todos`
--

CREATE TABLE `todos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Darwin', 'Hickle', 'admin@admin.nl', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 'OKjlDODnnV', NULL, NULL),
(2, 'Nicole', 'Wolff', 'judge@judge.nl', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 2, 'QdX13GXuuU', NULL, NULL),
(3, 'Alejandrin', 'Kiehn', 'user@user.nl', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '3ZiVREWAWB', NULL, NULL),
(4, 'Fleta', 'Morissette', 'kiara12@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'WWvNOAlBNI', '2019-01-17 20:25:10', '2019-01-17 20:25:10'),
(5, 'Sibyl', 'Corwin', 'chris.huels@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'CrU4cpQTjE', '2019-01-17 20:25:10', '2019-01-17 20:25:10'),
(6, 'Earnest', 'Denesik', 'aimee83@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'RpyV8dkrkc', '2019-01-17 20:25:10', '2019-01-17 20:25:10'),
(7, 'Nasir', 'Lakin', 'tnikolaus@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'Dv01BJd9eS', '2019-01-17 20:25:10', '2019-01-17 20:25:10'),
(8, 'Green', 'Sipes', 'bell.okeefe@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'kgbCcKxFNa', '2019-01-17 20:25:10', '2019-01-17 20:25:10'),
(9, 'Angelica', 'Orn', 'kunde.ezra@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'lLOwsSt5DO', '2019-01-17 20:25:10', '2019-01-17 20:25:10'),
(10, 'Eldridge', 'Brown', 'casper.jesus@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'zY094p9WTC', '2019-01-17 20:25:10', '2019-01-17 20:25:10'),
(11, 'Margarita', 'Rath', 'bryce03@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'kKmvjg0jbm', '2019-01-17 20:25:10', '2019-01-17 20:25:10'),
(12, 'Anne', 'Johns', 'opagac@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'IL6oBM56Wt', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(13, 'Marta', 'Mayert', 'gregg.blick@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'WAttPW36V8', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(14, 'Hank', 'Beier', 'mosciski.mariane@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'R5fcc1KsyN', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(15, 'Hardy', 'Witting', 'kathryne58@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'PQFNu8sU4l', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(16, 'Kennith', 'Hoeger', 'fernser@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'hQ7fxAEFtC', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(17, 'Idella', 'Hessel', 'theodora62@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'etvkyV6W2L', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(18, 'Hillary', 'Denesik', 'vmayert@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'DcH19upJ0N', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(19, 'Gust', 'Lehner', 'koelpin.brayan@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '93Axv8jheX', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(20, 'Ella', 'Jacobson', 'patricia.ankunding@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'XyQTKwlzHC', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(21, 'Chet', 'Botsford', 'angeline.nienow@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'T55LhSL1Xv', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(22, 'Lonzo', 'Marvin', 'estevan62@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '6PwW2HTq3V', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(23, 'Eula', 'Pagac', 'baylee43@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'kSoYjOZYis', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(24, 'Libbie', 'Ernser', 'marianna.wunsch@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'SixE4wRpgn', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(25, 'Berneice', 'Pagac', 'nyasia.haag@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '6fcZTyQ21N', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(26, 'Eunice', 'Armstrong', 'qbahringer@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'NHll8PObSC', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(27, 'Mark', 'Wintheiser', 'damore.terrill@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'zmhTJZwJSw', '2019-01-17 20:25:11', '2019-01-17 20:25:11'),
(28, 'Jay', 'Davis', 'bernhard.carol@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'zGgOrmOdNr', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(29, 'Tad', 'Breitenberg', 'von.alexandrine@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'rqOm76zV79', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(30, 'Filomena', 'Pollich', 'phuel@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'os6YyFs6vF', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(31, 'Abelardo', 'Towne', 'vschiller@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'hABaF4BW52', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(32, 'Florencio', 'Considine', 'summer54@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'IvuIMHrInX', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(33, 'Hayden', 'Tremblay', 'nia.hammes@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'aubmy40uxp', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(34, 'Narciso', 'Morar', 'fbashirian@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'Qv280yDlu0', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(35, 'Colin', 'Gutmann', 'fmurphy@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'SmG9Emya9B', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(36, 'Lucas', 'Johns', 'lucio.leuschke@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'Kv7czYxK0M', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(37, 'Guillermo', 'Considine', 'marshall.breitenberg@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'c5RXnJOUss', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(38, 'Amie', 'Douglas', 'herta89@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'nzz9nRQFgz', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(39, 'Alisa', 'Stamm', 'dan43@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'YTl3zb8r9z', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(40, 'Etha', 'Will', 'dena.reilly@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'Xat8gttbQV', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(41, 'Eugene', 'Cremin', 'ekerluke@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'sWmkcw7veC', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(42, 'Pedro', 'Kuphal', 'anabelle.rodriguez@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'v1EYU08mwO', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(43, 'Anais', 'Volkman', 'oschumm@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '93RAYfRQb9', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(44, 'Peter', 'Jacobi', 'camryn09@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'A4YP5UYzFT', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(45, 'Jerald', 'Farrell', 'maynard.hill@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '2cePyZZWl6', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(46, 'Antoinette', 'Jakubowski', 'memmerich@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'fStOCs3Azw', '2019-01-17 20:25:12', '2019-01-17 20:25:12'),
(47, 'Celia', 'Lang', 'buddy20@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'jKYtl46qfD', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(48, 'Deion', 'Barrows', 'enos.morar@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'UJ9qd0xrdN', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(49, 'Brown', 'Bradtke', 'anahi97@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'uyinzqrO5k', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(50, 'Oswald', 'Blick', 'verla.botsford@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'cDHDuFmEHW', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(51, 'Jeramie', 'Zboncak', 'reba.bode@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'EsHPRNPqYd', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(52, 'Letitia', 'Herzog', 'rosalinda.orn@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'K91JkZHJzf', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(53, 'Glenda', 'Towne', 'windler.otis@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'ii0R1e95We', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(54, 'Leon', 'Hackett', 'qlynch@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'eza1BcCsov', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(55, 'Casey', 'O\'Hara', 'christy83@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'MIGwABJGxb', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(56, 'Sabryna', 'Buckridge', 'dmoore@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'CPoXRwzRBz', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(57, 'Emerald', 'Will', 'kara39@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'IkiJwEMAu0', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(58, 'Vincent', 'Runolfsson', 'vdietrich@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'TLJk712qoQ', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(59, 'Linnie', 'Russel', 'adell78@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '3UkzNHNUWN', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(60, 'Ralph', 'Russel', 'marvin.wilma@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '44DrdftE5j', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(61, 'Elsa', 'Davis', 'borer.jean@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'gc7bVXJrIY', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(62, 'Loraine', 'Fritsch', 'xullrich@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'R6w8y1qDn2', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(63, 'Rory', 'Crona', 'hill.baylee@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'nwMYMGUbux', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(64, 'Emmie', 'Mosciski', 'kessler.sabina@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'dA2fa9gVUh', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(65, 'Sheldon', 'Feil', 'crona.amira@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'EmCLJYp4Rg', '2019-01-17 20:25:13', '2019-01-17 20:25:13'),
(66, 'Ahmed', 'Glover', 'fritsch.darius@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'rLI7F4p152', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(67, 'Cicero', 'Roob', 'johan58@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'YxKWgYhrh2', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(68, 'Guadalupe', 'Bashirian', 'morissette.santa@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '759iZ4GYoq', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(69, 'Payton', 'Hessel', 'balistreri.madelyn@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'K55qfpLgkv', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(70, 'Wilhelmine', 'Miller', 'janiya.bechtelar@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'cm2pW2Ty0f', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(71, 'Yessenia', 'Conroy', 'wisozk.jennyfer@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'OH6aG2dWOo', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(72, 'Neal', 'Fahey', 'gparisian@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'DtGW4AMD3f', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(73, 'Wilfredo', 'Okuneva', 'gottlieb.jorge@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '0uP7kPSGQr', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(74, 'Mara', 'Effertz', 'ibecker@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'oxjnVeHp3Y', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(75, 'Deontae', 'Jacobson', 'rowe.alta@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'c8JVmigN2S', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(76, 'Hayden', 'Trantow', 'brandi23@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'J4T84SXTsy', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(77, 'Fernando', 'McDermott', 'selmer60@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'uY0nrOPUYK', '2019-01-17 20:25:14', '2019-01-17 20:25:14'),
(78, 'Newton', 'Treutel', 'vicente27@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'c0KCa5mAmk', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(79, 'Brice', 'Upton', 'aracely.lehner@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'vqs40iga5x', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(80, 'Fausto', 'Jakubowski', 'kellie04@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'wU9zrEmOpA', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(81, 'Idella', 'Howe', 'owuckert@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'qgxJzz52aa', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(82, 'Candido', 'Schaefer', 'okris@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'GiXIo669DJ', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(83, 'Zoila', 'Mosciski', 'jacobs.consuelo@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'egxr2nGpI0', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(84, 'Laurine', 'Bradtke', 'king76@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'cfCBwMb9pZ', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(85, 'Elsie', 'Kozey', 'vmosciski@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'P9jUrtq1W2', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(86, 'Charlene', 'Heidenreich', 'oprice@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'iCU2rKhtCS', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(87, 'Rowena', 'Wuckert', 'dayton.hane@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'RnTW896GQf', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(88, 'Torey', 'Ruecker', 'abigayle.orn@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'JYdyWTn31T', '2019-01-17 20:25:15', '2019-01-17 20:25:15'),
(89, 'Corine', 'Dare', 'eeffertz@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'AnMNX5clHB', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(90, 'Abigail', 'Schumm', 'hershel.towne@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'ezx7yavFfq', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(91, 'Liam', 'Schowalter', 'crona.hobart@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '4NalZhUrXF', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(92, 'Anastasia', 'Wilkinson', 'ressie.lubowitz@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'Jc95mHW9wd', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(93, 'Heloise', 'Upton', 'kflatley@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'xOY0aVOq9P', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(94, 'Kailyn', 'Leffler', 'andreanne95@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'EgWCq1TE7Z', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(95, 'Alexane', 'Schamberger', 'leannon.melyssa@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'v9UYIdsIIh', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(96, 'Lincoln', 'Johnston', 'pwilliamson@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'ChCLOyx4Dd', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(97, 'Armando', 'Stark', 'koepp.neha@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'Jgjf2HBZWj', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(98, 'Maude', 'Homenick', 'keegan76@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'qtMJFpXIL0', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(99, 'Assunta', 'Pollich', 'idibbert@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'dSIVa0035M', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(100, 'Donald', 'Beer', 'tpaucek@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'jkQFBSThab', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(101, 'Sigrid', 'Harris', 'ihaag@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '9R9Py2KfrP', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(102, 'Euna', 'Gutkowski', 'abbigail.oberbrunner@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'e2WjtDBBp6', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(103, 'Myrtie', 'Senger', 'feil.elroy@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'xYtfOuuZ2v', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(104, 'Orland', 'Hahn', 'bode.herbert@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'pSkxcN5mes', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(105, 'Leonor', 'Rau', 'doyle.schinner@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '6jR0vQxIQh', '2019-01-17 20:25:16', '2019-01-17 20:25:16'),
(106, 'Kayley', 'Fahey', 'macie77@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'ovM7wJax6s', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(107, 'Johnnie', 'Nicolas', 'kellie.leannon@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'aIdOANq1cE', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(108, 'Claudine', 'Moore', 'johnson.lavina@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'JXvsMDuinx', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(109, 'Aracely', 'Larkin', 'reece09@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'MVUyCaf1m3', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(110, 'Bret', 'Russel', 'meredith93@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '11l10DQknu', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(111, 'Moriah', 'Wisozk', 'kaycee.dickens@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'VicJ8YgTMJ', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(112, 'Bret', 'Botsford', 'nannie.runolfsson@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'Xe5l8Grybu', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(113, 'Fleta', 'Barrows', 'ratke.jermaine@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'ZTNhyOVQTl', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(114, 'Frieda', 'Boyle', 'lpaucek@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'voKpC0Imr4', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(115, 'Madge', 'Schmeler', 'ewunsch@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'Bjnk1jumqY', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(116, 'Rodger', 'Harber', 'jeffrey.oreilly@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'MsNtL8r7KF', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(117, 'Marco', 'Hirthe', 'emely.purdy@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'OgdN7BXNcl', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(118, 'Larissa', 'Predovic', 'lilly.kiehn@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '6WYjNpw0pY', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(119, 'Daniella', 'Wintheiser', 'dan.brown@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'HoJj7CUfT4', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(120, 'Colton', 'Reichert', 'qgrimes@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'TIy3fiAwOY', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(121, 'Dwight', 'Kulas', 'lesley.predovic@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '8cJnu96fXV', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(122, 'Mollie', 'Conn', 'asia65@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'P7BkshQOM6', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(123, 'Tyson', 'Gulgowski', 'alex79@example.com', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'Wp06IwsJRd', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(124, 'Lucius', 'Mosciski', 'rutherford.granville@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'PB8VyUAlwR', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(125, 'Anastasia', 'Hane', 'yesenia.lind@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'PhthZBIsS2', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(126, 'Garnett', 'Ryan', 'dare.osbaldo@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'jUTjgyOEdi', '2019-01-17 20:25:17', '2019-01-17 20:25:17'),
(127, 'Alverta', 'Jenkins', 'xblanda@example.org', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'baYjA86z6z', '2019-01-17 20:25:18', '2019-01-17 20:25:18'),
(128, 'Denis', 'Emard', 'anika.botsford@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '5b6L4GCDri', '2019-01-17 20:25:18', '2019-01-17 20:25:18'),
(129, 'Hans', 'Cruickshank', 'batz.wellington@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '0PfxhDptRw', '2019-01-17 20:25:18', '2019-01-17 20:25:18'),
(130, 'Santos', 'Friesen', 'mae.brown@example.net', '2019-01-17 21:25:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, 'rXHcrx9aql', '2019-01-17 20:25:18', '2019-01-17 20:25:18');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `verify_users`
--

CREATE TABLE `verify_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `countdowns`
--
ALTER TABLE `countdowns`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexen voor tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexen voor tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexen voor tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tables_users`
--
ALTER TABLE `tables_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `temp_users`
--
ALTER TABLE `temp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexen voor tabel `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `countdowns`
--
ALTER TABLE `countdowns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tables_users`
--
ALTER TABLE `tables_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `temp_users`
--
ALTER TABLE `temp_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT voor een tabel `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
