### php:
```
homepage：主页，选择教师或者学生
login：登录
station：登录后的中转站（学生用）
administrator：登录后的中转站（管理员界面）
addinfo：添加信息的界面
addscore：上传成绩
change_pw：修改密码的界面
post：修改密码后的反馈
testscore：当前学生所有科目的成绩
showinfo：展示所有学生信息
addcourse：添加课程
showcourses：展示所有课程信息
show_user_score：展示某个学生的所有成绩（还需要增加修改功能）
show_course_score:查看某门课程成绩
registcourse:选课
showregist：选课信息
```
### table：
```
users(id,password)：用户学号，密码
students(id,name,gender,college,major)：学生信息
course(id,name,college,teacher,credit(学分),stu_num(选课人数))：课
scores(student,course,score)：所有人所有课的分数
regist(student,course)
```
### 事务删除（存储引擎必须是InnoDB）：（delete_student）

事务用来处理一系列的修改操作语句，满足原子性、一致性、隔离性、持久性。

事务的特点是commit来提交，如果出现异常，rollback回滚到事务开始的状态。

（关联删除参见https://blog.csdn.net/weixin_30596023/article/details/95859484）

删除某个学生，则他的成绩、users、students表的元组都将删除

	

```mysql
DROP PROCEDURE IF EXISTS delete_student;

DELIMITER //
create procedure delete_student(in deleteid mediumint(9)) ---输入的是要删的学号
begin
	declare error integer default 0; --默认没有错误
	declare continue handler for sqlexception set error=1;
	
	start transaction; ---开启事务
	
	delete from students where id=deleteid;
	delete users from users left join students on users.id=students.id where students.id is null;
	delete scores from scores left join students on scores.student=students.id where students.id is null;

    if error=1 then
        rollback;
    else
        commit;
    end if;

end;//
DELIMITER ;
```


测试：
INSERT INTO `students`(`id`, `name`) VALUES (1798,1798);
call delete_student(1798);

### 触发器添加：(StuTrig)

自定义异常(42000)

stutrig：一旦在students添加学生，自动在users表中创建一个用户，密码为学号
coursetrig：添加成绩时，如果没有该课程。自动在courses加入，但学院、课名为null

```mysql
delimiter //
create trigger StuTrig 
before insert on students for each row 
begin 
	if new.id not in (select id from users)
		then insert into users(id,password) values(new.id,new.id);
	else 
		signal sqlstate '42000' set message_text='已经存在此用户！';
end if;
end//
delimiter ;

delimiter //
create trigger CourseTrig
before insert on scores for each row
begin
	if new.course not in (select id from courses)
		then insert into courses (id)values(new.course);
end if;
end//
delimiter ;
```

php:

```php
$sql="insert into students(id,name,gender,college,major)
values({$id},"."'{$name}',"."'{$gender}',"."'{$college}',"."'{$major}');";

try{
	if(!$id){
		echo "<script>alert('id不能为空!')</script>";
		die;
	}
	$result=mysqli_query($con,$sql);
	if(!$result)throw new Exception(mysqli_error($con));
	else echo "<script>alert('添加学生信息成功！')</script>";
}

catch(Exception $e){
	echo "<script>alert("."'{$e->getMessage()}'".")</script>";
}
```



### 存储过程更新操作：(regist_course)

学生选课，把（学生，课程）信息加入到选课总表中，并且该课程的人数+1；

学生退课，把（学生，课程）信息移出选课总表，并且该课程的人数-1。

注意：

1.if后面写then

2.if...then后面多个操作时，用begin end包围

```mysql
DROP PROCEDURE IF EXISTS regist_course;
DELIMITER //
create procedure regist_course(in stu_id mediumint(9),in course_id mediumint(9))
begin
	if stu_id not in (select student from regist where course = course_id)
        then begin
        insert into regist(student,course) values(stu_id,course_id);
        update courses set stu_num = stu_num+1 where id = course_id;
        end;
    else
    	signal sqlstate '42003' set message_text ='你已经选过此课，不能再选！';
end if;
end;//
delimiter ;

DROP PROCEDURE IF EXISTS drop_course;
DELIMITER //
create procedure drop_course(in stu_id mediumint(9),in course_id mediumint(9))
begin
	if stu_id not in (select student from regist where course = course_id)
		then signal sqlstate '42002' set message_text ='你还未选过此课，不能退课！';
	else	
        delete from regist where student= stu_id and course=course_id;
        update courses set stu_num = stu_num-1 where id = course_id;
end if;
end;//
delimiter ;

call regist_course(1798,1455);
call drop_course(1798,1455);
```

php:

```php
if($_POST['registcourse']!=null){
	$sql="call regist_course({$id},{$registcourse});";
    try{
		$result=mysqli_query($con,$sql);
		if(!$result){
			throw new Exception(mysqli_error($con));
		}
		else{
			echo "<script>alert('选课成功')</script>";
		}
	}
	catch(Exception $e){
		echo "<script>alert("."'{$e->getMessage()}'".")</script>";
	}
}
	
if($_POST['dropcourse']!=null){
	$sql="call drop_course({$id},{$dropcourse});";
	try{
		$result=mysqli_query($con,$sql);
		if(!$result){
			throw new Exception(mysqli_error($con));
		}
		else{
			echo "<script>alert('退课成功')</script>";
		}
	}
	catch(Exception $e){
		echo "<script>alert("."'{$e->getMessage()}'".")</script>";
	}
}
```



### 含有视图的查询：

查询某个学生的所有成绩，视图属性包括学号、姓名、课号、课名、学分、成绩

```mysql
drop view if exists stu_score;
create view stu_score as 
	select students.id as stu_id,
	students.name as stu_name,
	courses.id as course_id,
	courses.name as course_name,
	courses.credit as course_credit,
	scores.score 
from students,courses,scores
where scores.student=students.id and scores.course=courses.id;
```

```mysql
select * from stu_score where stu_name="zsn";
select * from stu_score where course_id="1441";
```


设置字符集和排序规则：default charset utf8 collate utf8_general_ci;

数据传输方法：
sql-(mysqli.query(select))->php-(html中插入php的echo)->html
php-(cookie)->php
html-(post)->php-(mysqli.query(insert))->sql


### html
通过<?php
phpinfo();
?>
来查看php相关信息
注意每次修改的php.ini位于C:\xampp\php\php.ini，别找错了！！！



mysql -u root -p

use stu_information;
