START TRANSACTION;


create database online_ordering DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


USE online_ordering;



CREATE TABLE categories (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE customers (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE orders (
  id int(11) NOT NULL AUTO_INCREMENT,
  order_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  price decimal(10,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE order_details (
  order_id int(11) NOT NULL,
  customer_id int(11) NOT NULL,
  part_id int(11) NOT NULL,
  quantity int(11) NOT NULL,
  KEY order_id (order_id,customer_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE parts (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  category_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


INSERT INTO 
	online_ordering.categories (name) 
VALUES 
	('Gears'), 
	('Belts'), 
	('Motors'), 
	('Thermostats'), 
	('Fuses');


ALTER TABLE  customers ADD  email VARCHAR( 200 ) NOT NULL;


ALTER TABLE  customers ADD UNIQUE (
email
);


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
	('12 amp Fuse', '5');


ALTER TABLE  parts ADD  price DECIMAL NOT NULL DEFAULT  '0';



INSERT INTO 
	online_ordering.parts (name, category_id) 
VALUES 
	('Thermostat for Frigidaire Electric Dryer FED2334i', '4'), 
	('1 Inch gear', '1'), 
	('1 Inch Spur gear', '1'), 
	('3 Inch Internal Ring gear', '1'), 
	('3 Inch Helical gear', '1'), 
	('3 Inch Face gear', '1'), 
	('3 inch flat belt', '2'), 
	('2 inch Vee Belt', '2'), 
	('Timing Belt for Toyota Camry 2006', '2'),
	('Timing Belt for Honda Accord 2006', '2'),
	('5-1-1 Programmable Thermostat', '4'), 
	('Nest self learning Thermostat', '4'), 
	('Honeywell Digital Thermostat', '4'), 
	('5V Brushless DC Motor', '3'), 
	('Universal AC DC Motor', '3'), 
	('Induction Motor', '3'), 
	('Servo Motor', '3'), 	
	('100 amp Fuse', '5'),	
	('80 amp Fuse', '5'),	
	('60 amp Fuse', '5'),	
	('30 amp Fuse', '5');
	
	
	

INSERT INTO 
	online_ordering.parts (name, category_id) 
VALUES 
	('2 Inch gear', '1'), 
	('2 Inch Spur gear', '1'), 
	('4 Inch Internal Ring gear', '1'), 
	('4 Inch Helical gear', '1'), 
	('4 Inch Face gear', '1'), 
	('4 inch flat belt', '2'), 
	('3 inch Vee Belt', '2'), 
	('Timing Belt for Toyota Camry 2012', '2'),
	('Timing Belt for Honda Accord 2012', '2'),
	('230V Brushless DC Motor', '3');
COMMIT;
