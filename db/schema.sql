### Schema

DROP DATABASE IF EXISTS cms;

CREATE DATABASE cms;

USE cms;

CREATE TABLE users (
    user_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(15),
    user_firstname VARCHAR(100),
    user_lastname VARCHAR(100),
    user_email VARCHAR(100),
    user_password VARCHAR(100),
    user_image VARCHAR(255),
    user_role VARCHAR(100),
    user_createdon DATE,
    randSalt VARCHAR(255)
);

CREATE TABLE posts (
    post_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    post_title VARCHAR(100),
    post_author VARCHAR(100),
    post_category_id INT,
    post_status VARCHAR(100),
    post_image VARCHAR(255),
    post_tags VARCHAR(255),
    post_content TEXT,
    post_comment_count INT,
    post_date DATE
);

CREATE TABLE categories (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cat_title VARCHAR(100)
);

CREATE TABLE comments (
    comment_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    comment_post_id INT,
    comment_author VARCHAR(100),
    comment_content TEXT,
    comment_email VARCHAR(100),
    comment_status VARCHAR(100),
    comment_date DATE
);