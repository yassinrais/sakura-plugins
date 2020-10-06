CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `source` text COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(300) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `token` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_ip` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_ip` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;