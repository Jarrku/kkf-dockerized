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
  `vNat` int(11) DEFAULT NULL,
  `vCur` int(11) DEFAULT NULL,
  `vPro` int(11) DEFAULT NULL,
  `vApp` int(11) DEFAULT NULL,
  `kNat` int(11) DEFAULT NULL,
  `kCur` int(11) DEFAULT NULL,
  `kPro` int(11) DEFAULT NULL,
  `kApp` int(11) DEFAULT NULL,
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
  `cat3` int(11) NOT NULL,
  `cat4` int(11) NOT NULL,
  `cat5` int(11) NOT NULL,
  `cat6` int(11) NOT NULL,
  `cat7` int(11) NOT NULL,
  `cat8` int(11) NOT NULL,
  `cat9` int(11) NOT NULL,
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
  `prijs3` double NOT NULL,
  `prijs4` double NOT NULL,
  `prijs5` double NOT NULL,
  `prijs6` double NOT NULL,
  `prijs7` double NOT NULL,
  `prijs8` double NOT NULL,
  `prijs9` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `drankprijs`
--

INSERT INTO `drankprijs` (`id`, `prijs1`, `prijs2`, `prijs3`, `prijs4`, `prijs5`, `prijs6`, `prijs7`, `prijs8`, `prijs9`) VALUES
(1, 2, 2.8, 1.6, 1.7, 2, 3, 16, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datZ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(16) NOT NULL,
  `pV` double NOT NULL,
  `pK` double NOT NULL,
  `pS` double NOT NULL,
  `pKa` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `datZ`, `ip`, `pV`, `pK`, `pS`, `pKa`) VALUES
(1, '2015-02-28 22:59:59', '192.168.1.2', 14, 10, 2.5, 2);

