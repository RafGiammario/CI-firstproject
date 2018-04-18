-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Apr 18, 2018 alle 07:34
-- Versione del server: 5.7.21
-- Versione PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_app`
--
CREATE DATABASE IF NOT EXISTS `todo_app` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `todo_app`;

-- --------------------------------------------------------

--
-- Struttura della tabella `access`
--

DROP TABLE IF EXISTS `access`;
CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Svuota la tabella prima dell'inserimento `access`
--

TRUNCATE TABLE `access`;
--
-- Dump dei dati per la tabella `access`
--

INSERT INTO `access` (`id`, `name`, `email`, `password`, `createdAt`) VALUES
(1, 'Raffaele Giammario', 'raf.giammario@gmail.com', 'd7ec127513978723369f43edf4fb178e2b78f0a1', '2018-04-17 13:00:17');

-- --------------------------------------------------------

--
-- Struttura della tabella `todo`
--

DROP TABLE IF EXISTS `todo`;
CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `id_access` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `createdAt` datetime NOT NULL,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Svuota la tabella prima dell'inserimento `todo`
--

TRUNCATE TABLE `todo`;
--
-- Dump dei dati per la tabella `todo`
--

INSERT INTO `todo` (`id`, `id_access`, `text`, `completed`, `createdAt`, `updateAt`) VALUES
(2, 1, 'Pick up Banane', 0, '2018-04-16 08:00:00', '2018-04-17 14:58:24'),
(3, 1, 'Call Mom', 1, '2018-04-17 08:15:34', '2018-04-17 14:58:31'),
(4, 1, 'Pick up Newspapers', 1, '2018-04-17 08:44:19', '2018-04-17 14:58:36'),
(5, 1, 'Meet Mary', 1, '2018-04-17 09:52:01', '2018-04-17 14:58:39');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_access` (`id_access`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_access` FOREIGN KEY (`id_access`) REFERENCES `access` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
