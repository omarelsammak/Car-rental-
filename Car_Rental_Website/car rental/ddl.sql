CREATE DATABASE car_rental_system;

CREATE DATABASE car_rental_system;

use car_rental_system;
CREATE TABLE  car(
    plate_no varchar(7) PRIMARY KEY,
	model varchar(250) not null,
  `year` int,
  color varchar(250) not null,
    transmission varchar(250) not null ,
    `status` ENUM ('ACTIVE','OUT_OF_SERVICE'),
     office_id int ,
    priceperday double,
    image text 
);

CREATE TABLE  office(
    office_id int not null PRIMARY key AUTO_INCREMENT,
    location varchar(250) not null,
    name varchar(250) not null
);

CREATE TABLE  reservation(
    reservation_id int not null AUTO_INCREMENT PRIMARY KEY,
    plate_no varchar(7) ,
    start_date DATETIME DEFAULT CURRENT_TIMESTAMP ,
    end_date DATETIME DEFAULT CURRENT_TIMESTAMP ,
    customer_ssn int ,
    amount varchar(150),
    paidat DATETIME DEFAULT CURRENT_TIMESTAMP ,
    paid   ENUM('Y','N') NOT NULL
  
);

CREATE TABLE  customer(
    ssn int not null PRIMARY key,
    name varchar(250) not null,
    email varchar(250) not null UNIQUE,
  	sex ENUM('F','M') NOT NULL,
    country varchar(250) not null,
   `password` varchar(250) not null
);

ALTER  TABLE reservation add FOREIGN key  (plate_no) REFERENCES car(plate_no) on UPDATE CASCADE;
ALTER TABLE car add FOREIGN key  (office_id) REFERENCES office(office_id);
ALTER TABLE reservation add FOREIGN key  (customer_ssn) REFERENCES customer(ssn);
