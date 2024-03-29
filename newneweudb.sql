CREATE DATABASE test;

DROP TABLE IF EXISTS `User_tbl`;
CREATE TABLE `User_tbl` (
 MUser_ID VARCHAR (64) PRIMARY KEY,
 Email_Address VARCHAR(100),
 UPassword VARCHAR(64),
 Econ BIT(1),
 Imo BIT(1),
 SovandLaw BIT(1),
 Jobs BIT(1),
 DefenceandSecurity BIT(1),
 nochosen INT(8)
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
	FOREIGN KEY (Category_ID) REFERENCES Categories_tbl(Category_ID),
	CAWeight INT(4),
  FOREIGN KEY (MUser_ID) REFERENCES User_tbl(MUser_ID)
);
