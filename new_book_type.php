<? include("function.php") ?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "���y�����`��";
  }
    window.onload=statustext
</script>
</head>
<body bgcolor="#FFCC66" text="#000000">
<br>���y�����`��
<table width="100%" border="0">
   <tr bgcolor="#660000">
    <th width="10%"><div align="center"><font color="#FFFFFF">�j����</font></div></th>
    <th width="10%"><div align="center"><font color="#FFFFFF">������</font></div></th>
    <th width="30%"><div align="center"><font color="#FFFFFF">�p����</font></div></th>
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
    <td> <p align="right">�Y�z�w�P�⪺���y���b�ڭ̪�����<font color="#000000"  face="�s�ө���, �з���">�A</font>��<a href="mailto:usedbook@supply.com.tw">�ӫH�i��</a><font color="#000000"  face="�s�ө���, �з���">�A</font>�ڭ̱N���֬��z�B�z�C</p>
</td></tr>
</table>
</body>
</html>
