drop database if exists FinalProject;
create database FinalProject;
use FinalProject;

--Create Table USER
create table user (
	userID SMALLINT(5) AUTO_INCREMENT PRIMARY KEY,	
	email VARCHAR(50),
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
	numberOfRoom TINYINT(2),
	status VARCHAR(20), 
	description VARCHAR(100),
	FOREIGN KEY (ownerID) REFERENCES user (userID) ON DELETE CASCADE ON UPDATE CASCADE		
) Engine=InnoDB;

--Create table POST
create table posting (
	postID SMALLINT(5) AUTO_INCREMENT PRIMARY KEY,	
	propertyID SMALLINT(5),
	postDate date,			
	availableDate date,
	monthlyRent SMALLINT(5),	
	lengthContract TINYINT(2), 
	FOREIGN KEY (propertyID) REFERENCES property (propertyID) ON DELETE CASCADE ON UPDATE CASCADE		
) Engine=InnoDB;

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
