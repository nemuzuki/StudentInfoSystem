```mysql
create table users(
	id mediumint references students(id),
	password varchar(50),
	primary key(id)
)default charset utf8 collate utf8_general_ci;
/*
insert into users(id,password)values(602,"2");
insert into users(id,password)values(526,"1");
delete from users where id=1813055;
*/

create table students(
	id mediumint,
	name varchar(50),
	gender varchar(10),
	college varchar(50),
	major varchar(50)
	primary key(id)
)default charset utf8 collate utf8_general_ci;
/*
insert into students(id,name,gender,college,major)values(630,"李姝","女","医学院","消化");
alter table students add college varchar(50);
update students set college="计算机学院" where id=1813055;
select name from students where major="电子";
*/

create table courses(
	id mediumint,
	name varchar(50),
	college varchar(50),
	teacher varchar(20),
	primary key(id)
)default charset utf8 collate utf8_general_ci;
/*
insert into courses(id,name,college,teacher)values(1813055,"数据库系统","计算机学院","沈玮");
*/

create table scores(
	student mediumint references students(id),
	course mediumint references courses(id),
	score smallint,
	primary key(student,course)
)default charset utf8 collate utf8_general_ci;
/*
insert into scores(student,course,score)values(1813055,1446,100);
*/

create table regist(
	student mediumint references students(id),
    course mediumint references courses(id),
    primary key(student,course)
)default charset utf8 collate utf8_general_ci;
/*
insert into regist(student,course)values();
*/
```


