-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Ápr 17. 16:40
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
-- Adatbázis: `zombieshooter`
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
(15, 21, 22, 'Szia! Hogy vagy?', '2024-04-17', NULL, 'n'),
(16, 22, 21, 'Szia! Jól vagyok, köszönöm! Te?', '2024-04-17', NULL, 'n'),
(17, 23, 24, 'Hello! Mi újság?', '2024-04-17', NULL, 'n'),
(18, 24, 23, 'Semmi különös, és nálad?', '2024-04-17', NULL, 'n'),
(19, 25, 26, 'Üdv! Mit csinálsz?', '2024-04-17', NULL, 'n'),
(20, 26, 25, 'Dolgozom egy kis projektön. Te?', '2024-04-17', NULL, 'n'),
(21, 27, 28, 'Helló! Mik a terveid ma estére?', '2024-04-17', NULL, 'n'),
(22, 28, 27, 'Szia! Egyetlen tervem az, hogy pihenjek. Nálad?', '2024-04-17', NULL, 'n'),
(23, 29, 30, 'Szervusz! Volt már ma valami érdekes?', '2024-04-17', NULL, 'n'),
(24, 30, 29, 'Nem túl sok, de találtam egy jó könyvet. Te?', '2024-04-17', NULL, 'n'),
(25, 31, 32, 'Sziasztok! Van kedvetek moziba menni holnap?', '2024-04-17', NULL, 'n'),
(26, 32, 31, 'Szia! Hú, jó ötlet! Melyik filmet néznénk meg?', '2024-04-17', NULL, 'n'),
(27, 33, 34, 'Üdv mindenkinek! Mi az aktuális téma?', '2024-04-17', NULL, 'n'),
(28, 34, 33, 'Szia! Éppen a következő üdülésünk helyszínét tervezzük. Van valami javaslatod?', '2024-04-17', NULL, 'n'),
(29, 35, 36, 'Szervusztok! Hogyan telik a napotok?', '2024-04-17', NULL, 'n'),
(30, 36, 35, 'Szia! Jól vagyok, köszönöm! És nálad?', '2024-04-17', 15, 'n'),
(31, 21, 46, 'Szia! Remélem jól vagy!', '2024-04-17', NULL, 'o'),
(32, 46, 21, 'Szia! Igen, köszi, remélem nálad is minden rendben van!', '2024-04-17', NULL, 'n'),
(33, 22, 46, 'Helló! Milyen volt a napod?', '2024-04-17', NULL, 'n'),
(34, 46, 22, 'Szia! Köszönöm, jó volt a napom. És neked?', '2024-04-17', NULL, 'n'),
(35, 23, 46, 'Szervusz! Milyen terveid vannak a hétvégére?', '2024-04-17', NULL, 'o'),
(36, 46, 23, 'Szia! Még nem terveztem konkrétan, de talán kirándulni megyek. Te?', '2024-04-17', NULL, 'n'),
(37, 24, 46, 'Sziasztok! Van valami jó programötletetek erre a hétvégére?', '2024-04-17', NULL, 'o'),
(38, 46, 24, 'Szia! Talán egy piknik jó lenne! Mit gondolsz?', '2024-04-17', NULL, 'n'),
(39, 25, 46, 'Üdvözlöm! Van valami érdekes hír vagy esemény, amiről tudnom kellene?', '2024-04-17', NULL, 'o'),
(40, 46, 25, 'Szia! Mostanában nem hallottam semmi különöset. De ha valamit tudok, szólok.', '2024-04-17', NULL, 'n');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `age` int(2) NOT NULL,
  `telszam` varchar(11) NOT NULL,
  `kedvetel` text NOT NULL,
  `bio` text NOT NULL,
  `gender` enum('m','f') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `profiles`
--

