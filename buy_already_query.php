<?php include("function.php")?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
 
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "�d�w�R���y";
  }
    window.onload=statustext
</script>
</head>

<body bgcolor="#FFCC66" text="#000000">
<?php 
  if (check_logon() == 0) {
      js_alert("�z���n�J,�Х��n�J�~�i�d�߭ӤH�X����!");
	  echo "<script language='javascript'>self.location.href='member_logon.htm';</script>";
  }
  $sql = "select b.sale_no ,a.bname,a.author,b.status,a.org_price from book a,sale b";
  $sql .=" where a.isbn = b.isbn and buy_id = "."'$si_mobile'";
  $sql .="  order by b.sale_no";
  
  $rs = get_pg_result($sql);
  $rowmax = pg_num_rows($rs);
  ?>
<table width="95%" cellspacing="1">
  <tr bgcolor="#660000"> 
    <th width="15%"><div align="center"><font color="#FFFFFF">�X��s��</font></div></td> 
    <th width="40%"><div align="center"><font color="#FFFFFF">�ѦW</font></div></td> 
    <th width="10%"><div align="center"><font color="#FFFFFF">�@��</font></div></td> 
	<th width="10%"><div align="center"><font color="#FFFFFF">�ʶR���B</font></div></td> 
    <th width="10%"><div align="center"><font color="#FFFFFF">���A</font></div></td> 
    <th width="10%"><div align="center"><font color="#FFFFFF">�վ�</font></div></td> 
  </tr>
  <? for ($i=0;$i<$rowmax;$i++) {
    $data = pg_fetch_object($rs,$i); ?>
  <tr> 
    <td bgcolor="#FFFFFF"><div align="center"><? echo $data->sale_no;?></div></td>
    <td bgcolor="#FFFFFF"><? echo $data->bname;?></td>
    <td bgcolor="#FFFFFF"><div align="center"><? echo $data->author;?></div></td>
	<td bgcolor="#FFFFFF"><div align="center"><? echo ($data->org_price)/2;?></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><? echo get_sale_status($data->status);?></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><? echo get_sale_status_way($data->status,$data->sale_no,'buy','');?></div></td>
     <? $total += ($data->org_price)/2; ?>
  </tr>
  <? }?>
  <tr bgcolor="#FFFFCC"> 
    <td><div align="center"></div></td>
    <td><font color="#FFFFCC">&nbsp;</font></td>
	<td><div align="center"><font color="#000000"><strong>�ʶR���B:</strong></font></div></td>
    <td><div align="center"><font color="#000000"><strong><? echo $total;?></strong></font></div></td>
    <td><div align="center"></div></td>
	<td><div align="center"></div></td>
  </tr>
</table>

</body>
</html>
