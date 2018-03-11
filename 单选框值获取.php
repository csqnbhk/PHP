
<table width="300" height="200" cellpadding="0" cellspacing="0" border="1">
<form name="form1" method="post" action="单选框值获取.php">
<tr>
    <td>跑步<input type="radio" name="group1" value="跑步"</td>
	<td>打球<input type="radio" name="group1" value="打球"</td>
	<td>游泳<input type="radio" name="group1" value="游泳"</td>
</tr>

<tr align="center" >
   <td colspan="3"><input type="submit" name="submit" value="提交"></td>
</tr>
</form>
</table>


<?php
  if($_POST[submit]=="提交")
  {
	  echo '该用户喜欢:'.$_POST[group1];
  }
?>