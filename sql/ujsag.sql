-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Ápr 01. 18:09
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
-- Tábla szerkezet ehhez a táblához `ujsag`
--

CREATE TABLE IF NOT EXISTS `ujsag` (
  `id` int(11) NOT NULL,
  `beszalito` varchar(250) NOT NULL,
  `kiadvany` varchar(250) NOT NULL,
  `gyujto` varchar(250) NOT NULL,
  `telj_kezd` date NOT NULL,
  `telj_veg` date NOT NULL,
  `suly` int(11) NOT NULL,
  `db` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `ujsag`
--

INSERT INTO `ujsag` (`id`, `beszalito`, `kiadvany`, `gyujto`, `telj_kezd`, `telj_veg`, `suly`, `db`) VALUES
(1, 'beszállító', 'akármi', 'valami', '2018-03-07', '2018-03-22', 100, 2),
(2, 'beszállító2', 'kiadvány2', 'gyűjtő2', '2018-03-15', '2018-03-16', 300, 32),
(3, 'beszállító3', 'kiadvány3', 'gyűjtő3', '2018-03-07', '2018-03-22', 231, 10);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ujsag`
--
ALTER TABLE `ujsag`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `ujsag`
--
ALTER TABLE `ujsag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
