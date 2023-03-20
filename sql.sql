CREATE TABLE `Student` (
  `studentID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255),
  `Password` varchar(255),
  `studentFirstName` varchar(255),
  `studentLastName` varchar(255),
  `ProfilePicture` varchar(255),
  `Address` varchar(255),
  `contactNo` varchar(255),
  `dateofBirth` date,
  `Gender` varchar(255),
  `Bio` varchar(255),
  PRIMARY KEY (`studentID`)
);

CREATE TABLE studentCV (
   `studentID` int,
    `cvName` VARCHAR(255) NOT NULL,
    `cvType` VARCHAR(50) NOT NULL,
    `cvSize` INT(11) NOT NULL,
    `cvData` LONGBLOB NOT NULL,
    PRIMARY KEY (`cvName`),
    FOREIGN KEY (`studentID`) REFERENCES `Student`(`studentID`)
);

ALTER TABLE `Student` MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2160;

CREATE TABLE `jobExp` (
  `jobTitle` int,
  `companyName` varchar(50),
  `jobYear` date,
  `studentID` int,
  PRIMARY KEY (`jobTitle`),
  FOREIGN KEY (`studentID`) REFERENCES `Student`(`studentID`)
);

CREATE TABLE `eduBackground` (
  `Degree` varchar(255),
  `schoolName` varchar(50),
  `eduYear` date,
  `studentID` int,
  PRIMARY KEY (`Degree`),
  FOREIGN KEY (`studentID`) REFERENCES `Student`(`studentID`)
);

CREATE TABLE `jobpost` (
  `id` int(11) NOT NULL,
  `company_logo` varchar(100) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `skills` varchar(50) NOT NULL,
  `job_type` enum('Full-time','Part-time','Internship') NOT NULL,
  `salary` int(20) NOT NULL,
  `positions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

