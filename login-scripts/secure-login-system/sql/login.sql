CREATE DATABASE login;

-- Create a user with only SELECT, UPDATE and INSERT priveleges, so in the case of a breach, the hacker won't be able to DELETE or DROP
CREATE USER 'sec_user'@'localhost' IDENTIFIED BY 'eKcGZr59zAa2BEWU';

GRANT SELECT, INSERT, UPDATE ON secure_login.* TO 'sec_user'@'localhost';

-- table users
CREATE TABLE `login`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(30) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` CHAR(128) NOT NULL
) ENGINE = InnoDB;

-- table login_attempts
CREATE TABLE `login`.`login_attempts` (
    `user_id` INT(11) NOT NULL,
    `time` VARCHAR(30) NOT NULL
) ENGINE = InnoDB;

-- tets row
INSERT INTO `login`.`users` (`username`, `email`, `password`) VALUES ('admin', 'usmaanalii@hotmail.com', 'BhGtHsUU@#11877');

INSERT INTO `login`.`users` (`username`, `email`, `password`) VALUES ('username', 'usmaanalii@hotmail.com', 'password');
