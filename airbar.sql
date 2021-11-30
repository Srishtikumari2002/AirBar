create database airbar;

use airbar;

create table users (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) not null,
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
('Puducherry',1);

create table cities (
    id int PRIMARY KEY AUTO_INCREMENT,
    c_name varchar(50) not null,
    st_id int,
    FOREIGN KEY (st_id) REFERENCES states(id)
);

INSERT INTO cities(c_name,st_id) VALUES
('Port Blair', 30),
('Visakhapatnam',1),
('Hyderabad',25),
('Guwahati',3),
('New Delhi',34),
('Dabolim',6),
('Ahmedabad',7),
('Bengaluru',12),
('Mangalore',12),
('Kochi',13),
('Kozhikode',13),
('Thiruvananthapuram',13),
('Mumbai',15),
('Nagpur',15),
('Imphal',16),
('Bhubaneswar',20),
('Amritsar',21),
('Jaipur',22),
('Chennai',24),
('Coimbatore',24),
('Tiruchirapalli',24),
('Lucknow',28),
('Varanasi',28),
('Kolkata',29),
('Gaya',4),
('Surat',7),
('Vadodara',7),
('Srinagar',10),
('Kannur',13),
('Pune',15),
('Ranchi',11),
('Siliguri',29);

create table airports (
    id int PRIMARY KEY AUTO_INCREMENT,
    ap_name varchar(255) not null,
    ct_id int,
    FOREIGN KEY (ct_id) REFERENCES cities(id)
);

Insert INTO airports(ap_name,ct_id) VALUES
('Veer Savarkar International Airport',1),
('Visakhapatnam Airport',2),
('Rajiv Gandhi International Airport',3),
('Lokpriya Gopinath Bordoloi International Airport',4),
('Indira Gandhi International Airport',5),
('Dabolim Airport (Goa International Airport)',6),
('Sardar Vallabhbhai Patel International Airport',7),
('Kempegowda International Airport',8),
('Mangalore International Airport',9),
('Cochin International Airport',10),
('Calicut International Airport	',11),
('Trivandrum International Airport',12),
('Chhatrapati Shivaji International Airport',13),
('Dr. Babasaheb Ambedkar International Airport',14),
('Tulihal Airport',15),
('Biju Patnaik International Airport',16),
('Sri Guru Ram Dass Jee International Airport',17),
('Jaipur International Airport',18),
('Chennai International Airport',19),
('Coimbatore International Airport',20),
('Tiruchirapalli International Airport',21),
('Chaudhary Charan Singh Airport',22),
('Lal Bahadur Shastri Airport',23),
('Netaji Subhash Chandra Bose International Airport',24),
('Gaya Airport',25),
('Surat International Airport',26),
('Vadodara International Airport',27),
('Sheikh ul-Alam International Airport',28),
('Kannur International Airport',29),
('Pune International Airport',30),
('Birsa Munda Airport',31),
('Bagdogra Airport',32);

create table currencies(
    id int primary key auto_increment,
    name varchar(255) not null,
    c_id int not null,
    foreign key(c_id) REFERENCES countries(id)
    );

Insert into currencies(name,c_id) values("Indian Rupees",1);