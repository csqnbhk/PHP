<?php
  
   $dbms="mysql";
   $host="localhost";
   $dbname="books";
   $user="root";
   $pass="123456";
   $dsn="$dbms:host=$host;dbname=$dbname";
   echo "开始测试:<br>";
   try
   {
      $obj=new PDO($dsn,$user,$pass);
	 //持久连接
	 //$obj=new PDO($dsn,$user,$pass,array(PDO::ATTR_PERSISTENT=>true));
	 
	 echo "连接成功!<hr/>";
     /*
	 foreach($obj->query("select name,grade,person from book_250 limit 5") as $row)
	 {
		 print_r($row);
		 echo "<br>";
	 }
	 */
	 
	 
	 
	  //★1.query查询
	 echo "1.query查询:<br>";
	 $pdo_statement_obj=$obj->query("select name,grade,person from book_250 limit 5");
	 print_r($pdo_statement_obj->fetch());
	 echo "<hr/>";
	 
	 
	 
	 //★2.exec查询(不会从select中返回受影响的行数)
	 echo "2.exec查询:<br>";
	 /*
	 $num = $obj->exec("insert into book_250(name,person,grade) values('1','1','1')");
	 print_r($num);
	 */
	 echo "<hr/>";

	 
	 
	 //★3.prepare,execute使用
	 //1.使用 (:name) 参数来准备sql语句
	 echo "3.prepare,execute查询:<br>";
	 echo "1.使用(:name)参数<br>";
	 $sql ="select name,person,grade from book_250 where name=:request_name";
	 $temp = $obj->prepare($sql);
	 $temp->execute(array(':request_name'=>"小王子"));
	 $res = $temp->fetchAll();
	 print_r($res);
	 
	 //2.使用(?) 参数来准备sql语句
	 echo "<br>2.使用(?)参数<br>";
	 $sql = "select name,person,grade from book_250 where name=?or name=?";
	 $temp = $obj->prepare($sql);
	 $temp->execute(array("小王子","围城"));
	 $res = $temp->fetchAll();
	 print_r($res);
	 echo "<hr/>";
	 
	 //★4.开启事务
	 echo "4.事务处理:<br>";
	 /*
	 $obj->beginTransaction();
	 try{
		 
	    $temp = $obj->query('insert into book_250(name,person,grade) values("1","1","1")');
	 }
	 catch(PDOException $e)
	 {
		 $obj->rollBack();
	 }
	 $obj->commit();
	 */
	 echo "<hr/>";
	 
	 
	 //★5.把结果集绑定到PHP变量
	 echo "5.把某一列绑定到php变量:<br>";
	 $sql = "select name,grade,person from book_250 limit 3";
	 try{
		 $temp = $obj->prepare($sql);
		 $temp->execute();
		 //绑定
		 $temp->bindColumn(1,$name);
		 $temp->bindColumn(2,$grade);
		 $temp->bindColumn("person",$person);
		 while($row=$temp->fetch(PDO::FETCH_BOUND))
		 {
			  echo $name."\t".$grade."\t".$person."\t"."<br>";
		 }
	 }
	 catch(PDOException $e)
	 {
		 print($e->getMessage());
	 }
	 echo "<hr>";
	 
	 echo "6.绑定一个参数到指定的变量名:<br>";
	 $bookname="无人生还";
	 $sql = "select name,grade,person from book_250 where name=:bookname";
	 $temp=$obj->prepare($sql);
	 $temp->bindParam(":bookname",$bookname);
	 $temp->execute();
	 $res = $temp->fetchAll();
	 print_r($res);
	 echo "<hr/>";
	 
	 echo "7.绑定一个值到一个参数:<br>";
	 $sql = "select name,grade,person from book_250 where name=:bookname";
	 $temp=$obj->prepare($sql);
	 $temp->bindValue(":bookname","阿Q正传");
	 $temp->execute();
	 $res = $temp->fetchAll();
	 print_r($res);
	 echo "<hr/>";
	 
	 
	 echo "8.closeCursor使用<br>";
	 $sql = "select name,grade,person from book_250 limit 3";
	 $temp=$obj->prepare($sql);
	 $temp->execute();
	 $res = $temp->fetch();//只取了一行数据
	 $temp->closeCursor();//关闭游标
	 print_r($res);
	 echo "<br>";

	 
	 $othertemp=$obj->prepare($sql);
	 $othertemp->execute();
	 $otherres = $othertemp->fetch();
	 print_r($otherres);
	 echo "<br>";
	 echo "<hr/>";
	 
	 
	 echo "9.fetch,fetchAll<br>:";
	 $sql = "select name,grade from book_250 limit 3";
	 $res = $obj->query($sql);
	 echo "fetch()取的一行:<br>";
	 print_r($res->fetch());
     echo "<br>fetchAll()取s得全部(因为前面已经取得一行，指针后移。所以会取得剩下的全部:<br>";
	 print_r($res->fetchAll());
	 echo "<hr/>";
	 
	 
	 echo "10.fetchColumn(),如果使用 PDOStatement::fetchColumn() 取回数据，则没有办法返回同一行的另外一列:<br>";
	 $sql = "select name,grade,person from book_250 limit 6";
	 $res = $obj->query($sql);
	 print_r($res->fetchColumn());
	 echo "<br>★返回下一行的单独一列<br>";
	 print_r($res->fetchColumn(1));
	 echo "<br>";
	 print_r($res->fetchColumn(2));
	 echo "<br>"; 
	 echo "<hr/>";
	 
	 
	 echo "11.getColumnMeta(),返回结果集中一列的元数据:<br>";
	 $sql = "select name,grade from book_250 limit 3";
	 $res = $obj->query($sql);
	 $meta =$res->getColumnMeta(0);
	 var_dump($meta);
	 echo "<br>";
	 echo "<hr/>";
	 
	 
	 echo "12.nexRowset(),一些数据库服务支持返回一个以上行集(也被称为结果集)的存储过程。
           PDOStatement::nextRowset() 使你能够结合一个 PDOStatement 对象访问第二个以及 
		   后续的行集。上述的每个行集可以有不同的列集合。<hr/>";
	 
	 
	 
	 
	 echo "13.rowCount(),返回上一个由对应的 PDOStatement 对象执行DELETE、 INSERT、或 UPDATE 语句受影响的行数。
	       计算受影响的行数。不过大多数数据库，PDOStatement::rowCount()不受select语句影响<br>
		   ★对于大多数数据库，PDOStatement::rowCount() 不能返回受一条 SELECT 语句影响的行数。替代的方法是，
		   使用 PDO::query() 来发出一条和原打算中的SELECT语句有相同条件表达式的 SELECT COUNT(*) 语句，然后用
		   PDOStatement::fetchColumn() 来取得下一行。这样应用程序才能正确执行。";   
	 $sql ="select count(*) from book_250";
	 echo "<br>";
	 $res = $obj->query($sql);
	 print_r($res->rowCount());
	 echo "<br>";
	 print_r($res);
	 echo "<br>";
	 print_r($res->fetchColumn());
	 
	 $sql ="select count(name) from book_250";
	 echo "<br>";
	 $res = $obj->query($sql);
	 print_r($res->rowCount());
	 echo "<br>";
	 print_r($res);
	 echo "<br>";
	 print_r($res->fetchColumn());
	 echo "<hr/>";
	 	 
	 
	 $obj=NULL;
   }
   catch(PDOException $e)
   {
      die("连接失败:".$e->getMessage()."<hr/>");
   }
   echo "结束测试:<br>";
   

?>