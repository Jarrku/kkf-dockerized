--
-- Database: `kkf`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestellingen`
--

CREATE TABLE `bestellingen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(25) DEFAULT NULL,
  `geplaatstTijd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keukenTijd` datetime DEFAULT NULL,
  `soepTijd` datetime DEFAULT NULL,
  `tafelTijd` datetime DEFAULT NULL,
  `kaarten` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `vRib` int(11) DEFAULT NULL,
  `vVol` int(11) DEFAULT NULL,
  `kRib` int(11) DEFAULT NULL,
  `kVol` int(11) DEFAULT NULL,
  `soep` int(11) DEFAULT NULL,
  `tafel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `drank`
--

CREATE TABLE `drank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat1` int(11) NOT NULL,
  `cat2` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `drankprijs`
--

CREATE TABLE `drankprijs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prijs1` double NOT NULL,
  `prijs2` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `drankprijs`
--

INSERT INTO `drankprijs` (`id`, `prijs1`, `prijs2`) VALUES
(1, 1.8, 16);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datZ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(16) NOT NULL,
  `pRib` double NOT NULL,
  `pV` double NOT NULL,
  `pK` double NOT NULL,
  `pS` double NOT NULL,
  `pKa` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `datZ`, `ip`, `pRib`, `pV`, `pK`, `pS`, `pKa`) VALUES
(1, '2019-11-15 11:59:59', '192.168.1.2', 18, 16, 13, 2.5, 2);

