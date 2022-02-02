### 登录
mysql -u root -p

### 1.查询

```mysql
select <attr> from <table> where <...>;
```

--注意字符串用双引号或单引号括起，int型无需引号！！！

### 2.数据库

```mysql
show databases;
use <database>;
create database <database>;
drop database <name>;
```



### 3.表

```mysql
show tables; 展示整个数据库的表
show create table <table>; 展示整张table
create table <table>
(
LastName varchar(255),
FirstName varchar(255)
);
drop table <name>;
```

```mysql
添加外键：
alter table regist add constraint foreign key (student) references students(id);
alter table regist add constraint foreign key (course) references courses(id);
```



### 4.增删属性列

```mysql
alter table <table> add column <attr> <type>;
alter table <table> drop column <attr>;
```

alter table courses add column credit float;

alter table courses add column stu_num smallint default 0;

alter table courses drop column stu_num;

### 5.增删改元组

```mysql
insert into <table>(attr1,attr2) values (value1,value2);
delete from <table> where <...>;
update <table> set <attr>=<value> where <...>;
```

update courses set stu_num = 0;

### 6.索引（index）

假设要执行以下语句：select * from movies where studio_name='Disney' and year='1990';

但是movies一共有10000个元组，最原始的方式是10000行全部取出对照where,

如果建立索引 create index year_index on movies(year); 

查询时仅对year='1990'的元组测试。

（attrs可以多个）

```mysql
create index <index> on <table>(attrs);
alter table <table> add index <index>(attrs);
drop index <index> on <table>;
```



### 7.视图（view）

```mysql
create view <view> as select <a1,a2,a3> from <table> where <...>;
select * from <view>; 展示整张视图
desc <view>; 查看视图所有属性的类型
drop view <view>;
```

```mysql
例如：
create view <view> as 
  select a.name as username, b.name as goodsname from user as a, goods as b, ug as c 
  where a.id=c.userid and c.goodsid=b.id;
  
  把user,goods,ug重命名为a,b,c，a.name,b.name重命名为username,goodsname，
  最后视图展示出来是<view>(username,goodsname)
    where语句后面一定要认真对待！这是表关联的关键之处
```




### 8.触发器（trigger）
触发器是在某个动作发生之前/之后伴随的一系列动作

注意if后面的操作要写then！！！

注意一定要在delimiter和//之间加空格！！！

```mysql
查看所有触发器：show triggers \G;
删除触发器：drop trigger <trigger>;
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
```



### 9.存储过程（procedure）
存储过程相当于把许多动作打包，使用更加方便
```mysql
查看存储过程：show procedure status \G;
删除存储过程：drop procedure <procedure>;
建立存储过程：
delimiter //
create procedure print_procedure(inout printinfo char(50))
begin
	if(select count(*) from students where gender='男')>3 
		then set printinfo='The number of men students is 4 or more';
	else set printinfo='The number of men students is less than 4';
end if;
end;//
delimiter ;

调用存储过程：
call print_procedure(@a); 
select @a; @a是一个临时变量
```

