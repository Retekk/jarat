-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Ápr 01. 18:06
-- Kiszolgáló verziója: 5.6.26
-- PHP verzió: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `jarat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ujsag_jarat`
--

CREATE TABLE IF NOT EXISTS `ujsag_jarat` (
  `id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `db` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `ujsag_jarat`
--

INSERT INTO `ujsag_jarat` (`id`, `usr_id`, `u_id`, `j_id`, `db`) VALUES
(1, 667, 1, 6, 1),
(3, 667, 2, 6, 10),
(4, 669, 3, 7, 23);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ujsag_jarat`
--
ALTER TABLE `ujsag_jarat`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `ujsag_jarat`
--
ALTER TABLE `ujsag_jarat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
