CREATE TABLE `Student` (
  `studentID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255),
  `Password` varchar(255),
  `studentName` varchar(255),
  `studentAge` int,
  `Address` varchar(255),
  `contactNo` varchar(255),
  `dateofBirth` date,
  `Gender` varchar(255),
  `Bio` varchar(255),
  PRIMARY KEY (`studentID`)
);

ALTER TABLE `Student` MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2160;

CREATE TABLE `jobExp` (
  `jobYear` date,
  `companyName` varchar(50),
  `studentID` int,
  `jobTitle` int,
  PRIMARY KEY (`Job Title`),
  FOREIGN KEY (`studentID`) REFERENCES `Student`(`studentID`)
);

CREATE TABLE `eduBackground` (
  `eduYear` date,
  `schoolName` varchar(50),
  `studentID` int,
  `Degree` varchar(255),
  PRIMARY KEY (`Degree`),
  FOREIGN KEY (`studentID`) REFERENCES `Student`(`studentID`)
);

