<? include("function.php")?>
<? include("variable.php")?>

<link rel="stylesheet" href="../css/style.css" type="text/css"> 
<body bgcolor="#FFCC66" text="#000000">
<?
//init value
$page_size = 10;    //每頁筆數 
if (empty($p))	$p = 1;
//$limit = ($p-1) * $page_size;
//$index = $limit + 1;  移到下面
//=================================================	
if (isset($si_sql_query_buy) and trim($si_sql_query_buy)<>''){
    $sql_query = $si_sql_query_buy;
}else{ 
	 $sql_query = "select a.sale_no,b.bname,b.author,a.sale_discription,b.org_price,a.status,(SELECT p_name FROM book_publisher WHERE p_code = b.p_code) as p_name from sale a ,book b ";
	
	  if (isset($isbn) and trim($isbn)<>''){
		  if(isset($condition)){
			 $condition .= " and a.isbn like "."'%$isbn%'"; 
		  }else{
			 $condition = " a.isbn like "."'%$isbn%'"; 	  
		  }       
	   } 
	   
	  if (isset($class_code1) and trim($class_code1)<>'000'){
		  if(isset($condition)){
			 $condition .= " and substr(a.class_code3,1,3) like "."'%$class_code1%'";
		  }else{
			 $condition = " substr(a.class_code3,1,3) like "."'%$class_code1%'";
		  }       
	   } 
	   
	  if (isset($class_code2) and trim($class_code2)<>'00000'){
		  if(isset($condition)){
			 $condition .= " and substr(a.class_code3,1,5) like "."'%$class_code2%'";
		  }else{
			 $condition = " substr(a.class_code3,1,5) like "."'%$class_code2%'";
		  }       
	   }    
	   
	  if (isset($class_code3) and trim($class_code3)<>'00000000'){
		  if(isset($condition)){
			 $condition .= " and a.class_code3 like "."'%$class_code3%'";
		  }else{
			 $condition = " a.class_code3 like "."'%$class_code3%'";
		  }       
	   }
	   
	  if (isset($p_code) and trim($p_code)<>'000'){
		  if(isset($condition)){
			 $condition .= " and b.p_code like "."'%$p_code%'";
		  }else{
			 $condition = " b.p_code like "."'%$p_code%'";
		  }       
	   } 
				 
	   
	  if (isset($author) and trim($author)<>''){
		  if(isset($condition)){
			 $condition .= " and b.author like "."'%$author%'";
		  }else{
			 $condition = " b.author like "."'%$author%'";
		  }       
	   }    
	   
	  if (isset($bname) and trim($bname)<>''){
		  if(isset($condition)){
			 $condition .= " and b.bname like "."'%$bname%'";
		  }else{
			 $condition = " b.bname like "."'%$bname%'";
		  }       
	   }    
	   
	  if (isset($near) and trim($near)<>'未填資料'){
		  switch($near){
		  case '10天內':$b_day=10;    break;
		  case '20天內':$b_day=20;    break;
		  case '30天內':$b_day=30;    break;
		  default :$b_day = 0;
		  }
		if($b_day<>0){
		  $day_1  = date("Ymd",mktime (0,0,0,date("m"),date("d")-$b_day,date("Y")));
		  if(isset($condition)){
			 $condition .= " and a.sale_date >="."'$day_1'";
		  }else{
			 $condition = " a.sale_date >="."'$day_1'"; 	  
		  }       
		 }
	   }    
	
	 if(isset($condition)){
	   $sql_query .= " where ".$condition." and a.status = '1' and a.isbn = b.isbn order by a.class_code3,a.sale_date desc ";
	 }else{
	   $sql_query .= " where ".$condition." a.status = '1' and a.isbn = b.isbn order by a.class_code3,a.sale_date desc ";
	 }     
}

//total_row符合條件總筆數
$sql_count = "select count(*) as total_row ";
$sql_count .= substr($sql_query,strpos($sql_query,"from"));
$sql_count = substr($sql_count,0,strpos($sql_count,"order"));

