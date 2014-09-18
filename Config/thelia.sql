
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- sales_locations
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sales_locations`;

CREATE TABLE `sales_locations`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `company` VARCHAR(255),
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `lat` VARCHAR(255),
    `lng` VARCHAR(255),
    `address1` VARCHAR(255) NOT NULL,
    `address2` VARCHAR(255) NOT NULL,
    `address3` VARCHAR(255) NOT NULL,
    `zipcode` VARCHAR(10) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `country_id` INTEGER NOT NULL,
    `phone` VARCHAR(20),
    `cellphone` VARCHAR(20),
    `visible` TINYINT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `FI_sales_locations_country_id` (`country_id`),
    CONSTRAINT `fk_sales_locations_country_id`
        FOREIGN KEY (`country_id`)
        REFERENCES `country` (`id`)
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
