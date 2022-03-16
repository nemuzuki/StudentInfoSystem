### 1.like 模式匹配  
select * from book where bookname like "%经济学%";

### 2.as 重命名
select bookid as idofbook

select count(*) as count

### 3.exists

给出借阅了所有图书类别的本科生：

```mysql
select stuid, stuname 
from student 
where degree = '本科生' and not exists(
	select catid from category where catid not in(
		select catid from book, borrow
		where book.bookid = borrow.bookid and borrow.stuid = student.stuid
	)
);
```



### 4.in/not in

where <attr> in (select <attr>...) 常用于in后面的语句只返回一个值（如min,max）时，相当于给这个属性确定了一个值（有点类似于<attr>=...）

```mysql
	给出学号为“200810111”的同学最近一次借阅（借阅日期最大）的图书信息：
    select * from borrow where borrowdate in (select max(borrowdate) from borrow where stuid='200810111') and stuid='200810111' ;
    注意主语句也必须加上and stuid='200810111'，因为where borrowdate in返回的不是一张表，而只是最大的那个日期，不加的话stuid的限制条件就没了。
```



### 5.min,max,sum,avg

### 注意：这四个都必须用在select后面，即没有where bookid=min(bookid)的用法，因此不返回编号时必须嵌套查询

```mysql
    查找类别为c2的书中编号最小的书的信息（返回编号）：
    select min(bookid),bookname,author from book where catid="c2";
    返回编号时，min的属性和其他属性的值自动关联上了。
    
	如果不想返回编号，必须嵌套：
	select bookname,author from book where bookid in(select min(bookid)from book where catid="c2");
	
    给出所有研究生借阅图书的数目：
    select count(borrow.bookid) from student,borrow where student.degree="undergraduate" and student.stuid=borrow.stuid;
```

 

### 6.group by <attr> having <条件> 

 group by本质上是一个去重的作用，再配合having用来筛选
  group by必须写在where语句的后面（或者没有where语句）

  #### 经常用 select count(*) from <table> group by <attr>; 来求<attr>的每种取值出现的次数。

```mysql
  查找在'2010-10-1' 到 '2010-10-20'这段时间内bookid出现次数大于2的图书：
  select bookid from borrow where borrowdate between '2010-10-1' and '2010-10-20' group by bookid having count(*)>2;
```



### 7.order by, limit
​    asc 升序
​    desc 降序
​    limit n 取前n名

### 8.union,intersect,except 集合并交差（放在两个select语句之间，属性名相同）

```
(select id as student from users) union (select student from scores);
```



### 9.count(),count(*)，最大次数问题，次数为0的项的输出
```
求某个学号出现次数：
select count(*) from borrow where stuid='200810111';
输出各个学号的出现次数（group by）：
select stuid,count(*) from borrow group by stuid;
```

求出现次数最多的学号和次数：

```
前半部分得到每个学号对应次数的表，后半部分指定哪个是最大次数
select stuid,borrowcount from (select stuid,count(*) as borrowcount from borrow group by stuid)P 
where borrowcount in 
(select max(borrowcount) from 
(select stuid,count(*) as borrowcount from borrow group by stuid)Q);

下面这句就是错的，因为最大次数和学号没建立联系，默认输出了第一行的学号
select stuid,max(borrowcount) as maxcount from (select stuid,count(*) as borrowcount from borrow group by stuid)P;
```

在from后面嵌套select语句可以建立临时表，必须给这张表起名（如P），就可以用P的某列了
​count(*)必须重命名（如borrowcount）才可以在其它语句输出。



给出借阅“c1”类别图书次数最多的学生。（stuid，stuname，borrowcount）

##### 注意：最大次数可能对应多个学生！！！

```mysql
---因为最大次数可能对应多个学生，所以要重写一遍P语句（学号，次数）
select stuid from 
(select stuid,count(*) as maxcount from book,borrow where book.bookid=borrow.bookid and catid='c1' group by stuid)P 
where maxcount in
---Q得到最大次数
(select max(borrowcount) as maxcount from (select count(*) as borrowcount from book,borrow where book.bookid=borrow.bookid and catid='c1' group by stuid)Q);
```

