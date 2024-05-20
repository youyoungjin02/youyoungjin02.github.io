
create database ticket;
use ticket;
create table users (
	name		char(32)  character set utf8,
	pass_ch		int(3),
	pass_ad 	int(3),
	big_ch		int(3),
	big_ad		int(3),
	free_ch		int(3),
	free_ad		int(3),
	yfree_ch		int(3),
	yfree_ad		int(3),
	total		int(3)
);
describe users;
