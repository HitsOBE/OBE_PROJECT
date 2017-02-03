
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `facultyid` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emailid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `facultyname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(4) COLLATE utf8_unicode_ci NOT NULL,  
  `department` varchar(4) COLLATE utf8_unicode_ci NOT NULL,    
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,      
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;


