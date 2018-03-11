
<table width="300" height="200"  border ="1" cellpadding="0" cellspacing="0">
<form name="form1" method="post" action="文本域获取.php">
<tr align="center">
<td  height="50" width="300" colspan="2" >留言板</td>
</tr>
<tr>
<td algin="center" width="100" height="100">留言内容:</td>
<td width="200" height="100"><textarea name="text" cols="26" rows="8" id="text" ></textarea></td>
</tr>
<tr align="center" >
<td height="50" colspan="2" ><input type="submit" name="submit" value="提交留言"></td>
</tr>
</form>
</table>

<?php
if($_POST[submit]=="提交留言")
{
	echo $_POST[text];
}
?>