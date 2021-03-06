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
-- Tábla szerkezet ehhez a táblához `jarat`
--

CREATE TABLE IF NOT EXISTS `jarat` (
  `id` int(11) NOT NULL,
  `jarat_nev_egy` varchar(250) NOT NULL,
  `jarat_nev_ketto` varchar(250) NOT NULL,
  `kerulet` varchar(250) NOT NULL,
  `szoro` varchar(250) NOT NULL,
  `munka` varchar(250) NOT NULL,
  `db` int(11) NOT NULL,
  `terjesztesi_cel` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `jarat`
--

INSERT INTO `jarat` (`id`, `jarat_nev_egy`, `jarat_nev_ketto`, `kerulet`, `szoro`, `munka`, `db`, `terjesztesi_cel`) VALUES
(6, '1/1/1', '', 'Budapest 1', '', '', 0, ''),
(7, '1/1/2', '', 'Budapest 1', '', '', 0, ''),
(8, '1/1/3', '', 'Budapest 1', '', '', 0, ''),
(9, '1/1/4', '', 'Budapest 1', '', '', 0, ''),
(10, '1/1/5', '', 'Budapest 1', '', '', 0, ''),
(11, '1/2/1', '', 'Budapest 1', '', '', 0, ''),
(12, '1/2/2', '', 'Budapest 1', '', '', 0, ''),
(13, '1/2/3', '', 'Budapest 1', '', '', 0, ''),
(14, '1/2/4', '', 'Budapest 1', '', '', 0, ''),
(15, '1/3/1', '', 'Budapest 1', '', '', 0, ''),
(16, '1/3/2', '', 'Budapest 1', '', '', 0, ''),
(17, '1/3/3', '', 'Budapest 1', '', '', 0, ''),
(18, '1/3/4', '', 'Budapest 1', '', '', 0, ''),
(19, '12/1/1', '', 'Budapest 12', '', '', 0, ''),
(20, '12/1/2', '', 'Budapest 12', '', '', 0, ''),
(21, '12/1/3', '', 'Budapest 12', '', '', 0, ''),
(22, '12/1/4', '', 'Budapest 12', '', '', 0, ''),
(23, '12/1/5', '', 'Budapest 12', '', '', 0, ''),
(24, '12/10/1', '', 'Budapest 12', '', '', 0, ''),
(25, '12/10/2', '', 'Budapest 12', '', '', 0, ''),
(26, '12/10/3', '', 'Budapest 12', '', '', 0, ''),
(27, '12/10/4', '', 'Budapest 12', '', '', 0, ''),
(28, '12/10/5', '', 'Budapest 12', '', '', 0, ''),
(29, '12/10/6', '', 'Budapest 12', '', '', 0, ''),
(30, '12/2/1', '', 'Budapest 12', '', '', 0, ''),
(31, '12/2/2', '', 'Budapest 12', '', '', 0, ''),
(32, '12/2/3', '', 'Budapest 12', '', '', 0, ''),
(33, '12/2/4', '', 'Budapest 12', '', '', 0, ''),
(34, '12/2/5', '', 'Budapest 12', '', '', 0, ''),
(35, '12/2/6', '', 'Budapest 12', '', '', 0, ''),
(36, '12/3/1', '', 'Budapest 12', '', '', 0, ''),
(37, '12/3/2', '', 'Budapest 12', '', '', 0, ''),
(38, '12/3/3', '', 'Budapest 12', '', '', 0, ''),
(39, '12/4/1', '', 'Budapest 12', '', '', 0, ''),
(40, '12/4/2', '', 'Budapest 12', '', '', 0, ''),
(41, '12/4/3', '', 'Budapest 12', '', '', 0, ''),
(42, '12/4/4', '', 'Budapest 12', '', '', 0, ''),
(43, '12/5/1', '', 'Budapest 12', '', '', 0, ''),
(44, '12/5/2', '', 'Budapest 12', '', '', 0, ''),
(45, '12/5/3', '', 'Budapest 12', '', '', 0, ''),
(46, '12/6/1', '', 'Budapest 12', '', '', 0, ''),
(47, '12/6/2', '', 'Budapest 12', '', '', 0, ''),
(48, '12/6/3', '', 'Budapest 12', '', '', 0, ''),
(49, '12/7/1', '', 'Budapest 12', '', '', 0, ''),
(50, '12/7/2', '', 'Budapest 12', '', '', 0, ''),
(51, '12/7/3', '', 'Budapest 12', '', '', 0, ''),
(52, '12/7/4', '', 'Budapest 12', '', '', 0, ''),
(53, '12/8/1', '', 'Budapest 12', '', '', 0, ''),
(54, '12/8/2', '', 'Budapest 12', '', '', 0, ''),
(55, '12/8/3', '', 'Budapest 12', '', '', 0, ''),
(56, '12/9/1', '', 'Budapest 12', '', '', 0, ''),
(57, '12/9/2', '', 'Budapest 12', '', '', 0, ''),
(58, '12/9/3', '', 'Budapest 12', '', '', 0, ''),
(59, '12/9/4', '', 'Budapest 12', '', '', 0, ''),
(60, '12/9/5', '', 'Budapest 12', '', '', 0, ''),
(61, '12/9/6', '', 'Budapest 12', '', '', 0, ''),
(62, '12/9/7', '', 'Budapest 12', '', '', 0, ''),
(63, '2/1/1', '', 'Budapest 2', '', '', 0, ''),
(64, '2/1/2', '', 'Budapest 2', '', '', 0, ''),
(65, '2/1/3', '', 'Budapest 2', '', '', 0, ''),
(66, '2/1/4', '', 'Budapest 2', '', '', 0, ''),
(67, '2/1/5', '', 'Budapest 2', '', '', 0, ''),
(68, '2/10/1', '', 'Budapest 2', '', '', 0, ''),
(69, '2/10/2', '', 'Budapest 2', '', '', 0, ''),
(70, '2/10/3', '', 'Budapest 2', '', '', 0, ''),
(71, '2/10/4', '', 'Budapest 2', '', '', 0, ''),
(72, '2/10/5', '', 'Budapest 2', '', '', 0, ''),
(73, '2/10/6', '', 'Budapest 2', '', '', 0, ''),
(74, '2/11/1', '', 'Budapest 2', '', '', 0, ''),
(75, '2/11/2', '', 'Budapest 2', '', '', 0, ''),
(76, '2/11/3', '', 'Budapest 2', '', '', 0, ''),
(77, '2/11/4', '', 'Budapest 2', '', '', 0, ''),
(78, '2/11/5', '', 'Budapest 2', '', '', 0, ''),
(79, '2/11/6', '', 'Budapest 2', '', '', 0, ''),
(80, '2/11/7', '', 'Budapest 2', '', '', 0, ''),
(81, '2/12/1', '', 'Budapest 2', '', '', 0, ''),
(82, '2/12/2', '', 'Budapest 2', '', '', 0, ''),
(83, '2/12/3', '', 'Budapest 2', '', '', 0, ''),
(84, '2/12/4', '', 'Budapest 2', '', '', 0, ''),
(85, '2/12/5', '', 'Budapest 2', '', '', 0, ''),
(86, '2/12/6', '', 'Budapest 2', '', '', 0, ''),
(87, '2/12/7', '', 'Budapest 2', '', '', 0, ''),
(88, '2/13/1', '', 'Budapest 2', '', '', 0, ''),
(89, '2/13/2', '', 'Budapest 2', '', '', 0, ''),
(90, '2/13/3', '', 'Budapest 2', '', '', 0, ''),
(91, '2/13/4', '', 'Budapest 2', '', '', 0, ''),
(92, '2/13/5', '', 'Budapest 2', '', '', 0, ''),
(93, '2/13/6', '', 'Budapest 2', '', '', 0, ''),
(94, '2/2/1', '', 'Budapest 2', '', '', 0, ''),
(95, '2/2/2', '', 'Budapest 2', '', '', 0, ''),
(96, '2/2/3', '', 'Budapest 2', '', '', 0, ''),
(97, '2/2/4', '', 'Budapest 2', '', '', 0, ''),
(98, '2/2/5', '', 'Budapest 2', '', '', 0, ''),
(99, '2/3/1', '', 'Budapest 2', '', '', 0, ''),
(100, '2/3/2', '', 'Budapest 2', '', '', 0, ''),
(101, '2/3/3', '', 'Budapest 2', '', '', 0, ''),
(102, '2/3/4', '', 'Budapest 2', '', '', 0, ''),
(103, '2/3/5', '', 'Budapest 2', '', '', 0, ''),
(104, '2/3/6', '', 'Budapest 2', '', '', 0, ''),
(105, '2/3/7', '', 'Budapest 2', '', '', 0, ''),
(106, '2/4/1', '', 'Budapest 2', '', '', 0, ''),
(107, '2/4/2', '', 'Budapest 2', '', '', 0, ''),
(108, '2/4/3', '', 'Budapest 2', '', '', 0, ''),
(109, '2/4/4', '', 'Budapest 2', '', '', 0, ''),
(110, '2/4/5', '', 'Budapest 2', '', '', 0, ''),
(111, '2/5/1', '', 'Budapest 2', '', '', 0, ''),
(112, '2/5/2', '', 'Budapest 2', '', '', 0, ''),
(113, '2/5/3', '', 'Budapest 2', '', '', 0, ''),
(114, '2/5/4', '', 'Budapest 2', '', '', 0, ''),
(115, '2/5/5', '', 'Budapest 2', '', '', 0, ''),
(116, '2/6/1', '', 'Budapest 2', '', '', 0, ''),
(117, '2/6/2', '', 'Budapest 2', '', '', 0, ''),
(118, '2/6/3', '', 'Budapest 2', '', '', 0, ''),
(119, '2/6/4', '', 'Budapest 2', '', '', 0, ''),
(120, '2/6/5', '', 'Budapest 2', '', '', 0, ''),
(121, '2/7/1', '', 'Budapest 2', '', '', 0, ''),
(122, '2/7/2', '', 'Budapest 2', '', '', 0, ''),
(123, '2/7/3', '', 'Budapest 2', '', '', 0, ''),
(124, '2/7/4', '', 'Budapest 2', '', '', 0, ''),
(125, '2/7/5', '', 'Budapest 2', '', '', 0, ''),
(126, '2/7/6', '', 'Budapest 2', '', '', 0, ''),
(127, '2/8/1', '', 'Budapest 2', '', '', 0, ''),
(128, '2/8/2', '', 'Budapest 2', '', '', 0, ''),
(129, '2/8/3', '', 'Budapest 2', '', '', 0, ''),
(130, '2/8/4', '', 'Budapest 2', '', '', 0, ''),
(131, '2/8/5', '', 'Budapest 2', '', '', 0, ''),
(132, '2/8/6', '', 'Budapest 2', '', '', 0, ''),
(133, '2/9/1', '', 'Budapest 2', '', '', 0, ''),
(134, '2/9/2', '', 'Budapest 2', '', '', 0, ''),
(135, '2/9/3', '', 'Budapest 2', '', '', 0, ''),
(136, '2/9/4', '', 'Budapest 2', '', '', 0, ''),
(137, '2/9/5', '', 'Budapest 2', '', '', 0, ''),
(138, '2/9/6', '', 'Budapest 2', '', '', 0, '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `jarat`
--
ALTER TABLE `jarat`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `jarat`
--
ALTER TABLE `jarat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
