-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Ápr 15. 11:15
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `zombishooter`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `prevmessage` int(11) DEFAULT NULL,
  `status` enum('n','o') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `messages`
--

INSERT INTO `messages` (`id`, `senderid`, `receiverid`, `message`, `date`, `prevmessage`, `status`) VALUES
(2, 19, 18, 'rewtertert', '2024-04-11', NULL, 'o'),
(3, 18, 19, 'uzenet', '2024-04-11', NULL, 'o'),
(4, 18, 19, 'helo', '2024-04-12', NULL, 'n'),
(5, 19, 18, 'btrtrbbrbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\n\n', '2024-04-11', NULL, 'o'),
(6, 18, 19, 'tegereg', '2024-04-12', NULL, 'n'),
(13, 18, 19, 'fdfdfd', '2024-04-15', NULL, 'n');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `telszam` varchar(11) NOT NULL,
  `kedvetel` text NOT NULL,
  `bio` text NOT NULL,
  `gender` enum('m','f') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `profiles`
--

INSERT INTO `profiles` (`id`, `userid`, `age`, `telszam`, `kedvetel`, `bio`, `gender`) VALUES
(16, 16, 21, '06203698741', 'Bolognai Spagetti', 'Szia én egy elhivatott játékos vagyok ha szeretnél együtt játszani velem írj nekem!', 'm'),
(17, 17, 18, '0636987532', 'Borsó', 'Szia a nevem Lacika', 'f'),
(18, 18, 18, '06706515324', 'Alma', 'Szia a nevem admin :)', 'm'),
(19, 19, 40, '06906090135', 'Krumplistészta', 'Szia!', 'f'),
(20, 20, 21, '06707931645', 'Wasabi', 'Szia a nevem nagyon nem a nevem akkor ez most egy illúzííííÓÓÓÓÓ?:?', 'f');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(16, 'Zombi Harcos', 'NagyEmber@gmail.com', '$2y$12$0TbisehebzMFKVUrNX8bZu5mjO0Ni9uNwwabe5Q0HTFpBs3ul1PAK'),
(17, 'Alma0012', 'Alma0012@gmail.com', '$2y$12$j/lAL46TpHZcHEnc6D.t7uHXeeen6aYnBMs4g9hOkxxzQCU1D5Nbq'),
(18, 'a', 'a@a.com', '$2y$12$9rFrJ5g/rXJ.7AbKyWWNNug1rUnpU92Ro7tThTk6L7AeojCuviuuy'),
(19, 'Horvath.Atilla', 'horvath.atilla@verebelyszki.hu', '$2y$12$vQb6FODZJ64zCTPencoCHu.lPp.693Ex4gdJqpQp1RRAuVkJ04/z6'),
(20, 'ZombiFlorca', 'hahotas@outlook.com', '$2y$12$S8t7Fse.YnpnGEamWkaZIeNWwue0sxDCc/veFaXkwgRXPNeLnSXtW');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senderid` (`senderid`,`receiverid`),
  ADD KEY `receiverid` (`receiverid`);

--
-- A tábla indexei `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`senderid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiverid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
