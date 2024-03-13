<? include("function.php")?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<script language="JavaScript">
  function statustext() {
    window.status = "近期登售";
  }
    window.onload=statustext
</script>
</head>

<body bgcolor="#FFCC66" text="#000000">


<link rel="stylesheet" href="../css/style.css" type="text/css"> 
<body bgcolor="#FFCC66" text="#000000">
<?
$b_day = 60;  //設定几天前出售且可賣的書籍
$day_1  = date("Ymd",mktime (0,0,0,date("m"),date("d")-$b_day,date("Y")));
$sql_query = "select a.sale_no,b.bname,b.author,a.sale_discription,b.org_price,a.status,";
$sql_query.="(SELECT p_name FROM book_publisher WHERE p_code = b.p_code) as p_name,";
$sql_query.="(SELECT distinct discript1 FROM book_type WHERE class_code1 = b.class_code1) as discript1,";
$sql_query.="(SELECT distinct discript2 FROM book_type WHERE class_code2 = b.class_code2) as discript2,";
$sql_query.="(SELECT distinct discript3 FROM book_type WHERE class_code3 = b.class_code3) as discript3";
$sql_query.=" from sale a ,book b ";
$sql_query.= " where  a.sale_date >="."'$day_1'"." and a.status = '1' and a.isbn = b.isbn order by discript1,discript2,discript3,a.isbn ";	  

$rs = get_pg_result($sql_query);
$rowmax = pg_num_rows($rs);?>

<?   if ($rowmax == 0) { ?>
 <center>
  近期無新出售書籍資料 
</center>
    
<? }else{?>

 <form>
 
  <table width="98%" border="0" align="center">
    <tr bgcolor="#660000"> 
      <td width="10%"><div align="center"><font color="#FFFFFF">出售編號</font></div></td>
      <td width="10%"><div align="center"><font color="#FFFFFF">出版商</font></div></td>
      <td width="28%"><div align="center"><font color="#FFFFFF">書名</font></div></td>
      <td width="10%"><div align="center"><font color="#FFFFFF">作者</font></div></td>
      <td width="22%"><div align="center"><font color="#FFFFFF">說明</font></div></td>
      <td width="8%"><div align="center"><font color="#FFFFFF">原價</font></div></td>
      <td width="8%"><div align="center"><font color="#FFFFFF">售價</font></div></td>
    </tr>
    <? for ($i=0;$i<$rowmax;$i++){
      $data = pg_fetch_object($rs,$i);
	  $c3_now = $data->discript3;
	 if ($c3_now <> $c3_old){
	     $c3_old = $c3_now; ?>
    <tr bgcolor="#FFFFFF"> 
      <td><div align="center"><font color="#ff00ff"><? echo $data->discript1 ;?> 
          </font></div></td>
      <td><div align="center"><font color="#ff00ff"><? echo $data->discript2 ;?> 
          </font></div></td>
      <td><font color="#ff00ff"><? echo $data->discript3 ;?></font></td>
      <td><div align="center"><font color="#0000FF"><font color="#FFFFFF"><font color="#FF0000"><font color="#0000FF"><font color="#CCCCCC"><font color="#999999"><font color="#0000FF"><font color="#FF00FF"><font color="#FF00FF"><font color="#FFFFFF"><font color="#FF0000"></font></font></font></font></font></font></font></font></font></font></font></div></td>
      <td><div align="center"><font color="#0000FF"><font color="#FFFFFF"><font color="#FF0000"><font color="#0000FF"><font color="#CCCCCC"><font color="#999999"><font color="#0000FF"><font color="#FF00FF"><font color="#FF00FF"><font color="#FFFFFF"><font color="#FF0000"></font></font></font></font></font></font></font></font></font></font></font></div></td>
      <td><div align="center"><font color="#0000FF"><font color="#FFFFFF"><font color="#FF0000"><font color="#0000FF"><font color="#CCCCCC"><font color="#999999"><font color="#0000FF"><font color="#FF00FF"><font color="#FF00FF"><font color="#FFFFFF"><font color="#FF0000"></font></font></font></font></font></font></font></font></font></font></font></div></td>
      <td><div align="center"><font color="#0000FF"><font color="#FFFFFF"><font color="#FF0000"><font color="#0000FF"><font color="#CCCCCC"><font color="#999999"><font color="#0000FF"><font color="#FF00FF"><font color="#FF00FF"><font color="#FFFFFF"><font color="#FF0000"></font></font></font></font></font></font></font></font></font></font></font></div></td>
    </tr>
    <? } ?>
    <tr bgcolor="#FFFFFF"> 
      <td><div align="center"><? echo $data->sale_no ;?> </div></td>
      <td><div align="center"><? echo $data->p_name ;?> </div></td>
      <td><? echo $data->bname ;?></td>
      <td><div align="center"><? echo $data->author ;?></div></td>
      <td><? echo $data->sale_discription ;?></td>
      <td><div align="center" style="Text-decoration:line-through"><font color="#0000FF"><? echo $data->org_price ;?></font></div></td>
      <td><div align="center" style="Text-decoration:blink"><font color="#FF0000"><? echo ($data->org_price)/2 ;?></font></div></td>
    </tr>
    <? }?>
  </table>
   </form>
 
<? }?>
</body>
</html>
