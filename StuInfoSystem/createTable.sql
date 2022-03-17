create table user(
	id mediumint references student(id),
	password varchar(50),
	primary key(id)
)default charset utf8 collate utf8_general_ci;

create table student(
	id mediumint,
	name varchar(50),
	gender varchar(10),
	college varchar(50),
	major varchar(50),
	primary key(id)
)default charset utf8 collate utf8_general_ci;

create table course(
	id mediumint,
	name varchar(50),
	college varchar(50),
	teacher varchar(20),
	primary key(id)
)default charset utf8 collate utf8_general_ci;

create table score(
	student mediumint references student(id),
	course mediumint references course(id),
	score smallint,
	primary key(student,course)
)default charset utf8 collate utf8_general_ci;

-- 选课
create table regist(
	student mediumint references student(id),
    course mediumint references course(id),
    primary key(student,course)
)default charset utf8 collate utf8_general_ci;



