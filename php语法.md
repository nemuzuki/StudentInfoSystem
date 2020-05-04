mysql查询：
$con=mysqli_connect(host,user,password,database);
//exp: $con=mysqli_connect("localhost","root","****","stu_information");
$sql='select * from courses where id='."'{$course}';";
$result=mysqli_query($con,$sql);

每次从数据库获得数据时，需要加上下面这句，否则无法正确显示中文：
mysqli_query($con,"set names utf8");

php文件之间传值可采用cookie
.php1:
cookie('key','value');
.php2:
$key=$_COOKIE['key'];

获取返回表的一行，是一个数组：
$row=$result->fetch_array();
$row[i] //数组的第i个属性值