INSERT INTO `profiles` (`id`, `userid`, `age`, `telszam`, `kedvetel`, `bio`, `gender`) VALUES
(21, 21, 30, '06701234567', 'Pizza', 'Egy tapasztalt zombivadász vagyok, mindig kész vagyok egy új kihívásra. Ha nem a zombikat vadászom, akkor valószínűleg új pizzát próbálok ki.', 'f'),
(22, 22, 22, '06301234567', 'Pasta', 'A zombik világában élve az egyetlen dolog, ami fontos, az az, hogy megtaláljuk az utat a túléléshez. Bármi megtörténhet, és készen állok rá.', 'm'),
(23, 23, 35, '06201345678', 'Sushi', 'A zombiapokalipszis nem jelent nekem véget. A túlélés kulcsa az alkalmazkodás és az elszántság. Mindig keresem a következő kihívást.', 'f'),
(24, 24, 28, '06701345678', 'Tacos', 'Az életben maradás mindig az elsődleges célom. Az életkorom ellenére még mindig erős és harcra kész vagyok.', 'f'),
(25, 25, 40, '06301345678', 'Burger', 'A zombiapokalipszisben minden nap egy új kihívás. De én készen állok rá. Mindig próbálom megőrizni az optimizmusomat és a humoromat.', 'm'),
(26, 26, 23, '06201456789', 'Pizza', 'Egy tapasztalt túlélő vagyok a zombiapokalipszisben. Mindig megtalálom a módját, hogyan kerüljek ki a veszélyből és hogyan szerezzek élelmet.', 'f'),
(27, 27, 32, '06701456789', 'Pasta', 'A zombiapokalipszisben az egyetlen fontos dolog a túlélés. Bármi megtörténhet, de én mindig készen állok a harcra és a túlélésre.', 'm'),
(28, 28, 20, '06301456789', 'Sushi', 'Mint zombivadász, mindig készen állok a harcra. Az életben maradás érdekében mindent megteszek.', 'f'),
(29, 29, 38, '06201567890', 'Tacos', 'Az életben maradás a legfontosabb. Mindig készen állok a harcra és az új kihívások elfogadására.', 'f'),
(30, 30, 26, '06701567890', 'Burger', 'A zombiapokalipszisben való túlélés a legfontosabb. Mindig készen állok az új kihívások elfogadására és a veszély elhárítására.', 'm'),
(31, 31, 42, '06301567890', 'Pizza', 'Mint tapasztalt túlélő, mindig készen álok a veszélyekre és az új kihívásokra. Az életben maradás mindig az elsődleges célom.', 'f'),
(32, 32, 21, '06201678901', 'Pasta', 'A zombiapokalipszisben való túlélés mindig a legfontosabb. Az életben maradás érdekében bármit megteszek.', 'm'),
(33, 33, 36, '06701678901', 'Sushi', 'A zombiapokalipszisben minden nap egy új kihívás. De én mindig készen állok rá.', 'm'),
(34, 34, 24, '06301678901', 'Tacos', 'Mint zombivadász, az életben maradás mindig az elsődleges célom. Mindig készen állok a veszélyekre és az új kihívásokra.', 'f'),
(35, 35, 44, '06201789012', 'Burger', 'Az életben maradás érdekében mindent megteszek. A zombiapokalipszisben való túlélés az elsődleges célom.', 'f'),
(36, 36, 27, '06701789012', 'Pizza', 'Mint zombivadász, mindig készen állok a harcra és az új kihívások elfogadására.', 'm'),
(37, 37, 34, '06301789012', 'Pasta', 'Az életben maradás érdekében bármit megteszek. A zombiapokalipszisben való túlélés az elsődleges célom.', 'f'),
(38, 38, 19, '06201890123', 'Sushi', 'Mint zombivadász, az életben maradás mindig az elsődleges célom. Mindig készen állok az új kihívások elfogadására.', 'm'),
(39, 39, 39, '06701890123', 'Tacos', 'A zombiapokalipszisben való túlélés az elsődleges célom. Mindig készen állok a veszélyekre és az új kihívásokra.', 'f'),
(40, 46, 99, '00000000000', 'Kavics', 'Szia én vagyok az oldal adminja!', 'f');

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
(21, 'VándorVilmos', 'vandorvilmos@example.com', '$2a$10$Yqx2qI/lOeR.ljw7y0WYOuX/v5rUOChG9oOXTsLPzCgYwSftlQD7y'),
(22, 'KékHajnal', 'kekhajnal92@sötétposta.com', '$2a$10$ob4z51T1E1slPRjbE6QxQeUWfRgXcvI6rOU/Y4J1.TbQtlYSk7Gx6'),
(23, 'Tűzvarázs', 'tuzvarazs@álomvilág.hu', '$2a$10$K8CN4z0CtNxKQShjwpvHSuNKIzi7QzZrXNJMsFbHbO.Ugrqi.A7n6'),
(24, 'ZengőZarándok', 'zengozarandok89@visszhang.hu', '$2a$10$NrP2U2uTxbbVzF9UgbXW8O7lZi3RvYFcUUpibf4T1OuYlAoZPo5j2'),
(25, 'MisztikusKóborló', 'misztikuskoborlo@csúcs.org', '$2a$10$GGoOwRAazimtAjH5jHCNk.BT2ydX7OotX3KuV6JpTIm5XmILafzKm'),
(26, 'Holdfenix', 'holdfenix99@holdlevel.hu', '$2a$10$1wiJInS1/m0cLlcR4gG1J.yZV4RtzV8sUNWGrPjU01psxCqPNdahO'),
(27, 'Zafírképzelő', 'zafirképzelő@álomvilág.hu', '$2a$10$PpSfU3Lc3gF2IHplmbjNK.WHLAK03OMHMFj5qsDyjAhCfM3mk3tgW'),
(28, 'Zenitárnyék', 'zenitarnyek@sötétposta.com', '$2a$10$UpdwVr0R2yMQwZ7XCcIzi.83n/Xr3nK9Us6f1tXgDrAPX3miRKvH2'),
(29, 'Nebulávándor', 'nebulavandor@csillagpor.hu', '$2a$10$xLcCIi.LY0x7mJxLHo.z0OMI2.UFCkiN2XQ3y4SZ03/4v5.y4iAQK'),
(30, 'Lavinámágus', 'lavinamagus@jégvilág.hu', '$2a$10$0uY1YpWn1U6.sHXgjJoEQOphC5zOv7XkV6Jxy1TwHvQVQuKNM0K9K'),
(31, 'CsendesKóbor', 'csendeskobor@suttogylevél.hu', '$2a$10$5E61DqwniO9Uo5NPSBYLaOtTWX4b1/bU8noyM8Bn6ekDV29KoPeyu'),
(32, 'Csillagszélvándor', 'csillagszelvandor@űrutazás.org', '$2a$10$90EGZW2dMkEPrmJeh3lYp.7HNpEzjBQ3Kj0dcb9T6mP7DyH3zV8fO'),
(33, 'Bíborárnyék', 'bíborárnyék@sötétség.hu', '$2a$10$Hb6OeWz1p3Q9.K6IyueMcu0S9tWcAxnNSDNz/KXWgATKhTfapIwQ6'),
(34, 'Suttogóvihar', 'suttogovihar@viharosvíz.org', '$2a$10$1gR7G5RtBzqsPUc3FDkUxOZ1HUjWfWwv8FlbJHZF0hE3Y1UZC8d9G'),
(35, 'ParázsKísértet', 'parazskisertet@tűzvihar.hu', '$2a$10$u/5sS3C5xKtmnJrEqUJr4uQokTCEWZybkV6Hf4FbrlGClDSvhX3Hm'),
(36, 'Napspektrum', 'napspektrum@napnyugta.hu', '$2a$10$nvZjqgHrYr7QL4iIVFV4mObD5CfQhBcV4Rw6sWmLR4aJopvEO2T0u'),
(37, 'FénylőLótusz', 'fénylőlótusz@megvilágosodás.org', '$2a$10$Ch7cv9Dh5C8sJcGXQ8LeEugORxHq5MX1N3gBvGJ5KujmZ9N1kXbMy'),
(38, 'ÁradóNindzsa', 'áradónindzsa@folyóvíz.hu', '$2a$10$zZpgb0pjWgsr5l8mFtgtaeHi10v4gHO3g2IenLB5R5Dc9.LKTKpT2'),
(39, 'SzerafikusVarázsló', 'szerafikusvarazslo@égi birodalom.com', '$2a$10$7ajEqI02lXtfjBQOqFTel.V2Auc23yT.YCfEXEMX6Tj2l5OnFjZzm'),
(46, 'Admin', 'a@a.com', '$2y$12$2WdNEUVhFT9wkl0fjkDMt.Zz1WW2/Sg8T7B.0WWygJps6B5.D7tte');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT a táblához `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
