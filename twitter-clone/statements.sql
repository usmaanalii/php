CREATE DATABASE twitter_clone;

USE twitter_clone;

CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(8) NOT NULL,
    `status` ENUM('active', 'inactive') NOT NULL
) ENGINE = MYISAM;

CREATE TABLE `posts` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `body` VARCHAR(140) NOT NULL,
    `stamp` DATETIME NOT NULL
) ENGINE = MYISAM;

CREATE TABLE `following` (
    `user_id` INT NOT NULL ,
    `follower_id` INT NOT NULL,
    PRIMARY KEY (`user_id`, `follower_id`)
) ENGINE = MYISAM;


-- insert statements
INSERT INTO users VALUES (
    1,
    'jane',
    'jane@email.com',
    'password',
    'active'
);

INSERT INTO users VALUES (
    2,
    'tommy',
    'tommy@email.com',
    'password',
    'active'
);

INSERT INTO users VALUES (
    3,
    'tommy',
    'tommy@email.com',
    'password',
    'active'
);

INSERT INTO users VALUES (
    4,
    'bill',
    'bill@email.com',
    'password',
    'active'
);
