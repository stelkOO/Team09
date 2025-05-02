-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Feb 28. 15:50
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
-- Tábla szerkezet ehhez a táblához `buy_history`
--

CREATE TABLE `buy_history` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `buy_history`
--

INSERT INTO `buy_history` (`id`, `file_id`, `provider_id`, `buyer_id`, `credits`, `date`) VALUES
(1, 8, 1, 1, 30, '2025-02-20');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `upload_date` datetime NOT NULL,
  `requestid` int(11) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `files`
--

INSERT INTO `files` (`id`, `userid`, `filename`, `upload_date`, `requestid`, `review`, `token`) VALUES
(1, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-02-19 16:44:11', 0, '', 0),
(2, 1, 'file_67b5ff5e44c3b0.76656285.rar', '2025-02-19 16:57:18', 1, '', 0),
(3, 1, 'file_67b5ff991ca099.92670310.rar', '2025-02-19 16:58:17', 1, '', 0),
(4, 1, 'file_67b6f6c2c657d4.25789641.rar', '2025-02-20 10:32:50', 1, '', 0),
(5, 1, 'file_67b704a6b21324.58802728.zip', '2025-02-20 11:32:06', 2, 'Ai álltal generált értékelés', 0),
(6, 1, 'file_67b706a49de8e5.95848479.zip', '2025-02-20 11:40:36', 5, 'Ai álltal generált értékelés', 0),
(7, 1, 'file_67b71600a15325.41048789.zip', '2025-02-20 12:46:08', 1, 'Ai álltal generált értékelés', 0),
(8, 1, 'file_67b716d78e94d8.43995642.zip', '2025-02-20 12:49:43', 1, 'Ai álltal generált értékelés', 30);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profile_codes`
--

CREATE TABLE `profile_codes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `code` varchar(1000) NOT NULL,
  `used` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `profile_codes`
--

INSERT INTO `profile_codes` (`id`, `userid`, `code`, `used`) VALUES
(1, 1, 'zgexqwv9', 'not_used');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `ratings`
--

INSERT INTO `ratings` (`id`, `points`, `description`, `from_id`, `to_id`) VALUES
(1, 3, 'leiras', 1, 1),
(2, 3, 'Egy java kodot kerek', 1, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `token` int(11) NOT NULL,
  `language` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `request`
--

INSERT INTO `request` (`id`, `userid`, `name`, `description`, `token`, `language`) VALUES
(1, 1, 'Java kód', 'Egy java kodot kerek', 30, ''),
(2, 1, 'példa', 'leiras', 0, ''),
(3, 1, 'példa', 'leiras', 0, ''),
(4, 1, 'példa', 'leiras', 0, ''),
(5, 1, 'példa', 'leiras', 0, ''),
(6, 1, 'példa', 'leiras', 0, ''),
(7, 1, 'példa', 'leiras', 0, ''),
(8, 1, 'példa', 'leiras', 0, ''),
(9, 1, 'példa', 'leiras', 0, ''),
(10, 1, 'példa', 'leiras', 0, ''),
(11, 1, 'példa', 'leiras', 0, ''),
(12, 1, 'példa', 'leiras', 0, ''),
(13, 1, 'példa', 'leiras', 0, ''),
(14, 1, 'Egy java kodot', 'fdasfads', 6, ''),
(15, 1, 'Egy java kodot', 'fdasfas', 2, ''),
(16, 2, 'Egy java kodot', 'fdasfa', 3, ''),
(17, 1, 'kód', 'Valami', 20, 'php'),
(18, 1, 'kód', 'Valami', 20, 'python');

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
(1, 'user_1', '$2y$10$fUBCjVgaGOYOpLjIfk7QV.3aVJeugdnc2.gV.sppRlw1/uPA7EOTO', '0', 'stelkooli@gmail.com', 40);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `buy_history`
--
ALTER TABLE `buy_history`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `profile_codes`
--
ALTER TABLE `profile_codes`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `ratings`
--
ALTER TABLE `ratings`
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
-- AUTO_INCREMENT a táblához `buy_history`
--
ALTER TABLE `buy_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `profile_codes`
--
ALTER TABLE `profile_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
