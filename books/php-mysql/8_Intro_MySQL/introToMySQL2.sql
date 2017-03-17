-- 8.25 - Using MATCH..AGAINST..in Boolean Mode
SELECT author, title FROM classics
    WHERE MATCH(author, title)
        AGAINST('+charles -species' in BOOLEAN MODE);

SELECT author, title FROM classics
    WHERE MATCH(author, title)
        AGAINST('"origin of"' in BOOLEAN MODE);

--8.26 - Using UPDATE..SET
UPDATE classics SET author = 'Mark Twain (Samuel Langhorne Clements)'
    WHERE author = 'Mark Twain';

UPDATE classics SET category = 'Classic Fiction'
    WHERE category = 'Fiction';

-- 8.27 - Using ORDER BY
SELECT author, title FROM classics ORDER BY author;
SELECT author, title FROM classics ORDER BY title DESC;

-- 8.28 - Creating and populating the customers table
CREATE TABLE customers (
    name VARCHAR(128),
    isbn VARCHAR(13),
    PRIMARY KEY (isbn)) ENGINE MyISAM;

INSERT INTO customers(name,isbn)
    VALUES('Joe Bloggs','9780099533474');
INSERT INTO customers(name,isbn)
    VALUES('Mary Smith','9780582506206');
INSERT INTO customers(name,isbn)
    VALUES('Jack Wilson','9780517123201');

-- 8.29 - Joining two tables into a single SELECT
SELECT name, author, title FROM customers, classics
    WHERE customers.isbn = classics.isbn;

-- 8.30 - Using logical operators
SELECT author, title FROM classics
    WHERE author LIKE "Charles%" AND author LIKE "%Darwin";

SELECT author, title FROM classics
    WHERE author LIKE "%Mark Twain%" OR author LIKE "%Samuel Langhorne Clements%";

SELECT author, title FROM classics
    WHERE author LIKE "Charles%" AND author NOT LIKE "%Darwin";
