
DROP TABLE IF EXISTS `cases`;
CREATE TABLE IF NOT EXISTS `cases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `case_number` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `title` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `is_open` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'marchi', 'danielmarchi.tech@gmail.com', '123456'),
(4, 'haim', 'kim@gmail.com', '123456');
COMMIT;
