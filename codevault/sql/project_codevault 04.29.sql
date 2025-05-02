-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Ápr 29. 14:24
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 7.4.29

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
-- Tábla szerkezet ehhez a táblához `blocked`
--

CREATE TABLE `blocked` (
  `id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `buy_history`
--

INSERT INTO `buy_history` (`id`, `file_id`, `provider_id`, `buyer_id`, `credits`, `date`) VALUES
(1, 8, 1, 1, 30, '2025-02-20'),
(4, 7, 1, 3, 0, '2025-04-15'),
(5, 7, 1, 3, 0, '2025-04-15'),
(6, 7, 1, 3, 0, '2025-04-15'),
(7, 7, 1, 3, 0, '2025-04-15'),
(8, 7, 1, 3, 0, '2025-04-15'),
(9, 7, 1, 3, 0, '2025-04-15'),
(10, 7, 1, 3, 0, '2025-04-15'),
(11, 7, 1, 3, 0, '2025-04-15'),
(12, 7, 1, 3, 0, '2025-04-15'),
(13, 9, 1, 3, 0, '2025-04-27'),
(14, 8, 1, 3, 30, '2025-04-28'),
(15, 10, 3, 1, 3, '2025-04-28'),
(16, 21, 1, 1, 9, '2025-04-28'),
(17, 21, 1, 1, 9, '2025-04-28'),
(18, 21, 1, 1, 9, '2025-04-28');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `chats`
--

INSERT INTO `chats` (`id`, `from_user`, `to_user`) VALUES
(1, 3, 1);

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
  `stars` varchar(1000) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `files`
--

INSERT INTO `files` (`id`, `userid`, `filename`, `upload_date`, `requestid`, `review`, `stars`, `token`) VALUES
(1, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-02-19 16:44:11', 1, 'sikeres', '4', 3),
(2, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-02-19 16:57:18', 1, 'sikeres', '5', 4),
(3, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-02-19 16:58:17', 1, 'sikeres', '4', 3),
(4, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-02-20 10:32:50', 1, '2', '4', 4),
(5, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-02-20 11:32:06', 2, '2', '4', 3),
(6, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-02-20 11:40:36', 5, 'fdasfsd', '4', 4),
(7, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-02-20 12:46:08', 1, '4 csillagos értékelés', '4', 5),
(8, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-02-20 12:49:43', 1, 'siker', '4', 7),
(9, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-03-17 13:35:56', 6, 'siker', '4', 10),
(10, 3, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:40:28', 107, 'Tetszik a fájl', '4', 3),
(11, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 90, 'rossz', '3', 9),
(12, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 41, 'nagyon jo', '1', 8),
(13, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 13, 'rossz', '4', 1),
(14, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 92, 'nagyon jo', '1', 10),
(15, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 63, 'kozepes', '3', 9),
(16, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 33, 'kozepes', '5', 6),
(17, 3, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 44, 'kozepes', '3', 8),
(18, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 46, 'jo', '2', 10),
(19, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 50, 'nagyon jo', '1', 8),
(20, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 67, 'rossz', '5', 2),
(21, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 105, 'kozepes', '1', 9),
(22, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 3, 'nagyon rossz', '4', 9),
(23, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 75, 'jo', '2', 9),
(24, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 40, 'kozepes', '2', 2),
(25, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 16, 'jo', '3', 3),
(26, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 103, 'rossz', '1', 2),
(27, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 7, 'nagyon rossz', '1', 6),
(28, 3, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 66, 'jo', '2', 1),
(29, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 97, 'jo', '4', 10),
(30, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 78, 'kozepes', '3', 7),
(31, 3, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 65, 'kozepes', '5', 6),
(32, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 43, 'jo', '2', 2),
(33, 3, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 37, 'rossz', '4', 9),
(34, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 64, 'jo', '5', 9),
(35, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 83, 'kozepes', '2', 10),
(36, 3, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 59, 'jo', '3', 3),
(37, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 91, 'nagyon jo', '5', 8),
(38, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 82, 'rossz', '2', 9),
(39, 3, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 60, 'nagyon rossz', '5', 10),
(40, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 10:59:41', 58, 'nagyon jo', '4', 7),
(41, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:45:00', 12, 'nagyon jo', '5', 1),
(42, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:45:00', 87, 'jo', '4', 4),
(43, 3, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:45:00', 23, 'kozepes', '3', 4),
(44, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:45:00', 45, 'rossz', '2', 5),
(45, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:45:00', 3, 'nagyon rossz', '1', 6),
(46, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:45:00', 65, 'nagyon jo', '5', 4),
(47, 3, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:45:00', 77, 'jo', '4', 6),
(48, 1, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:45:00', 34, 'kozepes', '3', 4),
(49, 2, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:45:00', 58, 'rossz', '2', 2),
(50, 3, 'file_67b5fc4bf06391.52966725.rar', '2025-04-28 12:45:00', 90, 'nagyon rossz', '1', 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `chat_id`, `message`, `created_at`) VALUES
(1, 1, 2, 1, 'valami', '2025-04-29 13:34:00'),
(2, 2, 1, 1, 'valami', '2025-04-29 13:34:00'),
(3, 2, 1, 1, 'valami', '2025-04-29 13:34:00'),
(4, 1, 2, 1, 'valami', '2025-04-29 13:34:00'),
(5, 1, 2, 1, 'valami 3', '2025-04-29 13:34:00'),
(6, 1, 2, 1, 'valami 5', '2025-04-29 13:34:00'),
(7, 1, 2, 1, 'vaéaléjadf', '2025-04-29 13:34:00'),
(8, 1, 2, 1, 'uzenet ', '2025-04-29 13:34:00'),
(9, 1, 2, 1, 'fdasfsfa', '2025-04-29 13:34:00'),
(10, 1, 2, 1, 'fdasfafa', '2025-04-29 13:34:00'),
(11, 1, 2, 1, 'fdasfasf', '2025-04-29 13:34:00'),
(12, 3, 1, 1, '$_COOKIE[userid]', '2025-04-29 13:34:00'),
(13, 3, 1, 1, 'szia', '2025-04-29 13:34:00'),
(14, 3, 1, 1, 'szia', '2025-04-29 13:34:00'),
(15, 3, 1, 1, 'echo get_user();', '2025-04-29 13:34:00'),
(16, 3, 1, 1, 'fsda', '2025-04-29 13:34:00'),
(17, 3, 1, 1, 'valami', '2025-04-29 13:34:00'),
(18, 1, 3, 3, 'szius mius', '2025-04-29 13:34:00'),
(19, 1, 3, 3, 'Na mizu mi a helyzet?', '2025-04-29 13:34:00'),
(20, 1, 3, 3, 'sdsadasda', '2025-04-29 13:34:00'),
(21, 1, 3, 3, 'adgas', '2025-04-29 13:34:00'),
(22, 1, 3, 3, 'dsada', '2025-04-29 13:34:00'),
(23, 1, 3, 3, 'dasdasdadad', '2025-04-29 13:34:00'),
(24, 1, 3, 3, 'd', '2025-04-29 13:34:00'),
(25, 1, 3, 3, 'aa', '2025-04-29 13:34:00'),
(26, 3, 1, 1, 'szia', '2025-04-29 13:34:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `notifications`
--

INSERT INTO `notifications` (`id`, `from_id`, `to_id`, `content`, `status`, `link`) VALUES
(1, 1, 3, 'Feltöltött fájlod sikeresen megvásárolták!', 1, ''),
(2, 3, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://loca'),
(3, 3, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://loca'),
(4, 3, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://loca'),
(5, 3, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://loca'),
(6, 3, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://loca'),
(7, 3, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://loca'),
(8, 3, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://loca'),
(9, 3, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://localhost/codevault/file.php?id=7'),
(10, 3, 3, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://localhost/codevault/file.php?id=7'),
(11, 3, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://localhost/codevault/file.php?id=9'),
(12, 3, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://localhost/codevault/file.php?id=8'),
(13, 1, 3, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://localhost/codevault/file.php?id=10'),
(14, 1, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://localhost/codevault/file.php?id=21'),
(15, 1, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://localhost/codevault/file.php?id=21'),
(16, 1, 1, 'Feltöltött fájlod sikeresen megvásárolták!', 1, 'http://localhost/codevault/file.php?id=21');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profile_codes`
--

CREATE TABLE `profile_codes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `code` varchar(1000) NOT NULL,
  `used` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `profile_codes`
--

INSERT INTO `profile_codes` (`id`, `userid`, `code`, `used`) VALUES
(1, 1, 'zgexqwv9', 'not_used'),
(2, 1, 'f3f9tpas', 'not_used'),
(3, 2, 'i7csjkjt', 'not_used'),
(4, 3, '5qtpbglf', 'not_used'),
(5, 4, 'dvdf4ywh', 'not_used'),
(6, 4, '4y8dptqk', 'not_used');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profile_requests`
--

CREATE TABLE `profile_requests` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `profile_requests`
--

INSERT INTO `profile_requests` (`id`, `username`, `password`, `type`, `email`, `token`) VALUES
(3, 'ste', '$2y$10$Ixmb68rRWwBEvlBvn4zbmu9WCaSYvgJ2bSzM9R1V.feF.fucTHgDe', 0, 'stelkooli@gmail.com', 0),
(4, 'user_2', '$2y$10$NxaCCpg25/w4wsNRLDtz5u5Z9hoqav/s3zp5fzU7D2cNRx6sKn9Wu', 0, 'kriszkzbiro@gmail.com', 0),
(5, 'user_2', '$2y$10$qYbI/3jmREY4VbzuqpRY4.Ss9E2l/x4G/e8r3.wweOa8mrRwo4CWO', 0, 'kriszkzbiro@gmail.com', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `ratings`
--

INSERT INTO `ratings` (`id`, `points`, `description`, `from_id`, `to_id`) VALUES
(1, 3, 'leiras', 1, 1),
(2, 3, 'Egy java kodot kerek', 1, 1),
(3, 4, 'rossz', 1, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `report_text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `reports`
--

INSERT INTO `reports` (`id`, `email`, `report_text`) VALUES
(1, 'stelkooli@gmail.com', ''),
(2, 'stelkooli@gmail.com', ''),
(3, 'stelkooli@gmail.com', 'bug');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `request`
--

INSERT INTO `request` (`id`, `userid`, `name`, `description`, `token`, `language`) VALUES
(1, 1, 'példa', 'leiras', 0, ''),
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
(18, 1, 'PHP űrlap feldolgozás', 'Hogyan dolgozzam fel a POST kéréseket biztonságosan?', 3, 'php'),
(19, 2, 'JavaScript időzítő', 'Szeretnék egy visszaszámláló órát készíteni.', 5, 'javascript'),
(20, 1, 'Python fájlkezelés', 'Hogyan nyissak meg és írjak bele fájlba Pythonban?', 4, 'python'),
(21, 2, 'C# lista rendezése', 'Hogyan rendezzem növekvő sorrendbe a List-emet?', 2, 'csharp'),
(22, 1, 'SQL több táblás lekérdezés', 'JOIN használata több tábla összekapcsolásához?', 7, 'sql'),
(23, 2, 'HTML táblázat dizájn', 'Hogyan lehet szépen formázni egy HTML táblázatot?', 1, 'html'),
(24, 1, 'CSS grid használata', 'Hogyan működik a CSS grid rendszer?', 6, 'css'),
(25, 2, 'PHP session kezelés', 'Miként tárolhatok adatokat felhasználónként?', 8, 'php'),
(26, 1, 'Java fájl beolvasás', 'Hogyan olvassak be sorokat fájlból Java-ban?', 9, 'java'),
(27, 2, 'Python pandas alapok', 'Hogyan hozzak létre DataFrame-et?', 4, 'python'),
(28, 1, 'JS fetch használata', 'Fetch API-val hogyan küldök adatot POST-tal?', 2, 'javascript'),
(29, 2, 'SQL LIKE operátor', 'Hogyan szűrjek részleges egyezésre?', 1, 'sql'),
(30, 1, 'CSS animáció létrehozása', 'Szeretnék egy hover animációt készíteni.', 3, 'css'),
(31, 2, 'C# fájl írás', 'Hogyan írjak szöveget fájlba?', 4, 'csharp'),
(32, 1, 'Python tkinter gomb', 'Hogyan adjak eseményt egy gombhoz tkinter-ben?', 5, 'python'),
(33, 2, 'JavaScript eseménykezelés', 'Kattintás esemény figyelése és kezelése.', 6, 'javascript'),
(34, 1, 'PHP email küldés', 'Hogyan küldjek emailt PHP-ból?', 7, 'php'),
(35, 2, 'Java tömb rendezés', 'Hogyan rendezzek egy tömböt Java-ban?', 2, 'java'),
(36, 1, 'SQL adat törlése', 'DELETE lekérdezés pontos szintaxisa?', 1, 'sql'),
(37, 2, 'CSS responsive design', 'Hogyan állítsak be mobilnézetet?', 5, 'css'),
(38, 1, 'Python lista szűrése', 'Szűrés feltétel alapján egy listában.', 6, 'python'),
(39, 2, 'JavaScript localStorage', 'Hogyan tárolhatok adatokat böngészőben?', 3, 'javascript'),
(40, 1, 'C# switch példa', 'Egyszerű switch használat C#-ban.', 1, 'csharp'),
(41, 2, 'PHP fájl feltöltés', 'Hogyan kezeljem a file upload-ot?', 9, 'php'),
(42, 1, 'Java metódus túlterhelés', 'Overloading metódusok Java-ban.', 4, 'java'),
(43, 2, 'SQL tranzakciók', 'Hogyan működik a COMMIT és ROLLBACK?', 3, 'sql'),
(44, 1, 'HTML űrlap példa', 'Egyszerű bejelentkezési űrlap HTML-ben.', 2, 'html'),
(45, 2, 'CSS hover effekt', 'Színváltozás ha rámegy az egér.', 1, 'css'),
(46, 1, 'Python dictionary alapok', 'Hogyan működik a dict?', 2, 'python'),
(47, 2, 'JavaScript tömb metódusok', 'map, filter, reduce használata.', 4, 'javascript'),
(48, 1, 'PHP adatbázis kapcsolat', 'PDO vagy mysqli használata?', 7, 'php'),
(49, 2, 'Java try-catch blokk', 'Hiba kezelése Java-ban.', 3, 'java'),
(50, 1, 'SQL GROUP BY használat', 'Csoportosított lekérdezés készítése.', 5, 'sql'),
(51, 2, 'HTML kép beillesztés', 'Kép beillesztése oldalra.', 1, 'html'),
(52, 1, 'CSS flexbox kezdőknek', 'Elemek elrendezése flex-szel.', 4, 'css'),
(53, 2, 'Python függvény példa', 'Egyszerű függvény létrehozása.', 2, 'python'),
(54, 1, 'JavaScript idő formázás', 'Dátum formázása a Date objektummal.', 3, 'javascript'),
(55, 2, 'C# string műveletek', 'Substring, Replace használata.', 1, 'csharp'),
(56, 1, 'PHP foreach ciklus', 'Tömb bejárása foreach-csel.', 1, 'php'),
(57, 2, 'SQL BETWEEN használata', 'Adatok szűrése értéktartomány szerint.', 2, 'sql'),
(58, 1, 'HTML link megnyitása új ablakban', 'target=\"_blank\" használata.', 1, 'html'),
(59, 2, 'CSS border stílusok', 'Hogyan állítsam be a szegélyt?', 1, 'css'),
(60, 1, 'Python JSON feldolgozás', 'JSON string betöltése dict-be.', 3, 'python'),
(61, 2, 'JS eseménydelegálás', 'Hogyan használható event delegation?', 3, 'javascript'),
(62, 1, 'PHP tömb szűrés', 'array_filter használata.', 2, 'php'),
(63, 2, 'Java konstruktor', 'Osztály példányosítás konstruktorral.', 2, 'java'),
(64, 1, 'SQL INNER JOIN példa', 'Két tábla összekapcsolása kulcs alapján.', 3, 'sql'),
(65, 2, 'C# osztály létrehozása', 'Saját osztály definiálása.', 4, 'csharp'),
(66, 1, 'HTML audio lejátszó', 'Beépített hanglejátszó HTML-ben.', 1, 'html'),
(67, 2, 'CSS árnyék', 'Box-shadow használata.', 2, 'css'),
(68, 1, 'PHP adatbázis lekérdezés', 'Hogyan végezzek SELECT lekérdezéseket PHP-ból?', 4, 'php'),
(69, 2, 'JavaScript form validáció', 'Hogyan validáljak formot JavaScript-tel?', 5, 'javascript'),
(70, 1, 'Python regex használata', 'Hogyan készíthetek regex-et Pythonban?', 3, 'python'),
(71, 2, 'C# LINQ példák', 'Hogyan használjam a LINQ-t C#-ban?', 6, 'csharp'),
(72, 1, 'SQL LEFT JOIN', 'Hogyan csatlakoztassak két táblát LEFT JOIN-nal?', 5, 'sql'),
(73, 2, 'HTML 5 videó lejátszó', 'Hogyan ágyazzak be videót HTML-ben?', 4, 'html'),
(74, 1, 'CSS background pozicionálás', 'Hogyan helyezzem el a háttérképet CSS-ben?', 2, 'css'),
(75, 2, 'PHP objektumorientált programozás', 'Mi az OOP és hogyan használjam PHP-ban?', 7, 'php'),
(76, 1, 'JavaScript Promise', 'Mi a Promise és hogyan működik?', 3, 'javascript'),
(77, 2, 'Python SQL kapcsolat', 'Hogyan csatlakozzak adatbázishoz Pythonban?', 6, 'python'),
(78, 1, 'C# async/await', 'Hogyan használjam az aszinkron kódot C#-ban?', 8, 'csharp'),
(79, 2, 'SQL GROUP_CONCAT', 'Hogyan használjam a GROUP_CONCAT-t?', 5, 'sql'),
(80, 1, 'HTML formakciók', 'Hogyan készíthetek űrlapokat HTML-ben?', 2, 'html'),
(81, 2, 'CSS transform', 'Hogyan használjam a CSS transform tulajdonságot?', 4, 'css'),
(82, 1, 'PHP hibakezelés', 'Hogyan kezeljek hibákat PHP-ban?', 7, 'php'),
(83, 2, 'JavaScript setTimeout', 'Hogyan használjam a setTimeout funkciót?', 3, 'javascript'),
(84, 1, 'Python objektumok', 'Hogyan dolgozzak objektumokkal Pythonban?', 6, 'python'),
(85, 2, 'C# exceptions', 'Hogyan kezeljem a hibákat C#-ban?', 8, 'csharp'),
(86, 1, 'SQL LIMIT és OFFSET', 'Hogyan korlátozzam az eredményeket SQL-ben?', 4, 'sql'),
(87, 2, 'HTML input típusok', 'Milyen input típusokat használhatok HTML-ben?', 2, 'html'),
(88, 1, 'CSS z-index használat', 'Hogyan állítsam be a z-index értéket?', 5, 'css'),
(89, 2, 'PHP CLI használat', 'Hogyan futtassak PHP szkripteket a parancssorból?', 6, 'php'),
(90, 1, 'JavaScript JSON.parse', 'Hogyan dolgozzak JSON objektumokkal?', 4, 'javascript'),
(91, 2, 'Python exception kezelés', 'Hogyan kezeljek kivételeket Pythonban?', 7, 'python'),
(92, 1, 'C# névterek', 'Hogyan használjak névtereket C#-ban?', 5, 'csharp'),
(93, 2, 'SQL subquery', 'Hogyan használjam az al-lekérdezéseket?', 3, 'sql'),
(94, 1, 'HTML audio és video szabályozás', 'Hogyan szabályozzam az audio és video elemeket?', 2, 'html'),
(95, 2, 'CSS Flexbox alapok', 'Hogyan használjam a Flexbox-ot a layoutban?', 4, 'css'),
(96, 1, 'PHP MVC mintázat', 'Hogyan alkalmazzak MVC mintázatot PHP-ban?', 7, 'php'),
(97, 2, 'JavaScript Fetch API hiba kezelés', 'Hogyan kezeljem a hibákat a Fetch API-ban?', 5, 'javascript'),
(98, 2, 'Alkoss egy jegyzetelő alkalmazást', 'Alkoss egy egyszerű jegyzetelő alkalmazást, amelyben a felhasználó elmentheti a jegyzeteit localStorage-be, és bármikor visszanézheti őket.', 4, 'php'),
(99, 3, 'Írj egy memóriajátékot', 'Valósíts meg egy memóriajátékot párok keresésével. Legyen keverés funkció, nyilvántartás a lépésekről és újrakezdési lehetőség.', 3, 'html'),
(100, 3, 'Írj egy mini webshop sablont', 'Írj egy mini webshop sablont, ahol termékek jelennek meg képpel, névvel, árral és egy \'kosárba\' gombbal.', 9, 'csharp'),
(101, 2, 'Készíts egy számológépet', 'Készíts egy számológépet, amely támogatja az alapműveleteket, és frissíti az eredményt a kijelzőn valós időben.', 5, 'csharp'),
(102, 3, 'Alkoss egy egyszerű naplót', 'Alkoss egy egyszerű naplót, amely dátum szerint menti a bejegyzéseket, és vissza lehet nézni őket egy listából.', 6, 'html'),
(103, 3, 'Írj egy kő-papír-olló játékot', 'Írj egy egyszerű kő-papír-olló játékot, ahol a felhasználó a gép ellen játszik, és a rendszer nyilvántartja az eredményeket.', 8, 'html'),
(104, 2, 'Alkoss egy jegyzetelő alkalmazást', 'Alkoss egy egyszerű jegyzetelő alkalmazást, amelyben a felhasználó elmentheti a jegyzeteit localStorage-be, és bármikor visszanézheti őket.', 4, 'javascript'),
(105, 3, 'Írj egy mini webshop sablont', 'Írj egy mini webshop sablont, ahol termékek jelennek meg képpel, névvel, árral és egy \'kosárba\' gombbal.', 6, 'java'),
(106, 3, 'Írj egy kő-papír-olló játékot', 'Írj egy egyszerű kő-papír-olló játékot, ahol a felhasználó a gép ellen játszik, és a rendszer nyilvántartja az eredményeket.', 9, 'java'),
(107, 3, 'Készíts egy számológépet', 'Készíts egy számológépet, amely támogatja az alapműveleteket, és frissíti az eredményt a kijelzőn valós időben.', 3, 'php');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `email`, `token`) VALUES
(1, 'user_1', '$2y$10$fUBCjVgaGOYOpLjIfk7QV.3aVJeugdnc2.gV.sppRlw1/uPA7EOTO', '1', 'stelooli@gmail.com', 40),
(2, 'test_user', 'password', '0', 'test_email@gmail.com', 30),
(3, 'ste', '$2y$10$Ixmb68rRWwBEvlBvn4zbmu9WCaSYvgJ2bSzM9R1V.feF.fucTHgDe', '1', 'stelkooli@gmail.com', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `blocked`
--
ALTER TABLE `blocked`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `buy_history`
--
ALTER TABLE `buy_history`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `profile_codes`
--
ALTER TABLE `profile_codes`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `profile_requests`
--
ALTER TABLE `profile_requests`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `reports`
--
ALTER TABLE `reports`
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
-- AUTO_INCREMENT a táblához `blocked`
--
ALTER TABLE `blocked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `buy_history`
--
ALTER TABLE `buy_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT a táblához `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT a táblához `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT a táblához `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `profile_codes`
--
ALTER TABLE `profile_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `profile_requests`
--
ALTER TABLE `profile_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
