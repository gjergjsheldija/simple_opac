SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `opac`
--

-- --------------------------------------------------------

--
-- Table structure for table `opac`
--

CREATE TABLE IF NOT EXISTS `opac` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author_surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `vendi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `botuesi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `viti` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cmimi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_fq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ill_fig_harta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isbn_issn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `callnumber` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendosja` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kodi_perdorues` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`),
  FULLTEXT KEY `author_surname` (`author_surname`),
  FULLTEXT KEY `author_name` (`author_name`),
  FULLTEXT KEY `topic` (`topic`),
  FULLTEXT KEY `vendosja` (`vendosja`),
  FULLTEXT KEY `isbn_issn` (`isbn_issn`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;