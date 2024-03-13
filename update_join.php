<?php
include("function.php");
$birthday = $b_year.$b_month.$b_day;
$sql = "update member set mobile='$mobile',name='$name',birthday='$birthday',sex='$sex',
                                           htel_code = '$htel_code',htel_first= '$htel_first',htel_last= '$htel_last',
										   ctel_code='$ctel_code',ctel_first='$ctel_first',ctel_last='$ctel_last',
							               ctel_ext='$ctel_ext',email='$email',code1='$postcode1',address1='$address1',	
										   code2='$postcode2',address2='$address2',code3='$postcode3',address3='$address3',
										   password='$password'  where mobile ='$org_mobile'" ;
				
$rs = get_pg_result($sql);
if ($rs > 0) {
  js_alert("修改會員資料成功!");
     echo "<script language='javascript'>self.location.href='member_modify.php';</script>";
  }else{
  js_alert("修改會員資料失敗!");
}


?>
 
 
 
 