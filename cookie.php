<?php
   setcookie("user","demon",time()+60,"C:/Users/Administrator/Desktop/");
?>
<html>
<head>
<title>cookies的使用</title>
</head>
<body>
      <h2>1.获取该cookies值</h2>
	  <?php
	     echo 'user:'.$_COOKIE["user"];
	  ?>
	  <hr>
	  <h2>2.删除该cookies</h2>
	  <?php
	     // setcookie("user","",time()-60);
	  ?>
	  <hr>
	
</body>
</html>