-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Cze 2020, 21:47
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `code`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `campaign`
--

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `desc` text NOT NULL,
  `link` text NOT NULL,
  `fileName` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `bik` tinyint(4) NOT NULL DEFAULT 0,
  `commission` double NOT NULL DEFAULT 0,
  `rate` double NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `campaign`
--

INSERT INTO `campaign` (`id`, `name`, `desc`, `link`, `fileName`, `active`, `bik`, `commission`, `rate`, `views`) VALUES
(5, 'Alegotówka', 'CPS - 150,00 zł za udzielenie pierwszej pożyczki klientowi.', 'https://bluepartner.pl/redirect?partner_id=277&creation_type=LINK&creation_id=509', 'http://cdn.bsbox.pl/files/blueleadtest/OGY7MDA_/080cd885f2914111c8e96695652dfccd.gif', 1, 1, 3.66, 1.99, 58),
(8, 'LendOn', 'Pierwsza pożyczka do 1500 zł na 30 dni udzielana jest za darmo.', 'https://bluepartner.pl/redirect?partner_id=277&creation_type=LINK&creation_id=348', 'http://cdn.bsbox.pl/files/blueleadtest/OGQ7MDA_/1ee99c64888f9accbd0a02ef7e1e7906.jpg', 1, 0, 0, 0, 117),
(9, 'Provident', 'Pożyczka na 48 miesięcy, RRSO 9,87%\r\nPożyczka na 5 miesięcy, RRSO 0%', 'https://bluepartner.pl/redirect?partner_id=277&creation_type=LINK&creation_id=354', 'http://cdn.bsbox.pl/files/blueleadtest/ZDg7MDA_/978908d401682b9497922813d79884d0.jpg', 1, 1, 0, 9.87, 22),
(10, 'Lew pożyczka', 'Lew pożyczka udziela szybkich pożyczek od 200 do 3000 złotych bez zabezpieczeń, dostępnych dla obywateli Polski w wieku od 19 do 73 lat. Pożyczkę można zaciągnąć na okres od 15 do 30 dni.', 'https://bluepartner.pl/redirect?partner_id=277&creation_type=LINK&creation_id=228', 'http://cdn.bsbox.pl/files/blueleadtest/MjI7MDA_/a297d17e96adf844986de5880bb4c1c8.jpg', 1, 1, 0, 0, 55),
(11, 'Wonga', 'Pożyczka do 60 dni ze stałą prowizją 10 zł na kwotę od 50 zł do 1 500 zł\r\npożyczka ratalna dla nowych Klientów do 5 000 zł nawet w 18 ratach\r\nszybka wypłata środków', 'https://bluepartner.pl/redirect?partner_id=277&creation_type=LINK&creation_id=332', 'http://cdn.bsbox.pl/files/blueleadtest/YWM7MDA_/04d2f96f0e4e41e03e700ecd5d080b5d.png', 1, 1, 0, 0, 52),
(12, 'Kuki', '', 'https://bluepartner.eu/redirect?partner_id=277&creation_type=LINK&creation_id=371', 'http://cdn.bsbox.pl/files/blueleadtest/ZDc7MDA_/1aef3a65f0df68bcb696b7cc6333f8dc.gif', 1, 0, 0, 0, 0),
(13, 'POLOŻYCZKA', '', 'https://bluepartner.eu/redirect?partner_id=277&creation_type=LINK&creation_id=28', 'http://cdn.bsbox.pl/files/blueleadtest/ODM7MDA_/e6cce7b8017173db13fb360e9e5c9146.jpg', 1, 0, 0, 0, 1),
(14, 'Credit.pl', '', 'https://bluepartner.eu/redirect?partner_id=277&creation_type=LINK&creation_id=618', 'http://cdn.bsbox.pl/files/blueleadtest/NTk7MDA_/127b465aa0f45ab0095eb541ac3a0313.gif', 1, 0, 0, 0, 985);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `meta` text NOT NULL,
  `keyword` text NOT NULL,
  `tokenBL` text NOT NULL,
  `footer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `settings`
--

INSERT INTO `settings` (`id`, `url`, `title`, `meta`, `keyword`, `tokenBL`, `footer`) VALUES
(19, '', 'DobraRatka - Pożyczki dla każdego!', 'DobraRatka to super strona z pożyczkami', 'DobraRatka,pożyczka', '36bb4c5ce39abd71b839870adad8fed606700fed', 'AdSystem');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `hash` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `hash`, `active`, `admin`) VALUES
(7, 'admin', '$2y$10$zDsJ9mk0kgmmg2nyUD2RzuFZk8d8MvNu35cJYFD4S2X42S9n2pK4u', 'admin@admin.pl', '', 1, 1),
(8, 'xxxx', '$2y$10$JBCQFygb0jMzf53rQExmgOXfQwoh50lNqyhK33Ow66WkBgI0ry2nq', 'g@ad.pl', '', 0, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
