create table college 
	(id integer auto_increment, 
		name varchar(255), 
		athletic_staff_url varchar(255), 
		primary key (id));

create table sport (id integer auto_increment, 
	name varchar(255), 
	primary key (id));

create table coach (id integer auto_increment,
		college integer,
		sport integer,
		name varchar(255),
		title varchar(255),
		phone varchar(255),
		email varchar(255),
		primary key (id));