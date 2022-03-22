CREATE table user(
	id mediumint references student(id),
	password varchar(50),
	primary key(id)
)default charset utf8 collate utf8_general_ci;

CREATE table student(
	id mediumint,
	name varchar(50),
	gender varchar(10),
	college varchar(50),
	major varchar(50),
	primary key(id)
)default charset utf8 collate utf8_general_ci;

CREATE table course(
	id mediumint,
	name varchar(50),
	college varchar(50),
	teacher varchar(20),
	primary key(id)
)default charset utf8 collate utf8_general_ci;

CREATE table score(
	student mediumint references student(id),
	course mediumint references course(id),
	score smallint,
	primary key(student,course)
)default charset utf8 collate utf8_general_ci;

-- 选课
CREATE table regist(
	student mediumint references student(id),
    course mediumint references course(id),
    primary key(student,course)
)default charset utf8 collate utf8_general_ci;

--触发器：一旦新建学生信息，同时也增加user行
delimiter //
CREATE TRIGGER addUserTrigger 
BEFORE INSERT ON student
FOR EACH ROW 
BEGIN 
	IF new.id NOT IN (SELECT id FROM user)
		THEN INSERT INTO user(id,password) VALUES(new.id,new.id);
	ELSE 
		signal sqlstate '42000' SET message_text='已经存在此用户！';
END IF;
END;//
delimiter ;

--存储过程：修改密码
delimiter //
CREATE PROCEDURE changePasswd(IN studentid mediumint,IN newpassword varchar(50))
BEGIN
	UPDATE user SET password = newpassword where id = studentid;
END;//
delimiter ;

--事务：删除学生信息时，删除user和score行。见deleteStudent2.php
DELETE FROM student WHERE id=student_id;
DELETE FROM user WHERE id=student_id;
DELETE FROM score WHERE student=student_id;

--视图：显示所有选课信息
CREATE view registInfo AS 
	SELECT s.id AS student_id, s.name AS student_name, c.id AS course_id, c.name AS course_name
	FROM regist r, student s, course c
	WHERE r.student=s.id AND r.course=c.id;



