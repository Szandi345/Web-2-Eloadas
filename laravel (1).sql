-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Nov 07. 16:00
-- Kiszolgáló verziója: 10.11.16-MariaDB
-- PHP verzió: 8.3.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `laravel`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `kategoriaid` bigint(20) UNSIGNED NOT NULL,
  `nev` varchar(255) NOT NULL,
  `ar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `kategoria`
--

INSERT INTO `kategoria` (`kategoriaid`, `nev`, `ar`, `created_at`, `updated_at`) VALUES
(1, 'apród', '850', NULL, NULL),
(2, 'főnemes', '950', NULL, NULL),
(3, 'király', '1250', NULL, NULL),
(4, 'lovag', '1150', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2021_02_19_093547_add_roles_to_users_table', 1),
(5, '2026_10_25_170019_create_kategoria_table', 1),
(6, '2026_10_25_170450_create_pizza_table', 1),
(7, '2026_10_25_171301_create_rendeles_table', 1),
(8, '2026_10_30_222704_create_uzenets_table', 1),
(9, '2026_11_02_165428_add_user_id_to_rendeles_table', 1),
(10, '2026_11_06_144624_add_egysegar_to_rendeles_table', 1),
(11, '2026_11_06_184522_add_allapot_to_rendeles_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pizza`
--

