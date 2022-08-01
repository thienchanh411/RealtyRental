drop database if exists FinalProject;
create database FinalProject;
use FinalProject;

--Create Table USER
create table user (
	userID SMALLINT(5) AUTO_INCREMENT PRIMARY KEY,	
	email VARCHAR(50),
	username VARCHAR(50),
	password VARCHAR(250),			
	fullName VARCHAR(50),
	address VARCHAR(50),	
	phoneNumber VARCHAR(15),
	photoUser VARCHAR(50),
	role VARCHAR(10),
	status VARCHAR(20)		
) Engine=InnoDB;

INSERT INTO user (email, username, password, fullName, address, phoneNumber, role, status)
        VALUES ("thienchanh411@gmail.com", "thienchanh411", "$2y$10$.y3lDEaG4DiMmA3vujtDoOuUNIOhvTOLkeoVxog6AymOBQR8aYto2",
		"Thien Chanh Vo", "6691 Fulton Avenue Burnaby BC", "123-234-3456", "user", "active");
INSERT INTO user (email, username, password, fullName, address, phoneNumber, role, status)
        VALUES ("thienchanh522@gmail.com", "thienchanh522", "$2y$10$4O4oR3VtplOL//UhvRJEuOibf.VxLSBMP/6MOt3tOsQxZDYW9ZJ6q",
		"Chanh Vo", "6691 18th Avenue Burnaby BC", "234-111-0011", "owner", "inactive");
INSERT INTO user (email, username, password, fullName, address, phoneNumber, role, status)
        VALUES ("onchua2006@gmail.com", "nhattan", "$2y$10$qHoZynn6trlhiB9/.zyLFu/OL/X42ggHaxjFQn47gpzPwb6J/L/2u",
		"Nhat Tan Vu", "200 CanadaWay Avenue Burnaby BC", "778-877-7788", "owner", "active");
INSERT INTO user (email, username, password, fullName, address, phoneNumber, role, status)
        VALUES ("onchua2007@gmail.com", "nhattan1", "$2y$10$ikuSSzMM2cnfpE4Co5lLrercvxxtuANjhbc7n/ui52pnZSRCGXwry",
		"Vu Nhat Tan", "999 Kingsway Avenue Burnaby BC", "778-877-7878", "user", "active");

--Create table PROPERTY
create table postingproperty (
	postID SMALLINT(5) AUTO_INCREMENT PRIMARY KEY,	
	ownerID SMALLINT(5),
	postTitle VARCHAR(75),
	postDate date,			
	availableDate date,
	monthlyRent SMALLINT(5),	
	lengthContract TINYINT(2),
	street VARCHAR(50),			
	city VARCHAR(15),
	province VARCHAR(15),	
	type VARCHAR(15),
	area SMALLINT(5),
	numberOfBed TINYINT(2),
	numberOfBath TINYINT(2),
	numberOfGarage TINYINT(2),
	picture VARCHAR(20),
	status VARCHAR(20), 
	description VARCHAR(100),
	FOREIGN KEY (ownerID) REFERENCES user (userID) ON DELETE CASCADE ON UPDATE CASCADE		
) Engine=InnoDB;
INSERT INTO postingproperty (ownerID, postTitle, postDate, availableDate, monthlyRent, lengthContract, street, city, province, type, area, numberOfBed, numberOfBath, numberOfGarage, picture, status, description)
	VALUES (1, "New Town house for rent", "2022-06-15", "2022-06-30", 2000, 12 ,"400 Kingsway", "Burnaby", "BC", "Town house", 100, 5, 4, 1, "slider_1.jpg", "available", "New, cozy town house. Near community, bus stop, super store");
INSERT INTO postingproperty (ownerID, postTitle, postDate, availableDate, monthlyRent, lengthContract, street, city, province, type, area, numberOfBed, numberOfBath, numberOfGarage, picture, status, description)
	VALUES (3, "Furnished second floor for rent", "2022-07-15", "2022-07-15", 1800, 24, "400 Royal street", "Burnaby", "BC", "private floor", 150, 2, 3, 0, "slider_3.jpg", "available", "New, cozy private floor. Near community, bus stop, super store");
INSERT INTO postingproperty (ownerID, postTitle, postDate, availableDate, monthlyRent, lengthContract, street, city, province, type, area, numberOfBed, numberOfBath, numberOfGarage, picture, status, description)
	VALUES (3, "Full funished house for rent", "2022-06-30", "2022-07-15", 2500, 12, "123 18th street", "Burnaby", "BC", "private room", 300, 4, 4, 1, "slider_2.jpg", "available", "Comfortable, bright villa. Near library, bus stop, super store");
-- INSERT INTO property (ownerID, street, city, province, type, area, numberOfBed, numberOfBath, numberOfGarage, picture, status, description)
-- 	VALUES (3, "700 Royal street", "Burnaby", "BC", "private room", 175, 4, 3, 1, "slider_1.jpg", "available", "Vintage, bright entire hourse. Near supermarket, bus stop, community center");


--Create table POST
-- create table posting (
-- 	postID SMALLINT(5) AUTO_INCREMENT PRIMARY KEY,	
-- 	propertyID SMALLINT(5),
-- 	postTitle VARCHAR(75),
-- 	postDate date,			
-- 	availableDate date,
-- 	monthlyRent SMALLINT(5),	
-- 	lengthContract TINYINT(2), 
-- 	FOREIGN KEY (propertyID) REFERENCES property (propertyID) ON DELETE CASCADE ON UPDATE CASCADE		
-- ) Engine=InnoDB;

-- INSERT INTO posting (propertyID, postDate, postTitle,availableDate, monthlyRent, lengthContract) values (1, "2022-24-07", "Town house for rent", "2022-24-07", 2000, 24);
-- INSERT INTO posting (propertyID, postDate, postTitle,availableDate, monthlyRent, lengthContract) values (2, "2022-22-07", "Entire floor for rent", "2022-01-08", 1300, 12);
-- INSERT INTO posting (propertyID, postDate, postTitle,availableDate, monthlyRent, lengthContract) values (3, "2022-22-07", "Private room for rent", "2022-01-08", 700, 12);

--Create table TRANSACTION
create table transaction (
	transactionID SMALLINT(5) AUTO_INCREMENT PRIMARY KEY,	
	ternantID SMALLINT(5),
	postID SMALLINT(5),
	requestedDate date,			
	approvedDate date,
	status VARCHAR(15),
	FOREIGN KEY (ternantID) REFERENCES user (userID) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (postID) REFERENCES postingproperty (postID) ON DELETE CASCADE ON UPDATE CASCADE		
) Engine=InnoDB;
