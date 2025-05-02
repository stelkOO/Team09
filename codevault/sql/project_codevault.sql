-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Feb 19. 17:31
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `project_codevault`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `upload_date` datetime NOT NULL,
  `requestid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `files`
--

INSERT INTO `files` (`id`, `userid`, `filename`, `upload_date`, `requestid`) VALUES
(1, 0, 'file_67b5fc4bf06391.52966725.rar', '2025-02-19 16:44:11', 0),
(2, 1, 'file_67b5ff5e44c3b0.76656285.rar', '2025-02-19 16:57:18', 1),
(3, 1, 'file_67b5ff991ca099.92670310.rar', '2025-02-19 16:58:17', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `request`
--

INSERT INTO `request` (`id`, `userid`, `name`, `description`) VALUES
(1, 1, 'Java kód', 'Egy java kodot kerek'),
(2, 1, 'példa', 'leiras'),
(3, 1, 'példa', 'leiras'),
(4, 1, 'példa', 'leiras'),
(5, 1, 'példa', 'leiras'),
(6, 1, 'példa', 'leiras'),
(7, 1, 'példa', 'leiras'),
(8, 1, 'példa', 'leiras'),
(9, 1, 'példa', 'leiras'),
(10, 1, 'példa', 'leiras'),
(11, 1, 'példa', 'leiras'),
(12, 1, 'példa', 'leiras'),
(13, 1, 'példa', 'leiras');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `email`, `token`) VALUES
(1, 'user_1', '$2y$10$fUBCjVgaGOYOpLjIfk7QV.3aVJeugdnc2.gV.sppRlw1/uPA7EOTO', '0', '', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
