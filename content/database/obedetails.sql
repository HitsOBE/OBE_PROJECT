CREATE TABLE IF NOT EXISTS `department` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `depart_code` varchar(4) collate utf8_general_ci NOT NULL,
  `depart_name` varchar(100) collate utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `programme` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `depart_code` varchar(4) collate utf8_general_ci NOT NULL,
  `programme_code` varchar(4) collate utf8_general_ci NOT NULL,
  `programme_name` varchar(100) collate utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `semester` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sem_code` varchar(4) collate utf8_general_ci NOT NULL,
  `sem_name` varchar(100) collate utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `syllabus` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) collate utf8_general_ci NOT NULL,
  `course_name` varchar(100) collate utf8_general_ci NOT NULL,
  `credit` varchar(3) collate utf8_general_ci NOT NULL,
  `depart_code` varchar(4) collate utf8_general_ci NOT NULL,
  `programme_code` varchar(4) collate utf8_general_ci NOT NULL,  
  `sem_code` varchar(4) collate utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;  

CREATE TABLE IF NOT EXISTS `workload` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `faculty_code` varchar(10) collate utf8_general_ci NOT NULL,
  `depart_code` varchar(4) collate utf8_general_ci NOT NULL,
  `programme_code` varchar(4) collate utf8_general_ci NOT NULL,  
  `sem_code` varchar(4) collate utf8_general_ci NOT NULL,
  `course_code` varchar(10) collate utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;







CREATE TABLE IF NOT EXISTS `co` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `faculty_code` varchar(10) collate utf8_general_ci NOT NULL,
  `depart_code` varchar(4) collate utf8_general_ci NOT NULL,
  `programme_code` varchar(4) collate utf8_general_ci NOT NULL,  
  `course_code` varchar(10) collate utf8_general_ci NOT NULL,
  `co_range` varchar(3) collate utf8_general_ci NOT NULL,  
  `co_outcome` varchar(200) collate utf8_general_ci NOT NULL,    
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;






  