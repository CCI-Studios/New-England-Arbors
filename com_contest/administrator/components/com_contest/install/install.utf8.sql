CREATE TABLE IF NOT EXISTS `#__contests_submissions` (
	`contest_submission_id` SERIAL,

	`title` VARCHAR(250) NOT NULL,
	`author` VARCHAR(250) NOT NULL,
	`email` VARCHAR(250) NOT NULL,
	`file` VARCHAR(250) NOT NULL,
	`enabled` TINYINT(1) NOT NULL DEFAULT 0,

	`created_on` DATETIME NOT NULL,
	`created_by` INT(11) NOT NULL,
	`modified_on` DATETIME NOT NULL,
	`modified_by` INT(11) NOT NULL

) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `#__contest_ratings` (
	`contests_rating_id` SERIAL,

	`rating` INT(1) NOT NULL,
	`ip` VARCHAR(20) NOT NULL,

	`contest_submission_id` BIGINT(20) UNSIGNED NOT NULL

) ENGINE=InnoDB;


CREATE OR REPLACE VIEW `#__contest_view_submissions` AS
	SELECT tbl.*, COUNT(r.rating) as count, AVG(r.rating) as rating
		FROM `#__contest_submissions` AS tbl
		LEFT JOIN `#__contest_ratings` AS r on r.contest_submission_id = tbl.contest_submission_id
		GROUP by tbl.contest_submission_id