#### 今天我们谈谈两张表通过join的连接。

left join的效果是返回的表项数=左表，如果左表的某些项不在右表，那么对应右表的属性为NULL。

nature join则是求交集，不需要等号连接，属性名字相同的自动合并去重。

nature left join可以将重复的属性去重，左表的该属性留下，右表删去。

```mysql
初始表：

 select * from tableone;
+------+------+
| id   | name |
+------+------+
|    1 | aaa  |
|    2 | bbb  |
+------+------+

select * from tabletwo;
+------+--------+
| id   | gender |
+------+--------+
|    3 | male   |
|    2 | female |
+------+--------+
```



```mysql
select * from tableone left join tabletwo on tableone.id=tabletwo.id;
+------+------+------+--------+
| id   | name | id   | gender |
+------+------+------+--------+
|    2 | bbb  |    2 | female |
|    1 | aaa  | NULL | NULL   |
+------+------+------+--------+

select * from tableone right join tabletwo on tableone.id=tabletwo.id;
+------+------+------+--------+
| id   | name | id   | gender |
+------+------+------+--------+
|    2 | bbb  |    2 | female |
| NULL | NULL |    3 | male   |
+------+------+------+--------+
表1左连接表2的结果=表2右连接表1

select * from tabletwo natural join tableone;
+------+--------+------+
| id   | gender | name |
+------+--------+------+
|    2 | female | bbb  |
+------+--------+------+

select * from tabletwo natural left join tableone;
+------+--------+------+
| id   | gender | name |
+------+--------+------+
|    2 | female | bbb  |
|    3 | male   | NULL |
+------+--------+------+
```

