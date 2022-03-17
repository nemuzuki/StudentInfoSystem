### 学生信息管理系统
url: http://localhost:8081/mika/StuInfoSystem

#### 数据的传递过程
MySQL-(mysqli.query(select))->php-(html中插入php的echo)->html  
php-(cookie/session)->php  
html-(post)->php-(mysqli.query(insert))->MySQL  
