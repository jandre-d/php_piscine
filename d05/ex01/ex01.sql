CREATE TABLE ft_table (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`login` VARCHAR(8) NOT NULL DEFAULT 'toto',
	`group` ENUM('staff', 'student', 'others') NOT NULL,
	creation_date DATE NOT NULL
);