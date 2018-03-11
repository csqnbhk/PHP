<?php
$hidden_value="爱国,敬业.";
?>
<table width="300" highter="200" border="1" cellpadding="0" cellspacing="0">
<form name="form1" method="post" action="隐藏域值获取.php">
<tr>
    <td width="200" height="100" style="style1">获取隐藏域值:</td>
	<td style="style1" ><input type="submit" name="submit" value="submit"></td>
</tr>
</form>
</table>


<?php
if($_POST[submit]=="submit")
{
  echo "获取到的隐藏域的值为:"."$hidden_value";
}
?>