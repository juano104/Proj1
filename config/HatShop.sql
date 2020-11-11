DROP DATABASE IF EXISTS HatShop;

CREATE DATABASE IF NOT EXISTS HatShop;
USE HatShop;

CREATE TABLE products(
	id decimal not null,
    name varchar(50),
    description varchar(150),
    type varchar(10), -- summer, formal, travel, everyday, luxury
    price int not null,
    primary key(id)
    
);

insert into products
values (1, "Black Hat", "Comfortable hat for an everyday use.", "everyday", 16.99),
	(2, "Blue Hat", "A hat for traveling.", "summer", 16.99),
    (3, "Red Hat", "For a nice date out.", "formal", 17.99),
    (4, "Green Hat", "Comfortable hat for an everyday use.", "everyday", 15.99),
	(5, "Yellow Hat", "A hat for traveling.", "summer", 17.99),
    (6, "Orange Hat", "Comfortable hat for an everyday use.", "everyday", 16.99),
	(7, "Dark Blue Hat", "A hat for traveling.", "summer", 18.99),
    (8, "Purple Hat", "Comfortable hat for an everyday use.", "everyday", 16.99),
	(9, "Light Orange Hat", "A hat for traveling.", "summer", 19.99),
    (10, "Light Green Hat", "Comfortable hat for an everyday use.", "everyday", 16.99),
    (11, "White Hat", "A hat for traveling.", "summer", 17.99),
    (12, "Pink Hat", "Comfortable hat for an everyday use.", "everyday", 15.99);

select * from products;