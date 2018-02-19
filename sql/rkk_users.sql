-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Feb 19. 23:39
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
-- Tábla szerkezet ehhez a táblához `rkk_users`
--

CREATE TABLE IF NOT EXISTS `rkk_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(120) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_perm` int(2) NOT NULL DEFAULT '5'
) ENGINE=InnoDB AUTO_INCREMENT=668 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `rkk_users`
--

INSERT INTO `rkk_users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_perm`) VALUES
(2, 'miki', 'mikidosa@gmail.com', '$2y$10$xHmZQbltk8HvYqkJ8YxapOh0SfcmAKExYyhh8XJiagCHBS4ehey/.', 2),
(666, 'fakanal', 'a@a.hu', '$2y$10$9/gwxBDNmRLVZTLNmA8qauNeQ0N7MkYR7kYVMTifox2OYduPmI3CO', 2);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `rkk_users`
--
ALTER TABLE `rkk_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `rkk_users`
--
ALTER TABLE `rkk_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=668;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
