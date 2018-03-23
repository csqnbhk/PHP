<?php

  include "db.php";
  include "page.php";
   $db_obj=new db('localhost','root','123456','books');
   $db_obj->db_conn();
   $db_obj->db_result_query('select*from book_250');
   
   $pagesize=10;
   $totalRows=$db_obj->db_row();
   $totalPages=ceil($totalRows/$pagesize);
   $current_page=isset($_GET['page'])?(int)$_GET['page']:1;
   if($current_page<1||$current_page==null||(!is_numeric($current_page)))
   {
	   $current_page=1;
   }
   if($current_page>=$totalPages)
   {
	   $current_page=$totalPages;
   }
   $offset=($current_page-1)*$pagesize;
   
   $sql="select*from book_250 limit {$offset},{$pagesize}";
   $result=$db_obj->db_result_query($sql);
   echo "<hr/>";
   foreach($result as $key=>$val)
   {
	   echo "<tr>
	      <td>{$val['name']}</td>
		  <td>{$val['person']}</td>
		  <td>{$val['grade']}</td>
	   </tr><hr/> ";
   }
   
   
   echo getpage($current_page,$totalPages);


  
  $db_obj->db_close();
?>