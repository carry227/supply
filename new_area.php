<? include("function.php") ?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "�A�Ȧa��";
  }
    window.onload=statustext
</script>
</head>
<body bgcolor="#FFCC66" text="#000000">
<br>
�H�U���t�e�A�Ȧa�ϡA��������ΰt�e�A��l�a�Ϥ@�߱Ķl���״ڱH�e 
<table width="60%" border="0">
  <tr bgcolor="#660000"> 
    <td width="20%"><div align="center"><font color="#FFFFFF">�l���ϸ�</font></div></td>
    <td width="80%"><div align="center"><font color="#FFFFFF">����</font></div></td>
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
<p><font color="#000000">�l���״ڨB�J</font></p>
�R��G����״ڳq���q�l�l����פJ���B����w�b�����ڤ�T�{��H�X�ѥ�
<br>
���G����H�X���y�q�����H�X���y����w�a�}���ڭ̽T�{�L�~��A�T�餺���ڨ�z���w�b��
<br>
<font color="#FF0000">�`�N�G���H�X���y���t�H�ѩҪ����СA�_�h�����������z�A�B���צ^�l���B�A�ڭ̤~�N���y�^�H</font> <body> </html>
