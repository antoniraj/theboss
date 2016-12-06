ALTER TABLE `location` CHANGE `latitude` `latitude` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `longitude` `longitude` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;


ALTER TABLE `staff` CHANGE `language` `language` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;


ALTER TABLE `staff` CHANGE `last_name` `last_name` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `dob` `dob` DATE NULL, CHANGE `gender` `gender` INT(11) NULL, CHANGE `about_me` `about_me` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `my_blog` `my_blog` INT(11) NULL, CHANGE `my_website` `my_website` INT(11) NULL, CHANGE `photo` `photo` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `skype` `skype` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `hangout` `hangout` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `msn` `msn` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `yahoo_chat` `yahoo_chat` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `skype_business` `skype_business` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `linkedin` `linkedin` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `facebook` `facebook` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `twitter` `twitter` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `google` `google` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;

ALTER TABLE `staff` ADD `email` VARCHAR(100) NOT NULL AFTER `last_name`, ADD `mobile_no` VARCHAR(100) NOT NULL AFTER `email`;






