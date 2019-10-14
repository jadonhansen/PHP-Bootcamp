CREATE DATABASE `e-commerce`;

CREATE TABLE admin_users (
    username_user varchar(20) NOT NULL,
    password_user LONGTEXT NOT NULL,
    PRIMARY KEY (`username_user`)
);

CREATE TABLE users (
    username_user varchar(20) NOT NULL,
    password_user LONGTEXT NOT NULL,
    name_user TINYTEXT NOT NULL,
    surname_user TINYTEXT NOT NULL,
    PRIMARY KEY (`username_user`)
);

CREATE TABLE user_cart (
    username varchar(20) NOT NULL,
    product TINYTEXT NOT NULL,
    amount int(3) NOT NULL,
    price_per int(10) NOT NULL,
    PRIMARY KEY (`username`)
);

INSERT INTO admin_users (username_user, password_user)
VALUES  ('jhansen', '1234'),
        ('hdevos', '1234');