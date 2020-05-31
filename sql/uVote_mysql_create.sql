CREATE TABLE `school_account` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`password` varchar(255) NOT NULL,
	`username` varchar(20) NOT NULL,
	`school_id` bigint NOT NULL,
	`student_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `school` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`acronym` varchar(10) NOT NULL,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `department` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`acronymn` varchar(8) NOT NULL,
	`name` varchar(255) NOT NULL,
	`school_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `course` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`acronymn` varchar(8) NOT NULL,
	`name` varchar(255) NOT NULL,
	`department_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `section` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`school_id` bigint NOT NULL,
	`course_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `year_section` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`year_id` tinyint NOT NULL,
	`section_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `student` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`middle_name` varchar(255) NOT NULL,
	`school_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `year` (
	`id` tinyint NOT NULL AUTO_INCREMENT,
	`year` tinyint(3) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `voter` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`password` varchar(255) NOT NULL,
	`has_voted` bool NOT NULL DEFAULT false,
	`student_year_section_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `election` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`date` DATE NOT NULL,
	`school_id` bigint NOT NULL,
	`school_year_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `position` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`max_slot` tinyint(2) NOT NULL,
	`election_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `running_position` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`position_id` bigint NOT NULL,
	`year_section_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `political_party` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`acronym` varchar(10) NOT NULL,
	`name` varchar(255) NOT NULL,
	`color` varchar(8) NOT NULL,
	`election_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `candidate` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`alias` varchar(255) NOT NULL,
	`voter_id` bigint NOT NULL,
	`election_id` bigint NOT NULL,
	`political_party_id` bigint NOT NULL,
	`running_position_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `student_year_section` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`student_id` bigint NOT NULL,
	`year_section_id` bigint NOT NULL,
	`school_year_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `vote` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`voter_id` bigint NOT NULL,
	`candidate_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `school_year` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`from` year NOT NULL,
	`to` year NOT NULL,
	`school_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `account` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`school_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `school_account` ADD CONSTRAINT `school_account_fk0` FOREIGN KEY (`school_id`) REFERENCES `school`(`id`);

ALTER TABLE `school_account` ADD CONSTRAINT `school_account_fk1` FOREIGN KEY (`student_id`) REFERENCES `student`(`id`);

ALTER TABLE `department` ADD CONSTRAINT `department_fk0` FOREIGN KEY (`school_id`) REFERENCES `school`(`id`);

ALTER TABLE `course` ADD CONSTRAINT `course_fk0` FOREIGN KEY (`department_id`) REFERENCES `department`(`id`);

ALTER TABLE `section` ADD CONSTRAINT `section_fk0` FOREIGN KEY (`school_id`) REFERENCES `school`(`id`);

ALTER TABLE `section` ADD CONSTRAINT `section_fk1` FOREIGN KEY (`course_id`) REFERENCES `course`(`id`);

ALTER TABLE `year_section` ADD CONSTRAINT `year_section_fk0` FOREIGN KEY (`year_id`) REFERENCES `year`(`id`);

ALTER TABLE `year_section` ADD CONSTRAINT `year_section_fk1` FOREIGN KEY (`section_id`) REFERENCES `section`(`id`);

ALTER TABLE `student` ADD CONSTRAINT `student_fk0` FOREIGN KEY (`school_id`) REFERENCES `school`(`id`);

ALTER TABLE `voter` ADD CONSTRAINT `voter_fk0` FOREIGN KEY (`student_year_section_id`) REFERENCES `student_year_section`(`id`);

ALTER TABLE `election` ADD CONSTRAINT `election_fk0` FOREIGN KEY (`school_id`) REFERENCES `school`(`id`);

ALTER TABLE `election` ADD CONSTRAINT `election_fk1` FOREIGN KEY (`school_year_id`) REFERENCES `school_year`(`id`);

ALTER TABLE `position` ADD CONSTRAINT `position_fk0` FOREIGN KEY (`election_id`) REFERENCES `election`(`id`);

ALTER TABLE `running_position` ADD CONSTRAINT `running_position_fk0` FOREIGN KEY (`position_id`) REFERENCES `position`(`id`);

ALTER TABLE `running_position` ADD CONSTRAINT `running_position_fk1` FOREIGN KEY (`year_section_id`) REFERENCES `year_section`(`id`);

ALTER TABLE `political_party` ADD CONSTRAINT `political_party_fk0` FOREIGN KEY (`election_id`) REFERENCES `election`(`id`);

ALTER TABLE `candidate` ADD CONSTRAINT `candidate_fk0` FOREIGN KEY (`voter_id`) REFERENCES `voter`(`id`);

ALTER TABLE `candidate` ADD CONSTRAINT `candidate_fk1` FOREIGN KEY (`election_id`) REFERENCES `election`(`id`);

ALTER TABLE `candidate` ADD CONSTRAINT `candidate_fk2` FOREIGN KEY (`political_party_id`) REFERENCES `political_party`(`id`);

ALTER TABLE `candidate` ADD CONSTRAINT `candidate_fk3` FOREIGN KEY (`running_position_id`) REFERENCES `running_position`(`id`);

ALTER TABLE `student_year_section` ADD CONSTRAINT `student_year_section_fk0` FOREIGN KEY (`student_id`) REFERENCES `student`(`id`);

ALTER TABLE `student_year_section` ADD CONSTRAINT `student_year_section_fk1` FOREIGN KEY (`year_section_id`) REFERENCES `year_section`(`id`);

ALTER TABLE `student_year_section` ADD CONSTRAINT `student_year_section_fk2` FOREIGN KEY (`school_year_id`) REFERENCES `school_year`(`id`);

ALTER TABLE `vote` ADD CONSTRAINT `vote_fk0` FOREIGN KEY (`voter_id`) REFERENCES `voter`(`id`);

ALTER TABLE `vote` ADD CONSTRAINT `vote_fk1` FOREIGN KEY (`candidate_id`) REFERENCES `candidate`(`id`);

ALTER TABLE `school_year` ADD CONSTRAINT `school_year_fk0` FOREIGN KEY (`school_id`) REFERENCES `school`(`id`);

ALTER TABLE `account` ADD CONSTRAINT `account_fk0` FOREIGN KEY (`school_id`) REFERENCES `school`(`id`);

