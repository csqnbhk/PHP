<?php
 
  echo'开始连接mysql.....'.'<br/>';
  //1.连接数据库
  $conn=mysqli_connect('localhost','root','123456') or die("call mysqli_connect() error" . mysqli_error($link));
  mysqli_select_db($conn,'books');
  if($conn==FALSE)
  echo'连接失败!'.'<br/>';
  else
  echo'连接成功'.'<br/>';
  $sql="select*from book_250";
  //2.执行sql语句查询并获得结果集
  echo'book_250表的数据如下:'.'<hr/>';
  $result=mysqli_query($conn,$sql) or die ('call mysqli_query() error.'. mysqli_error($conn));
  $row=mysqli_fetch_assoc($result);

while($row=mysqli_fetch_assoc($result))
{
    echo $row['name'].'  '.$row['grade'].'  '.$row['person'].'<hr/>';
}
?>
