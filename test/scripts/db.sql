create table `Users` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`username` varchar(100) default null,
	`email` varchar(100) default null,
	`password` varchar(100) default null,
	`user_roles` text null,
	`last_login` datetime default NULL,
	`last_update` datetime default NULL,
	`created` datetime default NULL,
	`login_hash` varchar(64) default null,
	`lang` bigint(20) default null,
	primary key  (`id`),
	unique key `username` (`username`),
	INDEX login_hash_index (`login_hash`)
) engine=innodb default charset=utf8;
