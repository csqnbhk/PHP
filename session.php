<?php
  
  session_start();
  $_SESSION['name']=demon;
?>
<html>
<head>
<title>测试session</title>
</head>
<body>
    <h2>1.获取session值</h2>
	<?php
	  echo '该用户名字为:'.$_SESSION['name'];
	?>
	<hr>
	<h2>1.清空session值</h2>
	<?php
	  unset($_SESSION['name']);
	  echo '清空后的该用户名为:'.$_SESSION['name'];
	?>
	<hr>
	<h2>3.注销session</h2>
	<?php
	   session_destroy();
	?>
	<hr>
</body>
</html>