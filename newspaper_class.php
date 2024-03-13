<? include("function.php") ?>
<?php
  if (check_logon() == 0) {
      js_alert("您未登入,請先登入才可建立出售資料!");
	  echo "<script language='javascript'>self.location.href='member_logon.htm';</script>";
  }
 ?>
<html>
<head>
<title>訂電閱子報</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "訂電閱子報";
  }
    window.onload=statustext
</script>
</head>
電子報於每周三寄出您選擇項目的待出售書籍記錄
<body bgcolor="#FFCC66" text="#000000">
<? $cb_list = get_sql_checkbox();?>
<form action="insert_newspaper.php" method="post">
	<table width="100%" border="0">
<? $j = 0;
  $sql = "select distinct discript1,discript2,class_code1,class_code2 from book_type where class_status = 'Y' and class_code1 <> '000' order by class_code1,class_code2 ";
  $rs = get_pg_result($sql);
  $rowmax = pg_num_rows ($rs);
  for($i=0;$i<$rowmax;$i++){ 
  $data = pg_fetch_object ($rs, $row); ?>
  
  <?    if ($old_discript <> $data->discript2) {
       $old_discript = $data->discript2 ;
	   $cond = " where class_code2 ="."'$data->class_code2'";
       $list = get_sql_list2('book_type','class_code3','discript3',$cond);?>
	   <table width="100%" border="0" bgcolor="#009966">
	  <tr>
	  <td><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:blue; padding:1px"><? echo $data->discript1;echo " -> ";echo $data->discript2;?></font></td>
       <tr>
	   </table>
		<table width="100%" border="0">  
		  <?  while(trim($list) <> ''){?>
	       <tr>  
			<td width="10%" align="left"><? if (trim($list) <> ''){ $j++;?><input name="class_type[<? echo $j?>]" type="checkbox" value="<? echo substr($list,0,strpos($list,'|'));?>"<? if (!(strpos($cb_list,substr($list,0,strpos($list,'|')))===false))  echo " checked";?>><? $list = substr($list,strpos($list,'|')+1);echo substr($list,0,strpos($list,'|')); $list = substr($list,strpos($list,'|')+1);?><? }?></td>
			<td width="10%" align="left"><? if (trim($list) <> ''){ $j++;?><input name="class_type[<? echo $j?>]" type="checkbox" value="<? echo substr($list,0,strpos($list,'|'));?>"<? if (!(strpos($cb_list,substr($list,0,strpos($list,'|')))===false))  echo " checked";?>><? $list = substr($list,strpos($list,'|')+1);echo substr($list,0,strpos($list,'|')); $list = substr($list,strpos($list,'|')+1);?><? }?></td>
			<td width="10%" align="left"><? if (trim($list) <> ''){ $j++;?><input name="class_type[<? echo $j?>]" type="checkbox" value="<? echo substr($list,0,strpos($list,'|'));?>"<? if (!(strpos($cb_list,substr($list,0,strpos($list,'|')))===false))  echo " checked";?>><? $list = substr($list,strpos($list,'|')+1);echo substr($list,0,strpos($list,'|')); $list = substr($list,strpos($list,'|')+1);?><? }?></td>
			<td width="10%" align="left"><? if (trim($list) <> ''){ $j++;?><input name="class_type[<? echo $j?>]" type="checkbox" value="<? echo substr($list,0,strpos($list,'|'));?>"<? if (!(strpos($cb_list,substr($list,0,strpos($list,'|')))===false))  echo " checked";?>><? $list = substr($list,strpos($list,'|')+1);echo substr($list,0,strpos($list,'|')); $list = substr($list,strpos($list,'|')+1);?><? }?></td>          
			<td width="10%" align="left"><? if (trim($list) <> ''){ $j++;?><input name="class_type[<? echo $j?>]" type="checkbox" value="<? echo substr($list,0,strpos($list,'|'));?>"<? if (!(strpos($cb_list,substr($list,0,strpos($list,'|')))===false))  echo " checked";?>><? $list = substr($list,strpos($list,'|')+1);echo substr($list,0,strpos($list,'|')); $list = substr($list,strpos($list,'|')+1);?><? }?></td>
			<td width="10%" align="left"><? if (trim($list) <> ''){ $j++;?><input name="class_type[<? echo $j?>]" type="checkbox" value="<? echo substr($list,0,strpos($list,'|'));?>"<? if (!(strpos($cb_list,substr($list,0,strpos($list,'|')))===false))  echo " checked";?>><? $list = substr($list,strpos($list,'|')+1);echo substr($list,0,strpos($list,'|')); $list = substr($list,strpos($list,'|')+1);?><? }?></td>
            </tr>
		  <?  }} }?>

  <tr><td><input name="count" type="hidden" value="<? echo $j?>"><input name="Submit" type="submit" value="訂閱">
</td></tr>
</table>

</form>
</body>
</html>
