START TRANSACTION;
DROP DATABASE IF EXISTS ep_charity;
-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS ep_charity;

USE ep_charity;
--
-- CREATE TABLES
--
CREATE TABLE `Role` (
	roleId INT NOT NULL AUTO_INCREMENT,
  roleName varchar(50) NOT NULL,
  
  PRIMARY KEY (roleId),
  CONSTRAINT CHK_Role CHECK (roleName='company' OR roleName='staff')
);

CREATE TABLE `Account` (
	accountId INT NOT NULL AUTO_INCREMENT,
  emailAddress VARCHAR(50) NOT NULL,
  firstName VARCHAR(50),
  lastName VARCHAR(50),
  contactNumber VARCHAR(50),
  roleId INT NOT NULL,
  
  PRIMARY KEY (accountId)
);

CREATE TABLE `Staff` (
	staffId INT NOT NULL AUTO_INCREMENT,
	address VARCHAR(255),
  gender VARCHAR(10) ,
  skills VARCHAR(255),
  interests VARCHAR(255),
  recognition VARCHAR(255),
  image VARCHAR(255),
  accountId INT NOT NULL,
  
  PRIMARY KEY(staffId)
);

CREATE TABLE `Company` (
	companyId INT NOT NULL AUTO_INCREMENT,
  companyName VARCHAR(255),
  website VARCHAR(255),
  image VARCHAR(255),
  accountId INT NOT NULL,
  
  PRIMARY KEY(companyId)
);

CREATE TABLE `Event` (
	eventId INT NOT NULL AUTO_INCREMENT,
  description VARCHAR(2000),
  location VARCHAR(255),
  startDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  endDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  volunteerQuantity INT,
  category VARCHAR(255),
  eventStatus VARCHAR(20),
  
  PRIMARY KEY(eventId)
);

CREATE TABLE `AccountEvent` (
	eventId INT NOT NULL,
  accountId INT NOT NULL,
  accountEventStatus VARCHAR(20),
  
  PRIMARY KEY(eventId, accountId)
);


CREATE TABLE `Review` (
	reviewId INT NOT NULL AUTO_INCREMENT,
  eventId INT NOT NULL,
  accountId INT NOT NULL,
  rating INT,
  message VARCHAR(2000),
  
  PRIMARY KEY(reviewId)
);
--
-- CREATE RELATIONSHIPS
--
ALTER TABLE `Account`
ADD FOREIGN KEY (roleId) REFERENCES Role(roleId);

ALTER TABLE `Staff`
ADD FOREIGN KEY (accountId) REFERENCES Account(accountId);

ALTER TABLE `Company`
ADD FOREIGN KEY (accountId) REFERENCES Account(accountId);

ALTER TABLE `Review`
ADD FOREIGN KEY (accountId) REFERENCES Account(accountId),
ADD FOREIGN KEY (eventId) REFERENCES Event(eventId);

ALTER TABLE `AccountEvent`
ADD FOREIGN KEY (eventId) REFERENCES Event(eventId),
ADD FOREIGN KEY (accountId) REFERENCES Account(accountId);

--
-- MOCK DATA
--
-- Role
INSERT INTO `Role`(`roleName`) VALUES('company'), ('staff');
--
