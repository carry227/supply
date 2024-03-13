<? include("function.php") ?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "服務地區";
  }
    window.onload=statustext
</script>
</head>
<body bgcolor="#FFCC66" text="#000000">
<br>
以下為配送服務地區，直接取件及配送，其餘地區一律採郵局匯款寄送 
<table width="60%" border="0">
  <tr bgcolor="#660000"> 
    <td width="20%"><div align="center"><font color="#FFFFFF">郵遞區號</font></div></td>
    <td width="80%"><div align="center"><font color="#FFFFFF">說明</font></div></td>
  </tr>
  <? 
  $sql = "select post_code,post_discript from postcode where post_code_status = 'Y' order by post_code ";
  $rs = get_pg_result($sql);
  $rowmax = pg_num_rows ($rs);
  for($i=0;$i<$rowmax;$i++){ 
   $data = pg_fetch_object ($rs, $row); ?>
  <tr> 
    <td bgcolor="#FFFFFF"><div align="center"><font color="#0000FF"><? echo $data->post_code ?></font></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><font color="#0000FF"><? echo $data->post_discript ?></font></div></td>
  </tr>
  <? } ?>
</table>
<p><font color="#000000">郵局匯款步驟</font></p>
買方：收到匯款通知電子郵件→匯入金額到指定帳號→我方確認後寄出書本
<br>
賣方：收到寄出書籍通知→寄出書籍到指定地址→我們確認無誤後，三日內撥款到您指定帳號
<br>
<font color="#FF0000">注意：賣方寄出書籍應含隨書所附光碟，否則不予受予受理，且須匯回郵金額，我們才將書籍回寄</font> <body> </html>
