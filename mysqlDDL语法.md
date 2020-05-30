### --注释

### 1.查询

```mysql
select <attr> from <table> where <...>;
```

--注意字符串用双引号括起，int无需引号！！！

### 2.数据库

```mysql
show databases;
use <database>;
show tables; 展示整个数据库的表
create database <database>;
drop database <name>;
```



### 3.表

```mysql
show create table <table>; 展示整张table
create table <table>;
drop table <name>;
```



### 4.增删属性

```mysql
alter table <table> add <attr>;
alter table <table> drop column <attr>;
```



### 5.增删改元组

```mysql
insert into <table>(attr1,attr2) values (value1,value2);
delete from <table> where <...>;
update <table> set <attr>=<value> where <...>;
```



### 6.索引（index）

```mysql
create index <index> on <table>(attrs);
drop index <index>;
```



### 7.视图（view）

```mysql
create view <view> as select <a1,a2,a3> from <table> where <...>;
--例如：
create view <view> as 
  select a.name as username, b.name as goodsname from user as a, goods as b, ug as c 
  where a.id=c.userid and c.goodsid=b.id;
  --这是对user,goods,ug重命名为a,b,c，a.name,b.name重命名为username,goodsname，
  最后视图展示出来是<view>(username,goodsname)
    where语句后面一定要认真对待！这是关联表的关键之处

select * from <view>; 展示整张视图
desc <view>; 查看视图所有属性的类型
drop view <view>;
```





### 8.触发器（trigger）
注意一定要在delimiter和//之间加空格！！！

```mysql
查看所有触发器：show triggers \G;
删除触发器：drop <trigger>;
delimiter //
create trigger StuTrig 
before insert on students for each row 
begin 
	if new.id not in (select id from users)
		then insert into users(id,password) values(new.id,new.id);
end if;
end//
delimiter ;
```



### 9.存储过程（procedure）

```mysql
查看存储过程：show procedure status \G;
删除存储过程：drop procedure <procedure>;
delimiter //
create procedure print_procedure(inout printinfo char(50))
begin
	if(select count(*) from students where gender='男')>3 
		then set printinfo='The number of men students is 4 or more';
	else set printinfo='The number of men students is less than 4';
end if;
end;//
delimiter ;

--调用存储过程：
call print_procedure(@a); 
select @a; @a是一个临时变量
```

