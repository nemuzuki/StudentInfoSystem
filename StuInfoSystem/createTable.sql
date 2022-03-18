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

--触发器：一旦新建学生信息，同时也增加user行
delimiter //
create trigger addUserTrigger 
before insert on student for each row 
begin 
	if new.id not in (select id from user)
		then insert into user(id,password) values(new.id,new.id);
	else 
		signal sqlstate '42000' set message_text='已经存在此用户！';
end if;
end//
delimiter ;

--存储过程：删除学生信息时，删除user和score行
delimiter //
create procedure delete_student(in student_id mediumint)
begin
	delete from student where id=student_id;
	delete from user where id=student_id;
	delete from score where student=student_id;
end;//
delimiter ;

--事务：修改密码事务执行失败则回滚

--视图：显示所有选课信息
create view registInfo as 
  SELECT s.id as student_id, s.name as student_name, c.id as course_id, c.name as course_name
  from regist r, student s, course c
  where r.student=s.id and r.course=c.id;



