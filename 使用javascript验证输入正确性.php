<table width="200"  width="200" border="1" cellspadding="0" cellspacing="0">
<form name="form1" method="" action="">
<tr>
    <td width="100" height="100">身份证:</td>
    <td width="100" height="100"><textarea name="text" id="text" rows="7" cols="12" onBlur="checkid()"></textarea></td>
<tr>
</form>
</table>

<script language="javascript">
function checkid()
{

   if(form1.text.value.length!=3&&form1.text.value!=5)
   {
     alert('输入身份证有误');
   }
  
}
</script>