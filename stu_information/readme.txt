homepage：主页
login：登录
addinfo：添加信息
post：提交addinfo的内容到数据库

目前实现了主页，如果登陆成功，就跳转到post.php

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