CREATE TABLE IF NOT EXISTS `#__dealers_dealer` (
	`dealers_dealer_id` SERIAL,

	`title` VARCHAR(250) NOT NULL,
	`address1` VARCHAR(250) NOT NULL,
	`address2` VARCHAR(250) NOT NULL,
	`city` VARCHAR(20) NOT NULL,
	`state` VARCHAR(15) NOT NULL,
	`country` VARCHAR(10) NOT NULL,
	`zip` VARCHAR(10) NOT NULL,

	`enabled` TINYINT(1) NOT NULL
) ENGINE=InnoDB;;