<? include("variable.php")?>
<? include("function.php")?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<body bgcolor="#FFCC66" text="#000000">
</head>

<? $sql ="select a.sale_no,b.bname,b.author,a.sale_discription,b.org_price,a.status,(select p_name from book_publisher where p_code = b.p_code) as p_name from sale a ,book b where sale_no = '$sale_no' and a.isbn = b.isbn";
	$rs  = get_pg_result($sql);
	$data = pg_fetch_object($rs,0);
?>
<form action="update_sale.php" method="post">
  <table width="98%" border="0" cellpadding="0" cellspacing="2">
    <tr> 
      <td width="20%" bgcolor="#663300"><div align="right"><font color="#FFFFFF">�X��s�� 
          :</font></div></td>
      <td width="88%" bgcolor="#00CC99"><font color="#0000FF"><? echo $data->sale_no;?></font> 
        <input type="hidden" name="sale_no" value="<? echo $data->sale_no;?>"> 
        <input type="hidden" name="mobile" value="<? echo $si_mobile;?>">
		<input type="hidden" name="act" value="13"> 
		<input type="hidden" name="p" value=<? echo $p;?>> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�X���� :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->p_name;?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�ѦW :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->bname;?></font></td>
    </tr>	
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�@�� :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->author;?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">���� :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->sale_discription;?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">��� :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo ($data->org_price);?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">��� :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo ($data->org_price)/2;?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�e�Ѧ�} :</font></div></td>
      <td bgcolor="#00CC99"><p>
          <select name="set_add">
            <? $sql = "select address1,address2,address3 from member where mobile = "."'$si_mobile'" ;
		      $rs = get_pg_result($sql);
	          $data = pg_fetch_object($rs,0);
			  $arr = array("$data->address1","$data->address2","$data->address3");
			  echo get_array_list($arr,$data->address1);  
			?>
          </select>
        <font style="filter: glow(color=#FFFFFF,strength=3); height:8px; color:red; padding:1px">�п�ܨ���a�},�Y�L�A���w�a�},�Цܷ|��<a href="member_modify.php">�ק���</a>�ץ�.<br>����ɶ���09:00~18:00(���t����)</font></tr>
    <tr> 
      <td> </td>
      <td><input type="submit" name="Submit" value="�T�w�ʶR">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
