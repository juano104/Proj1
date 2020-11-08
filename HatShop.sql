DROP DATABASE IF EXISTS HatShop;

CREATE DATABASE IF NOT EXISTS HatShop;
USE HatShop;

CREATE TABLE products(
	id int not null auto_increment,
    name varchar(50),
    description varchar(150),
    type varchar(10), -- summer, formal, travel, everyday, luxury
    price int not null
    
);

insert into products
values (1, "Black Hat", "Comfortable hat for an everyday use.", "everyday", 16),
	(2, "Blue Hat", "A hat for traveling.", "summer", 19),
    (3, "Red Hat", "For a nice date out.", "formal", 17),
	(4, "Green Hat", "A hat for running.", "sport", 17),
    (5, "Pink Hat", "A comfortable traveling hat.", "travel", 18),
	(6, "Beige Hat", "Nice hat for doing sports.", "sport", 20);

select * from products;