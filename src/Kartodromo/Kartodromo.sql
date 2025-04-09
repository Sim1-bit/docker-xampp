-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Creato il: Apr 09, 2025 alle 10:43
-- Versione del server: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- Versione PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Kartodromo`
--
CREATE DATABASE IF NOT EXISTS `Kartodromo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Kartodromo`;

-- --------------------------------------------------------

--
-- Struttura della tabella `Gare`
--

CREATE TABLE `Gare` (
  `ID_Gara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `Gare`
--

INSERT INTO `Gare` (`ID_Gara`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Struttura della tabella `Kart`
--

CREATE TABLE `Kart` (
  `Num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `Kart`
--

INSERT INTO `Kart` (`Num`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Struttura della tabella `Partecipazione`
--

CREATE TABLE `Partecipazione` (
  `ID_gara` int(11) NOT NULL,
  `CodF` varchar(20) NOT NULL,
  `Num` int(11) NOT NULL,
  `Posizione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `Partecipazione`
--

INSERT INTO `Partecipazione` (`ID_gara`, `CodF`, `Num`, `Posizione`) VALUES
(1, 'a', 1, 1),
(1, 'b', 2, 2),
(1, 'h', 3, 3),
(2, 'a', 1, 1),
(2, 'b', 2, 2),
(2, 'h', 3, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `Utenti`
--

CREATE TABLE `Utenti` (
  `CodF` varchar(20) NOT NULL,
  `pwd` varchar(5000) NOT NULL,
  `ruolo` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `Utenti`
--

INSERT INTO `Utenti` (`CodF`, `pwd`, `ruolo`) VALUES
('a', '0cc175b9c0f1b6a831c399e269772661', 0),
('b', '92eb5ffee6ae2fec3ad71c777531578f', 0),
('h', '2510c39011c5be704182423e3a695e91', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Gare`
--
ALTER TABLE `Gare`
  ADD PRIMARY KEY (`ID_Gara`);

--
-- Indici per le tabelle `Kart`
--
ALTER TABLE `Kart`
  ADD PRIMARY KEY (`Num`);

--
-- Indici per le tabelle `Partecipazione`
--
ALTER TABLE `Partecipazione`
  ADD PRIMARY KEY (`ID_gara`,`CodF`,`Num`),
  ADD KEY `CodF` (`CodF`),
  ADD KEY `Num` (`Num`);

--
-- Indici per le tabelle `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`CodF`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Partecipazione`
--
ALTER TABLE `Partecipazione`
  ADD CONSTRAINT `Partecipazione_ibfk_1` FOREIGN KEY (`ID_gara`) REFERENCES `Gare` (`ID_Gara`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Partecipazione_ibfk_2` FOREIGN KEY (`CodF`) REFERENCES `Utenti` (`CodF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Partecipazione_ibfk_3` FOREIGN KEY (`Num`) REFERENCES `Kart` (`Num`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
