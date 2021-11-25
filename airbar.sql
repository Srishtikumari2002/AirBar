create database airbar;
use airbar;
create table users (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) not null;
email varchar(255) not null unique,
psd varchar(255) not null
);

create table countries (
    id int PRIMARY KEY AUTO_INCREMENT,
    cn_name varchar(55) unique not null
);

INSERT INTO countries(cn_name) VALUES('India');


CREATE TABLE states (
    id int PRIMARY KEY AUTO_INCREMENT,
    st_name varchar(50) not null,
    cn_id int,
    FOREIGN KEY (cn_id) REFERENCES countries(id)
);

INSERT INTO states (st_name, cn_id) VALUES 
('Andhra Pradesh',1),
('Arunachal Pradesh',1),
('Assam',1),
('Bihar',1),
('Chhattisgarh',1),
('Goa',1),
('Gujarat',1),
('Haryana',1),
('Himachal Pradesh',1),
('Jammu and Kashmir',1),
('Jharkhand',1),
('Karnataka',1),
('Kerala',1),
('Madhya Pradesh',1),
('Maharashtra',1),
('Manipur',1),
('Meghalaya',1),
('Mizoram',1),
('Nagaland',1),
('Odisha',1),
('Punjab',1),
('Rajasthan',1),
('Sikkim',1),
('Tamil Nadu',1),
('Telangana',1),
('Tripura',1),
('Uttarakhand',1),
('Uttar Pradesh',1),
('West Bengal',1),
('Andaman and Nicobar Islands',1),
('Chandigarh',1),
('Dadra and Nagar Haveli',1),
('Daman and Diu',1),
('Delhi',1),
('Lakshadweep',1),
('Puducherry',1)