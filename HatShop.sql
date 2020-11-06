DROP DATABASE IF EXISTS HatShop;

CREATE DATABASE IF NOT EXISTS HatShop;
USE HatShop;

CREATE TABLE products(
	id int not null auto_increment,
    name varchar(50),
    description varchar(150),
    type varchar(10), -- summer, formal, travel, everyday
    price int not null
    
);

insert into products
values (1, "Black Hat", "Comfortable hat for an everyday use.", "everyday", 16),
	(2, "Blue Hat", "A hat for traveling.", "summer", 19);

select * from products;