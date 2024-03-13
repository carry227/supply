<? include("function.php") ?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "書籍分類總表";
  }
    window.onload=statustext
</script>
</head>
<body bgcolor="#FFCC66" text="#000000">
<br>書籍分類總表
<table width="100%" border="0">
   <tr bgcolor="#660000">
    <th width="10%"><div align="center"><font color="#FFFFFF">大分類</font></div></th>
    <th width="10%"><div align="center"><font color="#FFFFFF">中分類</font></div></th>
    <th width="30%"><div align="center"><font color="#FFFFFF">小分類</font></div></th>
   </tr>
<? 
  $sql = "select distinct discript1,discript2,class_code1,class_code2 from book_type where class_status = 'Y' and class_code1 <> '000' order by class_code1,class_code2 ";
  $rs = get_pg_result($sql);
  $rowmax = pg_num_rows ($rs);
  for($i=0;$i<$rowmax;$i++){ 
  $data = pg_fetch_object ($rs, $row); ?>
  <tr>
<td bgcolor="#FFFFFF"><div align="center"><font color="#FF0000"><? echo $data->discript1 ?></font></div></td>
<td bgcolor="#FFFFFF"><div align="center"><font color="#0000FF"><? echo $data->discript2 ?></font></div></td>
<td bgcolor="#FFFFFF">
<?    if ($old_discript <> $data->discript2) {
       $old_discript = $data->discript2 ;
	   $cond = " where class_code2 ="."'$data->class_code2'";
       $list = get_sql_list1('book_type','class_code3','discript3',$cond);?>
		<table width="100%" border="0">
		  
		  <?  while(trim($list) <> ''){?>
		  <tr>
	       <? for ($j=0;$j<4;$j++){ ?>  
		    	
          <td width="20%" align="left"><font color="#000000"><? echo substr($list,0,strpos($list,'|')); $list = substr($list,strpos($list,'|')+1);?></font><font color="#006600"><? echo substr($list,0,strpos($list,'|')); $list = substr($list,strpos($list,'|')+1);?></font></td>
		   <? }?>
		   </tr>
		  <?  } ?>
		  
		</table>

</td>
  </tr>
  <? }
   } ?>
</table>
<table width="100%" border="0">
<tr>
    <td> <p align="right">若您預銷售的書籍不在我們的分類<font color="#000000"  face="新細明體, 標楷體">，</font>請<a href="mailto:usedbook@supply.com.tw">來信告知</a><font color="#000000"  face="新細明體, 標楷體">，</font>我們將儘快為您處理。</p>
</td></tr>
</table>
</body>
</html>
