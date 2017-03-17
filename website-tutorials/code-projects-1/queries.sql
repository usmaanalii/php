-- users table
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY (id) -- need to specify key with auto_increment
);

-- list table
CREATE TABLE list (
    id INT NOT NULL AUTO_INCREMENT,
    details TEXT NOT NULL,
    date_posted VARCHAR(30) NOT NULL,
    time_posted TIME NOT NULL,
    date_edited VARCHAR(30) NOT NULL,
    time_edited TIME NOT NULL,
    public VARCHAR(5) NOT NULL,
    PRIMARY KEY (id)
);
