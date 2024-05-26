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
  password VARCHAR(250) NOT NULL,
  firstName VARCHAR(50),
  lastName VARCHAR(50),
  contactNumber VARCHAR(50),
  createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  roleId INT NOT NULL,
  
  PRIMARY KEY (accountId)
);

CREATE TABLE `Staff` (
	staffId INT NOT NULL AUTO_INCREMENT,
	address VARCHAR(255),
  dateOfBirth DATE,
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

-- CREATE TABLE `Event` (
-- 	eventId INT NOT NULL AUTO_INCREMENT,
--   description VARCHAR(2000),
--   location VARCHAR(255),
--   startDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   endDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   volunteerQuantity INT,
--   category VARCHAR(255),
--   eventStatus VARCHAR(20),
  
--   PRIMARY KEY(eventId)
-- );


CREATE TABLE `Event` (
    eventId INT AUTO_INCREMENT NOT NULL,
    eventName VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    eventType VARCHAR(100) NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    startTime TIME NOT NULL,
    endTime TIME NOT NULL,
    venueName VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    locationType ENUM('In-Person', 'Online', 'Hybrid') NOT NULL,
    maxAttendees INT NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    eventStatus ENUM('Published', 'Ongoing', 'Finished') DEFAULT 'Published' NOT NULL,

    accountId INT NOT NULL, 

    PRIMARY KEY(eventId),
    FOREIGN KEY(accountId) REFERENCES Account(accountId) 
);

-- for volunteers and events
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
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
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
-- events of commbank
INSERT INTO `Event`(`eventName`, `description`, `eventType`, `startDate`, `endDate`, `startTime`, `endTime`, 
`venueName`, `address`, `locationType`, `maxAttendees`, `accountId`)
VALUES('Event name', 'this is description', 'Type', '2024/05/16', '2024/05/17', '06:00:00', '22:00:00', 'ICC',
'5 Smith St, NSW', 'In-person', 20, 2);
INSERT INTO `Event`(`eventName`, `description`, `eventType`, `startDate`, `endDate`, `startTime`, `endTime`, 
`venueName`, `address`, `locationType`, `maxAttendees`, `accountId`)
VALUES('Event 2 bla', 'blablbalblab', 'conf', '2024/07/16', '2024/07/17', '06:00:00', '22:00:00', 'CBD',
'65 Smith St, NSW', 'Online', 50, 2);
-- events of woolies group
INSERT INTO `Event`(`eventName`, `description`, `eventType`, `startDate`, `endDate`, `startTime`, `endTime`, 
`venueName`, `address`, `locationType`, `maxAttendees`, `accountId`)
VALUES('Event woolies', 'description woolies', 'catering', '2024/06/12', '2024/06/14', '06:00:00', '23:59:00', 'West Ryde',
'10 David Rd, NSW', 'Hybrid', 50, 3);