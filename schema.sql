--
-- To use this file do either of:
-- - copy/paste all the following code into the mysql client (in terminal)
-- - $ cat schema.sql | mysql -u root
--

DROP DATABASE IF EXISTS mvc_pos;
CREATE DATABASE mvc_pos;
USE mvc_pos;

--
-- Create database tables
--
CREATE TABLE customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(255),
    gender VARCHAR(50),
    customer_since DATE
);

CREATE TABLE item (
    id INT auto_increment primary key,
    name VARCHAR(100),
    price DECIMAL(7,2)
);

CREATE TABLE invoice (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    created_at TIMESTAMP
);

CREATE TABLE invoice_item (
  invoice_id int NOT NULL,
  item_id int NOT NULL,
  quantity int DEFAULT NULL,
  PRIMARY KEY (`invoice_id`,`item_id`)
);

--
-- Insert sample data
--

INSERT INTO customer (first_name, last_name, email, gender, customer_since)
    VALUES ('kat', 'jacobs', 'k@jacobs.com', 'female', CURDATE());

INSERT INTO item (name, price) VALUES ('hammer', 17.95);

INSERT INTO invoice (customer_id, created_at) VALUES (1, NOW());

INSERT INTO invoice_item (invoice_id, item_id, quantity) VALUES (1, 1, 13);

