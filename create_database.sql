create database online_ordering DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

USE online_ordering;


CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  KEY `order_id` (`order_id`,`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

INSERT INTO 
	`online_ordering`.`categories` (`name`) 
VALUES 
	('Gears'), 
	('Belts'), 
	('Motors'), 
	('Thermostats'), 
	('Fuses');

ALTER TABLE  `customers` ADD  `email` VARCHAR( 200 ) NOT NULL

ALTER TABLE  `customers` ADD UNIQUE (
`email`
);

INSERT INTO 
	`online_ordering`.`parts` (`id`, `name`, `category_id`) 
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

