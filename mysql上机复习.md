1.like 模式匹配  
select * from book where bookname like "%经济学%";

2.as 重命名
select bookid as idofbook...

3.exists

4.in

5.sum,avg
min,max  
  查找类别为c2的书中编号最小的书的信息（返回编号）：
  select min(bookid),bookname,author from book where catid="c2";
  不返回编号：
  select bookname,author from book where bookid in(select min(bookid) from book where cid = "c2");
  ### 注意：min必须用在select后面，即没有where bookid=min(bookid)的用法，因此不返回编号时必须采用子查询
count
count(*)

6.group by having


7.表的连接
select a from r,s where r.b=s.b;
select a from r where b in (select b from s);
