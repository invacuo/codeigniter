START TRANSACTION;


create database online_ordering_6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;# 1 row affected.


USE online_ordering_6;# MySQL returned an empty result set (i.e. zero rows).



CREATE TABLE categories (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;# MySQL returned an empty result set (i.e. zero rows).


CREATE TABLE customers (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;# MySQL returned an empty result set (i.e. zero rows).


CREATE TABLE orders (
  id int(11) NOT NULL AUTO_INCREMENT,
  order_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  price decimal(10,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;# MySQL returned an empty result set (i.e. zero rows).


CREATE TABLE order_details (
  order_id int(11) NOT NULL,
  customer_id int(11) NOT NULL,
  part_id int(11) NOT NULL,
  quantity int(11) NOT NULL,
  KEY order_id (order_id,customer_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;# MySQL returned an empty result set (i.e. zero rows).


CREATE TABLE parts (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  category_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;# MySQL returned an empty result set (i.e. zero rows).


INSERT INTO 
	online_ordering.categories (name) 
VALUES 
	('Gears'), 
	('Belts'), 
	('Motors'), 
	('Thermostats'), 
	('Fuses');# 5 rows affected.


ALTER TABLE  customers ADD  email VARCHAR( 200 ) NOT NULL;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE  customers ADD UNIQUE (
email
);# MySQL returned an empty result set (i.e. zero rows).


INSERT INTO 
	online_ordering.parts (name, category_id) 
VALUES 
	('Thermostat for Frigidaire Dryer FLW01134', '4'), 
	('6 Inch gear', '1'), 
	('2 inch rubber belt', '2'), 
	('12V DC Motor', '3'), 
	('30 amp Fuse', '5'),
	('Thermostat for Kenmore AC KM1134', '4'), 
	('2 Inch gear', '1'), 
	('4 inch belt', '2'), 
	('5V DC Motor', '3'), 
	('12 amp Fuse', '5');# 10 rows affected.


ALTER TABLE  parts ADD  price DECIMAL NOT NULL DEFAULT  '0';# MySQL returned an empty result set (i.e. zero rows).


COMMIT;
