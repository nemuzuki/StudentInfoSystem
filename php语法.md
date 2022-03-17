mysql查询：必须用双引号包围

```php
$con=mysqli_connect(host,user,password,database);
	//exp: $con=mysqli_connect("localhost","root","","stu_information");
$sql='select * from courses where id ='$course'";
$result=mysqli_query($con,$sql);
```

每次从数据库获得数据时，需要加上下面这句，否则无法正确显示中文：

```php
mysqli_query($db,"set names utf8");
```

php文件之间传值可采用cookie或session：

```php
cookie('key','value');
$key=$_COOKIE['key'];

session_start();
$id=$_SESSION['id'];
session_destroy();
```

获取返回表的一行，是一个数组：

```php
$row=$result->fetch_array();
$row->course
```

获取sql查询的异常信息并输出到html：用try+catch，异常信息要用函数$exception->getMessage()

```php
try{
	$result=mysqli_query($con,$sql);
	if(!$result)throw new Exception(mysqli_error($con));
	else echo "<script>alert('添加学生信息成功！')</script>";
}

catch(Exception $e){
	echo "<script>alert("."'{$e->getMessage()}'".")</script>";
}
```

