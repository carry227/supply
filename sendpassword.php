<?php 
include("function.php");

$dbconn = pg_connect ($Gdbconnectstring);
$sql = "select name,password,email from member where mobile = '$mobile'";
$rs = pg_query($dbconn,$sql);

if (pg_num_rows ($rs) == 1) {
    $data = pg_fetch_object ($rs, 0) ;
    $mail_to = $data->email;
	$subject = "電腦類二手書(登入密碼).";
	$message = "您好:
	感謝您使用本系統.
	您的密碼 : $data->password
	如果您有任何疑問,請聯絡
	     <mailto:usedbook@supply.com.tw>.
	請點選底下鏈結進入我們的網站:
	     http://book.supply.com.tw/";
	
	mail($mail_to,$subject,$message,"From: usedbook@supply.com.tw");
    js_alert("已e-mail到".$data->email."請您查收您的電子郵件,再登入.");
    echo "<script language='javascript'>self.location.href='member_logon.htm';</script>";
}else{
    js_alert("查無此資料,請確認你所輸的手機號碼.");
}
?>