$rs = get_pg_result($sql_count);
$data = pg_fetch_object($rs,0);
$total_row = $data->total_row;
//總頁數
$page_number = ceil($total_row/$page_size);
if ($page_number<$p) {$p = $page_number;}
$limit = ($p-1) * $page_size;
if ($limit < 0 ) $limit = 0;
$index = $limit + 1;

$si_sql_query_buy = $sql_query;
//add limit
$sql_query .= "limit ".$page_size.",".$limit;

$rs = get_pg_result($sql_query);
$rowmax = pg_num_rows($rs);?>

<?   if ($rowmax == 0) { ?>
 <center>
	無找到符合條件資料 !!!
	<form>
		<input type="button" value="回上一頁" onclick="history.go(-1)">
	</form>
    </center>
    
<? }else{?>

 <form>
  <table align="center" cellpadding="1" cellspacing="0" width="98%" border="0">
	<tr>
		<td>
			目前共有 <font color="red"><?php echo $total_row; ?></font> 筆資料 (<?php echo $index; ?>-<?php echo $index+$rowmax-1; ?>)
		</td>
	</tr>
 </table>
 <table width="100%" border="0" align="center">
    <tr bgcolor="#660000"> 
      <td width="10%"><div align="center"><font color="#FFFFFF">出售編號</font></div></td>
      <td width="10%"><div align="center"><font color="#FFFFFF">出版商</font></div></td>	  
      <td width="28%"><div align="center"><font color="#FFFFFF">書名</font></div></td>
      <td width="10%"><div align="center"><font color="#FFFFFF">作者</font></div></td>
      <td width="22%"><div align="center"><font color="#FFFFFF">說明</font></div></td>
      <td width="7%"><div align="center"><font color="#FFFFFF">原價</font></div></td>
      <td width="7%"><div align="center"><font color="#FFFFFF">售價</font></div></td>
      <td width="10%"><div align="center"><font color="#FFFFFF">調整</font></div></td>
    </tr>
    <? for ($i=0;$i<$rowmax;$i++){
      $data = pg_fetch_object($rs,$i)?>
    <tr bgcolor="#FFFFFF"> 
      <td><div align="center"><? echo $data->sale_no ;?> </div></td>
      <td><div align="center"><? echo $data->p_name ;?> </div></td>	  
      <td><? echo $data->bname ;?></td>
      <td><div align="center"><? echo $data->author ;?></div></td>
      <td><? echo $data->sale_discription ;?></td>
      <td><div align="center" style="Text-decoration:line-through"><font color="#0000FF"><? echo $data->org_price ;?></font></div></td>
      <td><div align="center" style="Text-decoration:blink"><font color="#FF0000"><? echo ($data->org_price)/2 ;?></font></div></td>
      <td><div align="center"><? echo get_sale_status_way($data->status,$data->sale_no,'buy',$p);?></div></td>
    </tr>
    <? }?>
  </table>
   </form>
   <form name="page_n_form" action="<?php echo $PHP_SELF; ?>" method="post">

	<input type="hidden" name="p">

	<input type="Hidden" name="curr_order" value="<?php echo $curr_order; ?>">

<?php if ($p > 1) { ?><input type="button" value="上一頁" onclick="this.form.p.value=<?php echo $p-1; ?>; this.form.submit()">&nbsp;<?php } ?>
<?php if ($p < $page_number) { ?><input type="button" value="下一頁" onclick="this.form.p.value=<?php echo $p+1; ?>; this.form.submit()">&nbsp;<?php } ?>
<?php if ($p != 1) { ?><input type="button" value="第一頁" onclick="this.form.p.value=1; this.form.submit()">&nbsp;<?php } ?>
<?php if ($p != $page_number) { ?><input type="button" value="最後一頁" onclick="this.form.p.value=<?php echo $page_number; ?>; this.form.submit()">&nbsp;<?php } ?>



	<select name="page_n" onchange="this.form.p.value=this.form.page_n.options[this.form.page_n.selectedIndex].value; this.form.submit()">

<?php for ($i = 1; $i <= $page_number; $i++) { ?><option value="<?php echo $i; ?>"<?php if ($p == $i) echo " selected"; ?>><?php echo $i; ?></option><?php } ?>

	</select>

</form>
<? }?>
</body>
