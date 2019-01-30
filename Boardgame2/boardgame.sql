-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 jan 2019 om 23:07
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
-- Database: `boardgame`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `battles`
--

CREATE TABLE `battles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_id` int(11) NOT NULL,
  `games_id` int(11) NOT NULL,
  `player1` int(11) DEFAULT NULL,
  `player2` int(11) DEFAULT NULL,
  `player3` int(11) DEFAULT NULL,
  `player4` int(11) DEFAULT NULL,
  `player5` int(11) DEFAULT NULL,
  `player6` int(11) DEFAULT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL,
  `score3` int(11) DEFAULT NULL,
  `score4` int(11) DEFAULT NULL,
  `score5` int(11) DEFAULT NULL,
  `score6` int(11) DEFAULT NULL,
  `won_by` int(11) DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `played_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `battles`
--

INSERT INTO `battles` (`id`, `name`, `game_id`, `games_id`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `score1`, `score2`, `score3`, `score4`, `score5`, `score6`, `won_by`, `img`, `played_date`, `created_at`, `updated_at`) VALUES
(1, 'Fittest on earth', 1, 1, 2, 3, 4, 5, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png', '2019-01-14 22:06:46', NULL, NULL),
(2, 'Become stronger and fight', 1, 1, 1, 2, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png', '2019-01-14 22:06:46', NULL, NULL),
(3, 'Terminators vs Orcs', 2, 2, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5', '2019-01-14 22:06:46', NULL, NULL),
(4, 'Survival of the fittest', 2, 2, 2, 1, 5, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5', '2019-01-14 22:06:46', NULL, NULL),
(5, 'You have to be fit to survive', 3, 3, 3, 2, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'https://img00.deviantart.net/0156/i/2013/095/e/9/lord_of_the_rings_icon_by_slamiticon-d60ici4.png', '2019-01-14 22:06:46', NULL, NULL),
(6, 'Fittest on earth', 1, 1, 2, 3, 4, 5, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png', '2019-01-14 22:06:46', NULL, NULL),
(7, 'Become stronger and fight', 1, 1, 1, 2, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png', '2019-01-14 22:06:46', NULL, NULL),
(8, 'Terminators vs Orcs', 2, 2, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5', '2019-01-14 22:06:46', NULL, NULL),
(9, 'Survival of the fittest', 2, 2, 2, 1, 5, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5', '2019-01-14 22:06:46', NULL, NULL),
(10, 'You have to be fit to survive', 3, 3, 3, 2, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'https://img00.deviantart.net/0156/i/2013/095/e/9/lord_of_the_rings_icon_by_slamiticon-d60ici4.png', '2019-01-14 22:06:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `battle_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` year(4) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `winner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_players` int(10) UNSIGNED NOT NULL,
  `max_players` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `games`
--

INSERT INTO `games` (`id`, `name`, `image`, `battle_img`, `img`, `release_date`, `description`, `winner`, `min_players`, `max_players`, `created_at`, `updated_at`) VALUES
(1, 'Game of Thrones', 'https://www.lautapelit.fi/images/tuotekuvat/kuva400/lautapelit/game-of-thrones-2nd-edition.jpg', 'http://abovethelaw.com/wp-content/uploads/2015/04/game-of-thrones.jpg', 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png', 2003, 'A Game of Thrones is an epic board game in which it will take more than military might to win.', 'Pieter Jansma', 3, 6, NULL, NULL),
(2, 'World of Warcraft', 'http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/DhwAAOxyOMdS-tAQ/$_3.JPG?set_id=2', 'https://blznav.akamaized.net/img/games/cards/card-world-of-warcraft-54576e6364584e35.jpg', 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5', 2005, 'World of Warcraft: The Board Game is an adventure board game based on the popular World of Warcraft MMORPG.', 'Jantje Smits', 2, 6, NULL, NULL),
(3, 'Lord of the Rings', 'https://images-na.ssl-images-amazon.com/images/I/914GYKLDR-L._SX466_.jpg', 'https://cdn.vox-cdn.com/thumbor/nRu2ccLSeYke8-EGrIi1ohMDLdI=/0x0:825x464/1200x800/filters:focal(347x166:479x298)/cdn.vox-cdn.com/uploads/chorus_image/image/57584235/DOiAi2WUEAE3A1Y.0.jpg', 'https://img00.deviantart.net/0156/i/2013/095/e/9/lord_of_the_rings_icon_by_slamiticon-d60ici4.png', 2000, 'Lord of the Rings is a board game based on the high fantasy novel The Lord of the Rings by J. R. R. Tolkien.', 'Leon Hendricks', 2, 5, NULL, NULL);

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
(3, '2019_01_12_191849_create_battles_table', 1),
(4, '2019_01_13_124354_create_games_table', 1),
(5, '2019_01_13_141435_create_temp_users_table', 1);

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
-- Tabelstructuur voor tabel `temp_users`
--

CREATE TABLE `temp_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akash Soedamah', 'Akash.soedamah@gmail.com', '2019-01-14 21:06:47', '$2y$10$SDY37vq4iJeRYTonYWzaqO0q9yvHFZYKOdVKN2KCDNByxxNb2sjIK', 'd7AKjBVY39', NULL, NULL),
(2, 'Samara Satterfield', 'alberta13@example.net', '2019-01-14 21:06:47', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '8iOTjQDUcZ', '2019-01-14 21:06:47', '2019-01-14 21:06:47'),
(3, 'Nedra Jenkins', 'gusikowski.treva@example.net', '2019-01-14 21:06:47', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'L79RdwrMap', '2019-01-14 21:06:47', '2019-01-14 21:06:47'),
(4, 'Davonte Legros', 'ttowne@example.com', '2019-01-14 21:06:47', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ILJcKWnqKQ', '2019-01-14 21:06:47', '2019-01-14 21:06:47');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `battles`
--
ALTER TABLE `battles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `temp_users`
--
ALTER TABLE `temp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `battles`
--
ALTER TABLE `battles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `temp_users`
--
ALTER TABLE `temp_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