##### 两表联立，输出A中元素在B中出现次数（次数为0的项也要输出）：

先用not in找到不在B表中的项，select id,0的方法输出0，再把两张表用union拼上（注意属性名要用as设为完全一致，才能拼上）

```mysql
(select id,0 as cnt from users where id not in (select student from scores)) union
(select student as id,count(*) as cnt from scores group by student);
```



### 10.distinct去重

```mysql
给出借阅了所有图书类别的学生(stuid,stuname)
select distinct student.stuid,student.stuname from student,
(select stuid,count(*)as catcount from
    (select distinct stuid,catid as countcat from borrow,book where 			book.bookid=borrow.bookid)pp group by stuid)P,
(select count(*)as count from (select distinct catid from book)qq)Q
where P.catcount=Q.count and student.stuid=P.stuid;
    
    pp:
    +------------+----------+
    | stuid      | countcat |
    +------------+----------+
    | 200810111  | c1       |
    | 200910121  | c1       |
    | 201021109  | c1       |
    | 201010121  | c1       |
    | 1201022135 | c1       |
    | 1200910211 | c1       |
    | 201021109  | c2       |
    | 200810111  | c2       |
    | 200810111  | c3       |
    | 200910121  | c3       |
    | 201010121  | c3       |
    | 1201022135 | c3       |
    | 200810111  | c4       |
    +------------+----------+
    P:去重后的pp表只要数stuid=xxx有几行，即可知道xxx有几类书了
    +------------+----------+
    | stuid      | catcount |
    +------------+----------+
    | 1200910211 |        1 |
    | 1201022135 |        2 |
    | 200810111  |        4 |
    | 200910121  |        2 |
    | 201010121  |        2 |
    | 201021109  |        2 |
    +------------+----------+


```

   ### 11.计算题

可以直接将两个select语句相加，外面套一个select，最后重命名即可。

#### 一定要注意括号个数！！！最好排版时把外层括号单独写一行。

```mysql
李飞同学弄丢了他在2010年10月9号（含当天）以后借的所有书，若已知计算机技术类图书原价3倍赔偿，其它类图书按原价2倍赔偿，给出他需要赔偿的钱数（赔偿数额）
select 
(
select price*3 from book,category where category.catname='计算机技术' and book.catid=category.catid and book.bookid in (select bookid from borrow where borrowdate>='2010-10-09' and stuid in(select stuid from student where stuname='李飞'))
)+(
select price*2 from book,category where category.catname<>'计算机技术' and book.catid=category.catid and book.bookid in (select bookid from borrow where borrowdate>='2010-10-09' and stuid in(select stuid from student where stuname='李飞'))
)
as '赔偿数额';
```

也可以使用两个表的属性值之和：

#### datediff('2010-11-20','2010-10-08') 用来计算两个日期间的天数（日期大的放前面）

```mysql
已知每本图书最多可借阅30天，“计算机技术”类图书每超出一天需交费0.8元，其它类图书每超出一天需交费0.5元，假设王玲在2010-10-08后（包括2010-10-08）所借的书都未归还，问王玲在2010-11-20那天需向图书馆交纳多少钱？（从1月1号到1月2号视为借阅了1天）。（stuname, priceSum）
select stuname,pp.sum+qq.sum as priceSum from student,
(select sum(datediff('2010-11-20',borrowdate)*0.8) as sum from (select book.bookid,book.catid,category.catname,borrowdate from borrow,book,category where borrowdate >='2010-10-08' and stuid in(select stuid from student where stuname='王玲') and book.bookid=borrow.bookid and category.catid=book.catid and catname=“计算机技术”)P)pp,
(select sum(datediff('2010-11-20',borrowdate)*0.5) as sum from (select book.bookid,book.catid,category.catname,borrowdate from borrow,book,category where borrowdate >='2010-10-08' and stuid in(select stuid from student where stuname='王玲') and book.bookid=borrow.bookid and category.catid=book.catid and catname<>“计算机技术”)Q)qq 
where stuname="王玲";
```

