<?php 
include("function.php");

$dbconn = pg_connect ($Gdbconnectstring);
$sql = "select name,password,email from member where mobile = '$mobile'";
$rs = pg_query($dbconn,$sql);

if (pg_num_rows ($rs) == 1) {
    $data = pg_fetch_object ($rs, 0) ;
    $mail_to = $data->email;
	$subject = "�q�����G���(�n�J�K�X).";
	$message = "�z�n:
	�P�±z�ϥΥ��t��.
	�z���K�X : $data->password
	�p�G�z������ð�,���p��
	     <mailto:usedbook@supply.com.tw>.
	���I�侀�U�쵲�i�J�ڭ̪�����:
	     http://book.supply.com.tw/";
	
	mail($mail_to,$subject,$message,"From: usedbook@supply.com.tw");
    js_alert("�we-mail��".$data->email."�бz�d���z���q�l�l��,�A�n�J.");
    echo "<script language='javascript'>self.location.href='member_logon.htm';</script>";
}else{
    js_alert("�d�L�����,�нT�{�A�ҿ骺������X.");
}
?>