
<table width="300" height="100" border="1"  cellpadding="0" cellspacing="0" background="/image/2018.3.9.gif">
<form name="form1" method="post" action="表单元素获取.php">
    <tr>
        <td width="100" height="20" align="center" class="style1">&nbsp;&nbsp;Admin:</td>
        <td width="150" height="20" align="center"><input name="username" type="text" id="username" value="" size="10"></td>
    </tr>
	<tr>
	    <td align="center" class="style1">Pass:</td>
		<td height="20" align="center"><input name="password" type="password" id="password" value="" size="10"></td>
	</tr>
    <tr>
	    <td>&nbsp;</td>
		<td height="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<input type="submit" name="submit" value="submit"></td>
	</tr>
</form>
</table>

<?php
if($_POST[submit]=="submit")
{
	$username=$_POST[username];
	$password=$_POST[password];
}

?>

<table width="300" border="1" cellpadding="0" cellspacing="0">
<tr>
    <td height="20" align="center" class="style1"><?php echo "Admin:$username";?></td>
</tr>
<tr>
    <td height="20" align="center" valign="middle" class="style1"><?php echo "Pass:$password";?></td>
</tr>
</table>