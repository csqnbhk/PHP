<table width="300" height="100" border="1" cellpadding="0" cellspacing="0">
<form name="form1" method="post" action="复选框值获取.php">
<tr>
<td width="50" height="50">跑步<input type="checkbox" name="pb_checkbox" value="跑步"></td>
<td width="50" height="50">打球<input type="checkbox" name="dq_checkbox" value="打球"></td>
<td width="50" height="50">游泳<input type="checkbox" name="yy_checkbox" value="游泳"></td>
</tr>

<tr align="center" >
<td colspan="3"><input type="submit" name="submit" value="提交"></td>
</tr>

</form>
</table>

<?php
  echo "该用户选择了:".$_POST[pb_checkbox].$_POST[dq_checkbox].$_POST[yy_checkbox];
?>