DROP DATABASE IF EXISTS Project;
CREATE DATABASE Project;

USE Project;

CREATE TABLE `admin` (
    `adminName` VARCHAR(255),
    `password` VARCHAR(255),
     `name` VARCHAR(155)
);


CREATE TABLE `user` (
    `username` VARCHAR(100) PRIMARY KEY NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `name` VARCHAR(100),
    `email` VARCHAR(100),
    `mobileNumber` VARCHAR(100)
);


CREATE TABLE `movie` (
    `movieId` int PRIMARY KEY NOT NULL AUTO INCREMENT,
    `title` VARCHAR(100) NOT NULL,
    `length` VARCHAR(100),
    `releaseDate` DATE, 
    `price` VARCHAR(100),
    `Description` VARCHAR(600),
    `pathInfo` VARCHAR(255)
);

CREATE TABLE `ticket` (
    `username` VARCHAR(100) NOT NULL,
    `movieId` int NOT NULL,
    `movieTime` DATETIME NOT NULL,
    `seats` int NOT NULL,
    PRIMARY KEY(`username`, `movieId`, `movieTime`),
    FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE,
    FOREIGN KEY (`movieId`) REFERENCES `movie` (`movieId`) ON DELETE CASCADE
    
);

CREATE TABLE `show` (
  movieId int NOT NULL,
  showTime DATETIME NOT NULL,
  seats int NOT NULL,
  PRIMARY KEY(movieId, showTime),
  FOREIGN KEY (movieId) REFERENCES movie(movieId) ON DELETE CASCADE
);


INSERT INTO `user` VALUES('ab', '123', 'TestUser', 'testuser@gmail.com', '1234567890');
INSERT INTO `movie` VALUES(1, 'RRR', '90 minutes', '2022-04-05 10:00:00', '15', 'New South Indian Movie');
INSERT INTO `movie` VALUES(2, 'Kashmir Files', '90 minutes', '2022-04-06 10:00:00', '12', 'New South Indian Movie');
INSERT INTO `movie` VALUES(3, 'KGF 2', '80 minutes', '2022-04-08 10:00:00', '15', 'New South Indian Movie');
INSERT INTO `show` VALUES(1, '2022-04-05 12:00:00', 30);
INSERT INTO `show` VALUES(1, '2022-04-06 16:00:00', 40);
INSERT INTO `show` VALUES(2, '2022-04-05 12:00:00', 30);
INSERT INTO `show` VALUES(2, '2022-04-06 16:00:00', 40);
INSERT INTO `show` VALUES(3, '2022-04-08 12:00:00', 30);
INSERT INTO `show` VALUES(3, '2022-04-09 16:00:00', 40);
