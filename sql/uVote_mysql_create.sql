CREATE TABLE `school_accounts` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`password` varchar(255) NOT NULL,
	`username` varchar(20) NOT NULL,
	`school_id` bigint NOT NULL,
	`student_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `schools` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`acronym` varchar(10) NOT NULL,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `departments` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`acronymn` varchar(8) NOT NULL,
	`name` varchar(255) NOT NULL,
	`school_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `courses` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`acronymn` varchar(8) NOT NULL,
	`name` varchar(255) NOT NULL,
	`department_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `sections` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`school_id` bigint NOT NULL,
	`course_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `year_sections` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`year_id` tinyint NOT NULL,
	`section_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `students` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`middle_name` varchar(255) NOT NULL,
	`school_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `years` (
	`id` tinyint NOT NULL AUTO_INCREMENT,
	`year` tinyint(3) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `voters` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`password` varchar(255) NOT NULL,
	`has_voted` bool NOT NULL DEFAULT false,
	`student_year_section_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `elections` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`date` DATE NOT NULL,
	`school_id` bigint NOT NULL,
	`school_year_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `positions` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`max_slot` tinyint(2) NOT NULL,
	`election_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `running_positions` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`position_id` bigint NOT NULL,
	`year_section_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `political_parties` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`acronym` varchar(10) NOT NULL,
	`name` varchar(255) NOT NULL,
	`color` varchar(8) NOT NULL,
	`election_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `candidates` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`alias` varchar(255) NOT NULL,
	`voter_id` bigint NOT NULL,
	`election_id` bigint NOT NULL,
	`political_party_id` bigint NOT NULL,
	`running_position_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `student_year_sections` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`student_id` bigint NOT NULL,
	`year_section_id` bigint NOT NULL,
	`school_year_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `votes` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`voter_id` bigint NOT NULL,
	`candidate_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `school_years` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`from` year NOT NULL,
	`to` year NOT NULL,
	`school_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `accounts` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`school_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `school_accounts` ADD CONSTRAINT `school_account_fk0` FOREIGN KEY (`school_id`) REFERENCES `schools`(`id`);

ALTER TABLE `school_accounts` ADD CONSTRAINT `school_account_fk1` FOREIGN KEY (`student_id`) REFERENCES `students`(`id`);

ALTER TABLE `departments` ADD CONSTRAINT `department_fk0` FOREIGN KEY (`school_id`) REFERENCES `schools`(`id`);

ALTER TABLE `courses` ADD CONSTRAINT `course_fk0` FOREIGN KEY (`department_id`) REFERENCES `departments`(`id`);

ALTER TABLE `sections` ADD CONSTRAINT `section_fk0` FOREIGN KEY (`school_id`) REFERENCES `schools`(`id`);

ALTER TABLE `sections` ADD CONSTRAINT `section_fk1` FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`);

ALTER TABLE `year_sections` ADD CONSTRAINT `year_section_fk0` FOREIGN KEY (`year_id`) REFERENCES `years`(`id`);

ALTER TABLE `year_sections` ADD CONSTRAINT `year_section_fk1` FOREIGN KEY (`section_id`) REFERENCES `sections`(`id`);

ALTER TABLE `students` ADD CONSTRAINT `student_fk0` FOREIGN KEY (`school_id`) REFERENCES `schools`(`id`);

ALTER TABLE `voters` ADD CONSTRAINT `voter_fk0` FOREIGN KEY (`student_year_section_id`) REFERENCES `student_year_sections`(`id`);

ALTER TABLE `elections` ADD CONSTRAINT `election_fk0` FOREIGN KEY (`school_id`) REFERENCES `schools`(`id`);

ALTER TABLE `elections` ADD CONSTRAINT `election_fk1` FOREIGN KEY (`school_year_id`) REFERENCES `school_years`(`id`);

ALTER TABLE `positions` ADD CONSTRAINT `position_fk0` FOREIGN KEY (`election_id`) REFERENCES `elections`(`id`);

ALTER TABLE `running_positions` ADD CONSTRAINT `running_position_fk0` FOREIGN KEY (`position_id`) REFERENCES `positions`(`id`);

ALTER TABLE `running_positions` ADD CONSTRAINT `running_position_fk1` FOREIGN KEY (`year_section_id`) REFERENCES `year_sections`(`id`);

ALTER TABLE `political_parties` ADD CONSTRAINT `political_partie_fk0` FOREIGN KEY (`election_id`) REFERENCES `elections`(`id`);

ALTER TABLE `candidates` ADD CONSTRAINT `candidate_fk0` FOREIGN KEY (`voter_id`) REFERENCES `voters`(`id`);

ALTER TABLE `candidates` ADD CONSTRAINT `candidate_fk1` FOREIGN KEY (`election_id`) REFERENCES `elections`(`id`);

ALTER TABLE `candidates` ADD CONSTRAINT `candidate_fk2` FOREIGN KEY (`political_party_id`) REFERENCES `political_parties`(`id`);

ALTER TABLE `candidates` ADD CONSTRAINT `candidate_fk3` FOREIGN KEY (`running_position_id`) REFERENCES `running_positions`(`id`);

ALTER TABLE `student_year_sections` ADD CONSTRAINT `student_year_section_fk0` FOREIGN KEY (`student_id`) REFERENCES `students`(`id`);

ALTER TABLE `student_year_sections` ADD CONSTRAINT `student_year_section_fk1` FOREIGN KEY (`year_section_id`) REFERENCES `year_sections`(`id`);

ALTER TABLE `student_year_sections` ADD CONSTRAINT `student_year_section_fk2` FOREIGN KEY (`school_year_id`) REFERENCES `school_years`(`id`);

ALTER TABLE `votes` ADD CONSTRAINT `vote_fk0` FOREIGN KEY (`voter_id`) REFERENCES `voters`(`id`);

ALTER TABLE `votes` ADD CONSTRAINT `vote_fk1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates`(`id`);

ALTER TABLE `school_years` ADD CONSTRAINT `school_year_fk0` FOREIGN KEY (`school_id`) REFERENCES `schools`(`id`);

ALTER TABLE `accounts` ADD CONSTRAINT `account_fk0` FOREIGN KEY (`school_id`) REFERENCES `schools`(`id`);

