<? include("variable.php")?>
<? include("function.php")?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<script language="JavaScript">
  function statustext() {
    window.status = "�ؽ�Ѹ��(step 3/3)";
  }
    window.onload=statustext
</script>
</head>

<body bgcolor="#FFCC66">
<form action="insert_sale.php" method="post" name="from">
  <table width="98%" border="0">
    <tr> 
      <td width="12%"><div align="right">ISBN:</div></td>
      <td width="40%"><? echo $isbn;?>
        <input name="isbn" type="hidden" id="isbn" value="<? echo $isbn;?>" ></td>
      <td width="58%">&nbsp;</td>
    </tr>
    <tr> 
      <td><div align="right">�X���:</div></td>
      <td><? echo $si_mobile;?>
        <input name="sale_id" type="hidden" id="sale_id" value="<? echo $si_mobile;?>" ></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><div align="right">�w����:</div></td>
      <td><? echo date('Y-m-d');?>
        <input name="sale_date" type="hidden" id="sale_date" value="<? echo date('Y-m-d');?>" ></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td height="70"><div align="right">�X�⻡��:</div></td>
      <td><textarea name="sale_discription" cols="40" id="discription"></textarea></td>
      <td><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">�ж�ѥ�²���ήѪp...��(��40�r��).</font> </td>
    </tr>
    <tr> 
      <td><div align="right">����a�}:</div></td>
      <td><select name="get_add">
          <? $sql = "select address1,address2,address3 from member where mobile = "."'$si_mobile'" ;
		      $rs = get_pg_result($sql);
	          $data = pg_fetch_object($rs,0);
			  $arr = array("$data->address1","$data->address2","$data->address3");
			  echo get_array_list($arr,$data->address1);  
			?>
        </select> </td>
      <td><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">�п�ܨ���a�},�Y�L�A���w�a�},�Цܷ|��<a href="member_modify.php">�ק���</a>�ץ�.<br>����ɶ���09:00~18:00(���t����)</font></td>
    </tr>
    <tr> 
      <td><div align="right">����:</div></td>
      <td><select name="ver">
          <? echo get_num_list(1,10,0,1);?> </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><input type="hidden" name="class_code3" value="<? echo $class_code3?>"><input type="hidden" name="cd" value="<? echo $cd?>"></td>
      <td><input type="submit" name="Submit" value="�e�X"> 
        <input type="reset" name="Submit2" value="�M��"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
