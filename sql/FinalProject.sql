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
	role VARCHAR(10),
	status VARCHAR(20)		
) Engine=InnoDB;

--Create table PROPERTY
create table property (
	propertyID SMALLINT(5) AUTO_INCREMENT PRIMARY KEY,	
	ownerID SMALLINT(5),
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
-- INSERT INTO property (ownerID, street, city, province, type, area, numberOfBed, numberOfBath, numberOfGarage, picture, status, description)
-- 	VALUES (1, "400 Kingsway", "Burnaby", "BC", "Town house", 100, 5, 4, 1, "slider_1.jpg", "available", "New, cozy town house. Near community, bus stop, super store");
-- INSERT INTO property (ownerID, street, city, province, type, area, numberOfBed, numberOfBath, numberOfGarage, picture, status, description)VALUES (2, "400 Canadaway", "Burnaby", "BC", "private floor", 150, 5, 3, 0, "slider_3.jpg", "available", "New, cozy private floor. Near community, bus stop, super store");
-- INSERT INTO property (ownerID, street, city, province, type, area, numberOfBed, numberOfBath, numberOfGarage, picture, status, description)VALUES (2, "123 18th street", "Burnaby", "BC", "private room", 75, 1, 1, 0, "slider_2.jpg", "available", "Comfortable, bright room. Near community, bus stop, super store");


--Create table POST
create table posting (
	postID SMALLINT(5) AUTO_INCREMENT PRIMARY KEY,	
	propertyID SMALLINT(5),
	postTitle VARCHAR(75),
	postDate date,			
	availableDate date,
	monthlyRent SMALLINT(5),	
	lengthContract TINYINT(2), 
	FOREIGN KEY (propertyID) REFERENCES property (propertyID) ON DELETE CASCADE ON UPDATE CASCADE		
) Engine=InnoDB;

-- INSERT INTO posting (propertyID, postDate, postTitle,availableDate, monthlyRent, lengthContract) values (1, "2022-24-07", "Town house for rent", "2022-24-07", 2000, 24);
-- INSERT INTO posting (propertyID, postDate, postTitle,availableDate, monthlyRent, lengthContract) values (2, "2022-22-07", "Entire floor for rent", "2022-01-08", 1300, 12);
-- INSERT INTO posting (propertyID, postDate, postTitle,availableDate, monthlyRent, lengthContract) values (3, "2022-22-07", "Private room for rent", "2022-01-08", 700, 12);

--Create table TRANSACTION
create table transaction (
	transactionID SMALLINT(5) AUTO_INCREMENT PRIMARY KEY,	
	propertyID SMALLINT(5),
	ternantID SMALLINT(5),
	postID SMALLINT(5),
	requestedDate date,			
	approvedDate date,
	status VARCHAR(15),	
	FOREIGN KEY (propertyID) REFERENCES property (propertyID) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (ternantID) REFERENCES user (userID) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (postID) REFERENCES posting (postID) ON DELETE CASCADE ON UPDATE CASCADE		
) Engine=InnoDB;
