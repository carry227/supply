<?php
  include ("function.php");
  require("variable.php");  
  $dbconn = pg_connect ($Gdbconnectstring);
  $sql = "select name from member where mobile = '$mobile' and password = '$password'";
  $rs = pg_query($dbconn,$sql);
  $row = pg_num_rows ($rs);   
  if ( $row == 1) { 
     $data = pg_fetch_object ($rs, 0) ;
	  $si_mobile = $mobile;
	  $si_password = $password;
	  $si_name = $data->name;
      js_alert("歡迎登入本系統!");
	  echo "<script language='javascript'>self.location.href='quick_view.htm';</script>";	
   }else{
       js_alert("資料不正確,請您重新登入!");
      echo "<script language='javascript'>self.location.href='member_logon.htm';</script>";	
	}
?>