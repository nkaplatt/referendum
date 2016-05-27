CREATE DATABASE test;

DROP TABLE IF EXISTS `User_tbl`;
CREATE TABLE `User_tbl` (
 MUser_ID VARCHAR (64) PRIMARY KEY,
 Email_Address VARCHAR(100),
 UPassword VARCHAR(64),
 Trade INT(1) DEFAULT '0',
 Imo INT(1) DEFAULT '0',
 SovandLaw INT(1) DEFAULT '0',
 Jobs INT(1) DEFAULT '0',
 DefenceandSecurity INT(1) DEFAULT '0',
 Education INT(1) DEFAULT '0',
 NHS INT(1) DEFAULT '0',
 Environment INT(1) DEFAULT '0',
 Economy INT(1) DEFAULT '0',
 Leavee INT(1) DEFAULT '0',
 Stay INT(1) DEFAULT '0',
 Nochosen INT(8) DEFAULT '0',
 LoggedIN INT(1) DEFAULT '0'
);

DROP TABLE IF EXISTS `Intro_tbl`;
CREATE TABLE `Intro_tbl` (
 Intro_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 MUser_ID VARCHAR (64),
 Emoticon_Number INT,
 Emoticon_Type INT,
 Choice_Number INT, 
 Choice_Type INT(4),
 FOREIGN KEY (MUser_ID) REFERENCES User_tbl(MUser_ID)
 ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `Mailing_list`;
CREATE TABLE `Mailing_list` (
 Email_Address VARCHAR(100) NOT NULL PRIMARY KEY
);


DROP TABLE IF EXISTS `Categories_tbl`;
CREATE TABLE `Categories_tbl` (
  Category_ID INT NOT NULL PRIMARY KEY,
  Name VARCHAR(10),
  CWeight INT(10),
  No_Of_SubCards INT(10)
);

DROP TABLE IF EXISTS `Card_tbl`;
CREATE TABLE `Card_tbl` (
  Card_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  MUser_ID VARCHAR (64),
  Emoticon_Number INT NOT NULL,
  Emoticon_Type INT NOT NULL,
  Category_ID INT NOT NULL,
  FOREIGN KEY (Category_ID) REFERENCES Categories_tbl(Category_ID)
  ON UPDATE CASCADE,
  CAWeight INT(4),
  FOREIGN KEY (MUser_ID) REFERENCES User_tbl(MUser_ID)
  ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `Vote_tbl`;
CREATE TABLE `Vote_tbl` (
  Vote_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  MUser_ID VARCHAR (64),
  Choice_Number INT NOT NULL, 
  Choice_Type INT(4), 
  Category_ID INT NOT NULL,
  FOREIGN KEY (Category_ID) REFERENCES Categories_tbl(Category_ID)
  ON UPDATE CASCADE,
  CAWeight INT(4),
  FOREIGN KEY (MUser_ID) REFERENCES User_tbl(MUser_ID)
  ON UPDATE CASCADE
);
