CREATE DATABASE IF NOT EXISTS eco_project_db;

USE eco_project_db;

CREATE TABLE IF NOT EXISTS users(
    user_id int AUTO_INCREMENT NOT NULL,
    email varchar(150) NOT NULL,
    pass varchar(255) NOT NULL,
    user_type varchar(10) DEFAULT 'user',

    PRIMARY KEY (user_id)
);

INSERT INTO users (email,pass,user_type) VALUES ("test@gmail.com","81dc9bdb52d04dc20036dbd8313ed055","admin");

CREATE TABLE IF NOT EXISTS news(
    news_id int AUTO_INCREMENT NOT NULL,
    title varchar(150) NOT NULL,
    date date NOT NULL,
    email_author varchar(50) NOT NULL,
    content text NOT NULL,

    PRIMARY KEY (news_id)
);