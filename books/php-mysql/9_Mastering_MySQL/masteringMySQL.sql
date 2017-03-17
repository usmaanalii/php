 CREATE DATABASE IF NOT EXISTS transactions;

 -- 9.1 - Creating a transaction-ready table
 CREATE TABLE accounts (
     number INT, balance FLOAT, PRIMARY KEY (number)
 )
     ENGINE InnoDB;

-- 9.2 - Populating the accounts table
INSERT INTO accounts(number, balance) VALUES (12345, 1025.50);
INSERT INTO accounts(number, balance) VALUES (67890, 140.00);

-- 9.3 - A MySQL transactions
BEGIN;
UPDATE accounts SET balance = balance + 25.11 WHERE number = 12345;
COMMIT;

-- 9.4 - A Funds transfer transaction
BEGIN;
UPDATE accounts SET balance = balance - 250 WHERE number = 12345;
UPDATE accounts SET balance = balance + 250 WHERE number = 67890;

-- 9.5 - Cancelling a transaction using ROLLBACK
ROLLBACK;