CREATE TABLE `pizza` (
  `pizzaid` bigint(20) UNSIGNED NOT NULL,
  `nev` varchar(255) NOT NULL,
  `kategoriaid` bigint(20) UNSIGNED NOT NULL,
  `vegetarianus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `pizza`
--

INSERT INTO `pizza` (`pizzaid`, `nev`, `kategoriaid`, `vegetarianus`, `created_at`, `updated_at`) VALUES
(1, 'Áfonyás', 3, 0, NULL, NULL),
(2, 'Babos', 4, 0, NULL, NULL),
(3, 'Barbecue chicken', 4, 0, NULL, NULL),
(4, 'Betyáros', 3, 0, NULL, NULL),
(5, 'Caribi', 1, 0, NULL, NULL),
(6, 'Country', 3, 0, NULL, NULL),
(7, 'Csabesz', 3, 0, NULL, NULL),
(8, 'Csupa sajt', 4, 1, NULL, NULL),
(9, 'Erdő kapitánya', 1, 0, NULL, NULL),
(10, 'Erős János', 4, 0, NULL, NULL),
(11, 'Excellent', 3, 0, NULL, NULL),
(12, 'Főnök kedvence', 4, 0, NULL, NULL),
(13, 'Francia', 2, 0, NULL, NULL),
(14, 'Frankfurti', 3, 0, NULL, NULL),
(15, 'Füstös', 4, 0, NULL, NULL),
(16, 'Gino', 3, 0, NULL, NULL),
(17, 'Gombás', 1, 1, NULL, NULL),
(18, 'Góré', 4, 0, NULL, NULL),
(19, 'Görög', 3, 0, NULL, NULL),
(20, 'Gyros pizza', 3, 0, NULL, NULL),
(21, 'HamAndEggs', 4, 0, NULL, NULL),
(22, 'Hamm', 4, 0, NULL, NULL),
(23, 'Hawaii', 2, 0, NULL, NULL),
(24, 'Hellas', 3, 0, NULL, NULL),
(25, 'Hercegnő', 3, 0, NULL, NULL),
(26, 'Ilike', 4, 0, NULL, NULL),
(27, 'Ínyenc', 4, 0, NULL, NULL),
(28, 'Jázmin álma', 4, 0, NULL, NULL),
(29, 'Jobbágy', 3, 0, NULL, NULL),
(30, 'Juhtúrós', 4, 0, NULL, NULL),
(31, 'Kagylós', 3, 0, NULL, NULL),
(32, 'Kétszínű', 4, 0, NULL, NULL),
(33, 'Kiadós', 3, 0, NULL, NULL),
(34, 'Király pizza', 3, 0, NULL, NULL),
(35, 'Kívánság', 4, 1, NULL, NULL),
(36, 'Kolbászos', 1, 0, NULL, NULL),
(37, 'Lagúna', 3, 1, NULL, NULL),
(38, 'Lecsó', 3, 0, NULL, NULL),
(39, 'Maffiózó', 4, 0, NULL, NULL),
(40, 'Magvas', 3, 1, NULL, NULL),
(41, 'Magyaros', 4, 0, NULL, NULL),
(42, 'Máj Fair Lady', 3, 0, NULL, NULL),
(43, 'Mamma fia', 3, 0, NULL, NULL),
(44, 'Mexikói', 2, 0, NULL, NULL),
(45, 'Mixi', 2, 1, NULL, NULL),
(46, 'Nikó', 3, 0, NULL, NULL),
(47, 'Nordic', 3, 0, NULL, NULL),
(48, 'Nyuszó-Muszó', 3, 0, NULL, NULL),
(49, 'Pacalos', 4, 0, NULL, NULL),
(50, 'Pástétomos', 3, 0, NULL, NULL),
(51, 'Pásztor', 4, 0, NULL, NULL),
(52, 'Pipis', 4, 0, NULL, NULL),
(53, 'Popey', 3, 0, NULL, NULL),
(54, 'Quattro', 3, 0, NULL, NULL),
(55, 'Ráki', 3, 0, NULL, NULL),
(56, 'Rettenetes magyar', 4, 0, NULL, NULL),
(57, 'Röfi', 3, 0, NULL, NULL),
(58, 'Sajtos', 1, 1, NULL, NULL),
(59, 'So-ku', 1, 0, NULL, NULL),
(60, 'Son-go-ku', 2, 1, NULL, NULL),
(61, 'Sonkás', 1, 0, NULL, NULL),
(62, 'Spanyol', 3, 0, NULL, NULL),
(63, 'Spencer', 2, 0, NULL, NULL),
(64, 'Szalámis', 1, 0, NULL, NULL),
(65, 'Szardíniás', 4, 0, NULL, NULL),
(66, 'Szerzetes', 3, 0, NULL, NULL),
(67, 'Szőke kapitány', 3, 0, NULL, NULL),
(68, 'Tenger gyümölcsei', 3, 0, NULL, NULL),
(69, 'Tonhalas', 4, 0, NULL, NULL),
(70, 'Törperős', 4, 0, NULL, NULL),
(71, 'Tündi kedvence', 3, 0, NULL, NULL),
(72, 'Tüzes halál', 3, 0, NULL, NULL),
(73, 'Vega', 4, 1, NULL, NULL),
(74, 'Zöldike', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE `rendeles` (
  `rendelesid` bigint(20) UNSIGNED NOT NULL,
  `pizzaid` bigint(20) UNSIGNED NOT NULL,
  `darab` int(11) NOT NULL,
  `felvetel` datetime DEFAULT NULL,
  `kiszallitas` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `egysegar` int(10) UNSIGNED DEFAULT NULL,
  `allapot` varchar(50) NOT NULL DEFAULT 'Új rendelés'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `rendeles`
--

INSERT INTO `rendeles` (`rendelesid`, `pizzaid`, `darab`, `felvetel`, `kiszallitas`, `created_at`, `updated_at`, `user_id`, `egysegar`, `allapot`) VALUES
(1, 19, 1, '2026-11-07 13:35:20', NULL, '2026-11-07 12:35:20', '2026-11-07 12:35:20', 1, 1250, 'Új rendelés');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User1', 'aaa@aaa.hu', 2, NULL, '$2y$12$IOx86jp8keSHy0TG6OsqDeo2hE1V/N0zaQZJA8nWohYxG0YTAOA8.', NULL, NULL, NULL),
(2, 'admin', 'bbb@bbb', 1, NULL, '$2y$12$aTUv2Tx0E/xTuCEUlwg3Vud/RjiQyUNt9PX6EuudsMiVbx/sJPWg2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenets`
--

CREATE TABLE `uzenets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nev` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `targy` varchar(255) NOT NULL,
  `uzenet` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- A tábla indexei `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- A tábla indexei `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`kategoriaid`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- A tábla indexei `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizzaid`),
  ADD KEY `pizza_kategoriaid_foreign` (`kategoriaid`);

--
-- A tábla indexei `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`rendelesid`),
  ADD KEY `rendeles_pizzaid_foreign` (`pizzaid`),
  ADD KEY `rendeles_user_id_foreign` (`user_id`);

--
-- A tábla indexei `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A tábla indexei `uzenets`
--
ALTER TABLE `uzenets`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `kategoriaid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizzaid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT a táblához `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `rendelesid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `uzenets`
--
ALTER TABLE `uzenets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `pizza`
--
ALTER TABLE `pizza`
  ADD CONSTRAINT `pizza_kategoriaid_foreign` FOREIGN KEY (`kategoriaid`) REFERENCES `kategoria` (`kategoriaid`);

--
-- Megkötések a táblához `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `rendeles_pizzaid_foreign` FOREIGN KEY (`pizzaid`) REFERENCES `pizza` (`pizzaid`),
  ADD CONSTRAINT `rendeles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
