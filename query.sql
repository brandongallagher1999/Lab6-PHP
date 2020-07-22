CREATE DATABASE COMP1006_SUMMER2020; 
USE COMP1006_SUMMER2020; 
CREATE TABLE `persons_new` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar (100) NOT NULL,
  `email` varchar (100) NOT NULL,
  PRIMARY KEY (user_id)
);
-- THIS QUERY IS NEEDED BELOW
INSERT INTO "persons_new"
VALUES (
  1,
  "cryptoguys",
  "password",
  "brandon",
  "gallagher",
  "brandonegallagher@gmail.com"
);