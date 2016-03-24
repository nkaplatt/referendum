
CREATE TABLE User_tbl (
 Session_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 Email_Address VARCHAR(25),
 First_Name VARCHAR(25),
 Last_Name VARCHAR(25),
 Post_Code VARCHAR(25),
 AGE INT(3)
);

CREATE TABLE Categories_tbl (
	Category_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Name VARCHAR(10),
	Weight INT(10),
	No_Of_SubCards INT(10)
);

CREATE TABLE Card_tbl (
	Card_ID INT NOT NULL PRIMARY KEY,
    Category_ID INT NOT NULL,
	FOREIGN KEY (Category_ID) REFERENCES Categories_tbl(Category_ID),
	IS_STARRED TINYINT(1)
);

CREATE TABLE Footprint_tbl (
	Footprint_ID INT NOT NULL PRIMARY KEY,
    Session_ID INT NOT NULL,
    FOREIGN KEY (Session_ID) REFERENCES User_tbl(Session_ID),
    Category_ID INT NOT NULL,
    FOREIGN KEY (Category_ID) REFERENCES Categories_tbl(Category_ID),
    Card_ID INT NOT NULL,
	FOREIGN KEY (Card_ID) REFERENCES Card_tbl(Card_ID),
	Option_chosen INT(3)
);

CREATE INDEX Session_Index ON Footprint_tbl (Sessions_ID);