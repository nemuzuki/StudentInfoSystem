homepage：主页，选择教师或者学生
login：登录
station：登录后的中转站（学生用）
administrator：管理员界面
addinfo：添加信息的界面
addinfo2：添加信息的php文件
addscore：上传成绩
change_pw：修改密码的界面
post：修改密码后的反馈
testscore：当前学生所有科目的成绩

table：
users：用户学号，密码
students：学生信息
course：所有课
scores：所有人所有课的分数

触发器：
stutrig：一旦在students添加学生，自动在users表中创建一个用户，密码为学号
coursetrig：添加成绩时，如果没有该课程。自动在courses加入，但学院、课名为null

存储过程：

设置字符集和排序规则：default charset utf8 collate utf8_general_ci;
sql-(mysqli.query(select))->php-(html中插入php的echo)->html
php-(cookie)->php
html-(post)->php-(mysqli.query(insert))->sql


# html
通过<?php
phpinfo();
?>
来查看php相关信息
注意每次修改的php.ini位于C:\xampp\php\php.ini，别找错了！！！