-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Ápr 01. 18:08
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
  `fk_user_perm` int(2) NOT NULL DEFAULT '2',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=671 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `rkk_users`
--

INSERT INTO `rkk_users` (`user_id`, `user_name`, `user_email`, `user_pass`, `fk_user_perm`, `last_login`) VALUES
(2, 'miki', 'mikidosa@g', '$2y$10$xHmZQbltk8HvYqkJ8YxapOh0SfcmAKExYyhh8XJiagCHBS4ehey/.', 1, '2018-04-01 13:21:09'),
(666, 'fakanal', 'a@a.hu', '$2y$10$9/gwxBDNmRLVZTLNmA8qauNeQ0N7MkYR7kYVMTifox2OYduPmI3CO', 1, '2018-02-26 21:29:38'),
(667, 'kezbesito', 'b@b.hu', '$2y$10$wfJdROp2ndmBf9lnRLP.reOv/sxHYKDDrXMpbjw.bEApK3ZqibY5O', 2, '2018-03-18 16:40:33'),
(669, 'uj', 'mikidosa@gmail.com', '$2y$10$7pFz2W5FhrRlPD91k3WvjOWoBPJLW0Lqxla3jE/xIU//9oO0vlIo6', 2, '2018-03-19 19:26:53'),
(670, 'miki', '', '$2y$10$ieeSQQH07jLT8nb1AOwh.e7s8.9UarDWlUogVi/8HtSUhWhs2gHGa', 0, '2018-03-19 19:52:58');

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=671;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
