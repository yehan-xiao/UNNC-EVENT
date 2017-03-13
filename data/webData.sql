
CREATE TABLE IF NOT EXISTS `Web_Admin` (
  `aID` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `aName` varchar(20) NOT NULL UNIQUE,
  `aPassword` varchar(60) NOT NULL,
  `aPhoneNumber` varchar(40) NOT NULL,
  `aEmail` varchar(50) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `Web_Event` (
  `eID` int unsigned AUTO_INCREMENT PRIMARY KEY,
  `eTitle` text NOT NULL,
  `startdt` datetime NOT NULL,
  `enddt` datetime NOT NULL,
  `eDesc` text NOT NULL,
  `eLocation` text NOT NULL,
  `eCapacity` int unsigned NOT NULL
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `Web_User` (
  `uID` int unsigned AUTO_INCREMENT PRIMARY KEY,
  `uName` varchar(20) NOT NULL UNIQUE,
  `uPassword` varchar(60) NOT NULL,
  `uPhoneNumber` varchar(40) NOT NULL,
  `uEmail` varchar(50) NOT NULL
) ENGINE=InnoDB;



CREATE TABLE IF NOT EXISTS `Web_UAE` (
  `ID` int unsigned AUTO_INCREMENT PRIMARY KEY,
  `uID` int unsigned NOT NULL,
  `eID` int unsigned NOT NULL,
  CONSTRAINT user_fk FOREIGN KEY (uID) REFERENCES Web_User (uID) 
  ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT event_fk FOREIGN KEY (eID) REFERENCES Web_Event (eID) 
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

  INSERT INTO `Web_Admin`
  (`aName`, `aPassword`, `aPhoneNumber`, `aEmail`) 
  VALUES ('admin','202cb962ac59075b964b07152d234b70','17858950850','zy15784@nottingham.edu.cn');



