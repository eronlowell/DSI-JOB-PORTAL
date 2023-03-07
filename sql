CREATE TABLE `Student` (
  `studentID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255),
  `Password` varchar(255),
  `studentName` varchar(255),
  `Address` varchar(255),
  `contactNo` varchar(255),
  `dateofBirth` date,
  `Gender` varchar(255),
  `Bio` varchar(255),
  PRIMARY KEY (`studentID`)
);

CREATE TABLE `Experience` (
  `jobYear` date,
  `Company Name` varchar(50),
  `studentID` int,
  `Job Title` int,
  PRIMARY KEY (`Job Title`),
  FOREIGN KEY (`studentID`) REFERENCES `Student`(`studentID`)
);

CREATE TABLE `Educational Background` (
  `eduYear` date,
  `School name` varchar(50),
  `studentID` int,
  `Degree` varchar(255),
  `EBID` Type,
  PRIMARY KEY (`EBID`),
  FOREIGN KEY (`studentID`) REFERENCES `Student`(`studentID`)
);

