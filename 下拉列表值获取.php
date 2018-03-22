<table width="100" width="100" border="1" cellpadding="0" cellspacing="0">
<form name="form1" method="post" action="下拉列表值获取.php">
<tr align="center">
<td width="50" height="50"><select name="select1" size="1" >
    <option>跑步</option>
	<option>打球</option>
	<option>游泳</option>
</select>
</tr>

<tr align="center">
<td width="50" height="50"><input type="submit" name="submit" value="提交"></td>
</tr>

</form>
</table>

<?php
  if($_POST[submit]=="提交")
  {
    echo '该用户喜欢:'.$_POST[select1];
  }

?>