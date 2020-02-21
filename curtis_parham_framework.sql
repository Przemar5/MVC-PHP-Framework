-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Lut 2020, 12:22
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `curtis_parham_framework`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(155) COLLATE utf8_polish_ci DEFAULT NULL,
  `lname` varchar(155) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(155) COLLATE utf8_polish_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `zip` varchar(65) COLLATE utf8_polish_ci NOT NULL,
  `home_phone` varchar(55) COLLATE utf8_polish_ci NOT NULL,
  `cell_phone` varchar(55) COLLATE utf8_polish_ci NOT NULL,
  `work_phone` varchar(55) COLLATE utf8_polish_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `fname` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `lname` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `acl` text COLLATE utf8_polish_ci DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `acl`, `deleted`) VALUES
(1, 'bob', 'bob@mail.com', '$2y$10$NNt8Yk2Z4aNtaBJ2oathT.BpxpidTvuc4BURFcdYz83JX7OPaqy.K', 'Bob', 'Baggy', NULL, 0),
(2, 'przemo', 'przemar5@o2.pl', '$2y$10$NNt8Yk2Z4aNtaBJ2oathT.BpxpidTvuc4BURFcdYz83JX7OPaqy.K', 'Przemek', 'xxx', NULL, 0),
(3, 'CindyCea', 'cindy@gmail.com', '$2y$10$xpZfWBuxgMFqUr9Ihm92peSJh0lSPYZQpHjeqcuyVXK6VYFcx9psq', 'Cindy', 'Cea', NULL, NULL),
(4, 'DannyDeo', 'danny@mail.com', '$2y$10$tduoB8M4opM9/caxzYRqnuBRCTxjCF6yyHxcWb2XqBE6xC.YLg6qq', 'Danny', 'Deo', NULL, NULL),
(5, 'EmilyEla', 'emily@mail.com', '$2y$10$B5Jd.lFuxsuOTbyM0ur1/OIWrjSQEqIHa2QFe8qXEyCE9oPTr8X0S', 'Emily', 'Ela', NULL, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `session`, `user_agent`) VALUES
(14, 2, 'bf9e05bc995dd59b1e47b14d9cf76bc3', 'Mozilla.0 (Windows NT 10.0; Win64; x64) AppleWebKit.36 (KHTML, like Gecko) Chrome.0.3945.130 Safari.36');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deleted` (`deleted`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
