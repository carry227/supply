<?php include("function.php")?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "查待售狀況";
  }
    window.onload=statustext
</script>
</head>

<body bgcolor="#FFCC66" text="#000000">
<?php 
  if (check_logon() == 0) {
      js_alert("您未登入,請先登入才可查詢個人出售資料!");
	  echo "<script language='javascript'>self.location.href='member_logon.htm';</script>";
  }
  $sql = "select b.sale_no ,a.bname,a.author,b.status,a.org_price,(select p_name from book_publisher where p_code = a.p_code) as p_name from book a,sale b";
  $sql .=" where a.isbn = b.isbn and sale_id = "."'$si_mobile'";
  $sql .=" and (b.status <> '9' ) order by b.sale_no desc";
  
  $rs = get_pg_result($sql);
  $rowmax = pg_num_rows($rs);
  ?>
<table width="98%" cellspacing="1">
  <tr bgcolor="#660000"> 
    <th width="12%"><div align="center"><font color="#FFFFFF">出售編號</font></div></td>
	<th width="10%"><div align="center"><font color="#FFFFFF">出版商</font></div></td>  
    <th width="40%"><div align="center"><font color="#FFFFFF">書名</font></div></td> 
    <th width="10%"><div align="center"><font color="#FFFFFF">作者</font></div></td> 
    <th width="8%"><div align="center"><font color="#FFFFFF">出售<br>金額</font></div></td> 
    <th width="8%"><div align="center"><font color="#FFFFFF">狀態</font></div></td> 
    <th width="8%"><div align="center"><font color="#FFFFFF">調整</font></div></td> 
  </tr>
  <? for ($i=0;$i<$rowmax;$i++) {
    $data = pg_fetch_object($rs,$i); ?>
  <tr> 
    <td bgcolor="#FFFFFF"><div align="center"><? echo $data->sale_no;?></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><? echo $data->p_name;?></div></td>
    <td bgcolor="#FFFFFF"><? echo $data->bname;?></td>
    <td bgcolor="#FFFFFF"><div align="center"><? echo $data->author;?></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><? echo ($data->org_price)/2;?></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><? echo get_sale_status($data->status);?></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><? echo get_sale_status_way($data->status,$data->sale_no,'sell','');?></div></td>
    <? $total += ($data->org_price)/2; ?>
  </tr>
  <? }?>
  <tr bgcolor="#FFFFCC"> 
    <td><div align="center"></div></td>
    <td></td>
    <td><div align="center"></div></td>
    <td><div align="center"><strong>出售合計:</strong></div></td>
    <td><div align="center"><strong><? echo $total?></strong></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>	
  </tr>
</table>

</body>
</html>
