<?php
   /*-
   * author:demon
   * time:2018/3/22
   * 
   */
   
   class db
   {
           private $conn;
	   private $result;
	   private $host;
	   private $user;
	   private $pass;
	   private $database;
	   
	   function __construct()
	   {
	      $obj=func_get_args();
		  $index=count($obj);
		  if(method_exists($this,$f='construct'.$index))
		  { 
		     call_user_func_array(array($this,$f),$obj);
			 
		  }
	   }
	   
	   function construct3($host,$user,$pass)
	   {
		  $this->host=$host;
	      $this->user=$user;
		  $this->pass=$pass;
	   }
	   
	   function construct4($host,$user,$pass,$database)
	   {
		  $this->host=$host;
	      $this->user=$user;
		  $this->pass=$pass;
		  $this->database=$database;
	   }
	   //选择数据库
	   function db_sel($database)
	   {
	      $this->database=$database;
		  mysqli_select_db($this->database);
	   }
	   //连接数据库
       function db_conn()
	   {
	      try
		  {
		     $this->conn=mysqli_connect($this->host,$this->user,$this->pass,$this->database);

		  } 
		  catch(Exception $e)
		  {
		    echo "<script>alert('连接数据库失败!');</script>";
		  }
	   }
	   //执行有结果集的sql语句
	   function db_result_query($sql)
	   {
	       $this->result=mysqli_query($this->conn,$sql);	
	   }
	   function db_noresult_query($sql)
	   {
	       if(!mysqli_query($this->conn,$sql))
		   {
		     echo "<script>alert('执行无结果集sql语句失败!');</script>";
		   }
	   }
	   //执行无结果集的sql语句
	   function db_autocommit($flag)
	   {
	      mysqli_autocommit($this->conn,$flag);
	   }
	   //是否自动提交
	   function db_commit()
	   {
	     mysqli_commit($this->conn);
	   }
	   
	   function db_rollback()
	   {
	     mysqli_rollback($this->conn);
	   }
	   
	   function db_fetch_row()
	   {   
		    while($row=mysqli_fetch_row($this->result))
			{
				for($i=0;$i<count($row);$i++)
				{
					 echo $row[$i].'    ';
				}
				echo '<br>';
			}
	   }
	   
	   function db_conn_info()
	   {
		   echo 'hostname:'.$this->host.','.'user:'.$this->user.','.'database:'.$this->database;
	   }
	   
           function db_close()
	   {
	      mysqli_close($this->conn);
	   }
	   	   	   
   }

   /* //测试
   echo '<h1>开始...</h1><br>';
   $a=new db('localhost','root','123456','books');
   $a->db_conn();
   $a->db_result_query('select*from book_250 limit 30');
   $a->db_fetch_row();
   echo '<h1>结束!!!<br></h1>';
   */
  
?>
