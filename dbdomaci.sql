
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+01:00";


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'test', 'test@testmail.com', '202cb962ac59075b964b07152d234b70');
