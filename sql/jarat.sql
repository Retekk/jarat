-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Feb 14. 19:34
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
-- Tábla szerkezet ehhez a táblához `beszall`
--

CREATE TABLE IF NOT EXISTS `beszall` (
  `b_id` int(11) NOT NULL,
  `b_nev` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jarat`
--

CREATE TABLE IF NOT EXISTS `jarat` (
  `id` int(11) NOT NULL,
  `jarat_nev_egy` varchar(250) NOT NULL,
  `jarat_nev_ketto` varchar(250) NOT NULL,
  `kerulet` varchar(250) NOT NULL,
  `szoro` varchar(250) NOT NULL,
  `munka` varchar(250) NOT NULL,
  `db` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kiszall`
--

CREATE TABLE IF NOT EXISTS `kiszall` (
  `sz_id` int(11) NOT NULL,
  `sz_nev` varchar(250) NOT NULL,
  `sz_munka` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'Teszt', 'ez_a_teszt', 'asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb '),
(2, 'Na mivan már?', 'asdasdasdasd', 'asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb asfd sdv sdvsd bdfbdfsb dasfbasdg sad asd abcfvbcxb '),
(3, 'Beszarsz ezen', 'beszarsz-ezen', 'Mondom tesa ezen beszarsz, kajakra te buzi.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rkk_users`
--

CREATE TABLE IF NOT EXISTS `rkk_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(120) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_perm` int(2) NOT NULL DEFAULT '5'
) ENGINE=InnoDB AUTO_INCREMENT=667 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `rkk_users`
--

INSERT INTO `rkk_users` (`user_id`, `user_name`, `user_pass`, `user_perm`) VALUES
(2, 'miki', '$2y$10$xHmZQbltk8HvYqkJ8YxapOh0SfcmAKExYyhh8XJiagCHBS4ehey/.', 2),
(666, 'fakanal', '$2y$10$9/gwxBDNmRLVZTLNmA8qauNeQ0N7MkYR7kYVMTifox2OYduPmI3CO', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ujsag_jarat`
--

CREATE TABLE IF NOT EXISTS `ujsag_jarat` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `beszall`
--
ALTER TABLE `beszall`
  ADD PRIMARY KEY (`b_id`);

--
-- A tábla indexei `jarat`
--
ALTER TABLE `jarat`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kiszall`
--
ALTER TABLE `kiszall`
  ADD PRIMARY KEY (`sz_id`);

--
-- A tábla indexei `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- A tábla indexei `rkk_users`
--
ALTER TABLE `rkk_users`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `ujsag`
--
ALTER TABLE `ujsag`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `ujsag_jarat`
--
ALTER TABLE `ujsag_jarat`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `beszall`
--
ALTER TABLE `beszall`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `jarat`
--
ALTER TABLE `jarat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `kiszall`
--
ALTER TABLE `kiszall`
  MODIFY `sz_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT a táblához `rkk_users`
--
ALTER TABLE `rkk_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=667;
--
-- AUTO_INCREMENT a táblához `ujsag`
--
ALTER TABLE `ujsag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `ujsag_jarat`
--
ALTER TABLE `ujsag_jarat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
