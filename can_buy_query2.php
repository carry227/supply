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
      <td width="20%" bgcolor="#663300"><div align="right"><font color="#FFFFFF">出售編號 
          :</font></div></td>
      <td width="88%" bgcolor="#00CC99"><font color="#0000FF"><? echo $data->sale_no;?></font> 
        <input type="hidden" name="sale_no" value="<? echo $data->sale_no;?>"> 
        <input type="hidden" name="mobile" value="<? echo $si_mobile;?>">
		<input type="hidden" name="act" value="13"> 
		<input type="hidden" name="p" value=<? echo $p;?>> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">出版商 :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->p_name;?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">書名 :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->bname;?></font></td>
    </tr>	
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">作者 :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->author;?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">說明 :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->sale_discription;?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">原價 :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo ($data->org_price);?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">售價 :</font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo ($data->org_price)/2;?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">送書住址 :</font></div></td>
      <td bgcolor="#00CC99"><p>
          <select name="set_add">
            <? $sql = "select address1,address2,address3 from member where mobile = "."'$si_mobile'" ;
		      $rs = get_pg_result($sql);
	          $data = pg_fetch_object($rs,0);
			  $arr = array("$data->address1","$data->address2","$data->address3");
			  echo get_array_list($arr,$data->address1);  
			?>
          </select>
        <font style="filter: glow(color=#FFFFFF,strength=3); height:8px; color:red; padding:1px">請選擇取件地址,若無你指定地址,請至會員<a href="member_modify.php">修改資料</a>修正.<br>取件時間為09:00~18:00(不含假日)</font></tr>
    <tr> 
      <td> </td>
      <td><input type="submit" name="Submit" value="確定購買">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
