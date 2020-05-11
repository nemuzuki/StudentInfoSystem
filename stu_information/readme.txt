php:
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

table：
users：用户学号，密码
students：学生信息
course：所有课
scores：所有人所有课的分数

事务删除：(关联删除参见https://blog.csdn.net/weixin_30596023/article/details/95859484)
删除某个学生，则他的成绩、users、students表的元组都将删除
DROP PROCEDURE IF EXISTS delete_student;
DELIMITER //
create procedure delete_student(in deleteid mediumint(9))
begin
	declare error integer default 0;
	declare continue handler for sqlexception set error=1;
	start transaction;
	delete from students where id=deleteid;
	delete users from users left join students on users.id=students.id where students.id is null;
	delete scores from scores left join students on scores.student=students.id where students.id is null;
	if error=1 then
		rollback;
	else 
		commit;
	end if;
end;//
DELIMITER;

测试：INSERT INTO `students`(`id`, `name`) VALUES (1798,1798);
call delete_student(1798);

触发器：
stutrig：一旦在students添加学生，自动在users表中创建一个用户，密码为学号
coursetrig：添加成绩时，如果没有该课程。自动在courses加入，但学院、课名为null

存储过程更新操作：
一旦加入新的成绩，该学生的加权平均分需要更新

设置字符集和排序规则：default charset utf8 collate utf8_general_ci;

数据传输方法：
sql-(mysqli.query(select))->php-(html中插入php的echo)->html
php-(cookie)->php
html-(post)->php-(mysqli.query(insert))->sql


# html
通过<?php
phpinfo();
?>
来查看php相关信息
注意每次修改的php.ini位于C:\xampp\php\php.ini，别找错了！！！