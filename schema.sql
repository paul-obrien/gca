create table college 
	(id integer auto_increment, 
		name varchar(255), 
		athletic_staff_url varchar(255), 
		division integer,
		state varchar(2),
		public tinyint,
		enrollment integer,
		tuition integer,
		sat_math_25_pct integer,
		sat_math_75_pct integer,
		sat_reading_25_pct integer,
		sat_reading_75_pct integer
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
		profile_url varchar(255),
		primary key (id));