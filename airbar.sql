create database airbar;
use airbar;
create table users (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) not null;
email varchar(255) not null unique,
psd varchar(255) not null
);