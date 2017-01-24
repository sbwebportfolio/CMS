--
-- Drop all tables.
--

DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `category_names`;
DROP TABLE IF EXISTS `pages`;
DROP TABLE IF EXISTS `menus`;

--
-- Table structure for table `pages`.
--

CREATE TABLE `pages` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`content` text,
	`author` int(11) UNSIGNED NOT NULL,
	`slug` varchar(255) NOT NULL,
	`hidden` bit(1) NOT NULL DEFAULT b'0',
	`template` varchar(255) NOT NULL,
	`created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	UNIQUE KEY (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `category_names`.
--

CREATE TABLE `category_names` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `categories`.
--

CREATE TABLE `categories` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`page_id` int(11) UNSIGNED NOT NULL,
	`category_id` int(11) UNSIGNED NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
	FOREIGN KEY (`category_id`) REFERENCES `category_names` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `menus`.
--

CREATE TABLE `menus` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`position` int(11) UNSIGNED NOT NULL,
	`page_id` int(11) UNSIGNED NOT NULL,
	FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;