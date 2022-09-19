CREATE DATABASE pickmeditime;
CREATE TABLE book_appoinment (
    your_name  varchar(100) NOT NULL,
    your_index  int(10) NOT NULL,
    your_contact_number  bigint(10) NOT NULL,
    email varchar(50) NOT NULL,
    date date NOT NUL
    PRIMARY KEY (your_index),
);