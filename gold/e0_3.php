<? include("../variable.php")?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<style>
.hellobox{
color:bule;
padding:1px;
letter-spacing:3px;
line-height:24px;
font-weight:300;
font-size:16px
}  
</style>
</head>
<?php
    $cnt_array=file("cnt_e03.txt"); /* �Ncnt.txt�ɮפ��eŪ�J�A��ƫ��A���}�C */
	$cnt = implode("", $cnt_array);
	if ($si_counter_e03 <> true) {
	$cnt++;//�֭p�[1
	$cnt_id=fopen("cnt_e03.txt","w"); /* �Ncnt.txt�ɮ׶}�ҡA��ưѼƬ�w */
	fputs($cnt_id,$cnt); /* �N�s���p�Ƽg�J */
	fclose($cnt_id); //�����ɮ�
	$si_counter_e03 = true;
	}
?>
<body bgcolor="#FFFFCC">
<div align="center"><font color="#0000FF">��M�C���]�T�^</font> </div>
<table width="100%" border="0" class= "hellobox">
  <tr> 
    <th align="center">�|�����X</td> </tr>
  <tr> 
    <td></td>
  </tr>
  <tr> 
	<td align="right">�z�i��<a href="/dobbook/index.php">�d���O</a>�A��<a href="mailto:usedbook@supply.com.tw">�H�H</a>���ڭ̱z�_�Q���N���I</td>   
  </tr>
    <tr> 
     <td align="right">�H�W�峹��<a href="index.php">�Ϥ��ӹq�����G���</a>���ѡA���G�ƹw�p�X�T���C</td>
  </tr>
</table>
</body>
</html>
