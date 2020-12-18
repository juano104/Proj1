DROP DATABASE IF EXISTS HatShop;

CREATE DATABASE IF NOT EXISTS HatShop;
USE HatShop;

CREATE TABLE productsen (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50),
    description VARCHAR(150),
    type VARCHAR(10),
    price INT NOT NULL,
    PRIMARY KEY (id)
);

/*CREATE TABLE lang(
	id_prod int not null,
    codi_lang int not null,
    description varchar(50),
    type varchar(50),
    
);*/


CREATE TABLE productses(
	id int not null auto_increment,
    name varchar(50),
    description varchar(150),
    type varchar(10),
    price int not null,
    primary key(id)
    
);

insert into productsen (name, description, type, price)
values ("Black Hat", "Comfortable hat for an everyday use.", "everyday", 16.99),
	("Blue Hat", "A hat for traveling.", "summer", 16.99),
    ("Red Hat", "For a nice date out.", "formal", 17.99),
    ("Green Hat", "Comfortable hat for an everyday use.", "everyday", 15.99),
	("Yellow Hat", "A hat for traveling.", "summer", 17.99),
    ("Orange Hat", "Comfortable hat for an everyday use.", "everyday", 16.99),
	("Dark Blue Hat", "A hat for traveling.", "summer", 18.99),
    ("Purple Hat", "Comfortable hat for an everyday use.", "everyday", 16.99),
	("Light Orange Hat", "A hat for traveling.", "summer", 19.99),
    ("Light Green Hat", "Comfortable hat for an everyday use.", "everyday", 16.99),
    ("White Hat", "A hat for traveling.", "summer", 17.99),
    ("Pink Hat", "Comfortable hat for an everyday use.", "everyday", 15.99);
    
    insert into productses (name, description, type, price)
values ("Black Gorra", "Para uso diario", "diario", 16.99),
	("Blue Gorra", "Para viajar", "verano", 16.99),
    ("Red Gorra", "Para una noche de salir", "formal", 17.99),
    ("Green Gorra", "Para uso diario", "diario", 15.99),
	("Yellow Gorra", "Para viajar", "verano", 17.99),
    ("Orange Gorra", "Para uso diario", "diario", 16.99),
	("Dark Blue Gorra", "Para viajar", "verano", 18.99),
    ("Purple Gorra", "Para uso diario", "diario", 16.99),
	("Light Orange Gorra", "Para viajar", "verano", 19.99),
    ("Light Green Gorra", "Para uso diario", "diario", 16.99),
    ("White Gorra", "Para viajar", "verano", 17.99),
    ("Pink Gorra", "Para uso diario", "diario", 15.99);
    
    /* insert into lang() values();*/

select * from productses;