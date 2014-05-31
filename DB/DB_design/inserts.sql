-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Mag 31, 2014 alle 02:30
-- Versione del server: 5.5.32
-- Versione PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `knowledge_room`
--
CREATE DATABASE IF NOT EXISTS `knowledge_room` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `knowledge_room`;

--
-- Dump dei dati per la tabella `link`
--

INSERT INTO `link` (`linkId`, `linkPath`, `linkType`, `resource`) VALUES
(1, 'http://www.php.net/manual/it/', 'WEB Page', 'PHP reference italian');

--
-- Dump dei dati per la tabella `linktype`
--

INSERT INTO `linktype` (`linkTypeId`, `type`, `linkIconName`) VALUES
(5, 'Microsoft Excel', 'fa-file-excel-o'),
(6, 'Image', 'fa-file-image-o'),
(2, 'PDF document', 'fa-file-pdf-o'),
(4, 'Microsoft PowerPoint ', 'fa-file-powerpoint-o'),
(3, 'Microsoft Word', 'fa-file-word-o'),
(1, 'WEB Page', 'fa-link'),
(7, 'Other', 'fa-question');

--
-- Dump dei dati per la tabella `resource`
--

INSERT INTO `resource` (`resourceId`, `title`, `annotationDate`, `description`, `subCategory`) VALUES
(1, 'PHP reference italian', '2014-05-31', 'The complete reference for develop web server pages based on php language', 'PHP');

--
-- Dump dei dati per la tabella `subcategory`
--

INSERT INTO `subcategory` (`subCategoryId`, `subCategoryName`, `subCategoryDescription`, `topCategory`) VALUES
(1, 'Raspberry Pi', 'Knowledge about Raspberry Pi mini pc. Inside also shell commands line tips for Raspberry SO', 'Informatics'),
(2, 'PHP', 'Inside this section there is some concept about web developing using server side php language', 'Informatics'),
(3, 'Ableton Live', 'Tips, tutorial, and news about Ableton Live world', 'Computer music'),
(4, 'MAX/MSP', 'Inside concepts about MAX MSP music develop language', 'Computer music');

--
-- Dump dei dati per la tabella `topcategory`
--

INSERT INTO `topcategory` (`categoryId`, `categoryName`, `categoryDescription`, `categoryImg`) VALUES
(1, 'Informatics', 'This section contains knowledge about programming, coding, networks, systems ecc', NULL),
(2, 'Elctronics', 'This section contains knowledge about electronics', NULL),
(3, 'Music', 'This section contains knowledge about music world, songs, artists ecc', NULL),
(4, 'Audio Technology', 'This section contains knowledge about audio technologies, music equipment, intresting audio stuff, ecc', NULL),
(5, 'Computer music', 'This section contains knowledge about computer music and electronic production using daw and specific music hardware for produce music', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
