CREATE TABLE `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(100) COLLATE utf8_unicode_ci NOT NULL,
    `last_name` VARCHAR(100) COLLATE utf8_unicode_ci NOT NULL,
    `email` VARCHAR(100) COLLATE utf8_unicode_ci NOT NULL,
    `password` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
    `phone` VARCHAR(15) COLLATE utf8_unicode_ci NOT NULL,
    `created` DATETIME NOT NULL,
    `modified` DATETIME NOT NULL,
    `status` ENUM('1', '0') COLLATE utf8_unicode_ci NOT NULL,

    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_unicode_ci;
