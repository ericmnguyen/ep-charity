START TRANSACTION;
-- DROP DATABASE IF EXISTS ep_charity;
-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS db_22074118;

USE db_22074118;
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
  gender VARCHAR(10),
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
    eventStatus ENUM('Published', 'Finished') DEFAULT 'Published' NOT NULL,

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
INSERT INTO `Role` (`roleId`, `roleName`) VALUES
(1, 'company'),
(2, 'staff');

-- Pa$$w0rd! (with the exclamation marks)
INSERT INTO `Account` (`accountId`, `emailAddress`, `password`, `firstName`, `lastName`, `contactNumber`, `createdDate`, `roleId`) VALUES
(1, 'company1@example.com', '$2y$10$QW1KkpcRfd8udZ95XXWu9.qFfIGBQvWJHBmvHBik1iJXxxCBj15ju', 'Porter', 'Schneider', '0111111111', '2024-06-03 08:40:57', 1),
(2, 'volunteer1@example.com', '$2y$10$QHTuBe646wePZhrUaZlszOKNkKsMBkVFE26EukyGn6UGeysIaMPi2', 'Myra', 'Franks', '0415248779', '2024-06-03 08:48:35', 2),
(3, 'volunteer2@example.com', '$2y$10$DfOIV4sYWmUm83xBT/sPk.Yu.cUTiDBj.N8PtZRpMX/g3RIWZggs6', 'Oprah', 'Mcneil', '0468799665', '2024-06-03 08:49:15', 2),
(4, 'company2@example.com', '$2y$10$pm8t9Fa.NiMPWg.bhbPXvOwDKBnAA8kYiTJJldJ9BV3.gP0HVcpaO', 'Claudia', 'Avila', '541', '2024-06-03 08:49:59', 1);

INSERT INTO `Company` (`companyId`, `companyName`, `website`, `image`, `accountId`) VALUES
(1, 'Helping Hands Foundation', 'https://www.zic.tv', NULL, 1),
(2, 'Community Care Initiatives', 'https://www.pezynuvuxe.in', NULL, 4);

INSERT INTO `Staff` (`staffId`, `address`, `dateOfBirth`, `gender`, `skills`, `interests`, `recognition`, `image`, `accountId`) VALUES
(1, NULL, '1995-04-21', NULL, NULL, NULL, NULL, NULL, 2),
(2, NULL, '1990-02-04', NULL, NULL, NULL, NULL, NULL, 3);


INSERT INTO `Event` (`eventId`,`eventName`, `description`, `eventType`, `startDate`, `endDate`, `startTime`, `endTime`, `venueName`, `address`, `locationType`, `maxAttendees`, `createdAt`, `eventStatus`, `accountId`) VALUES
(1, 'Community Clean-Up', 'Join us for a day of cleaning and beautifying our local park. Volunteers needed for various tasks.', 'Outdoor', '2024-07-10', '2024-07-10', '09:00:00', '14:00:00', 'Greenfield Park', '123 Park Lane', 'In-Person', 50, '2024-06-03 12:00:00', 'Published', 1),
(2, 'Food Bank Distribution', 'Help distribute food to families in need. Volunteers will assist with sorting and handing out food.', 'Food Distribution', '2024-07-15', '2024-07-15', '08:00:00', '12:00:00', 'Community Food Bank', '456 Main St', 'In-Person', 30, '2024-06-03 12:05:00', 'Published', 1),
(3, 'Senior Home Visit', 'Spend time with seniors, play games, and assist with activities at the local senior home.', 'Social Engagement', '2024-07-20', '2024-07-20', '10:00:00', '13:00:00', 'Sunnydale Senior Home', '789 Elm St', 'In-Person', 20, '2024-06-03 12:10:00', 'Published', 1),
(4, 'Environmental Awareness Workshop', 'Help educate the community about environmental sustainability and green practices.', 'Workshop', '2024-07-25', '2024-07-25', '11:00:00', '15:00:00', 'Eco Center', '321 River Rd', 'In-Person', 40, '2024-06-03 12:15:00', 'Published', 1),
(5, 'Animal Shelter Assistance', 'Assist with cleaning, feeding, and caring for animals at the local shelter.', 'Animal Care', '2024-08-01', '2024-08-01', '09:00:00', '12:00:00', 'Happy Tails Shelter', '654 Paws Ave', 'In-Person', 25, '2024-06-03 12:20:00', 'Published', 1),
(6, 'Charity Fun Run', 'Volunteer to help organize and manage our annual charity fun run. Roles include registration, water stations, and more.', 'Event Management', '2024-08-05', '2024-08-05', '06:00:00', '12:00:00', 'City Park', '987 Run Rd', 'In-Person', 100, '2024-06-03 12:25:00', 'Published', 4),
(7, 'Homeless Shelter Dinner Service', 'Help prepare and serve dinner to the homeless at our local shelter.', 'Meal Service', '2024-08-10', '2024-08-10', '17:00:00', '20:00:00', 'Hope Shelter', '123 Hope St', 'In-Person', 15, '2024-06-03 12:30:00', 'Published', 4),
(8, 'Blood Donation Drive', 'Assist with organizing and managing a blood donation drive. Volunteers will help with registration and donor care.', 'Health Service', '2024-08-15', '2024-08-15', '09:00:00', '15:00:00', 'Community Health Center', '456 Health Blvd', 'In-Person', 10, '2024-06-03 12:35:00', 'Published', 4),
(9, 'Youth Mentoring Program', 'Become a mentor for at-risk youth, helping them with schoolwork and providing guidance.', 'Mentorship', '2024-08-20', '2024-08-20', '14:00:00', '17:00:00', 'Youth Center', '789 Future St', 'In-Person', 20, '2024-06-03 12:40:00', 'Published', 4),
(10,  'Community Garden Project', 'Help plant, weed, and maintain the community garden. Great for those who love gardening.', 'Gardening', '2024-08-25', '2024-08-25', '08:00:00', '12:00:00', 'Community Garden', '321 Green St', 'In-Person', 35, '2024-06-03 12:45:00', 'Published', 4);

INSERT INTO `AccountEvent` (`eventId`, `accountId`, `accountEventStatus`) VALUES
(2, 2, 'Applied');
