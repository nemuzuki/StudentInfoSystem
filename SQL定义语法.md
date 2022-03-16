### 0.登录

```bash
mysql -u root -p
```



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
show tables; # 展示整个数据库的所有表名
show create table <table>; # 展示整张table
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

# 例
alter table courses add column credit float;
alter table courses add column stu_num smallint default 0;
alter table courses drop column stu_num;
```



### 5.增删改元组

```mysql
insert into <table>(attr1,attr2) values (value1,value2);
delete from <table> where <...>;
update <table> set <attr>=<value> where <...>;

# update courses set stu_num = 0;
```



### 6.索引（index）

假设movies一共有10000个元组，要执行以下语句：

```mysql
select * from movies where studio_name='Disney' and year='1990';
```

最原始的方式是把每行的所有属性值全部取出，再对照where后面的属性进行比较

如果对year建立索引

```sql
create index year_index on movies(year); 
```

可以先找到year='1990'的所有元组，再在其中找studio_name='Disney'的元组

```mysql
create index <index> on <table>(attrs);
alter table <table> add index <index>(attrs);
drop index <index> on <table>;
```

注：可以在多个属性上建索引（attr可以有多个），共同取哈希值

#### 两种索引实现方法

- 哈希索引：把每行的year取哈希值，哈希值相同的元组的行号用链表相连
- B+树索引：把每行的year作为B+树节点的一个元素，叶节点保存行号。InnoDB采用B+树索引



### 7.视图（view）

```mysql
create view <view> as select <a1,a2,a3> from <table> where <...>;
select * from <view>;# 展示整张视图
desc <view>;# 查看视图所有属性的类型
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
