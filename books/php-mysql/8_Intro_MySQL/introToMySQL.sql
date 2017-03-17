-- 8.2 - Cancelling input from inside a stirng
this is "meaningless gibberish to mysql" \c

-- 8.3 - Creating a table called classics
CREATE TABLE classics (
    author VARCHAR(128),
    title VARCHAR(128),
    type VARCHAR(16),
    year CHAR(4)) ENGINE MyISAM;

-- 8.5 - Adding the auto-incrementing column id
ALTER TABLE classics ADD id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY;

-- 8.8 - Populating the classics table
INSERT INTO classics(author, title, type,  year)
    VALUES('Mark Twain', 'The Adventures of Tom Sawyer', 'Fiction', '1876');

INSERT INTO classics(author, title, type,  year)
    VALUES('Jane Austin', 'Pride and Prejudice', 'Fiction', '1811');

INSERT INTO classics(author, title, type,  year)
    VALUES('Charles Darwin', 'The Origin of Species', 'Non-Fiction', '1856');

INSERT INTO classics(author, title, type,  year)
    VALUES('Charles Dickens', 'The Old Curiosity Shop', 'Fiction', '1841');

INSERT INTO classics(author, title, type,  year)
    VALUES('William Shakespeare', 'Romeo and Juliet', 'Play', '1594');

-- 8.9 - Creating, viewing and deleting a table
CREATE TABLE disposable(trash INT);
DESCRIBE disposable;
DROP TABLE disposable;
SHOW tables;

-- 8.10 - Adding indexes to the classics table
ALTER TABLE classics ADD INDEX(author(20));
ALTER TABLE classics ADD INDEX(title(20));
ALTER TABLE classics ADD INDEX(category(4));
ALTER TABLE classics ADD INDEX(year);

-- 8.11 - These two commands are equivalent
ALTER TABLE classics ADD INDEX(author(20));

CREATE INDEX author ON classics (author(20));

-- 8.12 - Creating the table classics1 with indexes
CREATE TABLE classics1 (
    author VARCHAR(128),
    title VARCHAR(128),
    category VARCHAR(16),
    year SMALLINT,

    INDEX(author(20)),
    INDEX(title(20)),
    INDEX(category(4)),
    INDEX(year)) ENGINE MyISAM;

-- 8.13 - Populating the isbn column with data and using a primary key
ALTER TABLE classics ADD isbn CHAR(13);

UPDATE classics SET isbn='9781598184891' WHERE year='1876';
UPDATE classics SET isbn='9780582506206' WHERE year='1811';
UPDATE classics SET isbn='9780517123201' WHERE year='1856';
UPDATE classics SET isbn='9780099533474' WHERE year='1841';
UPDATE classics SET isbn='9780192814968' WHERE year='1594';
ALTER TABLE classics ADD PRIMARY KEY(isbn);

-- 8.14 - Creating the table classics with a primary key
CREATE TABLE classics (
    author VARCHAR(128),
    title VARCHAR(128),
    category VARCHAR(16),
    year SMALLINT,

    INDEX(author(20)),
    INDEX(title(20)),
    INDEX(category(4)),
    INDEX(year)
    PRIMARY KEY(isbn)) ENGINE MyISAM;

-- 8.15 - Adding a FULLTEXT index to the table classics
ALTER TABLE classics ADD FULLTEXT(author, title);

-- 8.16 - Two different SELECT statements
SELECT author, title FROM classics;
SELECT title, isbn FROM classics;

-- 8.17 - Counting rows
SELECT COUNT(*) FROM classics;

-- 8.18 - Duplicating data
INSERT INTO classics(author, title, category, year, isbn)
    VALUES ('Charles Dickens', 'Little Dorrit', 'Fiction', '1857', '9780141439969');

-- 8.19 - With and Without the DISTINCT qualifier
SELECT author FROM classics;

SELECT DISTINCT author FROM classics;

-- 8.20 - Removing the new entry
DELETE FROM classics WHERE title = 'Little Dorrit';

-- 8.21 - Using the WHERE keyword
SELECT author, title FROM classics WHERE author = 'Mark Twain';
SELECT author, title FROM classics WHERE isbn = isbn="9781598184891 ";

-- 8.22 - Using the LIKE qualifier
SELECT author, title FROM classics WHERE author LIKE "Charles%";
SELECT author, title FROM classics WHERE title LIKE "%Species";
SELECT author, title FROM classics WHERE title LIKE "%and%";

-- 8.23 - Limiting the number of results returned
SELECT author, title FROM classics LIMIT 3;
SELECT author, title FROM classics LIMIT 1, 2;
SELECT author, title FROM classics LIMIT 3, 1;

-- 8.24 - Using MATCH...AGAINST on FULLTEXT indexes
SELECT author, title FROM classics
    WHERE MATCH(author, title) AGAINST('and');

SELECT author, title FROM classics
    WHERE MATCH(author, title) AGAINST('curiosity shop');

SELECT author, title FROM classics
    WHERE MATCH(author, title) AGAINST('tom sawyer');
