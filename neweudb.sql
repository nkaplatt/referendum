CREATE DATABASE EU_db;
DROP TABLE IF EXISTS `User_tbl`;
CREATE TABLE `User_tbl` (
 MUser_ID VARCHAR (64) PRIMARY KEY,
 Email_Address VARCHAR(100),
 UPassword VARCHAR(20),
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
	Card_ID INT NOT NULL PRIMARY KEY,
	FOREIGN KEY gg (Category_ID) REFERENCES Categories_tbl(Category_ID),
	CAWeight INT(4)
);

DROP TABLE IF EXISTS `Foot_Print__tbl`;
CREATE TABLE `Foot_Print_tbl` (
	Footprint_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FOREIGN KEY (MUser_ID) REFERENCES User_tbl(MUser_ID),
	FOREIGN KEY (Category_ID) REFERENCES Categories_tbl(Category_ID),
	FOREIGN KEY (Card_ID) REFERENCES Card_tbl(Card_ID),
	Option_chosen INT(3)
);

CREATE INDEX User_index
ON Foot_Print_tbl (MUser_ID);